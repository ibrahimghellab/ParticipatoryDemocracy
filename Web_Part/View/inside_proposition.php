<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_POST["titre"];
    ?></title>
</head>

<body>
    <?php
    echo $_POST["idProposition"];
    echo $_POST["titre"];
    echo $_POST["description"];
    echo $_POST["dateCreation"];
    echo $_POST["theme"];
    ?>
</body>

</html>