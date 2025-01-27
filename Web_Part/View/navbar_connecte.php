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

      <!-- </li> -->
      <li><a href="./signup.php">créer un compte</a></li>
      <!-- Menu déroulant -->
      <li class="menu">
        <div class="dropdown">
          <button class="btn">Dropdown</button>
          <div class="liste-pages">
            <a href="./../View/modifierDonnees.php">Mon profil</a>
            <a href="./../Controller/routeur.php?controleur=UserControlleur&action=disconnect">déconnexion</a>

          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>