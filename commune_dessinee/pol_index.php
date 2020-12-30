<?php
include_once('modele/connexion_sql.php');


if ( isset($_SESSION['politburo']) AND ($_SESSION['politburo']==1) ) {

	if ((!isset($_GET['section']) OR $_GET['section'] == 'index') OR ($_GET['section'] == 'accueil') ) {
		include_once('vue/politburo/accueil.php');		

	}elseif((isset($_GET['section'])) AND  ($_GET['section']=='sujets_prop')) {
		include_once('controle/politburo/sujets_prop.php');

	// }elseif((isset($_GET['section'])) AND  ($_GET['section']=='messages_supprimes')){
	// 	include_once('controle/politburo/messages_supprimes.php');

	}elseif((isset($_GET['section'])) AND  ($_GET['section']=='sujets_supprimes')){
		include_once('controle/politburo/sujets_supprimes.php');

	// }elseif((isset($_GET['section'])) AND  ($_GET['section']=='messagerie')){
	// 	include_once('controle/politburo/messagerie.php');

	// }elseif((isset($_GET['section'])) AND  ($_GET['section']=='modifsujet') AND (isset($_GET['id_sujet'])) ){ // a coder
	// 	include_once('controle/politburo/formulairesujet.php');

	}elseif((isset($_GET['section'])) AND  ($_GET['section']=='formulairesujet') AND (isset($_GET['id_sujet']))){ 
		include_once('controle/politburo/formulairesujet.php');

	// }elseif((isset($_GET['section'])) AND  ($_GET['section']=='formulairemessage') AND (isset($_GET['id_message']))) 
	// 	include_once('controle/politburo/formulairemessage.php');

	}else{
		header('Location: index.php?section=erreur404');			
	}
}else{
	header('Location: index.php?section=erreur404');	
}

