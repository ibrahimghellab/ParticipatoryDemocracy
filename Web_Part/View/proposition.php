<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/groupe.css">



    <title>Propositions</title>
</head>

<body>

    <main>

        <?php
        require_once(__DIR__ . "/../View/groupe.php");
        require_once(__DIR__ . "/../Controller/GroupeController.php");
        require_once(__DIR__ . "/../Model/groupe.php");
        echo "test";
        $tab = Groupe::getPropositionsByGroupe();
        print_r($tab);

        ?>


    </main>



</body>

</html>