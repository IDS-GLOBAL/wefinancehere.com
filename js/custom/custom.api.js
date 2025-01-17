
$(document).ready(function(){

	
	


});





	function getsingleInfo(){
		FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email'}, function(response){
			//document.getElementByID('status').innerHTML = response.id;
			var pic_id = response.id;
			var new_pic = 'https://graph.facebook.com/'+ pic_id +'/picture?type=normal';
			document.getElementById('ftr_pic').src = new_pic;
			document.getElementById('api_fbpic').href = 'account/dashboard.php';

			var approval_fname = response.first_name;
			var approval_lname = response.last_name;
			var approval_email = response.email;

			var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
			var wfhcookiesesid = $('input#wfhcookiesesid').val();

			$('input#access_id').val(pic_id);
			$('input#approval_fname').val(approval_fname);
			$('input#approval_lname').val(approval_lname);
			$('input#approval_email').val(approval_email);
			$('input#email_login').val(approval_email);


			var budget_afford = $('input#budget_afford').val();
			var cust_creditapr = $('input#cust_creditapr').val();
			var cust_creditapr_txt = $('input#cust_creditapr_txt').val();

			var cust_car_loan = $('input#cust_car_loan').val();

			$.post('script_api_single_postlogin.php', {
							access_id: pic_id,
							wfhuser_approval_id: wfhuser_approval_id,
							wfhcookiesesid: wfhcookiesesid,
							approval_fname: approval_fname,
							approval_lname: approval_lname,
							approval_email: approval_email,
							budget_afford: budget_afford,
							cust_creditapr: cust_creditapr,
							cust_creditapr_txt: cust_creditapr_txt,
							cust_car_loan: cust_car_loan
			}, function(data){
				$('div#connected_results').html(data);
			});


		});



}