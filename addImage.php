<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $img = $_FILES['pic'];
    $username = $_POST['user'];
    if(isset($img) && isset($username)){
        $imgContent = file_get_contents($_FILES['pic']['tmp_name']);
        $imgType = $_FILES['pic']['type'];
        $sql = "INSERT INTO Image (ImageContent, ImageType, Username) VALUES (?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sss", $imgContent, $imgType, $username);
        if($stmt->execute()){
            //header("Location: ImageForm.php?user=" . $username);  
            header("Location: userpage-posts.php");
        }else{
            echo "error uploading";
        }
    }
}

?>
