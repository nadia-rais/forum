<?php session_start(); 
if (isset($_POST["deco"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>forum - homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/8nC21YQ/logo1-wow.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
      <?php include("includes/header.php")?>
    </header>
    <main> 
    <?php 
        $connect = mysqli_connect('localhost','root','','forum');

        if (isset($_SESSION["login"])){

          $request = "SELECT login, pseudo, avatar, statut FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
          $query = mysqli_query($connect, $request);
          $infos = mysqli_fetch_all($query);
        ?>
          <section id="infos">
            <section id="banner-connect">
              <h1>vous êtes actuellement connecté <?php echo $_SESSION['login']?></h1> 
            </section>
            <section id="mini-profile">
              <img id="minipic" src="<?=$infos[0][2]?>" alt="profilpic" width="100">
              <p>@ <?=$infos[0][1]?></p>
            </section>
          </section>
         
  
      <?php
        }else{
      ?>
      <section id="banner">
        <section id="principal">
            <h1> le forum de la communauté world of warcraft!</h1>
            <img src="https://i.ibb.co/T0XWW6V/logo2-wow.png" alt="logo2-wow">
            <a href="inscription.php">inscription</a>
        </section>
      </section>
      <?php 
        }
      ?> 

      <section id="topics">
        <section class="topics">
        <h2>TOPICS</h2>
        <hr>
          <section id="sub-topics">

            <section id="sub">
              <div class="topic-text">
                <h3>CATEGORIE</h3>
                <p>lorem ipsum dolor</p>
              </div>
              <div class="topic-text">
                <h3>CATEGORIE</h3>
                <p>lorem ipsum dolor</p>
              </div>
              <div class="topic-text">
                <h3>CATEGORIE</h3>
                <p>lorem ipsum dolor</p>
              </div>
              <div class="topic-text">
                <h3>CATEGORIE</h3>
                <p>lorem ipsum dolor</p>
              </div>
            </section>

            <section id="top-comment">
              <div id="top-comment-title">TOP-COMMENTS</div>
              <div>
                <p>boucle pour mettre les top comments avec le plus de like </P>
                <p>posté le ..... par </P>
              </div>
              <div>
                <p>posté le ..... par </P>
              </div>
              <div>
                <p>posté le ..... par </P>
              </div>
            </section>

          <section>

        </section>
      </section> 
    </main>
    <footer>
      <?php include("includes/footer.php")?>
    </footer>
</body>
</html>


