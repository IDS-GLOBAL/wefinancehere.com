<?php require_once("db_wfh_approval_loggedin.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<title>Wishlist At WeFinanceHere</title>
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
					<h1>Make Your Vehicle Wishlist Here <small> add as many vehicles you want to be notifed about.</small></h1>
				</div>
				<!-- End page header -->
				
				<div class="jumbotron bg-white sm">
				  <h1>Data not available</h1>
				  <p>
				  Click button below to add some data!
				  </p>
				  <p><a class="btn btn-success btn" role="button"><i class="fa fa-plus-circle"></i> Add new</a></p>
				</div>
				

                <div class="row">
                
                
                    <div class="col-sm-6">
                        <!-- Horizontal form -->
                        <div class="box-info">
                        <h2><strong>Add A Vehicle </strong> to your wish list</h2>
                            <div id="horizontal-form" class="collapse in">
                                <form class="form-horizontal" role="form">

                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Year</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" id="wishvehicle_year">
                                      	<option value="">Select Year</option>
                                      </select>
                                      <p class="help-block">Provide a year for this vehicle option.</p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Make</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" id="wishvehicle_make">
                                      	<option value="">Select Make</option>
                                      </select>

                                      <p class="help-block">Select the vehicle model</p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Model</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" id="wishvehicle_model">
                                      	<option value="">Select Model</option>
                                      </select>

                                      <p class="help-block">Select the vehicle model</p>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="wishvehicle_trim" class="col-sm-2 control-label">Trim</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" type="text" id="wishvehicle_trim" placeholder="Trim" value="">
                                      <p class="help-block">Example: LX, MX3, SEL, Limited, Base.</p>
                                    </div>
                                  </div>


                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <div class="checkbox">
                                        <label>
                                          <input id="okay_to_contact" type="checkbox"> It's okay to contact me about items in my wish list.
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <button type="button" class="btn btn-default">Save</button>
                                    </div>
                                  </div>
                                </form>
                            </div><!-- End div #horizontal-from -->
                        </div><!-- End div .box-info -->
                    </div>
                    


					<div class="col-sm-6">
                        <!-- Horizontal form -->
                        <div class="box-info">
                        <h2><strong>Let us got to work</strong> for you.</h2>
                            <div id="horizontal-form" class="collapse in">
                            	<h4>Get Notified When Got A Match For You.</h4>
                            	<img src="https://images.autocitymag.com/85/2745/00_1FM5K7F89EGA70029.jpg" width="240px">
                                
                                <p> Got some time to wait for the perfect deal?  Well why pay for something you don't like right?  Well we have the perfect solution for you.
                                </p>
                                
                            </div><!-- End div #horizontal-from -->
                        </div><!-- End div .box-info -->
                    </div>


                
                </div>
				
				
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