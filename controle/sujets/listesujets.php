<?php

// On demande les sujets actifs et verrouilles
include_once('modele/sujets/get_listesujets.php');
$sujets_actifs = get_listesujets(0,0);
$sujets_verrouilles = get_listesujets(1,0);
// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($sujets_actifs as $cle => $sujet)
{
    $sujets_actifs[$cle]['titre'] = htmlspecialchars($sujet['titre']);
    $sujets_actifs[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));
}

foreach($sujets_verrouilles as $cle => $sujet)
{
    $sujets_verrouilles[$cle]['titre'] = htmlspecialchars($sujet['titre']);
    $sujets_verrouilles[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));
}
// On affiche la page (vue)
include_once('vue/sujets/listesujets.php');