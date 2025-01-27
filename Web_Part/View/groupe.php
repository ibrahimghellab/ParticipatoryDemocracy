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

            <?php
            require_once(__DIR__ . "/../Controller/UserController.php");
            if (!isset($_SESSION)) {
                session_start();
            }
            print_r($_SESSION);
            $tab = UserController::getGroupesByUserId($_SESSION["id"]);
            for ($i = 0; $i < count($tab); $i++) {

                echo '<form method="POST" action="./../Controller/routeur.php">';
                echo '<input type="hidden" name="id" value="' . $tab[$i]["idGroupe"] . '">';
                echo '<input type="hidden" name="controleur" value="GroupeController">';
                echo '<input type="hidden" name="action" value="getPropositionsByGroupe">';
                echo '<button type="submit" ><div class="groupe" style="display:grid;grid-template-columns:3fr 1fr;gap:10px;padding-left:20px">' . $tab[$i]["nomGroupe"] . '<div style="border-radius:50%;width:20px;height:20px;background-color:' . $tab[$i]["couleurGroupe"] . '"></div></div></button>';
                echo '</form>';


                echo '<div class="groupe" style="display:flex;align-items:center;justify-content:space-between;padding-left:20px">';
                echo '<div style="display:flex;align-items:center;">' . $tab[$i]["nomGroupe"] . '<div style="border-radius:50%;width:20px;height:20px;background-color:' . $tab[$i]["couleurGroupe"] . ';margin-left:10px;"></div></div>';
                echo '<form method="POST" action="./../Controller/routeur.php" style="margin:10;">';
                echo '<input type="hidden" name="id" value="' . $tab[$i]["idGroupe"] . '">';
                echo '<input type="hidden" name="controleur" value="GroupeController">';
                echo '<input type="hidden" name="action" value="deleteGroupe">';
                echo '<button type="submit" id="delete-button" style="background:none;border:none;"><img src="./../assets/poubelle.svg" alt="Supprimer Groupe" class="trash-icon" style="width:20px;height:20px;margin-right:10px;"></button>';
                echo '</form>';
                echo '</div>';
            }
            ?>

        </div>
        <div>

        </div>


    </main>



</body>

</html>