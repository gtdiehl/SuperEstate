<?php
$servername="localhost";
$username="superestate";
$password="super12345";
$dbname="superestate";
$post_name=$_POST['uname'];
$post_pass=$_POST['psw'];
$post_email=$_POST['email'];

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
	die("Connection failed to $servername: ".mysqli_connect_error());
}

$sql="SELECT count(*) FROM `account` 
    WHERE email = '$post_email'";
    
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_row($result);
if($row[0] == 0) {
    $sql="insert into account (username, password, email) VALUES ('$post_name', '$post_pass', '$post_email')";
    $result=mysqli_query($conn,$sql);
    if($result == 1) {
        echo "<h2>Account with e-mail address $post_email is successfully created.</h2>";
    } else {
        echo "<h2>Failed to create account with e-mail address $post_email</h2>";
    }
} else {
    echo "<h2>Account already exists with $post_email. Please login with that e-mail address or create a new account with a different e-mail address.</h2>";
}


mysqli_close($conn);
?>