<?php

require_once("modele.php");
class Vote extends Modele
{
    private $idVote;
    private $typeScrutin;
    private $dateDebut;
    private $status;
    private $dateFin;


    public function __construct($tab)
    {
        foreach ($tab as $cle => $valeur) {
            $this->set($cle, $valeur);
        }
    }

    public static function createVote()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/vote/'; // Exemple d'URL d'API

        // Initialiser cURL
        $ch = curl_init($url);

        // Encoder les données en JSON
        $jsonData = [
            'idProposition' => $_POST['idProposition'],
            'typeScrutin' => $_POST['typeScrutin'],
            'dateFin' => $_POST['dateFin'],
            'choixVote' => $_POST['choixVote'],
        ];

        $jsonData = json_encode($jsonData);


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
        return $response;
    }

    public static function getChoixVote($id)
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/vote/' . $id . '/choix'; // Exemple d'URL d'API

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête GET
        curl_setopt($ch, CURLOPT_HTTPGET, true); // Méthode GET
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retourner la réponse sous forme de chaîne
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'            // Type de contenu JSON
        ));

        // Exécuter la requête et récupérer la réponse
        $response = curl_exec($ch);
        return $response;
    }

    public static function validerVote()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/vote/' . $_POST["idVote"]; // Exemple d'URL d'API

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête PUT
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retourner la réponse sous forme de chaîne
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); // Méthode PUT
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'            // Type de contenu JSON
        ));

        // Exécuter la requête et récupérer la réponse
        $response = curl_exec($ch);
        return $response;

    }

}
?>