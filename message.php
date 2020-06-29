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
      $request="SELECT * FROM messages as M INNER JOIN utilisateurs as U ON M.id_utilisateur=U.id INNER JOIN conversation as C ON M.id_conversation=C.id_conversation WHERE M.id_conversation=".$_GET['id_conversation']." ORDER BY M.id_message";
      $query=mysqli_query($db,$request);

      echo "<table id='table-livre'><thead><th colspan='2' id='thead-txt'>".$_GET['msg_conv']."</th></thead><tbody>";

      if(mysqli_num_rows($query)==0){
        echo "<tr><td colspan='2' id='thead-text'>Pas de messages dans cette Conversation.</td><tr>";
      }

      while($value=mysqli_fetch_assoc($query)){
        
          echo "<tr><td id='left-livre'><p>".$value['id_message'].".</p><p> Posté par :</p><a href='profil.php'>".$value['login']."</a>  le : ".$value['date_msg']."</td>";
          echo "<td id='right-livre'>".$value['message']."</td></tr>";
      }

        echo "</tbody></table>";

        if(isset($_POST['submit_msg'])){
          $request2="INSERT INTO `messages`(`message`, `id_utilisateur`, `id_conversation`, `date_msg`) VALUES ('".$_POST['msg_conv']."','$_SESSION[id]','".$_GET['id_conversation']."', NOW())";
          $query2=mysqli_query($db,$request2);
          header("location:message.php?id_conversation=".$_GET['id_conversation']."&msg_conv=".$_GET['msg_conv']);
      }

        echo "<form method='POST'><h1>Nouveau message</h1><br>
        <input id='form-text' type='text' name='msg_conv' required>
        
        <br><br>
        
        <input id='button-valider' type='submit' name='submit_msg' value='Valider'>
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