<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/membre.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($url[1]) && is_numeric($url[1]) && !empty($url[2]) && $url[2] == "vote" && !empty($url[3]) && is_numeric($url[3])) {
        echo Membre::vote($url[1], $url[3]);
    } else {
        echo Membre::createMembre();
    }


} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    echo Membre::updateVote($url[1], $url[3]);
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo Membre::deleteMembre($url[1]);
}

?>