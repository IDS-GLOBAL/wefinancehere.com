<?php require_once('../../Connections/idsconnection.php'); ?>
<?php require_once('../../Connections/tracking.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "cust_leadForm")) {
  $insertSQL =  "INSERT INTO `idsids_idsdms`.`cust_leads` (cust_nickname, cust_fname, cust_lname, cust_email, cust_phonetype, cust_comment, cust_lead_source_id, cust_lead_source, cust_dealer_id, cust_vehicle_id, cust_lead_token, cust_home_address, cust_home_city, cust_home_state, cust_home_zip, cust_home_county, cust_employer_name, cust_employer_city, cust_employer_state, cust_employer_zip, cust_employer_years, cust_employer_months, cust_gross_income, cust_gross_income_frequency, cust_dealtoday, counter_offer, counter_offer2, tradeYes, tradeYear, tradeMake, tradeModel, tradeTrim, tradeMiles) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_fname'], "text"),
                       GetSQLValueString($_POST['cust_lname'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"),
                       GetSQLValueString($_POST['cust_phonetype'], "text"),
                       GetSQLValueString($_POST['cust_comment'], "text"),
                       GetSQLValueString($_POST['cust_lead_source_id'], "int"),
                       GetSQLValueString($_POST['cust_lead_source'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_vehicle_id'], "int"),
                       GetSQLValueString($_POST['cust_lead_token'], "text"),
                       GetSQLValueString($_POST['cust_home_address'], "text"),
                       GetSQLValueString($_POST['cust_home_city'], "text"),
                       GetSQLValueString($_POST['cust_home_state'], "text"),
                       GetSQLValueString($_POST['cust_home_zip'], "text"),
                       GetSQLValueString($_POST['cust_home_county'], "text"),
                       GetSQLValueString($_POST['cust_employer_name'], "text"),
                       GetSQLValueString($_POST['cust_employer_city'], "text"),
                       GetSQLValueString($_POST['cust_employer_state'], "text"),
                       GetSQLValueString($_POST['cust_employer_zip'], "text"),
                       GetSQLValueString($_POST['cust_employer_years'], "text"),
                       GetSQLValueString($_POST['cust_employer_months'], "text"),
                       GetSQLValueString($_POST['cust_gross_income'], "text"),
                       GetSQLValueString($_POST['cust_gross_income_frequency'], "text"),
                       GetSQLValueString(isset($_POST['cust_dealtoday']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['counter_offer'], "text"),
                       GetSQLValueString($_POST['counter_offer2'], "text"),
                       GetSQLValueString($_POST['tradeYes'], "text"),
                       GetSQLValueString($_POST['tradeYear'], "int"),
                       GetSQLValueString($_POST['tradeMake'], "text"),
                       GetSQLValueString($_POST['subcat'], "text"),
                       GetSQLValueString($_POST['tradeTrim'], "text"),
                       GetSQLValueString($_POST['tradeMiles'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "usrProf_form")) {
  $updateSQL =  "UPDATE wfhuserprofile SET wfhuser_primary_did=%s, wfhuser_primary_sid=%s, wfhuser_primary_vid=%s, wfhuser_primary_cid=%s, wfhuser_primary_clid=%s, wfhuser_tokenid=%s, wfhuser_email_address=%s, wfhuser_username=%s, wfhuser_password=%s, joint_or_invidividual=%s, credit_app_type=%s, credit_app_source=%s, applicant_driver_licenses_number=%s, applicant_driver_licenses_status=%s, applicant_driver_state_issued=%s, applicant_ssn=%s, applicant_ssn4=%s, applicant_dob=%s, applicant_age=%s, applicant_sales_souce_lot=%s, applicant_name=%s, applicant_fname=%s, applicant_mname=%s, applicant_lname=%s, applicant_other_name=%s, applicant_maiden_name=%s, applicant_main_phone=%s, applicant_cell_phone=%s, applicant_present_address1=%s, applicant_present_address2=%s, applicant_present_addr_city=%s, applicant_present_addr_state=%s, applicant_present_addr_zip=%s, applicant_present_addr_county=%s, applicant_addr_years=%s, applicant_addr_months=%s, applicant_addr_landlord_mortg=%s, applicant_addr_landlord_address=%s, applicant_addr_landlord_city=%s, applicant_addr_landlord_state=%s, applicant_addr_landlord_zip=%s, applicant_addr_landlord_phone=%s, applicant_name_oncurrent_lease=%s, applicant_apart_or_house=%s, applicant_buy_own_rent_other=%s, applicant_house_payment=%s, user_comments_app_notes=%s, applicant_previous1_addr1=%s, applicant_previous1_addr2=%s, applicant_previous1_addr_city=%s, applicant_previous1_addr_state=%s, applicant_previous1_addr_zip=%s, applicant_previous1_live_years=%s, applicant_previous1_live_months=%s, applicant_previous1_landlord_name=%s, applicant_previous1_landlord_phone=%s, applicant_previous2_addr1=%s, applicant_previous2_addr2=%s, applicant_previous2_addr_city=%s, applicant_previous2_addr_state=%s, applicant_previous2_addr_zip=%s, applicant_previous2_live_years=%s, applicant_previous2_live_months=%s, applicant_previous2_landlord_name=%s, applicant_previous2_landlord_phone=%s, applicant_previous3_addr1=%s, applicant_previous3_addr2=%s, applicant_previous3_addr_city=%s, applicant_previous3_addr_state=%s, applicant_previous3_addr_zip=%s, applicant_previous3_live_years=%s, applicant_previous3_live_months=%s, applicant_previous3_landlord_name=%s, applicant_previous3_landlord_phone=%s, user_comments_previousaddr_notes=%s, applicant_employer1_name=%s, applicant_employer1_addr=%s, applicant_employer1_city=%s, applicant_employer1_state=%s, applicant_employer1_zip=%s, applicant_employer1_phone=%s, applicant_employer1_phone_ext=%s, applicant_employer1_work_years=%s, applicant_employer1_work_months=%s, applicant_employer1_position=%s, applicant_employer1_department=%s, applicant_employer1_supervisors_name=%s, applicant_employer1_supervisors_phone=%s, applicant_employer1_hours_shift=%s, applicant_employer1_salary_bringhome=%s, applicant_employer1_payday_freq=%s, applicant_employer_form_of_pymt=%s, applicant_other_income_amount=%s, applicant_other_income_source=%s, applicant_other_income_when_rcvd=%s, applicant_if_education_school_sys=%s, user_applicant_employer_notes=%s, applicant_employer2_name=%s, applicant_employer2_addr=%s, applicant_employer2_city=%s, applicant_employer2_state=%s, applicant_employer2_zip=%s, applicant_employer2_phone=%s, applicant_employer2_phone_ext=%s, applicant_employer2_work_years=%s, applicant_employer2_work_months=%s, applicant_employer2_position=%s, applicant_employer2_department=%s, applicant_employer2_supervisors_name=%s, applicant_employer2_supervisors_phone=%s, applicant_employer2_hours_shift=%s, applicant_employer2_salary_bringhome=%s, applicant_employer2_payday_freq=%s, applicant_employer2_form_of_pymt=%s, applicant_employer3_name=%s, applicant_employer3_addr=%s, applicant_employer3_city=%s, applicant_employer3_state=%s, applicant_employer3_zip=%s, applicant_employer3_phone=%s, applicant_employer3_years=%s, applicant_employer3_months=%s, user_comments_employer_notes=%s, co_applicant_name=%s, co_applicant_fname=%s, co_applicant_mname=%s, co_applicant_lname=%s, co_applicant_name_relationship=%s, co_applicant_dob=%s, co_applicant_age=%s, co_applicant_ssn=%s, co_applicant_ssn4=%s, co_applicant_driver_licenses_no=%s, co_applicant_driver_licenses_state=%s, co_applicant_driver_licenses_status=%s, co_applicant_home_phone=%s, co_applicant_home_cell=%s, co_applicant_email=%s, co_applicant_present_addr1=%s, co_applicant_present_addr2=%s, co_applicant_present_addr_city=%s, co_applicant_present_addr_state=%s, co_applicant_present_addr_zip=%s, co_applicant_home_pymt=%s, co_applicant_present_addr_county=%s, co_applicant_present_addr_live_years=%s, co_applicant_present_addr_live_months=%s, co_applicant_employer_name=%s, co_applicant_employer_phone=%s, co_applicant_employer_phone_ext=%s, co_applicant_employer_addr=%s, co_applicant_employer_addr2=%s, co_applicant_employer_city=%s, co_applicant_employer_state=%s, co_applicant_employer_zip=%s, co_applicant_employer_department=%s, co_applicant_employer_postion=%s, co_applicant_employer_supervisor_name=%s, co_applicant_employer_supervisor_phone=%s, co_applicant_employer_work_months=%s, co_applicant_employer_work_years=%s, co_applicant_employer_hours=%s, co_applicant_employer_shift=%s, co_applicant_income_source=%s, co_applicant_other_income=%s, co_applicant_income_bringhome=%s, co_applicant_payday_frequency=%s, applicant_last_vehicle_purchased=%s, applicants_bank_name=%s, applicant_initials_disclosure1=%s, undersigned_authorization=%s, federal_equal_act=%s, applicant_initials_disclosure2=%s, information_true_statement=%s, applicant_signature=%s, co_applicant_signature=%s, salesperson_witness_signature=%s, applicant_signed_input_date=%s, loan_guarantor_signature=%s, credit_app_last_modified=%s, applicants_father_name=%s, applicants_father_deceased=%s, applicants_father_mainphone_number=%s, applicants_father_address=%s, applicants_mother_name=%s, applicants_mother_deceased=%s, applicants_mother_mainphone_number=%s, applicants_mother_address=%s, applicants_realative1_name=%s, applicants_realative1_relationship=%s, applicants_realative1_mainphone=%s, applicants_realative1_address=%s, applicants_realative1_address_city=%s, applicants_realative1_address_state=%s, applicants_realative1_address_zip=%s, applicants_realative2_name=%s, applicants_realative2_relationship=%s, applicants_realative2_mainphone=%s, applicants_realative2_address=%s, applicants_realative3_name=%s, applicants_realative3_relationship=%s, applicants_realative3_mainphone=%s, applicants_realative3_address=%s, applicants_realative4_name=%s, applicants_realative4_relationship=%s, applicants_realative4_mainphone_number=%s, applicants_realative4_address=%s, applicants_realative5_name=%s, applicants_realative5_relationship=%s, applicants_realative5_mainphone_number=%s, applicants_realative5_address=%s, applicants_realative6_name=%s, applicants_realative6_mainphone=%s, applicants_realative6_address=%s, applicants_realative7_name=%s, applicants_realative7_relationship=%s, applicants_realative7_mainphone=%s, applicants_realative7_address=%s, applicants_realative8_name=%s, applicants_realative8_mainphone=%s, applicants_realative8_address=%s, applicants_realative9_name=%s, applicants_realative9_mainphone=%s, applicants_realative9_address=%s, applicants_realative_comments=%s, applicants_reposession=%s, applicants_reposession_when=%s, applicants_reposession_where=%s, applicants_dependents_many=%s, applicants_dependents1_name=%s, applicants_dependents1_age=%s, applicants_dependents1_grade=%s, applicants_dependents1_school_name_location=%s, applicants_dependents2_name=%s, applicants_dependents2_age=%s, applicants_dependents2_grade=%s, applicants_dependents2_school_name_location=%s, applicants_nondependents_many=%s, applicants_nondependents1_name=%s, applicants_nondependents1_age=%s, applicants_nondependents1_cell_number=%s, applicants_nondependents2_name=%s, applicants_nondependents2_age=%s, applicants_nondependents2_cell_number=%s, co_applicants_email_address=%s, applicant_have_a_computer=%s, applicant_level_of_cpu_experience=%s, applicant_acknowledge_equal_opportunity=%s, applicant_hereby_authorize=%s, equal_credit_opportunity_act=%s, applicant_authorization=%s, applicant_authorization_text=%s, applicant_digital_signature=%s, applicant_digital_signature_date=%s, coapplicant_digital_signature=%s, coapplicant_digital_signature_date=%s WHERE wfhuser_id=%s",
                       GetSQLValueString($_POST['wfhuser_primary_did'], "int"),
                       GetSQLValueString($_POST['wfhuser_primary_sid'], "int"),
                       GetSQLValueString($_POST['wfhuser_primary_vid'], "int"),
                       GetSQLValueString($_POST['wfhuser_primary_cid'], "int"),
                       GetSQLValueString($_POST['wfhuser_primary_clid'], "int"),
                       GetSQLValueString($_POST['wfhuser_tokenid'], "text"),
                       GetSQLValueString($_POST['wfhuser_email_address'], "text"),
                       GetSQLValueString($_POST['wfhuser_username'], "text"),
                       GetSQLValueString($_POST['wfhuser_password'], "text"),
                       GetSQLValueString(isset($_POST['joint_or_invidividual']) ? "true" : "", "defined","1","0"),
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

  $updateGoTo = "../myacct.php";
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


include('../../Libary/token-generator.php');


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

include('../inc/_fbinc.php');

@include("../inc/definitions_fbsession.php");

@$fbemail = $user_profile['email'];

function checkfb ($fbemail){
	
include('../../Connections/idsconnection.php');


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
include('../../Connections/idsconnection.php');

include("../inc/definitions_fbsession.php");

checkfb ($fbemail);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userWfh =  "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = '$fbemail'");
$userWfh = mysqli_query($idsconnection_mysqli, $query_userWfh);
$row_userWfh = mysqli_fetch_assoc($userWfh);
$totalRows_userWfh = mysqli_num_rows($userWfh);
$wfidd = $row_userWfh['wfhuser_id']; //Hackishere

		


	
}

include('../inc/definitions_fbsession.php');

include('../wfhLibrary/sessionid.php');





if ($user){
createwfhuser($user_profile);
}

mysql_select_db($database_tracking, $tracking);
$query_rcntlyVwd = "SELECT * FROM  `idsids_tracking_idsvehicles`.`vehiclestracking`  WHERE fbid = '$fbuserid' ORDER BY created_at DESC";
$rcntlyVwd = mysqli_query($idsconnection_mysqli, $query_rcntlyVwd, $tracking);
$row_rcntlyVwd = mysqli_fetch_assoc($rcntlyVwd);
$totalRows_rcntlyVwd = mysqli_num_rows($rcntlyVwd);

?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userWfh = "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = '$fbemail'";
$userWfh = mysqli_query($idsconnection_mysqli, $query_userWfh);
$row_userWfh = mysqli_fetch_assoc($userWfh);
$totalRows_userWfh = mysqli_num_rows($userWfh);
$wfhuserid=$row_userWfh['wfhuser_id'];
?>
<?php

include('_db_loggedinFunctions.php');


restrict($fbemail);

fbprofileinfo($user_profile); 

include('../wfhLibrary/showviewedvehicles.php');

?>

                                
		 <?php 
									
									
/*


Array
(
[fb_597949943584638_code] => AQACtjfpczUMAduBpWIOTJJdjZ1_QxxmX-Le3oL6uIGiKIvYJJSH-ib4cN5pLFm022le_4P908KwzVy43GBCWhyEza_cJwa5EEx0nXV-vNunAxvji08shycQ9qt9UsOXGKWbyIyCrnDdctZPLff9nXi4ahRqrjWC2U4O45UCmPPsgoW9hRBJI2GDtYPsuV8V6T5VpJtJ1lfyluCiG0GJ9ojdt2NtS_6I286olkAtoEJ485RaG2Jyq6jnzRuGbl9cZy2UzNRa1nG6y7khr0biU5ZPT6Oo9yUu3l38TMOMSEAJ28ccRYwY_9xMHlk0IiH2AbU


[fb_597949943584638_access_token] => CAAIf1RH7F34BACdRbUwjgZACWC6VWwaz3RI0cl3Se1kZA6f7uGbuunc2DoKrLkMfcboXeq2Bw9OCpncQZBjzKxy3djnZB9Vs6l0Xf4dvBZCZCZBAv8YvSo5unQjhMh6BZBzBTgyCdzi5ViHVMDuZB9ka5kMVXZBZAI8FqZAYIXtE7r7o9MotJWYqoucm

[fb_597949943584638_user_id] => 1492521344
)
									
*/									
									
									//print_r($_SESSION); 
									
									
									
									
									
									?>
                                    
                                    

 <?php if ($user): ?>
 
 
 
 
<h3>Your Application Information </h3>
 
 
       <p>This Page Allows You To Complete Everything You Need To Finance Any Vehicle You See Here.</p>


       <div id="form-content">













       
       <form action="<?php echo $editFormAction; ?>" method="POST" name="usrProf_form" id="usrProf_form">
         <table align="center">
           <tr valign="baseline">
             <td nowrap align="right">Wfhuser email address:</td>
             <td><input type="text" name="wfhuser_email_address" value="<?php echo htmlentities($row_userWfh['wfhuser_email_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Wfhuser username:</td>
             <td><input type="text" name="wfhuser_username" value="<?php echo htmlentities($row_userWfh['wfhuser_username'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Wfhuser password:</td>
             <td><input name="wfhuser_password" type="password" value="<?php echo $row_userWfh['wfhuser_password']; ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Joint or invidividual:</td>
             <td><p>
               <label>
                 <input <?php if (!(strcmp($row_userWfh['joint_or_invidividual'],"Individual"))) {echo "checked=\"checked\"";} ?> type="radio" name="joint_or_invidividual" value="0" id="joint_or_invidividual_0" />
                 Individual</label>
               <br />
               <label>
                 <input <?php if (!(strcmp($row_userWfh['joint_or_invidividual'],"Joint"))) {echo "checked=\"checked\"";} ?> type="radio" name="joint_or_invidividual" value="1" id="joint_or_invidividual_1" />
                 Joint</label>
               <br />
             </p></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant driver licenses number:</td>
             <td><input type="text" name="applicant_driver_licenses_number" value="<?php echo htmlentities($row_userWfh['applicant_driver_licenses_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant driver licenses status:</td>
             <td><input type="text" name="applicant_driver_licenses_status" value="<?php echo htmlentities($row_userWfh['applicant_driver_licenses_status'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant driver state issued:</td>
             <td><select name="applicant_driver_state_issued">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_driver_state_issued'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_driver_state_issued'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant ssn:</td>
             <td><input type="password" name="applicant_ssn" value="<?php echo $row_userWfh['applicant_ssn']; ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant ssn4:</td>
             <td><input type="text" name="applicant_ssn4" id="applicant_ssn4" value="<?php echo htmlentities($row_userWfh['applicant_ssn4'], ENT_COMPAT, ''); ?>"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant dob:</td>
             <td><input type="text" name="applicant_dob" value="<?php echo htmlentities($row_userWfh['applicant_dob'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant age:</td>
             <td><input type="text" name="applicant_age" value="<?php echo htmlentities($row_userWfh['applicant_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant name:</td>
             <td><input type="text" name="applicant_name" value="<?php echo htmlentities($row_userWfh['applicant_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant fname:</td>
             <td><input type="text" name="applicant_fname" value="<?php echo htmlentities($row_userWfh['applicant_fname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant mname:</td>
             <td><input type="text" name="applicant_mname" value="<?php echo htmlentities($row_userWfh['applicant_mname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant lname:</td>
             <td><input type="text" name="applicant_lname" value="<?php echo htmlentities($row_userWfh['applicant_lname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant other name:</td>
             <td><input type="text" name="applicant_other_name" value="<?php echo htmlentities($row_userWfh['applicant_other_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant maiden name:</td>
             <td><input type="text" name="applicant_maiden_name" value="<?php echo htmlentities($row_userWfh['applicant_maiden_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant main phone:</td>
             <td><input type="text" name="applicant_main_phone" value="<?php echo htmlentities($row_userWfh['applicant_main_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant cell phone:</td>
             <td><input type="text" name="applicant_cell_phone" value="<?php echo htmlentities($row_userWfh['applicant_cell_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant present address1:</td>
             <td><input type="text" name="applicant_present_address1" value="<?php echo htmlentities($row_userWfh['applicant_present_address1'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant present address2:</td>
             <td><input type="text" name="applicant_present_address2" value="<?php echo htmlentities($row_userWfh['applicant_present_address2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant present addr city:</td>
             <td><input type="text" name="applicant_present_addr_city" value="<?php echo htmlentities($row_userWfh['applicant_present_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant present addr state:</td>
             <td><select name="applicant_present_addr_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_present_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_present_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant present addr zip:</td>
             <td><input type="text" name="applicant_present_addr_zip" value="<?php echo htmlentities($row_userWfh['applicant_present_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant present addr county:</td>
             <td><input type="text" name="applicant_present_addr_county" value="<?php echo htmlentities($row_userWfh['applicant_present_addr_county'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant addr years:</td>
             <td><select name="applicant_addr_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_addr_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_addr_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant addr months:</td>
             <td><select name="applicant_addr_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_addr_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_addr_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant addr landlord mortg:</td>
             <td><input type="text" name="applicant_addr_landlord_mortg" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_mortg'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant addr landlord address:</td>
             <td><input type="text" name="applicant_addr_landlord_address" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant addr landlord city:</td>
             <td><input type="text" name="applicant_addr_landlord_city" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant addr landlord state:</td>
             <td><select name="applicant_addr_landlord_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_addr_landlord_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_addr_landlord_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant addr landlord zip:</td>
             <td><input type="text" name="applicant_addr_landlord_zip" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant addr landlord phone:</td>
             <td><input type="text" name="applicant_addr_landlord_phone" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant name oncurrent lease:</td>
             <td><input type="text" name="applicant_name_oncurrent_lease" value="<?php echo htmlentities($row_userWfh['applicant_name_oncurrent_lease'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant apart or house:</td>
             <td valign="baseline"><table>
               <tr>
                 <td><input type="radio" name="applicant_apart_or_house" value="House" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_apart_or_house'], ENT_COMPAT, ''),"House"))) {echo "checked=\"checked\"";} ?>>
                   House</td>
               </tr>
               <tr>
                 <td><input type="radio" name="applicant_apart_or_house" value="Apartment" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_apart_or_house'], ENT_COMPAT, ''),"Apartment"))) {echo "checked=\"checked\"";} ?>>
                   Apartment</td>
               </tr>
             </table></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant buy own rent other:</td>
             <td><select name="applicant_buy_own_rent_other">
               <option value="Own" <?php if (!(strcmp("Own", htmlentities($row_userWfh['applicant_buy_own_rent_other'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Own</option>
               <option value="Rent" <?php if (!(strcmp("Rent", htmlentities($row_userWfh['applicant_buy_own_rent_other'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Rent</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant house payment:</td>
             <td><input type="text" name="applicant_house_payment" value="<?php echo htmlentities($row_userWfh['applicant_house_payment'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right" valign="top">User comments app notes:</td>
             <td><textarea name="user_comments_app_notes" cols="50" rows="5"><?php echo htmlentities($row_userWfh['user_comments_app_notes'], ENT_COMPAT, ''); ?></textarea></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous1 addr1:</td>
             <td><input type="text" name="applicant_previous1_addr1" value="<?php echo htmlentities($row_userWfh['applicant_previous1_addr1'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous1 addr2:</td>
             <td><input type="text" name="applicant_previous1_addr2" value="<?php echo htmlentities($row_userWfh['applicant_previous1_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous1 addr city:</td>
             <td><input type="text" name="applicant_previous1_addr_city" value="<?php echo htmlentities($row_userWfh['applicant_previous1_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous1 addr state:</td>
             <td><select name="applicant_previous1_addr_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous1_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_previous1_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous1 addr zip:</td>
             <td><input type="text" name="applicant_previous1_addr_zip" value="<?php echo htmlentities($row_userWfh['applicant_previous1_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous1 live years:</td>
             <td><select name="applicant_previous1_live_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous1_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_previous1_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous1 live months:</td>
             <td><select name="applicant_previous1_live_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous1_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_previous1_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous1 landlord name:</td>
             <td><input type="text" name="applicant_previous1_landlord_name" value="<?php echo htmlentities($row_userWfh['applicant_previous1_landlord_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous1 landlord phone:</td>
             <td><input type="text" name="applicant_previous1_landlord_phone" value="<?php echo htmlentities($row_userWfh['applicant_previous1_landlord_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous2 addr1:</td>
             <td><input type="text" name="applicant_previous2_addr1" value="<?php echo htmlentities($row_userWfh['applicant_previous2_addr1'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous2 addr2:</td>
             <td><input type="text" name="applicant_previous2_addr2" value="<?php echo htmlentities($row_userWfh['applicant_previous2_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous2 addr city:</td>
             <td><input type="text" name="applicant_previous2_addr_city" value="<?php echo htmlentities($row_userWfh['applicant_previous2_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous2 addr state:</td>
             <td><select name="applicant_previous2_addr_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous2_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_previous2_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous2 addr zip:</td>
             <td><input type="text" name="applicant_previous2_addr_zip" value="<?php echo htmlentities($row_userWfh['applicant_previous2_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous2 live years:</td>
             <td><select name="applicant_previous2_live_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous2_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_previous2_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous2 live months:</td>
             <td><select name="applicant_previous2_live_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous2_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_previous2_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous2 landlord name:</td>
             <td><input type="text" name="applicant_previous2_landlord_name" value="<?php echo htmlentities($row_userWfh['applicant_previous2_landlord_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous2 landlord phone:</td>
             <td><input type="text" name="applicant_previous2_landlord_phone" value="<?php echo htmlentities($row_userWfh['applicant_previous2_landlord_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous3 addr1:</td>
             <td><input type="text" name="applicant_previous3_addr1" value="<?php echo htmlentities($row_userWfh['applicant_previous3_addr1'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous3 addr2:</td>
             <td><input type="text" name="applicant_previous3_addr2" value="<?php echo htmlentities($row_userWfh['applicant_previous3_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous3 addr city:</td>
             <td><input type="text" name="applicant_previous3_addr_city" value="<?php echo htmlentities($row_userWfh['applicant_previous3_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous3 addr state:</td>
             <td><select name="applicant_previous3_addr_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous3_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_previous3_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous3 addr zip:</td>
             <td><input type="text" name="applicant_previous3_addr_zip" value="<?php echo htmlentities($row_userWfh['applicant_previous3_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous3 live years:</td>
             <td><select name="applicant_previous3_live_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous3_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_previous3_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous3 live months:</td>
             <td><select name="applicant_previous3_live_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous3_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_previous3_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous3 landlord name:</td>
             <td><input type="text" name="applicant_previous3_landlord_name" value="<?php echo htmlentities($row_userWfh['applicant_previous3_landlord_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant previous3 landlord phone:</td>
             <td><input type="text" name="applicant_previous3_landlord_phone" value="<?php echo htmlentities($row_userWfh['applicant_previous3_landlord_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">User comments previousaddr notes:</td>
             <td><input type="text" name="user_comments_previousaddr_notes" value="<?php echo htmlentities($row_userWfh['user_comments_previousaddr_notes'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 name:</td>
             <td><input type="text" name="applicant_employer1_name" value="<?php echo htmlentities($row_userWfh['applicant_employer1_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 addr:</td>
             <td><input type="text" name="applicant_employer1_addr" value="<?php echo htmlentities($row_userWfh['applicant_employer1_addr'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 city:</td>
             <td><input type="text" name="applicant_employer1_city" value="<?php echo htmlentities($row_userWfh['applicant_employer1_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 state:</td>
             <td><select name="applicant_employer1_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer1_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_employer1_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 zip:</td>
             <td><input type="text" name="applicant_employer1_zip" value="<?php echo htmlentities($row_userWfh['applicant_employer1_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 phone:</td>
             <td><input type="text" name="applicant_employer1_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer1_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 phone ext:</td>
             <td><input type="text" name="applicant_employer1_phone_ext" value="<?php echo htmlentities($row_userWfh['applicant_employer1_phone_ext'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 work years:</td>
             <td><select name="applicant_employer1_work_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer1_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_employer1_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 work months:</td>
             <td><select name="applicant_employer1_work_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer1_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_employer1_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 position:</td>
             <td><input type="text" name="applicant_employer1_position" value="<?php echo htmlentities($row_userWfh['applicant_employer1_position'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 department:</td>
             <td><input type="text" name="applicant_employer1_department" value="<?php echo htmlentities($row_userWfh['applicant_employer1_department'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 supervisors name:</td>
             <td><input type="text" name="applicant_employer1_supervisors_name" value="<?php echo htmlentities($row_userWfh['applicant_employer1_supervisors_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 supervisors phone:</td>
             <td><input type="text" name="applicant_employer1_supervisors_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer1_supervisors_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 hours shift:</td>
             <td><input type="text" name="applicant_employer1_hours_shift" value="<?php echo htmlentities($row_userWfh['applicant_employer1_hours_shift'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 salary bringhome:</td>
             <td><input type="text" name="applicant_employer1_salary_bringhome" value="<?php echo htmlentities($row_userWfh['applicant_employer1_salary_bringhome'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer1 payday freq:</td>
             <td><select name="applicant_employer1_payday_freq">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer1_payday_freq'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select When?</option>
               <?php
do {  
?>
               <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], htmlentities($row_userWfh['applicant_employer1_payday_freq'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
               <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer form of pymt:</td>
             <td><input type="text" name="applicant_employer_form_of_pymt" value="<?php echo htmlentities($row_userWfh['applicant_employer_form_of_pymt'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant other income amount:</td>
             <td><input type="text" name="applicant_other_income_amount" value="<?php echo htmlentities($row_userWfh['applicant_other_income_amount'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant other income source:</td>
             <td><input type="text" name="applicant_other_income_source" value="<?php echo htmlentities($row_userWfh['applicant_other_income_source'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant other income when rcvd:</td>
             <td><select name="applicant_other_income_when_rcvd">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_other_income_when_rcvd'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select When?</option>
               <?php
do {  
?>
               <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], htmlentities($row_userWfh['applicant_other_income_when_rcvd'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
               <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant if education school sys:</td>
             <td><input type="text" name="applicant_if_education_school_sys" value="<?php echo htmlentities($row_userWfh['applicant_if_education_school_sys'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right" valign="top">User applicant employer notes:</td>
             <td><textarea name="user_applicant_employer_notes" cols="50" rows="5"><?php echo htmlentities($row_userWfh['user_applicant_employer_notes'], ENT_COMPAT, ''); ?></textarea></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 name:</td>
             <td><input type="text" name="applicant_employer2_name" value="<?php echo htmlentities($row_userWfh['applicant_employer2_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 addr:</td>
             <td><input type="text" name="applicant_employer2_addr" value="<?php echo htmlentities($row_userWfh['applicant_employer2_addr'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 city:</td>
             <td><input type="text" name="applicant_employer2_city" value="<?php echo htmlentities($row_userWfh['applicant_employer2_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 state:</td>
             <td><select name="applicant_employer2_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer2_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_employer2_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 zip:</td>
             <td><input type="text" name="applicant_employer2_zip" value="<?php echo htmlentities($row_userWfh['applicant_employer2_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 phone:</td>
             <td><input type="text" name="applicant_employer2_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer2_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 phone ext:</td>
             <td><input type="text" name="applicant_employer2_phone_ext" value="<?php echo htmlentities($row_userWfh['applicant_employer2_phone_ext'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 work years:</td>
             <td><select name="applicant_employer2_work_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer2_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_employer2_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 work months:</td>
             <td><select name="applicant_employer2_work_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer2_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_employer2_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 position:</td>
             <td><input type="text" name="applicant_employer2_position" value="<?php echo htmlentities($row_userWfh['applicant_employer2_position'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 department:</td>
             <td><input type="text" name="applicant_employer2_department" value="<?php echo htmlentities($row_userWfh['applicant_employer2_department'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 supervisors name:</td>
             <td><input type="text" name="applicant_employer2_supervisors_name" value="<?php echo htmlentities($row_userWfh['applicant_employer2_supervisors_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 supervisors phone:</td>
             <td><input type="text" name="applicant_employer2_supervisors_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer2_supervisors_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 hours shift:</td>
             <td><input type="text" name="applicant_employer2_hours_shift" value="<?php echo htmlentities($row_userWfh['applicant_employer2_hours_shift'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 salary bringhome:</td>
             <td><input type="text" name="applicant_employer2_salary_bringhome" value="<?php echo htmlentities($row_userWfh['applicant_employer2_salary_bringhome'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 payday freq:</td>
             <td><select name="applicant_employer2_payday_freq">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer2_payday_freq'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select When?</option>
               <?php
do {  
?>
               <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], htmlentities($row_userWfh['applicant_employer2_payday_freq'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
               <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer2 form of pymt:</td>
             <td valign="baseline"><table>
               <tr>
                 <td><input type="radio" name="applicant_employer2_form_of_pymt" value="DirectDeposit" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_employer2_form_of_pymt'], ENT_COMPAT, ''),"DirectDeposit"))) {echo "checked=\"checked\"";} ?>>
                   Direct Depost</td>
               </tr>
             </table></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer3 name:</td>
             <td><input type="text" name="applicant_employer3_name" value="<?php echo htmlentities($row_userWfh['applicant_employer3_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer3 addr:</td>
             <td><input type="text" name="applicant_employer3_addr" value="<?php echo htmlentities($row_userWfh['applicant_employer3_addr'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer3 city:</td>
             <td><input type="text" name="applicant_employer3_city" value="<?php echo htmlentities($row_userWfh['applicant_employer3_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer3 state:</td>
             <td><select name="applicant_employer3_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer3_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_employer3_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer3 zip:</td>
             <td><input type="text" name="applicant_employer3_zip" value="<?php echo htmlentities($row_userWfh['applicant_employer3_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer3 phone:</td>
             <td><input type="text" name="applicant_employer3_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer3_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer3 years:</td>
             <td><select name="applicant_employer3_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer3_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_employer3_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant employer3 months:</td>
             <td><select name="applicant_employer3_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer3_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_employer3_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">User comments employer notes:</td>
             <td><input type="text" name="user_comments_employer_notes" value="<?php echo htmlentities($row_userWfh['user_comments_employer_notes'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant name:</td>
             <td><input type="text" name="co_applicant_name" value="<?php echo htmlentities($row_userWfh['co_applicant_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant fname:</td>
             <td><input type="text" name="co_applicant_fname" value="<?php echo htmlentities($row_userWfh['co_applicant_fname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant mname:</td>
             <td><input type="text" name="co_applicant_mname" value="<?php echo htmlentities($row_userWfh['co_applicant_mname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant lname:</td>
             <td><input type="text" name="co_applicant_lname" value="<?php echo htmlentities($row_userWfh['co_applicant_lname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant name relationship:</td>
             <td><select name="co_applicant_name_relationship">
               <option value="Mother" <?php if (!(strcmp("Mother", htmlentities($row_userWfh['co_applicant_name_relationship'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Mother</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant dob:</td>
             <td><input type="text" name="co_applicant_dob" value="<?php echo htmlentities($row_userWfh['co_applicant_dob'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant age:</td>
             <td><input type="text" name="co_applicant_age" value="<?php echo htmlentities($row_userWfh['co_applicant_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant ssn:</td>
             <td><input type="text" name="co_applicant_ssn" value="<?php echo htmlentities($row_userWfh['co_applicant_ssn'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant ssn4:</td>
             <td><input type="text" name="co_applicant_ssn4" value="<?php echo htmlentities($row_userWfh['co_applicant_ssn4'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant driver licenses no:</td>
             <td><input type="text" name="co_applicant_driver_licenses_no" value="<?php echo htmlentities($row_userWfh['co_applicant_driver_licenses_no'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant driver licenses state:</td>
             <td><select name="co_applicant_driver_licenses_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_driver_licenses_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['co_applicant_driver_licenses_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant driver licenses status:</td>
             <td><input type="text" name="co_applicant_driver_licenses_status" value="<?php echo htmlentities($row_userWfh['co_applicant_driver_licenses_status'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant home phone:</td>
             <td><input type="text" name="co_applicant_home_phone" value="<?php echo htmlentities($row_userWfh['co_applicant_home_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant home cell:</td>
             <td><input type="text" name="co_applicant_home_cell" value="<?php echo htmlentities($row_userWfh['co_applicant_home_cell'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant email:</td>
             <td><input type="text" name="co_applicant_email" value="<?php echo htmlentities($row_userWfh['co_applicant_email'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant present addr1:</td>
             <td><input type="text" name="co_applicant_present_addr1" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr1'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant present addr2:</td>
             <td><input type="text" name="co_applicant_present_addr2" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant present addr city:</td>
             <td><input type="text" name="co_applicant_present_addr_city" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant present addr state:</td>
             <td><select name="co_applicant_present_addr_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_present_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['co_applicant_present_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant present addr zip:</td>
             <td><input type="text" name="co_applicant_present_addr_zip" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant home pymt:</td>
             <td><input type="text" name="co_applicant_home_pymt" value="<?php echo htmlentities($row_userWfh['co_applicant_home_pymt'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant present addr county:</td>
             <td><input type="text" name="co_applicant_present_addr_county" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr_county'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant present addr live years:</td>
             <td><select name="co_applicant_present_addr_live_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_present_addr_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['co_applicant_present_addr_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant present addr live months:</td>
             <td><select name="co_applicant_present_addr_live_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_present_addr_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['co_applicant_present_addr_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer name:</td>
             <td><input type="text" name="co_applicant_employer_name" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer phone:</td>
             <td><input type="text" name="co_applicant_employer_phone" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer phone ext:</td>
             <td><input type="text" name="co_applicant_employer_phone_ext" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_phone_ext'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer addr:</td>
             <td><input type="text" name="co_applicant_employer_addr" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_addr'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer addr2:</td>
             <td><input type="text" name="co_applicant_employer_addr2" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer city:</td>
             <td><input type="text" name="co_applicant_employer_city" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer state:</td>
             <td><select name="co_applicant_employer_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_employer_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['co_applicant_employer_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer zip:</td>
             <td><input type="text" name="co_applicant_employer_zip" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer department:</td>
             <td><input type="text" name="co_applicant_employer_department" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_department'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer postion:</td>
             <td><input type="text" name="co_applicant_employer_postion" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_postion'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer supervisor name:</td>
             <td><input type="text" name="co_applicant_employer_supervisor_name" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_supervisor_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer supervisor phone:</td>
             <td><input type="text" name="co_applicant_employer_supervisor_phone" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_supervisor_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer work years:</td>
             <td><select name="co_applicant_employer_work_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_employer_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['co_applicant_employer_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer work months:</td>
             <td><select name="co_applicant_employer_work_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_employer_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['co_applicant_employer_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
          </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer hours:</td>
             <td><input type="text" name="co_applicant_employer_hours" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_hours'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant employer shift:</td>
             <td><input type="text" name="co_applicant_employer_shift" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_shift'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant income source:</td>
             <td><input type="text" name="co_applicant_income_source" value="<?php echo htmlentities($row_userWfh['co_applicant_income_source'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant other income:</td>
             <td><input type="text" name="co_applicant_other_income" value="<?php echo htmlentities($row_userWfh['co_applicant_other_income'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant income bringhome:</td>
             <td><input type="text" name="co_applicant_income_bringhome" value="<?php echo htmlentities($row_userWfh['co_applicant_income_bringhome'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant payday frequency:</td>
             <td><select name="co_applicant_payday_frequency">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_payday_frequency'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select When?</option>
               <?php
do {  
?>
               <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], htmlentities($row_userWfh['co_applicant_payday_frequency'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
               <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant last vehicle purchased:</td>
             <td><input type="text" name="applicant_last_vehicle_purchased" value="<?php echo htmlentities($row_userWfh['applicant_last_vehicle_purchased'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants bank name:</td>
             <td><input type="text" name="applicants_bank_name" value="<?php echo htmlentities($row_userWfh['applicants_bank_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants checking savings acct#:</td>
             <td><input type="text" name="applicants_checking_savings_acct" value="<?php echo htmlentities($row_userWfh['applicants_checking_savings_acct#'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant initials disclosure1:</td>
             <td><input type="text" name="applicant_initials_disclosure1" value="<?php echo htmlentities($row_userWfh['applicant_initials_disclosure1'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Undersigned authorization:</td>
             <td><input type="text" name="undersigned_authorization" value="<?php echo htmlentities($row_userWfh['undersigned_authorization'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Federal equal act:</td>
             <td><input type="text" name="federal_equal_act" value="<?php echo htmlentities($row_userWfh['federal_equal_act'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant initials disclosure2:</td>
             <td><input type="text" name="applicant_initials_disclosure2" value="<?php echo htmlentities($row_userWfh['applicant_initials_disclosure2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Information true statement:</td>
             <td><input type="text" name="information_true_statement" value="<?php echo htmlentities($row_userWfh['information_true_statement'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant signature:</td>
             <td><input type="text" name="applicant_signature" value="<?php echo htmlentities($row_userWfh['applicant_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicant signature:</td>
             <td><input type="text" name="co_applicant_signature" value="<?php echo htmlentities($row_userWfh['co_applicant_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Salesperson witness signature:</td>
             <td><input type="text" name="salesperson_witness_signature" value="<?php echo htmlentities($row_userWfh['salesperson_witness_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant signed input date:</td>
             <td><input type="text" name="applicant_signed_input_date" value="<?php echo htmlentities($row_userWfh['applicant_signed_input_date'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Loan guarantor signature:</td>
             <td><input type="text" name="loan_guarantor_signature" value="<?php echo htmlentities($row_userWfh['loan_guarantor_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Credit app last modified:</td>
             <td><input type="text" name="credit_app_last_modified" value="<?php echo htmlentities($row_userWfh['credit_app_last_modified'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Application created date:</td>
             <td><input type="text" name="application_created_date" value="<?php echo htmlentities($row_userWfh['application_created_date'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants father name:</td>
             <td><input type="text" name="applicants_father_name" value="<?php echo htmlentities($row_userWfh['applicants_father_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants father deceased:</td>
             <td><input type="checkbox" name="applicants_father_deceased" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicants_father_deceased'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants father mainphone number:</td>
             <td><input type="text" name="applicants_father_mainphone_number" value="<?php echo htmlentities($row_userWfh['applicants_father_mainphone_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants father address:</td>
             <td><input type="text" name="applicants_father_address" value="<?php echo htmlentities($row_userWfh['applicants_father_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants mother name:</td>
             <td><input type="text" name="applicants_mother_name" value="<?php echo htmlentities($row_userWfh['applicants_mother_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants mother deceased:</td>
             <td><input type="checkbox" name="applicants_mother_deceased" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicants_mother_deceased'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants mother mainphone number:</td>
             <td><input type="text" name="applicants_mother_mainphone_number" value="<?php echo htmlentities($row_userWfh['applicants_mother_mainphone_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants mother address:</td>
             <td><input type="text" name="applicants_mother_address" value="<?php echo htmlentities($row_userWfh['applicants_mother_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative1 name:</td>
             <td><input type="text" name="applicants_realative1_name" value="<?php echo htmlentities($row_userWfh['applicants_realative1_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative1 relationship:</td>
             <td><input type="text" name="applicants_realative1_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative1_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative1 mainphone:</td>
             <td><input type="text" name="applicants_realative1_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative1_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative1 address:</td>
             <td><input type="text" name="applicants_realative1_address" value="<?php echo htmlentities($row_userWfh['applicants_realative1_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative1 address city:</td>
             <td><input type="text" name="applicants_realative1_address_city" value="<?php echo htmlentities($row_userWfh['applicants_realative1_address_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative1 address state:</td>
             <td><select name="applicants_realative1_address_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicants_realative1_address_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicants_realative1_address_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative1 address zip:</td>
             <td><input type="text" name="applicants_realative1_address_zip" value="<?php echo htmlentities($row_userWfh['applicants_realative1_address_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative2 name:</td>
             <td><input type="text" name="applicants_realative2_name" value="<?php echo htmlentities($row_userWfh['applicants_realative2_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative2 relationship:</td>
             <td><input type="text" name="applicants_realative2_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative2_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative2 mainphone:</td>
             <td><input type="text" name="applicants_realative2_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative2_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative2 address:</td>
             <td><input type="text" name="applicants_realative2_address" value="<?php echo htmlentities($row_userWfh['applicants_realative2_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative3 name:</td>
             <td><input type="text" name="applicants_realative3_name" value="<?php echo htmlentities($row_userWfh['applicants_realative3_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative3 relationship:</td>
             <td><input type="text" name="applicants_realative3_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative3_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative3 mainphone:</td>
             <td><input type="text" name="applicants_realative3_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative3_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative3 address:</td>
             <td><input type="text" name="applicants_realative3_address" value="<?php echo htmlentities($row_userWfh['applicants_realative3_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative4 name:</td>
             <td><input type="text" name="applicants_realative4_name" value="<?php echo htmlentities($row_userWfh['applicants_realative4_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative4 relationship:</td>
             <td><input type="text" name="applicants_realative4_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative4_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative4 mainphone number:</td>
             <td><input type="text" name="applicants_realative4_mainphone_number" value="<?php echo htmlentities($row_userWfh['applicants_realative4_mainphone_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative4 address:</td>
             <td><input type="text" name="applicants_realative4_address" value="<?php echo htmlentities($row_userWfh['applicants_realative4_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative5 name:</td>
             <td><input type="text" name="applicants_realative5_name" value="<?php echo htmlentities($row_userWfh['applicants_realative5_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative5 relationship:</td>
             <td><input type="text" name="applicants_realative5_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative5_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative5 mainphone number:</td>
             <td><input type="text" name="applicants_realative5_mainphone_number" value="<?php echo htmlentities($row_userWfh['applicants_realative5_mainphone_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative5 address:</td>
             <td><input type="text" name="applicants_realative5_address" value="<?php echo htmlentities($row_userWfh['applicants_realative5_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative6 name:</td>
             <td><input type="text" name="applicants_realative6_name" value="<?php echo htmlentities($row_userWfh['applicants_realative6_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative6 mainphone:</td>
             <td><input type="text" name="applicants_realative6_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative6_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative6 address:</td>
             <td><input type="text" name="applicants_realative6_address" value="<?php echo htmlentities($row_userWfh['applicants_realative6_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative7 name:</td>
             <td><input type="text" name="applicants_realative7_name" value="<?php echo htmlentities($row_userWfh['applicants_realative7_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative7 relationship:</td>
             <td><input type="text" name="applicants_realative7_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative7_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative7 mainphone:</td>
             <td><input type="text" name="applicants_realative7_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative7_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative7 address:</td>
             <td><input type="text" name="applicants_realative7_address" value="<?php echo htmlentities($row_userWfh['applicants_realative7_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative8 name:</td>
             <td><input type="text" name="applicants_realative8_name" value="<?php echo htmlentities($row_userWfh['applicants_realative8_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative8 mainphone:</td>
             <td><input type="text" name="applicants_realative8_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative8_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative8 address:</td>
             <td><input type="text" name="applicants_realative8_address" value="<?php echo htmlentities($row_userWfh['applicants_realative8_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative9 name:</td>
             <td><input type="text" name="applicants_realative9_name" value="<?php echo htmlentities($row_userWfh['applicants_realative9_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative9 mainphone:</td>
             <td><input type="text" name="applicants_realative9_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative9_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative9 address:</td>
             <td><input type="text" name="applicants_realative9_address" value="<?php echo htmlentities($row_userWfh['applicants_realative9_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants realative comments:</td>
             <td><input type="text" name="applicants_realative_comments" value="<?php echo htmlentities($row_userWfh['applicants_realative_comments'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants reposession:</td>
             <td><input type="checkbox" name="applicants_reposession" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicants_reposession'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants reposession when:</td>
             <td><input type="text" name="applicants_reposession_when" value="<?php echo htmlentities($row_userWfh['applicants_reposession_when'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants reposession where:</td>
             <td><input type="text" name="applicants_reposession_where" value="<?php echo htmlentities($row_userWfh['applicants_reposession_where'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants dependents many:</td>
             <td><select name="applicants_dependents_many">
               <option value="1" <?php if (!(strcmp(1, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>One</option>
               <option value="2" <?php if (!(strcmp(2, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Two</option>
               <option value="3" <?php if (!(strcmp(3, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Three</option>
               <option value="4" <?php if (!(strcmp(4, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Four</option>
               <option value="5" <?php if (!(strcmp(5, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Five</option>
               <option value="6" <?php if (!(strcmp(6, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Six</option>
               <option value="7" <?php if (!(strcmp(7, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Seven</option>
               <option value="8" <?php if (!(strcmp(8, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Eight</option>
               <option value="9" <?php if (!(strcmp(9, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Nine</option>
               <option value="10" <?php if (!(strcmp(10, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Ten</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants dependents1 name:</td>
             <td><input type="text" name="applicants_dependents1_name" value="<?php echo htmlentities($row_userWfh['applicants_dependents1_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants dependents1 age:</td>
             <td><input type="text" name="applicants_dependents1_age" value="<?php echo htmlentities($row_userWfh['applicants_dependents1_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants dependents1 grade:</td>
             <td><input type="text" name="applicants_dependents1_grade" value="<?php echo htmlentities($row_userWfh['applicants_dependents1_grade'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants dependents1 school name location:</td>
             <td><input type="text" name="applicants_dependents1_school_name_location" value="<?php echo htmlentities($row_userWfh['applicants_dependents1_school_name_location'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants dependents2 name:</td>
             <td><input type="text" name="applicants_dependents2_name" value="<?php echo htmlentities($row_userWfh['applicants_dependents2_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants dependents2 age:</td>
             <td><input type="text" name="applicants_dependents2_age" value="<?php echo htmlentities($row_userWfh['applicants_dependents2_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants dependents2 grade:</td>
             <td><input type="text" name="applicants_dependents2_grade" value="<?php echo htmlentities($row_userWfh['applicants_dependents2_grade'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants dependents2 school name location:</td>
             <td><input type="text" name="applicants_dependents2_school_name_location" value="<?php echo htmlentities($row_userWfh['applicants_dependents2_school_name_location'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants nondependents many:</td>
             <td><select name="applicants_nondependents_many">
               <option value="1" <?php if (!(strcmp(1, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>One</option>
               <option value="2" <?php if (!(strcmp(2, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Two</option>
               <option value="3" <?php if (!(strcmp(3, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Three</option>
               <option value="4" <?php if (!(strcmp(4, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Four</option>
               <option value="5" <?php if (!(strcmp(5, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Five</option>
               <option value="6" <?php if (!(strcmp(6, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Six</option>
               <option value="7" <?php if (!(strcmp(7, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Seven</option>
               <option value="8" <?php if (!(strcmp(8, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Eight</option>
               <option value="9" <?php if (!(strcmp(9, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Nine</option>
               <option value="10" <?php if (!(strcmp(10, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Ten</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants nondependents1 name:</td>
             <td><input type="text" name="applicants_nondependents1_name" value="<?php echo htmlentities($row_userWfh['applicants_nondependents1_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants nondependents1 age:</td>
             <td><input type="text" name="applicants_nondependents1_age" value="<?php echo htmlentities($row_userWfh['applicants_nondependents1_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants nondependents1 cell number:</td>
             <td><input type="text" name="applicants_nondependents1_cell_number" value="<?php echo htmlentities($row_userWfh['applicants_nondependents1_cell_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants nondependents2 name:</td>
             <td><input type="text" name="applicants_nondependents2_name" value="<?php echo htmlentities($row_userWfh['applicants_nondependents2_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants nondependents2 age:</td>
             <td><input type="text" name="applicants_nondependents2_age" value="<?php echo htmlentities($row_userWfh['applicants_nondependents2_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicants nondependents2 cell number:</td>
             <td><input type="text" name="applicants_nondependents2_cell_number" value="<?php echo htmlentities($row_userWfh['applicants_nondependents2_cell_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Co applicants email address:</td>
             <td><input type="text" name="co_applicants_email_address" value="<?php echo htmlentities($row_userWfh['co_applicants_email_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant have a computer:</td>
             <td valign="baseline"><table>
               <tr>
                 <td><input type="radio" name="applicant_have_a_computer" value="Y" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_have_a_computer'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>>
                   Yes</td>
               </tr>
               <tr>
                 <td><input type="radio" name="applicant_have_a_computer" value="N" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_have_a_computer'], ENT_COMPAT, ''),"N"))) {echo "checked=\"checked\"";} ?>>
                   No</td>
               </tr>
             </table></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant level of cpu experience:</td>
             <td><select name="applicant_level_of_cpu_experience">
               <option value="1" <?php if (!(strcmp(1, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>1</option>
               <option value="2" <?php if (!(strcmp(2, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>2</option>
               <option value="2" <?php if (!(strcmp(2, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>3</option>
               <option value="4" <?php if (!(strcmp(4, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>4</option>
               <option value="5" <?php if (!(strcmp(5, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>5</option>
               <option value="6" <?php if (!(strcmp(6, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>6</option>
               <option value="7" <?php if (!(strcmp(7, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>7</option>
               <option value="8" <?php if (!(strcmp(8, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>8</option>
               <option value="9" <?php if (!(strcmp(9, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>9</option>
               <option value="10" <?php if (!(strcmp(10, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>10</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant acknowledge equal opportunity:</td>
             <td><input type="text" name="applicant_acknowledge_equal_opportunity" value="<?php echo htmlentities($row_userWfh['applicant_acknowledge_equal_opportunity'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant hereby authorize:</td>
             <td><input type="checkbox" name="applicant_hereby_authorize" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicant_hereby_authorize'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Equal credit opportunity act:</td>
             <td><input type="checkbox" name="equal_credit_opportunity_act" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['equal_credit_opportunity_act'], ENT_COMPAT, ''),""))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant authorization:</td>
             <td><input type="checkbox" name="applicant_authorization" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicant_authorization'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant authorization text:</td>
             <td><input type="text" name="applicant_authorization_text" value="<?php echo htmlentities($row_userWfh['applicant_authorization_text'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant digital signature:</td>
             <td><input type="text" name="applicant_digital_signature" value="<?php echo htmlentities($row_userWfh['applicant_digital_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Applicant digital signature date:</td>
             <td><input type="text" name="applicant_digital_signature_date" value="<?php echo htmlentities($row_userWfh['applicant_digital_signature_date'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Coapplicant digital signature:</td>
             <td><input type="text" name="coapplicant_digital_signature" value="<?php echo htmlentities($row_userWfh['coapplicant_digital_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Coapplicant digital signature date:</td>
             <td><input type="text" name="coapplicant_digital_signature_date" value="<?php echo htmlentities($row_userWfh['coapplicant_digital_signature_date'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">&nbsp;</td>
             <td><input type="submit" value="Update record"></td>
           </tr>
         </table>
         <input type="hidden" name="wfhuser_primary_did" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_did'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_primary_sid" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_sid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_primary_vid" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_vid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_primary_cid" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_cid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_primary_clid" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_clid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_tokenid" value="<?php echo htmlentities($row_userWfh['wfhuser_tokenid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="credit_app_type" value="<?php echo htmlentities($row_userWfh['credit_app_type'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="credit_app_source" value="<?php echo htmlentities($row_userWfh['credit_app_source'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="applicant_sales_souce_lot" value="<?php echo htmlentities($row_userWfh['applicant_sales_souce_lot'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_id" value="<?php echo $row_userWfh['wfhuser_id']; ?>">
         <input type="hidden" name="MM_update" value="usrProf_form">
       </form>
             




                              
								
                                
 


    <?php endif ?>


            
            
            
            
            

    
    
    
    
    
    
    
    
    
    
    
    
     
    <div class="clear"></div>


    <?php
mysqli_free_result($slctVehicle);
?>
    