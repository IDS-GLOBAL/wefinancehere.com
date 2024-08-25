<?php

/*$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection); 


$user_name = 'idsids_wefinance';
$password = "yrBIBVwHt)6p";
$_SERVER = 'localhost';
$db_name = "idsids_wefinancehere";




INSERT INTO `wfhuserprofile` (`wfhuser_id`, `wfhuser_primary_did`, `wfhuser_primary_sid`, `wfhuser_primary_vid`, `wfhuser_primary_cid`, `wfhuser_primary_clid`, `wfhuser_fbid`, `wfhuser_fbsessionid`, `wfhuser_fbpicture`, `wfhuser_tokenid`, `wfhuser_email_address`, `wfhuser_fbemail`, `wfhuser_username`, `wfhuser_password`, `wfhuser_verified`, `wfhuser_status`, `wfhuser_market`, `wfhuser_approval_id`, `budget_afford`, `cust_creditapr`, `cust_creditapr_txt`, `cust_downpayment`, `cust_desiredpymt`, `cust_desiredtermos`, `cust_car_loan`, `bigPrincipal`, `bigSellingPrice`, `cust_totalpayments`, `cust_dealtoday`, `cust_lead_ip`, `cust_lead_broswer`, `joint_or_invidividual`, `credit_app_type`, `credit_app_source`, `applicant_driver_licenses_number`, `applicant_driver_licenses_status`, `applicant_driver_state_issued`, `applicant_driver_licenses_expdate`, `applicant_ssn`, `applicant_ssn4`, `applicant_dob`, `applicant_age`, `applicant_sales_souce_lot`, `applicant_titlename`, `applicant_name`, `applicant_fname`, `applicant_mname`, `applicant_lname`, `applicant_suffixname`, `applicant_other_name`, `applicant_maiden_name`, `applicant_main_phone`, `applicant_cell_phone`, `applicant_mobile_carrier`, `applicant_present_address1`, `applicant_present_address2`, `applicant_present_addr_city`, `applicant_present_addr_state`, `applicant_present_addr_zip`, `applicant_present_addr_county`, `applicant_present_moveindate`, `applicant_addr_years`, `applicant_addr_months`, `applicant_addr_landlord_mortg`, `applicant_addr_landlord_address`, `applicant_addr_landlord_city`, `applicant_addr_landlord_state`, `applicant_addr_landlord_zip`, `applicant_addr_landlord_phone`, `applicant_name_oncurrent_lease`, `applicant_apart_or_house`, `applicant_buy_own_rent_other`, `applicant_house_payment`, `user_comments_app_notes`, `applicant_previous1_addr1`, `applicant_previous1_addr2`, `applicant_previous1_addr_city`, `applicant_previous1_addr_state`, `applicant_previous1_addr_zip`, `applicant_previous1_addr_county`, `applicant_previous1_live_years`, `applicant_previous1_live_months`, `applicant_previous1_moveindate`, `applicant_previous1_landlord_name`, `applicant_previous1_landlord_phone`, `applicant_previous2_addr1`, `applicant_previous2_addr2`, `applicant_previous2_addr_city`, `applicant_previous2_addr_state`, `applicant_previous2_addr_zip`, `applicant_previous2_live_years`, `applicant_previous2_live_months`, `applicant_previous2_landlord_name`, `applicant_previous2_landlord_phone`, `applicant_previous3_addr1`, `applicant_previous3_addr2`, `applicant_previous3_addr_city`, `applicant_previous3_addr_state`, `applicant_previous3_addr_zip`, `applicant_previous3_live_years`, `applicant_previous3_live_months`, `applicant_previous3_landlord_name`, `applicant_previous3_landlord_phone`, `user_comments_previousaddr_notes`, `applicant_employer1_name`, `applicant_employer1_addr`, `applicant_employer1_city`, `applicant_employer1_state`, `applicant_employer1_zip`, `applicant_employer1_phone`, `applicant_employer1_phone_ext`, `applicant_employer1_work_dateofhire`, `applicant_employer1_work_years`, `applicant_employer1_work_months`, `applicant_employment_type`, `applicant_employment_status`, `applicant_employer1_position`, `applicant_employer1_department`, `applicant_employer1_supervisors_name`, `applicant_employer1_supervisors_phone`, `applicant_employer1_hours_shift`, `applicant_employer1_salary_bringhome`, `applicant_employer1_payday_freq`, `applicant_employer_form_of_pymt`, `applicant_other_income_amount`, `applicant_other_income_source`, `applicant_other_income_when_rcvd`, `applicant_if_education_school_sys`, `user_applicant_employer_notes`, `applicant_employer2_name`, `applicant_employer2_addr`, `applicant_employer2_city`, `applicant_employer2_state`, `applicant_employer2_zip`, `applicant_employer2_phone`, `applicant_employer2_phone_ext`, `applicant_employer2_work_years`, `applicant_employer2_work_months`, `applicant_employer2_position`, `applicant_employer2_department`, `applicant_employer2_supervisors_name`, `applicant_employer2_supervisors_phone`, `applicant_employer2_hours_shift`, `applicant_employer2_salary_bringhome`, `applicant_employer2_payday_freq`, `applicant_employer2_form_of_pymt`, `applicant_employer3_name`, `applicant_employer3_addr`, `applicant_employer3_city`, `applicant_employer3_state`, `applicant_employer3_zip`, `applicant_employer3_phone`, `applicant_employer3_years`, `applicant_employer3_months`, `user_comments_employer_notes`, `applicant_last_vehicle_purchased`, `applicants_bank_name`, `applicants_checking_savings_acct#`, `applicant_initials_disclosure1`, `undersigned_authorization`, `federal_equal_act`, `applicant_initials_disclosure2`, `information_true_statement`, `applicant_signature`, `co_applicant_signature`, `salesperson_witness_signature`, `applicant_signed_input_date`, `loan_guarantor_signature`, `credit_app_last_modified`, `application_created_date`, `applicants_father_name`, `applicants_father_deceased`, `applicants_father_mainphone_number`, `applicants_father_address`, `applicants_mother_name`, `applicants_mother_deceased`, `applicants_mother_mainphone_number`, `applicants_mother_address`, `applicants_realative1_name`, `applicants_realative1_relationship`, `applicants_realative1_mainphone`, `applicants_realative1_address`, `applicants_realative1_address_city`, `applicants_realative1_address_state`, `applicants_realative1_address_zip`, `applicants_realative2_name`, `applicants_realative2_relationship`, `applicants_realative2_mainphone`, `applicants_realative2_address`, `applicants_realative3_name`, `applicants_realative3_relationship`, `applicants_realative3_mainphone`, `applicants_realative3_address`, `applicants_realative4_name`, `applicants_realative4_relationship`, `applicants_realative4_mainphone_number`, `applicants_realative4_address`, `applicants_realative5_name`, `applicants_realative5_relationship`, `applicants_realative5_mainphone_number`, `applicants_realative5_address`, `applicants_realative6_name`, `applicants_realative6_mainphone`, `applicants_realative6_address`, `applicants_realative7_name`, `applicants_realative7_relationship`, `applicants_realative7_mainphone`, `applicants_realative7_address`, `applicants_realative8_name`, `applicants_realative8_mainphone`, `applicants_realative8_address`, `applicants_realative9_name`, `applicants_realative9_mainphone`, `applicants_realative9_address`, `applicants_realative_comments`, `applicants_reposession`, `applicants_reposession_when`, `applicants_reposession_where`, `applicants_dependents_many`, `applicants_dependents1_name`, `applicants_dependents1_age`, `applicants_dependents1_grade`, `applicants_dependents1_school_name_location`, `applicants_dependents2_name`, `applicants_dependents2_age`, `applicants_dependents2_grade`, `applicants_dependents2_school_name_location`, `applicants_nondependents_many`, `applicants_nondependents1_name`, `applicants_nondependents1_age`, `applicants_nondependents1_cell_number`, `applicants_nondependents2_name`, `applicants_nondependents2_age`, `applicants_nondependents2_cell_number`, `co_applicants_email_address`, `applicant_have_a_computer`, `applicant_level_of_cpu_experience`, `applicant_acknowledge_equal_opportunity`, `applicant_hereby_authorize`, `equal_credit_opportunity_act`, `applicant_authorization`, `applicant_authorization_text`, `applicant_digital_signature`, `applicant_digital_signature_date`, `coapplicant_digital_signature`, `coapplicant_digital_signature_date`, `wfhuser_vInsurCompNm`, `wfhuser_vInsurCompAddr`, `wfhuser_vInsurCompAddr2`, `wfhuser_vInsurCompCity`, `wfhuser_vInsurCompState`, `wfhuser_vInsurCompZip`, `wfhuser_vTradeYr`, `wfhuser_vTradeMk`, `wfhuser_vTradeModel`, `wfhuser_vTradeTrim`, `wfhuser_vTradeColor`, `wfhuser_vTradeVin`, `wfhuser_vTradeMiles`, `wfhuser_vTradePayOff`, `wfhuser_vTradeOwner`, `wfhuser_vTradeTagNo`, `wfhuser_vTradeTagState`, `wfhuser_vTradeTagExprDate`, `wfhuser_vTradePayoffCompany`, `wfhuser_vTradeCurrentPaymts`, `wfhuser_vTradeLeinHldrAcctNo`, `wfhuser_vTradePayoffCompanyAddr`, `wfhuser_vTradePayoffCompanyAddr2`, `wfhuser_vTradePayoffCompanyCity`, `wfhuser_vTradePayoffCompanyState`, `wfhuser_vTradePayoffCompanyZip`, `wfhuser_vTradePayoffGoodUntil`, `wfhuser_vTradePayoffPerDiem`, `wfhuser_vTradePayoffCompanyPhoneno`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1111111111111111111', 'wefinancehere@gmail.com', NULL, 'wefinancehere@gmail.com', 'lpasslwordl', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

*/

class DB_Functions {
	
		private $db;
		
		
		//put your code here
		function _construct(){
			
			define("DB_HOST","localhost");
			define("DB_USER","idsids_wefinance");
			define("DB_PASSWORD","yrBIBVwHt)6p");
			define("DB_DATABASE","idsids_wefinancehere");
			// Connecting to database
			mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE); 
			mysqli_select_db(DB_DATABASE) or die('Connect Error: ' . mysqli_connect_error());
			}
			
			/**
			*	Storing data
			*/
			
			public function storeUser($name, $email, $password){
				$uuid = uniqid('', true);
				// $hash = $this->hashSSHA($password);
				// $encrypted_password = $hash["encrypted"]; // encrypted password
				// $salt = $hash["salt"]; // salt
				 $wfh_connection_mysqli = mysqli_connect('localhost', 'idsids_wefinance', 'yrBIBVwHt)6p', 'idsids_wefinancehere'); 
				$astring = "INSERT INTO `idsids_wefinancehere`.`wfhuserprofile` SET 
							`wfhuser_tokenid` = '11111111',
							`applicant_name` = '$name',
							`wfhuser_username` = '$email',
							`wfhuser_email_address` = '$email',
							`wfhuser_password` = '$password',
							`wfhuser_status` = '1'
				";
				$result = mysqli_query($wfh_connection_mysqli, $astring);
				// check for successful store
				if($result){
					// get user details
					$uid = mysqli_insert_id($wfh_connection_mysqli); // last inserted id
					$result = mysqli_query($wfh_connection_mysqli, "SELECT * FROM `idsids_wefinancehere`.`wfhuserprofile` WHERE `wfhuser_email_address` = '$email' ");
					// return user details
					return mysqli_fetch_array($result);
				}else{
					return false;
				}
			}
}
?>