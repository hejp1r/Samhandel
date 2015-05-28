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

//echo "hallååååååå";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
    echo "upprättad kontakt";
}

$user = $_SESSION['user'];
//$id = addslashes($_REQUEST['id']);

//echo "$user";

function printLists($conn, $user){
   // echo "jo";
   // $sql = "SELECT * FROM list WHERE userName='$user'";
    $sql = "SELECT * FROM list WHERE userName='$user'";
    
    if($result = $conn->query($sql)){
        $count = 1;
        while($row = $result->fetch_assoc()){
            echo "<div class='listdiv' id='div". $count."'>";
            $listName = $row['listName'];
            $listId = $row['listId'];
            echo "<h2>".$listName."</h2><input type='button' value='Visa' class='btnShow' id='btnShow" . $count ."'>
                    <input type='button' value='dela' class='btnShare' id='btnShare".$count."'>
                    <form action='../processes/shareList.php' method='POST' id='shareform". $count."'>
                        <input type='hidden' name='listId' value='" . $listId . "'>
                    </form>";
            //<img src=get.php?id=$listId>";
                printProducts($conn, $listId, $count);
           // echo " i printList ";
        //    echo "<input type='button' value='Visa' class='btnchange' id='btchange".$count ."'>";
            echo "<form action='../processes/deleteProd.php' method='POST' id='form" . $count . "'>  
                    <input type='button' value='ändra' class='btnEdit' id='btnEdit" . $count . "'>
                    <input type='text' class='txtAdd' id='txtAdd" . $count . "'>
                    <input type='button' value='+' class='btnAdd' id='btnAdd". $count . "'>
                    <input type='hidden' value='".$listId."' name='list'>
                </form>
                <form action='../processes/deleteList.php' method='POST'>
                    <input type='hidden' value='".$listId."' name='list'>
                    <input type='submit' value='radera lista' class='btnDeleteList' name='btnDeleteList". $count."' id='btnDeleteList".                          $count . "'>
                </form>
                <input type='button' value='Visa kommentarer' class='showCom' id='showCom". $count."'>
                </div>
                <div class='listCom' style='display: none;' id='listCom" .$count."'>";
           // echo " innan kommentarsfunktionen ";
                printComments($conn, $listId);
                
                    
                echo "<br>
                    <form action='../processes/addComment.php' method='POST'>
                        <input type='hidden' value='". $listId."' name='listId'>
                        <textarea name='com' id='textarea' cols='30' rows='10'></textarea>
                        <input type='submit' value='Skicka' id='btnCom'>
                    </form>
                    </div>";
            $count++;
          //  echo " slutet av printList";
        }
    }
    else{
        echo "varför" . $conn->error;
    }
}
echo "kom igen";
printLists($conn, $user);

function printProducts($conn, $listId, $count){
    //echo $listId;
    $sql = "SELECT produktName FROM produkt WHERE listId='$listId'";
    
    $result = $conn->query($sql);
    //echo " i produkterna ";
    if($result){
        $prodCount = 1;
        while($row = $result->fetch_assoc()){
            echo "<p class='p". $count . "' id='p" . $prodCount . "'>" . $row['produktName']. "</p><input type='button' class='btnX' value='x' id='btnX".$prodCount ."' style='display: none'>";
            $prodCount++;
        }
    }
    else{
        echo "feeeel". $conn->error;
    }
   // echo "produktfunktion klar ";
}

function printComments($conn, $listId){
    
    $sql=("SELECT * FROM comments WHERE listId='$listId'");
    
//    echo $listId;
  //  echo "i kommentarer";
    $result = $conn->query($sql);
    if($result){
     //   echo " ja det var sant <br>";
        $comCount = 1;
        while($row = $result->fetch_assoc()){
           // echo " inne i loopen" . $row['userName'] . $row['content'] . "<br>";
            echo "<div class='divcom' id='divcom". $comCount . "'>
                        <p class='userCom'><b>" . $row['userName'] . ": </b></p>
                        <p class='contentCom'>" . $row['content'] . "</p>
                </div>";
            $comCount++;
            //echo " loooop";
        }
        
    } else{
        echo "<p>Det finns inga kommentarer.</p>";
    }
    //echo " hmmm ";
}


/*function printImg($conn, $listId){
    $query_result = $conn->query("SELECT * FROM images WHERE listId = '$listId'");
	$assoc = mysqli_fetch_array($query_result);
	$blob = $assoc['image']; // en array nu
	$image = imagecreatefromstring($blob);
    
    header("Content-Type: image/jpeg");
}
*/