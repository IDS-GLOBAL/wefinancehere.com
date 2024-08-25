<div id="situation_status_section" class="resume-header" style="display: block;">
                                  
                    
         <?php include("content/inc.123steps.php"); ?>
                
                                         
                        
</div>
            
<div id="situation_section" class="row" style="display:block;">

            <div style="">

				  <!-- Start Action Form-->
                  
                  
				  <div class="col-lg-4 col-md-4 col-sm-4">

							<div class="banner-optin vertical">
								<h1><i class="fa fa-thumbs-o-up"></i> <strong>GRAB YOUR FUNDS</strong> APPROVED NOW!</h1>


								
                                <div id="lets_getapproved">
									<div class="form-group">
                                    	<label>1. The Most You Can Pay Towards A Car Payment?</label>
										<input name="mostCarpymt" id="mostCarpymt" type="number" step="1" class="form-control"  placeholder="300">
									</div>

									<div class="form-group">
                                    	<label>2. For How Long?</label>
										<select class="form-control" style="height:40px;" name="loanTerm" id="loanTerm">
                                                        <option value="18">18 Months</option>
                                                        <option value="24">24 Months</option>
                                                        <option value="36">36 Months</option>
                                                        <option value="48">48 Months</option>
                                                        <option value="60">60 Months</option>
                                                        <option value="72">72 Months</option>
                                        </select>
									</div>

									<div class="form-group">
                                    	<label>3. Not Always Needed But Tell Us What You Think Your Credit Score Is?</label>
                                            <select class="form-control" style="height:40px;" name="Credit" id="Credit">
                                              <option value="3.0">Very Good (750 - 850)</option>
                                              <option value="6.0">Good (675-719)</option>
                                              <option value="12.0" selected="selected">Fair (621 - 674)</option>
                                              <option value="15.0">Poor (575 - 620)</option>
                                              <option value="18.0">Really Bad (Below - 575)</option>
                                            </select>

									</div>

									

									<div class="form-group" align="center">
										<button id="get_instantapproved" type="submit" class="btn btn-default btn-submit">GET INSTANTLY APPROVED!</button>
									</div>

                                </div>







                                
                                <div id="lets_lock_myapproval" style="display:none;">
                                	
                                    <div class="form-group">
                                    	<label>4. Do You Currently Have A Car Loan (Active) In Your Name?</label>
										      <select class="form-control" style="height:40px;" name="currentCarLoan" id="currentCarLoan">
													<option value="N">No</option>
													<option value="Y">Yes</option>
                								</select>

									</div>

									<div class="form-group">
                                    <label>5. Down Payment Available?</label>
										<input name="downpayment" type="text" id="downpayment" size="10" maxlength="8" />

									</div>


								<div class="form-group" <?php //if($row_dealer_url['state']){ echo 'style="display: none;"'; }else{ echo 'style="display: block;"'; } ?>>
                                    
                                    	<label>6. What State Are You In? <?php echo $row_dealer_url['state']; ?></label>
											<select class="form-control" style="height:40px;" name="homeState" id="homeState">
                                <option value="" <?php if (!(strcmp("", $row_dealer_url['state']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                                <?php do {  ?>
                                <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_dealer_url['state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                                <?php } while ($row_states = mysqli_fetch_assoc($states));
										  $rows = mysqli_num_rows($states);
										  if($rows > 0) {
											  mysqli_data_seek($states, 0);
											  $row_states = mysqli_fetch_assoc($states);
										  }
								?>
				</select>
									</div>
									
									<div class="form-group" align="center">
										<button id="lock_myapproval" type="submit" class="btn btn-default btn-submit">LOCK MY APPROVAL</button>
									</div>
                                    
								</div>
                                
                                
                                
                                
                                
                                
								
								
				
									
								
							</div><!------->
							
                            
                            <div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>

					</div>
				  
                  
                  <!-- End Action Form -->

				  
                  
                 <!-- Start Right Slider -->
					<div id="instant_approval_splash" class="col-lg-8 col-md-8 col-sm-7 header-text">
			
                        <div id="allocate_funds">
                                    <h1><strong><span id="gain_get">GAIN</span> INSTANT APPROVAL!</strong></h1>
                                    <p>Lending $<span id="total_avilable"><?php echo formatMoney($total_avilable); ?></span> NOW</p>
                                    <p> 
                                        ALLOCATE YOUR FUNDS INSTANTLY!
                                    </p>
            
                                    <p>Available: $<span id="total_avilable"><?php echo formatMoney($total_avilable); ?></span> </p>
                                    
                                    </div>
                    
                        
                        <div class="row">
							
                            
                            
                         <div class="col-lg-6 col-md-6 col-sm-6">
                            <div id="approval_box">
                                <ul class="green-arrow">
                                    <li><span id="totalPayments">0</span> :Amount Awarded</li>
                                    <li><span id="downpaymentPrice">0</span> :Down Payment</li>
                                    <li>+<span id="totalLine"></span> :Total</li>
                                    <li><span id="totalAmountPrice">0</span> :Total Amount Price</li>
                                    <li><span id="CarPurchasePrice">0</span> :Car Purchase Price</li>
                                    
                                    <li>Find A <span id="vehicleCondition"></span> Car For: <span id="Xamount">0</span></li>
				</ul>
                           </div>
                                
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>1. GET APPROVED</li>
									<li>2. FIND A VEHICLE OR DEALER</li>
									<li>3. PREPARE PAPERWORK</li>
									<li>4. SIGN &amp; DRIVE APPOINTMENT</li>
								</ul>
							</div>
                            
                            
                            
							<div class="clearfix"></div>
						<h1></h1>
                        <a href="#">Disclaimer</a>
						<p id="disclaimer">*Wefinancehere.com approval process and deal matrix is an estimator tool used to match customers with pre-exisiting dealers finacing criteria. This is based off customer profile information and the unique vehicle chosen. This process pre-approves you but not guarantee the auto loan until a interview is completed with dealer/lender. Only and when this process is completed can we not fully garuntee the auto loan. Accuracy and completion of entered information increases the chances of your autoloan completing by passing the interview / final stage of this process. WeFinanceHere.com and/or Dealer may be required to verify identiy, residence, employment, income, and make copies of any/all documentation provided by customer such as check stubs, W2, 1099, Bank Staments and etc during or prior to final interview at the dealership location. A Dealer Credit Check may be required to insure at least accurate identity and to protect Identity Fraud of Internet deals. Our approval method is based off pre-selected ratios which range from rate, term, taxes, selling price, cost, miscellaneous fees and etc. from by rate based off credit score selection. You may qualify for slightly more or less. Down Payment and/or Vehicle Trade(s), may be required but is not necessary for obtaining financing of an automobile.. Approvals are subject to verification and accuracy of employment and income.   Auto loan interest rates and repayment terms are based on credit risk of all buyer(s), based on buyer, and dealer location, and including vehicle selection.  Contracts from wefinancehere.com (assignor) are assigned to dealer/lender (assignee) for loan closings. Car Buyers in a negative equity position of a pre-exisiting car loan may be required to have additional downpayment or cary negative equity ontop of sales price.
						</p>
                        
							<div class="clearfix"></div>

						</div>
					
                    
                    </div>
				    

                 <!-- End Right Slider -->

            </div>





			

</div>
<div id="lockget_started" class="row">
					<!-- Start Header Text -->
					<div class="col-md-8 col-sm-8 col-sm-7">
                        <div class="item header-text">
                                <div class="col-md-7">
                                  <h1>Lock Down Your Approval<strong> NOW!</strong></h1>
                                    <p class="hidden-xs">Pick A Dealer Or Pick A Vehicle NEXT.</p>
                                    <div class="banner-optin vertical">
                                    
									<div class="form-group">
										
										<select class="form-control" id="traffic_source" >
                                            <option value="">How Did You Hear About Us?</option>
                                            <option value="Referral">Referral</option>
                                            <option value="Repeat">Repeat</option>
                                            <option value="Google Search Engine">Google Search Engine</option>
                                            <option value="Bing Search Engine">Bing Search Engine</option>
                                            <option value="Yahoo Search Engine">Yahoo Search Engine</option>
                                            <option value="Mail Piece">Mail Piece</option>
                           				</select>
										
									</div>

                                        <div class="form-group" align="center">
                                            <button type="button" class="btn btn-default btn-submit">Pick A Dealer Or Vehicle</button>
                                        </div>
                                    </div>
					
                                </div>
                                <div class="col-md-5 hidden-xs text-center"> <a href="#" target="_blank"><img src="img/iphone1.png" alt="" border="0" class="img-responsive" title=""></a>
                          </div>
                            </div>
					</div>
					<!-- End Header Text -->
					<!-- Start Banner Optin Form-->
					<div class="col-lg-4 col-md-4 col-sm-5">
                    
						<div id="banner-form">
							<div class="banner-optin vertical">
								<h1>Save your <strong>Approval</strong> now</h1>
								<div class="form-group">
									<input name="user_first_name" id="user_first_name" type="text" class="form-control" required="" placeholder="Your Name">
								</div>
								<div class="form-group">
									<input name="user_last_name" id="user_last_name" type="text" class="form-control" required="" placeholder="Your Name">
								</div>
								<div class="form-group">
									<input name="user_email" id="user_email" type="text" class="form-control" required="" placeholder="Your e-mail">
								</div>
								<div class="form-group">
									<input name="user_cellphone" id="user_cellphone" type="text" class="form-control" placeholder="Cell Phone Number">
								</div>
								<div class="form-group">
									<input name="user_password" id="user_password" type="password" class="form-control" placeholder="Password">
								</div>

								<div class="form-group">
									<button id="wfh_firstgo" type="button" class="btn btn-default btn-submit">Get Started Now</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</div>
					
                    
                    </div>
					<!-- End Banner Optin Form -->
				</div>
<div id="application_section" class="row" style="display:none;">
			<!-- Home Information -->
			<div id="home_section" class="row">
            		<h1><strong>Other </strong>Income Section</h1>
                    <p>Please complete this section of pertaining where the the vehicle will be located and billing information for repayment of your approval. (Please Provide Up To 5 Years Of Residence History.)
                    </p>
                    <div class="row">

					<!-- Start Part One -->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1><strong>Current </strong> Home Information</strong></h1>


									

	  <div class="form-group">
										<input type="text" class="form-control" id="applicant_present_address1" placeholder="Street Address">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="applicant_present_address2" placeholder="Apt. Bldg, Unit">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="applicant_present_addr_city" placeholder="City">
									</div>
									<div class="row">
										<div class="col-4 pull-left" style="width: 40%;">
										<select class="form-control" style="height:40px;" id="applicant_present_addr_state">
                                              <option value="">State</option>
                                              <option value="AL">AL</option>
                                              <option value="AK">AK</option>
                                              <option value="AZ">AZ</option>
                                              <option value="AR">AR</option>
                                              <option value="CA">CA</option>
                                              <option value="CO">CO</option>
                                              <option value="CT">CT</option>
                                              <option value="DE">DE</option>
                                              <option value="DC">DC</option>
                                              <option value="FL">FL</option>
                                              <option value="GA">GA</option>
                                              <option value="HI">HI</option>
                                              <option value="ID">ID</option>
                                              <option value="IL">IL</option>
                                              <option value="IN">IN</option>
                                              <option value="IA">IA</option>
                                              <option value="KS">KS</option>
                                              <option value="KY">KY</option>
                                              <option value="LA">LA</option>
                                              <option value="ME">ME</option>
                                              <option value="MD">MD</option>
                                              <option value="MA">MA</option>
                                              <option value="MI">MI</option>
                                              <option value="MN">MN</option>
                                              <option value="MS">MS</option>
                                              <option value="MO">MO</option>
                                              <option value="MT">MT</option>
                                              <option value="NE">NE</option>
                                              <option value="NV">NV</option>
                                              <option value="NH">NH</option>
                                              <option value="NJ">NJ</option>
                                              <option value="NM">NM</option>
                                              <option value="NY">NY</option>
                                              <option value="NC">NC</option>
                                              <option value="ND">ND</option>
                                              <option value="OH">OH</option>
                                              <option value="OK">OK</option>
                                              <option value="OR">OR</option>
                                              <option value="PA">PA</option>
                                              <option value="RI">RI</option>
                                              <option value="SC">SC</option>
                                              <option value="SD">SD</option>
                                              <option value="TN">TN</option>
                                              <option value="TX">TX</option>
                                              <option value="UT">UT</option>
                                              <option value="VT">VT</option>
                                              <option value="VA">VA</option>
                                              <option value="WA">WA</option>
                                              <option value="WV">WV</option>
                                              <option value="WI">WI</option>
                                              <option value="WY">WY</option>
                                        </select>
									</div>
									<div class="pull-right" style="width: 50%;">
										<input name="applicant_present_addr_zip" type="text" class="form-control" id="applicant_present_addr_zip" size="5" maxlength="5" placeholder="Zip">
									</div>
								
								</div>
<div class="row">
										<div class="col-4 pull-left" style="width: 40%;">
										<select class="form-control" id="applicant_addr_years">
					                                                    	<option value="0 Years">0 Years</option>
					                                                    	<option value="1 Year">1 Year</option>
					                                                    	<option value="2 Years">2 Years</option>
					                                                    	<option value="3 Years">3 Years</option>
					                                                    	<option value="4 Years">4 Years</option>
					                                                    	<option value="5 Years">5 Years</option>
					                                                    	<option value="6 Years">6 Years</option>
					                                                    	<option value="7 Years">7 Years</option>
					                                                    	<option value="8 Years">8 Years</option>
					                                                    	<option value="9 Years">9 Years</option>
					                                                    	<option value="10 Years">10 Years</option>
					                                        </select>
										</div>
									<div class="pull-right" style="width: 50%;">
                                        <select class="form-control" id="applicant_addr_months">
                                            <option value="0 Months">0 Months</option>
                                            <option value="1 Month">1 Month</option>
                                            <option value="2 Months">2 Months</option>
                                            <option value="3 Months">3 Months</option>
                                            <option value="4 Months">4 Months</option>
                                            <option value="5 Months">5 Months</option>
                                            <option value="6 Months">6 Months</option>
                                            <option value="7 Months">7 Months</option>
                                            <option value="8 Months">8 Months</option>
                                            <option value="9 Months">9 Months</option>
                                            <option value="10 Months">10 Months</option>
                                            <option value="11 Months">11 Months</option>
                                        </select>
									</div>
								
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="applicant_house_payment" placeholder="Mortage Payment">
								</div>
				  <div class="form-group">
									<button type="submit" class="btn btn-default btn-submit">Process Residency</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
                    <!-- End Part One -->
                    <!-- Start Part Two -->
					<div id="prev_home_section" class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1><strong>Previous </strong> Home Information</strong></h1>


									

									<div class="form-group">
										<input type="text" class="form-control" id="applicant_previous1_addr1" placeholder="Street Address">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="applicant_previous1_addr2" placeholder="Apt. Bldg, Unit">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="applicant_previous1_addr_city" placeholder="City">
									</div>
									<div class="row">
										<div class="col-4 pull-left" style="width: 40%;">
										<select class="form-control" style="height:40px;" id="applicant_previous1_addr_state">
                                              <option value="">State</option>
                                              <option value="AL">AL</option>
                                              <option value="AK">AK</option>
                                              <option value="AZ">AZ</option>
                                              <option value="AR">AR</option>
                                              <option value="CA">CA</option>
                                              <option value="CO">CO</option>
                                              <option value="CT">CT</option>
                                              <option value="DE">DE</option>
                                              <option value="DC">DC</option>
                                              <option value="FL">FL</option>
                                              <option value="GA">GA</option>
                                              <option value="HI">HI</option>
                                              <option value="ID">ID</option>
                                              <option value="IL">IL</option>
                                              <option value="IN">IN</option>
                                              <option value="IA">IA</option>
                                              <option value="KS">KS</option>
                                              <option value="KY">KY</option>
                                              <option value="LA">LA</option>
                                              <option value="ME">ME</option>
                                              <option value="MD">MD</option>
                                              <option value="MA">MA</option>
                                              <option value="MI">MI</option>
                                              <option value="MN">MN</option>
                                              <option value="MS">MS</option>
                                              <option value="MO">MO</option>
                                              <option value="MT">MT</option>
                                              <option value="NE">NE</option>
                                              <option value="NV">NV</option>
                                              <option value="NH">NH</option>
                                              <option value="NJ">NJ</option>
                                              <option value="NM">NM</option>
                                              <option value="NY">NY</option>
                                              <option value="NC">NC</option>
                                              <option value="ND">ND</option>
                                              <option value="OH">OH</option>
                                              <option value="OK">OK</option>
                                              <option value="OR">OR</option>
                                              <option value="PA">PA</option>
                                              <option value="RI">RI</option>
                                              <option value="SC">SC</option>
                                              <option value="SD">SD</option>
                                              <option value="TN">TN</option>
                                              <option value="TX">TX</option>
                                              <option value="UT">UT</option>
                                              <option value="VT">VT</option>
                                              <option value="VA">VA</option>
                                              <option value="WA">WA</option>
                                              <option value="WV">WV</option>
                                              <option value="WI">WI</option>
                                              <option value="WY">WY</option>
                                        </select>
									</div>
									<div class="pull-right" style="width: 50%;">
										<input name="applicant_previous1_addr_zip" type="text" class="form-control" id="applicant_previous1_addr_zip" size="5" maxlength="5" placeholder="Zip">
									</div>
								
								</div>
<div class="row">
										<div class="col-4 pull-left" style="width: 40%;">
										<select class="form-control" id="applicant_previous1_live_years">
                                                    	<option value="0 Years">0 Years</option>
                                                    	<option value="1 Year">1 Year</option>
                                                    	<option value="2 Years">2 Years</option>
                                                    	<option value="3 Years">3 Years</option>
                                                    	<option value="4 Years">4 Years</option>
                                                    	<option value="5 Years">5 Years</option>
                                                    	<option value="6 Years">6 Years</option>
                                                    	<option value="7 Years">7 Years</option>
                                                    	<option value="8 Years">8 Years</option>
                                                    	<option value="9 Years">9 Years</option>
                                                    	<option value="10 Years">10 Years</option>
                                        </select>
									</div>
									<div class="pull-right" style="width: 50%;">
                                        <select class="form-control" id="applicant_previous1_live_months">
                                            <option value="0 Months">0 Months</option>
                                            <option value="1 Month">1 Month</option>
                                            <option value="2 Months">2 Months</option>
                                            <option value="3 Months">3 Months</option>
                                            <option value="4 Months">4 Months</option>
                                            <option value="5 Months">5 Months</option>
                                            <option value="6 Months">6 Months</option>
                                            <option value="7 Months">7 Months</option>
                                            <option value="8 Months">8 Months</option>
                                            <option value="9 Months">9 Months</option>
                                            <option value="10 Months">10 Months</option>
                                            <option value="11 Months">11 Months</option>
                                        </select>
									</div>
								
							  </div>
								<div class="form-group">
									<button type="submit" class="btn btn-default btn-submit">Process Residency</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>                    
                    <!-- End Part Two -->
					<!-- Start Part Three-->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1><strong>Strength</strong> of your Living Information</h1>
								<div class="form-group">
									<input name="applicant_previous1_landlord_name" id="applicant_previous1_landlord_name" type="text" class="form-control" required="" placeholder="Prev. Landlord Phone">
								</div>
								<div class="form-group">
									<input name="applicant_previous1_landlord_phone" id="applicant_previous1_landlord_phone" type="text" class="form-control" required="" placeholder="Prev. Lanlord Phone">
								</div>
								<div class="form-group">
									<button type="button" class="btn btn-default btn-submit">Process Previous Residency</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
					<!-- End Part Three -->
						
                    </div>
			</div>
			<!-- End Home Information -->


			<!-- Work Information -->
			<div id="work_section" class="row">
            		<h1><strong>Work</strong> Information Section</h1>
                    <p>Please complete this section of pertaining to your work information for repayment of your approval. (Please Provide Up To 5 Years Of Work Information.)
                    </p>
                    <div class="row">

					<!-- Start Part One -->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post">
							<div class="banner-optin vertical">
								<h1><strong>CURRENT </strong> WORK INFORMATION</h1>
                                
<div class="form-group">
										<select name="applicant_employment_status" id="applicant_employment_status" class="form-control">
										    <option value="Full Time">Full Time</option>
										    <option value="Part Time">Part Time</option>
										    <option value="Self Employed">Self Employed</option>
										    <option value="Retired Income">Retired Income</option>
										    <option value="Social Security Income">Social Security Income</option>
										    <option value="Seasonal">Seasonal</option>
										    <option value="Temp Agency">Temp Agency</option>
                                        					</select>
									</div>
									<div class="form-group">	

                                        					<input id="applicant_employer1_name" name="applicant_employer1_name" type="text" class="form-control" value="" placeholder="Employer Name">
									</div>
									<div class="form-group">
                                        					<input id="applicant_employer1_phone" name="applicant_employer1_phone" type="text" class="form-control" value="" placeholder="Employer Phone">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="employer_street_address" placeholder="Employer Street Address">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="employer_city" placeholder="Employer City">
									</div>
									<div class="form-group">
                                                  
													<select class="form-control" id="applicant_employer1_state">
													  <option value="">Select State</option>
                                                      <option value="AL">AL</option>
													  <option value="AK">AK</option>
													  <option value="AZ">AZ</option>
													  <option value="AR">AR</option>
													  <option value="CA">CA</option>
													  <option value="CO">CO</option>
													  <option value="CT">CT</option>
													  <option value="DE">DE</option>
													  <option value="DC">DC</option>
													  <option value="FL">FL</option>
													  <option value="GA">GA</option>
													  <option value="HI">HI</option>
													  <option value="ID">ID</option>
													  <option value="IL">IL</option>
													  <option value="IN">IN</option>
													  <option value="IA">IA</option>
													  <option value="KS">KS</option>
													  <option value="KY">KY</option>
													  <option value="LA">LA</option>
													  <option value="ME">ME</option>
													  <option value="MD">MD</option>
													  <option value="MA">MA</option>
													  <option value="MI">MI</option>
													  <option value="MN">MN</option>
													  <option value="MS">MS</option>
													  <option value="MO">MO</option>
													  <option value="MT">MT</option>
													  <option value="NE">NE</option>
													  <option value="NV">NV</option>
													  <option value="NH">NH</option>
													  <option value="NJ">NJ</option>
													  <option value="NM">NM</option>
													  <option value="NY">NY</option>
													  <option value="NC">NC</option>
													  <option value="ND">ND</option>
													  <option value="OH">OH</option>
													  <option value="OK">OK</option>
													  <option value="OR">OR</option>
													  <option value="PA">PA</option>
													  <option value="RI">RI</option>
													  <option value="SC">SC</option>
													  <option value="SD">SD</option>
													  <option value="TN">TN</option>
													  <option value="TX">TX</option>
													  <option value="UT">UT</option>
													  <option value="VT">VT</option>
													  <option value="VA">VA</option>
													  <option value="WA">WA</option>
													  <option value="WV">WV</option>
													  <option value="WI">WI</option>
													  <option value="WY">WY</option>
										</select>
									</div>
									<div class="form-group">

                                      						<input id="applicant_employer1_zip" name="applicant_employer1_zip" type="text" class="form-control" value="" placeholder="Zip Code">

									</div>
									<div class="form-group">

                                      <input id="applicant_employer1_salary_bringhome" name="applicant_employer1_salary_bringhome" type="text" class="form-control" value="" placeholder="Monthly Income">
									</div>
									<div class="row">
										<div class="col-4 pull-left" style="width: 40%;">
										<select class="form-control" id="applicant_job_years">
                                                    	<option value="0 Years">0 Years</option>
                                                    	<option value="1 Year">1 Year</option>
                                                    	<option value="2 Years">2 Years</option>
                                                    	<option value="3 Years">3 Years</option>
                                                    	<option value="4 Years">4 Years</option>
                                                    	<option value="5 Years">5 Years</option>
                                                    	<option value="6 Years">6 Years</option>
                                                    	<option value="7 Years">7 Years</option>
                                                    	<option value="8 Years">8 Years</option>
                                                    	<option value="9 Years">9 Years</option>
                                                    	<option value="10 Years">10 Years</option>
                                                    </select>
									</div>
									<div class="pull-right" style="width: 50%;">
<select class="form-control" id="applicant_job_months">
                                                    	<option value="0 Months">0 Months</option>
                                                    	<option value="1 Month">1 Month</option>
                                                    	<option value="2 Months">2 Months</option>
                                                    	<option value="3 Months">3 Months</option>
                                                    	<option value="4 Months">4 Months</option>
                                                    	<option value="5 Months">5 Months</option>
                                                    	<option value="6 Months">6 Months</option>
                                                    	<option value="7 Months">7 Months</option>
                                                    	<option value="8 Months">8 Months</option>
                                                    	<option value="9 Months">9 Months</option>
                                                    	<option value="10 Months">10 Months</option>
                                                    	<option value="11 Months">11 Months</option>
                                                    </select>
									</div>
								
								</div>								
                                <div class="form-group">
									<button type="submit" class="btn btn-default btn-submit">Process Work Information</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
                    <!-- End Part One -->
                    <!-- Start Part Two -->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post">
							<div class="banner-optin vertical">
								<h1><strong>PREVIOUS </strong> WORK INFORMATION</h1>
                                
<div class="form-group">
										<select name="applicant_employment_status" id="applicant_employment_status" class="form-control">
										    <option value="Full Time">Full Time</option>
										    <option value="Part Time">Part Time</option>
										    <option value="Self Employed">Self Employed</option>
										    <option value="Retired Income">Retired Income</option>
										    <option value="Social Security Income">Social Security Income</option>
										    <option value="Seasonal">Seasonal</option>
										    <option value="Temp Agency">Temp Agency</option>
                                        					</select>
									</div>
									<div class="form-group">	

                                        					<input id="applicant_employer1_name" name="applicant_employer1_name" type="text" class="form-control" value="" placeholder="Employer Name">
									</div>
									<div class="form-group">
                                        					<input id="applicant_employer1_phone" name="applicant_employer1_phone" type="text" class="form-control" value="" placeholder="Employer Phone">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="applicant_employer1_addr" placeholder="Employer Street Address">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="applicant_employer1_city" placeholder="Employer City">
									</div>
									<div class="form-group">
                                                  
													<select class="form-control" id="applicant_employer1_state">
													  <option value="">Select State</option>
													  <option value="AL">AL</option>
													  <option value="AK">AK</option>
													  <option value="AZ">AZ</option>
													  <option value="AR">AR</option>
													  <option value="CA">CA</option>
													  <option value="CO">CO</option>
													  <option value="CT">CT</option>
													  <option value="DE">DE</option>
													  <option value="DC">DC</option>
													  <option value="FL">FL</option>
													  <option value="GA">GA</option>
													  <option value="HI">HI</option>
													  <option value="ID">ID</option>
													  <option value="IL">IL</option>
													  <option value="IN">IN</option>
													  <option value="IA">IA</option>
													  <option value="KS">KS</option>
													  <option value="KY">KY</option>
													  <option value="LA">LA</option>
													  <option value="ME">ME</option>
													  <option value="MD">MD</option>
													  <option value="MA">MA</option>
													  <option value="MI">MI</option>
													  <option value="MN">MN</option>
													  <option value="MS">MS</option>
													  <option value="MO">MO</option>
													  <option value="MT">MT</option>
													  <option value="NE">NE</option>
													  <option value="NV">NV</option>
													  <option value="NH">NH</option>
													  <option value="NJ">NJ</option>
													  <option value="NM">NM</option>
													  <option value="NY">NY</option>
													  <option value="NC">NC</option>
													  <option value="ND">ND</option>
													  <option value="OH">OH</option>
													  <option value="OK">OK</option>
													  <option value="OR">OR</option>
													  <option value="PA">PA</option>
													  <option value="RI">RI</option>
													  <option value="SC">SC</option>
													  <option value="SD">SD</option>
													  <option value="TN">TN</option>
													  <option value="TX">TX</option>
													  <option value="UT">UT</option>
													  <option value="VT">VT</option>
													  <option value="VA">VA</option>
													  <option value="WA">WA</option>
													  <option value="WV">WV</option>
													  <option value="WI">WI</option>
													  <option value="WY">WY</option>
										</select>
									</div>
									<div class="form-group">

                                      						<input id="applicant_employer1_zip" name="applicant_employer1_zip" type="text" class="form-control" value="" placeholder="Zip Code">

									</div>
									<div class="form-group">

                                      <input id="applicant_employer1_salary_bringhome" name="applicant_employer1_salary_bringhome" type="text" class="form-control" value="" placeholder="Monthly Income">
									</div>
									<div class="row">
										<div class="col-4 pull-left" style="width: 40%;">
										<select class="form-control" id="applicant_employer1_work_years">
                                                    	<option value="0 Years">0 Years</option>
                                                    	<option value="1 Year">1 Year</option>
                                                    	<option value="2 Years">2 Years</option>
                                                    	<option value="3 Years">3 Years</option>
                                                    	<option value="4 Years">4 Years</option>
                                                    	<option value="5 Years">5 Years</option>
                                                    	<option value="6 Years">6 Years</option>
                                                    	<option value="7 Years">7 Years</option>
                                                    	<option value="8 Years">8 Years</option>
                                                    	<option value="9 Years">9 Years</option>
                                                    	<option value="10 Years">10 Years</option>
                                                    </select>
									</div>
									<div class="pull-right" style="width: 50%;">
													<select class="form-control" id="applicant_employer1_work_months">
                                                    	<option value="0 Months">0 Months</option>
                                                    	<option value="1 Month">1 Month</option>
                                                    	<option value="2 Months">2 Months</option>
                                                    	<option value="3 Months">3 Months</option>
                                                    	<option value="4 Months">4 Months</option>
                                                    	<option value="5 Months">5 Months</option>
                                                    	<option value="6 Months">6 Months</option>
                                                    	<option value="7 Months">7 Months</option>
                                                    	<option value="8 Months">8 Months</option>
                                                    	<option value="9 Months">9 Months</option>
                                                    	<option value="10 Months">10 Months</option>
                                                    	<option value="11 Months">11 Months</option>
                                                    </select>
									</div>
								
								</div>								
                                <div class="form-group">
									<button type="button" class="btn btn-default btn-submit">Process Current Work</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
                    <!-- End Part Two -->
					<!-- Start Part Three-->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form>
							<div class="banner-optin vertical">
								<h1><strong>Strength</strong> Of Your Work Information</h1>
								<div class="form-group">
									<input name="applicant_employer1_supervisors_name" id="applicant_employer1_supervisors_name" type="text" class="form-control" required="" placeholder="Supervisors Name">
								</div>
								<div class="form-group">
									<input name="applicant_employer1_supervisors_phone" id="applicant_employer1_supervisors_phone" type="text" class="form-control" required="" placeholder="Supervisors Phone Number">
								</div>
								<div class="form-group">
									<select id="applicant_employer1_payday_freq" class="form-control">
                                    <option value="">Select One</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Biweekly">Biweekly</option>
                                                <option value="Semimonthly">Semimonthly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Yearly">Yearly</option>
                                              </select>
                      			</div>
								<div class="form-group">
									<button type="button" class="btn btn-default btn-submit">Process Previous Work</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
					<!-- End Part Three -->
					</div>
			</div>
			<!-- End Work Information -->

			<!-- Previous Work Information -->
			<div id="prev_work_section" class="row">
            		<h1><strong>Regular</strong> Information Section</h1>
                    <p>Please complete this section of pertaining where the the vehicle will be located and billing information for repayment of your approval.
                    </p>
                    <div class="row">

            
					<!-- Start Part One -->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1>Other <strong>Income</strong> trial</h1>
                                <small>Alimony, child support or separate maintenance income need not be disclosed if you do not wish to have it considered as a basis for approval of this obligation.</small>
								<div class="form-group">
									<input name="applicant_other_income_amount" id="applicant_other_income_amount" type="text" class="form-control" required="" placeholder="Other Income Amount">
								</div>
								<div class="form-group">
									<input name="applicant_other_income_source" id="applicant_other_income_source" type="text" class="form-control" required="" placeholder="Other Income Source">
								</div>
								<div class="form-group">
									<select id="applicant_other_income_when_rcvd" class="form-control">
                                    	<option value="Daily">Daily</option>
                                    	<option value="Weekly">Weekly</option>
                                    	<option value="Bi-Weekly">Bi-Weekly</option>
                                    	<option value="Monthly">Monthly</option>
                                    	<option value="Quarterly">Quarterly</option>
                                    	<option value="Annually">Annually</option>
                                    </select>
								</div>
								<div class="form-group">
                                <label>Can You Provide Documentation On Other Income?</label>
									<select id="applicant_other_income_proof" class="form-control">
                                    	<option value="No">No</option>
                                    	<option value="Yes">Yes</option>
                                    </select>
                                    <small>ie. Tax Return, W2, Check Stub, Bank Statement (3-5 Months)</small>
								</div>

								<div class="form-group">
									<button type="button" class="btn btn-default btn-submit">Process Other Income</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
                    <!-- End Part One -->
                    <!-- Start Part Two -->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1>Start your <strong>FREE</strong> trial</h1>
								<div class="form-group">
									<input name="banner-name" id="banner-name" type="text" class="form-control" required="" placeholder="Your Name">
								</div>
								<div class="form-group">
									<input name="banner-email" id="banner-email" type="text" class="form-control" required="" placeholder="Your e-mail">
								</div>
								<div class="form-group">
									<input name="banner-phone" id="banner-phone" type="text" class="form-control" placeholder="Your Phone Number">
								</div>
								<div class="form-group">
									<button type="button" class="btn btn-default btn-submit">Get Your Free Trial</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
                    <!-- End Part Two -->
					<!-- Start Part Three-->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1>Finalize Your <strong>Approval</strong></h1>
								<div class="form-group">
									<button id="finalize_myapproval" type="button" class="btn btn-default btn-submit">Finalize</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
					<!-- End Part Three -->
					</div>
			</div>
			<!-- End Previous Work Information -->
</div>

<div id="saved_vehicle_section" style="display:none;">

			<!-- Vehicle Information -->
			<div class="row">
					<!-- Start Header Text -->
					<div class="col-md-8 col-sm-7 header-text">
						<h1><strong>Increase</strong> Conversion Rates</h1>
						<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy
						</p>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- End Header Text -->
					<!-- Start Banner Optin Form-->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1>Start your <strong>FREE</strong> trial</h1>
								<div class="form-group">
									<input name="banner-name" id="banner-name" type="text" class="form-control" required="" placeholder="Your Name">
								</div>
								<div class="form-group">
									<input name="banner-email" id="banner-email" type="text" class="form-control" required="" placeholder="Your e-mail">
								</div>
								<div class="form-group">

									<input name="banner-phone" id="banner-phone" type="text" class="form-control" placeholder="Your Phone Number">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default btn-submit">Get Your Free Trial</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
					<!-- End Banner Optin Form -->
				</div>
			<!-- End Vehicle Information -->


			<div class="row">
					<!-- Start Header Text -->
					<div class="col-md-8 col-sm-7 header-text">
						<h1><strong>Increase</strong> Conversion Rates</h1>
                    <p>Please complete this section of pertaining where the the vehicle will be located and billing information for repayment of your approval.
						</p>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- End Header Text -->
					<!-- Start Banner Optin Form-->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1>Start your <strong>FREE</strong> trial</h1>
								<div class="form-group">
									<input name="banner-name" id="banner-name" type="text" class="form-control" required="" placeholder="Your Name">
								</div>
								<div class="form-group">
									<input name="banner-email" id="banner-email" type="text" class="form-control" required="" placeholder="Your e-mail">
								</div>
								<div class="form-group">
									<input name="banner-phone" id="banner-phone" type="text" class="form-control" placeholder="Your Phone Number">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default btn-submit">Get Your Free Trial</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
					<!-- End Banner Optin Form -->
				</div>



			<div class="row">
					<!-- Start Header Text -->
					<div class="col-md-8 col-sm-7 header-text">
						<h1><strong>Increase</strong> Conversion Rates</h1>
						<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy
						</p>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- End Header Text -->
					<!-- Start Banner Optin Form-->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1>Start your <strong>FREE</strong> trial</h1>
								<div class="form-group">
									<input name="banner-name" id="banner-name" type="text" class="form-control" required="" placeholder="Your Name">
								</div>
								<div class="form-group">
									<input name="banner-email" id="banner-email" type="text" class="form-control" required="" placeholder="Your e-mail">
								</div>
								<div class="form-group">
									<input name="banner-phone" id="banner-phone" type="text" class="form-control" placeholder="Your Phone Number">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default btn-submit">Get Your Free Trial</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
					<!-- End Banner Optin Form -->
				</div>



			<div class="row">
					<!-- Start Header Text -->
					<div class="col-md-8 col-sm-7 header-text">
						<h1><strong>Increase</strong> Conversion Rates</h1>
						<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy
						</p>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- End Header Text -->
					<!-- Start Banner Optin Form-->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1>Start your <strong>FREE</strong> trial</h1>
								<div class="form-group">
									<input name="banner-name" id="banner-name" type="text" class="form-control" required="" placeholder="Your Name">
								</div>
								<div class="form-group">
									<input name="banner-email" id="banner-email" type="text" class="form-control" required="" placeholder="Your e-mail">
								</div>
								<div class="form-group">
									<input name="banner-phone" id="banner-phone" type="text" class="form-control" placeholder="Your Phone Number">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default btn-submit">Get Your Free Trial</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
					<!-- End Banner Optin Form -->
				</div>



			<div class="row">
					<!-- Start Header Text -->
					<div class="col-md-8 col-sm-7 header-text">
						<h1><strong>Returning Visitors</strong> Login</h1>
						<p>If you have a pre-approval, login to check your status and if futher instructions are needed.
						</p>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Budget Information</li>
									<li>Pre Approval Amount</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Full Support</li>
									<li>Fully responsive &amp; adaptive</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- End Header Text -->
					<!-- Start Banner Optin Form-->
					<div class="col-lg-4 col-md-4 col-sm-5">
						<form id="login_user" method="post" action="loginuser.php">
							<div class="banner-optin vertical">
								<h1>Returning Users <strong>LOGIN</strong></h1>
								<div class="form-group">
									<input name="banner-email" id="banner-email" type="text" class="form-control" required="" placeholder="Your e-mail">
								</div>
								<div class="form-group">

									<input name="banner-phone" id="banner-phone" type="text" class="form-control" placeholder="Your Phone Number">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default btn-submit">Get Your Free Trial</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-process"></div><!-- Displays status when submitting form -->
								</div>
							</div>
						</form>
					</div>
					<!-- End Banner Optin Form -->
				</div>
                
</div>                