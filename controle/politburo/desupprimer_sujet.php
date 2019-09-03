<?php 
//$envoireussi=0;

include_once('modele/politburo/get_allsujet.php');
$allsujet=get_allsujet($_POST['idsujet']);

$idsujet=$_POST['idsujet'];
$reponse='Voulez-vous vraiment désupprimer le sujet <em>'.$allsujet['titre'].'</em> ?<br/>';

include_once('vue/politburo/confirmation_desuppr_sujet.php');
