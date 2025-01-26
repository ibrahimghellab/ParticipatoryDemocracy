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
                <a href="./../Controller/routeur.php?controleur=GroupeController&action=createGroupe">+ Nouveau Groupe
                </a>
            </div>

            <?php
            require_once(__DIR__ . "/../Controller/UserController.php");
            $tab = UserController::getGroupesByUserId($_SESSION["id"]);
            for ($i = 0; $i < sizeof($tab); $i++) {
                echo '<div class="groupe" style="display:grid;grid-template-columns:3fr 1fr;gap:10px;padding-left:20px">' . $tab[$i]["nomGroupe"] . '<div style="border-radius:50%;width:20px;height:20px;background-color:' . $tab[$i]["couleurGroupe"] . '"></div></div>';
            }
            print_r(UserController::getGroupesByUserId($_SESSION["id"]));
            ?>

        </div>

    </main>



</body>

</html>