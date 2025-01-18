<?php
/*
    GET :
        /groupe/:id
        /user/:id
        /user/:id/groupes
        /users
        /groupe/:id/membres
        /groupe/:id/membre/:id
    
*/




require_once("config/connexion.php");
require_once("Model/groupe.php");

Connexion::connect();

try {
    if (!empty($_GET["demande"])) {
        $url = explode("/", $_GET["demande"]);
        switch ($url[0]) {
            case "groupe":
                if (!empty($url[1])) {
                    echo "bonjour";
                    echo json_decode(Groupe::getGroupeById($url[1]));
                } else {

                    throw new Exception("Test erreur");
                }
        }
    }


} catch (Exception $e) {
    $error = array(
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    );

    echo json_encode($error);
}



?>