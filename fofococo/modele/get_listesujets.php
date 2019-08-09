<?php

function get_listesujets($archive)
{
    global $bdd;
    $archive = (int) $archive;
        
    $req = $bdd->prepare('SELECT id, titre, DATE_FORMAT(date_fin, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM sujets ORDER BY date_fin DESC  WHERE archive=? ');
    $req->execute(array($archive));
    $sujets = $req->fetchAll();
    
    return $sujets;
}
