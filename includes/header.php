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
      <a id="header-title" href="index.php">BANNED</a>
    </section>
    <ul id="nav__links">
      <li><a href="categorie.php">CATEGORIES</a></li>
      <li><a href="topic.php">TOPICS</a></li>

      <?php
        $db = mysqli_connect('localhost','root','','forum');

        $request = "SELECT U.id_droits FROM utilisateurs as U";
        $query = mysqli_query($db,$request);
        $value = mysqli_fetch_assoc($query);

        if (isset($_SESSION["login"])){
      ?>    
      <li><a href="profil.php">PROFIL</a></li>
      <?php 
        if ($value['id_droits']==2 && $value['id_droits']==3){
          echo "<li><a href='moderation.php'>MODERATION</a></li>";
        }
        elseif ($value['id_droits']==3){
          echo "<li><a href='admin.php'>ADMIN</a></li>";
        }
      ?>
      <li>
        <form  action="index.php" method="post">
          <input id="deco" name="deco" value="DECONNEXION" type="submit"/>
        </form>
      </li>

      <?php
        }
        else {
          echo "<li><a href='connexion.php'> LOGIN &nbsp;</a><i class='far fa-user'></i></li>";
        }
      ?>
      
    </ul>
  </nav>
</header>