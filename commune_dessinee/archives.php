<?php
include_once('modele/connexion_sql.php');

//echo 'coucou';
if(isset($_GET['section'])AND(strlen($_GET['section'])>=1)){
	include_once('vue/erreur404.php');
}else{
	include_once('controle/sujets/archives.php');
}
