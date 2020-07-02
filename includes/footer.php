<footer>
  <section id="footerleft">
    <ul>
      <li><a href="index.php">homepage</a></li>
      <li><a href="topic.php">topics</a></li>
      <?php 
        $connect = mysqli_connect('localhost','root','','forum');

        if (isset($_SESSION["login"])){
          if($_SESSION["login"] == "admin"){
      ?>
         <li><a href="admin.php">espace admin</a></li>
         <li><a href="moderation.php">espace moderation</a></li> 

      <?php
           }
           else{
            ?>
          <li><a href="profil.php">profil</a></li>
      <?php
           }
      ?> 
      <li><form action="index.php" method="post">
            <input class="deco" name="deco" value="DECONNEXION" type="submit"/>
          </form>
      </li>

      <?php
        }else{
      ?>
      <li><a href="connexion.php">categories</a></li>
      <li><a href="connexion.php">profil</a></li>
      <li><a href="connexion.php">espace admin</a></li>
      <li><a href="connexion.php">se connecter</a></li>
      <?php }?>
    </ul>
  </section> 

  <section id="footercenter">
    <section id="bottom-logo"> 
      <img id="logo" src="https://i.ibb.co/8nC21YQ/logo1-wow.png" alt="logo1-wow"/>
      <h1><a href="index.php">THE WOW'S CLAN</a></h1>
    </section>

    <address id="contact">
      <a href="mailto:hello@thewowsclan.com">hello@thewowsclan.com</a>
    </address>
    
    <section id="social-media">
      <ul id="social-list">
        <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></i></a></li>
        <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://www.discord.com" target="_blank"><i class="fab fa-discord"></i></a></li>
        <li><a href="https://www.twitch.com" target="_blank"><i class="fab fa-twitch"></i></a></li>
      </ul>
    </section>
   
    <p id="copyright">&copy; 2020 THE WOW'S CLAN</p>
  </section>  

  <section id="footerright">
   <h2>qui sommes nous?</h2>
    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
    </p>
    <section id="newsletter">
      <h3>inscris-toi à notre newsletter</h3>
      <form action="" method="POST">
        <input type="text" id="news" name="emailnews" placeholder="Enter your email"></br>
        <input type="submit" name="submitnews" id="btnnews" value="envoyer">
      </form>

      <?php
      
      if(isset($_POST['submitnews'])){
        $email = $_POST['emailnews'];
      
        $request1 = "SELECT email FROM newsletter" ;
        $req = mysqli_query($connect,$request1);
        $exist = mysqli_fetch_all($req);

        if (empty($email)){
          echo '<p class="newsmessage" >veuillez remplir tous les champs</p>';
        }

        else {
          $request = "INSERT INTO newsletter (email) VALUES ('$email')";
          $query = mysqli_query($connect, $request);
          header("location:index.php");

          echo '<p class="newsmessage">votre email a bien été enregistré</p>';
        }
      }
      ?>
    </section>
  </section> 
</footer>