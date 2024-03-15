<?php
//local
/* $servername = "localhost";
$username = "root";
$password = "";
$name = "cosc 360"; */

//server
$servername = "localhost";
$username = "17700014";
$password = "17700014";
$name = "db_17700014";

//create connection
$con = new mysqli($servername, $username, $password, $name);

if(mysqli_connect_error()){
    echo "Failed to connect";
    die(mysqli_connect_error());
}else{
    //echo "Connected";
}
?>
