<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/insideProposition.css">
    <title><?php echo $_POST["titre"]; ?></title>
</head>

<body>
    <?php require_once(__DIR__ . "/../View/navbar_connecte.php"); ?>
    <!-- Tableau à droite -->
    <div class="main">
        <div id="tableau">
            <table>
                <thead>
                    <tr>
                        <th>ID Proposition</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date de Création</th>
                        <th>Thème</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_POST["idProposition"]; ?></td>
                        <td><?php echo $_POST["titre"]; ?></td>
                        <td><?php echo $_POST["description"]; ?></td>
                        <td><?php echo $_POST["dateCreation"]; ?></td>
                        <td><?php echo $_POST["theme"]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="reactions">
            <?php
            echo "reaction : ";
            require_once(__DIR__ . "/../Controller/PropositionController.php");
            $tab = PropositionController::getReactionByProposition();
            print_r($tab);
            ?>
        </div>

        <!-- Section Vote -->
        <div class="votes">
            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="VoteController">
                <input type="hidden" name="action" value="submitVote">
                <input type="hidden" name="idProposition" value="<?php echo $_POST["idProposition"]; ?>">

                <div class="vote-options">
                    <label for="voteOui">
                        <input type="radio" id="voteOui" name="vote" value="oui">
                        Oui
                    </label>
                    <label for="voteNon">
                        <input type="radio" id="voteNon" name="vote" value="non">
                        Non
                    </label>
                </div>

                <button type="submit" class="vote-submit-button">Voter</button>
            </form>
        </div>

        <div class="commentaires-container">
            <div class="commentaires">
                <?php
                require_once(__DIR__ . "/../Controller/PropositionController.php");
                require_once(__DIR__ . "/../Controller/UserController.php");

                $tab = PropositionController::getCommentaireByProposition();

                // Affichage des commentaires
                for ($i = 0; $i < count($tab); $i++) {
                    $commentaire = $tab[$i]["texte"];
                    $id = $tab[$i]["idMembre"];

                    echo "<div class='commentaire-item'>" . $commentaire . " ." . $id . "</div>";
                }
                ?>
            </div>
        </div>

        <!-- Champ de commentaire -->
        <div class="comment-section">
            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="CommentaireController">
                <input type="hidden" name="action" value="createCommentaire">
                <input type="hidden" name="idProposition" value="<?php echo $_POST["idProposition"]; ?>">
                <input type="hidden" name="idGroupe" value="<?php echo $_POST["idGroupe"]; ?>">
                <input type="hidden" name="idMembre" value="<?php echo $_POST["idMembre"]; ?>">
                <input type="hidden" name="titre" value="<?php echo $_POST["titre"]; ?>">
                <input type="hidden" name="description" value="<?php echo $_POST["description"]; ?>">
                <input type="hidden" name="dateCreation" value="<?php echo $_POST["dateCreation"]; ?>">
                <input type="hidden" name="theme" value="<?php echo $_POST["theme"]; ?>">
                <input type="text" id="commentaire" name="texte" class="comment-input"
                    placeholder="Écrire un commentaire...">
                <button type="submit" class="comment-submit-button">Envoyer</button>
            </form>
        </div>
    </div>
</body>

</html>