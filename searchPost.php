<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextHub Homepage</title>
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
        <div class="subtitle">Posts</div>
        <?php
        $found2 = false;
        if (isset($_GET['search']) && !empty(trim(($_GET['search'])))) {
            echo "<h1>Search results for: ". $_GET['search'] ."</h1>";
            $searchFor = '%' . $_GET['search'] . '%';
            $sql2 = "SELECT * From Post WHERE Username LIKE ? OR Title LIKE ? OR Subforum LIKE ?";
            $stmt2 = $con->prepare($sql2);
            $stmt2->bind_param("sss", $searchFor,$searchFor,$searchFor);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            while($row = $result2->fetch_assoc()){
                $found2 = true;
                echo  "<div class=\"entry2\">
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
            if($found2 == false){
                echo "No posts found";
            }
        }else{
            echo "<h1>Search results for: ". $_GET['search'] ."</h1>";
            echo "No posts found";
        }
        ?>
    </div>
</body>
</html>