<?php
class Proposition
{
    public static function getPropositionById($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        $requeteAvecTags = "";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);


        $requetePreparee->bindParam(":?", $id, PDO::PARAM_INT);

        try {
            $requetePreparee->execute($valeurs);
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Proposition");
            return $requetePreparee->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>