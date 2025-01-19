<?php

class User
{

    public static function getUserById($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        $requeteAvecTags = "SELECT * FROM Internaute WHERE idInternaute=:id;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);


        $valeurs = array();
        if (strlen($id) > 0) {
            $valeurs["id"] = $id;
        } else {
            $valeurs["id"] = NULL;
        }

        try {
            $requetePreparee->execute($valeurs);
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "User");
            return $requetePreparee->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function getAll()
    {
        require_once(__DIR__ . "/../config/connexion.php");
        $requete = "SELECT * FROM Internaute;";

        $resultat = Connexion::pdo()->query($requete);
        $resultat->setFetchmode(PDO::FETCH_CLASS, "User");
        return $resultat->fetchAll();

    }
}


?>