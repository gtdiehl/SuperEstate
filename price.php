<?php
include("config.php");
$search_id=$_GET['id'];

$sql="select * from property where property_id='$search_id' ";
$result=mysqli_query($db,$sql);

echo "<style type='text/css'>";
echo "body{text-align:center;font-family:Microsoft YaHei; font-weight:bold; margin:5px}";
echo "</style>";

if (mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_array($result)){
		echo "$" . number_format($row["price"]);
	}
}else{
	echo "<p>No result</p>";
}

?>