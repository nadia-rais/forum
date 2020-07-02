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
      <section id="page">
        <h1 id='page-title'>Les Topics</h1>
      <?php
    
      $db = mysqli_connect("localhost","root","","forum");

      if($_SESSION['id_droits']=='2' || $_SESSION['id_droits']=='3'){

        $request="SELECT * FROM topic as T INNER JOIN utilisateurs as U ON T.id_utilisateur=U.id ORDER BY T.id_topic";
        $query=mysqli_query($db,$request);
  
        while($value=mysqli_fetch_assoc($query)){
  
            echo "<section id='topic-text1'>
           
                   <p id='infos-box'>topic numéro : ".$value['id_topic']."
                    </br> Posté par : <a href='members.php?id=".$value['id_utilisateur']."'>".$value['pseudo']."</a>
                    </br>le : ".$value['date_topic']."
                    </p>
                   <a id='name-conv' href='conversation.php?id_topic=".$value['id_topic']."&topic_name=".$value['topic_name']."'>".$value['topic_name']."</a>
                  </section>";
        }
  
        echo "<form id='add-button' action='ajout_topic.php' method='POST'>
                <input type='submit' value='Ajouter un Topic' name='submit'>
              </form>";
      }

      else{
        $request2="SELECT * FROM topic as T INNER JOIN utilisateurs as U ON T.id_utilisateur=U.id WHERE T.droits_topic='1' ORDER BY T.id_topic";
        $query2=mysqli_query($db,$request2);
  
        while($value=mysqli_fetch_assoc($query2)){
  
            echo "<section id='topic-text1'>
                    <p>posté le : ".$value['date_topic']."</p>
                    <a href='conversation.php?id_topic=".$value['id_topic']."&topic_name=".$value['topic_name']."'>".$value['topic_name']."</a>
                  </section>";
        }

      }

    ?>
      </section>
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