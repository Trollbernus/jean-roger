<?php

function get_listesujets($archive,$suppr)
{
    global $bdd;
    $archive = (int) $archive;
        
    $req = $bdd->prepare('SELECT 
                          id, 
                          titre, 
                          archive,
                          suppr,
                          date_fin, 
                          DATE_FORMAT(date_fin, "le %d/%m/%Y à %Hh%im") AS date_f
                          FROM sujets 
                          WHERE archive=? AND suppr=?
                          ORDER BY date_fin DESC');
    $req->execute(array($archive,$suppr));

    $sujets = $req->fetchAll();

    return $sujets;
}
