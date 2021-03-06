<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <title>forum - inscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/8nC21YQ/logo1-wow.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
      <?php include("includes/header.php");?>
    </header>
    <main>
    <section id="container-insc">
        <section id="diapo">
            <h2>bienvenue dans le</h2>
            <ul class="slideshow1">
	            <li><span><div class="principal1"></div></span></li>
                <li><span><div class="principal1"></div></span></li>
	            <li><span><div class="principal1"></div></span></li>
	            <li><span><div class="principal1"></div></span></li>
	            <li><span><div class="principal1"></div></span></li>
            </ul>
            <h1> WOW'S CLAN</h1>
        </section>
        
        <form action="" method="post">
            <section id="form-insc">
                <h1> crée ton profil maintenant </h1>
                <label>email</label>
                <input type="email" id="email" name="email" size="30" required>
                <label>choississez un pseudo</label>
                <input type="text" id="pseudo" name="pseudo" required>
                <label>login</label>
                <input type="text" name="login" required>
                <label>password</label>
                <input type="password" name="password" required>
                <label>confirmation password</label>
                <input type="password" name="passwordrepeat" required>
                <br><br> <input type="text" placeholder="Entrez ici le CAPTCHA pour valider le formulaire" name="captcha"/>
                <input type="submit" name="submit"/>
                <img id="captcha-img" src="captcha.php" onclick="this.src='captcha.php?' + Math.random();" alt="captcha" style="cursor:pointer;">
            </section>

                <?php 

                    if (isset($_POST['captcha'])) {

                        if($_POST['captcha']==$_SESSION['code']){
                    
                    $login = addslashes($_POST['login']);
                    $pseudo = addslashes($_POST['pseudo']);
                    $mail = addslashes($_POST['email']);
                    $password = addslashes($_POST['password']);
                    $repeatpassword = addslashes($_POST['passwordrepeat']);

                    $profiledefault = ("https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg"); //variable pour insérer une photo de profil par défaut à l'inscription
                    $droits = 1;                                                              //variable pour insérer les droits par défaut à l'inscription

                    $connect = mysqli_connect('localhost', 'root', '','forum');
                    $request = "SELECT login FROM utilisateurs WHERE login = '$login'" ;
                    $req = mysqli_query($connect,$request);
                    $exist = mysqli_fetch_all($req);

                        if (!empty($exist)){

                        echo "<p class='errormessage'> Login est déjà utilisé !</p>";

                        } 

                        elseif ($pseudo && $mail && $login && $password && $repeatpassword ){ 

                            if ($password == $repeatpassword) {
      
                            $requete = "INSERT INTO `utilisateurs`(`login`, `pseudo`, `password`, `email`, `id_droits`, `avatar`, `date`) VALUES ('$login','$pseudo','$password','$mail','$droits','$profiledefault', NOW())";
                            $query = mysqli_query($connect, $requete);
                            var_dump($query);

                            header('location:connexion.php');
                
                            } else echo '<p class="errormessage">Les mots de passe doivent être identiques</p>';
            
                        } else echo '<p class="errormessage">Veuillez saisir tous les champs</p>';
                    } else {echo '<p class="errormessage">Code captcha incorrect</p>';
                    
                    }
                }
                ?>
        </form>

        </section>
    </main>
    <footer>
        <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>