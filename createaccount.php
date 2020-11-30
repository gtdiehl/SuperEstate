<?php
	// Import global database connection variable
	include("config.php");

	// PHP method to start new or resume existing session
	session_start();

	$error="";
   
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// Username, Password, and E-Mail Address sent from the form
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);
		$myemail = mysqli_real_escape_string($db,$_POST['email']); 

		// SQL Query to check if username exists in the database
		$sql = "SELECT user_id FROM account WHERE username = '$myusername'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		// Get count of number of rows returned from the SQL Query
		$count = mysqli_num_rows($result);
	  
		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count == 0) {
			// SQL INSERT statement to add the user details into the database
			$sql="insert into account (username, password, email) VALUES ('$myusername', '$mypassword', '$myemail')";
			$result = mysqli_query($db,$sql);
			error_log($result);
			// Upon successful insertion re-direct user to login page. If a failure occurs display an error.
			if($result) {
				header("location: login.php");
			} else {
				$error = "Error while creating account.";
			} 
		} else {
			$error = "Account already exists. Please use a different username.";
		}
	}
?>
<html>
	<head>
		<meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1">
	</head>
	
	<link rel="stylesheet" type="text/css" href="styles/styles.css"></link>
	<link rel="stylesheet" type="text/css" href="styles/login.css"></link>
	<script src="scripts/navLoaded.js"></script>
	<style>
		body{
			background-image:url(images/createanaccount.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
	
	<body onload="navLoaded();">
		<h2 style="text-align:center;">Sign up</h2>
		<div class="container">
			<form action=" " method="post">
					<div class="imgcontainer">
						<img src="images/createeaccount2.jpg" alt="Avatar" class="avatar">
					</div>
					
					<label for="uname"><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="username" required>

					<label for="psw"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password" required>

					<label for="email"><b>Email</b></label>
					<input type="email" placeholder="Enter Email" name="email" required>
						
					<button type="submit">Create Account</button>

					<div style = "font-size:13px;color:#cc0000;margin-top:10px"><?php echo $error; ?></div>
				

			</form>
		</div>
	</body>
</html>