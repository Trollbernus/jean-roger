<?php

function get_listesujets($archive)
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
    //ORDER BY id DESC
    //$req->execute(array($archive));
    // pour tester !!!
    $req->execute(array($archive));
    // while ($donnees = $req->fetch())
    // {
    //     echo $donnees['titre'];
    //     echo 'coucou1';
    // }
    //echo 'coucou2';

    $sujets = $req->fetchAll();

    return $sujets;
}
