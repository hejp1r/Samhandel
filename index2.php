<!DOCTYPE html>
<?php session_start();
if(isset($_SESSION['user'])){
    echo "Welcome " . $_SESSION['user'];
}
else{
    echo "logga in helvete";
}
?>
<html>
	<head>
	<title>SamHandla mera</title>
		<link rel="stylesheet" href= "main.css">
		<script src="main.js"></script>
	</head>
	
	<body>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<div id="container">
			<header>
				<h2>Samhandla</h2>
			
				

			<div class = "loggain">
			<input type="submit" name="minalistor" id="minalistor" value="Mina listor" />
			<input type="submit" name="recept" id="recept" value="Söka recept" />
			<input type="submit" name="dagar" id="dagar" value="SPECIAL DAYS" />

			
			<form action ="logout.php">
				<input type="submit" name="loggaut" id="loggaut" value="Logga ut"/>
			</form>	

			</div>
			</header>
			<div id="banner">
			</div>
			<div id="content2">
			<br/>
			<fieldset>
			<legend> Mina listor</legend>
			</fieldset>
			<b/> 
	  	</div>	
			<div id="content">	
			</div>
		</div>	
		</body>
		</html>
