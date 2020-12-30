<?php
include_once('modele/connexion_sql.php');

$token = uniqid(rand(), true);
$_SESSION['token_preconnexion_politburo_time'] = time();
$_SESSION['token_preconnexion_politburo']=$token;
$_SESSION['preconnexion']=1;
$_SESSION['politburo']=0;
//echo "coucou";
//include_once('preconnexion_politburo.php');



include_once('vue/politburo/connexion.php');
