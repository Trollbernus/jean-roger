<?php 

	// pour debuguer
	// ini_set('display_errors',1); 
	// error_reporting(E_ALL);

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
	if ($_POST['antispam']!=8) { //anti spam
		$reponse = 'Dégage sale robot (ou apprends à compter)';
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

	if ($_SESSION['politburo']==0) {
		include_once('vue/politburo/stalinepakonten.php');
	}
	if ($_SESSION['politburo']==1) {
		include_once('vue/politburo/accueil.php');
	}


	//echo 'Variables stalinennes :'. $stalinetotal['nom'], $stalinetotal['motpasse'] .'<br/>';

	// echo 'staline = '.$_POST['staline'].'<br/>';
	// echo 'motpasse = '.$_POST['motpasse'].'<br/>';
	// // echo 'antispam = '.$_POST['antispam'].'<br/>';
	// echo existe_staline( htmlspecialchars( $_POST['staline'] ) ).'<br/>';
	// echo 'hash pass envoyé : '.password_hash( (htmlspecialchars($_POST['motpasse'])) , PASSWORD_BCRYPT).'<br/>';
	// echo 'hash pass bdd : '.$passstaline.'<br/><br/><br/>';

	// $x=htmlspecialchars('$2y$10$yZTZExGDqXK0PR0dBQ7QKeVva/h3MBuw8pNcjnOKdAvIfhu.sDx8i');
	// //echo $x.'<br/>';

	// if (password_verify($_POST['motpasse'], $x)) {
	// 	echo "coucoucou <br/>";
	// }

	// if (password_verify($_POST['motpasse'], password_hash($_POST['motpasse'], PASSWORD_BCRYPT ))) {
	// 	echo "coucoucoucoucou <br/>";
	// }
	// if (password_verify($_POST['motpasse'], $passstaline)) {
	// 	echo "coucoucoucoucoucoucoucoucoucoucou <br/>";
	// }


	// // if( password_verify($_POST['motpasse'], '$2y$10$FGd.C0m/LiYBYvc/fMvVfOI7FpUN9R7jlJoh207.5Toy8wyL448hm').'<br/>'){
	// // 	echo 'password ok';
	// // }else{ echo 'password pakonten';}
	// echo $reponse.'<br/>';
	// echo 'session ='.$_SESSION['politburo'].'<br/>';
	// echo $debut.'<br/>';

	//echo 'session politburo : '.$_SESSION['politburo'];
	

	
	// $_SESSION['counter'] = isset($_SESSION['counter'])? $_SESSION['counter'] +1 : 0;
	// echo 'session counter : '. $_SESSION['counter'].'<br/>';

