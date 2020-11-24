<?php
    // Import global database connection variable
    include("config.php");

    // Retrieves search parameters from the HTTP GET based on your inputs
    $search_bedrooms=$_GET['bed_count'];
    $search_bathrooms=$_GET['bath_count'];
    $search_building=$_GET['building'];
    $search_minprice=$_GET['min_price'];
    $search_maxprice=$_GET['max_price'];

    // SQL Query to retrieve all fields for properties that match the user's criteria
    $sql="SELECT * FROM `property` 
        WHERE (`price` BETWEEN $search_minprice AND $search_maxprice) 
        AND (`bed_count` >= $search_bedrooms)
        AND (`bath_count` >= $search_bathrooms) 
        AND (";

    // Continuing building the SQL query statement, as the $search_building is an
    // array and has to be processed.
    $numItems = count($search_building);
    $i = 0;
    if ($numItems > 0) {
        $sql .= "(";
        foreach($search_building as &$type) {
            $sql .= "`type` like '$type'";
            if (++$i != $numItems) {
                $sql .= " OR ";
            }
        }
        $sql .= ")";
    }

    $sql .= ") ORDER BY `price` ASC";

    $result=mysqli_query($db,$sql);

    // Link HTML Styles to the Search page
    echo "<link rel='stylesheet' type='text/css' href='styles/styles.css'></link>";
    echo "<style type='text/css'>";
    echo "body{text-align:center; font-family:Microsoft YaHei;
        font-weight:bold; background-color:#DEE7E8;}";
    echo "h1 {text-align:left;padding:30px 0px 0px 30px;}";
    echo "p {text-align:left;padding-left:30px;}";
    echo "</style>";

    // If SQL Query has more than 0 rows, display the results showing each property
    // in their own container
    if (mysqli_num_rows($result)>0){
        echo "<h1>".mysqli_num_rows($result)." results</h1>";
        echo "<p>Sorted by Price (Low to High)</p>";
        while ($row=mysqli_fetch_array($result)){
            echo "<div class='property'>";
            echo "<img src='images/house/house" . $row['property_id'] . ".jpg' alt='house'>";
            echo "<div class='middle'><a href='display.php?id=".$row['property_id']."' target='_blank'>Details</a></div>";
            echo "<div>$ " . number_format($row["price"]) . "</div></div>";
            
        }
    // If 0 rows are found tell the user no homes are found that match their criteria.
    }else{
        echo "<p>No homes found.</p>";
    }
?>
