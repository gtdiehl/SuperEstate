<?php
    // Import global database connection variable
    include("config.php");

    /**
     * Checks if property is marked as a user's favorite
     * in the database 
     * 
     * @param uname Username
     * @param propertyId Property ID
     * @param db database session
     * 
     * @returns boolean if property was found in database 
     */
    function getListofFavs($uname, $propertyId, $db) {
        $sql="SELECT savedproperty FROM `account` WHERE `username`='$uname'";

        $result=mysqli_query($db,$sql);

        if (mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_array($result)){
                $arr = $row['savedproperty'];
                $a = explode(',', $arr);
                foreach ($a as $b) {
                    if($b == $propertyId) {
                        mysqli_close($db);
                        return true;
                    }
                }
            }
        }
        mysqli_close($db);
        return false;
    }

    header('Content-Type: application/json');

    $aResult = array();

    // Do some checking to make sure the POST has no errors. With no errors move to the
    // getListofFavs() method with arguments.
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
                   $aResult['result'] = getListofFavs($_POST['arguments'][0], $_POST['arguments'][1], $db);
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