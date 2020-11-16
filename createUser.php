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

$row=$mysqli_fetch_row($result);
echo $row[0];
?>