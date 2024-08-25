<?php require_once("db_wfh_approval_loggedin.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<title>Back Office Dashboard</title>
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
				<div class="page-heading">
					<h1>Dashboard <small>a snap shot of your activity.</small></h1>
				</div>
				<!-- End page header -->
				
				
				<!-- Begin info box -->
				<div class="row">
					
					<!-- Visitor Info Box -->
					<div class="col-sm-3 col-xs-6">
						<!-- Box info -->
						<div class="box-info">
							<!-- Icon box -->
							<div class="icon-box">
								<span class="fa-stack">
								  <i class="fa fa-circle fa-stack-2x success"></i>
								  <i class="fa fa-money fa-stack-1x fa-inverse"></i>
								</span>
							</div><!-- End div .icon-box -->
							<!-- Text box -->
							<div class="text-box">
<h3><?php if(!$applicant_employer1_salary_bringhome){ echo 'Missing'; }else{ echo '$ '.formatMoney($applicant_employer1_salary_bringhome).' Monthly'; } ?> </h3>
								<p>Work/Income</p>
							</div><!-- End div .text-box -->
							<div class="clear"></div>
							<!-- Progress bar -->
							<div class="progress progress-xs">
							  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
								<span class="sr-only">80&#37; Complete</span>
							  </div>
							</div><!-- End div .progress .progress-xs -->
							<p class="text-center">15&#37; Higher than Yesterday</p>
						</div><!-- End div .info-box -->
					</div>
					<!-- End Visitor Info Box -->
					
					
					<!-- Orders Info Box -->
					<div class="col-sm-3 col-xs-6">
						<!-- Box info -->
						<div class="box-info">
							<!-- Icon box -->
							<div class="icon-box">
								<span class="fa-stack">
								  <i class="fa fa-circle fa-stack-2x danger"></i>
								  <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
								</span>
							</div><!-- End div .icon-box -->
							<!-- Text box -->
							<div class="text-box">
<h3><?php if(!$cust_totalpayments){ echo 'Missing'; }else{ echo '$ '.formatMoney($cust_totalpayments); } ?></h3>
								<p>Approval Amount</p>
							</div><!-- End div .text-box -->
							<div class="clear"></div>
							<!-- Progress bar -->
							<div class="progress progress-xs">
							  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
								<span class="sr-only">80&#37; Complete</span>
							  </div>
							</div><!-- End div .progress .progress-xs -->
							<p class="text-center">5&#37; Higher than Yesterday</p>
						</div><!-- End div .info-box -->
					</div>
					<!-- End Orders Info Box -->
					
					
					<!-- Downloads Info Box -->
					<div class="col-sm-3 col-xs-6">
						<!-- Box info -->
						<div class="box-info">
							<!-- Icon box -->
							<div class="icon-box">
								<span class="fa-stack">
								  <i class="fa fa-circle fa-stack-2x info"></i>
								  <i class="fa fa-cloud-download fa-stack-1x fa-inverse"></i>
								</span>
							</div><!-- End div .icon-box -->
							<!-- Text box -->
							<div class="text-box">
								<h3><?php if(!$cust_downpayment){ echo 'Missing'; }else{ echo '$ '.formatMoney($cust_downpayment); } ?></h3>
								<p>Down Payment</p>
							</div><!-- End div .text-box -->
							<div class="clear"></div>
							<!-- Progress bar -->
							<div class="progress progress-xs">
							  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
								<span class="sr-only">95&#37; Complete</span>
							  </div>
							</div><!-- End div .progress .progress-xs -->
							<p class="text-center">12&#37; Higher than Yesterday</p>
						</div><!-- End div .info-box -->
					</div>
					<!-- End Downloads Info Box -->
					
					
					<!-- Shipping Info Box -->
					<div class="col-sm-3 col-xs-6">
						<!-- Box info -->
						<div class="box-info">
							<!-- Icon box -->
							<div class="icon-box">
								<span class="fa-stack">
								  <i class="fa fa-circle fa-stack-2x warning"></i>
								  <i class="fa fa-truck fa-stack-1x fa-inverse"></i>
								</span>
							</div><!-- End div .icon-box -->
							<!-- Text box -->
							<div class="text-box">
								<h3><?php if(!$cust_desiredpymt ){ echo 'Missing'; }else{ echo '$ '.formatMoney($cust_desiredpymt); } ?></h3>
								<p>Max Car Payment</p>
							</div><!-- End div .text-box -->
							<div class="clear"></div>
							<!-- Progress bar -->
							<div class="progress progress-xs">
							  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
								<span class="sr-only">55&#37; Complete</span>
							  </div>
							</div><!-- End div .progress .progress-xs -->
							<p class="text-center">3&#37; Higher than Yesterday</p>
						</div><!-- End div .info-box -->
					</div>
					<!-- End Shipping Info Box -->
					
				</div>
				<!-- End of info box -->
				
				
				<div class="row">
					<div class="col-sm-8">
						<!-- Website statistic -->
						<div class="box-info">
							<h2><strong>Interview</strong> Setup</h2>





<div class="jumbotron dashed rounded">
					  <h1>Complete Your Interview</h1>
					  <p>
					  Show up for your car with your approval complete.
					  </p>
					  <p><a href="interview.php" class="btn btn-danger btn-lg"><i class="fa fa-plus-circle"></i> Start Interview</a></p>
					</div>


							
						</div><!-- End div .box-info -->
					</div>
					
					<div class="col-sm-4">
						<!-- Begin user profile -->
						<div class="box-info text-center user-profile-2">
							<div class="header-cover">
								<img src="images/user-bg.jpg" alt="User cover">
							</div>
							<div class="user-profile-inner">
								<h4 class="white">Hi, <?php echo $wfhuser_approval_fullname_txt;  ?></h4>
<?php if($wfhuser_fbpicture){ ?>
<img src="<?php echo $wfhuser_fbpicture; ?>" class="img-circle profile-avatar" alt="User avatar" title="No Facebook Connect">
<?php }else{ ?>
<img src="assets/img/avatar/avatar-profile.png" class="img-circle profile-avatar" alt="User avatar" title="facebook picture">
<?php } ?>
								<h5 id="wfhuser_pending_status">Pending Final Approval</h5>
									
								<!-- User button -->
								<div class="user-button">
									<div class="row">
										<div class="col-md-6">
											<a href="https://apps.facebook.com/wefinancehere/" class="btn btn-primary btn-sm btn-block"><i class="fa fa-facebook-square"></i> Facebook Connect</a>
										</div>
										<div class="col-md-6">
											<a  href="application.php" target="_parent" class="btn btn-default btn-sm btn-block"><i class="fa fa-user"></i> Application View</a>
										</div>
									</div>
								</div><!-- End div .user-button -->
							</div><!-- End div .user-profile-inner -->
						</div><!-- End div .box-info -->
						<!-- End user profile -->
					</div><!-- End div .col-sm-4 -->
				</div><!-- End div .row -->
				
				
				<div class="row">
					<div class="col-md-6">
						<!-- Weather widget -->
						<div class="box-info full weather-widget">
							<img src="images/weather-bg.jpg" class="img-responsive" alt="Weather city">
							<div class="overlay-weather-info">
								<h4>UPCOMING VEHICLE APPOINTMENT</h4>
								<div class="weather-info-city">
									<h4><i class="fa fa-map-marker"></i> Atlanta, Georgia</h4>
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-road"></i>
										</div>
										<div class="col-xs-9">
											<h5>Appointment Time</h5>
											<h1>09<sup>&brvbar;</sup>00 a.m.</h1>
										</div>
									</div><!-- End div .row -->
								</div><!-- End div .weather-info-city -->
							</div><!-- End div .overlay-weather-info -->
						</div><!-- End div .box-info -->
						<!-- End weather widget -->
						
						
						
						
						<!-- Begin Bar cart by country -->
						<div class="box-info success">
							<!-- Additional button -->
							
							<!-- Call morris bar with selector #morris-bar-home -->
							<div id="morris-bar-home" style="height: 168px;"></div>
							<!-- End morris bar selector -->
							
							<!-- Additional info -->
							<div class="additional">
								<div class="list-box-info">
									<ul>
									  <li>
										<span class="label label-success">$256.00 A Month</span>
										2004 Honda Accord LX
									  </li>
									  <li>
										<span class="label label-danger">$300.00 A Month</span>
										2016 Nissan Maxima
									  </li>
									  <li>
										<span class="label label-warning">$425.00 A Month</span>
										2015 KIA Optima
									  </li>
									</ul>
								</div>
							</div><!-- End div .additional -->
						</div><!-- End div .box-info -->
						<!-- End Bar cart by country -->
					</div><!-- End div .col-sm-6 -->
					
					<div class="col-md-6">
					<!-- Begin timeline -->
						<h4>Upcoming Appointments</h4>
						<div class="the-timeline">
							<ul>
								<li>
									<div class="the-date">
										<span>20</span>
										<small>Oct</small>
									</div>
									<h4>2010 Mini-Cooper S</h4>
									<p>
									Please Bring your driver licenses, last two checkstubs, and your downpayment on 10/20/2016 3:00
									</p>
								</li>
								<li>
									<div class="the-date">
										<span>21</span>
										<small>Jan</small>
									</div>
									<h4>2016 Nissan Maxima</h4>
									<div class="videoWrapper">
									<iframe src="//player.vimeo.com/video/85847275?title=0&amp;byline=0&amp;portrait=0"></iframe>
									</div>
									<p>
									Please Bring your driver licenses, last two checkstubs, and your downpayment on 10/21/2016 3::00
									</p>
								</li>
								<li>
									<div class="the-date">
										<span>20</span>
										<small>Nov</small>
									</div>
								<h4>2016 Nissan Maxima @McDonough NIssan</h4>

									<p>
			Please Bring your driver licenses, last two checkstubs, and your downpayment on 09/01/2016 14:32
. 
									</p>
								</li>
							</ul>
						</div><!-- End div .the-timeline -->
						<!-- End timeline -->
					</div><!-- End div .col-sm-6 -->
				</div><!-- End div .row -->
				
				
				
						<div class="row">
							<div class="col-sm-6">
								<!-- Begin tab comment and popular posts -->
								<div class="box-info full">
									<!-- Tab comments and popular posts -->
									<ul class="nav nav-tabs nav-justified">
									  <li class="active"><a href="#comments" data-toggle="tab"><i class="fa fa-comments"></i> Text Messages Sent.</a></li>
									  <li><a href="#popular" data-toggle="tab"><i class="fa fa-star"></i> Popular Posts</a></li>
									</ul>

									<!-- Tab panes -->
									<div class="tab-content">
									  <!-- Pane comments -->
									  <div class="tab-pane active animated fadeInRight" id="comments">
										<!-- Begin scroll wrappper -->
										<div class="scroll-widget">
											<ul class="media-list">
											  <li class="media">
												<a class="pull-left" href="#fakelink">
												  <img class="media-object" src="assets/img/avatar/2.jpg" alt="Avatar">
												</a>
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Tone Loc</a> <small>October 8, <?php echo date('Y'); ?> 02:19 PM</small></h4>
												  <p>All you have to do is show and I got you.</p>
												</div>
											  </li>
											  <li class="media">
												<a class="pull-left" href="#fakelink">
												  <img class="media-object" src="assets/img/avatar/1.jpg" alt="Avatar">
												</a>
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Johnny Dynomite</a> <small>October 4, <?php echo date('Y'); ?> 12:37 PM</small></h4>
												  <p>Looking forward to showing you your next car.</p>
												</div>
											  </li>
											  <li class="media">
												<a class="pull-left" href="#fakelink">
												  <img class="media-object" src="assets/img/avatar/5.jpg" alt="Avatar">
												</a>
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Marty Copeland</a> <small>October 10, <?php echo date('Y'); ?> 05:48 PM</small></h4>
												  <p>Appointment at such and such</p>
												</div>
											  </li>
											  <li class="media">
												<a class="pull-left" href="#fakelink">
												  <img class="media-object" src="assets/img/avatar/4.jpg" alt="Avatar">
												</a>
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Ari Rusmanto</a> <small>January 17, 2014 05:35 PM</small></h4>
												  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
												</div>
											  </li>
											  <li class="media">
												<a class="pull-left" href="#fakelink">
												  <img class="media-object" src="assets/img/avatar/3.jpg" alt="Avatar">
												</a>
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Jenny Doe</a> <small>January 17, 2014 05:35 PM</small></h4>
												  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
												</div>
											  </li>
											</ul>
										</div><!-- End div .scroll-widget -->
										<div class="box-footer">
										<p><a href="#fakelink"><i class="fa fa-share"></i> See all comments</a></p>
										</div>
									  </div><!-- End div .tab-pane -->
									  
									  <!-- Pane popular posts -->
									  <div class="tab-pane animated fadeInRight" id="popular">
										<!-- Begin scroll wrappper -->
										<div class="scroll-widget">
											<ul class="media-list">
											  <li class="media">
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Cras sit amet erat sit amet lacus egestas</a>
												  <br /><small>January 17, 2014 at 11:24 PM</small></h4>
												  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
												</div>
											  </li>
											  <li class="media">
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Cras sit amet erat sit amet lacus egestas</a>
												  <br /><small>January 17, 2014 at 08:24 AM</small></h4>
												  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
												</div>
											  </li>
											  <li class="media">
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Cras sit amet erat sit amet lacus egestas</a>
												  <br /><small>January 17, 2014 at 05:24 AM</small></h4>
												  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
												</div>
											  </li>
											  <li class="media">
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Cras sit amet erat sit amet lacus egestas</a>
												  <br /><small>January 17, 2014 at 11:24 PM</small></h4>
												  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
												</div>
											  </li>
											  <li class="media">
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Cras sit amet erat sit amet lacus egestas</a>
												  <br /><small>January 17, 2014 at 08:24 AM</small></h4>
												  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
												</div>
											  </li>
											  <li class="media">
												<div class="media-body">
												  <h4 class="media-heading"><a href="#fakelink">Cras sit amet erat sit amet lacus egestas</a>
												  <br /><small>January 17, 2014 at 05:24 AM</small></h4>
												  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
												</div>
											  </li>
											</ul>
										</div><!-- End div .scroll-widget -->
										<div class="box-footer">
											  <p><a href="#fakelink"><i class="fa fa-share"></i> See all posts</a></p>
										</div>
									  </div><!-- End div .tab-pane -->
									</div><!-- End div .tab-content -->
								</div><!-- End div .box-info .full -->
								<!-- End tab comment and popular posts -->
							</div><!-- End div .col-sm-6 -->
							
							
							<div class="col-sm-6">
								<!-- Project progress -->
								<div class="box-info">
									<h2><strong>Project</strong> Progress</h2>
									<p>PROJECT FOR COMPANY A <strong>80%</strong></p>
									<div class="progress progress-sm">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
										<span class="sr-only">80&#37; Complete</span>
									  </div>
									</div>
									<p>BACKUP FROM SERVER  <strong>80%</strong></p>
									<div class="progress progress-sm">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
										<span class="sr-only">55&#37; Complete</span>
									  </div>
									</div>
									<p>ENTRY DATA FOR MASTER SYSTEM <strong>25%</strong></p>
									<div class="progress progress-sm">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
										<span class="sr-only">25&#37; Complete</span>
									  </div>
									</div>
									<p>MAKE SALES REPORT <strong>55%</strong></p>
									<div class="progress progress-sm">
									  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
										<span class="sr-only">55&#37; Complete</span>
									  </div>
									</div>
									<p>PROJECT FOR COMPANY ABC <strong>90%</strong></p>
									<div class="progress progress-sm">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
										<span class="sr-only">90&#37; Complete</span>
									  </div>
									</div>
								</div><!-- End div .box-info -->
							</div><!-- End div .col-sm-6 -->
						</div><!-- End div .row -->
				
				
				
				
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