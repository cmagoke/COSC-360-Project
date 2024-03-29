<?php
include "db.php";
session_start();

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
            $passwordHash = md5($password);
            $sql = "INSERT INTO User (Username, Password, Fullname, DateOfBirth, Email, PhoneNumber) VALUES (?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssss", $username, $passwordHash, $fullname, $dob, $email, $phone);
            if($stmt->execute()){
                //echo "inserted";
                $sql = "SELECT UserId FROM User WHERE Username = '$username'";
                $result = mysqli_query($con, $sql);
                $row = $result->fetch_assoc();
                if(!is_null($row)){
                    $_SESSION['user'] = $row["UserId"];
                    header("Location: ImageForm.php?user=" . $username);
                    exit();
                }
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