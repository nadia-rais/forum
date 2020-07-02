<?php
session_start();

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

    <section  id="container-formtopic">
        <form id='modification1' method="post" action="">
    <?php

if ((isset($_POST['reportreason'])))
{
if ((!empty($_POST['reportreason'])))
{



    $con = mysqli_connect('localhost','root','','forum');


if(! $con){
	die("Error  : ". mysql_error());
}

$sql = "INSERT INTO `signalement_conv`(`signalement`,`id_utilisateur`,`id_conv`) VALUES('$_POST[reportreason]','$_SESSION[id]','$_SESSION[convid]')";

$result = mysqli_query($con, $sql);

echo "Le signalement a bien été enregistré";

}else echo "<span>Veuillez remplir tous les champs</span><br>";

}
?>
   <label for="titre">Raisons du signalement<span>*</span> :</label><br>
        <input id='form-text' type="text" name="reportreason">
        <input id="button-valider" type="submit" value="Envoyer" name="submit">
    </form>
    </section>
</main>
    </body>
</html>