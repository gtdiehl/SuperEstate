<?php
	// Import global database connection variable
	include("config.php");

	// Retrieves the property id from the HTTP GET
	$property_id=$_GET['id'];

	// SQL Query to get photo and video count for specified property id
	$sql="SELECT photo_count, video_count FROM `property` WHERE `property_id`=$property_id";

	$result=mysqli_query($db,$sql);

	// Return photo and video count back to the client to be displayed
	if (mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_array($result)){
			echo "" . $row['photo_count'] . "," . $row['video_count'];
		}
	}
?>