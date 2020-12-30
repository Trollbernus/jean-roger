<?php

// selectionne les proprietes des sujets selon deux criteres : archivage et suppression du sujet
function get_sujets_prop($archive,$suppr)
{
    global $bdd;
    $archive = (int) $archive;
        
    $req = $bdd->prepare('SELECT 
                          id, 
                          titre, 
                          archive,
                          date_fin, 
                          DATE_FORMAT(date_fin, "le %d/%m/%Y à %Hh%im") AS date_f,
                          archive,
                          suppr
                          FROM sujets 
                          WHERE archive=? AND suppr=?
                          ORDER BY date_fin DESC');
    $req->execute(array($archive,$suppr));

    $sujets = $req->fetchAll();

    return $sujets;
}

