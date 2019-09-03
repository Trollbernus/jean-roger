<?php

// recupere toutes les proprietes d'un sujet
function get_allsujet($idsujet)
{
  global $bdd;
  $idsujet = (int) $idsujet;
  $req = $bdd->prepare('SELECT * FROM sujets WHERE id=?');
  $req->execute(array($idsujet));
  $allsujet=$req->fetch();

  return $allsujet;
}

