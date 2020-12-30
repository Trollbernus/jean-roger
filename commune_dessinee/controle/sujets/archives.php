<?php
// On demande les sujets archivés
include_once('modele/sujets/get_listesujets.php');
$sujets_archives = get_listesujets(2,0);
// on les fout dans des variables
foreach($sujets_archives as $cle => $sujet)
{
    $sujets_archives[$cle]['titre'] = '<img src="vue/images/cadenas.png">'.htmlspecialchars($sujet['titre']);
    $sujets_archives[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));
}

// On affiche la page (vue)
include_once('vue/sujets/archives.php');