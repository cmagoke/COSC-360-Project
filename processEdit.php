<?php
    include "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $description = $_POST['descrip'];
        $postid = $_POST['postid'];
        if(isset($title) && isset($description) && isset($postid)){
            $sql = "UPDATE Post SET Title = ?, Description = ? WHERE PostId = ?";
            $stmt = $con->prepare($sql);
            $stmt -> bind_param("ssi", $title, $description, $postid);
            if($stmt -> execute()){
                echo header("Location: manage_posts.php");
            }else{
                echo "Failed to update";
            }
        }
    }
?>