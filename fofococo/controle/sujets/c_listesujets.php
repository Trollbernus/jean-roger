<?php

// On demande les 5 derniers billets (modèle)
include_once('modele/blog/get_sujets.php');
$sujets_actifs = get_sujets(0);
$sujets_verrouilles = get_sujets(1);
// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($billets as $cle => $billet)
{
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}

// On affiche la page (vue)
include_once('vue/blog/index.php');