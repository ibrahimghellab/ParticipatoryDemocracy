<?php
/*
    GET :
        /groupe/:id✅
        /user/:id✅
        /groupes✅
        /user/:id/groupes✅
        /users✅
        /groupe/:id/membres✅
        /groupe/:id/membre/:id
        
        
    POST:
        /groupe✅
        /user✅
        /vote✅
        

    PUT:
        /groupe/:id✅
        /user/:id✅
    
    DELETE:
        /groupe/:id✅
        /user/:id✅
        

    
*/




require_once("config/connexion.php");

require_once("Model/groupe.php");
require_once("Model/user.php");
require_once("Model/commentaire.php");
require_once("Model/proposition.php");
require_once("Model/membre.php");
require_once("Model/vote.php");
require_once("Model/theme.php");

Connexion::connect();
$error = array();
try {
    if (!empty($_GET["demande"])) {
        $url = explode("/", $_GET["demande"]);

        switch ($url[0]) {
            case "groupe":
                require_once("router/routeGroupe.php");
                break;
            case "user":
                require_once("router/routeUser.php");
                break;
            case "commentaire":
                require_once("router/routeCommentaire.php");
                break;
            case "proposition":
                require_once("router/routeProposition.php");
                break;
            case "membre":
                require_once("router/routeMembre.php");
                break;
            case "vote":
                require_once("router/routeVote.php");
                break;
            case "theme":
                require_once("router/routeTheme.php");
                break;
            default:
                throw new Exception("Rien ne correspond");
        }
    } else {
        require_once("documentation/index.html");
    }
} catch (Exception $e) {
    $error = array(
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    );
    echo json_encode($error, JSON_PRETTY_PRINT);
}

?>