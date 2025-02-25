<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>External panels - jQuery Mobile Demos</title>
	<link rel="shortcut icon" href="mobile/demos/favicon.ico">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="mobile/demos/css/themes/default/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="mobile/demos/_assets/css/jqm-demos.css">



	<!-- Libs CSS -->
	<link href="css/bootstrap.css" rel="stylesheet"> 		
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />
	
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
    
</head>
<body>

<div data-role="page" class="jqm-demos" data-quicklinks="true" data-spy="scroll" data-target=".navigation">

	<!-- Start Header -->
	<header id="header">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Start Logo / Text -->
					<a class="navbar-brand text-logo" href="#"><i class="icon-signout"></i>Sales</a>
					<!-- End Logo / Text -->
			  </div>
				<!-- Start Navigation -->
				<div class="navigation navbar-collapse collapse">
					<ul class="nav navbar-nav menu-right">
						<li class="active"><a href="#header">Home</a></li>
					  <li><a href="#intro">Intro</a></li>
					  <li><a href="#portfolio">Portfolio</a></li>
					  <li><a href="#features">Features</a></li>
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

	<!-- Start Banner -->	
    <div id="banner">
		<div class="banner-inner">
			<div class="container">
				<div class="row">
					<!-- Start Banner Optin Form-->
				  <div class="col-lg-4 col-md-4 col-sm-5">
						<form id="banner-form" method="post" action="banner-form.php">
							<div class="banner-optin vertical">
								<h1>SPELL OUT <strong>YOUR</strong> CAR TITLE!</h1>
								<div class="form-group">
									<input name="fname" id="fname" type="text" class="form-control" required placeholder="Your First Name">
								</div>

								<div class="form-group">
									<input name="lname" id="lname" type="text" class="form-control" required placeholder="Your Last Name">
								</div>
								<div class="form-group">
									<input name="useremail" id="useremail" type="text" class="form-control" required placeholder="Your e-mail">
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

					<div class="col-md-8 col-sm-8 col-sm-7">
						<!-- Carousel -->
						<div id="banner-carousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#banner-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#banner-carousel" data-slide-to="1"></li>
							</ol>
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item header-text active">
									<div class="col-xs-5 text-center">
										<img alt="" title="" class="img-responsive" src="img/iphone1.png">
									</div>
									<div class="col-xs-7">
										<h2>Landing Page For Any Purpose.</h2>
										<p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
										<ul class="green-arrow">
											<li>Many addon features</li>
											<li>Fully responsive &amp; adaptive</li>
											<li>SEO optimized</li>
											<li>Full Support</li>
										</ul>
									</div>
								</div>
								<div class="item header-text">
									<div class="col-xs-7">
										<h1><strong>Increase</strong> Conversion Rates</h1>
										<p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
										<a href="#" class="btn btn-primary btn-lg btn-bluebg">Get started</a>					
									</div>
									<div class="col-xs-5 text-center">
										<img alt="" title="" class="img-responsive" src="img/iphone1.png">
									</div>
								</div>
							</div>						
						</div><!-- /carousel -->
					</div>
				</div>
				<div class="divider50"></div>
			</div>
		</div>
    </div>
	<!-- End Banner -->


	<!-- Start Intro -->
  <section id="intro" class="section">
		<div class="container">

            <div class="row">
                        <div class="col-lg-12">
                            <!--Subscribe Form -->
                                    <p><strong>Left</strong> panel examples</p>
                <a href="#leftpanel3" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Overlay</a>
                <a href="#leftpanel1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Reveal</a>
                <a href="#leftpanel2" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Push</a>
        
        <p><strong>Right</strong> panel examples</p>
                <a href="#rightpanel3" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Overlay</a>
                <a href="#rightpanel1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Reveal</a>
                <a href="#rightpanel2" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Push</a>
        
        
                            <!--End Subscribe Form -->
                        </div>
            </div>
		
        </div>
</section>

	<!-- Start Intro -->
  <section id="intro" class="section">
		<div class="container">
			<div class="row">
				<!-- Main Points -->
				<div class="col-lg-6 col-md-6">
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
			  <div class="col-lg-6 col-md-6">
					<img src="img/devices.jpg" class="img-responsive" alt="" title="" />
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
	
	<!-- Portfolio -->
    <section id="portfolio" class="bg-grey section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
						<h1>Our Work</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquando posse.</p>
					</div>
				</div>
		  </div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-3">
					<!-- Start Portfolio Item -->
					<div class="hover-details">
						<img class="img-responsive img-thumbnail" src="img/thumbs/thumb1.jpg" alt="" title="" /><!-- Image Thumbnail  -->
						<div class="img-cover">
							<a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
							<h3>Item Description</h3><!-- Image Description  -->
						</div>
					</div>
					<!-- End Portfolio Item  -->
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3">
					<!-- Start Portfolio Item -->
				  <div class="hover-details">
						<img class="img-responsive img-thumbnail" src="img/thumbs/thumb2.jpg" alt="" title="" /><!-- Image Thumbnail  -->
						<div class="img-cover">
							<a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
							<h3>Item Description</h3><!-- Image Description  -->
						</div>
					</div>
					<!-- End Portfolio Item  -->
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3">
					<!-- Start Portfolio Item -->
				  <div class="hover-details">
						<img class="img-responsive img-thumbnail" src="img/thumbs/thumb3.jpg" alt="" title="" /><!-- Image Thumbnail  -->
						<div class="img-cover">
							<a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
							<h3>Item Description</h3><!-- Image Description  -->
						</div>
					</div>
					<!-- End Portfolio Item  -->
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3">
					<!-- Start Portfolio Item -->
				  <div class="hover-details">
						<img class="img-responsive img-thumbnail" src="img/thumbs/thumb4.jpg" alt="" title="" /><!-- Image Thumbnail  -->
						<div class="img-cover">
							<a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
							<h3>Item Description</h3><!-- Image Description  -->
						</div>
					</div>
					<!-- End Portfolio Item  -->
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-3">
					<!-- Start Portfolio Item -->
					<div class="hover-details">
						<img class="img-responsive img-thumbnail" src="img/thumbs/thumb5.jpg" alt="" title="" /><!-- Image Thumbnail  -->
						<div class="img-cover">
							<a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
							<h3>Item Description</h3><!-- Image Description  -->
						</div>
					</div>
					<!-- End Portfolio Item  -->
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3">
					<!-- Start Portfolio Item -->
				  <div class="hover-details">
						<img class="img-responsive img-thumbnail" src="img/thumbs/thumb6.jpg" alt="" title="" /><!-- Image Thumbnail  -->
						<div class="img-cover">
							<a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
							<h3>Item Description</h3><!-- Image Description  -->
						</div>
					</div>
					<!-- End Portfolio Item  -->
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3">
					<!-- Start Portfolio Item -->
				  <div class="hover-details">
						<img class="img-responsive img-thumbnail" src="img/thumbs/thumb7.jpg" alt="" title="" /><!-- Image Thumbnail  -->
						<div class="img-cover">
							<a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
							<h3>Item Description</h3><!-- Image Description  -->
						</div>
					</div>
					<!-- End Portfolio Item  -->
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3">
					<!-- Start Portfolio Item -->
				  <div class="hover-details">
						<img class="img-responsive img-thumbnail" src="img/thumbs/thumb8.jpg" alt="" title="" /><!-- Image Thumbnail  -->
						<div class="img-cover">
							<a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
							<h3>Item Description</h3><!-- Image Description  -->
						</div>
					</div>
					<!-- End Portfolio Item  -->
				</div>
			</div>		
		</div>
	</section>
	<!-- End Portfolio -->
	
	<!-- Start Features -->
	<section id="features" class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
						<h1><strong>Best Top</strong> Features</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquando posse.</p>
					</div>
				</div>
		  </div>
			<div class="divider35"></div>
			<div class="row">
				<!-- Features Listing -->
				<div class="col-lg-8 col-md-8">
					<div class="row">
						<!-- Features List -->
						<div class="col-lg-6 col-md-6">
							<div class="features-list">
								<i class="fa fa-paw fa-5x"></i><!-- Features Icon -->
								<h4>Responsive</h4><!-- Features Title -->
								<p>Lorem Ipsum has been the industry's standard dummy text since the 1500s.</p><!-- Features Details -->
							</div>
						</div>
						<!-- End Features List -->
						<!-- Features List -->
						<div class="col-lg-6 col-md-6">
							<div class="features-list">
								<i class="fa fa-slack fa-5x"></i><!-- Features Icon -->
								<h4>User Friendly</h4><!-- Features Title -->
								<p>Lorem Ipsum has been the industry's standard dummy text since the 1500s.</p><!-- Features Details -->
							</div>
						</div>
						<!-- End Features List -->
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6">
						<!-- Features List -->
							<div class="features-list">
								<i class="fa fa-sliders fa-5x"></i><!-- Features Icon -->
								<h4>HTML5 / CSS3</h4><!-- Features Title -->
								<p>Lorem Ipsum has been the industry's standard dummy text since the 1500s.</p><!-- Features Details -->
							</div>
						</div>
						<!-- End Features List -->
						<!-- Features List -->
						<div class="col-lg-6 col-md-6">
							<div class="features-list">
								<i class="fa fa-file fa-5x"></i><!-- Features Icon -->
								<h4>Bootstrap 3.0</h4><!-- Features Title -->
								<p>Lorem Ipsum has been the industry's standard dummy text since the 1500s.</p><!-- Features Details -->
							</div>
						</div>
						<!-- End Features List -->
					</div>
					<div class="row last-row">
						<!-- Features List -->
						<div class="col-lg-6 col-md-6">
							<div class="features-list">
								<i class="fa fa-database fa-5x"></i><!-- Features Icon -->
								<h4>w3c Compliant</h4><!-- Features Title -->
								<p>Lorem Ipsum has been the industry's standard dummy text since the 1500s.</p><!-- Features Details -->
							</div>
						</div>
						<!-- End Features List -->
						<!-- Features List -->
						<div class="col-lg-6 col-md-6">
							<div class="features-list">
								<i class="fa fa-cog fa-5x"></i><!-- Features Icon -->
								<h4>Clean / Minimal</h4><!-- Features Title -->
								<p>Lorem Ipsum has been the industry's standard dummy text since the 1500s.</p><!-- Features Details -->
							</div>
						</div>
						<!-- End Features List -->
					</div>
				</div>
				<!-- End Features Listing -->
				<!-- Side Features Image -->
			  <div class="col-lg-4 col-md-4">
					<img src="img/mobile.png" class="img-responsive" alt="" title="" />
				</div>
				<!-- End Side Features Image -->
			</div>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Note!</strong> You can change the layout into 3 columns with all services icons instead of only 2 columns.
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- End Features -->

	<!-- More Features -->	
	<section id="more-features" class="section bg-grey">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="text-center">What if there were more features ?</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
				</div>
		  </div>
			<div class="row">
				<!-- More Feature Column -->
				<div class="col-lg-4  col-md-4 col-sm-4 feature">
					<i class="fa fa-history"></i><!-- Features Icon -->
					<h4>Client Oriented</h4><!-- Features Title -->
					<div class="bubble"><!-- Features Details -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<ul class="green-arrow">
							<li>Many addon features</li>
							<li>Fully responsive &amp; adaptive</li>
							<li>SEO optimized</li>
							<li>Attractive with a modern touch</li>
						</ul>
					</div>
				</div>
				<!-- End More Feature Column -->
				<!-- More Feature Column -->
			  <div class="col-lg-4  col-md-4 col-sm-4 feature">
					<i class="fa fa-briefcase"></i><!-- Features Icon -->
					<h4>Easy to use</h4><!-- Features Title -->
					<div class="bubble"><!-- Features Details -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<ul class="green-arrow">
							<li>Many addon features</li>
							<li>Fully responsive &amp; adaptive</li>
							<li>SEO optimized</li>
							<li>Attractive with a modern touch</li>
						</ul>
					</div>
				</div>
				<!-- End More Feature Column -->
				<!-- More Feature Column -->
			  <div class="col-lg-4  col-md-4 col-sm-4 feature">
					<i class="fa fa-coffee"></i><!-- Features Icon -->
					<h4>Flexible</h4><!-- Features Title -->
					<div class="bubble"><!-- Features Details -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<ul class="green-arrow">
							<li>Many addon features</li>
							<li>Fully responsive &amp; adaptive</li>
							<li>SEO optimized</li>
							<li>Attractive with a modern touch</li>
						</ul>
					</div>
				</div>
				<!-- End More Feature Column -->
			</div>	
		</div>
	</section>
	<!-- End More Features -->

	<!-- Start Snippets -->
	<section id="snippets" class="section">
		<div class="container">			
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
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
	
	<!--Subscribe -->
	<section class="section bg-blue">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
						<h1><strong>Subscribe</strong> Freely</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
					</div>
				</div>
		  </div>
			<div class="row">
				<div class="col-lg-12">
					<!--Subscribe Form -->
					<form id="middle-form" method="post" action="middle-form.php">
						<div class="middle-optin">
							<div class="row">
								<div class="form-group col-lg-3">
									<input name="middle-optin-name" id="middle-optin-name" type="text" class="form-control" required placeholder="Your Name">
								</div>
								<div class="form-group col-lg-3">
									<input name="middle-optin-email" id="middle-optin-email" type="text" class="form-control" required placeholder="Your E-mail">
								</div>
								<div class="form-group col-lg-3">
									<input name="middle-optin-phone" id="middle-optin-phone" type="text" class="form-control" placeholder="Your Phone Phone">
								</div>
								<div class="form-group col-lg-3">
									<button type="submit" class="btn btn-default black-btn">Subscribe Now</button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-process-middle"></div>
							</div>
						</div>
					</form>
					<!--End Subscribe Form -->
				</div>
			</div>
		</div>
	</section>
	<!--End Subscribe -->

	<!--Testimonials -->
	<section id="testimonials" class="section testimonial-bg cover">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
						<h1>Awesome <strong>Testimonials</strong></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquando posse.</p>
					</div>
				</div>
		  </div>
			<div class="row">
				<div class='col-md-12'>
					<!-- Start Testimonial Slider -->
					<div class="carousel slide carousel-mod" data-ride="carousel" id="testimonial">
						<div class="carousel-inner">
							<!-- Testimonial #1  -->
							<div class="item active">
								<div class="row">
									<div class="col-lg-12">
										<div class="testimonial-inner">
											<img src="img/testi1.png" alt="" title="" /><!-- Testimonial Image  -->
											<p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p><!-- Tesimonial  -->
											<small>Someone famous</small><!-- Testimonial Author  -->
										</div>
									</div>
								</div>
							</div>
							<!-- End Testimonial #1  -->
							<div class="item">
								<div class="row">
									<div class="col-lg-12">
										<div class="testimonial-inner">
											<img src="img/testi2.png" alt="" title="" /><!-- Testimonial Image  -->
											<p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p><!-- Tesimonial  -->
											<small>Someone famous</small><!-- Testimonial Author  -->
										</div>
									</div>
								</div>
							</div>				
							<div class="item">
								<div class="row">
									<div class="col-lg-12">
										<div class="testimonial-inner">
											<img src="img/testi3.png" alt="" title="" /><!-- Testimonial Image  -->
											<p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p><!-- Tesimonial  -->
											<small>Someone famous</small><!-- Testimonial Author  -->
										</div>
									</div>
								</div>
							</div>					
						</div>
						<!-- Testimonial Navigation  -->
						<ol class="carousel-indicators">
							<li data-target="#testimonial" data-slide-to="0" class="active"></li>
							<li data-target="#testimonial" data-slide-to="1"></li>
							<li data-target="#testimonial" data-slide-to="2"></li>
						</ol>
						<!-- End Testimonial Navigation  -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonials -->

	<!-- Start Partners -->
	<section id="partners" class="section20 bg-dark hidden-xs">
		<div class="container">
			<div class="row">
					<ul class="partners-logo">
						<li class="col-md-2 col-sm-2"><a href="#"><img src="img/logo1.png" alt="" title="" /></a></li><!-- Logo Image -->
				    <li class="col-md-2 col-sm-2"><a href="#"><img src="img/logo2.png" alt="" title="" /></a></li>
					  <li class="col-md-2 col-sm-2"><a href="#"><img src="img/logo3.png" alt="" title="" /></a></li>
					  <li class="col-md-2 col-sm-2"><a href="#"><img src="img/logo4.png" alt="" title="" /></a></li>
					  <li class="col-md-2 col-sm-2"><a href="#"><img src="img/logo1.png" alt="" title="" /></a></li>
						<li class="col-md-2 col-sm-2"><a href="#"><img src="img/logo2.png" alt="" title="" /></a></li>
					</ul>
			</div>
		</div>
	</section>
	<!-- End Partners -->

	<!-- Start FAQ -->
	<section id="faq" class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
						<h1>Frequently Asked Questions</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquando posse.</p>
					</div>
				</div>
		  </div>
			<div class="row">
				<div class="col-lg-7 col-md-7">
					<!-- Faq 1 -->
					<div class="panel " >
						<div class="panel-heading">
							<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq1"><i class="fa fa-plus-square"></i>What's the guarantee period ?</a></h4><!-- Faq Title -->
						</div>
						<div class="panel-collapse collapse in" id="faq1">
							<div class="panel-body"><!-- Faq Content -->
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
							</div>
						</div>
					</div>
					<!-- End Faq 1 -->
					<!-- Faq 2 -->
					<div class="panel " >
						<div class="panel-heading">
							<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2"><i class="fa fa-plus-square"></i>Can I buy this template and sell it ?</a></h4><!-- Faq Title -->
						</div>                
						<div class="panel-collapse collapse" id="faq2">
							<div class="panel-body"><!-- Faq Content -->
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
							</div>
						</div>
					</div>
					<!-- End Faq 2 -->
					<!-- Faq 3 -->
					<div class="panel " >
						<div class="panel-heading">
							<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq3"><i class="fa fa-plus-square"></i>24/7 support system available ?</a></h4><!-- Faq Title -->
						</div>                
						<div class="panel-collapse collapse" id="faq3">
							<div class="panel-body"><!-- Faq Content -->
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
							</div>
						</div>
					</div>
					<!-- End Faq 3 -->
					<!-- Faq 4 -->
					<div class="panel " >
						<div class="panel-heading">
							<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq4"><i class="fa fa-plus-square"></i>Why am I asking so many questions ?</a></h4><!-- Faq Title -->
						</div>		
						<div class="panel-collapse collapse" id="faq4">
							<div class="panel-body"><!-- Faq Content -->
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
							</div>
						</div>
					</div>
					<!-- End Faq 4 -->
					<!-- Faq 5 -->
					<div class="panel " >
						<div class="panel-heading">
							<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq5"><i class="fa fa-plus-square"></i>Is it mobile-friendly ?</a></h4><!-- Faq Title -->
						</div>                
						<div class="panel-collapse collapse" id="faq5">
							<div class="panel-body"><!-- Faq Content -->
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
							</div>
						</div>
					</div>
					<!-- End Faq 5 -->
				</div>
				<div class="col-lg-5 col-md-5">
					<img src="img/mobile2.png" class="img-responsive" alt="" title="" /><!-- Side Image -->
				</div>
			</div>
		</div>
	</section>	
	<!-- End FAQ -->
	
	<!-- Start Pricing -->
	<section id="pricing" class="bg-grey section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
						<h1>Pricing</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquando posse.</p>
					</div>
				</div>
		  </div>	
			
			<div class="divider50"></div>
			
			<div class="row">
				<!-- Price Column #1 -->
				<div class="col-sm-4 pricing-container">
					<div class="price-column">
						<h2>Silver Package</h2><!-- Package Title -->
						<h3>$14<sup>.99</sup> <span>/ month</span></h3><!-- Price -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p><!-- Description -->
						<!-- Package Features -->
						<ul>
							<li>Lorem ipsum dolor <i class="fa fa-check"></i></li>
							<li><del>Sit amet, consectetur nam</del> <i class="fa fa-times red-color"></i></li>
							<li><del>Magna adipiscing elit nam dui</del> <i class="fa fa-times red-color"></i></li>
							<li><del>Lacus ut accumsan sed</del> <i class="fa fa-times red-color"></i></li>
						</ul>
						<!-- End Package Features -->
						<div class="price-bottom">
							<a href="#" class="btn btn-default price-btn">Get Started</a><!-- Buy Button -->
						</div>
					</div>
				</div>
				<!-- End Price Column #1 -->
				<!-- Price Column #2 -->
			  <div class="col-sm-4 pricing-container featured-price">
					<div class="price-column large">
						<h2>Gold Package</h2><!-- Package Title -->
						<h3>$25<sup>.99</sup> <span>/ month</span></h3><!-- Price -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p><!-- Description -->
						<!-- Package Features -->
						<ul>
							<li>Lorem ipsum dolor <i class="fa fa-check"></i></li>
							<li>Lacus ut accumsan sed <i class="fa fa-check"></i></li>
							<li>Sit amet, consectetur nam <i class="fa fa-check"></i></li>
							<li>Magna adipiscing elit nam dui<i class="fa fa-check"></i></li>
							<li>Lacus ut accumsan sed <i class="fa fa-check"></i></li>
						</ul>
						<!-- End Package Features -->
						<div class="price-bottom">
							<a href="#" class="btn btn-default price-btn">Get Started</a><!-- Buy Button -->
						</div>
					</div>
				</div>
				<!-- End Price Column #2 -->
				<!-- Price Column #4 -->
			  <div class="col-sm-4 pricing-container">
					<div class="price-column">
						<h2>Platinum Package</h2><!-- Package Title -->
						<h3>$39<sup>.99</sup> <span>/ month</span></h3><!-- Price -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p><!-- Description -->
						<!-- Package Features -->
						<ul>
							<li>Lorem ipsum dolor <i class="fa fa-check"></i></li>
							<li><del>Sit amet, consectetur nam</del> <i class="fa fa-times red-color"></i></li>
							<li>Magna adipiscing elit nam dui<i class="fa fa-check"></i></li>
							<li><del>Lacus ut accumsan sed</del> <i class="fa fa-times red-color"></i></li>
						</ul>
						<!-- End Package Features -->
						<div class="price-bottom">
							<a href="#" class="btn btn-default price-btn">Get Started</a><!-- Buy Button -->
						</div>
					</div>
				</div>
				<!-- End Price Column #1 -->
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<p class="lead">Need a <strong>customized</strong> plan ? Get in Touch, we will tailor you one.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End Pricing -->
	
	<!-- Start Subscribe -->
	<section id="subscribe" class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
						<h1>Get <strong>Started</strong></h1>
						<p>Sign up and get our latest updates and product release</p>
					</div>
				</div>
		  </div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="#" class="btn btn-primary btn-lg btn-bluebg">Get started</a>
					<a href="#" class="btn btn-default btn-lg btn-bluenobg">Take tour</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End Subscribe -->

	<footer id="footer" class="section nopadding-bottom">
		<div class="container">
			<div class="row">
				<!--Footer About Description -->
				<div class="col-md-3 col-sm-6">
					<h4>About Landing Page</h4>
					<p>Default text creates the illusion of real text. If it is not real text, they will focus on the design.</p>
					<hr/>
					<h4>Quick Links</h4>
					<ul class="quick-links">
						<li><a href="#">Contact</a></li>
						<li><a href="#">Disclaimer</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Support</a></li>
					</ul>
				</div>
				<!-- End Footer About Description -->

				<!-- Start Contact Details  -->
			  <div class="col-md-4 col-sm-6">
					<div class="contact-info">
						<h4>Where to find us</h4>
						<p>Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc.</p>
						<ul class="contact-list">
							<li><i class="fa fa-map-marker"></i>Somewhere Somewhere, Mauritius</li>
							<li><i class="fa fa-phone"></i>+ 230 5 8268494</li>
							<li><i class="fa fa-envelope-o"></i><a href="mailto:contact@simplesphere.net.com">contact@simplesphere.net</a></li>
						</ul>
					</div>
					<!-- End Contact Details  -->
					<hr/>
					
					<div class="social">
						<h4>Follow us</h4>
						<!-- Start  Social Links -->
						<ul class="social">
							<li class="facebook"> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
							<li class="twitter"> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
							<li class="google-plus"> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
							<li class="linkedin"> <a href="#"> <i class="fa fa-linkedin"></i> </a> </li>
							<li class="youtube"> <a href="#"> <i class="fa fa-youtube-play"></i> </a> </li>
						</ul>
						<!-- End Social Links  -->
					</div>	
				</div>
				<div class="col-md-5 bottom-contact">
			    <h4>Get in Touch</h4>
					<p>Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc.</p>
					<!-- Start Contact Form  -->
					<form id="contact-form" class="contact-form" method="post" action="contact-form.php">
						<div class="form-group">
							<input name="contact-name" id="contact-name" type="text" class="form-control" placeholder="Name">
						</div>
						<div class="form-group">
							<input name="contact-email" id="contact-email" type="text" class="form-control" placeholder="Your e-mail">
						</div>
						<div class="form-group">
							<input name="contact-phone" id="contact-phone" type="text" class="form-control" placeholder="Phone">
						</div>
						<div class="form-group">
							<textarea name="contact-message" id="contact-message" class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default btn-submit">Submit</button>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-process-contact"></div>
							</div>
						</div>
					</form>
					<!-- End Contact Form  -->
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row footer-bottom">
				<div class="col-lg-6 col-sm-6">
					<p>&copy; Sales Theme. All Right Reserved</p>
				</div>
				<div class="col-lg-6 col-sm-6">
				  <p class="copyright">Made with <i class="fa fa-heart"></i> by <a href="http://www.simplesphere.net">Simplesphere</a></p>
				</div>
			</div>
		</div>
	</footer>



	<div role="main" class="ui-content jqm-content jqm-fullwidth">

		<h1>External Panels</h1>

		<p>The panels below are all located outside the page. Panels outside of a page must be initalized manually and will not be handled by auto init. Panels outside of pages will remain in the DOM (unless manually removed) as long as you use Ajax navigation, and can be opened or closed from any page.</p>

		<p>Navigate to page 2 to see this behavior. The HTML document for page 2 doesn't contain panel markup, but you can still open the panels.</p>

		<p><a href="mobile/demos/panel-external/page-b.html">Navigate to page 2</a></p>

		<p><strong>Left</strong> panel examples</p>
		<a href="#leftpanel3" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Overlay</a>
		<a href="#leftpanel1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Reveal</a>
		<a href="#leftpanel2" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Push</a>

<p><strong>Right</strong> panel examples</p>
		<a href="#rightpanel3" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Overlay</a>
		<a href="#rightpanel1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Reveal</a>
		<a href="#rightpanel2" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Push</a>

	</div><!-- /content -->

	<!-- Start Scroll To Top  -->
	<a href="#" class="scroll-up"><i class="fa fa-arrow-up"></i></a>
	<!-- End Scroll To Top  -->

</div><!-- /page -->

</div>



	<div data-role="panel" id="leftpanel1" data-position="left" data-display="reveal" data-theme="a">

        <h3>Left Panel: Reveal</h3>
        <p>This panel is positioned on the left with the reveal display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
        <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>

	</div><!-- /leftpanel1 -->

	<!-- leftpanel2  -->
	<div data-role="panel" id="leftpanel2" data-position="left" data-display="push" data-theme="a">

        <h3>Left Panel: Push</h3>
        <p>This panel is positioned on the left with the push display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
        <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>

	</div><!-- /leftpanel2 -->

	<!-- leftpanel3  -->
	<div data-role="panel" id="leftpanel3" data-position="left" data-display="overlay" data-theme="a">

        <h3>Left Panel: Overlay</h3>
        <p>This panel is positioned on the left with the overlay display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
        <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>

	</div><!-- /leftpanel3 -->

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

        <h3>Right Panel: Overlay</h3>
        <p>This panel is positioned on the right with the overlay display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
        <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
        <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left ui-btn-inline">Close panel</a>

	</div><!-- /rightpanel3 -->
    
    
    


<script src="mobile/demos/js/jquery.js"></script>
<script src="mobile/demos/_assets/js/index.js"></script>
<script src="mobile/demos/js/jquery.mobile-1.4.5.min.js"></script>
<script id="panel-init">
	$(function() {
		$( "body>[data-role='panel']" ).panel();
	});
</script>

	<script type="text/javascript">window.jQuery || document.write('<script src="js/jquery-2.1.0.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script><!--Packed with many functionalies such as carousel slider, responsivity, tabs, drop downs, buttons, and many other features-->
	<script src="js/modernizr.min.js" type="text/javascript"></script><!--Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.-->
	<script src="js/jquery.prettyPhoto.js" type="text/javascript" ></script><!-- Script for Lightbox Image  -->
	<script src="js/custom.js" type="text/javascript"></script><!-- Script File containing all customizations  -->
	<!-- End Js Files  -->

</body>
</html>
