<?php

function get_imagessujet($idsujet)
{
    global $bdd;
    $archive = (int) $archive;
        
    $req = $bdd->prepare('SELECT 
                          id, 
                          titre, 
                          archive,
                          date_fin, 
                          DATE_FORMAT(date_fin, "le %d/%m/%Y à %Hh%im") AS date_f
                          FROM sujets 
                          WHERE archive=?
                          ORDER BY date_fin DESC');
    $req->execute(array($archive));

    $sujets = $req->fetchAll();

    return $sujets;
}
