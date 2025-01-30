<?php
class Commentaire
{
    public static function createCommentaire($idM, $idP)
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["texte"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("INSERT INTO Commentaire(texte,dateCommentaire,status,idProposition,idMembre) VALUES(:txt,CURRENT_DATE(),'Approuvé',:idP,:idM);");
            $requetePreparee->bindParam(":txt", $tab["texte"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":idP", $idP, PDO::PARAM_INT);
            $requetePreparee->bindParam(":idM", $idM, PDO::PARAM_INT);

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

    public static function getReactionByCommentaire($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        require_once(__DIR__ . "/../Model/reaction.php");
        $requeteAvecTags = "SELECT emoticone,COUNT(*) AS nb FROM Reaction R INNER JOIN CommentaireReaction CR ON R.idReaction=CR.idReaction INNER JOIN Commentaire C ON CR.idCommentaire=C.idCommentaire WHERE C.idCommentaire=:id GROUP BY emoticone;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);
        $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            $requetePreparee->execute();
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Reaction");
            return $requetePreparee->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getCommentaireById($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        require_once(__DIR__ . "/../Model/membre.php");
        $requeteAvecTags = "SELECT * FROM Commentaire WHERE idCommentaire=:id;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);
        $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            $requetePreparee->execute();
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Membre");
            return $requetePreparee->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getSignalementsByCommentaire($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        require_once(__DIR__ . "/../Model/signaler.php");
        $requeteAvecTags = "SELECT * FROM Signaler S INNER JOIN Commentaire C ON S.idCommentaire=C.idCommentaire WHERE C.idCommentaire=:id;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);
        $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            $requetePreparee->execute();
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Signaler");
            return $requetePreparee->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function addReaction($idC, $idR)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        $requetePreparee = Connexion::pdo()->prepare("INSERT INTO CommentaireReaction(idCommentaire,idReaction) VALUES (:idC,:idR);");
        $requetePreparee->bindParam(":idC", $idC, PDO::PARAM_INT);
        $requetePreparee->bindParam(":idR", $idR, PDO::PARAM_INT);
        try {
            $requetePreparee->execute();
        } catch (PDOException $e) {
            header("HTTP/1.1 500 Internal Server Error");
            return json_encode(array("message" => "false"));
        }
        return json_encode(array("message" => "true"));

    }

}
?>