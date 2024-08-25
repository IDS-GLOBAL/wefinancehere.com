// JavaScript Document
$(document).ready(function(){
	
									
	
	
	$('.bootstrap-select.btn-group .btn .filter-option').click(function(){ 
											//alert('Clicked'); 
											 });
	


	$('.these_states.bootstrap-select.btn-group .dropdown-menu li').click(function(){ 
											
											
											var state_fullname = $(this).find('span.text').html();
											 
											
		$.post("ajax/displaystate_markets.php", {state_fullname: state_fullname}, function(data){
		
			
			
			$('select#jax_market_states ul.dropdown-menu.inner.selectpicker').html(data).show();
			console.log(data);
		
		});
	
		alert('State Changed to: '+state_fullname);
	});

	
	
	
	
	
});
