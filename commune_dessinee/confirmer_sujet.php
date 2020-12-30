<?php
include_once('modele/connexion_sql.php');

echo 'Vous allez être redirigé vers le forum...<br/>';
if(isset($_POST['titre_sujet'])){
	include_once('modele/sujets/ajout_sujet.php');
	$id_nouveau_sujet=ajout_sujet($_POST['titre_sujet']);
	include_once('modele/sujets/ajout_message.php');
	$un=ajout_message($_POST['mail'],$_POST['text'],$_POST['lien'],$_POST['nomfichier'],$id_nouveau_sujet);
	header('Location: index.php?section=sujet&id_sujet='.$id_nouveau_sujet.'#repondre');
}else{
 	header('Location: index.php?section=erreur404');
}

?>
