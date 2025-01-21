<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/signup.css">
    <link rel="stylesheet" href="../CSS/default.css">
    <link rel="stylesheet" href="../CSS/signup.css">

    <title>Sign-up</title>
</head>

<body>
    <header>
        <?php
        include("./navbar_connexion.php")
            ?>
    </header>
    <main>
        <div>
            <h1>Bienvenue à vous!</h1>
            <p>Veuillez saisir vos informations</p>
        </div>
        <div class="form-group">
            <form action="./../Controller/UserController.php" method="POST">
                <label for="nom">Nom : </label>
                <input type="text" name="nom" id="nom" required>

                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="prenom" required>

                <label for="adresse">Adresse : </label>
                <input type="text" name="adresse" id="adresse" required>

                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required>

                <label for="password">Mot de passe : </label>
                <input type="password" name="password" id="password" required>

                <div class="submit">
                    <button type="submit" id="submit-button">Envoyer</button>
                </div>
            </form>
        </div>
    </main>



</body>

</html>