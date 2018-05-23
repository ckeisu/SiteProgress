<?php
// inkluderar allt som finns i filen db.php, dvs databasuppkopplingen.
include 'connect.php';

$epost =mysqli_real_escape_string ($conn,$_POST['epost']);
$pass =mysqli_real_escape_string ($conn,$_POST['pass']);


// salt stuff from db, hämtar saltet från databasen mha epostadressen, man kollar om raden epost är densamma epost som matats in.
$saltquery = "SELECT salt FROM user WHERE epost = '$epost'";
//här sker hämtningen.
$resultsalt = mysqli_query($conn, $saltquery);
$rowsalt = mysqli_fetch_assoc ($resultsalt);
$databasesalt = $rowsalt['salt'];

// password stuff from db, hämtar lösenordet, matchar lösen i db med det eposten som matats in.
$passquery = "SELECT password FROM user WHERE epost = '$epost'";
// här sker själva hämtningen.
$resultpass= mysqli_query ($conn,$passquery);
$rowpass= mysqli_fetch_assoc($resultpass);
$databasepass= $rowpass['password'];

$hashedPass = hash('sha256', $pass . $databasesalt);

if ($hashedPass===$databasepass){

session_start();
$_SESSION['loggedin']= $epost;

  echo "Du är inloggad";
  header('Location:firstpage.php');

}

  else {
    // om eposten inte finns registrerad någonstans så skickas användaren till registreringssidan.
    header('Location:index.php');
  }

mysqli_close($conn);

?>
