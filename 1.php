<?php  session_start();
include ("navbar.php");
require_once "/home/mir/lib/db.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Posts</title>
  </head>
  <body>

    <?php
    $pid = $_GET['pid'];
    $post = get_post($pid);
    echo '<h1>'.$post['title'].'</h1>';
    echo $post['content'],"<br><br>";
    $uid = $post['uid'];
    $user = get_user($uid);
    echo "<strong>Firstnavn: </strong>";
    echo $user['firstname'],"<br><br>";

    echo "<strong>Lastname: </strong>";
    echo $user['lastname'],"<br><br>";

    echo "<strong>Username: </strong>";
    echo "<a href =\"2.php?uid=". $uid ."\">". $uid. "</a><br><br>";

    $iids = get_iids_by_pid($pid);
    foreach ($iids as $iid)
    {
      $path = get_image($iid) ['path'];
      echo "<img src =\"".$path."\""." width =200>";
    }

    $cids = get_cids_by_pid($pid);
    foreach ($cids as $cid)  //forech loop viser hvilken info der skal køres sammen
    {
      echo "<strong><br>kommenter af: </strong><br>";
      $comment = get_comment($cid);
      $userinfo=get_user($comment['uid']);
      //her sætter vi variabel ind så under kommentarerne kan man klikke
      //- på enkelte brugere og komme til deres profiler
      $useruid = $user['uid'];
      $username = $userinfo['firstname']. " ".$userinfo['lastname'];
      //giver link med href
      echo "<a href= '2.php?uid=$userid' >$username:</a>";
      echo " ", $comment['content'], "<br>";
    }

    ?>
    <style type="text/css">
        body {background-color: #99CCCC;}
		</style>

  </body>
</html>
