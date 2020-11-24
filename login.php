<?php
	// Import global database connection variable
	include("config.php");

	// PHP method to start new or resume existing session
	session_start();

	$error="";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Username abd Password sent from the form
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

		// SQL Query to check if username with matching password exists in the database
		$sql = "SELECT user_id FROM account WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
		// Which means user exists and re-direct to the My Property page. 
		if($count == 1) {
			$_SESSION['login_user'] = $myusername;
			header("location: myproperty.php");
		// If user does not exist display the error to the user
		}else {
			$error = "Your Login Name or Password is invalid";
		}
	}
?>
<html>
	<head>
		<meta charset='utf-8'name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<link rel="stylesheet" type="text/css" href="styles/styles.css"></link>
	<link rel="stylesheet" type="text/css" href="styles/login.css"></link>
	<script src="scripts/navLoaded.js"></script>
	<style type="text/CSS">
		body{
			background-image:url(images/login1.jpg); 
			background-repeat: no-repeat; 
			background-size: 1500px 1000px;
		}
	</style>
	
	<body onload="navLoaded();">
		<h2 style="text-align: center;">Login</h2>
		<form action=" " method="post">
		
			<div class="container" style="margin-top: 33%;">
				<div class="imgcontainer"; div style>
					<img src="images/logiin.jpg" alt="Avatar" class="avatar">
				</div>
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

					
				<button type="submit">Login</button>
				<p>
					<a href="createaccount.php">Don't have an account? CLICK HERE</a>
				</p>
				<div style="font-size:11px;color:#cc0000;margin-top:10px"><?php echo $error; ?></div>
			</div>

		</form>
	</body>
</html>
