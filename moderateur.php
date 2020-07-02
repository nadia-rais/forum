<?php
session_start();
if(isset($_SESSION['login']) && ($_SESSION['id_droits']== 2 || $_SESSION['id_droits']== 3)){
  ?>

<!DOCTYPE html>
<html>
<head>
    <title>forum - moderateur</title>
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
      <section id="container-admin">
        <h1>MODERATION BOARD</h1>
        <section id="subjects">

    <?php

      echo "<form id='onglet' method='POST'>
      <input type='submit' name='submit_mod_conv' value='Conversations Signalées'>
      <input type='hidden' name='mod_conv' value='1'>

      <input type='submit' name='submit_mod_msg' value='Messages Signalés'>
      <input type='hidden' name='mod_msg' value='2'>

      <input type='submit' name='submit_mod_news' value='Liste Newsletter'>
      <input type='hidden' name='news' value='3'>
      </form>";
 
    

      if(isset($_POST['submit_mod_conv'])){
        $db=mysqli_connect("localhost","root","","forum");
        $request="SELECT * FROM `signalement_conv`as SC INNER JOIN utilisateurs as U ON SC.id_utilisateur=U.id INNER JOIN conversation as C ON SC.id_conv=C.id_conversation ORDER BY id_conv";
        $query=mysqli_query($db,$request);

        if(empty($query)){
        
          echo "<p class='text-info'>Pas de conversations signalées.</p>";
        }
       
        else {

        echo "<table><thead><th colspan='4' class='thead-txt'>Signalements de conversations</th></thead><tbody>";
  
        while($value=mysqli_fetch_assoc($query)){
  
            echo "<tr><td>Signalé par ".$value['pseudo']."</td><td>Raison ".$value['signalement']."</td><td>Conversation signalée ".$value['msg_conv']."</td>";
            echo "<td><form method='POST'>
            <input id='button_report_conv' type='submit' value='Delete' name='submit_delete_conv'>
            <input type='hidden' name='id_conv' value='".$value['id_conversation']."'></form></td>";
        }
  
        echo "</tbody></table>";
      }
    }
      elseif(isset($_POST['submit_mod_msg'])){

        
      
        $db=mysqli_connect("localhost","root","","forum");
        $request2="SELECT * FROM `signalement_message` as SM INNER JOIN utilisateurs as U ON SM.id_utilisateur=U.id INNER JOIN messages as M ON SM.id_message=M.id_message ORDER BY SM.id_message";
        $query2=mysqli_query($db,$request2);

        

        

        if(empty($query2)){
        
          echo "<p class='text-info'>Pas de messages signalés.</p>";
        }

        else{

        echo "<table><thead><th colspan='4' class='thead-txt'>Signalements de messages</th></thead><tbody>";
        
  
        while($value2=mysqli_fetch_assoc($query2)){
      
            echo "<tr><td>Signalé par ".$value2['pseudo']."</td><td>Raison ".$value2['signalement']."</td><td>Message signalé ".$value2['message']."</td>";
            echo "<td><form method='POST'>
                                    <input id='button_report' type='submit' value='Delete' name='submit_delete'>
                                    <input type='hidden' name='id' value='".$value2['id_message']."'></form></td>";
        }
  
        echo "</tbody></table>";
      }
    }

      elseif(isset($_POST['submit_mod_news'])){
        $db=mysqli_connect("localhost","root","","forum");
        $request3="SELECT * FROM `newsletter` ORDER BY id";
        $query3=mysqli_query($db,$request3);

        if(empty($query3)){
        
          echo "<p class='text-info'>pas d'email enregistrés.</p>";
        }

        else{

        echo "<table><thead><th colspan='3' class='thead-txt'>Liste des inscrits à la newsletter</th></thead><tbody>";
  
        while($value3=mysqli_fetch_assoc($query3)){
  
            echo "<tr><td>".$value3['id']."</td><td>".$value3['email']."</td></tr>";
        }
  
        echo "</tbody></table>";
      }
    }

    if(isset($_POST['submit_delete'])){

      $db = mysqli_connect("localhost","root","","forum"); 
      $request322="DELETE FROM messages WHERE id_message=".$_POST['id'];
      $request9="DELETE FROM signalement_message WHERE id_message=".$_POST['id'];
      $query322=mysqli_query($db,$request322);
      $query9=mysqli_query($db,$request9);

  }


  if(isset($_POST['submit_delete_conv'])){

    $db = mysqli_connect("localhost","root","","forum"); 
    $request323="DELETE FROM conversation WHERE id_conversation=".$_POST['id_conv'];
    $request10="DELETE FROM signalement_conv WHERE id_conv=".$_POST['id_conv'];
    $query323=mysqli_query($db,$request323);
    $query10=mysqli_query($db,$request10);

}


    ?>
      </section>
     </section>
    </main>
    <footer>
      <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>
<?php }

else{
  header("location:index.php"); 
}
?>