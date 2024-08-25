<?php require_once("db_connect.php"); ?>
<?php include("inc_sessions.php"); ?>
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
	#second_form, #third_form{display:none;}
    </style>
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<body>
<div data-role="page" class="jqm-demos" data-quicklinks="true">




	<div data-role="header">
		<h1>External panels</h1>
		<a href="mobile/demos/panel" data-rel="back" class="ui-btn ui-btn-left ui-alt-icon ui-nodisc-icon ui-corner-all ui-btn-icon-notext ui-icon-carat-l">Back</a>
	</div><!-- /header -->







<div role="main" class="ui-content jqm-content jqm-fullwidth">

<!-- Start Intro -->
  <section id="intro" class="section">
		<div class="container">

            <div class="row">
                        <div class="col-lg-12">
                            <!--Subscribe Form -->
                                    <p><strong>Left</strong> panel examples</p>
                <a href="#leftpanel3" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">My Approval</a>
                <a href="#leftpanel1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Reveal</a>
                <a href="#leftpanel2" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Push</a>
        
        <p><strong>Right</strong> panel examples</p>
                <a href="#rightpanel3" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Sales Desk</a>
                <a href="#rightpanel1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Reveal</a>
                <a href="#rightpanel2" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Push</a>
        
        
                            <!--End Subscribe Form -->
                        </div>
            </div>
		
        </div>
</section>

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

        <div class="container"><!-- Start Container -->
            <div class="resume-header">
                    
               
                    
                    <?php include("content/inc.123steps.php"); ?>
                
                                         
                        
            </div>

            
                <?php include("content/inc.banner.php"); ?>
            
            <div class="divider50"></div>
        </div><!-- End Container -->

    </div>
</div>
<!-- End Banner -->


	











</div><!-- /content -->












</div><!-- /page -->
<!-- /Start Panels -->

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

$("#button_1").click(function() {
				 $("#first_form").hide();
				$("#second_form").show();
				});
$("#button_2").click(function() {
				 $("#second_form").hide();
				$("#third_form").show();
				});
$("#button_3").click(function() {
				 $("#third_form").hide();
				$("#fourth_form").show();
				});
</script>

	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script><!--Packed with many functionalies such as carousel slider, responsivity, tabs, drop downs, buttons, and many other features-->
	<script src="js/modernizr.min.js" type="text/javascript"></script><!--Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.-->
	<script src="js/jquery.prettyPhoto.js" type="text/javascript" ></script><!-- Script for Lightbox Image  -->
	<script src="js/custom.js" type="text/javascript"></script><!-- Script File containing all customizations  -->
    <script src="js/incalculate.js"></script>
	<!-- End Js Files  -->

</body>
</html>
