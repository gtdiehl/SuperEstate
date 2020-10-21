<?php
$servername=getenv('DB_HOST');
$username=getenv('DB_USERNAME');
$password=getenv('DB_PASSWORD');
$dbname=getenv('DB_DATABASE');
$search_bedrooms=$_GET['bed_count'];
$search_bathrooms=$_GET['bath_count'];
$search_building=$_GET['building'];
$search_minprice=$_GET['minPrice'];
$search_maxprice=$_GET['maxPrice'];

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed to $servername: ".mysqli_connect_error());
}

$sql="select property_id from property where bed_count >= '$search_bedrooms' AND bath_count >= '$search_bathrooms' AND price >= '$search_minprice' AND price <= '$search_maxprice' AND ";
echo "$sql";

$numItems = count($search_building);
echo "$numItems";

$i = 0;
if ($numItems > 0) {
    foreach($search_building as &$type) {
        $sql += "type = '$type'";
        if (++$i != $numItems) {
            $sql += " or ";
        }
    }
}

echo "$sql";
$result=mysqli_query($conn,$sql);

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