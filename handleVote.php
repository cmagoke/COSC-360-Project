<?php
    include "db.php";
    session_start();

    if(isset($_SESSION['user'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['id']) && isset($_POST['x'])){
                if($_POST['x'] == "c"){
                    $commid = $_POST['id'];
                    if($_POST['type'] == "up"){
                        $sql = "UPDATE Comment SET VotesNum = VotesNum + 1 WHERE CommentId = '$commid'";
                    }elseif($_POST['type'] == "down"){
                        $sql = "UPDATE Comment SET VotesNum = VotesNum - 1 WHERE CommentId = '$commid'";                    }
                    if (mysqli_query($con, $sql)) {
                       // echo "success";
                    }else{
                        echo "Failed to update vote";
                    }
                }
                if($_POST['x'] == "p"){
                    $postid = $_POST['id'];
                    if($_POST['type'] == "up"){
                        $sql = "UPDATE Post SET VotesNum = VotesNum + 1 WHERE PostId = '$postid'";
                    }elseif($_POST['type'] == "down"){
                        $sql = "UPDATE Post SET VotesNum = VotesNum - 1 WHERE PostId = '$postid'";
                    }
                    if (mysqli_query($con, $sql)) {
                       // echo "success";
                    }else{
                        echo "Failed to update vote";
                    }
                }
            }
        }
    }else{
        echo "not logged";
    }   
?>