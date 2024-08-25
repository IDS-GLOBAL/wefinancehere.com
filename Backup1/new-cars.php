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
$statemrkt = $row_querymrktStateabrv['state_abrv_url'];

if(!$colname_querymrktStateabrv){ 
	
	$ifstate = '';
	
	}else{
	
	$ifstate = "AND dealers.`state` = '$colname_querymrktStateabrv'";
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectVehicles = "SELECT * FROM vehicles, dealers, states WHERE vehicles.`did` =  dealers.`id`  AND dealers.`state` =  states.`state_abrv` AND vehicles.`vlivestatus` = '1'  AND vehicles.`vcondition` = 'New' $ifstate ORDER BY vehicles.`vyear` DESC, vehicles.`vmake` DESC";
$selectVehicles = mysqli_query($idsconnection_mysqli, $query_selectVehicles);
$row_selectVehicles = mysqli_fetch_assoc($selectVehicles);
$totalRows_selectVehicles = mysqli_num_rows($selectVehicles);

?>
<?php
setlocale(LC_MONETARY, 'en_US');

	// Begin 2 Vehicles Definition
	
	
	

	// Begin 1 Vehicle Definitions
	$vid = $row_slctVehicle['vid'];
	$did = $row_slctVehicle['did'];
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
	
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
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

				<?php do { ?>

                
                    <div id="marketlinks">
                     
                    <a href="new-cars.php?markets=<?php echo $statemrkt; ?>"><?php echo $row_querymrktStateabrv['market']; ?></a>

                
                    </div>
                <?php } while ($row_querymrktStateabrv = mysqli_fetch_assoc($querymrktStateabrv)); ?>

	<div class="clear"></div>

</div>
	
    <!--==============================end markets================================-->


<br /> <br />



	<!-- #_vehicle. -->







<?php if ($totalRows_selectVehicles > 0) { // Show if recordset not empty ?>

<div class="row-2">

    <h3>Featured Vehicle</h3>

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
                
               <br /><br /><br />
                   <p>     
           			<a class="button1" href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                            
                        <span class="body-text">
                            <?php echo $Vehiclesvphoto_count; ?>: Photos<br />                        </span>
                            
                    <strong>More</strong>
        
                   </a>
                   </p>
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

            </div>

            

<hr />
  


  
  
  <?php } while ($row_selectVehicles = mysqli_fetch_assoc($selectVehicles)); ?>
  

			</div>
  <?php } // Show if recordset not empty ?>






<!-- #_vehicle. -->








<!-- div class="row-2">

    <h3>Featured Vehicle</h3>

            <div class="wrapper">

            <figure class="img-indent">
                
                <span class="body-text">
                   <b>New Vehicle</b> | Stock#: 5769<br />                    <a class="button1" href="http://wefinancehere.com/vehicles/2621" />
                        <img src=http://vimages.wefinancehere.com/85/2621/thumbs/00_5XXGN4A76DG257705.jpg />                    </a>
                </span>
                
               <br /><br /><br />
                   <p>     
           			<a class="button1" href="http://wefinancehere.com/vehicles/2621">
                            
                        <span class="body-text">
                            1: Photos<br />                        </span>
                            
                    <strong>More</strong>
        
                   </a>
                   </p>
             </figure>         
         

            <div class="extra-box">
            
				<div class="price">
                
                	<br />

                    <a href="http://wefinancehere.com/vehicles/2621">
                    
                    <b>Contact Us!!</b>
				 </a>
                </div>

                <div class="padding-top">

					<h4>2013 Kia Optima<span> EX</span> </h4>

                    <p>
                    
						
                    	<h2>Laurel Ford Lincoln KIA</h2>
                        <br />
						<b>Call Us Now: </b>(601) 342-0227<br />						

						<a href="http://" target="_blank">
                        <b></b></a>

						<br />
                        <address>
						2018 Hwy 15 N.<br />
						Laurel	MS 39440<br />
                        </address>
                        </b>
                        

                    </p>

                    <p>

                        <a class="button1" href="http://wefinancehere.com/vehicles/2621">
                        <strong>View</strong>
                        </a>
                    
                        |
                        <a class="button1" href="http://wefinancehere.com/vehicles/2621/apply">
                          <strong>Apply</strong>
                        </a>
                        <br />
                                       

                    </p>

                </div>

                </div>

            </div>

            


</div -->



<?php if ($totalRows_selectVehicles == 0) { // Show if recordset empty ?>

		<?php include('inc/no-vehicle.php'); ?>
<hr />
  <?php } // Show if recordset empty ?>




<!-- #_vehicle. -->
























	<a href="#">NEXT!</a>










<!--==============================footer=================================-->

        <?php include('inc/footer.php'); ?>










</div>

    
</body>
</html>