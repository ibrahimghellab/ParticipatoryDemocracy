<?php
require_once("../Model/user.php");
class UserController
{
    public static function sendPostRequest()
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


UserController::sendPostRequest();
//UserController::getUserDataFromAPI(5);
?>