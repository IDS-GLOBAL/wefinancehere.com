<?php require_once("db.php"); ?>
<?php

if(!$_POST) exit();


//print_r($_POST);


//print_r($_SESSION);


if(isset($_POST['access_id'], $_POST['cust_home_market'], $_POST['cust_home_state'], $_POST['wfhuser_approval_id'], $_POST['wfhcookiesesid'], $_POST['approval_fname'], $_POST['approval_lname'], $_POST['approval_email'], $_POST['budget_afford'], $_POST['cust_creditapr'], $_POST['cust_creditapr_txt'], $_POST['cust_downpayment'], $_POST['cust_desiredpymt'], $_POST['cust_desiredtermos'], $_POST['cust_car_loan'], $_POST['bigPrincipal'], $_POST['bigSellingPrice'], $_POST['cust_totalpayments'], $_POST['cust_dealtoday'], $_POST['gross_monthlyincome'])){



$fbaccess_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['access_id']));
$cust_home_market = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_market']));
$cust_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_state']));
$wfhuser_approval_id= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuser_approval_id']));
$wfhcookiesesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhcookiesesid']));

$wfhuser_fbid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pic_id']));
$approval_fname =   mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_fname']));
$approval_lname =   mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_lname']));
$approval_email =   mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_email']));

$applicant_name =  $approval_fname.' '.$approval_lname; 

$fbpicture_url = 'https://graph.facebook.com/'.$wfhuser_fbid.'/picture?type=normal';
$wfhuser_fbpicture = $fbpicture_url;

$budget_afford = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['budget_afford']));
$cust_creditapr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_creditapr']));
$cust_creditapr_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_creditapr_txt']));
$cust_downpayment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_downpayment']));
$cust_desiredpymt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_desiredpymt']));
$cust_desiredtermos = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_desiredtermos']));
$cust_car_loan = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_car_loan']));
$bigPrincipal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['bigPrincipal']));
$bigSellingPrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['bigSellingPrice']));
$cust_totalpayments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_totalpayments']));
$cust_dealtoday = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_dealtoday']));
$gross_moincome = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['gross_monthlyincome']));



$colname_find_exstwfhuserfbuserprofile_email = "-1";
if (isset($_POST['approval_email'])) {
  $colname_find_exstwfhuserfbuserprofile_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['approval_email']));
}
mysql_select_db($database_wfh_connection, $wfh_connection);
$query_find_exstwfhuserfbuserprofile_email =  "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = %s", GetSQLValueString($colname_find_exstwfhuserfbuserprofile_email, "text"));
$find_exstwfhuserfbuserprofile_email = mysqli_query($idsconnection_mysqli, $query_find_exstwfhuserfbuserprofile_email, $wfh_connection);
$row_find_exstwfhuserfbuserprofile_email = mysqli_fetch_assoc($find_exstwfhuserfbuserprofile_email);
$totalRows_find_exstwfhuserfbuserprofile_email = mysqli_num_rows($find_exstwfhuserfbuserprofile_email);

$wfhuser_id = $row_find_exstwfhuserfbuserprofile_email['wfhuser_id'];
if(!$wfhuser_id){
	$wfhuser_id = $wfhuser_fbid;
}
	
$wfhuser_email_address = $row_find_exstwfhuserfbuserprofile_email['wfhuser_email_address'];
$wfhuser_fbemail = $row_find_exstwfhuserfbuserprofile_email['wfhuser_fbemail'];

$wfhuser_password = $row_find_exstwfhuserfbuserprofile_email['wfhuser_password'];

$cust_home_market = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_market']));
$cust_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_state']));

$create_newwfhuser_sql = "
INSERT INTO `idsids_wefinancehere`.`wfhuserprofile` SET
    `wfhuser_fbid` = '$wfhuser_fbid',
	`wfhuser_fbpicture` = '$wfhuser_fbpicture',
	`wfhuser_tokenid` = '$cookie',
	`applicant_name` = '$applicant_name',
    `applicant_fname` = '$approval_fname',
    `applicant_lname` = '$approval_lname',
    `wfhuser_email_address` = '$approval_email',
	`wfhuser_username` = '$approval_email',
	`wfhuser_password` = '$wfhuser_password',
    `wfhuser_fbemail` = '$approval_email',
	`wfhuser_verified` = '1',
	`wfhuser_status` = '1',
	`wfhuser_market` = '$cust_home_market',
	`applicant_driver_state_issued` = '$cust_home_state',
	`applicant_present_addr_state` = '$cust_home_state',
	`cust_lead_ip` = '$ip',
	`cust_lead_broswer` = '$broswer',
	`budget_afford`= '$budget_afford',
	`cust_creditapr` = '$cust_creditapr',
	`cust_creditapr_txt` = '$cust_creditapr_txt',
	`cust_downpayment` = '$cust_downpayment',
	`cust_desiredpymt` = '$cust_desiredpymt',
	`cust_desiredtermos` = '$cust_desiredtermos',
	`cust_car_loan` = '$cust_car_loan',
	`bigPrincipal` = '$bigPrincipal',
	`bigSellingPrice` = '$bigSellingPrice',
	`cust_totalpayments` = '$cust_totalpayments',
	`cust_dealtoday` = '$cust_dealtoday',
	`applicant_employer1_salary_bringhome` = '$gross_moincome'
";


$update_newwfhuser_sql = "
UPDATE `idsids_wefinancehere`.`wfhuserprofile` SET
    `wfhuser_fbid` = '$wfhuser_fbid',
	`wfhuser_tokenid` = '$cookie',
	`wfhuser_fbpicture` = '$wfhuser_fbpicture',
	`applicant_name` = '$applicant_name',
    `applicant_fname` = '$approval_fname',
    `applicant_lname` = '$approval_lname',
    `wfhuser_email_address` = '$wfhuser_email_address',
	`wfhuser_username` = '$approval_email',
	`wfhuser_password` = '$wfhuser_password',
    `wfhuser_fbemail` = '$approval_email',
	`wfhuser_verified` = '1',
	`wfhuser_status` = '1',
	`wfhuser_market` = '$cust_home_market',
	`applicant_driver_state_issued` = '$cust_home_state',
	`applicant_present_addr_state` = '$cust_home_state',
	`cust_lead_ip` = '$ip',
	`cust_lead_broswer` = '$broswer',
	`budget_afford`= '$budget_afford',
	`cust_creditapr` = '$cust_creditapr',
	`cust_creditapr_txt` = '$cust_creditapr_txt',
	`cust_downpayment` = '$cust_downpayment',
	`cust_desiredpymt` = '$cust_desiredpymt',
	`cust_desiredtermos` = '$cust_desiredtermos',
	`cust_car_loan` = '$cust_car_loan',
	`bigPrincipal` = '$bigPrincipal',
	`bigSellingPrice` = '$bigSellingPrice',
	`cust_totalpayments` = '$cust_totalpayments',
	`cust_dealtoday` = '$cust_dealtoday',
	`applicant_employer1_salary_bringhome` = '$gross_moincome'
	WHERE
	`wfhuser_id` = '$wfhuser_id'
";





	if(!$wfhuser_id){
		//echo $create_newwfhuser_sql;	
		
	
		$query_results_saved = mysqli_query($wfh_connection_mysqli, $create_newwfhuser_sql);
		$wfhuser_id = mysqli_insert_id($wfh_connection_mysqli);
	
	
	}else{
	
		//echo $update_newwfhuser_sql;

		
		if($budget_afford == 'Y'){
		$query_update_newwfhuser_saved = mysqli_query($idsconnection_mysqli, $update_newwfhuser_sql, $wfh_connection);
		}
	
	}

    //declare two session variables and assign them
    $_SESSION['MM_wfhuserUsername'] = $_POST['approval_email']; //$wfhuser_email_address;
    $_SESSION['MM_wfhuserUserGroup'] = '1';	      
	

// cleanup_connection() is hanging in start.js



echo "
<script>

$('input#wfhuser_id').val('$wfhuser_id');
var has_cookie = $('input#wfhcookiesesid').val();

if(!has_cookie){
$('input#wfhcookiesesid').val('$cookie');
}

var backoffice_alive_link = '';

$('li#backoffice_alive').html('<a href=\"https://wefinancehere.com/account/dashboard.php\" target=\"_parent\">Back Office</a>');


cleanup_connection();


</script>
";



	
	

}


exit();


?>