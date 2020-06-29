<?php
session_start();
 if(isset($_SESSION['login'])){

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

      if($_SESSION['id_droits']=='2' || $_SESSION['id_droits']=='3'){

        $request="SELECT * FROM topic as T INNER JOIN utilisateurs as U ON T.id_utilisateur=U.id ORDER BY T.id_topic";
        $query=mysqli_query($db,$request);
  
        echo "<table id='table-livre'><thead><th colspan='2' id='thead-txt'>Les Topics</th></thead><tbody>";
  
        while($value=mysqli_fetch_assoc($query)){
  
            echo "<tr><td id='left-livre'><p>".$value['id_topic'].".</p><p> Posté par :</p><a href='profil.php'>".$value['login']."</a>  le : ".$value['date_topic']."</td>";
            echo "<td id='right-livre'><a href='conversation.php?id_topic=".$value['id_topic']."&topic_name=".$value['topic_name']."'>".$value['topic_name']."</a></td></tr>";
        }
  
        echo "</tbody></table>";
      }

      else{
        $request2="SELECT * FROM topic as T INNER JOIN utilisateurs as U ON T.id_utilisateur=U.id WHERE T.droits_topic='1' ORDER BY T.id_topic";
        $query2=mysqli_query($db,$request2);
  
        echo "<table id='table-livre'><thead><th colspan='2' id='thead-txt'>Les Topics</th></thead><tbody>";
  
        while($value=mysqli_fetch_assoc($query2)){
  
            echo "<tr><td id='left-livre'><p>".$value['id_topic'].".</p><p> Posté par :</p><a href='profil.php'>".$value['login']."</a>  le : ".$value['date_topic']."</td>";
            echo "<td id='right-livre'><a href='conversation.php?id_topic=".$value['id_topic']."&topic_name=".$value['topic_name']."'>".$value['topic_name']."</a></td></tr>";
        }
  
        echo "</tbody></table>";
      }

      

       //if($value['id_droits']==2 || $value['id_droits']==3){

        echo "<form action='ajout_topic.php' method='POST'>
              <input id='button-valider' type='submit' value='Ajouter un Topic' name='submit'>
              </form>";
       // }

      
    ?>

    </main>
    <footer>
      <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>

<?php
 }

 else{
  header("location:index.php");
 }
?>