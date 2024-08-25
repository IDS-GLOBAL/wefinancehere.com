<?php require_once("db_wfh_approval_loggedin.php"); ?>
<?php














?>
<!DOCTYPE html>
<html>
	<head>
	<title>WeFinanceHere - Approval</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="description" content="">
	<meta name="keywords" content="admin, bootstrap,admin template, bootstrap admin, simple, awesome">
	<meta name="author" content="">

	<!-- BOOTSTRAP -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- LANCENG CSS -->
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	
	<!-- VENDOR -->
	<link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/third/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/third/weather-icon/css/weather-icons.min.css" rel="stylesheet">
	<link href="assets/third/morris/morris.css" rel="stylesheet">
	<link href="assets/third/nifty-modal/css/component.css" rel="stylesheet">
	<link href="assets/third/sortable/sortable-theme-bootstrap.css" rel="stylesheet"> 
	<link href="assets/third/icheck/skins/minimal/grey.css" rel="stylesheet"> 
	<link href="assets/third/select/bootstrap-select.min.css" rel="stylesheet"> 
	<link href="assets/third/summernote/summernote.css" rel="stylesheet">
	<link href="assets/third/magnific-popup/magnific-popup.css" rel="stylesheet"> 
	<link href="assets/third/datepicker/css/datepicker.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- FAVICON -->
	<link rel="shortcut icon" href="assets/img/favicon.ico">
	</head>
	
	
	
	<!-- BODY -->
	<body class="tooltips">
	<?php include_once("analyticstracking.php") ?>

	<!-- BEGIN PAGE -->
	<div class="container">
			
	
		<!-- BEGIN SIDEBAR -->
        <?php include("_sidebar.user.approval.php"); ?>
		<!-- END SIDEBAR -->
		
		
		
		<!-- BEGIN CONTENT -->
        <div class="right content-page">
		
			<!-- BEGIN CONTENT HEADER -->
            <div class="header content rows-content-header">
			
				<!-- Button mobile view to collapse sidebar menu -->
				<button class="button-menu-mobile show-sidebar">
					<i class="fa fa-bars"></i>
				</button>
				
		<?php include("_top_navigation.php"); ?>			
            </div>
			<!-- END CONTENT HEADER -->
			
			
			
			
			<!-- ============================================================== -->
			<!-- START YOUR CONTENT HERE -->
			<!-- ============================================================== -->
            <div class="body content rows scroll-y">
				
				<!-- Page header -->
				<div class="page-heading animated fadeInDownBig">
					<h1>Approval <small>Review</small></h1>
				</div>
				<!-- End page header -->
				
				<div class="jumbotron bg-white sm">
				  
                  
                  
                  
 <div class="row">
				<div class="col-sm-12">
					<div class="widget padding-lg bg-dark">


                    
                    	<div id="gather_budget" class="form-inline">
						
                        	<div class="row">
		                    	<!-- h1 class="heading-lg text-center text-light">Great Credit, Bad Credit, OK!</h1 -->

                        <h2 id="total_avaltxt" class="text-center">We're Approving $ <?php echo $total_avilable; ?>  Today!</h2>

                            </div>
                            
                        	<div class="row">
								
                                <div class="col-md-4">
									<label for="your_credit">Your Credit:</label>
									<select id="your_credit" class="form-control" title='Choose One' data-style="btn-primary">
										<optgroup label="Good Credit">
											<option value="3.0">3.0 Very Good Credit (720 - 850)</option>
											<option value="7.0">7.0 Good Credit (675 - 719)</option>
											<option value="12.0">12.0 Fair Credit: (621-674)</option>
										</optgroup>
										<optgroup label="Bad Credit:">
											<option value="21.0">21.0 Slow Credit: (575- 620)</option>
											<option value="23.0">23.0 Bad Credit: (Below - 575)</option>
											<option value="29.0">29.0 No Credit: (0 - ?) - I am not Sure</option>
										</optgroup>
									</select>
								</div><!-- /.col -->
								
                                <div class="col-md-3">
									<label for="down_payment">Your Down Payment:</label>
									<select id="down_payment" class="form-control" title='Choose One' data-style="btn-primary">
										<optgroup label="Your Down Payment: (required)">
											<option value="100">$ 100.00</option>
											<option value="200">$ 200.00</option>
											<option value="300">$ 300.00</option>
											<option value="400">$ 400.00</option>
											<option value="500">$ 500.00</option>
											<option value="600">$ 600.00</option>
											<option value="700">$ 700.00</option>
											<option value="800">$ 800.00</option>
											<option value="900">$ 900.00</option>
											<option value="1000">$ 1000.00</option>
											<option value="1100">$ 1100.00</option>
											<option value="1200">$ 1200.00</option>
											<option value="1300">$ 1300.00</option>
											<option value="1400">$ 1400.00</option>
											<option value="1500">$ 1500.00</option>
											<option value="1600">$ 1600.00</option>
											<option value="1700">$ 1700.00</option>
											<option value="1800">$ 1800.00</option>
											<option value="1900">$ 1900.00</option>
											<option value="2000">$ 2000.00</option>
											<option value="2100">$ 2100.00</option>
											<option value="2200">$ 2200.00</option>
											<option value="2300">$ 2300.00</option>
											<option value="2400">$ 2400.00</option>
											<option value="2500">$ 2500.00</option>
											<option value="2600">$ 2600.00</option>
											<option value="2700">$ 2700.00</option>
											<option value="2800">$ 2800.00</option>
											<option value="2900">$ 2900.00</option>
											<option value="3000">$ 3000.00</option>
											<option value="3100">$ 3100.00</option>
											<option value="3200">$ 3200.00</option>
											<option value="3300">$ 3300.00</option>
											<option value="3400">$ 3400.00</option>
											<option value="3500">$ 3500.00</option>
											<option value="3600">$ 3600.00</option>
											<option value="3700">$ 3700.00</option>
											<option value="3800">$ 3800.00</option>
											<option value="3900">$ 3900.00</option>
											<option value="4000">$ 4000.00</option>
											<option value="4001">$ 4000.00 (+) Plus</option>
										</optgroup>
									</select>
								</div><!-- /.col -->
								
                                <div class="col-md-2">
                                
									<label for="max_car_payment">Max Car Payment:</label>
									<select id="max_car_payment" class="form-control selectpicker show-tick" title='$50 Car Payment' data-style="btn-primary">
										<optgroup label="Your Max Car Payment:">
											<option value="250">$200 - $250</option>
											<option value="250">$200 - $250</option>
											<option value="300">$250 - $300</option>
											<option value="350">$300 - $350</option>
											<option value="400">$350 - $400</option>
											<option value="500">$450 - $500</option>
											<option value="550">$500 - $550</option>
											<option value="550">$500 - $550</option>
											<option value="650">$600 - $650</option>
											<option value="750">$700 - $750</option>
											<option value="850">$800 - $850</option>
											<option value="950">$900 - $950</option>
											<option value="1050">$1000 - $1050</option>
											<option value="1100">$1050 - $1100</option>
											<option value="1150">$1100 - $1150</option>
											<option value="1200">$1150 - $1200</option>
											<option value="1300">$1200 - $1300</option>
											<option value="1400">$1300 - $1400</option>
											<option value="1600">$1500 - $1600</option>
										</optgroup>
									</select>
								
                                </div><!-- /.col -->
								
                                <div class="col-md-3">


									<label for="how_long">Repayment Time:</label>
									<select id="how_long" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="The Longest You'll Go?">

									  	<option value="1">1 Year</option>
									  	<option value="2">2 Years</option>
									  	<option value="3">3 Years</option>
									  	<option value="4" selected>4 Years</option>
                                        <option value="5">5 Years</option>
                                        <option value="6">6 Years</option>
										</optgroup>
									</select>
								

                                </div><!-- /.col -->
								
                                
                                
                                
							</div>




							<div class="row" align="center">
                            	<div id="approval_boxwbudget" class="col-md-12 has_idle">


	<div class="row">
        <div class="col-md-6 col-sm-6">
                                	<h3>Your Approval So Far</h3>
                                	<h3 id="need_amount">$ 0</h3>
        </div>
        <div class="col-md-6 col-sm-6">
                                	<h3>Your Finance Amount</h3>
                                	<h3 id="principle_amount">$ 0</h3>
        </div>

        <div id="humanread_approval_script" class="col-md-12 col-sm-12">
        </div>
        
    </div>
    
    





                                </div>
                            </div>



                        	<div class="row">

                                <div class="col-md-3">


									<label for="gross_moincome">Your Monthly Income:</label>
									<select id="gross_moincome" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
									  <optgroup label="Income Before Taxes">
									  	<option value="1000">$850 - $1,000</option>
									  	<option value="1250">$1,000 - $1,250</option>
									  	<option value="1500">$1,500 - $1,500</option>
									  	<option value="1750">$1,500 - $1,750</option>
									  	<option value="2000">$1,750 - $2,000</option>
									  	<option value="2250">$2,000 - $2,250</option>
									  	<option value="2500">$2,250 - $2,500</option>
									  	<option value="2750">$2,500 - $2,750</option>
									  	<option value="3000">$2,700 - $3,000</option>
									  	<option value="3250">$3,000 - $3,250</option>
									  	<option value="3500">$3,250 - $3,500</option>
									  	<option value="3750">$3,500 - $3,750</option>
									  	<option value="4000">$3,750 - $4,000</option>
									  	<option value="4250">$4,000 - $4,250</option>
									  	<option value="4750">$4,500 - $4,750</option>
									  	<option value="5000">$4,750 - $5,000</option>
									  	<option value="5250">$5,000 - $5,250</option>
									  	<option value="5500">$5,250 - $5,500</option>
									  	<option value="5750">$5,500 - $5,750</option>                                        
									  	<option value="6000">$5,750 - $6,000</option>
									  	<option value="6250">$6,000 - $6,250</option>
									  	<option value="6750">$6,500 - $6,750</option>
									  	<option value="7250">$7,000 - $7,250</option>
									  	<option value="7500">$7,250 - $7,500</option>
									  	<option value="7750">$7,500 - $7,750</option>
									  	<option value="8000">$7,750 - $8,000</option>
									  	<option value="8250">$8,000 - $8,250</option>
									  	<option value="8750">$8,500 - $8,750</option>
									  	<option value="9000">$8,750 - $9,000</option>
									  	<option value="9250">$9,000 - $9,250</option>
									  	<option value="9500">$9,250 - $9,500</option>
									  	<option value="9750">$9,500 - $9,750</option>                                        
									  	<option value="10000">$10,000 - $10,000 (+)Plus</option>
									  </optgroup>
									</select>
								

                                </div><!-- /.col -->
							
                              	<div class="col-md-2">
							  <label for="dma_state">Your State:</label>
									<select id="dma_state" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
									<optgroup label="Results Based On State Availablity">
									<option value="">Select State</option>									  
									  <?php do {  ?>
									  <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_name']?></option>
										<?php
												} while ($row_states = mysqli_fetch_assoc($states));
												  $rows = mysqli_num_rows($states);
												  if($rows > 0) {
													  mysqli_data_seek($states, 0);
													  $row_states = mysqli_fetch_assoc($states);
												  }
										?>
                                    </optgroup>
                                 </select>

								</div><!-- /.col -->
								
                                
                                
                                <div class="col-md-2">
									<label for="dma_market">Closest Market:</label>
									<select id="dma_market" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary" disabled>
										<optgroup label="Results Based On Market Availablity">
											<option value="">Choose State</option>
										</optgroup>
									</select>

                                    
								</div><!-- /.col -->
                                
                                
                                <div class="col-md-3">
									<label for="open_trade">You Have A Current Car Loan?</label>
									<select id="open_trade" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="I currently have a car loan on my credit: ">
											<option value="">Select Please</option>
                                            <option value="YES">YES</option>
											<option value="NO">NO</option>
										</optgroup>
									</select>
								</div><!-- /.col -->



                                <div class="col-md-2" style="display:none;">
									<label for="shop_only">Shop Only!</label>
                                    <button id="shop_only" type="button" class="btn btn-primary">Shop Only</button>
								</div><!-- /.col -->


                                
                                
							</div>







						
                        
                        
                        </div><!-- Form-Inline -->

					
                    
                    	<!--br class="spacer-lg" -->
					


                    
                        












<div id="register_myapproval_box">


    <div class="row">
        <div class="col-md-4">
        <label class="control-label">Your First Name:</label>
        <input id="approval_fname" type="text" name="approval_fname"   class="form-control" placeholder="Your Name">
        </div>

        <div class="col-md-4">
        <label class="control-label">Your Last Name:</label>
        <input id="approval_lname" type="text" name="approval_lname"   class="form-control" placeholder="Your Last Name">
        </div>

        <div class="col-md-4">
        <label class="control-label">(US) Mobile Number:</label>
        <input id="approval_phoneno" type="text" name="cell" data-mask="(999) 999-9999" class="form-control" placeholder="Mobile Number">
        </div>

    </div>


	<br class="spacer-sm">

    	
	<div class="row">                              
    <div class="col-md-4">

    <label class="control-label">Email Address:</label>
<input id="approval_email" type="text" name="email" class="form-control" placeholder="Your Email Address">
    </div>

	<br class="spacer-sm">
    

	</div>
    <div class="row">
		
    <div class="col-md-4">
            <button id="allocate_funds" type="button" class="btn btn-facebook btn-block">Click Here For This <span id="need_amountt">$ 0</span> Approval!</button>
    </div>    
        
        <div class="col-md-10">
        <p>When preparing your funds gains you automatic approval.  Get a check in your back office or have your approval sent to an approved location.</p>
        </div>
    </div>
    
</div><!-- End Visual register me -->

                        

                        </div>

                        
                        <div style="display:none;">
                        <input id="budget_afford" type="hidden" value="">
                        <input id="cust_creditapr" class="col-sm-2" type="hidden" value="">
                        <input id="cust_creditapr_txt" class="col-sm-2" type="hidden" value="">
                        <input id="cust_downpayment" class="col-sm-2" type="hidden" value="">
                        <input id="cust_totalapproval" class="col-sm-2" type="hidden" value="">
                        <input id="cust_desiredpymt" class="col-sm-2" type="hidden" value="">
                        <input id="cust_desiredtermos" class="col-sm-2" type="hidden" value="">
                        <input id="cust_car_loan" class="col-sm-2" type="hidden" value="">
                        
                        <input id="bigPrincipal"  class="col-sm-2" type="hidden" value="">
                        
                        <input id="bigSellingPrice"  class="col-sm-2" type="hidden" value="">

                        <input id="cust_totalpayments" type="hidden" value="">
                        
                        
                        <input id="cust_dealtoday" class="col-sm-2" type="hidden" value="">
                        <input id="cust_schedule_td" class="col-sm-2" type="hidden" value="">
                        
                        <input id="cust_lead_source" class="col-sm-2" type="hidden" value="">
                        <input id="cust_lead_temperature" class="col-sm-2" type="hidden" value="">
                        <input id="wfhcookiesesid"  class="col-sm-2" type="hidden" value="<?php echo $cookie; ?>">
                        <input id="cust_home_state" class="col-sm-2" type="hidden" value="" >
                        <input id="cust_home_market" class="col-sm-2" type="hidden" value="">
                        </div>
					
					

                    
                    </div><!-- /.widget -->
				</div>                 
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
				</div><!-- //jumbotron -->
				
				
				
				<!-- Footer -->
				<?php include("footer.php"); ?>
				<!-- End Footer -->
			
            </div>
			<!-- ============================================================== -->
			<!-- END YOUR CONTENT HERE -->
			<!-- ============================================================== -->
			
			
        </div>
		<!-- END CONTENT -->
		
		
<?php include("modals.php"); ?>
		
		
		
		
	</div><!-- End div .container -->
	<!-- END PAGE -->

<?php include("end.php"); ?>

	</body>
</html>