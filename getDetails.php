<?php
	include("config.php");
	$get_id=$_GET['id'];

	$sql="select * from property where property_id='$get_id' ";
	$result=mysqli_query($db,$sql);

	echo "<style type='text/css'>";
	echo "body{background-color:#EFEFEF; font-family:Segoe UI; font-weight:bold; padding:8px}";
	echo "h2 {color:#3C7E7E;}";
	echo "h4 {margin:0;}";
	echo "li,p {font-family:Adobe Clean;font-weight: normal;font-size: 18px;}";
	echo "a:link{text-align:center;display:inline-block;padding-left:60px;}";
	echo "a:visited{color:#112CF5;};";
	echo "</style>";

	if (mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_array($result)){
			$zipcode = $row["zipcode"];

			switch ($zipcode) {
				case 95125:
					$guide = "willowglenng.html";
					break;
				case 95112:
					$guide = "downtown.html";
					break;
				case 95148:
					$guide = "evergreen.html";
					break;
				case 95117:
					$guide = "westsanjose.html";
					break;
				default:
					$guide = "index.html";
			}

			echo "<h2>$".number_format($row["price"])."</h2>";
			echo "<h4>Property Details</h4>";
			echo "<ul>";
			echo "<li>".$row["bed_count"]." bedrooms / ".$row["bath_count"]." bathrooms</li>";
			echo "<li>".number_format($row["sqft"])." sqft</li>";
			echo "<li>".$row["parking_type"]."</li>";
			echo "<li>Built in ".$row["build_year"]."</li></ul>";
			echo "<h4>Overview</h4>";
			echo "<p>".$row["description"]."</p>";
			echo "<br><br>";
			echo "<a href='".$guide."' target='_blank'>Neighborhood Information For Zip Code ";
			echo $zipcode."</a>";
		}
	}else{
		echo "<h2>No result</h2>";
	}
	mysqli_close($db);
?>
