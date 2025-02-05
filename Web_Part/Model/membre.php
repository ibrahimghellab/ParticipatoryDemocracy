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
    public static function sendMembreInvit()
    {
        $token = bin2hex(random_bytes(16));
        $destinataire = $_POST["email"];
        $objet = "Invitation à rejoindre notre groupe";
        $corps = "Bonjour,%0A%0AVous%20avez%20reçu%20une%20invitation%20à%20rejoindre%20notre%20groupe.%20Cliquez%20sur%20le%20lien%20pour%20accepter%20ou%20refuser:%20" . urlencode("https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/Web_Part/View/signupToken.php?token=" . $token . '&idGroupe=' . $_POST["id"] . '&role=' . $_POST["role"]);
        $mailto_link = "mailto:" . $destinataire . "?subject=" . urlencode($objet) . "&body=" . $corps;
        header("Location: " . $mailto_link);
    }

    public static function createMembre()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/membre';
        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        // Récupérer les données du formulaire
        $data = [
            'idInternaute' => $_SESSION['id'],
            'role' => $_POST['role'],
            'idGroupe' => $_POST['idGroupeInvite']
        ];

        // Convertir les données en format JSON
        $payload = json_encode($data);

        // Définir les options cURL pour les données JSON
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Exécuter la requête et récupérer la réponse
        $response = curl_exec($ch);

        return json_decode($response, true);
    }

    public static function deleteMembre()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/membre/' . $_POST['idMembre'];
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
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/membre/' . $_POST['idMembre'] . '/vote/' . $_POST['idVote'];

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
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/membre/' . $_POST['idMembre'] . '/vote/' . $_POST['idVote'];

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

    public static function getMembreById($id)
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/membre/' . $id;

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

}