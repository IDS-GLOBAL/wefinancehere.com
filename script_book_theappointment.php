<?php require_once("db.php"); ?>
<?

//Why don't you do it before you got to sleep.

if(!$_POST) exit();


print_r($_POST);

if(isset($_POST['wfuserperm_id'], 
$_POST['wfhuserperm_delete'], 
$_POST['wfhuserperm_token'], 
$_POST['wfhuser_id'], 
$_POST['wfhuserperm_approval_id'], 
$_POST['wfhuserperm_approval_name'], 
$_POST['wfhuserperm_approval_email'], 
$_POST['wfhuserperm_approval_phone'], 
$_POST['wfhuserperm_fbid'], 
$_POST['wfhuserperm_appointment_id'], 
$_POST['wfhuserperm_appointment_startyeartime'], 
$_POST['wfhuserperm_appointment_startmonthtime'], 
$_POST['wfhuserperm_appointment_startdaytime'], 
$_POST['wfhuserperm_appointment_starthourtime'], 
$_POST['wfhuserperm_appointment_startsecondtime'], 
$_POST['wfhuserperm_appointment_startunixtime'], 
$_POST['wfhuserperm_appointment_endunixtime'], 
$_POST['wfhuserperm_appointment_timezone'])){





$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_id']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_delete']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_token']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuser_id']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_id']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_name']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_email']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_phone']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_fbid']));


$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_id']));

$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_startyeartime']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_startmonthtime']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_startdaytime']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_starthourtime']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_startsecondtime']));

$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_startunixtime']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_endunixtime']));
$row = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_timezone']));




$_POST['wfhuserperm_id'];
$_POST['wfhuserperm_delete'];
$_POST['wfhuserperm_token'];
$_POST['wfhuserperm_wfhuser_id'];
$_POST['wfhuserperm_approval_id'];
$_POST['wfhuserperm_approval_name'];
$_POST['wfhuserperm_approval_email'];
$_POST['wfhuserperm_approval_phone'];
$_POST['wfhuserperm_fbid'];
$_POST['wfhuserperm_ip'];
$_POST['wfhuserperm_browser'];
$_POST['wfhuserperm_ourrank'];
$_POST['wfhuserperm_okay_perm'];
$_POST['wfhuserperm_when_date'];

$_POST['wfhdelrperm_okay_perm'];
$_POST['wfhdelrperm_when_date'];

$_POST['wfhuserperm_appointment_id'];

$_POST['wfhuserperm_appointment_startyeartime'];
$_POST['wfhuserperm_appointment_startmonthtime'];
$_POST['wfhuserperm_appointment_startdaytime'];
$_POST['wfhuserperm_appointment_starthourtime'];
$_POST['wfhuserperm_appointment_startsecondtime'];

$_POST['wfhuserperm_appointment_startunixtime'];
$_POST['wfhuserperm_appointment_endunixtime'];
$_POST['wfhuserperm_appointment_timezone'];
$_POST['wfhdelrperm_appointment_timezone'];
$_POST['wfhuserperm_appointment_humanread_start'];
$_POST['wfhuserperm_appointment_humanread_end'];
$_POST['wfhuserperm_appointment_status'];
$_POST['wfhuserperm_appointment_user_status'];
$_POST['wfhdelrperm_appointment_dealer_status'];


$_POST['wfhdelrperm_leadpackage_code'];
$_POST['wfhdelrperm_coupon_code'];
$_POST['wfhdelrperm_cost']; 
$_POST['wfhdelrperm_cost'];  
$_POST['wfhdelrperm_charged'];
$_POST['wfhdelrperm_charged_date'];

$_POST['wfhuserperm_id'];
$_POST['wfhuserperm_delete'];
$_POST['wfhuserperm_token'];
$_POST['wfhuser_id'];
$_POST['wfhuserperm_approval_id'];
$_POST['wfhuserperm_approval_name'];
$_POST['wfhuserperm_approval_email'];
$_POST['wfhuserperm_approval_phone'];
$_POST['wfhuserperm_fbid'];
$_POST['wfhuserperm_ip'];
$_POST['wfhuserperm_browser'];
$_POST['wfhuserperm_ourrank'];
$_POST['wfhuserperm_okay_perm'];
$_POST['wfhuserperm_when_date'];

$_POST['wfhdelrperm_okay_perm'];
$_POST['wfhdelrperm_when_date'];

$_POST['wfhuserperm_appointment_id'];

$_POST['wfhuserperm_appointment_startyeartime'];
$_POST['wfhuserperm_appointment_startmonthtime'];
$_POST['wfhuserperm_appointment_startdaytime'];
$_POST['wfhuserperm_appointment_starthourtime'];
$_POST['wfhuserperm_appointment_startsecondtime'];

$_POST['wfhuserperm_appointment_startunixtime'];
$_POST['wfhuserperm_appointment_endunixtime'];
$_POST['wfhuserperm_appointment_timezone'];
$_POST['wfhdelrperm_appointment_timezone'];
$_POST['wfhuserperm_appointment_humanread_start'];
$_POST['wfhuserperm_appointment_humanread_end'];
$_POST['wfhuserperm_appointment_status'];
$_POST['wfhuserperm_appointment_user_status'];
$_POST['wfhdelrperm_appointment_dealer_status'];


$_POST['wfhdelrperm_dlrratewfhuser '];
$_POST['wfhdelrperm_leadpackage_code']; 
$_POST['wfhdelrperm_coupon_code '];
$_POST['wfhdelrperm_cost'];
$_POST['wfhdelrperm_charged'];
$_POST['wfhdelrperm_charged_date'];















$_POST['wfhuserperm_id'];
$_POST['wfhuserperm_delete'];
$_POST['wfhuserperm_token'];
$_POST['wfhuserperm_wfhuser_id'];
$_POST['wfhuserperm_approval_id'];
$_POST['wfhuserperm_approval_name'];
$_POST['wfhuserperm_approval_email'];
$_POST['wfhuserperm_approval_phone'];
$_POST['wfhuserperm_fbid'];
$_POST['wfhuserperm_ip'];
$_POST['wfhuserperm_browser'];
$_POST['wfhuserperm_ourrank'];
$_POST['wfhuserperm_okay_perm'];
$_POST['wfhuserperm_when_date'];

$_POST['wfhdelrperm_okay_perm'];
$_POST['wfhdelrperm_when_date'];

$_POST['wfhuserperm_appointment_id'];

$_POST['wfhuserperm_appointment_startyeartime'];
$_POST['wfhuserperm_appointment_startmonthtime'];
$_POST['wfhuserperm_appointment_startdaytime'];
$_POST['wfhuserperm_appointment_starthourtime'];
$_POST['wfhuserperm_appointment_startsecondtime'];

$_POST['wfhuserperm_appointment_startunixtime'];
$_POST['wfhuserperm_appointment_endunixtime'];
$_POST['wfhuserperm_appointment_timezone'];
$_POST['wfhdelrperm_appointment_timezone'];
$_POST['wfhuserperm_appointment_humanread_start'];
$_POST['wfhuserperm_appointment_humanread_end'];
$_POST['wfhuserperm_appointment_status'];
$_POST['wfhuserperm_appointment_user_status'];
$_POST['wfhdelrperm_appointment_dealer_status'];


$_POST['wfhdelrperm_leadpackage_code'];
$_POST['wfhdelrperm_coupon_code'];
$_POST['wfhdelrperm_cost']; 
$_POST['wfhdelrperm_cost'];  
$_POST['wfhdelrperm_charged'];
$_POST['wfhdelrperm_charged_date'];

$_POST['wfhuserperm_id'];
$_POST['wfhuserperm_delete'];
$_POST['wfhuserperm_token'];
$_POST['wfhuser_id'];
$_POST['wfhuserperm_approval_id'];
$_POST['wfhuserperm_approval_name'];
$_POST['wfhuserperm_approval_email'];
$_POST['wfhuserperm_approval_phone'];
$_POST['wfhuserperm_fbid'];
$_POST['wfhuserperm_ip'];
$_POST['wfhuserperm_browser'];
$_POST['wfhuserperm_ourrank'];
$_POST['wfhuserperm_okay_perm'];
$_POST['wfhuserperm_when_date'];

$_POST['wfhdelrperm_okay_perm'];
$_POST['wfhdelrperm_when_date'];

$_POST['wfhuserperm_appointment_id'];

$_POST['wfhuserperm_appointment_startyeartime'];
$_POST['wfhuserperm_appointment_startmonthtime'];
$_POST['wfhuserperm_appointment_startdaytime'];
$_POST['wfhuserperm_appointment_starthourtime'];
$_POST['wfhuserperm_appointment_startsecondtime'];

$_POST['wfhuserperm_appointment_startunixtime'];
$_POST['wfhuserperm_appointment_endunixtime'];
$_POST['wfhuserperm_appointment_timezone'];
$_POST['wfhdelrperm_appointment_timezone'];
$_POST['wfhuserperm_appointment_humanread_start'];
$_POST['wfhuserperm_appointment_humanread_end'];
$_POST['wfhuserperm_appointment_status'];
$_POST['wfhuserperm_appointment_user_status'];
$_POST['wfhdelrperm_appointment_dealer_status'];


$_POST['wfhdelrperm_dlrratewfhuser '];
$_POST['wfhdelrperm_leadpackage_code']; 
$_POST['wfhdelrperm_coupon_code '];
$_POST['wfhdelrperm_cost'];
$_POST['wfhdelrperm_charged'];
$_POST['wfhdelrperm_charged_date'];

}

?>