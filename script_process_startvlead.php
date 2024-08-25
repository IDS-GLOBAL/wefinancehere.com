<?php require_once('db.php'); ?>
<?php



//		print_r($_POST);

if(isset($_POST['budget_afford'], $_POST['gross_monthlyincome'], $_POST['cust_creditapr'], $_POST['cust_creditapr_txt'], $_POST['wfhuserperm_token'], $_POST['wfhuser_id'], $_POST['wfhuser_approval_id'], $_POST['wfhuserperm_approval_fname'], $_POST['wfhuserperm_approval_lname'], $_POST['wfhuserperm_approval_email'], $_POST['wfhuserperm_approval_phone'], $_POST['wfhuserperm_fbid'], $_POST['wfhuserperm_timezone'], $_POST['cust_totalpayments'], $_POST['bigPrincipal'], $_POST['cust_downpayment'], $_POST['cust_desiredpymt'], $_POST['cust_desiredtermos'], $_POST['cust_car_loan'], $_POST['risk_factor_lvl'], $_POST['cust_dealer_id'], $_POST['cust_vehicle_id'], $_POST['cust_lead_source_id'], $_POST['cust_lead_source'], $_POST['cust_lead_token'], $_POST['cust_email'], $_POST['cust_phoneno'], $_POST['cust_phonetype'], $_POST['cust_phonetype_txt'], $_POST['cust_homephone'], $_POST['cust_mobilephone'], $_POST['cust_workphone'], $_POST['cust_fname'], $_POST['cust_lname'], $_POST['cust_employer_name'], $_POST['cust_employer_city'], $_POST['cust_employer_state'], $_POST['cust_employer_state_txt'], $_POST['cust_employer_zip'], $_POST['cust_employer_years'], $_POST['cust_employer_years_txt'], $_POST['cust_employer_months'], $_POST['cust_employer_months_txt'], $_POST['cust_gross_income'], $_POST['cust_gross_income_frequency'], $_POST['cust_gross_income_frequency_txt'], $_POST['cust_home_address'], $_POST['cust_home_city'], $_POST['cust_home_state'], $_POST['cust_home_state_txt'], $_POST['cust_home_zip'], $_POST['cust_home_county'], $_POST['cust_home_live_years'], $_POST['cust_home_live_years_txt'], $_POST['cust_home_live_months'], $_POST['cust_home_live_months_txt'], $_POST['tradeYear'], $_POST['tradeMake'], $_POST['tradeModel'], $_POST['tradeTrim'], $_POST['tradeMiles'], $_POST['counter_offer2'])):



$cust_dealer_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_dealer_id'])); 
$cust_vehicle_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vehicle_id']));

//$vdescript_txt;

$cust_lead_source_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_source_id'])); 
$cust_lead_source = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_source'])); 
$cust_lead_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_token'])); 
$cust_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_email'])); 
$cust_phoneno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_phoneno'])); 
$cust_phonetype = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_phonetype'])); 
$cust_phonetype_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_phonetype_txt'])); 
$cust_homephone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_homephone'])); 
$cust_mobilephone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_mobilephone'])); 
$cust_workphone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_workphone'])); 
$cust_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_fname'])); 
$cust_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lname'])); 
$cust_employer_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_name'])); 
$cust_employer_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_city'])); 
$cust_employer_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_state'])); 
$cust_employer_state_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_state_txt'])); 
$cust_employer_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_zip'])); 
$cust_employer_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_years'])); 
$cust_employer_years_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_years_txt'])); 
$cust_employer_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_months'])); 
$cust_employer_months_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_months_txt'])); 
$cust_gross_income = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_gross_income'])); 
$cust_gross_income_frequency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_gross_income_frequency'])); 
$cust_gross_income_frequency_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_gross_income_frequency_txt'])); 
$cust_home_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_address'])); 
$cust_home_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_city'])); 
$cust_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_state'])); 
$cust_home_state_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_state_txt'])); 
$cust_home_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_zip'])); 
$cust_home_county = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_county'])); 
$cust_home_live_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_live_years'])); 
$cust_home_live_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_live_months'])); 
$tradeYear = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeYear'])); 
$tradeMake = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeMake'])); 
$tradeModel = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeModel'])); 
$tradeTrim =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeTrim'])); 
$tradeMiles =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeMiles'])); 
$counter_offer2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['counter_offer2'])); 

$wfhuserperm_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_token']));
$wfhuser_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuser_id'])); 

$wfhuser_approval_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuser_approval_id']));
$wfhuserperm_approval_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_fname']));
$wfhuserperm_approval_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_lname']));
$wfhuserperm_approval_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_email']));
$wfhuserperm_approval_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_approval_phone']));
$fbid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_fbid']));
$wfhuserperm_timezone = $_POST['wfhuserperm_timezone'];


$budget_afford = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['budget_afford']));
$gross_monthlyincome = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['gross_monthlyincome']));


// The value we used on finding the vehicle selling price
// Customers
	$bigPrincipal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['bigPrincipal']));
	//$vrprice = $row_find_vehicle['vrprice'];
	//$vdprice = $row_find_vehicle['vdprice'];

	$cust_downpayment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_downpayment']));
	$cust_desiredpymt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_desiredpymt']));
	
	$cust_creditapr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_creditapr']));
	$cust_creditapr_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_creditapr_txt']));
	
	$cust_totalpayments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_totalpayments']));
	
	
	$cust_desiredtermos = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_desiredtermos']));
	
	
	$cust_car_loan = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_car_loan']));
	
	$risk_factor_lvl = $_POST['risk_factor_lvl'];
	
	if($risk_factor_lvl == 1){
	 $wfhuserperm_ourrank = 'A';
	}elseif($risk_factor_lvl == 2){
	 $wfhuserperm_ourrank = 'B';
	}elseif($risk_factor_lvl == 3){
	 $wfhuserperm_ourrank = 'C';
	}elseif($risk_factor_lvl == 4){
	 $wfhuserperm_ourrank = 'D';
	}elseif($risk_factor_lvl == 5){
	 $wfhuserperm_ourrank = 'E';
	}elseif($risk_factor_lvl == 6){
	 $wfhuserperm_ourrank = 'F';
	}


// Running Dealer Settings
$dealmatrix_settings = 0;

if(isset($row_find_vehicle['settingDefaultTerm'], $row_find_vehicle['settingDefaultAPR'], $row_find_vehicle['settingDocDlvryFee'], $row_find_vehicle['settingTitleFee'], $row_find_vehicle['settingStateInspectnFee'])){

	$dealmatrix_settings = 1;

}



	if($risk_factor_lvl == 1){
		
		if($vcondition == 'used' || $vcondition == 'Used'){
	 	 if(isset($usedmatrixcredit_vgoodcredit)){
			if($cust_creditapr < $usedmatrixcredit_vgoodcredit){
			   $cust_creditapr = $usedmatrixcredit_vgoodcredit;
			}
	 	 }
		}elseif($vcondition == 'New'){
	 	 if(isset($newmatrixcredit_vgoodcredit)){
			if($cust_creditapr < $newmatrixcredit_vgoodcredit){
			   $cust_creditapr = $newmatrixcredit_vgoodcredit;
			}
		 }
		}
	}elseif($risk_factor_lvl == 2){
		
		if($vcondition == 'used' || $vcondition == 'Used'){
	     if(isset($usedmatrixcredit_jgoodcredit)){
			if($cust_creditapr < $usedmatrixcredit_jgoodcredit){
			   $cust_creditapr = $usedmatrixcredit_jgoodcredit;
			}
		 }
		}elseif($vcondition == 'New'){
	     if(isset($newmatrixcredit_jgoodcredit)){
			if($cust_creditapr < $newmatrixcredit_jgoodcredit){
			   $cust_creditapr = $newmatrixcredit_jgoodcredit;
			}
		 }
		}


	}elseif($risk_factor_lvl == 3){


		if($vcondition == 'used' || $vcondition == 'Used'){
	     if(isset($usedmatrixcredit_faircredit)){
			if($cust_creditapr < $usedmatrixcredit_faircredit){
				$cust_creditapr = $usedmatrixcredit_faircredit;
			}
		 }
		}elseif($vcondition == 'New'){
	     if(isset($newmatrixcredit_faircredit)){
			if($cust_creditapr < $newmatrixcredit_faircredit){
				$cust_creditapr = $newmatrixcredit_faircredit;
			}
		 }
		}


	}elseif($risk_factor_lvl == 4){


		if($vcondition == 'used' || $vcondition == 'Used'){
	     if(isset($usedmatrixcredit_poorcredit)){
			if($cust_creditapr < $usedmatrixcredit_poorcredit){
			   $cust_creditapr = $usedmatrixcredit_poorcredit;
			}
		 }
		}elseif($vcondition == 'New'){
	     if(isset($newmatrixcredit_poorcredit)){
			if($cust_creditapr < $newmatrixcredit_poorcredit){
			   $cust_creditapr = $newmatrixcredit_poorcredit;
			}
		 }
		}


	}elseif($risk_factor_lvl == 5){




		if($vcondition == 'used' || $vcondition == 'Used'){
	     if(isset($usedmatrixcredit_subprime)){
			if($cust_creditapr < $usedmatrixcredit_subprime){
			   $cust_creditapr = $usedmatrixcredit_subprime;
			}
		 }
		}elseif($vcondition == 'New'){
	     if(isset($newmatrixcredit_subprime)){
			if($cust_creditapr < $newmatrixcredit_subprime){
			   $cust_creditapr = $newmatrixcredit_subprime;
			}
		 }
		}






	}elseif($risk_factor_lvl == 6){




		if($vcondition == 'used' || $vcondition == 'Used'){
	     if(isset($usedmatrixcredit_unknown)){
			if($cust_creditapr < $usedmatrixcredit_unknown){
			   $cust_creditapr = $usedmatrixcredit_unknown;
			}
		 }
		}elseif($vcondition == 'New'){
	     if(isset($newmatrixcredit_unknown)){
			if($cust_creditapr < $newmatrixcredit_unknown){
			   $cust_creditapr = $newmatrixcredit_unknown;
			}
		 }
		}





	}
	




    $vrprice = $row_find_vehicle['vrprice'];
	if(isset($row_find_vehicle['vrprice'])){
		if (is_numeric($vrprice)) {
			//  http://php.net/manual/en/function.is-int.php
			$VPrice_missing = (int)0;
			$VPrice = intval(preg_replace('/[^0-9]+/', '', $vrprice), 10);
		} else {
			$VPrice_missing = (int)1;
			$VPrice = (int)$row_find_vehicle['vrprice'];
		}
	}
    $vspecialprice = $row_find_vehicle['vspecialprice'];
	if(isset($row_find_vehicle['vspecialprice'])){

		if (is_numeric($vspecialprice)) {
			//echo "'{$element}' is numeric", PHP_EOL;
			$VSPrice = intval(preg_replace('/[^0-9]+/', '', $vspecialprice), 10);
			$VSPrice_missing = (int)0;
		} else {
			$VSPrice = $row_find_vehicle['vspecialprice'];
			$VSPrice_missing = (int)1;
		}
		if($VSPrice_missing != 1){
			if($VPrice < $VSPrice){
			   $VPrice = $VSPrice;
			}
		}

	}
	$VPrice = number_format($VPrice, 2);

	if(isset($row_find_vehicle['vpurchasecost'])){ 
		if (is_numeric($vspecialprice)) {

			$vpurchasecost_aval = 1;
			$vpurchasecost = $row_find_vehicle['vpurchasecost'];
			$vpurchasecost = preg_replace('/[^0-9]+/', '', $vpurchasecost);
		}else{
			$vpurchasecost_aval = 0;
			$vpurchasecost = $row_find_vehicle['vpurchasecost'];
		}
		
	}else{
			$vpurchasecost_aval = 0;
			$vpurchasecost = $row_find_vehicle['vpurchasecost'];
		
	}

		 
	if(isset($row_find_vehicle['settingSateSlsTax'])){
		$sales_tax = $row_find_vehicle['settingSateSlsTax'];
	}else{	
		$sales_tax = 6.0;
	}
	
	if($row_find_vehicle['state'] == 'GA'){
		
		$noTaxes = 'N';
		
		
	}else{
		
		$noTaxes = 'Y';		
	}


	$taxFormatCombined = $VPrice + $settingDocDlvryFee;
	
	$fullsalesTax = ($taxFormatCombined / 100) * $sales_tax;
	
	$newfullsalesTax = number_format($fullsalesTax, 2);

	if($noTaxes = 'N'){ 
		if(isset($row_find_vehicle['vadvalorem_tax'])){
			
			$newfullsalesTax = $row_find_vehicle['vadvalorem_tax'];
		}else{

			//$newfullsalesTax = 0.00;
		}
	}

	$dealer_fees = ($settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
	$dealer_fees = number_format($dealer_fees, 2);
	
	$addedUp = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
	
	//$amountTofinance = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
	$amountTofinance = $addedUp;
	
	$calcPmt = calcPmt($amountTofinance, $cust_creditapr, $settingDefaultTerm);
	
	//To Use For display so We Format but not before cal payment.
	$newamountTofinance = number_format($amountTofinance, 2);
	
	$totalPayments = $calcPmt * $settingDefaultTerm;
	//$totalPayments = number_format($totalPayments, 2);

	$financeCharges = ($totalPayments - $amountTofinance);

	$minimum_fprofit = number_format($row_find_vehicle['usedmatrixcredit_fminimumprofit'], 2);
	$minimum_bprofit = number_format($row_find_vehicle['usedmatrixcredit_bminimumprofit'], 2);

	$frontend_profit = $VSPrice - $vpurchasecost;
	$frontend_profit = number_format($frontend_profit, 2);

	$backend_profit = number_format($financeCharges, 2);









// Benjamins Defined Values

$credit_app_source = 'WeFinanceHere.com Vehicle';
$vmodel = mysql_real_escape_string(trim($row_find_vehicle['vmodel']));
$vtrim = mysql_real_escape_string(trim($row_find_vehicle['vtrim']));
$vdescript_txt = mysql_real_escape_string(trim($vdescript_txt));



$vLeinHolderNm = 'WeFinanceHere.com LLC';
$vLeinHolderAddr = 'NA';
$vLeinHolderCity = 'McDonough GA';
$vLeinHolderState = 'GA';
$vLeinHolderZip = '30253';
$vLeinHolderLeinNo = '3227197';
$vLeinHolderPhnNo = '(404) 565-4371';

$loanProcessingFee = 125.00;
$VSIFEE = 0.00;

if($noTaxes == 'Y'){  $tavt_fee_required = 1;  }else{  $tavt_fee_required = 0; }



//Check Existing WFH USER BY EMAIl / FACEBOOK ID  / Register Profile SEND EMAIL Verify Link



//Pull Existing User Appointment With Dealer






//Pull Next Credit Application Number

$app_deal_number = '';

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_howmany_creditapps = "SELECT `credit_app_fullblown_id`, `credit_app_locked`, `app_number`, `app_deal_number`, `app_deal_id`, `applicant_did` FROM `credit_app_fullblown` WHERE `applicant_did` = '$vdid' ORDER BY `app_number` DESC LIMIT 2";
$howmany_creditapps = mysqli_query($idsconnection_mysqli, $query_howmany_creditapps);
$row_howmany_creditapps = mysqli_fetch_assoc($howmany_creditapps);
$totalRows_howmany_creditapps = mysqli_num_rows($howmany_creditapps);

$app_number = $row_howmany_creditapps['app_number'];

if($totalRows_howmany_creditapps == 0 || !$app_number){$app_number = '1000'; }else{ $app_number = $app_number++; }



//Pull Next DEAL Number
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_last_deal_number = "SELECT `deal_id`, `deal_token`, `deal_number` FROM `deals_bydealer` WHERE `deals_bydealer`.`deal_dealerID` = '$vdid' ORDER BY `deal_number` DESC LIMIT 2";
$last_deal_number = mysqli_query($idsconnection_mysqli, $query_last_deal_number);
$row_last_deal_number = mysqli_fetch_assoc($last_deal_number);
$totalRows_last_deal_number = mysqli_num_rows($last_deal_number);

 	$deal_number = $row_last_deal_number['deal_number'];

	if(!$deal_number) {
		
		$deal_number = '1000';
		
	}else{
		
	 	$deal_number = $deal_number++;
	}

//Pull Next Customer Number
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_howmany_customers = "SELECT `customer_id`, `customer_no`, `customer_dealer_id` FROM `customers` WHERE `customer_dealer_id` = '$vdid' ORDER BY `customer_no` DESC LIMIT 2";
$howmany_customers = mysqli_query($idsconnection_mysqli, $query_howmany_customers);
$row_howmany_customers = mysqli_fetch_assoc($howmany_customers);
$totalRows_howmany_customers = mysqli_num_rows($howmany_customers);

$customer_no = $row_howmany_customers['customer_no'];

if(!$customer_no){

	$customer_no = 1000;
	
}else{
	
	$customer_no = $customer_no++;
}


//Pull Existing Dealer WFH LEAD
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_cust_lead = "SELECT * FROM `cust_leads` WHERE `wfhuser_id` = '$wfhuser_id' AND `cust_dealer_id` = '$vdid' AND `cust_vehicle_id` = '$vid'";
$find_cust_lead = mysqli_query($idsconnection_mysqli, $query_find_cust_lead);
$row_find_cust_lead = mysqli_fetch_assoc($find_cust_lead);
$totalRows_find_cust_lead = mysqli_num_rows($find_cust_lead);
$wfh_lead_id = $row_find_cust_lead['cust_leadid'];

//Pull Existing Dealer WFH Permissions
mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_wfhuser_approvals_perms = "SELECT * FROM 
`wfhuser_approvals_perms`, `wfhuser_approvals`
WHERE
 `wfhuser_approvals`.`wfhuser_approval_id` = `wfhuser_approvals_perms`.`wfhuserperm_approval_id`
AND
 `wfhuser_approvals_perms`.`wfhuserperm_did` = '$vdid'
 AND
 `wfhuser_approvals_perms`.`wfhuserperm_vehicle_id` = '$vid'
 AND
 `wfhuser_approvals_perms`.`wfhuserperm_wfhuser_id` = '$wfhuser_id'
ORDER BY `wfhuserperm_id` ASC";
$wfhuser_approvals_perms = mysqli_query($idsconnection_mysqli, $query_wfhuser_approvals_perms, $wfh_connection);
$row_wfhuser_approvals_perms = mysqli_fetch_assoc($wfhuser_approvals_perms);
$totalRows_wfhuser_approvals_perms = mysqli_num_rows($wfhuser_approvals_perms);
$wfhuserperm_id = $row_wfhuser_approvals_perms['wfhuserperm_id'];
$wfhuserperm_approval_id = $row_wfhuser_approvals_perms['wfhuserperm_approval_id'];
$wfhuserperm_appointment_id = $row_wfhuser_approvals_perms['wfhuserperm_appointment_id'];
$dlr_appt_id = $row_wfhuser_approvals_perms['wfhuserperm_appointment_id'];

//Pull Existing Dealer WFH Dealer Package

$wfh_did_deal_package_id = $row_find_vehicle['wfh_did_deal_package_id'];
$wfh_did_deal_package_code = $row_find_vehicle['wfh_did_deal_package_code'];


//Pull Existing Credit Application Info
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_findexisting_creditapps = "SELECT `credit_app_fullblown_id`, `credit_app_locked`, `app_number`, `app_deal_number`, `app_deal_id`, `applicant_did` FROM `credit_app_fullblown` WHERE `applicant_did` = '$vdid' AND `applicant_email_address` = '$wfhuser_email_address' AND `applicant_app_token` = '$cookie' AND `applicant_vid` = '$vid' ORDER BY `app_number` DESC LIMIT 2";
$findexisting_creditapps = mysqli_query($idsconnection_mysqli, $query_findexisting_creditapps);
$row_findexisting_creditapps = mysqli_fetch_assoc($findexisting_creditapps);
$totalRows_findexisting_creditapps = mysqli_num_rows($findexisting_creditapps);
$credit_app_fullblown_id = $row_findexisting_creditapps['credit_app_fullblown_id'];



//Pull Existing Deal Info
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_existing_wfhbookeddeal = "SELECT `deal_id`, `deal_token`, `credit_app_id` FROM `deals_bydealer` WHERE `deals_bydealer`.`deal_dealerID` = '$vdid' AND `credit_app_id` = '$credit_app_fullblown_id'  ORDER BY `deal_number` DESC";
$find_existing_wfhbookeddeal = mysqli_query($idsconnection_mysqli, $query_find_existing_wfhbookeddeal);
$row_find_existing_wfhbookeddeal = mysqli_fetch_assoc($find_existing_wfhbookeddeal);
$totalRows_find_existing_wfhbookeddeal = mysqli_num_rows($find_existing_wfhbookeddeal);
$wfh_deal_id = $row_find_existing_wfhbookeddeal['deal_id'];




//Pull Existing Customer Information
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_existing_customer = "SELECT * FROM `customers` WHERE `customers`.`customer_email` = '$cust_email' AND `customers`.`customer_dealer_id` = '$vdid' ";
$find_existing_customer = mysqli_query($idsconnection_mysqli, $query_find_existing_customer);
$row_find_existing_customer = mysqli_fetch_assoc($find_existing_customer);
$totalRows_find_existing_customer = mysqli_num_rows($find_existing_customer);

$customer_id = $row_find_existing_customer['customer_id'];

//Check If Facbook ID If Exist run A Real ID Report























//Pull Existing Dealer Appointment








$appt_url_goto = 'https://idscrm.com/dealers/deals.php';


$dlr_appt_startunixtime = date('Y-m-d h:i:s', strtotime($_POST['unixtime_stapappoint_start'].'+2 days'));

$dlr_appt_endunixtime = date('Y-m-d h:i:s', strtotime($dlr_appt_startunixtime.'+2 hour'));

$dlr_appt_startunixtime_milli = strtotime($_POST['unixtime_stapappoint_start'].'+2 days');

$dlr_appt_endunixtime_milli =  strtotime($time_now.'+2 hour');

$wfhuserperm_appointment_humanread_start = date('d/m/Y/ h:i', strtotime($_POST['unixtime_stapappoint_start'].'+2 days'));

$wfhuserperm_appointment_humanread_end = date('d/m/Y/ h:i', strtotime($dlr_appt_startunixtime.'+2 hour'));

$app_clicked = $_POST['appt_changed_q'];


$dlr_appt_title = "WFH Appointment On $dlr_appt_startunixtime";
$dlr_appt_notes= "
These are just notes for now.
";

$wfhuserperm_ourrank = '';

echo '<br />'.'<br />';


	
	echo $create_approval_perms_sql = "INSERT INTO `idsids_idsdms`.`wfhuser_approvals_perms` SET
			`wfhuserperm_did` = '$vdid',
			`wfhuserperm_token` = '$cookie',
			`wfhuserperm_wfhuser_id` = '$wfhuser_id',
			`wfhuserperm_approval_id` = '0',
			`wfhuserperm_budget_affordable` = '$app_clicked',
			`wfhuserperm_vehicle_id` = '$vid',
			`wfhuserperm_approval_fname` = '$cust_fname',
			`wfhuserperm_approval_lname` = '$cust_lname',
			`wfhuserperm_approval_email` = '$cust_email',
			`wfhuserperm_approval_phone` = '$cust_mobilephone',
			`wfhuserperm_approval_risk_factor_lvl` = '$risk_factor_lvl',
			`wfhuserperm_fbid` = '$fbid',
			`wfhuserperm_ip` = '$ip',
			`wfhuserperm_browser` = '$browser',
			`wfhuserperm_ourrank` = '$wfhuserperm_ourrank',
			`wfhuserperm_okay_perm` = 'Y',
			`wfhuserperm_when_date` = '$timevar',
			`wfhuserperm_appointment_id` = '$wfhuserperm_appointment_id',
			`wfhuserperm_appointment_startunixtime` = '$dlr_appt_startunixtime',
			`wfhuserperm_appointment_endunixtime` = '$dlr_appt_endunixtime',
			`wfhuserperm_appointment_timezone` = '$wfhuserperm_timezone',
			`wfhdelrperm_appointment_timezone` = '$dealerTimezone',
			`wfhuserperm_appointment_humanread_start` = '$wfhuserperm_appointment_humanread_start'
			`wfhuserperm_appointment_humanread_end` = '$wfhuserperm_appointment_humanread_end',
			`wfhuserperm_appointment_status` = '$app_clicked',
			`wfhuserperm_appointment_user_status` = '$wfhuser_status',
			`wfhdelrperm_appointment_dealer_status` = '$wfh_dealer_status',
			`wfhdelrperm_leadpackage_code` = '$wfh_did_deal_package_code',
			`wfhdelrperm_cost` = '125.00',
			`wfhdelrperm_charged` = 'N'
									";


	echo $update_approval_perms_sql = "UPDATE `idsids_idsdms`.`wfhuser_approvals_perms` SET
			`wfhuserperm_did` = '$vdid',
			`wfhuserperm_token` = '$cookie',
			`wfhuserperm_wfhuser_id` = '$wfhuser_id',
			`wfhuserperm_approval_id` = '0',
			`wfhuserperm_budget_affordable` = '$app_clicked',
			`wfhuserperm_vehicle_id` = '$vid',
			`wfhuserperm_approval_fname` = '$cust_fname',
			`wfhuserperm_approval_lname` = '$cust_lname',
			`wfhuserperm_approval_email` = '$cust_email',
			`wfhuserperm_approval_phone` = '$cust_mobilephone',
			`wfhuserperm_approval_risk_factor_lvl` = '$risk_factor_lvl',
			`wfhuserperm_fbid` = '$fbid',
			`wfhuserperm_ip` = '$ip',
			`wfhuserperm_browser` = '$browser',
			`wfhuserperm_ourrank` = '$wfhuserperm_ourrank',
			`wfhuserperm_okay_perm` = 'Y',
			`wfhuserperm_when_date` = '$timevar',
			`wfhuserperm_appointment_id` = '$wfhuserperm_appointment_id',
			`wfhuserperm_appointment_startunixtime` = '$dlr_appt_startunixtime',
			`wfhuserperm_appointment_endunixtime` = '$dlr_appt_endunixtime',
			`wfhuserperm_appointment_timezone` = '$wfhuserperm_timezone',
			`wfhdelrperm_appointment_timezone` = '$dealerTimezone',
			`wfhuserperm_appointment_humanread_start` = '$wfhuserperm_appointment_humanread_start'
			`wfhuserperm_appointment_humanread_end` = '$wfhuserperm_appointment_humanread_end',
			`wfhuserperm_appointment_status` = '$app_clicked',
			`wfhuserperm_appointment_user_status` = '$wfhuser_status',
			`wfhdelrperm_appointment_dealer_status` = '$wfh_dealer_status',
			`wfhdelrperm_leadpackage_code` = '$wfh_did_deal_package_code',
			`wfhdelrperm_cost` = '125.00',
			`wfhdelrperm_charged` = 'N'
				WHERE
				`wfhuser_approvals_perms`.`wfhuserperm_id` = '$wfhuserperm_id'
									";





	echo $create_new_system_appt_sql = "INSERT INTO `idsids_idsdms`.`dealers_appointments` SET
										`dlr_appt_creditapp_id` = '$credit_app_fullblown_id',
										`dlr_appt_lead_id` = '$wfh_lead_id',
										`dlr_appt_token` = '$cookie',
										`dlr_appt_passtime` = '0',
										`dlr_appt_robot_sendemail` = '$app_clicked',
										`dlr_appt_did` = '$vdid',
										`dlr_appt_vid` = '$vid',
										`dlr_appt_vid_descrp` = '$vdescript_txt',
										`dlr_appt_task_id` = '',
										`dlr_appt_task_action_id` = '',
										`dlr_appt_title` = '$dlr_appt_title',
										`dlr_appt_notes` = '$dlr_appt_notes',
										`appt_url_goto` = '$appt_url_goto',
										`dlr_appt_dlrtimezone` = '$dealerTimezone',
										`dlr_appt_startunixtime` = '$dlr_appt_startunixtime',
										`dlr_appt_endunixtime` = '$dlr_appt_endunixtime',
										`dlr_appt_startunixtime_milli` = '$dlr_appt_startunixtime_milli',
										`dlr_appt_endunixtime_milli` = '$dlr_appt_endunixtime_milli'
									";

	$update_new_system_appt_sql = "UPDATE `idsids_idsdms`.`dealers_appointments` SET
										`dlr_appt_creditapp_id` = '$credit_app_fullblown_id',
										`dlr_appt_lead_id` = '$wfh_lead_id ',
										`dlr_appt_token` = '$cookie',
										`dlr_appt_passtime` = '0',
										`dlr_appt_robot_sendemail` = '$app_clicked',
										`dlr_appt_did` = '$vdid',
										`dlr_appt_vid` = '$vid',
										`dlr_appt_vid_descrp` = '$vdescript_txt',
										`dlr_appt_task_id` = '',
										`dlr_appt_task_action_id` = '',
										`dlr_appt_title` = '$dlr_appt_title',
										`dlr_appt_notes` = '$dlr_appt_notes',
										`appt_url_goto` = '$appt_url_goto',
										`dlr_appt_dlrtimezone` = '$dealerTimezone',
										`dlr_appt_startunixtime` = '$dlr_appt_startunixtime',
										`dlr_appt_endunixtime` = '$dlr_appt_endunixtime',
										`dlr_appt_startunixtime_milli` = '$dlr_appt_startunixtime_milli',
										`dlr_appt_endunixtime_milli` = '$dlr_appt_endunixtime_milli'
										WHERE
										`dlr_app_id` = '$wfhuserperm_approval_id'
									";









echo '<br />'.'<br />';

echo $query_insert_wfh_lead_sql ="
INSERT INTO `idsids_idsdms`.`cust_leads` SET
						`wfhcookiesesid` = '$cookie',
						`cust_lead_ip` = '$ip',
						`cust_lead_broswer` = '$browser',
						`cust_lead_mobile` = '$mobiledevice',
						`fbid` = '$fbid',
						`wfhuser_id` = '$wfhuser_id',
						`bigPrincipal` = '$bigPrincipal',
						`cust_totalpayments` = '$cust_totalpayments',
						`cust_seenbydlr` = '0',
						`cust_dealer_id` = '$cust_dealer_id',
						`cust_vehicle_id` = '$cust_vehicle_id',
						`cust_lead_source_id` = '4',
						`cust_lead_source` = 'wefinancehere.com',
						`cust_lead_token` = '$cust_lead_token',
						`cust_email` = '$cust_email',
						`cust_phoneno` = '$cust_phoneno',
						`cust_phonetype` = '$cust_phonetype',
						`cust_homephone` = '$cust_homephone',
						`cust_mobilephone` = '$cust_mobilephone',
						`cust_workphone` = '$cust_workphone',
						`cust_fname` = '$cust_fname',
						`cust_lname` = '$cust_lname',
						`cust_home_address` = '$cust_home_address', 
						`cust_home_city` = '$cust_home_city', 
						`cust_home_state` = '$cust_home_state',
						`cust_home_zip` = '$cust_home_zip', 
						`cust_home_county` = '$cust_home_county', 
						`cust_home_live_years` = '$cust_home_live_years',
						`cust_home_live_months` = '$cust_home_live_months',
						`cust_employer_name` = '$cust_employer_name', 
						`cust_employer_city` = '$cust_employer_city', 
						`cust_employer_state` = '$cust_employer_state',
						`cust_employer_zip` = '$cust_employer_zip', 
						`cust_employer_years` = '$cust_employer_years',
						`cust_employer_months` = '$cust_employer_months',
						`cust_gross_income` = '$cust_gross_income', 
						`cust_gross_income_frequency` = '$cust_gross_income_frequency',
						`cust_creditaprtxt` = '$cust_creditapr_txt',
						`cust_creditapr` = '$cust_creditapr',
						`cust_downpayment` = '$cust_downpayment',
						`cust_desiredpymt` = '$cust_desiredpymt',
						`cust_desiredtermos` = '$cust_desiredtermos',
						`cust_car_loan` = '$cust_car_loan',
						`cust_vstockno` = '$vstockno',
						`cust_vyear` = '$vyear',
						`cust_vmake` = '$vmake',
						`cust_vmodel` = '$vmodel',
						`cust_vtrim` = '$vtrim',
						`cust_vbody` = '$vbody',
						`cust_vmiles` = '$vmileage',
						`cust_vsellingprice` = '$vrprice',
						`tradeYear` = '$tradeYear',
						`tradeMake` = '$tradeMake',
						`tradeModel` = '$tradeModel',
						`tradeTrim` = '$tradeTrim', 
						`tradeMiles` = '$tradeMiles', 
						`counter_offer2` = '$counter_offer2'
";

$query_update_wfh_lead_sql ="
INSERT INTO `idsids_idsdms`.`cust_leads` SET
						`wfhcookiesesid` = '$cookie',
						`cust_lead_ip` = '$ip',
						`cust_lead_broswer` = '$browser',
						`cust_lead_mobile` = '$mobiledevice',
						`fbid` = '$fbid',
						`wfhuser_id` = '$wfhuser_id',
						`bigPrincipal` = '$bigPrincipal',
						`cust_totalpayments` = '$cust_totalpayments',
						`cust_seenbydlr` = '0',
						`cust_dealer_id` = '$cust_dealer_id',
						`cust_vehicle_id` = '$cust_vehicle_id',
						`cust_lead_source_id` = '4',
						`cust_lead_source` = 'wefinancehere.com',
						`cust_lead_token` = '$cust_lead_token',
						`cust_email` = '$cust_email',
						`cust_phoneno` = '$cust_phoneno',
						`cust_phonetype` = '$cust_phonetype',
						`cust_homephone` = '$cust_homephone',
						`cust_mobilephone` = '$cust_mobilephone',
						`cust_workphone` = '$cust_workphone',
						`cust_fname` = '$cust_fname',
						`cust_lname` = '$cust_lname',
						`cust_home_address` = '$cust_home_address', 
						`cust_home_city` = '$cust_home_city', 
						`cust_home_state` = '$cust_home_state',
						`cust_home_zip` = '$cust_home_zip', 
						`cust_home_county` = '$cust_home_county', 
						`cust_home_live_years` = '$cust_home_live_years',
						`cust_home_live_months` = '$cust_home_live_months',
						`cust_employer_name` = '$cust_employer_name', 
						`cust_employer_city` = '$cust_employer_city', 
						`cust_employer_state` = '$cust_employer_state',
						`cust_employer_zip` = '$cust_employer_zip', 
						`cust_employer_years` = '$cust_employer_years',
						`cust_employer_months` = '$cust_employer_months',
						`cust_gross_income` = '$cust_gross_income', 
						`cust_gross_income_frequency` = '$cust_gross_income_frequency',
						`cust_creditaprtxt` = '$cust_creditapr_txt',
						`cust_creditapr` = '$cust_creditapr',
						`cust_downpayment` = '$cust_downpayment',
						`cust_desiredpymt` = '$cust_desiredpymt',
						`cust_desiredtermos` = '$cust_desiredtermos',
						`cust_car_loan` = '$cust_car_loan',
						`cust_vstockno` = '$vstockno',
						`cust_vyear` = '$vyear',
						`cust_vmake` = '$vmake',
						`cust_vmodel` = '$vmodel',
						`cust_vtrim` = '$vtrim',
						`cust_vbody` = '$vbody',
						`cust_vmiles` = '$vmileage',
						`cust_vsellingprice` = '$vrprice',
						`tradeYear` = '$tradeYear',
						`tradeMake` = '$tradeMake',
						`tradeModel` = '$tradeModel',
						`tradeTrim` = '$tradeTrim', 
						`tradeMiles` = '$tradeMiles', 
						`counter_offer2` = '$counter_offer2'
						WHERE
						`cust_leadid` = '$wfh_lead_id'
";





	$applicant_titlename = $row_find_existingwfhuserprofile_email['applicant_titlename'];
	$applicant_ssn = $row_find_existingwfhuserprofile_email['applicant_ssn'];
	$applicant_dob = $row_find_existingwfhuserprofile_email['applicant_dob'];
	$applicant_driver_state_issued = $row_find_existingwfhuserprofile_email['applicant_driver_state_issued'];
	$applicant_driver_licenses_number = $row_find_existingwfhuserprofile_email['applicant_driver_licenses_number'];
	$applicant_driver_licenses_expdate = $row_find_existingwfhuserprofile_email['applicant_driver_licenses_expdate'];
	$wfhuser_vInsurCompState = $row_find_existingwfhuserprofile_email['wfhuser_vInsurCompState'];
	$wfhuser_vInsurCompZip = $row_find_existingwfhuserprofile_email['wfhuser_vInsurCompZip'];
	
	$applicant_addr_landlord_mortg = $row_find_existingwfhuserprofile_email['applicant_addr_landlord_mortg'];
	$applicant_addr_landlord_address = $row_find_existingwfhuserprofile_email['applicant_addr_landlord_address'];
	$applicant_addr_landlord_city = $row_find_existingwfhuserprofile_email['applicant_addr_landlord_city'];
	$applicant_addr_landlord_state = $row_find_existingwfhuserprofile_email['applicant_addr_landlord_state'];
	$applicant_addr_landlord_zip = $row_find_existingwfhuserprofile_email['applicant_addr_landlord_zip'];
	$applicant_addr_landlord_phone = $row_find_existingwfhuserprofile_email['applicant_addr_landlord_phone'];
	$applicant_name_oncurrent_lease = $row_find_existingwfhuserprofile_email['applicant_name_oncurrent_lease'];
	$applicant_apart_or_house = $row_find_existingwfhuserprofile_email['applicant_apart_or_house'];
	$applicant_buy_own_rent_other = $row_find_existingwfhuserprofile_email['applicant_buy_own_rent_other'];
	$applicant_house_payment = $row_find_existingwfhuserprofile_email['applicant_house_payment'];
	$applicant_previous1_addr1 = $row_find_existingwfhuserprofile_email['applicant_previous1_addr1'];
	$applicant_previous1_addr2 = $row_find_existingwfhuserprofile_email['applicant_previous1_addr2'];
	$applicant_previous1_addr_city = $row_find_existingwfhuserprofile_email['applicant_previous1_addr_city'];
	$applicant_previous1_addr_state = $row_find_existingwfhuserprofile_email['applicant_previous1_addr_state'];
	$applicant_previous1_addr_zip = $row_find_existingwfhuserprofile_email['applicant_previous1_addr_zip'];
	$applicant_previous1_addr_county = $row_find_existingwfhuserprofile_email['applicant_previous1_addr_county'];
	$applicant_previous1_live_years = $row_find_existingwfhuserprofile_email['applicant_previous1_live_years'];
	$applicant_previous1_live_months = $row_find_existingwfhuserprofile_email['applicant_previous1_live_months'];
	$applicant_previous1_landlord_name = $row_find_existingwfhuserprofile_email['applicant_previous1_landlord_name'];
	$applicant_previous1_landlord_phone = $row_find_existingwfhuserprofile_email['applicant_previous1_landlord_phone'];
	$applicant_previous2_addr1 = $row_find_existingwfhuserprofile_email['applicant_previous2_addr1'];

	$applicant_previous2_addr2 = $row_find_existingwfhuserprofile_email['applicant_previous2_addr2'];

	$applicant_previous2_addr_city = $row_find_existingwfhuserprofile_email['applicant_previous2_addr_city'];
	$applicant_previous2_addr_state = $row_find_existingwfhuserprofile_email['applicant_previous2_addr_state'];
	$applicant_previous2_addr_zip = $row_find_existingwfhuserprofile_email['applicant_previous2_addr_zip'];
	$applicant_previous1_moveindate = $row_find_existingwfhuserprofile_email['applicant_previous1_moveindate'];
	$applicant_previous2_live_years = $row_find_existingwfhuserprofile_email['applicant_previous2_live_years'];
	$applicant_previous2_live_months = $row_find_existingwfhuserprofile_email['applicant_previous2_live_months'];
	$applicant_previous2_landlord_name = $row_find_existingwfhuserprofile_email['applicant_previous2_landlord_name'];
	$applicant_previous2_landlord_phone = $row_find_existingwfhuserprofile_email['applicant_previous2_landlord_phone'];
	$applicant_previous3_addr1 = $row_find_existingwfhuserprofile_email['applicant_previous3_addr1'];
	$applicant_previous3_addr2 = $row_find_existingwfhuserprofile_email['applicant_previous3_addr2'];
	$applicant_previous3_addr_city = $row_find_existingwfhuserprofile_email['applicant_previous3_addr_city'];
	$applicant_previous3_addr_state = $row_find_existingwfhuserprofile_email['applicant_previous3_addr_state'];
	$applicant_previous3_addr_zip = $row_find_existingwfhuserprofile_email['applicant_previous3_addr_zip'];
	$applicant_previous3_live_years = $row_find_existingwfhuserprofile_email['applicant_previous3_live_years'];
	$applicant_previous3_live_months = $row_find_existingwfhuserprofile_email['applicant_previous3_live_months'];
	$applicant_previous3_landlord_name = $row_find_existingwfhuserprofile_email['applicant_previous3_landlord_name'];
	$applicant_previous3_landlord_phone = $row_find_existingwfhuserprofile_email['applicant_previous3_landlord_phone'];
	$user_comments_previousaddr_notes = $row_find_existingwfhuserprofile_email['user_comments_previousaddr_notes'];
	$applicant_employer1_addr = $row_find_existingwfhuserprofile_email['applicant_employer1_addr'];
	$applicant_employer1_city = $row_find_existingwfhuserprofile_email['applicant_employer1_city'];
	$applicant_employer1_state = $row_find_existingwfhuserprofile_email['applicant_employer1_state'];
	$applicant_employer1_zip = $row_find_existingwfhuserprofile_email['applicant_employer1_zip'];
	$applicant_employer1_phone = $row_find_existingwfhuserprofile_email['applicant_employer1_phone'];
	$applicant_employer1_phone_ext = $row_find_existingwfhuserprofile_email['applicant_employer1_phone_ext'];
	$applicant_employer1_work_dateofhire = $row_find_existingwfhuserprofile_email['applicant_employer1_work_dateofhire'];
	$applicant_employer1_work_years = $row_find_existingwfhuserprofile_email['applicant_employer1_work_years'];
	$applicant_employer1_work_months = $row_find_existingwfhuserprofile_email['applicant_employer1_work_months'];
	$applicant_employment_type = $row_find_existingwfhuserprofile_email['applicant_employment_type'];
	$applicant_employment_status = $row_find_existingwfhuserprofile_email['applicant_employment_status'];
	$applicant_employer1_position = $row_find_existingwfhuserprofile_email['applicant_employer1_position'];
	$applicant_employer1_department = $row_find_existingwfhuserprofile_email['applicant_employer1_department'];
	$applicant_employer1_supervisors_name = $row_find_existingwfhuserprofile_email['applicant_employer1_supervisors_name'];
	$applicant_employer1_supervisors_phone = $row_find_existingwfhuserprofile_email['applicant_employer1_supervisors_phone'];
	$applicant_employer1_hours_shift = $row_find_existingwfhuserprofile_email['applicant_employer1_hours_shift'];
	$applicant_employer1_salary_bringhome = $row_find_existingwfhuserprofile_email['applicant_employer1_salary_bringhome'];
	$applicant_employer1_payday_freq = $row_find_existingwfhuserprofile_email['applicant_employer1_payday_freq'];
	$applicant_employer_form_of_pymt = $row_find_existingwfhuserprofile_email['applicant_employer_form_of_pymt'];
	$applicant_other_income_amount = $row_find_existingwfhuserprofile_email['applicant_other_income_amount'];
	$applicant_other_income_source = $row_find_existingwfhuserprofile_email['applicant_other_income_source'];
	$applicant_other_income_when_rcvd= $row_find_existingwfhuserprofile_email['applicant_other_income_when_rcvd'];
	$applicant_if_education_school_sys = $row_find_existingwfhuserprofile_email['applicant_if_education_school_sys'];
	$user_applicant_employer_notes = $row_find_existingwfhuserprofile_email['user_applicant_employer_notes'];
	$applicant_employer2_name = $row_find_existingwfhuserprofile_email['applicant_employer2_name'];
	$applicant_employer2_addr = $row_find_existingwfhuserprofile_email['applicant_employer2_addr'];
	$applicant_previous2_addr2 = $row_find_existingwfhuserprofile_email['applicant_previous2_addr2'];
	$applicant_employer2_city = $row_find_existingwfhuserprofile_email['applicant_employer2_city'];
	$applicant_employer2_state = $row_find_existingwfhuserprofile_email['applicant_employer2_state'];
	$applicant_employer2_zip = $row_find_existingwfhuserprofile_email['applicant_employer2_zip'];
	$applicant_employer2_phone = $row_find_existingwfhuserprofile_email['applicant_employer2_phone'];
	$applicant_employer2_phone_ext = $row_find_existingwfhuserprofile_email['applicant_employer2_phone_ext'];
	$applicant_employer2_work_years = $row_find_existingwfhuserprofile_email['applicant_employer2_work_years'];
	$applicant_employer2_work_months = $row_find_existingwfhuserprofile_email['applicant_employer2_work_months'];
	$applicant_employer2_position = $row_find_existingwfhuserprofile_email['applicant_employer2_position'];
	$applicant_employer2_department = $row_find_existingwfhuserprofile_email['applicant_employer2_department'];
	$applicant_employer2_supervisors_name = $row_find_existingwfhuserprofile_email['applicant_employer2_supervisors_name'];
	$applicant_employer2_supervisors_phone = $row_find_existingwfhuserprofile_email['applicant_employer2_supervisors_phone'];
	$applicant_employer2_hours_shift = $row_find_existingwfhuserprofile_email['applicant_employer2_hours_shift'];
	$applicant_employer2_salary_bringhome = $row_find_existingwfhuserprofile_email['applicant_employer2_salary_bringhome'];
	$applicant_employer2_payday_freq = $row_find_existingwfhuserprofile_email['applicant_employer2_payday_freq'];
	$applicant_employer2_form_of_pymt = $row_find_existingwfhuserprofile_email['applicant_employer2_form_of_pymt'];
	$applicant_employer3_name = $row_find_existingwfhuserprofile_email['applicant_employer3_name'];
	$applicant_employer3_addr = $row_find_existingwfhuserprofile_email['applicant_employer3_addr'];
	$applicant_employer3_city = $row_find_existingwfhuserprofile_email['applicant_employer3_city'];
	$applicant_employer3_state = $row_find_existingwfhuserprofile_email['applicant_employer3_state'];
	$applicant_employer3_zip = $row_find_existingwfhuserprofile_email['applicant_employer3_zip'];
	$applicant_employer3_phone = $row_find_existingwfhuserprofile_email['applicant_employer3_phone'];
	$applicant_employer3_years = $row_find_existingwfhuserprofile_email['applicant_employer3_years'];
	$applicant_employer3_months = $row_find_existingwfhuserprofile_email['applicant_employer3_months'];
	$user_comments_employer_notes = $row_find_existingwfhuserprofile_email['user_comments_employer_notes'];
	$applicant_last_vehicle_purchased = $row_find_existingwfhuserprofile_email['applicant_last_vehicle_purchased'];
	$applicant_signature = $row_find_existingwfhuserprofile_email['applicant_signature'];
	$applicant_authorization = $row_find_existingwfhuserprofile_email['applicant_authorization'];
	$applicant_digital_signature_date = $time_now;


echo '<br />'.'<br />';

echo $create_credit_app_fullblown_id_sql = "
INSERT INTO `idsids_idsdms`.`credit_app_fullblown` SET
	`applicant_did` = '$vdid',
	`applicant_vid` = '$vid',
	`applicant_app_token` = '$cookie',
	`applicant_app_joint_token` = '$tkey',
	`applicant_titlename` = '$applicant_titlename',
	`applicant_fname` = '$cust_fname',
	`applicant_lname` = '$cust_lname',
	`applicant_name` = '$cust_fname $cust_lname',
	`applicant_cell_phone` = '$cust_mobilephone',
	`applicant_email_address` = '$cust_email',
	`credit_app_source` = '$credit_app_source',
	`applicant_driver_state_issued` = '$applicant_driver_state_issued',
	`applicant_driver_licenses_number` = '$applicant_driver_licenses_number',
	`applicant_ssn` = '$applicant_ssn',
	`applicant_dob` = '$applicant_dob',
	`applicant_driver_licenses_expdate` = '$applicant_driver_licenses_expdate',
	`applicant_present_address1` = '$cust_home_address',
	`applicant_present_addr_city` = '$cust_home_city',
	`applicant_present_addr_state` = '$cust_home_state',
	`applicant_present_addr_county` = '$cust_home_county',
	`applicant_present_addr_zip` = '$cust_home_zip',
	`applicant_addr_landlord_mortg` = '$applicant_addr_landlord_mortg',
	`applicant_addr_landlord_address` = '$applicant_addr_landlord_address',
	`applicant_addr_landlord_city` = '$applicant_addr_landlord_city',
	`applicant_addr_landlord_state` = '$applicant_addr_landlord_state',
	`applicant_addr_landlord_zip` = '$applicant_addr_landlord_zip',
	`applicant_addr_landlord_phone` = '$applicant_addr_landlord_phone',
	`applicant_name_oncurrent_lease` = 'applicant_name_oncurrent_lease',
	`applicant_apart_or_house` = '$applicant_apart_or_house',
	`applicant_buy_own_rent_other` = '$applicant_buy_own_rent_other',
	`applicant_house_payment` = '$applicant_house_payment',
	`applicant_addr_years` = '$cust_home_live_years',
	`applicant_addr_months` = '$cust_home_live_months',
	`applicant_employer1_name` = '$cust_employer_name',
	`applicant_employer1_phone` = '$applicant_employer1_phone',
	`applicant_employer1_addr` = '$applicant_employer1_addr',
	`applicant_employer1_city` = '$cust_employer_city',
	`applicant_employer1_state` = '$cust_employer_state',
	`applicant_employer1_zip` = '$cust_employer_zip',
	`applicant_employer1_salary_bringhome` = '$cust_gross_income',
	`applicant_employer1_payday_freq` = '$cust_gross_income_frequency',
	`applicant_employer1_work_years` = '$cust_employer_years',
	`applicant_employer1_work_months` = '$cust_employer_months',
	`applilcant_v_stockno` = '$vstockno',
	`applilcant_v_ymkmd_txt` = '$vdescript_txt',
	`applilcant_v_style`  = '$vbody',
	`applilcant_v_inception_miles`= '$vmileage',
	`applicant_open_autoloan` = '$cust_car_loan',
	`applicant_desired_mo_payment` = '$cust_desiredpymt',
	`applilcant_v_cash_down` = '$cust_downpayment',
	`applilcant_v_trade_year` = '$tradeYear',
	`applilcant_v_trade_make` = '$tradeMake',
	`applilcant_v_trade_model` = '$tradeModel',
	`applilcant_v_trade_lien_holder_name` = '$wfhuser_vTradePayoffCompany',
	`applicant_open_autoloan_pymt` = '$wfhuser_vTradeCurrentPaymts',
	`applilcant_v_trade_owed` = '$wfhuser_vTradePayOff'
";




$update_credit_app_fullblown_id_sql = "
INSERT INTO `idsids_idsdms`.`credit_app_fullblown` SET
	`app_number` = '$app_number',
	`applicant_did` = '$vdid',
	`applicant_vid` = '$vid',
	`applicant_app_token` = '$cookie',
	`applicant_app_joint_token` = '$tkey',
	`applicant_titlename` = '$applicant_titlename',
	`applicant_fname` = '$cust_fname',
	`applicant_lname` = '$cust_lname',
	`applicant_name` = '$cust_fname $cust_lname',
	`applicant_cell_phone` = '$cust_mobilephone',
	`applicant_email_address` = '$cust_email',
	`credit_app_source` = '$credit_app_source',
	`applicant_driver_state_issued` = '$applicant_driver_state_issued',
	`applicant_driver_licenses_number` = '$applicant_driver_licenses_number',
	`applicant_ssn` = '$applicant_ssn',
	`applicant_dob` = '$applicant_dob',
	`applicant_driver_licenses_expdate` = '$applicant_driver_licenses_expdate',
	`applicant_present_address1` = '$cust_home_address',
	`applicant_present_addr_city` = '$cust_home_city',
	`applicant_present_addr_state` = '$cust_home_state',
	`applicant_present_addr_county` = '$cust_home_county',
	`applicant_present_addr_zip` = '$cust_home_zip',
	`applicant_addr_landlord_mortg` = '$applicant_addr_landlord_mortg',
	`applicant_addr_landlord_address` = '$applicant_addr_landlord_address',
	`applicant_addr_landlord_city` = '$applicant_addr_landlord_city',
	`applicant_addr_landlord_state` = '$applicant_addr_landlord_state',
	`applicant_addr_landlord_zip` = '$applicant_addr_landlord_zip',
	`applicant_addr_landlord_phone` = '$applicant_addr_landlord_phone',
	`applicant_name_oncurrent_lease` = 'applicant_name_oncurrent_lease',
	`applicant_apart_or_house` = '$applicant_apart_or_house',
	`applicant_buy_own_rent_other` = '$applicant_buy_own_rent_other',
	`applicant_house_payment` = '$applicant_house_payment',
	`applicant_addr_years` = '$cust_home_live_years',
	`applicant_addr_months` = '$cust_home_live_months',
	`applicant_employer1_name` = '$cust_employer_name',
	`applicant_employer1_phone` = '$applicant_employer1_phone',
	`applicant_employer1_addr` = '$applicant_employer1_addr',
	`applicant_employer1_city` = '$cust_employer_city',
	`applicant_employer1_state` = '$cust_employer_state',
	`applicant_employer1_zip` = '$cust_employer_zip',
	`applicant_employer1_salary_bringhome` = '$cust_gross_income',
	`applicant_employer1_payday_freq` = '$cust_gross_income_frequency',
	`applicant_employer1_work_years` = '$cust_employer_years',
	`applicant_employer1_work_months` = '$cust_employer_months',
	`applilcant_v_stockno` = '$vstockno',
	`applilcant_v_ymkmd_txt` = '$vdescript_txt',
	`applilcant_v_style`  = '$vbody',
	`applilcant_v_inception_miles`= '$vmileage',
	`applicant_open_autoloan` = '$cust_car_loan',
	`applicant_desired_mo_payment` = '$cust_desiredpymt',
	`applilcant_v_cash_down` = '$cust_downpayment',
	`applilcant_v_trade_year` = '$tradeYear',
	`applilcant_v_trade_make` = '$tradeMake',
	`applilcant_v_trade_model` = '$tradeModel',
	`applilcant_v_trade_lien_holder_name` = '$wfhuser_vTradePayoffCompany',
	`applicant_open_autoloan_pymt` = '$wfhuser_vTradeCurrentPaymts',
	`applilcant_v_trade_owed` = '$wfhuser_vTradePayOff'
	WHERE
  `credit_app_fullblown_id` = '$credit_app_fullblown_id'
";







/*
// These are the pieces I removed they are currently not being used.

						`vTradeLicsfee` = '$vTradeLicsfee',

						`salesPerson1ID` = '$salesPerson1ID',
						`salesPerson1Name` = '$tradeModel',
						`salesPerson2ID` = '$salesPerson2ID',
						`salesPerson2Name` = '$salesPerson2Name',
						`salesMgrID` = '$salesMgrID',
						`salesMgrName` = '$salesMgrName',
						`financeMgrID` = '$financeMgrID',
						`financeMgrName` = '$financeMgrName',

						`nonTaxRebate` = '$nonTaxRebate',
						`taxablePrice` = '$taxablePrice',

						`vTradeAllow` = '$vTradeAllow',
						`receiptNo` = '$receiptNo',
						`receiptNo2` = '$receiptNo2',


						`tradeACV` = '$tradeACV',
						`OA` = '$OA',



						`vTradeDecal` = '$vTradeDecal',
						`vTradeStikNo` = '$vTradeStikNo',


						`vTradeTitle` = '$vTradeTitle',



						`leinHolderTradeSelct` = '$leinHolderTradeSelct',


						`vTradeVerifiedBy` = '$vTradeVerifiedBy',
						`vTradeVerifiedByName` = '$vTradeVerifiedByName',
						
						
						`vTradeOpenRO` = '$vTradeOpenRO',
						`vTradeTitleRemarks` = '$vTradeTitleRemarks',
						`vTradeRemarksAttached` = '$vTradeRemarksAttached',
						`rebates` = '$rebates',
						`reBateOne` = '$reBateOne',
						`reBateOneTax` = '$reBateOneTax',
						`reBateTwo` = '$reBateTwo',
						`reBateTwodscrp` = '$reBateTwodscrp',
						`reBateTwoTax` = '$reBateTwoTax',
						`reBateThree` = '$reBateThree',
						`reBateThreedscrp` = '$reBateThreedscrp',
						`reBateThreeTax` = '$reBateThreeTax',
						`reBateFour` = '$reBateFour',
						`reBateFourdscrp` = '$reBateFourdscrp',
						`reBateFourTax` = '$reBateFourTax',
						`reBateFive` = '$reBateFive',
						`reBateFivedscrp` = '$reBateFivedscrp',
						`reBateFiveTax` = '$reBateFiveTax',
						`rebateToReduceSalesPrice` = '$rebateToReduceSalesPrice',

						`dealerOptionsTotal` = '$dealerOptionsTotal',
						`dealerOptions1CodeID` = '$dealerOptions1CodeID',
						`dealerOptionsNm1` = '$dealerOptionsNm1',
						`dealerOptions1List` = '$dealerOptions1List',
						`dealerOptions1` = '$dealerOptions1',
						`dealerOptions1Cost` = '$dealerOptions1Cost',
						`dealerOptions1Tax` = '$dealerOptions1Tax',
						`dealerOptions2CodeID` = '$dealerOptions2CodeID',
						`dealerOptionsNm2` = '$dealerOptionsNm2',
						`dealerOptions2List` = '$dealerOptions2List',
						`dealerOptions2` = '$dealerOptions2',
						`dealerOptions2Cost` = '$dealerOptions2Cost',
						`dealerOptions2Tax` = '$dealerOptions2Tax',
						`dealerOptions3CodeID` = '$dealerOptions3CodeID',
						`dealerOptionsNm3` = '$dealerOptionsNm3',
						`dealerOptions3List` = '$dealerOptions3List',
						`dealerOptions3` = '$dealerOptions3',
						`dealerOptions3Cost` = '$dealerOptions3Cost',
						`dealerOptions3Tax` = '$dealerOptions3Tax',
						`dealerOptions4CodeID` = '$dealerOptions4CodeID',
						`dealerOptionsNm4` = '$dealerOptionsNm4',
						`dealerOptions4List` = '$dealerOptions4List',
						`dealerOptions4` = '$dealerOptions4',
						`dealerOptions4Cost` = '$dealerOptions4Cost',
						`dealerOptions4Tax` = '$dealerOptions4Tax',
						`dealerOptions5CodeID` = '$dealerOptions5CodeID',
						`dealerOptionsNm5` = '$dealerOptionsNm5',
						`dealerOptions5List` = '$dealerOptions5List',
						`dealerOptions5` = '$dealerOptions5',
						`dealerOptions5Cost` = '$dealerOptions5Cost',
						`dealerOptions5Tax` = '$dealerOptions5Tax',
						`dealerOptions6CodeID` = '$dealerOptions6CodeID',
						`dealerOptionsNm6` = '$dealerOptionsNm6',
						`dealerOptions6List` = '$dealerOptions6List',
						`dealerOptions6` = '$dealerOptions6',
						`dealerOptions6Cost` = '$dealerOptions6Cost',
						`dealerOptions6Tax` = '$dealerOptions6Tax',
						`dealerOptions7CodeID` = '$dealerOptions7CodeID',
						`dealerOptionsNm7` = '$dealerOptionsNm7',
						`dealerOptions7List` = '$dealerOptions7List',
						`dealerOptions7` = '$dealerOptions7',
						`dealerOptions7Cost` = '$dealerOptions7Cost',
						`dealerOptions7Tax` = '$dealerOptions7Tax',
						`insuranceCost` = '$insuranceCost',
						`insurMonths` = '$insurMonths',
						`insurCreditlife` = '$insurCreditlife',
						`insurAccHealth` = '$insurAccHealth',
						`extServicePlan` = '$extServicePlan',
						`extSrvcMonths` = '$extSrvcMonths',
						`extSrvcCompany` = '$extSrvcCompany',
						`extSrvcMiles` = '$extSrvcMiles',
						`extSrvcStartDate` = '$extSrvcStartDate',
						`extSrvcContractNo` = '$extSrvcContractNo',
						`extSrvcStartMiles` = '$extSrvcStartMiles',
						`extSrvcEndDate` = '$extSrvcEndDate',
						`extSrvcPremium` = '$extSrvcPremium',
						`extSrvcdeduct` = '$extSrvcdeduct',
						`extSrvcEndMiles` = '$extSrvcEndMiles',
						`cashDeposit` = '$cashDeposit',
						`COD` = '$COD',

						`tradeAllowance` = '$tradeAllowance',
						`licsFee` = '',
						`firstpymt` = '$firstpymt',
						`stateTaxperc` = '$stateTaxperc',
						`stateTaxpercTotal` = '$stateTaxpercTotal',
						`taxCountyperc` = '$taxCountyperc',
						`taxCountypercTotal` = '$taxCountypercTotal',
						`taxCityperc` = '$taxCityperc',
						`taxCitypercTotal` = '$taxCitypercTotal',








						`msrp` = '$msrp',
						`dayResults` = '$dayResults',
						`residualDollar` = '$residualDollar',
						`warrantyPrice` = '$warrantyPrice',





*/



echo '<br />'.'<br />';

echo $query_insert_wfh_deal_sql ="
INSERT INTO `idsids_idsdms`.`deals_bydealer` SET
						`deal_token` = '$cookie',
						`deal_number` = '$deal_number',
						`deal_dealerID` = '$vdid',
						`credit_app_id` = '$credit_app_fullblown_id',
						`appointment_id` = '$dlr_appt_id',
						`tavt_fee_required` = '$tavt_fee_required',
						`tavt_fee` = '$vadvalorem_tax',
						`vStockno` = '$vstockno',
						`vCondition` = '$vcondition',
						`vYear` = '$vyear',
						`vMake` = '$vmake',
						`vModel` = '$vmodel',
						`vTrim` = '$vtrim',
						`vBodyType` = '$vbody',
						`vColor` = '$vecolor_txt',
						`vEngineCyls` = '$vcylinders',
						`vVin` = '$vvin',
						`vMileage` = '$vmileage',
						`vLeinHolderNm` = '$vLeinHolderNm',
						`vLeinHolderAddr` = '$vLeinHolderAddr',
						`vLeinHolderCity` = '$vLeinHolderCity',
						`vLeinHolderState` = '$vLeinHolderState',
						`vLeinHolderZip` = '$vLeinHolderZip',
						`vLeinHolderLeinNo` = '$vLeinHolderLeinNo',
						`vLeinHolderPhnNo` = '$vLeinHolderPhnNo',
						`vInsurCompNm` = '$wfhuser_vInsurCompNm',
						`vInsurCompAddr` = '$wfhuser_vInsurCompAddr',
						`vInsurCompAddr2` = '$wfhuser_vInsurCompAddr2',
						`vInsurCompCity` = '$wfhuser_vInsurCompCity',
						`vInsurCompState` = '$wfhuser_vInsurCompState',
						`vInsurCompZip` = '$wfhuser_vInsurCompZip',
						`vTradeYr` = '$wfhuser_vTradeYr',
						`vTradeMk` = '$wfhuser_vTradeMk',
						`vTradeModel` = '$wfhuser_vTradeModel',
						`vTradeTrim` = '$wfhuser_vTradeTrim',
						`vTradeColor` = '$wfhuser_vTradeColor',
						`vTradeVin` = '$wfhuser_vTradeVin',
						`vTradeMiles` = '$wfhuser_vTradeMiles',
						`vTradePayOff` = '$wfhuser_vTradePayOff',
						`vTradeOwner` = '$wfhuser_vTradeOwner',
						`vTradeTagNo` = '$wfhuser_vTradeTagNo',
						`vTradeTagState` = '$wfhuser_vTradeTagState',
						`vTradeTagExprDate` = '$wfhuser_vTradeTagExprDate',
						`vTradePayoffCompany` = '$wfhuser_vTradePayoffCompany',
						`vTradeLeinHldrAcctNo` = '$wfhuser_vTradeLeinHldrAcctNo',
						`vTradePayoffCompanyAddr` = '$wfhuser_vTradePayoffCompanyAddr',
						`vTradePayoffCompanyAddr2` = '$wfhuser_vTradePayoffCompanyAddr2',
						`vTradePayoffCompanyCity` = '$wfhuser_vTradePayoffCompanyCity',
						`vTradePayoffCompanyState` = '$wfhuser_vTradePayoffCompanyState',
						`vTradePayoffCompanyZip` = '$wfhuser_vTradePayoffCompanyZip',
						`vTradePayoffGoodUntil` = '$wfhuser_vTradePayoffGoodUntil',
						`vTradePayoffPerDiem` = '$wfhuser_vTradePayoffPerDiem',
						`vTradePayoffCompanyPhoneno` = '$wfhuser_vTradePayoffCompanyPhoneno',
						`priceVehicle` = '$VPrice',
						`downPayment` = '$cust_downpayment',
						`VSIFEE` = '$VSIFEE',
						`loanProcessingFee` = '$loanProcessingFee',
						`tradePayoff` = '$wfhuser_vTradePayOff',
						`docServiceFee` = '$settingDocDlvryFee',
						`noTaxes` = '$noTaxes',
						`settingSateSlsTax` = '$settingSateSlsTax',
						`titleFee` = '$settingTitleFee ',
						`stateInspect` = '$settingStateInspectnFee',
						`licsNtitlefee` = '$licsNtitlefee',
						`taxState` = '$cust_home_state',
						`monthlypymts` = '$calcPmt',
						`amountDDue` = '$newamountTofinance',
						`apr` = '$cust_creditapr',
						`term` = '$settingDefaultTerm',
						`totalPayments` = '$totalPayments',
						`totalFinanceCharges` = '$financeCharges',
						`monthlyPymtd` = '$calcPmt'
";

echo $query_update_wfh_deal_sql ="
UPDATE `idsids_idsdms`.`deals_bydealer` SET
						`deal_dealerID` = '$vdid',
						`credit_app_id` = '$credit_app_fullblown_id',
						`appointment_id` = '$wfhuserperm_appointment_id',
						`tavt_fee_required` = '$tavt_fee_required',
						`tavt_fee` = '$vadvalorem_tax',
						`vStockno` = '$vstockno',
						`vCondition` = '$vcondition',
						`vYear` = '$vyear',
						`vMake` = '$vmake',
						`vModel` = '$vmodel',
						`vTrim` = '$vtrim',
						`vBodyType` = '$vbody',
						`vColor` = '$vecolor_txt',
						`vEngineCyls` = '$vcylinders',
						`vVin` = '$vvin',
						`vMileage` = '$vmileage',
						`vLeinHolderNm` = '$vLeinHolderNm',
						`vLeinHolderAddr` = '$vLeinHolderAddr',
						`vLeinHolderCity` = '$vLeinHolderCity',
						`vLeinHolderState` = '$vLeinHolderState',
						`vLeinHolderZip` = '$vLeinHolderZip',
						`vLeinHolderLeinNo` = '$vLeinHolderLeinNo',
						`vLeinHolderPhnNo` = '$vLeinHolderPhnNo',
						`vInsurCompNm` = '$wfhuser_vInsurCompNm',
						`vInsurCompAddr` = '$wfhuser_vInsurCompAddr',
						`vInsurCompAddr2` = '$wfhuser_vInsurCompAddr2',
						`vInsurCompCity` = '$wfhuser_vInsurCompCity',
						`vInsurCompState` = '$wfhuser_vInsurCompState',
						`vInsurCompZip` = '$wfhuser_vInsurCompZip',
						`vTradeYr` = '$wfhuser_vTradeYr',
						`vTradeMk` = '$wfhuser_vTradeMk',
						`vTradeModel` = '$wfhuser_vTradeModel',
						`vTradeTrim` = '$wfhuser_vTradeTrim',
						`vTradeColor` = '$wfhuser_vTradeColor',
						`vTradeVin` = '$wfhuser_vTradeVin',
						`vTradeMiles` = '$wfhuser_vTradeMiles',
						`vTradePayOff` = '$wfhuser_vTradePayOff',
						`vTradeOwner` = '$wfhuser_vTradeOwner',
						`vTradeTagNo` = '$wfhuser_vTradeTagNo',
						`vTradeTagState` = '$wfhuser_vTradeTagState',
						`vTradeTagExprDate` = '$wfhuser_vTradeTagExprDate',
						`vTradePayoffCompany` = '$wfhuser_vTradePayoffCompany',
						`vTradeLeinHldrAcctNo` = '$wfhuser_vTradeLeinHldrAcctNo',
						`vTradePayoffCompanyAddr` = '$wfhuser_vTradePayoffCompanyAddr',
						`vTradePayoffCompanyAddr2` = '$wfhuser_vTradePayoffCompanyAddr2',
						`vTradePayoffCompanyCity` = '$wfhuser_vTradePayoffCompanyCity',
						`vTradePayoffCompanyState` = '$wfhuser_vTradePayoffCompanyState',
						`vTradePayoffCompanyZip` = '$wfhuser_vTradePayoffCompanyZip',
						`vTradePayoffGoodUntil` = '$wfhuser_vTradePayoffGoodUntil',
						`vTradePayoffPerDiem` = '$wfhuser_vTradePayoffPerDiem',
						`vTradePayoffCompanyPhoneno` = '$wfhuser_vTradePayoffCompanyPhoneno',
						`priceVehicle` = '$VPrice',
						`downPayment` = '$cust_downpayment',
						`VSIFEE` = '$VSIFEE',
						`loanProcessingFee` = '$loanProcessingFee',
						`tradePayoff` = '$wfhuser_vTradePayOff',
						`docServiceFee` = '$settingDocDlvryFee',
						`noTaxes` = '$noTaxes',
						`settingSateSlsTax` = '$settingSateSlsTax',
						`titleFee` = '$settingTitleFee ',
						`stateInspect` = '$settingStateInspectnFee',
						`licsNtitlefee` = '$licsNtitlefee',
						`taxState` = '$cust_home_state',
						`monthlypymts` = '$calcPmt',
						`amountDDue` = '$newamountTofinance',
						`apr` = '$cust_creditapr',
						`term` = '$settingDefaultTerm',
						`totalPayments` = '$totalPayments',
						`totalFinanceCharges` = '$financeCharges',
						`monthlyPymtd` = '$calcPmt'
						WHERE
						`deal_id` = '$wfh_deal_id'
";


/*  */
// This is here to show you how can maybe serve the database without opening a new page and not get the mysqli last auto increment of a particular ID.

//$run_create_new_system_apptstring = mysqli_query($idsconnection_mysqli, $create_new_system_appt_sql);



// Creates, Updates Appointment Generation For Customer And Dealer
if(!$wfhuserperm_appointment_id){
	echo 'Created Appointment';
	$query_create_new_system_appt_sql_saved = mysqli_query($idsconnection_mysqli, $create_new_system_appt_sql);
    $dlr_appt_id = mysqli_insert_id($idsconnection_mysqli);
	
}else{
	echo 'Updateed Appointment';
	$query_update_new_system_appt_sql_saved = mysqli_query($idsconnection_mysqli, $update_new_system_appt_sql);
    $dlr_appt_id = mysqli_insert_id($idsconnection_mysqli);
	
}

if(!$wfhuserperm_id){
	echo 'Created Permissions';
	$query_create_approval_perms_sql_saved = mysqli_query($idsconnection_mysqli, $create_approval_perms_sql);
    $wfhuserperm_id = mysqli_insert_id($idsconnection_mysqli);
	
}else{
	echo 'Updated Permissions';
	$query_update_approval_perms_sql_saved = mysqli_query($idsconnection_mysqli, $update_approval_perms_sql);
    //$dlr_appt_id = mysqli_insert_id($idsconnection_mysqli);
	
}

 

// Creates, Updates Lead Generation For Customer
if(!$wfh_lead_id){
	echo 'Created Lead';
	$query_insert_wfh_lead_sql_saved = mysqli_query($idsconnection_mysqli, $query_insert_wfh_lead_sql);
    $wfh_lead_id = mysqli_insert_id($idsconnection_mysqli);
	
}else{
	echo 'Updated Lead';
	$query_update_wfh_lead_sql_saved = mysqli_query($idsconnection_mysqli, $query_update_wfh_lead_sql);
    $wfh_lead_id = mysqli_insert_id($idsconnection_mysqli);
	
}


// Creates, Updates Credit application Deal for Dealer And WFH USER
if(!$credit_app_fullblown_id){
	echo 'Credit App Created';
	$query_insert_wfh_lead_sql_saved = mysqli_query($idsconnection_mysqli, $create_credit_app_fullblown_id_sql);
    $credit_app_fullblown_id = mysqli_insert_id($idsconnection_mysqli);
	
	
}else{
	echo 'Credit App Updated';

$update_credit_app_fullblown_id_sql_saved = mysqli_query($idsconnection_mysqli, $update_credit_app_fullblown_id_sql);
    $credit_app_fullblown_id = mysqli_insert_id($idsconnection_mysqli);
	
	
}


// Creates, Updates Car Deal for Dealer
if(!$wfh_deal_id){
	echo 'Created Deal';
	$query_insert_wfh_deal_sql_saved = mysqli_query($idsconnection_mysqli, $query_insert_wfh_deal_sql);
    $wfh_deal_id = mysqli_insert_id($idsconnection_mysqli);
	
}else{
	echo 'Updated Deal';
	$query_update_wfh_deal_sql_saved = mysqli_query($idsconnection_mysqli, $query_update_wfh_deal_sql);
    $wfh_deal_id = mysqli_insert_id($idsconnection_mysqli);
	
	
}


//Run A Log Cat On This Tranaction everytime this page is ran.
echo $logcat_thisdeal_sql = "
INSERT INTO `idsids_idsdms`.`log_cat` SET
	`log_cat_did` = '$vdid',
	`log_cat_body` = 'Woolah Manifestation Dealer: $vdid on Vehicle: $vid just received a deal online it passed through.',
";

$find_logcat_thisdeal = mysqli_query($idsconnection_mysqli, $logcat_thisdeal_sql);


// Load And Send PHP SMTP Mail To Admin / Benjamin / CC Dudes Rep2

echo 'Now Send Pretty Ass Email All Errors Are Gone';

// Load And Send PHP SMTP Mail To Dealer

// Load And Send PHP SMTP Mail To Customer To Verify Email If NOT Existing

// Load And Send PHP SMTP Mail To Customer Of Appointment SET




//echo '<br />'.' $wfh_lead_id: '. $wfh_lead_id;


endif;





?>