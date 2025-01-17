// JavaScript Document
$(document).ready(function(){

//console.log('ajax_vehiclecontrols.js Loaded');

//alert('ajax_vehiclecontrols.js Loaded');

var mycarousel = $('div#my-carousel').html();

var access_id = $('input#access_id').val()

	if(!access_id){
	}else{

		FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email'}, function(response){
			//document.getElementByID('status').innerHTML = response.id;
			var access_id = response.id;			
			var approval_fname = response.first_name;
			var approval_lname = response.last_name;
			var cust_nickname = response.name;
			var approval_email = response.email;

			$('input#access_id').val(access_id);
			$('input#cust_nickname').val(cust_nickname);
			$('input#cust_fname').val(approval_fname);
			$('input#cust_lname').val(approval_lname);
			$('input#cust_email').val(approval_email);
			$('input#email_login').val(approval_email);
			var approval_phoneno = $('input#approval_phoneno').val();
			var callphone = $('input#callphone').val();
			
			if(!approval_phoneno){  }else{ 
				if(!callphone){
					$('input#callphone').val(approval_phoneno);
				}
					
			}
			
		});
		
		
	}





		$('select#tradeMake').on('change', function(data){
		
				var slct_tradeMake = document.getElementById("tradeMake");
				var tradeMake = slct_tradeMake.options[slct_tradeMake.selectedIndex].value;
		
		
				
				$.post('ajax/displaymodels.php', {themake: tradeMake}, function(data){
								
								$('select#tradeModel').html(data);
				});
		
		});


		
		
		
		$('button#leadbuton').on('click', function(){

				 run_thisdeal();

		});		











}); //End Document Ready

function run_thisdeal(){

												   

            var cust_dealer_id = $('input#cust_dealer_id').val();
            var cust_vehicle_id = $('input#cust_vehicle_id').val();
            var cust_lead_source_id = $('input#cust_lead_source_id').val();
            var cust_lead_source = $('input#cust_lead_source').val();
            var cust_lead_token = $('input#cust_lead_token').val(); 

		
			var cust_email = $('input#cust_email').val();
		
		
			var cust_phoneno = $('input#callphone').val();


			var slct_cust_phonetype = document.getElementById("cust_phonetype");
			var cust_phonetype = slct_cust_phonetype.options[slct_cust_phonetype.selectedIndex].value;
			var cust_phonetype_txt = slct_cust_phonetype.options[slct_cust_phonetype.selectedIndex].text;
			
			if(cust_phonetype == 'home'){ 
							var cust_homephone = $('input#callphone').val();
							var cust_mobilephone = '';
							var cust_workphone = '';
				}else if(cust_phonetype == 'mobile'){
							var cust_homephone = '';
							var cust_mobilephone = $('input#callphone').val();
							var cust_workphone = '';
					}else if(cust_phonetype == 'work'){
							var cust_homephone = '';
							var cust_mobilephone = '';
							var cust_workphone = $('input#callphone').val();
						}else{alert('Phone Number Not Selected'); return false;
				
			}

			var cust_fname = $('input#cust_fname').val();
			var cust_lname = $('input#cust_lname').val();
			var cust_employer_name = $('input#cust_employer_name').val();
			var cust_employer_city = $('input#cust_employer_city').val();

var slct_cust_employer_state = document.getElementById("cust_employer_state");
var cust_employer_state = slct_cust_employer_state.options[slct_cust_employer_state.selectedIndex].value;
var cust_employer_state_txt = slct_cust_employer_state.options[slct_cust_employer_state.selectedIndex].text;

			
			var cust_employer_zip = $('input#cust_employer_zip').val();


			var slct_cust_employer_years = document.getElementById("cust_employer_years");
			var cust_employer_years = slct_cust_employer_years.options[slct_cust_employer_years.selectedIndex].value;
			var cust_employer_years_txt = slct_cust_employer_years.options[slct_cust_employer_years.selectedIndex].text;

			var slct_cust_employer_months = document.getElementById("cust_employer_months");
			var cust_employer_months = slct_cust_employer_months.options[slct_cust_employer_months.selectedIndex].value;
			var cust_employer_months_txt = slct_cust_employer_months.options[slct_cust_employer_months.selectedIndex].text;

			var cust_gross_income = $('input#cust_gross_income').val();

var slct_cust_gross_income_frequency = document.getElementById("cust_gross_income_frequency");
var cust_gross_income_frequency = slct_cust_gross_income_frequency.options[slct_cust_gross_income_frequency.selectedIndex].value;
var cust_gross_income_frequency_txt = slct_cust_gross_income_frequency.options[slct_cust_gross_income_frequency.selectedIndex].text;



			var cust_home_address = $('input#cust_home_address').val();
			var cust_home_city = $('input#cust_home_city').val();


			var slct_cust_home_state = document.getElementById("lead_home_state");
			var cust_home_state = slct_cust_home_state.options[slct_cust_home_state.selectedIndex].value;
			var cust_home_state_txt = slct_cust_home_state.options[slct_cust_home_state.selectedIndex].text;

			var cust_home_city = $('input#cust_home_city').val();
			var cust_home_zip = $('input#cust_home_zip').val();

			var cust_home_county = $('input#cust_home_county').val();

			var slct_cust_home_live_years = document.getElementById("cust_home_live_years");
			var cust_home_live_years = slct_cust_home_live_years.options[slct_cust_home_live_years.selectedIndex].value;
			var cust_home_live_years_txt = slct_cust_home_live_years.options[slct_cust_home_live_years.selectedIndex].text;


			var slct_cust_home_live_months = document.getElementById("cust_home_live_months");
			var cust_home_live_months = slct_cust_home_live_months.options[slct_cust_home_live_months.selectedIndex].value;
			var cust_home_live_months_txt = slct_cust_home_live_months.options[slct_cust_home_live_months.selectedIndex].text;



			if ($('input#tradeYes').is(':checked')) {
				var tradeYes = 'Y';

			}else{
				var tradeYes = 'N';
			}			

			if ($('input#vehicle_available').is(':checked')) {
				var vehicle_available = 'Y';

			}else{
				var vehicle_available = 'N';
			}			

			if ($('input#counter_offer').is(':checked')) {
				var counter_offer = 'Y';

			}else{
				var counter_offer = 'N';
			}			

			if ($('input#warranty').is(':checked')) {
				var warranty = 'Y';

			}else{
				var warranty = 'N';
			}			

			if ($('input#cust_dealtoday').is(':checked')) {
				var cust_dealtoday = 'Y';

			}else{
				var cust_dealtoday = 'N';
			}			

			if ($('input#accept_terms').is(':checked')) {
				var accept_terms = 'Y';

			}else{
				var accept_terms = 'N';
			}			


			var slct_tradeYear = document.getElementById("tradeYear");
			var tradeYear = slct_tradeYear.options[slct_tradeYear.selectedIndex].value;
			var tradeYear_txt = slct_tradeYear.options[slct_tradeYear.selectedIndex].text;

			var slct_tradeMake = document.getElementById("tradeMake");
			var tradeMake = slct_tradeMake.options[slct_tradeMake.selectedIndex].value;
			var tradeMake_txt = slct_tradeMake.options[slct_tradeMake.selectedIndex].text;

			var slct_tradeModel = document.getElementById("tradeModel");
			var tradeModel = slct_tradeModel.options[slct_tradeModel.selectedIndex].value;
			var tradeModel_txt = slct_tradeModel.options[slct_tradeModel.selectedIndex].text;

			var tradeTrim = $('input#tradeTrim').val();
			
			var tradeMiles = $('input#tradeMiles').val();

			var counter_offer2 = $('input#counter_offer2').val();

			console.log('cust_phonetype: '+cust_phonetype);
			
			
			console.log('cust_phonetype_txt: '+cust_phonetype_txt);
			
			
			
			//cust_phonetype = parseInt(cust_phonetype);

	var budget_afford = $('input#budget_afford').val();
	var gross_monthlyincome = $('input#gross_monthlyincome').val();
	var cust_creditapr = $('input#cust_creditapr').val();
	var cust_creditapr_txt = $('input#cust_creditapr_txt').val();
	

	var wfhuserperm_token = $('input#wfhcookiesesid').val();
	var wfhuser_id = $('input#wfhuser_id').val();

	var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
	var wfhuserperm_approval_fname = $('input#approval_fname').val();
	var wfhuserperm_approval_lname = $('input#approval_lname').val();
	var wfhuserperm_approval_email = $('input#approval_email').val();
	var wfhuserperm_approval_phone = $('input#approval_phoneno').val();
	var wfhuserperm_fbid = $('input#access_id').val();
	var wfhuserperm_timezone = $('input#wfhuserperm_timezone').val();
	
	var bigPrincipal = $('input#bigPrincipal').val();

	var cust_totalpayments = $('input#cust_totalpayments').val();
	var cust_downpayment = $('input#cust_downpayment').val();
	var cust_desiredpymt = $('input#cust_desiredpymt').val();
	var cust_desiredtermos = $('input#cust_desiredtermos').val();
	var cust_car_loan = $('input#cust_car_loan').val();
	var risk_factor_lvl = $('input#risk_factor_lvl').val();


	var slct_appointment_day = document.getElementById("appointment_day");
	var appointment_day = slct_appointment_day.options[slct_appointment_day.selectedIndex].value;

	var slct_appointment_hours = document.getElementById("appointment_hours");
	var appointment_hours = slct_appointment_hours.options[slct_appointment_hours.selectedIndex].value;

	
	
	var unixtime_stapappoint_start = appointment_day+' '+appointment_hours;
	
	//$('input#unixtime_stapappoint_start').val(unixtime_stapappoint_start);
	
	var appt_changed_q = $('input#appt_changed_q').val();

	
			$.post('script_process_startvlead.php?v='+cust_vehicle_id, {
						budget_afford: budget_afford,
						gross_monthlyincome: gross_monthlyincome,
						cust_creditapr: cust_creditapr,
						cust_creditapr_txt: cust_creditapr_txt,
						wfhuserperm_token: wfhuserperm_token,
						wfhuser_id: wfhuser_id,
						wfhuser_approval_id: wfhuser_approval_id,
						wfhuserperm_approval_fname: wfhuserperm_approval_fname,
						wfhuserperm_approval_lname: wfhuserperm_approval_lname,
						gross_monthlyincome: gross_monthlyincome,
						wfhuserperm_approval_email: wfhuserperm_approval_email,
						wfhuserperm_approval_phone:  wfhuserperm_approval_phone,
						wfhuserperm_fbid: wfhuserperm_fbid,
						wfhuserperm_timezone: wfhuserperm_timezone,
						bigPrincipal: bigPrincipal,
						cust_totalpayments: cust_totalpayments,
						cust_downpayment: cust_downpayment,
						cust_desiredpymt: cust_desiredpymt,
						cust_desiredtermos: cust_desiredtermos,
						cust_car_loan: cust_car_loan,
						risk_factor_lvl: risk_factor_lvl,
						cust_dealer_id: cust_dealer_id,
						cust_vehicle_id: cust_vehicle_id, 
						cust_lead_source_id: cust_lead_source_id, 
						cust_lead_source: cust_lead_source, 
						cust_lead_token: cust_lead_token,  
						cust_email: cust_email, 
						cust_phoneno: cust_phoneno, 
						cust_phonetype: cust_phonetype,
						cust_phonetype_txt: cust_phonetype_txt,
						cust_homephone: cust_homephone, 
						cust_mobilephone: cust_mobilephone,
						cust_workphone: cust_workphone,
						cust_fname: cust_fname, 
						cust_lname: cust_lname, 
						cust_employer_name: cust_employer_name, 
						cust_employer_city: cust_employer_city, 
						cust_employer_state: cust_employer_state,
						cust_employer_state_txt: cust_employer_state_txt,
						cust_employer_zip: cust_employer_zip, 
						cust_employer_years: cust_employer_years,
						cust_employer_years_txt: cust_employer_years,
						cust_employer_months: cust_employer_months,
						cust_employer_months_txt: cust_employer_months_txt,
						cust_gross_income: cust_gross_income, 
						cust_gross_income_frequency: cust_gross_income_frequency,
						cust_gross_income_frequency_txt: cust_gross_income_frequency,
						cust_home_address: cust_home_address, 
						cust_home_city: cust_home_city, 
						cust_home_state: cust_home_state,
						cust_home_state_txt: cust_home_state_txt,
						cust_home_city: cust_home_city, 
						cust_home_zip: cust_home_zip, 
						cust_home_county: cust_home_county, 
						cust_home_live_years: cust_home_live_years,
						cust_home_live_years_txt: cust_home_live_years,
						cust_home_live_months: cust_home_live_months,
						cust_home_live_months: cust_home_live_months,
						cust_home_live_months_txt: cust_home_live_months,
						tradeYear: tradeYear,
						tradeMake: tradeMake,
						tradeModel: tradeModel,
						tradeTrim: tradeTrim, 
						tradeMiles: tradeMiles,
						counter_offer2: counter_offer2,
						tradeYes: tradeYes,
						vehicle_available: vehicle_available,
						counter_offer: counter_offer,
						warranty: warranty,
						cust_dealtoday: cust_dealtoday,
						unixtime_stapappoint_start: unixtime_stapappoint_start,
						appt_changed_q: appt_changed_q,
						accept_terms: accept_terms
						}, function(data){ console.log('Ajaxed Deal Capture: '+data); });
			
		
		



}