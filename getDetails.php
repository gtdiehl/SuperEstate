<?php
$servername=DB_HOST;
$username="superestate";
$password="super12345";
$dbname="superestate";
$get_id=$_GET['id'];

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed: ".mysqli_connect_error());
}

$sql="select * from property where property_id='$get_id' ";
$result=mysqli_query($conn,$sql);

echo "<style type='text/css'>";
echo "body{background-color:#EFEFEF; font-family:Segoe UI; font-weight:bold; padding:8px}";
echo "h2 {color:#3C7E7E;}";
echo "</style>";

if (mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_array($result)){
		echo "<h2>$".number_format($row["price"])."</h2>";
		echo "<p>Property Details</p>";
		echo "<ul>";
		echo "<li>".$row["bed_count"]." bedrooms / ".$row["bath_count"]." bathrooms</li>";
		echo "<li>".$row["sqft"]." sqft</li>";
		echo "<li>Built in ".$row["build_year"]."</li></ul>";
		echo "<br><br><br>";
		echo "<p style='text-align:center;color:#112CF5;'><u>Neighborhood Information<br>For Zip Code ";
		echo $row["zipcode"]."</u></p>";
	}
}else{
	echo "<h2>No result</h2>";
}


mysqli_close($conn);

?>