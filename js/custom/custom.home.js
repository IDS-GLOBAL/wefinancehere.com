// JavaScript Document
$(document).ready(function(){



	
	
	$('select#dma_state').on('change', function(){
		
			var slct_dma_state = document.getElementById("dma_state");
			var dma_state = slct_dma_state.options[slct_dma_state.selectedIndex].value;
			$('input#cust_home_state').val(dma_state);
		

		console.log('state changed'+dma_state);




		
		
		
		
	});
	
	
	
	$(document).on('click', 'a.dinvtvw', function(){
		
		var wfhuser_approval_id = $("input#wfhuser_approval_id").val();
		
		if(wfhuser_approval_id != ''){	
		
			var durl = $(this).attr('href');
		
		
	
			$("div#dstore_listing_result").load('' + durl + " #vdlisting_results", function() {
				$.getScript("js/custom/ajax_vehiclecontrols.js");
				$.getScript("js/custom/custom.cbudget.js");
			}).show();
		
			return false;
		
		}else{
		
			swal({
                title: "Please Set An Approval First",
                text: "Approval Missing Return After Set Please"
            });

		
		}
	});
	
	

	$(document).on('click', 'a.dvehicle', function(){
		
			var vurl = $(this).attr('href');

			$("div#vlisting_result").load('' + vurl + " #vehicle_section", function() {
				$.getScript("js/custom/ajax_vehiclecontrols.js");
				$.getScript("js/custom/custom.cbudget.js");
			}).show();
			

		
		
	});
	
		$(document).on('click', 'a.dpaprvlchk', function(){
				console.log("clicked dlr preprvl chk");
			var pdid = $(this).attr('id');

			var wfhuser_id = $("input#wfhuser_id").val();
			if(wfhuser_id){
				
				console.log("User Logged in");
				
				}else{
		
				console.log("User Not Logged in");
				$("input#workingthisprospectdid").val(pdid);
				
				$('#myFunds').modal({backdrop:'static',keyboard:false, show:true});
			
				}
			

		
		
	});

	
	
	
	
	
});