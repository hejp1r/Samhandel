<!DOCTYPE html>
<?php session_start();
if(isset($_SESSION['user'])){
    echo "Welcome " . $_SESSION['user'];
}
else{
    echo "logga in helvete";
}
?>
<?php include('../processes/printLists.php'); ?>
<html>
	<head>
	<title>SamHandla mera</title>
        <link rel="stylesheet" href="../css/list.css">
        <meta charset="UTF-8">
	</head>
	
	<body>
        <div id="container">
            <div id="box">
                <h1>Ny Lista</h1>
                <input type="text" placeholder="Namnet på den nya listan" id="listnamn">
                <input type="button" value="+" id="nylista">
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        
        <script src="../js/list.js"></script>
    </body>
</html>