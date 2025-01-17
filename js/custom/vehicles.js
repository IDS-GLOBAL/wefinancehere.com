// JavaScript Document
$(document).ready(function(){



	$(document).on('change', 'select#dma_state', function(){
			

			var slct_dma_state = document.getElementById("dma_state");
			var dma_state = slct_dma_state.options[slct_dma_state.selectedIndex].value;
			var dma_state_txt = slct_dma_state.options[slct_dma_state.selectedIndex].text;

				var view_state = dma_state;
				
				var url = 'vehicles.php?state='+view_state;
			
				window.location.replace(url);
				
			
			
			
			
	});



	$(document).on('change', 'select#current_ownmake', function(data){
	
			var slct_tradeMake = document.getElementById("current_ownmake");
			var tradeMake = slct_tradeMake.options[slct_tradeMake.selectedIndex].value;

	
			
			$.post('ajax/displaymodels.php', {themake: tradeMake}, function(data){
							
							$('select#current_ownmodel').html(data).removeAttr('disabled');
							
			});
	
	});


	$(document).on('click', "button#check_my_budget", function(){
			$('#myBudget').modal({backdrop:'static',keyboard:false, show:true});
	});

	$("button#vshop_only").on('click', function(){
		
		
		
		
			ajax_preapproved_vehicles();		
		
		
		
		
		
		
		
		
		
		
		
		
	});






//$(document).on('click', 'a.vsavemyv', function(){
	$(document).on('click', 'a.vsavemyv', function(){

		var vid = (this).id;
		var wfhuser_id = $("input#wfhuser_id").val();
		if(wfhuser_id){
			
			console.log("User Logged in");
			
			}else{
	
			console.log("User Not Logged in");
			$("input#workingthisvid").val(vid);
			
			$('#myFunds').modal({backdrop:'static',keyboard:false, show:true});
		
			}



});
















});