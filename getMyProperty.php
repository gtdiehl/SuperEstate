<?php
$servername=getenv('DB_HOST');
$username=getenv('DB_USERNAME');
$password=getenv('DB_PASSWORD');
$dbname=getenv('DB_DATABASE');

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed to $servername: ".mysqli_connect_error());
}

$sql="SELECT savedproperty FROM `account` WHERE `username`='superestate'";

echo "<link rel='stylesheet' type='text/css' href='styles/agentStyles.css'></link>";

$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_array($result)){
        $arr = $row['savedproperty'];
        $a = explode(',', $arr);
        foreach ($a as $b) {
            echo "<div class='property'>";
            echo "<img src='images/house/house" .$b. ".jpg' alt='house'>";
            echo "<div class='middle'>";
            echo "<a href='display.html?id=" .$b. " ' target='_blank'>Details</a></div>";
            echo "<iframe src='price.php?id=" .$b. " ' width='100%' height='35'></iframe>";
            echo "</div>";
        }
	}
}

?>