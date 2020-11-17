<?php
	include("config.php");
	$search_language=$_GET['language'];
	$search_name=$_GET['name'];

	$sql="SELECT * FROM `agent` 
		WHERE (`fname` LIKE '%$search_name%' OR `lname` LIKE '%$search_name%') 
		AND (`language` LIKE '%$search_language%')";

	$sql .= " ORDER BY `fname`";

	$result=mysqli_query($db,$sql);

	echo "<link rel='stylesheet' type='text/css' href='styles/agentStyles.css'></link>";
	echo "<style type='text/css'>";
	echo "*{margin:0; text-align:left; font-family:Microsoft YaHei UI;}";
	echo "h2 {padding:30px 0px 0px 30px; color:#B6A11A;}";
	echo "h3 {padding-left:30px; font-weight:bold;}";
	echo "h4 {padding:15px 30px; text-align:left; font-weight:bold; font-size:120%; color:#B6A11A;}";
	echo "h5 {padding:5px 30px; font-weight:normal; color:#656061;}";
	echo "p {padding:5px 30px;}";
	echo "a {padding-top:15px; display: inline-block; font-family:Arial; font-weight:normal;font-size:18px; color:#F56872; text-decoration: none;}";

	echo "</style>";


	if (mysqli_num_rows($result)>0){
		echo "<h2>".mysqli_num_rows($result)." results</h2>";
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
			echo "<a href='mailto:". $row['email'] ."'>Contact Me</a></td>";
			echo "</tr></table>";
			
		}
	}else{
		echo "<p>No agents found.</p>";
	}
?>
