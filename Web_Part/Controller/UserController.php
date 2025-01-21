<?php
class UserController
{
    public static function sendPostRequest()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/user/'; // Exemple d'URL d'API

        // Initialiser cURL
        $ch = curl_init($url);

        // Encoder les données en JSON
        $jsonData = json_encode($_POST);
        print_r($_POST);

        // Définir les options cURL pour une requête POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Retourner la réponse sous forme de chaîne
        curl_setopt($ch, CURLOPT_POST, true);             // Méthode POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Données à envoyer
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',            // Type de contenu JSON
            'Content-Length: ' . strlen($jsonData)       // Longueur des données
        ));

        // Exécuter la requête et récupérer la réponse
        $response = curl_exec($ch);
        echo $response;

        // Vérifier s'il y a une erreur
        if (curl_errno($ch)) {
            echo 'Erreur cURL: ' . curl_error($ch);
            return null;
        }

        // Fermer la session cURL
        curl_close($ch);

        // Retourner la réponse de l'API (sous forme de tableau)
        return json_decode($response, true);
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

        // Retourner la réponse décodée en JSON
        echo $response;
        return json_decode($response, true);
    }
}


UserController::sendPostRequest();
//UserController::getUserDataFromAPI(5);
?>