<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>forum - admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/8nC21YQ/logo1-wow.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
    <head>
        <title>Connexion</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/discussion.css">
        <link href="https://fonts.googleapis.com/css2?family=Chivo&family=Noto+Sans+JP&display=swap" rel="stylesheet">
    </head>

    <body>
        
        <header>
            <section>

                <?php

                if(isset($_SESSION['login']) && ($_SESSION['login']!='admin')) {
    
                    echo "

                <nav>
                <ul>
                    <li><a href='index.php'>Accueil</a></li>
                    <li><a href='message.php'>Chat</a></li>
                    <li><a href='profil.php'>Profil</a></li>
                    <li><a href='logout.php'>Déconnexion</a></li>
                </ul>
                </nav>

                 ";}
                 elseif(isset($_SESSION['login']) && ($_SESSION['login']=='admin')) {
                    
                    echo "

                    <nav>
                    <ul>
                        <li><a href='index.php'>Accueil</a></li>
                        <li><a href='message.php'>Chat</a></li>
                        <li><a href='profil.php'>Profil</a></li>
                        <li><a href='admin.php'>Admin</a></li>
                        <li><a href='logout.php'>Déconnexion</a></li>
                    </ul>
                    </nav>
    
                     ";}
                else{
                    echo "

                <nav>
                <ul>
                    <li><a href='index.php'>Accueil</a></li>
                    <li><a href='inscription.php'>Inscription</a></li>
                    <li><a href='connexion.php'>Connexion</a></li>
                </ul>
                </nav>

                 ";} ?>
    </header>
    <main>
      <section class="info2">
        <?php

        if(($_SESSION['login'])=='admin'){

            $db = mysqli_connect("localhost","root","","forum");

                        $request="SELECT * FROM utilisateurs";
                        $query=mysqli_query($db,$request);
                        
                        ?>
                        <table>
                            <thead>
                                <tr><th colspan="3" id="admin-title">Administration</th></tr>
                                <tr id="admin-2title">
                                    <th>ID</th>
                                    <th>Identifiant</th>
                                    <th>Mot de passe</th>
                                </tr>
                            </thead>
                            <tbody><?php

                        while($value=mysqli_fetch_assoc($query)){?>
                                <tr>
                                    <td id="ID-admin"><?php echo $value['id'] ?></td>
                                    <td id="ID-admin"><?php echo $value['login'] ?></td>
                                    <td id="ID-admin"><?php echo $value['password']?></td>
                                </tr><?php } ?>
                            </tbody>
                        </table>

                        <?php

                        $request2="SELECT * FROM signaler";
                        $query2=mysqli_query($db,$request2);
                        
                        ?>
                        <table>
                            <thead>
                                <tr><th colspan="3" id="admin-title">Signalement message</th></tr>
                                <tr id="admin-2title">
                                    <th>ID</th>
                                    <th>Signalement</th>
                                    <th>id_utilisateur</th>
                                    <th>id_message</th>
                                </tr>
                            </thead>
                            <tbody><?php

                        while($value2=mysqli_fetch_assoc($query2)){?>
                                <tr>
                                    <td id="ID-admin"><?php echo $value2['id'] ?></td>
                                    <td id="ID-admin"><?php echo $value2['signalement'] ?></td>
                                    <td id="ID-admin"><?php echo $value2['id_utilisateur']?></td>
                                    <td id="ID-admin"><?php echo $value2['id_message']?></td>
                                </tr><?php } ?>
                            </tbody>
                        </table>




                        

        <?php
        }

        else{
            header("location:index.php");
        }


        ?>

      </section>
    </main>
    <footer>
    </footer>
</body>
</html>