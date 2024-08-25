// JavaScript Document
$(document).ready(function(){



	$('select#applicant_titlename').on('change', function(){

				var gender = '';
				var slct_applicant_titlename = document.getElementById('applicant_titlename');
				var applicant_titlename = slct_applicant_titlename.options[slct_applicant_titlename.selectedIndex].value;
				
				if(applicant_titlename == 'Mr.'){
					var gender = 'Male';
				}else if(applicant_titlename == 'Dr.'){
					var gender = 'Unknown';					
				}else{
					var gender = 'Female';
				}
			

			
			
			$('input#applicant_gender').val(gender);
			
	});




	$('.easyWizardButtons button.next.btn.btn-default').on('click', function(){
	
		interview_pass();
	
	});

	$('.easyWizardButtons button.submit.btn.btn-primary').on('click', function(){
	
		console.log('Clicked Submit Button');
		interview_pass();
		
		window.location.href = 'interviewcomplete.php';
	});




});

function interview_pass(){
	

				var slct_applicant_titlename = document.getElementById('applicant_titlename');
				var applicant_titlename = slct_applicant_titlename.options[slct_applicant_titlename.selectedIndex].value;




				var slct_applicant_addr_years = document.getElementById('applicant_addr_years');
				var applicant_addr_years = slct_applicant_addr_years.options[slct_applicant_addr_years.selectedIndex].value;
				var slct_applicant_addr_months = document.getElementById('applicant_addr_months');
				var applicant_addr_months = slct_applicant_addr_months.options[slct_applicant_addr_months.selectedIndex].value;


				var slct_applicant_employer1_payday_freq = document.getElementById('applicant_employer1_payday_freq');
				var applicant_employer1_payday_freq = slct_applicant_employer1_payday_freq.options[slct_applicant_employer1_payday_freq.selectedIndex].value;



				var slct_applicant_employer1_work_years = document.getElementById('applicant_employer1_work_years');
				var applicant_employer1_work_years = slct_applicant_employer1_work_years.options[slct_applicant_employer1_work_years.selectedIndex].value;
				
				var slct_applicant_employer1_work_months = document.getElementById('applicant_employer1_work_months');
				var applicant_employer1_work_months = slct_applicant_employer1_work_months.options[slct_applicant_addr_months.selectedIndex].value;




				var applicant_fname = $('input#applicant_fname').val();
				var applicant_mname = $('input#applicant_mname').val();
				var applicant_lname = $('input#applicant_lname').val();
				var applicant_suffixname = $('input#applicant_suffixname').val();
				var applicant_other_name = $('input#applicant_other_name').val();
				var applicant_maiden_name = $('input#applicant_maiden_name').val();
				var applicant_main_phone = $('input#applicant_cell_phone').val();
				var applicant_cell_phone = $('input#applicant_cell_phone').val();
				
				var slct_applicant_mobile_carrier = document.getElementById('applicant_mobile_carrier');
				var applicant_mobile_carrier = slct_applicant_mobile_carrier.options[slct_applicant_mobile_carrier.selectedIndex].value;				
				
				
				
				var applicant_present_address1 = $('input#applicant_present_address1').val();
				var applicant_present_address2 = $('input#applicant_present_address2').val();
				var applicant_present_addr_city = $('input#applicant_present_addr_city').val();
				
				var slct_applicant_present_addr_state = document.getElementById('applicant_present_addr_state');
				var applicant_present_addr_state = slct_applicant_present_addr_state.options[slct_applicant_present_addr_state.selectedIndex].value;

				var applicant_present_addr_zip = $('input#applicant_present_addr_zip').val();
				var applicant_present_addr_county = $('input#applicant_present_addr_county').val();
				
				var slct_applicant_apart_or_house = document.getElementById('applicant_apart_or_house');
				var applicant_apart_or_house = slct_applicant_apart_or_house.options[slct_applicant_apart_or_house.selectedIndex].value;

 
				var slct_applicant_buy_own_rent_other = document.getElementById('applicant_buy_own_rent_other');
				var applicant_buy_own_rent_other = slct_applicant_buy_own_rent_other.options[slct_applicant_buy_own_rent_other.selectedIndex].value;

				var applicant_house_payment = $('input#applicant_house_payment').val();


				var applicant_addr_landlord_mortg = $('input#applicant_addr_landlord_mortg').val();
				
				var applicant_addr_landlord_phone = $('input#applicant_addr_landlord_phone').val();
				
				var applicant_name_oncurrent_lease = $('input#applicant_name_oncurrent_lease').val();

				var applicant_addr_landlord_address = $('input#applicant_addr_landlord_address').val();
				var applicant_addr_landlord_city = $('input#applicant_addr_landlord_city').val();

var slct_applicant_addr_landlord_state = document.getElementById('applicant_addr_landlord_state');
var applicant_addr_landlord_state = slct_applicant_addr_landlord_state.options[slct_applicant_addr_landlord_state.selectedIndex].value;


				var applicant_addr_landlord_zip = $('input#applicant_addr_landlord_zip').val();
				
				
				var applicant_present_moveindate = $('input#applicant_present_moveindate').val();

				var slct_applicant_addr_years = document.getElementById('applicant_addr_years');
				var applicant_addr_years = slct_applicant_addr_years.options[slct_applicant_addr_years.selectedIndex].value;

				var slct_applicant_addr_months = document.getElementById('applicant_addr_months');
				var applicant_addr_months = slct_applicant_addr_years.options[slct_applicant_addr_months.selectedIndex].value;
				var user_comments_app_notes = $('textarea#user_comments_app_notes').val();



				//var user_comments_previousaddr_notes = $('input#user_comments_previousaddr_notes').val();
				var applicant_employer1_name = $('input#applicant_employer1_name').val();
				var applicant_employer1_addr = $('input#applicant_employer1_addr').val();
				var applicant_employer1_city = $('input#applicant_employer1_city').val();
				var slct_applicant_employer1_state  = document.getElementById('applicant_employer1_state');
var applicant_employer1_state = slct_applicant_employer1_state.options[slct_applicant_employer1_state.selectedIndex].value;

				var applicant_employer1_zip = $('input#applicant_employer1_zip').val();

				var applicant_employer1_phone = $('input#applicant_employer1_phone').val();
				var applicant_employer1_phone_ext = $('input#applicant_employer1_phone_ext').val();

				var applicant_employer1_work_dateofhire = $('input#applicant_employer1_work_dateofhire').val();


var slct_applicant_employment_type = document.getElementById('applicant_employment_type');
var applicant_employment_type = slct_applicant_employment_type.options[slct_applicant_employment_type.selectedIndex].value;

var slct_applicant_employment_status = document.getElementById('applicant_employment_status');
var applicant_employment_status = slct_applicant_employment_status.options[slct_applicant_employment_status.selectedIndex].value;

				
				var applicant_employer1_position = $('input#applicant_employer1_position').val();
				var applicant_employer1_department = $('input#applicant_employer1_department').val();
				var applicant_employer1_supervisors_name = $('input#applicant_employer1_supervisors_name').val();
				var applicant_employer1_supervisors_phone = $('input#applicant_employer1_supervisors_phone').val();
				var applicant_employer1_hours_shift = $('input#applicant_employer1_hours_shift').val();
				
				var applicant_employer1_salary_bringhome = $('input#applicant_employer1_salary_bringhome').val();

var slct_applicant_employer_form_of_pymt = document.getElementById('applicant_employer_form_of_pymt');
var applicant_employer_form_of_pymt = slct_applicant_employer_form_of_pymt.options[slct_applicant_employer_form_of_pymt.selectedIndex].value;

				
				var applicant_other_income_amount = $('input#applicant_other_income_amount').val();
				var applicant_other_income_source = $('input#applicant_other_income_source').val();

var slct_applicant_other_income_when_rcvd = document.getElementById('applicant_other_income_when_rcvd');
var applicant_other_income_when_rcvd = slct_applicant_other_income_when_rcvd.options[slct_applicant_other_income_when_rcvd.selectedIndex].value;

				
				
				var applicant_digital_signature = $('input#applicant_digital_signature').val();
				
				//console.log('About to post.');
				
				$.post('script_complete_interview_setup.php',
					   {
						   applicant_titlename: applicant_titlename,
						   applicant_fname: applicant_fname,
						   applicant_mname: applicant_mname,
						   applicant_lname: applicant_lname,
						   applicant_suffixname: applicant_suffixname,
						   applicant_other_name: applicant_other_name,
						   applicant_maiden_name: applicant_maiden_name,
						   applicant_suffixname: applicant_suffixname,
						   applicant_other_name: applicant_other_name,
						   applicant_maiden_name: applicant_maiden_name,
						   applicant_main_phone: applicant_main_phone,
						   applicant_cell_phone: applicant_cell_phone,
						   applicant_mobile_carrier: applicant_mobile_carrier,
						   applicant_present_address1: applicant_present_address1,
						   applicant_present_address2: applicant_present_address2,
						   applicant_present_addr_city: applicant_present_addr_city,
						   applicant_present_addr_state: applicant_present_addr_state,
						   applicant_present_addr_zip: applicant_present_addr_zip,
						   applicant_present_addr_county: applicant_present_addr_county,
						   applicant_present_moveindate: applicant_present_moveindate,
						   applicant_addr_years: applicant_addr_years,
						   applicant_addr_months: applicant_addr_months,
						   applicant_addr_landlord_mortg: applicant_addr_landlord_mortg,
						   applicant_addr_landlord_address: applicant_addr_landlord_address,
						   applicant_addr_landlord_city: applicant_addr_landlord_city,
						   applicant_addr_landlord_state: applicant_addr_landlord_state,
						   applicant_addr_landlord_zip: applicant_addr_landlord_zip,
						   applicant_addr_landlord_phone: applicant_addr_landlord_phone,
						   applicant_name_oncurrent_lease: applicant_name_oncurrent_lease,
						   applicant_apart_or_house: applicant_apart_or_house,
						   applicant_buy_own_rent_other: applicant_buy_own_rent_other,
						   applicant_house_payment: applicant_house_payment,
						   user_comments_app_notes: user_comments_app_notes,
						   applicant_employer1_name: applicant_employer1_name,
						   applicant_employer1_addr: applicant_employer1_addr,
						   applicant_employer1_city: applicant_employer1_city,
						   applicant_employer1_state: applicant_employer1_state,
						   applicant_employer1_zip: applicant_employer1_zip,
						   applicant_employer1_phone: applicant_employer1_phone,
						   applicant_employer1_phone_ext: applicant_employer1_phone_ext,
						   applicant_employer1_work_dateofhire: applicant_employer1_work_dateofhire,
						   applicant_employer1_work_years: applicant_employer1_work_years,
						   applicant_employer1_work_months: applicant_employer1_work_months,
						   applicant_employment_type: applicant_employment_type,
						   applicant_employment_status: applicant_employment_status,
						   applicant_employer1_position: applicant_employer1_position,
						   applicant_employer1_department: applicant_employer1_department,
						   applicant_employer1_supervisors_name: applicant_employer1_supervisors_name,
						   applicant_employer1_supervisors_phone: applicant_employer1_supervisors_phone,
						   applicant_employer1_hours_shift: applicant_employer1_hours_shift,
						   applicant_employer1_salary_bringhome: applicant_employer1_salary_bringhome,
						   applicant_employer1_payday_freq: applicant_employer1_payday_freq,
						   applicant_employer_form_of_pymt: applicant_employer_form_of_pymt,
						   applicant_other_income_amount: applicant_other_income_amount,
						   applicant_other_income_source: applicant_other_income_source,
						   applicant_other_income_when_rcvd: applicant_other_income_when_rcvd,
						   applicant_digital_signature: applicant_digital_signature
						   
						}, function(data){
							
							//console.log(data);
							
				});
	


}