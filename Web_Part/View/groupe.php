<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/groupe.css">



    <title>Groupe</title>
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
            <form method="POST" action="./../View/proposition.php">';
                <input type="hidden" name="controleur" value="UserController">';
                <input type="hidden" name="action" value="afficherProposition">';
                <?php
                require_once(__DIR__ . "/../Controller/UserController.php");
                $tab = UserController::getGroupesByUserId($_SESSION["id"]);
                print_r($tab);
                for ($i = 0; $i < count($tab); $i++) {
                    echo '<div class="submit">';
                    echo '<input type="hidden" name="id" value="' . $tab[$i]["idGroupe"] . '">';
                    echo '<button type="submit" id="submit-button2">' . $tab[$i]["nomGroupe"] . '<div
                        style="border-radius:50%;width:20px;height:20px;background-color:"' . $tab[$i]["couleurGroupe"]
                        . "'></div>
                </button>";

                } ?>
            </form>
        </div>
        <div>

        </div>


    </main>



</body>

</html>