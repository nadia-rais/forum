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


      $request1="SELECT id FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
      $query1=mysqli_query($db,$request1);
      $infos = mysqli_fetch_all($query1);
      
      $iduser= $infos[0][0];
      var_dump($iduser);

      echo "<table id='table-livre'><thead><th colspan='2' id='thead-txt'>".$_GET['msg_conv']."</th></thead><tbody>";

      if(mysqli_num_rows($query)==0){
        
        echo "<tr><td colspan='2' id='thead-text'>Pas de messages dans cette Conversation.</td><tr>";
      }

      while($value=mysqli_fetch_assoc($query)){
        

          $idmessage=$value['id_message'];
          //var_dump($idmessage);
        

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
              var_dump($countlikesbyid);

            //on compte toutes les entrées likes effectuées par l'utilisateur pour un message
              $requestcountbyid = "SELECT COUNT(*) FROM liker WHERE id_message = '$idmessage'  AND id_utilisateur = '$iduser' AND reaction = -1 ";
              $query_d = mysqli_query($db, $requestcountbyid);
              $countdislikesbyid = mysqli_fetch_all($query_d);
        
            echo "<tr><td id='left-livre'><img id='minipic2' src=".$value['avatar']." alr='profilpic'<p>".$value['id_message'].".</p><p> Posté par :</p><a href='profil.php'>".$value['login']."</a>  le : ".$value['date_msg']."</td>";
            echo "<td id='right-livre'>".$value['message']. "</td>";
            echo '<td><form action="" method="POST">
                    <input type="submit" name="like" id="likebutton" value="' . $idmessage . '"/></form>
                 

                  <td><form action="" method="POST">
                    <input type="submit" name="dislike" id="dislikebutton" value="' . $idmessage . '"/></form>
                   </td>';

            echo '<td><p>' .$countlikes[0][0].' &nbsp; people like this</p></td>';
            echo '<td><p>' .$countdislikes[0][0].' &nbsp; people dislike this</p></td></tr>';

            if (isset($_POST["like"])){
    
              if ($countlikesbyid[0][0]== "0" && $_POST["like"] == $idmessage){
                
            
              $requestlike = "INSERT INTO `liker`(`id_utilisateur`,`id_message`, `reaction`) VALUES ('$iduser','$idmessage', 1)";
              $querylike = mysqli_query($db, $requestlike);
    
              }
            
            }

            if (isset($_POST["dislike"])){
    
              if ($countdislikesbyid[0][0]== "0" && $_POST["dislike"] == $idmessage){
                
            
              $requestdislike = "INSERT INTO `liker`(`id_utilisateur`,`id_message`, `reaction`) VALUES ('$iduser','$idmessage', -1)";
              $querydislike = mysqli_query($db, $requestdislike);
    
              }
            
            }

          }
       
        echo "</tbody></table>";


        if(isset($_POST['submit_msg'])){
          $request2="INSERT INTO `messages`(`message`, `id_utilisateur`, `id_conversation`, `date_msg`) VALUES ('".$_POST['msg_conv']."','$_SESSION[id]','".$_GET['id_conversation']."', NOW())";
          $query2=mysqli_query($db,$request2);
          header("location:message.php?id_conversation=".$_GET['id_conversation']."&msg_conv=".$_GET['msg_conv']);
      }

        echo "<form id='modification1' method='POST'><h1>Nouveau message</h1><br>
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