<?php
include_once('modele/sujets/get_messagessujet.php');
// recuperer id_sujet avec _GET
if ((isset($_GET['id_sujet']))AND(is_int($_GET['id_sujet']))AND($_GET['id_sujet']>=0)) {
	echo 'coucou';
	$idsujet=$_GET['id_sujet'];

	//On demande d'abord de quel sujet il s'agit
	$ttitre= get_titresujet($idsujet);
	print_r($ttitre); // test
	foreach($ttitre as $cle => $titre)
	{
		$ttitre[$cle]['titre']=nl2br(htmlspecialchars($titre['titre']));
		print_r($ttitre[$cle]['titre']); // test
	}

	// On demande les messages
	$messages = get_messagessujets($idsujet);
	// On effectue du traitement sur les données (contrôleur)
	// Ici, on doit surtout sécuriser l'affichage
	foreach($messages as $cle => $message)
	{
		// si suppr = vrai on n'affiche pas l'image
		$messages[$cle]['suppr'] = (bool) $message['suppr'];
		if (!$messages[$cle]['suppr']) {

			// pour mettre les images dans un ordre controlable
		    $messages[$cle]['ordre'] = $message['ordre'];

			//date
		    $messages[$cle]['date'] = nl2br(htmlspecialchars($message['date']));

			// lien
			// si le lien est vide (code par "v" dans la bdd) on affiche du vide
			if (strlen(nl2br(htmlspecialchars($message['lien'])))>=2) {
				$messages[$cle]['lien'] = '<a href=\"' . nl2br(htmlspecialchars($message['lien'])). '\"> Lien';		
			}else{
				$message[$cle]['lien'] = '';
			}

			// texte
			$messages[$cle]['texte'] = nl2br(htmlspecialchars($message['texte']));
			// si le texte est vide (code par "v" dans la bdd) on affiche du rien
			if (strlen($messages[$cle]['texte'])>=2) {
				$messages[$cle]['texte'] = nl2br(htmlspecialchars($message['texte'])) . '<br/><br/>';
			}else{
				$messages[$cle]['texte']='';
			}

			// image
			// si pas d'image on affiche du rien
			if (htmlspecialchars($message['nomfichier'])>=5) {
				$messages[$cle]['nomfichier']='<img class=\"topic\" src=\"caveafromages/' . htmlspecialchars($message['nomfichier']) . '>';
			}else{
				$messages[$cle]['nomfichier']='';
			}

			// pour les mails on verra plus tard, notamment pour cacher le mail. Pour l'instant je stocke le mail dans cette variable.
			// note : pour envoyer un mail en php il suffit de faire email($email, $sujet, $corps) 
			if (strlen(nl2br(htmlspecialchars($message['mail'])))>=0) {
				$messages[$cle]['mail'] = nl2br(htmlspecialchars($message['mail']));		
			}else{
				$messages[$cle]['mail'] = '';
			}
		}

	}

	// On affiche la page (vue)
	include_once('vue/sujets/sujet.php');

}else{
	include_once('vue/erreur404.php');
}
