<?php
	include("config.php");
	session_start();
	$error="";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// username and password sent from form
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

		$sql = "SELECT user_id FROM account WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count == 1) {
			$_SESSION['login_user'] = $myusername;
			header("location: myproperty.php");
		}else {
			$error = "Your Login Name or Password is invalid";
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
	<style type="text/CSS">
		body{
			background-image:url(images/login1.jpg); 
			background-repeat: no-repeat; 
			background-size: cover;
		}
	</style>
	
	<body onload="navLoaded();">
		<h2 style="text-align:center;">Login</h2>
		<div class="container">
			<form action=" " method="post">
					<div class="imgcontainer">
						<img src="images/logiin.jpg" alt="Avatar" class="avatar">
					</div>
					
					<label for="uname"><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="username" required>

					<label for="psw"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password" required>

					<button type="submit">Login</button>
					
					<p style="margin-top:10px;">
						<a href="createaccount.php" style="color:#206262;">
							Don't have an account? <b>CLICK HERE</b>
						</a>
					</p>
					
					<div style="font-size:13px;color:#cc0000;margin-top:10px;"><?php echo $error; ?></div>
				

			</form>
		</div>
	</body>
</html>