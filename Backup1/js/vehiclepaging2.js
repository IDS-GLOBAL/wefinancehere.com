// JavaScript Document


$(document).ajaxComplete(function(){
//$(document).ready(function(){

//alert('AJAX READY!');

/*
				//alert('AJAX READY!');
				
				$('topvehiclepageNav a').click(function(){
														
				alert('Navigation Clicked');
				
				return false;
				});
*/


						$('#topvehiclepageNavv a').click(function(){
							//alert('OK');
							var loaderimg = "../images/loading-gif-animation.gif";
							
							$('.imgloading').html('<img src="'+ loaderimg +'" ' + "width='120px'" +'  /> <img src="'+ loaderimg +'" ' + "width='120px'" +'  />');
							
							
							var page = $(this).attr('href');
							
							//alert(page);
							
							//$('#name-data').load('./content/' + page + '.php');
							$('#name-data').load(page);		
							
							//Stops the Page From going forward.
							return false;
							
							});








});