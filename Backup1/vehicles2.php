<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/tracking.php'); ?>
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

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "cust_leadForm")) {
  $insertSQL =  "INSERT INTO cust_leads (cust_nickname, cust_fname, cust_lname, cust_email, cust_phonetype, cust_comment, cust_lead_source_id, cust_lead_source, cust_dealer_id, cust_vehicle_id, cust_lead_token, cust_home_address, cust_home_city, cust_home_state, cust_home_zip, cust_home_county, cust_employer_name, cust_employer_city, cust_employer_state, cust_employer_zip, cust_employer_years, cust_employer_months, cust_gross_income, cust_gross_income_frequency, cust_dealtoday, counter_offer, counter_offer2, tradeYes, tradeYear, tradeMake, tradeModel, tradeTrim, tradeMiles) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_fname'], "text"),
                       GetSQLValueString($_POST['cust_lname'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"),
                       GetSQLValueString($_POST['cust_phonetype'], "text"),
                       GetSQLValueString($_POST['cust_comment'], "text"),
                       GetSQLValueString($_POST['cust_lead_source_id'], "int"),
                       GetSQLValueString($_POST['cust_lead_source'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_vehicle_id'], "int"),
                       GetSQLValueString($_POST['cust_lead_token'], "text"),
                       GetSQLValueString($_POST['cust_home_address'], "text"),
                       GetSQLValueString($_POST['cust_home_city'], "text"),
                       GetSQLValueString($_POST['cust_home_state'], "text"),
                       GetSQLValueString($_POST['cust_home_zip'], "text"),
                       GetSQLValueString($_POST['cust_home_county'], "text"),
                       GetSQLValueString($_POST['cust_employer_name'], "text"),
                       GetSQLValueString($_POST['cust_employer_city'], "text"),
                       GetSQLValueString($_POST['cust_employer_state'], "text"),
                       GetSQLValueString($_POST['cust_employer_zip'], "text"),
                       GetSQLValueString($_POST['cust_employer_years'], "text"),
                       GetSQLValueString($_POST['cust_employer_months'], "text"),
                       GetSQLValueString($_POST['cust_gross_income'], "text"),
                       GetSQLValueString($_POST['cust_gross_income_frequency'], "text"),
                       GetSQLValueString(isset($_POST['cust_dealtoday']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['counter_offer'], "text"),
                       GetSQLValueString($_POST['counter_offer2'], "text"),
                       GetSQLValueString($_POST['tradeYes'], "text"),
                       GetSQLValueString($_POST['tradeYear'], "int"),
                       GetSQLValueString($_POST['tradeMake'], "text"),
                       GetSQLValueString($_POST['subcat'], "text"),
                       GetSQLValueString($_POST['tradeTrim'], "text"),
                       GetSQLValueString($_POST['tradeMiles'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);
}

$maxRows_slctVehicle = 1;
$pageNum_slctVehicle = 0;
if (isset($_GET['pageNum_slctVehicle'])) {
  $pageNum_slctVehicle = $_GET['pageNum_slctVehicle'];
}
$startRow_slctVehicle = $pageNum_slctVehicle * $maxRows_slctVehicle;

$colname_slctVehicle = "-1";
if (isset($_GET['v'])) {
  $colname_slctVehicle = $_GET['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctVehicle =  "SELECT * FROM vehicles WHERE vid = %s", GetSQLValueString($colname_slctVehicle, "int"));
$query_limit_slctVehicle =  "%s LIMIT %d, %d", $query_slctVehicle, $startRow_slctVehicle, $maxRows_slctVehicle);
$slctVehicle = mysqli_query($idsconnection_mysqli, $query_limit_slctVehicle);
$row_slctVehicle = mysqli_fetch_assoc($slctVehicle);

if (isset($_GET['totalRows_slctVehicle'])) {
  $totalRows_slctVehicle = $_GET['totalRows_slctVehicle'];
} else {
  $all_slctVehicle = mysqli_query($idsconnection_mysqli, $query_slctVehicle);
  $totalRows_slctVehicle = mysqli_num_rows($all_slctVehicle);
}
$totalPages_slctVehicle = ceil($totalRows_slctVehicle/$maxRows_slctVehicle)-1;

$vid=$row_slctVehicle['vid'];
$did=$row_slctVehicle['did'];
$vstockno=$row_slctVehicle['vstockno'];
$vcondition=$row_slctVehicle['vcondition'];
$vvin=$row_slctVehicle['vvin'];
$vyear=$row_slctVehicle['vyear'];
$vmake=$row_slctVehicle['vmake'];
$vmodel=$row_slctVehicle['vmodel'];
$vtrim=$row_slctVehicle['vtrim'];
$vvin=$row_slctVehicle['vvin'];
$vmileage=$row_slctVehicle['vmileage'];
$vbody = $row_slctVehicle['vbody'];
$vengine = $row_slctVehicle['vengine'];

$vdoors = $row_slctVehicle['vdoors'];

$vphotos=$row_slctVehicle['vphoto_count'];
$vtransm=$row_slctVehicle['vtransm'];
$fromsource = 'WeFinanceHere.com';

function not($not){
if(!$not){ echo 'Not Available';}else{echo $not;}			
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctDlr = "SELECT * FROM dealers WHERE id = '$did'";
$slctDlr = mysqli_query($idsconnection_mysqli, $query_slctDlr);
$row_slctDlr = mysqli_fetch_assoc($slctDlr);
$totalRows_slctDlr = mysqli_num_rows($slctDlr);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

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
$query_autoYears = "SELECT * FROM auto_years";
$autoYears = mysqli_query($idsconnection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctVphotos = "SELECT * FROM vehicle_photos WHERE vehicle_id = '$vid'";
$slctVphotos = mysqli_query($idsconnection_mysqli, $query_slctVphotos);
$row_slctVphotos = mysqli_fetch_assoc($slctVphotos);
$totalRows_slctVphotos = mysqli_num_rows($slctVphotos);

$strone = "SELECT DISTINCT market FROM markets_dm, dealers, states WHERE states.state_id = markets_dm.state_id AND states.state_abrv = dealers.state AND states.state_abrv = 'WY'";

$strtwo = "SELECT DISTINCT market FROM markets_dm, dealers, states WHERE states.state_id = markets_dm.state_id AND states.state_abrv = dealers.state AND states.state_abrv = 'WY'";


$colname_querymrktStateabrv = "-1";
if (isset($_GET['markets'])) {
  $colname_querymrktStateabrv = $_GET['markets'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_querymrktStateabrv =  "SELECT * FROM markets_dm, states WHERE states.state_id = markets_dm.state_id AND states.state_abrv = %s", GetSQLValueString($colname_querymrktStateabrv, "text"));
$querymrktStateabrv = mysqli_query($idsconnection_mysqli, $query_querymrktStateabrv);
$row_querymrktStateabrv = mysqli_fetch_assoc($querymrktStateabrv);
$totalRows_querymrktStateabrv = mysqli_num_rows($querymrktStateabrv);
$mstate = $row_querymrktStateabrv['state_abrv'];  //Hack The State
$statemrkt = $row_querymrktStateabrv['state_abrv_url'];

$colname_appendSort = "";
$year = date('Y');

if (isset($_GET['sort'])) {
  $colname_appendSort = $_GET['sort'];
  $sort = $colname_appendSort;
  if($sort == 1){ $insertsort = "ORDER BY vehicles.`vyear` DESC, vehicles.`vmake`";}
  if($sort == 2){ $insertsort = "ORDER BY vehicles.`vyear` ASC, vehicles.`vmake`";}
  if($sort == 3){ $insertsort = "ORDER BY  -vdprice";}  //Correct minus a few cars  
  //if($sort == 3){ $insertsort = "ORDER BY vehicles.`vspecialprice`, vehicles.`vdprice` ASC";}  //Correct minus a few cars
  if($sort == 4){ $insertsort = "ORDER BY -vdprice, -vspecialprice, -vrprice";}
  if($sort == 5){ $insertsort = "ORDER BY vehicles.`vmake` ASC, vehicles.`vmodel` ASC";}
  if($sort == 6){ $insertsort = "ORDER BY vehicles.`vmake` DESC, vehicles.`vmodel` DESC";}
  if(!$sort){ $insertsort = '';}
}

if(!$colname_querymrktStateabrv){ 
	
	$ifstate = "";
	
	}else{
	
	$ifstate = "AND dealers.`state` = '$colname_querymrktStateabrv' ";
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_selectVehicles = 50;
$pageNum_selectVehicles = 0;
if (isset($_GET['pageNum_selectVehicles'])) {
  $pageNum_selectVehicles = $_GET['pageNum_selectVehicles'];
}
$startRow_selectVehicles = $pageNum_selectVehicles * $maxRows_selectVehicles;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectVehicles = "SELECT * FROM vehicles, dealers WHERE vehicles.`did` =  dealers.`id` AND vehicles.`vlivestatus` = 1 AND dealers.`status` = 1 $ifstate $insertsort";
$query_limit_selectVehicles =  "%s LIMIT %d, %d", $query_selectVehicles, $startRow_selectVehicles, $maxRows_selectVehicles);
$selectVehicles = mysqli_query($idsconnection_mysqli, $query_limit_selectVehicles);
$row_selectVehicles = mysqli_fetch_assoc($selectVehicles);

if (isset($_GET['totalRows_selectVehicles'])) {
  $totalRows_selectVehicles = $_GET['totalRows_selectVehicles'];
} else {
  $all_selectVehicles = mysqli_query($idsconnection_mysqli, $query_selectVehicles);
  $totalRows_selectVehicles = mysqli_num_rows($all_selectVehicles);
}
$totalPages_selectVehicles = ceil($totalRows_selectVehicles/$maxRows_selectVehicles)-1;

$queryString_selectVehicles = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_selectVehicles") == false && 
        stristr($param, "totalRows_selectVehicles") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_selectVehicles = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_selectVehicles =  "&totalRows_selectVehicles=%d%s", $totalRows_selectVehicles, $queryString_selectVehicles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carMakes = "SELECT * FROM car_make";
$carMakes = mysqli_query($idsconnection_mysqli, $query_carMakes);
$row_carMakes = mysqli_fetch_assoc($carMakes);
$totalRows_carMakes = mysqli_num_rows($carMakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM income_interval_options";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

$queryString_slctVehicle = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_slctVehicle") == false && 
        stristr($param, "totalRows_slctVehicle") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_slctVehicle = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_slctVehicle =  "&totalRows_slctVehicle=%d%s", $totalRows_slctVehicle, $queryString_slctVehicle);


?>
<?php


include('../Libary/token-generator.php');


setlocale(LC_MONETARY, 'en_US');

	//Begin 3 Dealer Definitions
	
$dcompany = $row_slctDlr['company'];
$websturl = $row_slctDlr['website'];
$dname = $row_slctDlr['contact'];
$demail = $row_slctDlr['email'];
$dphone = $row_slctDlr['contact_phone'];
$daddr = $row_slctDlr['address'];
$dstate = $row_slctDlr['state'];
$dcity = $row_slctDlr['city'];
$dzip = $row_slctDlr['zip'];
$dstorephone = $row_slctDlr['phone'];
$dstorefax = $row_slctDlr['fax'];
$dslogan = $row_slctDlr['slogan'];
$ddisclaim = $row_slctDlr['disclaimer'];
$mapurl = $row_slctDlr['mapurl'];
$financenm = $row_slctDlr['finance'];
$financephn = $row_slctDlr['finance_contact'];
$intrsalesnm = $row_slctDlr['sales'];
$intrsalesphn = $row_slctDlr['sales_contact'];
	

	// Begin 2 Vehicles Definition
	
	
	

	// Begin 1 Vehicle Definitions
	$vdid = $row_slctVehicle['did'];
	$img = $row_slctVphotos['photo_file_name'];

	$thumbs = 'thumbs'; 
	$file = $row_slctVehicle['vthubmnail_file']; 
	$image = "http://images.autocitymag.com/$vdid/$vid/$file";
	$year = $row_slctVehicle['vyear'];
	$make = $row_slctVehicle['vmake'];
	$model = $row_slctVehicle['vmodel'];
	$trim = $row_slctVehicle['vtrim'];
	$stock = $row_slctVehicle['vstockno'];
	$vtitle = "$year $make $model $trim";
	$trans = $row_slctVehicle['vtransm'];
	$ecolor = $row_slctVehicle['vecolor_txt'];
	$icolor = $row_slctVehicle['vicolor_txt'];
	$engine = $row_slctVehicle['vengine'];
	$mileage = $row_slctVehicle['vmileage'];
	$price = $row_slctVehicle['vspecialprice'];

	//$truepic = "http://idscrm.com/vehicles/photos/$did/$vid/$img";
	$truepic = "http://images.autocitymag.com/$did/$vid/$img";
	
	$vrprice = $row_slctVehicle['vrprice'];
	
	$vcost = $row_slctVehicle['vpurchasecost']; 
	
	$DownPayment = $row_slctVehicle['vdprice'];
	
	$Profit = $vrprice - $vcost;
	
	$reserverProfit = '1500';
	
//Start Calculating Downpayment


	if(!$DownPayment){
							
							if(!$vrprice)
								{
								
								if(!$price){$downpaymentPrice = '2000';}else{	
																
										$fifteenpercent = ($price * '.15');	
										$downpaymentPrice = "$fifteenpercent";
										$downpaymentPrice = round($downpaymentPrice, -2);

										}

								}else{
										$fifteenpercent = ($vrprice * '.15');	
										$downpaymentPrice = "$fifteenpercent";
										$downpaymentPrice = round($downpaymentPrice, -2);

									  }
	}else{
		
		$downpaymentPrice = $DownPayment;
		$downpaymentPrice = round($downpaymentPrice, -2);
}


//End Calculating Downpayment

	
		if(!$DownPayment){
		
			$DownPayment = ($vrprice * 0.15);
		   
		   }
	
	
	$docFee = $row_slctDlr['settingDocDlvryFee'];
	$titleFee = $row_slctDlr['settingTitleFee'];
	$stateFee = $row_slctDlr['settingStateInspectnFee'];
	
	$fees = ($docFee + $titleFee + $stateFee);
	$tax = $row_slctDlr['settingSateSlsTax'];
	
	$total = ($fees * $tax);
	
	$sellingPrice = ($vrprice + $total);
	
	
	
	$mindown = ($sellingPrice * '.15');
	
	
	/// Use Dealers Variables If Exist If Not Then Use Our Default Ones.
	$vcondition = $row_slctVehicle['vcondition'];

function newCredit (){

			



}

function usedCredit () {

	
	


}

if($vcondition=='New'){

$vgoodcredit = $row_slctDlr['newmatrixcredit_vgoodcredit'];
		if(!$vgoodcredit){
			$vgoodcredit = '3.0';
		}
		
		$jgoodcredit = $row_slctDlr['newmatrixcredit_jgoodcredit'];
		if(!$jgoodcredit){
			$jgoodcredit = '';
		}
		
		$faircredit = $row_slctDlr['newmatrixcredit_faircredit'];
		if(!$faircredit){
			$faircredit = '';
		}
		
		$poorcredit = $row_slctDlr['newmatrixcredit_poorcredit'];
		if(!$poorcredit){
			$poorcredit = '';
		}
		
		$subprime = $row_slctDlr['newmatrixcredit_subprime'];
		if(!$subprime){
			$subprime = '';
		}
		
		$unknown = $row_slctDlr['newmatrixcredit_unknown'];
		if(!$unknown){
			$unknown = '';
		}

}

if($vcondition=='Used'){

	if(!$row_slctDlr['usedmatrixcredit_vgoodcredit']){
		$vgoodcredit = '3.0';
	}else{
	
		$vgoodcredit = $row_slctDlr['usedmatrixcredit_vgoodcredit'];
	}
	
	if(!$row_slctDlr['usedmatrixcredit_jgoodcredit']){
	$jgoodcredit = '6.0';
	}else{
	
		$jgoodcredit = $row_slctDlr['usedmatrixcredit_jgoodcredit'];

	}
	
	if(!$row_slctDlr['usedmatrixcredit_faircredit']){
		$faircredit = '12.0';
	}else{
	
		$faircredit = $row_slctDlr['usedmatrixcredit_faircredit'];

	}
	
	if(!$row_slctDlr['usedmatrixcredit_poorcredit']){
	$poorcredit = '15.0';
	}else{
	
			$poorcredit = $row_slctDlr['usedmatrixcredit_poorcredit'];

	}
	
	
	if(!$row_slctDlr['usedmatrixcredit_subprime']){
	$subprime = '26.0';
	}else{
		
		$subprime = $row_slctDlr['usedmatrixcredit_subprime'];
	}
	
	if(!$row_slctDlr['usedmatrixcredit_unknown']){
	$unknown = '29.9';
	}else{
		$unknown = $row_slctDlr['usedmatrixcredit_unknown'];
	
	}
}

if(!$vcondition){
	
	
	
if(!$row_slctDlr['usedmatrixcredit_vgoodcredit']){
		$vgoodcredit = '3.0';
	}else{
	
		$vgoodcredit = $row_slctDlr['usedmatrixcredit_vgoodcredit'];
	}
	
	if(!$row_slctDlr['usedmatrixcredit_jgoodcredit']){
	$jgoodcredit = '6.0';
	}else{
	
		$jgoodcredit = $row_slctDlr['usedmatrixcredit_jgoodcredit'];

	}
	
	if(!$row_slctDlr['usedmatrixcredit_faircredit']){
		$faircredit = '12.0';
	}else{
	
		$faircredit = $row_slctDlr['usedmatrixcredit_faircredit'];

	}
	
	if(!$row_slctDlr['usedmatrixcredit_poorcredit']){
	$poorcredit = '15.0';
	}else{
	
			$poorcredit = $row_slctDlr['usedmatrixcredit_poorcredit'];

	}
	
	
	if(!$row_slctDlr['usedmatrixcredit_subprime']){
	$subprime = '26.0';
	}else{
		
		$subprime = $row_slctDlr['usedmatrixcredit_subprime'];
	}
	
	if(!$row_slctDlr['usedmatrixcredit_unknown']){
	$unknown = '29.9';
	}else{
		$unknown = $row_slctDlr['usedmatrixcredit_unknown'];
	
	}	
	
	}


function get_Datetime_Now() {
	$tz_object = new DateTimeZone('Brazil/East');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	return $datetime->format('m\-d\-Y\ ');

}

		$timevar = get_Datetime_Now();

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);

$vgoodcredit = '3.0';

?>
<?php
include('inc/_fbinc.php');

@include("inc/definitions_fbsession.php");

@$fbemail = $user_profile['email'];

function checkfb ($fbemail){
	
include('../Connections/idsconnection.php');


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userWfh =  "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = '$fbemail'");
$userWfh = mysqli_query($idsconnection_mysqli, $query_userWfh);
$row_userWfh = mysqli_fetch_assoc($userWfh);
$totalRows_userWfh = mysqli_num_rows($userWfh);
$wfhid = $row_userWfh['wfhuser_id']; //Hackishere

		if (!$wfhid){
			header("Location: signin.php");
		}

//mysqli_free_result($userWfh);

}



function createwfhuser($user_profile){
	
//1. Check for User
	//checkfb($fbemail);
include('../Connections/idsconnection.php');

include("inc/definitions_fbsession.php");

checkfb ($fbemail);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userWfh =  "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = '$fbemail'");
$userWfh = mysqli_query($idsconnection_mysqli, $query_userWfh);
$row_userWfh = mysqli_fetch_assoc($userWfh);
$totalRows_userWfh = mysqli_num_rows($userWfh);
$wfidd = $row_userWfh['wfhuser_id']; //Hackishere

		
$fbInsertSQL =	"INSERT INTO `wfhuserprofile`(`wfhuser_email_address`, `wfhuser_username`, `wfhuser_verified`, `applicant_dob`, `applicant_name`, `applicant_fname`, `applicant_lname`, `applicant_employer1_name`, `applicant_employer1_position`)
	VALUES ('$fbemail','$fbusername','$fbverified','$fbdob','$fbfullname','$fbfname','$fblname','$fbemployername','$fbemployerposition')";
		
$fbUpdateSQL = "UPDATE `wfhuserprofile` SET `wfhuser_email_address` = '$fbemail', `wfhuser_username` = '$fbusername', `wfhuser_verified` = '$fbverified', `applicant_dob` = '$fbdob', `applicant_name` = '$fbfullname', `applicant_fname` = '$fbfname', `applicant_lname` = '$fblname', `applicant_employer1_name` = '$fbemployername', `applicant_employer1_position` = '$fbemployerposition' WHERE `wfhuser_id` = '$wfidd'";


		if (!$wfidd){
			
		$insertsql =	mysqli_query($idsconnection_mysqli, $fbInsertSQL);	
			//header("Location: signin.php");

		}else{

		$updatesql =		mysqli_query($idsconnection_mysqli, $fbUpdateSQL);

			

		//print_r($user_profile);
		
		//echo $fbUpdateSQL;		
		}

//mysqli_free_result($userWfh);	
//2. If None Create User
//3. If Exist Update
	
}

include('inc/definitions_fbsession.php');

include('wfhLibrary/sessionid.php');



include('wfhLibrary/similar_vehicles.php');

require_once('wfhLibrary/trackvehicle.php');

if ($user){
createwfhuser($user_profile);
}

mysql_select_db($database_tracking, $tracking);
@$query_rcntlyVwd = "SELECT * FROM vehiclestracking WHERE fbid = '$fbuserbid'";
$rcntlyVwd = mysqli_query($idsconnection_mysqli, $query_rcntlyVwd, $tracking);
$row_rcntlyVwd = mysqli_fetch_assoc($rcntlyVwd);
$totalRows_rcntlyVwd = mysqli_num_rows($rcntlyVwd);

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeFinanceHere.com - Vehicles!</title>



    <link rel="stylesheet" href="css/wfhreset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhstyle.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhlayout.css" type="text/css" media="screen">    
	
    <link rel="stylesheet" href="css/sortcolumn.css" type="text/css" media="screen">
    
    
    <!--Gallery Style -->
	<link rel="stylesheet" href="http://wefinancehere.com/public/css/gallerystyles.css" type="text/css"></link>

    <script src="http://wefinancehere.com/public/js/jquery-1.4.2.min.js" type="text/javascript"></script>

    <script src="http://wefinancehere.com/public/js/tabs.js" type="text/javascript"></script>

    <script src="http://wefinancehere.com/public/js/jquery.jcarousel.pack.js"  type="text/javascript"></script>

    <script src="http://wefinancehere.com/public/js/loopedslider.js"  type="text/javascript"></script>

    <script type="text/javascript">    

            jQuery(document).ready(function() {			

                jQuery('#third-carousel').jcarousel({

                    vertical: true

                });

            });		

	</script>

    <script type="text/javascript" src="http://wefinancehere.com/public/js/imagepreloader.js"></script>

	<script type="text/javascript">

        preloadImages([

            'http://wefinancehere.com//images/prev-h.gif', 

            'http://wefinancehere.com//images/next-h.gif']);

    </script>    
    <!--[if gte IE 7]>
    

    <link rel="stylesheet" href="http://wefinancehere.com/public/css/ie/ie6.css" type="text/css" media="screen">

    <script type="text/javascript" src="http://wefinancehere.com/public/js/ie_png.js"></script>
	<script defer type="text/javascript" src="js/pngfix.js"></script>

    <script type="text/javascript">

        ie_png.fix('.png');

    </script>

    <![endif]-->

    <!--[if lt IE 9]>

   		<script type="text/javascript" src="http://wefinancehere.com/public/js/html5.js"></script>

	<![endif]-->

</head>

<body id="page1">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18549838-1']);
  _gaq.push(['_setDomainName', 'wefinancehere.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><div class="bg"></div>

<div class="main">

<!--==============================Navigation================================-->	

   	
    
<header>

		<div class="row-1">
			<?php include('inc/public-topnavigation.php'); ?>
        </div>
		


        
        <div class="row-2">
<!--Start Sub Navigation -->
		    
			<?php include('inc/public-navigation.php'); ?>
            
            
        </div>




        <div class="row-3">        	
<!--Start Search and Slide -->
                     

        </div>

  </header>
<!--==============================End Navigation================================-->


<!--==============================OLD header=================================-->
	<!-- <h1>Application Welcome Layout</h1> -->
        
    <br />
   


    
    
    
    
    <!--==============================Start Markets content================================-->

                     
<div id="marketvwcontainer">

                 <h1 id="submarkettitle">Vehicles In Sub Markets</h1>


				<?php do { ?>

                
                    <div id="marketlinks">
                     
                     
                    <a href="used-cars.php?markets=<?php echo $statemrkt; ?>"><?php echo $row_querymrktStateabrv['market']; ?></a>

                
                    </div>
                <?php } while ($row_querymrktStateabrv = mysqli_fetch_assoc($querymrktStateabrv)); ?>



	<div class="clear"></div>
</div>


<!--==============================end markets================================-->



<br /> <br />




	<!-- #_vehicle. -->










<div class="row-2"><!-- Start Container -->







<?php 
//print_r($row_selectVehicles); 
if ($totalRows_selectVehicles > 0) { // Show if recordset not empty ?>

	
    <h3>viewing all <?php echo $totalRows_selectVehicles ?>   Vehicles: </h3>
    
<div id="sortColumn">

		<?php include('inc/left-tower.php'); ?>
        
</div>



        <div id="rightColumn">
        

        
                <?php do { 
                
                //money_format('%i', $number) . "\n";
                
                
                $Vehiclesvid = $row_selectVehicles['vid'];
                $Vehiclesdid = $row_selectVehicles['did'];
                $Vehiclesvlivestatus = $row_selectVehicles['vlivestatus'];
                
                $VehiclesvDateInStock = $row_selectVehicles['vDateInStock'];
                $Vehiclesvphoto_count = $row_selectVehicles['vphoto_count'];
                $Vehiclesvsource_idscrm_import_txt = $row_selectVehicles['vsource_idscrm_import_txt'];
                $Vehiclesvthubmnail_file = $row_selectVehicles['vthubmnail_file'];
                
                $Vehiclesvyear = $row_selectVehicles['vyear'];
                $Vehiclesvmake = $row_selectVehicles['vmake'];
                $Vehiclesvmodel = $row_selectVehicles['vmodel'];
                $Vehiclesvtrim = $row_selectVehicles['vtrim'];
                $Vehicletitle = "$Vehiclesvmake $Vehiclesvmodel $Vehiclesvtrim";
                
                $Vehiclesvvin = $row_selectVehicles['vvin'];
                $Vehiclesvbody = $row_selectVehicles['vbody'];
                $Vehiclesvcondition = $row_selectVehicles['vcondition'];
                $Vehiclesvcertified = $row_selectVehicles['vcertified'];
                $Vehiclesvstockno = $row_selectVehicles['vstockno'];
                $Vehiclesvmileage = $row_selectVehicles['vmileage'];
                
                $Vehiclesvrprice = $row_selectVehicles['vrprice'];
                $Vehiclesvdprice = $row_selectVehicles['vdprice'];
                $Vehiclesvspecialprice = $row_selectVehicles['vspecialprice'];
                
                
                $Vehiclesvrprice = preg_replace("/[^0-9]/","","$Vehiclesvrprice");
                $Vehiclesvdprice = preg_replace("/[^0-9]/","","$Vehiclesvdprice");
                $Vehiclesvspecialprice = preg_replace("/[^0-9]/","","$Vehiclesvspecialprice");
                
                
                if(!$Vehiclesvdprice){
                                            
                                            if(!$Vehiclesvrprice)
                                                {
                                                
                                                if(!$Vehiclesvspecialprice){$downpaymentPrice = '2000';}else{	
                                                                                
                                                        $fifteenpercent = ($Vehiclesvspecialprice * '.15');	
                                                        $downpaymentPrice = "$fifteenpercent";
                                                        $downpaymentPrice = round($downpaymentPrice, -2);
                
                                                        }
                
                                                }else{
                                                        $fifteenpercent = ($Vehiclesvrprice * '.15');	
                                                        $downpaymentPrice = "$fifteenpercent";
                                                        $downpaymentPrice = round($downpaymentPrice, -2);
                
                                                      }
                    }else{
                        
                        $downpaymentPrice = $Vehiclesvdprice;
                        $downpaymentPrice = round($downpaymentPrice, -2);
                }
                
                
                
                
                $Vehiclesvecolor_txt = $row_selectVehicles['vecolor_txt'];
                $Vehiclesvicolor_txt = $row_selectVehicles['vicolor_txt'];
                
                $Vehiclesvtransm = $row_selectVehicles['vtransm'];
                $Vehiclesvengine = $row_selectVehicles['vengine'];
                $Vehiclesvdoors = $row_selectVehicles['vdoors'];
                
                
                
                $Vehiclescompany = $row_selectVehicles['company'];
                $Vehicleswebsite = $row_selectVehicles['website'];
                $Vehiclesphone = $row_selectVehicles['phone'];
                $Vehiclesaddress = $row_selectVehicles['address'];
                
                $Vehiclescity = $row_selectVehicles['city'];
                $Vehiclesstate = $row_selectVehicles['state'];
                $Vehicleszip = $row_selectVehicles['zip'];
                
                $Vehiclesstatus = $row_selectVehicles['status'];
                
                $Vehicleswfh_dealer_type_id = $row_selectVehicles['wfh_dealer_type_id'];
                
                
                $createdAt = $row_selectVehicles['created_at'];
        
        /*
        $format = 'm-d-Y';
        $date = date_create_from_format($format, $createdAt);
        echo date_format($date, 'Y-m-d') . "\n";
        /*/
        
        
                $dateinStock = '';
                
                // When Photos Are Not Available
                $photocomingsoon = "images/wfh_coming_soon_tb.png";
                if(!$Vehiclesvthubmnail_file){
                    $vehicleimage = $photocomingsoon;
                }else{
                    $vehicleimage = "http://images.autocitymag.com/$Vehiclesdid/$Vehiclesvid/$Vehiclesvthubmnail_file";
                }
                
                
                
                $monthlypayments = '<br>'.'Finance Now! Today!!';
                //$monthlypayments = '';
                
                ?>
                
                
                
                
                
                
                
                
                
                
                            <div class="wrapper">
                
                            <figure class="img-indent">
                                
                                <span class="body-text">
                                   <b><?php echo $Vehiclesvcondition; ?> Vehicle</b> | Stock#: <?php echo $Vehiclesvstockno; ?><br />                    <a class="button1" href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>" />
                                        <img src="<?php echo $vehicleimage; ?>" />                    </a>
                                </span>
                                
                               <p>
                               
                               <?php echo $createdAt; ?>
                               
                               </p>
                                   <p>     
                                    <a class="button1" href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                                            
                                        <span class="body-text">
                                        
                                            <?php echo $Vehiclesvphoto_count; ?>: Photos<br />                        
                                        
                                        </span>
                                            
                                    <strong>Date In Stock: <?php echo $VehiclesvDateInStock; ?></strong>
                        
                                   </a>
                                   </p>
                             
                             	<label><input type="checkbox" name="comparevid" id="comparevid" value="<?php echo $Vehiclesvid; ?>" onClick="compareVID(this)" /> Compare</label>
                             </figure>         
                         
                
                            <div class="extra-box">
                            
                                <div class="price">
                                
                                    <br />
                
                                    <a href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                                    
                                    <b>Minimum Downpayment:</b>
                                    <div id="dprice">$ <?php echo $downpaymentPrice; ?></div>
                                    <div id="payments"><?php echo $monthlypayments; ?></div>
                                 </a>
                                </div>
                
                                <div class="padding-top">
                
                                    <h4><span><?php echo $Vehiclesvyear; ?></span> <?php echo $Vehicletitle; ?> </h4>
                
                                    <p>
                                    
                                        
                                  <h2><?php echo $Vehiclescompany; ?></h2>
                                        <br />
                                        <b>Call Us Now: </b><?php echo $Vehiclesphone; ?><br />						
                <!--
                                        <a href="http://" target="_blank">
                                        <b></b></a>
                -->
                                        <br />
                                        <address>
                                        <?php echo $Vehiclesaddress; ?><br />
                                        <?php echo $Vehiclescity; ?>	<?php echo $Vehiclesstate; ?> <?php echo $Vehicleszip; ?><br />
                                        </address>
                                        </b>
                                        
                
                                    </p>
                
                                    <p>
                
                                        <a class="button1" href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                                        <strong>View</strong>
                                        </a>
                                    
                                        |
                                        <a class="button1" href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                                          <strong>Apply</strong>
                                        </a>
                                        <br />
                                                       
                
                                    </p>
                
                                </div>
                
                              </div>
                                    
                                    <hr />
                                    
                            </div>
                
                            
                
                
                  
                
                
                  
                  
                  <?php } while ($row_selectVehicles = mysqli_fetch_assoc($selectVehicles)); ?>
        
        
            <div class="clear"></div>  
        
  </div>

		<?php } // Show if recordset not empty ?>

        	<div class="clear"></div>  

</div>








<?php if ($totalRows_selectVehicles == 0) { // Show if recordset empty ?>

		<?php include('inc/no-vehicle.php'); ?>
<hr />
  <?php } // Show if recordset empty ?>




<!-- #_vehicle. -->
























	<a href="#">NEXT!</a>










<!--==============================footer=================================-->

        <?php include('inc/footer.php'); ?>


</body>
</html>
<?php
mysqli_free_result($slctVehicle);
?>
