<?php
$servername="localhost";
$username="superestate";
$password="super12345";
$dbname="superestate";
$search_id=$_GET['id'];

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed: ".mysqli_connect_error());
}

$sql="select * from property where property_id='$search_id' ";
$result=mysqli_query($conn,$sql);

echo "<h1>Diaplay page</h1>";
echo "<table border=2>";
echo "<tr><td>property_id</td>
	<td>price</td>
	<td>bed_count</td>
	<td>bath_count</td>
	<td>sqft</td>
	<td>build_year</td>
	<td>zipcode</td>
	</tr>";

if (mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_array($result)){
		echo "<tr><td>".$row["property_id"]."</td>";
		echo     "<td>".$row["price"]."</td>";
		echo     "<td>".$row["bed_count"]."</td>";
		echo     "<td>".$row["bath_count"]."</td>";
		echo     "<td>".$row["sqft"]."</td>";
		echo     "<td>".$row["build_year"]."</td>";
		echo     "<td>".$row["zipcode"]."</td></tr>";
	}
}else{
	echo "<h2>No result</h2>";
}

echo "</table>";

mysqli_close($conn);

?>