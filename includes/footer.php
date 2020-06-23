<footer>
  <section id="footerleft">
    <ul>
      <li><a href="index.php">homepage</a></li>
      <li><a href="categorie.php">categories</a></li>
      <li><a href="topic.php">topics</a></li>
      <li><a href="profil.php">profil</a></li>
      <li><a href="admin.php">espace admin</a></li>

      <?php 
        if (isset($_SESSION["login"])):
      ?>    
      <li><form action="index.php" method="post">
            <input id="deco" name="deco" value="DECONNEXION" type="submit"/>
          </form>
      </li>
      <?php
        else :
      ?>
      <li><a href="connexion.php">se connecter</a></li>
      <?php endif;?>
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
      <form action="">
        <input type="text" id="news" name="email" placeholder="Enter your email"></br>
        <input type="submit" id="btnnews" value="envoyer">
      </form>
    </section>
  </section> 
</footer>