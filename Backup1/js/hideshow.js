// JavaScript Document

$(document).ready(function(){


function hideshow(which){
if (!document.getElementById)
return
if (which.style.display=="block")
which.style.display="none"
else
which.style.display="block"
}


$('#dashboardHideShowlink').click(function getMyInfo(){
													  
													  
													  
					if(document.getElementById("myInfo").style.display=="none"){								  
					document.getElementById('myInfo').style.display = 'block';
					}											  
					else{
					  document.getElementById('myInfo').style.display = 'none';
													 // alert('My Link Clicked None');					  
						}


					
					

});

$('#dashboardHideShowlinkk').click(function getMyInfo(){
													  
													  
													  
					if(document.getElementById("myInfo").style.display=="none"){								  
					document.getElementById('myInfo').style.display = 'block';
					}											  
					else{
					  document.getElementById('myInfo').style.display = 'none';
													 // alert('My Link Clicked None');					  
						}


					
					

});



  $(function() {
    $( "#tabs" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.error(function() {
          ui.panel.html(
            "Couldn't load this tab. We'll try to fix this as soon as possible. " +
            "If this wouldn't be a demo." );
        });
      }
    });
  });



/*
			var field1 = ($('#form1 input[name="field1"]:text').val());
			var field2 = ($('#form1 input[name="field2"]:text').val());

			$('#results').load("/search/show.php", {field1: field1, field2: field2});
*/




						   
});
