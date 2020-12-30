<?php 
# afficher la liste des sujets avec les differentes options (l'essentiel se fera dans la vue, ici il faut juste afficher les sujets avec leurs proprietes)

include_once('modele/politburo/get_sujets_prop.php');

// On demande les sujets actifs et verrouilles supprimes
$sujets_actifs = get_sujets_prop(0,1);
$sujets_verrouilles = get_sujets_prop(1,1);
$sujets_archives = get_sujets_prop(2,1);

// On effectue du traitement sur les données (contrôleur)
foreach($sujets_actifs as $cle => $sujet)
{
    $sujets_actifs[$cle]['id'] = $sujet['id'];
    $sujets_actifs[$cle]['titre'] = '<img src="vue/images/croix_sujet_suppr.png">'.htmlspecialchars($sujet['titre']);
    $sujets_actifs[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));    
}

foreach($sujets_verrouilles as $cle => $sujet)
{
    $sujets_verrouilles[$cle]['id'] = $sujet['id'];
    $sujets_verrouilles[$cle]['titre'] = '<img src="vue/images/croix_sujet_suppr.png"><img src="vue/images/cadenas.png">'.htmlspecialchars($sujet['titre']);
    $sujets_verrouilles[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));
}

foreach($sujets_archives as $cle => $sujet)
{
    $sujets_archives[$cle]['id'] = $sujet['id'];
    $sujets_archives[$cle]['titre'] = '<img src="vue/images/croix_sujet_suppr.png"><img src="vue/images/cadenas.png">'.htmlspecialchars($sujet['titre']);
    $sujets_archives[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));
}

// On affiche la page (vue)
$suppr=1;
include_once('vue/politburo/sujets_prop.php');
