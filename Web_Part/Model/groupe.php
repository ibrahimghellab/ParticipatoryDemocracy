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

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "Méthode non autorisée.";
            return;
        }

        // Vérifier si un fichier a bien été envoyé
        if (!isset($_FILES['fileInput']) || $_FILES['fileInput']['error'] !== UPLOAD_ERR_OK) {
            echo "Aucun fichier reçu ou erreur lors de l'upload.";
            return;
        }

        // Gérer l'upload du fichier
        $target_dir = __DIR__ . "/../uploads/"; // Dossier où sauvegarder les images
        $file = $_FILES['fileInput'];
        $image_name = basename($file["name"]); // Récupérer le nom du fichier
        $target_file = $target_dir . $image_name; // Chemin absolu sur le serveur
        $image_web_path = "/uploads/" . $image_name; // Chemin accessible via le web

        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifier si le fichier est une vraie image
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "Le fichier n'est pas une image.";
            $uploadOk = false;
        }

        // Vérifier la taille du fichier
        if ($file["size"] > 500000) { // 500KB limite
            echo "Désolé, votre fichier est trop volumineux.";
            $uploadOk = false;
        }

        // Autoriser certains formats de fichier
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed_types)) {
            echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
            $uploadOk = false;
        }

        // Si tout est OK, essayer d'uploader le fichier
        if ($uploadOk) {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {

                // Envoyer les informations à l'API
                $url = 'https://projets.iut-orsay.fr/saes3-ttroles/API/groupe/' . $_SESSION["id"];

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);

                $data = [
                    'nom' => $_POST['nom'],
                    'image' => $image_web_path, // Chemin web-friendly
                    'couleur' => $_POST['couleur'],
                    'description' => $_POST['description'],
                    'themes' => json_decode($_POST['themes'])
                ];

                $payload = json_encode($data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

                $response = curl_exec($ch);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if (curl_errno($ch)) {
                    echo 'Erreur cURL: ' . curl_error($ch);
                    return null;
                }

                curl_close($ch);
                return json_decode($response, true);
            } else {
                echo "Désolé, une erreur s'est produite lors de l'upload de votre fichier.";
            }
        }
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