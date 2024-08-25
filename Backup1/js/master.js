// JavaScript Document

$(document).ajaxComplete(function(){
//$(document).ready(function(){

	var loaderimg = "../images/loading-gif-animation.gif";
						   
		$('ul#miniView li a').click(function(){
				
		//alert('OK');
		$('#vehicleContainer').html('<img src="'+ loaderimg +'" ' + "width='120px'" +'  /> <img src="'+ loaderimg +'" ' + "width='120px'" +'  />');
		
		
		var princ = document.getElementById("amtprincipal").value;

			var page = $(this).attr('href');
		
		//alert(princ);
		
		$('#vehicleContainer').load('content/classified_miniview.php?did=' + page + '&principal=' + princ);
		
		//Stops the Page From going forward.
		return false;
		
		});
						   
						   
	//alert('Working');	
						   
						   
});						   
						   
		
						   
						   
