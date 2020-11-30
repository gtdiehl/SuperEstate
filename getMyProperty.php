<?php
    // Import global database connection variable
    include("config.php");

    // Retrieve username from HTTP POST passed in from form
    $post_username=$_POST['username'];

    // SQL Query to retrieve list of favorite properies for a specific user
    $sql="SELECT savedproperty FROM `account` WHERE `username`='$post_username'";

    // Link HTML Styles My Property page
    echo "<link rel='stylesheet' type='text/css' href='styles/styles.css'></link>";
	echo "<style type='text/css'>body {background-color:#DEE7E8;}</style>";
    // Display HTML text and logout link
    echo "<div class='savedPropertyTop'>";
    echo "<div class='savedPropertyColumn'>";
    echo "<h1 id='savedPropertyHeading'>My Saved Properties</h1>";
    echo "</div>";
    echo "<div class='savedPropertyColumn' id='floatRight'>";
    echo "<h2><a href = 'logout.php'>Sign Out</a></h2>";
    echo "</div>";
    echo "</div>";

    $result=mysqli_query($db,$sql);

    // Display properties
    if (mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_array($result)){
            $arr = $row['savedproperty'];
            // If the result returned from the database != null than list each property
            // in their own container
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
            // If the result is null, tell the user they have not saved any properties.
            } else {
                echo "<h3 class='noSavedProperties'>No Saved Properties</h3>";
                echo "<h3 class='nosavedProperties' id='propMesg'>Click on the ☆ icon in the Property page to save your favorite property.</h3>";
            }
        }
    }
    mysqli_close($db);
?>