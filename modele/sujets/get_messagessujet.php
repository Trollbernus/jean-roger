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



// recupere les messages d'un sujet
function get_messagessujet($idsujet)
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