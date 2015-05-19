<?php

$mindb = new mysqli('localhost','root','root','samhandla'); //kopplar till databasen
$email = mysqli_real_escape_string($mindb,$_POST['email']); //alla namn sparas genom POST metoden i "namn".
$password = mysqli_real_escape_string($mindb,$_POST['password']);
$salt = RandomString();
$krypteratPass = sha1($password.$salt);

if ($result = mysqli_query($mindb, "SELECT email FROM samhandla WHERE '$email'= email" )) { //om email är samma som någon email i db

    $row_cnt = mysqli_num_rows($result); //antar rader med samma email

    
    	if($row_cnt < 1){ //om raderna som hämtas i databasen är mindre än 1, el dvs 0.
		$res = $mindb->query("INSERT INTO samhandla(email, password, salt) VALUES ('$email', '$krypteratPass', '$salt')");
		header('Location:http://localhost/index.php?message=Godkänd registrering. Välkommen!');
		/* close result set */
		 mysqli_free_result($result);
	}
	else
	{
		header('Location:http://localhost/index2.php?message=Emailadressen existerar redan! Välj annan emailadress.');
	}
} 
?>
