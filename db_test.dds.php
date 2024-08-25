<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/wfh_connection.php'); ?>
<?php


$colname_userDets = "-1";
if (isset($_SESSION['MM_wfhuserUsername'])) {
  $colname_userDets = $_SESSION['MM_wfhuserUsername'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM `wfhuserprofile` WHERE `wfhuserprofile`.`wfhuser_email_address`=%s";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);

include("../Libary/sessioncookies.php");

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `states` ORDER BY `states`.`state_name` ASC";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_combine_markets = "SELECT * FROM `states`, `markets_dm` WHERE `states`.`state_id` = `markets_dm`.`state_id` AND `markets_dm`.`market_status` = '1'";
$combine_markets = mysqli_query($idsconnection_mysqli, $query_combine_markets);
$row_combine_markets = mysqli_fetch_assoc($combine_markets);
$totalRows_combine_markets = mysqli_num_rows($combine_markets);

$colname_find_vehicle = "-1";
if (isset($_GET['v'])) {
  $colname_find_vehicle = $_GET['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle =  "SELECT * FROM `vehicles`, `dealers` WHERE `dealers`.`id` =  `vehicles`.`did` AND `vehicles`.`vid` = '$colname_find_vehicle'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);

$colname_store_vehicles = "-1";
if (isset($_GET['token'])) {
  $colname_store_vehicles = $_GET['token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_store_vehicles =  "SELECT * FROM `dealers`, `vehicles` WHERE `token` = '$colname_store_vehicles' AND dealers.id = vehicles.did ORDER BY vehicles.vyear ASC, vehicles.vmake ASC, vehicles.vmodel ASC, vehicles.vrprice DESC";
$store_vehicles = mysqli_query($idsconnection_mysqli, $query_store_vehicles);
$row_store_vehicles = mysqli_fetch_assoc($store_vehicles);
$totalRows_store_vehicles = mysqli_num_rows($store_vehicles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
echo $query_dlr_info = "SELECT `dealers`.`dealer_type_id`, COUNT(dealer_type_id) as `dealer_type_count`, `dealers`.`status`, `dealer_types`.`dtype_id`, `dealer_types`.`dtype_value`,  `dealer_types`.`dtype_label` FROM `dealers`, `dealer_types` WHERE `dealers`.`status` = '1' AND `dealers`.`dealer_type_id` =  `dealer_types`.`dtype_id` GROUP BY `dealer_type_id` ";
$dlr_info = mysqli_query($idsconnection_mysqli, $query_dlr_info);
$row_dlr_info = mysqli_fetch_assoc($dlr_info);
$totalRows_dlr_info = mysqli_num_rows($dlr_info);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_types = "SELECT `dealers`.`dealer_type_id`, COUNT(dealer_type_id) as `dealer_type_count`, `dealers`.`status`, `dealer_types`.`dtype_id`, `dealer_types`.`dtype_value`,  `dealer_types`.`dtype_label` FROM `dealers`, `dealer_types` WHERE `dealers`.`status` = '1' AND `dealers`.`dealer_type_id` =  `dealer_types`.`dtype_id` GROUP BY `dealer_type_id` ";
$dealer_types = mysqli_query($idsconnection_mysqli, $query_dealer_types);
$row_dealer_types = mysqli_fetch_assoc($dealer_types);
$totalRows_dealer_types = mysqli_num_rows($dealer_types);

$colname_LiveVehicles = "-1";
if (isset($_GET['state'])) {
  $colname_LiveVehicles = $_GET['state'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_LiveVehicles =  "SELECT * FROM `dealers` WHERE `dealers`.`state` = '$colname_LiveVehicles'";
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);
$totalRows_LiveVehicles = mysqli_num_rows($LiveVehicles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mobile_carriers = "SELECT * FROM `mobile_carriers` ORDER BY `mobile_carriers`.`carrier_label` ASC";
$mobile_carriers = mysqli_query($idsconnection_mysqli, $query_mobile_carriers);
$row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers);
$totalRows_mobile_carriers = mysqli_num_rows($mobile_carriers);

mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_query_carmakes = "SELECT * FROM `auto_years` ORDER BY `year` DESC";
$query_carmakes = mysqli_query($wfh_connection_mysqli, $query_query_carmakes);
$row_query_carmakes = mysqli_fetch_assoc($query_carmakes);
$totalRows_query_carmakes = mysqli_num_rows($query_carmakes);



mysqli_select_db($wfh_connection_mysqli, $database_idsconnection);
$query_wfh_latestaprovals_verified = "SELECT * FROM `wfhuser_approvals` WHERE `wfhuser_approvals`.`wfhuser_approval_email_verified` = '1' ORDER BY `wfhuser_approval_id` DESC LIMIT 10";
$wfh_latestaprovals_verified = mysqli_query($wfh_connection_mysqli, $query_wfh_latestaprovals_verified);
$row_wfh_latestaprovals_verified = mysqli_fetch_assoc($wfh_latestaprovals_verified);
$totalRows_wfh_latestaprovals_verified = mysqli_num_rows($wfh_latestaprovals_verified);

$colname_find_existingwfhuserprofile_email = "-1";
if (isset($_GET['wfhuser_email_address'])) {
  $colname_find_existingwfhuserprofile_email = $_GET['wfhuser_email_address'];
}
mysqli_select_db($wfh_connection_mysqli, $database_idsconnection);
$query_find_existingwfhuserprofile_email =  "SELECT * FROM `wfhuserprofile` WHERE `wfhuserprofile`.`wfhuser_email_address` = '$colname_find_existingwfhuserprofile_email'";
$find_existingwfhuserprofile_email = mysqli_query($idsconnection_mysqli, $query_find_existingwfhuserprofile_email, $wfh_connection);
$row_find_existingwfhuserprofile_email = mysqli_fetch_assoc($find_existingwfhuserprofile_email);
$totalRows_find_existingwfhuserprofile_email = mysqli_num_rows($find_existingwfhuserprofile_email);

$colname_find_existingsession_approval = "-1";
if (isset($cookie)) {
  $colname_find_existingsession_approval = $cookie;
}
mysqli_select_db($wfh_connection_mysqli, $database_idsconnection);
$query_find_existingsession_approval =  "SELECT * FROM `wfhuser_approvals` WHERE `wfhuser_approvals`.`wfhuser_approval_sessionid` = '$cookie'";
$find_existingsession_approval = mysqli_query($wfh_connection_mysqli, $query_find_existingsession_approval);
$row_find_existingsession_approval = mysqli_fetch_assoc($find_existingsession_approval);
$totalRows_find_existingsession_approval = mysqli_num_rows($find_existingsession_approval);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form>
  <div class="form-group">
    <p>&nbsp;</p>
    <div class="col-md-4 has_idle">
<label for="your_credit">Your Credit:</label>
									<select id="your_credit" class="form-control" title='Choose One' data-style="btn-primary">
							    <option value="3.0" <?php if (!(strcmp(3.0, $row_find_existingsession_approval['wfhuser_approval_apr']))) {echo "selected=\"selected\"";} ?>>3.0 Very Good Credit (720 - 850)</option>
					      <option value="7.0" <?php if (!(strcmp(7.0, $row_find_existingsession_approval['wfhuser_approval_apr']))) {echo "selected=\"selected\"";} ?>>7.0 Good Credit (675 - 719)</option>
			        <option value="12.0" <?php if (!(strcmp(12.0, $row_find_existingsession_approval['wfhuser_approval_apr']))) {echo "selected=\"selected\"";} ?>>12.0 Fair Credit: (621-674)</option>
	          <option value="21.0" <?php if (!(strcmp(21.0, $row_find_existingsession_approval['wfhuser_approval_apr']))) {echo "selected=\"selected\"";} ?>>21.0 Slow Credit: (575- 620)</option>
        <option value="23.0" <?php if (!(strcmp(23.0, $row_find_existingsession_approval['wfhuser_approval_apr']))) {echo "selected=\"selected\"";} ?>>23.0 Bad Credit: (Below - 575)</option>
        <option value="29.0" <?php if (!(strcmp(29.0, $row_find_existingsession_approval['wfhuser_approval_apr']))) {echo "selected=\"selected\"";} ?>>29.0 No Credit: (0 - ?) - I am not Sure</option>
									</select>
								</div><!-- /.col -->
    <p>&nbsp;</p>
    <p>									<select id="down_payment" class="form-control" title='Choose One' data-style="btn-primary">
      <option value="100" <?php if (!(strcmp(100, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 100.00</option>
      <option value="200" <?php if (!(strcmp(200, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 200.00</option>
      <option value="300" <?php if (!(strcmp(300, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 300.00</option>
      <option value="400" <?php if (!(strcmp(400, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 400.00</option>
      <option value="500" <?php if (!(strcmp(500, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 500.00</option>
      <option value="600" <?php if (!(strcmp(600, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 600.00</option>
      <option value="700" <?php if (!(strcmp(700, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 700.00</option>
      <option value="800" <?php if (!(strcmp(800, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 800.00</option>
      <option value="900" <?php if (!(strcmp(900, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 900.00</option>
      <option value="1000" <?php if (!(strcmp(1000, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1000.00</option>
      <option value="1100" <?php if (!(strcmp(1100, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1100.00</option>
      <option value="1200" <?php if (!(strcmp(1200, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1200.00</option>
      <option value="1300" <?php if (!(strcmp(1300, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1300.00</option>
      <option value="1400" <?php if (!(strcmp(1400, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1400.00</option>
      <option value="1500" <?php if (!(strcmp(1500, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1500.00</option>
      <option value="1600" <?php if (!(strcmp(1600, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1600.00</option>
      <option value="1700" <?php if (!(strcmp(1700, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1700.00</option>
      <option value="1800" <?php if (!(strcmp(1800, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1800.00</option>
      <option value="1900" <?php if (!(strcmp(1900, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 1900.00</option>
      <option value="2000" <?php if (!(strcmp(2000, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2000.00</option>
      <option value="2100" <?php if (!(strcmp(2100, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2100.00</option>
      <option value="2200" <?php if (!(strcmp(2200, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2200.00</option>
      <option value="2300" <?php if (!(strcmp(2300, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2300.00</option>
      <option value="2400" <?php if (!(strcmp(2400, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2400.00</option>
      <option value="2500" <?php if (!(strcmp(2500, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2500.00</option>
      <option value="2600" <?php if (!(strcmp(2600, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2600.00</option>
      <option value="2700" <?php if (!(strcmp(2700, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2700.00</option>
      <option value="2800" <?php if (!(strcmp(2800, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2800.00</option>
      <option value="2900" <?php if (!(strcmp(2900, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 2900.00</option>
      <option value="3000" <?php if (!(strcmp(3000, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3000.00</option>
      <option value="3100" <?php if (!(strcmp(3100, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3100.00</option>
      <option value="3200" <?php if (!(strcmp(3200, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3200.00</option>
      <option value="3300" <?php if (!(strcmp(3300, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3300.00</option>
      <option value="3400" <?php if (!(strcmp(3400, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3400.00</option>
      <option value="3500" <?php if (!(strcmp(3500, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3500.00</option>
      <option value="3600" <?php if (!(strcmp(3600, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3600.00</option>
      <option value="3700" <?php if (!(strcmp(3700, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3700.00</option>
      <option value="3800" <?php if (!(strcmp(3800, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3800.00</option>
      <option value="3900" <?php if (!(strcmp(3900, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 3900.00</option>
      <option value="4000" <?php if (!(strcmp(4000, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 4000.00</option>
      <option value="4001" <?php if (!(strcmp(4001, $row_find_existingsession_approval['wfhuser_approval_dwpymt']))) {echo "selected=\"selected\"";} ?>>$ 4000.00 (+) Plus</option>
    </select>
    </p>
    <p>&nbsp;</p>
    <p>									<select id="max_car_payment" class="form-control selectpicker show-tick" title='$50 Car Payment' data-style="btn-primary">
      <option value="250" <?php if (!(strcmp(250, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$200 - $250</option>
      <option value="250" <?php if (!(strcmp(250, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$200 - $250</option>
<option value="300" <?php if (!(strcmp(300, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$250 - $300</option>
<option value="350" <?php if (!(strcmp(350, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$300 - $350</option>
<option value="400" <?php if (!(strcmp(400, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$350 - $400</option>
<option value="500" <?php if (!(strcmp(500, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$450 - $500</option>
<option value="550" <?php if (!(strcmp(550, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$500 - $550</option>
<option value="550" <?php if (!(strcmp(550, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$500 - $550</option>
<option value="650" <?php if (!(strcmp(650, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$600 - $650</option>
<option value="750" <?php if (!(strcmp(750, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$700 - $750</option>
<option value="850" <?php if (!(strcmp(850, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$800 - $850</option>
<option value="950" <?php if (!(strcmp(950, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$900 - $950</option>
<option value="1050" <?php if (!(strcmp(1050, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$1000 - $1050</option>
<option value="1100" <?php if (!(strcmp(1100, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$1050 - $1100</option>
<option value="1150" <?php if (!(strcmp(1150, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$1100 - $1150</option>
<option value="1200" <?php if (!(strcmp(1200, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$1150 - $1200</option>
<option value="1300" <?php if (!(strcmp(1300, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$1200 - $1300</option>
<option value="1400" <?php if (!(strcmp(1400, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$1300 - $1400</option>
<option value="1600" <?php if (!(strcmp(1600, $row_find_existingsession_approval['wfhuser_approval_mxpymt']))) {echo "selected=\"selected\"";} ?>>$1500 - $1600</option>
									</select>
</p>
    <p>&nbsp;</p>
    <p>									<select id="how_long" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
      <option value="1" <?php if (!(strcmp(1, $row_find_existingsession_approval['wfhuser_approval_monthterm']))) {echo "selected=\"selected\"";} ?>>1 Year</option>
      <option value="2" <?php if (!(strcmp(2, $row_find_existingsession_approval['wfhuser_approval_monthterm']))) {echo "selected=\"selected\"";} ?>>2 Years</option>
      <option value="3" <?php if (!(strcmp(3, $row_find_existingsession_approval['wfhuser_approval_monthterm']))) {echo "selected=\"selected\"";} ?>>3 Years</option>
      <option value="4" selected <?php if (!(strcmp(4, $row_find_existingsession_approval['wfhuser_approval_monthterm']))) {echo "selected=\"selected\"";} ?>>4 Years</option>
      <option value="5" <?php if (!(strcmp(5, $row_find_existingsession_approval['wfhuser_approval_monthterm']))) {echo "selected=\"selected\"";} ?>>5 Years</option>
<option value="6" <?php if (!(strcmp(6, $row_find_existingsession_approval['wfhuser_approval_monthterm']))) {echo "selected=\"selected\"";} ?>>6 Years</option>
									</select>
</p>
    <p>&nbsp;</p>
    <p>									<select id="gross_moincome" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
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
									</select>
</p>
    <p>									<select id="dma_state" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
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
                                  </select>
</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>
    <select id="dma_market" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
<option value="" <?php if (!(strcmp("", $row_find_existingsession_approval['wfhuser_approval_state']))) {echo "selected=\"selected\"";} ?>>Choose State</option>
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
    </select>

	</p>
    <p>&nbsp;</p>
  <p>									
    <select id="open_trade" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
<option value="" <?php if (!(strcmp("", $row_find_existingsession_approval['wfhuser_approval_openloan']))) {echo "selected=\"selected\"";} ?>>Select Please</option>
<option value="YES" <?php if (!(strcmp("YES", $row_find_existingsession_approval['wfhuser_approval_openloan']))) {echo "selected=\"selected\"";} ?>>YES</option>
<option value="NO" <?php if (!(strcmp("NO", $row_find_existingsession_approval['wfhuser_approval_openloan']))) {echo "selected=\"selected\"";} ?>>NO</option>
									</select>
</p>
    <p>
      <label>Loan Term (Months):</label>
      <select id="loan_term_months" class="form-control">
        <option value="12" <?php if (!(strcmp(1, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>1 Year</option>
        <option value="24" <?php if (!(strcmp(2, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>2 Years</option>
        <option value="36" <?php if (!(strcmp(3, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>3 Years</option>
        <option value="48" selected="selected" <?php if (!(strcmp(4, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>4 Years</option>
        <option value="60" <?php if (!(strcmp(5, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>5 Years</option>
        <option value="72" <?php if (!(strcmp(6, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>6 Years</option>
      </select>
    </p>
    <p>&nbsp;</p>
</div>
                
                <div class="form-group">
		          <select name="interest_credit_score" id="interest_credit_score" class="form-control">
		            <optgroup label="Good Credit">
                        <option value="<?php echo $row_find_vehicle['usedmatrixcredit_vgoodcredit']; ?>">Very Good Credit (720 - 850) | est. <?php echo $row_find_vehicle['usedmatrixcredit_vgoodcredit']; ?> apr</option>
                        <option value="<?php echo $row_find_vehicle['usedmatrixcredit_jgoodcredit']; ?>">Good Credit (675 - 719) |  est. <?php echo $row_find_vehicle['usedmatrixcredit_jgoodcredit']; ?> apr</option>
                        <option value="<?php echo $row_find_vehicle['usedmatrixcredit_faircredit']; ?>">Fair Credit: (621 - 674) | est. <?php echo $row_find_vehicle['usedmatrixcredit_faircredit']; ?> apr</option>
                    </optgroup>
                        <optgroup label="Bad Credit:">
                            <option value="<?php echo $row_find_vehicle['usedmatrixcredit_poorcredit']; ?>">Poor Credit: (575 - 620)  | est. <?php echo $row_find_vehicle['usedmatrixcredit_poorcredit']; ?> apr</option>
                            <option value="<?php echo $row_find_vehicle['usedmatrixcredit_subprime']; ?>">Sub Prime: (Below - 575) | est."<?php echo $row_find_vehicle['usedmatrixcredit_subprime']; ?> apr</option></option>
                            <option value="<?php echo $row_find_vehicle['usedmatrixcredit_unknown']; ?>">No Credit: (0 - ?) - I am not Sure | est. <?php echo $row_find_vehicle['usedmatrixcredit_unknown']; ?> apr</option></option>
                        </optgroup>
                </select>
<p>&nbsp;</p>
<p>
  <select name="wishlist_vmake" id="wishlist_vmake">
    <option value="">Select Make</option>
    <?php
do {  
?>
    <option value="<?php echo $row_query_carmakes['year']?>"><?php echo $row_query_carmakes['year']?></option>
    <?php
} while ($row_query_carmakes = mysqli_fetch_assoc($query_carmakes));
  $rows = mysqli_num_rows($query_carmakes);
  if($rows > 0) {
      mysqli_data_seek($query_carmakes, 0);
	  $row_query_carmakes = mysqli_fetch_assoc($query_carmakes);
  }
?>
  </select>
</p>
<label for="applicant_titlename">Title Name</label>
										<select id="applicant_titlename" class="form-control">
								    <option value="" selected <?php if (!(strcmp("", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>> Select Title Name</option>
						      <option value="Mr." <?php if (!(strcmp("Mr.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
				        <option value="Mrs." <?php if (!(strcmp("Mrs.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
		          <option value="Miss." <?php if (!(strcmp("Miss.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Miss.</option>
            <option value="Ms." <?php if (!(strcmp("Ms.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Ms.</option>
            <option value="Dr." <?php if (!(strcmp("Dr.", $row_userDets['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Dr.</option>
                                        </select>

<p>&nbsp;</p>
<p>Your State</p>
<p>&nbsp;</p>
<select name="dma_state" class="form-control selectpicker show-tick" id="dma_state" title='Choose One' data-style="btn-primary">
<option value="">Select State</option>
  <?php do {  ?>
  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_userDets['applicant_present_addr_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
</select>
<p>&nbsp;</p>
<p>
  <select name="applicant_present_addr_state" id="applicant_present_addr_state">
    <option value="" <?php if (!(strcmp("", $row_userDets['applicant_present_addr_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
    <?php
do {  
?>
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
</p>
<p>
  <select name="applicant_mobile_carrier" id="applicant_mobile_carrier">
    <option value="" <?php if (!(strcmp("", $row_userDets['applicant_mobile_carrier']))) {echo "selected=\"selected\"";} ?>>Select Mobile Carrier</option>
    <?php
do {  
?>
    <option value="<?php echo $row_mobile_carriers['carrier_url']?>"<?php if (!(strcmp($row_mobile_carriers['carrier_url'], $row_userDets['applicant_mobile_carrier']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mobile_carriers['carrier_label']?></option>
    <?php
} while ($row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers));
  $rows = mysqli_num_rows($mobile_carriers);
  if($rows > 0) {
      mysqli_data_seek($mobile_carriers, 0);
	  $row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers);
  }
?>
  </select>
</p>

<p>&nbsp;</p>

<p>
  <?php
$dealer_type_counter=0;
do { 

$dealer_type_counter = $dealer_type_counter++;
?>
  <label>
<input name="<?php echo $row_dealer_types['dtype_label']; ?>" type="checkbox" id="dealer_bsntypes_<?php echo $dealer_type_counter; ?>" value="<?php echo $row_dealer_types['dtype_value']; ?>" checked="checked" />
  "<?php echo $row_dealer_types['dtype_label']; //Franchise ?> (<?php echo  $row_dealer_types['dealer_type_count']; ?>)"</label> <br />
  
  
  
  <?php } while ($row_dealer_types = mysqli_fetch_assoc($dealer_types)); ?>
</p>
<p>
  <input name="Franchise" type="checkbox" id="Franchise" value="t" checked="checked" />
  Franchise </p>
<p>
  <label>
    <input <?php if (!(strcmp($row_dlr_info['dealer_type_id'],1))) {echo "checked=\"checked\"";} ?> name="dealer_bsntypes" type="checkbox" id="dealer_bsntypes_0" value="Franchise" />
    Franchise</label>
  <br />
  <label>
    <input <?php if (!(strcmp($row_dlr_info['dealer_type_id'],2))) {echo "checked=\"checked\"";} ?> type="checkbox" name="dealer_bsntypes_" value="BuyHerePayHere" id="dealer_bsntypes_1" />
    Buy Here Pay Here</label>
  <br />
  <label>
    <input <?php if (!(strcmp($row_dlr_info['dealer_type_id'],3))) {echo "checked=\"checked\"";} ?> type="checkbox" name="dealer_bsntypes_" value="SpecialFinance" id="dealer_bsntypes_2" />
    Special Finance</label>
  <br />
  <label>
    <input <?php if (!(strcmp($row_dlr_info['dealer_type_id'],4))) {echo "checked=\"checked\"";} ?> type="checkbox" name="dealer_bsntypes_" value="RentToOwn" id="dealer_bsntypes_3" />
    Rent To Own</label>
  <br />
  <label>
    <input <?php if (!(strcmp($row_dlr_info['dealer_type_id'],5))) {echo "checked=\"checked\"";} ?> type="checkbox" name="dealer_bsntypes_" value="WholeSale" id="dealer_bsntypes_4" />
    Whole Sale</label>
  <br />
</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

                </div>
                
</form>
<p>&nbsp;</p>
<p><br />
  <br />
</p>
<p>
<?php //do { ?>
    Loop Me Dealer Vehicles<?php echo $row_store_vehicles['vcondition']; ?><?php echo $row_store_vehicles['vyear']; ?><?php echo $row_store_vehicles['vmake']; ?><?php echo $row_store_vehicles['vmodel']; ?><?php echo $row_store_vehicles['vtrim']; ?>
      <?php echo $row_store_vehicles['vstockno']; ?><?php echo $row_store_vehicles['vrprice']; ?><?php echo $row_store_vehicles['vdprice']; ?><br />
<?php echo $row_store_vehicles['vspecialprice']; ?></p>
<?php echo $row_store_vehicles['vthubmnail_file']; ?>

<?php // } while ($row_store_vehicles = mysqli_fetch_assoc($store_vehicles)); ?>
<br />
</body>
</html>
<?php
mysqli_free_result($LiveVehicles);

mysqli_free_result($userDets);

mysqli_free_result($mobile_carriers);

mysqli_free_result($query_carmakes);

mysqli_free_result($states);

mysqli_free_result($combine_markets);

mysqli_free_result($find_vehicle);

mysqli_free_result($store_vehicles);

mysqli_free_result($dealer_types);
?>
