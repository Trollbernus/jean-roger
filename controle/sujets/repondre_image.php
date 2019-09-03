<?php 
	include_once('modele/sujets/is_image.php');

	//echo "coucou";
    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'PNG', 'GIF');
    $pasimage=!is_image($_FILES['image']['tmp_name']);
    if (is_image($_FILES['image']['tmp_name'])) {
		// on prend quelques proprietes elementaires de l'image
	    $image_sizes = getimagesize($_FILES['image']['tmp_name']);
	    $infosfichier = pathinfo($_FILES['image']['tmp_name']);
	    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
    }


    $maxwidth=900;
    $maxheight=5000;

    $probleme_image=1;

	if ($_FILES['image']['error'] != 0) {
		$reponse = "Erreur lors de l'envoi de l'image.";
	}elseif( $pasimage ){
		$reponse = 'Erreur : votre fichier n\'est pas une image !';
	}elseif( is_script($_FILES['image']['tmp_name']) ){
		$reponse = 'Erreur : dis donc qu\'est-ce que t\'essayes de nous envoyer là ???';
	}elseif ($_FILES['image']['size'] > 2000000) {
		$reponse = "Erreur : image trop grosse ! (limité à 2 Mo)";
	}elseif (!in_array($extension_upload, $extensions_autorisees)) {
		$reponse = "Erreur : votre image doit être au format gif, jpg, jpeg, gif, ou png.";
	}elseif ($image_sizes[0] > $maxwidth) {
		$reponse = "Erreur : image trop large ! (largeur max : 900 px)";
	}elseif ($image_sizes[1] > $maxheight) {
		$reponse = "Erreur : image trop haute ! (hauteur max : 5000 px (quand même t'abuses))";
	}else{

		// on renomme l'image
		//date
		$j=date('j');
		$m=date('m');
		$a=date('Y');
		$h=date('H');
		$mi=date('i');
		//modif de certains caracteres speciaux
		$prename=$_FILES['image']['name'];
		$prename=mb_substr($prename, 0, -4);
		$prename=str_replace(' ', '_', $prename);
		$prename=str_replace('é', 'e', $prename);
		$prename=str_replace('è', 'e', $prename);
		$prename=str_replace('à', 'a', $prename);
		$prename=str_replace('ù', 'u', $prename);
		$prename=str_replace('ç', 'c', $prename);
		//suppression de tous les autres caracteres speciaux
		$prename=preg_replace("/[^a-zA-Z]/", "", $prename);
		// creation du nom
		$name=$a.'_'.$m.'_'.$j.'_'.$h.'_'.$mi.'_'.strval(md5(uniqid(rand(), true))).'_'.$prename.'.'.$extension_upload;
		//echo $name;
		// envoi de l'image
		$resultat = move_uploaded_file($_FILES['image']['tmp_name'],'caveafromages/'.$name);
		//if ($resultat) echo 'Transfert réussi ! Votre image : <br />';
		$reponse=$reponse.'<img src="caveafromages/'.$name.'"> <br />';
		$probleme_image=0;
	}