<?php require_once('../../../Legacy/Connections/idsconnection.php'); ?>
<?php require_once('../../../Legacy/Connections/idschatconnection.php'); ?>
<?php require_once('Connections/wfh_connection.php'); ?>
<?php






		
		$tkey = bin2hex(openssl_random_pseudo_bytes(10));


@$rsession = session_id();

if(empty($rsession)) session_start();

if (!isset($_SESSION)) {
  session_start();
  $rsession = session_id();

}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";
$log = "";





@$sessioncookie = "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];


@$PHPSESSID = session_id();


@$cookie = $_COOKIE["PHPSESSID"];

//Visitor Credentials Save With Visitor Information

@$ip = $_SERVER['REMOTE_ADDR'];

@$query_string = $_SERVER['QUERY_STRING'];

@$http_referer = $_SERVER['HTTP_REFERER'];

@$http_user_agent = $_SERVER['HTTP_USER_AGENT'];

$mobileuserjs = "var ismobile=navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i)";

$mobiledevice = "None";
$browser = 'Unknown';

//http://www.htmlgoodies.com/beyond/webmaster/toolbox/article.php/3888106/How-Can-I-Detect-the-iPhone--iPads-User-Agent.htm
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
 {
  //header('Location: http://yoursite.com/iphone');
  //exit();
  $mobiledevice = "iPhone/Ipod";
}

if(strstr($_SERVER['HTTP_USER_AGENT'],'Android') || strstr($_SERVER['HTTP_USER_AGENT'],'android'))
 {
  //header('Location: http://yoursite.com/iphone');
  //exit();
  $mobiledevice = "Android";
}

//http://echopx.com/notes/browser-detection-ie-firefox-safari-chrome
if(strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$browser = "Internet Explorer";
 }

if(strstr($_SERVER["HTTP_USER_AGENT"], 'Firefox'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$browser = "Firefox";
 }


if(strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') || strstr($_SERVER['HTTP_USER_AGENT'],'Safari'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$browser = "Safari/Chrome";
 }





$currentPage = $_SERVER["PHP_SELF"];

$maxRows_LiveVehicles = 50;
$pageNum_LiveVehicles = 0;
if (isset($_GET['pageNum_LiveVehicles'])) {
  $pageNum_LiveVehicles = $_GET['pageNum_LiveVehicles'];
}
$startRow_LiveVehicles = $pageNum_LiveVehicles * $maxRows_LiveVehicles;


if(isset($_GET['state'])){
$cust_home_state = mysqli_real_escape_string($wfh_connection_mysqli, trim($_GET['state']));
$cust_home_state_sql = " AND `dealers`.`state` = '$cust_home_state'";
$cust_home_state_missing = "N";
}else{

	$cust_home_state_missing = "Y";
	$cust_home_state  = "";
	$cust_home_state_sql = "";

}



if (isset($_GET['bigSellingPrice'], $_GET['cust_creditapr'], $_GET['cust_downpayment'], $_GET['cust_desiredpymt'], $_GET['cust_desiredtermos'], $_GET['bigSellingPrice'], $_GET['cust_totalpayments'], $_GET['state'])){

$bigSellingPrice = mysqli_real_escape_string($wfh_connection_mysqli, trim($_GET['bigSellingPrice']));
//$bigSellingPrice_select = "AND `vehicles`.`vrprice` max($bigSellingPrice)";
//$bigSellingPrice_select = "AND `vehicles`.`vrprice` BETWEEN($bigSellingPrice - 100)";
//$bigSellingPrice_sql = "AND `vehicles`.`vrprice` <= '$bigSellingPrice' OR `vehicles`.`vspecialprice` <= '$bigSellingPrice'";

$cust_home_state = mysqli_real_escape_string($wfh_connection_mysqli, trim($_GET['state']));
$cust_home_state_sql = " AND `dealers`.`state` = '$cust_home_state'";

$bigSellingPrice_sql = "AND `vehicles`.`vrprice` < '$bigSellingPrice'";


$cust_downpayment = mysqli_real_escape_string($wfh_connection_mysqli, trim($_GET['cust_downpayment']));
$cust_downpayment_sql = "AND `vehicles`.`vdprice` < '$cust_downpayment'";

$cust_totalpayments = mysqli_real_escape_string($wfh_connection_mysqli, trim($_GET['cust_totalpayments']));
//$cust_totalpayments_sql = "AND `vehicles`.`vrprice` < '$cust_totalpayments'";

}else{
	$bigSellingPrice_sql = "";

	$cust_downpayment_sql = "";

}

/*
* The Real Magic for Live vehicles 
 */
$startRow_LiveVehicles = 0;
$maxRows_LiveVehicles = 99;
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_LiveVehicles = "SELECT * 
							FROM `idsids_idsdms`.`vehicles`
							LEFT JOIN `idsids_idsdms`.`dealers` ON `vehicles`.`did` = `dealers`.`id`
							WHERE 
							`vehicles`.`vlivestatus` = '1'
							AND `dealers`.`status` = '1'
							$bigSellingPrice_sql
							AND `vehicles`.`vrprice` 
							AND `vehicles`.`vthubmnail_file` IS NOT NULL
							$cust_home_state_sql
							GROUP BY `vehicles`.`vid`
							";
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);
$totalRows_LiveVehicles = mysqli_num_rows($LiveVehicles);


$colname_find_vehicle = "-1";
if (isset($_GET['v'])) {
  $colname_find_vehicle = $_GET['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle = "SELECT * FROM `idsids_idsdms`.`vehicles`, `idsids_idsdms`.`dealers` WHERE `dealers`.`id` =  `vehicles`.`did` AND `vehicles`.`vid` = '$colname_find_vehicle'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);

$dlr_ok_googlemp = $row_find_vehicle['dlr_ok_googlemp'];
$dlr_geo_latitude = $row_find_vehicle['dlr_geo_latitude'];
$dlr_geo_longitude = $row_find_vehicle['dlr_geo_longitude'];

$vid = $row_find_vehicle['vid'];
$vtoken = $row_find_vehicle['vtoken'];
$vdid = $row_find_vehicle['did'];
$vlivestatus = $row_find_vehicle['vlivestatus'];
$vstockno = $row_find_vehicle['vstockno'];
$vmileage = $row_find_vehicle['vmileage'];
$vyear = $row_find_vehicle['vyear'];
$vmake = $row_find_vehicle['vmake'];
$vmodel = $row_find_vehicle['vmodel'];
$vtrim = $row_find_vehicle['vtrim'];
$vvin = $row_find_vehicle['vvin'];

$vcondition = $row_find_vehicle['vcondition'];
$vbody = $row_find_vehicle['vbody'];
$vecolor_txt = $row_find_vehicle['vecolor_txt'];
$vicolor_txt = $row_find_vehicle['vicolor_txt'];
if(isset($row_find_vehicle['vcustomcolor'])){
$vecolor_txt = $row_find_vehicle['vcustomcolor'];
}
$vcylinders = $row_find_vehicle['vcylinders'];


$vdescript_txt = $row_find_vehicle['vyear'].' '.$row_find_vehicle['vmake'].' '.$row_find_vehicle['vmodel'].' '.$row_find_vehicle['vtrim'];


$vmileage = $row_find_vehicle['vmileage'];
$vrprice = $row_find_vehicle['vrprice'];
$vdprice = $row_find_vehicle['vdprice'];
$vthubmnail_file_path = $row_find_vehicle['vthubmnail_file_path'];

$vadvalorem_tax = $row_find_vehicle['vadvalorem_tax'];

$dlr_status = $row_find_vehicle['status'];
$wfh_dealer_status = $row_find_vehicle['wfh_dealer_status'];

// Package Codes Defined
$wfh_did_deal_package_id = $row_find_vehicle['wfh_did_deal_package_id'];
$wfh_did_deal_package_code = $row_find_vehicle['wfh_did_deal_package_code'];

$zero_out = 0.00;
$settingCurrency = $row_find_vehicle['settingCurrency'];
$settingDefaultDPpercntg = $row_find_vehicle['settingDefaultDPpercntg'];
$settingDefaultPromoPriceOff = $row_find_vehicle['settingDefaultPromoPriceOff'];



$settingDefaultTerm = $row_find_vehicle['settingDefaultTerm'];
if(!$settingDefaultTerm){$settingDefaultTerm = (int)36; }

$settingDefaultAPR = $row_find_vehicle['settingDefaultAPR'];
if(!$settingDefaultAPR){$settingDefaultTerm = 18.0; }


$settingSateSlsTax = $row_find_vehicle['settingSateSlsTax'];
if(!$settingSateSlsTax){
	$settingSateSlsTax = 6.0;
}

$settingDocDlvryFee = $row_find_vehicle['settingDocDlvryFee'];
if(!$settingDocDlvryFee){$settingDocDlvryFee = 250.00; }

$settingTitleFee = $row_find_vehicle['settingTitleFee'];
if(!$settingTitleFee){ $settingTitleFee = 55.00; };

$settingStateInspectnFee = $row_find_vehicle['settingStateInspectnFee'];
if(!$settingStateInspectnFee){ $settingStateInspectnFee = 30.00; };

$licsNtitlefee= ($settingStateInspectnFee + $settingTitleFee);

// 3.0
$newmatrixcredit_vgoodcredit = $row_find_vehicle['newmatrixcredit_vgoodcredit'];
// 7.0
$newmatrixcredit_jgoodcredit = $row_find_vehicle['newmatrixcredit_jgoodcredit'];
// 12.0
$newmatrixcredit_faircredit = $row_find_vehicle['newmatrixcredit_faircredit'];
// 21.0
$newmatrixcredit_poorcredit = $row_find_vehicle['newmatrixcredit_poorcredit'];
// 23.0
$newmatrixcredit_subprime = $row_find_vehicle['newmatrixcredit_subprime'];
// 29.0
$newmatrixcredit_unknown = $row_find_vehicle['newmatrixcredit_unknown'];


// 3.0
$usedmatrixcredit_vgoodcredit = $row_find_vehicle['usedmatrixcredit_vgoodcredit'];
// 7.0
$usedmatrixcredit_jgoodcredit = $row_find_vehicle['usedmatrixcredit_jgoodcredit'];
// 12.0 
$usedmatrixcredit_faircredit = $row_find_vehicle['usedmatrixcredit_faircredit'];
// 21.0
$usedmatrixcredit_poorcredit = $row_find_vehicle['usedmatrixcredit_poorcredit'];
// 23.0
$usedmatrixcredit_subprime = $row_find_vehicle['usedmatrixcredit_subprime'];
// 29.0
$usedmatrixcredit_unknown = $row_find_vehicle['usedmatrixcredit_unknown'];



$usedmatrixcredit_fminimumprofit = $row_find_vehicle['usedmatrixcredit_fminimumprofit'];
$usedmatrixcredit_bminimumprofit = $row_find_vehicle['usedmatrixcredit_bminimumprofit'];

$newmatrixcredit_fminimumprofit = $row_find_vehicle['newmatrixcredit_fminimumprofit'];
$newmatrixcredit_bminimumprofit = $row_find_vehicle['newmatrixcredit_bminimumprofit'];


// Dealer Type 2 = BuyHerePayHere(dtype_value)
if($row_find_vehicle['dealer_type_id'] == 2){
   
				$disable_sellingprice = 'disabled';	
				
				$disable_term = 'disabled';	 

				$disable_rate = 'disabled';	 

}else{
				$disable_sellingprice = '';	 

				$disable_term = '';	 

				$disable_rate = '';	 
}

$dealerTimezone = $row_find_vehicle['dealerTimezone'];

if($dealerTimezone){
$zone_from ='America/Chicago';
$zone_to= $dealerTimezone;
}else{
$zone_from ='America/Chicago';
$zone_to='America/New_York';
}


//date_default_timezone_set($zone_from);

//  $convert_date="2016-04-09 19:51:03";

//  echo $finalDate=zone_conversion_date($convert_date, $zone_from, $zone_to);


function zone_conversion_date($time, $cur_zone, $req_zone)
{   
	global $zone_from;
	global $zone_to;

    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_from);
    $local = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_to);
    $required = date("Y-m-d H:i:s");

    /* return $required; */
    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    $date = new DateTime($time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");

    return $timestamp = $date->format("Y-m-d H:i:s");
}

function get_Datetime_Now() {
	
	global $zone_to;
	
	$tz_object = new DateTimeZone($zone_to);
	//date_default_timezone_set('America/New_York');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');		//06-18-2014 08:49:34
	return $datetime->format('Y\-m\-d\ h:i:s');  	//2014-06-18 08:47:46
	//return $datetime->format('Y\/m\/d\ ');  		//2014/06/18

}

$timevar = get_Datetime_Now();




$server_time = zone_conversion_date($timevar, $zone_from, $zone_to);


// The Current Page Viewing or when db_logged in is present

$onpage_current = $_SERVER['PHP_SELF'];
//$onpage_current = str_replace('/idscrm/dealers/', '', $onpage_current);


$time_now = date("Y-m-d H:i:s");
$time_now = zone_conversion_date($time_now, $zone_from, $zone_to);






$colname_find_vehicle_photos = "-1";
if (isset($_GET['v'])) {
  $colname_find_vehicle_photos = $_GET['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle_photos = "SELECT * FROM `idsids_idsdms`.`vehicle_photos` WHERE `vehicle_id` = '$colname_find_vehicle_photos' ORDER BY `sort_orderno` ASC, `v_photoid` ASC, created_at DESC";
$find_vehicle_photos = mysqli_query($idsconnection_mysqli, $query_find_vehicle_photos);
$row_find_vehicle_photos = mysqli_fetch_assoc($find_vehicle_photos);
$totalRows_find_vehicle_photos = mysqli_num_rows($find_vehicle_photos);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `idsids_idsdms`.`states` ORDER BY `state_id` ASC";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);



mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_markets = "SELECT * FROM `idsids_wefinancehere`.`states`, `idsids_wefinancehere`.`markets_dm` WHERE `states`.`state_id` = `markets_dm`.`state_id` AND `markets_dm`.`market_status` = '1'";
$markets = mysqli_query($wfh_connection_mysqli, $query_markets);
$row_markets = mysqli_fetch_assoc($markets);
$totalRows_markets = mysqli_num_rows($markets);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fundsAvailable = "SELECT SUM(`vehicles`.`vrprice`) as `total_avilable` FROM `idsids_idsdms`.`vehicles` WHERE `vlivestatus` = '1'";
$fundsAvailable = mysqli_query($idsconnection_mysqli, $query_fundsAvailable);
$row_fundsAvailable = mysqli_fetch_assoc($fundsAvailable);
$totalRows_fundsAvailable = mysqli_num_rows($fundsAvailable);
$total_avilable = $row_fundsAvailable['total_avilable'];


function runTagsplit($tagsplit){

$voptionsArrays = preg_split("/,/", "$tagsplit");
$voptionsCount = count($voptionsArrays);

//print_r($voptionsArrays);
//$voption1 = $voptionsArrays['0'];

$voption1 = $voptionsArrays['0'];

	for($i=0;$i<count($voptionsArrays); $i++) {
        
	echo "<li><a href=''>". $voptionsArrays["$i"].'</a></li>'; 
    
 	} 
	//echo $i;
 
	//return $tagsplit;
	return;
}


//	APR Calculator To Get Monthly Payment.
function calcPmt($amount_tofinance, $interest_rate, $finance_months) {

	$int = $interest_rate/1200;
	$int1 = 1+$int;
	$r1 = pow($int1, $finance_months);
	
	$pmt = $amount_tofinance*($int*$r1)/($r1-1);

   return $pmt;

return;
}

//echo calcPmt( 10790, 26.0, 48 );


//	US national format, using () for negative numbers
setlocale(LC_MONETARY, 'en_US.UTF-8');


// Function To Calculate Money without commas.

function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number = sprintf('%.2f', $number); 
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return $number; 
} 

$total_avilable = formatMoney($total_avilable , true); 

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `idsids_idsdms`.`states`";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeMonths = "SELECT * FROM `idsids_idsdms`.`months_options`";
$timeMonths = mysqli_query($idsconnection_mysqli, $query_timeMonths);
$row_timeMonths = mysqli_fetch_assoc($timeMonths);
$totalRows_timeMonths = mysqli_num_rows($timeMonths);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeYears = "SELECT * FROM `idsids_idsdms`.`year_options` ORDER BY `year_name` ASC";
$timeYears = mysqli_query($idsconnection_mysqli, $query_timeYears);
$row_timeYears = mysqli_fetch_assoc($timeYears);
$totalRows_timeYears = mysqli_num_rows($timeYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_autoYears = "SELECT * FROM `idsids_idsdms`.`auto_years` ORDER BY `year` DESC";
$autoYears = mysqli_query($idsconnection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carMakes = "SELECT * FROM `idsids_idsdms`.`car_make`";
$carMakes = mysqli_query($idsconnection_mysqli, $query_carMakes);
$row_carMakes = mysqli_fetch_assoc($carMakes);
$totalRows_carMakes = mysqli_num_rows($carMakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM `idsids_idsdms`.`income_interval_options`";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);


$insert_existwfhusr_sql = 'WHERE `wfhuser_email_address` = -1';
$colname_find_existingwfhuserprofile_email = "-1";
if (isset($_SESSION['MM_wfhuserUsername'])) {
  $colname_find_existingwfhuserprofile_email = $_SESSION['MM_wfhuserUsername'];
  $insert_existwfhusr_sql = 'WHERE `wfhuser_email_address` = %s';
}elseif(isset($_POST['wfhuser_id'])){
  $colname_find_existingwfhuserprofile_email = mysqli_real_escape_string($wfh_connection_mysqli, trim($_POST['wfhuser_id']));
  $insert_existwfhusr_sql = "WHERE `wfhuser_id` = '$colname_find_existingwfhuserprofile_email'";
}
mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_find_existingwfhuserprofile_email = "SELECT * FROM `idsids_wefinancehere`.`wfhuserprofile` $insert_existwfhusr_sql";
$find_existingwfhuserprofile_email = mysqli_query($wfh_connection_mysqli, $query_find_existingwfhuserprofile_email);
$row_find_existingwfhuserprofile_email = mysqli_fetch_assoc($find_existingwfhuserprofile_email);
$totalRows_find_existingwfhuserprofile_email = mysqli_num_rows($find_existingwfhuserprofile_email);
$wfhuser_id = $row_find_existingwfhuserprofile_email['wfhuser_id'];
$wfhuser_email_address = $row_find_existingwfhuserprofile_email['wfhuser_email_address'];
$wfhuser_status = $row_find_existingwfhuserprofile_email['wfhuser_status'];

	$wfhuser_vInsurCompNm = $row_find_existingwfhuserprofile_email['wfhuser_vInsurCompNm'];
	$wfhuser_vInsurCompAddr = $row_find_existingwfhuserprofile_email['wfhuser_vInsurCompAddr'];
	$wfhuser_vInsurCompAddr2 = $row_find_existingwfhuserprofile_email['wfhuser_vInsurCompAddr2'];
	$wfhuser_vInsurCompCity = $row_find_existingwfhuserprofile_email['wfhuser_vInsurCompCity'];
	$wfhuser_vInsurCompState = $row_find_existingwfhuserprofile_email['wfhuser_vInsurCompState'];
	$wfhuser_vInsurCompZip = $row_find_existingwfhuserprofile_email['wfhuser_vInsurCompZip'];
	$wfhuser_vTradeYr = $row_find_existingwfhuserprofile_email['wfhuser_vTradeYr'];
	$wfhuser_vTradeMk = $row_find_existingwfhuserprofile_email['wfhuser_vTradeMk'];
	$wfhuser_vTradeModel = $row_find_existingwfhuserprofile_email['wfhuser_vTradeModel'];
	$wfhuser_vTradeTrim = $row_find_existingwfhuserprofile_email['wfhuser_vTradeTrim'];
	$wfhuser_vTradeColor = $row_find_existingwfhuserprofile_email['wfhuser_vTradeColor'];
	$wfhuser_vTradeVin = $row_find_existingwfhuserprofile_email['wfhuser_vTradeVin'];
	$wfhuser_vTradeMiles = $row_find_existingwfhuserprofile_email['wfhuser_vTradeMiles'];
	$wfhuser_vTradePayOff = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayOff'];
	$wfhuser_vTradeCurrentPaymts = $row_find_existingwfhuserprofile_email['wfhuser_vTradeCurrentPaymts'];
	$wfhuser_vTradeOwner = $row_find_existingwfhuserprofile_email['wfhuser_vTradeOwner'];
	$wfhuser_vTradeTagNo = $row_find_existingwfhuserprofile_email['wfhuser_vTradeTagNo'];
	$wfhuser_vTradeTagState = $row_find_existingwfhuserprofile_email['wfhuser_vTradeTagState'];
	$wfhuser_vTradeTagExprDate = $row_find_existingwfhuserprofile_email['wfhuser_vTradeTagExprDate'];
	$wfhuser_vTradePayoffCompany = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayoffCompany'];
	$wfhuser_vTradeLeinHldrAcctNo = $row_find_existingwfhuserprofile_email['wfhuser_vTradeLeinHldrAcctNo'];
	$wfhuser_vTradePayoffCompanyAddr = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayoffCompanyAddr'];
	$wfhuser_vTradePayoffCompanyAddr2 = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayoffCompanyAddr2'];
	$wfhuser_vTradePayoffCompanyCity = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayoffCompanyCity'];
	$wfhuser_vTradePayoffCompanyState = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayoffCompanyState'];
	$wfhuser_vTradePayoffCompanyZip = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayoffCompanyZip'];
	$wfhuser_vTradePayoffGoodUntil = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayoffGoodUntil'];
	$wfhuser_vTradePayoffPerDiem = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayoffPerDiem'];
	$wfhuser_vTradePayoffCompanyPhoneno = $row_find_existingwfhuserprofile_email['wfhuser_vTradePayoffCompanyPhoneno'];








mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_find_existingsession_approval = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_approvals` WHERE `wfhuser_approvals`.`wfhuser_approval_sessionid` = '$cookie'";
$find_existingsession_approval = mysqli_query($wfh_connection_mysqli, $query_find_existingsession_approval);
$row_find_existingsession_approval = mysqli_fetch_assoc($find_existingsession_approval);
$totalRows_find_existingsession_approval = mysqli_num_rows($find_existingsession_approval);
$wfhuser_approval_id = $row_find_existingsession_approval['wfhuser_approval_id'];
$wfhuser_approval_budget_affordable  = $row_find_existingsession_approval['wfhuser_approval_budget_affordable'];


?>
