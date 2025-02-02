<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/vote.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "choix") {
        echo json_encode(Vote::getChoixVote($url[1]));
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo Vote::createVote();
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {

} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
}

?>