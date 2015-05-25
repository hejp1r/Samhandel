<?php
	$conn = new mysqli("localhost", "root", "root", "samhandla") or die($conn->connect_error());

	$id = addslashes($_REQUEST['id']);
	$image = $conn->query("SELECT * FROM images WHERE id = '$id'");
	$image = mysql_fetch_array($image);
	$image = $image['image']; // en array nu

	header("Content-type: image/jpeg");
	echo $image;
?>