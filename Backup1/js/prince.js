// JavaScript Document

$(document).ready(function(){

$('#currentCarLoan').change(function getCarLoan(){

					var CarLoan = document.getElementById("currentCarLoan");
					var currentCarLoan = CarLoan.options[CarLoan.selectedIndex].value;

					document.getElementById("cust_car_loan").value = currentCarLoan;

					if(currentCarLoan == 'Y'){document.getElementById('TradeInformation').style.display = 'block';}
					else if(currentCarLoan == 'N'){document.getElementById('TradeInformation').style.display = 'none';}

					
					

});


$('#homeState').change(function getState(){

					

					var princ = document.getElementById("amtprincipal").value;
					//alert(princ);
					//left-container
					//document.getElementById("#myPrincipal").value = princ;

				   var hstate = document.getElementById("homeState");
				   var homeState = hstate.options[hstate.selectedIndex].value;

					
				    document.getElementById("cust_home_state").value = homeState;
					
					//var page = $(this).attr('href');
					//$('#bodyaccs').load('../content/' + page + '.php');
					var empty = 'NULL';
					
					if(!princ){alert('Sorry But You Must Set A Budget First'); document.getElementById("homeState").selectedIndex = empty; return false;}
					
				  $('#vehicleContainer').load('content/select_state_vehicles.php?principal=' + princ + '&markets=' + homeState + '&sort=' + 1);

				  $('#home_rightblockthree').load('content/select_state_dealers.php?markets=' + homeState + '&sort=' + 1);

				  //$('#home_rightblockthree').load('content/select_state_vehicles.php?markets=' + homeState + '&sort=' + 1);


});

















		$('form.ajax').on('submit', function(){
	
								//$('#first_step').slideUp();
								
								$('#myInfo').slideUp();
	
								//Begin Checking Against Paramaters
								var cust_titlename = document.getElementById("cust_titlename").value;
								var cust_fname = document.getElementById("cust_fname").value;
								var cust_lname = document.getElementById("cust_lname").value;
								var cust_phoneno = document.getElementById("cust_phoneno").value;
								var cust_gross_income = document.getElementById("cust_gross_income").value;
								var cust_email = document.getElementById("cust_email").value;
								
								
								//.removeClass('valid').addClass('error');
								if(!cust_titlename){ $('#cust_titlename').effect("shake", { times:5 }, 600); $('#cust_titlename').removeClass('valid').addClass('error');};
								if(!cust_fname){ $('#cust_fname').effect("shake", { times:5 }, 600); $('#cust_fname').removeClass('valid').addClass('error');};
								if(!cust_lname){ $('#cust_lname').effect("shake", { times:5 }, 600); $('#cust_lname').removeClass('valid').addClass('error');};
								if(!cust_phoneno){ $('#cust_phoneno').effect("shake", { times:5 }, 600); $('#cust_phoneno').removeClass('valid').addClass('error');};
								if(!cust_gross_income){ $('#cust_gross_income').effect("shake", { times:3 }, 600); $('#cust_gross_income').removeClass('valid').addClass('error');  };
								if(!cust_email){ $('#cust_email').effect("shake", { times:5 }, 600); $('#cust_email').removeClass('valid').addClass('error'); };
								
								
								if(!cust_titlename){ return false; };
								if(!cust_fname){  return false; };
								if(!cust_lname){ return false; };
								if(!cust_phoneno){return false; };
								if(!cust_gross_income){ return false; };
								if(!cust_email){ return false; };

						var that = $(this),
						
						url = that.attr('action'),
						type = that.attr('method'),
						data = {};
						
						
						that.find('[name]').each(function(index, value){
							
							var that = $(this),
								name = that.attr('name'),
								value = that.val();
								
								data[name] = value;
					});


					$.ajax({
						   
						   url: url,
						   type: type,
						   data: data,
						   success: function(response){
							   
								console.log(response);   
						   }
							
							
						});
						
					var princ = document.getElementById("amtprincipal").value;
						 
					var hstate = document.getElementById("homeState");
					var homeState = hstate.options[hstate.selectedIndex].value;
					
					document.getElementById("cust_home_state").value = homeState;
					
				  $('#vehicleContainer').load('content/select_state_vehicles.php?principal=' + princ + '&markets=' + homeState + '&sort=' + 1);

								
								
								document.getElementById('rightWidget').style.display = 'none';
								//console.log('Trigger');
								return false;
														 
														 
					});






$('#Compute').bind('click change', function doPrincipal(form){


	//alert('ok');
	 var princ = document.getElementById("amtprincipal").value;

	 //alert(princ);

	 //left-container

				   var empty = "";
				   var hstate = document.getElementById("homeState");
				   var homeState = hstate.options[hstate.selectedIndex].value;

					
    			    document.getElementById("cust_home_state").value = homeState;


				  $('#vehicleContainer').load('content/select_state_vehicles.php?principal=' + princ + '&markets=' + homeState + '&sort=' + 1);


					document.getElementById("powerContainer").innerHTML=empty;

});





});
