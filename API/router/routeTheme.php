<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/theme.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($url[1]) && is_numeric($url[1]) && empty($url[2])) {
        echo json_encode(Theme::getThemeById($url[1]), JSON_PRETTY_PRINT);
    } else {
        throw new Exception("Test ??");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
}

?>