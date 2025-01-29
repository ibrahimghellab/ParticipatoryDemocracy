<head>
    <link rel="stylesheet" href="../CSS/navbar_connecte.css">
</head>

<nav>
    <div>
        <img src="../assets/logol-removebg-preview.png" alt="logo nav bar" />
    </div>
    <div class="nav-right">
        <ul>
            <!-- <li>
      <form method="POST" action="./../Controller/UserController.php">
      <button type="submit">déconnexion</button>
      </form> -->
            <li><a href="./../View/groupe.php">Mes groupes</a></li>


            <!-- Menu déroulant -->
            <li class="menu">
                <div class="dropdown">
                    <button class="btn menu-btn">menu</button>
                    <div class="liste-pages">
                        <a href="./../View/modifierDonnees.php">Mon profil</a>
                        <a href="./../View/login.php">déconnexion</a>

                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>