// JavaScript Document
// http://plugins.upbootstrap.com/bootstrap-select/

function do_wait(){
	
	$('div#waiting_content').html("<img src='img/loading(2).gif' >");
	$('div#waiting_screen').modal({backdrop:'static',keyboard:false, show:true}).delay(5000);

	setTimeout(function() {		
		 no_wait();
	}, 3000);

	
};




function no_wait(){

		$('div#waiting_content').html('');

		
		$('div#waiting_screen').modal('hide');
	

	
};


function just_dismiss(){

		$('div#waiting_screen').modal('hide');

};

$(document).ready(function(){


	var budget_approved = $('input#budget_afford').val();
	
	if(budget_approved == 'Y'){
		process_approval();
	}



	$('select#gross_moincome').bind('change, click', function(){




			var budget_afford = $('input#budget_afford').val();
			
			if(budget_afford == 'Y'){

				if($(this).parent('div').hasClass('has_idle')) {
					
					$(this).parent('div').addClass('has_success').removeClass('has_idle');
					
				}

				if($(this).parent('div').hasClass('has_error')) {
					
					$(this).parent('div').addClass('has_success').removeClass('has_error');
					
				}


				if($('select#max_car_payment').parent('div').hasClass('has_error')) {
					
					$('select#max_car_payment').parent('div').addClass('has_success').removeClass('has_error');
					
				}


			}else{

				if($(this).parent('div').hasClass('has_success')) {
					
					$(this).parent('div').addClass('has_error').removeClass('has_success');
					
				}

				if($(this).parent('div').hasClass('has_idle')) {
					
					$(this).parent('div').addClass('has_error').removeClass('has_idle');
					
				}

				if($('select#max_car_payment').parent('div').hasClass('has_idle')) {
					
					$('select#max_car_payment').parent('div').addClass('has_error').removeClass('has_idle');
					
				}

				if($('select#max_car_payment').parent('div').hasClass('has_success')) {
					
					$('select#max_car_payment').parent('div').addClass('has_error').removeClass('has_success');
					
				}

				if($('select#max_car_payment').parent('div').hasClass('has_idle')) {
					
					$('select#max_car_payment').parent('div').addClass('has_error').removeClass('has_idle');
					
				}

				if($('select#max_car_payment').parent('div').hasClass('has_success')) {
					
					$('select#max_car_payment').parent('div').addClass('has_error').removeClass('has_success');
					
				}





			}


			var slct_gross_moincome = document.getElementById("gross_moincome");
			var gross_moincome = slct_gross_moincome.options[slct_gross_moincome.selectedIndex].value;
			$('input#gross_monthlyincome').val(gross_moincome);

			pass_approvalornot();

			
			

			
	});










	
	
	$('select#dma_state').on('change', function(){


			var slct_dma_state = document.getElementById("dma_state");
			var dma_state = slct_dma_state.options[slct_dma_state.selectedIndex].value;
			$('input#cust_home_state').val(dma_state);

			$('select#dma_market').removeAttr('disabled');


			$.post('script_pull_availablemarkets.php', {dma_state: dma_state}, function(data){
						
						$('select#dma_market').html(data);
			
			});
			
			
			
	});
	
	$('div #gather_budget select').bind('change click', function(){
			//console.log('Budget Select Hit');

			var slct_your_credit = document.getElementById("your_credit");
			var your_credit = slct_your_credit.options[slct_your_credit.selectedIndex].value;
			var your_credit_text = slct_your_credit.options[slct_your_credit.selectedIndex].text;
			$('input#cust_creditapr').val(your_credit);
			$('input#cust_creditapr_txt').val(your_credit_text);


			var slct_down_payment = document.getElementById("down_payment");
			var down_payment = slct_down_payment.options[slct_down_payment.selectedIndex].value;
			$('input#cust_downpayment').val(down_payment);

			var slct_max_car_payment = document.getElementById("max_car_payment");
			var max_car_payment = slct_max_car_payment.options[slct_max_car_payment.selectedIndex].value;
			$('input#cust_desiredpymt').val(max_car_payment);

			var slct_gross_moincome = document.getElementById("gross_moincome");
			var gross_moincome = slct_gross_moincome.options[slct_gross_moincome.selectedIndex].value;
			$('input#gross_monthlyincome').val(gross_moincome);

			var slct_how_long = document.getElementById("how_long");
			var how_long = slct_how_long.options[slct_how_long.selectedIndex].value;
			$('input#cust_desiredtermos').val(how_long);


			var slct_dma_state = document.getElementById("dma_state");
			var dma_state = slct_dma_state.options[slct_dma_state.selectedIndex].value;
			$('input#cust_home_state').val(dma_state);

			var slct_dma_market = document.getElementById("dma_market");
			var dma_market = slct_dma_market.options[slct_dma_market.selectedIndex].value;
			$('input#cust_home_market').val(dma_market);

			var slct_deal_dayswhen = document.getElementById("deal_dayswhen");
			var deal_dayswhen = slct_deal_dayswhen.options[slct_deal_dayswhen.selectedIndex].value;
			
		
			if(deal_dayswhen == '2'){ 
				$('input#cust_dealtoday').val(deal_dayswhen);
				$('input#cust_lead_temperature').val('HOT'); 
				
				
			}else{
			
				$('input#cust_lead_temperature').val('HOT'); 
			}


			var slct_open_trade = document.getElementById("open_trade");
			var open_trade = slct_open_trade.options[slct_open_trade.selectedIndex].value;
			$('input#cust_car_loan').val(open_trade);
			
			//var data_id = $(this).closest('.btn-group.bootstrap-select.form-control').find('button').attr('data-id');

			/* 
			
			var e = $(this).attr('id');
			
			var val = $(this).val();
			*/
			//var txt = $(this).text();

			//scrape_slct(e, val);

				
		
			process_approval();

	});
	
	
	




});


function validateEmail(email) {
  var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return re.test(email);
}



function scrape_slct(e, val){

	//console.log('E: = '+e);
	//console.log('tha: '+val);



	var selected = $('select#'+e).find('optgroup option:selected').val();
	var selected = $('select#'+e).find('optgroup option:selected').val();


		if(e == 'your_credit'){ $('input#cust_creditapr').val(selected) }
		if(e == 'down_payment'){ $('input#cust_downpayment').val(selected) }
		if(e == 'max_car_payment'){ $('input#cust_desiredpymt').val(selected) }
		if(e == 'how_long'){ $('input#cust_desiredtermos').val(selected) }
		if(e == 'dma_state'){ $('input#cust_home_state').val(selected) }
		if(e == 'dma_market'){ $('input#cust_home_market').val(selected) }
		if(e == 'open_trade'){ $('input#cust_car_loan').val(selected) }
		if(e == 'deal_dayswhen'){ $('input#cust_dealtoday').val(selected) }
		if(e == 'open_trade'){ $('input#cust_car_loan').val(selected) }
		
		if(e == 'deal_dayswhen' && selected == '2'){ 
			$('input#cust_dealtoday').val(selected); 
			$('input#cust_lead_temperature').val(); 
		}

	//console.log('e: = '+e);
	
	//console.log('selected: = '+selected);
	//console.log('tha: '+tha);

}


// http://stackoverflow.com/questions/149055/how-can-i-format-numbers-as-money-in-javascript
function formatDollar(num) {
    var p = num.toFixed(2).split(".");
    return "$ " + p[0].split("").reverse().reduce(function(acc, num, i) {
        return  num + (i && !(i % 3) ? "," : "") + acc;
    }, "") + "." + p[1];
	return;
}

function formatDollar2(num) {
    var p = num.toFixed(2).split(".");
    return "$ " + p[0].split("").reverse().reduce(function(acc, num, i) {
        return  num + (i && !(i % 3) ? "," : "") + acc;
    }, "") + "." + p[1];
	return;
}

function pass_approvalornot(){
	

			var slct_gross_moincome = document.getElementById("gross_moincome");
			var gross_moincome = slct_gross_moincome.options[slct_gross_moincome.selectedIndex].value;
			gross_moincome = parseInt(gross_moincome);

			var budget_value = $('input#bigPrincipal').val();
			budget_value = parseInt(budget_value);

			var slct_max_car_payment = document.getElementById("max_car_payment");
			var max_car_payment = slct_max_car_payment.options[slct_max_car_payment.selectedIndex].value;
			max_car_payment = parseInt(max_car_payment);


						//var budget_afford = ((budget_value / gross_moincome) * 100);
						var budget_afford = (0.33 * gross_moincome);
						
						
						var budget_afford = parseInt(budget_afford);
				
										
				
						if(max_car_payment > budget_afford){

								var budget_text = 'Budget: NO';
								var budget = 'NO';
								
								say_nobudgetpass()
								
								$('div#approval_boxwbudget').addClass('has_error');
								$('div#approval_boxwbudget').removeClass('has_success');

								$('input#budget_afford').val('N');
								
								$('select#gross_moincome').parent().addClass('has_error');
								$('select#gross_moincome').parent().removeClass('has_success');
								
								
						}else{
								var budget_text = 'Budget: OK';
								var budget = 'OK';
								
								 say_okbudgetpass();

								$('div#approval_boxwbudget').addClass('has_success');
								$('div#approval_boxwbudget').removeClass('has_idle');
								$('div#approval_boxwbudget').removeClass('has_error');
								$('div#approval_boxwbudget').removeClass('has_caution');

								$('input#budget_afford').val('Y');
								
								$('select#gross_moincome').parent().addClass('has_success');
								$('select#gross_moincome').parent().removeClass('has_error').removeClass('has_idle');;

						}

}


function say_nobudgetpass(){


$say_this = '<p>Sorry your <em>monthly income</em> must support this approval.</p>';

$('div#humanread_approval_script').html($say_this);


}

function say_okbudgetpass(){


$say_this = '<p>Your <em>monthly income</em> budget will satisfy this approval.</p>';

$('div#humanread_approval_script').html($say_this);


}

function showpay() {
 var princ = document.form_one_creditapp.applilcant_v_financed_amount.value;
 var term  = document.form_one_creditapp.applilcant_v_term_months.value;
 var intr   = document.form_one_creditapp.applilcant_v_cust_rate.value / 1200;
 //document.form_one_creditapp.applilcant_v_total_monthpmts_est.value = princ * intr / (1 - (Math.pow(1/(1 + intr), term)));
 document.form_one_creditapp.applilcant_v_total_monthpmts_est.value = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);


}

function getPrincipal() {

	// //console.log('ok');
	var slct_your_credit = document.getElementById("your_credit");
	var your_credit = slct_your_credit.options[slct_your_credit.selectedIndex].value;
	var i = slct_your_credit.options[slct_your_credit.selectedIndex].value;
	// //console.log(i);
	if (i >= 1.0) {
	  i = i / 100.0;
	}
	i /= 12;
	
	var slct_how_long = document.getElementById("how_long");
	var how_long = slct_how_long.options[slct_how_long.selectedIndex].value;
	
	var noMonths = ( parseInt(how_long)) * 12;
	// //console.log(noMonths);
	var pow = 1;
	
	for (var m = 0; m < noMonths; m++) {
	  pow = pow * (1 + i);
	}

	var slct_max_car_payment = document.getElementById("max_car_payment");
	var Vpayment = slct_max_car_payment.options[slct_max_car_payment.selectedIndex].value;

	var slct_down_payment = document.getElementById("down_payment");
	var down_payment = slct_down_payment.options[slct_down_payment.selectedIndex].value;
	var down_payment = parseInt(down_payment);
	//console.log('down_payment: '+down_payment);



	var Rprincipal = ((pow - 1) *  parseInt(Vpayment)) / (pow * i);
	//console.log('Rprincipal: '+Rprincipal);	
	
	var principal = parseInt(principal);
	var principal =  parseInt(Rprincipal.toFixed(2));
	//console.log('principal: '+principal);  // This Is correct
	
	
	
	
	

	var sum = principal + down_payment;
	//console.log('Hey: '+sum);
	
	$('input#bigSellingPrice').val(sum);
	
	var sum = (sum - 0);


	//console.log('Selling Price: '+sum);	
	
	$('input#bigPrincipal').val(principal);
	
	var principal_read = formatDollar2(sum);
	

	$('h3#principle_amount').html(principal_read);


   
	//console.log('Principal '+principal_read);
	pass_approvalornot();
   		

}


function process_approval(){

			var slct_max_car_payment = document.getElementById("max_car_payment");
			var max_car_payment = slct_max_car_payment.options[slct_max_car_payment.selectedIndex].value;
			max_car_payment = parseInt(max_car_payment);
			
			//console.log('Max Car Payment: '+max_car_payment);
	
			var slct_your_credit = document.getElementById("your_credit");
			var your_credit = slct_your_credit.options[slct_your_credit.selectedIndex].value;
			//console.log('Your Credit: '+your_credit);

			var slct_down_payment = document.getElementById("down_payment");
			var down_payment = slct_down_payment.options[slct_down_payment.selectedIndex].value;
			down_payment = parseInt(down_payment);
			//console.log('Down Payment: '+down_payment);


			var slct_how_long = document.getElementById("how_long");
			var how_long = slct_how_long.options[slct_how_long.selectedIndex].value;
			how_long = parseInt(how_long);
			
			var usehow_long = (how_long) * 12;
			
			//console.log('How Long: '+how_long);
			//console.log('Use How Long: '+usehow_long);

			var total_payments = (max_car_payment * usehow_long -0);
			//console.log('total_payments: '+total_payments);
			
			$('input#cust_totalpayments').val(total_payments);
			$('span#these_totalpayments').html(formatDollar(total_payments));
			
			var need_amount_tog = (total_payments -0) - (down_payment -0) + 350;
			
			$('input#cust_totalapproval').val(need_amount_tog);
			
			var need_amount = formatDollar(need_amount_tog);
			
			//console.log('Need Amount: '+need_amount);

		$('h3#need_amount').html(formatDollar(total_payments));
		$('span#need_amountt').html(formatDollar(total_payments));

		//$('h3#need_amount').html(need_amount + '<br />' + formatDollar(total_payments));


			getPrincipal();
			
			pass_approvalornot();
		
}

