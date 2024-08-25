<?php require_once("db_wfh_approval_loggedin.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<title>WeFinanceHere - Live Chat</title>
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
					<h1>Empty data <small>lorem ipsum dolor</small></h1>
				</div>
				<!-- End page header -->
				
				<div class="jumbotron bg-white sm">
				  <h1>Data not available</h1>
				  <p>
				  Click button below to add some data!
				  </p>
				  <p><a class="btn btn-success btn" role="button"><i class="fa fa-plus-circle"></i> Add new</a></p>
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