<?php

//echo "hejhej";

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "samhandla";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    //die("ingen kontakt");
} else{
   // echo "UPPRÄTTAD KONTAKT" . $conn->connect_error;
}


$username = $_POST['namn'];
$password = $_POST['password'];
$mail = $_POST['email'];

$salt1 = uniqid(mt_rand(), true);
$salt2 = uniqid(mt_rand(), true);

$hash = sha1($salt1 . $password . $salt2);

function isEmpty($var){
    if($var === NULL){
      //  echo "ingenting här";
        return false;
    } else{
      //  echo "här hittade vi nåt!";
        return true;
    }
    
}

function createUser($conn, $username, $hash, $salt1, $salt2, $mail){
    
        $sql = "INSERT INTO user (userName, hash, salt1, salt2, eMail)
        VALUES ('$username', '$hash', '$salt1', '$salt2', '$mail')";
    
    if($conn->query($sql) === true){
        echo "<script>alert('ny användare skapad');</script>";
    } else{
        //echo "det var ju synd". $sql . "<br>" . $conn_error;
    }
}

$empty = isEmpty($username);
//echo "         " . $empty;
//var_dump($username);
if($empty == true){
    createUser($conn, $username, $hash, $salt1, $salt2, $mail);
}


?>
