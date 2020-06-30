<?php
session_start();
$connect = mysqli_connect('localhost','root','','forum');

?>

<!DOCTYPE html>
<html>
<head>
    <title>forum - profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/8nC21YQ/logo1-wow.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
       <?php include("includes/header.php"); ?>
    </header>
    <main>
      <section id="profile-content">

        <section id="modification">
          <h1>complète ton profil ou modifie tes infos de connexion</h1>
          <form id="formpic" method="POST">
            <label> adresse url de l'image </label>
            <input type="text" id="avatar" name="linkimg" accept="image/png, image/jpeg">
            <input type="submit" name="submit1" value="Upload">
          </form>
    
          <form id="formfiles" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="fileUpload">ou sélectionner votre fichier:</label>
            <div id="inputfiles">
            <input type="file" name="photo" id="fileUpload">
            <input type="submit" name="submit" value="Upload">
            </div>
            <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
          </form>

          <form id="formmodif"method="POST" action="profil.php">
            <div class="modif">
              <label for="login">nouveau pseudo</label><br>
              <input id="login-profil" type="text" value="nouveau pseudo" name="pseudo">
              <input id="button-modif" type="submit" name="submit2" value="modifier">
            </div>
            <div class="modif">
              <label for="login">nouveau login</label><br>
              <input id="login-profil" type="text" value="nouveau login" name="login">
              <input id="button-modif" type="submit" name="submit3" value="modifier">
            </div>
            <div class="modif">
              <label class="labpass" for="password">nouveau password</label><br>
              <input id="login-password" type="password" value="nouveau password" name="password">
              <label class="labpass" for="passwordrepeat">confirmer password</label>
              <input type="password" name="passwordrepeat">
              <input id="button-modif" type="submit" name="submit4" value="modifier">
            </div>
          </form> 
        </section>
     

        <?php
        if (isset($_SESSION["login"])){

          $request = "SELECT login, pseudo, avatar, DATE_FORMAT (date, '%d/%m/%Y') FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
          $query = mysqli_query($connect, $request);
          $infos = mysqli_fetch_all($query);
        
          /*$request3 = "SELECT COUNT(*) FROM message WHERE id_utilisateur = ... ";
          $query3 = mysqli_query($connect, $request3);
          $countmessages = mysqli_fetch_all($query3, MYSQLI_ASSOC);*/
        }

         if(isset ($_POST['submit1'])){

          $link = $_POST['linkimg'];
          
          $request2 = "UPDATE `utilisateurs` SET `avatar`='$link' WHERE login = '$_SESSION[login]'";
          $result2 = mysqli_query($connect, $request2);

          header("location:profil.php");
        }

         //update pseudo
         if(isset($_POST['submit2']) && (!empty($_POST['pseudo']))){

          $pseudo = ($_POST['pseudo']);
  
          $request3 = "UPDATE `utilisateurs` SET `pseudo`='$pseudo' WHERE login = '$_SESSION[login]'";
          $result3 = mysqli_query($connect, $request3);
  
          header("location:connexion.php");
        }

        
        //update login
        if(isset($_POST['submit3']) && (!empty($_POST['login']))){

          $login = ($_POST['login']);
  
          $request4 = "UPDATE `utilisateurs` SET `login`='$login' WHERE login = '$_SESSION[login]'";
          $result4 = mysqli_query($connect, $request4);
  
          header("location:connexion.php");
        }

        //update password
        if(isset($_POST['submit4'])){

          $password = ($_POST['password']);
          $password_repeat = ($_POST['passwordrepeat']);

            if ($password == $password_repeat) {

              $request5 = "UPDATE `utilisateurs` SET `password`='$password' WHERE login = '$_SESSION[login]'";
              $result5 = mysqli_query($connect, $request5);

            header('location:connexion.php'); }
        
            else echo '<p class="error-connect">Les mots de passe doivent être identiques</p>';
            
        }

        ?>
         <div class="profile-card">
          <div class="top-section">
            <i class="notif fas fa-bell"></i>
            <div class="pic">
              <img src="<?=$infos[0][2]?>" alt="profilpic" width="100">
            </div>
            <div class="name"><?=$_SESSION['login']?></div>
            <div class="tag"><p>@<?=$infos[0][1]?></p></div>
          </div>
          <div class="bottom-section">
            <div class="social-media">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-discord"></i></a>
              <a href="#"><i class="fab fa-twitch"></i></a>
            </div>
            <div>190<span>messages postés</span></div>
            <div class="border"></div>
            <div class="views">GOLD<span>niveau</span></div>      
            <div class="border"></div>
            <p id="date">inscrit depuis le <?=$infos[0][3]?></p>
          </div>
        </div>
        </section>  
  </main>
  <footer>
    <?php include("includes/footer.php"); ?>
  </footer>
</body>
</html>