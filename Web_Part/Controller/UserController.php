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

    public static function createAccountToken()
    {

        $tab = json_decode(User::sendPostRequest(), true);
        if ($tab["message"] == "true") {
            require_once(__DIR__ . "/../View/loginToken.php");
            require_once(__DIR__ . "/../View/popup-sign-up-succes.html");
            header("Location: ./../View/loginToken.php?token=" . $_GET["token"] . "&idGroupe=" . $_GET["idGroupe"] . "&role=" . $_GET["role"]);
            exit();
        } else {
            echo "fail";
            require_once(__DIR__ . "/../View/signupToken.php");
            require_once(__DIR__ . "/../View/popup-sign-up-fail.html");


        }

    }

    public static function connect()
    {
        session_start();
        $tab = json_decode(User::connect(), true);
        if (isset($tab["id"]) && $tab["id"] > 0) {
            $_SESSION["id"] = $tab["id"];
            require_once(__DIR__ . "/../View/groupe.php");
            require_once(__DIR__ . "/../View/popup-log-in-success.html");
        } else {
            require_once(__DIR__ . "/../View/login.php");
            require_once(__DIR__ . "/../View/popup-log-in-fail.html");
        }
    }

    public static function connectToken()
    {
        session_start();
        require_once(__DIR__ . "/MembreController.php");
        $tab = json_decode(User::connect(), true);
        if (isset($tab["id"]) && $tab["id"] > 0) {
            $_SESSION["id"] = $tab["id"];


            $tab2 = Membre::createMembre();
            if ($tab2["message"] == "true") {

                require_once(__DIR__ . "/../View/groupe.php");
                require_once(__DIR__ . "/../View/popup-log-in-success.html");
            } else {
                require_once(__DIR__ . "/../View/popup-log-in-fail.html");
            }
        } else {
            require_once(__DIR__ . "/../View/login.php");
            require_once(__DIR__ . "/../View/popup-log-in-fail.html");
        }
    }

    public static function disconnect()
    {
        session_start();

        session_unset();

        session_destroy();

        require_once(__DIR__ . "/../View/deconnexion.php");

    }


    public static function getUserDataFromAPI($userId)
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/user/' . $userId;

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



    public static function getGroupesByUserId($userId)
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/user/' . $userId . '/groupes';

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


    public static function updateUser()
    {
        $tab = json_decode(User::updateUser(), true);
        if ($tab["message"] == "true") {
            require_once(__DIR__ . "/../View/groupe.php");
            require_once(__DIR__ . "/../View/popup-sign-up-succes.html");
        } else {
            require_once(__DIR__ . "/../View/modifierDonnees.php");
            require_once(__DIR__ . "/../View/popup-sign-up-fail.html");

        }

    }

    public static function deleteUser()
    {

        $tab = json_decode(User::deleteUser(), true);
        if ($tab["message"] == "true") {
            require_once(__DIR__ . "/../View/signup.php");
            require_once(__DIR__ . "/../View/popup-sign-up-succes.html");
        } else {
            require_once(__DIR__ . "/../View/groupe.php");
            require_once(__DIR__ . "/../View/popup-sign-up-fail.html");

        }
    }

    public static function afficherFormulaireToken()
    {
        require_once(__DIR__ . "/../View/signup.php");
    }

}
?>