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

echo "<style type='text/css'>";
echo "body{text-align:center;font-family:Microsoft YaHei; font-weight:bold; margin:5px}";
echo "</style>";

if (mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_array($result)){
		echo number_format($row["price"]);
	}
}else{
	echo "<p>No result</p>";
}

?>