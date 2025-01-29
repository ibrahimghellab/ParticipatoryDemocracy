<?php
require_once("../Model/commentaire.php");
class CommentaireController
{

    public static function createCommentaire()
    {
        $tab = Commentaire::createCommentaire();
        if ($tab["message"] == "true") {
            echo "reussi";
        } else {
            echo "echec";
        }
        require_once(__DIR__ . "/../View/inside_proposition.php");
    }
}