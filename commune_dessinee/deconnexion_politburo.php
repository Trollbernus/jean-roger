<?php
include_once('modele/connexion_sql.php');

$_SESSION = array();
session_destroy();
include_once('index.php');
