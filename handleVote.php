<?php
    include "db.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['postid'])){
            $postid = $_POST['postid'];
            if($_POST['type'] == "up"){
                $sql = "UPDATE Post SET VotesNum = VotesNum + 1 WHERE PostId = '$postid'";
            }elseif($_POST['type'] == "down"){
                $sql = "UPDATE Post SET VotesNum = VotesNum - 1 WHERE PostId = '$postid'";
            }
            if (mysqli_query($con, $sql)) {
                echo "success";
            }else{
                echo "Failed to update vote";
            }
        }
    }
    
?>