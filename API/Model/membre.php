<?php
class Membre
{
    public static function createMembre()
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["idInternaute"]) && isset($tab["idRole"]) && isset($tab["idGroupe"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("INSERT INTO Membre(dateAdhesion,status,idInternaute,idRole,idGroupe) VALUES(CURRENT_DATE(),'Actif' ,:idInternaute,:idRole,:idGroupe);");
            $requetePreparee->bindParam(":idInternaute", $tab["idInternaute"], PDO::PARAM_INT);
            $requetePreparee->bindParam(":idRole", $tab["idRole"], PDO::PARAM_INT);
            $requetePreparee->bindParam(":idGroupe", $tab["idGroupe"], PDO::PARAM_INT);


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

    public static function deleteMembre($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");

        $requetePreparee = Connexion::pdo()->prepare("DELETE FROM Membre WHERE idMembre=:id;");
        $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);
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