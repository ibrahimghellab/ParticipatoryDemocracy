<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/user.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($url[1]) && is_numeric($url[1]) && empty($url[2])) {
        echo json_encode(User::getUserById($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "groupes") {
        echo json_encode(User::getGroupesByUser($url[1]), JSON_PRETTY_PRINT);
    } elseif(empty($url[1])) {
        echo User::checkUser();
    } else {
        throw new Exception("Test ??");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo User::createUser();
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    echo User::updateUser($url[1]);
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo User::deleteUser($url[1]);
}

?>