<?php

function ajout_sujet($titre)
{

    global $bdd;
    //echo $titre;
    $z=0;
    // on insert le nouveau sujet  
    $req = $bdd->prepare('INSERT INTO sujets(titre,date_crea,date_fin,date_suppr,archive,suppr,type,id_init)
                          VALUES(:titre,NOW(),NOW(),NOW(),:archive,:suppr,:type,:id_init)');
    $req->execute(array(
                  'titre'=>$titre,
                  'archive'=>$z,
                  'suppr'=>$z,
                  'type'=>'on s\en occupera après',
                  'suppr'=>$z,
                  'id_init'=>$z ));

    // puis on recupere son id pour y ajouter une image
    $req = $bdd->prepare('SELECT 
                          id
                          FROM sujets 
                          WHERE titre=?');
    $req->execute(array($titre));

    $id_nouveau_sujet = $req->fetch();

    return $id_nouveau_sujet['id'];
}
