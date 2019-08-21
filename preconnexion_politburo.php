<?php
include_once('modele/connexion_sql.php');

// echo $_SESSION['preconnexion'];
// echo $_SESSION['politburo'];
if ( ( !isset($_SESSION['preconnexion']) ) OR ( $_SESSION['preconnexion']!=1 ) ) {
 	header('Location: index.php?section=erreur404'); 
}else{
	include_once('vue/politburo/connexion.php');
}

