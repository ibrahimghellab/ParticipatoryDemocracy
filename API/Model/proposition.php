<?php
class Proposition
{
    public static function getPropositionById($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        $requeteAvecTags = "SELECT * FROM Proposition WHERE idProposition=:id;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);

        $valeurs = array();
        if (strlen($id) > 0) {
            $valeurs["id"] = $id;
        } else {
            $valeurs["id"] = NULL;
        }

        try {
            $requetePreparee->execute($valeurs);
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Proposition");
            return $requetePreparee->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function createProposition()
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["titre"]) && isset($tab["description"]) && isset($tab["theme"]) && isset($tab["status"]) && isset($tab["idMembre"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $sql = "INSERT INTO Proposition(titre, description, dateCreation, theme, status, idMembre)"
            $sql += " VALUES (:titre, :description, CURRENT_DATE(), :theme:, :status, :idMembre);"

            $requetePreparee = Connexion::pdo()->prepare();
            $requetePreparee->bindParam(":titre", $tab["titre"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":description", $tab["description"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":theme", $tab["theme"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":status", $tab["status"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":idMembre", $tab["idMembre"], PDO::PARAM_INT);

            try {
                $requetePreparee->execute();
            } catch (PDOException $e) {
                header("HTTP/1.1 500 Internal Server Error");
                return json_encode(array("message" => "false"));
            }
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            return json_encode(array("message" => "false"));
        }

        return json_encode(array("message" => "true"));
    }

    public static function updateProposition($id)
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        $result = false;
        if (isset($tab["titre"]) && isset($tab["description"]) && isset($tab["theme"]) && isset($tab["status"]) && isset($tab["idVote"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("UPDATE Proposition SET titre=:titre, description=:description,theme=:theme,status=:status,idVote=:idVote WHERE idProposition=:id;");
            $requetePreparee->bindParam(":titre", $tab["titre"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":description", $tab["description"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":theme", $tab["theme"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":status", $tab["status"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":idVote", $tab["idVote"], PDO::PARAM_INT);
            $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);
            try {
                $requetePreparee->execute();
            } catch (PDOException $e) {
                header("HTTP/1.1 500 Internal Server Error");
                return json_encode(array("message" => "false"));
            }
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            return json_encode(array("message" => "false"));
        }

        return json_encode(array("message" => "true"));
    }

    public static function deleteProposition($id)
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        $result = false;

        require_once(__DIR__ . "/../config/connexion.php");

        $requetePreparee = Connexion::pdo()->prepare("DELETE FROM Proposition WHERE idProposition=:id;");
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
                "message" => "Proposition  supprimé."
            ];

        } else {
            http_response_code(500);
            $response = [
                "code" => http_response_code(500),
                "message" => "ERREUR: La Proposition n'as pas été supprimé."
            ];
        }



        return (json_encode($response, JSON_PRETTY_PRINT));

    }

}
?>