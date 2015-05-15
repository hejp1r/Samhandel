<?php
$servername = "http://http://dbtrain.im.uu.se/phpmyadmin/";
$username = "dbtrain_40";
$password = "runsja";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
