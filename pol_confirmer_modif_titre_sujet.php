<?php
include_once('modele/connexion_sql.php');

include_once('modele/politburo/modif_sujet.php');
modif_titre_sujet($_POST['nouveau_titre'],$_POST['idsujet']);
header('Location: pol_index.php?section=formulairesujet&id_sujet='.$_POST['idsujet']);