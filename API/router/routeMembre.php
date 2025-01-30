<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/membre.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo Membre::createMembre();
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {

} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo Membre::deleteMembre($url[1]);
}

?>