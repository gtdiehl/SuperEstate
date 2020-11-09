<?php
$servername=getenv('DB_HOST');
$username=getenv('DB_USERNAME');
$password=getenv('DB_PASSWORD');
$dbname=getenv('DB_DATABASE');
$search_bedrooms=$_GET['bed_count'];
$search_bathrooms=$_GET['bath_count'];
$search_building=$_GET['building'];
$search_minprice=$_GET['min_price'];
$search_maxprice=$_GET['max_price'];

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed to $servername: ".mysqli_connect_error());
}
$sql="SELECT * FROM `property` 
	WHERE (`price` BETWEEN $search_minprice AND $search_maxprice) 
	AND (`bed_count` >= $search_bedrooms)
	AND (`bath_count` >= $search_bathrooms) 
	AND (";


$numItems = count($search_building);
$i = 0;
if ($numItems > 0) {
    $sql .= "(";
    foreach($search_building as &$type) {
        $sql .= "`type` like '$type'";
        if (++$i != $numItems) {
            $sql .= " OR ";
        }
    }
    $sql .= ")";
}

$sql .= ") ORDER BY `price` ASC";

$result=mysqli_query($conn,$sql);

echo "<link rel='stylesheet' type='text/css' href='styles/styles.css'></link>";
echo "<style type='text/css'>";
echo "body{text-align:center; font-family:Microsoft YaHei;
	font-weight:bold; background-color:#DEE7E8;}";
echo "h1 {text-align:left;padding:30px 0px 0px 30px;}";
echo "p {text-align:left;padding-left:30px;}";
echo "</style>";


if (mysqli_num_rows($result)>0){
	echo "<h1>".mysqli_num_rows($result)." results</h1>";
    echo "<p>Sorted by Price (Low to High)</p>";
	while ($row=mysqli_fetch_array($result)){
        echo "<div class='property'>";
        echo "<img src='images/house/house" . $row['property_id'] . ".jpg' alt='house'>";
        echo "<div class='middle'><a href='display.html?id=".$row['property_id']."' target='_blank'>Details</a></div>";
        echo "<div>$ " . number_format($row["price"]) . "</div></div>";
        
	}
}else{
	echo "<p>No homes found.</p>";
}
?>
