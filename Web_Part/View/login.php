<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Log-in</title>
</head>

<body>
    <header>
        <?php
        include("../View/navbar.html")
            ?>
    </header>
    <main>
        <div>
            <h1>Bon retour parmi nous!</h1>
            <p>Veuillez saisir vos informations</p>
        </div>
        <div>
            <form action="" method="POST">
                <label for="email">Email : </label>
                <input type="text" name="email" id="email">

                <label for="">Mot de passe : </label>
                <input type="password">
            </form>
        </div>
    </main>



</body>

</html>