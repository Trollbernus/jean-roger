<?php
include_once('modele/connexion_sql.php');

// echo $_POST['idsujet'].'<br/>';
// echo $_POST['idmessage'].'<br/>';

$idsujet=$_POST['idsujet'];
$idmessage=$_POST['idmessage'];

// $idmessage= $_POST['idmessage'].'<br/>';
// echo $idmessage.'<br/>';

include_once('modele/politburo/modif_message.php');
$message_deplace=deplace_exterieur_message($idmessage,$idsujet);


include_once('modele/politburo/get_allmessage.php');
$message=get_allmessage($idmessage);

//print_r($message);

header('Location: pol_index.php?section=formulairesujet&id_sujet='.$_POST['idsujet']);
