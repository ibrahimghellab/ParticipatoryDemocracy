<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/createGroupe.css">
    <link rel="stylesheet" href="../CSS/default.css">
    <title>Créer une demande</title>
</head>

<body>
    <header>
        <?php include(__DIR__ . "/../View/navbar_connecte.php"); ?>
    </header>
    <main>
        <div>
            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="PropositionController">
                <input type="hidden" name="action" value="createProposition">

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
                    <input type="text" name="theme" id="theme" required>
                </div>

    

                <div class="submit">
                    <button type="submit" id="submit-button">Créer</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
