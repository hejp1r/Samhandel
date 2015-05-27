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


function getListId($conn, $list){
    
    $sql = "SELECT listId FROM list WHERE listName='$list'";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['listId'];
}
function checkList($conn, $list, $user){
        
    if ($result = mysqli_query($conn, "SELECT listName FROM list WHERE '$list'= listName AND userName='$user'" )) { //om email är samma som någon email i db
        echo "inside ";

    $row_cnt = mysqli_num_rows($result); //antar rader med samma email
        echo "cccppppp  " ;
    if($row_cnt < 1)
    {
        return $list;
        echo "whaat";
    }
    else
    {
        $query = $conn->query("SELECT * FROM list");
        $row = mysqli_num_rows($query);
        $list = "Inköpslista #" . ($row + 1);
        echo $list;
        var_dump($list);
        return $list;
        
    }
        mysqli_free_result($result);
}

}
function injectproduct($conn, $user, $arr, $listId){
    
    foreach($arr as $value){
        
            $sql = "INSERT INTO produkt (produktName, UserName, listId) 
            VALUES ('$value', '$user', '$listId')";
        
        if($conn->query($sql) === true){
         echo "nice";   
        }
        else{
            echo $value. $user. $listId;
            echo "vafan ". $conn->error;
        }
    }
    
}
    
    
function addList($conn, $list, $user){
    
    $sql = "INSERT INTO list (listName, userName)
            VALUES ('$list', '$user')";
    
    if($conn->query($sql) === true){
        echo "nice med lista!";
    }
       else{
           echo "vafan lista...". $conn->error;
       }
}
 
    
$list= checkList($conn, $list, $user);
addList($conn, $list, $user);

$listId = getListId($conn, $list);
var_dump($listId);
injectproduct($conn, $user, $arr, $listId);

header('location: ../pages/index2.php');