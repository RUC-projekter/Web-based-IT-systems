<?php
session_start();
require_once '/home/mir/lib/db.php';
include ("navbar.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Register Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- for at den viser hjmme side ordnligt på telefon -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> <!-- font -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
      .hidden {
          display: none;
      }
      body{
        background-color: #99CCCC;
      }
  </style>
</head>
  <body>
    <div class="beholder2">
      <div class="indpakning">
        <div class="title2"><span>Register as a member</span></div>
        <form action="Opret-bruger.php" method="post">
          <div class="row">
            <i class='fas fa-user-alt'></i>
            <input type="text" name="firstname" placeholder="firstname">
          </div>
          <div class="row">
            <i class='fas fa-user-alt'></i>
            <input type="text" name="lastname" placeholder="lastname">
          </div>
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="username" placeholder="username">
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="password">
        </div>
        <div class="row button">
          <input type="submit" value="Register">
        </div>
        <div class="login-link">Already a member? <a href="https://wits.ruc.dk/~moaz/wits09/eksamen/Login.php">Login now</a></div>
    </form>

    <?php
    require_once '/home/mir/lib/db.php';
      //Her kalder vi på vores variabler via. vores action
      if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']))
      {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        //for at tilføje en bruger
        add_user($username, $firstname, $lastname, $password);

      }

    ?>

  </body>
</html>
