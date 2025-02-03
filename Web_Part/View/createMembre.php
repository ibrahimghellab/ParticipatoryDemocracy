<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/createGroupe.css">
    <link rel="stylesheet" href="../CSS/default.css">
    <title>Ajouter un utilisateur</title>
</head>

<body>
    <header>
        <?php include(__DIR__ . "/../View/navbar_connecte.php"); ?>
    </header>
    <main>
        <div>
            <?php require_once(__DIR__ . "/../Controller/RoleController.php");
             ?>

            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="MembreController">
                <input type="hidden" name="action" value="sendMembreInvit">
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
                    <label for="titre">Email de la personne que vous souhaiter ajouter : </label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="role">Role : </label>
                    <select name="role" id="role" required>
                        <?php
                        $tab = RoleController::getAll();
                        foreach ($tab as $role) {
                            echo '<option value="' . htmlspecialchars($role["nomRole"]) . '">' . htmlspecialchars($role["nomRole"]) . '</option>';
                        }
                        ?>
                    </select>
                </div>


                <div class="submit">
                    <button type="submit" id="submit-button">Ajouter</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>