<?php
include_once('modele/connexion_sql.php');

// echo $_POST['idsujet'].'<br/>';
// echo $_POST['nouvel_archivage'].'<br/>';

include_once('modele/politburo/modif_sujet.php');
$archivage_reussi=suppression_sujet($_POST['idsujet']);

header('Location: pol_index.php?section=sujets_supprimes');
