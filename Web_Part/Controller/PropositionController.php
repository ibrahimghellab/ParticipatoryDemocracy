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
        $vote = json_decode(Proposition::getVoteByProposition(), true);
        $reaction = json_decode(Proposition::getReactionByProposition(), true);
        $commentaire = json_decode(Proposition::getCommentaireByProposition(), true);

        print_r($vote);
        print_r($reaction);
        print_r($commentaire);
    }
}
?>