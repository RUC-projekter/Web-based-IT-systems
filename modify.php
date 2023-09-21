<?php session_start();?>
<?php
include ("navbar.php");
require_once '/home/mir/lib/db.php';

$uid = $_SESSION['user'];
$pid = $_GET['pid'];
$post= get_post($pid);
$user= get_user($uid);
$pid = $_GET ['pid'];
$title = $_GET ['title'];
$content = $_GET ['content'];
$ændre = modify_post($pid,$title,$content);

if ($post["uid"] == $user["uid"]) {?>
    <form action="modify.php" method="GET">
      <table>
        <tr>
          <br>
        <td></td>
        <td><input type="hidden" name="pid" value="<?php echo $post['pid']; ?>"></td>
        </tr>
        <tr>
        <td>Title:</td>
        <td><input type="text" name="title" value="<?php echo $post['title']; ?>">
        </td>
        </tr>
        <tr>
          <!--//opretter et felt hvor det er muligt at skrive større tekst imodsætning til input-->
        <td>Content:</td>
        <td><textarea id="content" name="content" rows="5"cols="50"><?php echo $post['content']; ?>
        </textarea></td>
        </tr>
        <tr>
        <td>Share:</td>
        <td><input type="submit" value="Edit Content"  <?php echo header("refresh:6;url=main.php"); //refresh efter 6sek ?>></td>

        </tr>
      </table>
    </form>

<?php
}
else {
  echo $post ['pid'];
  echo $post ['title'];
  echo $post ['content'];
    }
 ?>
 <!-- for at farve background-->
<style type="text/css">
   body {background-color: #99CCCC;}
