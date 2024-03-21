<?php
    include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextHub Admin</title>
   <link rel="stylesheet" href="./css/adminstyles.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <script type="text/javascript" src="js/buttons.js"></script>
</head>
<body>
    <div id="header">
        <a href="adminpage.php">TextHub Admin</a>
        <input type="search" placeholder="Search">
        <button id="logout" onclick="window.location.href='processLogout.php'">Log Out</button>
    </div>
    <div id="main">
        <div class="subtitle">All Posts</div>
        <?php
             $sql = "SELECT * FROM Post";
             $result = mysqli_query($con, $sql);
             if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    echo
                    "<div class=\"entry2\">
                    <div>
                        <div class=\"heading\">". $row['Subforum'] . " - " . $row['DateTime'] ."</div>
                        <div class=\"username\">" . $row['Username'] . "</div>
                        <div class=\"title\">" . $row['Title'] . "</div>
                        <p>". $row['Description'] . "</p>
                    </div>
                    <button id=\"edit\" onclick=\"editPost(" . $row['PostId'] . ")\">Edit</button>
                    <button id=\"delete\" onclick=\"deletePost(" . $row['PostId'] . ")\">Delete</button>
                    </div>";
                }
             }else{
                echo "<div class=\"entry2\"> No Posts Found</div>";
             }
        ?>
    </div> 
</body>
</html>
