<?php
include "db.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    if(isset($username) && isset($password)){
        $sql = "SELECT * FROM User WHERE Username = ? AND Password = ?";
        $stmt = $con->prepare($sql);
        $stmt -> bind_param("ss", $username, $password);
        $stmt -> execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if(!is_null($row)){
            $_SESSION['user'] = $row["UserId"];
            header("Location: homepage.php");
        }else{
            echo "Incorrect user/password";
        }
    }
}
?>