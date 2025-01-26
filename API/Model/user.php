<?php

class User
{

    private $idInternaute;
    private $nom;
    private $prenom;
    private $adresse;
    private $email;
    private $dateCreation;
    private $hash;
    private $salt;

    public function get($attribut)
    {
        return $this->$attribut;
    }
    public function set($attribut, $valeur)
    {
        $this->$attribut = $valeur;
    }

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

    public static function getGroupesByUser($id)
    {
        require_once(__DIR__ . "/../config/connexion.php");
        require_once(__DIR__ . "/../Model/user.php");
        $requeteAvecTags = "SELECT G.nomGroupe,imageGroupe,couleurGroupe,G.dateCreation,description" .
            " FROM Groupe G" .
            " INNER JOIN Membre M ON G.idGroupe=M.idGroupe" .
            " INNER JOIN Internaute I ON I.idInternaute=M.idInternaute" .
            " WHERE I.idInternaute=:id;";
        $requetePreparee = Connexion::pdo()->prepare($requeteAvecTags);
        $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);


        try {
            $requetePreparee->execute();
            $requetePreparee->setFetchmode(PDO::FETCH_CLASS, "Groupe");
            return $requetePreparee->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function createUser()
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["nom"]) && isset($tab["prenom"]) && isset($tab["adresse"]) && isset($tab["email"]) && isset($tab["password"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("CALL createInternaute(:nom,:prenom,:adresse,:email,:hash,:salt);");
            $requetePreparee->bindParam(":nom", $tab["nom"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":prenom", $tab["prenom"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":adresse", $tab["adresse"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":email", $tab["email"], PDO::PARAM_STR);
            $salt = bin2hex(random_bytes(16));
            $hash = hash("sha256", $tab["password"] . $salt);
            $requetePreparee->bindParam(":hash", $hash, PDO::PARAM_STR);
            $requetePreparee->bindParam(":salt", $salt, PDO::PARAM_STR);

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

    public static function updateUser($id)
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        $result = false;
        if (isset($tab["nom"]) && isset($tab["prenom"]) && isset($tab["adresse"]) && isset($tab["email"]) && isset($tab["password"])) {
            require_once(__DIR__ . "/../config/connexion.php");

            $requetePreparee = Connexion::pdo()->prepare("UPDATE Internaute SET nom=:nom, prenom=:prenom,adresse=:adresse,email=:email,hash=:hash,salt=:salt WHERE idInternaute=:id;");
            $requetePreparee->bindParam(":nom", $tab["nom"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":prenom", $tab["prenom"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":adresse", $tab["adresse"], PDO::PARAM_STR);
            $requetePreparee->bindParam(":email", $tab["email"], PDO::PARAM_STR);
            $salt = bin2hex(random_bytes(16));
            $hash = hash("sha256", $tab["password"] . $salt);
            $requetePreparee->bindParam(":hash", $hash, PDO::PARAM_STR);
            $requetePreparee->bindParam(":salt", $salt, PDO::PARAM_STR);
            $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);
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

    public static function deleteUser($id)
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        $result = false;

        require_once(__DIR__ . "/../config/connexion.php");

        $requetePreparee = Connexion::pdo()->prepare("DELETE FROM Internaute WHERE idInternaute=:id;");
        $requetePreparee->bindParam(":id", $id, PDO::PARAM_INT);
        try {
            $requetePreparee->execute();
            $result = true;
        } catch (PDOException $e) {
            http_response_code(500);
            return json_encode($response = [
                "code" => http_response_code(500),
                "message" => $e->getMessage()
            ], JSON_PRETTY_PRINT);
        }

        if ($result) {
            http_response_code(200);
            $response = [
                "code" => http_response_code(200),
                "message" => "User  supprimé."
            ];

        } else {
            http_response_code(500);
            $response = [
                "code" => http_response_code(500),
                "message" => "ERREUR: Le user n'as pas été supprimé."
            ];
        }



        return (json_encode($response, JSON_PRETTY_PRINT));

    }


    public static function checkUser()
    {
        $body = file_get_contents("php://input");
        $tab = json_decode($body, true);
        if (isset($tab["email"]) && isset($tab["password"])) {
            $requetePreparee = Connexion::pdo()->prepare("SELECT idInternaute FROM Internaute WHERE email=:email");
            $requetePreparee->bindParam(":email", $tab["email"], PDO::PARAM_STR);
            $requetePreparee->execute();
            if ($requetePreparee->rowCount() > 0) {
                $resultat = $requetePreparee->fetch(PDO::FETCH_ASSOC);
                $idInternaute = $resultat['idInternaute']; // Récupère l'ID dans une variable
            } else {
                // Gérer le cas où l'email n'existe pas
                throw new Exception("L'email n'est pas dans la base");
            }
            $u = static::getUserById($idInternaute);
            $salt = $u->get("salt");
            $hash = hash("sha256", $tab["password"] . $salt);

            if ($u->get("hash") == $hash) {
                return json_encode(array(
                    "id" => $idInternaute
                ));
            }
        }
        return json_encode(array(
            "id" => -1
        ));
    }

}


?>