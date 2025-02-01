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



    </div>
    <!-- Section Vote -->
    <div class="votes">
        <?php
        require_once(__DIR__ . "/../Controller/PropositionController.php");
        $tab = PropositionController::getVoteByProposition();

        echo '<form method="POST" action="./../Controller/routeur.php">';
        echo ' <input type="hidden" name="controleur" value="VoteController">';
        echo '<input type="hidden" name="action" value="afficherFormulaire">';
        echo '<input type="hidden" name="idProposition" value=" echo $_POST["idProposition"]; ">';


        if (empty($tab)) {
            echo '<button type="submit" class="vote-submit-button">Déclencher vote</button>';

        } else {
            print_r($tab);
        }
        echo ' </form>';
        echo '</div>';

        print_r($_POST);

        echo '<div class="voter">';
        echo ' <form method="POST" action="./../Controller/routeur.php">';
        echo '  <input type="hidden" name="controleur" value="MembreController">';
        echo '    <input type="hidden" name="action" value="vote">';
        echo '    <input type="hidden" name="idProposition" value="' . $_POST["idProposition"] . '">';
        echo ' <input type="hidden" name="idMembre" value="' . $_POST["idMembre"] . '">';
        echo ' <input type="hidden" name="idGroupe" value="' . $_POST["idGroupe"] . '">';
        echo ' <input type="hidden" name="idVote" value="' . $tab["idVote"] . '">';
        echo '<input type="hidden" name="titre" value="' . $_POST["titre"] . '">';
        echo '<input type="hidden" name="description" value="' . $_POST["description"] . '">';
        echo '<input type="hidden" name="dateCreation" value="' . $_POST["dateCreation"] . '">';
        echo '<input type="hidden" name="theme" value="' . $_POST["theme"] . '">';
        echo '<label for="oui">Oui</label>';
        echo ' <input type="radio" name="choix" value="Oui" id="oui">';
        echo '<label for="non">Non</label>';
        echo ' <input type="radio" name="choix" value="Non" id="non">';
        echo ' <button type="submit" class="vote-submit-button">Voter</button>';
        echo ' </form>';
        echo ' </div>';


        ?>

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