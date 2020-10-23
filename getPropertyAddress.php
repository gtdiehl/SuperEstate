<?php
$servername="localhost";
$username="superestate";
$password="super12345";
$dbname="superestate";
$property_id=$_GET['id'];

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed to $servername: ".mysqli_connect_error());
}
$sql="SELECT address, city, zipcode FROM `property` WHERE `property_id`=$property_id";

$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_array($result)){
        echo "" . $row['address'] . ", " . $row['city'] . ", " . $row['zipcode'];
	}
}
?>