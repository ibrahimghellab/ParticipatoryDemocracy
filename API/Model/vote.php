<?php
class Vote
{
    public static function createVote()
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["idProposition"]) && isset($tab["typeScrutin"]) && isset($tab["dateFin"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("CALL createVote(:idProposition, :typeScrutin, :dateFin);");
            $requetePreparee->bindParam(":idProposition", $tab["idProposition"], PDO::PARAM_INT);
            $requetePreparee->bindParam(":typeScrutin", $tab["typeScrutin"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":dateFin", $tab["dateFin"], PDO::PARAM_STR);

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
}

?>