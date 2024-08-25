<?php require_once("db_wfh_approval_loggedin.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<title>Back Office Application View</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="description" content="">
	<meta name="keywords" content="admin, bootstrap,admin template, bootstrap admin, simple, awesome">
	<meta name="author" content="">

<?php include("_head.php"); ?>
	</head>
	
	
	
	<!-- BODY -->
	<body class="tooltips">
	
	<!-- BEGIN PAGE -->
	<div class="container">
			
	
        <?php include("_sidebar.user.approval.php"); ?>




		
		<!-- BEGIN CONTENT -->
        <div class="right content-page">

		<?php include("_top_navigation.php"); ?>			
			
			
			<!-- ============================================================== -->
			<!-- START YOUR CONTENT HERE -->
			<!-- ============================================================== -->
            <div class="body content rows scroll-y">
				
				<!-- Page header -->
				<div class="page-heading animated fadeInDownBig">
					<h1>Application View <small>This your application view</small></h1>
				</div>
				<!-- End page header -->
				
				<!-- Begin Invoice -->
				<div class="box-info">
					<h2><strong>CREDIT APPLICATION <span class="text-primary">#<?php echo $wfhuser_tokenid; ?></span></strong></h2>
					<div class="icon-print"><a data-toggle="tooltip" title="Print" href="#fakelink"><i class="fa fa-print"></i></a></div>
					
					<div class="row">
						<div class="col-sm-6">
							<div class="company-column">
							<h4><strong><?php echo $wfhuser_approval_fullname_txt; ?></strong></h4>
								<address>
								  <strong>Pending Approval : <?php echo $cust_creditapr_txt; ?></strong> 
                                  <a id="pending_status_results"><i class="fa fa-question-circle"></i> Status</a><br>
                                  <br />
								  <strong>Total Amount:</strong> <?php echo formatMoney($cust_totalpayments); ?><br>
								  <strong>Down Payment:</strong> <?php echo formatMoney($cust_downpayment); ?><br>
								  <strong>Monthly Payment:</strong> <?php echo formatMoney($cust_desiredpymt); ?><br>
								  <strong>Term Length:</strong> <?php echo $cust_desiredtermos; ?><br>
								  <strong>Max Selling Price:</strong> <?php echo formatMoney($bigSellingPrice); ?><br>
								  <strong>Monthly Income:</strong> <?php echo formatMoney($applicant_employer1_salary_bringhome); ?><br>
								  <strong>Other Income:</strong> <?php echo formatMoney($applicant_other_income_amount); ?><br>
								  <strong>Get Paid:</strong> <?php echo $applicant_employer1_payday_freq; ?><br>
								  <strong>State Approval:</strong> <?php echo $applicant_present_addr_state; ?><br>
								  <strong>Currently Paying Another Car Note:</strong> <?php echo $cust_car_loan; ?><br>
                                  
								  <abbr title="Phone">P:</abbr> <?php echo format_phone($applicant_cell_phone); ?>
								</address>

								<address>
								  <strong>Email:</strong><br>
								  <a href="mailto:#"><?php echo $wfhuser_email_address; ?></a>
								</address>
							</div>
							
						</div>
						<div class="col-sm-6">
							
							<div class="company-column">
							<h4><strong>IDENTIFY VAULT</strong></h4>
                            
                            <div class="col-md-12">
                            <h2>Pay To The Order Of: <?php echo $wfhuser_approval_fullname_txt; ?></h2>
                            <hr />
                            <u>For: <?php echo $vid; ?></u>
                            
                            </div>
<button type="button" class="btn btn-primary btn-lg btn-block">PICTURE/COPY DRIVER LICENSES</button>
<button type="button" class="btn btn-success btn-lg btn-block">PICTURE/COPY CHECK STUB</button>
<button type="button" class="btn btn-info btn-lg btn-block">PICTURE OF TRADE 1</button>
<button type="button" class="btn btn-info btn-lg btn-block">PICTURE OF TRADE 2</button>
                            
                            
							</div>
                            
                            
                            
						</div>
					</div>




					<!-- Bill to -->
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong>Primary Address</strong> View:</h4>
									<address>
									  <strong><?php echo $wfhuser_approval_fullname_txt; ?></strong><br>
                            		  <strong>Address 1: </strong>
									  <?php echo $row_userDets['applicant_present_address1']; ?><br>
                            		  <strong>Address 2: </strong>
									  <?php echo $row_userDets['applicant_present_address2']; ?><br>								
                            		  <strong>City, State Zip: </strong>
                                      <?php echo $row_userDets['applicant_present_addr_city']; ?>,
                                      <?php echo $row_userDets['applicant_present_addr_state']; ?>
                                      <?php echo $row_userDets['applicant_present_addr_zip']; ?><br>
                            <abbr title="County"><strong>County:</strong> </abbr> <?php echo $row_userDets['applicant_present_addr_county']; ?>

                                      
                                      <abbr title="Phone">P:</abbr> <?php echo $row_userDets['applicant_cell_phone']; ?>
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#"><?php echo $row_userDets['wfhuser_email_address']; ?></a>
									</address>
							</div>
							<div class="col-sm-6">
								<h4><strong>Previous Address</strong> View:</h4>
									<address>
									  <strong><?php echo $wfhuser_approval_fullname_txt; ?></strong><br>
                            		  <strong>Address 1: </strong>
									  <?php echo $row_userDets['applicant_previous1_addr1']; ?><br>
                            		  <strong>Address 2: </strong>
									  <?php echo $row_userDets['applicant_previous1_addr2']; ?><br>								
                            		  <strong>City, State Zip: </strong>
                                      <?php echo $row_userDets['applicant_previous1_addr_city']; ?>,
                                      <?php echo $row_userDets['applicant_previous1_addr_state']; ?>
                                      <?php echo $row_userDets['applicant_previous1_addr_zip']; ?><br>
                            <abbr title="County"><strong>County:</strong> </abbr> <?php echo $row_userDets['applicant_previous1_addr_county']; ?>

                                      
                                      <abbr title="Phone">Move In Date:</abbr> <?php echo $row_userDets['applicant_previous1_moveindate']; ?>
									</address>

									<address>
									  <strong>Years</strong><a><?php echo $row_userDets['applicant_previous2_live_years']; ?></a> | 
									  <strong>Months</strong>
									  <a><?php echo $row_userDets['applicant_previous2_live_months']; ?></a><br />
									</address>
							</div>
						</div>
					</div>
					<!-- End Bill to -->


				<div class="row">
					<div class="col-sm-6">
						<!-- Basic form -->
						<div class="box-info">
						<h2><strong>Present Address</strong> Edit:</h2>
							<!-- Additional button -->
							<!-- Basic form body -->
							<div id="basic-form" class="collapse in">
								<form role="form">
								  <div class="form-group">
									<label for="applicant_present_address1">Present Street address 1</label>
									<input type="text" class="form-control" id="applicant_present_address1" placeholder="Street Address">
								  </div>
								  <div class="form-group">
									<label for="applicant_present_address2">Present Street address 2</label>
									<input type="text" class="form-control" id="applicant_present_address2" placeholder="Street Address Continue">
								  </div>
								  <div class="form-group">
									<label for="applicant_present_addr_city">Present City</label>
									<input type="text" class="form-control" id="applicant_present_addr_city" placeholder="City">
								  </div>
								  <div class="form-group">
									<label for="applicant_present_addr_state">Present State</label>
									<select class="form-control" id="applicant_present_addr_state">
                                    	<option value="">Select State</option>
                                    </select>
								  </div>
								  <div class="form-group">
									<label for="applicant_present_addr_zip">Present Zip</label>
									<input type="text" class="form-control" id="applicant_present_addr_zip" placeholder="Present Zip Code" value="">
								  </div>

								  <div class="form-group">
									<label for="applicant_present_addr_county">Present County</label>
									<input type="text" class="form-control" id="applicant_present_addr_county" placeholder="County" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_present_moveindate">Move In Date At Present Address?</label>
									<input type="text" class="form-control" id="applicant_present_moveindate" placeholder="Move In Date" value="">

								  </div>
								  <div class="form-group">
									<label for="applicant_addr_years">Years You Lived Here?</label>
									<select class="form-control" id="applicant_addr_years">
                                    	<option value="">Select Years</option>
                                    </select>
								  </div>

								  <div class="form-group">
									<label for="applicant_addr_months">Months You Lived Here?</label>
									<select class="form-control" id="applicant_addr_months">
                                    	<option value="">Select Months</option>
                                    </select>
								  </div>



								  <div class="form-group">
<label for="applicant_addr_landlord_mortg">Landlord Name/Mortgage Co. Name</label>
<input type="text" class="form-control" id="applicant_addr_landlord_mortg" placeholder="Landlord Name/Mortgage Co" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_addr_landlord_address">Landlord Name/Mortgage Co. Address</label>
<input type="text" class="form-control" id="applicant_addr_landlord_address" placeholder="Landlord Name/Mortgage Co Address" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_addr_landlord_city">Landlord Name/Mortgage Co. City</label>
<input type="text" class="form-control" id="applicant_addr_landlord_city" placeholder="Landlord Name/Mortgage Co" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_addr_landlord_state">Landlord Name/Mortgage Co. State</label>
<input type="text" class="form-control" id="applicant_addr_landlord_state" placeholder="Landlord Name/Mortgage Co. State" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_addr_landlord_phone">Landlord Name/Mortgage Co. Phone</label>
<input type="text" class="form-control" id="applicant_addr_landlord_phone" placeholder="Phone Number"value="">
								  </div>
								  <div class="form-group">
<label for="applicant_apart_or_house">House, Apartment, Mobile Home, Or Other</label>
<select class="form-control" id="applicant_apart_or_house">
	<option value="">Select Apartment Or House</option>
    <option value="Apartment">Apartment</option>
    <option value="House">House</option>
    <option value="Mobile Home">Mobile Home</option>
    <option value="Other">Other</option>
</select>
								  </div>
								  <div class="form-group">
<label for="applicant_buy_own_rent_other">Buy Own Rent or Other?</label>
<select class="form-control" id="applicant_apart_or_house">
	<option value="">Select Apartment Or House</option>
    <option value="Rent">Rent</option>
    <option value="Buying">Buying</option>
    <option value="Own Out Right">Own Out Right</option>
    <option value="Living with realatives">Living with realatives</option>
    <option value="Other">Other</option>
</select>
								  </div>
								  <div class="form-group">
<label for="applicant_house_payment">Your House Payment</label>
<input type="text" class="form-control" id="applicant_house_payment" placeholder="Payment Amount" value="">
								  </div>
								  <div class="form-group">
<label for="user_comments_app_notes">Any Special Comments About Previous Address</label>
<input type="text" class="form-control" id="user_comments_app_notes" value="">
								  </div>



								  <div class="form-group">
								  <button type="button" class="btn btn-default">Submit</button>
								  </div>


								</form>
							</div><!-- End div #basic-form -->
						</div><!-- End div .box-info -->
					</div><!-- End div .col-sm-6 -->
					
					<div class="col-sm-6">
						<!-- Horizontal form -->
						<div class="box-info">
						<h2><strong>Previous</strong> Address:</h2>
							<!-- Additional button -->
							<!-- Horizontal form body -->
							<div id="horizontal-form" class="collapse in">
								<form role="form">
								  <div class="form-group">
									<label for="applicant_previous1_addr1">Previous Street address 1</label>
									<input type="text" class="form-control" id="applicant_previous1_addr1" placeholder="Street Address" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_previous1_addr2">Previous Street address 2</label>
									<input type="text" class="form-control" id="applicant_previous1_addr2" placeholder="Street Address Continue" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_previous1_addr_city">Previous City</label>
									<input type="text" class="form-control" id="applicant_previous1_addr_city" placeholder="City" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_previous1_addr_state">Previous State</label>
									<select class="form-control" id="applicant_previous1_addr_state">
                                    	<option value="">Select State</option>
                                    </select>
								  </div>
								  <div class="form-group">
									<label for="applicant_previous1_addr_zip">Previous Zip Code</label>
									<input type="text" class="form-control" id="applicant_previous1_addr_zip" placeholder="Previous Zip Code" value="">
								  </div>

								  <div class="form-group">
									<label for="applicant_previous1_addr_county">Previous County</label>
									<input type="text" class="form-control" id="applicant_previous1_addr_county" placeholder="County" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_previous1_moveindate">Move In Date At Present Address?</label>
									<input type="text" class="form-control" id="applicant_previous1_moveindate" placeholder="Move In Date" value="">

								  </div>
								  <div class="form-group">
									<label for="applicant_previous1_live_years">Years You Lived Here Previously?</label>
									<select class="form-control" id="applicant_previous1_live_years">
                                    	<option value="">Select Years</option>
                                    </select>
								  </div>

								  <div class="form-group">
									<label for="applicant_previous1_live_months">Months You Lived Here Previously?</label>
									<select class="form-control" id="applicant_previous1_live_months">
                                    	<option value="">Select Months</option>
                                    </select>
								  </div>



								  <div class="form-group">
<label for="applicant_previous1_landlord_name">Landlord Name/Mortgage Co</label>
<input type="text" class="form-control" id="applicant_previous1_landlord_name" placeholder="Landlord Name/Mortgage Co" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_previous1_landlord_phone">Landlord Name/Mortgage Co Phone</label>
<input type="text" class="form-control" id="applicant_previous1_landlord_name" placeholder="Phone Number" data-mask="(999) 999-999" value="">
								  </div>





								  <button type="button" class="btn btn-default">Save</button>
								</form>
							</div><!-- End div #horizontal-from -->
						</div><!-- End div .box-info -->
					</div><!-- End div .col-sm-6 -->
				</div>


					
					<!-- Bill to -->
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong>Employer</strong> Work:</h4>
									<address>
									  <strong><?php echo $row_userDets['applicant_employer1_name']; ?></strong><br>
                            		  <strong>Address 1: </strong>
									  <?php echo $row_userDets['applicant_employer1_addr']; ?><br>
                            		  <strong>Address 2: </strong>
									  <?php echo $row_userDets['applicant_present_address1']; ?><br>								
                            		  <strong>City, State Zip: </strong>
                                      <?php echo $row_userDets['applicant_employer1_city']; ?>,
                                      <?php echo $row_userDets['applicant_employer1_state']; ?>
                                      <?php echo $row_userDets['applicant_employer1_zip']; ?><br>
                                      
                                      <abbr title="Phone"><strong>Main Phone:</strong></abbr> <?php echo $row_userDets['applicant_employer1_phone']; ?> <?php if($row_userDets['applicant_employer1_phone_ext']){  echo ' Ext. '.$row_userDets['applicant_employer1_phone_ext']; } ?><br />
                                      <strong>Supervisors Name:</strong> <?php echo $row_userDets['applicant_employer1_supervisors_name']; ?><br />
                                      <strong>Supervisors phone:</strong> <?php echo $row_userDets['applicant_employer1_supervisors_name']; ?><br />
									</address>

									<address>
                                      <strong>Position: </strong><?php echo $row_userDets['applicant_employer1_position']; ?> <br />
                                      <strong>Department: </strong><?php echo $row_userDets['applicant_employer1_department']; ?> <br />
									  <strong>Work Years:</strong>
									  <a><?php echo $row_userDets['applicant_employer1_work_years']; ?></a> |
									  <strong>Work Months:</strong>
									  <a><?php echo $row_userDets['applicant_employer1_work_months']; ?></a><br />
									</address>
                                    
                                    
                                    
							</div>
							<div class="col-sm-6">
								<h4><strong>Previous Employer</strong> Work:</h4>
									<address>
									  <strong><?php echo $row_userDets['applicant_employer2_name']; ?></strong><br>
                            		  <strong>Address 1: </strong>
									  <?php echo $row_userDets['applicant_employer2_addr']; ?><br>
                            		  <strong>Address 2: </strong>
									  <?php echo $row_userDets['applicant_present_address1']; ?><br>								
                            		  <strong>City, State Zip: </strong>
                                      <?php echo $row_userDets['applicant_employer2_city']; ?>,
                                      <?php echo $row_userDets['applicant_employer2_state']; ?>
                                      <?php echo $row_userDets['applicant_employer2_zip']; ?><br>
                                      <abbr title="Phone"><strong>Main Phone:</strong></abbr> <?php echo $row_userDets['applicant_employer2_phone']; ?> <?php if($row_userDets['applicant_employer2_phone_ext']){  echo ' Ext. '.$row_userDets['applicant_employer2_phone_ext']; } ?><br />
                                      <strong>Supervisors Name:</strong> <?php echo $row_userDets['applicant_employer2_supervisors_name']; ?><br />
                                      <strong>Supervisors phone:</strong> <?php echo $row_userDets['applicant_employer2_supervisors_name']; ?><br />
									</address>

									<address>
                                      <strong>Position: </strong><?php echo $row_userDets['applicant_employer2_position']; ?> <br />
                                      <strong>Department: </strong><?php echo $row_userDets['applicant_employer2_department']; ?> <br />
									  <strong>Work Years:</strong>
									  <a><?php echo $row_userDets['applicant_employer2_work_years']; ?></a> |
									  <strong>Work Months:</strong>
									  <a><?php echo $row_userDets['applicant_employer2_work_months']; ?></a><br />
									</address>
							</div>
						</div>
					</div>
					<!-- End Bill to -->


				<div class="row">
					<div class="col-sm-6">
						<!-- Basic form -->
						<div class="box-info">
						<h2><strong>Employwer/Work</strong> Edit:</h2>
							<!-- Additional button -->
							<!-- Basic form body -->
							<div id="basic-form" class="collapse in">
								<form role="form">
								  <div class="form-group">
									<label for="applicant_employer1_name">Present Employer or Work Information Edit</label>
									<input type="text" class="form-control" id="applicant_employer1_name" placeholder="Employer Name">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer1_addr">Employer Street address 1</label>
									<input type="text" class="form-control" id="applicant_employer1_addr" placeholder="Street Address Continue">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer1_city">Employer City</label>
									<input type="text" class="form-control" id="applicant_employer1_city" placeholder="City">
								  </div>
								  <div class="form-group">
									<label for="applicant_present_addr_state">Employer State</label>
									<select class="form-control" id="applicant_present_addr_state">
                                    	<option value="">Select State</option>
                                    </select>
								  </div>
								  <div class="form-group">
									<label for="applicant_present_addr_zip">Employer Zip</label>
									<input type="text" class="form-control" id="applicant_present_addr_zip" placeholder="Present Zip Code" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_present_addr_county">Employer Phone</label>
									<input type="text" class="form-control" id="applicant_employer1_phone" placeholder="Employer Phone" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer1_phone_ext">Employer Phone Ext</label>
									<input type="text" class="form-control" id="applicant_employer1_phone_ext" placeholder="County" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer1_dateofhire">Date of Hire?</label>
									<input type="text" class="form-control" id="applicant_employer1_dateofhire" placeholder="Move In Date" value="">

								  </div>
								  <div class="form-group">
									<label for="applicant_employer1_work_years">Years You Lived Here Previously?</label>
									<select class="form-control" id="applicant_employer1_work_years">
                                    	<option value="">Select Years</option>
                                    </select>
								  </div>

								  <div class="form-group">
									<label for="applicant_employer1_work_months">Months You Lived Here Previously?</label>
									<select class="form-control" id="applicant_employer1_work_months">
                                    	<option value="">Select Months</option>
                                    </select>
								  </div>



								  <div class="form-group">
<label for="applicant_employer1_position">Position/JobTitle</label>
<input type="text" class="form-control" id="applicant_employer1_position" placeholder="Position/JobTitle" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer1_department">Department</label>
<input type="text" class="form-control" id="applicant_employer1_department" placeholder="Phone Number" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer1_supervisors_name">Supervisors Name</label>
<input type="text" class="form-control" id="applicant_employer1_supervisors_name" placeholder="Supervisors Name" value="">
								  </div>

								  <div class="form-group">
<label for="applicant_employer1_supervisors_phone">Supervisors Phone Number</label>
<input type="text" data-mask="(999) 999-9999" class="form-control" id="applicant_employer1_supervisors_phone" placeholder="Supervisors Phone Number" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer1_supervisors_phone_ext">Supervisors Phone Extension</label>
<input type="text" data-mask="(999) 999-9999" class="form-control" id="applicant_employer1_supervisors_phone_ext" placeholder="Supervisors Phone Number Ext." value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer1_hours_shift">Which Shift Do You Work?</label>
<input type="text" class="form-control" id="applicant_employer1_hours_shift" placeholder="Which Shift Do You Work?" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer1_salary_bringhome">How Much You Bring Home A Pay Period?</label>
<input type="text" class="form-control" id="applicant_employer1_salary_bringhome" placeholder="NetIncome How much you get bring home?" value="">
								  </div>

								  <div class="form-group">
<label for="applicant_employer1_payday_freq">How Often Did You Get Paid?</label>
<select class="form-control" id="applicant_employer1_payday_freq">
	<option value="">Select Option</option>
    
</select>
								  </div>

								  <div class="form-group">
<label for="applicant_employer_form_of_pymt">Form Of Paycheck</label>
<select class="form-control" id="applicant_employer_form_of_pymt">
	<option value="">Select Option</option>
</select>
								  </div>

								  <button type="button" class="btn btn-default">Submit</button>
								</form>
							</div><!-- End div #basic-form -->
						</div><!-- End div .box-info -->
					</div><!-- End div .col-sm-6 -->
					
					<div class="col-sm-6">
						<!-- Horizontal form -->
						<div class="box-info">
						<h2><strong>Previous Employer</strong> Edit:</h2>
							<!-- Additional button -->
							<!-- Horizontal form body -->
							<div id="horizontal-form" class="collapse in">
								<form role="form">
<div class="form-group">
									<label for="applicant_employer2_name">Previous Employer or Work Information Edit</label>
									<input type="text" class="form-control" id="applicant_employer2_name" placeholder="Employer Name">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer2_addr">Employer Street address 1</label>
									<input type="text" class="form-control" id="applicant_employer2_addr" placeholder="Street Address Continue">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer2_city">Employer City</label>
									<input type="text" class="form-control" id="applicant_employer2_city" placeholder="City">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer2_state">Employer State</label>
									<select class="form-control" id="applicant_employer2_state">
                                    	<option value="">Select State</option>
                                    </select>
								  </div>
								  <div class="form-group">
									<label for="applicant_employer2_zip">Employer Zip</label>
									<input type="text" class="form-control" id="applicant_employer2_zip" placeholder="Present Zip Code" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer2_phone">Employer Phone</label>
									<input type="text" class="form-control" id="applicant_employer2_phone" placeholder="Employer Phone" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer2_phone_ext">Employer Phone Ext</label>
									<input type="text" class="form-control" id="applicant_employer2_phone_ext" placeholder="County" value="">
								  </div>
								  <div class="form-group">
									<label for="applicant_employer2_dateofhire">Date of Hire?</label>
									<input type="text" class="form-control" id="applicant_employer2_dateofhire" placeholder="Move In Date" value="">

								  </div>
								  <div class="form-group">
									<label for="applicant_employer2_work_years">Years You Lived Here Previously?</label>
									<select class="form-control" id="applicant_employer2_work_years">
                                    	<option value="">Select Years</option>
                                    </select>
								  </div>

								  <div class="form-group">
									<label for="applicant_employer2_work_months">Months You Lived Here Previously?</label>
									<select class="form-control" id="applicant_employer2_work_months">
                                    	<option value="">Select Months</option>
                                    </select>
								  </div>



								  <div class="form-group">
<label for="applicant_employer2_position">Position/JobTitle</label>
<input type="text" class="form-control" id="applicant_employer2_position" placeholder="Position/JobTitle" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer2_department">Department</label>
<input type="text" class="form-control" id="applicant_employer2_department" placeholder="Phone Number" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer2_supervisors_name">Supervisors Name</label>
<input type="text" class="form-control" id="applicant_employer2_supervisors_name" placeholder="Supervisors Name" value="">
								  </div>

								  <div class="form-group">
<label for="applicant_employer2_supervisors_phone">Supervisors Phone Number</label>
<input type="text" data-mask="(999) 999-9999" class="form-control" id="applicant_employer2_supervisors_phone" placeholder="Supervisors Phone Number" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer2_supervisors_phone_ext">Supervisors Phone Extension</label>
<input type="text" data-mask="(999) 999-9999" class="form-control" id="applicant_employer2_supervisors_phone_ext" placeholder="Supervisors Phone Number Ext." value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer2_hours_shift">Which Shift Do You Work?</label>
<input type="text" class="form-control" id="applicant_employer2_hours_shift" placeholder="Which Shift Do You Work?" value="">
								  </div>
								  <div class="form-group">
<label for="applicant_employer2_salary_bringhome">How Much You Bring Home A Pay Period?</label>
<input type="text" class="form-control" id="applicant_employer2_salary_bringhome" placeholder="NetIncome How much you get bring home?" value="">
								  </div>

								  <div class="form-group">
<label for="applicant_employer2_payday_freq">How Often Do You Get Paid?</label>
<select class="form-control" id="applicant_employer2_payday_freq">
	<option value="">Select Option</option>
    
</select>
								  </div>

								  <div class="form-group">
<label for="applicant_employer_form_of_pymt">Form Of Paycheck</label>
<input type="text" class="form-control" id="applicant_employer_form_of_pymt" placeholder="Form Of Payment" value="">
								  </div>

								  <button type="button" class="btn btn-default">Save</button>
								</form>
							</div><!-- End div #horizontal-from -->
						</div><!-- End div .box-info -->
					</div><!-- End div .col-sm-6 -->
				</div>



					<!-- Bill to -->
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong>Budget</strong> Information:</h4>
									<address>
									  <strong>John Doe</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
							<div class="col-sm-6">
								<h4><strong>Something</strong> Information:</h4>
									<address>
									  <strong>Annisa Rusmanovski</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
						</div>
					</div>
					<!-- End Bill to -->
					
					<!-- Bill to -->
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong>Reference</strong> #1:</h4>
									<address>
									  <strong>John Doe</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
							<div class="col-sm-6">
								<h4><strong>Reference</strong> #2:</h4>
									<address>
									  <strong>Annisa Rusmanovski</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
						</div>
					</div>
					<!-- End Bill to -->
					
					<!-- Bill to -->
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong>Reference</strong> #3:</h4>
									<address>
									  <strong>John Doe</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
							<div class="col-sm-6">
								<h4><strong>Ship</strong> to:</h4>
									<address>
									  <strong>Annisa Rusmanovski</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
						</div>
					</div>
					<!-- End Bill to -->
					
					<!-- Bill to -->
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong>Reference</strong> #5:</h4>
									<address>
									  <strong>John Doe</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
							<div class="col-sm-6">
								<h4><strong>Reference</strong> #7:</h4>
									<address>
									  <strong>Annisa Rusmanovski</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
						</div>
					</div>
					<!-- End Bill to -->
					
					<!-- Bill to -->
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong>Reference</strong> #9:</h4>
									<address>
									  <strong>John Doe</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
							<div class="col-sm-6">
								<h4><strong>Reference</strong> #10:</h4>
									<address>
									  <strong>Annisa Rusmanovski</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
						</div>
					</div>
					<!-- End Bill to -->
					
					<!-- Bill to -->
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong>Other</strong> Income:</h4>
									<address>
									  <strong>John Doe</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
							<div class="col-sm-6">
								<h4><strong>Other</strong> Income2:</h4>
									<address>
									  <strong>Annisa Rusmanovski</strong><br>
									  795 Folsom Ave, Suite 600<br>
									  San Francisco, CA 94107<br>
									  <abbr title="Phone">P:</abbr> (123) 456-7890
									</address>

									<address>
									  <strong>Email</strong><br>
									  <a href="mailto:#">first.last@example.com</a>
									</address>
							</div>
						</div>
					</div>
					<!-- End Bill to -->
					


					
					<!-- Invoice information -->
					<p><strong>Build My Income From My Paycheck Information : </strong> <a>Build Pay Check</a></p>
					<p><strong>Improve My Credi Score : </strong> <span class="label label-warning">Credit Repair</span></p>
					<p><strong>Finance A House, MotorCycle, Automobile : </strong> <a>Finance My Next Purchase</a></p>
					<!-- End Invoice information -->
					
					<hr />
					<h3>Activity</h3>
					<div class="table-responsive">
						
						<table class="table">
							<thead>
								<tr>
									<th>ITEMS</th>
									<th>QTY</th>
									<th>UNIT PRICE</th>
									<th>TOTAL</th>
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td>Nasi Gudeg Pakai Suwir</td>
									<td>5</td>
									<td>&#36;2.00</td>
									<td>&#36;10.00</td>
								</tr>
								<tr>
									<td>Jeruk Anget Gelas Gede</td>
									<td>3</td>
									<td>&#36;0.50</td>
									<td>&#36;1.50</td>
								</tr>
								<tr>
									<td>Teh Tawar Anget Gelas Gede</td>
									<td>2</td>
									<td>&#36;0.50</td>
									<td>&#36;1.00</td>
								</tr>
								<tr>
									<td colspan="3"><p class="text-right"><strong>TOTAL</strong></p></td>
									<td>&#36;12.50</td>
								</tr>
								<tr>
									<td colspan="3"><p class="text-right"><strong>SHIPPING</strong></p></td>
									<td>&#36;2.50</td>
								</tr>
								<tr>
									<td colspan="3"><p class="text-right"><strong>DISCOUNT</strong></p></td>
									<td><strong class="text-danger">&#36;0.00</strong></td>
								</tr>
								<tr>
									<td colspan="3"><p class="text-right"><strong>TAX</strong></p></td>
									<td>&#36;0.00</td>
								</tr>
								<tr>
									<td colspan="3"><p class="text-right"><strong>GRAND TOTAL</strong></p></td>
									<td><strong class="text-primary">&#36;15.00</strong></td>
								</tr>
							</tbody>
						</table>
					</div><!-- End div .table-responsive -->
				</div><!-- End div .box-info -->
				<!-- End Invoice -->
				
<?php include("footer.php"); ?>
			
            </div>
			<!-- ============================================================== -->
			<!-- END YOUR CONTENT HERE -->
			<!-- ============================================================== -->
			
			
        </div>
        
		
		
	<?php include("modals.php"); ?>
	
		
		
	</div><!-- End div .container -->
	<!-- END PAGE -->
<?php include("end.php"); ?>
	</body>
</html>