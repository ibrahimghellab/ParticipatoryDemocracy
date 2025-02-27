<?php

// Inclusion de la connexion et des contrôleurs disponibles

// Liste des contrôleurs autorisés
$tableauControleurs = [
    "UserController" => __DIR__ . "/../Controller/UserController.php",
    "GroupeController" => __DIR__ . "/../Controller/GroupeController.php",
    "PropositionController" => __DIR__ . "/../Controller/PropositionController.php",
    "CommentaireController" => __DIR__ . "/../Controller/CommentaireController.php",
    "VoteController" => __DIR__ . "/../Controller/VoteController.php",
    "MembreController" => __DIR__ . "/../Controller/MembreController.php",
    "ThemeController" => __DIR__ . "/../Controller/ThemeController.php"
];
// Définir le contrôleur et l'action par défaut
$controleur = "UserController";
$action = "connect"; // Par défaut pour ce projet

/*if(isset($_GET["token"])){
    $controleur = "MembreController";
    $action = "connect";
    $idGroupe = $_GET["idGroupe"];
    $email = $_GET["email"];
    $role = $_GET["role"];
    UserController::afficherFormulaireToken();
    MembreController::connect($idGroupe, $email, $role);
    exit;
}
*/
// Vérifier si un contrôleur est spécifié et valide



if (isset($_POST["controleur"]) && array_key_exists($_POST["controleur"], $tableauControleurs)) {
    $controleur = $_POST["controleur"];
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
if (isset($_POST["action"]) && method_exists($controleur, $_POST["action"])) {
    $action = $_POST["action"];
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