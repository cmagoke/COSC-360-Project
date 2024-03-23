<?php
include "dbinfo.php";

//create connection
$con = new mysqli(dbhost, dbname, dbuser, dbpass);

if(mysqli_connect_error()){
    echo "Failed to connect";
    die(mysqli_connect_error());
}else{
    //echo "Connected";
}
?>