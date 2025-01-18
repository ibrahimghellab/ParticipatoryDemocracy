<?php

class Groupe
{

    public static function getGroupeById($g)
    {
        echo $g;
        var_dump(Connexion::pdo());
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
            return json_encode($requetePreparee->fetch());

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}


?>