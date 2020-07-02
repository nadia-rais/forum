<?php
session_start();
if(isset($_SESSION['login']) && ($_SESSION['id_droits']== 2 || $_SESSION['id_droits']== 3)){

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
    <section id="container-formtopic">

    <?php

        if(isset($_POST['submit_topic'])){
            $db=mysqli_connect("localhost","root","","forum");
            $request2="INSERT INTO topic (`topic_name`, `date_topic`, `droits_topic`, `id_utilisateur`) VALUES ('$_POST[nom_topic]', NOW(), '$_POST[droits_topic]', '$_SESSION[id]')";
            $query2=mysqli_query($db,$request2);
            header('location:topic.php');
        }

        echo "<form id='modification1' method='POST'><h1>Nouveau Topic</h1><br>
        <label for='nom_topic'>nom du Topic</label><br>
        <input id='form-text' type='text' name='nom_topic' required>
        
        <select name='droits_topic' id='select' required>
            <option value=''>--sélectionner la visibilité du topic--</option>
            <option value='1'>Public</option>
            <option value='2'>Privé</option>
        </select>
        
        <br><br>
        
        <input type='submit' name='submit_topic' value='Valider'>
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