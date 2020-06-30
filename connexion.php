<?php session_start();
if(isset($_SESSION['login'])){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>forum - connexion</title>
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
    <section id="container-connexion">

        <section id="cont-form">
          <section id="title-connect">
            <h1>welcome back !</h1>
          </section>
		      <form class="login" method="post" action="connexion.php">
				    <input type="text" placeholder="login" name="login" placeholder="login">
				    <input type="password" placeholder="password" name="password" placeholder="password"><br>
            <input type="submit" value="Login" value="CONNEXION" name="submit">
          </form>

          <?php
          if ((isset($_POST['login'])) && (isset($_POST['password']))){

            if ((!empty($_POST['login'])) && (!empty($_POST['password']))){

            $connect = mysqli_connect('localhost','root','','forum');

            if(! $connect){die("Error  : ". mysql_error());}

            $request = "SELECT * FROM utilisateurs WHERE login='$_POST[login]'&&password='$_POST[password]'";
            $result = mysqli_query($connect, $request);
            $fetch = mysqli_fetch_assoc($result);
           
            if ($result){

            $row = mysqli_num_rows($result);

            if ($row){
            $_SESSION['login']=$_POST['login'];
            $login=$_SESSION['login'];
            $_SESSION['id']=$fetch['id'];
            $_SESSION['id_droits']=$fetch['id_droits'];
            
            
            header("location:index.php");
            }

            else echo '</br><span class="errormessage">Login ou mot de passe incorrect</span>';
            }
          }else echo '<span class="errormessage">Veuillez remplir tous les champs</span></br>';
          }
          ?>
        </section>
        <p><a id="linkconnect" href="inscription.php">Pas encore inscrit ? Rejoins-nous maintenant !</a></p>
      </section>
    </main>
    <footer>
      <?php include("includes/footer.php");?>
    </footer>
</body>
</html>