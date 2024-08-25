// JavaScript Document

$(document).ready(function(){



$('select#homeState').on('change', function(){
											

	//alert('Changed State');
	var amtprincipal = $('input#amtprincipal').val();
	
	slct_homeState = document.getElementById('homeState');
	homeState = slct_homeState.options[slct_homeState.selectedIndex].value;
	
	// $.post('script_ajax_pull_state_vehicles.php', {homeState:  homeState}, function(data){
	$.post('script_ajax_pull_state_dealers.php', {homeState: homeState, amtprincipal: amtprincipal}, function(data){


		//console.log('Data:  '+data);

		$('section#dealers').html(data);		
		
	});








});

$('button#finalize_myapproval').click(function(){
		
		save_credit_app();
		
		
});

$('#cust_gross_income').click(function(){
		
			$("div#situation_status_section").show();
		
});

$('button#wfh_firstgo').click(function(){

			//alert('Locking In Approval');
			save_approval()

			
			$("#lets_getapproved").hide();
			
			$("#lets_lock_myapproval").hide();
			
			$("#lets_lockget_started").hide();
			
			
			$('div#instant_approval_splash').hide();
			$('div#situation_section').hide();

			$('div#application_section').show();



});
		//Ajax intial Preview
		//$('#totalPayments').load('content/sample.php');
		
		
		$('#cust_gross_income').bind('keyup change', function debtToIncome(){
		
			
			var cust_gross_income = $("#cust_gross_income").val();
			
			var  annually = (cust_gross_income -0) * 12;

			var loanTerm = $("#loanTerm");
			var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;

			if(myloanTerm){$("#mytotalAnnualIncome").text(' $' + annually + " A Year ");}
		
		
		});
		
		


	$('#mostCarpymt').bind('keyup change', function preApprovalAmount(){
		
		//debugger;
							var mostCarpymt = $("input#mostCarpymt").val();
							var downpayment = $("input#downpayment").val();

							$("#downpaymentPrice").text("$ "+downpayment);
							
													
							var loanTerm = document.getElementById("loanTerm");
							var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
	
							if(myloanTerm == 12){$("#vehicleCondition").text("Used ");}
							else if(myloanTerm == 24){$("#vehicleCondition").text("Used ");}
							else if(myloanTerm == 36){$("#vehicleCondition").text("Used");}
							else if(myloanTerm == 48){$("#vehicleCondition").text("Used ");}
							else if(myloanTerm == 60){$("#vehicleCondition").text("New or Used ");}							
							else if(myloanTerm == 72){$("#vehicleCondition").text("New or Used ");}							
							//alert('Term is' +myloanTerm);
							
							var myLoanamt = (mostCarpymt -0) * (myloanTerm -0);
							
							var amountPrice = (myLoanamt -0) + (downpayment -0);
							
							//alert(myLoanamt);
							$("#totalPayments").text("$ "+myLoanamt);

							$("#totalAmountPrice").text("Your Investment: $ "+amountPrice);
							$("#PreApprovalAmount").text("$ "+amountPrice);

						var loanRate = document.getElementById("Credit");
						var myloanRate = loanRate.options[loanRate.selectedIndex].value;
						var myloanRatetxt = loanRate.options[loanRate.selectedIndex].text;

						
								
								var interest = loanRate.options[loanRate.selectedIndex].value;				   
			   
				   if (interest >= 1.0) {
					  interest = interest / 100.0;
				   }
				   interest /= 12;
				
							var loanTerm = document.getElementById("loanTerm");
							var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
							var myloanTermtxt = loanTerm.options[loanTerm.selectedIndex].text;

				   var pow = 1;
				
				   for (var m = 0; m < myloanTerm; m++) {
					  pow = pow * (1 + interest);
				   }

				   var mostCarpymt = $("input#mostCarpymt").val();
				   
				   var downpayment = $("input#downpayment").val();
				
				   var Principal = ((pow - 1) * mostCarpymt) / (pow * interest);
				   
				   var BigPrincipal = (Principal.toFixed(2) -0) - (downpayment -0);
					
					$("#CarPurchasePrice").text("$ "+BigPrincipal.toFixed(2));
					$("#Xamount").text("$ "+BigPrincipal.toFixed(2));
								

									 							
							//hidden Field for principal value							
					$("#amtprincipal").val(BigPrincipal.toFixed(2));
					$("#bigPrincipal").val(BigPrincipal.toFixed(2));
					$("#cust_desiredpymt").val(mostCarpymt);
					
					

							//Total Payments In Dashboard
							$("#mybudgetTotalpayments").text("$ "+amountPrice);
});




	$('#loanTerm').bind('keyup change', function preApprovalAmountt(){
	
							var mostCarpymt = $("input#mostCarpymt").val();
							var downpayment = $("input#downpayment").val();

							$("#downpaymentPrice").text("$ "+downpayment);
							
													
							var loanTerm = document.getElementById("loanTerm");
							var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
							var myloanTermtxt = loanTerm.options[loanTerm.selectedIndex].text;
							
							$("#cust_desiredtermos").val(myloanTerm);
							$("#cust_desiredtermrange").val(myloanTermtxt);
							
							if(myloanTerm == 12){$("vehicleCondition").text("Used ");}
							else if(myloanTerm == 24){$("#vehicleCondition").text("Used ");}
							else if(myloanTerm == 36){$("#vehicleCondition").text("Used");}
							else if(myloanTerm == 48){$("#vehicleCondition").text("Used ");}
							else if(myloanTerm == 60){$("#vehicleCondition").text("Used ");}							
							else if(myloanTerm == 72){$("#vehicleCondition").text("New ");}							
							
							//alert('Term is' +myloanTerm);
							
							var myLoanamt = (mostCarpymt -0) * (myloanTerm -0);
							
							var amountPrice = (myLoanamt -0) + (downpayment -0);
							
							//alert(myLoanamt);
							$("#totalPayments").text("$ "+myLoanamt);

							$("#totalAmountPrice").text("Your Investment: $ "+amountPrice);
							
							
							$("#PreApprovalAmount").text("$ "+amountPrice);

						var loanRate = document.getElementById("Credit");
						var myloanRate = loanRate.options[loanRate.selectedIndex].value;
						var myloanRatetxt = loanRate.options[loanRate.selectedIndex].text;
						
								
								var interest = loanRate.options[loanRate.selectedIndex].value;				   
			   
				   if (interest >= 1.0) {
					  interest = interest / 100.0;
				   }
				   interest /= 12;
				
				   var loanTerm = document.getElementById("loanTerm");
				   var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
				   
				   var pow = 1;
				
				   for (var m = 0; m < myloanTerm; m++) {
					  pow = pow * (1 + interest);
				   }

				   var mostCarpymt = $("input#mostCarpymt").val();
				   
				   var downpayment = $("input#downpayment").val();
				
				   var Principal = ((pow - 1) * mostCarpymt) / (pow * interest);
				   
				   var BigPrincipal = (Principal.toFixed(2) -0) - (downpayment -0);
					
					$("#CarPurchasePrice").text("$ "+BigPrincipal.toFixed(2));
					$("#Xamount").text("$ "+BigPrincipal.toFixed(2));
								
					$("#amtprincipal").val(BigPrincipal.toFixed(2));
					$("#bigPrincipal").val(BigPrincipal.toFixed(2));
					
							//Total Payments In Dashboard
							$("#mybudgetTotalpayments").text("$ "+amountPrice);

	});

				
				
				
				$('#Credit').bind('keyup change', function countmyrate(){
																

				   var mostCarpymt = $("input#mostCarpymt").val();
				   
				   var downpayment = $("input#downpayment").val();
				
				var loanRate = document.getElementById("Credit");
				var myloanRate = loanRate.options[loanRate.selectedIndex].value;
				var myloanRatetxt = loanRate.options[loanRate.selectedIndex].text;
				
				$("#cust_creditapr").value = myloanRate;
				$("#cust_creditaprtxt").value = myloanRatetxt;

				
				   var interest = loanRate.options[loanRate.selectedIndex].value;				   
			   
				   if (interest >= 1.0) {
					  interest = interest / 100.0;
				   }
				   interest /= 12;

					var loanRate = document.getElementById("Credit");
					var myloanRate = loanRate.options[loanRate.selectedIndex].value;
					var myloanRatetxt = loanRate.options[loanRate.selectedIndex].text;
					
					var loanTerm = document.getElementById("loanTerm");
					var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
					var myloanTermtxt = loanTerm.options[loanTerm.selectedIndex].text;	

				   var pow = 1;
				
				   for (var m = 0; m < myloanTerm; m++) {
					  pow = pow * (1 + interest);
				   }
				
				   var Principal = ((pow - 1) * mostCarpymt) / (pow * interest);
				   
				   var BigPrincipal = (Principal.toFixed(2) -0) - (downpayment -0);
				   //alert('BigPrincipal: '+BigPrincipal);
				   
					$("#CarPurchasePrice").text("$ "+BigPrincipal.toFixed(2));
					$("#Xamount").text("$ "+BigPrincipal.toFixed(2));

					var myLoanamt = (mostCarpymt -0) * (myloanTerm -0);
					
					var amountPrice = (myLoanamt -0) + (downpayment -0);

					$("#totalPayments").text("$ "+myLoanamt);

					$("#amtprincipal").val(BigPrincipal.toFixed(2));
					$("#bigPrincipal").val(BigPrincipal.toFixed(2));

							//Total Payments In Dashboard
							$("#mybudgetTotalpayments").text("$ "+amountPrice);
					
				});










				$('#downpayment').bind('keyup change', function countmydownpayment(){
							var mostCarpymt = $("input#mostCarpymt").val();
							var downpayment = $("input#downpayment").val();

							$("#downpaymentPrice").text("$ "+downpayment);
							
													
							var loanTerm = document.getElementById("loanTerm");
							var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
	
	
							//alert('Term is' +myloanTerm);
							
							var myLoanamt = (mostCarpymt -0) * (myloanTerm -0);
							
							var amountPrice = (myLoanamt -0) + (downpayment -0);
							
							//alert(myLoanamt);
							
							$("totalAmountPrice").text("Your Investment: $ "+amountPrice);
							$("PreApprovalAmount").text("$ "+amountPrice);
							
							//hidden Field for principal value							

						var loanRate = document.getElementById("Credit");
						var myloanRate = loanRate.options[loanRate.selectedIndex].value;
						var myloanRatetxt = loanRate.options[loanRate.selectedIndex].text;
						
								
						var interest = loanRate.options[loanRate.selectedIndex].value;				   
			   
				   if (interest >= 1.0) {
					  interest = interest / 100.0;
				   }
				   interest /= 12;
				
				   var loanTerm = document.getElementById("loanTerm");
				   var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
				   var pow = 1;
				
				   for (var m = 0; m < myloanTerm; m++) {
					  pow = pow * (1 + interest);
				   }

				   var mostCarpymt = $("input#mostCarpymt").val();
				
				   var BigPrincipal = ((pow - 1) * mostCarpymt) / (pow * interest);
					
					$("CarPurchasePrice").text("$ "+BigPrincipal.toFixed(2));
					$("Xamount").text("$ "+BigPrincipal.toFixed(2));
					
					
					
					$("amtprincipal").value = BigPrincipal.toFixed(2);
					$("bigPrincipal").value = BigPrincipal.toFixed(2);					
					
						
					if(downpayment == '0'){
					
						//$('cashdownResponse').style.display = 'block';
					
					}else{ 
					
					   //$('cashdownResponse').style.display = 'none';
					}
					
					
					//$("cust_downpayment").val(downpayment);

					//Total Payments In Dashboard
					$("mybudgetTotalpayments").text("$ "+amountPrice);

			
									 //alert(princ);
									
									 
									 
									 //var intr  = myloanRate / 1200;
								
									 //var term  = myloanTerm;
								 
									 //var figure = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
								
									 //var monthlyPymt = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
								
									 //var totalPayments = (term * monthlyPymt).toFixed(2);
									 
									 //alert(totalPayments);
									 
									

							});

				$('#tradeYes2').on('change', function showradioTrade(){

								

								if ($('tradeYes2').checked) {
									$('TradeInformation').style.display = 'block';
								}
								else{
									$('TradeInformation').style.display = 'none';
								}
								
				});









					

							

});








// Function For Saving Users Approval

function save_approval(){
	var mostCarpymt = $('input#mostCarpymt').val();




							var mostCarpymt = $("input#mostCarpymt").val();
							if(!mostCarpymt){  var mostCarpymt = '0.00';}
							
							var downpayment = $("input#downpayment").val();

							$("#downpaymentPrice").text("$ "+downpayment);
							

						var loanRate = document.getElementById("Credit");
						var myloanRate = loanRate.options[loanRate.selectedIndex].value;
						var myloanRatetxt = loanRate.options[loanRate.selectedIndex].text;

						var loanTerm = document.getElementById("loanTerm");
						var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
						var myloanTermtxt = loanTerm.options[loanTerm.selectedIndex].text;	
						
						var slct_traffic_source = document.getElementById('traffic_source');
						var traffic_source = slct_traffic_source.options[slct_traffic_source.selectedIndex].value;
						var traffic_sourcetxt = slct_traffic_source.options[slct_traffic_source.selectedIndex].text;

								 if(myloanTerm == 12){ var vehicleCondition = "Used"; }
							else if(myloanTerm == 24){ var vehicleCondition = "Used"; }
							else if(myloanTerm == 36){ var vehicleCondition = "Used"; }
							else if(myloanTerm == 48){ var vehicleCondition = "Used"; }
							else if(myloanTerm == 60){ var vehicleCondition = "New"; }							
							else if(myloanTerm == 72){ var vehicleCondition = "New";  }	
							else if(myloanTerm == 84){ var vehicleCondition = "New";  }	
							
							
							//alert('Term is' +myloanTerm);
							
							var myLoanamt = (mostCarpymt -0) * (myloanTerm -0);
							
							var amountPrice = (myLoanamt -0) + (downpayment -0);

							var interest = loanRate.options[loanRate.selectedIndex].value;
							
							var totalPayments = myLoanamt.toFixed(2);


						
								
			   
				   if (interest >= 1.0) {
					  interest = interest / 100.0;
				   }
				   interest /= 12;
				
							var loanTerm = document.getElementById("loanTerm");
							var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
							var myloanTermtxt = loanTerm.options[loanTerm.selectedIndex].text;

				   var pow = 1;
				
				   for (var m = 0; m < myloanTerm; m++) {
					  pow = pow * (1 + interest);
				   }

				
				   var Principal = ((pow - 1) * mostCarpymt) / (pow * interest);
				   
				   var BigPrincipal = (Principal.toFixed(2) -0) - (downpayment -0);
					
					$("#CarPurchasePrice").text("$ "+BigPrincipal.toFixed(2));
					$("#Xamount").text("$ "+BigPrincipal.toFixed(2));

					var slct_currentCarLoan = document.getElementById('currentCarLoan');
					var currentCarLoan = slct_currentCarLoan.options[slct_currentCarLoan.selectedIndex].value;
					
					var slct_homeState = document.getElementById('homeState');
					var homeState = slct_homeState.options[slct_homeState.selectedIndex].value;
					
							//hidden Field for principal value
					console.log('BigPrincipal: '+BigPrincipal.toFixed(2));
					console.log('mostCarpymt: '+mostCarpymt);
							//Total Payments In Dashboard					
					console.log("amountPrice: $ "+amountPrice.toFixed(2));
					
					var user_first_name = $('input#user_first_name').val();
					var user_last_name = $('input#user_last_name').val();
					var user_email = $('input#user_email').val();
					var user_cellphone = $('input#user_cellphone').val();
					var user_password = $('input#user_password').val();

					$.post('script_approve_new_wfhuser.php', {traffic_source: traffic_source, currentCarLoan: currentCarLoan, homeState: homeState, interest: interest, totalPayments: totalPayments, myloanTerm: myloanTerm, myloanTermtxt: myloanTermtxt,  vehicleCondition: vehicleCondition, myLoanamt: myLoanamt, amountPrice: amountPrice, Principal: Principal, BigPrincipal: BigPrincipal, amountPrice: amountPrice, myloanRate: myloanRate, myloanRatetxt: myloanRatetxt, mostCarpymt: mostCarpymt, downpayment: downpayment, user_first_name: user_first_name,  user_last_name: user_last_name, user_email: user_email, user_cellphone: user_cellphone, user_password: user_password}, function(data){
								
								console.log(data);
					});


}







// Only Allows Numbers only
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


function showTermYears(obj) {

noYears = obj.options[obj.selectedIndex].value;
//count = obj.options.length;
alert(noYears);





}

function save_credit_app(){

	var applicant_present_address1 = $('input#applicant_present_address1').val();
	var applicant_present_address2 = $('input#applicant_present_address2').val();

	var applicant_present_addr_city = $('input#applicant_present_addr_city').val();
	var applicant_present_addr_zip = $('input#applicant_present_addr_zip').val();

	var applicant_house_payment = $('input#input#applicant_house_payment').val();
	
	
	var applicant_previous1_addr1 = $('input#applicant_previous1_addr1').val();

	var applicant_previous1_addr2 = $('input#applicant_previous1_addr2').val();
	var applicant_present_address2 = $('input#applicant_present_address2').val();

	var applicant_previous1_addr_city = $('input#applicant_previous1_addr_city').val();
	
	var slct_applicant_previous1_addr_state = document.getElementById('applicant_previous1_addr_state');
	var applicant_previous1_addr_state = slct_applicant_previous1_addr_state.
										 options[slct_applicant_previous1_addr_state.selectedIndex].value;

	var applicant_previous1_addr_zip = $('input#applicant_previous1_addr_zip').val();
	
	var applicant_present_address2 = $('input#applicant_present_address2').val();

	var applicant_present_address1 = $('input#applicant_present_address1').val();
	var applicant_present_address2 = $('input#applicant_present_address2').val();

	var applicant_present_address1 = $('input#applicant_present_address1').val();
	var applicant_present_address2 = $('input#applicant_present_address2').val();


var slct_applicant_employment_status = document.getElementById('applicant_employment_status');
var applicant_employment_status = slct_applicant_employment_status.options[slct_applicant_employment_status.selectedIndex].value;


var applicant_employer1_name = $('input#applicant_employer1_name').val();
var applicant_employer1_phone = $('input#applicant_employer1_phone').val();
var applicant_employer1_addr = $('input#applicant_employer1_addr').val();
var applicant_employer1_city = $('input#applicant_employer1_city').val();



var slct_applicant_employer1_state = document.getElementById('applicant_employer1_state');
var applicant_employer1_state = slct_applicant_employer1_state.options[slct_applicant_employer1_state.selectedIndex].value;

var applicant_employer1_zip = $('input#applicant_employer1_zip').val();

var applicant_employer1_salary_bringhome = $('input#applicant_employer1_salary_bringhome').val();



var applicant_employer1_work_months = $('input#applicant_employer1_work_months').val();

var applicant_employer1_supervisors_name = $('input#applicant_employer1_supervisors_name').val();

var applicant_employer1_supervisors_phone = $('input#applicant_employer1_supervisors_name').val();

var slct_applicant_employer1_payday_freq = document.getElementById('applicant_employer1_payday_freq');
var applicant_employer1_payday_freq = slct_applicant_employer1_payday_freq.options[slct_applicant_employer1_payday_freq.selectedIndex].value;


var applicant_other_income_amount = $('input#applicant_other_income_amount').val();

var applicant_other_income_source = $('input#applicant_other_income_source').val();

var slct_applicant_other_income_when_rcvd = document.getElementById('applicant_other_income_when_rcvd');
var applicant_other_income_when_rcvd = slct_applicant_other_income_when_rcvd.options[slct_applicant_other_income_when_rcvd.selectedIndex].value;


var applicant_other_income_proof = $('input#applicant_other_income_proof').val();





console.log('save_credit_app(); Ran;');

	
	
}





