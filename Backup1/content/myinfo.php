<?php require_once('_db_functions.php'); ?>
<?php

include('_db_loggedinFunctions.php');

restrict($fbemail);

fbprofileinfo($user_profile); 

include('../wfhLibrary/showviewedvehicles.php');

?>

                                
		 <?php 
									
									
/*


Array
(
[fb_597949943584638_code] => AQACtjfpczUMAduBpWIOTJJdjZ1_QxxmX-Le3oL6uIGiKIvYJJSH-ib4cN5pLFm022le_4P908KwzVy43GBCWhyEza_cJwa5EEx0nXV-vNunAxvji08shycQ9qt9UsOXGKWbyIyCrnDdctZPLff9nXi4ahRqrjWC2U4O45UCmPPsgoW9hRBJI2GDtYPsuV8V6T5VpJtJ1lfyluCiG0GJ9ojdt2NtS_6I286olkAtoEJ485RaG2Jyq6jnzRuGbl9cZy2UzNRa1nG6y7khr0biU5ZPT6Oo9yUu3l38TMOMSEAJ28ccRYwY_9xMHlk0IiH2AbU


[fb_597949943584638_access_token] => CAAIf1RH7F34BACdRbUwjgZACWC6VWwaz3RI0cl3Se1kZA6f7uGbuunc2DoKrLkMfcboXeq2Bw9OCpncQZBjzKxy3djnZB9Vs6l0Xf4dvBZCZCZBAv8YvSo5unQjhMh6BZBzBTgyCdzi5ViHVMDuZB9ka5kMVXZBZAI8FqZAYIXtE7r7o9MotJWYqoucm

[fb_597949943584638_user_id] => 1492521344
)
									
*/									
									
									//print_r($_SESSION); 
									
									
									
									
									
									?>
                                    
                                    

    <?php if ($user): ?>
 
 
 
       <div>
      
        <h3>Your Finance Information: </h3>
        
        
        <p>

        	<i>"There Is One Car For One Customer Pick Yours Today"</i>
        </p>
        


                              <br />
                        
                              <h3>Your Last Vehicle Saved!</h3>
                              
								
                                
                                <br />
                        
                              <h3>Recently Viewed Vehicles!</h3>
                              
                              <?php do { ?>


                                        <div id="viewed-vehicle">
                                        
                                        
                                        <?php 
										
										
										$vphoto = $row_rcntlyVwd['vid']; 
										
										showphoto ($vphoto); 
										
										?>

                                        <?php echo $row_rcntlyVwd['created_at']; ?>
                                        
                                        </div>                 
                              <br />

							  <?php } while ($row_rcntlyVwd = mysqli_fetch_assoc($rcntlyVwd)); ?>                                        



<br>
 
    <?php else: ?>

			 <strong><em>You are not Connected.</em></strong>
             

               <h3>Public profile of WeFinanceHere.com</h3>
                
                <a href="http://facebook.com/wefinancehere" target="_blank">
                	<img src="https://graph.facebook.com/wefinancehere/picture">
    			</a>


    <?php endif ?>

	<?php //echo $naitik['name']; ?>

            
            
            
            
            

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="clear"></div>


