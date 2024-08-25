<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/tracking.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "usrProf_form")) {
  $updateSQL =  "UPDATE wfhuserprofile SET wfhuser_primary_did=%s, wfhuser_primary_sid=%s, wfhuser_primary_vid=%s, wfhuser_primary_cid=%s, wfhuser_primary_clid=%s, wfhuser_tokenid=%s, wfhuser_email_address=%s, wfhuser_username=%s, wfhuser_password=%s, joint_or_invidividual=%s, credit_app_type=%s, credit_app_source=%s, applicant_driver_licenses_number=%s, applicant_driver_licenses_status=%s, applicant_driver_state_issued=%s, applicant_ssn=%s, applicant_ssn4=%s, applicant_dob=%s, applicant_age=%s, applicant_sales_souce_lot=%s, applicant_name=%s, applicant_fname=%s, applicant_mname=%s, applicant_lname=%s, applicant_other_name=%s, applicant_maiden_name=%s, applicant_main_phone=%s, applicant_cell_phone=%s, applicant_present_address1=%s, applicant_present_address2=%s, applicant_present_addr_city=%s, applicant_present_addr_state=%s, applicant_present_addr_zip=%s, applicant_present_addr_county=%s, applicant_addr_years=%s, applicant_addr_months=%s, applicant_addr_landlord_mortg=%s, applicant_addr_landlord_address=%s, applicant_addr_landlord_city=%s, applicant_addr_landlord_state=%s, applicant_addr_landlord_zip=%s, applicant_addr_landlord_phone=%s, applicant_name_oncurrent_lease=%s, applicant_apart_or_house=%s, applicant_buy_own_rent_other=%s, applicant_house_payment=%s, user_comments_app_notes=%s, applicant_previous1_addr1=%s, applicant_previous1_addr2=%s, applicant_previous1_addr_city=%s, applicant_previous1_addr_state=%s, applicant_previous1_addr_zip=%s, applicant_previous1_live_years=%s, applicant_previous1_live_months=%s, applicant_previous1_landlord_name=%s, applicant_previous1_landlord_phone=%s, applicant_previous2_addr1=%s, applicant_previous2_addr2=%s, applicant_previous2_addr_city=%s, applicant_previous2_addr_state=%s, applicant_previous2_addr_zip=%s, applicant_previous2_live_years=%s, applicant_previous2_live_months=%s, applicant_previous2_landlord_name=%s, applicant_previous2_landlord_phone=%s, applicant_previous3_addr1=%s, applicant_previous3_addr2=%s, applicant_previous3_addr_city=%s, applicant_previous3_addr_state=%s, applicant_previous3_addr_zip=%s, applicant_previous3_live_years=%s, applicant_previous3_live_months=%s, applicant_previous3_landlord_name=%s, applicant_previous3_landlord_phone=%s, user_comments_previousaddr_notes=%s, applicant_employer1_name=%s, applicant_employer1_addr=%s, applicant_employer1_city=%s, applicant_employer1_state=%s, applicant_employer1_zip=%s, applicant_employer1_phone=%s, applicant_employer1_phone_ext=%s, applicant_employer1_work_years=%s, applicant_employer1_work_months=%s, applicant_employer1_position=%s, applicant_employer1_department=%s, applicant_employer1_supervisors_name=%s, applicant_employer1_supervisors_phone=%s, applicant_employer1_hours_shift=%s, applicant_employer1_salary_bringhome=%s, applicant_employer1_payday_freq=%s, applicant_employer_form_of_pymt=%s, applicant_other_income_amount=%s, applicant_other_income_source=%s, applicant_other_income_when_rcvd=%s, applicant_if_education_school_sys=%s, user_applicant_employer_notes=%s, applicant_employer2_name=%s, applicant_employer2_addr=%s, applicant_employer2_city=%s, applicant_employer2_state=%s, applicant_employer2_zip=%s, applicant_employer2_phone=%s, applicant_employer2_phone_ext=%s, applicant_employer2_work_years=%s, applicant_employer2_work_months=%s, applicant_employer2_position=%s, applicant_employer2_department=%s, applicant_employer2_supervisors_name=%s, applicant_employer2_supervisors_phone=%s, applicant_employer2_hours_shift=%s, applicant_employer2_salary_bringhome=%s, applicant_employer2_payday_freq=%s, applicant_employer2_form_of_pymt=%s, applicant_employer3_name=%s, applicant_employer3_addr=%s, applicant_employer3_city=%s, applicant_employer3_state=%s, applicant_employer3_zip=%s, applicant_employer3_phone=%s, applicant_employer3_years=%s, applicant_employer3_months=%s, user_comments_employer_notes=%s, co_applicant_name=%s, co_applicant_fname=%s, co_applicant_mname=%s, co_applicant_lname=%s, co_applicant_name_relationship=%s, co_applicant_dob=%s, co_applicant_age=%s, co_applicant_ssn=%s, co_applicant_ssn4=%s, co_applicant_driver_licenses_no=%s, co_applicant_driver_licenses_state=%s, co_applicant_driver_licenses_status=%s, co_applicant_home_phone=%s, co_applicant_home_cell=%s, co_applicant_email=%s, co_applicant_present_addr1=%s, co_applicant_present_addr2=%s, co_applicant_present_addr_city=%s, co_applicant_present_addr_state=%s, co_applicant_present_addr_zip=%s, co_applicant_home_pymt=%s, co_applicant_present_addr_county=%s, co_applicant_present_addr_live_years=%s, co_applicant_present_addr_live_months=%s, co_applicant_employer_name=%s, co_applicant_employer_phone=%s, co_applicant_employer_phone_ext=%s, co_applicant_employer_addr=%s, co_applicant_employer_addr2=%s, co_applicant_employer_city=%s, co_applicant_employer_state=%s, co_applicant_employer_zip=%s, co_applicant_employer_department=%s, co_applicant_employer_postion=%s, co_applicant_employer_supervisor_name=%s, co_applicant_employer_supervisor_phone=%s, co_applicant_employer_work_months=%s, co_applicant_employer_work_years=%s, co_applicant_employer_hours=%s, co_applicant_employer_shift=%s, co_applicant_income_source=%s, co_applicant_other_income=%s, co_applicant_income_bringhome=%s, co_applicant_payday_frequency=%s, applicant_last_vehicle_purchased=%s, applicants_bank_name=%s, applicant_initials_disclosure1=%s, undersigned_authorization=%s, federal_equal_act=%s, applicant_initials_disclosure2=%s, information_true_statement=%s, applicant_signature=%s, co_applicant_signature=%s, salesperson_witness_signature=%s, applicant_signed_input_date=%s, loan_guarantor_signature=%s, credit_app_last_modified=%s, application_created_date=%s, applicants_father_name=%s, applicants_father_deceased=%s, applicants_father_mainphone_number=%s, applicants_father_address=%s, applicants_mother_name=%s, applicants_mother_deceased=%s, applicants_mother_mainphone_number=%s, applicants_mother_address=%s, applicants_realative1_name=%s, applicants_realative1_relationship=%s, applicants_realative1_mainphone=%s, applicants_realative1_address=%s, applicants_realative1_address_city=%s, applicants_realative1_address_state=%s, applicants_realative1_address_zip=%s, applicants_realative2_name=%s, applicants_realative2_relationship=%s, applicants_realative2_mainphone=%s, applicants_realative2_address=%s, applicants_realative3_name=%s, applicants_realative3_relationship=%s, applicants_realative3_mainphone=%s, applicants_realative3_address=%s, applicants_realative4_name=%s, applicants_realative4_relationship=%s, applicants_realative4_mainphone_number=%s, applicants_realative4_address=%s, applicants_realative5_name=%s, applicants_realative5_relationship=%s, applicants_realative5_mainphone_number=%s, applicants_realative5_address=%s, applicants_realative6_name=%s, applicants_realative6_mainphone=%s, applicants_realative6_address=%s, applicants_realative7_name=%s, applicants_realative7_relationship=%s, applicants_realative7_mainphone=%s, applicants_realative7_address=%s, applicants_realative8_name=%s, applicants_realative8_mainphone=%s, applicants_realative8_address=%s, applicants_realative9_name=%s, applicants_realative9_mainphone=%s, applicants_realative9_address=%s, applicants_realative_comments=%s, applicants_reposession=%s, applicants_reposession_when=%s, applicants_reposession_where=%s, applicants_dependents_many=%s, applicants_dependents1_name=%s, applicants_dependents1_age=%s, applicants_dependents1_grade=%s, applicants_dependents1_school_name_location=%s, applicants_dependents2_name=%s, applicants_dependents2_age=%s, applicants_dependents2_grade=%s, applicants_dependents2_school_name_location=%s, applicants_nondependents_many=%s, applicants_nondependents1_name=%s, applicants_nondependents1_age=%s, applicants_nondependents1_cell_number=%s, applicants_nondependents2_name=%s, applicants_nondependents2_age=%s, applicants_nondependents2_cell_number=%s, co_applicants_email_address=%s, applicant_have_a_computer=%s, applicant_level_of_cpu_experience=%s, applicant_acknowledge_equal_opportunity=%s, applicant_hereby_authorize=%s, equal_credit_opportunity_act=%s, applicant_authorization=%s, applicant_authorization_text=%s, applicant_digital_signature=%s, applicant_digital_signature_date=%s, coapplicant_digital_signature=%s, coapplicant_digital_signature_date=%s WHERE wfhuser_id=%s",
                       GetSQLValueString($_POST['wfhuser_primary_did'], "int"),
                       GetSQLValueString($_POST['wfhuser_primary_sid'], "int"),
                       GetSQLValueString($_POST['wfhuser_primary_vid'], "int"),
                       GetSQLValueString($_POST['wfhuser_primary_cid'], "int"),
                       GetSQLValueString($_POST['wfhuser_primary_clid'], "int"),
                       GetSQLValueString($_POST['wfhuser_tokenid'], "text"),
                       GetSQLValueString($_POST['wfhuser_email_address'], "text"),
                       GetSQLValueString($_POST['wfhuser_username'], "text"),
                       GetSQLValueString($_POST['wfhuser_password'], "text"),
                       GetSQLValueString($_POST['joint_or_invidividual'], "int"),
                       GetSQLValueString($_POST['credit_app_type'], "int"),
                       GetSQLValueString($_POST['credit_app_source'], "text"),
                       GetSQLValueString($_POST['applicant_driver_licenses_number'], "text"),
                       GetSQLValueString($_POST['applicant_driver_licenses_status'], "text"),
                       GetSQLValueString($_POST['applicant_driver_state_issued'], "text"),
                       GetSQLValueString($_POST['applicant_ssn'], "text"),
                       GetSQLValueString($_POST['applicant_ssn4'], "text"),
                       GetSQLValueString($_POST['applicant_dob'], "text"),
                       GetSQLValueString($_POST['applicant_age'], "text"),
                       GetSQLValueString($_POST['applicant_sales_souce_lot'], "text"),
                       GetSQLValueString($_POST['applicant_name'], "text"),
                       GetSQLValueString($_POST['applicant_fname'], "text"),
                       GetSQLValueString($_POST['applicant_mname'], "text"),
                       GetSQLValueString($_POST['applicant_lname'], "text"),
                       GetSQLValueString($_POST['applicant_other_name'], "text"),
                       GetSQLValueString($_POST['applicant_maiden_name'], "text"),
                       GetSQLValueString($_POST['applicant_main_phone'], "text"),
                       GetSQLValueString($_POST['applicant_cell_phone'], "text"),
                       GetSQLValueString($_POST['applicant_present_address1'], "text"),
                       GetSQLValueString($_POST['applicant_present_address2'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_county'], "text"),
                       GetSQLValueString($_POST['applicant_addr_years'], "text"),
                       GetSQLValueString($_POST['applicant_addr_months'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_mortg'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_address'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_city'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_state'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_zip'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_phone'], "text"),
                       GetSQLValueString($_POST['applicant_name_oncurrent_lease'], "text"),
                       GetSQLValueString($_POST['applicant_apart_or_house'], "text"),
                       GetSQLValueString($_POST['applicant_buy_own_rent_other'], "text"),
                       GetSQLValueString($_POST['applicant_house_payment'], "text"),
                       GetSQLValueString($_POST['user_comments_app_notes'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr2'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_landlord_name'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_landlord_phone'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr2'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_landlord_name'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_landlord_phone'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr2'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_landlord_name'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_landlord_phone'], "text"),
                       GetSQLValueString($_POST['user_comments_previousaddr_notes'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_city'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_state'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_zip'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_phone_ext'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_work_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_work_months'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_position'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_department'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_supervisors_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_supervisors_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_hours_shift'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_salary_bringhome'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_payday_freq'], "text"),
                       GetSQLValueString($_POST['applicant_employer_form_of_pymt'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_amount'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_source'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_when_rcvd'], "text"),
                       GetSQLValueString($_POST['applicant_if_education_school_sys'], "text"),
                       GetSQLValueString($_POST['user_applicant_employer_notes'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_city'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_state'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_zip'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_phone_ext'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_work_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_work_months'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_position'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_department'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_supervisors_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_supervisors_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_hours_shift'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_salary_bringhome'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_payday_freq'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_form_of_pymt'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_city'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_state'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_zip'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_months'], "text"),
                       GetSQLValueString($_POST['user_comments_employer_notes'], "text"),
                       GetSQLValueString($_POST['co_applicant_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_fname'], "text"),
                       GetSQLValueString($_POST['co_applicant_mname'], "text"),
                       GetSQLValueString($_POST['co_applicant_lname'], "text"),
                       GetSQLValueString($_POST['co_applicant_name_relationship'], "text"),
                       GetSQLValueString($_POST['co_applicant_dob'], "text"),
                       GetSQLValueString($_POST['co_applicant_age'], "text"),
                       GetSQLValueString($_POST['co_applicant_ssn'], "text"),
                       GetSQLValueString($_POST['co_applicant_ssn4'], "text"),
                       GetSQLValueString($_POST['co_applicant_driver_licenses_no'], "text"),
                       GetSQLValueString($_POST['co_applicant_driver_licenses_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_driver_licenses_status'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_cell'], "text"),
                       GetSQLValueString($_POST['co_applicant_email'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr1'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr2'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_pymt'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_county'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_live_years'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_live_months'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_phone_ext'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_addr'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_addr2'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_city'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_zip'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_department'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_postion'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_supervisor_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_supervisor_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_work_months'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_work_years'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_hours'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_shift'], "text"),
                       GetSQLValueString($_POST['co_applicant_income_source'], "text"),
                       GetSQLValueString($_POST['co_applicant_other_income'], "text"),
                       GetSQLValueString($_POST['co_applicant_income_bringhome'], "text"),
                       GetSQLValueString($_POST['co_applicant_payday_frequency'], "text"),
                       GetSQLValueString($_POST['applicant_last_vehicle_purchased'], "text"),
                       GetSQLValueString($_POST['applicants_bank_name'], "text"),
                       GetSQLValueString($_POST['applicant_initials_disclosure1'], "text"),
                       GetSQLValueString($_POST['undersigned_authorization'], "text"),
                       GetSQLValueString($_POST['federal_equal_act'], "text"),
                       GetSQLValueString($_POST['applicant_initials_disclosure2'], "text"),
                       GetSQLValueString($_POST['information_true_statement'], "text"),
                       GetSQLValueString($_POST['applicant_signature'], "text"),
                       GetSQLValueString($_POST['co_applicant_signature'], "text"),
                       GetSQLValueString($_POST['salesperson_witness_signature'], "text"),
                       GetSQLValueString($_POST['applicant_signed_input_date'], "text"),
                       GetSQLValueString($_POST['loan_guarantor_signature'], "text"),
                       GetSQLValueString($_POST['credit_app_last_modified'], "date"),
                       GetSQLValueString($_POST['application_created_date'], "date"),
                       GetSQLValueString($_POST['applicants_father_name'], "text"),
                       GetSQLValueString(isset($_POST['applicants_father_deceased']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['applicants_father_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_father_address'], "text"),
                       GetSQLValueString($_POST['applicants_mother_name'], "text"),
                       GetSQLValueString(isset($_POST['applicants_mother_deceased']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['applicants_mother_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_mother_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative_comments'], "text"),
                       GetSQLValueString(isset($_POST['applicants_reposession']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['applicants_reposession_when'], "text"),
                       GetSQLValueString($_POST['applicants_reposession_where'], "text"),
                       GetSQLValueString($_POST['applicants_dependents_many'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_name'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_age'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_grade'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_school_name_location'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_name'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_age'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_grade'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_school_name_location'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents_many'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents1_name'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents1_age'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents1_cell_number'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents2_name'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents2_age'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents2_cell_number'], "text"),
                       GetSQLValueString($_POST['co_applicants_email_address'], "text"),
                       GetSQLValueString($_POST['applicant_have_a_computer'], "text"),
                       GetSQLValueString($_POST['applicant_level_of_cpu_experience'], "text"),
                       GetSQLValueString($_POST['applicant_acknowledge_equal_opportunity'], "text"),
                       GetSQLValueString(isset($_POST['applicant_hereby_authorize']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['equal_credit_opportunity_act']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['applicant_authorization']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['applicant_authorization_text'], "text"),
                       GetSQLValueString($_POST['applicant_digital_signature'], "text"),
                       GetSQLValueString($_POST['applicant_digital_signature_date'], "text"),
                       GetSQLValueString($_POST['coapplicant_digital_signature'], "text"),
                       GetSQLValueString($_POST['coapplicant_digital_signature_date'], "text"),
                       GetSQLValueString($_POST['wfhuser_id'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);

  $updateGoTo = "myacct.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $updateGoTo));
}

$colname_slctVehicle = "-1";
if (isset($_GET['v'])) {
  $colname_slctVehicle = $_GET['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctVehicle =  "SELECT * FROM vehicles WHERE vid = %s", GetSQLValueString($colname_slctVehicle, "int"));
$slctVehicle = mysqli_query($idsconnection_mysqli, $query_slctVehicle);
$row_slctVehicle = mysqli_fetch_assoc($slctVehicle);
$totalRows_slctVehicle = mysqli_num_rows($slctVehicle);

$vid=$row_slctVehicle['vid'];
$did=$row_slctVehicle['did'];
$vstockno=$row_slctVehicle['vstockno'];
$vcondition=$row_slctVehicle['vcondition'];
$vvin=$row_slctVehicle['vvin'];
$vyear=$row_slctVehicle['vyear'];
$vmake=$row_slctVehicle['vmake'];
$vmodel=$row_slctVehicle['vmodel'];
$vtrim=$row_slctVehicle['vtrim'];
$vvin=$row_slctVehicle['vvin'];
$vmileage=$row_slctVehicle['vmileage'];
$vbody = $row_slctVehicle['vbody'];
$vengine = $row_slctVehicle['vengine'];

$vdoors = $row_slctVehicle['vdoors'];

$vphotos=$row_slctVehicle['vphoto_count'];
$vtransm=$row_slctVehicle['vtransm'];
$fromsource = 'WeFinanceHere.com';

function not($not){
if(!$not){ echo 'Not Available';}else{echo $not;}			
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctDlr = "SELECT * FROM dealers WHERE id = '$did'";
$slctDlr = mysqli_query($idsconnection_mysqli, $query_slctDlr);
$row_slctDlr = mysqli_fetch_assoc($slctDlr);
$totalRows_slctDlr = mysqli_num_rows($slctDlr);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fundsAvailable = "SELECT SUM(vrprice) as total_avilable FROM vehicles WHERE vlivestatus = '1'";
$fundsAvailable = mysqli_query($idsconnection_mysqli, $query_fundsAvailable);
$row_fundsAvailable = mysqli_fetch_assoc($fundsAvailable);
$totalRows_fundsAvailable = mysqli_num_rows($fundsAvailable);
$total_avilable = $row_fundsAvailable['total_avilable'];

//	US national format, using () for negative numbers
setlocale(LC_MONETARY, 'en_US.UTF-8');


// Function To Calculate Money without commas.

function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number =  '%.2f', $number); 
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return $number; 
} 

$total_avilable = formatMoney($total_avilable , true); 

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeMonths = "SELECT * FROM months_options";
$timeMonths = mysqli_query($idsconnection_mysqli, $query_timeMonths);
$row_timeMonths = mysqli_fetch_assoc($timeMonths);
$totalRows_timeMonths = mysqli_num_rows($timeMonths);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeYears = "SELECT * FROM year_options";
$timeYears = mysqli_query($idsconnection_mysqli, $query_timeYears);
$row_timeYears = mysqli_fetch_assoc($timeYears);
$totalRows_timeYears = mysqli_num_rows($timeYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_autoYears = "SELECT * FROM auto_years";
$autoYears = mysqli_query($idsconnection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctVphotos = "SELECT * FROM vehicle_photos WHERE vehicle_id = '$vid'";
$slctVphotos = mysqli_query($idsconnection_mysqli, $query_slctVphotos);
$row_slctVphotos = mysqli_fetch_assoc($slctVphotos);
$totalRows_slctVphotos = mysqli_num_rows($slctVphotos);

$strone = "SELECT DISTINCT market FROM markets_dm, dealers, states WHERE states.state_id = markets_dm.state_id AND states.state_abrv = dealers.state AND states.state_abrv = 'WY'";

$strtwo = "SELECT DISTINCT market FROM markets_dm, dealers, states WHERE states.state_id = markets_dm.state_id AND states.state_abrv = dealers.state AND states.state_abrv = 'WY'";


$colname_querymrktStateabrv = "-1";
if (isset($_GET['markets'])) {
  $colname_querymrktStateabrv = $_GET['markets'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_querymrktStateabrv =  "SELECT * FROM markets_dm, states WHERE states.state_id = markets_dm.state_id AND states.state_abrv = %s", GetSQLValueString($colname_querymrktStateabrv, "text"));
$querymrktStateabrv = mysqli_query($idsconnection_mysqli, $query_querymrktStateabrv);
$row_querymrktStateabrv = mysqli_fetch_assoc($querymrktStateabrv);
$totalRows_querymrktStateabrv = mysqli_num_rows($querymrktStateabrv);
$mstate = $row_querymrktStateabrv['state_abrv'];  //Hack The State
$statemrkt = $row_querymrktStateabrv['state_abrv_url'];

if(!$colname_querymrktStateabrv){ 
	
	$ifstate = '';
	
	}else{
	
	$ifstate = "AND dealers.`state` = '$colname_querymrktStateabrv'";
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectVehicles = "SELECT * FROM vehicles, dealers, states WHERE vehicles.`did` =  dealers.`id`  AND dealers.`state` =  states.`state_abrv` AND dealers.`status` = 1 AND vehicles.`vlivestatus` = 1 $ifstate ORDER BY vehicles.`vyear` DESC, vehicles.`vmake` DESC";
$selectVehicles = mysqli_query($idsconnection_mysqli, $query_selectVehicles);
$row_selectVehicles = mysqli_fetch_assoc($selectVehicles);
$totalRows_selectVehicles = mysqli_num_rows($selectVehicles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carMakes = "SELECT * FROM car_make";
$carMakes = mysqli_query($idsconnection_mysqli, $query_carMakes);
$row_carMakes = mysqli_fetch_assoc($carMakes);
$totalRows_carMakes = mysqli_num_rows($carMakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM income_interval_options";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);


?>
<?php


include('../Libary/token-generator.php');


setlocale(LC_MONETARY, 'en_US');

	//Begin 3 Dealer Definitions
	
$dcompany = $row_slctDlr['company'];
$websturl = $row_slctDlr['website'];
$dname = $row_slctDlr['contact'];
$demail = $row_slctDlr['email'];
$dphone = $row_slctDlr['contact_phone'];
$daddr = $row_slctDlr['address'];
$dstate = $row_slctDlr['state'];
$dcity = $row_slctDlr['city'];
$dzip = $row_slctDlr['zip'];
$dstorephone = $row_slctDlr['phone'];
$dstorefax = $row_slctDlr['fax'];
$dslogan = $row_slctDlr['slogan'];
$ddisclaim = $row_slctDlr['disclaimer'];
$mapurl = $row_slctDlr['mapurl'];
$financenm = $row_slctDlr['finance'];
$financephn = $row_slctDlr['finance_contact'];
$intrsalesnm = $row_slctDlr['sales'];
$intrsalesphn = $row_slctDlr['sales_contact'];
	

	// Begin 2 Vehicles Definition
	
	
	

	// Begin 1 Vehicle Definitions
	$vdid = $row_slctVehicle['did'];
	$img = $row_slctVphotos['photo_file_name'];

	$thumbs = 'thumbs'; 
	$file = $row_slctVehicle['vthubmnail_file']; 
	$image = "http://images.autocitymag.com/$vdid/$vid/$file";
	$year = $row_slctVehicle['vyear'];
	$make = $row_slctVehicle['vmake'];
	$model = $row_slctVehicle['vmodel'];
	$trim = $row_slctVehicle['vtrim'];
	$stock = $row_slctVehicle['vstockno'];
	$vtitle = "$year $make $model $trim";
	$trans = $row_slctVehicle['vtransm'];
	$ecolor = $row_slctVehicle['vecolor_txt'];
	$icolor = $row_slctVehicle['vicolor_txt'];
	$engine = $row_slctVehicle['vengine'];
	$mileage = $row_slctVehicle['vmileage'];
	$price = $row_slctVehicle['vspecialprice'];

	//$truepic = "http://idscrm.com/vehicles/photos/$did/$vid/$img";
	$truepic = "http://images.autocitymag.com/$did/$vid/$img";
	
	$vrprice = $row_slctVehicle['vrprice'];
	
	$vcost = $row_slctVehicle['vpurchasecost']; 
	
	$DownPayment = $row_slctVehicle['vdprice'];
	
	$Profit = $vrprice - $vcost;
	
	$reserverProfit = '1500';
	
//Start Calculating Downpayment


	if(!$DownPayment){
							
							if(!$vrprice)
								{
								
								if(!$price){$downpaymentPrice = '2000';}else{	
																
										$fifteenpercent = ($price * '.15');	
										$downpaymentPrice = "$fifteenpercent";
										$downpaymentPrice = round($downpaymentPrice, -2);

										}

								}else{
										$fifteenpercent = ($vrprice * '.15');	
										$downpaymentPrice = "$fifteenpercent";
										$downpaymentPrice = round($downpaymentPrice, -2);

									  }
	}else{
		
		$downpaymentPrice = $DownPayment;
		$downpaymentPrice = round($downpaymentPrice, -2);
}


//End Calculating Downpayment

	
		if(!$DownPayment){
		
			$DownPayment = ($vrprice * 0.15);
		   
		   }
	
	
	$docFee = $row_slctDlr['settingDocDlvryFee'];
	$titleFee = $row_slctDlr['settingTitleFee'];
	$stateFee = $row_slctDlr['settingStateInspectnFee'];
	
	$fees = ($docFee + $titleFee + $stateFee);
	$tax = $row_slctDlr['settingSateSlsTax'];
	
	$total = ($fees * $tax);
	
	$sellingPrice = ($vrprice + $total);
	
	
	
	$mindown = ($sellingPrice * '.15');
	
	
	/// Use Dealers Variables If Exist If Not Then Use Our Default Ones.
	$vcondition = $row_slctVehicle['vcondition'];

function newCredit (){

			



}

function usedCredit () {

	
	


}

if($vcondition=='New'){

$vgoodcredit = $row_slctDlr['newmatrixcredit_vgoodcredit'];
		if(!$vgoodcredit){
			$vgoodcredit = '3.0';
		}
		
		$jgoodcredit = $row_slctDlr['newmatrixcredit_jgoodcredit'];
		if(!$jgoodcredit){
			$jgoodcredit = '';
		}
		
		$faircredit = $row_slctDlr['newmatrixcredit_faircredit'];
		if(!$faircredit){
			$faircredit = '';
		}
		
		$poorcredit = $row_slctDlr['newmatrixcredit_poorcredit'];
		if(!$poorcredit){
			$poorcredit = '';
		}
		
		$subprime = $row_slctDlr['newmatrixcredit_subprime'];
		if(!$subprime){
			$subprime = '';
		}
		
		$unknown = $row_slctDlr['newmatrixcredit_unknown'];
		if(!$unknown){
			$unknown = '';
		}

}

if($vcondition=='Used'){

	if(!$row_slctDlr['usedmatrixcredit_vgoodcredit']){
		$vgoodcredit = '3.0';
	}else{
	
		$vgoodcredit = $row_slctDlr['usedmatrixcredit_vgoodcredit'];
	}
	
	if(!$row_slctDlr['usedmatrixcredit_jgoodcredit']){
	$jgoodcredit = '6.0';
	}else{
	
		$jgoodcredit = $row_slctDlr['usedmatrixcredit_jgoodcredit'];

	}
	
	if(!$row_slctDlr['usedmatrixcredit_faircredit']){
		$faircredit = '12.0';
	}else{
	
		$faircredit = $row_slctDlr['usedmatrixcredit_faircredit'];

	}
	
	if(!$row_slctDlr['usedmatrixcredit_poorcredit']){
	$poorcredit = '15.0';
	}else{
	
			$poorcredit = $row_slctDlr['usedmatrixcredit_poorcredit'];

	}
	
	
	if(!$row_slctDlr['usedmatrixcredit_subprime']){
	$subprime = '26.0';
	}else{
		
		$subprime = $row_slctDlr['usedmatrixcredit_subprime'];
	}
	
	if(!$row_slctDlr['usedmatrixcredit_unknown']){
	$unknown = '29.9';
	}else{
		$unknown = $row_slctDlr['usedmatrixcredit_unknown'];
	
	}
}

if(!$vcondition){
	
	
	
if(!$row_slctDlr['usedmatrixcredit_vgoodcredit']){
		$vgoodcredit = '3.0';
	}else{
	
		$vgoodcredit = $row_slctDlr['usedmatrixcredit_vgoodcredit'];
	}
	
	if(!$row_slctDlr['usedmatrixcredit_jgoodcredit']){
	$jgoodcredit = '6.0';
	}else{
	
		$jgoodcredit = $row_slctDlr['usedmatrixcredit_jgoodcredit'];

	}
	
	if(!$row_slctDlr['usedmatrixcredit_faircredit']){
		$faircredit = '12.0';
	}else{
	
		$faircredit = $row_slctDlr['usedmatrixcredit_faircredit'];

	}
	
	if(!$row_slctDlr['usedmatrixcredit_poorcredit']){
	$poorcredit = '15.0';
	}else{
	
			$poorcredit = $row_slctDlr['usedmatrixcredit_poorcredit'];

	}
	
	
	if(!$row_slctDlr['usedmatrixcredit_subprime']){
	$subprime = '26.0';
	}else{
		
		$subprime = $row_slctDlr['usedmatrixcredit_subprime'];
	}
	
	if(!$row_slctDlr['usedmatrixcredit_unknown']){
	$unknown = '29.9';
	}else{
		$unknown = $row_slctDlr['usedmatrixcredit_unknown'];
	
	}	
	
	}


function get_Datetime_Now() {
	$tz_object = new DateTimeZone('Brazil/East');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	return $datetime->format('m\-d\-Y\ ');

}

		$timevar = get_Datetime_Now();

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);

$vgoodcredit = '3.0';

?>
<?php
include('inc/_fbinc.php');

//Begins Feacebook creditials begin like $user;

include("inc/definitions_fbsession.php");

$fbemail = $user_profile['email'];

function checkfb ($fbemail){
	
include('../Connections/idsconnection.php');


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userWfh =  "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = '$fbemail'");
$userWfh = mysqli_query($idsconnection_mysqli, $query_userWfh);
$row_userWfh = mysqli_fetch_assoc($userWfh);
$totalRows_userWfh = mysqli_num_rows($userWfh);
$wfhid = $row_userWfh['wfhuser_id']; //Hackishere

		if (!$wfhid){
			header("Location: signin.php");
		}

//mysqli_free_result($userWfh);

}



function createwfhuser($user_profile){
	
//1. Check for User
	//checkfb($fbemail);
include('../Connections/idsconnection.php');
include("inc/definitions_fbsession.php");

checkfb ($fbemail);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userWfh =  "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = '$fbemail'");
$userWfh = mysqli_query($idsconnection_mysqli, $query_userWfh);
$row_userWfh = mysqli_fetch_assoc($userWfh);
$totalRows_userWfh = mysqli_num_rows($userWfh);
$wfidd = $row_userWfh['wfhuser_id']; //Hackishere

//$fbcityn = $locationn[0];
//$fbstatename = $locationn[1];

$fbInsertSQL =	"INSERT INTO `wfhuserprofile`(`wfhuser_fbpicture`,`wfhuser_email_address`,`wfhuser_fbemail`, `wfhuser_username`, `wfhuser_verified`, `applicant_dob`, `applicant_name`, `applicant_fname`, `applicant_lname`, `applicant_present_addr_city`, `applicant_present_addr_state`, `applicant_employer1_name`, `applicant_employer1_position`)
	VALUES ('$fbpiclink','$fbemail','$fbemail','$fbusername','$fbverified','$fbdob','$fbfullname','$fbfname','$fblname','$fbcityn', '$fbcityn','$fbemployername','$fbemployerposition')";
		
$fbUpdateSQL = "UPDATE `wfhuserprofile` SET `wfhuser_fbpicture` = '$fbpiclink', `wfhuser_email_address` = '$fbemail', `wfhuser_fbemail` = '$fbemail', `wfhuser_username` = '$fbusername', `wfhuser_verified` = '$fbverified', `applicant_dob` = '$fbdob', `applicant_name` = '$fbfullname', `applicant_fname` = '$fbfname', `applicant_lname` = '$fblname', `applicant_employer1_name` = '$fbemployername', `applicant_employer1_position` = '$fbemployerposition' WHERE `wfhuser_id` = '$wfidd'";

		if (!$wfidd){
			
		$insertsql =	mysqli_query($idsconnection_mysqli, $fbInsertSQL);	
			//header("Location: signin.php");

		}else{

		$updatesql =		mysqli_query($idsconnection_mysqli, $fbUpdateSQL);

			

		//print_r($user_profile);
		
		//echo $fbUpdateSQL;
		//echo $fbInsertSQL;
		}

//mysqli_free_result($userWfh);	
//2. If None Create User
//3. If Exist Update
	
}


include('wfhLibrary/sessionid.php');



include('wfhLibrary/similar_vehicles.php');

require_once('wfhLibrary/trackvehicle.php');


if ($user){
createwfhuser($user_profile);
}



?>