<?php
session_start();
// if(isset($_SESSION['login'])){

?>
<!DOCTYPE html>
<html>
<head>
    <title>forum - topic</title>
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

    <?php
    
      $db = mysqli_connect("localhost","root","","forum");
      $request="SELECT * FROM conversation as C INNER JOIN utilisateurs as U ON C.id_utilisateur=U.id INNER JOIN topic as T ON C.id_topic=T.id_topic WHERE C.id_topic=".$_GET['id_topic']." ORDER BY C.id_conversation";
      $query=mysqli_query($db,$request);
      if(mysqli_num_rows($query)==0){
        echo "<p>Pas de conversation dans ce Topic.</p><br>";
      }

      echo "<table id='table-livre'><thead><th colspan='2' id='thead-txt'>".$_GET['topic_name']."</th></thead><tbody>";
//SIGNALER
      if(isset($_POST['reportbutton'])){

        $id=$_POST['id'];

        $db = mysqli_connect("localhost","root","","forum");

        $_SESSION['convid']=$id;
                       

        $request5="SELECT FROM `conversation` WHERE id = $id";
        $query5=mysqli_query($db,$request5);

        header("location:signalement-conv.php");

    }
//
      while($value=mysqli_fetch_assoc($query)){
                
          echo "<tr><td id='left-livre'><p>".$value['id_conversation'].".</p><p> Posté par :</p><a href='profil.php'>".$value['login']."</a>  le : ".$value['date_conversation']."</td>";
          echo "<td id='right-livre'><a href='message.php?id_conversation=".$value['id_conversation']."&msg_conv=".$value['msg_conv']."'>".$value['msg_conv']."</a></td></tr>";
// SIGNALER

                        echo " <form method='post' action =''>
                        <td><input id='button_report' type='submit' value='Signaler' name='reportbutton'></td>
                        <td>  <input type='hidden' name='id' value='$value[id_conversation]'></form></td>";
//
      }

      

        echo "</tbody></table>";

        echo "<form action='ajout_conversation.php' method='POST'>
              <input id='button-valider' type='submit' value='Ajouter une Conversation' name='submit'>
              <input type='hidden' name='id_topic' value='".$_GET['id_topic']."'>
              <input type='hidden' name='topic_name' value='".$_GET['topic_name']."'>
              </form>";

      
    ?>

    </main>
    <footer>
      <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>

<?php
// }

// else{
//   header("location:index.php");
// }
?>