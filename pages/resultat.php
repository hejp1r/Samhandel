<!DOCTYPE html>
<html>
	<head>
		<title>SamHandla</title>
		<link rel="stylesheet" href= "../css/main.css">
	</head>
	<body>
        <?php
		if(isset($_GET['message'])){
    		$message = $_GET['message'];
    		echo "<script>alert('$message');</script>";
		}
		?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<link rel="stylesheet" href= "../css/main.css">
			<header>
				<div class = "menu">
					<a href="index2.php">Mina listor</a>
					<a href="registration.php">SPECIAL DAYS</a>
					<form action ="loggaut.php">
					<a href="../processes/logout.php">Logga ut</a>
					</form>  
                </div>
				<h1>SAMHANDLA</h1>
				<div class = "search">
                    <form action ="resultat.php" method="POST">
					<input type="text" name="search" placeholder = "Sök efter listor"/>
					<input type="submit" value=">>" />
					</form>
				</div>
				</header>
			<div id="banner">
			</div>
			<div id="content2">	
	
                <fieldset>
                  <legend>Resultat: </legend>

                  <?php
					include_once("search.php");
					 print ("$output"); ?>
			</fieldset>
		
			</div>
			<?php include_once("../processes/printLists.php"); ?>	
		</body>
		</html>