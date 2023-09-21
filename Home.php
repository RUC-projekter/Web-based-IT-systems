<?php
session_start();
require_once '/home/mir/lib/db.php';
include ("navbar.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For at den viser hjemmesiden ordenligt på telefon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> <!-- font -->
    <title>Home</title>
  </head>
  <body class="body">

		<p></p>

		<p><strong>Se egne opslag</strong> <a href="2.php?uid=<?php echo $_SESSION['user'] ?>">her</a>.</p>

		<p><strong>Se</strong> <a href="3.php">alle brugere</a>.</p>

  </body>
</html>
