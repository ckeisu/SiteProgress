<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="assets/css/main.css" type="text/css" />
  </head>
  <body>
    <?php
    include 'connection.php';

    $epost = mysqli_real_escape_string($conn, $_POST['epost']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    //Random salt generator
    function createsalt() {
      $randomstring = "";

      for($i = 1; $i < 10; $i++)
      {
        $random = $randomstring.rand();
      }
      return $random;
    }


    $randomsalt = mysqli_real_escape_string($conn, createsalt());
    $salted = $randomsalt.$password;
    $hashed = mysqli_real_escape_string($conn, hash('sha512', $salted));
    $sql = "INSERT INTO User (epost, password, salt ) VALUES ('".$epost."', '".$hashed."', '".$randomsalt."')";

    $alreadyuser="SELECT * FROM User WHERE epost='$epost'";
    $ifuser= mysqli_query($conn, $alreadyuser) or die("Bad SQL: $ifuser" );

    if(empty($_POST['epost']))
    {
      echo "Du måste fylla i en epost";
    }
    else if(empty($_POST['password']))
    {
      echo "Du måste fylla i ett lösenord";
    }
    else if((strpos($_POST['password'], '@') !== false) && (strpos($_POST['password'], '.') !== false))
    {
      echo "Du måste skriva in en giltig e-postadress";
    }
    else if (mysqli_num_rows($ifuser)>=1)
         {
           echo "<h1> Du är redan registrerad med den epost:en! </h1>";
           echo '<div>
                  <form action="login.php">
                  <input type="submit" value="Logga in! " id= "redirect" />
                  </form>
                </div>';
         }
         else if ($conn->query($sql) === TRUE)
              {
                echo "<h1> Tack! Du är nu registrerad. </h1>";
                echo '<div>
                                    <form action="login.php">
                                    <input type="submit" value="Logga in! " id= "redirect" />
                                    </form></div>';

              }
              else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                echo "<h1> Registrationen misslyckades. Var vänlig försök igen!</h1>";
              }


    // if(mysqli_num_rows($ifuser)>=1)
    //    {
    //      echo "<h1> Du är redan registrerad med den epost:en! </h1>";
    //      echo '<div>
    //                          <form action="login.php">
    //                          <input type="submit" value="Logga in! " id= "redirect" />
    //                          </form></div>';
    //    }
    //    else if ($conn->query($sql) === TRUE)
    //         {
    //           echo "<h1> Tack! Du är nu registrerad. </h1>";
    //           echo '<div>
    //                               <form action="login.php">
    //                               <input type="submit" value="Logga in! " id= "redirect" />
    //                               </form></div>';
    //
    //         } else {
    //           echo "Error: " . $sql . "<br>" . $conn->error;
    //           echo "<h1> Registrationen misslyckades. Var vänlig försök igen!</h1>";
    //         }
    ?>

  </body>
</html>
