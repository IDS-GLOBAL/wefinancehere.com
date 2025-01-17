$(document).ready(function(){
	
	$("buton#Fbclick").on('click', function(){
		
		
	// intialize and setup facebook js sdk
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '597949943584638',
      xfbml      : true,
      version    : 'v2.8'
    });


	
	
    // ADD ADDITIONAL FACEBOOK CODE HERE
	function onLogin(response) {
	  if (response.status == 'connected') {
		FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email'}, function(data) {
		  var welcomeBlock = document.getElementById('fb-welcome');
		  welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
		

			//document.getElementByID('status').innerHTML = response.id;
			var pic_id = data.id;
			var new_pic = 'https://graph.facebook.com/'+ pic_id +'/picture?type=normal';
			document.getElementById('ftr_pic').src = new_pic;
			document.getElementById('api_fbpic').href = 'account/dashboard.php';
			

			var approval_fname = data.first_name;
			var approval_lname = data.last_name;
			var approval_email = data.email;
			
			$('input#access_id').val(pic_id);
			$('input#approval_fname').val(approval_fname);
			$('input#approval_lname').val(approval_lname);
			$('input#approval_email').val(approval_email);
			$('input#email_login').val(approval_email);
			var cust_home_state = $('input#cust_home_state').val();
			var cust_home_market = $('input#cust_home_market').val();

			var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
			var wfhcookiesesid = $('input#wfhcookiesesid').val();

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

			var gross_monthlyincome = $('input#gross_monthlyincome').val();


			$.post('script_api_postlogin.php', {
							access_id: pic_id,
							cust_home_market: cust_home_market,
							cust_home_state: cust_home_state,
							wfhuser_approval_id: wfhuser_approval_id,
							wfhcookiesesid: wfhcookiesesid,
							approval_fname: approval_fname,
							approval_lname: approval_lname,
							approval_email: approval_email,
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
							gross_monthlyincome: gross_monthlyincome
			}, function(data){
				$('div#connected_results').html(data);
			});
		//getInfo();
		
		
		
		});
		
		
		
		
		
	  }
	}
	
	FB.getLoginStatus(function(response) {
	  // Check login status on load, and if the user is
	  // already logged in, go directly to the welcome message.
	  if (response.status === 'connected') {
		onLogin(response);
		document.getElementById('status').innerHTML = ' Your Personalized Experience ';
		document.getElementById('login').style.visibility = 'hidden';
	  } else if (response.status === 'not_authorized'){
		document.getElementById('status').innerHTML = 'You are not logged in. ';
	  } else {
		// Otherwise, show Login dialog first.
		document.getElementById('status').innerHTML = 'You are not logged into Facebook. ';
		
		FB.login(function(response) {
		  onLogin(response);
		}, {scope: 'user_friends, email'});
	  }
	});	
	
	
	
	
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  
  
  	function login(){
		FB.login(function(response){
			  if (response.status == 'connected') {
				document.getElementById('status').innerHTML = 'Personalized Experience ';
			  } else if (response.status === 'not_authorized'){
				document.getElementById('status').innerHTML = 'You are not logged in.';
			  } else {
				document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
			  }
		}, {scope: 'user_friends, email'});    //A {scope: 'publish_actions'});
	}
	
	// A Needs Approved Actions To be Submitted
	// Posting on user timeline
	function send_post(){
		FB.api('/me/feed', 'post', {message: 'my first status...'}, function(response){
			document.getElementByID('posted').innerHTML = response.id;
		});
	}

	// sharing link on user timeline
	function shareLink() {
		FB.api('/me/feed', 'post', {link: 'https://wefinancehere.com/vehicles.php'}, function(response){
			document.getElementByID('status').innerHTML = response.id;
		});
	}


	// sharing link on user timeline
	function uploadPhoto() {
		FB.api('/me/photos', 'post', {url: 'https://scontent-atl3-1.xx.fbcdn.net/v/t1.0-9/540337_593541274020866_1584702165_n.png?oh=84ab2654638138b717dcbddfb3ac66a2&oe=58A2D7C5'}, function(response){
			if(!response || response.error){
				document.getElementByID('status').innerHTML = "Error";		
			}else{
				document.getElementByID('status').innerHTML = response.id;
			}
		});
	}


	}); //End Click FBlogin
}); //End Documemt Ready



$(document).ready(function(){



});