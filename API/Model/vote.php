<?php
class Vote
{
    public static function createVote()
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        $idVote = null;
        if (isset($tab["idProposition"]) && isset($tab["typeScrutin"]) && isset($tab["dateFin"]) && isset($tab["choixVote"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("SELECT createVote(:idProposition, :typeScrutin, :dateFin);");
            $requetePreparee->bindParam(":idProposition", $tab["idProposition"], PDO::PARAM_INT);
            $requetePreparee->bindParam(":typeScrutin", $tab["typeScrutin"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":dateFin", $tab["dateFin"], PDO::PARAM_STR);

            try {
                $requetePreparee->execute();
                $idVote = $requetePreparee->fetchColumn();
            } catch (PDOException $e) {
                header("HTTP/1.1 500 Internal Server Error");
                return json_encode(array("message" => "false"));
            }
            foreach ($tab["choixVote"] as $choix) {
                $requetePreparee = Connexion::pdo()->prepare("INSERT INTO ChoixVote(possibiliteChoixVote,idVote) VALUES (:possibiliteChoixVote,:idVote)");
                $requetePreparee->bindParam(":possibiliteChoixVote", $choix, PDO::PARAM_STR);
                $requetePreparee->bindParam(":idVote", $idVote, PDO::PARAM_INT);

                try {
                    $requetePreparee->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    http_response_code(500);
                    return json_encode(array("message" => "false"), JSON_PRETTY_PRINT);
                }
            }
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            return json_encode(array("message" => "false"));
        }

        return json_encode(array("message" => "true"));
    }
}

?>