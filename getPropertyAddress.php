<?php
	// Import global database connection variable
	include("config.php");

	// Retrieves the property id from the HTTP GET
	$property_id=$_GET['id'];

	// SQL Query to retrieve property address details based on property id
	$sql="SELECT address, city, zipcode FROM `property` WHERE `property_id`=$property_id";

	$result=mysqli_query($db,$sql);

	// Return a comma seperated list back to the client to be consumed by Google Maps API
	if (mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_array($result)){
			echo "" . $row['address'] . ", " . $row['city'] . ", " . $row['zipcode'];
		}
	}
?>