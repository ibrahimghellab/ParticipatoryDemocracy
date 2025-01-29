<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/insideProposition.css">
    <title><?php echo $_POST["titre"];

    ?></title>
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
            require_once(__DIR__ . "/../Controller/PropositionController.php");
            $tab = PropositionController::getReactionByProposition();
            print_r($tab);
            ?>
        </div>
        <div class="votes">
            <?php
            require_once(__DIR__ . "/../Controller/PropositionController.php");
            $tab = PropositionController::getVoteByProposition();
            print_r($tab);
            ?>

        </div>
        <div class="commentaires">
            <?php
            require_once(__DIR__ . "/../Controller/PropositionController.php");
            $tab = PropositionController::getCommentaireByProposition();
            print_r($tab);
            ?>
        </div>
        <!-- Champ de commentaire -->
        <div class="comment-section">
            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="CommentaireController">
                <input type="hidden" name="action" value="createCommentaire">
                <input type="hidden" name="idProposition" value="<?php echo $_POST["idProposition"]; ?>">
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

    </main>
</body>

</html>