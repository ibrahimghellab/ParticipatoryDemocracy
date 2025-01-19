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

    public static function createGroupe($id)
    {

        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["nom"]) && isset($tab["image"]) && isset($tab["couleur"]) && isset($tab["description"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $current_date = date("Y-m-d");
            echo $current_date;
            $requete = "INSERT INTO Groupe (nomGroupe,imageGroupe,couleurGroupe,dateCreation,description) VALUES (:nom, :image, :couleur, " . $current_date . ",:description) ;";
            $resultat = Connexion::pdo()->prepare($requete);
            $resultat->bindParam(":nom", $tab["nom"], PDO::PARAM_STR);
            $resultat->bindParam(":image", $tab["image"], PDO::PARAM_STR);
            $resultat->bindParam(":couleur", $tab["couleur"], PDO::PARAM_STR);
            $resultat->bindParam(":description", $tab["description"], PDO::PARAM_STR);
            $resultat->execute();


            $requeteTemp = "SELECT idGroupe FROM Groupe WHERE dateCreation=" . $current_date;
            $resultatTemp = Connexion::pdo()->query($requeteTemp);
            $value = $resultatTemp->fetch();
            $idGroupe = $value["idGroupe"];
            $lesResult = $resultat->fetchAll();

            $requete = "INSERT INTO Membre(dateAdhesion, status, idInternaute, idRole, idGroupe) VALUES (CURRENT_DATE,'Présent',:idInternaute,1,:idGroupe) ;";
            $result = Connexion::pdo()->prepare($requete);
            $resultat->bindParam(":idInternaute", $id, PDO::PARAM_INT);
            $resultat->bindParam(":idGroupe", $idGroupe, PDO::PARAM_INT);
            $resultat->execute();






            if ($resultat && $result) {
                $response = [
                    "message" => "Groupe avec id" . $tab["idGroupe"] . " inséré."
                ];
                http_response_code(200);
            } else {
                $response = [
                    "message" => "ERREUR: Le groupe avec id" . $tab["idGroupe"] . " n'as pas été inséré.",
                    http_response_code(500)
                ];
            }

        } else {
            $response = [
                "message" => "ERREUR: Tout les champs doivent être remplis",
                http_response_code(500)
            ];
        }

        return (json_encode($response, JSON_PRETTY_PRINT));

    }


}


?>