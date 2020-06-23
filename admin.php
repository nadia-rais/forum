<?php
session_start();
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
      <section class="info2">
        <?php

        if(($_SESSION['login'])=='admin'){

            $db = mysqli_connect("localhost","root","","forum");

                        $request="SELECT * FROM utilisateurs";
                        $query=mysqli_query($db,$request);
                        
                        ?>
                        <table>
                            <thead>
                                <tr><th colspan="3" id="admin-title">Administration</th></tr>
                                <tr id="admin-2title">
                                    <th>ID</th>
                                    <th>Identifiant</th>
                                    <th>Mot de passe</th>
                                </tr>
                            </thead>
                            <tbody><?php

                        while($value=mysqli_fetch_assoc($query)){?>
                                <tr>
                                    <td id="ID-admin"><?php echo $value['id'] ?></td>
                                    <td id="ID-admin"><?php echo $value['login'] ?></td>
                                    <td id="ID-admin"><?php echo $value['password']?></td>
                                </tr><?php } ?>
                            </tbody>
                        </table>

        <?php
        }

        else{
            header("location:index.php");
        }


        ?>

      </section>
    </main>
    <footer>
      <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>