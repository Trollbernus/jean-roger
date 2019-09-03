<?php 
# afficher la liste des sujets avec les differentes options (l'essentiel se fera dans la vue, ici il faut juste afficher les sujets avec leurs proprietes)

include_once('modele/politburo/get_sujets_prop.php');

// On demande les sujets actifs et verrouilles non supprimes
$sujets_actifs = get_sujets_prop(0,0);
$sujets_verrouilles = get_sujets_prop(1,0);
$sujets_archives = get_sujets_prop(2,0);

// On effectue du traitement sur les données (contrôleur)
foreach($sujets_actifs as $cle => $sujet)
{
    $sujets_actifs[$cle]['id'] = $sujet['id'];
    $sujets_actifs[$cle]['titre'] = htmlspecialchars($sujet['titre']);
    $sujets_actifs[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));    
    //echo $sujet['titre']. '<br/>';
}

foreach($sujets_verrouilles as $cle => $sujet)
{
    $sujets_verrouilles[$cle]['id'] = $sujet['id'];
    $sujets_verrouilles[$cle]['titre'] = htmlspecialchars($sujet['titre']);
    $sujets_verrouilles[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));
    //echo $sujet['titre']. '<br/>';
}

foreach($sujets_archives as $cle => $sujet)
{
    $sujets_archives[$cle]['id'] = $sujet['id'];
    $sujets_archives[$cle]['titre'] = htmlspecialchars($sujet['titre']);
    $sujets_archives[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));
    //echo $sujet['titre']. '<br/>';
}

// On affiche la page (vue)
$suppr=0;
include_once('vue/politburo/sujets_prop.php');
