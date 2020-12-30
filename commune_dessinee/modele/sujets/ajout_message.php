<?php

function ajout_message($mail,$texte,$lien,$nomfichier,$idsujet)
{
    $idsujet = (int) $idsujet;

    $stexte=htmlspecialchars($texte);



    // insertion dans la bdd
    global $bdd;
    $now=date("Y-m-d H:i:s");

    //mettre la jour la date du dernier message du sujet concerne
    $req = $bdd->prepare('UPDATE sujets SET date_fin=? WHERE id=?');
    $req->execute(array($now,$idsujet))
    or die(print_r($req->errorInfo(), true));

        
    $req = $bdd->prepare('SELECT 
                          MAX(ordre) as ordre
                          FROM messages 
                          WHERE id_sujet=?');
    $req->execute(array($idsujet));

    $ordremax = $req->fetch();
    $ordre_up=$ordremax['ordre']+1;

    $req = $bdd->prepare('INSERT INTO messages(mail,texte,lien,nomfichier,date_post,ordre,suppr,date_suppr,id_sujet)
                          VALUES(:mail,:texte,:lien,:nomfichier,NOW(),:ordre,:suppr,NOW(),:id_sujet)');
    $req->execute(array(
                  'mail'=>$mail,
                  'texte'=>$stexte,
                  'lien'=>$lien,
                  'nomfichier'=>$nomfichier,
                  //'date_post'=>NOW(),
                  'ordre'=>$ordre_up,
                  'suppr'=>0,
                  //'date_suppr'=>NOW(),
                  'id_sujet'=>$idsujet ));


    //echo 'coucou';
    return 1;
}
