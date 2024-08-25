<?php require_once("db.php"); ?>
<?php

print_r($_POST);

if(!$_POST) exit();

if(isset($_POST['paytotheorderof_titlename'], 
$_POST['paytotheorderof_fname'], 
$_POST['paytotheorderof_lastname'], 
$_POST['paytotheorderof_email'], 
$_POST['approval_token'], 
$_POST['budget_afford'], 
$_POST['cust_creditapr'], 
$_POST['cust_creditapr_txt'], 
$_POST['cust_downpayment'], 
$_POST['cust_desiredpymt'], 
$_POST['cust_desiredtermos'], 
$_POST['gross_moincome'], 
$_POST['cust_home_state'], 
$_POST['cust_home_market'], 
$_POST['bigPrincipal'], 
$_POST['bigSellingPrice'],
$_POST['cust_totalpayments'], 
$_POST['cust_car_loan'])){

$paytotheorderof_titlename = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['paytotheorderof_titlename']));
$paytotheorderof_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['paytotheorderof_fname']));
$paytotheorderof_lastname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['paytotheorderof_lastname']));
$paytotheorderof_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['paytotheorderof_email']));
$approval_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_token']));

$budget_afford = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['budget_afford']));
$cust_creditapr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_creditapr']));
$cust_creditapr_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_creditapr_txt']));
$cust_downpayment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_downpayment']));
$cust_desiredpymt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_desiredpymt']));
$cust_desiredtermos = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_desiredtermos']));
$gross_moincome = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['gross_moincome']));
$applicant_employer1_salary_bringhome = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['gross_moincome']));
$cust_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_state'])); 
$cust_home_market = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_market']));
$bigPrincipal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['bigPrincipal']));
$bigSellingPrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['bigSellingPrice']));
$cust_totalpayments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_totalpayments']));
$cust_car_loan = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_car_loan']));


echo 'Ajax Budget Vehicles';

$colname_find_existingwfhuserprofile_email = "-1";
if ($paytotheorderof_email != NULL) {
  $colname_find_existingwfhuserprofile_email = $paytotheorderof_email;
}
mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_find_existingwfhuserprofile_email =  "SELECT * FROM `idsids_wefinancehere`.`wfhuserprofile` WHERE `wfhuserprofile`.`wfhuser_email_address` = '$colname_find_existingwfhuserprofile_email'";
$find_existingwfhuserprofile_email = mysqli_query($idsconnection_mysqli, $query_find_existingwfhuserprofile_email, $wfh_connection);
$row_find_existingwfhuserprofile_email = mysqli_fetch_assoc($find_existingwfhuserprofile_email);
$totalRows_find_existingwfhuserprofile_email = mysqli_num_rows($find_existingwfhuserprofile_email);
$wfhuser_id = $row_find_existingwfhuserprofile_email['wfhuser_id'];


	echo $query_results_saved_sql = "
	INSERT INTO `idsids_wefinancehere`.`wfhuser_approvals` SET
		`wfhuser_approval_email` = '$approval_email',
		`wfhuser_approval_ip` = '$ip',
		`wfhuser_approval_sessionid` = '$cookie',
		`wfhuser_approval_token` = '$tkey',
		`wfhuser_approval_broswer` = '$browser',
		`wfhuser_approval_mobile` = '$mobiledevice',
		`wfhuser_approval_totalpayments` = '$cust_totalpayments',
		`wfhuser_approval_bigPrincipal` = '$bigPrincipal',
		`wfhuser_approval_bigSellingPrice` = '$bigSellingPrice',
		`wfhuser_approval_budget_affordable` = '$budget_afford',
		`wfhuser_approval_apr` = '$cust_creditapr',
		`cust_creditapr_txt` = '$cust_creditapr_txt',
		`wfhuser_approval_dwpymt` = '$cust_downpayment',
		`wfhuser_approval_mxpymt` = '$cust_desiredpymt',
		`wfhuser_approval_monthterm` = '$cust_desiredtermos',
		`wfhuser_approval_month_income` = '$gross_moincome',
		`wfhuser_approval_state` = '$cust_home_state',
		`wfhuser_approval_market` = '$cust_home_market',
		`wfhuser_approval_openloan` = '$cust_car_loan'
	";


	if(!$wfhuser_id){

	$query_results_saved = mysqli_query($wfh_connection_mysqli, $query_results_saved_sql);
    $wfhuser_approval_id = mysqli_insert_id($wfh_connection_mysqli);
	
	
	echo $create_newuser_wfh_sql = "
	INSERT INTO `idsids_wefinancehere`.`wfhuserprofile` SET
	`wfhuser_tokenid` = '$approval_token',
	`wfhuser_email_address` = '$paytotheorderof_email',
	`wfhuser_username` = '$paytotheorderof_email',
	`wfhuser_password` = 'temp'
	";
	$run_newuser_wfh_sql = mysqli_query($idsconnection_mysqli, $create_newuser_wfh_sql, $wfh_connection);


		
	}else{

	$query_results_updated_sql = "
	UPDATE `idsids_wefinancehere`.`wfhuser_approvals` SET
		`wfhuser_approval_email` = '$approval_email',
		`wfhuser_approval_ip` = '$ip',
		`wfhuser_approval_sessionid` = '$cookie',
		`wfhuser_approval_token` = '$tkey',
		`wfhuser_approval_broswer` = '$browser',
		`wfhuser_approval_mobile` = '$mobiledevice',
		`wfhuser_approval_totalpayments` = '$cust_totalpayments',
		`wfhuser_approval_bigPrincipal` = '$bigPrincipal',
		`wfhuser_approval_bigSellingPrice` = '$bigSellingPrice',
		`wfhuser_approval_budget_affordable` = '$budget_afford',
		`wfhuser_approval_apr` = '$cust_creditapr',
		`cust_creditapr_txt` = '$cust_creditapr_txt',
		`wfhuser_approval_dwpymt` = '$cust_downpayment',
		`wfhuser_approval_mxpymt` = '$cust_desiredpymt',
		`wfhuser_approval_monthterm` = '$cust_desiredtermos',
		`wfhuser_approval_month_income` = '$gross_moincome',
		`wfhuser_approval_state` = '$cust_home_state',
		`wfhuser_approval_market` = '$cust_home_market',
		`wfhuser_approval_openloan` = '$cust_car_loan'
	WHERE
		`wfhuser_approval_id` = '$wfhuser_approval_id'
	";


	$query_results_saved = mysqli_query($idsconnection_mysqli, $query_results_updated_sql, $wfh_connection);


}


	//echo $query_LiveVehicles;
	//echo '<br />'.'<br />'.'<br />';
	//echo '$bigSellingPrice_sql: '.$bigSellingPrice_sql;
	//echo '<br />'.'<br />'.'<br />';
	//echo '$cust_home_state_sql: '.$cust_home_state_sql;
	//echo '<br />'.'<br />'.'<br />';
	//echo '$cust_downpayment_sql: '.$cust_downpayment_sql;
	//echo '<br />'.'<br />'.'<br />';

}else{   exit(); }


?>