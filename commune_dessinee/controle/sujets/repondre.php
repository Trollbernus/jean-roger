<?php 
	include_once('modele/sujets/get_messagessujet.php'); // contient la fonction format_message de formatage du message
	$envoireussi=0;
	$envoiimage=0;

	if ( (!isset($_POST['captcha'])) OR ($_POST['captcha']!=$_SESSION['blubliblu'])) { //anti spam
	//if ( (!isset($_POST['captcha'])) OR ($_POST['captcha']!=8)) { //anti spam
		$reponse = 'Dégage sale robot (ou apprends à compter)';
	}elseif ( ( (!isset($_POST['tpost']) ) OR (strlen(htmlspecialchars($_POST['tpost']))<=2) ) && (!(isset($_FILES['image'])) OR (strlen($_FILES['image']['tmp_name']) < 3  ))) {
		$reponse = 'Erreur : vous devez envoyer du texte ou une image !';
	}elseif (strlen($_POST['tpost'])>=8000) {
		$reponse = "Erreur : message trop long (limité à 8000 caractères).";
	}else{

		$envoireussi=1;
		//echo 'envoi reussi (en principe)';
		$reponse= 'Envoi du message reussi ! <br />';
		if ((isset($_POST['email']))AND(strlen(($_POST['email']))>=2)) {
			$reponse=$reponse.'Votre email est ' .  htmlspecialchars($_POST['email']) . '<br />';
			$email=htmlspecialchars($_POST['email']);
		}else{ $email='v';
		
		}
		if ((isset($_POST['lien']))AND(strlen($_POST['lien'])>=2)) {
			$reponse=$reponse.'Votre lien est ' . htmlspecialchars($_POST['lien']) . '<br />';
			$lien=htmlspecialchars($_POST['lien']);
		}else{$lien='v';}
		if (strlen($_POST['tpost'])>=1) {
			$reponse=$reponse.'Votre texte :<br />' . format_message(nl2br(htmlspecialchars($_POST['tpost']))). '<br />';
			$text=nl2br(htmlspecialchars($_POST['tpost']));
		}else{$text='v';}
		if ((isset($_FILES['image']))AND(strlen(htmlspecialchars($_FILES['image']['name']))>=3)) {

			include_once('repondre_image.php');

		}else{
			$name='v';
			$probleme_image=0;
		}

	}

	$idsujet=$_POST['idsujet'];

	// echo $_POST['captcha'].'<br/>';
	// echo $_SESSION['captcha'];
	if (($envoireussi==1)AND($probleme_image==0)) {
		include_once('vue/sujets/confirmation.php');
	}else{
		//echo $envoireussi;
		include_once('vue/sujets/erreur_formulaire.php'); 
	}

