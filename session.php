<?php
   // Import global database connection variable
   include('config.php');

   // PHP method to start new or resume existing session
   session_start();
   
   // Get user name from PHP server
   $user_check = $_SESSION['login_user'];
   
   // Check database if user exists
   $ses_sql = mysqli_query($db,"select username from account where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];
   
   // If PHP server cannot set the user name than re-direct to login page
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>