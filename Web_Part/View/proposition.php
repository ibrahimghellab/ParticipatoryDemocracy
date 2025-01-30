<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/groupe.css">
    <link rel="stylesheet" href="../CSS/proposition.css">

    <title>Propositions</title>
</head>

<body>
    <?php require_once(__DIR__ . "/../View/navbar_connecte.php"); ?>
    <main class="main-container">
        <!-- Liste des groupes à gauche -->
        <div class="groupes">
            <?php
            require_once(__DIR__ . "/../View/groupe.php");
            ?>
        </div>

        <div id="tableau">
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
                   
                    echo '<tr>';
                    echo '<td>' . $_POST['id'] . '</td>';
                    echo '<td>' . $_POST['nomGroupe'] . '</td>';
                    echo '<td><div style="width:20px;height:20px;background-color:' . $_POST['couleurGroupe'] . ';"></div></td>';
                    echo '<td>' . $_POST['imageGroupe'] . '</td>';
                    echo '<td>' . $_POST['dateCreation'] . '</td>';
                    echo '<td>' . $_POST['description'] . '</td>';
                    echo '</tr>';
              
                    ?>
                </tbody>
            </table>
            <?php require_once(__DIR__ . "/../Controller/GroupeController.php");

            require_once(__DIR__ . "/../Model/groupe.php");
            $tab = Groupe::getPropositionsByGroupe();
            print_r($tab);
            for ($i = 0; $i < count($tab); $i++) {
                echo "<div class='proposition'>";
                echo '<form method="POST" action="./../Controller/routeur.php" style="flex-grow: 1; display: flex; align-items: center;">';
                echo '<input type="hidden" name="idMembre" value="' . $tab[$i]["idMembre"] . '">';
                echo '<input type="hidden" name="idProposition" value="' . $tab[$i]["idProposition"] . '">';
                echo '<input type="hidden" name="titre" value="' . $tab[$i]["titre"] . '">';
                echo '<input type="hidden" name="description" value="' . $tab[$i]["description"] . '">';
                echo '<input type="hidden" name="dateCreation" value="' . $tab[$i]["dateCreation"] . '">';
                echo '<input type="hidden" name="theme" value="' . $tab[$i]["theme"] . '">';
                echo '<input type="hidden" name="controleur" value="PropositionController">';
                echo '<input type="hidden" name="action" value="afficherProposition">';
                echo '<button type="submit" class="proposition-button">';
                echo $i . "." . $tab[$i]["titre"];
                echo '</button>';
                echo '<span class="date-creation" style="margin-left: 750px;">' . $tab[$i]["dateCreation"] . '</span>';
                echo '</form>';
                echo '</div>';
            }
            ?>
           
        </div>
        <div>
            <?php
                require_once(__DIR__ . "/../Model/user.php");
                $user = User::getUserDataFromAPI($_SESSION["id"]);
                echo $user["nom"];

                print_r($user);
                for ($i = 0; $i < count($user); $i++) {
                    echo "<div class='user'>";
                    echo '<form method="POST" action="./../Controller/routeur.php" style="flex-grow: 1; display: flex; align-items: center;">';
                    echo '<input type="hidden" name="controleur" value="UserController">';
                    echo '<input type="hidden" name="action" value="deleteUser">';
                    echo '<button type="submit" class="delete-user">';
                    echo 'delte';
                    echo '</button>';
                    echo '</form>';
                    echo '</div>';
                }
                ?>
            

        </div>
    </main>
</body>

</html>