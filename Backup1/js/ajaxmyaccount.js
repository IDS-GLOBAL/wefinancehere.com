// JavaScript Document
// http://www.youtube.com/watch?v=ytKc0QsVRY4
// Php academy
//alert('Working...');


$(document).ready(function(){
		
		
						   
		//Intial Preview
		$('#bodyaccs').load('../content/myacct.php');
		
		//alert('OK');
		
		// handle menu clicks
		$('ul#mylinks li a').click(function(){
				
		//alert('OK');
		
			var page = $(this).attr('href');
		
		//alert(page);
		
		$('#bodyaccs').load('../content/' + page + '.php');
		
		//Stops the Page From going forward.
		return false;
		
		});
		
		
});


		