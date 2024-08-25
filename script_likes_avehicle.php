<?php require_once("db.php"); ?>
<?

//Why don't you do it before you got to sleep.

if(!$_POST) exit();



//print_r($_POST);

if(isset($_POST['vid'], $_POST['vdescript_txt'], $_POST['budget_afford'], $_POST['gross_monthlyincome'], $_POST['cust_creditapr'], $_POST['cust_creditapr_txt'], $_POST['wfhuserperm_token'], $_POST['wfhuser_id'], $_POST['wfhuser_approval_id'], $_POST['wfhuserperm_approval_fname'], $_POST['wfhuserperm_approval_lname'], $_POST['wfhuserperm_approval_email'], $_POST['wfhuserperm_approval_phone'], $_POST['wfhuserperm_fbid'], $_POST['wfhuserperm_timezone'])){


//echo 'I made it Damnit';


$colname_find_exstwfhuserfbuserprofile_email = "-1";
if (isset($_POST['wfhuserperm_approval_email'])) {
  $colname_find_exstwfhuserfbuserprofile_email = mysqli_real_escape_string($wfh_connection_mysqli, trim($_POST['wfhuserperm_approval_email']));
}
mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_find_exstwfhuserfbuserprofile_email =  "SELECT * FROM `wfhuserprofile` WHERE `wfhuser_email_address` = '$colname_find_exstwfhuserfbuserprofile_email'";
$find_exstwfhuserfbuserprofile_email = mysqli_query($wfh_connection_mysqli, $query_find_exstwfhuserfbuserprofile_email);
$row_find_exstwfhuserfbuserprofile_email = mysqli_fetch_assoc($find_exstwfhuserfbuserprofile_email);
$totalRows_find_exstwfhuserfbuserprofile_email = mysqli_num_rows($find_exstwfhuserfbuserprofile_email);

$wfhuser_id = $row_find_exstwfhuserfbuserprofile_email['wfhuser_id'];
$wfhuser_email_address = $row_find_exstwfhuserfbuserprofile_email['wfhuser_email_address'];
$wfhuser_fbemail = $row_find_exstwfhuserfbuserprofile_email['wfhuser_fbemail'];


$post_vid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vid']));
$post_vdescript_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vdescript_txt']));
$post_budget_afford = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['budget_afford']));
$post_gross_monthincome = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['gross_monthlyincome']));
$post_cust_creditapr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_creditapr']));
$post_cust_creditapr_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_creditapr_txt']));

//$wfhuserperm_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_id']));

$post_wfhuserperm_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_token']));
$post_wfhuser_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuser_id']));

$wfhuserid_matched = 'N';

if($post_wfhuser_id == $wfhuser_id){ $wfhuserid_matched = 'Y'; }

$post_wfhuserperm_approval_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuser_approval_id']));
$post_wfhuserperm_approval_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_fname']));
$post_wfhuserperm_approval_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_lname']));

$post_wfhuserperm_approval_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_email']));
$post_wfhuserperm_approval_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_phone']));
$post_wfhuserperm_fbid =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_fbid']));


//$wfhuserperm_appointment_id = $row_wfhuserperm_approval_lname['wfhuserperm_appointment_id'];

$post_wfhuserperm_appointment_timezone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_appointment_timezone']));




mysql_select_db($database_wfh_connection, $wfh_connection);
$query_find_exstwfhuser_vlike = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_approvals_perms` WHERE `wfhuser_approvals_perms`.`wfhuserperm_approval_email` = '$post_wfhuserperm_approval_email' AND `wfhuser_approvals_perms`.`wfhuserperm_vehicle_id` = '$post_vid'";
$find_exstwfhuser_vlike = mysqli_query($idsconnection_mysqli, $query_find_exstwfhuser_vlike, $wfh_connection);
$row_find_exstwfhuser_vlike = mysqli_fetch_assoc($find_exstwfhuser_vlike);
$totalRows_find_exstwfhuser_vlike = mysqli_num_rows($find_exstwfhuser_vlike);

$wfhuserperm_id = $row_find_exstwfhuser_vlike['wfhuserperm_id'];


//echo 'Well The Two Emails Matched? '.$wfhuserid_matched.'<br />';

if($post_budget_afford == 'Y'){

		$wfhuserperm_ourrank = 'C';
		
			if($post_wfhuserperm_approval_id){
				$wfhdelrperm_cost = '15.00';
			}else{
				$wfhuserperm_ourrank = 'F';
				$wfhdelrperm_cost = '5.00';
			}
		
		}else{

		$wfhuserperm_ourrank = 'F';

		$wfhdelrperm_cost = '3.00';
}



$create_wfhuser_like_withdlrvehicle_sql = "
INSERT INTO `idsids_wefinancehere`.`wfhuser_approvals_perms` SET
`wfhuserperm_did` = '$vdid',
`wfhuserperm_token` = '$cookie',
`wfhuserperm_wfhuser_id` = '$post_wfhuserperm_wfhuser_id',
`wfhuserperm_approval_id` = '$post_wfhuserperm_approval_id',
`wfhuserperm_budget_affordable` = '$post_budget_afford',
`wfhuserperm_vehicle_id` = '$vid',
`wfhuserperm_approval_fname` = '$post_wfhuserperm_approval_fname',
`wfhuserperm_approval_lname` = '$post_wfhuserperm_approval_lname',
`wfhuserperm_approval_email` = '$post_wfhuserperm_approval_email',
`wfhuserperm_approval_phone` = '$post_wfhuserperm_approval_phone',
`wfhuserperm_fbid` = '$post_wfhuserperm_fbid',
`wfhuserperm_ip` = '$ip',
`wfhuserperm_browser` = '$browser',
`wfhuserperm_ourrank` = '$wfhuserperm_ourrank',
`wfhuserperm_okay_perm` = '$wfhuserperm_okay_perm',
`wfhuserperm_when_date` = '$wfhuserperm_when_date',
`wfhdelrperm_okay_perm` = '$wfhdelrperm_okay_perm',
`wfhdelrperm_when_date` = '$wfhdelrperm_when_date',
`wfhuserperm_appointment_id` = '$wfhuserperm_appointment_id',
`wfhuserperm_appointment_timezone` = '$wfhuserperm_appointment_timezone',
`wfhdelrperm_appointment_timezone` = '$wfhdelrperm_appointment_timezone',
`wfhuserperm_appointment_status` = '$wfhuserperm_appointment_status',
`wfhuserperm_appointment_user_status` = '$wfhuserperm_appointment_user_status',
`wfhdelrperm_appointment_dealer_status` = '0',
`wfhdelrperm_leadpackage_code` = '$wfhdelrperm_leadpackage_code',
`wfhdelrperm_coupon_code` = '$wfhdelrperm_coupon_code',
`wfhdelrperm_cost` = '$wfhdelrperm_cost',  
`wfhdelrperm_charged` = '$wfhdelrperm_charged',
`wfhdelrperm_charged_date` = '$wfhdelrperm_charged_date'
";



$update_wfhuser_like_withdlrvehicle_sql = "
UPDATE `idsids_wefinancehere`.`wfhuser_approvals_perms` SET
`wfhuserperm_did` = '$vdid',
`wfhuserperm_token`  = '$cookie',
`wfhuserperm_wfhuser_id`  = '$post_wfhuserperm_wfhuser_id',
`wfhuserperm_approval_id`  = '$post_wfhuserperm_approval_id',
`wfhuserperm_budget_affordable` = '$post_budget_afford',
`wfhuserperm_vehicle_id` = '$vid',
`wfhuserperm_approval_fname`  = '$post_wfhuserperm_approval_fname',
`wfhuserperm_approval_lname`  = '$post_wfhuserperm_approval_lname',
`wfhuserperm_approval_email`  = '$post_wfhuserperm_approval_email',
`wfhuserperm_approval_phone` = '$post_wfhuserperm_approval_phone',
`wfhuserperm_fbid` = '$post_wfhuserperm_fbid',
`wfhuserperm_ip` = '$ip',
`wfhuserperm_browser` = '$browser',
`wfhuserperm_ourrank` = '$wfhuserperm_ourrank',
`wfhuserperm_okay_perm` = '$wfhuserperm_okay_perm',
`wfhuserperm_when_date` = '$wfhuserperm_when_date',
`wfhuserperm_appointment_timezone` = '$wfhuserperm_appointment_timezone',
`wfhdelrperm_leadpackage_code` = '$wfhdelrperm_leadpackage_code',
`wfhdelrperm_coupon_code` = '$wfhdelrperm_coupon_code',
`wfhdelrperm_cost` = '$wfhdelrperm_cost'
WHERE
`wfhuserperm_id` = '$wfhuserperm_id'
";




if(!$wfhuserperm_id){

//echo $create_wfhuser_like_withdlrvehicle_sql;

	$query_wfhuser_like_withdlrvehicle_sql_saved = mysqli_query($wfh_connection_mysqli, $create_wfhuser_like_withdlrvehicle_sql);
    $wfhuserperm_id = mysqli_insert_id($wfh_connection_mysqli);
	
	}else{


//echo $update_wfhuser_like_withdlrvehicle_sql;

$query_wfhuser_like_withdlrvehicle_sql = mysqli_query($idsconnection_mysqli, $update_wfhuser_like_withdlrvehicle_sql, $wfh_connection);

}





}

?>