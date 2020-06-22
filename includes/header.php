<?php 
if (isset($_POST["deco"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>

<header>
  <nav>
    <section id="top-logo">
      <img id="logo1" src="https://i.ibb.co/T0XWW6V/logo2-wow.png" alt="logo2-wow">
      <a id="header-title" href="index.php">THE WOW'S CLAN</a>
    </section>
    <ul id="nav__links">
      <li><a href="categorie.php">CATEGORIES</a></li>
      <li><a href="topic.php">TOPICS</a></li>

      <?php 
        if (isset($_SESSION["login"])):
      ?>    
      <li><a href="profil.php">PROFIL</a></li>
      <li><a href="profil.php">ESPACE ADMIN</a></li>
      <li>
        <form  action="index.php" method="post">
          <input id="deco" name="deco" value="DECONNEXION" type="submit"/>
        </form>
      </li>

      <?php
        else :
      ?>
      <li><a href="connexion.php"> LOGIN &nbsp;</a><i class="far fa-user"></i></li>
      <?php endif;?>
    </ul>
  </nav>
</header>