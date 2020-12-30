<?php
// include_once('modele/connexion_sql.php');

// include_once('controle/sujets/supprimer.php');
echo 'Vous allez être redirigé vers le forum...<br/>';
if (isset($_POST['nomfichier'])) {
	echo 'image a supprimer : '.$_POST['nomfichier'];
	unlink('caveafromages/'.$_POST['nomfichier']).'<br/>';
	echo 'image supprimee.';
	header('Location: index.php');
}else{
 	header('Location: index.php?section=erreur404');
}

?>
