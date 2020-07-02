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
      <?php 
        if (isset($_SESSION["login"])){
          if($_SESSION["login"] == "admin" OR $_SESSION["login"] == "moderateur"){
          ?>
          <li><a href="topic.php">TOPICS</a></li>
          <li><a href="admin.php">PANEL BOARD</a></li>
          <?php 
          }
          else{
          ?>
          <li><a href="topic.php">TOPICS</a></li>
          <li><a href="profil.php">PROFIL</a></li>
     <?php
          }
     ?> 
      <li>
        <form  action="index.php" method="post">
          <input class="deco" name="deco" value="DECONNEXION" type="submit"/>
        </form>
      </li>
      <?php
        }else{
      ?>
      </ul>
      <section id="log">
        <a class="deco" href="connexion.php"> LOGIN &nbsp;<i class="far fa-user"></i></a></li>
      </section>
      <?php }?>
  </nav>
</header>