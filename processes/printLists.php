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
    $sql = "SELECT * FROM list WHERE userName='$user'";
    
    $result = $conn->query($sql);
    if($result){
        $count = 1;
        while($row = $result->fetch_assoc()){
            echo "<div id='div". $count."'>";
            $listName = $row['listName'];
            $listId = $row['listId'];
            echo "<h2>".$listName."</h2><input type='button' value='Visa' class='btnShow' id='btnShow" . $count ."'>";
            printProducts($conn, $listId, $count);
        //    echo "<input type='button' value='Visa' class='btnchange' id='btchange".$count ."'>";
            echo "<form action='../processes/deleteList.php' method='POST'>  
                    <input type='button' value='ändra' class='btnEdit' id='btnEdit" . $count . "'>
                    <input type='hidden' value='".$listId."' name='list'>
                    <input type='submit' value='radera lista' class='btnDeleteList' name='btnDeleteList". $count."' id='btnDeleteList".                          $count . "'>
                </form>
                
                </div>";
            $count++;
        }
    }
    else{
        echo "varför";
    }
}
echo "kom igen";
printLists($conn, $user);

function printProducts($conn, $listId, $count){
    //echo $listId;
    $sql = "SELECT produktName FROM produkt WHERE listId='$listId'";
    
    $result = $conn->query($sql);
    
    if($result){
        $prodCount = 1;
        while($row = $result->fetch_assoc()){
            echo "<p class='p". $count . "' id='p" . $prodCount . "'>" . $row['produktName']. "</p><input type='button' class='btnX".$count."' value='x' id='btnX".$prodCount ."' style='display: none'>";
            $prodCount++;
        }
    }
    else{
        echo "feeeel". $conn->error;
    }
}