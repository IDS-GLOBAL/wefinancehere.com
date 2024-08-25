<?php require_once('../Connections/idsconnection.php'); ?>
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

$colname_slctVehicle = "-1";
if (isset($_GET['v'])) {
  $colname_slctVehicle = $_GET['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctVehicle =  "SELECT * FROM vehicles WHERE vid = %s", GetSQLValueString($colname_slctVehicle, "int"));
$slctVehicle = mysqli_query($idsconnection_mysqli, $query_slctVehicle);
$row_slctVehicle = mysqli_fetch_assoc($slctVehicle);
$totalRows_slctVehicle = mysqli_num_rows($slctVehicle);

$vid=$row_slctVehicle['vid'];
$did=$row_slctVehicle['did'];
$vstockno=$row_slctVehicle['vstockno'];
$vcondition=$row_slctVehicle['vcondition'];
$vvin=$row_slctVehicle['vvin'];
$vyear=$row_slctVehicle['vyear'];
$vmake=$row_slctVehicle['vmake'];
$vmodel=$row_slctVehicle['vmodel'];
$vtrim=$row_slctVehicle['vtrim'];
$vmileage=$row_slctVehicle['vmileage'];
$fromsource = 'WeFinanceHere.com';

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctDlr = "SELECT * FROM dealers WHERE id = '$did'";
$slctDlr = mysqli_query($idsconnection_mysqli, $query_slctDlr);
$row_slctDlr = mysqli_fetch_assoc($slctDlr);
$totalRows_slctDlr = mysqli_num_rows($slctDlr);
$did = $row_slctDlr['id']; //Hack Dealer ID

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

if(!$colname_querymrktStateabrv){ 
	
	$ifstate = '';
	
	}else{
	
	$ifstate = "AND dealers.`state` = '$colname_querymrktStateabrv'";
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectVehicles = "SELECT * FROM vehicles, dealers, states WHERE vehicles.`did` =  dealers.`id`  AND dealers.`state` =  states.`state_abrv` AND dealers.`status` = 1 AND vehicles.`vlivestatus` = 1 $ifstate ORDER BY vehicles.`vyear` DESC, vehicles.`vmake` DESC";
$selectVehicles = mysqli_query($idsconnection_mysqli, $query_selectVehicles);
$row_selectVehicles = mysqli_fetch_assoc($selectVehicles);
$totalRows_selectVehicles = mysqli_num_rows($selectVehicles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carMakes = "SELECT * FROM car_make";
$carMakes = mysqli_query($idsconnection_mysqli, $query_carMakes);
$row_carMakes = mysqli_fetch_assoc($carMakes);
$totalRows_carMakes = mysqli_num_rows($carMakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmodels = "SELECT * FROM car_model";
$vmodels = mysqli_query($idsconnection_mysqli, $query_vmodels);
$row_vmodels = mysqli_fetch_assoc($vmodels);
$totalRows_vmodels = mysqli_num_rows($vmodels);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_one_houroptions = "SELECT * FROM time_hours_1";
$one_houroptions = mysqli_query($idsconnection_mysqli, $query_one_houroptions);
$row_one_houroptions = mysqli_fetch_assoc($one_houroptions);
$totalRows_one_houroptions = mysqli_num_rows($one_houroptions);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM income_interval_options";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

?>
<?php

include('../Libary/function_Datetime_Now.php');

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


$vgoodcredit = '3.0';


include('wfhLibrary/similar_vehicles.php');
?>
<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

include('facebook.php');

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '597949943584638',
  'secret' => 'bea982d39e0983cfa4799a5d0e70e8be',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {


  try {


	// Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	


	/*
	$facebook->api('/me/feed', '', array(
		// 'message' => 'Hello World!'
	 ));
	*/





  } 



		  catch (FacebookApiException $e) {
			error_log($e);
			$user = null;
		  }


}

$fbemail = $user_profile['email'];

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
		
$fbUpdateSQL = "UPDATE `wfhuserprofile` SET `wfhuser_email_address` = '$fbemail', `wfhuser_username` = '$fbusername', `wfhuser_verified` = '$fbverified', `applicant_dob` = '$fbdob', `applicant_name` = '$fbfullname', `applicant_fname` = '$fbfname', `applicant_lname` = '$fblname', `applicant_employer1_name` = '$fbemployername', `applicant_employer1_position` = '$fbemployerposition' WHERE `wfhuser_id` = '$wfid'";


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


if ($user){
createwfhuser($user_profile);
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeFinanceHere.com - Finance Your Next Used Car Today!</title>



    <link rel="stylesheet" href="css/wfhreset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhstyle.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhlayout.css" type="text/css" media="screen">    
	
	
    <!--Gallery Style -->
	<link rel="stylesheet" href="http://wefinancehere.com/css/gallerystyles.css" type="text/css"></link>


    <script src="http://code.jquery.com/jquery-1.6.4.js" type="text/javascript"></script>

    <script src="http://wefinancehere.com/js/tabs.js" type="text/javascript"></script>

    <script src="http://wefinancehere.com/js/jquery.jcarousel.pack.js"  type="text/javascript"></script>

    <script src="http://wefinancehere.com/js/loopedslider.js"  type="text/javascript"></script>

    <script type="text/javascript">    

            jQuery(document).ready(function() {			

                jQuery('#third-carousel').jcarousel({

                    vertical: true

                });

            });		

	</script>

    <script type="text/javascript" src="http://wefinancehere.com/js/imagepreloader.js"></script>

	<script type="text/javascript">

        preloadImages([

            'http://wefinancehere.com//images/prev-h.gif', 

            'http://wefinancehere.com//images/next-h.gif']);

    </script>
<script type="text/javascript">
function AjaxFunction(trademake)
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {

var myarray=eval(httpxml.responseText);
// Before adding new we must remove previously loaded elements
for(j=document.cust_leadForm.subcat.options.length-1;j>=0;j--)
{
document.cust_leadForm.subcat.remove(j);
}


for (i=0;i<myarray.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray[i];
optn.value = myarray[i];
document.cust_leadForm.subcat.options.add(optn);

} 
      }
    }
	var url="ajaxEnviro/vtradedd.php";
url=url+"?trademake="+trademake;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>    
    <!--[if gte IE 7]>
    

    <link rel="stylesheet" href="http://wefinancehere.com/css/ie/ie6.css" type="text/css" media="screen">

    <script type="text/javascript" src="http://wefinancehere.com/js/ie_png.js"></script>
	<script defer type="text/javascript" src="js/pngfix.js"></script>

    <script type="text/javascript">

        ie_png.fix('.png');

    </script>

    <![endif]-->

    <!--[if lt IE 9]>

   		<script type="text/javascript" src="http://wefinancehere.com/js/html5.js"></script>

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
   


    
    
    
    
    <div class="padding_container">



							<div id="lead-column"><div id="detailLead" class="leadForm" style="top: 0px;">
    <div class="bodyContainer">
        <div class="leadHeader">
            <h3 class="icn-lead">I'm Interested</h3>
            <a href="javascript:void(0);" class="back-to-details">Back to Details</a>
        </div>
        <div class="form-holder">
        

        

             	<form action="<?php echo $editFormAction; ?>" method="POST" enctype="application/x-www-form-urlencoded" name="cust_leadForm" id="cust_leadForm">
            
              <div class="leadTop">
    <div class="lineHolder">
        <span class="label"><strong>To:</strong></span> <em><?php echo $dcompany; ?></em>
        <div class="dealer_container">
            <p class="field dealer">
                
                    
<?php if($user): ?>
                            
                            <?php echo $dstorephone; ?>
<?php endif; ?>                        
                    
                
            </p>
        </div>
    </div>
    <div class="lineHolder">
        <label for="cust_email" class="label"><strong>From:</strong></label>
        <input name="cust_email" id="cust_email" type="text" <?php echo $fbemail; ?> placeholder="Email" class="field required placeholder">
        
                <span class="liner">To reach me call </span> <span class="lineHolder"><input name="phone" id="phone" type="text" placeholder="Phone Number" class="required placeholder"></span> <span class="liner">  
                <label>
                <select name="cust_phonetype"> 
                    <option value="mobile" selected="selected">Mobile</option>
                    <option value="home">Home</option>
                    <option value="work">Work</option>
                  </select>
                  </label>  
                  number.</span>

        <div id="primaryEmail">
        	<input type="text" id="email" name="email" value="">
        </div>
        
    </div>
</div>





            	<div class="contentleadblock">
    <p>
    
    
        <span class="liner">Hello, <?php echo $dcompany; ?></span>


        <span class="lineHolder">
        
            <input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $did; ?>" >
            <input name="cust_vehicle_id" type="hidden" id="cust_vehicle_id" value="<?php echo $vid; ?>" >
            <input name="cust_lead_source_id" type="hidden" id="cust_lead_source_id" value="4" >            
            <input name="cust_lead_source" type="hidden" id="cust_lead_source" value="WeFinanceHere.com" >
            <input name="cust_lead_token" type="hidden" id="cust_lead_token" value="<?php echo $tkey; ?>" >            
            
            
        </span>
        
        <span class="liner">my name is </span>
        
        <span class="lineHolder">
        <input name="cust_nickname" type="hidden" id="cust_nickname" value="<?php echo $fbfullname; ?>" placeholder="First Name" >
            <input name="cust_fname" type="text" id="cust_fname" value="<?php echo $fbfname; ?>" placeholder="First Name" >
        </span>
        <span class="lineHolder">
            <input name="cust_lname" type="text" class="required placeholder" id="cust_lname" value="<?php echo $fblname; ?>" placeholder="Last Name">
        </span>
        <span class="liner">and I am intrested in this "<?php echo $vtitle; ?> " I see online at WeFinanceHere.com .  When Possible I would like to know more about financing this vehicle.</span>
        
        <span class="liner">I currently work at</span>
        <span class="lineHolder">
            <input name="cust_employer_name" id="cust_employer_name" type="text" placeholder="Employer Name" class="required placeholder">
        </span>
        <span class="liner">in</span>
        <span class="lineHolder">
            <input name="cust_employer_city" id="cust_employer_city" type="text" placeholder="Employer City" class="required placeholder">
            
        </span>

        <span class="lineHolder">
				<select name="cust_employer_state">
				  <option value="NULL" <?php if (!(strcmp("NULL", 'GA'))) {echo "selected=\"selected\"";} ?>>Select One</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], 'GA'))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
				  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
				</select>            
        </span>


        <span class="lineHolder">
            <input name="cust_employer_zip" type="text" class="required placeholder" id="cust_employer_zip" size="10" maxlength="10" placeholder="Zip Code">
            
        </span>
        <span class="liner">I have been working here for about</span>


        <span class="lineHolder">
           <select name="cust_employer_years">
             <option value="NULL">Select Years</option>
             <?php
do {  
?>
             <option value="<?php echo $row_timeYears['year_value']?>"><?php echo $row_timeYears['year_name']?></option>
             <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
           </select>
            
        </span>


        <span class="liner"> and </span>

        <span class="lineHolder">
				<select name="cust_employer_months">
				  <option value="">Select Months</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_timeMonths['month_value']?>"><?php echo $row_timeMonths['month_name']?></option>
				  <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
				</select>            
        </span>
        
        
                <span class="liner">.</span>




        <span class="liner">My current Monthly Income is </span>
        
        <span class="lineHolder">
            <input name="cust_gross_income" id="cust_gross_income" type="text" placeholder="Gross Income" class="required placeholder">    
        </span>


        <span class="liner">which I get paid </span>

        <span class="lineHolder">
            <select name="cust_gross_income_frequency">
              <option value="value" <?php if (!(strcmp("value", "Monthly"))) {echo "selected=\"selected\"";} ?>>label</option>
              <?php
do {  
?>
              <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], "Monthly"))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
              <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
            </select>
        </span>
        <span class="liner">.</span>
        



        <span class="liner">I curenntly Live at </span>
        
        <span class="lineHolder">
            <input name="cust_home_address" id="cust_home_address" type="text" placeholder="123 Street Address" class="required placeholder">    
        </span>
        <span class="liner">in the city of </span>
        <span class="lineHolder">
            <input name="cust_home_city" id="cust_home_city" type="text" placeholder="City" class="required placeholder">
        </span>        
        <span class="lineHolder">
        <br>

				<select name="cust_home_state" id="cust_home_state">
				  <option value="NULL" <?php if (!(strcmp("NULL", 'GA'))) {echo "selected=\"selected\"";} ?>>Select One</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], 'GA'))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
				  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
				</select>            
        </span>
        <span class="liner">, in zip code </span>
        <span class="lineHolder">
            <input name="cust_home_zip" id="cust_home_zip" type="text" placeholder="Zip" class="required placeholder">    
        </span>
        <span class="liner">county of </span>        
        <span class="lineHolder">
            <input name="cust_home_county" id="cust_home_county" type="text" placeholder="County" class="required placeholder">    
        </span>
        <span class="liner">.</span>
</p>
        
        

</div>










<div class="subSection">
    <div class="leadTop">
    <div class="lineHolder">
    
    

        <label for="tradeYes">
            <input name="tradeYes" id="tradeYes" value="Is looking to trade" type="checkbox" class="checkbox">    
            I'm also intrested in Trading my  
        </label>

        <span class="lineHolder" title=" Vehicle Trading">
    <select name="tradeYear" id="tradeYear">
      <option value="">Select Year</option>
      <?php
do {  
?>
      <option value="<?php echo $row_autoYears['year']?>"><?php echo $row_autoYears['year']?></option>
      <?php
} while ($row_autoYears = mysqli_fetch_assoc($autoYears));
  $rows = mysqli_num_rows($autoYears);
  if($rows > 0) {
      mysqli_data_seek($autoYears, 0);
	  $row_autoYears = mysqli_fetch_assoc($autoYears);
  }
?>
    </select>
        </span>

        <span class="lineHolder">
<select name=tradeMake id="tradeMake" onchange="AjaxFunction(this.value);">
          <option value=''>Select One</option>
          <?php
do {  
?>
          <option value="<?php echo $row_carMakes['car_make']?>"><?php echo $row_carMakes['car_make']?></option>
          <?php
} while ($row_carMakes = mysqli_fetch_assoc($carMakes));
  $rows = mysqli_num_rows($carMakes);
  if($rows > 0) {
      mysqli_data_seek($carMakes, 0);
	  $row_carMakes = mysqli_fetch_assoc($carMakes);
  }
?>
        </select>
        
        		</span>

        
        <span class="lineHolder">
        <select id="tradeMake" name="subcat">
        <option value="">Models Appear...</option>
          </select>
        </span>

        <span class="lineHolder">

			<input name="tradeTrim" type="text" id="tradeTrim" size="10" placeholder="Trim/Style">
            
		</span>        
    
    
 
  
            <span class="liner"><br />
            With approximately</span>
        <span class="lineHolder">
        <input name="tradeMiles" type="text" class="required"  id="tradeMiles" value="0" size="7" maxlength="5" data-click-to-edit-write="true" placeholder="Mileage">
</span>

            <span class="liner"> miles on it..</span>
     </div>
     
     
    <div class="lineHolder">
    
    
        <label for="tradeYes">
            <input name="vehiclel_available" id="vehiclel_available" value="Is this vehicle available and ready?" type="checkbox" class="checkbox"> 
            Is this vehicle still available in your inventory?
        </label>
    </div>

    <div class="lineHolder">
        <label for="counter_offer">
            <input name="counter_offer" id="counter_offer" type="checkbox" class="checkbox" value="Would you take my price for this vehicle?">
        </label>

        <label for="counter_offer2">
            Would you take $ <input name="counter_offer2" type="text" class="placeholder" id="counter_offer2" value="0.00" size="7" placeholder=""> for this vehicle?
        </label>
    </div>

    <div class="lineHolder">
        <label for="warranty">
            <input name="warranty" id="warranty" type="checkbox" class="checkbox" value="Does this vehicle have a warranty?"> Does this vehicle have a warranty?
        </label>
    </div>

    <div class="lineHolder">
        <label for="cust_dealtoday">
            <input name="cust_dealtoday" id="cust_dealtoday" type="checkbox" class="checkbox" value="I'm willing to do this deal today."> I'm willing to do this deal today.
        </label>
    </div>

<div class="commentArea">
  <p>
        <a href="#">Send Your Message Here:</a>
    </p>
    <div id="messageContainer" class="hidden">
        <textarea name="cust_comment" cols="50" rows="5" id="cust_comment" placeholder="Enter Your Message Here"></textarea>
    </div>
    <p><span class="liner">Thank you in advance.</span></p>

</div>
    	
        <button id="leadbuton" type="submit">Send Message</button>
    
    </div>
</div>
<input type="hidden" name="MM_insert" value="cust_leadForm">
            </form>

            

        
        </div>
    </div>
</div></div>










	</div>


<!--==============================footer=================================-->

    <?php include('inc/footer.php'); ?>

</div>

    
</body>
</html>
<?php
mysqli_free_result($slctVehicle);
?>
