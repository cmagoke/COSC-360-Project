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
        <form action="searchUser.php" method="get">
            <input type="search" id="search" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>
        <button id="logout" onclick="window.location.href='processLogout.php'">Log Out</button>
    </div>
    <div id="main">
    <div class="subtitle">Users</div>
        <?php
        $found = false;
        $found2 = false;
        if (isset($_GET['search']) && !empty(trim(($_GET['search'])))) {
            echo "<h1>Search results for: ". $_GET['search'] ."</h1>";
            $searchFor = '%' . $_GET['search'] . '%';
            $sql = "SELECT * From User WHERE Username LIKE ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $searchFor);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                if($row['Disabled'] == false && $row['UserId'] != 1){
                    $found = true;
                    echo "<div class=\"entry\">
                    <div class=\"profile\"><img src=\"showImage.php?user=" . $row['Username'] . "\"></div>
                    <div class=\"info\">
                        <div class=\"title\">" . $row['Fullname'] . "</div>
                        <div class=\"username\">" . $row['Username'] . "</div>
                        <div class=\"email\">" . $row['Email'] . "</div>
                        <div class=\"number\">" . $row['PhoneNumber'] . "</div>
                    </div>
                    <button id=\"disable\" onclick=\"disable(" . $row['UserId'] . ")\">Disable</button>
                </div>";
                }
                if($row['Disabled'] == true && $row['UserId'] != 1){
                    $found = true;
                    echo "<div class=\"entry\">
                    <div class=\"profile\"><img src=\"showImage.php?user=" . $row['Username'] . "\"></div>
                    <div class=\"info\">
                        <div class=\"title\">" . $row['Fullname'] . "</div>
                        <div class=\"username\">" . $row['Username'] . "</div>
                        <div class=\"email\">" . $row['Email'] . "</div>
                        <div class=\"number\">" . $row['PhoneNumber'] . "</div>
                    </div>
                    <button id=\"enable\" onclick=\"enable(" . $row['UserId'] . ")\">Enable</button>
                </div>";
                }
            }
            if($found == false){
                echo "No users found";
            }
        }else{
            echo "<h1>Search results for: ". $_GET['search'] ."</h1>";
            echo "No users found";
        }
        ?>
    </div>
</body>
</html>