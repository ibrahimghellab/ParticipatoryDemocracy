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
        $requeteAvecTags = "SELECT I.idInternaute,M.idMembre,I.nom, I.prenom, R.nomRole,M.dateAdhesion, M.status" .
            " FROM Groupe G" .
            " INNER JOIN Membre M ON G.idGroupe=M.idGroupe" .
            " INNER JOIN Internaute I ON I.idInternaute=M.idInternaute" .
            " INNER JOIN Role R ON R.idRole=M.idRole" .
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
        $idGrp = null;
        if (isset($tab["nom"]) && isset($tab["image"]) && isset($tab["couleur"]) && isset($tab["description"]) && isset($tab["themes"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("SELECT createGroupe(" . $id . ",:nom,:img,:clr,:descr)");

            $requetePreparee->bindParam(":nom", $tab["nom"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":img", $tab["image"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":clr", $tab["couleur"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":descr", $tab["description"], PDO::PARAM_STR);
            try {
                $requetePreparee->execute();
                $idGrp = $requetePreparee->fetchColumn();
            } catch (PDOException $e) {
                echo $e->getMessage();
                http_response_code(500);
                return json_encode(array("message" => "false"), JSON_PRETTY_PRINT);
            }



            foreach ($tab["themes"] as $theme) {
                $requetePreparee = Connexion::pdo()->prepare("INSERT INTO Theme(nomTheme,budgetTheme,limiteBudgetTheme) VALUES (:nomTheme,0,0)");
                $requetePreparee->bindParam(":nomTheme", $theme, PDO::PARAM_STR);

                try {
                    $requetePreparee->execute();
                    $themeId = Connexion::pdo()->lastInsertId();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    http_response_code(500);
                    return json_encode(array("message" => "false"), JSON_PRETTY_PRINT);
                }


                $requeteTheme = Connexion::pdo()->prepare("INSERT INTO ThemeGroupe (idGroupe, idTheme) VALUES (:idGroupe, :idTheme)");
                $requeteTheme->bindParam(":idGroupe", $idGrp, PDO::PARAM_INT);
                $requeteTheme->bindParam(":idTheme", $themeId, PDO::PARAM_INT);
                try {
                    $requeteTheme->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    http_response_code(500);
                    return json_encode(array("message" => "false"), JSON_PRETTY_PRINT);
                }
            }

        } else {
            http_response_code(500);
            return json_encode(array("message" => "false"), JSON_PRETTY_PRINT);
        }

        return (json_encode(array("message" => "true"), JSON_PRETTY_PRINT));

    }

    public static function updateGroupe($id)
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        $result = false;
        if (isset($tab["nom"]) && isset($tab["image"]) && isset($tab["couleur"]) && isset($tab["description"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("UPDATE Groupe SET nomGroupe=:nom, imageGroupe=:img,couleurGroupe=:clr,description=:descr WHERE idGroupe=:id;");
            $requetePreparee->bindParam(":nom", $tab["nom"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":img", $tab["image"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":clr", $tab["couleur"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":descr", $tab["description"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);
            try {
                $requetePreparee->execute();
                $result = true;
            } catch (PDOException $e) {
                http_response_code(500);
                return json_encode($response = [
                    "code" => http_response_code(500),
                    "message" => $e->getMessage()
                ], JSON_PRETTY_PRINT);
            }

            if ($result) {
                http_response_code(200);
                $response = [
                    "code" => http_response_code(200),
                    "message" => "Groupe  modifié."
                ];

            } else {
                http_response_code(500);
                $response = [
                    "code" => http_response_code(500),
                    "message" => "ERREUR: Le groupe n'as pas été modifié."
                ];
            }

        } else {
            http_response_code(500);
            $response = [
                "code" => http_response_code(500),
                "message" => "ERREUR: Tout les champs doivent être remplis"
            ];
        }

        return (json_encode($response, JSON_PRETTY_PRINT));

    }

    public static function deleteGroupe($id)
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        $result = false;

        require_once(__DIR__ . "/../config/connexion.php");

        $requetePreparee = Connexion::pdo()->prepare("DELETE FROM Membre WHERE idGroupe=:idG1 ; DELETE FROM Groupe WHERE idGroupe=:idG2;");
        $requetePreparee->bindParam(":idG1", $id, PDO::PARAM_INT);
        $requetePreparee->bindParam(":idG2", $id, PDO::PARAM_INT);
        try {
            $requetePreparee->execute();
            $result = true;
        } catch (PDOException $e) {
            http_response_code(500);
            return json_encode($response = [
                "code" => http_response_code(500),
                "message" => $e->getMessage()
            ], JSON_PRETTY_PRINT);
        }

        if ($result) {
            http_response_code(200);
            $response = [
                "code" => http_response_code(200),
                "message" => "Groupe  supprimé."
            ];

        } else {
            http_response_code(500);
            $response = [
                "code" => http_response_code(500),
                "message" => "ERREUR: Le groupe n'as pas été supprimé."
            ];
        }



        return (json_encode($response, JSON_PRETTY_PRINT));

    }

    public static function getPropositionsByGroupe($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        require_once(__DIR__ . "/../Model/proposition.php");
        $requeteAvecTags = "SELECT * FROM Membre M INNER JOIN Proposition P ON P.idMembre = M.idMembre WHERE M.idGroupe = :idGroupe;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);
        $requetePreparee->bindParam(":idGroupe", $id, PDO::PARAM_INT);
        try {
            $requetePreparee->execute();
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Proposition");
            return $requetePreparee->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getThemesByGroupe($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        require_once(__DIR__ . "/../Model/theme.php");
        $requeteAvecTags = "SELECT * FROM Theme T INNER JOIN ThemeGroupe TG ON T.idTheme = TG.idTheme WHERE TG.idGroupe = :idGroupe;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);
        $requetePreparee->bindParam(":idGroupe", $id, PDO::PARAM_INT);
        try {
            $requetePreparee->execute();
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Theme");
            return $requetePreparee->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
?>