<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/insideProposition.css">
    <title><?php echo $_POST["titre"]; ?></title>
</head>

<body>
    <?php require_once(__DIR__ . "/../View/navbar_connecte.php");
?>
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
        <?php
        require_once(__DIR__ . "/../Controller/PropositionController.php");
        $tab = PropositionController::getVoteByProposition();

        echo '<form method="POST" action="./../Controller/routeur.php">';
        echo ' <input type="hidden" name="controleur" value="VoteController">';
        echo '<input type="hidden" name="action" value="afficherFormulaire">';
        echo '    <input type="hidden" name="idProposition" value="' . $_POST["idProposition"] . '">';
        echo ' <input type="hidden" name="idMembre" value="' . $_POST["idMembre"] . '">';
        echo ' <input type="hidden" name="idGroupe" value="' . $_POST["idGroupe"] . '">';
        echo '<input type="hidden" name="titre" value="' . $_POST["titre"] . '">';
        echo '<input type="hidden" name="description" value="' . $_POST["description"] . '">';
        echo '<input type="hidden" name="dateCreation" value="' . $_POST["dateCreation"] . '">';
        echo '<input type="hidden" name="theme" value="' . $_POST["theme"] . '">';

        if (empty($tab)) {
            echo '<button type="submit" class="vote-submit-button">Déclencher vote</button>';
            echo ' </form>';
            echo '</div>';
        } else {
            echo ' </form>';
            echo '</div>';
            echo '<div class="voter">';
            echo ' <form method="POST" action="./../Controller/routeur.php">';
            echo '  <input type="hidden" name="controleur" value="MembreController">';
            echo '    <input type="hidden" name="action" value="vote">';
            echo ' <input type="hidden" name="idVote" value="' . $tab["idVote"] . '">';
            echo '    <input type="hidden" name="idProposition" value="' . $_POST["idProposition"] . '">';
            echo ' <input type="hidden" name="idMembre" value="' . $_POST["idMembre"] . '">';
            echo ' <input type="hidden" name="idGroupe" value="' . $_POST["idGroupe"] . '">';
            echo '<input type="hidden" name="titre" value="' . $_POST["titre"] . '">';
            echo '<input type="hidden" name="description" value="' . $_POST["description"] . '">';
            echo '<input type="hidden" name="dateCreation" value="' . $_POST["dateCreation"] . '">';
            echo '<input type="hidden" name="theme" value="' . $_POST["theme"] . '">';
            foreach (PropositionController::getChoixVoteByProposition() as $choix) {
                echo '<label for="' . $choix["possibiliteChoixVote"] . '">' . $choix["possibiliteChoixVote"] . '</label>';
                echo ' <input type="radio" name="choix" value="' . $choix["possibiliteChoixVote"] . '" id="' . $choix["possibiliteChoixVote"] . '">';
            }

            echo ' <button type="submit" class="vote-submit-button">Voter</button>';
            echo ' </form>';
            echo ' </div>';
        }

        ?>
        </div>;
</div>
<div class="Vote">
    <h3>Résultats du vote</h3>
    <?php 
    require_once(__DIR__ . "/../Controller/PropositionController.php");

    $stat = PropositionController::getStatVote();
    $choixVotes = []; // Tableau associatif pour stocker les résultats
    $totalVotes = 0; // Variable pour calculer le pourcentage

    if (!empty($stat) && is_array($stat)) {
        foreach ($stat as $vote) {
            $choix = $vote["choix"] ?? "Inconnu";
            $count = $vote["COUNT(*)"] ?? 0;
            $choixVotes[$choix] = $count;
            $totalVotes += $count;
        }
    }

    // Assurer que "oui" et "non" existent toujours
    $choixVotes += ["oui" => 0, "non" => 0];

    $totalVotes = array_sum($choixVotes); // Recalcul total votes

    foreach ($choixVotes as $choix => $count) {
        $pourcentage = ($totalVotes > 0) ? round(($count / $totalVotes) * 100) : 0;
    ?>
        <div class="vote-result">
            <p>Choix : <strong><?= htmlspecialchars($choix) ?></strong> / Nombre de vote(s) : <strong><?= htmlspecialchars($count) ?></strong></p>
            <div class="vote-bar">
                <div class="vote-progress" data-width="<?= $pourcentage ?>"></div>
            </div>
        </div>
    <?php } ?>
</div>


</div>




        </div>
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
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.vote-progress').forEach(function(bar) {
        let finalWidth = bar.getAttribute('data-width') + "%";
        bar.style.width = '0%'; // Initialise à 0%
        setTimeout(() => {
            bar.style.transition = "width 1.5s ease-out"; // Animation fluide
            bar.style.width = finalWidth; // Applique la largeur finale
        }, 100); // Petit délai pour forcer le reflow
    });
});
</script>
</html>