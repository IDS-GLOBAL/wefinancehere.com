<?php //require_once('../../Connections/idsconnection.php'); ?>
<?php //require_once('../../Connections/idschatconnection.php'); ?>
<?php //require_once('../../Connections/wfh_connection.php'); ?>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection = mysql_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 

$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection = mysql_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 

if (!isset($_SESSION)) {
  @session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";
//print_r($_SESSION);
// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../index.php";
if (!((isset($_SESSION['MM_wfhuserUsername'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_wfhuserUsername'], $_SESSION['MM_wfhuserUserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit();
}
//include("db_fbcheckuse.php");
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_userDets = "-1";
if (isset($_SESSION['MM_wfhuserUsername'])) {
  $colname_userDets = $_SESSION['MM_wfhuserUsername'];
}
mysql_select_db($database_wfh_connection, $wfh_connection);
$query_userDets =  "SELECT * FROM `wfhuserprofile` WHERE `wfhuserprofile`.`wfhuser_email_address`=%s";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets, $wfh_connection);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `states` ORDER BY `state_name` ASC";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

//Wefinancehere Connection
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM `auto_years` ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_assoc($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

//Wefinancehere Connection
mysql_select_db($database_wfh_connection, $wfh_connection);
$query_caryears = "SELECT * FROM auto_years ORDER BY `year` DESC";
$caryears = mysqli_query($idsconnection_mysqli, $query_caryears, $wfh_connection);
$row_caryears = mysqli_fetch_assoc($caryears);
$totalRows_caryears = mysqli_num_rows($caryears);


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

$wfhuser_id = $row_userDets['wfhuser_id']; //Hackishere

$wfhuser_fbid = $row_userDets['wfhuser_fbid']; //Hackishere

$wfhuser_primary_vid = $row_userDets['wfhuser_primary_vid'];
$vid = $row_userDets['wfhuser_primary_vid'];
//Need To Do Hackhere only on applicant. what about multiple credit applications and variety of changing out vehicles for a credi application.
$wfhuser_verified = $row_userDets['wfhuser_verified'];
$wfhuser_status = $row_userDets['wfhuser_status'];

$wfhuser_email_address = $row_userDets['wfhuser_email_address']; //Hackishere
$wfhuser_fbemail = $row_userDets['wfhuser_fbemail']; //Hackishere

$wfhuser_fbpicture = $row_userDets['wfhuser_fbpicture'];

$wfhuser_approval_email_verified = $row_userDets['wfhuser_verified'];
$wfhuser_approval_fname = $row_userDets['applicant_fname'];
$wfhuser_approval_lname = $row_userDets['applicant_lname'];
$wfhuser_approval_fullname_txt = $row_userDets['applicant_fname'].' '.$row_userDets['applicant_lname'];
$wfhuser_password = $row_userDets['wfhuser_password'];
$applicant_main_phone = $row_userDets['applicant_main_phone'];
$wfhuser_approval_ip = $row_userDets['cust_lead_ip'];
$wfhuser_tokenid = $row_userDets['wfhuser_tokenid'];
$cust_lead_broswer = $row_userDets['cust_lead_broswer'];
$applicant_cell_phone = $row_userDets['applicant_cell_phone'];

$cust_totalpayments = $row_userDets['cust_totalpayments'];
$wfhuser_approval_bigPrincipal = $row_userDets['bigPrincipal'];
$bigSellingPrice = $row_userDets['bigSellingPrice'];
$budget_afford = $row_userDets['budget_afford'];
$cust_creditapr= $row_userDets['cust_creditapr'];
$cust_creditapr_txt = $row_userDets['cust_creditapr_txt'];
$cust_downpayment = $row_userDets['cust_downpayment'];
$cust_desiredpymt = $row_userDets['cust_desiredpymt'];
$cust_desiredtermos = $row_userDets['cust_desiredtermos'];
$applicant_employer1_salary_bringhome = $row_userDets['applicant_employer1_salary_bringhome'];
$applicant_employer1_payday_freq = $row_userDets['applicant_employer1_payday_freq'];
$applicant_other_income_source = $row_userDets['applicant_other_income_source'];
$applicant_other_income_amount = $row_userDets['applicant_other_income_amount'];
$applicant_present_addr_state = $row_userDets['applicant_present_addr_state'];
$applicant_present_addr_city = $row_userDets['applicant_present_addr_city'];
$cust_car_loan = $row_userDets['cust_car_loan'];



        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		$tkey=mysql_real_escape_string(trim($tkey));
		//echo  $tkey; into insert records



// Start All For Time Zone

$wfhuser_Timezone = 'America/New_York';

if($wfhuser_Timezone){
$zone_from ='America/Chicago';
$zone_to= $wfhuser_Timezone;
}else{
$zone_from ='America/Chicago';
$zone_to='America/New_York';
}
date_default_timezone_set($zone_from);

//  $convert_date="2016-04-09 19:51:03";

//  echo $finalDate=zone_conversion_date($convert_date, $zone_from, $zone_to);


function zone_conversion_date($time, $cur_zone, $req_zone)
{   
    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d H:i:s");

    date_default_timezone_set($cur_zone);
    $local = date("Y-m-d H:i:s");

    date_default_timezone_set($req_zone);
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



// This sets the time online from central to east coast time zone.
$server_time = zone_conversion_date($timevar, $zone_from, $zone_to);



// The Current Page Viewing or when db_logged in is present

$onpage_current = $_SERVER['PHP_SELF'];
$onpage_current = str_replace('/new-wefinancehere.com/account/', '', $onpage_current);













$query_fundsAvailable = "SELECT SUM(`vehicles`.`vrprice`) as `total_avilable` FROM `vehicles` WHERE `vlivestatus` = '1'";
$fundsAvailable = mysqli_query($idsconnection_mysqli, $query_fundsAvailable);
$row_fundsAvailable = mysqli_fetch_assoc($fundsAvailable);
$totalRows_fundsAvailable = mysqli_num_rows($fundsAvailable);
$total_avilable = $row_fundsAvailable['total_avilable'];

//	US national format, using () for negative numbers
setlocale(LC_MONETARY, 'en_US.UTF-8');


// Function To Calculate Money without commas.

function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number =  '%.2f', $number); 
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











function showphoto($cvid){

global $did;
global $idsconnection;
global $database_idsconnection;

			//$cvid = $row_customer_leads['customer_vehicles_id'];
			if(!$cvid) return;
			mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
			$findexisting = "SELECT * FROM vehicles WHERE `vid` = '$cvid' AND  did = '$did'";
			$findmyresult = mysqli_query($idsconnection_mysqli, $findexisting);
			$vrow = mysql_fetch_array($findmyresult);
			$vid = $vrow['vid'];

			if(!$vrow['vid']){
				
				echo '';
				
			}else{
					$vstatus = $vrow['vlivestatus'];
					/*
					echo $vrow['vyear'].' ';																								
					echo $vrow['vmake'].' ';												
					echo $vrow['vmake'].' ';
					echo $vrow['vmodel'].' ';
					echo $vrow['vtrim'].' ';					
					echo '<br>';
					
					*/
					$vphoto=$vrow['vthubmnail_file_path'];

                $photo_file_path = str_replace('../', '', $vphoto);
                $photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
                $photo_openurl = "http://images.autocitymag.com/".$photo_file_path;

					
					if(!$vphoto){
					echo '';
					}else{
					echo '<br>';
					echo "<a href='vehicle.php?v=$vid'><img class='thumbnail' src='$photo_openurl' width='120px' ></a>";
				
				if ($vstatus == 0) {echo "ON HOLD!";}elseif($vstatus == 1) { echo "LIVE!";}elseif ($vstatus == 9) {	echo "SOLD!"; }else { echo " ";}
				
				
			}

					
			}
			
			
mysqli_free_result($findmyresult);
return;

}


function created_at_human_read($created_at){

			$time_stamp = strtotime($created_at);
			$date_format=date("m/d/Y h:i",$time_stamp);
			//$created_at = $date_format;
			echo $date_format;
			return;
}

?>
<?php

// Formats a phone number as (xxx) xxx-xxxx or xxx-xxxx depending on the length.
function format_phone($phone)
{
  $phone = preg_replace("/[^0-9]/", '', $phone);
 
  if (strlen($phone) == 7)
    return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
  elseif (strlen($phone) == 10)
    return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
  else
    return $phone;
}


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

//include("../../Libary/definitions_fbsession.php");



@$rsession = session_id();

if(empty($rsession)) session_start();

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








mysql_select_db($database_wfh_connection, $wfh_connection);
$query_wfhuser_wishlist = "SELECT * FROM wfhuser_wishlist WHERE wishlist_wfhuserid = wishlist_wfhuserid ORDER BY wishlist_id DESC";
$wfhuser_wishlist = mysqli_query($idsconnection_mysqli, $query_wfhuser_wishlist, $wfh_connection);
$row_wfhuser_wishlist = mysqli_fetch_assoc($wfhuser_wishlist);
$totalRows_wfhuser_wishlist = mysqli_num_rows($wfhuser_wishlist);


?>