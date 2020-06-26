<?php
session_start();
// if(isset($_SESSION['login'])){

?>
<!DOCTYPE html>
<html>
<head>
    <title>forum - ajout topic</title>
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

        if(isset($_POST['submit_topic'])){
            $db = mysqli_connect("localhost","root","","forum");
            $request2="INSERT INTO topic (topic_name, id_utilisateur) VALUES ('$_POST[nom_topic]','1')";
            $query2=mysqli_query($db,$request2);
            header('location:topic.php');
        }

        echo "<form method='POST'><h1>Nouveau Topic</h1><br>
        <label for='nom_topic'>Nom du Topic</label><br>
        <input id='form-text' type='text' name='nom_topic' required>
        
        <br><br>
        
        <input id='button-valider' type='submit' name='submit_topic' value='Valider'>
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