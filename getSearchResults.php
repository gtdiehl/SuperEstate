<?php
// Import global database connection variable
include("config.php");
$results_per_page = 9; 
$uri = $_SERVER['REQUEST_URI'];
?>

<html>
	<head>
		<link rel='stylesheet' type='text/css' href='styles/styles.css'></link>
		<style type='text/css'>
		body{text-align:center; font-family:Microsoft YaHei;
		font-weight:bold; background-color:#DEE7E8;}
		h1 {text-align:left;padding:30px 0px 0px 30px;}
		p {text-align:left;padding-left:30px;}
		a.page:link, a.page:visited {background-color:white;padding:3px 8px;display:inline-block;
										border:1.5px solid #A6ACAC;border-radius:5px;
										text-align:center;text-decoration:none;color:#7CB9B9;
										font-family:Comic Sans MS;font-weight:bold;}
		a.page:hover, a.page:active {color:#576A98;}
		</style>
		<script>
			function up(){
				parent.document.body.scrollTop = 0;
				parent.document.documentElement.scrollTop = 0;
			}
		</script>
	</head>
	<body>
<?php
$search_bedrooms=$_GET['bed_count'];
$search_bathrooms=$_GET['bath_count'];
$search_building=$_GET['building'];
$search_minprice=$_GET['min_price'];
$search_maxprice=$_GET['max_price'];

//Building the SQL query statement
$condition="WHERE (`price` BETWEEN $search_minprice AND $search_maxprice) 
	AND (`bed_count` >= $search_bedrooms) AND (`bath_count` >= $search_bathrooms) AND (";
//the $search_building is anarray and has to be processed.
$numItems = count($search_building);
$i = 0;
if ($numItems > 0) {
    $condition .= "(";
    foreach($search_building as &$type) {
        $condition .= "`type` like '$type'";
        if (++$i != $numItems) {
            $condition .= " OR ";
        }
    }
    $condition .= ")";
}
$condition .= ")";

if (isset($_GET["page"])) {
	$page  = $_GET["page"];
	}else {$page=1;};
$start_from = ($page-1) * $results_per_page;

// SQL Query to retrieve all fields for properties that match the user's criteria
$sql="SELECT * FROM `property`".$condition;
$sql .= " ORDER BY `price` ASC LIMIT $start_from, ".$results_per_page;

$result=mysqli_query($db,$sql);

$sql2 = "SELECT COUNT(`property_id`) AS total FROM `property`".$condition;
$result2=mysqli_query($db,$sql2);
$row2 = $result2->fetch_assoc();

// If SQL Query has more than 0 rows, display the results showing each property in their own container
if (mysqli_num_rows($result)>0){
	echo "<h1>".$row2["total"]." results</h1>";
    echo "<p>Sorted by Price (Low to High)</p>";
	while ($row=mysqli_fetch_array($result)){
        echo "<div class='property'>";
        echo "<img src='images/house/house" . $row['property_id'] . ".jpg' alt='house'>";
        echo "<div class='middle'><a href='display.php?id=".$row['property_id']."' target='_blank'>Details</a></div>";
        echo "<div>$ " . number_format($row["price"]) . "</div></div>";
        
	}
}else{
	// If 0 rows are found tell the user no homes are found that match their criteria.
	echo "<p>No homes found.</p>";
}

// calculate total pages with results
$total_pages = ceil($row2["total"] / $results_per_page); 
// print links for all pages
echo "<div style='position: absolute;bottom:50px;width:100%;'>";
for ($i=1; $i<=$total_pages; $i++) {  
            echo "<a href='".$uri."&page=".$i."' class='page' onclick='up()' ";
			
            if ($i==$page)
				echo "style='color:black'";
			
            echo ">".$i."</a> "; 
}
echo "</div>";




mysqli_close($db);
?>

	</body>
</html>
