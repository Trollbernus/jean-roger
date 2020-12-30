<?php
include_once('modele/connexion_sql.php');

// echo $_POST['idsujet'].'<br/>';
// echo $_POST['nouvel_archivage'].'<br/>';

include_once('modele/politburo/modif_sujet.php');
$archivage_reussi=modif_archive_sujet($_POST['nouvel_archivage'],$_POST['idsujet']);
if ($archivage_reussi==1) {
	header('Location: pol_index.php?section=sujets_prop');
}else{
	echo "Problème interne, contacter l'administrateur du site.";
}
