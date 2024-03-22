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
                    echo "<div><h2> Hello ". $row['Username'] . "!</h2></div>
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
        $found = false;
        $found2 = false;
        if (isset($_GET['search'])) {
            $searchFor = '%' . $_GET['search'] . '%';
            echo "<h2>Users</h2>";
            $sql = "SELECT * From User WHERE Username LIKE ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $searchFor);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                if($row['UserId'] != 1){
                    $found = true;
                    echo $row['Username'];
                }
            }
            if($found == false){
                echo "No users found";
            }
            echo "<h2>Posts</h2>";
            $sql2 = "SELECT * From Post WHERE Username LIKE ? OR Title LIKE ? OR Subforum LIKE ?";
            $stmt2 = $con->prepare($sql2);
            $stmt2->bind_param("sss", $searchFor,$searchFor,$searchFor);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            while($row = $result2->fetch_assoc()){
                $found2 = true;
                echo "Post: " . $row['Title'] . " User: " . $row['Username'];
            }
            if($found2 == false){
                echo "No posts found";
            }
        }
        ?>
    </div>
</body>
</html>