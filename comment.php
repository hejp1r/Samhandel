<!DOCTYPE html>

<html>
	<head>
	</head>
	<body>
		<div id="comment">
		<textarea name="comment" id="comment" cols="30" rows="5"></textarea>
		</br>
		<input type="submit" name="skicka" id="skicka" value="Skicka kommentar"/>
		
		<?php
		$mindb = new mysqli('localhost', 'root', 'root', 'samhandla');
					 
	// avsluta om fel uppstod vid anslutning till databasen
		$error = $mindb->connect_error;
		if ($error) 
		{
		 	$code  = $mindb->connect_errno;
		  	die("Error: ($code) $error");
		}
		// hämta användarna från users-tabellen
		$result = $mindb->query("SELECT * FROM comments WHERE ...");

		// skriv ut antalet användare baserat på hur många rader som finns i tabellen
		if ($result) 
		{
		  echo "Antal användare: " . $result->num_rows;
		}
		 
		// skriv ut alla användare i databasen
		while($row = $result->fetch_assoc())
		{
		    echo "<p>\n";
		    echo "Användarnamn: " . $row['namn'] . "<br />\n";
		    echo "Kommentar: " . $row['kommentar'] . "<br />\n";
		    echo "</p>\n";
		}
		?>
		</div>
	</body>
</html>