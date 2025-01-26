<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/commentaire.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (is_numeric($url[1]) && $url[2] == "reactions") {
        echo json_encode(Commentaire::getReactionByCommentaire($url[1]), JSON_PRETTY_PRINT);
    } else {

        throw new Exception("TestGroupe");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo Commentaire::createCommentaire($url[1], $url[2]);
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    echo Groupe::updateGroupe($url[1]);
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo Groupe::deleteGroupe($url[1]);
}

?>