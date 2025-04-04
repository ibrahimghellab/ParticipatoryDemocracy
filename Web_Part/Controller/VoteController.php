<?php
require_once("../Model/vote.php");
class VoteController
{
    public static function createVote()
    {
        $tab = Vote::createVote();
        require_once(__DIR__ . "/../View/inside_proposition.php");
        return $tab;
    }

    public static function afficherFormulaire()
    {
        require_once(__DIR__ . "/../View/createVote.php");
    }

    public static function getChoixVote($id)
    {
        $tab = json_decode(Vote::getChoixVote($id), true);
        return $tab;
    }

    public static function validerVote()
    {
        $tab = json_decode(Vote::validerVote(), true);
        require_once(__DIR__ . "/../View/inside_proposition.php");
        return $tab;
    }
}
?>