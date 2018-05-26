<!DOCTYPE html>
<html>
  <head>
    <title> Registrera dig! </title>
    <link rel="stylesheet" href="assets/css/main.css" type="text/css" />
    <script src="assets/js/main.js"></script>
  </head>
  <body>
    <h1> Registrer dig </h1>
    <ul>
      <li><a href="login.php">Logga in</a></li>
      <li><a href="registration.php">Registrera dig</a></li>
    </ul>
    <div> </div>
    <form name="registration" method="POST" onsubmit="return registrationvalidate()" action="register.php">
        <label for="epost"> Namn: </label><br/>
        <input type="text" id="namn" name="namn"><br/>
        <label for="epost"> E-postadress: </label><br/>
        <input type="text" id="epost" name="epost"><br/>
        <label for="epost"> E-postadress </label><br/>
        <input type="text" id="epost" name="epost"><br/>
        <label for="password"> Lösenord </label><br/>
        <input type="password" id="password" name="password"><br/><br/>
        <input type="submit" value="Registrera dig!" id="skicka">
    </form>
  </body>
</html>
