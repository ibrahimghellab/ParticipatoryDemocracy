<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/createGroupe.css">
    <link rel="stylesheet" href="../CSS/default.css">


    <title>Créer vote</title>
</head>

<body>
    <header>
        <?php
        include(__DIR__ . "/../View/navbar_connecte.php")
            ?>
    </header>
    <main>
        <div>
            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="GroupeController">
                <input type="hidden" name="action" value="createVote">
                <div>
                    <label for="typeScrutin">Type de scrutin : </label>
                    <input type="text" name="typeScrutin" id="typeScrutin" required>
                </div>
                <div>
                    <label for="dateFin">Type de scrutin : </label>
                    <input type="date" name="dateFin" id="dateFin" required>
                </div>

                <div class="submit">
                    <button type="submit" id="submit-button">Déclencher vote</button>
                </div>

            </form>
        </div>

    </main>



</body>

</html>