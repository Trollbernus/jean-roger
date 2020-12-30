<?php 
include_once('modele/politburo/ordre_messages.php');
include_once('modele/politburo/get_allmessage.php');
include_once('modele/sujets/get_messagessujet.php');

// on va simplifier les variables issues du formulaire
//Array ( [mail] => 1 [lien] => 1 [texte] => 1 [image] => 1 [submit] => Modifier [id_message] => 23 ) 
if( (isset($_POST['mail'])) AND ($_POST['mail']==1) ){
    $modifmail=1;
}else{
    $modifmail=0;
}
if( (isset($_POST['lien'])) AND ($_POST['lien']==1) ){
    $modiflien=1;
}else{
    $modiflien=0;
}
if( (isset($_POST['texte'])) AND ($_POST['texte']==1) ){
    $modiftexte=1;
}else{
    $modiftexte=0;
}
if( (isset($_POST['image'])) AND ($_POST['image']==1) ){
    $modifimage=1;
}else{
    $modifimage=0;
}



// on recupere les variables du formulaire
$idsujet = $_POST['idsujet'];
$id_message = $_POST['id_message'];


// on gere l'affichage du message

// on recupere le message a deplacer
$message=get_allmessage($id_message);


// on recupere le titre (on sait jamais ca peut servir)
$x=get_titresujet2($idsujet);
$titre_sujet_cible=$x['titre'];

//dates
$date = nl2br(htmlspecialchars($message['date_post']));

// lien
// si le lien est vide (code par "v" dans la bdd) on affiche du vide
if (strlen(htmlspecialchars($message['lien']))>=2) {
	$lien = '<a href="' . format_message(nl2br(htmlspecialchars($message['lien']))). '"> Lien</a>';		
}else{
	$lien = '';
}

// texte
// si le texte est vide (code par "v" dans la bdd) on affiche du rien
if (strlen($message['texte'])>=2) {
    $smessage = format_message( $message['texte'] );

	$texte = 'Texte à copier :<br/><br/>' . $smessage . '<br/><br/>';
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
if ((strlen(nl2br(htmlspecialchars($message['mail'])))>=0) OR ($message['mail']!='v')) {
	$mail = nl2br(htmlspecialchars($message['mail']));		
}else{
	$mail = '';
}




include_once('vue/politburo/formulaire_modif_message.php');
