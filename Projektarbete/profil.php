<?php
//startar en session.
session_start();
// Kolla om användaren är inloggad, och då får denna tillgång till index.php, säkerhetskoll
if(!isset($_SESSION['loggedin']))
{
 header('Location:loggain.php');
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title> Profil </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  </head>
  <body>
    <div class="header">
      <h1> Användarprofil </h1>
    <ul>
      <li><a class="active" href="firstpage.php">Hem</a></li>
      <li> <a href="message.php">Meddelande</a></li>
    </ul>
  </div>

  <div class="about">


    <h2> About </h2>
    <p> Namn: </p>
    <br>
    <p> Epost: </p>



    </div>

    <div class="footer">
    </div>
  </body>
</html>
