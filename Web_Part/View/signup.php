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
        include("../View/navbar.html")
            ?>
    </header>
    <main>
        <div>
            <h1>Bienvenue à vous!</h1>
            <p>Veuillez saisir vos informations</p>
        </div>
        <div class="form-group">
            <form action="" method="POST">
                <label for="nom">Nom : </label>
                <input type="text" name="nom" id="nom">

                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="prenom">

                <label for="email">Adresse : </label>
                <input type="text" name="adresse" id="adresse">

                <label for="email">Email : </label>
                <input type="text" name="email" id="email">

                <label for="">Mot de passe : </label>
                <input type="password">
                <div class="submit">
                    <button type="submit" id="submit-button">Envoyer</button>
                </div>
            </form>
        </div>
    </main>



</body>

</html>