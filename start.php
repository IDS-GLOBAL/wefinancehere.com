<?php require_once("db.php"); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pub_sold_view = "SELECT * FROM `idsids_idsdms`.`vehicles`, `idsids_idsdms`.`dealers` WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vlivestatus` = '9' AND  `vehicles`.`vthubmnail_file` IS NOT NULL ORDER BY RAND() LIMIT 16 ";
$pub_sold_view = mysqli_query($idsconnection_mysqli, $query_pub_sold_view);
$row_pub_sold_view = mysqli_fetch_assoc($pub_sold_view);
$totalRows_pub_sold_view = mysqli_num_rows($pub_sold_view);

mysqli_select_db($wfh_connection_mysqli,  $database_wfh_connection);
$query_wfh_latestaprovals = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_approvals` ORDER BY `wfhuser_approval_id` DESC LIMIT 10";
$wfh_latestaprovals = mysqli_query($wfh_connection_mysqli, $query_wfh_latestaprovals);
$row_wfh_latestaprovals = mysqli_fetch_assoc($wfh_latestaprovals);
$totalRows_wfh_latestaprovals = mysqli_num_rows($wfh_latestaprovals);



mysqli_select_db($wfh_connection_mysqli,  $database_wfh_connection);
$query_wfh_latestaprovals_verified = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_approvals` WHERE `wfhuser_approval_email_verified` = '1' ORDER BY `wfhuser_approval_id` DESC LIMIT 10";
$wfh_latestaprovals_verified = mysqli_query($wfh_connection_mysqli, $query_wfh_latestaprovals_verified);
$row_wfh_latestaprovals_verified = mysqli_fetch_assoc($wfh_latestaprovals_verified);
$totalRows_wfh_latestaprovals_verified = mysqli_num_rows($wfh_latestaprovals_verified);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WeFinanceHere.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" -->
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
<script src="https://use.fontawesome.com/94d5a20675.js"></script>
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.php"); ?>
    <!-- /.navbar -->

	<!-- Pre-ApprovalGBox -->
	<section id="start_box" class="wrapper-lg bg-custom-home">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="widget padding-lg bg-dark">


                    
                    	<div id="gather_budget" class="form-inline">
						
                        	<div class="row">
		                    	<!-- h1 class="heading-lg text-center text-light">Great Credit, Bad Credit, OK!</h1 -->

                        <h2 id="total_avaltxt" class="text-center">We're Approving $ <?php echo $total_avilable; ?>  Today!</h2>
                        <h3 class="text-center">Use Our Pre-Approval Deal Matrix Calculator Below</h3>
                        <h4 class="text-center">Get Approved Regardless Of Any Credit Instantly See Results</h4>
                        <h5 class="text-center">Get Approved First Or Shop First With Your Pre-Approval</h5>
						<h5 class="text-center">Welcome To The Easiest Way To Finance A Car Online Today</h5>

                            </div>
                            
                        	<div class="row">
								
                                <div class="col-md-4 has_idle">
									<label for="your_credit">My Credit Is About: </label>
									<select id="your_credit" name="your_credit" class="form-control" title='Choose One' data-style="btn-primary">
										<optgroup label="Good Credit">
<option value="3.0" <?php if (3.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>3.0 Very Good Credit (720 - 850)</option>
<option value="7.0" <?php if (7.0 == $row_find_existingsession_approval['wfhuser_approval_apr']) {echo "selected=\"selected\"";} ?>>7.0 Good Credit (675 - 719)</option>
<option value="12.0" <?php if (12.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>12.0 Fair Credit: (621-674)</option>
</optgroup>
<optgroup label="Bad Credit:">
<option value="21.0" <?php if (21.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>21.0 Slow Credit: (575- 620)</option>
<option value="23.0" <?php if (23.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>23.0 Bad Credit: (Below - 575)</option>
<option value="29.0" <?php if (29.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>29.0 No Credit: (0 - ?) - I am not Sure</option>
										</optgroup>
									</select>
								</div><!-- /.col -->
								
                                <div class="col-md-2 has_idle">
									<label for="down_payment">I Can Put Down:</label>
									<select id="down_payment" class="form-control" title='Choose One' data-style="btn-primary">
										<optgroup label="Your Down Payment: (required)">
<option value="100" <?php if (100 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']) {echo "selected=\"selected\"";} ?>>$ 100.00</option>
<option value="200" <?php if (200 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']) {echo "selected=\"selected\"";} ?>>$ 200.00</option>
<option value="300" <?php if (300 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 300.00</option>
<option value="400" <?php if (400 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 400.00</option>
<option value="500" <?php if (500 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 500.00</option>
<option value="600" <?php if (600 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 600.00</option>
<option value="700" <?php if (700 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 700.00</option>
<option value="800" <?php if (800 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 800.00</option>
<option value="900" <?php if (900 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 900.00</option>
<option value="1000" <?php if (1000 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1000.00</option>
<option value="1100" <?php if (1100 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1100.00</option>
<option value="1200" <?php if (1200 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1200.00</option>
<option value="1300" <?php if (1300 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1300.00</option>
<option value="1400" <?php if (1400 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1400.00</option>
<option value="1500" <?php if (1500 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1500.00</option>
<option value="1600" <?php if (1600 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1600.00</option>
<option value="1700" <?php if (1700 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1700.00</option>
<option value="1800" <?php if (1800 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1800.00</option>
<option value="1900" <?php if (1900 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 1900.00</option>
<option value="2000" <?php if (2000 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2000.00</option>
<option value="2100" <?php if (2100 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2100.00</option>
<option value="2200" <?php if (2200 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2200.00</option>
<option value="2300" <?php if (2300 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2300.00</option>
<option value="2400" <?php if (2400 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2400.00</option>
<option value="2500" <?php if (2500 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2500.00</option>
<option value="2600" <?php if (2600 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2600.00</option>
<option value="2700" <?php if (2700 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2700.00</option>
<option value="2800" <?php if (2800 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2800.00</option>
<option value="2900" <?php if (2900 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 2900.00</option>
<option value="3000" <?php if (3000 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3000.00</option>
<option value="3100" <?php if (3100 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3100.00</option>
<option value="3200" <?php if (3200 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3200.00</option>
<option value="3300" <?php if (3300 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3300.00</option>
<option value="3400" <?php if (3400 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3400.00</option>
<option value="3500" <?php if (3500 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3500.00</option>
<option value="3600" <?php if (3600 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3600.00</option>
<option value="3700" <?php if (3700 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3700.00</option>
<option value="3800" <?php if (3800 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3800.00</option>
<option value="3900" <?php if (3900 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 3900.00</option>
<option value="4000" <?php if (4000 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 4000.00</option>
<option value="4001" <?php if (4001 == $row_find_existingsession_approval['wfhuser_approval_dwpymt']){ echo "selected=\"selected\"";} ?>>$ 4000.00 (+) Plus</option>
										</optgroup>
									</select>
								</div><!-- /.col -->
								
                                <div class="col-md-3 has_idle">
                                
									<label for="max_car_payment">My Max Car Payment:</label>
									<select id="max_car_payment" class="form-control selectpicker show-tick" title='$50 Car Payment' data-style="btn-primary">
										<optgroup label="Your Max Car Payment:">
      <option value="250" <?php if (250 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$200 - $250</option>
      <option value="250" <?php if (250 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$200 - $250</option>
<option value="300" <?php if (300 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$250 - $300</option>
<option value="350" <?php if (350 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$300 - $350</option>
<option value="400" <?php if (400 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$350 - $400</option>
<option value="500" <?php if (500 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$450 - $500</option>
<option value="550" <?php if (550 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$500 - $550</option>
<option value="550" <?php if (550 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$500 - $550</option>
<option value="650" <?php if (650 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$600 - $650</option>
<option value="750" <?php if (750 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$700 - $750</option>
<option value="850" <?php if (850 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$800 - $850</option>
<option value="950" <?php if (950 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$900 - $950</option>
<option value="1050" <?php if (1050 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$1000 - $1050</option>
<option value="1100" <?php if (1100 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$1050 - $1100</option>
<option value="1150" <?php if (1150 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$1100 - $1150</option>
<option value="1200" <?php if (1200 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$1150 - $1200</option>
<option value="1300" <?php if (1300 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$1200 - $1300</option>
<option value="1400" <?php if (1400 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$1300 - $1400</option>
<option value="1600" <?php if (1600 == $row_find_existingsession_approval['wfhuser_approval_mxpymt']){ echo "selected=\"selected\"";} ?>>$1500 - $1600</option>
										</optgroup>
									</select>
								
                                </div><!-- /.col -->
								
                                <div class="col-md-3 has_idle">


									<label for="how_long">I'll Repayback Over:</label>
									<select id="how_long" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="The Longest You'll Go?">
      <option value="2" <?php if (2 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>2 Years</option>
      <option value="3" <?php if (3 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>3 Years</option>
      <option value="4" selected <?php if (4 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>4 Years</option>
      <option value="5" <?php if (5 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>5 Years</option>
<option value="6" <?php if (6 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>6 Years</option>
										</optgroup>
									</select>
								

                                </div><!-- /.col -->
								
                                
                                
                                
							</div>




							<div class="row" align="center">
                            	<div id="approval_boxwbudget" class="col-md-12 has_idle">


	<div class="row">
        <div id="approval_boxone" class="col-md-6 col-sm-6">
                                	<h3>Your Approval So Far</h3>
                                	<h3 id="need_amount">$ 0</h3>
        </div>
        <div id="approval_boxtwo" class="col-md-6 col-sm-6">
                                	<h3>Your Finance Amount</h3>
                                	<h3 id="principle_amount">$ 0</h3>
        </div>

        <div id="humanread_approval_script" class="col-md-12 col-sm-12">
        </div>
        
    </div>
    
    





                                </div>
                            </div>



                        	<div class="row">

                                <div class="col-md-4 has_idle">


									<label for="gross_moincome">Your Monthly Income:</label>
									<select id="gross_moincome" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
									  <optgroup label="Income Before Taxes">
<option value="1000" <?php if (1000 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$850 - $1,000</option>
<option value="1250" <?php if (1250 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$1,000 - $1,250</option>
<option value="1500" <?php if (1500 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$1,500 - $1,500</option>
<option value="1750" <?php if (1750 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$1,500 - $1,750</option>
<option value="2000" <?php if (2000 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$1,750 - $2,000</option>
<option value="2250" <?php if (2250 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$2,000 - $2,250</option>
<option value="2500" <?php if (2500 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$2,250 - $2,500</option>
<option value="2750" <?php if (2750 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$2,500 - $2,750</option>
<option value="3000" <?php if (3000 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$2,700 - $3,000</option>
<option value="3250" <?php if (3250 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$3,000 - $3,250</option>
<option value="3500" <?php if (3500 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$3,250 - $3,500</option>
<option value="3750" <?php if (3750 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$3,500 - $3,750</option>
<option value="4000" <?php if (4000 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$3,750 - $4,000</option>
<option value="4250" <?php if (4250 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$4,000 - $4,250</option>
<option value="4750" <?php if (4750 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$4,500 - $4,750</option>
<option value="5000" <?php if (5000 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$4,750 - $5,000</option>
<option value="5250" <?php if (5250 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$5,000 - $5,250</option>
<option value="5500" <?php if (5500 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$5,250 - $5,500</option>
<option value="5750" <?php if (5750 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$5,500 - $5,750</option>
<option value="6000" <?php if (6000 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$5,750 - $6,000</option>
<option value="6250" <?php if (6250 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$6,000 - $6,250</option>
<option value="6750" <?php if (6750 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$6,500 - $6,750</option>
<option value="7250" <?php if (7250 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$7,000 - $7,250</option>
<option value="7500" <?php if (7500 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$7,250 - $7,500</option>
<option value="7750" <?php if (7750 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$7,500 - $7,750</option>
<option value="8000" <?php if (8000 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$7,750 - $8,000</option>
<option value="8250" <?php if (8250 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$8,000 - $8,250</option>
<option value="8750" <?php if (8750 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$8,500 - $8,750</option>
<option value="9000" <?php if (9000 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$8,750 - $9,000</option>
<option value="9250" <?php if (9250 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$9,000 - $9,250</option>
<option value="9500" <?php if (9500 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$9,250 - $9,500</option>
<option value="9750" <?php if (9750 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$9,500 - $9,750</option>
<option value="10000" <?php if (10000 == $row_find_existingsession_approval['wfhuser_approval_month_income']){ echo "selected=\"selected\"";} ?>>$10,000 - $10,000 (+)Plus</option>
									  </optgroup>
									</select>
								

                                </div><!-- /.col -->
							
                              	<div class="col-md-2">
							  <label for="dma_state">Your State:</label>
									<select id="dma_state" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
									  <option value="" <?php if (!(strcmp("", $row_find_existingsession_approval['wfhuser_approval_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
									  <?php
do {  
?>
									  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_find_existingsession_approval['wfhuser_approval_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
									  <?php
} while ($row_states = mysqli_fetch_array($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_array($states);
  }
?>
                                  </select>

								</div><!-- /.col -->
								
                                
                                
                                <div class="col-md-2">
									<label for="dma_market">Closest Market:</label>
									<select id="dma_market" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary" disabled>
										<optgroup label="Results Based On Market Availablity">
											<option value="">Choose State</option>
                                            <?php if($row_find_existingsession_approval['wfhuser_approval_market']){ ?>
                                            <option value="<?php echo $row_find_existingsession_approval['wfhuser_approval_market']; ?>" selected="selected"><?php echo $row_find_existingsession_approval['wfhuser_approval_market']; ?></option>
                                            <?php } ?>
										</optgroup>
									</select>

                                    
								</div><!-- /.col -->
                                
                                
                                <div class="col-md-3">
									<label for="open_trade">You Have A Current Car Loan?</label>
									<select id="open_trade" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="I currently have a car loan on my credit: ">
<option value="" <?php if ("" == $row_find_existingsession_approval['wfhuser_approval_openloan']){ echo "selected=\"selected\"";} ?>>Select Please</option>
<option value="YES" <?php if ("YES" == $row_find_existingsession_approval['wfhuser_approval_openloan']){ echo "selected=\"selected\"";} ?>>YES</option>
<option value="NO" <?php if ("NO" == $row_find_existingsession_approval['wfhuser_approval_openloan']){ echo "selected=\"selected\"";} ?>>NO</option>
										</optgroup>
									</select>
								</div><!-- /.col -->





                                
                                
							</div>







						
                        
                        
                        </div><!-- Form-Inline -->

					
                    
                    	<!--br class="spacer-lg" -->
					

	<br class="spacer-sm">

                    
<div id="view_choices_box" class="row">
    <div class="col-md-6" style="display:block;">
        <button id="lockin_preapproval" type="button" role="button" class="btn btn-success btn-lg btn-block col-md-6">LOCK IN MY PRE-APPROVAL</button>
    </div><!-- /.col -->
    
    <div class="col-md-6" style="display:block;">
        <a id="shop_only" href="#vdlisting_results" role="button" class="btn btn-primary btn-lg btn-block col-md-6 page-scroll">LET ME TAKE A PEEK FIRST</a>
    </div><!-- /.col -->
    
</div>




	<br class="spacer-sm">







<div id="register_myapproval_box" style="display:none;">


    <div class="row">
        <div class="col-md-4">
        <label class="control-label">Your First Name:</label>
        <input id="approval_fname" type="text" name="approval_fname"   class="form-control" placeholder="Your Name">
        </div>

        <div class="col-md-4">
        <label class="control-label">Your Last Name:</label>
        <input id="approval_lname" type="text" name="approval_lname"   class="form-control" placeholder="Your Last Name">
        </div>

        <div class="col-md-4">
        <label class="control-label">(US) Mobile Number:</label>
        <input id="approval_phoneno" type="text" name="cell" data-mask="(999) 999-9999" class="form-control" placeholder="Mobile Number">
        </div>

    </div>


	<br class="spacer-sm">

    	
                                        

    <div class="row">
        <div class="col-md-12 has_idle">
        <label class="control-label">Email Address:</label>
        <input id="approval_email" type="text" name="approval_email" class="form-control" placeholder="Your Email Address">   
        
        </div>
        <div class="col-md-12">

	<br class="spacer-sm">

            <button id="allocate_funds" type="button" role="button" class="btn btn-facebook btn-block btn-lg">Confirm My <span id="need_amountt">$ 0</span> Pre-Approval!</button>
        </div>
	</div>

    <div class="row">
		<div class="col-md-10">
        <p>When preparing your funds gains you automatic approval.  Get a check in your back office or have your approval sent to an approved location.</p>
        </div>
    </div>
    
</div><!-- End Visual register me -->

                        

                        </div>

                        
<div style="display:none;">
<input id="budget_afford" type="hidden" value="<?php echo $wfhuser_approval_budget_affordable; ?>">
<input id="cust_creditapr" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_apr']; ?>">
<input id="cust_creditapr_txt" type="hidden" value="<?php echo $row_find_existingsession_approval['cust_creditapr_txt']; ?>">
<input id="risk_factor_lvl" type="hidden" value="">
<input id="gross_monthlyincome" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_month_income']; ?>">
<input id="cust_downpayment" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_dwpymt']; ?>">
<input id="cust_totalapproval" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_totalpayments']; ?>">
<input id="cust_desiredpymt" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_mxpymt']; ?>">
<input id="cust_desiredtermos" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_monthterm']; ?>">
<input id="cust_car_loan" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_openloan']; ?>">
<input id="bigPrincipal"  type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_bigPrincipal']; ?>">
<input id="bigSellingPrice" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_bigSellingPrice']; ?>">
<input id="cust_totalpayments" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_id']; ?>">
<input id="cust_dealtoday" type="hidden" value="">
<input id="cust_schedule_td" type="hidden" value="">
<input id="cust_lead_source" type="hidden" value="">
<input id="cust_lead_temperature" type="hidden" value="">
<input id="wfhcookiesesid"  type="hidden" value="<?php //echo $cookie; ?>">
<input id="wfhuser_id" type="hidden" value="<?php echo $wfhuser_id; ?>">
<input id="wfhuser_approval_id" type="hidden" value="<?php echo $wfhuser_approval_id; ?>">
<input id="cust_home_state" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_state']; ?>">
<input id="cust_home_market" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_market']; ?>">
<input id="access_id" type="hidden" value="">
<input id="wfhuserperm_timezone" type="hidden" value="">
	<div id="connected_results">

    </div>

</div>
					
					
                    
                    
                    </div><!-- /.widget -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
</section>
	<!-- /Pre-Approval Box -->

	<section class="wrapper-md">
		<div id="vlisting_result" class="container">
        <div id="vehicle_controls"></div>
        
        
        
          
          
          
                                          
                                          
                                          
                                          
		</div>
	</section>


	<section class="wrapper-md">
		<div id="vdlisting_results" class="container">
        
        
        
        
          
          
          
                                          
                                          
                                          
                                          
		</div><!-- /.container -->
	</section>




	<section class="wrapper-md bg-custom-home2">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2><i class="fa fa-trophy text-primary"></i> Recent <span class="text-muted"> Approvals </span> </h2>
					


<?php if($totalRows_wfh_latestaprovals != 0){ ?>                    
                <div class="col-sm-12">
	                <h2>Today</h2>
                    <marquee bgcolor="#FFFF00" id="recent_nonallocated" class="list-unstyled" style="color:#000; font-size:18px; font-weight:bold; padding:20px">
					<?php do { ?>
   $<?php echo formatMoney($row_wfh_latestaprovals['wfhuser_approval_totalpayments']); ?>, 
<?php } while ($row_wfh_latestaprovals = mysqli_fetch_array($wfh_latestaprovals)); ?>
                    </marquee>
                </div>

<?php } ?>

<?php if($totalRows_wfh_latestaprovals_verified != 0){ ?> 
                <div class="col-sm-12">
	                <h2>Approved</h2>
                    <marquee bgcolor="#FFFF00" "recent_allocated" class="list-unstyled" style="color:#000; font-size:18px; font-weight:bold; padding:20px">
					<?php do { ?>
                      $<?php echo formatMoney($row_wfh_latestaprovals_verified['wfhuser_approval_totalpayments']); ?> / 
                    <?php } while ($row_wfh_latestaprovals_verified = mysqli_fetch_array($wfh_latestaprovals_verified)); ?>
                    </marquee>
                </div>
                    
<?php } ?>

                    
                    
                    
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>


	<section class="wrapper-md">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2><i class="fa fa-trophy text-primary"></i> Everyone is <span class="text-muted"> Pre-Approved </span> based on rates from credit-score ranges.</h2>
					<p class="lead">Get financed today get a feel for where you fall if you credit falls between certain credit score ranges.</p>
					<p><a href="#gather_budget" class="btn btn-lg btn-primary page-scroll">GET STARTED! <i class="fa fa fa-key"></i></a></p>
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
							<a href="#gather_budget" class="btn btn-default page-scroll">This is My Score »</a>
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
							<a href="#gather_budget" class="btn btn-primary page-scroll">This is My Score »</a>
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
							<a href="#gather_budget" class="btn btn-default page-scroll">This is My Score »</a>
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
							<a href="#gather_budget" class="btn btn-default page-scroll">This is My Score »</a>
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
							<a href="#gather_budget" class="btn btn-primary page-scroll">This is My Score »</a>
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
							<a href="#gather_budget" class="btn btn-default page-scroll">This is My Score »</a>
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












	<!-- section class="wrapper-md bg-primary" id="recently_sold">
		<div class="container">
			<h2 class="text-center headline">Recently Sold</h2>
			<br class="spacer-lg">
			<div class="row">
            
			
            
				<?php //do { ?>
				<?php
				// $row_pub_sold_view['vid'];

				// $open_url = "https://images.autocitymag.com/".$row_pub_sold_view['did'].'/'.$row_pub_sold_view['vid'].'/'.$row_pub_sold_view['vthubmnail_file'];
				?>
					
								<div class="col-sm-6 col-md-3">
									<div class="thumbnail text-default">
										<div class="overlay-container">
											<img src="<?php //echo $open_url; ?>">
											<div class="overlay-content">
												<h3 class="h4 headline">Sold Vehicles</h3>
												<p>Example of there great deals done already.</p>
											</div>
										</div>
										<div class="thumbnail-meta vehicle_descip_box_layout_sm">
											<i class="fa fa-fw fa-info-circle"></i> <?php //echo $row_pub_sold_view['vyear']; ?> <?php //echo $row_pub_sold_view['vmake']; ?> <?php //echo $row_pub_sold_view['vmodel']; ?> <?php //echo $row_pub_sold_view['vtrim']; ?>
										</div>
										<div class="thumbnail-meta">
											<p><i class="fa fa-fw fa-home"></i> <?php //echo $row_pub_sold_view['address']; ?></p>
											<p><i class="fa fa-fw fa-map-marker"></i> <?php // echo $row_pub_sold_view['city']; ?>, <?php // echo $row_pub_sold_view['state']; ?>  <?php //echo $row_pub_sold_view['zip']; ?></p>
										</div>
										<div class="thumbnail-meta">
											<i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default"><?php //if(!$row_pub_sold_view['vrprice']){   echo 'Unlisted'; }else{ echo formatMoney($row_pub_sold_view['vrprice'] , true); } ?></span> <a class="btn btn-link pull-right">SOLD <i class="fa fa-flag"></i></a>
										</div>
									</div>
								</div>
						
				<?php 	//	} while ($row_pub_sold_view = mysqli_fetch_array($pub_sold_view)); ?>         
          
          
          </div>
	  </div>
	</section -->

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
   	<script src="js/plugin/wow/wow.js" type="text/javascript"></script>     

	<script src="js/custom/api_thebooklogin.js"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript" language="javascript"></script>
	<script src="assets/js/bootstrap-select.min.js" type="text/javascript" language="javascript"></script>
    <script src="js/custom/approval.widget.js" type="text/javascript" language="javascript"></script>
    <script src="js/custom/custom.start.js" type="text/javascript" language="javascript"></script>
	<script src="assets/js/holder.js" type="text/javascript" language="javascript"></script>
	<script src="js/plugin/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript" language="javascript"></script>
    <!-- Sweet alert -->
    <script src="js/plugin/sweetalert/sweetalert.min.js"></script>	<script src="js/plugin/slimscroll/jquery.slimscroll.min.js" type="text/javascript" language="javascript"></script>

    
    
</body>
</html>
<?php
mysqli_free_result($states);

mysqli_free_result($markets);
?>
