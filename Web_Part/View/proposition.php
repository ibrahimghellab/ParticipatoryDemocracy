<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/proposition.css">

    <title>Propositions</title>
</head>

<body class="page-proposition">
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
                    print_r($_POST);
                    echo '<tr>';
                    echo '<td>' . $_POST['id'] . '</td>';
                    echo '<td>' . $_POST['nomGroupe'] . '</td>';
                    echo '<td><div style="width:20px;height:20px;background-color:' . $_POST['couleurGroupe'] . ';"></div></td>';
                    echo '<td><img src="' . $_POST['imageGroupe'] . '" alt="Image du groupe" style="width:50px;height:50px;"></td>';                    echo '<td>' . $_POST['dateCreation'] . '</td>';
                    echo '<td>' . $_POST['description'] . '</td>';
                    echo '</tr>';

                    ?>
                </tbody>
            </table>

            <div class="colonne">
                <?php require_once(__DIR__ . "/../Controller/PropositionController.php");

                echo '<form method="POST" action="./../Controller/routeur.php">';
                echo '<input type="hidden" name="controleur" value="PropositionController">';
                echo '<input type="hidden" name="action" value="afficherFormulaire">';
                echo '<div class="submit">';
                echo '<button type="submit" id="new-proposition">+ Nouvelle Proposition</button>';
                echo '</div>';
                echo '</form>';
                require_once(__DIR__ . "/../Controller/GroupeController.php");

                echo '<h2>Propositions</h2>';

                require_once(__DIR__ . "/../Model/groupe.php");
                $tab = Groupe::getPropositionsByGroupe();
                print_r($tab);
                $users = Groupe::getMembresByGroupe();
                $idMembre = null;
                for ($i = 0; $i < count($users); $i++) {
                    if ($users[$i]["idInternaute"] == $_SESSION["id"]) {
                        $idMembre = $users[$i]["idMembre"];
                    }
                }
                for ($i = 0; $i < count($tab); $i++) {
                    echo "<div class='proposition'>";
                    echo '<form method="POST" action="./../Controller/routeur.php" style="flex-grow: 1; display: flex; align-items: center;">';
                    echo '<input type="hidden" name="idMembre" value="' . $idMembre . '">';
                    echo '<input type="hidden" name="idGroupe" value="' . $tab[$i]["idGroupe"] . '">';
                    echo '<input type="hidden" name="idProposition" value="' . $tab[$i]["idProposition"] . '">';
                    echo '<input type="hidden" name="titre" value="' . $tab[$i]["titre"] . '">';
                    echo '<input type="hidden" name="description" value="' . $tab[$i]["description"] . '">';
                    echo '<input type="hidden" name="dateCreation" value="' . $tab[$i]["dateCreation"] . '">';
                    echo '<input type="hidden" name="theme" value="' . $tab[$i]["theme"] . '">';
                    echo '<input type="hidden" name="controleur" value="PropositionController">';
                    echo '<input type="hidden" name="action" value="afficherProposition">';
                    echo '<button type="submit" class="proposition-button">';
                    echo '<div style="display:flex;align-items:center;width:100%;pointer-events:none;">' . $tab[$i]["titre"] . '<div style="border-radius:50%;width:20px;height:20px;background-color:' . $tab[$i]["theme"] . ';margin-left:10px;"></div></div>';
                    echo '</button>';
                    echo '<span class="date-creation" style="margin-left: 600px;">' . $tab[$i]["dateCreation"] . '</span>';
                    echo '</form>';
                    echo '</div>';
                }
                ?>


                <div>
                    <?php
                    echo '<h2>Membres du groupe</h2>';
                    require_once(__DIR__ . "/../Model/user.php");
                    $users = Groupe::getMembresByGroupe();
                    for ($i = 0; $i < count($users); $i++) {
                        echo "<div class='user'>";
                        echo '<form method="POST" action="./../Controller/routeur.php" style="flex-grow: 1; display: flex; align-items: center;">';
                        echo '<input type="hidden" name="controleur" value="MembreController">';
                        echo '<input type="hidden" name="action" value="deleteMembre">';
                        echo '<input type="hidden" name="idMembre" value="' . $users[$i]["idMembre"] . '">';
                        echo $users[$i]["nom"] . " " . $users[$i]["prenom"];
                        if ($users[$i]["idInternaute"] != $_SESSION["id"]) {
                            echo '<button type="submit" class="delete-user">';
                            echo 'delete';
                            echo '</button>';
                        } else {
                            echo '<button type="submit" class="delete-user">';
                            echo 'Quitter le groupe';
                            echo '</button>';
                        }
                        echo '</form>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </main>
</body>

</html>