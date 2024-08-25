// JavaScript Document



$(document).ajaxComplete(function(){

//$(document).ready(function(){
	
//alert('button yy'); 

$('#name-data input').bind('click change', function compareVID(){
													// This Function Selects All Values of compare vechicles checked.
													function compareSelect() {         
															 var allVids = [];
															 $('#name-data :checked').each(function() {
															   allVids.push($(this).val());
													});
															 //alert(allVids);
															 
															$('#compareStr').val(allVids);
															
													}
													  
													 $(function() {
													   $('#name-data input').click(compareSelect);
													   compareSelect();
													   
													   
													 });
													 
								var comparevid = $('#compareStr').val();
								if ($.trim(comparevid) != ''){

								
									$.get('content/compare-vehicles.php', {comparevid: comparevid}, function(vdata){
										$('#savedVehicles').html(vdata);
						
									});
								}
								//alert(comparevid);
								//alert(comparevid);

	});   





 

  			











});