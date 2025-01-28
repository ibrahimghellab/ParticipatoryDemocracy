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