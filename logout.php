<?php
      // PHP method to start new or resume existing session
      session_start();

      // session_destroy() returns true upon successful of closing the session.
      // After closing the session re-direct the user to the login page.
      if(session_destroy()) {
            echo "<script>";
            echo "window.parent.open('login.php', '_self');";
            echo "</script>";
      }
?>