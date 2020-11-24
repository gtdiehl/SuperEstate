<?php
	// Import global database connection variable
	include("config.php");

	// Retrieves property id from HTTP GET
	$search_id=$_GET['id'];

	// SQL Query to retrieve all fields for a specific property id
	$sql="select * from property where property_id='$search_id' ";
	$result=mysqli_query($db,$sql);

	// Links HTML Styles to price text
	echo "<style type='text/css'>";
	echo "body{text-align:center;font-family:Microsoft YaHei; font-weight:bold; margin:5px}";
	echo "</style>";

	// If the row count is > 0 display the price
	if (mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_array($result)){
			echo "$" . number_format($row["price"]);
		}
	// If the price is not set display no price
	}else{
		echo "<p>No result</p>";
	}
?>