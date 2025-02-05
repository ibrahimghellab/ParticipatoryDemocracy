<?php
require_once(__DIR__ . "/../config/connexion.php");
require_once(__DIR__ . "/../Model/proposition.php");

Connexion::connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($url[1]) && is_numeric($url[1]) && empty($url[2])) {
        echo json_encode(Proposition::getPropositionById($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "reactions") {
        echo json_encode(Proposition::getReactionByProposition($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "commentaires") {
        echo json_encode(Proposition::getCommentaireByProposition($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "votes") {
        echo json_encode(Proposition::getVoteByProposition($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "infos") {
        echo json_encode(Proposition::getInfoByProposition($url[1]), JSON_PRETTY_PRINT);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "statVote") {
        echo json_encode(Proposition::getStatVote($url[1]), JSON_PRETTY_PRINT);

    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "choix") {
        echo json_encode(Proposition::getChoixVoteByProposition($url[1]), JSON_PRETTY_PRINT);
    } else {
        throw new Exception("Test ??");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($url[1])) {
        echo Proposition::createProposition();
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "reaction" && !empty($url[3]) && is_numeric($url[3])) {
        echo Proposition::addReaction($url[1], $url[3]);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    if (!empty($url[1]) && is_numeric($url[1]) && empty($url[2])) {
        echo Proposition::updateProposition($url[1]);
    } elseif (!empty($url[1]) && is_numeric($url[1]) && $url[2] == "valider") {
        echo Proposition::validerProposition($url[1]);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo Proposition::deleteProposition($url[1]);
}

?>