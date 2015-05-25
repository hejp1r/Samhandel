<?php
	mysql_connect("localhost", "root", "root", "images") or die(mysql_error());

	$id = addslashes($_REQUEST['id']);
	$image = mysql_query("SELECT * FROM images WHERE id = $id");
	$image = mysql_fetch_array($image);
	$image = $image['image']; // en array nu

	header("Content-type: image/jpeg");
	echo $image;
?>