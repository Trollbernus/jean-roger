<?php 
$envoireussi=0;


$idsujet=$_POST['idsujet'];
if(!isset($_POST['archive'])OR(!isset($_POST['idsujet']))){
	$reponse='Erreur lors de la modification de l\'archive.';
}else{
	$envoireussi=1;

	include_once('modele/politburo/get_allsujet.php');
	$allsujet=get_allsujet($_POST['idsujet']);

	$reponse= 'Modification de l\'état réussie ! <br />';
	if ($_POST['archive']==0) {
		$etatsujet='actif';
	}elseif($_POST['archive']==1){
		$etatsujet='verrouillé';
	}elseif($_POST['archive']==2){
		$etatsujet='archivé';
	}

	$reponse=$reponse.'Désormais le sujet <em>'.$allsujet['titre'].'</em> est '.$etatsujet.'.<br/>';
}


if ($envoireussi==1) {
	$idsujet=$_POST['idsujet'];
	$nouvel_archivage=$_POST['archive'];
	include_once('vue/politburo/confirmation_modif_archive_sujet.php');
}else{
	include_once('vue/sujets/erreur_formulaire.php'); 
}

// echo 'nouvel archivage :'.$_POST['archive'].'<br/>';
// echo 'idsujet = '.$_POST['idsujet'];
