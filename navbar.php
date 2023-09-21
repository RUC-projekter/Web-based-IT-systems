<?php
session_start();
require_once '/home/mir/lib/db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> <!-- font -->
    <style>
        .hidden {
            display: none;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="Home.php">
            <img src="https://seeklogo.com/images/B/blogger-icon-logo-93FC9A4806-seeklogo.com.png" alt="Bootstrap" width="30" height="24" class="d-inline-block align-top">
            <span class="hidden">blogger</span>
          </a>    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" <?php if($_SESSION['loggedin'] == true){   //for at skiftvise mellem login og logout
                echo 'href="Logout.php">Logout';
              } else {
                echo 'href="Login.php">Login';
              } ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Opret-bruger.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="main.php">Main</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Home.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </body>
</html>
