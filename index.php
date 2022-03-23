<?php
  // Initialiser la session
  session_start();
  require('config.php');
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  } else {
      
  }



?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <header class="header" style="display: flex;">
	    <h1 class="logo"><a href="#">Flexbox</a></h1>
        <ul class="main-nav">
            <li><a href="#">Profil</a></li>
            <li><a href="#">Voter</a></li>
            <li><a href="#">Organiser</a></li>
            <li><a href="logout.php">Deconnexion</a></li>
        </ul>
	</header> 
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p>C'est ici que vous trouverez les elections en cours :</p>
    <a href="logout.php">Déconnexion</a>
    </div>


  </body>
</html>