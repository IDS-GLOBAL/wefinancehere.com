<?php require_once("db.php"); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pub_sold_view = "SELECT * FROM vehicles, dealers WHERE vehicles.did = dealers.id AND vehicles.vlivestatus = '9' AND  vehicles.vthubmnail_file IS NOT NULL ORDER BY RAND() LIMIT 16 ";
$pub_sold_view = mysqli_query($idsconnection_mysqli, $query_pub_sold_view);
$row_pub_sold_view = mysqli_fetch_assoc($pub_sold_view);
$totalRows_pub_sold_view = mysqli_num_rows($pub_sold_view);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_wfh_latestaprovals = "SELECT * FROM wfhuser_approvals ORDER BY wfhuser_approval_id DESC LIMIT 10";
$wfh_latestaprovals = mysqli_query($idsconnection_mysqli, $query_wfh_latestaprovals);
$row_wfh_latestaprovals = mysqli_fetch_assoc($wfh_latestaprovals);
$totalRows_wfh_latestaprovals = mysqli_num_rows($wfh_latestaprovals);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_wfh_latestaprovals = "SELECT * FROM `wfhuser_approvals` ORDER BY `wfhuser_approval_id` DESC LIMIT 10";
$wfh_latestaprovals = mysqli_query($idsconnection_mysqli, $query_wfh_latestaprovals);
$row_wfh_latestaprovals = mysqli_fetch_assoc($wfh_latestaprovals);
$totalRows_wfh_latestaprovals = mysqli_num_rows($wfh_latestaprovals);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_wfh_latestaprovals_verified = "SELECT * FROM `wfhuser_approvals` WHERE `wfhuser_approval_email_verified` = '1' ORDER BY `wfhuser_approval_id` DESC LIMIT 10";
$wfh_latestaprovals_verified = mysqli_query($idsconnection_mysqli, $query_wfh_latestaprovals_verified);
$row_wfh_latestaprovals_verified = mysqli_fetch_assoc($wfh_latestaprovals_verified);
$totalRows_wfh_latestaprovals_verified = mysqli_num_rows($wfh_latestaprovals_verified);


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
	<link rel="stylesheet" href="css/plugin/jasny-bootstrap/css/jasny-bootstrap.css">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.vehicles.php"); ?>
    <!-- /.navbar -->


	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
                	<img src="https://wefinancehere.com/img/wfh_logo.png" width="240px">                    
				</div>
            </div>
       </div>
    </section>

	<!-- Pre-Approval Box -->
	<section id="start_box" class="wrapper-lg bg-custom-home">
		<div class="container-fluid">
        

<div id="user_big_buttons">
			<div class="row" align="center">
            	<div class="col-xs-4"><a class='btn btn-lg btn-default' role="button"><i class="fa fa-certificate fa-4x" aria-hidden="true"></i><br />Your<br />Approval</a></div>
            	<div class="col-xs-4"><a class='btn btn-lg btn-default role="button"'><i class="fa fa-car fa-4x" aria-hidden="true"></i><br />Vehicle<br />Selection</a></div>
            	<div class="col-xs-4"><a class='btn btn-lg btn-default' role="button"><i class="fa fa-certificate fa-4x" aria-hidden="true"></i><br />Apppoint-<br />ment</a></div>
            </div>

			<div class="row" align="center">
            	<div class="col-xs-4"><a class='btn btn-lg btn-default' role="button"><i class="fa fa-certificate fa-4x" aria-hidden="true"></i><br />Write Up</a></div>
            	<div class="col-xs-4"><a class='btn btn-lg btn-default' role="button"><i class="fa fa-certificate fa-4x" aria-hidden="true"></i><br />Verfication</a></div>
            	<div class="col-xs-4"><a class='btn btn-lg btn-default' role="button"><i class="fa fa-certificate fa-4x" aria-hidden="true"></i><br />Delivery</a></div>
            </div>
</div>

<div class="row">
	<div class="col-md-12"><i class="fa fa-briefcase" aria-hidden="true"></i><br />BACKOFFICE</a></div>
</div>


     		<div class="row" id="intro_box">
            	<div class="col-lg-12" style="height:600px; color:#FF5722;">

						<h1 id="fb-welcome"class="heading-lg text-center text-light"></h1>
                        <h2 id="total_avaltxt" class="text-center">We're Approving $ <?php echo $total_avilable; ?>  Today!</h2>
                        <h3 class="text-center">Use Our Pre-Approval Deal Matrix Calculator Below</h3>
                        <h4 class="text-center">Get Approved Regardless Of Any Credit Instantly See Results</h4>
                        <h5 class="text-center">Get Approved First Or Shop First With Your Pre-Approval</h5>
						<h5 class="text-center">Welcome To The Easiest Way To Finance A Car Online Today</h5>
                	
                    	<br class="spacer-sm">

                    
                    
                    
                    
                </div>
            </div>   





        </div>
    </section>




	<section class="wrapper-md">
		<div id="vdlisting_results" class="container">
        
        
        
        
          
          
          
                                          
                                          
                                          
                                          
		</div><!-- /.container -->
	</section>




	


	<section class="wrapper-md">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2><i class="fa fa-trophy text-primary"></i> Everyone is <span class="text-muted"> Pre-Approved </span> based on rates from credit-score ranges.</h2>
					<p class="lead">Get financed today get a feel for where you fall if you credit falls between certain credit score ranges.</p>
					<p><a href="#gather_budget" class="btn btn-lg btn-primary">GET STARTED! <i class="fa fa fa-key"></i></a></p>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>







<section class="wrapper-lg bg-highlight" id="pricing">
		
        <div class="container">
			<h2 class="text-center">Good Credit</h2>
			<br class="spacer-lg">
			<div class="row">
				<div class="col-md-4">
					<div class="plan">
						<div class="plan-header">
							<h3> Very Good Credit </h3>
						</div>
						<div class="plan-description">
							<p>(720 - 850) If your credit score range is this here's what we can offer.</p>
						</div>
						<div class="plan-price">
							<h1>3.0 <small>/apr</small></h1>
						</div>
						<div class="plan-cta"> <!-- call to action -->
							<p>Based on average of sold deals from previous car deals. Not Garunteed until interview process and proof of identify and income.</p>
							<br class="spacer-md">
							<a href="#gather_budget" class="btn btn-default">Get it now! »</a>
						</div>
					</div><!-- /.plan -->
				</div><!-- /.col -->
				<div class="col-md-4">
					<div class="plan plan-featured">
						<div class="plan-header">
							<h3>Good Credit </h3>
						</div>
						<div class="plan-description">
							<p>(675 - 719) If your credit score range is this here's what we can offer.</p>
						</div>
						<div class="plan-price">
							<h1>7.0 <small>/apr</small></h1>
						</div>
						<div class="plan-cta"> <!-- call to action -->
							<p>Based on average of sold deals from previous car deals. Not Garunteed until interview process and proof of identify and income.</p>
							<br class="spacer-md">
							<a href="#gather_budget" class="btn btn-primary">Get it now! »</a>
						</div>
					</div><!-- /.plan -->
				</div><!-- /.col -->
				<div class="col-md-4">
					<div class="plan">
						<div class="plan-header">
							<h3>Fair Credit: </h3>
						</div>
						<div class="plan-description">
							<p>(621 - 674) If your credit score range is this here's what we can offer.</p>
						</div>
						<div class="plan-price">
							<h1>12.0 <small>/apr</small></h1>
						</div>
						<div class="plan-cta"> <!-- call to action -->
							<p>Based on average of sold deals from previous car deals. Not Garunteed until interview process and proof of identify and income.</p>
							<br class="spacer-md">
							<a href="#gather_budget" class="btn btn-default">Get it now! »</a>
						</div>
					</div><!-- /.plan -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>


		
        <div class="container">
			<h2 class="text-center">Bad Credit:</h2>
			<br class="spacer-lg">
			<div class="row">
				<div class="col-md-4">
					<div class="plan">
						<div class="plan-header">
							<h3>Slow Credit:</h3>
						</div>
						<div class="plan-description">
							<p>(575 - 620) If your credit score range is this here's what we can offer.</p>
						</div>
						<div class="plan-price">
							<h1>21.0 <small>/apr.</small></h1>
						</div>
						<div class="plan-cta"> <!-- call to action -->
							<p>Based on average of sold deals from previous car deals. Not Garunteed until interview process and proof of identify and income.</p>
							<br class="spacer-md">
							<a href="#gather_budget" class="btn btn-default">Get it now! »</a>
						</div>
					</div><!-- /.plan -->
				</div><!-- /.col -->
				<div class="col-md-4">
					<div class="plan plan-featured">
						<div class="plan-header">
							<h3> Bad Credit:</h3>
						</div>
						<div class="plan-description">
							<p>(Below - 575) If your credit score range is this here's what we can offer.</p>
						</div>
						<div class="plan-price">
							<h1>23.0 <small>/apr</small></h1>
						</div>
						<div class="plan-cta"> <!-- call to action -->
							<p>Based on average of sold deals from previous car deals. Not Garunteed until interview process and proof of identify and income.</p>
							<br class="spacer-md">
							<a href="#gather_budget" class="btn btn-primary">Get it now! »</a>
						</div>
					</div><!-- /.plan -->
				</div><!-- /.col -->
				<div class="col-md-4">
					<div class="plan">
						<div class="plan-header">
							<h3>No Credit: (0 - Not Sure)</h3>
						</div>
						<div class="plan-description">
							<p>(720 - 850) If your credit score range is this here's what we can offer.</p>
						</div>
						<div class="plan-price">
							<h1>29.0  <small>/apr</small></h1>
						</div>
						<div class="plan-cta"> <!-- call to action -->
							<p>Based on average of sold deals from previous car deals. Not Garunteed until interview process and proof of identify and income.</p>
							<br class="spacer-md">
							<a href="#gather_budget" class="btn btn-default">Get it now! »</a>
						</div>
					</div><!-- /.plan -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
        
        
</section>













	<section class="wrapper-md">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2><i class="fa fa-trophy text-primary"></i> We are offering <span class="text-muted">the best auto</span> deals online.</h2>
					<p class="lead">Regardless of your credit situation get the deal you deserve by what you can afford and what you can finance.</p>
					<p><a  class="btn btn-lg btn-primary">Learn More <i class="fa fa fa-key"></i></a></p>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>












	

	<section class="wrapper-md" id="choose_us">
		<div class="container">
			<h2 class="text-center">WeFinanceHere.com is ideal for financing a vehicle.</h2>
			<p class="text-center lead">Regardless of credit if you have income we can get you done.</p>
			<br class="spacer-lg">
			<div class="row">
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-primary">
						<h2><i class="fa fa-car"></i> Vehicles</h2>
						<p class="lead">We have already help market and sell more than 150,000 vehicles and we are still going at very good pace. </p>
					</div>
                    <div class="col-sm-12">
                    	<a class="btn btn-default btn-lg btn-block">Vehicles</a>
                    </div>
				</div><!-- /.col -->
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-info">
						<h2><i class="fa fa-share-alt"></i> Advertise</h2>
						<p class="lead">Interested in advertising with wefinancehere.com please feel free to go to our contact us page and contact us from here.</p>
					</div>
                    <div class="col-sm-12">
                    	<a class="btn btn-default btn-lg btn-block">Advertise</a>
                    </div>
			  </div><!-- /.col -->
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-primary">
						<h2><i class="fa fa-users"></i> Advisors</h2>
						<p class="lead">We have qualified consultants here on staff that can help you spend your approval funds in your local area.</p>
					</div>
                    <div class="col-sm-12">
                    	<a class="btn btn-default btn-lg btn-block">Seek An Advisor</a>
                    </div>
			  </div><!-- /.col -->
		  </div><!-- /.row -->
		</div><!-- /.container -->
	</section>

	<?php include("_footer.php"); ?>
	<!-- last but not least the javascript -->
	<script src="js/jquery-2.1.1.js"></script>

	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
    <script src="js/custom/approval.widget.js"></script>
    <script src="js/custom/custom.start.js"></script>
	<script src="assets/js/holder.js"></script>
	<script src="js/plugin/jasny-bootstrap/js/jasny-bootstrap.js"></script>
</body>
</html>
<?php
mysqli_free_result($states);

mysqli_free_result($markets);
?>
