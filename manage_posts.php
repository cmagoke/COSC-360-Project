<?php
    include "db.php";
    session_start();
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
    <?php
        if(!isset($_SESSION['user']) || $_SESSION['user'] != 1 ){
            header("Location: signin.php");
        }          
    ?>
    <div id="header">
        <a href="adminpage.php">TextHub Admin</a>
        <form action="searchPost.php" method="get">
            <input type="search" id="search" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>
        <button id="logout" onclick="window.location.href='processLogout.php'">Log Out</button>
    </div>
    <div id="main">
        <div class="subtitle">All Posts</div>
        <?php
            $found = false;
            $sql = "SELECT * FROM Post";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $found = true;
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
            if($found == false){
                echo "<br><h3> No Posts Found</h3>";
            }
        ?>
    </div> 
</body>
</html>
