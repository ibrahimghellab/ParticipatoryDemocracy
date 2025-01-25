<?php

// Inclusion de la connexion et des contrôleurs disponibles

// Liste des contrôleurs autorisés
$tableauControleurs = [
    "UserController" => __DIR__ . "/../Controller/UserController.php",
    // Ajouter d'autres contrôleurs ici, par exemple :
    // "ProductController" => __DIR__ . "/../Controller/ProductController.php",
];

// Définir le contrôleur et l'action par défaut
$controleur = "UserController";
$action = "connect"; // Par défaut pour ce projet

// Vérifier si un contrôleur est spécifié et valide
if (isset($_GET["controleur"]) && array_key_exists($_GET["controleur"], $tableauControleurs)) {
    $controleur = $_GET["controleur"];
}

// Inclure dynamiquement le fichier du contrôleur
if (isset($tableauControleurs[$controleur])) {
    require_once($tableauControleurs[$controleur]);
} else {
    http_response_code(404);
    echo "Erreur 404 : Contrôleur introuvable.";
    exit;
}

// Vérifier si une action est spécifiée et existe dans le contrôleur
if (isset($_GET["action"]) && method_exists($controleur, $_GET["action"])) {
    $action = $_GET["action"];
}

// Appeler dynamiquement la méthode du contrôleur
if (class_exists($controleur)) {
    // Appel de l'action de manière statique
    try {
        $controleur::$action();
    } catch (Exception $e) {
        http_response_code(500);
        echo "Erreur : " . $e->getMessage();
    }
} else {
    http_response_code(404);
    echo "Erreur 404 : Classe contrôleur introuvable.";
}
?>
