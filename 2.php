<?php  session_start();
include ("navbar.php");
require_once "/home/mir/lib/db.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Egen Indlæg</title>
  </head>
  <body>

    <?

    $uid= $_GET['uid'];
    $pids = get_pids_by_uid($uid);

    echo "<strong>List af titler:</strong>";
    foreach ($pids as $pid)
    {
      $post = get_post($pid);
      $posttitle = $post['title'];
      get_post($pid);
      echo "<a href ='1.php?pid=$pid'</a><br>";
      echo $posttitle;
    }

    ?>
    <style type="text/css">
        body {background-color: #99CCCC;}

  </body>
</html>
