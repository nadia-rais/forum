<?php
ob_start();
session_start();
$connect = mysqli_connect("localhost", "root", "", 'forum');

$request = "SELECT * FROM utilisateurs ORDER by date DESC";
$query = mysqli_query($connect, $request);
$infos = mysqli_fetch_all($query);

$request1 = "SELECT utilisateurs.login, topic.id_topic, topic.topic_name, topic.date_topic FROM utilisateurs INNER JOIN topic ON utilisateurs.id = topic.id_utilisateur ORDER by date_topic DESC";
$query1 = mysqli_query($connect , $request1);
$topics = mysqli_fetch_all($query1);

$request2 = "SELECT signaler.id, signaler.id_utilisateur, signaler.id_message, messages.message FROM signaler INNER JOIN messages ON signaler.id_message = messages.id_message";
$query2 = mysqli_query($connect , $request2);
$signal = mysqli_fetch_all($query2);

$request3 = "SELECT utilisateurs.login, conversation.id_conversation, conversation.msg_conv, conversation.date_conversation FROM utilisateurs INNER JOIN conversation ON utilisateurs.id = conversation.id_utilisateur ORDER by date_conversation DESC";
$query3 = mysqli_query($connect , $request3);
$conversations = mysqli_fetch_all($query3);

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
        <h1>PANEL BOARD</h1>
        <section id="subjects">
          <section id="section-top1">
          <h2>LISTE CONVERSATIONS</h2>
          <table id="table1">
			      <thead>
			        <tr>
              <th>id</td>
				      <th>titre</td>
              <th>nom_createur</td>
              <th>date création</td>
              <th></td> 
			        </tr>
			      </thead>
          
          <?php
           	foreach ($conversations as $val2){
              $idconv = $val2[1];
              echo "<tbody>
              <tr>
              <td>$val2[1] </td>
              <td>$val2[2] </td>
              <td>$val2[0] </td>
              <td>$val2[3] </td>
              <td>
                <form method='post' action ='admin.php'>
                  <input class='deletebutton' type='submit' value='" . $idconv . "' name='delete1'/>
                </form>
              </td>
              </tr></tbody>";

              if(isset($_POST['delete1'])  && $_POST['delete1'] == $idconv){
                $request5="DELETE FROM `conversation` WHERE id_conversation = '$idconv' ";
                $query5=mysqli_query($connect,$request5);

                header("location:admin.php");
              }
            }
          ?> 
          </table>
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
              $idtopic = $val[1];
              echo "<tbody>
              <tr>
              <td>$val[1] </td>
              <td>$val[2] </td>
              <td>$val[0] </td>
              <td>$val[3] </td>
              <td><a href='topic.php?id=$val[0]'>
                <form method='post' action ='admin.php'>
                  <input class='deletebutton' type='submit' value='" . $idtopic . "' name='delete'/>
                </form></a>
              </td>
              </tr></tbody>";

              if(isset($_POST['delete']) && $_POST["delete"] == $idtopic){
                $request4="DELETE FROM `topic` WHERE id_topic = '$idtopic' ";
                $query4=mysqli_query($connect,$request4);

                header("location:admin.php");
              }
            }
          ?> 
            </table>
          </section>
        </section>

        
      </section>

      <?php if($_SESSION["login"] == "admin"):?>
              
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
               if ($val[7]== "2"){
		         echo "<tbody>
              <tr>
              <td>$val[0] </td>
              <td>$val[2] </td>
              <td>$val[6] </td>
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
                <td>$value[6] </td>
                <td><img id='minipic' src=$value[5] alt='profilepic'</td>
                <td><a href='members.php?id=$value[0]'>MODIFIER</a></td>
                </tr>
                </tbody>";
              }
          ?> 
          </table>
        </section>
      </section>
      <?php endif ?>
    </main>
    <footer>
      <?php include("includes/footer.php"); ob_end_flush()?>
    </footer>
</body>
</html><?php
ob_start();
session_start();
$connect = mysqli_connect("localhost", "root", "root", 'forum');

$request = "SELECT * FROM utilisateurs ORDER by date DESC";
$query = mysqli_query($connect, $request);
$infos = mysqli_fetch_all($query);

$request1 = "SELECT utilisateurs.login, topic.id_topic, topic.topic_name, topic.date_topic FROM utilisateurs INNER JOIN topic ON utilisateurs.id = topic.id_utilisateur ORDER by date_topic DESC";
$query1 = mysqli_query($connect , $request1);
$topics = mysqli_fetch_all($query1);

$request3 = "SELECT utilisateurs.login, conversation.id_conversation, conversation.msg_conv, conversation.date_conversation FROM utilisateurs INNER JOIN conversation ON utilisateurs.id = conversation.id_utilisateur ORDER by date_conversation DESC";
$query3 = mysqli_query($connect , $request3);
$conversations = mysqli_fetch_all($query3);

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
        <h1>PANEL BOARD</h1>
        <section id="subjects">
          <section id="section-top1">
          <h2>LISTE CONVERSATIONS</h2>
          <table id="table1">
			      <thead>
			        <tr>
              <th>id</td>
				      <th>titre</td>
              <th>nom_createur</td>
              <th>date création</td>
              <th></td> 
			        </tr>
			      </thead>
          
          <?php
           	foreach ($conversations as $val2){
              $idconv = $val2[1];
              echo "<tbody>
              <tr>
              <td>$val2[1] </td>
              <td>$val2[2] </td>
              <td>$val2[0] </td>
              <td>$val2[3] </td>
              <td>
                <form method='post' action ='admin.php'>
                  <input class='deletebutton' type='submit' value='" . $idconv . "' name='delete1'/>
                </form>
              </td>
              </tr></tbody>";

              if(isset($_POST['delete1'])  && $_POST['delete1'] == $idconv){
                $request5="DELETE FROM `conversation` WHERE id_conversation = '$idconv' ";
                $query5=mysqli_query($connect,$request5);

                header("location:admin.php");
              }
            }
          ?> 
          </table>
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
              $idtopic = $val[1];
              echo "<tbody>
              <tr>
              <td>$val[1] </td>
              <td>$val[2] </td>
              <td>$val[0] </td>
              <td>$val[3] </td>
              <td><a href='topic.php?id=$val[0]'>
                <form method='post' action ='admin.php'>
                  <input class='deletebutton' type='submit' value='" . $idtopic . "' name='delete'/>
                </form></a>
              </td>
              </tr></tbody>";

              if(isset($_POST['delete']) && $_POST["delete"] == $idtopic){
                $request4="DELETE FROM `topic` WHERE id_topic = '$idtopic' ";
                $query4=mysqli_query($connect,$request4);

                header("location:admin.php");
              }
            }
          ?> 
            </table>
          </section>
        </section>

        
      </section>

      <?php if($_SESSION["login"] == "admin"):?>
              
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
               if ($val[7]== "2"){
		         echo "<tbody>
              <tr>
              <td>$val[0] </td>
              <td>$val[2] </td>
              <td>$val[6] </td>
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
                <td>$value[6] </td>
                <td><img id='minipic' src=$value[5] alt='profilepic'</td>
                <td><a href='members.php?id=$value[0]'>MODIFIER</a></td>
                </tr>
                </tbody>";
              }
          ?> 
          </table>
        </section>
      </section>
      <?php endif ?>
    </main>
    <footer>
      <?php include("includes/footer.php"); ob_end_flush()?>
    </footer>
</body>
</html>