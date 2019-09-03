<?php 

include_once('modele/politburo/get_allmessage.php');
$message=get_allmessage($_POST['id_message']);

//date
$date = nl2br(htmlspecialchars($message['date_post']));

// lien
// si le lien est vide (code par "v" dans la bdd) on affiche du vide
if (strlen(htmlspecialchars($message['lien']))>=2) {
	//echo $message['lien'];
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
if ((strlen(nl2br(htmlspecialchars($message['mail'])))>=0) OR ($message['mail']!='v')) {
	$mail = nl2br(htmlspecialchars($message['mail']));		
}else{
	$mail = '';
}

$reponse='Voulez-vous vraiment supprimer ce message ?<br/>';

include_once('vue/politburo/confirmation_suppr_message.php');
