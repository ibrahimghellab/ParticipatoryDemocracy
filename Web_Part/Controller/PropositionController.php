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

    public static function afficherProposition()
    {
        require_once(__DIR__ . "/../View/inside_proposition.php");
    }

    public static function getInfoByProposition()
    {
        $tab = json_decode(Proposition::getInfoByProposition(), true);
        return $tab;
    }


    public static function getVoteByProposition()
    {
        $tab = Proposition::getVoteByProposition();
        return $tab;
    }

    public static function getReactionByProposition()
    {
        $tab = Proposition::getReactionByProposition();
        return $tab;
    }

    public static function getCommentaireByProposition()
    {
        $tab = Proposition::getCommentaireByProposition();
        return $tab;
    }



    // public static function createCommentaire()
    // {
    //     $idM = $_POST['id'];
    //     $idP = $_POST['idProposition'];
    //     $result = Proposition::createCommentaire($idM, $idP);
    //     if (is_array($result)) {
    //         if ($result["message"] == "true") {
    //             echo "reussi";
    //         } else {
    //             echo "echec";
    //         }
    //     } else {
    //         echo "Erreur : Le résultat n'est pas un tableau.";
    //     }
    // }
}
?>