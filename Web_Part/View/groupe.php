<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groupes</title>
    <link rel="stylesheet" href="./../CSS/groupe.css">
</head>
<header>
    <?php
    include(__DIR__ . "/../View/navbar_connecte.php");
    ?>
</header>

<body>
    <div class="container">
        <div class="groupes">
            <form method="POST" action="./../Controller/routeur.php">
                <input type="hidden" name="controleur" value="GroupeController">
                <input type="hidden" name="action" value="createGroupe">

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
                echo '<input type="hidden" name="controleur" value="GroupeController">';
                echo '<input type="hidden" name="action" value="getPropositionsByGroupe">';
                echo '<button type="submit" id="submit2">';
                echo '<div style="display:flex;align-items:center;width:100%;pointer-events:none;">' . $tab[$i]["nomGroupe"] . '<div style="border-radius:50%;width:20px;height:20px;background-color:' . $tab[$i]["couleurGroupe"] . ';margin-left:10px;"></div></div>';
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