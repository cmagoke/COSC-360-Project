<?php
$servername = "localhost";
$username = "root";
$password = "";
$name = "cosc 360";

//create connection
$con = new mysqli($servername, $username, $password, $name);

if(mysqli_connect_error()){
    echo "Failed to connect";
    die(mysqli_connect_error());
}else{
    //echo "Connected";
}
?>