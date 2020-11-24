<?php
    // Import global database connection variable
    include("config.php");

    /**
     * Sets/Removes the favorite property id in the database for a specified user
     * 
     * @param uname Username
     * @param propertyId Property ID
     * @param db database session
     * 
     * @returns boolean if property was set/removed
     */
    function setListofFavs($uname, $propertyId, $db) {
        $sql="SELECT savedproperty FROM `account` WHERE `username`='$uname'";
        
        // If the property id is negative remove the property
        // If the property id is postive add the property
        if($propertyId < 0) {
            $isRemove = true;
        } else {
            $isRemove = false;
        }

        // Remove negative sign if present
        $propertyId = abs($propertyId);

        $result=mysqli_query($db,$sql);

        // If row count is >0, which is should be as the user exists in the db,
        // get the current list of favorite properties. Break the string into an array
        // based on the comma seperator. If the $isRemove flag is set remove the property id
        // from the array, else add it to the array and re-sort the array.
        // Than convert the array back to a string with a comma seperator so it can be
        // returned back to the database.
        if (mysqli_num_rows($result)>0){
            $row=$result->fetch_row();
            $arr = $row[0];
            $a = explode(',', $arr);
            if($isRemove) {
                if (($key = array_search($propertyId, $a)) !== false) {
                    unset($a[$key]);
                }
            } else {
                array_push($a, $propertyId);
                sort($a);
            }
        }
        $a = array_filter($a);
        $favList = implode(',', $a);

        // Set SQL safe update this way due to not using primary key in Update statement
        $sql = "SET SQL_SAFE_UPDATES=0";
        $result=mysqli_query($db,$sql);

        // SQL Update statement to set the list of user's favorite properties
        $sql = "UPDATE account SET savedproperty = '$favList' WHERE username = '$uname'";
        $result=mysqli_query($db,$sql);

        $sql = "SET SQL_SAFE_UPDATES=1";
        $result=mysqli_query($db,$sql);

        mysqli_close($db);
        return !$isRemove;
    }

    header('Content-Type: application/json');

    $aResult = array();

    // Do some checking to make sure the POST has no errors. With no errors move to the
    // setListofFavs() method with arguments.
    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }
    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }
    if( !isset($aResult['error']) ) {

        // Retrieves the functionname from HTTP POST method and runs the functionname
        // with the associated arguments
        switch($_POST['functionname']) {
            case 'fav':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = setListofFavs($_POST['arguments'][0], $_POST['arguments'][1], $db);
               }
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }
    // Returns the result back to the client
    echo json_encode($aResult);
?>