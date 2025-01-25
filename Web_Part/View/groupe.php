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
        <div class="groupe">
            <h1>Vos groupes :</h1>
        </div>
        <div>
    <?php 
    require_once(__DIR__ . "/../Controller/UserController.php");
    print_r(UserController::getGroupesByUserId($_SESSION["id"]));
    
    ?>
        </div>
    </main>



</body>

</html>