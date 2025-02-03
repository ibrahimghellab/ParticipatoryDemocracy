<?php
class Role
{
    public static function getAllRoles(){
        require_once(__DIR__ . "/../config/connexion.php");
        $requetePreparee = Connexion::pdo()->prepare("SELECT nomRole FROM Role;");
        $requetePreparee->execute();
        $result=$requetePreparee->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
}
?>