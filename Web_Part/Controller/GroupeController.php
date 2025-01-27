<?php
require_once("../Model/groupe.php");
class GroupeController
{

    public static function createGroupe()
    {
        Groupe::createGroupe();
        require_once(__DIR__ . "/../View/createGroupe.php");
    }


    public static function getPropositionsByGroupe($id)
    {
        $tab = Groupe::getPropositionsByGroupe($id);
        require_once(__DIR__ . "/../View/proposition.php");
    }

    public static function deleteGroupe()
    {
        Groupe::deleteGroupe();
        require_once(__DIR__ . "/../View/groupe.php");
    }

}
?>