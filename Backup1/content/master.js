// JavaScript Document


$(document).ready(function(){
						   
		$('ul#miniView li a').click(function(){
				
		//alert('OK');
		
			var page = $(this).attr('href');
		
		//alert(page);
		
		$('#powerContainer').load('content/classified_mind_view.php?did=' + page + '.php');
		
		//Stops the Page From going forward.
		return false;
		
		});
						   
						   
	alert('Working');	
						   
						   
});						   
						   
		
						   
						   
});