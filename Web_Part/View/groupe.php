<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groupes</title>

<?php

    if(basename(__FILE__) === "groupe.php") {
      require_once(__DIR__ . "/../View/navbar_connecte.php");
       echo '<link rel="stylesheet" href="./../CSS/groupe.css">';
    }        

    
    ?>

</head>


<body class="page-groupe">
    <main>
        <div class="container">
            <div class="groupes">
                <form method="POST" action="./../Controller/routeur.php">
                    <input type="hidden" name="controleur" value="GroupeController">
                    <input type="hidden" name="action" value="afficherFormulaire">

                    <div class="submit">
                        <button type="submit" id="new-groupe">+ Nouveau Groupe</button>
                    </div>
                </form>


                <?php
                require_once(__DIR__ . "/../Controller/UserController.php");
                if (!isset($_SESSION)) {
                    session_start();
                }
                $tab = UserController::getGroupesByUserId($_SESSION["id"]);
                for ($i = 0; $i < count($tab); $i++) {
                    echo '<div class="groupe">';
                    echo '<form method="POST" action="./../Controller/routeur.php" style="flex-grow: 1; display: flex; align-items: center;">';
                    echo '<input type="hidden" name="id" value="' . $tab[$i]["idGroupe"] . '">';
                    echo '<input type="hidden" name="nomGroupe" value="' . $tab[$i]["nomGroupe"] . '">';
                
                    echo '<input type="hidden" name="couleurGroupe" value="' . $tab[$i]["couleurGroupe"] . '">';
                    echo '<input type="hidden" name="imageGroupe" value="' . $tab[$i]["imageGroupe"] . '">';
                    echo '<input type="hidden" name="dateCreation" value="' . $tab[$i]["dateCreation"] . '">';
                    echo '<input type="hidden" name="description" value="' . $tab[$i]["description"] . '">';

                    echo '<input type="hidden" name="controleur" value="GroupeController">';
                    echo '<input type="hidden" name="action" value="getPropositionsByGroupe">';
                    echo '<button type="submit" id="submit2">';
                    echo '<div style="display:flex;align-items:center;width:100%;pointer-events:none;">' . $tab[$i]["nomGroupe"] . '<div style="border-radius:50%;width:20px;height:20px;background-color:' . $tab[$i]["couleurGroupe"] .';margin-left:10px;"><img src="'. $tab[$i]["imageGroupe"]. '"></div></div>';
                    
                    echo '</button>';
                    echo '</form>';
                    echo '<form method="POST" action="./../Controller/routeur.php" style="margin:0;">';
                    echo '<input type="hidden" name="id" value="' . $tab[$i]["idGroupe"] . '">';
                    echo '<input type="hidden" name="controleur" value="GroupeController">';
                    echo '<input type="hidden" name="action" value="deleteGroupe">';
                    echo '<button type="submit" id="delete-button" style="background:none;border:none;"><img src="./../assets/poubelle.svg" alt="Supprimer Groupe" class="trash-icon" style="width:20px;height:20px;margin-right:10px;"></button>';
                    echo '</form>';
                    echo '</div>';
                    
                    
                }
                ?>
            </div>

        </div>
    </main>
</body>

</html>