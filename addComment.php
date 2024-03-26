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
    if (isset($comment) && isset($postid)) {
        $sql = "INSERT INTO Comment (Username, DateTime, Description, PostId) VALUES (? ,?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssi", $username, $date, $comment, $postid);
        if ($stmt->execute()) {
            $sql2 = "UPDATE POST SET CommentsNum = CommentsNum + 1 WHERE PostId = ?";
            $stmt2 = $con->prepare($sql2);
            $stmt2->bind_param("i", $postid);
            if ($stmt2->execute()) {
                header("Location: single_post.php?id=" . $postid);
            } else {
                echo "Failed to update comment number";
            }
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>