<?php
    include "db.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['userid']) && isset($_POST['forumName'])){
            $userid = $_POST['userid'];
            $forumName = $_POST['forumName'];
            echo "$userid";
            echo "$forumName";
            $sql = "INSERT INTO usersubforum VALUES('$userid','$forumName')";
            if (mysqli_query($con, $sql)) {
                echo "Joined";
            }else{
                echo "Failed to join";
            }
        }
    }

?>