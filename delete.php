<?php session_start();?>
<?php
include ("navbar.php");
require_once '/home/mir/lib/db.php';

$cid = $_GET['cid'];
delete_comment($cid);
if (delete_comment('cid')) {
  echo "<strong>Den er blevet slettet</strong>";
  echo "<br>";
  echo "<strong>Please Wait!</strong>";
  header( "refresh:2;url=main.php" ); //refresh efter 2sek og tilbage til main page
} else {
  echo "fejl";
}
?>
