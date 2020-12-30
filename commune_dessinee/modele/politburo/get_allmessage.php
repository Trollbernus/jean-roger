<?php

// recupere toutes les proprietes d'un sujet
function get_allmessage($idmessage)
{
  global $bdd;
  $idmessage = (int) $idmessage;
  $req = $bdd->prepare('SELECT * FROM messages WHERE id=?');
  $req->execute(array($idmessage));
  $allmessage=$req->fetch();

  return $allmessage;
}

