<nav>
  <div>
    <img src="../assets/logo.png" alt="logo nav bar" style="width: 50px;
  height: 50px;margin : 10px" />
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