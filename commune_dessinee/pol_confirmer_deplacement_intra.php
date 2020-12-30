<?php
include_once('modele/connexion_sql.php');
include_once('modele/politburo/ordre_messages.php');

// on recupere les variables
$idsujet=$_POST['idsujet'];
$ordre_prec=$_POST['ordre_prec'];
$id_message_prec=$_POST['id_message_prec'];
$id_message_deplace=$_POST['id_message_deplace'];

// on deplace le message
$message_deplace=deplace_message_intra( $id_message_deplace, $ordre_prec, $idsujet);


// on affiche le resultat
header('Location: pol_index.php?section=formulairesujet&id_sujet='.$idsujet);
