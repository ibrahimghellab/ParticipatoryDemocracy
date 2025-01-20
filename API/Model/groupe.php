<?php

class Groupe
{

    public static function getGroupeById($g)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        $requeteAvecTags = "SELECT * FROM Groupe WHERE idGroupe=:g;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);


        $valeurs = array();
        if (strlen($g) > 0) {
            $valeurs["g"] = $g;
        } else {
            $valeurs["g"] = NULL;
        }

        try {
            $requetePreparee->execute($valeurs);
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Groupe");
            return $requetePreparee->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function getAll()
    {
        require_once(__DIR__ . "/../config/connexion.php");
        $requete = "SELECT * FROM Groupe;";

        $resultat = Connexion::pdo()->query($requete);
        $resultat->setFetchmode(PDO::FETCH_CLASS, "Groupe");
        return $resultat->fetchAll();

    }


    public static function getMembresByGroupe($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        require_once(__DIR__ . "/../Model/membre.php");
        $requeteAvecTags = "SELECT I.nom, I.prenom, M.dateAdhesion, M.status" .
            " FROM Groupe G" .
            " INNER JOIN Membre M ON G.idGroupe=M.idGroupe" .
            " INNER JOIN Internaute I ON I.idInternaute=M.idInternaute" .
            " WHERE G.idGroupe=:id;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);
        $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);


        try {
            $requetePreparee->execute();
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Membre");
            return $requetePreparee->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function createGroupe($id)
    {

        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        $result = false;
        if (isset($tab["nom"]) && isset($tab["image"]) && isset($tab["couleur"]) && isset($tab["description"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("CALL createGroupe(" . $id . ",:nom,:img,:clr,:descr)");
            $requetePreparee->bindParam(":nom", $tab["nom"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":img", $tab["image"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":clr", $tab["couleur"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":descr", $tab["description"], PDO::PARAM_STR);
            try {
                $requetePreparee->execute();
                $result = true;
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }

            if ($result) {
                $response = [
                    "code" => http_response_code(200),
                    "message" => "Groupe  inséré."
                ];

            } else {
                $response = [
                    "code" => http_response_code(500),
                    "message" => "ERREUR: Le groupe n'as pas été inséré."
                ];
            }

        } else {

            $response = [
                "code" => http_response_code(500),
                "message" => "ERREUR: Tout les champs doivent être remplis"
            ];
        }

        return (json_encode($response, JSON_PRETTY_PRINT));

    }


}


?>