<?php

//echo "hejhej";

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "samhandla";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    //die("ingen kontakt");
} else{
   // echo "UPPRÄTTAD KONTAKT" . $conn->connect_error;
}


$username =  mysqli_real_escape_string($conn, $_POST['namn']);
$password =  mysqli_real_escape_string($conn, $_POST['password']);
$mail =  mysqli_real_escape_string($conn, $_POST['email']);

$salt1 = uniqid(mt_rand(), true);
$salt2 = uniqid(mt_rand(), true);

$hash = sha1($salt1 . $password . $salt2);

function isEmpty($var){
    if($var === NULL){
      //  echo "ingenting här";
        return false;
    } else{
      //  echo "här hittade vi nåt!";
        return true;
    }
    
}

function createUser($conn, $username, $hash, $salt1, $salt2, $mail){
    
        $sql = "INSERT INTO user (userName, hash, salt1, salt2, eMail)
        VALUES ('$username', '$hash', '$salt1', '$salt2', '$mail')";
    
    if($conn->query($sql) === true){
       // echo "";
            header('Location:../pages/index2.php?message=Användare skapad'); //ossäkkkkkert
        
    } else{
        //echo "det var ju synd". $sql . "<br>" . $conn_error;
    }
}


function checkEmail($conn, $mail){
    
    
    if ($result = mysqli_query($conn, "SELECT email FROM user WHERE '$mail'= eMail" )) { //om email är samma som någon email i db

    $row_cnt = mysqli_num_rows($result); //antar rader med samma email
    if($row_cnt < 1)
    {
        return true;
    }
    else
    {
       // echo "<script>alert('användare finns redan!');</script>";
        header('Location:../pages/index.php?message=epost-adressen redan registrerad!');
        
    }
        mysqli_free_result($result);
}

}
function checkUser($conn, $username){
    
    
    if ($result = mysqli_query($conn, "SELECT userName FROM user WHERE '$username'= userName" )) { //om email är samma som någon email i db

    $row_cnt = mysqli_num_rows($result); //antar rader med samma email
    if($row_cnt < 1)
    {
        return true;
    }
    else
    {
       // echo "<script>alert('användare finns redan!');</script>";
        header('Location:../pages/index.php?message=användare finns redan!');
        
    }
        mysqli_free_result($result);
}

}

if(checkUser($conn, $username) && checkEmail($conn, $mail)){
    
    createUser($conn, $username, $hash, $salt1, $salt2, $mail);
}
?>
