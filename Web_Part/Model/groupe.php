<?php

require_once("modele.php");
class Groupe extends Modele
{
    private $idGroupe;
    private $nomGroupe;
    private $imageGroupe;
    private $couleurGroupe;
    private $dateCreation;
    private $description;


    public function __construct($tab)
    {
        foreach ($tab as $cle => $valeur) {
            $this->set($cle, $valeur);
        }
    }


    public static function createGroupe()
    {
        session_start();
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/groupe/' . $_SESSION["id"];

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        // Récupérer les données du formulaire
        $data = [
            'nom' => $_POST['nom'],
            'image' => $_POST["fileInput"],
            'couleur' => $_POST['couleur'],
            'description' => $_POST['description']
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

    public static function deleteGroupe()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/groupe/' . $_POST["id"]; // Exemple d'URL d'API
        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête DELETE
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // Méthode DELETE

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

    public static function getPropositionsByGroupe()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/groupe/' . $_POST["id"] . '/propositions';

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête GET
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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

    public static function getMembresByGroupe()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/groupe/' . $_POST["id"] . '/membres';

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête GET
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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