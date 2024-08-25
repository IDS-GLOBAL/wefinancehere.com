// JavaScript Document

$(document).ready(function(){



		//Ajax intial Preview
		$('#totalPayments').load('content/sample.php');
		
		
		$('#cust_gross_income').bind('keyup change', function debtToIncome(){
		
			
			var cust_gross_income = document.getElementById("cust_gross_income").value;
			
			var  annually = (cust_gross_income -0) * 12;

			var loanTerm = document.getElementById("loanTerm");
			var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;

			if(myloanTerm){document.getElementById("mytotalAnnualIncome").innerHTML=' $' + annually + " A Year ";}
		
		
		});
		
		


	$('#mostCarpymt').bind('keyup change', function preApprovalAmount(){
	
							var mostCarpymt = document.getElementById("mostCarpymt").value;
							var downpayment = document.getElementById("downpayment").value;

							document.getElementById("downpaymentPrice").innerHTML="$ "+downpayment;
							
													
							var loanTerm = document.getElementById("loanTerm");
							var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
	
							if(myloanTerm == 12){document.getElementById("vehicleCondition").innerHTML="Used ";}
							else if(myloanTerm == 24){document.getElementById("vehicleCondition").innerHTML="Used ";}
							else if(myloanTerm == 36){document.getElementById("vehicleCondition").innerHTML="Used";}
							else if(myloanTerm == 48){document.getElementById("vehicleCondition").innerHTML="Used ";}
							else if(myloanTerm == 60){document.getElementById("vehicleCondition").innerHTML="New or Used ";}							
							else if(myloanTerm == 72){document.getElementById("vehicleCondition").innerHTML="New or Used ";}							
							//alert('Term is' +myloanTerm);
							
							var myLoanamt = (mostCarpymt -0) * (myloanTerm -0);
							
							var amountPrice = (myLoanamt -0) + (downpayment -0);
							
							//alert(myLoanamt);
							document.getElementById("totalPayments").innerHTML="$ "+myLoanamt;

							document.getElementById("totalAmountPrice").innerHTML="Your Investment: $ "+amountPrice;
							document.getElementById("PreApprovalAmount").innerHTML="$ "+amountPrice;

						var loanRate = document.getElementById("Credit");
						var myloanRate = loanRate.options[loanRate.selectedIndex].value;
						
								
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

				   var mostCarpymt = document.getElementById("mostCarpymt").value;
				
				   var BigPrincipal = ((pow - 1) * mostCarpymt) / (pow * interest);
					
					document.getElementById("CarPurchasePrice").innerHTML="$ "+BigPrincipal.toFixed(2);
					document.getElementById("Xamount").innerHTML="$ "+BigPrincipal.toFixed(2);
								

									 							
							//hidden Field for principal value							
					document.getElementById("amtprincipal").value = BigPrincipal.toFixed(2);
					document.getElementById("bigPrincipal").value = BigPrincipal.toFixed(2);					
					document.getElementById("cust_desiredpymt").value = mostCarpymt;
					
					

							//Total Payments In Dashboard
							document.getElementById("mybudgetTotalpayments").innerHTML="$ "+amountPrice;
});




	$('#loanTerm').bind('keyup change', function preApprovalAmountt(){
	
							var mostCarpymt = document.getElementById("mostCarpymt").value;
							var downpayment = document.getElementById("downpayment").value;

							document.getElementById("downpaymentPrice").innerHTML="$ "+downpayment;
							
													
							var loanTerm = document.getElementById("loanTerm");
							var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
							var myloanTermtxt = loanTerm.options[loanTerm.selectedIndex].text;
							
							document.getElementById("cust_desiredtermos").value = myloanTerm;
							document.getElementById("cust_desiredtermrange").value = myloanTermtxt;
							
							if(myloanTerm == 12){document.getElementById("vehicleCondition").innerHTML="Used ";}
							else if(myloanTerm == 24){document.getElementById("vehicleCondition").innerHTML="Used ";}
							else if(myloanTerm == 36){document.getElementById("vehicleCondition").innerHTML="Used";}
							else if(myloanTerm == 48){document.getElementById("vehicleCondition").innerHTML="Used ";}
							else if(myloanTerm == 60){document.getElementById("vehicleCondition").innerHTML="Used ";}							
							else if(myloanTerm == 72){document.getElementById("vehicleCondition").innerHTML="New ";}							
							
							//alert('Term is' +myloanTerm);
							
							var myLoanamt = (mostCarpymt -0) * (myloanTerm -0);
							
							var amountPrice = (myLoanamt -0) + (downpayment -0);
							
							//alert(myLoanamt);
							document.getElementById("totalPayments").innerHTML="$ "+myLoanamt;

							document.getElementById("totalAmountPrice").innerHTML="Your Investment: $ "+amountPrice;
							
							
							document.getElementById("PreApprovalAmount").innerHTML="$ "+amountPrice;

						var loanRate = document.getElementById("Credit");
						var myloanRate = loanRate.options[loanRate.selectedIndex].value;
						
								
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

				   var mostCarpymt = document.getElementById("mostCarpymt").value;
				
				   var BigPrincipal = ((pow - 1) * mostCarpymt) / (pow * interest);
					
					document.getElementById("CarPurchasePrice").innerHTML="$ "+BigPrincipal.toFixed(2);
					document.getElementById("Xamount").innerHTML="$ "+BigPrincipal.toFixed(2);
								
					document.getElementById("amtprincipal").value = BigPrincipal.toFixed(2);
					document.getElementById("bigPrincipal").value = BigPrincipal.toFixed(2);
					
							//Total Payments In Dashboard
							document.getElementById("mybudgetTotalpayments").innerHTML="$ "+amountPrice;

	});

				
				
				
				$('#Credit').bind('keyup change', function countmyrate(){
																

				
				var loanRate = document.getElementById("Credit");
				var myloanRate = loanRate.options[loanRate.selectedIndex].value;
				var myloanRatetxt = loanRate.options[loanRate.selectedIndex].text;
				
				document.getElementById("cust_creditapr").value = myloanRate;
				document.getElementById("cust_creditaprtxt").value = myloanRatetxt;

				
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

				   var mostCarpymt = document.getElementById("mostCarpymt").value;
				
				   var BigPrincipal = ((pow - 1) * mostCarpymt) / (pow * interest);
					
					document.getElementById("CarPurchasePrice").innerHTML="$ "+BigPrincipal.toFixed(2);
					document.getElementById("Xamount").innerHTML="$ "+BigPrincipal.toFixed(2);
					
					document.getElementById("totalPayments").innerHTML="$ "+myLoanamt;

					document.getElementById("amtprincipal").value = BigPrincipal.toFixed(2);
					document.getElementById("bigPrincipal").value = BigPrincipal.toFixed(2);

							//Total Payments In Dashboard
							document.getElementById("mybudgetTotalpayments").innerHTML="$ "+amountPrice;
					
				});










				$('#downpayment').bind('keyup change', function countmydownpayment(){
							var mostCarpymt = document.getElementById("mostCarpymt").value;
							var downpayment = document.getElementById("downpayment").value;

							document.getElementById("downpaymentPrice").innerHTML="$ "+downpayment;
							
													
							var loanTerm = document.getElementById("loanTerm");
							var myloanTerm = loanTerm.options[loanTerm.selectedIndex].value;
	
	
							//alert('Term is' +myloanTerm);
							
							var myLoanamt = (mostCarpymt -0) * (myloanTerm -0);
							
							var amountPrice = (myLoanamt -0) + (downpayment -0);
							
							//alert(myLoanamt);
							
							document.getElementById("totalAmountPrice").innerHTML="Your Investment: $ "+amountPrice;
							document.getElementById("PreApprovalAmount").innerHTML="$ "+amountPrice;
							
							//hidden Field for principal value							

						var loanRate = document.getElementById("Credit");
						var myloanRate = loanRate.options[loanRate.selectedIndex].value;
						
								
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

				   var mostCarpymt = document.getElementById("mostCarpymt").value;
				
				   var BigPrincipal = ((pow - 1) * mostCarpymt) / (pow * interest);
					
					document.getElementById("CarPurchasePrice").innerHTML="$ "+BigPrincipal.toFixed(2);
					document.getElementById("Xamount").innerHTML="$ "+BigPrincipal.toFixed(2);
					
					
					
					document.getElementById("amtprincipal").value = BigPrincipal.toFixed(2);
					document.getElementById("bigPrincipal").value = BigPrincipal.toFixed(2);					
					
						
					if(downpayment == '0'){document.getElementById('cashdownResponse').style.display = 'block';}
					else{document.getElementById('cashdownResponse').style.display = 'none';}
					
					
					document.getElementById("cust_downpayment").value = downpayment;

							//Total Payments In Dashboard
							document.getElementById("mybudgetTotalpayments").innerHTML="$ "+amountPrice;

			
									 //alert(princ);
									
									 
									 
									 //var intr  = myloanRate / 1200;
								
									 //var term  = myloanTerm;
								 
									 //var figure = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
								
									 //var monthlyPymt = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
								
									 //var totalPayments = (term * monthlyPymt).toFixed(2);
									 
									 //alert(totalPayments);
									 
									

							});

				$('#tradeYes2').on('change', function showradioTrade(){

								

								if (document.getElementById('tradeYes2').checked) {
									document.getElementById('TradeInformation').style.display = 'block';
								}
								else{
									document.getElementById('TradeInformation').style.display = 'none';
								}
								
				});









					

							

});





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

