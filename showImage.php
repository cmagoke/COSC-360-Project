<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['user'])) {
        $username = $_GET['user'];
        $sql = "SELECT * FROM Image WHERE Username = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            header("Content-type: " . $row['ImageType']);
            echo ($row['ImageContent']);
            exit;
        }
    }
}
?>
