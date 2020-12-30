<?php
include_once('modele/connexion_sql.php');

//if(isset($_POST['nomfichier'])){

	include_once('modele/sujets/ajout_message.php');
	//echo $_POST['text'];
	$un=ajout_message($_POST['mail'],$_POST['text'],$_POST['lien'],$_POST['nomfichier'],$_POST['idsujet']);
	//echo $_POST['idsujet'];
	header('Location: index.php?section=sujet&id_sujet='.$_POST['idsujet'].'#repondre');
	//header('Location: index.php?section=sujet&id_sujet='.$_POST['idsujet'].'#repondre');
// }else{
//  	header('Location: index.php?section=erreur404');
// }

?>
