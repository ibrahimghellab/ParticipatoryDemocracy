<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/createGroupe.css">
    <title>Créer une demande</title>
</head>

<body>
    <header>
        <?php include(__DIR__ . "/../View/navbar_connecte.php"); ?>
    </header>
    <main>
        <div>
            <?php require_once(__DIR__ . "/../Controller/GroupeController.php");
            $tab = GroupeController::getThemesByGroupe(); ?>

            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="PropositionController">
                <input type="hidden" name="action" value="createProposition">
                <input type="hidden" name="idMembre" value="<?php echo $_POST['idMembre']; ?>">
                <?php
                echo '<input type="hidden" name="id" value="' . $_POST["id"] . '">';
                echo '<input type="hidden" name="nomGroupe" value="' . $_POST["nomGroupe"] . '">';
                echo '<input type="hidden" name="couleurGroupe" value="' . $_POST["couleurGroupe"] . '">';
                echo '<input type="hidden" name="imageGroupe" value="' . $_POST["imageGroupe"] . '">';
                echo '<input type="hidden" name="dateCreation" value="' . $_POST["dateCreation"] . '">';
                echo '<input type="hidden" name="description" value="' . $_POST["description"] . '">';
                ?>
                <div>
                    <label for="titre">Titre : </label>
                    <input type="text" name="titre" id="titre" required>
                </div>

                <div>
                    <label for="description">Description : </label>
                    <input type="text" name="description" id="description" required>
                </div>



                <div>
                    <label for="theme">Thème : </label>
                    <select name="idTheme" id="theme" required>
                        <?php
                        foreach ($tab as $theme) {
                            echo '<option value="' . htmlspecialchars($theme["idTheme"]) . '">' . htmlspecialchars($theme["nomTheme"]) . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="submit">
                    <button type="submit" id="submit-button">Créer</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>