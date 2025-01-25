<?php
require_once("../Model/groupe.php");
class GroupeController
{

    public static function createGroupe()
    {
        Groupe::createGroupe();
        require_once(__DIR__ . "/../View/createGroupe.php");
    }




}
?>