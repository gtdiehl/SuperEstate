<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $myemail = mysqli_real_escape_string($db,$_POST['email']); 
      
      $sql = "SELECT user_id FROM account WHERE username = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 0) {
        $sql="insert into account (username, password, email) VALUES ('$myusername', '$mypassword', '$myemail')";
        $result = mysqli_query($db,$sql);
        error_log($result);
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
        <meta charset='utf-8'>
    </head>
    <link rel="stylesheet" type="text/css" href="styles/styles.css"></link>
    <link rel="stylesheet" type="text/css" href="styles/login.css"></link>
    <script src="scripts/navLoaded.js"></script>
    <body onload="navLoaded();">
<style>
    body{background-image:url(images/createanaccount.jpg); background-repeat: no-repeat; background-size: 1500px 1000px;}
</style>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2 style="text-align: center;">Login</h2>
<form action=" " method="post">
    

  <div class="container" style="margin-top: 33%;">
    <div class="imgcontainer"; div style>
        <img src="images/createeaccount2.jpg" alt="Avatar" class="avatar">
    </div>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
        
    <button type="submit">Create Account</button>
   
    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
  </div>

</form>
</body>
</html>