<?php
        // Defines the database connection properties
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'superestate');
        define('DB_PASSWORD', 'super12345');
        define('DB_DATABASE', 'superestate');

        // Global variable that is used by other php functions
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

        // If connection cannot be made to the database log the error
        if (!$db){
                die("Connection failed: ".mysqli_connect_error());
        }
?>
