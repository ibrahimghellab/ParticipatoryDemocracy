<?php
require_once("../Model/proposition.php");

class PropositionController
{
    public static function createProposition()
    {
        $tab = json_decode(Proposition::createProposition(), true);
        if ($tab["message"] == "true") {
            echo "reussi";
        } else {
            echo "echec";
        }
    }

    public static function getInfoByProposition()
    {
        $tab = json_decode(Proposition::getInfoByProposition(), true);
        return $tab;
    }

    public static function getAllByProposition()
    {
        print_r($_POST);
        $infos = Proposition::getInfoByProposition();
        $vote = Proposition::getVoteByProposition();
        $reaction = Proposition::getReactionByProposition();
        $commentaire = Proposition::getCommentaireByProposition();
        require_once(__DIR__ . "/../View/inside_proposition.php");
        print_r($infos);
        print_r($vote);
        print_r($reaction);
        print_r($commentaire);
    }
}
?>