<?php

function modif_titre_sujet($nouveau_titre,$idsujet)
{

    global $bdd;
    $req = $bdd->prepare('UPDATE sujets  SET titre= :nouveau_titre WHERE id= :idchange');
    $req->execute(array(
                  'nouveau_titre'=>$nouveau_titre,
                  'idchange'=>$idsujet ));
    return 1;
}


function suppression_message($idmessage)
{
    $idmessage = (int) $idmessage;
    include_once('modele/politburo/get_allmessage.php');
    $message=get_allmessage($idmessage);
    $nouveau_nomfichier='suppr/'.$message['nomfichier'];
    //echo 'depuis modif_message.php : '.$nouveau_nomfichier.'<br/>';

    global $bdd;

    //$bdd->exec('UPDATE messages SET suppr = \'0\' WHERE id = \'23\'');
    $req = $bdd->prepare('UPDATE messages  SET suppr=?, nomfichier=? WHERE id= ?');


    $test=$req->execute(array(1,$nouveau_nomfichier,$idmessage))
    or die(print_r($req->errorInfo(), true));


    rename('caveafromages/' . $message['nomfichier'] , 'caveafromages/suppr/' . $message['nomfichier']);

    return 1;
}

function desuppression_message($idmessage)
{
    $idmessage = (int) $idmessage;
    include_once('modele/politburo/get_allmessage.php');
    $message=get_allmessage($idmessage);
    $nouveau_nomfichier=substr($message['nomfichier'], 6);
    //echo $nouveau_nomfichier.'<br/>';

    global $bdd;
    $req = $bdd->prepare('UPDATE messages SET suppr= ?, nomfichier= ? WHERE id= ?');
    $req->execute(array(0, $nouveau_nomfichier, $idmessage ))
    or die(print_r($req->errorInfo(), true));

    rename('caveafromages/suppr/' . $message['nomfichier'] , 'caveafromages/' . $message['nomfichier']);

    return $idmessage;
}

function deplace_exterieur_message($idmessage, $idsujet)
{
    $idmessage = (int) $idmessage;
    $idsujet = (int) $idsujet;

    global $bdd;

    $req = $bdd->prepare('SELECT 
                          MAX(ordre) as ordre
                          FROM messages 
                          WHERE id_sujet=?');
    $req->execute(array($idsujet))
    or die(print_r($req->errorInfo(), true));

    $ordremax = $req->fetch();
    $ordre_up=$ordremax['ordre']+1;

    // echo $ordre_up.'<br/>';

    $req = $bdd->prepare('UPDATE messages SET ordre= ?, id_sujet= ? WHERE id= ?');
    $req->execute( array( $ordre_up, $idsujet, $idmessage ) )
    or die(print_r($req->errorInfo(), true));

    return $idsujet;
}

// gere les modifications d'un message par un moderateur
function mise_a_jour_message( $idmessage, $textmod, $mailmod, $lienmod, $imagemod )
{
    // initialisation et formatage des variables d'entree
    $idmessage = (int) $idmessage;
    global $bdd;

    // on selectionne les proprietes du message a modifier
    $req= $bdd->prepare('SELECT * FROM messages WHERE id=?');
    $req->execute(array($idmessage))
    or die(print_r($req->errorInfo(), true));
    $message=$req->fetch();
    $suppr=$message['suppr'];

    // si le message est supprime on deplace le fichier
    if ($suppr==1) {
        rename('caveafromages/' . $imagemod , 'caveafromages/suppr/' . $imagemod);
    }

    // mise a jour du message
    $req = $bdd->prepare('UPDATE messages SET texte=?, mail=?, lien=?, nomfichier=? WHERE id=?');
    $req->execute(array($textmod, $mailmod, $lienmod, $imagemod, $idmessage))
    or die(print_r($req->errorInfo(), true));
    return 1;
}
