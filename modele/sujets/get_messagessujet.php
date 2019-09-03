<?php

// recupere le titre d'un sujet d'identifiant idsujet
function get_titresujet($idsujet)
{
  global $bdd;
  $idsujet = (int) $idsujet;
  $req = $bdd->prepare('SELECT id, titre FROM sujets WHERE id=?');
  $req->execute(array($idsujet));
  $ttitre=$req->fetchAll();

  return $ttitre;
}

// recupere le titre d'un sujet d'identifiant idsujet mais en mieux
function get_titresujet2($idsujet)
{
  global $bdd;
  $idsujet = (int) $idsujet;
  $req = $bdd->prepare('SELECT id, titre FROM sujets WHERE id=?');
  $req->execute(array($idsujet));
  $ttitre=$req->fetch();

  return $ttitre;
}


// recupere l'etat d'archive d'un sujet
function est_archive($idsujet)
{
  global $bdd;
  $idsujet = (int) $idsujet;
  $req = $bdd->prepare('SELECT archive FROM sujets WHERE id=?');
  $req->execute(array($idsujet));
  $archive=$req->fetch();

  if (($archive['archive']==1)OR($archive['archive']==2)) {
    $archivage=1;
  }else{
    $archivage=0;
  }
  return $archivage;
}



// recupere les messages d'un sujet en fonction de son id et de son etat de suppression
function get_messagessujet($idsujet,$suppr)
{
    global $bdd;
    $idsujet = (int) $idsujet;

        
    $req = $bdd->prepare('SELECT 
                          id, 
                          nomfichier, 
                          texte,
                          lien,
                          mail,
                          id_sujet,
                          ordre,
                          suppr, 
                          DATE_FORMAT(date_post, "le %d/%m/%Y à %Hh%im") AS date
                          FROM messages
                          WHERE id_sujet=? AND suppr=?
                          ORDER BY ordre');
    $req->execute(array($idsujet,$suppr));

    $messages = $req->fetchAll();

    return $messages;
}

function get_tous_messagessujet($idsujet)
{
    global $bdd;
    $idsujet = (int) $idsujet;
    $req = $bdd->prepare('SELECT 
                          id, 
                          nomfichier, 
                          texte,
                          lien,
                          mail,
                          id_sujet,
                          ordre,
                          suppr, 
                          DATE_FORMAT(date_post, "le %d/%m/%Y à %Hh%im") AS date
                          FROM messages
                          WHERE id_sujet=?
                          ORDER BY ordre');
    $req->execute(array($idsujet));

    $messages = $req->fetchAll();

    return $messages;
}



// verifier que le sujet existe
function existe_sujet($idsujet)
{
  global $bdd;
  $idsujet = (int) $idsujet;

  $req = $bdd->prepare('SELECT id FROM sujets');
  $req->execute();
  $existe=0;
  while ($data=$req->fetch()) {
    if ($idsujet==$data['id']) {
      $existe=1;
    }
  }

  return $existe;
}

// verifier que le sujet n'est pas supprime
function supprime_sujet($idsujet)
{
  global $bdd;
  $idsujet = (int) $idsujet;

  $req = $bdd->prepare('SELECT suppr FROM sujets WHERE id=?');
  $req->execute(array($idsujet));
  $supprime=0;
  while ($data=$req->fetch()) {
    if ($data['suppr']==1) {
      $supprime=1;
    }
  }

  return $supprime;
}

