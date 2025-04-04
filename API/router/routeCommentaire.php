<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/commentaire.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (is_numeric($url[1]) && !empty($url[2]) && $url[2] == "reactions") {
        echo json_encode(Commentaire::getReactionByCommentaire($url[1]), JSON_PRETTY_PRINT);

    } elseif (is_numeric($url[1]) && empty($url[2])) {
        echo json_encode(Commentaire::getCommentaireById($url[1]), JSON_PRETTY_PRINT);
    } elseif (is_numeric($url[1]) && !empty($url[2]) && $url[2] == "signalements") {
        echo json_encode(Commentaire::getSignalementsByCommentaire($url[1]), JSON_PRETTY_PRINT);
    } else {

        throw new Exception("TestGroupe");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($url[1]) && is_numeric($url[1]) && !empty($url[2]) && is_numeric($url[2])) {
        echo Commentaire::createCommentaire($url[1], $url[2]);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "reaction" && !empty($url[3]) && is_numeric($url[3])) {
        echo Commentaire::addReaction($url[1], $url[3]);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    echo Groupe::updateGroupe($url[1]);
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo Groupe::deleteGroupe($url[1]);
}

?>