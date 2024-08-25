<?php

/*$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection); 

*/
$user_name = 'idsids_wefinance';
$password = "yrBIBVwHt)6p";
$_SERVER = 'localhost';
$db_name = "idsids_wefinancehere";

$con = mysqli_connect($server,$user_name,$password,$db_name);

// if($con){ echo 'A';  }else{ echo 'b'; }

if($con && isset($_POST['name'])){

        $Name = mysqli_escape_string($con, trim($_POST['name']));
       

        $query = "INSERT INTO `idsids_wefinancehere`.`wfhuser_referrals` SET `referral_name` = '$Name'";
        $result = mysqli_query($con,$query);
        
        if($result){
            $status='OK';

        }else{
        $status='FAILED';
        }

}else
    {     
        $status='FAILED';
    }
    
    
    
    echo json_encode(array("response"=>$status));

    mysqli_close($con);
    
?>
