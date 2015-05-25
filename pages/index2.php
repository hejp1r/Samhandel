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
		<link rel="stylesheet" href= "../css/main.css">
		<script src="../js/main.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	</head>
	
	<body>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<div id="container2">
			<header>
				<h2>Samhandla</h2>

				<div class = "search">
                    <form action ="index2.php" method="POST">
					<input type="text" name="search" placeholder = "Search for members"/>
					<input type="submit" value=">>" />

					</form>


					<?php
					include_once("search.php");
					 print ("$output"); ?>
				</div>

                <div class = "loggain">
                    <input type="submit" name="minalistor" id="minalistor" value="Mina listor" />
                    <input type="submit" name="dagar" id="dagar" value="SPECIAL DAYS" />
                    <form action ="logout.php">
                        <input type="submit" name="loggaut" id="loggaut" value="Logga ut"/>
                    </form>	
                </div>
			</header>
			<div id="banner">
			</div>
			<div id="content2"><br>
                
                    
            <div id="container">
            <div id="box">
                <h1>Ny Lista</h1>
                <input type="button" value="+" id="nylista">
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="../js/list.js"></script>
        <script src="../js/addprodukt.js"></script>

        <form id ="form" action="index2.php" method ="POST" enctype="multipart/form-data">
			File:
			<input type="file" name="image"><input type="submit" value="Upload">
			</form>
			<?php
			//connect to database
			$conn = new mysqli("localhost", "root", "root", "samhandla") or die($conn->connect_error());
			$file = $_FILES['image']['tmp_name'];
			if(!isset($file))
			{
				echo "Välj en bild";
			}
			else
			{
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name = addslashes($_FILES['image']['name']);
				$image_size = getimagesize($_FILES['image']['tmp_name']);

				if($image_size == FALSE)
				{
					echo "Det är inte en bild";
				}
				else
				{//$databas->query(¤sql)
					if ($conn->query("INSERT INTO images (name, image) VALUES ('$image_name', '$image')"));
					{
					$lastid = mysql_insert_id();
					echo "Bild uppladdad <p/> Din Bild: <p/> <img src='get.php?id='$lastid''>";
					}
					
				}
			}
			?>
	  	    </div>	

			<div id="content">	
			</div>
		</div>	
		</body>
</html>