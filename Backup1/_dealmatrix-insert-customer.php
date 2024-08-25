<?php

// This is to create a Deal Matrix Customer
// Using Insert Method



customer_id	bigint(20)			No	None	auto_increment	 	 	 	 	 	 	
	customer_leads_id	int(20)			Yes	NULL		 	 	 	 	 	 	
	customer_no	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer_dayhunt	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer_dealer_id	int(20)			Yes	NULL		 	 	 	 	 	 	
	customer_sales_person_id	bigint(20)			Yes	NULL		 	 	 	 	 	 	
	customer_sales_person2_id	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer_fnimgr_id	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer_slsmgr_id	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer_vehicles_id	bigint(20)			Yes	NULL		 	 	 	 	 	 	
	customer_testimony_id	bigint(20)			Yes	NULL		 	 	 	 	 	 	
	customer_token_id	varchar(500)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_facebook_id	varchar(500)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_username	varchar(25)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_password	varchar(25)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_status	varchar(15)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_type	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer_created_at	timestamp			No	CURRENT_TIMESTAMP		 	 	 	 	 	 	
	customer_date_modified	varchar(20)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_title	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_fname	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_mname	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_lname	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_suffix	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_sex	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_email	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_dlstate	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_dlno	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_dlexpdate	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_dob	varchar(20)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_ssn	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer_perf_commun	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_lead_temperature	varchar(10)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_phoneno	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_phonetype	varchar(20)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_cellphone	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_comment	longtext	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_schedule_td	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer_date_td	varchar(20)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_hour_td	varchar(20)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_min_td	varchar(20)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_ampm_td	varchar(20)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_home_addr1	varchar(150)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_home_addr2	varchar(150)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_home_city	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_home_state	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_home_zip	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_home_county	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_home_live_years	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_home_live_months	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_employer_name	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_employer_addr1	int(150)			Yes	NULL		 	 	 	 	 	 	
	customer_employer_addr2	int(150)			Yes	NULL		 	 	 	 	 	 	
	customer_employer_city	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_employer_state	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_employer_zip	varchar(15)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_employer_phone	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_supervisors_name	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_supervisors_phone	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_supervisors_phone_ext	varchar(10)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_employer_hiredate	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_employer_years	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_employer_months	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer_gross_income	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_net_income	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer_income_frequency	varchar(50)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	titleconjucation	varchar(5)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer2_relationship	varchar(15)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer2_title	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_fname	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_mname	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_lname	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_suffix	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_sex	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_email	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_dlstate	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_dlno	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_dlexpdate	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_dob	varchar(20)	utf8_unicode_ci		Yes	NULL		 	 	 	 	 	 	 
	customer2_ssn	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer2_phoneno	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_cellphone	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_home_addr1	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_home_addr2	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_home_city	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_home_state	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_home_zip	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_home_county	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_home_live_years	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_home_live_months	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_name	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_addr1	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_addr2	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_city	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_state	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_zip	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_phone	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_supervisors_name	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_supervisors_phone	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_supervisors_phone_ext	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_hiredate	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_years	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_employer_months	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_gross_income	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_net_income	text	utf8_unicode_ci		Yes	NULL		 	 	 				 
	customer2_income_frequency
?>