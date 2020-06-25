<?php

session_start();

if(!isset($_SESSION['login'])){
    header("location:connexion.php");
}

else{
?>



<html>
    <head>
        <title>Chat & Co</title>
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
    
            </section>
        </header>

        <main id='main-chat-test'>

        <section class="main-article" id="main-article-chat">
        
        <?php

                if(isset($_POST['message'])){

                    $db = mysqli_connect("localhost","root","","forum");

                    $request="SELECT id FROM utilisateurs WHERE login='$_SESSION[login]'";
                    $query=mysqli_query($db,$request);
                    $value=mysqli_fetch_assoc($query);
                    $comm=addslashes($_POST['message']);

                    $dateM=date('Y/m/d H:i:s');

                    $request2="INSERT INTO `messages`(`message`, `date`,`id_utilisateur`) VALUES ('$comm','$dateM',$value[id])";
                    $query2=mysqli_query($db,$request2);
                    header("location:message.php");
                }

                $db3 = mysqli_connect("localhost","root","","forum");

                $request3="SELECT M.message,M.date,U.login,M.id FROM messages as M INNER JOIN utilisateurs as U ON M.id_utilisateur=U.id ORDER BY M.id";
                $query3=mysqli_query($db3,$request3);

                if(isset($_POST['reportbutton'])){

                    $id=$_POST['id'];

                    $db = mysqli_connect("localhost","root","","forum");

                    $_SESSION['messageid']=$id;
                                   

                    $request5="SELECT FROM `messages` WHERE id = $id";
                    $query5=mysqli_query($db,$request5);

                    header("location:signalement-form.php");

                }
                
                echo "<table id='table-livre'><thead><th colspan='3' id='thead-txt'>Chattez ici !</th></thead><tbody>";

                while($value=mysqli_fetch_assoc($query3)){


                    echo "<tr><td id='left-livre'><p>Posté le : <p>".$value["date"]."<p> par </p><p>".$value["login"]."</p></td>";
                    echo "<td id='middle-livre'><p>".$value["message"]."</p></td><td id='right-livre'>";
    

                        echo "  <form method='post' action =''>
                                <input id='button_report' type='submit' value='Signaler' name='reportbutton'>
                                <input type='hidden' name='id' value='$value[id]'></form>";

                    
                    
                    echo "</td></tr>";
                }

                echo "</tbody></table>";

        

                ?>

        <form class="form-style" id="form-chat" method="POST">

        <h1>Votre message :</h1>
        <textarea id="form-text" placeholder="Votre message ici" name="message"></textarea>

        <input id="button-valider" type="submit" value="Ajouter le message" name="submit">
        </form>
        </section>
        </main>
        </body>
</html>

<?php
}
?>