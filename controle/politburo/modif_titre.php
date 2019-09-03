<?php 
$envoireussi=0;

include_once('modele/politburo/get_allsujet.php');

$idsujet=$_POST['idsujet'];
if ($_POST['antispam']!=8) { //anti spam
	$reponse = 'Dégage sale robot (ou apprends à compter)';
}elseif(!isset($_POST['nouveau_titre'])OR(strlen($_POST['nouveau_titre'])<=1)){
	$reponse='Erreur lors de l\'envoi du titre';
}elseif (strlen($_POST['nouveau_titre'])>=500) {
	$reponse = "Erreur : message trop long (limité à 500 caractères).";
}else{
	$envoireussi=1;
	$reponse= 'Modification du titre réussie ! <br />';
	$reponse=$reponse.'Nouveau titre du sujet : <em>'.htmlspecialchars($_POST['nouveau_titre']).'</em><br/>';
	$titre_sujet=htmlspecialchars($_POST['nouveau_titre']);
}

//$idsujet=$_POST['idsujet'];

if ($envoireussi==1) {
	include_once('vue/politburo/confirmation_modif_titre_sujet.php');
}else{
	include_once('vue/sujets/erreur_formulaire.php'); 
}

