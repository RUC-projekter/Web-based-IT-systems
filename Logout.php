<?php
 session_start();
 session_destroy();
 require_once '/home/mir/lib/db.php';
 include ("navbar.php");
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title>Logout Page</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- for at den viser hjmme side ordnligt på telefon -->
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> <!-- font -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <style>
       body{
         background: #99CCCC;
       }
   </style>
 </head>
   <body>
     <?php
      echo "<h1>You are now logged out!</h1>";
      echo "<br>";
      echo "<strong>Come back as soon as possible, have a nice day</strong>";
      echo "<br><br>";
      ?>
     <div class="logout-button">
       <a href="Login.php" class="btn btn-success">Login again</a>
     </div>
	</body>
</html>
