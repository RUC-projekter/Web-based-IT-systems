<?php  session_start();
include ("navbar.php");
require_once "/home/mir/lib/db.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>List af bruger</title>
  </head>
  <body>

    <?php
    echo "<strong>List af bruger:</strong>";

    $uids = get_uids();
    foreach ($uids as $uid) {                         // for each element in array...

          "<ol>";
            echo "<a href='2.php?uid=$uid'</a>";       // ... refer til 2.php
            echo "<p> <li> $uid </li> </p>";
          "</ol>";
        }
    ?>

    <style type="text/css">
        body {background-color: #99CCCC;}

  </body>
</html>
