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

echo "hallååååååå";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
    echo "upprättad kontakt";
}

$user = $_SESSION['user'];

echo "$user";

function printLists($conn, $user){
    echo "jo";
    $sql = "SELECT listId FROM list WHERE userName='$user'";
    
    $result = $conn->query($sql);
    if($result){
            while($row = $result->fetch_assoc()){
                $listId = $row['listId'];
                echo "<h1>".$listId."</h1>";
                printProducts($conn, $listId);
        }
    }
    else{
        echo "varför";
    }
}
echo "kom igen";
printLists($conn, $user);

function printProducts($conn, $listId){
    echo $listId;
    $sql = "SELECT produktName FROM produkt WHERE listId='$listId'";
    
    $result = $conn->query($sql);
    
    if($result){
        while($row = $result->fetch_assoc()){
            echo "<p>".$row['produktName']."</p>";
        }
    }
    else{
        echo "feeeel". $conn->error;
    }
}