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
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK_a0-ONX1BHPXNc9LZxyFmYE370ujrRY&language=eng"></script>

</head>

<body data-spy="scroll">
<?php include_once("analyticstracking.php") ?>
<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.php"); ?>
    <!-- /.navbar -->


		<!-- ==============================================
		HEADER
		=============================================== -->
		<header id="home">


	<section class="wrapper-md bg-primary" id="vehicle_locations">
    
		<div class="container">
        
        
        <div class="">
        <div class="col-sm-12">
        
        
        
			<h2 class="text-center headline">Approval Locations</h2>
            
            <div class="row">
            	<div class="col-sm-4">
                
              <br class="spacer-lg">
        
  					<div id="gather_budget" class="col-sm-12">

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
<input id="bigSellingPrice"  type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_bigSellingPrice']; ?>">
<input id="cust_totalpayments" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_id']; ?>">
<input id="cust_dealtoday" type="hidden" value="">
<input id="cust_schedule_td" type="hidden" value="">
<input id="cust_lead_source" type="hidden" value="">
<input id="cust_lead_temperature" type="hidden" value="">
<input id="wfhcookiesesid"  type="hidden" value="<?php echo $cookie; ?>">
<input id="wfhuser_id" type="hidden" value="<?php echo $wfhuser_id; ?>">
<input id="wfhuser_approval_id" type="hidden" value="<?php echo $wfhuser_approval_id; ?>">
<input id="cust_home_state" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_state']; ?>">
<input id="cust_home_market" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_market']; ?>">
<input id="fbaccess_id" type="hidden" value="">
<input id="wfhuserperm_timezone" type="hidden" value="">
	<div id="connected_results">
    
    </div>

</div>
					
      
        
        <div class="widget padding-lg bg-dark">


                    	<form action="" class="form-inline">


                            
                        	<div class="row">

								
                                <div class="col-md-6 has_idle" style="display:block;">
							  <label for="dma_state">State:</label>
									<select id="dma_state" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
									<optgroup label="Results Based On State Availablity">
									  <option value="" <?php if (!(strcmp("", $row_find_existingsession_approval['wfhuser_approval_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
									  <?php
do {  
?>
									  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_find_existingsession_approval['wfhuser_approval_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
									  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                                    </optgroup>
                                 </select>

								</div><!-- /.col -->

                                <div class="col-md-6 has_idle" style="display:block;">
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


                                
                                <div class="col-md-6 has_idle">
									<label for="your_credit">Rate Your Credit:</label>
									<select id="your_credit" class="form-control" title='Choose One' data-style="btn-primary">
										<optgroup label="Good Credit">
							    <option value="3.0" <?php if (3.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>Very Good Credit (720 - 850)</option>
					      <option value="7.0" <?php if (7.0 == $row_find_existingsession_approval['wfhuser_approval_apr']) {echo "selected=\"selected\"";} ?>>Good Credit (675 - 719)</option>
			        <option value="12.0" <?php if (12.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>Fair Credit: (621-674)</option>
										</optgroup>
										<optgroup label="Bad Credit:">
	          <option value="21.0" <?php if (21.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>Slow Credit: (575- 620)</option>
        <option value="23.0" <?php if (23.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>Bad Credit: (Below - 575)</option>
        <option value="29.0" <?php if (29.0 == $row_find_existingsession_approval['wfhuser_approval_apr']){echo "selected=\"selected\"";} ?>>No Credit: (0 - ?) - I am not Sure</option>
										</optgroup>
									</select>
								</div><!-- /.col -->

                                <div class="col-md-6 has_idle">
                                
									<label for="max_car_payment">Max Car Payment:</label>
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


								<div class="col-md-6 has_idle">


									<label for="gross_moincome">Monthly Income:</label>
									<select id="gross_moincome" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
									  <optgroup label="Income Before Taxes">
<option value="1000" <?php if (!(strcmp(1000, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$850 - $1,000</option>
<option value="1250" <?php if (!(strcmp(1250, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$1,000 - $1,250</option>
<option value="1500" <?php if (!(strcmp(1500, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$1,500 - $1,500</option>
<option value="1750" <?php if (!(strcmp(1750, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$1,500 - $1,750</option>
<option value="2000" <?php if (!(strcmp(2000, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$1,750 - $2,000</option>
<option value="2250" <?php if (!(strcmp(2250, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$2,000 - $2,250</option>
<option value="2500" <?php if (!(strcmp(2500, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$2,250 - $2,500</option>
<option value="2750" <?php if (!(strcmp(2750, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$2,500 - $2,750</option>
<option value="3000" <?php if (!(strcmp(3000, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$2,700 - $3,000</option>
<option value="3250" <?php if (!(strcmp(3250, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$3,000 - $3,250</option>
<option value="3500" <?php if (!(strcmp(3500, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$3,250 - $3,500</option>
<option value="3750" <?php if (!(strcmp(3750, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$3,500 - $3,750</option>
<option value="4000" <?php if (!(strcmp(4000, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$3,750 - $4,000</option>
<option value="4250" <?php if (!(strcmp(4250, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$4,000 - $4,250</option>
<option value="4750" <?php if (!(strcmp(4750, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$4,500 - $4,750</option>
<option value="5000" <?php if (!(strcmp(5000, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$4,750 - $5,000</option>
<option value="5250" <?php if (!(strcmp(5250, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$5,000 - $5,250</option>
<option value="5500" <?php if (!(strcmp(5500, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$5,250 - $5,500</option>
<option value="5750" <?php if (!(strcmp(5750, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$5,500 - $5,750</option>
<option value="6000" <?php if (!(strcmp(6000, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$5,750 - $6,000</option>
<option value="6250" <?php if (!(strcmp(6250, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$6,000 - $6,250</option>
<option value="6750" <?php if (!(strcmp(6750, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$6,500 - $6,750</option>
<option value="7250" <?php if (!(strcmp(7250, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$7,000 - $7,250</option>
<option value="7500" <?php if (!(strcmp(7500, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$7,250 - $7,500</option>
<option value="7750" <?php if (!(strcmp(7750, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$7,500 - $7,750</option>
<option value="8000" <?php if (!(strcmp(8000, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$7,750 - $8,000</option>
<option value="8250" <?php if (!(strcmp(8250, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$8,000 - $8,250</option>
<option value="8750" <?php if (!(strcmp(8750, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$8,500 - $8,750</option>
<option value="9000" <?php if (!(strcmp(9000, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$8,750 - $9,000</option>
<option value="9250" <?php if (!(strcmp(9250, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$9,000 - $9,250</option>
<option value="9500" <?php if (!(strcmp(9500, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$9,250 - $9,500</option>
<option value="9750" <?php if (!(strcmp(9750, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$9,500 - $9,750</option>
<option value="10000" <?php if (!(strcmp(10000, $row_find_existingsession_approval['wfhuser_approval_month_income']))) {echo "selected=\"selected\"";} ?>>$10,000 - $10,000 (+)Plus</option>
									  </optgroup>
									</select>
								

                                </div><!-- /.col -->

                              
								<div class="col-md-6 has_idle">


									<label for="how_long">Loan Term:</label>
									<select id="how_long" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="The Longest You'll Go?">
      <option value="1" <?php if (1 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>1 Year</option>
      <option value="2" <?php if (2 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>2 Years</option>
      <option value="3" <?php if (3 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>3 Years</option>
      <option value="4" selected <?php if (4 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>4 Years</option>
      <option value="5" <?php if (5 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>5 Years</option>
<option value="6" <?php if (6 == $row_find_existingsession_approval['wfhuser_approval_monthterm']){ echo "selected=\"selected\"";} ?>>6 Years</option>
										</optgroup>
									</select>
								

                                </div><!-- /.col -->
                                
   
							
								
                                <div class="col-md-6 has_idle">
									<label for="down_payment">Your Down Payment:</label>
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
								
								

                                <div class="col-md-6 has_idle" style="display:block;">
									<label for="open_trade">Current Car Loan?</label>
									<select id="open_trade" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="I currently have a car loan on my credit: ">
<option value="NO" <?php if ("NO" == $row_find_existingsession_approval['wfhuser_approval_openloan']){ echo "selected=\"selected\"";} ?>>NO</option>                                        
<option value="YES" <?php if ("YES" == $row_find_existingsession_approval['wfhuser_approval_openloan']){ echo "selected=\"selected\"";} ?>>YES</option>
										</optgroup>
									</select>
								</div><!-- /.col -->

								
                                
                                
                                
							</div>


							<div class="row" align="center" style="display:none;">
                            	<div id="approval_boxwbudget" class="col-md-12 has_caution">
                                
                                
                                	<h3>Your Approval So Far</h3>
                                	<h3 id="need_amount">$ 0</h3>

                                	<h3>Find A Car For</h3>
                                	<h3 id="principle_amount">$ 0</h3>
                                
                                
                                
                                
                                </div>
                            </div>



                        	<div class="row" align="center">

                                <div class="col-md-4 has_idle">
									<label class="need_amount">Your Pre-Approval</label>
									<h3 id="need_amount">$ 0</h3>
                                    
								</div><!-- /.col -->
								

                                <div class="col-md-4 has_idle">
									<label for="shop_only">See Results</label>
									<a id="shop_only" type="button" href="#vdlisting_results" role="button"  class="btn btn-primary btn-lg btn-block page-scroll">GO!</a>
								</div>

                                <div class="col-md-4 has_idle">
									<label class="principle_amount">Find A Car For</label>
									<h3 id="principle_amount">$ 0</h3>
                                    
								</div><!-- /.col -->
								
                            
                            
                                								
                                
                                
                                
							</div>




						</form>




        </div>
        </div>  
                
                </div>
            	<div class="col-sm-8">
                
              			<br class="spacer-lg">
			<div class="row scrollimation fade-up d1 in">

            
            
                        <div id="map-canvas"></div>
    



            

  

<script type="text/javascript">

var map;
var Markers = {};
var infowindow;
var locations = [];



        // Create a <script> tag and set the USGS URL as the source.
        var script = document.createElement('script');

        // This example uses a local copy of the GeoJSON stored at
        // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
        script.src = 'https://wefinancehere.com/jSon/map_locations.php';
        document.getElementsByTagName('head')[0].appendChild(script);






/*
google.maps.event.addDomListener(outer, 'click', function() {
  map.setCenter(chicago)
});

*/

var origin = new google.maps.LatLng(37.09024, -100.712891);
//var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);




function initialize() {
  var mapOptions = {
    zoom: 5,
    center: origin,
	gestureHandling: 'cooperative',
	mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.TOP_CENTER
    },
	zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.LEFT_CENTER
          },
          scaleControl: true,
          streetViewControl: true,
          streetViewControlOptions: {
              position: google.maps.ControlPosition.LEFT_TOP
          },
    fullscreenControl: true,
	styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
  };

  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


	// Set the map's style to the initial value of the selector.
	var stateSelector = document.getElementById('dma_state');
	var dma_state = stateSelector.options[stateSelector.selectedIndex].value;

	var marketSelector = document.getElementById('dma_market');
	
	//map.setOptions({styles: styles[styleSelector.value]});

	// Apply new JSON when the user selects a different style.
	stateSelector.addEventListener('change', function() {
			//var slct_dma_state = document.getElementById("dma_state");
			//var dma_state = slct_dma_state.options[slct_dma_state.selectedIndex].value;
			var dma_state = stateSelector.options[stateSelector.selectedIndex].value;


	  ///map.setOptions({styles: styles[stateSelector.value]});
	  //map.setCenter(chicago)
	 // map.setCenter(dma_state);
	  
	  console.log('State changed');
	});
	
	
	marketSelector.addEventListener('change', function() {
	  ///map.setOptions({styles: styles[stateSelector.value]});
	  //map.setCenter(chicago)
	  
	  console.log('Market changed');
	});


	var image = 'img/icons/auto-orange-icon.png';

	infowindow = new google.maps.InfoWindow();

    for(i=0; i<locations.length; i++) {
    	var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
		var marker = new google.maps.Marker({
			position: position,
			map: map,
			icon: locations[i][4],
		});


		marker.addListener('click', function() {
			map.setZoom(14);
			map.setCenter(marker.getPosition());
		  });


		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(locations[i][1]);
				infowindow.setOptions({maxWidth: 300});
				infowindow.open(map, marker);
			}
		}) (marker, i));
		Markers[locations[i][4]] = marker;
	}

	locate(0);

}

function locate(marker_id) {
	var myMarker = Markers[marker_id];
	var markerPosition = myMarker.getPosition();
	map.setCenter(markerPosition);
	google.maps.event.trigger(myMarker, 'click');
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
            
            
            
            
            </div>
			
  
                
                </div>
            </div>
        
        
        </div>
        </div>
   </div>
   
   
   </section>
			
		</header><!--End header -->

		<div id="main-content">
        
			<div class="scroll-down">
				<a href="#services" class="scrollto">See More</a>
			</div>



	<section class="wrapper-md">
		<div class="container">
			<div class="row">
                <div class="col-sm-12">
                
                <h2>Easy Approvals For Everyone Quick And Easy</h2>
                    <p class="lead">Finance your next vehicle through Wefinancehere.com</p>
                    <p class="lead">See Listings by downpayment / monthly prices.</p>
                    <p class="lead">If you have income with a valid drivers licenses we can have you riding today.</p>
                    
                
                </div>
				<div class="col-sm-12 text-center">
					
                    <div class="row">
                            
                            <h2><i class="fa fa-facebook-official text-primary"></i> Personlize Your Experience Login With Facebook To . <span class="text-muted">The best auto</span> deals online.</h2>
                            
                            
                            <p class="lead">Regardless of your credit situation get the deal you deserve by what you can afford and what you can finance.</p>
                            
                            
                        <!--div class="col-sm-6">
                            <p><a  class="btn btn-lg btn-primary">View Quality (Cars) <i class="fa fa fa-car"></i></a></p>
                        </div>
                        <div class="col-sm-6">
                            <p><a  class="btn btn-lg btn-primary"><i class="fa fa fa-car"></i> View BuyHere Pay Here (Cars)</a></p>
                        </div -->
                    </div>

                    
                    
                    
                    
				</div><!-- /.col -->
			</div><!-- /.row -->
            <div class="row">
            	<div class="col-sm-12 text-center">
                	<div class="btn btn-default btn-block" onclick="login()"><h2><i class="fa fa-facebook-official"></i> Personalize Your Experience</h2></div>
                </div>
            </div>
		</div><!-- /.container -->
	</section>





	<section class="wrapper-md">
		<div id="dstore_listing_result" class="container">
        <div id="dstore_controls"></div>
        
        
        
          
          
          
                                          
                                          
                                          
                                          
		</div>
	</section>






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
            	<div class="col-m-12 text-center plan">



                
                <h2>Easy Approvals For Everyone Quick And Easy</h2>
                    <p class="lead">Finance your next vehicle through Wefinancehere.com</p>
                    <p class="lead">See Listings by downpayment / monthly prices.</p>
                    <p class="lead">If you have income with a valid drivers licenses we can have you riding today.</p>







                </div>
            </div>
        </div>
    </section>
































	

<section class="wrapper-lg bg-highlight" id="pricing">
		
        <div class="container">
			<h3 class="text-center">What You Can Expect About Finance Rates <small>based on historical national research.</small></h3>
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
							<h1>2.9 <small>/apr</small></h1>
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












	<section class="wrapper-md bg-primary" id="recently_sold">
		<div class="container">
			<h2 class="text-center headline">Recently Sold</h2>
			<br class="spacer-lg">
			<div class="row">
            
			
            
<?php do { ?>
<?php
$row_pub_sold_view['vid'];

$open_url = "https://images.autocitymag.com/".$row_pub_sold_view['did'].'/'.$row_pub_sold_view['vid'].'/'.$row_pub_sold_view['vthubmnail_file'];
?>
     
            	<div class="col-sm-6 col-md-3">
					<div class="thumbnail text-default">
						<div class="overlay-container">
							<img src="<?php echo $open_url; ?>">
							<div class="overlay-content">
								<h3 class="h4 headline">Sold Vehicles</h3>
								<p>Example of there great deals done already.</p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta vehicle_descip_box_layout_sm">
							<i class="fa fa-fw fa-info-circle"></i> <?php echo $row_pub_sold_view['vyear']; ?> <?php echo $row_pub_sold_view['vmake']; ?> <?php echo $row_pub_sold_view['vmodel']; ?> <?php echo $row_pub_sold_view['vtrim']; ?>
						</div>
						<div class="thumbnail-meta">
							<p><i class="fa fa-fw fa-home"></i> <?php echo $row_pub_sold_view['address']; ?></p>
							<p><i class="fa fa-fw fa-map-marker"></i> <?php echo $row_pub_sold_view['city']; ?>, <?php echo $row_pub_sold_view['state']; ?>  <?php echo $row_pub_sold_view['zip']; ?></p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default"><?php if(!$row_pub_sold_view['vrprice']){   echo 'Unlisted'; }else{ echo formatMoney($row_pub_sold_view['vrprice'] , true); } ?></span> <a class="btn btn-link pull-right">SOLD <i class="fa fa-flag"></i></a>
						</div>
					</div><!-- /.thumbnail -->
				</div><!-- /.col -->
		  
  <?php } while ($row_pub_sold_view = mysqli_fetch_assoc($pub_sold_view)); ?>         
          
          
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
    </div><!--End main-content -->
	<!-- last but not least the javascript -->
	<script src="js/custom/api_thebooklogin.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
    <script src="js/custom/approval.widget.js"></script>
    <script src="js/custom/custom.start.js"></script>
	<script src="assets/js/holder.js"></script>
	<script src="js/custom/custom.home.js"></script>
	<script src="js/plugin/jasny-bootstrap/js/jasny-bootstrap.js"></script>
    <!-- Sweet alert -->
    <script src="js/plugin/sweetalert/sweetalert.min.js"></script>
    
</body>
</html>
<?php
mysqli_free_result($states);

mysqli_free_result($markets);
?>
