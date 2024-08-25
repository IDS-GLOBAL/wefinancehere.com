// JavaScript Document
// This Document Offers An Appointment Set on Vehicles Previewed.



$(document).ajaxComplete(function(){

//$(document).ready(function(){
	
//alert('button yy'); 




	$('.imgloadingMiniview a').on('click', function() {
							//alert('Image Clicked');
							
							var loaderimg = "../images/loading-gif-animation.gif";
							
							$('#powerContainer').html('<img src="'+ loaderimg +'" ' + "width='120px'" +'  /> <img src="'+ loaderimg +'" ' + "width='120px'" +'  /><img src="'+ loaderimg +'" ' + "width='120px'" +'  /><img src="'+ loaderimg +'" ' + "width='120px'" +'  /><img src="'+ loaderimg +'" ' + "width='120px'" +'  />');
							
							
							var page = $(this).attr('href');
							
							var empty = "";
							var linkreplace = page;
							var newlink = linkreplace.replace(/content\/vehicle_preview\.php\?/, empty);
																			
							//alert(newlink);
							$.post('content/appointment_maker.php?' + newlink + '', {newlink: newlink}, function(data){
										
								$('#powerContainer').html(data);																		 
							});
							//$('#name-data').load('./content/' + page + '.php');
							//$('#powerContainer').load(page);		
							
							//Stops the Page From going forward.
							return false;
							
	});

$('#name-data input').bind('click change', function compareVID(){
													// This Function Selects All Values of compare vechicles checked.
													function compareSelect() {         
															 var allVids = [];
															 $('#name-data :checked').each(function() {
															   allVids.push($(this).val());
													});
															 
															$('#compareStr').val(allVids);
															
													}
													  
													 $(function() {
													   $('#name-data input').click(compareSelect);
													   compareSelect();
													   
													   
													 });


								 //alert(allVids);
								 var string = document.getElementById('compareStr').value;
								 //var result = string.match(/allVids/i);
								 //alert(string);

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