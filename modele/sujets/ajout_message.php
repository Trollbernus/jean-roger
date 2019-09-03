<?php

function ajout_message($mail,$texte,$lien,$nomfichier,$idsujet)
{
    $idsujet = (int) $idsujet;
    //echo $texte;
    global $bdd;
        
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
                  'texte'=>$texte,
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
