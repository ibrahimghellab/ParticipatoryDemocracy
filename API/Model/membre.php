<?php
class Membre
{
    public static function createMembre()
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["email"]) && isset($tab["role"]) && isset($tab["idGroupe"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("INSERT INTO Membre(dateAdhesion, status, idInternaute, idRole, idGroupe) VALUES (CURRENT_DATE(), 'Actif', (SELECT idInternaute FROM Internaute WHERE email = :email), (SELECT idRole FROM Role WHERE nomRole = :role), :idGroupe);");
            $requetePreparee->bindParam(":email", $tab["email"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":role", $tab["role"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":idGroupe", $tab["idGroupe"], PDO::PARAM_INT);


            try {
                $requetePreparee->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                header("HTTP/1.1 500 Internal Server Error");
                return json_encode(array("message" => "false"));
            }
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            return json_encode(array("message" => "false"));
        }

        return json_encode(array("message" => "true"));
    }

    public static function deleteMembre($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");

        $requetePreparee = Connexion::pdo()->prepare(
            "DELETE FROM CommentaireReaction 
             WHERE idCommentaire IN (
                 SELECT idCommentaire 
                 FROM Commentaire 
                 WHERE idMembre = :idM1
             );
             
             DELETE FROM Commentaire 
             WHERE idMembre = :idM2;
             
             DELETE FROM Membre 
             WHERE idMembre = :idM3;"
        );
        $requetePreparee->bindParam(":idM1", $id, PDO::PARAM_INT);
        $requetePreparee->bindParam(":idM2", $id, PDO::PARAM_INT);
        $requetePreparee->bindParam(":idM3", $id, PDO::PARAM_INT);

        try {
            $requetePreparee->execute();
        } catch (PDOException $e) {
            header("HTTP/1.1 500 Internal Server Error");
            return json_encode(array("message" => "false"));
        }
        return json_encode(array("message" => "true"));
    }

    public static function vote($idM, $idV)
    {

        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["choix"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("INSERT INTO MembreVote(idMembre,idVote,choix) VALUES(:idMembre,:idVote ,:choix);");
            $requetePreparee->bindParam(":idMembre", $idM, PDO::PARAM_INT);
            $requetePreparee->bindParam(":idVote", $idV, PDO::PARAM_INT);
            $requetePreparee->bindParam(":choix", $tab["choix"], PDO::PARAM_STR);


            try {
                $requetePreparee->execute();
            } catch (PDOException $e) {
                header("HTTP/1.1 500 Internal Server Error");
                return json_encode(array("message" => "false"));
            }
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            echo "ici";
            return json_encode(array("message" => "false"));
        }

        return json_encode(array("message" => "true"));
    }

    public static function updateVote($idM, $idV)
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["choix"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("UPDATE MembreVote SET choix=:choix WHERE idMembre=:idMembre AND idVote=:idVote;");
            $requetePreparee->bindParam(":idMembre", $idM, PDO::PARAM_INT);
            $requetePreparee->bindParam(":idVote", $idV, PDO::PARAM_INT);
            $requetePreparee->bindParam(":choix", $tab["choix"], PDO::PARAM_STR);


            try {
                $requetePreparee->execute();
            } catch (PDOException $e) {
                header("HTTP/1.1 500 Internal Server Error");
                return json_encode(array("message" => "false"));
            }
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            echo "ici";
            return json_encode(array("message" => "false"));
        }

        return json_encode(array("message" => "true"));
    }
}
?>