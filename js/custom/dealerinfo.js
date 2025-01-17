// JavaScript Document


$("button#dsignup").on('click', function(){

var dcompany_name = $('input#dcompany_name').val();

var dfirst_name = $('input#dfirst_name').val();
var dlast_name = $('input#dlast_name').val();
var demail = $('input#demail').val();
var dphoneno = $('input#dphoneno').val();
var dzip_code = $('input#dzip_code').val();

var slct_dinventory_size = document.getElementById("dinventory_size");
var dinventory_size = slct_dinventory_size.options[slct_dinventory_size.selectedIndex].value;


$.post('script_signup_dealer.php', {
		dcompany_name: dcompany_name,
		dfirst_name: dfirst_name,
		dlast_name: dlast_name,
		demail: demail,
		dphoneno: dphoneno,
		dzip_code: dzip_code,
		dinventory_size: dinventory_size
	}, function(data){
		console.log(data);
});

setTimeout(function(){
	window.location.href = "thankyou.php";

}, 2000);
	
	
	
});