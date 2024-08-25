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
      
        <h3>Congratulations You are Logged In: </h3>
        
        
        <p>
        	Remember! <i>"There Is One Car For One Customer Pick Yours Today"</i>
        </p>
        
      <a href="<?php  echo 'logout.php';     //echo $logoutUrl;    ?>">Log Out</a>
                                
                                	 
                                
                                </a>
                                
      </div>
   
    
    
                              <h3>Your Profile Picture</h3>
                              <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

                              <br />

                              <br />
                        
                              <h3>Your Last Vehicle Saved!</h3>
                              
								
                                
                                <br />
                        
                              <h3>Recently Viewed Vehicles!</h3>
                              
                              
                              <?php do { ?>


                                        <div id="viewed-vehicle">
                                        

                                        <?php echo $row_rcntlyVwd['created_at']; ?>
                                        
                                        </div>                 
                              <br />

							  <?php } while ($row_rcntlyVwd = mysqli_fetch_assoc($rcntlyVwd)); ?>                                        

<?php  ?>
<br>
<?php fbprofileinfo($user_profile); ?>



<?php 


?>

<br>
<?php //print_r($_SESSION);  ?>
                              
                              <pre><?php 
							  



/*


Array
(
    [id] => 1492521344
    [name] => Benjamin Carter
    [first_name] => Benjamin
    [last_name] => Carter
    [link] => https://www.facebook.com/benjaminzzs
    [username] => benjaminzzs
    [work] => Array
        (
            [0] => Array
                (
                    [employer] => Array
                        (
                            [id] => 246989562008196
                            [name] => Web Entrepreneur
                        )

                    [position] => Array
                        (
                            [id] => 140062059360424
                            [name] => Web Programmer
                        )

                    [start_date] => 2011-08-31
                )

        )

    [gender] => male
    [email] => benwellrounded@gmail.com
    [timezone] => -4
    [locale] => en_US
    [verified] => 1
    [updated_time] => 2013-09-22T03:38:02+0000
)

*/
							  
							  
							  
							  //print_r($user_profile); 
							  
							  
							  
							  
							  ?></pre>
 
 
 
 
 
    <?php else: ?>

			 <strong><em>You are not Connected.</em></strong>
             

               <h3>Public profile of WeFinanceHere.com</h3>
                
                <a href="http://facebook.com/wefinancehere" target="_blank">
                	<img src="https://graph.facebook.com/wefinancehere/picture">
    			</a>


    <?php endif ?>

	<?php //echo $naitik['name']; ?>

            
            
            
            
            
<!-- End Facebook Login Creditianls Here -->                
    
    
    
    
    
    
    
    
    
    
    
    
    
    



?>