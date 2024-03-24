<?php
    include "db.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['userid']) && isset($_POST['forumName'])){
            $userid = $_POST['userid'];
            $forumName = $_POST['forumName'];
            $sql = "INSERT INTO UserSubforum (UserId, SubforumName) VALUES('$userid','$forumName')";
            if (mysqli_query($con, $sql)) {
                echo "Joined";
            }else{
                echo "Failed to join";
            }
        }
    }

?>