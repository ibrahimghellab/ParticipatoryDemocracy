<?php
require_once("../Model/proposition.php");

class PropositionController
{
    public static function createProposition()
    {
        // Assuming Proposition::createProposition() returns an array
        $result = Proposition::createProposition();
        
        // No need to decode if it's already an array
        if (is_array($result)) {
            if ($result["message"] == "true") {
                echo "reussi";
            } else {
                echo "echec";
            }
        } else {
            echo "Erreur : Le résultat n'est pas un tableau.";
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