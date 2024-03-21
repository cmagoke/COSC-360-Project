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
        $sql = "SELECT COUNT(*) as count FROM User WHERE Username = ? OR Email = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];
        if($count == 0){
            $sql = "INSERT INTO User (Username, Password, Fullname, DateOfBirth, Email, PhoneNumber) VALUES (?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssss", $username, $password, $fullname, $dob, $email, $phone);
            if($stmt->execute()){
                //echo "inserted";
                header("Location: addImage.php?user=" . $username);
                exit();
            }else{
                echo "Error";
            }
        }else{
            echo "username/email exists <br>
            <a href=\"signup.php\">Return to sign up</a>";
        }
    }
}
?>