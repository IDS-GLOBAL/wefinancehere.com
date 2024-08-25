<?php require_once("db.php"); ?>
<?php


if(!$_POST) exit;




//print_r($_POST);






if(isset($_POST['approval_token'], $_POST['budget_afford'], $_POST['cust_creditapr'], $_POST['cust_creditapr_txt'], $_POST['cust_downpayment'], $_POST['cust_desiredpymt'], $_POST['cust_desiredtermos'], $_POST['gross_moincome'], $_POST['cust_home_state'], $_POST['cust_home_market'], $_POST['bigPrincipal'], $_POST['bigSellingPrice'], $_POST['cust_totalpayments'], $_POST['cust_car_loan'], $_POST['approval_email'], $_POST['approval_phoneno'], $_POST['approval_fname'], $_POST['approval_lname'])){
	

//echo 'I made it Here!';

require_once("Mail.php");



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

$approval_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_email']));
$approval_email_raw = $_POST['approval_email'];


$approval_phoneno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_phoneno']));

$approval_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_fname']));
$approval_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_lname']));


//	$approval_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_password']));
//	wfhuser_approval_password` = '$approval_password',

$colname_find_emailapproval = "-1";
if (isset($_POST['approval_email'])) {
  $colname_find_emailapproval = $_POST['approval_email'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_emailapproval =  "SELECT * FROM wfhuser_approvals WHERE wfhuser_approval_email = '$colname_find_emailapproval' ORDER BY wfhuser_approvals.wfhuser_approval_id DESC";
$find_emailapproval = mysqli_query($idsconnection_mysqli, $query_find_emailapproval);
$row_find_emailapproval = mysqli_fetch_assoc($find_emailapproval);
$totalRows_find_emailapproval = mysqli_num_rows($find_emailapproval);


$wfhuser_approval_id = $row_find_emailapproval['wfhuser_approval_id'];
$wfhuser_approval_email = $row_find_emailapproval['wfhuser_approval_email'];

if(!$wfhuser_approval_id || !$wfhuser_approval_email):

$query_create_wfh_user_approval_sql = "
INSERT INTO `idsids_idsdms`.`wfhuser_approvals` SET
	`wfhuser_approval_ip` =  '$ip',
	`wfhuser_approval_email` = '$approval_email',
	`wfhuser_approval_fname` = '$approval_fname',
	`wfhuser_approval_lname` = '$approval_lname',
	`wfhuser_approval_phoneno` = '$approval_phoneno',
	`wfhuser_approval_sessionid` =  '$cookie',
	`wfhuser_approval_token` =  '$approval_token',
	`wfhuser_approval_broswer` =  '$browser',
	`wfhuser_approval_mobile` =  '$mobiledevice',
	`wfhuser_approval_totalpayments` = '$cust_totalpayments',
	`wfhuser_approval_bigPrincipal` = '$bigPrincipal',
	`wfhuser_approval_bigSellingPrice` = '$bigSellingPrice',
	`wfhuser_approval_apr` =  '$cust_creditapr',
	`wfhuser_approval_apr_txt` - '$cust_creditapr_txt',
	`wfhuser_approval_budget_affordable` = '$budget_afford',
	`wfhuser_approval_dwpymt` =  '$cust_downpayment',
	`wfhuser_approval_mxpymt` =  '$cust_desiredpymt',
	`wfhuser_approval_monthterm` =  '$cust_desiredtermos',
	`wfhuser_approval_month_income` =  '$gross_moincome',
	`wfhuser_approval_state` =  '$cust_home_state',
	`wfhuser_approval_market` =  '$cust_home_market',
	`wfhuser_approval_openloan` =  '$cust_car_loan'

";

	//echo $query_create_wfh_user_approval_sql;

	mysqli_query($wfh_connection_mysqli, $query_create_wfh_user_approval_sql);
    $wfhuser_approval_id = mysqli_insert_id($wfh_connection_mysqli);
	
	include("_script_findexisting_wfhuserprofile_fromapproval.php");

else:

$query_update_wfh_user_approval_sql = "
UPDATE `idsids_idsdms`.`wfhuser_approvals` SET
	`wfhuser_approval_ip` =  '$ip',
	`wfhuser_approval_email` = '$approval_email',
	`wfhuser_approval_fname` = '$approval_fname',
	`wfhuser_approval_lname` = '$approval_lname',
	`wfhuser_approval_phoneno` = '$approval_phoneno',
	`wfhuser_approval_sessionid` =  '$cookie',
	`wfhuser_approval_token` =  '$approval_token',
	`wfhuser_approval_broswer` =  '$browser',
	`wfhuser_approval_mobile` =  '$mobiledevice',
	`wfhuser_approval_totalpayments` = '$cust_totalpayments',
	`wfhuser_approval_bigPrincipal` = '$bigPrincipal',
	`wfhuser_approval_bigSellingPrice` = '$bigSellingPrice',
	`wfhuser_approval_apr` =  '$cust_creditapr',
	`wfhuser_approval_budget_affordable` = '$budget_afford',
	`wfhuser_approval_dwpymt` =  '$cust_downpayment',
	`wfhuser_approval_mxpymt` =  '$cust_desiredpymt',
	`wfhuser_approval_monthterm` =  '$cust_desiredtermos',
	`wfhuser_approval_month_income` =  '$gross_moincome',
	`wfhuser_approval_state` =  '$cust_home_state',
	`wfhuser_approval_market` =  '$cust_home_market',
	`wfhuser_approval_openloan` =  '$cust_car_loan'
	WHERE
		`wfhuser_approval_id` = '$wfhuser_approval_id'

";

	//echo $query_create_wfh_user_approval_sql;

	mysqli_query($wfh_connection_mysqli, $query_update_wfh_user_approval_sql);
    $wfhuser_approval_id = mysqli_insert_id($wfh_connection_mysqli);



endif;






			// Set STMP Mail Server
			ini_set ("SMTP", "mail.idscrm.com");


//echo '<br />'."===========================================".'<br />';



			 
			// From:
			$sysfrom = "IDS ROBOT <idsrobot@idscrm.com>";
			 
			// TO:

			$sysSendToEmail = "webgoonie@gmail.com";
			//$sysSendToEmail = $dealer_email;

			// BCC:
			$sysbcc = "idscrm.com@gmail.com";
			//$sysbcc = "idscrm.com@gmail.com".$accounts_payable_email;


			// Grouped Together For Receipient Headers
			$sysTo = $sysSendToEmail;
			$sysrecipients = $sysTo.",".$sysbcc;
			
			// Subject
			$syssubject = "WFH Approval query captured";
			
			// Custom Static Variables Based On Conditions
			$thisemail_comments = "WFH Query is here...";

// HTML Body: (Start With All Content To The Far Right Leave No White Space To Left And Right of Each Line)
$dealer_emailbody = "
<div>
<p><img src='http://idscrm.com/dealer/css/themes/blueberry/images/logo.png' /></p>
<p><h2>Hi WeFinanceHere.com,<h2></p>
<p><b>Thank You For The Opportunity To Serve You Master!</b></p>
<p>Look at this below please.</p>
<hr />
<div align='center'>
<ul>
	<li>Approval email: $approval_email</li>
	<li>Approval fname: $approval_fname</li>
	<li>Approval lname: $approval_lname</li>
	<li>Approval phoneno: <a href='tel:+$approval_phoneno'>$approval_phoneno</a></li>
	<li>Approval ip: $ip</li>
	<li>Approval sessionid: $cookie</li>
	<li>Approval token: $approval_token</li>
	<li>Approval broswer: $browser</li>
	<li>Approval mobile: $mobiledevice</li>
	<li>Approval totalpayments: $$cust_totalpayments</li>
	<li>Approval bigPrincipal: $$bigPrincipal</li>
	<li>Approval bigSellingPrice: $$bigSellingPrice</li>
	<li>Approval apr: $cust_creditapr</li>
	<li>Approval budget_affordable:  '$budget_afford</li>
	<li>Approval dwpymt: $cust_downpayment</li>
	<li>Approval mxpymt: $cust_desiredpymt</li>
	<li>Approval monthterm: $cust_desiredtermos</li>
	<li>Approval month_income: $gross_moincome</li>
	<li>Approval state: $cust_home_state</li>
	<li>Approval market: $cust_home_market
	<li>Approval openloan: $cust_car_loan</li>
</li>
</ul>
</div>
<br />
<hr />
<p>You may login to make payment at  <a href='http://dudes.idscrm.com' traget='_blank'>https://dudes.idscrm.com</a>  under 'WFH Users', keep for your records or login.</p>
<p><b>We can you do with this new business?</b></p>
<p><b>If you have any questions please don't hesitate to finish this sytem.</b></p>
<hr />
<br />
<b>Phone Number:</b> <i><a href='tel:+404-565-4371'>404-565-4371<a></i><br />
<b>Email:</b> <i>support@idscrm.com</i><br /></p>
<p>Powered By: <a href='https://www.idscrm.com' target='_blank'>www.IDSCRM.com</a></p>
</div>
";

//echo '<br />'."===========================================".'<br />';


	$systemhost = "mail.idscrm.com";
	$sysusername = "idsrobot@idscrm.com";
	$syspassword = "idscrmsystem99!";
 
	$sysheaders = array ('From' => $sysfrom,
	'To' => $sysTo,
	'Subject' => $syssubject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);


	$smtp_do = Mail::factory('smtp',
	   array ('host' => $systemhost,
		 'auth' => true,
		 'username' => $sysusername,
		 'password' => $syspassword));
	


	// True Action That Sends Email
	$mail = $smtp_do->send($sysrecipients, $sysheaders, $dealer_emailbody);
	


/**/	


	include("script_invite_user_emailfunds_smptphtml.php");


}









?>