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

    public static function disconnect()
    {
        session_start();

        session_unset();
        
        session_destroy();
        
        require_once(__DIR__ . "/../View/deconnexion.php");
        
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

    public static function getGroupesByUserId($userId)
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/user/' . $userId . '/groupes';

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

    public static function createGroupe()
    {
        session_start();
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/groupe';

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        // Récupérer les données du formulaire
        $data = [
            'nom' => $_POST['nom'],
            'description' => $_POST['description'],
            'couleur' => $_POST['color'],
            'id_utilisateur' => $_SESSION["id"]
        ];

        // Convertir les données en format JSON
        $payload = json_encode($data);

        // Définir les options cURL pour les données JSON
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

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
?>