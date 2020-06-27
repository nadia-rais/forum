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
                <input type="submit" value="s'inscrire" name="submit">
            </section>

                <?php 

                    if (isset($_POST['submit'])) {
                    
                    $login = ($_POST['login']);
                    $pseudo = ($_POST['pseudo']);
                    $mail = ($_POST['email']);
                    $password = ($_POST['password']);
                    $repeatpassword = ($_POST['passwordrepeat']);

                    $profiledefault = ("https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg"); //variable pour insérer une photo de profil par défaut à l'inscription
                    $statutdefault = 0;                                                       //variable pour insérer un statut par défaut à l'inscription
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
      
                            $requete = "INSERT INTO `utilisateurs`(`login`, `pseudo`, `password`, `email`, `id_droits`, `avatar`, `statut`, `date`) VALUES ('$login','$pseudo','$password','$mail','$droits','$profiledefault','$statutdefault', NOW())";
                            $query = mysqli_query($connect, $requete);
                            var_dump($query);

                            header('location:connexion.php');
                
                            } else echo '<p class="error-connect">Les mots de passe doivent être identiques</p>';
            
                        } else echo '<p class="error-connect">Veuillez saisir tous les champs</p>';
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
