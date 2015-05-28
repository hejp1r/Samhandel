<?php
session_start();
if(isset($_SESSION['user'])){
    echo "Welcome " . $_SESSION['user'];
}
else{
    echo "logga in helvete";
}
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "samhandla";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
    echo "upprättad kontakt";
}

$com = $_POST['com'];
$listId = $_POST['listId'];
$user = $_SESSION['user'];

function addComment($conn, $com, $listId, $user){
    
    $sql = "INSERT INTO comments (content, userName, listId)
            VALUES ('$com', '$user', '$listId')";
    
    if($conn->query($sql) === true){
        echo "jävlar vad nice";
    } else{
        echo "det var ju synd";
    }    
}

addComment($conn, $com, $listId, $user);