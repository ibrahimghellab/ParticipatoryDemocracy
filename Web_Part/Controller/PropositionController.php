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

    public static function getAllByProposition()
    {
        print_r($_POST);
        $vote = Proposition::getVoteByProposition();
        $reaction = Proposition::getReactionByProposition();
        $commentaire = Proposition::getCommentaireByProposition();

        print_r($vote);
        print_r($reaction);
        print_r($commentaire);
    }
}
?>