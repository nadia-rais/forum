<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", 'forum');

$request = "SELECT * FROM utilisateurs ORDER by date DESC";
$query = mysqli_query($connect, $request);
$infos = mysqli_fetch_all($query);

/*$request1 = "SELECT * FROM topics ORDER by date DESC";
$query1 = mysqli_query($connect, $request1);
$topics = mysqli_fetch_all($query1);
IDEM POUR LES CATÉGORIES*/
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
          <h2>LISTE TOPICS</h2>
          <?php
           	/*foreach ($topics as $value){
		
              echo "<tbody>

              mettre les titres + lien modifier 
               
             }*/
          
          ?> 
          </section>
          <section id="section-top">
          <h2>LISTE TOPICS</h2>
          <?php
           	/*foreach ($categories as $value){
		
              echo 

              mettre les categories + lien modifier 
               
             }*/
          
          ?> 
          </section>
        </section>
      </section>

      <section id="users">
        <h1>LISTE DES MEMBRES</h1>
        <section id="containertable">
          <section id="container_modo">
            <h2>LISTE DES MODÉRATEURS</h2>
            <?php
           	/*foreach ($categories as $value){
		
              echo 

              mettre les noms des modérateurs  + lien modifier
               
             }*/
          
          ?> 
          </section>
    
          <table>
			      <thead>
			        <tr>
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