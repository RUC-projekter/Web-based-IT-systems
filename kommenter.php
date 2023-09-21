<?php
session_start();
require_once '/home/mir/lib/db.php';

add_comment($_SESSION['user'],$_POST['pid'] , $_POST['content']);

header("location: main.php");
?>
