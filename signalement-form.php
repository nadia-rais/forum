<?php

session_start();

?>


<html>
    <head>
        <title>Connexion</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/agenda.css">
        <link href="https://fonts.googleapis.com/css2?family=Chivo&family=Noto+Sans+JP&display=swap" rel="stylesheet">
    </head>

    <body>
        
<header>
            <section>

            <?php

if(isset($_SESSION['login']) && ($_SESSION['login']!='admin')) {

    echo "

<nav>
<ul>
    <li><a href='index.php'>Accueil</a></li>
    <li><a href='message.php'>Chat</a></li>
    <li><a href='profil.php'>Profil</a></li>
    <li><a href='logout.php'>Déconnexion</a></li>
</ul>
</nav>

 ";}
 elseif(isset($_SESSION['login']) && ($_SESSION['login']=='admin')) {
    
    echo "

    <nav>
    <ul>
        <li><a href='index.php'>Accueil</a></li>
        <li><a href='message.php'>Chat</a></li>
        <li><a href='profil.php'>Profil</a></li>
        <li><a href='admin.php'>Admin</a></li>
        <li><a href='logout.php'>Déconnexion</a></li>
    </ul>
    </nav>

     ";}
else{
    echo "

<nav>
<ul>
    <li><a href='index.php'>Accueil</a></li>
    <li><a href='inscription.php'>Inscription</a></li>
    <li><a href='connexion.php'>Connexion</a></li>
</ul>
</nav>

 ";} ?>
    
            </section>
</header>
<main>

<section class="main-article form-input" id="main-article">


    <form class="form-style" id="form-connexion" method="post" action="">
    <?php

if ((isset($_POST['reportreason'])))
{
if ((!empty($_POST['reportreason'])))
{



    $con = mysqli_connect('localhost','root','','forum');


if(! $con){
	die("Error  : ". mysql_error());
}

$sql = "INSERT INTO `signaler` (`signalement`, `id_utilisateur`, `id_message`) VALUES('$_POST[reportreason]','$_SESSION[id]','$_SESSION[messageid]')";

$result = mysqli_query($con, $sql);

echo "Le signalement a bien était enregistré";

}else echo "<span>Veuillez remplir tous les champs</span><br>";

}
?>
   <label for="titre">Raisons du signalement<span>*</span> :</label><br>
            <input id="" type="text" name="reportreason">

        <input id="button-valider" type="submit" value="Envoyer" name="submit">
    </form>
    </section>
</main>
    </body>
</html>