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
}
?>