<?php

require_once("modele.php");
class User extends Modele
{
    private $idInternaute;
    private $nom;
    private $prenom;
    private $adresse;
    private $email;
    private $dateCreation;
    private $hash;
    private $salt;


    public function __construct($tab)
    {
        foreach ($tab as $cle => $valeur) {
            $this->set($cle, $valeur);
        }
    }

    public static function sendPostRequest()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/user/'; // Exemple d'URL d'API

        // Initialiser cURL
        $ch = curl_init($url);

        // Encoder les données en JSON
        $jsonData = json_encode($_POST);

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


        // Vérifier s'il y a une erreur
        if (curl_errno($ch)) {
            echo 'Erreur cURL: ' . curl_error($ch);
            return null;
        }

        // Fermer la session cURL
        curl_close($ch);

        return $response;
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
        return json_decode($response, true);
    }

    public static function connect()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/user/get-id'; // URL de l'API

        // Initialiser cURL
        $ch = curl_init($url);

        // Encoder les données en JSON

        $jsonData = json_encode($_POST); // Adapter les données ici si nécessaire

        // Définir explicitement une requête GET avec un corps JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Retourner la réponse sous forme de chaîne
        curl_setopt($ch, CURLOPT_POST, true);             // Méthode POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Données à envoyer
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',            // Type de contenu JSON
            'Content-Length: ' . strlen($jsonData)       // Longueur des données
        ));

        // Exécuter la requête et récupérer la réponse
        $response = curl_exec($ch);

        // Vérifier s'il y a une erreur
        if (curl_errno($ch)) {
            echo 'Erreur cURL: ' . curl_error($ch);
            return null;
        }

        // Fermer la session cURL
        curl_close($ch);
        return $response;

    }

    public static function updateUser()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/user/'. $_SESSION["id"]; // Exemple d'URL d'API

        // Initialiser cURL
        $ch = curl_init($url);

        // Encoder les données en JSON
        $jsonData = json_encode($_POST);
        // Définir les options cURL pour une requête POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // Méthode PUT
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Envoyer les données
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', // Type de contenu JSON
        'Content-Length: ' . strlen($jsonData) // Longueur des données
        ]);

        // Exécuter la requête et récupérer la réponse
        $response = curl_exec($ch);


        // Vérifier s'il y a une erreur
        if (curl_errno($ch)) {
            echo 'Erreur cURL: ' . curl_error($ch);
            return null;
        }

        // Fermer la session cURL
        curl_close($ch);

        return $response;
    }
}