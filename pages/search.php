<?php
$conn = new mysqli("localhost", "root", "root", "samhandla") or die($conn->connect_error());
$output = '';
//collect 
if(isset($_POST['search'])) //körs bara om man har skrivit något och klickat på knappen.
{
	$searchq = $_POST['search'];
	$searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);


	$query = mysqli_query($conn, "SELECT * FROM list WHERE listName LIKE '%$searchq%'") or die("kunde inte söka");
	$count = mysqli_num_rows($query);
	if($count == 0)
	{
		$output = 'Inget resultat';
	}
	else
	{
		while($row = mysqli_fetch_array($query))
		{
			$listName = $row['listName'];

			$output .= '<div>'.$listName. '</div>';
		}
	}
}
?>
