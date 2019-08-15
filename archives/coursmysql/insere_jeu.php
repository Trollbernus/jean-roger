<!DOCTYPE html>
<html>


<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> <!--ÇA MARCHE !!!!!-->
    <title>
        Fofo Coco
    </title>
    <link rel="stylesheet" href="../src/style_oxylos.css" /> <!--Style de ma page internet-->
</head>

<body>
<?php
try
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

$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');

$nom="Toto 2 le retour";
$possesseur="bébé lor";
$console="vieux pécé pourri";
$nbre_joueurs_max=2;
$commentaires="ce jeu ilé trobi1";
$prix=0;
$nvprix=1;

$req->execute(array(
    'nom' => $nom,
    'possesseur' => $possesseur,
    'console' => $console,
    'prix' => $prix,
    'nbre_joueurs_max' => $nbre_joueurs_max,
    'commentaires' => $commentaires
    ));

echo 'Le jeu a bien été ajouté !';


// $req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix WHERE possesseur = :possesseur');

// $req->execute(array(
//     'possesseur' => $possesseur,
//     'nvprix' => $nvprix
//     ));

// echo 'Le jeu a bien été modifié.';

// $req = $bdd->prepare('DELETE FROM jeux_video WHERE possesseur = :possesseur ');
// $nb_supr = $req->execute(array(
//     'possesseur'=> $possesseur
//     ));
// echo $nb_supr . 'jeu(x) a(ont) été supprimés.' ;

$req->closeCursor();


?>
</body>
</html>