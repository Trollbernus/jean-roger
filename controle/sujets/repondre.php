<?php 
	$envoireussi=0;
	$envoiimage=0;

	if ($_POST['antispam']!=8) { //anti spam
		$reponse = 'Dégage sale robot (ou apprends à compter)';
	}elseif ((strlen(htmlspecialchars($_POST['tpost']))<=1)&&(!(isset($_FILES['image'])))) {
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
		}else{ $email='v';}
		if ((isset($_POST['lien']))AND(strlen($_POST['lien'])>=2)) {
			$reponse=$reponse.'Votre lien est ' . htmlspecialchars($_POST['lien']) . '<br />';
			$lien=htmlspecialchars($_POST['lien']);
		}else{$lien='v';}
		if (strlen($_POST['tpost'])>=1) {
			$reponse=$reponse.'Votre texte :<br />' . nl2br(htmlspecialchars($_POST['tpost'])). '<br />';
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

	if (($envoireussi==1)AND($probleme_image==0)) {
		include_once('vue/sujets/confirmation.php');
	}else{
		echo $envoireussi;
		include_once('vue/sujets/erreur_formulaire.php'); 
	}
