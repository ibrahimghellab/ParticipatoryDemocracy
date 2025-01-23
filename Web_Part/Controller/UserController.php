<?php
require_once("../Model/user.php");
class UserController
{
    public static function createAccount()
    {
        $tab = json_decode(User::sendPostRequest(), true);
        if ($tab["message"] == "true") {
            require_once(__DIR__ . "/../View/login.php");
            require_once(__DIR__ . "/../View/popup-sign-up-succes.html");
        } else {
            require_once(__DIR__ . "/../View/signup.php");
            require_once(__DIR__ . "/../View/popup-sign-up-fail.html");

        }
    }

    public static function connect(){
        session_start();
        $tab = json_decode(User::connect(), true);
        if ($tab["id"]>0) {
            $_SESSION["id"]=$tab["id"];
            print_r( $_SESSION);
            //require_once(__DIR__ . "/../View/groupe.php");
            require_once(__DIR__ . "/../View/popup-log-in-succes.html");
        } else {
            require_once(__DIR__ . "/../View/login.php");
            require_once(__DIR__ . "/../View/popup-log-in-fail.html");
        }
    }
    public static function getUserDataFromAPI($userId)
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/user/' . $userId;

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête GET
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);

        // Exécuter la requête et récupérer la réponse
        $response = curl_exec($ch);

        // Vérifier s'il y a une erreur
        if (curl_errno($ch)) {
            echo 'Erreur cURL: ' . curl_error($ch);
            return null;
        }

        // Fermer la session cURL
        curl_close($ch);

        return json_decode($response, true);
    }
}


UserController::connect();
//UserController::getUserDataFromAPI(5);
?>