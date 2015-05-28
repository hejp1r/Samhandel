<!DOCTYPE html>
<?php session_start();
if(isset($_SESSION['user'])){
    echo "Välkommen " . $_SESSION['user'];
}
else{
    echo "logga in helvete";
}
?>
<html>
	<head>
	<title>SamHandla mera</title>
		<link rel="stylesheet" href= "../css/main.css">
        <link rel="stylesheet" href="../css/list.css">
		<script src="../js/main.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	</head>
	
	<body>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
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
				<br/>
				
			</div>
			<div id="content2"><br>
                
                    
            <div id="container">
            <!--Lägg till bild -->
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
					$lastid = $conn->insert_id;
                        
                        echo "okeej";
					echo "Bild uppladdad <p/> Din Bild: <p/> <img src='/get.php?id=$lastid'>";
					//echo "Bild uppladdad <p/> Din Bild: <p/> <img src='get.php?id=$lastid'>";
					}
					
				}
			}
			?>
            <div id="box">
                <h2>Ny Lista</h2>
                <input type="text" placeholder="Namnet på den nya listan" id="listnamn">
                <input type="button" value="+" id="nylista">

            </div>

             <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="../js/list.js"></script>   
        <?php include("../processes/printLists.php"); ?>

        
        </div>
       


    
	  	    </div>	
	
		</body>
</html>