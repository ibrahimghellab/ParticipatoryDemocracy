<?php

require_once("modele.php");
class Membre extends Modele
{
    private $idMembre;
    private $dateAdhesion;
    private $status;
    private $idInternaute;
    private $idRole;
    private $idGroupe;


    public function __construct($tab)
    {
        foreach ($tab as $cle => $valeur) {
            $this->set($cle, $valeur);
        }
    }

    public static function createMembre()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/membre';
        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        // Récupérer les données du formulaire
        $data = [
            'email' => $_POST['email'],
            'idRole' => $_POST['idRole'],
            'idGroupe' => $_POST['idGroupe']
        ];

        // Convertir les données en format JSON
        $payload = json_encode($data);

        // Définir les options cURL pour les données JSON
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Exécuter la requête et récupérer la réponse
        $response = curl_exec($ch);

        return json_encode($response, true);

    }

    public static function deleteMembre()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/membre/' . $_POST['idMembre'];
        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête DELETE
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        // Exécuter la requête et récupérer la réponse
        $response = curl_exec($ch);

        return json_encode($response, true);
    }

    public static function vote()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/membre/' . $_POST['idMembre'] . '/vote/' . $_POST['idVote'];

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        // Récupérer les données du formulaire


        $data = [
            'choix' => $_POST['choix']
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

    public static function updateVote()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/membre/' . $_POST['idMembre'] . '/vote/' . $_POST['idVote'];

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête PUT
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        // Récupérer les données du formulaire
        $data = [
            'choix' => $_POST['choix']
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