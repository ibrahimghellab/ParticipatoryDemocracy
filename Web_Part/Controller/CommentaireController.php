<?php
require_once("../Model/commentaire.php");
class CommentaireController
{

    public static function createCommentaire()
    {
        $tab = Commentaire::createCommentaire();
        if ($tab["message"] == "true") {

            require_once(__DIR__ . "/../View/inside_proposition.php");
        } else {
            // Afficher un message d'erreur
            require_once(__DIR__ . "/../View/inside_proposition.php");
        }

    }
}