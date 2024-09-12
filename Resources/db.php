<?php
//default setting of server
$host = "localhost";
$user = "root";
$pass = "";
$database = "act_dbms";

$conn = mysqli_connect($host, $user, $pass, $database);

if (!$conn){
    die("connection failed! " . mysqli_connect_error());
}

?>