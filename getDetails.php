<?php
$servername=getenv('DB_HOST');
$username=getenv('DB_USERNAME');
$password=getenv('DB_PASSWORD');
$dbname=getenv('DB_DATABASE');
$get_id=$_GET['id'];

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed to $servername: ".mysqli_connect_error());
}

$sql="select * from property where property_id='$get_id' ";
$result=mysqli_query($conn,$sql);

echo "<style type='text/css'>";
echo "body{background-color:#EFEFEF; font-family:Segoe UI; font-weight:bold; padding:8px}";
echo "h2 {color:#3C7E7E;}";
echo "a:link{text-align:center;display:inline-block;padding-left:30px;}";
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
				$guide = "index.html";
				break;
			case 95148:
				$guide = "index.html";
				break;
			case 95117:
				$guide = "index.html";
				break;
			default:
				$guide = "index.html";
		}

		echo "<h2>$".number_format($row["price"])."</h2>";
		echo "<p>Property Details</p>";
		echo "<ul>";
		echo "<li>".$row["bed_count"]." bedrooms / ".$row["bath_count"]." bathrooms</li>";
		echo "<li>".number_format($row["sqft"])." sqft</li>";
		echo "<li>".$row["parking_type"]."</li>";
		echo "<li>Built in ".$row["build_year"]."</li></ul>";
		echo "<br><br><br>";
		echo "<a href='" . $guide ."' target='_blank'>Neighborhood Information<br>For Zip Code ";
		echo $zipcode."</a>";
	}
}else{
	echo "<h2>No result</h2>";
}


mysqli_close($conn);

?>
