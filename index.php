<?php
include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') // lefofococo
{
    include_once('controle/sujets/listesujets.php'); 
}elseif (($_GET['section']=='sujet')AND(isset($_GET['id_sujet']))){ // sujet
	$idsujet=$_GET['id_sujet'];
	if (isset($_GET['archive'])AND($_GET['archive']==1)) {
		$formulaire=0; // si on va dans les archives, pas de formulaire
	}elseif(isset($_GET['archive'])AND($_GET['archive']!=1)){
	 	header('Location: index.php?section=erreur404'); // pour les petits malins...
	}else{
		$formulaire=1; // sinon on laisse le formulaire
	}
	include_once('controle/sujets/sujet.php');
}elseif( $_GET['section']=='contact' ){
	include_once('vue/articles/contact.php');
}elseif( $_GET['section']=='a_propos'){
	include_once('vue/articles/a_propos.php');
}else{
	include_once('vue/erreur404.php');
}
if ((isset($_GET['section']))AND($_GET['section']=='erreur404')) {
	include_once('vue/erreur404.php');
}
