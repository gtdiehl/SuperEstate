<?php
$servername=getenv('DB_HOST');
$username=getenv('DB_USERNAME');
$password=getenv('DB_PASSWORD');
$dbname=getenv('DB_DATABASE');
$property_id=$_GET['id'];

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed to $servername: ".mysqli_connect_error());
}
$sql="SELECT photo_count, video_count FROM `property` WHERE `property_id`=$property_id";

$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_array($result)){
        echo "" . $row['photo_count'] . "," . $row['video_count'];
	}
}
?>