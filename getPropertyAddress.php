<?php
include("config.php");
$property_id=$_GET['id'];

$sql="SELECT address, city, zipcode FROM `property` WHERE `property_id`=$property_id";

$result=mysqli_query($db,$sql);

if (mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_array($result)){
        echo "" . $row['address'] . ", " . $row['city'] . ", " . $row['zipcode'];
	}
}
?>