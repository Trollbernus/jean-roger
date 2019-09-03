<?php

function modif_titre_sujet($nouveau_titre,$idsujet)
{

    global $bdd;
    $req = $bdd->prepare('UPDATE sujets  SET titre= :nouveau_titre WHERE id= :idchange');
    $req->execute(array(
                  'nouveau_titre'=>$nouveau_titre,
                  'idchange'=>$idsujet ));
    return 1;
}



function modif_archive_sujet($nouvel_archivage,$idsujet)
{

    if (($nouvel_archivage==0)OR($nouvel_archivage==1)OR($nouvel_archivage==2)) {
      global $bdd;
      $req = $bdd->prepare('UPDATE sujets  SET archive= :nouvel_archivage WHERE id= :idchange');
      $req->execute(array(
                    'nouvel_archivage'=>$nouvel_archivage,
                    'idchange'=>$idsujet ));
      return 1;
    }else{
      return 0;
    }
}

function suppression_sujet($idsujet)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE sujets  SET suppr= :suppression WHERE id= :idchange');
    $req->execute(array(
                  'suppression'=>1,
                  'idchange'=>$idsujet ));
    return 1;
}

function desuppression_sujet($idsujet)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE sujets  SET suppr= :suppression WHERE id= :idchange');
    $req->execute(array(
                  'suppression'=>0,
                  'idchange'=>$idsujet ));
    return 1;
}
