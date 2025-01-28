<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/groupe.css">



    <title>Propositions</title>
</head>

<body>
    <?php require_once(__DIR__ . "/../View/groupe.php"); ?>
    <main>

        <?php

        require_once(__DIR__ . "/../Controller/GroupeController.php");
        require_once(__DIR__ . "/../Model/groupe.php");
        $tab = Groupe::getPropositionsByGroupe();
        for ($i = 0; $i < count($tab); $i++) {


            echo "<div class='proposition'>";
            echo '<form method="POST" action="./../Controller/routeur.php" style="flex-grow: 1; display: flex; align-items: center;">';
            echo '<input type="hidden" name="idProposition" value="' . $tab[$i]["idProposition"] . '">';
            echo '<input type="hidden" name="titre" value="' . $tab[$i]["titre"] . '">';
            echo '<input type="hidden" name="description" value="' . $tab[$i]["description"] . '">';
            echo '<input type="hidden" name="dateCreation" value="' . $tab[$i]["dateCreation"] . '">';
            echo '<input type="hidden" name="theme" value="' . $tab[$i]["theme"] . '">';



            echo '<input type="hidden" name="controleur" value="PropositionController">';
            echo '<input type="hidden" name="action" value="getAllByProposition">';
            echo '<button type="submit" style="background:none;border:none;flex-grow: 1; text-align: left; padding: 0;">';
            echo '<div style="display:flex;align-items:center;width:100%;">' . $tab[$i]["titre"] . " " . $tab[$i]["description"] . " " . $tab[$i]["theme"] . " " . $tab[$i]["idVote"] . '</div>';
            echo '</button>';
            echo '</form>';
            echo '</div>';
            print_r($tab);
        }
        ?>


    </main>



</body>

</html>