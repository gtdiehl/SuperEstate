<?php
// Import global database connection variable
include("config.php");
$results_per_page = 5; 
$uri = $_SERVER['REQUEST_URI'];

?>
<html>
	<head>
		<!-- Sets the HTML styles for the Agents page-->
		<link rel='stylesheet' type='text/css' href='styles/agentStyles.css'></link>
		<style type='text/css'>
		*{margin:0; text-align:left; font-family:Microsoft YaHei UI;}
		h2 {padding:30px 0px 0px 30px; color:#B6A11A;}
		h3 {padding-left:30px; font-weight:bold;}
		h4 {padding:15px 30px; text-align:left; font-weight:bold; font-size:120%; color:#B6A11A;}
		h5 {padding:5px 30px; font-weight:normal; color:#656061;}
		p {padding:5px 30px;}
		table {position: relative;margin: 50px auto;}
		table img {padding: 5px;object-fit:cover;}
		a.contact {padding-top:15px; display: inline-block; 
			font-family:Arial; font-weight:normal;font-size:18px; 
			color:#F56872; text-decoration: none;}
		a.page:link, a.page:visited {background-color:white;margin:5px;
										padding:3px 8px;display:inline-block;
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
// Retrieve language and name values from the HTTP GET
$search_language=$_GET['language'];
$search_name=$_GET['name'];

// SQL Query to retrieve all agents that match specified language and name
$condition="WHERE (`fname` LIKE '%$search_name%' OR `lname` LIKE '%$search_name%') 
	AND (`language` LIKE '%$search_language%')";

if (isset($_GET["page"])) {
	$page  = $_GET["page"];
	}else {$page=1;};
$start_from = ($page-1) * $results_per_page;
	
$sql="SELECT * FROM `agent`".$condition;
$sql .= " ORDER BY `fname` LIMIT $start_from, ".$results_per_page;

$result=mysqli_query($db,$sql);

$sql2 = "SELECT COUNT(`agent_id`) AS total FROM `agent`".$condition;
$result2=mysqli_query($db,$sql2);
$row2 = $result2->fetch_assoc();

// If the row count is more than 0, build the page using the fields from the row result
// If the row count is zero display no agents found
if (mysqli_num_rows($result)>0){
	echo "<h2>".$row2["total"]." results</h2>";
    echo "<h3>Sorted by first name (A-Z)</h3>";
	while ($row=mysqli_fetch_array($result)){
        echo "<table bgcolor='white'><tr>";
        echo "<td><img src='images/agent/agent" . $row['agent_id'] . ".jpg' alt='agent' width='200' height='250'></td>";
        
		echo "<td valign='top' width='400'>";
		echo "<h4>". $row['fname'] ." ". $row['lname'] ."</h4>";
		echo "<p>Phone: ". $row['phone'] ."</p>";
		echo "<p>Email: ". $row['email'] ."</p><br><br><br><br><br>";
		echo "<h5>". $row['language'] ."</h5></td>";
		
		echo "<td valign='top' width='120'>";
		echo "<a href='mailto:". $row['email'] ."' class='contact'>Contact Me</a></td>";
		echo "</tr></table>";
        
	}
}else{
	echo "<p>No agents found.</p>";
}


// calculate total pages with results
$total_pages = ceil($row2["total"] / $results_per_page); 
// print links for all pages
echo "<div style='position:absolute;bottom:70px;width:100%;
	display: flex;justify-content:center;'>";
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
