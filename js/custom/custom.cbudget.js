// JavaScript Document
$(document).ready(function(){


		//Budget
		$('button#use_budgetgrossincome').on('click', function(){
				
				var MonthlyPayCheckGross = $('h2#MonthlyPayCheckGross').html();
				MonthlyPayCheckGross=MonthlyPayCheckGross.replace(/\,/g,''); 
				MonthlyPayCheckGross=MonthlyPayCheckGross.replace(/\$/g,''); 
				//MonthlyPayCheckGross=parseInt(MonthlyPayCheckGross);

				$('input#budget_grossincome').val(MonthlyPayCheckGross);
				
				process_budget();
				
				$('div#myBudget').modal('hide');
		});



		// Budget
		$('select#loan_term_months').on('change', function(){
			var slct_loan_term_months = document.getElementById("loan_term_months");
			var loan_term_months = slct_loan_term_months.options[slct_loan_term_months.selectedIndex].value;
	
			
			$('input#true_loanterm_months').val(loan_term_months);
			
			process_budget();
			
		});

		
		// Budget
		$('select#interest_credit_score').on('change', function(){
			
	
			var slct_interest_credit_score = document.getElementById("interest_credit_score");
			var interest_credit_score = slct_interest_credit_score.options[slct_interest_credit_score.selectedIndex].value;
	
			
		 	$('input#true_interest_credit_score').val(interest_credit_score);
			
			process_budget();

		});

		// Budget
		$('input#budget_vprice').on('keyup', function(){
			process_budget();
		});
		
		// Budget
		$('input#budget_salextax').on('keyup', function(){
			process_budget();
		});




		// Budget
		$('input#trade_in_value').on('keyup', function(){
			process_budget();
		});

		// Budget
		$('input#budget_downpayment').on('keyup', function(){
			process_budget();
		});


		// Budget
		$('input#budget_grossincome').on('change', function(){
			process_budget();
		});

		// Work Hours
		$('div#myBudget input#hourlywork').on('keyup', function(){
															   
			   process_workhours();
		
		});
		
		// Work Hours
		$('div#myBudget input#hoursweek').on('keyup', function(){
															   
			   process_workhours();
		
		});


		$('button#book_deal').on('click', function(){
			
			run_thisdeal();
			
		});


		$('select#appointment_hours').on('change', function(){
		
			 run_appointment_change();
		
		});
		
		$('select#appointment_day').on('change', function(){
		
		 	run_appointment_change();
		 
		});



}); //End of Document



// Run Appointment Change
function run_appointment_change(){
	
	var slct_appointment_day = document.getElementById("appointment_day");
	var appointment_day = slct_appointment_day.options[slct_appointment_day.selectedIndex].value;

	var slct_appointment_hours = document.getElementById("appointment_hours");
	var appointment_hours = slct_appointment_hours.options[slct_appointment_hours.selectedIndex].value;

	
	
	var unixtime_stapappoint_start = appointment_day+' '+appointment_hours;
	
	$('input#unixtime_stapappoint_start').val(unixtime_stapappoint_start);
	
	$('input#appt_changed_q').val('Y');
	

}

function process_budget(){
		
		//debugger;

		var budget_vprice = $('input#budget_vprice').val();
		budget_vprice=budget_vprice.replace(/\,/g,''); 
		budget_vprice=budget_vprice.replace(/\$/g,''); 
		budget_vprice=parseInt(budget_vprice);

		var trade_in_value = $('input#trade_in_value').val();
		trade_in_value=trade_in_value.replace(/\,/g,''); 
		trade_in_value=trade_in_value.replace(/\$/g,''); 
		trade_in_value=parseInt(trade_in_value);

		var interest_credit_score = $('input#true_interest_credit_score').val();
				
		var true_loanterm_months = $('input#true_loanterm_months').val();

		var budget_downpayment = $('input#budget_downpayment').val();
		budget_downpayment=budget_downpayment.replace(/\,/g,'');
		budget_downpayment=budget_downpayment.replace(/\$/g,'');
		budget_downpayment=parseInt(budget_downpayment);


		var budget_grossincome = $('input#budget_grossincome').val();
		budget_grossincome=budget_grossincome.replace(/\,/g,'');
		budget_grossincome=budget_grossincome.replace(/\$/g,'');
		budget_grossincome=parseInt(budget_grossincome);


		var budget_netincome = $('input#budget_netincome').val();
		budget_netincome=budget_netincome.replace(/\,/g,'');
		budget_netincome=budget_netincome.replace(/\$/g,'');
		budget_netincome=parseInt(budget_netincome);

		var budget_salextax = $('input#budget_salextax').val();
		if(budget_salextax == null || !budget_salextax){ var budget_salextax = '$0'; }

		budget_salextax=budget_salextax.replace(/\,/g,'');
		budget_salextax=budget_salextax.replace(/\$/g,'');
		budget_salextax=parseInt(budget_salextax);
		console.log('budget_salextax: '+budget_salextax);

		var truesellingprice = (budget_salextax + budget_vprice - budget_downpayment - trade_in_value);
		console.log(truesellingprice);

		 var princ = truesellingprice;
		 var term  = true_loanterm_months;
		 var intr   = interest_credit_score / 1200;
		 var budget_value =  parseInt((princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2));
		

		$('h2#budget_monthly_payment').html(formatDollar(budget_value) + ' Payment *');

		//$('h1#budget_result').html('Budget: OK');

		process_afford();

	
	
	
}

function process_workhours(){
			var hourlywork =  parseInt($('input#hourlywork').val());
			var hoursweek = parseInt($('input#hoursweek').val());
			if(!hoursweek){var hoursweek = 10; }
			
			console.log(hourlywork +' | ' + hoursweek);
			var MonthlyPayCheckGross = hourlywork * hoursweek * 4.33;
			
			$('h2#MonthlyPayCheckGross').html( formatDollar(MonthlyPayCheckGross));

}


function process_afford(){



		var budget_vprice = $('input#budget_vprice').val();
		budget_vprice=budget_vprice.replace(/\,/g,''); 
		budget_vprice=budget_vprice.replace(/\$/g,''); 
		budget_vprice=parseInt(budget_vprice);

		var budget_downpayment = $('input#budget_downpayment').val();
		budget_downpayment=budget_downpayment.replace(/\,/g,'');
		budget_downpayment=budget_downpayment.replace(/\$/g,'');
		budget_downpayment=parseInt(budget_downpayment);

		var trade_in_value = $('input#trade_in_value').val();
		trade_in_value=trade_in_value.replace(/\,/g,''); 
		trade_in_value=trade_in_value.replace(/\$/g,''); 
		trade_in_value=parseInt(trade_in_value);


		var budget_salextax = $('input#budget_salextax').val();
		if(budget_salextax == null || !budget_salextax){ var budget_salextax = '$0'; }

		budget_salextax=budget_salextax.replace(/\,/g,'');
		budget_salextax=budget_salextax.replace(/\$/g,'');
		budget_salextax=parseInt(budget_salextax);



		var budget_grossincome = $('input#budget_grossincome').val();
		if(!budget_grossincome){ var budget_grossincome = parseInt(0);  }else{ 

			budget_grossincome=budget_grossincome.replace(/\,/g,'');
			budget_grossincome=budget_grossincome.replace(/\$/g,'');
			
		}
		var budget_grossincome = parseInt(budget_grossincome);
		
		console.log('budget_grossincome: '+budget_grossincome);
		
		var budget_monthly_payment = $('h2#budget_monthly_payment').html();
		budget_monthly_payment=budget_monthly_payment.replace(/\ Payment */g,'');
		budget_monthly_payment=budget_monthly_payment.replace(/\ NaN.Undefined /g,'');
		budget_monthly_payment=budget_monthly_payment.replace(/\,/g,'');
		budget_monthly_payment=budget_monthly_payment.replace(/\$/g,'');
		budget_monthly_payment=parseInt(budget_monthly_payment);

		var truesellingprice = (budget_salextax + budget_vprice - budget_downpayment - trade_in_value);
		console.log(truesellingprice);
				
		var true_loanterm_months = $('input#true_loanterm_months').val();

		var interest_credit_score = $('input#true_interest_credit_score').val();

		 var princ = parseInt(truesellingprice);
		 var term  = parseInt(true_loanterm_months);
		 var intr   = interest_credit_score / 1200;
		 var budget_value =  parseInt((princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2));

		var budget_value = parseInt(budget_value);

		console.log('budget_monthly_payment: '+budget_monthly_payment);

		console.log('budget_value: '+budget_value);

		//var budget_afford = (budget_monthly_payment / budget_grossincome);

		var budget_afford = ((budget_value / budget_grossincome) * 100);
		if (!isFinite(budget_afford)) budget_afford = 1;
		
		console.log('budget_afford: '+budget_afford);
		
		var budget_afford = parseInt(budget_afford);

		
		var celing = parseInt(33);


		if(+budget_afford > +celing){ 
				var budget_text = 'Budget: NO';
		}else{ 
				var budget_text = 'Budget: OK'; 
		}
		
		$('h2#budget_afford').html(budget_text);

}


function book_appointment(){

}