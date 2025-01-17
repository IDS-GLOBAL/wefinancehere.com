
// Page scrolling feature
$(document).on('click', 'a.page-scroll', function(event) {
	var view = $(this).attr('href');
	//console.log('link: '+link);
	$('html, body').stop().animate({
		//scrollTop: $(link.attr('href')).offset().top - 50
		scrollTop: $(view).offset().top - 50

	}, 500);
	event.preventDefault();
});

$(document).on('click', 'a.dinvtvw.map-scroll', function(event) {
	
	var view = $(this).attr('rel');
	console.log('link: '+view);
	$('html, body').stop().animate({
		scrollTop: $('#'+view).offset().top - 50
	}, 500);
	event.preventDefault();
	return false;
});

function cleanup_connection(){

	$('div#connected_results').html('');

}

$(document).ready(function(){


$('li#closemodule').on('click', function(){

	$('div#bottom_floater').hide();
});


$('ul#vehicle_likes_float a').on('click', function(){


		$('div#vdlisting_results').hide();
		$('div#vlisting_result').show();

});


$('a#show_vehicles').on('click', function(){

		$('div#vdlisting_results').show();
		$('div#vlisting_result').hide();

});




var check_your_email = 'Please Check Your Email!';

$('a#loginWFHuser').on('click', function(){

		$('#loginWFHusermodal').modal({backdrop:'static',keyboard:false, show:true});

});

$('a#recover_link').on('click', function(){

		
		$('#loginWFHusermodal').modal('hide');
		
		
		$('#recoverpassWFHusermodal').modal({backdrop:'static',keyboard:false, show:true});

});


$('button#login_again').on('click', function(){

		
		$('#recoverpassWFHusermodal').modal('hide');
		
		
		$('#loginWFHusermodal').modal({backdrop:'static',keyboard:false, show:true});

});


$('input#email_login').on('change', function(){
	
	var email_login = $('input#email_login').val();
	
	if (validateEmail(email_login)) {
		$('button#logme_in').prop('disabled', false);
		$(this).parent('.form-group').addClass('has-success').removeClass('has-error');
		
	  } else {
		$(this).parent('.form-group').addClass('has-error').removeClass('has-success');
		$('input#pass_login').val('');
		$('button#logme_in').prop('disabled', true);		
	  }
});

$('input#approval_email').on('change', function(){
	
	var approval_email = $(this).val();
	if(validateEmail(approval_email)){

				if($(this).parent('div').hasClass('has_idle')) {
					$(this).parent('div').addClass('has_success').removeClass('has_idle');					
				}

				if($(this).parent('div').hasClass('has_error')) {
					$(this).parent('div').addClass('has_success').removeClass('has_error');					
				}



	}else{
				if($(this).parent('div').hasClass('has_idle')) {
					$(this).parent('div').addClass('has_error').removeClass('has_idle');					
				}

				if($(this).parent('div').hasClass('has_success')) {
					$(this).parent('div').addClass('has_error').removeClass('has_success');					
				}
	}
	
});

$('input#pass_login').on('change', function(){

	var pass_login = $(this).val();
	var n = pass_login.length;
	
	if (n > 5) {
		//console.log(approval_email + " is valid :)");
		$('button#logme_in').prop('disabled', false).removeClass('disabled');
		$(this).parent('.form-group').addClass('has-success').removeClass('has-error');

	  } else {
		//console.log(approval_email + " is not valid :(");
		$('button#logme_in').prop('disabled', true);
		$(this).parent('.form-group').addClass('has-error').removeClass('has-success');

		
	  }
});

$('select#your_credit').on('change', function(){

	console.log("your_credit: "+your_credit);


		//do_wait();
		if($(this).parent('.col-md-4').hasClass('has_idle')) {
			
			$(this).parent('.col-md-4').addClass('has_success').removeClass('has_idle');
			
		}

			var slct_your_credit = document.getElementById("your_credit");
			var your_credit = slct_your_credit.options[slct_your_credit.selectedIndex].value;
			var your_credit_text = slct_your_credit.options[slct_your_credit.selectedIndex].text;
			
			if(your_credit == 3.0){
				var risk_factor_lvl = 1;
			}else if(your_credit == 7.0){
				var risk_factor_lvl = 2;
			}else if(your_credit == 12.0){
				var risk_factor_lvl = 3;
			}else if(your_credit == 21.0){
				var risk_factor_lvl = 4;
			}else if(your_credit == 23.0){
				var risk_factor_lvl = 5;
			}else if(your_credit == 29.0){
				var risk_factor_lvl = 6;
			}
			
			$('input#risk_factor_lvl').val(risk_factor_lvl);
			
			


		//just_dismss();
});


$('select#down_payment').on('change', function(){

		//console.log(approval_email + " is valid :)");


		if($(this).parent('.col-md-2').hasClass('has_idle')) {
			
			$(this).parent('.col-md-2').addClass('has_success').removeClass('has_idle');
			
		}
});


$('select#max_car_payment').on('change', function(){

		//console.log(approval_email + " is valid :)");

			var budget_afford = $('input#budget_afford').val();
			
			if(budget_afford == 'Y'){

				if($(this).parent('.col-md-3').hasClass('has_idle')) {
					
					$(this).parent('.col-md-3').addClass('has_success').removeClass('has_idle');
					
				}

				if($(this).parent('.col-md-3').hasClass('has_error')) {
					
					$(this).parent('.col-md-3').addClass('has_success').removeClass('has_error');
					
				}

			}else{

				if($(this).parent('.col-md-3').hasClass('has_idle')) {
					
					$(this).parent('.col-md-3').addClass('has_error').removeClass('has_idle');
					
				}


				if($(this).parent('.col-md-3').hasClass('has_success')) {
					
					$(this).parent('.col-md-3').addClass('has_error').removeClass('has_success');
					
				}


			}





});


$('select#how_long').on('change', function(){

		//console.log(approval_email + " is valid :)");


		//do_wait();
		if($(this).parent('.col-md-3').hasClass('has_idle')) {
			
			$(this).parent('.col-md-3').addClass('has_success').removeClass('has_idle');
			
		}
		//just_dismss();
});


$('#logme_in').on('click', function(){
		
		var email_login = $('input#email_login').val();

		var pass_login = $('input#pass_login').val();

		
			if (validateEmail(email_login)) {
				//console.log(approval_email + " is valid :)");
					$(this).addClass('has-success');
			  } else {
				//console.log(approval_email + " is not valid :(");
				$(this).addClass('has-error');
				alert('Sorry You Entered An Invalid Email: '+email_login+' is not a good email to use.');
				return false;
			  }

			
			$.post('script_login_wfhuser.php', {email_login: email_login, pass_login: pass_login}, 
			function(data)
			{
				$('div#login_results').html(data);
			});

			$('input#pass_login').val('');

			$('div#recoverpass_box').html(check_your_email);
			
});


$('a#recover_login_submit').on('click', function(){
		
		var recover_password_email = $('input#recover_password').val();
		
		
			if (validateEmail(recover_password_email)) {
				//console.log(approval_email + " is valid :)");
					$(this).addClass('has-success');
			  } else {
				//console.log(approval_email + " is not valid :(");
				$(this).addClass('has-error');
				alert('Sorry You Entered An Invalid Email: '+recover_password_email+' is not a good email to use.');
				return false
			  }

			
			$.post('script_email_passrecovery.php', {recover_password_email: recover_password_email}, 
			function(data)
			{
				$('div#recoverpass_results').html(data);
			});

			$('div#recoverpass_box').html(check_your_email);
});


$('i.text-light.fa.fa-lg.fa-fw.fa-twitter').on('click', function(){

	
	//do_wait();

});


$('button#allocate_funds').on('click', function(){
	

	

			var approval_token = $('input#pubservtoken').val();
			var budget_afford = $('input#budget_afford').val();
			var cust_creditapr = $('input#cust_creditapr').val();
			var cust_creditapr_txt = $('input#cust_creditapr_txt').val();
			var cust_downpayment = $('input#cust_downpayment').val();
						
			var cust_desiredpymt = $('input#cust_desiredpymt').val();
			var cust_desiredtermos = $('input#cust_desiredtermos').val();

			var slct_gross_moincome = document.getElementById("gross_moincome");
			var gross_moincome = slct_gross_moincome.options[slct_gross_moincome.selectedIndex].value;

			var	cust_home_state = $('input#cust_home_state').val();
			var cust_home_market = $('input#cust_home_market').val();
			
			var bigPrincipal = $('input#bigPrincipal').val();
			var bigSellingPrice = $('input#bigSellingPrice').val();
	
			var cust_totalpayments = $('input#cust_totalpayments').val();

			var cust_car_loan = $('input#cust_car_loan').val();

			if(!bigPrincipal){
					alert('Please Set An Approval First');
					return false;				
			}


			var approval_email = $('input#approval_email').val();

			if(!approval_email){ alert('Sorry Your Email Is Missing'); return false; };

			if (validateEmail(approval_email)) {


				if($('input#approval_email').parent('div').hasClass('has_idle')) {
					$('input#approval_email').parent('div').addClass('has_success').removeClass('has_idle');					
				}

				if($('input#approval_email').parent('div').hasClass('has_error')) {
					$('input#approval_email').parent('div').addClass('has_success').removeClass('has_error');					
				}



			  } else {


				if($('input#approval_email').parent('div').hasClass('has_idle')) {
					$('input#approval_email').parent('div').addClass('has_error').removeClass('has_idle');					
				}

				if($('input#approval_email').parent('div').hasClass('has_success')) {
					$('input#approval_email').parent('div').addClass('has_error').removeClass('has_success');					
				}


				alert('Sorry You Entered A Invalid Email: '+approval_email);
				return false
			  }

			var approval_phoneno = $('input#approval_phoneno').val();
			if(!approval_phoneno){ alert('Sorry Your Phone Number Is Missing'); return false; };



			var approval_fname = $('input#approval_fname').val();
			if(!approval_fname){ alert('Sorry Your Frist Name Is Missing'); return false; };
			
			var approval_lname = $('input#approval_lname').val();
			if(!approval_lname){ alert('Sorry Your Last Name Is Missing'); return false; };
	
	

	$.post('script_record_allocated_funds.php', 
		   {
		   				approval_token: approval_token,
						budget_afford: budget_afford,
  						cust_creditapr: cust_creditapr,
						cust_creditapr_txt: cust_creditapr_txt,
						cust_downpayment: cust_downpayment,
						cust_desiredpymt: cust_desiredpymt,
						cust_desiredtermos: cust_desiredtermos,
						gross_moincome: gross_moincome,
						cust_home_state: cust_home_state,
						cust_home_market: cust_home_market,
						bigPrincipal: bigPrincipal,
						bigSellingPrice: bigSellingPrice,
						cust_totalpayments: cust_totalpayments,
						cust_car_loan: cust_car_loan,
						approval_email: approval_email,
						approval_phoneno: approval_phoneno,
						approval_fname: approval_fname,
						approval_lname: approval_lname

				   }, function(data)
				   {
					   
					   //console.log(data);
					   //show_budgetable_vehicles();
					   
					});
		
					//show_budgetable_vehicles();
ajax_preapproved_vehicles();

});



$('button#lockin_preapproval').on('click', function(data){
				
				$('div#register_myapproval_box').show();
				//$('div#view_choices_box').hide();
				$(this).hide();

});


$('a#shop_only').on('click', function(event){
						
			pass_approvalornot();

			var slct_your_credit = document.getElementById("your_credit");
			var your_credit = slct_your_credit.options[slct_your_credit.selectedIndex].value;
			var your_credit_text = slct_your_credit.options[slct_your_credit.selectedIndex].text;
			
			if(your_credit == 3.0){
				var risk_factor_lvl = 1;
			}else if(your_credit == 7.0){
				var risk_factor_lvl = 2;
			}else if(your_credit == 12.0){
				var risk_factor_lvl = 3;
			}else if(your_credit == 21.0){
				var risk_factor_lvl = 4;
			}else if(your_credit == 23.0){
				var risk_factor_lvl = 5;
			}else if(your_credit == 29.0){
				var risk_factor_lvl = 6;
			}
			
			$('input#risk_factor_lvl').val(risk_factor_lvl);

			var budget_afford = $('input#budget_afford').val();
			
			if(budget_afford == 'Y'){
			
			
					//$('div#gather_budget').hide();
					$('div#register_myapproval_box').show();
					
					$('section#recently_sold').hide();
					$('section#choose_us').hide();

				//do_wait();

				ajax_preapproved_vehicles();
				$('div#vdlisting_results').show();
				//no_wait();
				//just_dismiss();
			
			}else{
				
				say_nobudgetpass();
				
				pass_approvalornot();
				
				alert("Sorry We Can't Approve You At This Time Check Your Income And Car Payment!");

				var link = $('a#myapproval').attr('href');
				$('html, body').stop().animate({
					scrollTop: $(link.attr('href')).offset().top - 50
				}, 500);
				event.preventDefault();
				return false;				
			}
			

			

});





$('button#save_myfundsnow').on('click', function(){

		var totalPayments = $('input#cust_totalpayments').val();
		
			if(!totalPayments || totalPayments == 0){
				alert('Sorry You Do not have a proper request. Please Make A Request.');
				
				$('#myFunds').modal('hide');
				
				return false;
			}



			var pubservtoken = $('input#pubservtoken').val();
			var slct_funds_titlename = document.getElementById("funds_titlename");
			var funds_titlename = slct_funds_titlename.options[slct_funds_titlename.selectedIndex].value;

			var funds_firstname = $('input#funds_firstname').val();

			var funds_midname = $('input#funds_midname').val();
			var funds_lastname = $('input#funds_lastname').val();
			var funds_suffixname = $('input#funds_suffixname').val();
			var funds_email = $('input#funds_email').val();

				if(!funds_email){ alert('Your Email Is Missing'); return false; };

				if (validateEmail(funds_email)) {
					console.log(funds_email + " is valid :)");
				  } else {
					console.log(funds_email + " is not valid :(");
				   	alert('Sorry Invalid Email');
					return false
				  }

			var funds_cellphoneno = $('input#funds_cellphoneno').val();
			var funds_password = $('input#funds_password').val();
			var funds_confirm_pasword = $('input#funds_confirm_pasword').val();
			
			var funds_dob = $('input#funds_dob').val();



			var slct_deal_dayswhen = document.getElementById("deal_dayswhen");
			var deal_dayswhen = slct_deal_dayswhen.options[slct_deal_dayswhen.selectedIndex].value;
			deal_dayswhen = parseInt(deal_dayswhen);


			if ($('input#funds_agree_terms').is(':checked')) {
				var funds_agree_terms = 'Y';

			}else{
				var funds_agree_terms = 'N';
				alert('Please Agree To Terms And Conditions Before Continuing.');
				return false;
			}			



			var funds_firstname = $('input#funds_firstname').val();

			var budget_afford = $('input#budget_afford').val();
			var cust_creditapr = $('input#cust_creditapr').val();
			var cust_downpayment = $('input#cust_downpayment').val();
			var cust_desiredpymt = $('input#cust_desiredpymt').val();
			var cust_desiredtermos = $('input#cust_desiredtermos').val();
			var cust_car_loan = $('input#cust_car_loan').val();
			var bigPrincipal = $('input#bigPrincipal').val();


			var bigSellingPrice = $('input#bigSellingPrice').val();
			var cust_totalpayments = $('input#cust_totalpayments').val();
			var cust_dealtoday = $('input#cust_dealtoday').val();
			var cust_desiredpymt = $('input#cust_desiredpymt').val();
			var cust_schedule_td = $('input#cust_schedule_td').val();
			var cust_lead_source = $('input#cust_lead_source').val();
			var cust_lead_temperature = $('input#cust_lead_temperature').val();
			var cust_lead_ip = $('input#cust_lead_ip').val();
			var cust_lead_broswer = $('input#cust_lead_broswer').val();
			var wfhcookiesesid = $('input#wfhcookiesesid').val();
			var cust_home_state = $('input#cust_home_state').val();
			var cust_home_market = $('input#cust_home_market').val();


	
	
	
			$.post('script_register_funds.php', {
						pubservtoken: pubservtoken,
						funds_titlename: funds_titlename,
						funds_firstname: funds_firstname,
						funds_midname: funds_midname,
						funds_lastname: funds_lastname,
						funds_suffixname: funds_suffixname,
						funds_email: funds_email,
						funds_cellphoneno: funds_cellphoneno,
						funds_password: funds_password,
						funds_confirm_pasword: funds_confirm_pasword,
						funds_dob: funds_dob,
						deal_dayswhen: deal_dayswhen,
						funds_agree_terms: funds_agree_terms,
						funds_firstname: funds_firstname,
						budget_afford: budget_afford,
						cust_creditapr: cust_creditapr,
						cust_downpayment: cust_downpayment,
						cust_desiredpymt: cust_desiredpymt,
						cust_desiredtermos: cust_desiredtermos,
						cust_car_loan: cust_car_loan,
						bigPrincipal: bigPrincipal,
						bigSellingPrice: bigSellingPrice,
						cust_totalpayments: cust_totalpayments,
						cust_dealtoday: cust_dealtoday,
						cust_desiredpymt: cust_desiredpymt,
						cust_schedule_td: cust_schedule_td,
						cust_lead_source: cust_lead_source,
						cust_lead_temperature: cust_lead_temperature,
						cust_lead_ip: cust_lead_ip,
						cust_lead_broswer: cust_lead_broswer,
						wfhcookiesesid: wfhcookiesesid,
						cust_home_state: cust_home_state,
						cust_home_market: cust_home_market

				   }, function(data){
			
			
					//console.log('Data: '+data);
					
					$('section#start_box').hide();
					
					$('#myFunds').modal('hide');

			});
	
});	
/* End Document Ready  */
	
	
	
	
	
	
	


});






// This funciton process the showing vehicles
function show_budgetable_vehicles(){


			//console.log('Showing Budgetable Vehicles...');

			var budget_afford = $('input#budget_afford').val();
			var cust_creditapr = $('input#cust_creditapr').val();
			var cust_downpayment = $('input#cust_downpayment').val();
			var cust_desiredpymt = $('input#cust_desiredpymt').val();
			var cust_desiredtermos = $('input#cust_desiredtermos').val();
			var cust_car_loan = $('input#cust_car_loan').val();
			var bigPrincipal = $('input#bigPrincipal').val();


			var bigSellingPrice = $('input#bigSellingPrice').val();
			var cust_totalpayments = $('input#cust_totalpayments').val();
			var cust_dealtoday = $('input#cust_dealtoday').val();
			var cust_desiredpymt = $('input#cust_desiredpymt').val();
			var cust_schedule_td = $('input#cust_schedule_td').val();
			var cust_lead_source = $('input#cust_lead_source').val();
			var cust_lead_temperature = $('input#cust_lead_temperature').val();
			var cust_lead_ip = $('input#cust_lead_ip').val();
			var cust_lead_broswer = $('input#cust_lead_broswer').val();
			var wfhcookiesesid = $('input#wfhcookiesesid').val();
			var cust_home_state = $('input#cust_home_state').val();
			var cust_home_market = $('input#cust_home_market').val();


			$('section#start_box').hide();
			$('section#recently_sold').hide();
			$('section#choose_us').hide();

			
			$.get('script_ajax_vehicles_budget.php', {
   						budget_afford: budget_afford,
						cust_creditapr: cust_creditapr,
						cust_downpayment: cust_downpayment,
						cust_desiredpymt: cust_desiredpymt,
						cust_desiredtermos: cust_desiredtermos,
						cust_car_loan: cust_car_loan,
						bigPrincipal: bigPrincipal,
						bigSellingPrice: bigSellingPrice,
						cust_totalpayments: cust_totalpayments,
						cust_dealtoday: cust_dealtoday,
						cust_desiredpymt: cust_desiredpymt,
						cust_schedule_td: cust_schedule_td,
						cust_lead_source: cust_lead_source,
						cust_lead_temperature: cust_lead_temperature,
						cust_lead_ip: cust_lead_ip,
						cust_lead_broswer: cust_lead_broswer,
						wfhcookiesesid: wfhcookiesesid,
						state: cust_home_state,
						cust_home_market: cust_home_market
			}, function(data){
				//console.log(data);
				$('div#vdlisting_results').html(data);
				
				if(data){ 
					
					
					
				}
			
			
			});


}

function ajax_preapproved_vehicles(){


			var budget_afford = $('input#budget_afford').val();
			var cust_creditapr = $('input#cust_creditapr').val();
			var cust_creditapr_txt = $('input#cust_creditapr_txt').val();
			var cust_downpayment = $('input#cust_downpayment').val();
			var cust_desiredpymt = $('input#cust_desiredpymt').val();
			var cust_desiredtermos = $('input#cust_desiredtermos').val();
			var cust_car_loan = $('input#cust_car_loan').val();
			var bigPrincipal = $('input#bigPrincipal').val();


			var bigSellingPrice = $('input#bigSellingPrice').val();
			var cust_totalpayments = $('input#cust_totalpayments').val();
			var cust_dealtoday = $('input#cust_dealtoday').val();
			var cust_desiredpymt = $('input#cust_desiredpymt').val();
			var cust_schedule_td = $('input#cust_schedule_td').val();
			var cust_lead_source = $('input#cust_lead_source').val();
			var cust_lead_temperature = $('input#cust_lead_temperature').val();
			var cust_lead_ip = $('input#cust_lead_ip').val();
			var cust_lead_broswer = $('input#cust_lead_broswer').val();
			var wfhcookiesesid = $('input#wfhcookiesesid').val();
			var cust_home_state = $('input#cust_home_state').val();
			var cust_home_market = $('input#cust_home_market').val();

			var approval_email = $('input#approval_email').val();

/*
			var slct_gross_moincome = document.getElementById("gross_moincome");
			var gross_moincome = slct_gross_moincome.options[slct_gross_moincome.selectedIndex].value;
			
*/			
			var gross_moincome = $('input#gross_monthlyincome').val();
			
			$.get('script_ajax_vehicles_budget.php', {
   						budget_afford: budget_afford,
						cust_creditapr: cust_creditapr,
						cust_creditapr_txt: cust_creditapr_txt,
						cust_downpayment: cust_downpayment,
						cust_desiredpymt: cust_desiredpymt,
						cust_desiredtermos: cust_desiredtermos,
						cust_car_loan: cust_car_loan,
						bigPrincipal: bigPrincipal,
						bigSellingPrice: bigSellingPrice,
						cust_totalpayments: cust_totalpayments,
						cust_dealtoday: cust_dealtoday,
						cust_desiredpymt: cust_desiredpymt,
						cust_schedule_td: cust_schedule_td,
						cust_lead_source: cust_lead_source,
						cust_lead_temperature: cust_lead_temperature,
						cust_lead_ip: cust_lead_ip,
						cust_lead_broswer: cust_lead_broswer,
						wfhcookiesesid: wfhcookiesesid,
						state: cust_home_state,
						cust_home_market: cust_home_market,
						approval_email: approval_email,
						gross_moincome: gross_moincome
			}, function(data){
				//console.log(data);
				$('div#vdlisting_results').html(data);
			});








}







