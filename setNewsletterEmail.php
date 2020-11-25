<?php
    // Import global database connection variable
    include("config.php");

    /**
     * Adds the user's e-mail submitted from the form into the database
     * 
     * @param email User's E-Mail Address
     * @param db database session
     */
    function setNewsletterEmail($email, $db) {
        // SQL Insert statement add user e-mail address into the database
        $sql = "INSERT into newsletter (email) VALUES ('$email')";
        $result = mysqli_query($db,$sql);
        mysqli_close($db);

        if($result == 1) {
            return true;
        } else {
            return false;
        }
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
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = setNewsletterEmail($_POST['arguments'][0], $db);
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