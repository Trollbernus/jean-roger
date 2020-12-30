<?php 

	// pour debuguer
	// ini_set('display_errors',1); 
	// error_reporting(E_ALL);
        //print_r($_POST);

	// reception du formulaire de connexion au politburo ( vue/politburo/connexion.php )
	include_once('modele/politburo/get_staline.php');
	// on prend les proprietes du staline (surtout nom et mot de passe)
	$stalinetotal=get_staline('Sosso');

	// par defaut on bloque l'acces
	$_SESSION['politburo']=0;
	$connexion=0;

	// nom a entrer pour entrer
	$nomstaline = $stalinetotal['nom'] ;

	// mot de passe (crypte) pour entrer
	$passstaline = $stalinetotal['motpasse'];

	// suivent tous les controles
	if ( (!isset($_POST['captcha'])) OR ($_POST['captcha']!=$_SESSION['blubliblu'])) { //anti spam
	//if ( (!isset($_POST['captcha'])) OR ($_POST['captcha']!=8)) { //anti spam
		$reponse = 'Dégage sale robot (ou apprends à compter)';
	}elseif( !isset($_SESSION['token_preconnexion_politburo']) ){
		$reponse = 'Probleme de connexion.';
	}elseif( $_SESSION['token_preconnexion_politburo'] != $_POST['token'] ){
		$reponse = 'Impossible de se connecter au Politburo: mauvais formulaire.';
	}elseif( $_SERVER['HTTP_REFERER'] != 'https://perso.crans.org/lbernus/commune_dessinee/portail_politburo.php' ){
		$reponse = 'Impossible de se connecter au Politburo: mauvais formulaire.';
	}elseif (!isset($_POST['staline']) OR !isset($_POST['motpasse'])) { // controle du formulaire
		$reponse = 'Erreur de pseudo ou de mot de passe.';
	}elseif( existe_staline( htmlspecialchars( $_POST['staline'] ) )==1 ){ // on verifie que le pseudo entre est le bon
		$vraistaline=get_staline( htmlspecialchars( $_POST['staline'] ) ) ; // le vrai nom de staline
		$passstaline=$vraistaline['motpasse']; // on recupère le mot de passe crypte de stalinle
		$motpasse=htmlspecialchars($_POST['motpasse']); // mot de passe tape dans le formulaire
		if (  password_verify( $motpasse, $passstaline ) ) { // verification du mot de passe
			$connexion=1;
			$reponse='Bienvenue au Politburo, camarade.';
			$_SESSION['politburo']=1;
			$_SESSION['debut']=1;
		}else{
			$connexion=0;
			$reponse='Mauvais mot de passe.';
			$_SESSION['politburo']=0;
		}
	}else{
		$reponse = 'Mauvaise réponse.';
	}

	$_SESSION['message']=$reponse.'<br/>';

	if ($_SESSION['politburo']==1) {
		include_once('vue/politburo/accueil.php');
	}

	if ($_SESSION['politburo']==0) {
		include_once('vue/politburo/stalinepakonten.php');
		// Puis on detruit la session pour eviter une reconnexion
		$_SESSION = array();
		session_destroy();
	}

