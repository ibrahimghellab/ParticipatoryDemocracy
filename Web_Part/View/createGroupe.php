<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/createGroupe.css">
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
            <form method="POST" action=>

                <div>
                <label for="nom">Nom du groupe : </label>
                <input type="text" name="nom" id="nom">
                </div>
                
                <div>
                <label for="description">Description : </label>
                <input type="text" name="description" id="description">
                </div>
                
                <div>
                <label for="fileInput">Choisissez un fichier :</label>
                <input type="file" id="fileInput" name="fileInput">
                </div>

                <div>
                <label for="color">Choisissez une couleur :</label>
                <input type="color" id="color" name="color" value="#000000">
                </div>

                <div class="submit">
                    <button type="submit" id="submit-button">Envoyer</button>
                </div>

            </form>
        </div>
       
    </main>



</body>

</html>