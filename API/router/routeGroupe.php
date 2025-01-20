<?php
require_once("../config/connexion.php");
require_once("../Model/groupe.php");

Connexion::connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo Groupe::createGroupe(5);
}

?>