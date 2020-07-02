<?php
session_start();
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

          <form id="formmodif" method="POST">
            <div class="modif">
              <label for="login">nouveau pseudo</label><br>
              <input id="login-profil" type="text" value="nouveau pseudo" name="pseudo">
              <input id="button-modif" type="submit" name="submit2" value="modifier">
            </div>
            <div class="modif">
              <label for="login">nouveau login</label><br>
              <input id="login-profil" type="text" value="login" name="login">
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
    
        <?php
        if (isset($_SESSION["login"])){

          $connect = mysqli_connect('localhost','root','','forum');

          $request = "SELECT id, login, pseudo, avatar, DATE_FORMAT(date,'%d/%m/%Y'),id_droits FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
          $query = mysqli_query($connect, $request);
          $infos = mysqli_fetch_all($query);
          var_dump($infos);
          $id = ($infos[0][0]);
          $statut = ($infos[0][5]);

          $request1 = "SELECT COUNT(*) FROM messages WHERE id_utilisateur = '$id' ";
          $query1 = mysqli_query($connect, $request1);
          $count = mysqli_fetch_all($query1);

         if(isset ($_POST['submit1'])){

          $link = $_POST['linkimg'];
          
          $request2 = "UPDATE `utilisateurs` SET `avatar`='$link' WHERE login = '$_SESSION[login]'";
          $result2 = mysqli_query($connect, $request2);

        }

        //update pseudo
           if(isset($_POST['submit2']) && (!empty($_POST['pseudo']))){

            $pseudo = ($_POST['pseudo']);
    
            $request3 = "UPDATE `utilisateurs` SET `pseudo`='$pseudo' WHERE login = '$_SESSION[login]'";
            $result3 = mysqli_query($connect, $request3);

            header('location:profil.php');
          }
  
        //update login
        if(isset($_POST['submit3'])){

          $login = ($_POST['login']);

          $requete1 = "SELECT login FROM utilisateurs WHERE login = '$login'" ;
          $req = mysqli_query($connect,$requete1);
          $exist = mysqli_fetch_all($req);

          if (!empty($exist)){

            echo "<p class='errormessage'>Ce pseudo est déjà utilisé !</p>";

          } 

          else{
          
          $request4 = "UPDATE `utilisateurs` SET `login`='$login' WHERE login ='$_SESSION[login]'";
          $result4 = mysqli_query($connect, $request4);

          $_SESSION['login'] = $login;

          }

        }

        //update password
        if(isset($_POST['submit4'])){

          $password = ($_POST['password']);
          $password_repeat = ($_POST['passwordrepeat']);

            if ($password == $password_repeat) {

              $request5 = "UPDATE `utilisateurs` SET `password`='$password' WHERE login = '$_SESSION[login]'";
              $result5 = mysqli_query($connect, $request5);
              
              header('location:profil.php');
              echo '<p>votre password a bien été modifié</p>';

           }
        
            else echo '<p class="error-connect">Les mots de passe doivent être identiques</p>';
            
        }

      }

        ?>
        </section>
         <div class="profile-card">
          <div class="top-section">
            <i class="notif fas fa-bell"></i>
            <div class="pic">
              <img src="<?=$infos[0][3]?>" alt="profilpic" width="100">
            </div>
            <div class="name"><?=$_SESSION['login']?></div>
            <div class="tag"><p>@<?=$infos[0][2];var_dump($infos);?></p></div>
          </div>
          <div class="bottom-section">
            <div class="social-media">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-discord"></i></a>
              <a href="#"><i class="fab fa-twitch"></i></a>
            </div>
            <div><?=$count[0][0]?><span>messages postés</span></div>
            <div class="border"></div>
            <div class="views"><?=$statut?><span>niveau</span></div>      
            <div class="border"></div>
            <p id="date">inscrit depuis le <?=$infos[0][4]?></p>
          </div>
        </div>
        </section>  
  </main>
  <footer>
    <?php include("includes/footer.php"); ?>
  </footer>
</body>
</html>