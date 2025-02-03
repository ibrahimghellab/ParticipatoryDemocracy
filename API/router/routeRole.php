<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/role.php");


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($url[1])) {
        echo Role::getAllRoles();
    } else {
        throw new Exception("Test ??");
    }
}