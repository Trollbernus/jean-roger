<?php 
# afficher la liste des sujets dans lesquels on peut deplacer le message

include_once('modele/politburo/get_sujets_prop.php');

$idmessage=$_POST['id_message'];

//echo $idmessage;

// On demande les sujets non supprimes
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


// Puis les sujets supprimes
$sujets_actifs_suppr = get_sujets_prop(0,1);
$sujets_verrouilles_suppr = get_sujets_prop(1,1);
$sujets_archives_suppr = get_sujets_prop(2,1);

// On effectue du traitement sur les données (contrôleur)
foreach($sujets_actifs_suppr as $cle => $sujet)
{
    $sujets_actifs_suppr[$cle]['id'] = $sujet['id'];
    $sujets_actifs_suppr[$cle]['titre'] = htmlspecialchars($sujet['titre']);
    $sujets_actifs_suppr[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));    
    //echo $sujet['titre']. '<br/>';
}

foreach($sujets_verrouilles_suppr as $cle => $sujet)
{
    $sujets_verrouilles_suppr[$cle]['id'] = $sujet['id'];
    $sujets_verrouilles_suppr[$cle]['titre'] = htmlspecialchars($sujet['titre']);
    $sujets_verrouilles_suppr[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));
    //echo $sujet['titre']. '<br/>';
}

foreach($sujets_archives_suppr as $cle => $sujet)
{
    $sujets_archives_suppr[$cle]['id'] = $sujet['id'];
    $sujets_archives_suppr[$cle]['titre'] = htmlspecialchars($sujet['titre']);
    $sujets_archives_suppr[$cle]['date_f'] = nl2br(htmlspecialchars($sujet['date_f']));
    //echo $sujet['titre']. '<br/>';
}



// On affiche la page (vue)
include_once('vue/politburo/deplacer_message_extra.php');
