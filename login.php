<?php
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
    echo "<p>upprättad kontakt </p>";
}

$user = mysqli_real_escape_string($conn, $_POST['anamn']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

var_dump($user);

function getSalt($user, $conn){
    echo " salt";
    $sql = "SELECT salt1, salt2 FROM user WHERE username='$user'";//"SELECT salt1, salt2 FROM user WHERE username="$user" in user";
    $result = $conn->query($sql);
    echo " resultat";
    var_dump($result);

    return $result;
}

echo " här"; 
function checkPassword($user, $pass, $conn){
    echo " inside";
    $salts = getSalt($user, $conn);
    $salt = $salts->fetch_assoc();
    $sql = "SELECT hash FROM user WHERE username='$user'";
    $result = $conn->query($sql);
    echo "hallå.....";
    
    $password = sha1($salt['salt1'] . $pass . $salt['salt2']);
    
    echo $password. ".......hash: ";
    
    $hash = $result->fetch_assoc();
    
    echo $hash['hash'];
    
    if($password == $hash['hash']){

        //echo "<script>location.href='index2.php';</script>";

        header('Location:index2.php');
        session_start();
        $_SESSION['user'] = $user;
        echo "Här ska det va session å sånt";
      //  echo "<script>location.href='index2.php';</script>";
    } else{
        echo "fel lösenord";
        echo "<script>location.href='index.php'; alert('fel lösen eller användare');</script>";
    }
}

    checkPassword($user, $pass, $conn);


?>