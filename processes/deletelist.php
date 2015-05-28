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
$list = $_POST['list'];

function deleteList($conn, $list){
    $sql = "DELETE FROM list WHERE listId='$list'";
    $query = "DELETE FROM produkt WHERE listId='$list'";
    $quest = "DELETE FROM comments WHERE listId='$list'";
    
    if($conn->query($sql) === true && $conn->query($query) == true && $conn->query($quest) === true){
        echo "listan är booorta";
        header('Location: ../pages/page.php');
    } else{
        echo "va i helvete ". $conn->error;
    }
}
deleteList($conn, $list);