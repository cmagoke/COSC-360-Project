<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user'])) {
    $comment = $_POST['comment']; 
    $userid = $_SESSION['user'];
    $query = "SELECT Username FROM User WHERE UserId='$userid'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $username = $row['Username'];
    $date = date("Y-m-d H:i:s");
    $postid = $_POST['postid'];
    if (isset($comment) && isset($postid)) { // Corrected variable names
        $sql = "INSERT INTO Comment (Username, DateTime, Description, PostId) VALUES (? ,?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssi", $username, $date, $comment, $postid);
        if ($stmt->execute()) {
            $sql2 = "UPDATE POST SET CommentsNum = CommentsNum + 1 WHERE PostId = '$postid'";
            if (mysqli_query($con, $sql2)) {
                header("Location: single_post.php");
             }else{
                 echo "Failed to update comment number";
             }
            //echo "success";
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>