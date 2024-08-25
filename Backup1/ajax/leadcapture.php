<?php


	if(isset($_POST['cust_socialsn'], $_POST['cust_myEmail'], $_POST['cust_creditaprtxt'], $_POST['cust_creditapr'], $_POST['cust_totalpayments'], $_POST['bigPrincipal'], $_POST['cust_desiredpymt'], $_POST['cust_downpayment'], $_POST['cust_desiredtermos'], $_POST['cust_desiredtermrange'], $_POST['cust_home_state'], $_POST['cust_car_loan'], $_POST['wfhcookiesesid'], $_POST['fbid'], $_POST['cust_lead_source_id'], $_POST['cust_lead_source'], $_POST['cust_lead_token'], $_POST['cust_titlename'], $_POST['cust_fname'], $_POST['cust_lname'], $_POST['cust_phoneno'], $_POST['cust_email'], $_POST['cust_gross_income'], $_POST['cust_employer_years'], $_POST['cust_employer_months'], $_POST['cust_home_live_years'], $_POST['cust_home_live_months'], $_POST['currentCarpymt'], $_POST['tradePayoff'], $_POST['tradeYear'], $_POST['tradeMake'], $_POST['subcat'], $_POST['tradeYes'])){
		
		//These Should Be Blank And Return False If Exisit
		if($_POST['cust_socialsn'] != NULL){return false;}
		if($_POST['cust_myEmail'] != NULL){return false;}
		
		// These Should Be True If Not Return False
		//if($_POST['wfhcookiesesid'] != NULL){return false;}
		//if($_POST['cust_lead_token'] != NULL){return false;}
			

		//echo 'Your Name is '. $_POST['cust_fname'] .' '. $_POST['cust_lname']. ' Princiapl '.$_POST['bigPrincipal'];
		//print_r($_POST);
		
		//Connection To DMS Database
		include('config.php');

		//1. Find An Exisiting Session ID For?
		//2. Update Existing UserProfile If Session ID matches an existing temporary user.
		//3. If session id matches wfh user id allow credentials to sign in customer.

					//Insert Informaiton Accordingly.
					$cust_creditapr = mysql_real_escape_string($_POST['cust_creditaprtxt']);                                 
					$cust_creditapr = mysql_real_escape_string($_POST['cust_creditapr']);
					$cust_totalpayments = mysql_real_escape_string($_POST['cust_totalpayments']);
					$bigPrincipal = mysql_real_escape_string($_POST['bigPrincipal']);
					$cust_desiredpymt = mysql_real_escape_string($_POST['cust_desiredpymt']);
					$cust_downpayment = mysql_real_escape_string($_POST['cust_downpayment']);
					$cust_desiredtermos = mysql_real_escape_string($_POST['cust_desiredtermos']);
					$cust_desiredtermrange = mysql_real_escape_string($_POST['cust_desiredtermrange']);
					
					$cust_home_state = mysql_real_escape_string($_POST['cust_home_state']);
					$cust_car_loan = mysql_real_escape_string($_POST['cust_car_loan']);
					
					$wfhcookiesesid = mysql_real_escape_string($_POST['wfhcookiesesid']);
					$fbid = mysql_real_escape_string($_POST['fbid']);
					$cust_lead_source_id = mysql_real_escape_string($_POST['cust_lead_source_id']);
					$cust_lead_source = mysql_real_escape_string($_POST['cust_lead_source']); //WeFinanceHere.com 
					$cust_lead_token = mysql_real_escape_string($_POST['cust_lead_token']);


					$cust_titlename = mysql_real_escape_string($_POST['cust_titlename']);
					$cust_fname = mysql_real_escape_string($_POST['cust_fname']);
					$cust_lname = mysql_real_escape_string($_POST['cust_lname']);
					$cust_phoneno = mysql_real_escape_string($_POST['cust_phoneno']);
					$cust_home_zip = mysql_real_escape_string($_POST['cust_home_zip']);
					$cust_email = mysql_real_escape_string($_POST['cust_email']);
					$cust_gross_income = mysql_real_escape_string($_POST['cust_gross_income']);
					$cust_employer_years = mysql_real_escape_string($_POST['cust_employer_years']);
					$cust_employer_months = mysql_real_escape_string($_POST['cust_employer_months']);
					$cust_home_live_years = mysql_real_escape_string($_POST['cust_home_live_years']);
					$cust_home_live_months = mysql_real_escape_string($_POST['cust_home_live_months']);
					$currentCarpymt = mysql_real_escape_string($_POST['currentCarpymt']);
					$tradePayoff = mysql_real_escape_string($_POST['tradePayoff']);
					$tradeYear = mysql_real_escape_string($_POST['tradeYear']);
					$tradeMake = mysql_real_escape_string($_POST['tradeMake']);
					$tradeModel = mysql_real_escape_string($_POST['subcat']);
					$tradeYes = mysql_real_escape_string($_POST['tradeYes']);

					//Defined Values For Database Records From This particular form with theme.  Some logic is defined internally.
					$cust_dealer_id = '2';
					$cust_nickname = "$cust_fname $cust_lname";
					$cust_mobilephone = $cust_phoneno;
					$cust_lead_temperature = "HOT";
					$cust_status = "pending approval";
					$cust_gross_income_frequency = "Monthly";
					$cust_comment = "I Budget For X Amount Of Dollars And I'm Looking For An Approval.";
					$cust_comment = mysql_real_escape_string($cust_comment);
					$cust_leadcost = "15.00";
					

$insertSQLstring = "
INSERT INTO `idsids_idsdms`.`cust_leads` (
					`cust_creditaprtxt`,
					`cust_creditapr`,
					`cust_totalpayments`,
					`cust_leadcost`,
					`bigPrincipal`,
					`cust_desiredpymt`,
					`cust_downpayment`,
					`cust_desiredtermos`,
					`cust_desiredtermrange`,
					`cust_home_state`,
					`cust_car_loan`,
					`wfhcookiesesid`,
					`fbid`,
					`cust_lead_source_id`,
					`cust_lead_source`,
					`cust_dealer_id`,
					`cust_lead_token`,
					`cust_titlename`,
					`cust_nickname`,
					`cust_fname`,
					`cust_lname`,
					`cust_phoneno`,
					`cust_mobilephone`,
					`cust_home_zip`,
					`cust_email`,
					`cust_lead_temperature`,
					`cust_status`,
					`cust_gross_income`,
					`cust_gross_income_frequency`,
					`cust_employer_years`,
					`cust_employer_months`,
					`cust_home_live_years`,
					`cust_home_live_months`,
					`currentCarpymt`,
					`tradePayoff`,
					`tradeYear`,
					`tradeMake`,
					`tradeModel`,
					`tradeYes`,
					`cust_comment`)Values(
					'$cust_creditaprtxt',
					'$cust_creditapr',
					'$cust_totalpayments',
					'$cust_leadcost',
					'$bigPrincipal',
					'$cust_desiredpymt',
					'$cust_downpayment',
					'$cust_desiredtermos',
					'$cust_desiredtermrange',
					'$cust_home_state',
					'$cust_car_loan',
					'$wfhcookiesesid',
					'$fbid',
					'$cust_lead_source_id',
					'$cust_lead_source',
					'$cust_dealer_id',
					'$cust_lead_token',
					'$cust_titlename',
					'$cust_nickname',
					'$cust_fname',
					'$cust_lname',
					'$cust_phoneno',
					'$cust_mobilephone',
					'$cust_home_zip',
					'$cust_email',
					'$cust_lead_temperature',
					'$cust_status',
					'$cust_gross_income',
					'$cust_gross_income_frequency',
					'$cust_employer_years',
					'$cust_employer_months',
					'$cust_home_live_years',
					'$cust_home_live_months',
					'$currentCarpymt',
					'$tradePayoff',
					'$tradeYear',
					'$tradeMake',
					'$tradeModel',
					'$tradeYes',
					'$cust_comment')";

//echo $insertSQLstring;

//$insertCustLead = mysqli_query($idsconnection_mysqli, $insertSQLstring);
/*
		//Update Informaiton Accordingly.
		
					cust_creditapr cust_creditaprtxt                                 
					cust_creditapr cust_creditapr                                 
					bigPrincipal bigPrincipal
					cust_desiredpymt cust_desiredpymt
					cust_downpayment cust_downpayment
					cust_desiredtermos cust_desiredtermos
					cust_desiredtermrange cust_desiredtermrange
					
					cust_home_state cust_home_state
					cust_car_loan cust_car_loan
					
					wfhcookiesesid wfhcookiesesid 
					fbid fbid 
					cust_lead_source_id  cust_lead_source_id        
					cust_lead_source  cust_lead_source WeFinanceHere.com 
					cust_lead_token  cust_lead_token 
	*/	
		
	}



?>