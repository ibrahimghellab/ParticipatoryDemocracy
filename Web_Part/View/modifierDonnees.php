<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/modifierDonnees.css">
    <link rel="stylesheet" href="../CSS/default.css">


    <title>Log-in</title>
</head>

<body>
    <header>
        <?php
        session_start(); // Start the session
        include(__DIR__ . "/../View/navbar_connecte.php");
        include(__DIR__ . "/../Model/user.php");

        ?>
    </header>
    <main>
        <div>
            <h2>Vos informations personnelles :</h2>

            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="UserController">
                <input type="hidden" name="action" value="updateUser">
                <div>
                    <input type="text" name="nom" id="nom"
                        value="<?php echo User::getUserDataFromAPI($_SESSION["id"])["nom"] ?>">
                </div>

                <div>
                    <input type="text" name="prenom" id="prenom"
                        value="<?php echo User::getUserDataFromAPI($_SESSION["id"])["prenom"] ?>">
                </div>

                <div>
                    <input type="email" id="email" name="email"
                        value="<?php echo User::getUserDataFromAPI($_SESSION["id"])["email"] ?>">
                </div>

                <div>
                    <input type="text" id="adresse" name="adresse"
                        value="<?php echo User::getUserDataFromAPI($_SESSION["id"])["adresse"] ?>">
                </div>

                <div>
                    <input type="password" id="password" name="password" value="********">
                </div>

                <div class="submit">
                    <button type="submit" id="submit-button">Sauvegarder</button>
                </div>

            </form>
        </div>

    </main>



</body>

</html>