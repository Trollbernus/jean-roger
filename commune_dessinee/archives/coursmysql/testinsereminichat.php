<?php try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
	        die('Erreur : '.$e->getMessage());
	}
	// Si tout va bien, on peut continuer


	// encodage 
	$bdd->query("SET NAMES UTF8");


	$pseudo="Staline";
	$text="La bourgeoisie au goulag !!!";


	$req = $bdd->prepare('INSERT INTO minichat VALUES(:pseudo, :message');	
	$nb_supr = $req->execute(array(
	    'pseudo'=> $pseudo,
	    'message'=> $text,
	    ));	
	$req = $bdd->prepare('SELECT pseudo, message FROM minichat');
	$req->execute();
	while ($donnees = $req->fetch())
	{
	    echo $donnees['pseudo'] . ' : ' . $donnees['message'] . '<br/>';
	}

?>
