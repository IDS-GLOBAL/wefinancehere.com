<?php require_once("db_connect.php"); ?>
<?php include("inc_sessions.php"); ?>
<?php include("funkshons.php"); ?>
<?php


$colname_qry_vehicle = "-1";
if (isset($_GET['v'])) {
  $colname_qry_vehicle = $_GET['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qry_vehicle =  "SELECT * FROM vehicles WHERE vid = %s ORDER BY created_at DESC", GetSQLValueString($colname_qry_vehicle, "int"));
$qry_vehicle = mysqli_query($idsconnection_mysqli, $query_qry_vehicle);
$row_qry_vehicle = mysqli_fetch_assoc($qry_vehicle);
$totalRows_qry_vehicle = mysqli_num_rows($qry_vehicle);

$vehicle_id = $row_qry_vehicle['vid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vphotos = "SELECT * FROM vehicle_photos WHERE vehicle_id = '$vehicle_id' ORDER BY photo_file_name ASC";
$vphotos = mysqli_query($idsconnection_mysqli, $query_vphotos);
$row_vphotos = mysqli_fetch_assoc($vphotos);
$totalRows_vphotos = mysqli_num_rows($vphotos);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_market_states = "SELECT * FROM states";
$market_states = mysqli_query($idsconnection_mysqli, $query_market_states);
$row_market_states = mysqli_fetch_assoc($market_states);
$totalRows_market_states = mysqli_num_rows($market_states);




?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vehicle Deal Matrix</title>
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
    		<link rel="stylesheet" href="css/plugin/colorbox.css" />
        
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


            
                <?php //include("content/inc.banner.php"); ?>
            
            <div class="divider50"></div>
        </div><!-- End Container -->

    </div>
</div>
<!-- End Banner -->















	<!-- Start Dealers -->
	<section id="dealers" class="section">
	</section>
	<!-- End Dealers -->





	<!-- Start Snippets -->
	<section id="budget_area" class="section">
    <div class="container">
    
    <h2>Finance Me Now</h2>
    
    <div class="row">


	<div class="col-md-3">
					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Vehicle</h4>
						<p><?php echo $row_qry_vehicle['vyear']; ?> <?php echo $row_qry_vehicle['vmake']; ?> <?php echo $row_qry_vehicle['vmodel']; ?> <?php echo $row_qry_vehicle['vtrim']; ?></p>
					</div>

					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Condition</h4>
						<p><?php echo $row_qry_vehicle['vcondition']; ?></p>
					</div>

					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Miles</h4>
						<p><?php echo $row_qry_vehicle['vmileage']; ?></p>
					</div>
                    
   </div>           


	<div class="col-md-3">
					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Transmission</h4>
						<p><?php echo $row_qry_vehicle['vyear']; ?> <?php echo $row_qry_vehicle['vmake']; ?> <?php echo $row_qry_vehicle['vmodel']; ?> <?php echo $row_qry_vehicle['vtrim']; ?></p>
					</div>

					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Miles</h4>
						<p><?php echo $row_qry_vehicle['vmileage']; ?></p>
					</div>
                    
   </div>           



	<div class="col-md-3">
					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Exterior Color:</h4>
						<p><?php echo $row_qry_vehicle['vecolor_txt']; ?></p>
					</div>

					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Interior Color:</h4>
						<p><?php echo $row_qry_vehicle['vicolor_txt']; ?></p>
					</div>

					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Body:</h4>
						<p><?php echo $row_qry_vehicle['vbody']; ?></p>
					</div>


					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Transmission:</h4>
						<p><?php echo $row_qry_vehicle['vtransm']; ?></p>
					</div>
                    
   </div>           



	<div class="col-md-3">
					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>Cylinders</h4>
						<p><?php echo $row_qry_vehicle['vcylinders']; ?></p>
					</div>

					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>MPG City</h4>
						<p><?php echo $row_qry_vehicle['vehicle_mpg_city']; ?></p>
					</div>


					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>MPG HWY</h4>
						<p><?php echo $row_qry_vehicle['vehicle_mpg_hwy']; ?></p>
					</div>


					<div class="main-point">
						<i class="fa fa-car"></i>
						<h4>MPG Combined</h4>
						<p><?php echo $row_qry_vehicle['vehicle_mpg_combined']; ?></p>
					</div>
                    
   </div>           


                        
    	
    
    </div>
    
    <div class="form-group">
        	<label class="control-label">My Monthly Gross Income</label>
            <div class="col-md-3">
            <input id="myincome" type="number" class="form-control" value="" />
            </div>
        
        
        </div>
    
    
    
    </div>
    </section>


<!-- View Vehicle -->
  <section id="intro" class="section">


<div class="container">			
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
						<h1><?php echo $row_qry_vehicle['vyear']; ?>  <?php echo $row_qry_vehicle['vmake']; ?> <?php echo $row_qry_vehicle['vmodel']; ?> <strong><?php echo $row_qry_vehicle['vtrim']; ?></strong></h1>
						
					</div>
				</div>
		  </div>
			<!-- Start Tabs -->
			<div class="row">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#a<?php echo $row_qry_vehicle['vid']; ?>first-tab" data-toggle="tab"><i class="fa fa-video-camera"></i> Vehicle Info</a></li><!--Tab #1 -->
			    <li><a href="#a<?php echo $row_qry_vehicle['vid']; ?>second-tab" data-toggle="tab"><i class="fa fa-cube"></i> Photos</a></li><!--Tab #2 -->
				  <li><a href="#a<?php echo $row_qry_vehicle['vid']; ?>third-tab" data-toggle="tab"><i class="fa fa-group"></i> Purchase</a></li><!--Tab #3 -->
				</ul>			
				<div class="tab-content">
					<!-- Introductory Video -->
					<div class="tab-pane active" id="a<?php echo $row_qry_vehicle['vid']; ?>first-tab">

                    

                            <div class="container">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h1>Blank Space Section</h1>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <h1>Blank Space Section</h1>

		<p><a class="group2" href="../content/ohoopee1.jpg" title="Me and my grandfather on the Ohoopee">Grouped Photo 1</a></p>

                                        
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-6 feature">


					<i class="fa fa-car fa-4x"></i><!-- Features Icon -->
					<h4>Flexible</h4><!-- Features Title -->
					<div class="bubble"><!-- Features Details -->
						<ul class="green-arrow">
							<li><?php  if($row_qry_vehicle['vcondition']){ echo $row_qry_vehicle['vcondition']; } ?></li>
							<li><?php  if($row_qry_vehicle['vmileage']){ echo $row_qry_vehicle['vmileage']; } ?></li>
							<li><?php  if($row_qry_vehicle['vecolor_txt']){ echo $row_qry_vehicle['vecolor_txt']; } ?></li>
							<li><?php  if($row_qry_vehicle['vicolor_txt']){ echo $row_qry_vehicle['vicolor_txt']; } ?></li>
							<li><?php  if($row_qry_vehicle['vbody']){ echo $row_qry_vehicle['vbody']; } ?></li>
							<li><?php  if($row_qry_vehicle['vtransm']){ echo $row_qry_vehicle['vtransm']; } ?></li>
							<li><?php  if($row_qry_vehicle['vcylinders']){ echo $row_qry_vehicle['vcylinders']; } ?></li>
							<li><?php  if($row_qry_vehicle['vehicle_mpg_city']){ echo $row_qry_vehicle['vehicle_mpg_city']; } ?></li>
							<li><?php  if($row_qry_vehicle['vehicle_mpg_hwy']){ echo $row_qry_vehicle['vehicle_mpg_hwy']; } ?></li>
							<li><?php  if($row_qry_vehicle['vehicle_mpg_combined']){ echo 'Combined: '.$row_qry_vehicle['vehicle_mpg_combined']; } ?></li>
						</ul>
					</div>



                                    </div>
                                        

                                
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
								
                                

                                
							
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            </div>
						</div>
					
                    
                    
                    </div>
					<!-- End Introductory Video -->
					<!-- Random Text -->
					<div class="tab-pane" id="a<?php echo $row_qry_vehicle['vid']; ?>second-tab">
						

                        <!-- Portfolio -->
                        <section id="portfolio" class="bg-grey section">
                            <div class="container">
                                <div class="row">
                                
                                    <div class="col-lg-12">
                                        <div class="headline">
                                    
                                            <h1>Photos</h1>
                                    
                                        </div>
                                    </div>
                                    
                                    
                                    
                              </div>
                                <div class="row">

<?php $counter_gridrow=0; ?>
                                
<?php do{ ?>

			<?php
            
            $photo_file_path = $row_vphotos['photo_file_path'];
            
            if(!$photo_file_path){
                $photo_openurl = 'img/thumbs/thumb1.jpg';
            }else{
                $photo_file_path = str_replace('../', '', $photo_file_path);
                $photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
                $photo_openurl = "http://images.autocitymag.com/".$photo_file_path;
            }
            
            
            ?>

<?php $counter_gridrow++; ?>                        

<?php if($counter_gridrow % 3 == 0){ ?>

                                </div>
                                <div class="row">
                
<?php } ?>

                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <!-- Start Portfolio Item -->
                                        <div>
<a class="group2" href="<?php echo $photo_openurl; ?>" title="<?php echo $row_vphotos['v_caption']; ?>"><img class="img-responsive img-thumbnail" src="<?php echo $photo_openurl; ?>" alt="" title="" /></a>
                                        </div>
                                        <!-- End Portfolio Item  -->
                                    </div>

<?php } while ($row_vphotos = mysqli_fetch_assoc($vphotos)); ?>                   
                                
                                </div>
                            </div>
                        </section>
                        <!-- End Portfolio -->
                        		



					</div>
					<!-- End Random Text -->
					<!-- Members Listing -->
					<div class="tab-pane" id="a<?php echo $row_qry_vehicle['vid']; ?>third-tab">
					

					
                    
                    	<div class="row">

						
                        
                        	<div class="col-lg-6 col-md-6">
			    
                <h2><?php echo $row_qry_vehicle['vyear']; ?> <?php echo $row_qry_vehicle['vmake']; ?> <?php echo $row_qry_vehicle['vmodel']; ?></h2>
   			    
                <h3>Seller Notes</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>

                            <h3>Payment Info</h3>
                            <ul class="normal-list">
                                <li>Approx. Monthly Payments: <span></span></li>
                                <li>For How Long: <span></span></li>
                                <li>Other Plans Available: <span></span></li>
                            </ul>
                                
                                <button type="button" class="btn btn-primary">Do Something</button>
							</div>	
						
                        
                        
							<div class="col-lg-6 col-md-6">



                    <?php if(!$row_qry_vehicle['vthubmnail_file']): ?>

                    <img id="big_vphoto" src="img/WeFinacehere-Orange-Logo-640x480.png" class="img-responsive" alt="" title="" />
                    
                    <?php 
					else:
					
					$vthubmnail_file_path = str_replace('../vehicles/photos/', '', $row_qry_vehicle['vthubmnail_file_path']);
					$vthubmnail_file_path = str_replace('thumbs/', '', $vthubmnail_file_path);
					$openurl = 'https://images.autocitymag.com/'.$vthubmnail_file_path;
					?>
                    
                    
                    
                    
                    <img id="big_vphoto" src="<?php echo $openurl; ?>" class="img-responsive" alt="" title="" />
                                        
                    <?php endif; ?>









							</div>	
                        
                        </div>
                        
					
                    
                    </div>
					<!-- End Members Listing -->
				</div>	
			</div>
			<!-- End Tabs -->
		</div>



	</section>
	<!-- End Vehicle -->




<div class="row">

<div class="row">
				<div class="col-lg-4 col-md-4">
					<!-- Left Column : Assistance -->
					<div class="side-text text-center">
						<h4>Call Us Now</h4>
                        
						<a href="tel: <?php echo $row_dealer_url['phone']; ?>" class="ui-link"><i class="fa fa-phone fa-4x"></i></a>
						<h4>Company Name: <?php echo $row_dealer_url['company']; ?></h4>

						<p>Address: <?php echo $row_dealer_url['address']; ?></p>
						<p>City / State: <?php echo $row_dealer_url['city']; ?> <?php echo $row_dealer_url['state']; ?></p>
						<p>Zip Code: <?php echo $row_dealer_url['zip']; ?></p>
					</div>
					<!-- End Left Column -->
				</div>

<?php if($row_qry_vehicle['vehicleOptionsBulk']): ?>
                
				<div class="col-lg-8 col-md-8">
				  <div id="vfeatures_box" class="row">
						<div class="highlight">




							<div class="col-lg-6 col-md-6 col-sm-6">

<?php
$voptions = $row_qry_vehicle['vehicleOptionsBulk'];
$voptionsArrays = preg_split("/,/", "$voptions");
$voptionsCount = count($voptionsArrays);


$voptionsDivideByCount = $voptionsCount / 2;

//print_r($voptionsArrays);
//$voption1 = $voptionsArrays['0'];

$voption1 = $voptionsArrays['0'];
?>

								<ul class="green-arrow">


<?php $counter_voptionsrow=0; ?>

		<?php	for($i=0;$i<count($voptionsArrays); $i++) { ?>
        
	<li><span class="opticon">&radic;</span> <?php echo $voptionsArrays["$i"]; ?></li>




<?php $counter_voptionsrow++; ?>                        

<?php if($counter_voptionsrow % $voptionsDivideByCount == 0){ ?>

								</ul>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<ul class="green-arrow">

<?php } ?>




    
        <?php } //echo $i; ?>
								


                                    
                                    
                                    
                                    
                                    
								</ul>
							</div>
							<!--End Right Bullet Points -->
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			
            
<?php endif; ?>            
            
            
            
            </div>










                        
                        </div>              



	
	
	<?php //include("inc.temp.php"); ?>




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


		<script src="js/plugin/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>

</body>
</html>
