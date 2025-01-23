<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../CSS/default.css">

    <title>Log-in</title>
</head>

<body>
    <header>
        <?php
        include(__DIR__ . "/../View/navbar_connexion.php")
            ?>
    </header>
    <main>
        <div>
            <h1>Bon retour parmi nous!</h1>
            <p>Veuillez saisir vos informations</p>
        </div>
        <div>
            <form action="./../Controller/UserController.php" method="POST">

                <div class="input-field">
                    <input type="text" name="email"id="email" required>
                    <label for="email">Email : </label>
                </div>

                <div class="input-field">
                    <input type="password" required>
                    <label for="">Mot de passe : </label>
                </div>

                <div class="submit">
                    <button type="submit" id="submit-button">Envoyer</button>
                </div>

            </form>

        </div>
    </main>



</body>

</html>