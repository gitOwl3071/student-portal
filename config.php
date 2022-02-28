<?php

$serverName = "127.0.0.1";
$username = "workplace";
$password = "password"; 
$database = "StudentDB";

$conn =  new mysqli($serverName, $username, $password, $database);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection is successful";

?>

