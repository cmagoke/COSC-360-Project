<?php
 include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextHub</title>
   <link rel="stylesheet" href="./css/styles.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <script type="text/javascript" src="js/buttons.js"></script>
</head>
<body>
    <div id="header">
        <a href="homepage.php">TextHub</a>
        <input type="search" placeholder="Search">
        <button id="login" onclick="window.location.href='signin.php'">Log in</button>
        <button id="signup" onclick="window.location.href='signup.php'">Sign Up</button>
    </div>
    <div id="main">
       
         <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $username = $_GET['user'];
                    if(isset($username)){
                        echo " <h2> Add image for " . $username . "</h2>
                        <form enctype=\"multipart/form-data\" method=\"post\" action=\"addImage.php\">
                        <input type=\"file\" id=\"pic\" name=\"pic\" accept=\"image/*\">
                        <input type=\"hidden\" id=\"user\" name=\"user\" value=\"" . $username . "\">
                        <button type=\"submit\" id=\"upload\" name=\"upload\">Upload</button>
                        </form>"; 
                    }
                }
                   // echo "<img src=\"showImage.php?user=" . $username . "\" alt=\"Profile Picture\">";
                
        ?> 
    </div> 
</body>
</html>

