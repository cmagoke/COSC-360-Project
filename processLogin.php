<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM User WHERE Username = ? AND Password = ?";
    $stmt = $con->prepare($sql);
    $stmt -> bind_param("ss", $username, $password);
    $stmt -> execute();
    $result = $stmt->get_result();
    if(!is_null($result->fetch_assoc())){
        header("Location: homepage.php");
    }else{
        echo "Incorrect user/password";
    }
}
?>