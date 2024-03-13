<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if (isset($username) && isset($password)&& isset($fullname)&& isset($dob)&& isset($email)){
        $query = mysqli_query($con, "SELECT COUNT(*) as count FROM user WHERE username = '$username'");
        $result = mysqli_fetch_array($query);
        $count = $result['count'];
        if($count == 0){
            $sql = "INSERT INTO User (Username, Password, Fullname, DateOfBirth, Email, PhoneNumber) VALUES (?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssss", $username, $password, $fullname, $dob, $email, $phone);
            if($stmt->execute()){
                //echo "inserted";
                header("Location: userpage.php");
                exit();
            }else{
                echo "Error";
            }
        }else{
            echo "username exists";
        }
    }
}
?>