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
      <li><a href="./../Controller/routeur.php?controleur=UserControlleur&action=disconnect">déconnexion</a></li>

      <!-- </li> -->
      <li><a href="./signup.php">créer un compte</a></li>
      <!-- Menu déroulant -->
      <li class="menu">
        <div class="dropdown">
          <button class="btn">Dropdown</button>
          <div class="liste-pages">
            <a href="./../View/modifierDonnees.php">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>