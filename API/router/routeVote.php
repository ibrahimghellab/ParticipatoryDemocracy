<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/vote.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo Vote::createVote();
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {

} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
}

?>