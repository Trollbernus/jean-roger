<?php
include_once('modele/connexion_sql.php');
//include_once('controle/politburo/page_confirmer_modif_message.php');
include_once('modele/politburo/modif_message.php');
include_once('modele/politburo/get_allmessage.php');
$message=get_allmessage($_POST['id_message']);
// print_r($message);
// echo '<br/>';
//print_r($_POST);

mise_a_jour_message( $_POST['id_message'], 
	                 htmlspecialchars($_POST['textmod']), 
	                 htmlspecialchars($_POST['emailmod']), 
	                 htmlspecialchars($_POST['lienmod']), 
	                 $_POST['imagemod'] );

$message=get_allmessage($_POST['id_message']);
// print_r($message);




header('Location: pol_index.php?section=formulairesujet&id_sujet='.$_POST['idsujet']);

