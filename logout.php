<?php
   session_start();
   
   if(session_destroy()) {
         echo "<script>";
         echo "window.parent.open('login.php', '_self');";
         echo "</script>";
   }
?>