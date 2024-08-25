// JavaScript Document
$(document).ready(function(){

		
		$("button#goSubmit1").click(function(){
		
			//alert('Clicked Quick Submit');
			
			shoot_quick();
			thankyou();
		});


		$("button#CompleteApp").click(function(){
		
			//alert('Clicked Full Submit');
			
			shoot_full();
			thankyou();

		});


		$("button#goStep2").click(function(){
		
			//alert('Clicked Full Submit');
			
			shoot_full();

		});

		$("button#goStep3").click(function(){
		
			//alert('Clicked Full Submit');
			
			shoot_full();

		});

		$("button#goStep4").click(function(){
		
			//alert('Clicked Full Submit');
			
			shoot_full();

		});


		$("button#goStep5").click(function(){
		
			//alert('Clicked Full Submit');
			
			shoot_full();

		});



		

		


});

function thankyou(){
		var token = $('input#token').val();
		
		//window.location.replace("thank-you.php?token="+token);

}



function shoot_quick(){

		var cust_vehicle_id = $('input#cust_vehicle_id').val();


		var slct_title_name = document.getElementById("title_name");
		var title_name = slct_title_name.options[slct_title_name.selectedIndex].value;

		var token = $('input#token').val();
		var fname = $('input#first_name').val();
		var mname = $('input#middle_name').val();
		var lname = $('input#last_name').val();
		
		var nickname = fname + ' ' + lname;
		
		var mobile_phone = $('input#mobile_phone').val();
		
		var per_email = $('input#per_email').val();
		
		var traffic_source = $('input#traffic_source').val();
		
		
		//Quick Apply
		var quick_homeaddr = $('input#quick_homeaddr').val();
		
		var quick_homecity = $('input#quick_homecity').val();
		
		
				
		var slct_quick_homestate = document.getElementById("quick_homestate");
		var quick_homestate = slct_quick_homestate.options[slct_quick_homestate.selectedIndex].value;
		
		var quick_homezip = $('input#quick_homezip').val();
		
		var slct_qkhome_years =  document.getElementById("qkhome_years");
		var qkhome_years = slct_qkhome_years.options[slct_qkhome_years.selectedIndex].value;
		
		var slct_qkhome_months = document.getElementById("qkhome_months");
		var qkhome_months = slct_qkhome_months.options[slct_qkhome_months.selectedIndex].value;
		
		var quick_empname = $('input#quick_empname').val();
		
		var quick_moincome = $('input#quick_moincome').val();
		
		var slct_employer_years = document.getElementById("employer_years");
		var employer_years = slct_employer_years.options[slct_employer_years.selectedIndex].value;
		
		var slct_employer_months = document.getElementById("employer_months");
		var employer_months = slct_employer_months.options[slct_employer_months.selectedIndex].value;
		//End Quick Apply

		$.post('script_applyquick.logic.php', {cust_vehicle_id: cust_vehicle_id,  token: token, fname: fname, mname: mname, lname: lname, nickname: nickname, mobile_phone: mobile_phone, per_email: per_email, traffic_source: traffic_source, quick_homeaddr: quick_homeaddr, quick_homecity: quick_homecity, quick_homestate: quick_homestate, quick_homezip: quick_homezip, qkhome_years: qkhome_years, qkhome_months: qkhome_months, quick_empname: quick_empname, quick_moincome: quick_moincome, employer_years: employer_years, employer_months: employer_months},
			   function(result) {
				   //$('#centerResult').html(result).show();
				   console.log(result);
				});


}





function shoot_full(){
	
		var cust_vehicle_id = $('input#cust_vehicle_id').val();
		
		var token = $('input#token').val();

		var slct_title_name = document.getElementById("title_name");
		var title_name = slct_title_name.options[slct_title_name.selectedIndex].value;

		var fname = $('input#first_name').val();
		var mname = $('input#middle_name').val();
		var lname = $('input#last_name').val();
		
		var nickname = fname + ' ' + lname;
		
		var mobile_phone = $('input#mobile_phone').val();
		
		var per_email = $('input#per_email').val();
		
		var traffic_source = $('input#traffic_source').val();
		
		
		//Quick Apply
		var quick_homeaddr = $('input#quick_homeaddr').val();
		
		var quick_homecity = $('input#quick_homecity').val();
		
		//var quick_homestate = $('select#quick_homestate').val();
		
		var slct_quick_homestate = document.getElementById("quick_homestate");
		var quick_homestate = slct_quick_homestate.options[slct_quick_homestate.selectedIndex].value;
		
		var quick_homezip = $('input#quick_homezip').val();
		
		var slct_employer_years =  document.getElementById("employer_years");
		var employer_years = slct_employer_years.options[slct_employer_years.selectedIndex].value;
		
		var slct_employer_months = document.getElementById("employer_months");
		var employer_months = slct_employer_months.options[slct_employer_months.selectedIndex].value;
		
		var quick_empname = $('input#quick_empname').val();
		
		var quick_moincome = $('input#quick_moincome').val();
		
		var slct_employer_years = document.getElementById("employer_years");
		var employer_years = slct_employer_years.options[slct_employer_years.selectedIndex].value;
		
		var slct_employer_months = document.getElementById("employer_months");
		var employer_months = slct_employer_months.options[slct_employer_months.selectedIndex].value;


		//var leadcomments = $('input#lead_comment').val();

		//End Quick Apply
		

		$.post('script_applyfull.logic.php', {cust_vehicle_id: cust_vehicle_id,  token: token, fname: fname, mname: mname, lname: lname, nickname: nickname, mobile_phone: mobile_phone, per_email: per_email, traffic_source: traffic_source, quick_homeaddr: quick_homeaddr, quick_homecity: quick_homecity, quick_homestate: quick_homestate, quick_homezip: quick_homezip, employer_years: employer_years, employer_months: employer_months, quick_empname: quick_empname, quick_moincome: quick_moincome, employer_years: employer_years, employer_months: employer_months},
			   function(result) {
				   //$('#centerResult').html(result).show();
				   console.log(result);
				});
		
	
		
				//Start Full Apply
				
				//Start Step 2
				var applicant_present_address1 = $('input#applicant_present_address1').val();
				var applicant_present_address2 = $('input#applicant_present_address2').val();
				var applicant_present_addr_city = $('input#applicant_present_addr_city').val();
				var applicant_present_addr_state = $('input#applicant_present_addr_state').val();
				var applicant_present_addr_zip = $('input#applicant_present_addr_zip').val();
				
var slct_applicant_previous1_live_years = document.getElementById('applicant_previous1_live_years');
var applicant_previous1_live_years = slct_applicant_previous1_live_years.options[slct_applicant_previous1_live_years.selectedIndex].value;
				
				
				var applicant_house_payment = $('input#applicant_house_payment').val();
				
var slct_applicant_addr_years = document.getElementById("applicant_addr_years");
var applicant_addr_years = slct_applicant_addr_years.options[slct_applicant_addr_years.selectedIndex].value;

var slct_applicant_addr_months = document.getElementById("applicant_addr_months");
var applicant_addr_months = slct_applicant_addr_months.options[slct_applicant_addr_months.selectedIndex].value;



				var applicant_previous1_addr1 = $('input#applicant_previous1_addr1').val();
				var applicant_previous1_addr2 = $('input#applicant_previous1_addr2').val();
				var applicant_previous1_addr_city = $('input#applicant_previous1_addr_city').val();
				
var slct_applicant_previous1_addr_state = document.getElementById("applicant_previous1_addr_state");
var applicant_previous1_addr_state = slct_applicant_previous1_addr_state.options[slct_applicant_previous1_addr_state.selectedIndex].value;
				
				var applicant_previous1_addr_zip = $('input#applicant_previous1_addr_zip').val();

var slct_applicant_previous1_live_years = document.getElementById("applicant_previous1_live_years");
var applicant_previous1_live_years = slct_applicant_previous1_live_years.options[slct_applicant_previous1_live_years.selectedIndex].value;


var slct_applicant_previous1_live_months = document.getElementById("applicant_previous1_live_months");
var applicant_previous1_live_months = slct_applicant_previous1_live_months.options[slct_applicant_previous1_live_months.selectedIndex].value;

var slct_residence_changes = document.getElementById("residence_changes");
var residence_changes = slct_residence_changes.options[slct_residence_changes.selectedIndex].value;

// End Step 2

// Start Step 3

var slct_applicant_employment_status = document.getElementById("applicant_employment_status");
var applicant_employment_status = slct_applicant_employment_status.options[slct_applicant_employment_status.selectedIndex].value;

		var applicant_employer1_position = $('input#applicant_employer1_position').val();
		
		var applicant_employer1_name = $('input#applicant_employer1_name').val();
		
		var applicant_employer1_phone = $('input#applicant_employer1_phone').val();
		
		var applicant_employer1_addr = $('input#applicant_employer1_addr').val();
		
		var applicant_employer1_city = $('input#applicant_employer1_city').val();
		
var slct_applicant_employer1_state = document.getElementById("applicant_employer1_state");
var applicant_employer1_state = slct_applicant_employer1_state.options[slct_applicant_employer1_state.selectedIndex].value;

var applicant_employer1_zip = $('input#applicant_employer1_zip').val();

var applicant_employer1_salary_bringhome = $('input#applicant_employer1_salary_bringhome').val();

var slct_applicant_employer1_work_years = document.getElementById("applicant_employer1_work_years");
var applicant_employer1_work_years = slct_applicant_employer1_work_years.options[slct_applicant_employer1_work_years.selectedIndex].value;

var slct_applicant_employer1_work_months = document.getElementById("applicant_employer1_work_months");
var applicant_employer1_work_months = slct_applicant_employer1_work_months.options[slct_applicant_employer1_work_months.selectedIndex].value;


//Second Part Step 3
var slct_applicant_employment_status2 = document.getElementById("applicant_employment_status2");
var applicant_employment_status2 = slct_applicant_employment_status2.options[slct_applicant_employment_status2.selectedIndex].value;

var applicant_employer2_position = $('input#applicant_employer2_position').val();

var applicant_employer2_name = $('input#applicant_employer2_name').val();
var applicant_employer2_phone = $('input#applicant_employer2_phone').val();
var applicant_employer2_addr = $('input#applicant_employer2_addr').val();
var applicant_employer2_city = $('input#applicant_employer2_city').val();



var slct_applicant_employer2_state = document.getElementById("applicant_employer2_state");
var applicant_employer2_state = slct_applicant_employer2_state.options[slct_applicant_employer2_state.selectedIndex].value;

var applicant_employer2_zip = $('input#applicant_employer2_zip').val();

var slct_applicant_employer2_work_years = document.getElementById("applicant_employer2_work_years");
var applicant_employer2_work_years = slct_applicant_employer2_work_years.options[slct_applicant_employer2_work_years.selectedIndex].value;

var slct_applicant_employer2_work_months = document.getElementById("applicant_employer2_work_months");
var applicant_employer2_work_months = slct_applicant_employer2_work_months.options[slct_applicant_employer2_work_months.selectedIndex].value;

var slct_job_changes = document.getElementById("job_changes");
var job_changes = slct_job_changes.options[slct_job_changes.selectedIndex].value;

// End Step 3


// Start Step 4
var user_applicant_employer_notes = $('textarea#user_applicant_employer_notes').val();
var applilcant_v_stockno = $('input#applilcant_v_stockno').val();
var purchase_ymk = $('input#purchase_ymk').val();


var slct_applilcant_v_year = document.getElementById("applilcant_v_year");
var applilcant_v_year = slct_applilcant_v_year.options[slct_applilcant_v_year.selectedIndex].value;

var slct_applilcant_v_make = document.getElementById("applilcant_v_make");
var applilcant_v_make = slct_applilcant_v_make.options[slct_applilcant_v_make.selectedIndex].value;

var slct_applilcant_v_model = document.getElementById("applilcant_v_model");
var applilcant_v_model = slct_applilcant_v_model.options[slct_applilcant_v_model.selectedIndex].value;

var slct_currently_ownvehicle = document.getElementById("currently_ownvehicle");
var currently_ownvehicle = slct_currently_ownvehicle.options[slct_currently_ownvehicle.selectedIndex].value;


var applilcant_v_cash_down = $('input#applilcant_v_cash_down').val();

var desired_mo_payment = $('input#desired_mo_payment').val();

var slct_appt_month = document.getElementById("appt_month");
var appt_month = slct_appt_month.options[slct_appt_month.selectedIndex].value;

var slct_appt_days = document.getElementById("appt_days");
var appt_days = slct_appt_days.options[slct_appt_days.selectedIndex].value;

var slct_appt_year = document.getElementById("appt_year");
var appt_year = slct_appt_year.options[slct_appt_year.selectedIndex].value;


var slct_applilcant_v_trade_year = document.getElementById("applilcant_v_trade_year");
var applilcant_v_trade_year = slct_applilcant_v_trade_year.options[slct_applilcant_v_trade_year.selectedIndex].value;


var slct_applilcant_v_trade_make = document.getElementById("applilcant_v_trade_make");
var applilcant_v_trade_make = slct_applilcant_v_trade_make.options[slct_applilcant_v_trade_make.selectedIndex].value;

var slct_applilcant_v_trade_model = document.getElementById("applilcant_v_trade_model");
var applilcant_v_trade_model = slct_applilcant_v_trade_model.options[slct_applilcant_v_trade_model.selectedIndex].value;

var slct_currently_ownvehicle = document.getElementById("currently_ownvehicle");
var currently_ownvehicle = slct_currently_ownvehicle.options[slct_currently_ownvehicle.selectedIndex].value;

var applilcant_v_trade_lien_holder_name = $('input#applilcant_v_trade_lien_holder_name').val();

var current_carpayment = $('input#current_carpayment').val();

var slct_pymnthistry_tradevehicle = document.getElementById("pymnthistry_tradevehicle");
var pymnthistry_tradevehicle = slct_pymnthistry_tradevehicle.options[slct_pymnthistry_tradevehicle.selectedIndex].value;

var slct_currently_tradevehicle = document.getElementById("currently_tradevehicle");
var currently_tradevehicle = slct_currently_tradevehicle.options[slct_currently_tradevehicle.selectedIndex].value;

var applilcant_v_trade_owed = $('input#applilcant_v_trade_owed').val();

var currently_reasontradevehicle = $('textarea#currently_reasontradevehicle').val();
// End Step 4


// Start Step 5

var slct_appt_month = document.getElementById("appt_month");
var appt_month = slct_appt_month.options[slct_appt_month.selectedIndex].value;


var slct_appt_days = document.getElementById("appt_days");
var appt_days = slct_appt_days.options[slct_appt_days.selectedIndex].value;


var slct_appt_year = document.getElementById("appt_year");
var appt_year = slct_appt_year.options[slct_appt_year.selectedIndex].value;


var slct_other_income_source = document.getElementById("other_income_source");
var other_income_source = slct_other_income_source.options[slct_other_income_source.selectedIndex].value;

var other_income = $("input#other_income").val();

// End Step 5


// Start Step 6

var applicant_ssn = $("input#applicant_ssn").val();

var applicant_dob = $("input#applicant_dob").val();

var applicant_driver_licenses_number = $("input#applicant_driver_licenses_number").val();
var applicant_driver_state_issued =  $("input#applicant_driver_state_issued").val();

var applicant_driver_licenses_expdate = $("input#applicant_driver_licenses_expdate").val();

// End Step 6
		//alert('Made It This Far');

$.post('xml_longformapplication.php', {cust_vehicle_id: cust_vehicle_id,  token: token, title_name: title_name, fname: fname, mname: mname, lname: lname, nickname: nickname, mobile_phone: mobile_phone, per_email: per_email, traffic_source: traffic_source, quick_homeaddr: quick_homeaddr, quick_homecity: quick_homecity, quick_homestate: quick_homestate, quick_homezip: quick_homezip, employer_years: employer_years, employer_months: employer_months, quick_empname: quick_empname, quick_moincome: quick_moincome, applicant_present_address1: applicant_present_address1, applicant_present_address2: applicant_present_address2, applicant_present_addr_city: applicant_present_addr_city, applicant_present_addr_state: applicant_present_addr_state, applicant_present_addr_zip: applicant_present_addr_zip, applicant_house_payment: applicant_house_payment, applicant_addr_years: applicant_addr_years, applicant_addr_months: applicant_addr_months, applicant_previous1_addr1: applicant_previous1_addr1, applicant_previous1_addr2: applicant_previous1_addr2, applicant_previous1_addr_city: applicant_previous1_addr_city, applicant_previous1_addr_state: applicant_previous1_addr_state, applicant_previous1_addr_zip: applicant_previous1_addr_zip, applicant_previous1_live_years: applicant_previous1_live_years, applicant_previous1_live_months: applicant_previous1_live_months, residence_changes: residence_changes, applicant_employment_status: applicant_employment_status, applicant_employer1_position: applicant_employer1_position, applicant_employer1_name: applicant_employer1_name, applicant_employer1_phone: applicant_employer1_phone, applicant_employer1_addr: applicant_employer1_addr, applicant_employer1_city: applicant_employer1_city, applicant_employer1_state: applicant_employer1_state, applicant_employer1_zip: applicant_employer1_zip, applicant_employer1_salary_bringhome: applicant_employer1_salary_bringhome, applicant_employer1_work_years: applicant_employer1_work_years, applicant_employer1_work_months: applicant_employer1_work_months, applicant_employment_status2: applicant_employment_status2, applicant_employer2_position: applicant_employer2_position, applicant_employer2_name: applicant_employer2_name, applicant_employer2_phone: applicant_employer2_phone, applicant_employer2_addr: applicant_employer2_addr, applicant_employer2_city: applicant_employer2_city, applicant_employer2_state: applicant_employer2_state, applicant_employer2_zip: applicant_employer2_zip, applicant_employer2_work_years: applicant_employer2_work_years, applicant_employer2_work_months: applicant_employer2_work_months, job_changes: job_changes, user_applicant_employer_notes: user_applicant_employer_notes, applilcant_v_stockno: applilcant_v_stockno, purchase_ymk: purchase_ymk, applilcant_v_year: applilcant_v_year, applilcant_v_make: applilcant_v_make, applilcant_v_model: applilcant_v_model, currently_ownvehicle: currently_ownvehicle, applilcant_v_cash_down: applilcant_v_cash_down, desired_mo_payment: desired_mo_payment, appt_month: appt_month, appt_days: appt_days, appt_year: appt_year, applilcant_v_trade_year: applilcant_v_trade_year, applilcant_v_trade_make: applilcant_v_trade_make, applilcant_v_trade_model: applilcant_v_trade_model, currently_ownvehicle: currently_ownvehicle, applilcant_v_trade_lien_holder_name: applilcant_v_trade_lien_holder_name, current_carpayment: current_carpayment, pymnthistry_tradevehicle: pymnthistry_tradevehicle, currently_tradevehicle: currently_tradevehicle, applilcant_v_trade_owed: applilcant_v_trade_owed, currently_reasontradevehicle: currently_reasontradevehicle, appt_month: appt_month, appt_days: appt_days, appt_year: appt_year, other_income_source: other_income_source, other_income: other_income, applicant_ssn: applicant_ssn, applicant_dob: applicant_dob, applicant_driver_licenses_number: applicant_driver_licenses_number, applicant_driver_state_issued: applicant_driver_state_issued, applicant_driver_licenses_expdate: applicant_driver_licenses_expdate},
		   function(result) {
			   //$('#centerResult').html(result).show();
			   //console.log(result);
			});


}









function shoot_toleadtrack(){

		var cust_vehicle_id = $('input#cust_vehicle_id').val();
		
		var token = $('input#token').val();
		

		var slct_title_name = document.getElementById("title_name");
		var title_name = slct_title_name.options[slct_title_name.selectedIndex].value;

		var fname = $('input#first_name').val();
		var mname = $('input#middle_name').val();
		var lname = $('input#last_name').val();
		
		var nickname = fname + ' ' + lname;
		
		var mobile_phone = $('input#mobile_phone').val();
		
		var per_email = $('input#per_email').val();

		var slct_traffic_source = document.getElementById("traffic_source");
		var traffic_source = slct_traffic_source.options[slct_traffic_source.selectedIndex].value;
		
		var leadcomments = $('input#lead_comment').val();


$.post('xml_shortformapplication.php', {cust_vehicle_id: cust_vehicle_id,  token: token, title_name: title_name, fname: fname, mname: mname, lname: lname, nickname: nickname, mobile_phone: mobile_phone, per_email: per_email, traffic_source: traffic_source, leadcomments: leadcomments},
		   function(result) {
			   //$('#centerResult').html(result).show();
			   //console.log(result);
			   
			   thankyou();
			});
}