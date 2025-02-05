<?php

require_once("modele.php");
class Commentaire extends Modele
{
    private $idCommentaire;
    private $texte;
    private $dateCommentaire;
    private $status;

    public function __construct($tab)
    {
        foreach ($tab as $cle => $valeur) {
            $this->set($cle, $valeur);
        }
    }

    public static function createCommentaire()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/commentaire/' . $_POST["idMembre"] . '/' . $_POST["idProposition"];

        // Initialiser cURL
        $ch = curl_init($url);

        // Définir les options cURL pour une requête POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        // Récupérer les données du formulaire


        $data = [
            'texte' => $_POST['texte'],
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