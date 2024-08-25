<?php require_once("db.php"); ?>
<?php

print_r($_POST);

			   
if(!$_POST) exit();

if(isset($_POST['pubservtoken'], $_POST['funds_titlename'], $_POST['funds_firstname'], $_POST['funds_midname'], $_POST['funds_lastname'], $_POST['funds_suffixname'], $_POST['funds_email'], $_POST['funds_cellphoneno'], $_POST['funds_password'], $_POST['funds_confirm_pasword'], $_POST['funds_dob'], $_POST['deal_dayswhen'], $_POST['funds_agree_terms'], $_POST['budget_afford'], $_POST['cust_creditapr'], $_POST['cust_downpayment'], $_POST['cust_desiredpymt'], $_POST['cust_desiredtermos'], $_POST['cust_car_loan'], $_POST['bigPrincipal'], $_POST['bigSellingPrice'], $_POST['cust_totalpayments'], $_POST['cust_dealtoday'], $_POST['cust_schedule_td'], $_POST['cust_lead_source'], $_POST['cust_lead_temperature'], $_POST['cust_lead_ip'], $_POST['cust_lead_broswer'], $_POST['wfhcookiesesid'], $_POST['cust_home_state'], $_POST['cust_home_market'])):


    






	// Security Check Should Be Empty.
	if($_POST['cust_schedule_td'] != NULL) exit();



    $pubservtoken = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pubservtoken']));
	$funds_titlename = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_titlename']));
    $funds_firstname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_firstname']));
    $funds_midname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_midname']));
    $funds_lastname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_lastname']));
    $funds_suffixname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_suffixname']));
    $funds_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_email']));
    $funds_cellphoneno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_cellphoneno']));
    $funds_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_password']));
    $funds_confirm_pasword = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_confirm_pasword']));
    $funds_dob = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_dob']));
    $deal_dayswhen = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['deal_dayswhen']));
    $funds_agree_terms = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['funds_agree_terms']));
    $budget_afford = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['budget_afford']));
    $cust_creditapr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_creditapr']));
    $cust_downpayment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_downpayment']));
    $cust_desiredpymt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_desiredpymt']));
    $cust_desiredtermos = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_desiredtermos']));
    $cust_car_loan = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_car_loan']));
    $bigPrincipal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['bigPrincipal']));
    $bigSellingPrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['bigSellingPrice']));
    $cust_totalpayments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_totalpayments']));
    $cust_dealtoday = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_dealtoday']));
    $cust_lead_source = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_source']));
    $cust_lead_temperature = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_temperature'])); 
    $cust_lead_ip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_ip']));
    $cust_lead_broswer = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_broswer']));
    $wfhcookiesesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhcookiesesid']));
    $cust_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_state']));
    $cust_home_market = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_market']));




//echo 'Made IT';



$insert_cust_lead_funds_sql = "
INSERT INTO `idsids_idsdms`.`wfhuserprofile` SET
    `wfhuser_tokenid` = '$pubservtoken',
    `wfhuser_email_address` = '$funds_email',
	`wfhuser_username` = '$funds_email',
    `wfhuser_password` = '$funds_confirm_pasword',
	`wfhuser_verified` = 'N',
	`wfhuser_status` = '1',
    `wfhuser_market` = '$cust_home_market',
    `budget_afford` = '$budget_afford',
    `cust_creditapr` = '$cust_creditapr',
    `cust_downpayment` = '$cust_downpayment',
    `cust_desiredpymt` = '$cust_desiredpymt',
    `cust_desiredtermos` = '$cust_desiredtermos',
    `cust_car_loan` = '$cust_car_loan',
    `bigPrincipal` = '$bigPrincipal',
    `bigSellingPrice` = '$bigSellingPrice',
    `cust_totalpayments` = '$cust_totalpayments',
    `cust_dealtoday` = '$cust_dealtoday',
    `cust_lead_ip` = '$cust_lead_ip',
    `cust_lead_broswer` = '$cust_lead_broswer',
	`joint_or_invidividual` = '0',
	`credit_app_type` = 'Allocated Funds',
    `credit_app_source` = '$cust_lead_source',
	`applicant_titlename` = '$funds_titlename',
    `applicant_fname` = '$funds_firstname',
    `applicant_mname` = '$funds_midname',
    `applicant_lname` = '$funds_lastname',
    `applicant_suffixname` = '$funds_suffixname',
    `applicant_cell_phone` = '$funds_cellphoneno',
    `applicant_dob` = '$funds_dob',
    `applicant_present_addr_state` = '$cust_home_state'
";

	$run_insert_cust_lead_funds_sql = mysqli_query($idsconnection_mysqli, $insert_cust_lead_funds_sql);


endif;


?>