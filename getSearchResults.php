<?php
$servername=getenv('DB_HOST');
$username=getenv('DB_USERNAME');
$password=getenv('DB_PASSWORD');
$dbname=getenv('DB_DATABASE');
$search_bedrooms=$_GET['bed_count'];
$search_bedrooms=$_GET['bath_count'];
$search_bedrooms=$_GET['building'];
$search_bedrooms=$_GET['minPrice'];
$search_bedrooms=$_GET['maxPrice'];

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed to $servername: ".mysqli_connect_error());
}

//$sql="select * from property where property_id='$search_id' ";
//$result=mysqli_query($conn,$sql);

//echo "<style type='text/css'>";
//echo "body{text-align:center;font-family:Microsoft YaHei; font-weight:bold; margin:5px}";
//echo "</style>";

//if (mysqli_num_rows($result)>0){
//	while ($row=mysqli_fetch_array($result)){
//		echo number_format($row["price"]);
//	}
//}else{
//	echo "<p>No result</p>";
//}

?>