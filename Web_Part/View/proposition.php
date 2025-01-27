<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/groupe.css">



    <title>Propositions</title>
</head>

<body>
    <header>
        <?php
        include(__DIR__ . "/../View/navbar_connecte.php")
            ?>
    </header>
    <main>
        <div class="groupes">
            <div>
                <form method="POST" action="./../Controller/routeur.php">
                    <input type="hidden" name="controleur" value="GroupeController">
                    <input type="hidden" name="action" value="createGroupe">

                    <div class="submit">
                        <button type="submit" id="submit-button">+ Nouveau Groupe</button>
                    </div>

                </form>

            </div>

        </div>

        <?php
        require_once(__DIR__ . "/../Controller/GroupeController.php");
        require_once(__DIR__ . "/../Model/groupe.php");
        echo "test";
        echo $_POST["id"];
        print_r(GroupeController::getPropositionsByGroupe($_POST["id"]));
        ?>


    </main>



</body>

</html>