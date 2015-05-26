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
$arr= $_POST['prodarray'];
$list = $_POST['list'];

var_dump($arr);
echo $user;
var_dump($list);


function checkList($conn, $list){
        
    if ($result = mysqli_query($conn, "SELECT listId FROM list WHERE '$list'= listId" )) { //om email är samma som någon email i db

    $row_cnt = mysqli_num_rows($result); //antar rader med samma email
    if($row_cnt < 1)
    {
        return true;
    }
    else
    {
       // echo "<script>alert('användare finns redan!');</script>";
       echo "vaaafaaan";
        
    }
        mysqli_free_result($result);
}

}
function injectproduct($conn, $user, $arr, $list){
    
    foreach($arr as $value){
        
            $sql = "INSERT INTO produkt (produktName, UserName, listId) 
            VALUES ('$value', '$user', '$list')";
        
        if($conn->query($sql) === true){
         echo "nice";   
        }
        else{
            echo $value. $user. $list;
            echo "vafan ". $conn->error;
        }
    }
    
}
    
    
function addList($conn, $list, $user){
    
    $sql = "INSERT INTO list (listId, userName)
            VALUES ('$list', '$user')";
    
    if($conn->query($sql) === true){
        echo "nice med lista!";
    }
       else{
           echo "vafan lista...". $conn->error;
       }
}
 
injectproduct($conn, $user, $arr, $list);
    
if(checkList($conn, $user) === true){
    addList($conn, $list, $user);
}
    else{
        echo "den fanns...???!";
}
header ('location: ../pages/page.php');