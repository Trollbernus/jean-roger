<?php
include_once('modele/connexion_sql.php');

$_SESSION['preconnexion']=1;
$_SESSION['politburo']=0;
//echo "coucou";
include_once('vue/politburo/connexion.php');
