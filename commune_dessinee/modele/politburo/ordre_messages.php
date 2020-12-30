<?php

// recupere le message qui suit le message d'ordre $ordre_prec dans le sujet $idsujet, en excluant le message qu'on deplace
function get_message_suiv($id_sujet, $ordre_prec, $id_message_deplace)
{
	global $bdd;
	$id_sujet = (int) $id_sujet;
	$ordre_prec = (int) $ordre_prec;

	$req = $bdd->prepare('SELECT * FROM messages WHERE ordre > ? AND id_sujet=? ORDER BY ordre ');
	$req->execute(array($ordre_prec, $id_sujet))
	or die(print_r($req->errorInfo(), true));

	$u=0; // initialisation
	$message=0; // par defaut
	while ($data=$req->fetch()) { // on parcourt les donnees
		$u=$u+1;
		//seule facon d'obtenir cette condition : il existe au moins un message apres la cible qui n'est pas le message a deplacer
		if (($u==1) AND ($id_message_deplace!=$data['id'])) { 
			$message=$data;
		}
	}

	//print_r($message);
	return $message;
}

// deplace le message d'id $id_message_deplace juste apres le message d'ordre $ordre_prec dans le sujet $idsujet

function deplace_message_intra($id_message_deplace, $ordre_prec, $idsujet)
{
	global $bdd;
	$id_message_deplace = (int) $id_message_deplace;
	$ordre_prec = (int) $ordre_prec;
	$idsujet = (int) $idsujet;

	$nouvel_ordre = $ordre_prec+1;

    // incremente l'ordre de tous les messages apres $ordre_prec dans le sujet $idsujet
    $req = $bdd->prepare('UPDATE messages SET ordre=ordre+1  WHERE ordre > ? AND id_sujet=?');
    $req->execute( array( $ordre_prec, $idsujet ) )
    or die(print_r($req->errorInfo(), true));

	// change l'ordre du message a deplacer juste apres $ordre_prec
    $req = $bdd->prepare('UPDATE messages SET ordre= ?  WHERE id= ?');
    $req->execute( array( $nouvel_ordre, $id_message_deplace ) )
    or die(print_r($req->errorInfo(), true));

	return 1;
}
