<?php

// recupere les proprietes du membre du politburo
function get_staline($staline)
{

    //echo $staline. '<br/>';

    global $bdd;
        
    $req = $bdd->prepare('SELECT nom, rang, motpasse FROM camarades WHERE nom = ?');
    $req->execute(array($staline));

    $stalineout = $req->fetch();

    // echo "depuis get_staline : <br/>";
    // echo $stalineout['nom'].'<br/>';
    // echo $stalineout['rang'].'<br/>';
    // echo $stalineout['motpasse'].'<br/>';

    return $stalineout;
}

// verifie que le pseudo existe
function existe_staline($staline)
{
    $existe=0;

    global $bdd;
        
    $req = $bdd->prepare('SELECT nom FROM camarades ');
    $req->execute();
    while ($data=$req->fetch()) {
      if ($staline==$data['nom']) {
        $existe=1;
      }
    }
    return $existe;
}

