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

<<<<<<< Updated upstream
if(isset($_SESSION['login']) && ($_SESSION['login']!='admin')) {
=======
      $request1="SELECT id FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
      $query1=mysqli_query($db,$request1);
      $infos = mysqli_fetch_all($query1);
      
      $iduser= $infos[0][0];
>>>>>>> Stashed changes

    echo "

<<<<<<< Updated upstream
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
=======
      if(mysqli_num_rows($query)==0){
        
        echo "<tr><td colspan='2' id='thead-text'>Pas de messages dans cette Conversation.</td><tr>";
      }
// SIGNALER
      if(isset($_POST['reportbutton'])){

        $id=$_POST['id'];

        $db = mysqli_connect("localhost","root","","forum");

        $_SESSION['messageid']=$id;
                       

        $request5="SELECT FROM `message` WHERE id = $id";
        $query5=mysqli_query($db,$request5);

        header("location:signalement-message.php");

    }
//
      while($value=mysqli_fetch_assoc($query)){
        
>>>>>>> Stashed changes

        <main id='main-chat-test'>

<<<<<<< Updated upstream
        <section class="main-article" id="main-article-chat">
=======
             //on compte tous les likes pour les afficher à côté de l'icone like pour chaque message
              $requestcountlikes = "SELECT COUNT(*) FROM liker WHERE id_message = $idmessage AND reaction = 1 ";
              $query_a = mysqli_query($db, $requestcountlikes);
              $countlikes = mysqli_fetch_all($query_a);

            //on compte tous les dislikes pour les afficher à côté de l'icone dislike pour chaque message
              $requestcountdislikes = "SELECT COUNT(*) FROM liker WHERE id_message = $idmessage  AND reaction = -1 ";
              $query_b = mysqli_query($db, $requestcountdislikes);
              $countdislikes = mysqli_fetch_all($query_b);

            //on compte toutes les entrées likes effectuées par l'utilisateur pour un message
              $requestcountlikesbyid = "SELECT COUNT(*) FROM liker WHERE id_message = $idmessage  AND id_utilisateur = $iduser AND reaction = 1";
              $query_c = mysqli_query($db, $requestcountlikesbyid);
              $countlikesbyid = mysqli_fetch_all($query_c);

            //on compte toutes les entrées likes effectuées par l'utilisateur pour un message
              $requestcountbyid = "SELECT COUNT(*) FROM liker WHERE id_message = '$idmessage'  AND id_utilisateur = '$iduser' AND reaction = -1 ";
              $query_d = mysqli_query($db, $requestcountbyid);
              $countdislikesbyid = mysqli_fetch_all($query_d);
>>>>>>> Stashed changes
        
        <?php

                if(isset($_POST['message'])){

<<<<<<< Updated upstream
                    $db = mysqli_connect("localhost","root","","forum");
=======
                   echo " <form method='post' action =''>
                   <td><input id='button_report' type='submit' value='Signaler' name='reportbutton'></td>
                   <td>  <input type='hidden' name='id' value='$value[id_message]'></form></td>";

            echo '<td><p>' .$countlikes[0][0].' &nbsp; people like this</p></td>';
            echo '<td><p>' .$countdislikes[0][0].' &nbsp; people dislike this</p></td></tr>';
>>>>>>> Stashed changes

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