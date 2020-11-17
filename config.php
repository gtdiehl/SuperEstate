<?php
   define('DB_SERVER', getenv('DB_HOST'));
   define('DB_USERNAME', getenv('DB_USERNAME'));
   define('DB_PASSWORD', getenv('DB_PASSWORD'));
   define('DB_DATABASE', getenv('DB_DATABASE'));
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>