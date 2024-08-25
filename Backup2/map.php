<?php require_once("db_connect.php"); ?>
<?php include("inc_sessions.php"); ?>
<?php include("funkshons.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Deal Matrix</title>
	<link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="mobile/demos/css/themes/default/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="mobile/demos/_assets/css/jqm-demos.css">



	<!-- Libs CSS -->
	<link href="css/bootstrap.css" rel="stylesheet"> 		
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />

	<!-- link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" -->

	
	<!-- Template CSS -->
	<link href="css/style.css" rel="stylesheet"> 

	<!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,800&amp;subsetting=all' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="./js/html5shiv.js"></script>
		<script src="./js/respond.js"></script>
	<![endif]-->
    <style type = "text/css">
	.ui-panel-inner{height:20000px !important;}
	.ui-panel{width: 50% !important;}
	/*
	 #first_form,#second_form, #third_form, #home_section, #prev_home_section, #work_section, #prev_work_section{display:none;
	 */
	}
    </style>
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>


<div data-role="page" class="jqm-demos" data-quicklinks="true" data-spy="scroll" data-target=".navigation">

	<!-- Start Header -->
	<header id="header">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<!-- Start Logo / Text -->
					<a class="navbar-brand text-logo" href="#"><i class="icon-signout"></i>Everyones Approved @<?php echo $row_dealer_url['company']; ?></a>
					<!-- End Logo / Text -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
			  </div>
				<!-- Start Navigation -->
				<div class="navigation navbar-collapse collapse">
					<ul class="nav navbar-nav menu-right">
					  <li class="active"><a href="#header">Home</a></li>
					  <li><a href="#intro">Approvals</a></li>
					  <li><a href="#portfolio">Inventory</a></li>
					  <li><a href="#features">Choice</a></li>
					  <li><a href="#snippets">Snippets</a></li>
					  <li><a href="#faq">FAQ</a></li>
					  <li><a href="#pricing">Price</a></li>
					</ul>
				</div>
				<!-- End Navigation  -->
			</div>
		</nav>
	</header>
	<!-- End Header -->
				<script type="text/javascript">
				
				
				</script>
<!-- Start Banner -->	
<div id="banner">
    <div class="banner-inner">

        <div class="container"><!-- Start Container -->


            
                <?php include("content/inc.banner.php"); ?>
            
            <div class="divider50"></div>
        </div><!-- End Container -->

    </div>
</div>
<!-- End Banner -->















	<!-- Start Snippets -->
	<section id="dealers" class="section">
		<div class="container">	

		
			<div class="row">
				<div class="col-lg-12">
					<div>
						<h1>Quick <strong>Snippets</strong></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquando posse.</p>
					</div>
				</div>
		  	</div>





			<!-- Start Tabs -->
			<div class="row">
            
            
            
				<ul class="nav nav-tabs">
				<li class="active"><a href="#first-tab" data-toggle="tab"><i class="fa fa-video-camera"></i> Introductory Video</a></li><!--Tab #1 -->
			    <li><a href="#second-tab" data-toggle="tab"><i class="fa fa-cube"></i> Random Text</a></li><!--Tab #2 -->
				<li><a href="#third-tab" data-toggle="tab"><i class="fa fa-group"></i> The Team</a></li><!--Tab #3 -->
				</ul>			
				
                
                
                <div class="tab-content">
					<!-- Introductory Video -->
					<div class="tab-pane active" id="first-tab">
						<div class="row">
							<div class="video-container">
								<iframe src="http://player.vimeo.com/video/75188030"></iframe>
							</div>
						</div>
					</div>
					<!-- End Introductory Video -->
					<!-- Random Text -->
					<div class="tab-pane" id="second-tab">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<img src="img/side-img.png" class="img-responsive" alt="" title="" />
							</div>	
							<div class="col-lg-6 col-md-6">
						    <h2>Introductory Text</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
								<ul class="normal-list">
									<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
									<li>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
									<li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut,</li>
								</ul>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
							</div>	
						</div>
					</div>
					<!-- End Random Text -->
					<!-- Members Listing -->
					<div class="tab-pane" id="third-tab">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 members-holder">
								<!-- Start Member Details  -->
								<div class="members-detail">
									<img src="img/thumb2.png" alt="" class="img-responsive" title=""><!-- Member Image  -->
									<h4>John Smith</h4><!-- Member Name  -->
									<p>Founder &amp; Money Maker</p><!-- Member Title  -->
									<ul class="members-social"><!-- Member Social Media Links  -->
										<li><a href="mailto:mail@example.com"><i class="fa fa-envelope fa-fw"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter fa-fw"></i></a></li>
										<li><a href="#"><i class="fa fa-facebook fa-fw"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin fa-fw"></i></a></li>
									</ul>
								</div>
								<!-- End Member Details  -->
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 members-holder">
							  <div class="members-detail">
									<img src="img/thumb2.png" alt="" class="img-responsive" title="">
									<h4>Sarah Mchaul</h4>
									<p>Graphic Designer &amp; UI Expert</p>
									<ul class="members-social">
										<li><a href="mailto:mail@example.com"><i class="fa fa-envelope fa-fw"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter fa-fw"></i></a></li>
										<li><a href="#"><i class="fa fa-facebook fa-fw"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin fa-fw"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 members-holder">
							  <div class="members-detail">
									<img src="img/thumb2.png" alt="" class="img-responsive" title="">
									<h4>Sales</h4>
									<p>Lead Web Designer</p>
									<ul class="members-social">
										<li><a href="mailto:mail@example.com"><i class="fa fa-envelope fa-fw"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter fa-fw"></i></a></li>
										<li><a href="#"><i class="fa fa-facebook fa-fw"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin fa-fw"></i></a></li>
									</ul>
								</div>
							</div>
						</div>		
					</div>
					<!-- End Members Listing -->
				</div>	
			
            
            
            </div>
			<!-- End Tabs -->










		</div>
	</section>
	<!-- End Snippets -->









<!-- Start Intro -->
  <section id="intro" class="section">
		<div class="container">
			<div id="state_inventory" class="row">
				<!-- Main Points -->
				<div id="state_dealers" class="col-lg-6 col-md-6 col-sm-6">
					
                    <div class="main-point">
						<i class="fa fa-cubes"></i>
						<h4>Client Oriented</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					</div>
                    
                    
					<div class="main-point">
						<i class="fa fa-male"></i>
						<h4>Easy way to capture lead email</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					</div>
					<div class="main-point main-point-last">
						<i class="fa fa-codepen"></i>
						<h4>Easy Adaptable</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					</div>
				</div>
				<!-- End Main Points -->
				<!-- Side Image -->
				<div class="col-lg-6 col-md-6 col-sm-6">
                	<div id="info_right_box">
					<img src="img/devices.jpg" class="img-responsive" alt="" title="" style="position:fixed;" />
                    </div>
				
                </div>
				<!-- End Side Image -->
			</div>
			
			<hr/>
			
			<!-- Content Row -->
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<img src="img/imac-mockup.png" class="img-responsive" alt="" title="" />
				</div>	
				<div class="col-lg-6 col-md-6">
			    <h2>Introductory Text</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
					<ul class="normal-list">
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
						<li>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
						<li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut,</li>
					</ul>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
				</div>	
			</div>
			<!-- End Content Row -->
			
			<div class="divider50"></div>
			
			<div class="row">
				<div class="col-lg-4 col-md-4 hidden-xs">
					<!-- Left Column : Assistance -->
					<div class="side-text text-center">
						<i class="fa fa-phone fa-4x"></i>
						<h4>Need More Assistance</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<!-- End Left Column -->
				</div>
				<div class="col-lg-8 col-md-8">
				  <div class="row">
						<div class="highlight">
							<!--Left Bullet Points -->
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Attractive with a modern touch</li>
									<li>Full Support</li>
								</ul>
							</div>
							<!--End Left Bullet Points -->
							<!--Right Bullet Points -->
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">
									<li>Many addon features</li>
									<li>Fully responsive &amp; adaptive</li>
									<li>SEO optimized</li>
									<li>Attractive with a modern touch</li>
									<li>Full Support</li>
								</ul>
							</div>
							<!--End Right Bullet Points -->
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Intro -->








	
	
	<?php include("inc.temp.php"); ?>




<div data-role="footer" data-position="fixed">
	<!-- Start Intro -->
<div class="row">
                        <div class="col-lg-12">
                            <!--Subscribe Form -->
                <div style="float:left;">
                <p><strong>Left</strong> panel examples</p>
                <a href="#leftpanel3" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">My Approval</a>
                <a href="#leftpanel1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Reveal</a>
                <a href="#leftpanel2" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Push</a>
        		</div>
                
                <div style="float:right;">
        		<p><strong>Right</strong> panel examples</p>
                <a href="#rightpanel3" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Sales Desk</a>
                <a href="#rightpanel1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Reveal</a>
                <a href="#rightpanel2" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Push</a>
                </div>


                            <!--End Subscribe Form -->
                        </div>
            </div>

</div>


</div><!-- /page -->



	<!-- leftpanel3  -->
	<div data-role="panel" id="leftpanel3" data-position="left" data-display="overlay" data-theme="a">

        <h3>Left Panel: Overlay</h3>
        <p>This panel is positioned on the left with the overlay display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
        <p>
        	<input name="amtprincipal" id="amtprincipal" type="text" value="">
            <br />

        </p>
        <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>

	</div><!-- /leftpanel3 -->



	<div data-role="panel" id="leftpanel1" data-position="left" data-display="overlay" data-theme="a">

        <h3>Left Panel: Reveal</h3>
        <p>This panel is positioned on the left with the reveal display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
        <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>

	</div><!-- /leftpanel1 -->

	<!-- leftpanel2  -->
	<div data-role="panel" id="leftpanel2" data-position="left" data-display="overlay"  data-theme="a">

        <h3>Left Panel: Push</h3>
        <p>This panel is positioned on the left with the push display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
        <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>

	</div><!-- /leftpanel2 -->

	<!-- rightpanel1  -->
	<div data-role="panel" id="rightpanel1" data-position="right" data-display="reveal" data-theme="b">

        <h3>Right Panel: Reveal</h3>
        <p>This panel is positioned on the right with the reveal display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
        <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>

	</div><!-- /rightpanel1 -->

	<!-- rightpanel2  -->
	<div data-role="panel" id="rightpanel2" data-position="right" data-display="push" data-theme="b">

        <h3>Right Panel: Push</h3>
        <p>This panel is positioned on the right with the push display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
        <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>

	</div><!-- /rightpanel2 -->

	<!-- rightpanel3  -->
	<div data-role="panel" id="rightpanel3" data-position="right" data-display="overlay" data-theme="b">

        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>


		
        <?php include("content/inc.structure.php"); ?>
	</div><!-- /rightpanel3 -->
    
    
    
	<script src="../dealers/js/jquery-2.1.1.js"></script>
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script><!--Packed with many functionalies such as carousel slider, responsivity, tabs, drop downs, buttons, and many other features-->


<script src="mobile/demos/js/jquery.js"></script>
<script src="mobile/demos/_assets/js/index.js"></script>
<script src="mobile/demos/js/jquery.mobile-1.4.5.min.js"></script>
<script id="panel-init">
	$(function() {
		$( "body>[data-role='panel']" ).panel();
	});
</script>
	<script src="js/modernizr.min.js" type="text/javascript"></script><!--Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.-->
	<script src="js/jquery.prettyPhoto.js" type="text/javascript" ></script><!-- Script for Lightbox Image  -->
	<script src="js/custom.js" type="text/javascript"></script><!-- Script File containing all customizations  -->
	<script language="javascript" type="text/javascript" src="js/preapproveme.js"></script>
    <script src="js/incalculate.js"></script>
	<!-- End Js Files  -->

</body>
</html>
