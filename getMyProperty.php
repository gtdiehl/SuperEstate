<?php
    include("config.php");
    $post_username=$_POST['username'];

    $sql="SELECT savedproperty FROM `account` WHERE `username`='$post_username'";

    echo "<link rel='stylesheet' type='text/css' href='styles/styles.css'></link>";

    echo "<h1>My Saved Properties</h1>";
    echo "<h2><a href = 'logout.php'>Sign Out</a></h2>";

    $result=mysqli_query($db,$sql);

    if (mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_array($result)){
            $arr = $row['savedproperty'];
            if($arr != null) {
                $a = explode(',', $arr);
                foreach ($a as $b) {
                    echo "<div class='property'>";
                    echo "<img src='images/house/house" .$b. ".jpg' alt='house'>";
                    echo "<div class='middle'>";
                    echo "<a href='display.php?id=" .$b. " ' target='_blank'>Details</a></div>";
                    echo "<iframe src='price.php?id=" .$b. " ' width='100%' height='35'></iframe>";
                    echo "</div>";
                }
            } else {
                echo "<h2>No Saved Properties. Click on the favorite Star icon on the Property page to save your favorite property.</h2>";
            }
        }
    }
    mysqli_close($db);
?>