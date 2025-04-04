<?php
require_once("../Model/proposition.php");

class PropositionController
{
    public static function createProposition()
    {
        $result = Proposition::createProposition();

        if ($result["message"] == "true") {
            require_once(__DIR__ . "/../View/proposition.php");

        } else {
            require_once(__DIR__ . "/../View/createProposition.php");
        }


    }

    public static function afficherFormulaire()
    {
        require_once(__DIR__ . "/../View/createProposition.php");
    }

    public static function afficherProposition()
    {
        require_once(__DIR__ . "/../View/inside_proposition.php");
    }

    public static function getInfoByProposition()
    {
        $tab = Proposition::getInfoByProposition();
        return $tab;
    }

    public static function getStatVote()
    {
        $tab = Proposition::getStatVote();
        ;
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

    public static function getChoixVoteByProposition()
    {
        $tab = Proposition::getChoixVoteByProposition();
        return $tab;
    }



    public static function validerProposition()
    {
        $tab = Proposition::validerProposition();
        require_once(__DIR__ . "/../View/inside_proposition.php");
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