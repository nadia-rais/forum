<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", 'forum');

$request = "SELECT * FROM utilisateurs ORDER by date DESC";
$query = mysqli_query($connect, $request);
$infos = mysqli_fetch_all($query);

$request1 = "SELECT utilisateurs.login, topic.id, topic.topic, topic.date FROM utilisateurs INNER JOIN topic ON utilisateurs.id = topic.id_utilisateur ORDER by date DESC";
$query1 = mysqli_query($connect , $request1);
$topics = mysqli_fetch_all($query1);

/*$request2 = "SELECT utilisateurs.login, conversation.id, conversation.conversation, conversation.date FROM utilisateurs INNER JOIN conversation ON utilisateurs.id = conversation.id_utilisateur ORDER by date DESC";
$query2 = mysqli_query($connect , $request2);
$conversations = mysqli_fetch_all($query2);*/

?>

<!DOCTYPE html>
<html>
<head>
    <title>forum - admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/8nC21YQ/logo1-wow.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
       <?php include("includes/header.php"); ?>
    </header>
    <main>
      <section id="container-admin">
        <h1>ESPACE ADMINISTRATEUR</h1>
        <section id="subjects">
          <section id="section-top1">
          <h2>LISTE CONVERSATIONS
            <a href="ajout_conversation.php"> &nbsp; + ajouter</a>
          </h2>
          
          <?php
           	/*foreach ($conv as $val){
		
              echo "<tbody>

              mettre les titres + lien modifier 
               
             }*/
          
          ?> 
          </section>
          <section id="section-top">
          <h2>LISTE TOPICS
            <a href="ajout_topic.php">&nbsp; + ajouter</a>
          </h2>
          <table id="table1">
			      <thead>
			        <tr>
              <th>id</td>
				      <th>titre</td>
              <th>nom_user</td>
              <th>date création</td>
              <th></td> 
			        </tr>
			      </thead>
          <?php
           	foreach ($topics as $val){
              echo "<tbody>
              <tr>
              <td>$val[1] </td>
              <td>$val[2] </td>
              <td>$val[0] </td>
              <td>$val[3] </td>
              <td><a href='topic.php?id=$val[0]'>MODIFIER</a></td>
              </tr></tbody>";
            }
          ?> 
            </table>
          </section>
        </section>
      </section>

      <section id="users">
        <h1>LISTE DES MEMBRES</h1>
        <section id="containertable">
          <aside id="container_modo">
            <h2>MODÉRATEURS</h2>
            <table id="table1">
			      <thead>
			        <tr>
              <th>id</td>
              <th>nom_user</td>
              <th>date création</td>
              <th></td> 
			        </tr>
			      </thead>
            <?php
           	foreach ($infos as $val){
               if ($val[5]== "2"){
		         echo "<tbody>
              <tr>
              <td>$val[0] </td>
              <td>$val[2] </td>
              <td>$val[8] </td>
              <td><a href='topic.php?id=$val[0]'>MODIFIER</a></td>
              </tr></tbody>";
              }
            }
          
          ?> 
           </table>
          </aside>
    
          <table>
			      <thead>
			        <tr>
              <th>id</td>
				      <th>pseudo</td>
				      <th>login</td>
			      	<th>password</td>
              <th>email</td>
              <th>statut</td>
              <th>date création</td>
              <th>pic</td>
              <th></td> 
			        </tr>
			      </thead>
          <?php
           	foreach ($infos as $value){
              echo "<tbody>
                <tr>
                <td>$value[0] </td>
                <td>$value[1] </td>
                <td>$value[2] </td>
                <td>$value[3] </td>
                <td>$value[4] </td>
                <td>$value[7] </td>
                <td>$value[8] </td>
                <td><img id='minipic' src=$value[6] alt='profilepic'</td>
                <td><a href='members.php?id=$value[0]'>MODIFIER</a></td>
                </tr>
                </tbody>";
              }

          ?> 
          </table>
        </section>
      </section>
    </main>
    <footer>
      <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>