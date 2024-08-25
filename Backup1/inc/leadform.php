<?php if($cookie){ ?>
<div id="lead-column">

<div id="detailLead" class="leadForm" style="top: 0px;">

    <div class="bodyContainer">
    
        <div class="form-holder">
                <div class="leadHeader">
        </div>


        

             	<form action="<?php echo $editFormAction; ?>" method="POST" enctype="application/x-www-form-urlencoded" name="cust_leadForm" id="cust_leadForm">
            
              <div class="leadTop">
    <div class="lineHolder">
        <span class="label"><strong>To:</strong></span> <em><?php echo $dcompany; ?></em>
        <div class="dealer_container">
            <p class="field dealer">
                
                    
<?php if($user): ?>
                            
                            <?php echo $dstorephone; ?>
<?php endif; ?>                        
                    
                
            </p>
        </div>
    </div>
    <div class="lineHolder" >
    <span style="padding-bottom: line-height 3;">
        <label for="cust_email" class="label"><strong>From:</strong></label>
        <input name="cust_email" type="text" class="field required placeholder" id="cust_email" size="50" <?php echo $fbemail; ?> placeholder="Your Email">
        </span>
        <br />
      <span style=" text-align:right;">
                <span class="liner">To reach me call </span> <span class="lineHolder"><input name="phone" id="phone" type="text" placeholder="Phone Number" class="required placeholder"></span> <span class="liner">  
                <label>
                <select name="cust_phonetype"> 
                    <option value="mobile" selected="selected">Mobile</option>
                    <option value="home">Home</option>
                    <option value="work">Work</option>
                  </select>
                  </label>  
                  number.</span>
                  </span>

        <div id="primaryEmail">
        	<input type="text" id="email" name="email" value="">
        </div>
        
    </div>
</div>





            	<div class="contentleadblock">
    <p>
    
    
        <span class="liner">Hello, <strong>"<?php echo $dcompany; ?>"</strong> </span>


        <span class="lineHolder">
        
            <input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $did; ?>" >
            <input name="cust_vehicle_id" type="hidden" id="cust_vehicle_id" value="<?php echo $vid; ?>" >
            <input name="cust_lead_source_id" type="hidden" id="cust_lead_source_id" value="4" >            
            <input name="cust_lead_source" type="hidden" id="cust_lead_source" value="WeFinanceHere.com" >
            <input name="cust_lead_token" type="hidden" id="cust_lead_token" value="<?php echo $tkey; ?>" >            
            
            
        </span>
        
        <span class="liner">my name is </span>
        
        <span class="lineHolder">
        <input name="cust_nickname" type="hidden" id="cust_nickname" value="<?php echo $fbfullname; ?>" placeholder="First Name" >
            <input name="cust_fname" type="text" id="cust_fname" value="<?php echo $fbfname; ?>" size="15" placeholder="First Name" >
        </span>
        <span class="lineHolder">
            <input name="cust_lname" type="text" class="required placeholder" id="cust_lname" value="<?php echo $fblname; ?>" size="20" placeholder="Last Name">
        </span>
        <span class="liner">and I am intrested in this <strong>"<?php echo $vtitle; ?> "</strong> I see online at <strong>WeFinanceHere.com.</strong> When Possible I would like to know more about financing this vehicle.</span>
        
        <span class="liner">I currently work at</span>
        <span class="lineHolder">
            <input name="cust_employer_name" id="cust_employer_name" type="text" placeholder="Employer Name" class="required placeholder">
        </span>
        <span class="liner">in</span>
        <span class="lineHolder">
            <input name="cust_employer_city" id="cust_employer_city" type="text" placeholder="Employer City" class="required placeholder">
            , 
            
        </span>

        <span class="lineHolder">
				<select name="cust_employer_state">
				  <option value="NULL" <?php if (!(strcmp("NULL", 'GA'))) {echo "selected=\"selected\"";} ?>>Select One</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], 'GA'))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
				  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
				</select>            
        </span>


        <span class="lineHolder">
            <input name="cust_employer_zip" type="text" class="required placeholder" id="cust_employer_zip" size="10" maxlength="10" placeholder="Zip Code">
            
        </span>
        <span class="liner"><br />I have been working here for about</span>


        <span class="lineHolder">
           <select name="cust_employer_years">
             <option value="NULL">Select Years</option>
             <?php
do {  
?>
             <option value="<?php echo $row_timeYears['year_value']?>"><?php echo $row_timeYears['year_name']?></option>
             <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
           </select>
            
        </span>


        <span class="liner"> and </span>

        <span class="lineHolder">
				<select name="cust_employer_months">
				  <option value="">Select Months</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_timeMonths['month_value']?>"><?php echo $row_timeMonths['month_name']?></option>
				  <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
				</select>            
        </span>
        
        
                <span class="liner">.</span>




        <span class="liner">My current Monthly Income is </span>
        
        <span class="lineHolder">
            <input name="cust_gross_income" type="text" class="required placeholder" id="cust_gross_income" size="10" placeholder="Gross Income">    
        </span>


        <span class="liner">which I get paid </span>

        <span class="lineHolder">
            <select name="cust_gross_income_frequency">
              <option value="value" <?php if (!(strcmp("value", "Monthly"))) {echo "selected=\"selected\"";} ?>>label</option>
              <?php
do {  
?>
              <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], "Monthly"))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
              <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
            </select>
        </span>
        <span class="liner">.</span>
        



        <span class="liner"><br />
        I currently Live at </span>
        
        <span class="lineHolder">
            <input name="cust_home_address" type="text" class="required placeholder" id="cust_home_address" size="15" placeholder="123 Street Address">    
        </span>
        <span class="liner">in the city of </span>
        <span class="lineHolder">
            <input name="cust_home_city" type="text" class="required placeholder" id="cust_home_city" size="15" placeholder="City">
        </span>        
        <span class="lineHolder">
        <br>

				<select name="cust_home_state" id="cust_home_state">
				  <option value="NULL" <?php if (!(strcmp("NULL", 'GA'))) {echo "selected=\"selected\"";} ?>>Select One</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], 'GA'))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
				  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
				</select>            
        </span>
        <span class="liner">, in zip code </span>
        <span class="lineHolder">
            <input name="cust_home_zip" type="text" class="required placeholder" id="cust_home_zip" size="7" placeholder="Zip">    
        </span>
        <span class="liner">county of </span>        
        <span class="lineHolder">
            <input name="cust_home_county" type="text" class="required placeholder" id="cust_home_county" size="10" placeholder="County">    
        </span>
        <span class="liner">.</span>
        
        
        
              <span class="liner"><br />I have been living here for </span>
                
            <span class="lineHolder">
                <select name="cust_home_live_years" id="cust_home_live_years">
                             <option value="NULL">Select Years</option>
             <?php
do {  
?>
             <option value="<?php echo $row_timeYears['year_value']?>"><?php echo $row_timeYears['year_name']?></option>
             <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
           </select>

            </span>
            
            <span class="lineHolder">, 
            	<select name="cust_home_live_months" id="cust_home_live_months">
                				  <option value="">Select Months</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_timeMonths['month_value']?>"><?php echo $row_timeMonths['month_name']?></option>
				  <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
				</select>    .        
</span>

                

</p>
        
        

</div>










<div class="subSection">
    <div class="leadTop">
    <div class="lineHolder">
    
    

        <label id="label" for="tradeYes">
            <input name="tradeYes" id="tradeYes" value="Is looking to trade" type="checkbox" class="checkbox">    
            I'm also intrested in Trading my vehicle which is a <br />
        </label>
		
        
        <div id="indent">
        <span class="lineHolder" title=" Vehicle Trading">
    <select name="tradeYear" id="tradeYear">
      <option value="">Select Year</option>
      <?php
do {  
?>
      <option value="<?php echo $row_autoYears['year']?>"><?php echo $row_autoYears['year']?></option>
      <?php
} while ($row_autoYears = mysqli_fetch_assoc($autoYears));
  $rows = mysqli_num_rows($autoYears);
  if($rows > 0) {
      mysqli_data_seek($autoYears, 0);
	  $row_autoYears = mysqli_fetch_assoc($autoYears);
  }
?>
    </select>
        </span>

        <span class="lineHolder">
<select name=tradeMake id="tradeMake" onchange="AjaxFunction(this.value);">
          <option value=''>Select One</option>
          <?php
do {  
?>
          <option value="<?php echo $row_carMakes['car_make']?>"><?php echo $row_carMakes['car_make']?></option>
          <?php
} while ($row_carMakes = mysqli_fetch_assoc($carMakes));
  $rows = mysqli_num_rows($carMakes);
  if($rows > 0) {
      mysqli_data_seek($carMakes, 0);
	  $row_carMakes = mysqli_fetch_assoc($carMakes);
  }
?>
        </select>
        
        		</span>

        
        <span class="lineHolder">
        <select id="tradeMake" name="subcat">
        <option value="">Models Appear...</option>
          </select>
        </span>

        <span class="lineHolder">

			<input name="tradeTrim" type="text" id="tradeTrim" size="10" placeholder="Trim/Style">
            
		</span>        
    
    
 
  
            <span class="liner"><br />
            With approximately</span>
        <span class="lineHolder">
        <input name="tradeMiles" type="text" class="required"  id="tradeMiles" value="0" size="7" maxlength="5" data-click-to-edit-write="true" placeholder="Mileage">
</span>

            <span class="liner"> miles on it..</span>
            
            
         </div>   
            
     </div>
     
     
    <div class="lineHolder">
    
    
        <label for="tradeYes">
            <input name="vehiclel_available" id="vehiclel_available" value="Is this vehicle available and ready?" type="checkbox" class="checkbox"> 
            Is this vehicle still available in your inventory?
        </label>
    </div>

    <div class="lineHolder">
        <label for="counter_offer">
            <input name="counter_offer" id="counter_offer" type="checkbox" class="checkbox" value="Would you take my price for this vehicle?">
        </label>

        <label for="counter_offer2">
            Would you take $ <input name="counter_offer2" type="text" class="placeholder" id="counter_offer2" value="0.00" size="7" placeholder=""> for this vehicle?
        </label>
    </div>

    <div class="lineHolder">
        <label for="warranty">
            <input name="warranty" id="warranty" type="checkbox" class="checkbox" value="Does this vehicle have a warranty?"> Does this vehicle have a warranty?
        </label>
    </div>

    <div class="lineHolder">
        <label for="cust_dealtoday">
            <input name="cust_dealtoday" id="cust_dealtoday" type="checkbox" class="checkbox" value="I'm willing to do this deal today."> I'm willing to do this deal today.
        </label>
    </div>

<div class="commentArea">
  <p>
        <a href="#">Send Your Message Here:</a>
    </p>
    <div id="messageContainer" class="hidden">
        <textarea name="cust_comment" cols="50" rows="5" id="cust_comment" placeholder="Enter Your Message Here"></textarea>
    </div>
    <p><span class="liner">Thank you in advance.</span></p>

</div>
    	
        <button id="leadbuton" type="submit">Send Message</button>
    
    </div>
</div>
<input type="hidden" name="MM_insert" value="cust_leadForm">
            </form>

            

        
        </div>
    </div>
</div>
<div class="clear"></div>
</div>
<?php } ?>