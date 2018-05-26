<?php
//startar en session.
session_start();
// Kolla om användaren är inloggad, och då får denna tillgång till index.php, säkerhetskoll
if(!isset($_SESSION['inlogged']))
{
 header('Location:login.php');
}
else {
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
    Hej <?php echo $username ?>! Ditt genomsnittliga omdöme är:


<?php
include 'connect.php';
$sql = "SELECT AVG(rating) AS avgRating
FROM omdome
WHERE personnummer='777777'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<h2>". $row["avgRating"]."</h2><br>";
    }
} else {
    echo "Du har inga omdömen ännu!";
}
?>

<br> Du har
<?php
include 'connect.php';
$sql = "SELECT COUNT(personnummer) AS countRating
FROM omdome";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<h2>". $row["countRating"]."</h2>";
    }
} else {
    echo "Du har inga omdömen ännu!";
}
?> omdömen.

    </div>

    <div class="footer">
    </div>
  </body>
</html>
