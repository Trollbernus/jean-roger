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


// $req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ?  AND prix <= ? ORDER BY prix');
// $req->execute(array($_GET['possesseur'], $_GET['prix_max']));

$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax');
$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));


echo '<ul>';
while ($donnees = $req->fetch())
{
    echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
}
echo '</ul>';

$req->closeCursor();




?>
</body>
</html>