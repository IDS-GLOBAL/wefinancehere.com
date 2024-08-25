<?php
/*
//  This is to Define All Definitions For a Deal Matrix 
//  Using Preperation Method Only
//  Insert Into Credit Application, Lead, Customer, DEAL
//  Response Method, Email IDS, Email Dealer, Email Customer,
*	Created By Benjamin Carter: Email: webgoonie@gmail.com

* 	source_id	cust_lead_source      Label For cust_lead_source
*			1	Website
*			2	Internal Lead
*			3	AutoCityMag.com
*			4	WeFinanceHere.com
*			5	BuyHerePayHereUs.com
*			6	OneCreditApp.com
*			7	AutoFinanceMd.com
*/

$cust_lead_temperature = 'Pending';
$cust_status = 'Pending';
$mytoken=$_GET['mytoken'];
$cust_phoneno = "$Phone";
$cust_phonetype = "mobile";
$cust_mobilephone = "$Phone";
$cust_homephone = "$Phone";
$cust_workphone = "$EmployerPhoneNo";
$cust_lead_source_id = '4';
$ThisComments=$_GET['ThisComments']; //Comments That the customer makes goes here.
$cust_comment = "$ThisComments";

$income=$_GET['income']; //4500
$SellingPrice=$_GET['SellingPrice'];  //
$RentOrMortgage=$_GET['RentOrMortgage'];  //950
$CreditCardPayments=$_GET['CreditCardPayments'];  //250
$GarnishDeductions=$_GET['GarnishDeductions'];  //300
$Deductions=$_GET['Deductions'];  //400
$cust_titlename=$_GET['titleName'];  //Dr.

if($titleName == 'Mr.'){
	$sex = 'Male';
	}if($titleName == 'Mr.'){
	$sex = 'M';
	}if($titleName == 'Mrs.'){
	$sex = 'F';
	}if($titleName == 'Ms.'){
	$sex = 'F';
	}if($titleName == 'Miss.'){
	$sex = 'F';
	}if($titleName == 'Dr.'){
	$sex = '';
	}if(!$titleName){
	$sex = '';	
	}

$sex;


$fromsource=$_GET['fromsource'];  //WeFinanceHere.com
$vid=$_GET['vid'];  //1354
$did=$_GET['did'];  //60
$vstockno=$_GET['vstockno'];  //15023
$vcondition=$_GET['vcondition']; //Used
$vvin=$_GET['vvin'];  //1G8AJ52F43Z101553
$vyear=$_GET['vyear'];  //2003
$vmake=$_GET['vmake'];  //SATURN
$vmodel=$_GET['vmodel'];  //ION
$vtrim=$_GET['vtrim'];  //vtrim
$vmileage=$_GET['vmileage'];  //117993
$joint_or_invidividual=$_GET['joint_or_invidividual'];  //Individual
$FirstName=$_GET['FirstName'];  //Webgoonie
$LastName=$_GET['LastName'];  //.com $Email=$_GET[''];  //webgoonie%40gmail.com
$MiddleName=$_GET['MiddleName']; // MiddleName
$Suffix=$_GET['Suffix'];
$cust_email=$_GET['Email']; // Email
$Phone=$_GET['Phone'];  //4049337340
$Zip=$_GET['Zip'];  //30328
$Address1=$_GET['Address1'];  //456+Ellenwood+Drive
$Address2=$_GET['Address2'];  //Apt.+C6
$City=$_GET['City'];  //Decatur
$State=$_GET['State'];  //GA
$County=$_GET['County'];  //Dekalb
$LiveYears=$_GET['LiveYears'];  //0+Years
$LiveMonths=$_GET['LiveMonths'];  //9+Months
$SecondAddress1=$_GET['2Address1'];  //456+Ellenwood+Drive
$SecondAddress2=$_GET['2Address2'];  //Apt.+C6
$SecondCity=$_GET['2City'];  //Decatur
$SecondState=$_GET['2State'];  //GA
$SecondCounty=$_GET['2County'];  //Dekalb
$SecondLiveYears=$_GET['2LiveYears'];  //0+Years
$SecondLiveMonths=$_GET['2LiveMonths'];  //9+Months
$Secondapplicant_buy_own_rent_other=$_GET['2applicant_buy_own_rent_other'];  //Renting%2FLeasing
$EmployerName=$_GET['EmployerName'];  //Coa-Cola
$EmployerPhoneNo=$_GET['EmployerPhoneNo'];  //7703234440

$EmployerAddr1=$_GET['EmployerAddr1'];
$EmployerAddr2=$_GET['EmployerAddr2'];
$EmployerCity=$_GET['EmployerCity'];
$EmployerState=$_GET['EmployerState'];
$EmployerZip=$_GET['EmployerZip'];

$workYears=$_GET['workYears'];  //2+Years
$workMonths=$_GET['workMonths'];  //6+Months
$EmploymentType=$_GET['EmploymentType'];  //Professional
$EmploymentStatus=$_GET['EmploymentStatus'];  //Full+Time
$EmploymentTitle=$_GET['EmploymentTitle'];  //Truck+Driver
$paydayFreq=$_GET['paydayFreq'];  //Monthly
$applicant_employer2_name=$_GET['applicant_employer2_name'];  //502+Laurel+Wood+Circle
$applicant_employer2_phone=$_GET['applicant_employer2_phone'];  //6016494511
$applicant_employer2_addr=$_GET['applicant_employer2_addr'];  //2018+Hwy+15N
$applicant_employer2_addr2=$_GET['applicant_employer2_addr2'];  //None
$applicant_employer2_zip=$_GET['applicant_employer2_zip'];  //39440
$applicant_employer2_city=$_GET['applicant_employer2_city'];  //Laurel
$applicant_employer2_state=$_GET['applicant_employer2_state'];  //MS
$applicant_other_income_source=$_GET['applicant_other_income_source'];  //Own+Business
$applicant_other_income_amount=$_GET['applicant_other_income_amount'];  //900
$applicant_other_income_when_rcvd=$_GET['applicant_other_income_when_rcvd'];  //Monthly
$applilcant_v_financed_amount=$_GET['applilcant_v_financed_amount'];  //9420
$applilcant_v_term_months=$_GET['applilcant_v_term_months'];  //48
$applilcant_v_cust_rate=$_GET['applilcant_v_cust_rate'];  //
$applilcant_v_total_monthpmts_est=$_GET['applilcant_v_total_monthpmts_est'];  //Your+Score+Is+Missing$Fees=$_GET[''];  //285
$SellingPrice=$_GET['SellingPrice'];  //9420
$applilcant_v_trade_year=$_GET['applilcant_v_trade_year'];  //1999
$applilcant_v_trade_make=$_GET['applilcant_v_trade_make'];  //GMC
$applilcant_v_trade_model=$_GET['applilcant_v_trade_model'];  //Yukon
$applilcant_v_trade_vin=$_GET['applilcant_v_trade_vin'];  //17Digit+VIN
$DownPayment=$_GET['DownPayment'];

// This signifies if the customer is wiling to do this deal to day, treat this value with a different response maybel.


$cust_comment= ' Estimated Payment for this lead: $'.$applilcant_v_total_monthpmts_est.' Comments : '.$cust_comment;

'<br>';

/*
	cust_home_zip
	cust_home2_zip
	cust_employer_addr1
	cust_employer_addr2
	cust_employer_city
	cust_employer_state
	cust_employer_zip

*/

	$InsertLeadFromDealMatrix = "INSERT INTO cust_leads
									(cust_lead_token, cust_titlename, cust_fname, cust_mname, cust_lname, cust_name_suffix, customer_sex, cust_email, cust_lead_temperature, cust_status, cust_phoneno, cust_phonetype, cust_mobilephone, cust_homephone, cust_workphone, cust_lead_source_id, cust_lead_source, cust_dealer_id, cust_vehicle_id, cust_home_address, cust_home_address2, cust_home_city, cust_home_state, cust_home_zip,	 cust_home_county, cust_home_live_years, cust_home_live_months, cust_employer_name, 	cust_employer_addr1, cust_employer_addr2, cust_employer_city, cust_employer_state, cust_employer_zip, cust_employer_phone, cust_employer_years, cust_employer_months, cust_gross_income, cust_gross_income_frequency, cust_other_income, cust_gross_other_income_frequency, cust_downpayment, cust_comment)
								  values
								  	('$mytoken', '$cust_titlename', '$FirstName', '$MiddleName', '$LastName', '$Suffix',
									 '$sex', '$cust_email', '$cust_lead_temperature', '$cust_status', '$cust_phoneno', '$cust_phonetype', '$cust_phoneno',	'$cust_phoneno', '$cust_workphone', '$cust_lead_source_id', '$fromsource', '$did', '$vid', '$Address1', '$$Address2', '$City', '$State', '$Zip', '$County', '$LiveYears', '$LiveMonths', '$EmployerName', '$EmployerAddr1', '$$EmployerAddr2', '$EmployerCity', '$EmployerState', '$EmployerZip', '$EmployerPhoneNo', '$workYears', '$workMonths', '$income', '$paydayFreq', '$applicant_other_income_amount', '$applicant_other_income_when_rcvd', '$DownPayment', '$cust_comment')
	";
	
	
	
		$InsertLeadWFHFromDealMatrix = "INSERT INTO cust_leads
									(dealerwhoDeleted, cust_lead_token, cust_titlename, cust_fname, cust_mname, cust_lname, cust_name_suffix, customer_sex, cust_email, cust_lead_temperature, cust_status, cust_phoneno, cust_phonetype, cust_mobilephone, cust_homephone, cust_workphone, cust_lead_source_id, cust_lead_source, cust_dealer_id, cust_vehicle_id, cust_home_address, cust_home_address2, cust_home_city, cust_home_state, cust_home_zip,	 cust_home_county, cust_home_live_years, cust_home_live_months, cust_employer_name, 	cust_employer_addr1, cust_employer_addr2, cust_employer_city, cust_employer_state, cust_employer_zip, cust_employer_phone, cust_employer_years, cust_employer_months, cust_gross_income, cust_gross_income_frequency, cust_other_income, cust_gross_other_income_frequency, cust_downpayment, cust_comment)
								  values
								  	('$did', '$mytoken', '$cust_titlename', '$FirstName', '$MiddleName', '$LastName', '$Suffix',
									 '$sex', '$cust_email', '$cust_lead_temperature', '$cust_status', '$cust_phoneno', '$cust_phonetype', '$cust_phoneno',	'$cust_phoneno', '$cust_workphone', '$cust_lead_source_id', '$fromsource', '2', '$vid', '$Address1', '$$Address2', '$City', '$State', '$Zip', '$County', '$LiveYears', '$LiveMonths', '$EmployerName', '$EmployerAddr1', '$$EmployerAddr2', '$EmployerCity', '$EmployerState', '$EmployerZip', '$EmployerPhoneNo', '$workYears', '$workMonths', '$income', '$paydayFreq', '$applicant_other_income_amount', '$applicant_other_income_when_rcvd', '$DownPayment', '$cust_comment')
	";
	
	
	
	//$InsertLeadFromDealMatrix;
	
	$insertSQL = mysqli_query($idsconnection_mysqli, $InsertLeadFromDealMatrix);
	
	$insertWFHSQL = mysqli_query($idsconnection_mysqli, $InsertLeadWFHFromDealMatrix);

?>