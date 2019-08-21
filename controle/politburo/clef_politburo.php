<?php
	// a mettre en en-tete de toutes les pages du politburo 
	if ((!isset($_SESSION['politburo'])) OR ($_SESSION['politburo']!=1)) {
 	header('Location: index.php?section=erreur404'); // pour les petits malins...
} ?>
