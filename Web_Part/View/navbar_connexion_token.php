<nav>
  <div>
    <img src="../assets/logol-removebg-preview.png" alt="logo nav bar" />
  </div>
  <div class="nav-right">
    <ul>
      <?php
      echo '<li><a href="./loginToken.php?token=' . $_GET["token"] . '&idGroupe=' . $_GET["idGroupe"] . '&role=' . $_GET["role"] . '">se connecter</a></li>';
      echo '<li><a href="./signupToken.php?token=' . $_GET["token"] . '&idGroupe=' . $_GET["idGroupe"] . '&role=' . $_GET["role"] . '">créer un compte</a></li>';
      ?>
    </ul>
  </div>
</nav>