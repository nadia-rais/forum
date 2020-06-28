<?php
session_start();
$connect = mysqli_connect('localhost','root','','forum');

if (isset($_SESSION["login"])){
  
  $request = "SELECT * FROM utilisateurs WHERE utilisateurs.id = '$_GET[id]'";
  $query = mysqli_query($connect, $request);
  $members = mysqli_fetch_all($query);

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>forum - profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/8nC21YQ/logo1-wow.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
       <?php include("includes/header.php"); ?>
    </header>
    <main>
      <section id="profile-content1">
      <?php
   
       echo '<h1 id="title-profile">  HELLO @ ' .$_SESSION['login'].' voici le profil de @' .$members[0][1]. '</h1><hr>'; 
   
        ?>
         <div class="profile-card">
          <div class="top-section">
            <div class="pic">
              <img src="<?=$members [0][6]?>" alt="profilpic" width="100">
            </div>
            <div class="name"></div>
            <div class="tag"><p>@<?=$members [0][1]?></p></div>
          </div>
          <div class="bottom-section">
            <div class="social-media">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-discord"></i></a>
              <a href="#"><i class="fab fa-twitch"></i></a>
            </div>
            <div>echo nb<span>messages postés</span></div>
            <div class="border"></div>
            <div class="views"><?=$members [0][7]?><span>niveau</span></div>      
            <div class="border"></div>
            <p id="date">inscrit depuis le <?=$members[0][8]?></p>
          
          </div>
        </div>
        </section>  
        <?php
        if($_SESSION["login"] == "admin"){
        ?>
        <section id="modification1">

          <h1>modifier l'accès</h1>
            <form id="formmodif2"method="POST" action="">
            <select name="droits" id="select">
              <option value="">--sélectionner les droits--</option>
              <option value="1">user</option>
              <option value="2">moderateur</option>
              <option value="3">admin</option>
            </select>
              <input type="submit" name="submit" value="valider">
            </form> 

          <h1>supprimer le compte</h1>
          <form id="formmodif1"method="POST" action="">
              <input type="submit" name="submit1" value="supprimer le compte">
          </form> 
        </section>
        <?php
         }
         if(isset ($_POST['submit1'])){

          $requete2 = "DELETE FROM utilisateurs WHERE utilisateurs.id = '$_GET[id]'";
          $query2 = mysqli_query($connect, $requete2);

          header("location:admin.php");
         }
         if(isset ($_POST['submit'])){
          
          $value= $_POST['droits'];

          $request2 = "UPDATE `utilisateurs` SET `id_droits`='$value' WHERE utilisateurs.id = '$_GET[id]'";
          $droits = mysqli_query($connect, $request2);

          header("location:admin.php");
         }
        ?>  
  </main>
  <footer>
    <?php include("includes/footer.php"); ?>
  </footer>
</body>
</html>