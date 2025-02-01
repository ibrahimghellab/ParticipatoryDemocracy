<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groupes</title>

    <?php
    if (basename(__FILE__) === "groupe.php") {
        require_once(__DIR__ . "/../View/navbar_connecte.php");
        echo '<link rel="stylesheet" href="./../CSS/groupe.css">';
    }
    ?>

</head>

<body class="page-groupe">
    <main>
        <div class="container">
            <div class="groupes">
                
                <!-- Bouton pour ajouter un nouveau groupe -->
                <div class="submit">
                    <form method="POST" action="./../Controller/routeur.php">
                        <input type="hidden" name="controleur" value="GroupeController">
                        <input type="hidden" name="action" value="afficherFormulaire">
                        <button type="submit" id="new-groupe">+ Nouveau Groupe</button>
                    </form>
                </div>

                <!-- Conteneur pour afficher les groupes en grille -->
                <div class="groupes-container">
                    <?php
                    require_once(__DIR__ . "/../Controller/UserController.php");
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    $tab = UserController::getGroupesByUserId($_SESSION["id"]);

                    foreach ($tab as $groupe) {
                        echo '<div class="groupe">';
                        
                        // Image du groupe
                        echo '<div class="img">';
                        echo '<img src="../' . ltrim($groupe["imageGroupe"], "/") . '" alt="Image du groupe" class="groupe-image">';
                        echo '</div>';

                        // Formulaire pour afficher les propositions du groupe
                        echo '<form method="POST" action="./../Controller/routeur.php" class="form-groupe-button">';
                        echo '<input type="hidden" name="id" value="' . $groupe["idGroupe"] . '">';
                        echo '<input type="hidden" name="nomGroupe" value="' . $groupe["nomGroupe"] . '">';
                        echo '<input type="hidden" name="couleurGroupe" value="' . $groupe["couleurGroupe"] . '">';
                        echo '<input type="hidden" name="imageGroupe" value="' . $groupe["imageGroupe"] . '">';
                        echo '<input type="hidden" name="dateCreation" value="' . $groupe["dateCreation"] . '">';
                        echo '<input type="hidden" name="description" value="' . $groupe["description"] . '">';
                        echo '<input type="hidden" name="controleur" value="GroupeController">';
                        echo '<input type="hidden" name="action" value="getPropositionsByGroupe">';
                        echo '<button type="submit" id="submit2">';
                        echo '<div style="display:flex;align-items:center;width:100%;pointer-events:none;">' . $groupe["nomGroupe"] . 
                             '<div style="border-radius:50%;width:20px;height:20px;background-color:' . $groupe["couleurGroupe"] . '; margin-left: 10px;"></div></div>';
                        echo '</button>';
                        echo '</form>';

                        // Bouton pour supprimer le groupe
                        echo '<form method="POST" action="./../Controller/routeur.php" class="delete-form">';
                        echo '<input type="hidden" name="id" value="' . $groupe["idGroupe"] . '">';
                        echo '<input type="hidden" name="controleur" value="GroupeController">';
                        echo '<input type="hidden" name="action" value="deleteGroupe">';
                        echo '<button type="submit" id="delete-button"><img src="./../assets/poubelle.svg" alt="Supprimer Groupe" class="trash-icon"></button>';
                        echo '</form>';

                        echo '</div>'; // Fin .groupe
                    }
                    ?>
                </div> <!-- Fin .groupes-container -->
            </div>
        </div>
    </main>
</body>

</html>