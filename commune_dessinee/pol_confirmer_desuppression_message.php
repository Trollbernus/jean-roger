<?php
include_once('modele/connexion_sql.php');

$idmessage=$_POST['idmessage'];

include_once('modele/politburo/modif_message.php');
$message_desupprime=desuppression_message($idmessage);

// include_once('modele/politburo/get_allmessage.php');
// $message=get_allmessage($idmessage);
//print_r($message);


header('Location: pol_index.php?section=formulairesujet&id_sujet='.$_POST['idsujet']);
