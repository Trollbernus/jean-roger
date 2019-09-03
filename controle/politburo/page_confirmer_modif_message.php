<?php 
include_once('modele/politburo/get_allmessage.php');
include_once('modele/sujets/get_messagessujet.php');

/*********************************
* Premiere etape : initialisation
*********************************/

// variables par defaut
$envoireussi=0;
$envoiimage=0;
$reponse='';

// on recupere les variables du formulaire
$idsujet = $_POST['idsujet'];
$id_message = $_POST['id_message'];

// on recupere le message initial
$message=get_allmessage($id_message);

// on recupere le titre (on sait jamais ca peut servir)
$x=get_titresujet2($idsujet);
$titre_sujet_cible=$x['titre'];



/************************************************************
//Deuxieme etape : affichage de l'ancien message
************************************************************/

// date
$date = nl2br(htmlspecialchars($message['date_post']));

// lien
// si le lien est vide (code par "v" dans la bdd) on affiche du vide
if (strlen(htmlspecialchars($message['lien']))>=2) {
	$lien = '<a href="' . nl2br(htmlspecialchars($message['lien'])). '"> Lien</a>';		
}else{
	$lien = '';
}

// texte
// si le texte est vide (code par "v" dans la bdd) on affiche du rien
if (strlen($message['texte'])>=2) {
	$texte = $message['texte'] . '<br/><br/>';
}else{
	$texte='';
}

// image
// si pas d'image on affiche du rien
if (strlen(htmlspecialchars($message['nomfichier']))>=5) {
	$image='<img class="topic" src="caveafromages/' . htmlspecialchars($message['nomfichier']) . '"/">';
}else{
	$image='';
}

// pour les mails on verra plus tard, notamment pour cacher le mail. Pour l'instant je stocke le mail dans cette variable.
// note : pour envoyer un mail en php il suffit de faire email($email, $sujet, $corps) 
if (strlen(nl2br(htmlspecialchars($message['mail'])))>=3) {
	$mail = nl2br(htmlspecialchars($message['mail']));		
}else{
	$mail = '';
}




/*************************************************************
*  Troisieme etape : message a modifier
*************************************************************/ 

// astuce : si pas de modif, on rend la modification egale a l'ancien message.
// ca simplifiera la fonction de modification de l'image;

//mail
$okmail=0;
if( (isset($_POST['email'])) AND ($_POST['modifmail']==1) ){
    $modifmail=1;
    // reception du nouveau mail
	if (strlen(($_POST['email']))>=2) {
		$emailmod=htmlspecialchars($_POST['email']);
		$affichemailmod='<div class="politburo">'.htmlspecialchars($_POST['email']).'</div>';
	}else{ 
		$emailmod='v';
		$affichemailmod='<div class="politburo""> Email supprimé.</div>';
	}
	$okmail=1;
}else{
    $modifmail=0;
    $okmail=1;
    $emailmod=$message['mail'];
	$affichemailmod=$mail;
}

// lien
$oklien=0;
if( (isset($_POST['lien'])) AND ($_POST['modiflien']==1) ){
	// reception du nouveau lien
	if (strlen($_POST['lien'])>=2) {
		$lienmod=htmlspecialchars($_POST['lien']);
		$affichelienmod='<a class="politburo" href="'.htmlspecialchars($_POST['lien']).'">Lien</a>';
	}else{
		$lienmod='v';
		$affichelienmod='<div class="politburo">Lien supprimé.</div>';
	}
	$oklien=1;
    $modiflien=1;
}else{ // sinon on remet l'ancien
    $modiflien=0;
    $oklien=1;
    $lienmod=$message['lien'];
    $affichelienmod=$lien;
}

// texte
$oktexte=0;
if( (isset($_POST['tpost'])) AND ($_POST['modiftexte']==1) ){
    $modiftexte=1;
    // reception du nouveau texte
	if (strlen($_POST['tpost'])>=800) {
		$reponse = "Erreur : mail trop long (limité à 800 caractères).";
	}else{
		if (strlen($_POST['tpost'])>=1) {
			$textmod=nl2br(htmlspecialchars($_POST['tpost']));
			$affichetextmod='<div class="politburo">'.nl2br(htmlspecialchars($_POST['tpost'])).'</div>';
		}else{
			$textmod='v';
			$affichetextmod='<div class="politburo">Texte supprimé.</div>';
		}	
		$oktexte=1;	
	}
}else{
    $modiftexte=0;
    $oktexte=1;
    $textmod=$message['texte'];
    $affichetextmod=$texte;
}

// image
$okimage=0;
if( (isset($_FILES['image'])) AND ($_POST['modifimage']==1) ){
    $modifimage=1;
    // reception de la nouvelle image
	if (strlen(htmlspecialchars($_FILES['image']['name']))>=3) {
		//echo "coucou";
		include_once('controle/sujets/repondre_image.php'); // la reception de l'image est geree ici
		if ($probleme_image==0) {
			$okimage=1;
			$imagemod=$name;
			$afficheimagemod='<div class="politburoimage"><img src="caveafromages/'.$name.'"></div> <br />';
		}
	}elseif( (isset($_FILES['image'])) AND ($_POST['modifimage']==1)){
		$imagemod='v';
		$afficheimagemod='<div class="politburo">Image supprimée.</div>';
		$okimage=1;
	}else{
		$reponse='Problème lors de l\'envoi de l\'image;';
		$okimage=0;
	}
}else{
    $modifimage=0;
    $okimage=1;
    $imagemod=$message['nomfichier'];
    $afficheimagemod=$image;
}

// antispam
if ((!isset($_POST['antispam'])) OR ($_POST['antispam']!=8)) {
	$okspam=0;
	$reponse='Dégage sale robot (ou apprends à compter)';
}else{
	$okspam=1;
}

//print_r($_POST);
//print_r($_FILES);
//echo $afficheimagemod.'<br/>'.$affichetextmod.'<br/>'.$affichelienmod.'<br/>'.$affichemailmod.'<br/>';

if ( ($okmail==1) AND ($oktexte==1) AND ($oklien==1) AND ($okimage==1) AND ($okspam==1) ) { // si tout va bien
	include_once('vue/politburo/confirmation_modif_message.php'); // pol_modification_image.php (apres)
}else{
	include_once('vue/sujets/erreur_formulaire.php');
}
