// JavaScript Document

$("button#adsignup").on('click', function(){

var acompany_name = $('input#acompany_name').val();

var afirst_name = $('input#afirst_name').val();
var alast_name = $('input#alast_name').val();
var aemail = $('input#aemail').val();
var aphoneno = $('input#aphoneno').val();
var azip_code = $('input#azip_code').val();

var slct_ad_sizes = document.getElementById("ad_sizes");
var ad_sizes = slct_ad_sizes.options[slct_ad_sizes.selectedIndex].value;


$.post('script_signup_advertiser.php', {
		acompany_name: acompany_name,
		afirst_name: afirst_name,
		alast_name: alast_name,
		aemail: aemail,
		aphoneno: aphoneno,
		azip_code: azip_code,
		ad_sizes: ad_sizes
	}, function(data){
		console.log(data);
});

setTimeout(function(){
	window.location.href = "thankyou.php";

}, 2000);
	
	
	
});