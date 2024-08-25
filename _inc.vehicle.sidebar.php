				<div class="col-sm-12 col-md-4">
                
					<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Dealer Inventory</h3>
						</div>
						<div class="panel-body" align="center">
                        
                        	<a class="btn btn-success btn-primary btn-block" href="dstore.php?token=<?php echo $row_find_vehicle['token']; ?>" target="_blank">View Our  Entire Inventory</a>
                        
						</div>
					</div><!-- /.panel -->
                    
                    
                    
                    
                    
					<div id="analyst_answerbox" class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Get An Answer From An Analyst.</h3>
						</div>
						<div class="panel-body">










        

             	<form id="cust_leadForm">
            


   	<div class="contentleadblock">
    <div class="row">
    	<div class="col-sm-6">
<div class="form-group">    
        <span class="lineHolder">
        <label class="control-label">First Name</label><br />
        <input name="cust_nickname" type="hidden" id="cust_nickname" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_name']; ?>">
        
        <input name="cust_fname" type="text" id="cust_fname" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_fname']; ?>" size="15" placeholder="First Name" style="width: 100%;">
        </span>
        </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
        
        <span class="lineHolder">
<label class="control-label">Last Name</label><br />
            <input name="cust_lname" type="text" class="required placeholder" id="cust_lname" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_lname']; ?>" placeholder="Last Name" style="width: 100%;">            
        </span>
        </div>
        </div>
    </div>
    <p>
    <span style="padding-bottom: line-height 4;">        
                <span class="liner">To reach me call </span> 
                <span class="lineHolder">
                <input name="phone" id="callphone" data-mask="(999) 999-9999" type="text" placeholder="Phone Number" class="required placeholder" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_cellphone']; ?>"></span>
    </span>
                <span class="liner">
                which is my 
                </span>

                <span class="lineHolder">
                <label>
                <select id="cust_phonetype" name="cust_phonetype"> 
                    <option value="mobile" selected="selected">Mobile</option>
                    <option value="home">Home</option>
                    <option value="work">Work</option>
                  </select>
                  </label>  
                  </span>
                <span class="liner"> number.</span> 
    <span style="padding-bottom: line-height 4;">
        <br />
    
       <strong>My Email Is:</strong>
        <input name="cust_email" type="text" class="form-control" id="cust_email"  placeholder="Your Email">
        </span>
        <br />
                <div class="row">
                <div class="col-sm-12">
                <button id="leadbuton_1" role="button" class="btn btn-primary btn-block" type="button">Get An Answer</button>
                </div>
                </div>
                </p>
    </div>
        





            	<div id="leadbox_1" class="contentleadblock" style="display:none;">
    <p>
    
    
        <span class="liner">Hello, <strong>"<?php echo $row_find_vehicle['company']; ?>"</strong> </span>


        <span class="lineHolder">
        
            <input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $row_find_vehicle['did']; ?>" >
            <input name="cust_vehicle_id" type="hidden" id="cust_vehicle_id" value="<?php echo $row_find_vehicle['vid']; ?>" >
            <input name="cust_lead_source_id" type="hidden" id="cust_lead_source_id" value="" >            
            <input name="cust_lead_source" type="hidden" id="cust_lead_source" value="WeFinanceHere.com" >
            <input name="cust_lead_token" type="hidden" id="cust_lead_token" value="<?php echo $tkey; ?>" >            
            
            
        </span>
        
        <!--span class="liner">my name is </span -->
        
        <span class="liner">I am intrested in this <strong>"<?php echo $row_find_vehicle ['vcondition']; ?> <?php echo $row_find_vehicle ['vyear']; ?> <?php echo $row_find_vehicle ['vmake']; ?> <?php echo $row_find_vehicle ['vmodel']; ?> <?php echo $row_find_vehicle ['vtrim']; ?> "</strong> I see online at <strong>WeFinanceHere.com.</strong> When Possible I would like to know more about financing this vehicle. I currently work at</span>
        
        <span class="lineHolder">
            <input id="cust_employer_name" type="text" placeholder="Employer Name" class="required placeholder" style="width:70%;" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_employer1_name']; ?>">
        </span>
         <span class="liner"> city of </span> 
       <span class="lineHolder">
            <input name="cust_employer_city" id="cust_employer_city" type="text" placeholder="Employer City" class="required placeholder" style="width: 30%;" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_employer1_city']; ?>"> </span>
         <span class="liner">    ,</span> 
            
        

        <span class="lineHolder">
				<select name="cust_employer_state" id="cust_employer_state">
				  <option value="NULL" <?php if (!(strcmp("NULL", 'GA'))) {echo "selected=\"selected\"";} ?>>States</option>
				  <?php do {  ?>
				  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], 'GA'))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
				  <?php
					} while ($row_states = mysqli_fetch_array($states));
					  $rows = mysqli_num_rows($states);
					  if($rows > 0) {
						  mysqli_data_seek($states, 0);
						  $row_states = mysqli_fetch_array($states);
					  }
					?>
				</select>
        </span>
       


        <span class="lineHolder">
        
            <input name="cust_employer_zip" type="text" class="required placeholder" id="cust_employer_zip" size="10" maxlength="5" data-mask="99999" placeholder="Zip Code" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_employer1_zip']; ?>">.
        </span>
        <span class="liner"><br />I have been working here for about</span>


        <span class="lineHolder">
           <select name="cust_employer_years" id="cust_employer_years">
             <option value="NULL">Select Years</option>
             <?php do {  ?>
             <option value="<?php echo $row_timeYears['year_value']?>"><?php echo $row_timeYears['year_name']?></option>
             <?php
} while ($row_timeYears = mysqli_fetch_array($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_array($timeYears);
  }
?>
           </select>
            
        </span>


        <span class="liner"> and </span>

        <span class="lineHolder">
				<select name="cust_employer_months" id="cust_employer_months">
				  <option value="">Select Months</option>
				  <?php do {  ?>
				  <option value="<?php echo $row_timeMonths['month_value']?>"><?php echo $row_timeMonths['month_name']?></option>
				  <?php
} while ($row_timeMonths = mysqli_fetch_array($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_array($timeMonths);
  }
?>
				</select>            
        </span>
        
        
                <span class="liner">.</span>




        <span class="liner">My current Monthly Income is </span>
        
        <span class="lineHolder">
            <input name="cust_gross_income" type="text" class="required placeholder" id="cust_gross_income" size="5" placeholder="i.e. 2000" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_employer1_salary_bringhome']; ?>">    
        </span>


        <span class="liner">which I get paid </span>

        <span class="lineHolder">
            <select name="cust_gross_income_frequency" id="cust_gross_income_frequency">
              <option value="" <?php if (!(strcmp("value", "Monthly"))) {echo "selected=\"selected\"";} ?>>When?</option>
              <?php do {  ?>
              <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], "Monthly"))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
              <?php
} while ($row_paydayType = mysqli_fetch_array($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_array($paydayType);
  }
?>
            </select>
        </span>
        <span class="liner">.</span>
        



        <span class="liner">
        I currently Live at </span>
        
        <span class="lineHolder">
            <input name="cust_home_address" type="text" class="required placeholder" id="cust_home_address" size="15" placeholder="123 Street Address" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_present_address1']; ?>">    
        </span>
        <span class="liner">in the city of </span>
        <span class="lineHolder">
            <input name="cust_home_city" type="text" class="required placeholder" id="cust_home_city" size="15" placeholder="City">
        </span>        
        <span class="lineHolder">
				<select name="lead_home_state" id="lead_home_state">
				  <option value="" <?php if (!(strcmp("NULL", 'GA'))) {echo "selected=\"selected\"";} ?>>Select One</option>
				  <?php do {  ?>
				  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], 'GA'))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
				  <?php
} while ($row_states = mysqli_fetch_array($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_array($states);
  }
?>
				</select>            
        </span>
        <span class="liner">, in zip code </span>
        <span class="lineHolder">
            <input name="cust_home_zip" type="text" class="required placeholder" id="cust_home_zip" size="7" placeholder="Zip" value="<?php echo $row_find_existingwfhuserprofile_email['applicant_present_addr_zip']; ?>">    
        </span>
        <span class="liner">county of </span>        
        <span class="lineHolder">
            <input name="cust_home_county" type="text" class="required placeholder" id="cust_home_county" size="10" placeholder="County"> . 
        </span>
       
        
        
        
              <span class="liner"><br />I have been living here for </span>
                
            <span class="lineHolder">
                <select name="cust_home_live_years" id="cust_home_live_years">
                             <option value="NULL">Select Years</option>
             <?php
do {  
?>
             <option value="<?php echo $row_timeYears['year_value']?>"><?php echo $row_timeYears['year_name']?></option>
             <?php
} while ($row_timeYears = mysqli_fetch_array($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_array($timeYears);
  }
?>
           </select>

            </span>
            
            <span class="lineHolder">, 
            	<select name="cust_home_live_months" id="cust_home_live_months">
                				  <option value="">Select Months</option>
				  <?php do {  ?>
				  <option value="<?php echo $row_timeMonths['month_value']?>"><?php echo $row_timeMonths['month_name']?></option>
				  <?php
} while ($row_timeMonths = mysqli_fetch_array($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_array($timeMonths);
  }
?>
				</select>    .        
</span>

                

</p>
        
<button id="leadbuton_2" role="button" class="btn btn-primary btn-block" type="button">Process</button>
</div>










<div id="leadbox_2" class="contentleadblock" style="display:none;">
    <div class="leadTop">
    <div>
    
    

      <div class="checkbox">
      	<label for="tradeYes">
            <input name="tradeYes" id="tradeYes" value="Is looking to trade" type="checkbox" class="checkbox">
        </label>
            
          I'm also intrested in Trading my vehicle which is a 
     </div>
        
		
        
        <div id="indent">
        <span class="lineHolder" title=" Vehicle Trading">
    <select name="tradeYear" id="tradeYear">
      <option value="">Select Year</option>
      <?php
do {  
?>
      <option value="<?php echo $row_autoYears['year']?>"><?php echo $row_autoYears['year']?></option>
      <?php
} while ($row_autoYears = mysqli_fetch_array($autoYears));
  $rows = mysqli_num_rows($autoYears);
  if($rows > 0) {
      mysqli_data_seek($autoYears, 0);
	  $row_autoYears = mysqli_fetch_array($autoYears);
  }
?>
    </select>
        </span>

        <span class="lineHolder">
		<select name='tradeMake' id="tradeMake">
          <option value="">Select One</option>
          <?php do {  ?>
          <option value="<?php echo $row_carMakes['car_make']?>"><?php echo $row_carMakes['car_make']?></option>
          <?php
			} while ($row_carMakes = mysqli_fetch_array($carMakes));
			  $rows = mysqli_num_rows($carMakes);
			  if($rows > 0) {
				  mysqli_data_seek($carMakes, 0);
				  $row_carMakes = mysqli_fetch_array($carMakes);
			  }
			?>
        </select>
        </span>

        
        <span class="lineHolder">
        <select id="tradeModel">
        <option value="">Models Appear...</option>
          </select>
        </span>

        <span class="lineHolder">

			<input name="tradeTrim" type="text" id="tradeTrim" size="10" placeholder="Trim/Style">
            
		</span>        
    
    
 
  
            <span class="liner"> With approximately</span>
            
        <span class="linerHolder">
        <input name="tradeMiles" type="text" class=""  id="tradeMiles" value="0" size="3" maxlength="5"  placeholder="Mileage"></span>
        <span class="liner"> miles on it..</span>
            
            
         </div>   
            
     </div>
     
     
    <div class="checkbox">
    
    
        <label for="vehicle_available">
            <input name="vehicle_available" id="vehicle_available" value="Is this vehicle available and ready?" type="checkbox" class="checkbox"> 
            Is this vehicle still available in your inventory?
        </label>
    </div>

    <div class="checkbox">
        <label for="counter_offer">
            <input name="counter_offer" id="counter_offer" type="checkbox" class="checkbox" value="Would you take my price for this vehicle?">
        </label>

        <label for="counter_offer2">
            Would you take $ <input name="counter_offer2" type="text" class="placeholder" id="counter_offer2" value="0.00" size="7" placeholder=""> for this vehicle?
        </label>
    </div>

    <div class="checkbox">
        <label for="warranty">
            <input name="warranty" id="warranty" type="checkbox" class="checkbox" value="Does this vehicle have a warranty?"> Does this vehicle have a warranty?
        </label>
    </div>

    <div class="checkbox">
        <label for="cust_dealtoday">
            <input name="cust_dealtoday" id="cust_dealtoday" type="checkbox" class="checkbox" value="I'm willing to do this deal today."> I'm willing to do this deal today.
        </label>
    </div>


    <div class="checkbox">
        <label for="accept_terms">
            <input id="accept_terms" value="I accept terms and conditions" type="checkbox"> I accept <a href="#terms_conditions">terms and conditions</a>.
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
    	
        <button id="leadbuton_go" role="button" class="btn btn-primary btn-block" type="button">Fully Process</button>
    
    </div>
</div>
            </form>




















						</div>
					</div><!-- /.panel -->
					<div class="panel panel-secondary hidden">
						<div class="panel-heading">
							<h3 class="panel-title">Text Widget</h3>
						</div>
						<div class="panel-body">
                        
                                       <div class="form-group">
                    <label>Loan Term (Months):</label>
                    <select id="loan_term_months" class="form-control">
                        <optgroup label="The Longest You'll Go?">
                            <option value="1">1 Year</option>
                            <option value="2">2 Years</option>
                            <option value="3">3 Years</option>
                            <option value="4" selected="selected">4 Years</option>
                            <option value="5">5 Years</option>
                            <option value="6">6 Years</option>
                        </optgroup>
                    </select>
                </div>

							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
						</div>
					</div><!-- /.panel -->
                    
                    
                    
					<div class="panel panel-secondary hidden">
						<div class="panel-heading">
							<h3 class="panel-title">Taxonomy</h3>
						</div>
						<div class="panel-body">
							<ul class="tags">
								<li><a href="#link">design</a></li>
								<li><a href="#link">layout</a></li>
								<li><a href="#link">stack</a></li>
								<li><a href="#link">PSD</a></li>
								<li><a href="#link">bootstrap</a></li>
								<li><a href="#link">menu</a></li>
								<li><a href="#link">type</a></li>
								<li><a href="#link">paper</a></li>
								<li><a href="#link">press</a></li>
							</ul>
						</div>
					</div><!-- /.panel -->
                    
                    
					<div class="widget hidden">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab-1" data-toggle="tab">Popular</a></li>
							<li><a href="#tab-2" data-toggle="tab">Recent</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tab-1">
								<ul class="list-unstyled">
									<li><h3 class="h5"><i class="fa fa-file-text-o"></i> <a href="#link">Efficiently Modifying Posts</a></h3></li>
									<li><h3 class="h5"><i class="fa fa-file-text-o"></i> <a href="#link">Taxonomy Regulation</a></h3></li>
									<li><h3 class="h5"><i class="fa fa-file-text-o"></i> <a href="#link">7 Things You Love</a></h3></li>
									<li><h3 class="h5"><i class="fa fa-file-text-o"></i> <a href="#link">Why I Love Jazz Music</a></h3></li>
									<li><h3 class="h5"><i class="fa fa-file-text-o"></i> <a href="#link">Learn The Basics Of Muse</a></h3></li>
									<li><h3 class="h5"><i class="fa fa-file-text-o"></i> <a href="#link">Start A New Business</a></h3></li>
								</ul>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="tab-2">
								<ul class="list-unstyled">
									<li>
										<h3 class="h5"><i class="fa fa-comment-o"></i> <a href="#link">Efficiently Modifying Posts</a></h3>
										<p>Color manipulation in Photoshop can be used to correct mistakes...</p>
									</li>
									<li>
										<h3 class="h5"><i class="fa fa-comment-o"></i> <a href="#link">Taxonomy Regulation</a></h3>
										<p>You can't design without type. However, you can use only type (or mostly only type)...</p>
									</li>
									<li>
										<h3 class="h5"><i class="fa fa-comment-o"></i> <a href="#link">7 Things You Love</a></h3>
										<p>Continuing from Part 1, let's extend into tools for linting, measuring performance, checking for...</p>
									</li>
								</ul>
							</div><!-- /.tab-pane -->
						</div><!-- /.tab-content -->
					</div><!-- /.widget -->
                    
                    
                    
					<div class="widget hidden">
						<h3 class="h5">Other Cars In Inventory</h3>
						<ul class="img-stream">
							<li><a href="#link"><img class="media-object" data-src="holder.js/125x125/#2A2F37:#ffffff" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/125x125/#2A2F37:#ffffff" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/125x125/#2A2F37:#ffffff" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/125x125/#2A2F37:#ffffff" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/125x125/#2A2F37:#ffffff" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/125x125/#2A2F37:#ffffff" alt="img"></a></li>
						</ul>
					</div><!-- /.widget -->





                
                </div>
