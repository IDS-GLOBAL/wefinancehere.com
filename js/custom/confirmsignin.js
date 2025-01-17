// JavaScript Document
$(document).ready(function(){


$('input#pass_login').on('change', function(){
											 
	//run_verifycss();
	
});


$('input#confirm_pass_login').on('change', function(){
											 
	run_verifycss();
	
});


$('button#create_pass').on('click', function(){

//debugger;

			var email_login = $('input#email_login').val();

			var wfhuser_id = $('input#wfhuser_id').val();
			var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
			
			var pass_login = $('input#pass_login').val();
			var confirm_pass_login = $('input#confirm_pass_login').val();
			
			if(pass_login != confirm_pass_login){ 

				$('input#pass_login').parent('.form-group').removeClass('has_success').addClass('has_error');
				$('input#confirm_pass_login').parent('.form-group').removeClass('has_success').addClass('has_error');
				$('small#confirm_pass_text').html('Sorry Your Passwords Do Not Match!').removeClass('has_success').addClass('has_error');;
				//alert('Your Passwords Do Not Match Please Try Again.'); 
				
				
				
				//return false; 
			}else{
				$('input#pass_login').parent('.form-group').removeClass('has_error').addClass('has_success');
				$('input#confirm_pass_login').parent('.form-group').removeClass('has_error').addClass('has_success');
				$('small#confirm_pass_text').html('Success Your Passwords Match!').removeClass('has_error').addClass('has_success');

				$.post('script_change_wfhuser.php', {wfhuser_id: wfhuser_id, wfhuser_approval_id: wfhuser_approval_id, email_login: email_login, pass_login: pass_login, confirm_pass_login: confirm_pass_login}, 
				function(data)
				{
					//console.log(data);
					$('div#login_results').html(data);
				});

			}





		
			if (validateEmail(email_login)) {
				//console.log(approval_email + " is valid :)");
					$('input#pass_login').parent('.form-group').addClass('has_success');
			  } else {
				//console.log(approval_email + " is not valid :(");
				$('input#pass_login').parent('.form-group').addClass('has_error');
				alert('Sorry You Entered An Invalid Email: '+email_login+' is not a good email to use.');
				return false;
			  }
			  
			
			setTimeout(function() {
		
			$.post('script_login_wfhuser.php', {email_login: email_login, pass_login: pass_login, confirm_pass_login: confirm_pass_login}, 
			function(data)
			{
				console.log(data);
				$('div#login_results').html(data);
			});
			
			window.location.href = '$MM_redirectwfhuserLoginSuccess';
			
			}, 3000);

			






});

}); // End Document



function validateEmail(email) {
  var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return re.test(email);
}


function run_verifycss(){
	
			var email_login = $('input#email_login').val();

			var wfhuser_id = $('input#wfhuser_id').val();
			var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
			
			var pass_login = $('input#pass_login').val();
			var confirm_pass_login = $('input#confirm_pass_login').val();
			
			if(pass_login != confirm_pass_login){ 

				$('input#pass_login').parent('.form-group').removeClass('has_success').addClass('has_error');
				$('input#confirm_pass_login').parent('.form-group').removeClass('has_success').addClass('has_error');
				$('small#confirm_pass_text').html('Sorry Your Passwords Do Not Match!').removeClass('has_success').addClass('has_error');;
				//alert('Your Passwords Do Not Match Please Try Again.'); 
			}else{
				$('input#pass_login').parent('.form-group').removeClass('has_error').addClass('has_success');
				$('input#confirm_pass_login').parent('.form-group').removeClass('has_error').addClass('has_success');
				$('small#confirm_pass_text').html('Success Your Passwords Match!').removeClass('has_error').addClass('has_success');


			}


}