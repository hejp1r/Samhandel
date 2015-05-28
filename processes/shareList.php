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

$sharedUser = $_POST['sharedUser'];
$listId = $_POST['listId'];

function shareList($conn, $sharedUser, $listId){
    
    $sql = "INSERT INTO sharedList (listId, userName)
            VALUES ('$listId', '$sharedUser')";
    if($conn->query($sql) === true){
        echo "niiice";
    } else{
        echo "va i helvete";
    }

}

shareList($conn, $sharedUser, $listId);