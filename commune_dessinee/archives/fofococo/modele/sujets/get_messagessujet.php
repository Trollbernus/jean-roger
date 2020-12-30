<?php

// recupere le titre d'un sujet d'identifiant idsujet
function get_titresujet($idsujet)
{
  global $bdd;
  $idsujet = (int) $idsujet;
  $req = $bdd->prepare('SELECT 
                      id, 
                      titre, 
                      FROM sujets 
                      WHERE id=?');
  $req->execute(array($idsujet));

  $titre = $req->fetch();
  return $titre;
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
