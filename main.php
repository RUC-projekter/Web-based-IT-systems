<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Main</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- for at den viser hjmme side ordnligt på telefon -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> <!-- font -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- CSS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> <!-- JS -->
  <style>
      .hidden {
          display: none;  <!-- for at fjene navn på logo -->
      }
      .m{
          overflow-x: hidden; <!-- for at fjene scroll til højrer -->
      }
      body{
        margin: 50px; <!-- palcer det i centrum -->
        background-color: lightblue;
      }
  </style>
</head>
  <body class="m">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="https://wits.ruc.dk/~moaz/wits09/eksamen/Home.php">
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

      <?php
      require_once '/home/mir/lib/db.php';

      echo "<br>";

      if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true) {
       echo "<form action='main.php' method='POST' enctype='multipart/form-data'>
          <br>
         <h1><strong>Create a post:</strong></h1>
         <table>
           <tr>
           <td><strong>Title:</strong></td>
           <td><input type='text' name='title'></td>
           </tr>
           <tr>
             <!--//opretter et felt hvor det er muligt at skrive større tekst imodsætning til input-->
           <td><strong>Content:</strong></td>
           <td><textarea id='content' name='content' rows='4'cols='45'></textarea></td>
           </tr>
           <tr>
            <td></td><td><input type= 'file' name= 'picture[]' value= 'Upload et billede' multiple= 'multiple'></td>
           </tr>
           <tr>
           <td><strong>Share:</strong></td>
           <td><input type='submit' name = 'submitbutton' value='Submit' class='btn btn-warning'></td>
           </tr>
         </table>
       </form>";
     }
       if (isset($_POST['submitbutton']) & !empty($_POST['title']) & !empty($_POST['content'])) {
          // tilføjer opslaget og henter post id
          $pid = add_post($_SESSION['user'], $_POST['title'], $_POST['content']);
          // hvis brugeren har tilføjet et billede tilføjer vi billedet til postet
            if (isset($_FILES['picture']['type'])){
            // herefter tilføjer vi billedet til opslaget
              for ($i=0; $i < count($_FILES['picture']['name']); $i++){
                $tempFilePath = $_FILES['picture']['tmp_name'][$i]; // Vi tager den temp fil-sti fra det i'de billede
                $tempType = "." . substr($_FILES['picture']['type'][$i], strpos($_FILES['picture']['type'][$i],'/')+1); // Vi kigger på filtypen og gemmer den til en enkel streng
                $iid = add_image($tempFilePath, $tempType);
                  if ($iid > 0){
                    $newFilePath = $_FILES['picture']['name'][$i];
                    move_uploaded_file($tempFilePath, $newFilePath); //Vi flytter den uploadede fil til den nye filepath
                    add_attachment($pid, $iid); //Vi tilføjer billedet til post
                  }
                }
              }
              // Vi refresher siden
              header("Refresh:0");
            }
              $pids = get_pids(); // vi fanger posts pids
              foreach ($pids as $pid) { //hver gange man kigger på pids, tag posts til et array
                $posts[] = get_post($pid);
              }
              $posts = array_reverse($posts); // for at vise den nyeste posts først
              foreach ($posts as $post) {
                $user = get_user($post['uid']); //benytter bruger-id fra posts til at finde forfætteren info
                echo '<div class = "row" style="border: 5px double black;">';
                $postpid = $post['pid'];
                /* if($_SESSION['user'] == $post['uid']){
                  echo "<a href=modify.php?pid=$postpid ><button type='button' class='btn btn-danger'>Edit Content</button></a>";
                } */

                echo "<div> ". $user['uid'] ." </div>";
                echo "<div>". $post['date'] ." </div>";
                echo "<div> <h2> ". $post['title'] ." </h2> </div>";
                echo "<div>". $post['content'] ." </div>";
                $images = get_iids_by_pid($post['pid']); // for at hente alle billeder
                echo "<div class= 'row'>";
                foreach ($images as $iid) {
                  $path = get_image($iid)['path'];
                  echo "<div class = 'image-wrapper'>";
                  echo "<img class='rounded float' src='$path' height='300'></div>";
                }
                echo "</div>";
                $cids = get_cids_by_pid($post['pid']);
                foreach ($cids as $cid) {
                  $comment = get_comment($cid);
                  if($_SESSION['user'] == $comment['uid'] || $_SESSION['user'] == $user['uid']){
                    $cid = $comment['cid'];
                    echo "<a href=delete.php?cid=$cid><button type='button' class='btn btn-danger'>Delete Comment</button></a>";
                  }

                  echo "<div class = 'row' style = 'border: 5px double blue; margin:0px;'>";
                  echo "<div>". $comment['uid'] ." </div>";
                  echo "<div>". $comment['content'] ." </div>";
                  echo "<div>". $comment['date'] ." </div>";
                  echo "</div>";
                }
                // lave en form for hver post så kan vi kommenter på indlæg
                if ($_SESSION['loggedin'] == true){
                  echo '
                  <form action="kommenter.php" method="POST" >
                  <table>
                  <tr>
                  <td></td>
                    <td><input type="hidden" name="pid" value='.$post["pid"].'></td>
                    </tr>
                    <tr>
                    <!--//opretter et felt hvor det er muligt at skrive større tekst imodsætning til input-->
                    <td><strong>Content:</strong></td>
                    <td><textarea id="content" name="content" rows="3"cols="35" value="Skriv kommentar her">
                    </textarea></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><input type="submit" value="Indsend kommentar" class="btn btn-warning">';
										if($_SESSION['user'] == $post['uid']){
		                  echo "<a href=modify.php?pid=$postpid ><button type='button' class='btn btn-danger'>Redigér oplæg</button></a>";
		                }
										echo '
										</td>
                    </tr>
                  </table>
                  </form>';
                }
                echo '</div>';
              }
              ?>

            </div>
          <?php
            if (empty($_SESSION['user']))
            {
              header('Location: Login.php');
              exit;
            }
          ?>
  </body>
</html>
