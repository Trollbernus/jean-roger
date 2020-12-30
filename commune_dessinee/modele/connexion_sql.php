<?php 
session_start();
try
{
	// On se connecte a MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=lbernus', 'lbernus', 'lulz{k0urb}');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
// Si tout va bien, on peut continuer

// encodage 
$bdd->query("SET NAMES UTF8");

