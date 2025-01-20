<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/groupe.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($url[1]) && is_numeric($url[1]) && empty($url[2])) {
        echo json_encode(Groupe::getGroupeById($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "membres") {
        echo json_encode(Groupe::getMembresByGroupe($url[1]), JSON_PRETTY_PRINT);
    } else {

        throw new Exception("Test erreur");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo Groupe::createGroupe(id: 5);
}

?>