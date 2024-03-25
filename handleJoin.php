<?php
    include "db.php";
    session_start();

    if(isset($_SESSION['user'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['userid']) && isset($_POST['forumName'])){
                $userid = $_POST['userid'];
                $forumName = $_POST['forumName'];
                $sql = "INSERT INTO UserSubforum (UserId, SubforumName) VALUES('$userid','$forumName')";
                if (mysqli_query($con, $sql)) {
                    $sql2 = "UPDATE Subforum SET NumOfUsers = NumOfUsers + 1";
                    if (mysqli_query($con, $sql2)) {
                        echo "Joined";
                    }
                }else{
                    echo "Failed to join";
                }
            }
        }
    }else{
        echo "not logged";
    }

?>