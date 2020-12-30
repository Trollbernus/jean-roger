<?php 
# afficher la liste des sujets dans lesquels on peut deplacer le message

include_once('modele/politburo/get_sujets_prop.php');
include_once('modele/politburo/get_allsujet.php');
include_once('modele/sujets/get_messagessujet.php');

$idsujet=$_POST['idsujet'];
$idmessage=$_POST['id_message'];

$prop_sujet=get_allsujet($idsujet);


    // On demande tous les messages (supprimes et non supprimes)
    $messages = get_tous_messagessujet($idsujet);
    // On effectue du traitement sur les données (contrôleur)
    // Ici, on doit surtout sécuriser l'affichage
    foreach($messages as $cle => $message)
    {
        $messages[$cle]['suppr'] = (bool) $message['suppr'];
        //if ($messages[$cle]['suppr']) { }//a deplacer dans l'affichage

        // pour mettre les images dans un ordre controlable
        $messages[$cle]['ordre'] = $message['ordre'];

        //date
        $messages[$cle]['date'] = nl2br(htmlspecialchars($message['date']));

        // lien
        // si le lien est vide (code par "v" dans la bdd) on affiche du vide
        if (strlen(htmlspecialchars($message['lien']))>=2) {
            //echo $message['lien'];
            $messages[$cle]['lien'] = '<a href="' . nl2br(htmlspecialchars($message['lien'])). '"> Lien</a>';       
        }else{
            $messages[$cle]['lien'] = '';
        }

        // texte
        $messages[$cle]['texte'] = nl2br(htmlspecialchars($message['texte']));
        // si le texte est vide (code par "v" dans la bdd) on affiche du rien
        if (strlen($messages[$cle]['texte'])>=2) {
            $messages[$cle]['texte'] = $message['texte'] . '<br/><br/>';
        }else{
            $messages[$cle]['texte']='';
        }   

        // image
        // si pas d'image on affiche du rien
        if ( strlen(htmlspecialchars($message['nomfichier'])) >=5 ){
            $messages[$cle]['nomfichier']='<img class="topic" src="caveafromages/' . htmlspecialchars($message['nomfichier']) . '"/">';
            //echo $message['nomfichier'].'<br/>';
        }else{
            $messages[$cle]['nomfichier']='';
        }

        // pour les mails on verra plus tard, notamment pour cacher le mail. Pour l'instant je stocke le mail dans cette variable.
        // note : pour envoyer un mail en php il suffit de faire email($email, $sujet, $corps) 
        if (strlen(nl2br(htmlspecialchars($message['mail'])))>=0) {
            $messages[$cle]['mail'] = nl2br(htmlspecialchars($message['mail']));        
        }else{
            $messages[$cle]['mail'] = '';
        }

    }



// On affiche la page (vue)
include_once('vue/politburo/deplacer_message_intra.php');
