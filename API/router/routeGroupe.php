<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/groupe.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($url[1]) && is_numeric($url[1]) && empty($url[2])) {
        echo json_encode(Groupe::getGroupeById($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "membres") {
        echo json_encode(Groupe::getMembresByGroupe($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "propositions") {
        echo json_encode(Groupe::getPropositionsByGroupe($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "themes") {
        echo json_encode(Groupe::getThemesByGroupe($url[1]), JSON_PRETTY_PRINT);
    } else {
        throw new Exception("TestGroupe");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo Groupe::createGroupe($url[1]);
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    echo Groupe::updateGroupe($url[1]);
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo Groupe::deleteGroupe($url[1]);
}

?>