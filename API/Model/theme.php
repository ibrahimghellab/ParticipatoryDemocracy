<?php
class Theme
{
    public static function getThemeById($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");

        $requeteAvecTags = "SELECT * FROM Theme WHERE idTheme= :id ;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);
        $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);
        try {
            $requetePreparee->execute();

            $requetePreparee->setFetchmode(PDO::FETCH_ASSOC);
            return $requetePreparee->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>