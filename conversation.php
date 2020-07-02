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
    <?php
    
      $db = mysqli_connect("localhost","root","","forum");
      $request="SELECT * FROM conversation as C INNER JOIN utilisateurs as U ON C.id_utilisateur=U.id INNER JOIN topic as T ON C.id_topic=T.id_topic WHERE C.id_topic=".$_GET['id_topic']." ORDER BY C.id_conversation";
      $query=mysqli_query($db,$request);
      if(mysqli_num_rows($query)==0){
        echo "<p id='no-text'>Pas de conversation dans ce Topic.</p><br>";
      }

      echo "<h1 id='page-title'>".$_GET['topic_name']."</h1>";

      while($value=mysqli_fetch_assoc($query)){
    
          echo "<section id='topic-text1'>
                  <p id='infos-box'>conversation n°".$value['id_conversation']."
                  </br> Posté par : <a href='members.php?id=".$value['id']."'>".$value['pseudo']."</a> 
                  </br>le : ".$value['date_conversation']."</p>
                  <a id='name-conv' href='message.php?id_conversation=".$value['id_conversation']."&msg_conv=".$value['msg_conv']."'>".$value['msg_conv']."</a>
                </section>";
      }

        echo "<form id='add-button' action='ajout_conversation.php' method='POST'>
              <input id='button-valider' type='submit' value='Ajouter une Conversation' name='submit'>
              <input type='hidden' name='id_topic' value='".$_GET['id_topic']."'>
              <input type='hidden' name='topic_name' value='".$_GET['topic_name']."'>
              </form>";

      
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