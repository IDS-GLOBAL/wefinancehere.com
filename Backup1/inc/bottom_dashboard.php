<div id="dasboardbar">

<div id="dashboardHideShow">
		<a id="dashboardHideShowlink" href="javascript:hideshow(document.getElementById('myInfo'))">(+) Hide/Show</a>
</div>


        <div id="dasboardcontent">
        
        

            
            <strong>My Budget: </strong> 
            
            
            
		</div>


<div id="myInfo" style="display: none;">

        

            <table>
                <tr>
                    <td>
            <div id="allocatefunds">
            <?php if ($user): ?>
             
             
             
                   <div>
                                   
                          Your Profile Picture
                          <img src="https://graph.facebook.com/<?php echo $user; ?>/picture?type=normal">

                          <br />

                          <br />
        <br />
        <input name="Compute" type="button" id="Compute" onClick="doPrincipal(this.form)" value="Allocate Funds" />
                    
                    
                    <p>
                        "Theres At Least One Car For One Person Pick Yours Today"</i>
                    </p>
                    
                    
                  <a href="<?php  echo 'logout.php';     //echo $logoutUrl;    ?>">Log Out</a>
                                            
                                                 
                                            
                                            
                                            
                  </div>
               
                
                                          
             
             
             
             
             
              
                  <?php else: ?>
            
                         <strong><em>You are not Connected.</em></strong>
                          <br />
            
                            
                            <a href="http://facebook.com/wefinancehere" target="_blank">
                                <img src="https://graph.facebook.com/wefinancehere/picture">
                            </a>
                <p>Please Feel Free To Like Us On FaceBook!</p>
            
                <?php endif; ?>
                    <p>
                                        
            			<input name="compareStr" type="text" id="compareStr">
                    
                    </p>
                
                <br />
            </div>
            
                <div class="clear"></div>
            		</td>
            		<td>

<?php if ($user): ?>
<script>
  $(function() {
    $( "#mytabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#mytabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
  });
  </script>

<div id="mytabs">

  <ul>
    <li><a href="content/activity.php">My Box</a></li>  
    <li><a href="#mytabs-1">My Selections</a></li>
    <li><a href="#mytabs-2">Application</a></li>
    <li><a href="#mytabs-3">My Current Vehicle</a></li>
    <li><a href="#mytabs-6">Proof Of Insurance</a></li>    
    <li><a href="#mytabs-4">Appointments</a></li>
    <li><a href="#mytabs-5">My Check!</a></li>    
  </ul>
  <div id="mytabs-1">
  
   <span id="savedVehicles"></span>
   
  </div>
  
  <div id="mytabs-2">
  
  
  	<?php include('form_wfhprofile.php'); ?>
  
  </div>

  <div id="mytabs-3">
  
    <h2>Your Open Car Loan Or Vehicle Trade Information</h2>
    
    <p>Get The Value Of Your Trade From NADA</p>
    <p>Please Enter Your Trade Information Below. </p>
    
    <p><input type="vehicleTrade" value="" /></p>
    
  </div>
  
  <div id="mytabs-4">
  
    <h2>My Appointments</h2>
    
    <p>Sign And Drive Today After Your Interview With The Dealer.</p>
    <p>Once You've Completed Your Application </p>
  </div>

  <div id="mytabs-5">
  
    <h2>My Check</h2>
    
    <p><input type="button" value="Print My Check"></p>
    
    <br />
    <p>Print Your Check Now To Take With You To The Dealership</p>
    

    <br />

    <p>Send Your Pending Check Ahead Now For Your Sign And Drive Appointment.</p>
    <p><input type="button" value="Send To Dealer"></p>

    <br />
            
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
    
  </div>


</div>

 


<?php else: ?>
                
                        
<div id="tabs">
              <ul>
                <li><a href="#tabs-1">My Approval</a></li>
                <li><a href="#tabs-2">My Selections</a></li>
                <li><a href="#tabs-3">My Appointment</a></li>
                <li><a href="#tabs-4">My Current Vehicle</a></li>
                <li><a href="#tabs-5">Insurance</a></li>
                <li><a href="#tabs-6">Appointments</a></li>
                <li><a href="#tabs-7">My Check!</a></li>
              </ul>
            
            
            
                  <div id="tabs-1">
                        		<a class="fb_connect" href="<?php echo $loginUrl; ?>">
                                
                                	<img src="images/icons/fbCapture.png" />Sorry You Are Currently Logged Out
                                
                                </a>

				  </div>
                  
                    <div id="tabs-2">
                        		
                                
                                 <span id="savedVehicles"></span>

                    </div>
                    
                    
                    <div id="tabs-3">
                        		<a class="fb_connect" href="<?php echo $loginUrl; ?>">
                                
                                	<img src="images/icons/fbCapture.png" />Sorry You Are Currently Logged Out
                                
                                </a>

                    </div>
                    
                    
                    <div id="tabs-4">
                        		<a class="fb_connect" href="<?php echo $loginUrl; ?>">
                                
                                	<img src="images/icons/fbCapture.png" />Sorry You Are Currently Logged Out
                                
                                </a>
                    </div>
                    
                    
                    <div id="tabs-5">
                        		<a class="fb_connect" href="<?php echo $loginUrl; ?>">
                                
                                	<img src="images/icons/fbCapture.png" />Sorry You Are Currently Logged Out
                                
                                </a>
                    </div>
                    
                    
                    <div id="tabs-6">
                        		<a class="fb_connect" href="<?php echo $loginUrl; ?>">
                                
                                	<img src="images/icons/fbCapture.png" />Sorry You Are Currently Logged Out
                                
                                </a>
                    </div>            
                    
                    
                    <div id="tabs-7">
                        		<a class="fb_connect" href="<?php echo $loginUrl; ?>">
                                
                                	<img src="images/icons/fbCapture.png" />Sorry You Are Currently Logged Out
                                
                                </a>
                    </div>            
            
            
            </div>


                   <?php endif ?>
                
            
            
            
				
            		</td>
            	</tr>
            </table>

        <form>
        <input type="hidden" id="myPrincipal" name="myPrincipal" value="" />
        </form>
   <a id="dashboardHideShowlinkk" href="javascript:hideshow(document.getElementById('myInfo'))">(+) Hide/Show</a>

</div>





</div>

