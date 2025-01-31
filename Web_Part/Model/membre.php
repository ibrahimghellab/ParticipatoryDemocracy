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
            'idInternaute' => $_POST['idInternaute'],
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
    }

}