<?php
include("config.php");

$sql="SELECT * FROM `account`";
$result=mysqli_query($db,$sql);


if (mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_array($result)){
		$array[] = explode(",", $row["savedproperty"]);
	}
}else{
	echo "<p>No popular homes.</p>";
}

$res = array_icount_values ($array);
function array_icount_values($arr,$lower=true) {
	$arr2=array();
	if(!is_array($arr['0'])){$arr=array($arr);}
	foreach($arr as $k=> $v){
		foreach($v as $v2){
			if($lower==true) {$v2=strtolower($v2);}
			if(!isset($arr2[$v2])){
				$arr2[$v2]=1;
			}else{
			   $arr2[$v2]++;
			}
		}
	}
	return $arr2;
}
arsort($res);
unset($res[""]);
$i = 0;
$sql2 = "SELECT * FROM `property` WHERE (";
foreach(array_slice($res,0,9, true) as $key => $value) {
	$sql2 .= "`property_id`=" .$key;
	if (++$i != 9) {
            $sql2 .= " OR ";
        }
}
$sql2 .= ")";
$result2=mysqli_query($db,$sql2);

echo "<link rel='stylesheet' type='text/css' href='styles/styles.css'></link>";
echo "<style type='text/css'>";
echo "body{text-align:center; font-family:Microsoft YaHei;
	font-weight:bold; background-color:#DEE7E8;}";
echo "h1 {text-align:left;padding:30px 0px 0px 30px;color:red;}";
echo "p {text-align:left;padding-left:30px;}";
echo "</style>";

if (mysqli_num_rows($result2)>0){
	echo "<h1>Top 9 Hottest Homes</h1>";
    echo "<p>Sort by Popularity (High to Low)</p>";
	while ($row2=mysqli_fetch_array($result2)){
        echo "<div class='property'>";
        echo "<img src='images/house/house" . $row2['property_id'] . ".jpg' alt='house'>";
        echo "<div class='middle'><a href='display.php?id=".$row2['property_id']."' target='_blank'>Details</a></div>";
        echo "<div>$ " . number_format($row2["price"]) . "</div></div>";
        
	}
}else{
	echo "<p>No homes found.</p>";
}


mysqli_close($db);

?>