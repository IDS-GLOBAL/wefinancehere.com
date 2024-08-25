<?php require_once("db_wfh_approval_loggedin.php"); ?>
<?php

/*
$colname_userDets = "-1";
if (isset($_SESSION['MM_wfhuserUsername'])) {
  $colname_userDets = $_SESSION['MM_wfhuserUsername'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM `wfhuserprofile` WHERE `wfhuserprofile`.`wfhuser_email_address`=%s";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
*/

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `states` ORDER BY `state_name` ASC";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM `auto_years` ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_assoc($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM income_interval_options";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeMonths = "SELECT * FROM months_options";
$timeMonths = mysqli_query($idsconnection_mysqli, $query_timeMonths);
$row_timeMonths = mysqli_fetch_assoc($timeMonths);
$totalRows_timeMonths = mysqli_num_rows($timeMonths);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeYears = "SELECT * FROM year_options";
$timeYears = mysqli_query($idsconnection_mysqli, $query_timeYears);
$row_timeYears = mysqli_fetch_assoc($timeYears);
$totalRows_timeYears = mysqli_num_rows($timeYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mobile_carriers = "SELECT * FROM mobile_carriers ORDER BY carrier_label ASC";
$mobile_carriers = mysqli_query($idsconnection_mysqli, $query_mobile_carriers);
$row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers);
$totalRows_mobile_carriers = mysqli_num_rows($mobile_carriers);

?>
<!DOCTYPE html>
<html>
	<head>
	<title>Back Office Application View</title>
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
	
	<!-- BEGIN PAGE -->
	<div class="container">
			
	
        <?php include("_sidebar.user.approval.php"); ?>




		
		<!-- BEGIN CONTENT -->
        <div class="right content-page">
		
		<?php include("_top_navigation.php"); ?>			
			
			
			<!-- ============================================================== -->
			<!-- START YOUR CONTENT HERE -->
			<!-- ============================================================== -->
            <div class="body content rows scroll-y">
				
				<!-- Page header -->
				<div class="page-heading animated fadeInDownBig">
					<h1>Interview Setup <small>this will help us finalize your approval.</small></h1>
				</div>
				<!-- End page header -->
				
				<!-- Begin form wizard -->
				<div class="box-info full">
					<!-- FOrm selector #myWizard -->
					<form id="myWizard">
                    
						<!-- First step -->
						<section class="step" data-step-title="Personal">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="applicant_titlename">Title Name</label>
<select id="applicant_titlename" class="form-control">
<option value="" selected <?php if (!(strcmp("", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>> Select Title Name</option>
<option value="Mr." <?php if (!(strcmp("Mr.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
<option value="Mrs." <?php if (!(strcmp("Mrs.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
<option value="Miss." <?php if (!(strcmp("Miss.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Miss.</option>
<option value="Ms." <?php if (!(strcmp("Ms.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Ms.</option>
<option value="Dr." <?php if (!(strcmp("Dr.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Dr.</option>
                                      </select>
                                                                                
                                        <input id="applicant_gender" type="hidden" value="">
									</div>
									<div class="form-group">
										<label for="applicant_fname">First Name:</label>
										<input type="text" id="applicant_fname" placeholder="First Name" class="form-control" value="<?php echo $row_userDets['applicant_fname']; ?>">
									</div>

									<div class="form-group">
										<label for="applicant_fname">Middle Name:</label>
										<input type="text" id="applicant_mname" placeholder="Middle Name" class="form-control" value="<?php echo $row_userDets['applicant_mname']; ?>">
									</div>
									<div class="form-group">
										<label for="applicant_fname">Last Name:</label>
										<input type="text" id="applicant_lname" placeholder="Last Name" class="form-control" value="<?php echo $row_userDets['applicant_lname']; ?>">
									</div>
									<div class="form-group">
										<label for="applicant_cell_phone">Mobile Number</label>
										<input type="text" id="applicant_cell_phone" placeholder="Mobile Number" class="form-control" data-mask="(999) 999-9999" value="<?php echo $row_userDets['applicant_cell_phone']; ?>">
									</div>

                                    <div class="form-group">
                                        <label class="control-label">Mobile Carrier</label>
<select name="applicant_mobile_carrier" id="applicant_mobile_carrier" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_userDets['applicant_mobile_carrier']))) {echo "selected=\"selected\"";} ?>>Select Mobile Carrier</option>
    <?php
do {  
?>
    <option value="<?php echo $row_mobile_carriers['carrier_url']?>"<?php if (!(strcmp($row_mobile_carriers['carrier_url'], $row_userDets['applicant_mobile_carrier']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mobile_carriers['carrier_label']?> - <?php echo $row_mobile_carriers['carrier_url']?></option>
    <?php
} while ($row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers));
  $rows = mysqli_num_rows($mobile_carriers);
  if($rows > 0) {
      mysqli_data_seek($mobile_carriers, 0);
	  $row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers);
  }
?>
  </select>
                                    </div>




								</div><!-- End div. col-sm-6 -->
								<div class="col-sm-6">
									<!-- Wizard notes -->
									<div class="notes">
										<h4><strong>Tell Us About</strong> Yourself</h4>
										<p style="text-align: justify">
											While getting your approval prepared we need a little bit more information about how we can secure your loan by our underwriters.  The most accurate information to the best of your knowledge will be key. Please take the take and complete this first part of the interview process
										</p>
										<ol>
											<li>Who we are approving for a near future purchase?</li>
											<li>Where do you live and the length of time you been there?</li>
											<li>What county do you reside in taxes may vary by county.</li>
											<li>What are the best numbers for you to be reached by phone?</li>
											<li>How can your residencey be verified? If phone verification is not possible then a piece of mail will be required before taking delivery of your automobile.</li>
										</ol>
										<p style="text-align: justify">
										Also For Best practice tell us some more information so that we may better communicate with you on appointments and verification please and account recovery.
										</p>

									<div class="form-group">
										<label for="applicant_suffixname">Suffix</label>
										<input type="text" id="applicant_suffixname" placeholder="Suffix" class="form-control" value="<?php echo $row_userDets['applicant_suffixname']; ?>">
									</div>
									<div class="form-group">
										<label for="applicant_other_name">Other Names You go by</label>
										<input type="text" id="applicant_other_name" placeholder="Other Names you go by" class="form-control" value="<?php echo $row_userDets['applicant_other_name']; ?>">
									</div>
									<div class="form-group">
										<label for="applicant_maiden_name">Maiden Name</label>
										<input type="text" id="applicant_maiden_name" placeholder="Maiden Name" class="form-control" value="<?php echo $row_userDets['applicant_maiden_name']; ?>">
									</div>
                                        
									</div><!-- End div .notes -->
								</div><!-- End div .col-sm-6 -->
							</div><!-- End div .row -->
						</section>
						<!-- End first step -->
						
						
						<!-- Second step -->
						<section class="step" data-step-title="Residency Information">
							<div class="row">
								<div class="col-sm-6">
                                
                                                                    



<div class="form-group">
										<label for="applicant_present_address1">Present Address 1</label>
										<input type="text" id="applicant_present_address1" placeholder="Street Address" class="form-control" value="<?php echo $row_userDets['applicant_present_address1']; ?>">
								  </div>
									<div class="form-group">
										<label for="applicant_present_address2">Present Address 2</label>
										<input type="text" id="applicant_present_address2" placeholder="Continue Address" class="form-control" value="<?php echo $row_userDets['applicant_present_address2']; ?>">
									</div>

									<div class="form-group">
										<label for="applicant_present_addr_city">City</label>
										<input type="text" id="applicant_present_addr_city" placeholder="Continue Address" class="form-control" value="<?php echo $row_userDets['applicant_present_addr_city']; ?>">
									</div>

									<div class="form-group">
										<label for="applicant_present_addr_state">State</label>
  <select name="applicant_present_addr_state" id="applicant_present_addr_state" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_userDets['applicant_present_addr_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
    <?php do {  ?>
    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_userDets['applicant_present_addr_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
	<?php
    } while ($row_states = mysqli_fetch_assoc($states));
      $rows = mysqli_num_rows($states);
      if($rows > 0) {
          mysqli_data_seek($states, 0);
          $row_states = mysqli_fetch_assoc($states);
      }
    ?>
  </select>

									</div>
									<div class="form-group">
										<label for="applicant_present_addr_zip">Zip Code</label>
										<input type="text" id="applicant_present_addr_zip" placeholder="Zip code" class="form-control" value="<?php echo $row_userDets['applicant_present_addr_zip']; ?>">
									</div>
									<div class="form-group">
										<label for="applicant_present_addr_county">County</label>
										<input type="text" id="applicant_present_addr_county" placeholder="County" class="form-control" value="<?php echo $row_userDets['applicant_present_addr_county']; ?>">
									</div>
<div class="form-group">
    <label for="applicant_apart_or_house">Is This A House, Apartment or Mobile Home?</label>
    <select id="applicant_apart_or_house" class="form-control">
      <option value="" <?php if (!(strcmp("", $row_userDets['applicant_apart_or_house']))) {echo "selected=\"selected\"";} ?>>Select House or Apartment</option>
      <option value="Apartment" <?php if (!(strcmp("Apartment", $row_userDets['applicant_apart_or_house']))) {echo "selected=\"selected\"";} ?>>Apartment</option>
      <option value="House" <?php if (!(strcmp("House", $row_userDets['applicant_apart_or_house']))) {echo "selected=\"selected\"";} ?>>House</option>
      <option value="Mobile" <?php if (!(strcmp("Mobile", $row_userDets['applicant_apart_or_house']))) {echo "selected=\"selected\"";} ?>>Mobile Home</option>
      <option value="other" <?php if (!(strcmp("other", $row_userDets['applicant_apart_or_house']))) {echo "selected=\"selected\"";} ?>>Other</option>
    </select>
</div>
<div class="form-group">
    <label for="applicant_buy_own_rent_other">Buying </label>
	<select id="applicant_buy_own_rent_other" class="form-control">
	  <option value="Owns Home Outright" <?php if (!(strcmp("Owns Home Outright", $row_userDets['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Owns Home Outright</option>
	  <option value="Buying Home" <?php if (!(strcmp("Buying Home", $row_userDets['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Buying Home</option>
	  <option value="Renting/Leasing" <?php if (!(strcmp("Renting/Leasing", $row_userDets['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Renting/Leasing</option>
	  <option value="Living w/ Relatives" <?php if (!(strcmp("Living w/ Relatives", $row_userDets['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Living w/ Relatives</option>
	  <option value="Owns/Buying Mobile Home" <?php if (!(strcmp("Owns/Buying Mobile Home", $row_userDets['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Owns/Buying Mobile Home</option>
	  <option value="Unknown" <?php if (!(strcmp("Unknown", $row_userDets['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Unknown</option>
          </select>
</div>
<div class="form-group">
    <label for="applicant_house_payment">How Much Is Your House Payment?</label>
    
    
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="text" id="applicant_house_payment" placeholder="How Much Is Your House Payment?" class="form-control" value="<?php echo $row_userDets['applicant_house_payment']; ?>">
									
								</div>
    
</div>

										<h4><strong>How can we vereify where you</strong> live?</h4>
										<p style="text-align: justify">
										Before any monies is released to any parties involved accurate information about the buyer needs and will be verified same day or sometime during the next few business days.  The deal may be agreed to but verification must be verified before final completeition. By providing us with accurate information garuntees and satisfy agreements.
										</p>




<div class="form-group">
    <label for="applicant_addr_landlord_mortg">Landlord Or Mortgage Company Name</label>
    <input type="text" id="applicant_addr_landlord_mortg" placeholder="The Name Of Landlord or Company" class="form-control" value="<?php echo $row_userDets['applicant_addr_landlord_mortg']; ?>">
</div>
<div class="form-group">
    <label for="applicant_addr_landlord_phone">Landlord Or Mortgage Company Phone No</label>
    <input type="text" id="applicant_addr_landlord_phone" placeholder="Phone Number of Landlord or Company" class="form-control" data-mask="(999) 999-9999" value="<?php echo $row_userDets['applicant_addr_landlord_phone']; ?>">
</div>
<div class="form-group">
    <label for="applicant_name_oncurrent_lease">How Is The Name Spelled On Lease/Deed?</label>
    <input type="text" id="applicant_name_oncurrent_lease" placeholder="Whos name is  on lease where you live?" class="form-control" value="<?php echo $row_userDets['applicant_name_oncurrent_lease']; ?>">
</div>
<div class="form-group">
    <label for="applicant_addr_landlord_address">Landlord Or Mortgage Company Address</label>
    <input type="text" id="applicant_addr_landlord_address" placeholder="The Address of Landlord or Company" class="form-control" value="<?php echo $row_userDets['applicant_addr_landlord_address']; ?>">
</div>
<div class="form-group">
    <label for="applicant_addr_landlord_city">Landlord Or Mortgage Company City</label>
    <input type="text" id="applicant_addr_landlord_city" placeholder="The City of Landlord or Company" class="form-control" value="<?php echo $row_userDets['applicant_addr_landlord_city']; ?>">
</div>
<div class="form-group">
    <label for="applicant_addr_landlord_state">Landlord Or Mortgage Company State</label>
    <select id="applicant_addr_landlord_state" class="form-control">
    	<option value="">Select State</option>
    <option value="" <?php if (!(strcmp("", $row_userDets['applicant_addr_landlord_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
    <?php do {  ?>
    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_userDets['applicant_addr_landlord_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
    <?php
	} while ($row_states = mysqli_fetch_assoc($states));
	  $rows = mysqli_num_rows($states);
	  if($rows > 0) {
		  mysqli_data_seek($states, 0);
		  $row_states = mysqli_fetch_assoc($states);
	  }
	?>
    </select>
</div>
<div class="form-group">
    <label for="applicant_addr_landlord_zip">Landlord Or Mortgage Company Zip</label>
    <input type="text" id="applicant_addr_landlord_zip" class="form-control" placeholder="Zip Code" data-mask="99999" maxlength="5" value="<?php echo $row_userDets['applicant_addr_landlord_zip']; ?>">
</div>


                                    
                                    
								</div><!-- End div .col-sm-6 -->
								<div class="col-sm-6">
									<!-- Wizard notes -->
									<div class="notes">
										<h4><strong>Where Will Your Purchased Vehicle</strong> Be Parked?</h4>
										<p style="text-align: justify">
										Not only do we need to know where the purchased vehicle will be parked, but we also need to know how to properly apply the proper amount to satisfy local government taxes where you live.  Also we need make sure when mailing your auto payments the address with proper zip will be accurate for U.S. Postal mail.
										</p>
										<ol>
											<li>Underwriters look at how much you move or live at one place over the course of 5 years when it comes to lending.</li>
											<li>From a good date of hire will give an estimate of how many years and month from current time for residential history.</li>
										</ol>
                                        
                                        
                                        
									<div class="form-group">
										<label for="applicant_present_moveindate">Move In Date</label>
										<input type="text" id="applicant_present_moveindate" placeholder="Move In Date" class="form-control" value="<?php echo $row_userDets['applicant_present_moveindate']; ?>">
									</div>
                                        
                                        
                                        
									<div class="form-group">
									  <label for="applicant_addr_years">Years You Lived At This Address?</label>
										<select id="applicant_addr_years" class="form-control">
										  <option value="" <?php if (!(strcmp("", $row_userDets['applicant_addr_years']))) {echo "selected=\"selected\"";} ?>>Select Years</option>
										  <?php
do {  
?>
										  <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], $row_userDets['applicant_addr_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
<?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
                                      </select>
									</div>

									<div class="form-group">
										<label for="applicant_addr_months">Months You Lived At This Address?</label>
										<select id="applicant_addr_months" class="form-control">
										  <option value="" <?php if (!(strcmp("", $row_userDets['applicant_addr_months']))) {echo "selected=\"selected\"";} ?>>Select Months</option>
										  <?php do {  ?>
										  <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], $row_userDets['applicant_addr_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
										  <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
                                        </select>
                                        

									</div>                                    
                                        
                                    <div class="form-group">
                                    	<label for="user_comments_app_notes">Any comments you would like to make?</label>
                                        <textarea id="user_comments_app_notes" class="form-control" rows="5" cols="6"><?php echo $row_userDets['user_comments_app_notes']; ?></textarea>
                                    </div>
                                        
                                        
                                        
									</div><!-- End div .notes -->
								</div><!-- End div .col-sm-6 -->
							</div><!-- End div .row -->
						</section>
						<!-- End second step -->
						
						
						<!-- Third step -->
						<section class="step" data-step-title="Income Information">
							<div class="row">
                            <div class="col-sm-6">
                            

                                <div class="form-group">
                                    <label for="applicant_employer1_name">Employer Name</label>
                                    <input type="text" id="applicant_employer1_name" placeholder="Name Of Employer" class="form-control" value="<?php echo $row_userDets['applicant_employer1_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer1_addr">Employer Address</label>
                                    <input type="text" id="applicant_employer1_addr" placeholder="Employer Street Address" class="form-control" value="<?php echo $row_userDets['applicant_employer1_addr']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="applicant_employer1_city">Employer City</label>
                                    <input type="text" id="applicant_employer1_city" placeholder="City of Employer" class="form-control" value="<?php echo $row_userDets['applicant_employer1_city']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="applicant_employer1_state">Employer State</label>
                                    <select id="applicant_employer1_state" class="form-control">
                                    	<option value="">Select State</option>
    <option value="" <?php if (!(strcmp("", $row_userDets['applicant_employer1_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
    <?php do {  ?>
    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_userDets['applicant_employer1_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
	<?php
    } while ($row_states = mysqli_fetch_assoc($states));
      $rows = mysqli_num_rows($states);
      if($rows > 0) {
          mysqli_data_seek($states, 0);
          $row_states = mysqli_fetch_assoc($states);
      }
    ?>
  </select>
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer1_zip">Employer Zip</label>
                                    <input type="text" id="applicant_employer1_zip" data-mask="99999" placeholder="Employer Zip" class="form-control" value="<?php echo $row_userDets['applicant_employer1_zip']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer1_phone">Employer Phone Number</label>
                                    <input type="text" id="applicant_employer1_phone" placeholder="Number of Employer" class="form-control" data-mask="(999) 999-9999" value="<?php echo $row_userDets['applicant_employer1_phone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer1_phone_ext">Employer Phone Ext.</label>
                                    <input type="text" id="applicant_employer1_phone_ext" placeholder="Employer Phone Extension" class="form-control" value="<?php echo $row_userDets['applicant_employer1_phone_ext']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer1_work_dateofhire">Your Date of Hire.</label>
                                    <input type="text" id="applicant_employer1_work_dateofhire" placeholder="Employer Day of Hire" class="form-control" value="<?php echo $row_userDets['applicant_employer1_work_dateofhire']; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="applicant_employer1_work_years">Years Working Here</label>
                                    <select id="applicant_employer1_work_years" class="form-control">
                                      <option value="" <?php if (!(strcmp("", $row_userDets['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>Select Work Years</option>
                                      <?php
do {  
?>
                                      <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], $row_userDets['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
                                      <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer1_work_months">Months Working Here</label>
                                    <select id="applicant_employer1_work_months" class="form-control">
                                    	<option value="">Select Work Months</option>
										  <option value="" <?php if (!(strcmp("", $row_userDets['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>Select Months</option>
										  <?php do {  ?>
										  <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], $row_userDets['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
										  <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
                                        </select>

                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="applicant_employer1_salary_bringhome">Your Monthly Income?</label>

								<div class="input-group">
									<span class="input-group-addon">$</span>
                                    <input type="text" id="applicant_employer1_salary_bringhome" placeholder="Your Net Income" class="form-control" value="<?php echo $row_userDets['applicant_employer1_salary_bringhome']; ?>">
									
								</div>

                                </div>
                                
                                <div class="form-group">
                                    <label for="applicant_employer1_payday_freq">What is your pay cycle?</label>
                                    <select id="applicant_employer1_payday_freq" class="form-control">
                                      <option value="" <?php if (!(strcmp("", $row_userDets['applicant_employer1_payday_freq']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                                      <option value="Weekly" <?php if (!(strcmp("Weekly", $row_userDets['applicant_employer1_payday_freq']))) {echo "selected=\"selected\"";} ?>>Weekly</option>
                                      <option value="Biweekly" <?php if (!(strcmp("Biweekly", $row_userDets['applicant_employer1_payday_freq']))) {echo "selected=\"selected\"";} ?>>Biweekly</option>
                                      <option value="Semimonthly" <?php if (!(strcmp("Semimonthly", $row_userDets['applicant_employer1_payday_freq']))) {echo "selected=\"selected\"";} ?>>Semimonthly</option>
                                      <option value="Monthly" <?php if (!(strcmp("Monthly", $row_userDets['applicant_employer1_payday_freq']))) {echo "selected=\"selected\"";} ?>>Monthly</option>
                                      <option value="Yearly" <?php if (!(strcmp("Yearly", $row_userDets['applicant_employer1_payday_freq']))) {echo "selected=\"selected\"";} ?>>Yearly</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer_form_of_pymt">How Do You Get Paid?</label>
    <select name="applicant_employer_form_of_pymt" id="applicant_employer_form_of_pymt" class="form-control">
      <option value="" <?php if (!(strcmp("", $row_userDets['applicant_employer_form_of_pymt']))) {echo "selected=\"selected\"";} ?>>Select One</option>
      <option value="Direct Deposit" <?php if (!(strcmp("Direct Deposit", $row_userDets['applicant_employer_form_of_pymt']))) {echo "selected=\"selected\"";} ?>>Direct Deposit</option>
      <option value="Paper Check" <?php if (!(strcmp("Paper Check", $row_userDets['applicant_employer_form_of_pymt']))) {echo "selected=\"selected\"";} ?>>Paper Check</option>
      <option value="Handwritten Check" <?php if (!(strcmp("Handwritten Check", $row_userDets['applicant_employer_form_of_pymt']))) {echo "selected=\"selected\"";} ?>>Handwritten Check</option>
      <option value="Pay Card" <?php if (!(strcmp("Pay Card", $row_userDets['applicant_employer_form_of_pymt']))) {echo "selected=\"selected\"";} ?>>Pay Card</option>
<option value="Cash" <?php if (!(strcmp("Cash", $row_userDets['applicant_employer_form_of_pymt']))) {echo "selected=\"selected\"";} ?>>Cash</option>
    </select>
                                </div>
								

									<!-- Wizard notes -->
									<div class="notes">
										<h4><strong>Employment </strong> Verification</h4>
										<p style="text-align: justify">
										When attempting to verify your employment who should be contacted?  Perferably a  supervisor or manager.  We also need to know how to reach them.
										</p>
										<ol>
											<li>Supervisor Name And Contact Informaton</li>
											<li>Best way to describe your employment type and status, work position and department.</li>
											<li>When attempt verify your employment who is your supervisor and how to reach them?</li>
										</ol>

                                
                                <div class="form-group">
                                    <label for="applicant_employer1_supervisors_name">Supervisors Name</label>
                                    <input type="text" id="applicant_employer1_supervisors_name" placeholder="Supervisors Name" class="form-control" value="<?php echo $row_userDets['applicant_employer1_supervisors_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer1_supervisors_phone">Supervisors Phone Number</label>
                                    <input type="text" id="applicant_employer1_supervisors_phone" placeholder="Supervisors Phone Number" class="form-control" value="<?php echo $row_userDets['applicant_employer1_supervisors_phone']; ?>">
                                </div>
                                        

                                </div>
                                
							  </div><!-- End div .col-sm-6 -->
								<div class="col-sm-6">
									<!-- Wizard notes -->
									<div class="notes">
										<h4><strong>Employment </strong> Description</h4>
										<p style="text-align: justify">
										In this section we need to interview you on your employment information.
                                        We need to at least capture your current employer and how long you been there by years
                                        and months including hire date.
										</p>
										<ol>
											<li>Employer Name And Address Informaton</li>
											<li>What is your income amount after taxes related to your pay cycle.</li>
										</ol>
										<p style="text-align: justify">
										If your current income description doesn't completely describe your income situation please feel free to mention more income in the other income secition in the next step.  This will help finalize your approval.
										</p>
                                        
                                        
                              <div class="form-group">
                                <label for="applicant_employment_status">Employment Status</label>
                          <select id="applicant_employment_status" class="form-control">
                            <option value="" <?php if (!(strcmp("", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                <option value="Active Military" <?php if (!(strcmp("Active Military", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Active Military</option>
    <option value="Contract" <?php if (!(strcmp("Contract", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Contract</option>
<option value="Full Time" <?php if (!(strcmp("Full Time", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Full Time</option>
<option value="Not Applicable" <?php if (!(strcmp("Not Applicable", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Not Applicable</option>
<option value="Part Time" <?php if (!(strcmp("Part Time", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Part Time</option>
<option value="Retired" <?php if (!(strcmp("Retired", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Retired</option>
<option value="Seasonal" <?php if (!(strcmp("Seasonal", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Seasonal</option>
<option value="Self Employed" <?php if (!(strcmp("Self Employed", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Self Employed</option>
<option value="Temporary" <?php if (!(strcmp("Temporary", $row_userDets['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Temporary</option>
                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employment_type">Employment Type:</label>
                                    <select id="applicant_employment_type" class="form-control">
                                <option value="Auto Worker" <?php if (!(strcmp("Auto Worker", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Auto Worker</option>
                          <option value="Clerical" <?php if (!(strcmp("Clerical", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Clerical</option>
                    <option value="Craftsman" <?php if (!(strcmp("Craftsman", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Craftsman</option>
              <option value="Executive/Managerial" <?php if (!(strcmp("Executive/Managerial", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Executive/Managerial</option>
        <option value="Farmer" <?php if (!(strcmp("Farmer", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Farmer</option>
  <option value="Fisherman" <?php if (!(strcmp("Fisherman", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Fisherman</option>
  <option value="Government" <?php if (!(strcmp("Government", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Government</option>
<option value="Homemaker" <?php if (!(strcmp("Homemaker", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Homemaker</option>
<option value="Other" <?php if (!(strcmp("Other", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Other</option>
<option value="Professional" <?php if (!(strcmp("Professional", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Professional</option>
<option value="Sales/Advertising" <?php if (!(strcmp("Sales/Advertising", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Sales/Advertising</option>
<option value="Semi-Skilled Labor" <?php if (!(strcmp("Semi-Skilled Labor", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Semi-Skilled Labor</option>
<option value="Skilled Labor" <?php if (!(strcmp("Skilled Labor", $row_userDets['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Skilled Labor</option>
                       				</select>
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer1_position">Work Position</label>
                                    <input type="text" id="applicant_employer1_position" placeholder="Work Position" class="form-control" value="<?php echo $row_userDets['applicant_employer1_position']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="applicant_employer1_department">Department</label>
                                    <input type="text" id="applicant_employer1_department" placeholder="Department Name You Work In" class="form-control" value="<?php echo $row_userDets['applicant_employer1_department']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="applicant_employer1_hours_shift">What Is Your Work Shift?</label>
                                    <input type="text" id="applicant_employer1_hours_shift" placeholder="Your Work Shift" class="form-control" value="<?php echo $row_userDets['applicant_employer1_hours_shift']; ?>">
                                </div>

                                        
                                        
                                        
                                        
                                        
                                        
									</div><!-- End div .notes -->
								</div><!-- End div .col-sm-6 -->
							</div><!-- End div .row -->
						</section>
						<!-- End third step -->

						<!-- Fourth step -->
						<section class="step" data-step-title="Confirmation">
							<div class="row">
								<div class="col-sm-6">


									<div class="form-group">
										<label for="applicant_other_income_amount">Other Income Amount</label>
										

								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="text" id="applicant_other_income_amount" placeholder="Other Income Amount" class="form-control" value="<?php echo $row_userDets['applicant_other_income_amount']; ?>">
								</div>

                                        
									</div>
									<div class="form-group">
										<label for="applicant_other_income_source">Source Of Other Income</label>
										<input type="text" id="applicant_other_income_source" placeholder="Source Of Other Income" class="form-control" value="<?php echo $row_userDets['applicant_other_income_source']; ?>">
									</div>
									<div class="form-group">
										<label for="applicant_other_income_when_rcvd">Other Income When Received?</label>
<select name="applicant_other_income_when_rcvd" id="applicant_other_income_when_rcvd" class="form-control">
  <option value="" <?php if (!(strcmp("", $row_userDets['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Select One</option>
  <option value="Weekly" <?php if (!(strcmp("Weekly", $row_userDets['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Weekly</option>
  <option value="Biweekly" <?php if (!(strcmp("Biweekly", $row_userDets['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Biweekly</option>
  <option value="Semimonthly" <?php if (!(strcmp("Semimonthly", $row_userDets['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Semimonthly</option>
  <option value="Monthly" <?php if (!(strcmp("Monthly", $row_userDets['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Monthly</option>
  <option value="Yearly" <?php if (!(strcmp("Yearly", $row_userDets['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Yearly</option>
</select>


									</div>
                                    <div class="form-group">
                                    	<label for="applicant_digital_signature">Digital Signature</label>
                                        <input id="applicant_digital_signature" type="text" class="form-control" placeholder="Your Digital Signature Here" value="<?php echo $row_userDets['applicant_digital_signature']; ?>">
                                    </div>
                                    


								</div><!-- End div .col-sm-6 -->
								<div class="col-sm-6">
									<!-- Wizard notes -->
									<div class="notes">
										<h4><strong>Confirmation & Other</strong> Income</h4>
										<p style="text-align: justify">
										If your current income description doesn't completely describe your income situation please feel free to mention more income in the other income secition which improves your final approval.
										</p>
										<ol>
											<li>Enter other income information including where it comes from.</li>
										</ol>
										<p style="text-align: justify"><strong>Be sure to finish the interview with all question answered the best of your knowledge. </strong> your interview is near complete.</p>
									</div><!-- End div .notes -->
								</div><!-- End div .col-sm-6 -->
							</div><!-- End div .row -->
						</section>
						<!-- End fourth step -->
                        
                        
                        
                        
					</form>
				</div><!-- End div .box-info -->
				<!-- End form wizard -->
				
<?php include("footer.php"); ?>		
				
			
            </div>
			<!-- ============================================================== -->
			<!-- END YOUR CONTENT HERE -->
			<!-- ============================================================== -->
			
			
        </div>
<?php include("modals.php"); ?>		
		
	</div><!-- End div .container -->
<?php include("end.php"); ?>
<script src="assets/custom/interview.js" type="text/javascript" language="javascript"></script>
	</body>
</html>