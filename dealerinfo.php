<?php require_once("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dealer Info</title>
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
    <!-- Sweet Alert -->
    <link href="css/plugin/sweetalert/sweetalert.css" rel="stylesheet">    
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
   	<script src="js/jquery-2.1.1.js" type="text/javascript" language="javascript"></script>    

</head>

<body>
<?php include_once("analyticstracking.php") ?>
<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.php"); ?>
    <!-- /.navbar -->

	<section class="wrapper-md dengage">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" align="center">

                            <h2>Get the extra exposoure you need.</h2>
                            
                            
                            
                </div>
                <div class="row">
                
                <div class="col-sm-6">
                	<div class="row">
                        <div class="col-sm-12">
                        
                            <!--h2>Have us go to work for you.</h2 -->
                        
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6">
                	<div class="row">
                        <div class="col-sm-12">
                            <div class="box plan-featured">
                             <div class="plan-header">
                                 <h3>Join Us Today And Get Those Extra Sales Needed.</h3>
							 </div>
                            
                             <div class="plan-description">
                              <div class="form-group">
                                <label class="control-label">Dealership Name:</label>
                            	<input type="text" id="dcompany_name" class="form-control" value="">
                              </div>
    
                            <div class="row">
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                <label class="control-label">First Name:</label>
                            	<input type="text" id="dfirst_name" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                <label class="control-label">Last Name:</label>
                            	<input type="text" id="dlast_name" class="form-control" value="">
                                </div>
                              </div>

                            </div>

    
                            <div class="row">
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                <label class="control-label">Email:</label>
                            	<input type="text" id="demail" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                <label class="control-label">Phone Number:</label>
                            	<input type="text" id="dphoneno" class="form-control" data-mask="(999)999-9999" value="">
                                </div>
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                <label class="control-label">Zip Code:</label>
                            	<input type="text" id="dzip_code" class="form-control" data-mask="99999" value="">
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                <label class="control-label">Inventory Size:</label>
                            	<select id="dinventory_size" class="form-control">
                                    <option value="">- Select Size -</option>
                                    <option value="0_20">0 - 20</option>
                                    <option value="20_50">20 - 50</option>
                                    <option value="50_100">50 - 100</option>
                                    <option value="100_200">100 - 200</option>
                                    <option value="200_PLUS">200+</option>
                                </select>
                                </div>
                              </div>

                            </div>



                            <div class="row">
                              <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                <label class="control-label"></label>
                            	<button id="dsignup" class="btn btn-block btn-primary" type="button">Sign Up Now</button>
                                </div>
                              </div>
                            </div>

                            </div>
                            
                            
                            
                            </div>
                        </div>
                        <div id="">
                        
                        
                        </div>
                    </div>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                

				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

	<?php include("_footer.php"); ?>
	<!-- last but not least the javascript -->
   	<script src="js/plugin/wow/wow.js" type="text/javascript"></script>     
	<script src="js/custom/dealerinfo.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
	<script src="assets/js/holder.js"></script>
	<script src="js/plugin/jasny-bootstrap/js/jasny-bootstrap.js"></script>
    <script src="js/custom/custom.start.js"></script>

    <!-- Sweet alert -->
    <script src="js/plugin/sweetalert/sweetalert.min.js"></script>

</body>
</html>