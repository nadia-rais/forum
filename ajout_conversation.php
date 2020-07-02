<?php
session_start();
if(isset($_SESSION['login'])){

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

        if(isset($_POST['submit_conv'])){
            $db = mysqli_connect("localhost","root","","forum");
            $request2="INSERT INTO `conversation`(`msg_conv`, `id_utilisateur`, `id_topic`, `date_conversation`) VALUES ('".$_POST['msg_conv']."','$_SESSION[id]','".$_POST['id_topic_test']."', NOW())";
            $query2=mysqli_query($db,$request2);
            header("location:conversation.php?id_topic=".$_POST['id_topic_test']."&topic_name=".$_POST['topic_name_test']);
        }

        echo "<form id='modification1' method='POST'><h1>Nouvelle Conversation</h1><br>
        <label for='msg_conv'>Nom de la Conversation</label><br>
        <input id='form-text' type='text' name='msg_conv' required>
        
        <br><br>
        
        <input id='button-valider' type='submit' name='submit_conv' value='Valider'>
        <input type='hidden' name='id_topic_test' value='".$_POST['id_topic']."'>
        <input type='hidden' name='topic_name_test' value='".$_POST['topic_name']."'>
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