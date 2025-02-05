<?php
require_once("../Model/membre.php");
class MembreController
{
    public static function afficherFormulaire()
    {
        require_once(__DIR__ . "/../View/createMembre.php");
    }

    public static function createMembre()
    {
        $tab = Membre::createMembre();
        require_once(__DIR__ . "/../View/groupe.php");
        return $tab;
    }

    public static function sendMembreInvit()
    {
        Membre::sendMembreInvit();
    }

    public static function deleteMembre()
    {
        Membre::deleteMembre();
        require_once(__DIR__ . "/../View/groupe.php");
    }

    public static function vote()
    {
        $tab = Membre::vote();
        if ($tab["message"] == "true") {
            require_once(__DIR__ . "/../View/inside_proposition.php");
        } else {
            Membre::updateVote();
            require_once(__DIR__ . "/../View/inside_proposition.php");
        }
    }

    public static function getMembreById($id){
        $tab = Membre::getMembreById($id);
        return $tab;
    }
}