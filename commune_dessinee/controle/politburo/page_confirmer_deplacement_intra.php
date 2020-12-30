<?php 
include_once('modele/politburo/ordre_messages.php');
include_once('modele/politburo/get_allmessage.php');
include_once('modele/sujets/get_messagessujet.php');


// on recupere les variables du formulaire
$idsujet = $_POST['idsujet'];
$id_message_deplace = $_POST['id_message_deplacer'];
$id_message_prec=$_POST['id_message_prec'];
$ordre_prec = $_POST['ordre'];

//echo $ordre_prec;

// on recupere le message precedent
if ($ordre_prec!=0) { // si on veut mettre le message au debut, pas de message precedent
	$message_prec=get_allmessage($id_message_prec);
}

// on recupere le message a deplacer
$message_deplace=get_allmessage($id_message_deplace);

// on recupere le message suivant
$message_suiv = get_message_suiv($idsujet, $ordre_prec, $id_message_deplace); 
// remarque : si $message_prec etait le dernier message du sujet, alors ici $message_suiv=0

// on recupere le titre (on sait jamais ca peut servir)
$x=get_titresujet2($idsujet);
$titre_sujet_cible=$x['titre'];

//dates
if ($ordre_prec!=0) {
	$date_prec = nl2br(htmlspecialchars($message_prec['date_post']));
}
$date_deplace = nl2br(htmlspecialchars($message_deplace['date_post']));
if ($message_suiv==0) {
	$date_suiv='';
}else{
	$date_suiv = nl2br(htmlspecialchars($message_suiv['date_post']));
}

// lien
// si le lien est vide (code par "v" dans la bdd) on affiche du vide
if($ordre_prec!=0){
	if (strlen(htmlspecialchars($message_prec['lien']))>=2) {
		//echo $message['lien'];
		$lien_prec = '<a href="' . nl2br(htmlspecialchars($message_prec['lien'])). '"> Lien</a>';		
	}else{
		$lien_prec = '';
	}
}
if (strlen(htmlspecialchars($message_deplace['lien']))>=2) {
	//echo $message['lien'];
	$lien_deplace = '<a href="' . nl2br(htmlspecialchars($message_deplace['lien'])). '"> Lien</a>';		
}else{
	$lien_deplace = '';
}
if($message_suiv==0){
	$lien_suiv='';
}else{
	if (strlen(htmlspecialchars($message_suiv['lien']))>=2) {
		//echo $message['lien'];
		$lien_suiv = '<a href="' . nl2br(htmlspecialchars($message_suiv['lien'])). '"> Lien</a>';		
	}else{
		$lien_suiv = '';
	}
}

// texte
// si le texte est vide (code par "v" dans la bdd) on affiche du rien
if($ordre_prec!=0){
	if (strlen($message_prec['texte'])>=2) {
		$texte_prec = $message_prec['texte'] . '<br/><br/>';
	}else{
		$texte_prec='';
	}
}
if (strlen($message_deplace['texte'])>=2) {
	$texte_deplace = $message_deplace['texte'] . '<br/><br/>';
}else{
	$texte_deplace='';
}
if($message_suiv==0){
	$lien_suiv='';
}else{
	if (strlen($message_suiv['texte'])>=2) {
		$texte_suiv = $message_suiv['texte'] . '<br/><br/>';
	}else{
		$texte_suiv='';
	}
}

// image
// si pas d'image on affiche du rien
if($ordre_prec!=0){
	if (strlen(htmlspecialchars($message_prec['nomfichier']))>=5) {
		$image_prec='<img class="topic" src="caveafromages/' . htmlspecialchars($message_prec['nomfichier']) . '"/">';
	}else{
		$image_prec='';
	}
}
if (strlen(htmlspecialchars($message_deplace['nomfichier']))>=5) {
	$image_deplace='<img class="topic" src="caveafromages/' . htmlspecialchars($message_deplace['nomfichier']) . '"/">';
}else{
	$image_deplace='';
}
if($message_suiv==0){
	$image_suiv='';
}else{
	if (strlen(htmlspecialchars($message_suiv['nomfichier']))>=5) {
		$image_suiv='<img class="topic" src="caveafromages/' . htmlspecialchars($message_suiv['nomfichier']) . '"/">';
	}else{
		$image_suiv='';
	}
}

// pour les mails on verra plus tard, notamment pour cacher le mail. Pour l'instant je stocke le mail dans cette variable.
// note : pour envoyer un mail en php il suffit de faire email($email, $sujet, $corps) 
if($ordre_prec!=0){
if ((strlen(nl2br(htmlspecialchars($message_prec['mail'])))>=0) OR ($message_prec['mail']!='v')) {
	$mail_prec = nl2br(htmlspecialchars($message_prec['mail']));		
}else{
	$mail_prec = '';
}
}
if ((strlen(nl2br(htmlspecialchars($message_deplace['mail'])))>=0) OR ($message_deplace['mail']!='v')) {
	$mail_deplace = nl2br(htmlspecialchars($message_deplace['mail']));		
}else{
	$mail_deplace = '';
}
if($message_suiv==0){
	$mail_suiv='';
}else{
	if ((strlen(nl2br(htmlspecialchars($message_suiv['mail'])))>=0) OR ($message_suiv['mail']!='v')) {
		$mail_suiv = nl2br(htmlspecialchars($message_suiv['mail']));		
	}else{
		$mail_suiv = '';
	}
}


include_once('vue/politburo/confirmation_deplacement_intra.php');
