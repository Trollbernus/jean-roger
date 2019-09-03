<?php
include_once('modele/connexion_sql.php');

$idmessage= $_POST['idmessage'].'<br/>';
echo $idmessage.'<br/>';

include_once('modele/politburo/modif_message.php');
$message_supprime=suppression_message($idmessage);

// include_once('modele/politburo/get_allmessage.php');
// $message=get_allmessage($idmessage);
// echo $message['nomfichier'].'<br/>';
// echo $message['suppr'].'<br/>';

header('Location: pol_index.php?section=formulairesujet&id_sujet='.$_POST['idsujet']);
