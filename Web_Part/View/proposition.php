<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propositions</title>
    <link rel="stylesheet" href="../CSS/groupe.css">
</head>
<header>
    <?php
    include(__DIR__ . "/../View/navbar_connecte.php");
    ?>
</header>
<body>
<<<<<<< HEAD
    <div class="container">
        <div class="groupes">
            <?php
            require_once(__DIR__ . "/../Controller/UserController.php");
            if (!isset($_SESSION)) {
                session_start();
            }
            $tab = UserController::getGroupesByUserId($_SESSION["id"]);
            for ($i = 0; $i < count($tab); $i++) {
                echo '<div class="groupe">';
                echo '<form method="POST" action="./../View/proposition.php" style="flex-grow: 1; display: flex; align-items: center;">';
                echo '<input type="hidden" name="id" value="' . $tab[$i]["idGroupe"] . '">';
                echo '<input type="hidden" name="controleur" value="GroupeController">';
                echo '<input type="hidden" name="action" value="getPropositionsByGroupe">';
                echo '<button type="submit" style="background:none;border:none;flex-grow: 1; text-align: left; padding: 0;">';
                echo '<div style="display:flex;align-items:center;width:100%;">' . $tab[$i]["titre"] . " " . $tab[$i]["description"] . " " . $tab[$i]["theme"] . " " . $tab[$i]["idVote"] . '</div>';
                echo '</button>';
                echo '</form>';
                echo '</div>';
                print_r($tab);
            }
            ?>
        </div>
=======
    <?php require_once(__DIR__ . "/../View/groupe.php"); ?>
    <main>

        <?php

        require_once(__DIR__ . "/../Controller/GroupeController.php");
        require_once(__DIR__ . "/../Model/groupe.php");
        $tab = Groupe::getPropositionsByGroupe();
        for ($i = 0; $i < count($tab); $i++) {

            print_r($tab);
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


>>>>>>> edc734f7d6da942944e960a4bc26c2bfd94d55f9

        <div class="group-details">
            <table>
                <thead>
                    <tr>
                        <th>Numéro du groupe</th>
                        <th>Nom du groupe</th>
                        <th>Couleur du groupe</th>
                        <th>Nom de l'image</th>
                        <th>Date de création</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['id']) && isset($_POST['controleur']) && $_POST['controleur'] == 'GroupeController' && $_POST['action'] == 'getPropositionsByGroupe') {
                        $groupId = $_POST['id'];
                        $groupDetails = null;
                        foreach ($tab as $group) {
                            if ($group['idGroupe'] == $groupId) {
                                $groupDetails = $group;
                                break;
                            }
                        }
                        if ($groupDetails) {
                            echo '<tr>';
                            echo '<td>' . $groupDetails['idGroupe'] . '</td>';
                            echo '<td>' . $groupDetails['nomGroupe'] . '</td>';
                            echo '<td><div style="width:20px;height:20px;background-color:' . $groupDetails['couleurGroupe'] . ';"></div></td>';
                            echo '<td>' . $groupDetails['imageGroupe'] . '</td>';
                            echo '<td>' . $groupDetails['dateCreation'] . '</td>';
                            echo '<td>' . $groupDetails['description'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>