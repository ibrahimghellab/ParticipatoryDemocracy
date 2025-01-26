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
        include(__DIR__ . "/../View/navbar_connecte.php")
            ?>
    </header>
    <main>
        <div>
        <h2>Vos informations personnelles :</h2>

            <form method="POST">

                <div>
                    <input type="text" name="nom" id="nom" >
                </div>

                <div>
                    <input type="text" name="prenom" id="prenom" >
                </div>

                <div>
                    <input type="email" id="mail" name="mail" >
                </div>

                <div>
                    <input type="text" id="adresse" name="adresse">
                </div>

                <div class="submit">
                    <button type="submit" id="submit-button">Sauvegarder</button>
                </div>

            </form>
        </div>

    </main>



</body>

</html>