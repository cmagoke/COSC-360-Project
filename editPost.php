<?php
  include "db.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Post</title>
    <link rel="stylesheet" href="./css/poststyles.css" />
  </head>
  <body>
    <?php
        if(!isset($_SESSION['user']) || $_SESSION['user'] != 1 ){
            header("Location: signin.php");
        }          
    ?>
    <div class="header">
    <a href="adminpage.php">TextHub Admin</a>
    <button id="logout" onclick="window.location.href='processLogout.php'">Log Out</button>
    </div>
    <div class="rectangle">
    <form action="processEdit.php" method="post">
        <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET['p'])){
                $postid = $_GET['p'];
                $sql = "SELECT * FROM Post WHERE PostId = '$postid'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                echo 
                "<div>" . $row['Username'] . " - " . $row['DateTime'] . "</div>
                <input id=\"title\" name=\"title\" type=\"text\" class=\"title\" value=\"" . $row['Title'] . "\">
                <textarea id=\"descrip\" name=\"descrip\" class=\"small-rectangle\">" . $row['Description'] . "</textarea>
                <input type=\"hidden\" id=\"postid\" name=\"postid\" value=\"". $postid . "\">
                <button id=\"done\" type=\"submit\">Done</button>";
            }
        }
        ?>
    </form>
    </div>
  </body>
</html>
