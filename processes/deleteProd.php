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
$arr = $_POST['produkt'];

function deleteProducts($conn, $arr, $list){
    foreach($arr as $prod){
        
        $sql = "DELETE FROM produkt WHERE produktName='$prod' AND listId='$list'";
        
        if($conn->query($sql) === true){
            echo "niiiiice ";
           // header('Location: ../pages/page.php');
        } else{
            echo "blev inget med det ". $conn->error;
            
        }
    }
}

deleteProducts($conn, $arr, $list);