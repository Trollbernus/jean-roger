<?php 
	$envoireussi=0;
	$envoiimage=0;
	$probleme_image=1;

	if ( (!isset($_POST['captcha'])) OR ($_POST['captcha']!=$_SESSION['blubliblu'])) { //anti spam
	//if ( (!isset($_POST['captcha'])) OR ($_POST['captcha']!=8)) { //anti spam
		$reponse = 'Dégage sale robot (ou apprends à compter)';
	}elseif(!isset($_POST['titre_sujet'])OR(strlen($_POST['titre_sujet'])<=1)){
		$reponse='Erreur lors de l\'envoi du titre';
	}elseif ((strlen(htmlspecialchars($_POST['tpost']))<=1)&&(!(isset($_FILES['image'])))) {
		$reponse = 'Erreur : vous devez envoyer du texte ou une image !';
	}elseif (strlen($_POST['tpost'])>=8000) {
		$reponse = "Erreur : message trop long (limité à 8000 caractères).";
	}else{
		$envoireussi=1;
		//echo 'envoi reussi (en principe)';
		$reponse= 'Envoi du sujet reussi ! <br />';
		$reponse=$reponse.'Titre du sujet : '.htmlspecialchars($_POST['titre_sujet']).'<br/>';
		$titre_sujet=htmlspecialchars($_POST['titre_sujet']);
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

	//$idsujet=$_POST['idsujet'];

	if (($envoireussi==1)AND($probleme_image==0)) {
		include_once('vue/sujets/confirmation_sujet.php');
	}else{
		include_once('vue/sujets/erreur_formulaire.php'); 
	}





















// <?php 
// 	$envoireussi=0;
// 	$envoiimage=0;
//     $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'PNG', 'GIF');
//     if (isset($_FILES['image'])AND($_FILES['image']['size']>=1)) {
// 	    $image_sizes = getimagesize($_FILES['image']['tmp_name']);
// 	    $infosfichier = pathinfo($_FILES['image']['tmp_name']);
// 	    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
//     }
//     $maxwidth=900;
//     $maxheight=5000;


//     // on recupere l'id du sujet

// 	if ($_POST['antispam']!=8) { //anti spam
// 		$reponse = 'Dégage sale robot (ou apprends à compter)';
// elseif ((strlen($_POST['tpost'])<=1)&&(!(isset($_FILES['image'])))) {
// 		$reponse = 'Erreur : vous devez envoyer du texte ou une image !';
// 	}elseif (strlen($_POST['tpost'])>=8000) {
// 		$reponse = "Erreur : message trop long (limité à 8000 caractères).";
// 	}elseif ($_FILES['image']['error'] != 0) {
// 		$reponse = "Erreur lors de l'envoi de l'image.";
// 	}elseif ($_FILES['image']['size'] > 2000000) {
// 		$reponse = "Erreur : image trop grosse ! (limité à 2 Mo)";
// 	}elseif (!in_array($extension_upload, $extensions_autorisees)) {
// 		$reponse = "Erreur : votre image doit être au format gif, jpg, jpeg, gif, ou png.";
// 	}elseif ($image_sizes[0] > $maxwidth) {
// 		$reponse = "Erreur : image trop large ! (largeur max : 900 px)";
// 	}elseif ($image_sizes[1] > $maxheight) {
// 		$reponse = "Erreur : image trop haute ! (hauteur max : 5000 px (quand même t'abuses))";
// 	}else
// 	{
// 		$envoireussi=1;
// 		//echo 'envoi reussi (en principe)';
// 		if ((isset($_POST['email']))AND(strlen(($_POST['email']))>=2)) {
// 			$reponse=$reponse.'Votre email est ' .  htmlspecialchars($_POST['email']) . '<br />';
// 			$email=htmlspecialchars($_POST['email']);
// 		}else{ $email='v';}
// 		if ((isset($_POST['lien']))AND(strlen($_POST['lien'])>=2)) {
// 			$reponse=$reponse.'Votre lien est ' . htmlspecialchars($_POST['lien']) . '<br />';
// 			$lien=htmlspecialchars($_POST['lien']);
// 		}else{$lien='v';}
// 		if (strlen($_POST['tpost'])>=1) {
// 			$reponse=$reponse.'Votre texte :<br />' . nl2br(htmlspecialchars($_POST['tpost'])). '<br />';
// 			$text=nl2br(htmlspecialchars($_POST['tpost']));
// 		}else{$text='v';}
// 		if (isset($_FILES['image'])) {
// 			$envoiimage=1;
// 		}
// 	}
// 	if ($envoiimage==1) { // si tout est bon on envoie l'image
// 		// on renomme l'image
// 		//date
// 		$j=date('j');
// 		$m=date('m');
// 		$a=date('Y');
// 		$h=date('H');
// 		$mi=date('i');
// 		//modif de certains caracteres speciaux
// 		$prename=$_FILES['image']['name'];
// 		$prename=mb_substr($prename, 0, -4);
// 		$prename=str_replace(' ', '_', $prename);
// 		$prename=str_replace('é', 'e', $prename);
// 		$prename=str_replace('è', 'e', $prename);
// 		$prename=str_replace('à', 'a', $prename);
// 		$prename=str_replace('ù', 'u', $prename);
// 		$prename=str_replace('ç', 'c', $prename);
// 		//suppression de tous les autres caracteres speciaux
// 		$prename=preg_replace("/[^a-zA-Z]/", "", $prename);
// 		// creation du nom
// 		$name=$a.'_'.$m.'_'.$j.'_'.$h.'_'.$mi.'_'.strval(md5(uniqid(rand(), true))).'_'.$prename.'.'.$extension_upload;
// 		//echo $name;
// 		// envoi de l'image
// 		$resultat = move_uploaded_file($_FILES['image']['tmp_name'],'caveafromages/'.$name);
// 		//if ($resultat) echo 'Transfert réussi ! Votre image : <br />';
// 		$reponse=$reponse.'<img src="caveafromages/'.$name.'"> <br />';
// 	}else{$name='v';}
// 	//$idsujet=$_POST['idsujet'];

// 	if ($envoireussi==1) {

