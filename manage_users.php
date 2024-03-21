<?php
    include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextHub Manage Users</title>
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
    <div id="enable_main">
        <div class="subtitle">Enabled Users</div>
        <?php
            $sql = "SELECT * FROM User";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    if($row['Disabled'] == false && $row['UserId'] != 1){
                        echo "<div class=\"entry\">
                        <div class=\"profile\"><img src=\"images/profile.jpg\"></div>
                        <div class=\"info\">
                            <div class=\"title\">" . $row['Fullname'] . "</div>
                            <div class=\"username\">" . $row['Username'] . "</div>
                            <div class=\"email\">" . $row['Email'] . "</div>
                            <div class=\"number\">" . $row['PhoneNumber'] . "</div>
                        </div>
                        <button id=\"disable\" onclick=\"disable(" . $row['UserId'] . ")\">Disable</button>
                    </div>";
                    }
                }
            }else{
                echo "<div class=\"entry\"> No Enabled Users </div>";
            }
        ?>
    </div> 
    <div id="disable_main">
        <div class="subtitle">Disabled Users</div>
        <?php
            $sql = "SELECT * FROM User";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)){
                if($row['Disabled'] == true && $row['UserId'] != 1){
                    echo "<div class=\"entry\">
                    <div class=\"profile\"><img src=\"images/profile.jpg\"></div>
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
        ?>
    </div> 
    <footer>
        
    </footer>
</body>
</html>
