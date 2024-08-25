<?php

// This is to create a Deal Matrix LEAD
// Using Insert Method

/*
$insertinto = "INSERT INTO vehicle_photos 
					(vehicle_id, dealer_id, vehicleVin, photo_file_name, 
					 photo_file_path, impPhotoFilePath, 
					 photo_thumb_fname, photo_thumb_fpath) 
					values 
					('$vid', '$did', '$vvin', '$filenameRename',
					 '$vphotoPath', '$oldfile2',
					 '$filenameRename', '$vthumbphotoPath')";
*/

	//This is an update Layout
	
	$InsertLeadFromDealMatrix = "INSERT INTO cust_leads
									(cust_lead_token, cust_titlename, cust_fname, cust_mname, cust_lname, cust_name_suffix, customer_sex, cust_email, cust_lead_temperature, cust_status, cust_phoneno, cust_phonetype, cust_mobilephone, cust_homephone, cust_workphone, cust_lead_source_id, cust_lead_source, cust_dealer_id, cust_vehicle_id, cust_home_address, cust_home_address2, cust_home_city, cust_home_state, cust_home_zip,	 cust_home_county, cust_home_live_years, cust_home_live_months, cust_employer_name, cust_employer_phone, cust_employer_years, cust_employer_months, cust_gross_income, cust_gross_income_frequency, cust_other_income, cust_gross_other_income_frequency, cust_downpayment, cust_dealtoday)
								  values
								  	('$mytoken', '$cust_titlename', '$FirstName', '$MiddleName', '$LastName', '$Suffix',
									 '$sex', '$cust_email', '$cust_lead_temperature', '$cust_status' '$cust_phoneno', '$cust_phonetype', '$cust_phoneno',	'$cust_phonetype', '$cust_mobilephone', '$cust_mobilephone', '$cust_workphone',	'$cust_lead_source_id', '$fromsource', '$did', '$vid', '$Address1', '$$Address2', '$City', '$State', '$Zip', '$County', '$LiveYears', '$LiveMonths', '$EmployerName', '$EmployerPhoneNo', '$workYears', '$workMonths', '$income', '$paydayFreq', '$applicant_other_income_amount', '$applicant_other_income_when_rcvd', '$DownPayment', '$cust_dealtoday')
	";
	
	echo '<br>';
	echo $InsertLeadFromDealMatrix;
	
	/*
	cust_leadid,
	datetimeDeleted
	dealerwhoDeleted
	cust_token
	cust_titlename
	cust_nickname
	cust_fname
	cust_mname
	cust_lname
	cust_name_suffix
	customer_sex
	cust_email
	cust_ssn
	cust_ssn_4
	cust_perf_commun
	cust_lead_temperature
	cust_status
	cust_phoneno
	cust_phonetype
	cust_mobilephone
	cust_homephone
	cust_workphone
	cust_faxphone
	cust_comment
	cust_lead_sp_comment
	cust_email_subject
	cust_lead_type
	cust_lead_source_id
	cust_lead_source
	cust_dealer_id
	cust_vehicle_id
	cust_salesperson_id
	cust_salesperson2_id
	cust_lead_created_at
	cust_lead_modified_at
	cust_schedule_td
	cust_date_td
	cust_hour_td
	cust_min_td
	cust_ampm_td
	cust_lead_token
	cust_home_address
	cust_home_address2
	cust_home_address3
	cust_home_city
	cust_home_state
	cust_home_zip
	cust_home_county
	cust_home_live_years
	cust_home_live_months
	cust_employer_name
	cust_employer_addr1
	cust_employer_addr2
	cust_employer_city
	cust_employer_state
	cust_employer_zip
	cust_employer_phone
	cust_supervisors_name
	cust_supervisors_phone
	cust_supervisors_ext
	cust_employer_years
	cust_employer_months
	cust_gross_income
	cust_gross_income_frequency
	cust_other_income
	cust_gross_other_income_frequency
	cust_downpayment
	cust_dealtoday

*/


?>