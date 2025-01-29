<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/insideProposition.css">
    <title><?php echo $_POST["titre"];

    ?></title>
</head>

<body>
    <?php require_once(__DIR__ . "/../View/navbar_connecte.php"); ?>
        <!-- Tableau à droite -->
         <div class="main">
        <div id="tableau">
            <table>
                <thead>
                    <tr>
                        <th>ID Proposition</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date de Création</th>
                        <th>Thème</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $_POST["idProposition"]; ?></td>
                        <td><?= $_POST["titre"]; ?></td>
                        <td><?= $_POST["description"]; ?></td>
                        <td><?= $_POST["dateCreation"]; ?></td>
                        <td><?= $_POST["theme"]; ?></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <!-- Champ de commentaire -->
            <div class="comment-section">
            <form method="POST" action="./../Controller/routeur.php">
            <input type="hidden" name="controleur" value="PropositionController">
            <input type="hidden" name="action" value="createCommentaire">
            <input type="text" id="commentaire" class="comment-input" placeholder="Écrire un commentaire...">
            <button type="submit" class="comment-submit-button">Envoyer</button>
            </form>
            </div>
</div>
       
    </main>
</body>

</html>