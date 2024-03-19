<?php
    include "db.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['userid'])){
            $userid = $_POST['userid'];
            $sql = "UPDATE User SET Disabled = false WHERE  UserId = '$userid'";
            if (mysqli_query($con, $sql)) {
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }else{
                echo "Failed to enable";
            }
        }
    }

?>