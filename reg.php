<?php

echo "hejhej";
$servername = "localhost";
$username = "root";//"dbtrain_40";
$password = "root";//"runsja";
$database = "samhandla";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{ echo "UPPKOPPLING!"; }

$username = $_POST['namn'];
$password = $_POST['password'];
$mail = $_POST['email'];

$salt1 = uniqid(mt_rand(), true);
$salt2 = uniqid(mt_rand(), true);

$hash = sha1($salt1 . $password . $salt2);
echo $salt1 . "......" . $salt2 . "..... hash: ";
echo $hash . " ";

function isEmpty($var){
    if($var === NULL){
        echo "ingenting här";
        return false;
    } else{
        echo "här hittade vi nåt!";
        return true;
    }
    
}


function createUser($conn, $username, $hash, $mail, $salt1, $salt2){
    
        $sql = "INSERT INTO user (userName, hash, salt1, salt2, eMail)
        VALUES ('$username', '$hash', '$salt1', '$salt2', '$mail')";
    
    if($conn->query($sql) === true){
        echo "redirecta";
    } else{
        echo "det var ju synd";
    }
}

$empty = isEmpty($username);
echo "         " . $empty;
var_dump($username);
if($empty == true){
    createUser($conn, $username, $hash, $mail, $salt1, $salt2);
}


?>