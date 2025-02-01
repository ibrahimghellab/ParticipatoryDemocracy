<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/createGroupe.css">
    <link rel="stylesheet" href="../CSS/default.css">
    <title>Créer un groupe</title>
</head>
<body>

    <header>
        <?php include(__DIR__ . "/../View/navbar_connecte.php"); ?>
    </header>

    <main>
        <div>
            <form method="POST" action="./../Controller/routeur.php" enctype="multipart/form-data">
                <input type="hidden" name="controleur" value="GroupeController">
                <input type="hidden" name="action" value="createGroupe">

                <div>
                    <label for="nom">Nom du groupe :</label>
                    <input type="text" name="nom" id="nom" required>
                </div>

                <div>
                    <label for="description">Description :</label>
                    <input type="text" name="description" id="description" required>
                </div>

                <div>
                    <label for="fileInput">Choisissez un fichier :</label>
                    <input type="file" id="fileInput" name="fileInput" required>
                </div>

                <div>
                    <label for="couleur">Choisissez une couleur :</label>
                    <input type="color" id="couleur" name="couleur" value="#000000" required>
                </div>

                <div class="submit">
                    <button type="submit" id="submit-button">Envoyer</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
