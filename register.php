<?php require_once("db.php"); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states ORDER BY state_id ASC";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_markets = "SELECT * FROM `states`, `markets_dm` WHERE `states`.`state_id` = `markets_dm`.`state_id` AND `markets_dm`.`market_status` = '1'";
$markets = mysqli_query($idsconnection_mysqli, $query_markets);
$row_markets = mysqli_fetch_assoc($markets);
$totalRows_markets = mysqli_num_rows($markets);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WeFinanceHere.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/theme.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/animate.css">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.php"); ?>
    <!-- /.navbar -->

	<!-- hero -->
	<section class="wrapper-lg bg-custom-home">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="widget padding-lg bg-dark">


                    
                    	<div id="gather_budget" class="form-inline">
						
                        	<div class="row">
		                    	<h1 class="heading-lg text-center text-light">Great Credit, Bad Credit, OK!</h1>
                            </div>
                        	<div class="row">
								
                                <div class="col-md-3">
									<label for="your_credit">Your Credit:</label>
									<select id="your_credit" class="form-control" title='Choose One' data-style="btn-primary">
										<optgroup label="Good Credit">
											<option value="3.0">Very Good Credit (720 - 850)</option>
											<option value="7.0">Good Credit (675 - 719)</option>
											<option value="12.0">Fair Credit: (621-674)</option>
										</optgroup>
										<optgroup label="Bad Credit:">
											<option value="21.0">Poor Credit: (575- 620)</option>
											<option value="23.0">Sub Prime: (Below - 575)</option>
											<option value="29.0">No Credit: (0 - ?) - I am not Sure</option>
										</optgroup>
									</select>
								</div><!-- /.col -->
								
                                <div class="col-md-2">
									<label for="down_payment">Down Payment:</label>
									<select id="down_payment" class="form-control" title='Choose One' data-style="btn-primary">
										<optgroup label="Status:">
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
											<option value="2500">$ 25000.00</option>
											<option value="2600">$ 2600.00</option>
											<option value="2700">$ 2700.00</option>
											<option value="2800">$ 2800.00</option>
											<option value="2900">$ 2900.00</option>
											<option value="3000">$ 30000.00</option>
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
								
                                <div class="col-md-3">
                                
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
								
                                <div class="col-md-2">


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
								
                                <div class="col-md-2">
									<label for="">Process?</label>
									<button class="btn btn-primary btn-block">Qualify</button>
								</div>
                                
                                
                                
							</div>




							<div class="row" align="center">
                            	<div class="col-md-12">
                                
                                
                                	<h3>Your Approval So Far</h3>
                                	<h3 id="need_amount">$ 0</h3>

                                	<h3>Find A Car For</h3>
                                	<h3 id="principle_amount">$ 0</h3>
                                
                                
                                
                                
                                </div>
                            </div>



                        	<div class="row">								
                              <div class="col-md-2">
							  <label for="dma_state">Your State:</label>
									<select id="dma_state" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
									<optgroup label="Results Based On State Availablity">
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
									<label for="dma_market">Your Market:</label>
									<select id="dma_market" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary" disabled>
										<optgroup label="Results Based On Market Availablity">
											<option value="Atl">Atlanta</option>
											<option value="Mac">Macon</option>
											<option value="Miss">Mississippi</option>
										</optgroup>
									</select>

                                    
								</div><!-- /.col -->
								
                                <div class="col-md-3">
									<label for="deal_dayswhen">When Will You Be Ready:</label>
									<select id="deal_dayswhen" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="This Is When You Want To Be Driving">
                                            <option value="2">Now/Today</option>
                                            <option value="48">Tomorrow</option>
                                            <option value="72">3 Days</option>
                                            <option value="96">4 Days</option>
                                            <option value="120">5 Days</option>
                                            <option value="144">6 Days</option>
                                            <option value="168">7 Days</option>
                                            <option value="192">8 Days</option>
                                            <option value="216">9 Days</option>
                                            <option value="240">10 Days</option>
                                            <option value="264">11 Days</option>
                                            <option value="288">12 Days</option>
                                            <option value="312">13 Days</option>
                                            <option value="336">14 Days</option>
                                            <option value="360">15 Days</option>
                                            <option value="384">16 Days</option>
                                            <option value="408">17 Days</option>
                                            <option value="432">18 Days</option>
                                            <option value="456">19 Days</option>
                                            <option value="480">20 Days</option>
                                            <option value="504">21 Days</option>
                                            <option value="528">22 Days</option>
                                            <option value="552">23 Days</option>
                                            <option value="576">24 Days</option>
                                            <option value="600">25 Days</option>
                                            <option value="624">26 Days</option>
                                            <option value="648">27 Days</option>
                                            <option value="672">28 Days</option>
                                            <option value="696">29 Days</option>
                                            <option value="720">30 Days</option>
										</optgroup>
									</select>
								</div><!-- /.col -->
								
                                <div class="col-md-3">
									<label for="open_trade">You Have A Current Car Loan?</label>
									<select id="open_trade" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="Price:">
											<option value="YES">YES</option>
											<option value="NO">NO</option>
										</optgroup>
									</select>
								</div><!-- /.col -->
								
                                <div class="col-md-2">
									<label for="">ACTION</label>
									<button class="btn btn-primary btn-block">Lock Me In!</button>
								</div>
                                
                                
                                
							</div>







						
                        
                        
                        </div><!-- Form-Inline -->

					
                    
                    	<br class="spacer-lg">
					


                    
                        <h2 class="heading-default text-center text-light">Lending Over $300,000,000</h2>
                        
                        
                        
                        
                                                    <div class="text-center">
                            <button type="button" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#myModal">
                                Launch demo modal
                            </button>
                                </div>

                        </div>

                        
                        
<div style="display:none;">
<input id="budget_afford" type="hidden" value="<?php echo $wfhuser_approval_budget_affordable; ?>">
<input id="cust_creditapr" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_apr']; ?>">
<input id="cust_creditapr_txt" type="hidden" value="<?php echo $row_find_existingsession_approval['cust_creditapr_txt']; ?>">
<input id="cust_downpayment" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_dwpymt']; ?>">
<input id="cust_totalapproval" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_totalpayments']; ?>">
<input id="cust_desiredpymt" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_mxpymt']; ?>">
<input id="cust_desiredtermos" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_monthterm']; ?>">
<input id="cust_car_loan" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_openloan']; ?>">
<input id="bigPrincipal"  type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_bigPrincipal']; ?>">
<input id="bigSellingPrice"  type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_bigSellingPrice']; ?>">
<input id="cust_totalpayments" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_id']; ?>">
<input id="cust_dealtoday" type="hidden" value="">
<input id="cust_schedule_td" type="hidden" value="">
<input id="cust_lead_source" type="hidden" value="">
<input id="cust_lead_temperature" type="hidden" value="">
<input id="wfhcookiesesid"  type="hidden" value="<?php echo $cookie; ?>">
<input id="wfhuser_approval_id" type="hidden" value="<?php echo $wfhuser_approval_id; ?>">
<input id="cust_home_state" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_state']; ?>">
<input id="cust_home_market" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_market']; ?>">
</div>
					
					
                    
                    
                    </div><!-- /.widget -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
</section>
	<!-- /hero -->

	<section class="wrapper-md" style="display:none;">
		<div class="container" style="display:none;">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2><i class="fa fa-trophy text-primary"></i> We are offering <span class="text-muted">the best auto</span> deals online.</h2>
					<p class="lead">We pride ourselves on taking care of our customers. Between our detailed theme documentation, screencasts tand knowledgebase you�re sure to get up and running in no time.</p>
					<p><a href="#link" class="btn btn-lg btn-primary">Learn More �</a></p>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

	<section class="wrapper-md bg-highlight" style="display:none;">
		<div class="container" style="display:none;">
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<div class="overlay-container">
							<img src="assets/img/item-small.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1234 Peachtree Street #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
				</div><!-- /.col -->
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<div class="overlay-container">
							<img src="assets/img/item-small.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
			  </div><!-- /.col -->
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<div class="overlay-container">
							<img src="assets/img/item-small.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
			  </div><!-- /.col -->
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<div class="overlay-container">
							<img src="assets/img/item-small.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
			  </div><!-- /.col -->
		  </div><!-- /.row -->
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<div class="overlay-container">
							<img src="assets/img/item-small.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
				</div><!-- /.col -->
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<div class="overlay-container">
							<img src="assets/img/item-small.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
			  </div><!-- /.col -->
				<div class="col-md-6">

					<!-- Carousel -->
					<div id="my-carousel" class="carousel slide no-margin-bottom">
						<!-- indicators -->
						<ol class="carousel-indicators">
							<li data-target="#my-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#my-carousel" data-slide-to="1"></li>
						</ol>
						<!-- carousel -->
						<div class="carousel-inner">
							<div class="item active">
								<img class="img-responsive" src="assets/img/wallpaper.jpg" alt="1200x500" >
								<div class="carousel-caption visible-lg">
									<h1>Bootstrap Framework Overhauled<br> Meet the new sexy</h1>
									<p class="lead">Beautifull Bootstrap skin with overhauled components.</p><br>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<img class="img-responsive" src="assets/img/wallpaper.jpg" alt="1200x500" >
								<div class="carousel-caption visible-lg">
									<h1>We help you being awesome at what you really do</h1>
									<p class="lead">Providing the best service so you can concentrate on your thing</p>
								</div>
							</div><!-- /.item -->
						</div><!-- /.carousel-inner -->
						<!-- Controls -->
						<a class="left carousel-control" href="#my-carousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#my-carousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div><!-- /.carousel -->

			  </div><!-- /.col -->
		  </div><!-- /.row -->
		</div><!-- /.container -->
	</section>

	<section class="wrapper-md bg-primary" style="display:none;">
		<div class="container" style="display:none;">
			<h2 class="text-center headline">Featured This Week</h2>
			<br class="spacer-lg">
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail text-default">
						<div class="overlay-container">
							<img src="assets/img/item-large.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
				</div><!-- /.col -->
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail text-default">
						<div class="overlay-container">
							<img src="assets/img/item-large.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
			  </div><!-- /.col -->
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail text-default">
						<div class="overlay-container">
							<img src="assets/img/item-large.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
			  </div><!-- /.col -->
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail text-default">
						<div class="overlay-container">
							<img src="assets/img/item-large.jpg">
							<div class="overlay-content">
								<h3 class="h4 headline">Great Deal</h3>
								<p>So you know you're getting a top quality property from an experienced team.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
							<p><i class="fa fa-fw fa-map-marker"></i> Atlanta, GA  30328</p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
						</div>
					</div><!-- /.thumbnail -->
			  </div><!-- /.col -->
		  </div><!-- /.row -->
	  </div><!-- /.container -->
	</section>

	<section class="wrapper-md" style="display:none;">
		<div class="container" style="display:none;">
			<h2 class="text-center">The Southern Graphikaria Real Estate Market Is About To Skyrocket</h2>
			<p class="text-center lead">Very affordable 2 bedroom 2 bathroom beachfront homes.</p>
			<br class="spacer-lg">
			<div class="row">
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-primary">
						<h2><i class="fa fa-list"></i> Listing</h2>
						<p class="lead">We have already sold more than 5,000 Homes and we are still going at very good pace. </p>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-info">
						<h2><i class="fa fa-flag"></i> Advertise</h2>
						<p class="lead">We have already sold more than 5,000 Homes and we are still going at very good pace. </p>
					</div>
			  </div><!-- /.col -->
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-primary">
						<h2><i class="fa fa-question-circle"></i> Consulting</h2>
						<p class="lead">We have already sold more than 5,000 Homes and we are still going at very good pace. </p>
					</div>
			  </div><!-- /.col -->
		  </div><!-- /.row -->
		</div><!-- /.container -->
	</section>

	<!-- Footer -->
	<footer class="footer-container">
		<section class="footer-primary">
		<div class="container" style="display:none;">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<h3>Footer Component</h3>
						<p>Choose from our favourite tags:</p>
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
					</div><!-- /.col -->
					<div class="col-sm-6 col-md-3">
						<h3>Image Stream List</h3>
						<p>View our latest stills in Flicker:</p>
						<ul class="img-stream">
							<li><a href="#link"><img class="media-object" data-src="holder.js/55x55" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/55x55" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/55x55" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/55x55" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/55x55" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/55x55" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/55x55" alt="img"></a></li>
							<li><a href="#link"><img class="media-object" data-src="holder.js/55x55" alt="img"></a></li>
						</ul>
				  </div><!-- /.col -->
					<div class="col-sm-6 col-md-3">
						<h3>Hyperlinks List</h3>
						<p>Contact us whenever you want:</p>
						<ul class="list-unstyled">
							<li><i class="fa fa-angle-right"></i> <a href="#link">9am-6pm ET Mon-Fri</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#link">US (877) 977-8732</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#link">International +1 646 490 1679</a></li>
						</ul>
				  </div><!-- /.col -->
					<div class="col-sm-6 col-md-3">
						<h3>Social Media List</h3>
						<p>Stick to the social media hype:</p>
						<ul class="social-networks">
							<li><a class="btn btn-twitter" href="#"><i class="fa fa-fw fa-twitter"></i></a></li>
							<li><a class="btn btn-facebook" href="#"><i class="fa fa-fw fa-facebook"></i></a></li>
							<li><a class="btn btn-google-plus" href="#"><i class="fa fa-fw fa-google-plus"></i></a></li>
							<li><a class="btn btn-pinterest" href="#"><i class="fa fa-fw fa-pinterest"></i></a></li>
						</ul>
						<p>We are friendly. Give us a ding!</p>
				  </div><!-- /.col -->
			  </div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.wrapper-sm -->
		<section class="footer-secondary">
		<div class="container" style="display:none;">
				<div class="row">
					<div class="col-lg-12">
						<p class="no-margin-bottom">All Rights Reserved � Designed by <a href="http://webgoonie.com/" target="_blank">@WebGoonie</a></p>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.footer-secondary -->
	</footer><!-- /.footer-container --> <!-- End of footer -->

	<!-- last but not least the javascript -->
	<script src="js/jquery-2.1.1.js"></script>

	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
    <script src="js/custom/approval.widget.js"></script>
	<script src="assets/js/holder.js"></script>
</body>
</html>
<?php
mysqli_free_result($states);

mysqli_free_result($markets);
?>
