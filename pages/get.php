<?php
	$conn = new mysqli("localhost", "root", "root", "samhandla") or die($conn->connect_error());

	$id = addslashes($_REQUEST['id']);
	$query_result = $conn->query("SELECT * FROM images WHERE id = '$id'");
	$assoc = mysqli_fetch_array($query_result);
	$blob = $assoc['image']; // en array nu
	$image = imagecreatefromstring($blob);
	
	//var_dump($image);

	
	//print base64_encode($assoc['image']);
	//echo '<img src="data:image/jpeg;base64,'. base64_encode($assoc['image']).'"/>';
	//header("Content-length: " . 57871);
	header("Content-Type: image/jpeg");
	imagejpeg($image);
	//print $image;
	//header("Content-length: " . filesize($image));
	
	//var_dump($image);

	?>