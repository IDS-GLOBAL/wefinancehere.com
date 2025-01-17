// JavaScript Document
$(document).ready(function(){



	$('select#tradeMake').on('change', function(data){
	
			var slct_tradeMake = document.getElementById("tradeMake");
			var tradeMake = slct_tradeMake.options[slct_tradeMake.selectedIndex].value;

	
			
			$.post('ajax/displaymodels.php', {themake: tradeMake}, function(data){
							
							$('select#tradeModel').html(data);
			});
	
	});


		$("button#leadbuton_1").on('click', function(){
		
			var wfhuser_approval_id = $("input#wfhuser_approval_id").val();
			if(!wfhuser_approval_id){
				// Alert Visitor We Don't Have An Approval
				//send_lead();
				console.log('Approval Missing');
				 check_for_approval();				
				
				
			}else{
				// Send Information
				send_lead();
				$('div#analyst_answerbox').hide();
			}
		
		});
		
		
		$('button#leadbuton').on('click', function(){
												   

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




			
			$.post('script_process_vlead.php', {
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
						accept_terms: accept_terms
						}, function(data){ console.log(data); });
			
		});		
		
		

		});

function send_lead(){
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




			
			$.post('script_process_vlead.php', {
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
						accept_terms: accept_terms
						}, function(data){ console.log(data); });
			
}




function check_for_approval(){



			var wfhuser_approval_id = $("input#wfhuser_approval_id").val();
			if(!wfhuser_approval_id){
				// Alert Visitor We Don't Have An Approval
				//send_lead();
				console.log('Approval Missing');
				
					swal({
						title: "Your Missing A Pre-Approval?",
						text: "Sorry You Have Not Set A Pre-Approval Yet!",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#9bc23c",
						confirmButtonText: "Yes, Let Me set One!",
						closeOnConfirm: false,
						closeOnCancel: true },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal("Sent!", "Your Request Has Been Set And We Are Beginning Your Process.", "success");
											send_lead();

                        } else {
                            swal("Sent Without a Pre-Approval", "You Will Continue With A Pre-Approval :)", "error");
											send_lead();

                        }
					});
				
			}else{
				// Send Information
				console.log('Approval SET!');

				send_lead();
			}





}