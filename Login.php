<?php session_start();
include("navbar.php");
require_once "/home/mir/lib/db.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- For at den viser hjemmesiden ordenligt på telefon -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <!--  Den valgt font -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #99CCCC;
    }
  </style>
</head>

<body class="body">

  <?php

  // 1. If someone already logged in, redirect to secret page.
  if (!empty($_SESSION['user'])) {
    header('Location: main.php');
    exit;
  }

  // 2. Otherwise, if known user tried to log in, register her as
  //    logged in and redirect to secret page.
  if (isset($_POST['username']) && $_POST['password']) {

    if (login($_POST['username'], $_POST['password']) == true) {

      $_SESSION['user'] = $_POST['username'];
      header('Location: main.php');
      $_SESSION['loggedin'] = true;

    } else {

      echo "<strong>Wrong Username or Password Try Again!</strong>";
      echo "<br>";
      echo "<strong>Please Wait!</strong>";
      header("refresh:3;url=Login.php"); //refresh efter 3sek og tilbage til Login page
    }

  } else { ?>
    </div>
    <div class="beholder">
      <div class="indpakning">
        <div class="title"><span>Write Your Info</span></div>
        <form method="POST" action="">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="username">
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="password">
          </div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="Opret-bruger.php">Signup now</a></div>
        </form>
      </div>
    </div>
  <?php } ?>


</body>

</html>