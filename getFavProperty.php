<?php
    include("config.php");
    function getListofFavs($uname, $propertyId) {
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

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'fav':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = getListofFavs($_POST['arguments'][0], $_POST['arguments'][1]);
               }
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }
    echo json_encode($aResult);
?>