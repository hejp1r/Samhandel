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

$user = $_SESSION['user'];
$list = $_POST['list'];
$arrDel = $_POST['Delete'];
$arrAdd = $_POST['Add'];

function deleteProducts($conn, $arrDel, $list){
    foreach($arrDel as $prod){
        
        $sql = "DELETE FROM produkt WHERE produktName='$prod' AND listId='$list'";
        
        if($conn->query($sql) === true){
            echo "niiiiice ";
        } else{
            echo "blev inget med det ". $conn->error;
            
        }
    }
}

function addProducts($conn, $arrAdd, $list, $user){
    
    foreach($arrAdd as $prod){
        
        $sql = "INSERT INTO produkt (produktName, userName, listId)
                VALUES ('$prod', '$user', '$list')";
        
        if($conn->query($sql) === true){
            echo "fyfaaan va nice";
        } else{
         echo "helvete ". $conn->error;   
        }
    }
}
deleteProducts($conn, $arrDel, $list);
addProducts($conn, $arrAdd, $list, $user);

header('Location: ../pages/page.php');