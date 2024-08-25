<div class="vwrapper">
                <div class="imgloading">
                            <figure class="img-indent">
                                
                                <span class="body-text">
                                   <b><?php echo $Vehiclesvcondition; ?> Vehicle</b> 
                                   | Stock#: <?php echo $Vehiclesvstockno; ?>
                                   <br />
                                   <div class="item">                
                                   <a rel="clearbox[gallery=Gallery,,width=980,,height=1400]" id="button1" href="content/vehicle_preview.php?v=<?php echo $Vehiclesvid; ?>" alt="Ajax">
                                   
                                        <img id="thumbnailloading" class="thumbnail" src="<?php echo $vehicleimage; ?>" />                    
                                        
                                        <span></span>
                                   </a>
                                   </div>
                                </span>
                                
                               <p>
                               <?php echo $createdAt; ?>
                               
                               </p>
                                   <p>     
                                    <a id="button1" href="/vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                                            
                                        <span class="body-text">
                                            <?php echo $Vehiclesvphoto_count; ?>: Photos<br />                        </span>
                                            
                                    <strong>Date In Stock: <?php echo $VehiclesvDateInStock; ?></strong>
                        
                                   </a>
                                   </p>
                             
                             	
                             </figure>         
                
                            <div class="extra-box">
                            
                                <div class="price">
                                
                                    <br />
                
                                    <a href="../vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                                    
                                    <b>Minimum Downpayment:</b>
                                    <div id="dprice">$ <span class="productDPriceForSorting"><?php echo $downpaymentPrice; ?></span></div>
                                    <div id="payments"><?php echo $monthlypayments; ?></div>
                                 </a>
                                 
</a>

                                </div>
                
                                <div class="padding-top">
                
                                    <h4><span><?php echo $Vehiclesvyear; ?></span> <?php echo $Vehicletitle; ?> </h4>
                
                                    <p>
                                    
                                        
                                  <h2><?php echo $Vehiclescompany; ?></h2>
                                        <br />
                                        <b>Call Us Now: </b><?php echo $Vehiclesphone; ?><br />						
                <!--
                                        <a href="http://" target="_blank">
                                        <b></b></a>
                -->
                                        <br />
                                        <address>
                                        <?php echo $Vehiclesaddress; ?><br />
                                        <?php echo $Vehiclescity; ?>	<?php echo $Vehiclesstate; ?> <?php echo $Vehicleszip; ?><br />
                                        </address>
                                        </b>
                                        
                
                                    </p>
                
                                    <p>
                
                                        <a id="button2" href="<?php //echo $Vehiclesvid; ?>">
                                        <strong>Make A Call</strong>
                                        </a>
                                    
                                        |
                                        <a id="button3" href="<?php //echo $Vehiclesvid; ?>">
                                          <strong>Request A Call</strong>
                                        </a>
                                        |
                                        <a id="button4" href="<?php //echo $Vehiclesvid; ?>">
                                          <strong>Live Chat</strong>
                                        </a>
                                        
                                        <br />
                                                       
                
                                    </p>
                
                                </div>
                
                              </div>
                                    
<div class="clear"></div>
                         <!--div id="comparelabel"><label><input type="checkbox" name="comparevid" id="comparevid" value="<?php //echo $Vehiclesvid; ?>"  /> : Click To Save </label></div -->

<div class="clear"></div>

	<hr />
    </div>
</div>
