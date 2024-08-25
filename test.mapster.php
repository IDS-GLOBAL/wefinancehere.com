<?php require_once("db.php"); ?>
<?php


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pub_sold_view = "SELECT * FROM `idsids_idsdms`.`vehicles`, `idsids_idsdms`.`dealers` WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vlivestatus` = '9' AND `vehicles`.`vthubmnail_file` IS NOT NULL ORDER BY RAND() LIMIT 16 ";
$pub_sold_view = mysqli_query($idsconnection_mysqli, $query_pub_sold_view);
$row_pub_sold_view = mysqli_fetch_array($pub_sold_view);
$totalRows_pub_sold_view = mysqli_num_rows($pub_sold_view);

mysqli_select_db($idsconnection_mysqli, $database_wfh_connection);
$query_wfh_latestaprovals = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_approvals` ORDER BY `wfhuser_approval_id` DESC LIMIT 10";
$wfh_latestaprovals = mysqli_query($wfh_connection_mysqli, $query_wfh_latestaprovals);
$row_wfh_latestaprovals = mysqli_fetch_assoc($wfh_latestaprovals);
$totalRows_wfh_latestaprovals = mysqli_num_rows($wfh_latestaprovals);


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
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    
    <meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico">
	<!-- link rel="stylesheet" href="assets/css/bootstrap.min.css" -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #usmap {
        height: 100%;
		width:100%;
		min-height: 600px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
  <?php include_once("analyticstracking.php") ?>
<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->

  	
        <div class="row">
            <div  id="gather_budget" class="col-sm-4">
            
            
              					

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


            <form action="" class="form-inline">


                
                <div class="row">

                    
                    <div class="col-md-6 has_idle" style="display:block;">
                <label for="dma_state">State:</label>
                    <div class="input-group mb-3">
                        <select id="dma_state" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
                            
                            <optgroup label="Results Based On State Availablity">
                            <option value="" <?php if (!(strcmp("", $row_find_existingsession_approval['wfhuser_approval_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                            <?php do { ?>
                            <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_find_existingsession_approval['wfhuser_approval_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                            <?php
                                } while ($row_states = mysqli_fetch_array($states));
                                $rows = mysqli_num_rows($states);
                                if($rows > 0) {
                                mysqli_data_seek($states, 0);
                                $row_states = mysqli_fetch_array($states);
                                }
                            ?>
                            </optgroup>
                            
                        </select>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
                        </div>
                    </div>

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
                        <label for="your_credit">Range Of Credit Score:</label>
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


                <div class="row" align="center" style="display:block;">
                    <div id="approval_boxwbudget" class="col-md-12 has_caution">
                    
                    
                        <h3>Your Approval So Far</h3>
                        <h3 id="need_amount">$ 0</h3>

                        <h3>Find A Car For</h3>
                        <h3 id="principle_amount">$ 0</h3>
                    
                    
                    
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                    
                    <div id="humanread_approval_script"></div>
                    
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
            <div class="col-sm-8">
            
                <h2>My Google Maps</h2>
                <div id="usmap">
                </div>
                <div>
                <p>
                    <span id="latitude_results"></span>&deg; 
                    <span id="longitude_results"></span>&deg;
                </p>
                <p>
                    <span id="formatted-address"></span>
                    <span id="address-components"></span>
                </p>
                </div>
    
        
            </div>
        </div>
    
    
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>  <!-- https://github.com/axios/axios -->
    <script>
	
	
  
	
      
	  // AIzaSyCYwsd0NKRysnUVB7BOi-4lRd7cq1QwS6Y   12-23-2019
	  
	  
	  //https://www.youtube.com/watch?v=3ls013DBcww
	  //  https://developers.google.com/maps/documentation/geolocation/intro?hl=en_US
	  
	 function initMap() {

        
	 }
    </script>
    <script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYwsd0NKRysnUVB7BOi-4lRd7cq1QwS6Y">
    </script>
    <script src="js/custom/api_thebooklogin.js"></script>
    <script src="js/custom/approval.widget.js"></script>
    <script src="js/custom/custom.start.js"></script>
    <script src="js/custom/custom.home.js"></script>
    <script src="js/themap.js"></script>


  </body>
</html>
