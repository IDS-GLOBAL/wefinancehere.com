<div class="thumbox">


<a id="scrollUp" class="scrollUp" href="#"><!-- Scroll Up --></a>

<br>
   
    <div id="thumb-container2">

        <div id="contents">

       
<?php do { ?>
                 
                  <?php
				  $link = "http://images.autocitymag.com";
				  $photo = $row_slctVphotos['photo_file_name'];
				  $dynamicImg = "$link/$did/$vid/$photo";
						
	

				?>
                   <div class='thumbnailimage'>
                     <div class='thumb_container'>
                       <div class='large_thumb'> <img width="70px" class="large_thumb_image" alt="<?php echo $vtitle; ?>"  src="<?php echo $dynamicImg; ?>" /> <img width="450px" class="large_image" rel="<?php echo $vtitle; ?> !" src="<?php echo $dynamicImg; ?>" />
                         <div class='large_thumb_border'></div>
                         <div class='large_thumb_shine'></div>
                       </div>
                     </div>
                   </div>
<?php } while ($row_slctVphotos = mysqli_fetch_assoc($slctVphotos)); ?>
    

    
	  </div>
    
    </div>


<br>

<a id="scrollDown" class="scrollDown" href="#"><!-- Scroll Down --></a>


                    
                            

<div class="clear"></div>
				</div>
                