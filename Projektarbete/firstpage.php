<?php
  session_start();
  if(!isset($_SESSION['inlogged'])){
    header("Location:Login.php");
  }
  else
  {
    $username = $_SESSION['username'];
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title> Studentchatten </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
    <div class="header">
      <h1> Pluggkollen <?php echo $username  ?></h1>
    <ul>
      <li><a class="active" href="firstpage.php">Hem</a></li>
      <li><a href="profil.php">Profil</a></li>
      <li><a href="rewards.php">Belöningar</a></li>
      <li><a href="mentorskap.php">Mentorskap</a></li>
    </ul>
  </div>
  <div class="middle">
    <div class="searchbardiv">
      <form name=""action="">
        <h2> Sök till en kurs eller ett program här </h2>
        <input type="text" placeholder="Sök på en kurs..." id="searchbar">
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i> 
        </button>
      </div>
      </form>
    </div>
    <div class="footer">
    </div>
  </body>
</html>
