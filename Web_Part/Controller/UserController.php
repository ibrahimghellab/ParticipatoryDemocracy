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

    // public static function updateUser($id)
    // {
    //     $body = file_get_contents("php://input");
    //     $tab = json_decode($body, true);
    //     $result = false;
    //     if (isset($tab["nom"]) && isset($tab["prenom"]) && isset($tab["adresse"]) && isset($tab["email"]) && isset($tab["password"])) {
    //         require_once(__DIR__ . "/../config/connexion.php");

    //         $requetePreparee = Connexion::pdo()->prepare("UPDATE Internaute SET nom=:nom, prenom=:prenom,adresse=:adresse,email=:email,hash=:hash,salt=:salt WHERE idInternaute=:id;");
    //         $requetePreparee->bindParam(":nom", $tab["nom"], PDO::PARAM_STR);
    //         $requetePreparee->bindParam(":prenom", $tab["prenom"], PDO::PARAM_STR);
    //         $requetePreparee->bindParam(":adresse", $tab["adresse"], PDO::PARAM_STR);
    //         $requetePreparee->bindParam(":email", $tab["email"], PDO::PARAM_STR);
    //         $salt = bin2hex(random_bytes(16));
    //         $hash = hash("sha256", $tab["password"] . $salt);
    //         $requetePreparee->bindParam(":hash", $hash, PDO::PARAM_STR);
    //         $requetePreparee->bindParam(":salt", $salt, PDO::PARAM_STR);
    //         $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);
    //         try {
    //             $requetePreparee->execute();
    //         } catch (PDOException $e) {
    //             header("HTTP/1.1 500 Internal Server Error");
    //             return json_encode(array("message" => "false"));
    //         }
    //     } else {
    //         header("HTTP/1.1 500 Internal Server Error");
    //         return json_encode(array("message" => "false"));
    //     }

    //     return json_encode(array("message" => "true"));
    // }

        public static function updateUser($id)
        {
   
                $tab = json_decode(User::updateUser(), true);
                if ($tab["message"] == "true") {
                    require_once(__DIR__ . "/../View/modifierDonnees.php");
                    require_once(__DIR__ . "/../View/popup-sign-up-succes.html");
                } else {
                    require_once(__DIR__ . "/../View/modifierDonnees.php");
                    require_once(__DIR__ . "/../View/popup-sign-up-fail.html");
        
                }




        }

}
?>