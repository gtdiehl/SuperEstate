<?php
    include("config.php");

    function setListofFavs($uname, $propertyId, $db) {
        $sql="SELECT savedproperty FROM `account` WHERE `username`='$uname'";
        
        if($propertyId < 0) {
            $isRemove = true;
        } else {
            $isRemove = false;
        }

        $propertyId = abs($propertyId);
        $result=mysqli_query($db,$sql);

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

        $sql = "SET SQL_SAFE_UPDATES=0";
        $result=mysqli_query($db,$sql);

        $sql = "UPDATE account SET savedproperty = '$favList' WHERE username = '$uname'";
        $result=mysqli_query($db,$sql);

        $sql = "SET SQL_SAFE_UPDATES=1";
        $result=mysqli_query($db,$sql);

        mysqli_close($db);
        return !$isRemove;
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
                   $aResult['result'] = setListofFavs($_POST['arguments'][0], $_POST['arguments'][1], $db);
               }
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

?>