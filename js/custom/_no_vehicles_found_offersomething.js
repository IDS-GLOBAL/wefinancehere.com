// JavaScript Document
$(document).ready(function(){


	//alert('Sorry No Vehicles Found Js Loaded!');
	


	$('button#endorse_check').on('click', function(){

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



		var slct_paytotheorderof_titlename = document.getElementById("paytotheorderof_titlename");
		var paytotheorderof_titlename = slct_paytotheorderof_titlename.options[slct_paytotheorderof_titlename.selectedIndex].value;


		var paytotheorderof_fname = $('input#paytotheorderof_fname').val();
		var paytotheorderof_lastname = $('input#paytotheorderof_lastname').val();
		
		var paytotheorderof_email = $('input#paytotheorderof_email').val();
		
		
		$.post('script_endorsecheck_approval.php', {
				paytotheorderof_titlename: paytotheorderof_titlename,
				paytotheorderof_fname: paytotheorderof_fname,
				paytotheorderof_lastname: paytotheorderof_lastname,
				paytotheorderof_email: paytotheorderof_email,
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
				cust_car_loan: cust_car_loan
			   }, function(data){
				
					console.log(data);
			   });
	});

});