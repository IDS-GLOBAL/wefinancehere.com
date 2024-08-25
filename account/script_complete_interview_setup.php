<?php require_once("db_wfh_approval_loggedin.php"); ?>
<?php

if(!$_POST) exit;

//print_r($_POST);

if(isset($_POST['applicant_titlename'], $_POST['applicant_fname'], $_POST['applicant_mname'], $_POST['applicant_lname'], $_POST['applicant_suffixname'], $_POST['applicant_other_name'], $_POST['applicant_suffixname'], $_POST['applicant_other_name'], $_POST['applicant_maiden_name'], $_POST['applicant_main_phone'], $_POST['applicant_cell_phone'], $_POST['applicant_mobile_carrier'], $_POST['applicant_present_address1'], $_POST['applicant_present_address2'], $_POST['applicant_present_addr_city'], $_POST['applicant_present_addr_state'], $_POST['applicant_present_addr_zip'], $_POST['applicant_present_addr_county'], $_POST['applicant_present_moveindate'], $_POST['applicant_addr_years'], $_POST['applicant_addr_months'], $_POST['applicant_addr_landlord_mortg'], $_POST['applicant_addr_landlord_address'], $_POST['applicant_addr_landlord_city'], $_POST['applicant_addr_landlord_state'], $_POST['applicant_addr_landlord_zip'], $_POST['applicant_addr_landlord_phone'], $_POST['applicant_name_oncurrent_lease'], $_POST['applicant_apart_or_house'], $_POST['applicant_buy_own_rent_other'], $_POST['applicant_house_payment'], $_POST['user_comments_app_notes'], $_POST['applicant_employer1_name'], $_POST['applicant_employer1_addr'], $_POST['applicant_employer1_city'], $_POST['applicant_employer1_state'], $_POST['applicant_employer1_zip'], $_POST['applicant_employer1_phone'], $_POST['applicant_employer1_phone_ext'], $_POST['applicant_employer1_work_dateofhire'], $_POST['applicant_employer1_work_years'], $_POST['applicant_employer1_work_months'], $_POST['applicant_employment_type'], $_POST['applicant_employment_status'], $_POST['applicant_employer1_position'], $_POST['applicant_employer1_department'], $_POST['applicant_employer1_supervisors_name'], $_POST['applicant_employer1_supervisors_phone'], $_POST['applicant_employer1_hours_shift'], $_POST['applicant_employer1_salary_bringhome'], $_POST['applicant_employer1_payday_freq'], $_POST['applicant_employer_form_of_pymt'], $_POST['applicant_other_income_amount'], $_POST['applicant_other_income_source'], $_POST['applicant_other_income_when_rcvd'], $_POST['applicant_digital_signature'])){

	

//echo 'I Made it...'.'<br />';



$applicant_titlename = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_titlename']));
$applicant_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_fname']));
$applicant_mname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_mname']));
$applicant_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_lname']));
$applicant_suffixname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_suffixname']));
$applicant_other_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_other_name']));
$applicant_maiden_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_maiden_name']));

$applicant_main_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_main_phone']));
$applicant_suffixname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_suffixname']));
$applicant_other_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_other_name']));
$applicant_maiden_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_maiden_name']));
$applicant_main_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_main_phone']));
$applicant_cell_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_cell_phone']));
$applicant_mobile_carrier = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_mobile_carrier']));
$applicant_present_address1 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_address1']));
$applicant_present_address2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_address2']));
$applicant_present_addr_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_addr_city']));
$applicant_present_addr_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_addr_state']));
$applicant_present_addr_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_addr_zip']));
$applicant_present_addr_county = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_addr_county']));
$applicant_present_moveindate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_present_moveindate']));
$applicant_addr_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_years']));
$applicant_addr_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_months']));
$applicant_addr_landlord_mortg = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_mortg']));
$applicant_addr_landlord_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_address']));
$applicant_addr_landlord_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_city']));
$applicant_addr_landlord_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_state']));
$applicant_addr_landlord_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_zip']));
$applicant_addr_landlord_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_addr_landlord_phone']));
$applicant_name_oncurrent_lease = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_name_oncurrent_lease']));
$applicant_apart_or_house = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_apart_or_house']));
$applicant_buy_own_rent_other = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_buy_own_rent_other']));
$applicant_house_payment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_house_payment']));
$user_comments_app_notes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['user_comments_app_notes']));
$applicant_employer1_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_name']));
$applicant_employer1_addr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_addr']));
$applicant_employer1_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_city']));
$applicant_employer1_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_state']));
$applicant_employer1_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_zip']));
$applicant_employer1_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_phone']));
$applicant_employer1_phone_ext = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_phone_ext']));
$applicant_employer1_work_dateofhire = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_work_dateofhire']));
$applicant_employer1_work_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_work_years']));
$applicant_employer1_work_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_work_months']));
$applicant_employment_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employment_type']));
$applicant_employment_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employment_status']));
$applicant_employer1_position = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_position']));
$applicant_employer1_department = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_department']));
$applicant_employer1_supervisors_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_supervisors_name']));
$applicant_employer1_supervisors_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_supervisors_phone']));
$applicant_employer1_hours_shift = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_hours_shift']));
$applicant_employer1_salary_bringhome = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_salary_bringhome']));
$applicant_employer1_payday_freq = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer1_payday_freq']));
$applicant_employer_form_of_pymt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_employer_form_of_pymt']));
$applicant_other_income_amount = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_other_income_amount']));
$applicant_other_income_source = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_other_income_source']));
$applicant_other_income_when_rcvd = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_other_income_when_rcvd']));
$applicant_digital_signature = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['applicant_digital_signature']));






$update_wfhuserporfile_interview_sql = "
					UPDATE `idsids_idsdms`.`wfhuserprofile` SET
						  `applicant_titlename` = '$applicant_titlename',
						  `applicant_fname` = '$applicant_fname',
						  `applicant_mname` = '$applicant_mname',
						  `applicant_lname` = '$applicant_lname',
						  `applicant_suffixname` = '$applicant_suffixname',
						  `applicant_other_name` = '$applicant_other_name',
						  `applicant_maiden_name` = '$applicant_maiden_name',
						  `applicant_main_phone` = '$applicant_main_phone',
						  `applicant_other_name` = '$applicant_other_name',
						  `applicant_maiden_name` = '$applicant_maiden_name',
						  `applicant_main_phone` = '$applicant_main_phone',
						  `applicant_cell_phone` = '$applicant_cell_phone',
						  `applicant_mobile_carrier` = '$applicant_mobile_carrier',
						  `applicant_present_address1` = '$applicant_present_address1',
						  `applicant_present_address2` = '$applicant_present_address2',
						  `applicant_present_addr_city` = '$applicant_present_addr_city',
						  `applicant_present_addr_state` = '$applicant_present_addr_state',
						  `applicant_present_addr_zip` = '$applicant_present_addr_zip',
						  `applicant_present_addr_county` = '$applicant_present_addr_county',
						  `applicant_present_moveindate` = '$applicant_present_moveindate',
						  `applicant_addr_years` = '$applicant_addr_years',
						  `applicant_addr_months` = '$applicant_addr_months',
						  `applicant_addr_landlord_mortg` = '$applicant_addr_landlord_mortg',
						  `applicant_addr_landlord_address` = '$applicant_addr_landlord_address',
						  `applicant_addr_landlord_city` = '$applicant_addr_landlord_city',
						  `applicant_addr_landlord_state` = '$applicant_addr_landlord_state',
						  `applicant_addr_landlord_zip` = '$applicant_addr_landlord_zip',
						  `applicant_addr_landlord_phone` = '$applicant_addr_landlord_phone',
						  `applicant_name_oncurrent_lease` = '$applicant_name_oncurrent_lease',
						  `applicant_apart_or_house` = '$applicant_apart_or_house',
						  `applicant_buy_own_rent_other` = '$applicant_buy_own_rent_other',
						  `applicant_house_payment` = '$applicant_house_payment',
						  `user_comments_app_notes` = '$user_comments_app_notes',
						  `applicant_employer1_name` = '$applicant_employer1_name',
						  `applicant_employer1_addr` = '$applicant_employer1_addr',
						  `applicant_employer1_city` = '$applicant_employer1_city',
						  `applicant_employer1_state` = '$applicant_employer1_state',
						  `applicant_employer1_zip` = '$applicant_employer1_zip',
						  `applicant_employer1_phone` = '$applicant_employer1_phone',
						  `applicant_employer1_phone_ext` = '$applicant_employer1_phone_ext',
						  `applicant_employer1_work_dateofhire` = '$applicant_employer1_work_dateofhire',
						  `applicant_employer1_work_years` = '$applicant_employer1_work_years',
						  `applicant_employer1_work_months` = '$applicant_employer1_work_months',
						  `applicant_employment_type` = '$applicant_employment_type',
						  `applicant_employment_status` = '$applicant_employment_status',
						  `applicant_employer1_position` = '$applicant_employer1_position',
						  `applicant_employer1_department` = '$applicant_employer1_department',
						  `applicant_employer1_supervisors_name` = '$applicant_employer1_supervisors_name',
						  `applicant_employer1_supervisors_phone` = '$applicant_employer1_supervisors_phone',
						  `applicant_employer1_hours_shift` = '$applicant_employer1_hours_shift',
						  `applicant_employer1_salary_bringhome` = '$applicant_employer1_salary_bringhome',
						  `applicant_employer1_payday_freq` = '$applicant_employer1_payday_freq',
						  `applicant_employer_form_of_pymt` = '$applicant_employer_form_of_pymt',
						  `applicant_other_income_amount` = '$applicant_other_income_amount',
						  `applicant_other_income_source` = '$applicant_other_income_source',
						  `applicant_other_income_when_rcvd` = '$applicant_other_income_when_rcvd',
						  `applicant_digital_signature` = '$applicant_digital_signature',
						  `credit_app_last_modified` = '$server_time'
				WHERE
						`wfhuser_id` = '$wfhuser_id'
						  ";


$run_update_wfhuserporfile_interview_sql = mysqli_query($idsconnection_mysqli, $update_wfhuserporfile_interview_sql);


}



/*



 	$_POST['applicant_fname] => 
    $_POST['applicant_mname] => 
    $_POST['applicant_lname] => 
    $_POST['applicant_suffixname] => 
    $_POST['applicant_other_name] => 
    $_POST['applicant_maiden_name] => 
    $_POST['applicant_cell_phone] => 
    $_POST['applicant_present_address1] => 
    $_POST['applicant_present_address2] => 
    $_POST['applicant_present_addr_city] => 
    $_POST['applicant_present_addr_zip] => 
    $_POST['applicant_present_addr_county] => 
    $_POST['applicant_present_moveindate] => 
    $_POST['applicant_addr_years] => 
    $_POST['applicant_addr_months] => 
    $_POST['applicant_addr_landlord_mortg] => 
    $_POST['applicant_addr_landlord_address] => 
    $_POST['applicant_addr_landlord_city] => 
    $_POST['applicant_addr_landlord_state] => 
    $_POST['applicant_addr_landlord_zip] => 
    $_POST['applicant_name_oncurrent_lease] => 
    $_POST['applicant_apart_or_house] => 
    $_POST['applicant_buy_own_rent_other] => Owns Home Outright
    $_POST['applicant_house_payment] => 
    $_POST['user_comments_app_notes] => 
    $_POST['applicant_employer1_name] => 
    $_POST['applicant_employer1_addr] => 
    $_POST['applicant_employer1_city] => 
    $_POST['applicant_employer1_state] => 
    $_POST['applicant_employer1_zip] => 
    $_POST['applicant_employer1_phone] => 
    $_POST['applicant_employer1_phone_ext] => 
    $_POST['applicant_employer1_work_dateofhire] => 
    $_POST['applicant_employer1_work_years] => 
    $_POST['applicant_employer1_work_months] => 
    $_POST['applicant_employment_type] => Auto Worker
    $_POST['applicant_employment_status] => Select One
    $_POST['applicant_employer1_position] => 
    $_POST['applicant_employer1_department] => 
    $_POST['applicant_employer1_supervisors_name] => 
    $_POST['applicant_employer1_supervisors_phone] => 
    $_POST['applicant_employer1_hours_shift] => 
    $_POST['applicant_employer1_salary_bringhome] => 
    $_POST['applicant_employer1_payday_freq] => 
    $_POST['applicant_employer_form_of_pymt] => 
    $_POST['applicant_digital_signature] => 

*/
?>