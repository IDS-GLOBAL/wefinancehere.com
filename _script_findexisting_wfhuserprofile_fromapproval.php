<?php 


$colname_find_existingwfhuserprofile_email = "-1";
if (isset($_GET['approval_email'])) {
  $colname_find_existingwfhuserprofile_email = $_GET['approval_email'];
}
mysqli_select_db($wfh_connection_mysqli, $database_idsconnection);
$query_find_existingwfhuserprofile_email =  "SELECT * FROM `wfhuserprofile` WHERE `wfhuserprofile`.`wfhuser_email_address` = '$colname_find_existingwfhuserprofile_email'";
$find_existingwfhuserprofile_email = mysqli_query($wfh_connection_mysqli, $query_find_existingwfhuserprofile_email);
$row_find_existingwfhuserprofile_email = mysqli_fetch_assoc($find_existingwfhuserprofile_email);
$totalRows_find_existingwfhuserprofile_email = mysqli_num_rows($find_existingwfhuserprofile_email);





$wfhuser_id = $row_find_existingwfhuserprofile_email['wfhuser_id'];
$wfhuser_email_address = $row_find_existingwfhuserprofile_email['wfhuser_email_address'];

if(!$wfhuser_id || !$wfhuser_email_address):

$query_create_wfhuserprofile_sql = "
INSERT INTO `idsids_idsdms`.`wfhuserprofile` SET
	`wfhuser_market` = '$cust_home_market',
	`budget_afford` = '$budget_afford',
	`cust_creditapr` = '$cust_creditapr',
	`cust_creditapr_txt` = '$cust_creditapr_txt',
	`cust_downpayment` = '$cust_downpayment',
	`cust_desiredpymt` = '$cust_desiredpymt',
	`cust_desiredtermos` = '$cust_desiredtermos',
	`cust_car_loan` = 'cust_car_loan',
	`bigPrincipal` = '$bigPrincipal',
	`bigSellingPrice` = '$bigSellingPrice',
	`cust_totalpayments` = '$cust_totalpayments',
	`credit_app_source` = 'wefinancehere.com',
	`applicant_sales_souce_lot` = '15.00',
	`cust_lead_ip` =  '$ip',
	`wfhuser_email_address` = '$approval_email',
	`cust_lead_broswer` = '$browser',
	`wfhuser_tokenid` = '$approval_token',
	`wfhuser_username` = '$approval_email',
	`applicant_driver_state_issued` = '$cust_home_state',
	`applicant_name` = '$approval_fname $approval_lname',
	`applicant_fname` = '$approval_fname',
	`applicant_lname` = '$approval_lname',
	`applicant_main_phone` = '$approval_phoneno',
	`applicant_cell_phone` = '$approval_phoneno',
	`applicant_present_addr_city` = '$cust_home_market',
	`applicant_present_addr_state` = '$cust_home_state',
	`applicant_employer1_salary_bringhome` = '$applicant_employer1_salary_bringhome'
	";
	
	mysqli_query($wfh_connection_mysqli, $query_create_wfhuserprofile_sql);
    $new_wfhuserprofile_id = mysqli_insert_id($wfh_connection_mysqli);


else:


$query_update_wfhuserprofile_sql = "
UPDATE `idsids_idsdms`.`wfhuserprofile` SET
	`wfhuser_market` = '$cust_home_market',
	`budget_afford` = '$budget_afford',
	`cust_creditapr` = '$cust_creditapr',
	`cust_downpayment` = '$cust_downpayment',
	`cust_desiredpymt` = '$cust_desiredpymt',
	`cust_desiredtermos` = '$cust_desiredtermos',
	`cust_car_loan` = 'cust_car_loan',
	`bigPrincipal` = '$bigPrincipal',
	`bigSellingPrice` = '$bigSellingPrice',
	`cust_totalpayments` = '$cust_totalpayments',
	`credit_app_source` = 'wefinancehere.com',
	`applicant_sales_souce_lot` = '15.00',
	`cust_lead_ip` =  '$ip',
	`wfhuser_email_address` = '$approval_email',
	`cust_lead_broswer` = '$browser',
	`wfhuser_tokenid` = '$approval_token',
	`wfhuser_username` = '$approval_email',
	`applicant_driver_state_issued` = '$cust_home_state',
	`applicant_name` = '$approval_fname $approval_lname',
	`applicant_fname` = '$approval_fname',
	`applicant_lname` = '$approval_lname',
	`applicant_main_phone` = '$approval_phoneno',
	`applicant_cell_phone` = '$approval_phoneno',
	`applicant_present_addr_city` = '$cust_home_market',
	`applicant_present_addr_state` = '$cust_home_state'
	WHERE
	`wfhuser_id` = '$wfhuser_id'
	";
	
/*	
	mysqli_query($wfh_connection_mysqli, $$query_update_wfhuserprofile_sql);
    $new_wfhuserprofile_id = mysqli_insert_id($wfh_connection_mysqli);
*/

endif;




?>