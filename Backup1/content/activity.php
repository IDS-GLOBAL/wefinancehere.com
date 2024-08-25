<?php require_once('_db_functions.php'); ?>
<?php

include('_db_loggedinFunctions.php');


restrict($fbemail);

fbprofileinfo($user_profile); 

include('../wfhLibrary/showviewedvehicles.php');

?>

                                
                                    
                                    

    <?php if ($user): ?>
<script>    
$('#box-data input').bind('click change', function selectVID(){
													// This Function Selects All Values of compare vechicles checked.
													//alert('Clicked');
													function vidSelect() {         
															 var allVids = [];
															 $('#box-data :checked').each(function() {
															   allVids.push($(this).val());
													});
															 
															$('#compareStr').val(allVids);
															
													}
													  
													 $(function() {
													   $('#box-data input').click(vidSelect);
													   
													   vidSelect();
													   
													   
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
</script> 
 
 
       <div id="box-data">
                              
                              
                              
                              <h1>These Are The Cars You Viewed</h1>
                              
                              <p>
                              	Please make a selection from here on a vehicle you want to set an appointment and possibly finance at the dealership this vehicle located at..
                              	
                              </p>
                              
                              <ul id="vactivity">
                              
                              <?php do { ?>


                                        <li>
                                        
                                        
                                        <?php 
										$vphoto = $row_rcntlyVwd['vid']; 
										showphotoNly($vphoto); 
										?>
                                        

                                        <?php //echo $row_rcntlyVwd['created_at']; ?>
                                         
                                        </li>                 
                              

							  <?php } while ($row_rcntlyVwd = mysqli_fetch_assoc($rcntlyVwd)); ?> 
                           
                           </ul>                                       

</div>

<br>
 
    <?php else: ?>

			 <strong><em>You are not Connected.</em></strong>
             

               <h3>Public profile of WeFinanceHere.com</h3>
                
                <a href="http://facebook.com/wefinancehere" target="_blank">
                	<img src="https://graph.facebook.com/wefinancehere/picture">
    			</a>


    <?php endif ?>


            
            
            
    
    
    <div class="clear"></div>


