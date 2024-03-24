<?php
include "db.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset ($_SESSION['user'])) {
    $Title = $_GET['Title']; // Corrected variable name
    $Description = $_GET['Description']; // Corrected variable name
    $userid = $_SESSION['user'];
    $query = "SELECT Username FROM User WHERE UserId='$userid'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $username = $row['Username'];
    $date = date("Y-m-d H:i:s");
    $subforum = $_GET['subforum'];
    if (isset ($Title) && isset ($Description)) { // Corrected variable names
        $sql = "INSERT INTO Post(Username, DateTime, Title, Description, Subforum) VALUES (? ,? , ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssss", $username, $date, $Title, $Description, $subforum);
        if ($stmt->execute()) {
            //header("Location: success.php");
            echo "success";
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>