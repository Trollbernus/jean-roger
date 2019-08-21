<?php
include_once('modele/connexion_sql.php');

if ((isset($_SESSION['politburo'])) AND ($_SESSION['politburo']==1)) {
	include_once('vue/politburo/accueil.php');
}else{
 	header('Location: index.php?section=erreur404'); // pour les petits malins...
} 

