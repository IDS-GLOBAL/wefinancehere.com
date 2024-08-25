// JavaScript Document

//content/select_state_vehicles.php?pageNum_selectVehicles=1&amp;totalRows_selectVehicles=128&amp;markets=GA&amp;sort=1

//			var hstate = document.getElementById("homeState");
//			var homeState = hstate.options[hstate.selectedIndex].value;

//alert('okay');
$(document).ajaxComplete(function(){
//$(document).ready(function(){


							//Intial Preview
							//$('#topvehiclepageNav').load('../content/myacct.php');
							
							//alert('OK');
							
							// handle menu clicks
							$('#topvehiclepageNav a').click(function(){
							//alert('OK');
							var loaderimg = "../images/loading-gif-animation.gif";
							
							$('.imgloading').html('<img src="'+ loaderimg +'" ' + "width='120px'" +'  /> <img src="'+ loaderimg +'" ' + "width='120px'" +'  /><img src="'+ loaderimg +'" ' + "width='120px'" +'  /><img src="'+ loaderimg +'" ' + "width='120px'" +'  /><img src="'+ loaderimg +'" ' + "width='120px'" +'  />');
							
							
							var page = $(this).attr('href');
							
							//alert(page);
							
							//$('#name-data').load('./content/' + page + '.php');
							$('#vehicleContainer').load(page);		
							
							//Stops the Page From going forward.
							return false;
							
							});


	function bodyStyleSelect() {         
		 var allVals = [];
		 $('#format :checked').each(function() {
		   allVals.push($(this).val());
		   
		   
	});
							/*
								if (!allVals[0]){return false;}
				
								var hstate = document.getElementById("homeState");
								var homeState = hstate.options[hstate.selectedIndex].value;
								
								
								return false;
								//alert(homeState);
								
								$.post('content/select_state_vehicles_body.php?markets=' + homeState + '&sort=' + '1', {allVals: allVals},
									   
				 
								   function(result) {
									   
									   $('div#name-data').html(result).show();
									
									});
							*/


		$('#bodys').val(allVals);
		//$('#t').append('a').allVals;
		
  }
  
  
				 $(function() {
				   $('#format input').click(bodyStyleSelect);
				   bodyStyleSelect();
				 });




			

				$('input#body-styles').on('click', function() {
					
				var bodys = $('input#bodys').val();	
				
				// This Uses The Selected State From Preapproval Section.
				var hstate = document.getElementById("homeState");
				var homeState = hstate.options[hstate.selectedIndex].value;
					
				
					//alert(homeState);
					
				if ($.trim(bodys) != ''){
					
							var loaderimg = "../images/loading-gif-animation.gif";
							
							$('.imgloading').html('<img src="'+ loaderimg +'" ' + "width='120px'" +'  /> <img src="'+ loaderimg +'" ' + "width='120px'" +'  /><img src="'+ loaderimg +'" ' + "width='120px'" +'  /><img src="'+ loaderimg +'" ' + "width='120px'" +'  /><img src="'+ loaderimg +'" ' + "width='120px'" +'  />');
					
					
					
					$.post('content/select_state_vehicles_body.php?markets=' + homeState + '&sort=' + 1, {bodys: bodys}, function(data){



						//$('#feedback').load(data);
						
						//alert(data);
						
						//$('div#name-data').text(data)
						$('#name-data').html(data);
		
					});
				}					
					
					
					
					//return false;
									   
			   });

	



});