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


// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT nom, possesseur, prix FROM jeux_video WHERE possesseur=\'Patrick\' AND prix < 40 ORDER BY prix DESC LIMIT 3, 2');

// On affiche chaque entrée une à une


while ($donnees = $reponse->fetch())
{
    echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . ' et coûte ' . $donnees['prix'] . ' €.<br />';
}


$reponse->closeCursor(); // Termine le traitement de la requête

?>
</body>
</html>