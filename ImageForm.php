<?php
 include "db.php";
 session_start();
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
        <form action="search.php" method="get">
            <input type="search" id="search" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>
        <?php
             if(isset($_SESSION['user'])){
                $userid = $_SESSION['user'];
                $sql = "SELECT Username FROM User WHERE UserId = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $userid);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if(!is_null($row)){
                    echo "<div id=\"user\"><a href=\"userpage-posts.php\">Hello ". $row['Username'] . "!</a></div>
                    <button id=\"logout\" onclick=\"window.location.href='processLogout.php'\">Log Out</button>";
                }else{
                    echo "failed to get user";
                }
             }else{
                echo "<button id=\"login\" onclick=\"window.location.href='signin.php'\">Log in</button>
                <button id=\"signup\" onclick=\"window.location.href='signup.php'\">Sign Up</button>";
             }
        ?>
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
        <br>
        <a href="userpage-posts.php">Skip</a>
    </div> 
</body>
</html>

