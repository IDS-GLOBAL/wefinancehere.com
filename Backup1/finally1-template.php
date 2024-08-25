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





?>
<?php

$vrprice = $row_slctVehicle['vrprice'];

$vcost = $row_slctVehicle['vpurchasecost']; 


$Profit = $vrprice - $vcost;

$reserverProfit = '1500';



/// Use Dealers Variables If Exist If Not Then Use Our Default Ones.
$vcondition = $row_slctVehicle['vcondition'];

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

	$vgoodcredit = $row_slctDlr['usedmatrixcredit_vgoodcredit'];
	if(!$vgoodcredit){
		$vgoodcredit = '3.0';
	}
	
	$jgoodcredit = $row_slctDlr['usedmatrixcredit_jgoodcredit'];
	if(!$jgoodcredit){
	$jgoodcredit = '6.0';
	}
	$faircredit = $row_slctDlr['usedmatrixcredit_faircredit'];
	if(!$faircredit){
		$faircredit = '12.0';
	}	
	$poorcredit = $row_slctDlr['usedmatrixcredit_poorcredit'];
	if(!$poorcredit){
	$poorcredit = '15.0';
	}	
	$subprime = $row_slctDlr['usedmatrixcredit_subprime'];
	if(!$subprime){
	$subprime = '26.0';
	}	
	$unknown = $row_slctDlr['usedmatrixcredit_unknown'];
	if(!$unknown){
	$unknown = '29.9';
	}

}
/*
This iwas a script I'm saving for later coverage it goes under calc.js
<script>
var _tsCheck = _tsCheck || [];
(function () {
	_tsCheck = {
		tries: 0,
		maxtries: 10,
		retryafter: 1000,
		ready: function (f) {
			var seproFile = this;
			if (typeof _ts.track == 'function') {
				return f()
			} else {
				if (this.tries++<=this.maxtries) {
					window.setTimeout(function () { seproFile.ready(f) },this.retryafter)
				} else {
					return false
				}
			}
		},
		elementReady: function (elementid,f) {
			var seproFile = this;
			var element =  document.getElementById(elementid);
			if (typeof(element) != 'undefined' && element != null) {
				return f()
			} else {
				if (this.tries++<=this.maxtries) {
					window.setTimeout(function () { seproFile.elementReady(elementid,f) },this.retryafter)
				} else {
					return false
				}
			}
		}
	}
})();
</script>	

*/


$vrprice = $row_slctVehicle['vrprice'];

$docFee = $row_slctDlr['settingDocDlvryFee'];
$titleFee = $row_slctDlr['settingTitleFee'];
$stateFee = $row_slctDlr['settingStateInspectnFee'];

$fees = ($docFee + $titleFee + $stateFee);
$tax = $row_slctDlr['settingSateSlsTax'];

$total = ($fees * $tax);

$sellingPrice = ($vrprice + $total);



$mindown = ($sellingPrice * '.15');

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<title>Deal Matrix</title>
	<meta http-equiv="description" content="Funding Way car loans are for people seeking bad credit, no credit, bankruptcy loans. Get bad credit used car loans or truck financing online. Finding auto loans online for financing a used car with no credit is not a problem with our many finance options." />
	<meta http-equiv="keywords" content="used car, loans, bad credit, online, auto loan, bankruptcy, buy a car, financing" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	
	<!-- link rel="stylesheet" type="text/css" href="http://www.fundingway.com/images/css/master.css" / -->
   	<link rel="stylesheet" type="text/css" href="css/creditprofile.css" />

	<script language="JavaScript" src="js/calc.js"></script>
    
    <script language="JavaScript" src="js/showpay.js"></script>




	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="css/template.css" type="text/css"/>

	<script src="js/jquery-1.6.1.min.js" type="text/javascript">
	</script>
	<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#FormDealMatrix").validationEngine();
		});
	</script>
    









<!--Gallery Style CSS -->
	<link rel="stylesheet" href="Shine_Gallery/mygallerystyles.css" type="text/css"></link>

<!--Gallery Style Javascript -->
<script type="text/javascript" src="Shine_Gallery/wfh/js/cufon-yui.js"></script>
<script type="text/javascript" src="Shine_Gallery/wfh/js/aura_400.font.js"></script>
<script type="text/javascript" src="Shine_Gallery/wfh/js/js-mygallery.js"></script>

<!-- Scrolling Style -->
<script type='text/javascript' src='Shine_Gallery/wfh/js/jquery-1.4.4.min.js'></script>
<script type="text/javascript" src="Shine_Gallery/wfh/js/js-scrolling-click.js"></script>
    
</head>

<body>

<div class="layout home">
	
	<div class="adjmid clearfix" >
    
	<!-- Start Navigation -->
		<div class="nav clearfix">
		  <a href="#Home" class="Home">Home</a>
		  <a href="#FAQ" class="Approved">Get Approved</a>
		  <a href="#TES" class="Markets">Markets</a>
		  <a href="#RES" class="Resources">How It Works?</a>
		  <a href="#APPLY" class="Apply">Apply</a>
		  <a href="#LoanStatus" class="Loan">Loan Status</a>
		  <a href="#Espanol" class="Espanol" style="float:right;">Espanol</a>
		  <a href="#Contact" class="Contact" style="float:right;">Contact</a>
		</div>
	<!-- End Navigation -->

<div id="proFile">

	<div class="left proFileLeft">
    
		<div class="vehicleGallery">
        
        <div style="float:left;">
                        <div class="mainframe">
                        
                            <div id="largephoto">
                            	<div id="loader"></div>
                            
                            
                                    <div id="largecaption">
                                    	<div class="captionShine"></div>
                                    	<div class="captionContent"></div>
                                    </div>
                            
                            <div id="largetrans">  
                            </div>
                            
                            </div>
                        
                        </div>
                
                
        </div>
        


			<div class="dealerLogo">
				<a href="">
					<img src="images/wfh_logo.png" width="230px" alt="" />
				</a>
			</div><!--dealerLogo-->
        
			<div class="proFileLogo">
				<a href="">
					<img src="images/wfh_logo.png" width="230px" alt="" />
				</a>
			</div><!--proFileLogo-->
            














            
            
            <div class="proFileIntro">                
                
				<div class="proFileDesc">
					Profit Of This Vehicle If Sold Is: <?php echo $Profit; ?> <br />

<a id="scrollDown" href="#"><!-- Scroll Down --></a>

<br>
   
    <div id="thumb-container2">

        <div id="contents">

       
	    		<div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/044.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/044.JPG" />
                
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
    
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/045.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/045.JPG" />
                <div class='large_thumb_border'></div>
                
          <div class='large_thumb_shine'></div></div></div></div>
                
                
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/046.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/046.JPG" />
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                            
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/047.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/047.JPG" />
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                                        
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/048.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/048.JPG" />
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                                            
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/049.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/049.JPG" />
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                
                
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                    <div class='large_thumb'>
                        <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/050.JPG" />
                        <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/050.JPG" />
                        <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                                                        
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/051.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src=Shine_Gallery/wfh/051.JPG /><div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                                                        
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src=Shine_Gallery/wfh/052.JPG />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src=Shine_Gallery/wfh/052.JPG /><div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                
                
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src=Shine_Gallery/wfh/053.JPG />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src=Shine_Gallery/wfh/053.JPG /><div class='large_thumb_border'></div>
                
          <div class='large_thumb_shine'></div></div></div></div>
                
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src=Shine_Gallery/wfh/054.JPG />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/054.JPG" />
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
    
                <div class='thumbnailimage'>
                <div class='thumb_container'><div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/055.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/055.JPG" />
                <div class='large_thumb_border'></div>
                
          <div class='large_thumb_shine'></div></div></div></div>
                                                                                                
             
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                    <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/056.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/056.JPG" />
                                                                                                
                <div class='large_thumb_border'></div>
                
          <div class='large_thumb_shine'></div></div></div></div>
            
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                    <div class='large_thumb'>
                        <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/057.JPG" />
                        <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/057.JPG" />
                
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
            
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                    <div class='large_thumb'>
                        <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/058.JPG" />
                        <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/058.JPG" />
                        
                        <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div><!--end entry-->
    
    
    
    					
                        
                               
	    		<div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/044.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/044.JPG" />
                
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
    
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/045.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/045.JPG" />
                <div class='large_thumb_border'></div>
                
          <div class='large_thumb_shine'></div></div></div></div>
                
                
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/046.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/046.JPG" />
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                            
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/047.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/047.JPG" />
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                                        
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/048.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/048.JPG" />
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                                            
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                <div class='large_thumb'>
                <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/049.JPG" />
                <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/049.JPG" />
                <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>
                
                
                <div class='thumbnailimage'>
                <div class='thumb_container'>
                    <div class='large_thumb'>
                        <img width="70px" class="large_thumb_image" alt="thumb"  src="Shine_Gallery/wfh/050.JPG" />
                        <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="Shine_Gallery/wfh/050.JPG" />
                        <div class='large_thumb_border'></div>
          <div class='large_thumb_shine'></div></div></div></div>

    
	  </div>
    
    </div>


<br>

<a id="scrollUp" href="#"><!-- Scroll Up --></a>					
                    
                            


				</div><!--proFileDesc-->
                
				<div class="header2">
					Automotive financing hassle free!
				</div><!--header2-->
                
				<div class="proFileDesc">
					<div class="proFileBullets">
						<ul>
							<li>93% of all Car Loans are Approved</li>
							<li>Fast Email Responses</li>
							<li>Zero Auto Loan Application Fees</li>
						</ul>
					</div><!--proFileBullets-->
				</div><!--proFileDesc-->
				<div class="hot1"></div>
				
				<div class="loanqualifyME">
				  <a href="#"></a>
				</div><!--loanqualifyME-->
                
		  </div>





















            
            
        
        
        
        
        
        
          
		</div><!--vehicleGallery-->
        
        
        
        
		<div class="proFileLargeBlueBar">
			Get Approved Today Up To $50,000 In Just Seconds before You Apply!
		</div><!--proFileLargeBlueBar-->
		<div align="left">
			<div id="proFileCalc">

			  <a name="home_qualify"></a>
				<div class="proFileCalcBox">
                
                
	  <form action="scriptDealMatrix.php" name="FormDealMatrix" id="FormDealMatrix" style="margin:0; padding:0;">



<table width="100%">
	<tr>
    	<td>

                        <div class="goOne">
							<div class="formheader1">
								Select a Credit Profile
							</div><!--formheader1-->
							<a class="credit1">
								<div class="goodCredit">
									<input class="validate[required] radio" name="Credit" type="radio" onclick="dealMatrixChanged(this.form)" value="<?php echo $vgoodcredit; ?>" width="115"  <?php if (!(strcmp($vgoodcredit,"undefined"))) {echo "checked=\"checked\"";} ?> />
					</div>
								<div class="right">
									Very Good <b>(720 - 850)</b>
								</div>
							</a><!--credit1-->
							<a class="credit1">
								<div class="goodCredit">
									<input class="validate[required] radio" <?php if (!(strcmp($jgoodcredit,""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $jgoodcredit; ?>"  onclick="dealMatrixChanged(this.form)"/>
						</div>
								<div class="right">
									Good <b>(675 - 719)</b>
								</div>
							</a><!--credit1-->
							<a class="credit1">
								<div class="goodCredit">
									<input class="validate[required] radio" <?php if (!(strcmp($faircredit,""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $faircredit; ?>"  onclick="dealMatrixChanged(this.form)"/>
						</div>
								<div class="right">
									Fair <b>(621 - 674)</b>
								</div>
							</a><!--credit1-->
							<a class="credit1">
								<div class="goodCredit">
									<input class="validate[required] radio" name="Credit" type="radio"  onclick="dealMatrixChanged(this.form)" value="<?php echo $poorcredit; ?>" <?php if (!(strcmp($poorcredit,""))) {echo "checked=\"checked\"";} ?>/>
					</div>
								<div class="right">
									Poor <b>(575 - 620)</b>
								</div>
							</a>
							<a class="credit1">
								<div class="goodCredit">
									<input class="validate[required] radio" <?php if (!(strcmp($subprime,""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $subprime; ?>"  onclick="dealMatrixChanged(this.form)"/>
						</div>
								<div class="right">
									Really Bad <b>(Below - 575)</b>
								</div>
							</a>
							<a class="credit1">
								<div class="goodCredit">
									<input class="validate[required] radio" name="Credit" type="radio"  onclick="popOutThisOffer('af1401','','adj~','homepage','prequalifier-dont_know_score');" value="<?php echo $unknown; ?>" <?php if (!(strcmp($unknown,""))) {echo "checked=\"checked\"";} ?>/>
					</div>
								<div class="right">
									<span>Not Sure or None (0 - ?)</span>
								</div>
							</a>
							<div class="hot10">&nbsp;</div>
							<i>
								<center>
									<a class="onClick" onClick="popOutCreditOffer('affilatelink','','adj~','homepage','prequalifier-dont_know_score');">Log In:</a>
								</center>
							</i>
                            
                            
                            
                            <!--p>
                            <?php echo $row_slctVehicle['vid']; ?> 
<?php echo $row_slctVehicle['vyear']; ?> <?php echo $row_slctVehicle['vmake']; ?> <?php echo $row_slctVehicle['vmodel']; ?> <?php echo $row_slctVehicle['vtrim']; ?> 
                            <?php echo $row_slctVehicle['vrprice']; ?>
							<?php echo $row_slctVehicle['vspecialprice']; ?>
                              <br />
                            </p -->
                        </div><!--goOne-->


		</td>
        <td valign="top">

                        
						<div class="goTwo">
                        <br />

							<div class="formheader1">
								Your Monthly Income?
							</div><!--formheader1-->
							<div class="goPad">
								<span class="dollarSign">$</span>&nbsp;
                   <input class="validate[required,custom[integer]] text-input" id="income" name="income" onchange="IncomeChanged(this.form)"  style="width:125px;" /><br />
                   <!--  oninput="IncomeChanged(this.form)" -->
								<div class="goDesc">
									Enter your gross income amount. Gross is before taxes are deducted.
								</div><!--goDesc-->
							</div>
                    
                  <div class="proFileCalcAmount">
                   <h2>Purchase Power </h2>
                   <div id="chosenloancell">
						<img src="images/loading-gif-animation.gif" width="45" />
					</div>
				</div>
                            
						</div><!--goTwo-->


		</td>
        <td>

                        
						<div class="goThree">
							<div class="formheader1">
								Enter Monthly<br />Recurring Debts
							</div><!--formheader2-->
							<div class="debt1">
								<label class="desc">Your Rent or Mortgage</label><br />
								<span class="dollarSign">$</span>&nbsp;<input name="RentOrMortgage" id="RentOrMortgage" onchange="IncomeChanged(this.form)" style="width:115px;" />
							</div>
							<div class="debt2">
								<label class="desc">Minimum Card Payments</label><br />
								<span class="dollarSign">$</span>&nbsp;<input name="CreditCardPayments" id="CreditCardPayments" onchange="IncomeChanged(this.form)" style="width:115px;" />
							</div>
							<div class="debt3">
								<label class="desc">Deductions or Garnishments</label><br />
								<span class="dollarSign">$</span>&nbsp;<input name="GarnishDeductions" id="GarnishDeductions" onchange="IncomeChanged(this.form)" style="width:115px;" />
							</div>
							<div class="debt4">
								<label class="desc">All Loan Payments</label><br />
								<span class="dollarSign">$</span>&nbsp;<input name="Deductions" id="Deductions" onchange="IncomeChanged(this.form)" style="width:115px;" />
							</div>
							<div class="goDesc2">
								Don't include utility bills, or current vehicle payment if trading.
							</div><!--goDesc-->
					  </div><!--goThree-->
       </td>
        <td valign="top">
        <div class="loanqualifyME">
                  <a href="javascript:hideshow(document.getElementById('bxfCalc'))">Click Here!</a>
				</div>
        
        </td>
	</tr>
</table>

<br />


<div id="bxfCalc" align="left" style="display: none;">
<br />





<table width="100%" border="1">
	<tr>
    	<td valign="top">
        			<div class="goOne1">
							<div class="formheader1">
								Primary Information:  <a class="smtext" href="#" onclick="jQuery('#FormDealMatrix').validationEngine('hide')">Hide Errors</a>
						  </div><!--formheader1-->
                            
							<div class="goPad">
                            
                            
                              <table>
                                <tr>
                                  <td>
                                 <label class="smtext">
									Title: <select name="titleName">
                                              <option value="">Select</option>
                                              <option value="Mr.">Mr.</option>
                                              <option value="Mrs.">Mrs.</option>
                                              <option value="Ms.">Ms.</option>
                                              <option value="Miss.">Miss.</option>
                                              <option value="Dr.">Dr.</option>
										    </select>
                                 </label>
                                    
                                 <input name="mytoken" type="hidden" id="mytoken" value="<?php echo $tkey; ?>" />
                                 <input name="fromsource" type="hidden" id="fromsource" value="<?php echo $fromsource; ?>" />
                                 
                                 <input name="vid" type="hidden" id="vid" value="<?php echo $vid; ?>" />
                              <input name="did" type="hidden" id="did" value="<?php echo $did; ?>" />
                              <input name="vvin" type="hidden" id="vvin" value="<?php echo $vvin; ?>" />
                              <input name="vstockno" type="hidden" id="vstockno" value="<?php echo $vstockno; ?>" />
                              <input name="vcondition" type="hidden" id="vcondition" value="<?php echo $vcondition; ?>" />
                              <input name="vyear" type="hidden" id="vyear" value="<?php echo $vyear; ?>" />
<input name="vmake" type="hidden" id="vmake" value="<?php echo $vmake; ?>" />
                              <input name="vmodel" type="hidden" id="vmodel" value="<?php echo $vmodel; ?>" />
                              <input name="vtrim" type="hidden" id="vtrim" value="<?php echo $vtrim; ?>" />
                              <input name="vmileage" type="hidden" id="vmileage" value="<?php echo $vmileage; ?>" />
                                  </td>
                                  <td><label class="desc">
                                    <input name="joint_or_invidividual" type="radio" id="joint_or_invidividual_0" value="Individual" checked="checked" />
                                  Individual</label></td>
 
                                  <td><label class="desc">
                                    <input type="radio" name="joint_or_invidividual" value="Joint" id="joint_or_invidividual_1" onclick="showjoint()" />
                                    Joint</label></td>
                                </tr>
                              </table>
                            <br />

								<label class="desc">First Name:<input class="validate[required,custom[onlyLetterSp]] text-input" name="FirstName" id="FirstName" size="22" placeholder="First Name" /></label><br />

                        <label class="desc">Last Name:<input class="validate[required,custom[onlyLetterSp]] text-input" name="LastName" id="LastName" size="22" placeholder="Last Name" /></label><br />

                        <label class="desc">Middle Name:<input class="validate[required,custom[onlyLetterSp]] text-input" name="MiddleName" id="MiddleName" size="20" placeholder="Middle Name Or Intial"  /></label><br />
                        
                        <label class="desc">Suffix: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="Suffix" class="ui-state-default ui-state-hover" id="Suffix">
								          <option value="" selected="selected">Select</option>
								          <option value="JR">JR</option>
								          <option value="SR">SR</option>
								          <option value="I">I</option>
								          <option value="II">II</option>
								          <option value="III">III</option>
								          <option value="IV">IV</option>
								          <option value="V">V</option>
						              </select></label><br />

                        
                        <label class="desc">Email: &nbsp;<input class="validate[required,custom[email]] text-input" name="Email" id="Email" size="26" placeholder="Email Address"  /></label><br />

                        <label class="desc">Mobile:
                          <input value="" class="validate[custom[phone]] text-input" name="Phone" id="Phone" size="12" placeholder="(Code) 123-4567"  /></label> 
                        
                        <label class="desc">Zip: &nbsp;<input class="validate[required,custom[integer]] text-input" type="text" name="Zip" id="Zip" size="3" placeholder="Zip" /></label><br />
                        
                        <label class="desc">Street Address: &nbsp;<input name="Address1" id="Address1" size="18" placeholder="1234 Park Avenue"  /></label><br />

                        <label class="desc">Street Address2:<input name="Address2" id="Address2" size="18" placeholder="Apt. B5"  /></label><br />

                        <label class="desc">City: <input name="City" id="City" size="6" placeholder="City" class="validate[required,custom[onlyLetterSp]] text-input" /></label>

                        <label class="desc">State:
                        <select name="State" id="State">
                          <option value="">Select State</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                          <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                        </select></label>
                        <br />
                        

                        <label class="desc">County:<input class="validate[required,custom[onlyLetterSp]] text-input" name="County" id="County" size="15"  /></label>

                        <p>
                        <label class="desc">Rent/Own:<select name="applicant_buy_own_rent_other">
                 <option value="">Select Living Type</option>
            <option value="Owns Home Outright">Owns Home Outright</option>
            <option value="Buying Home">Buying Home</option>
            <option value="Renting/Leasing">Renting/Leasing</option>
            <option value="Living w/ Relatives">Living w/ Relatives</option>
            <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
            <option value="Unknown">Unknown</option>
          </select></label><br />
						</p>                        
                        
                        <p>
                        <label class="desc">How Long Have You Lived Here?</label><br />
                        
                        
						<label class="desc"><select name="LiveYears" id="LiveYears" onChange="showLive5Years(this)">
                          <option value="">Select Years</option>
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
                        </select></label>
                        
                        <label class="desc"><select name="LiveMonths" id="LiveMonths">
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
                        </select></label>
                        </p>


                        
               


							  <div class="goDesc">
									If You Have not Lived At This Address For More Than 5 Years Please Click Add Previous Address Below To Enter More Information.  <a href="javascript:hideshow(document.getElementById('PreviousHomeInformation'))">Click Here!</a>
							  </div><!--goDesc-->
                                
                                <div id="PreviousHomeInformation" style="display: none;">
                                
                                	<div class="formheader1">
										Previous Address: 
						  			</div>
                                    
                                    <div class="goPad">
                                    
                                    	
                                    
                                      
                                    <br>
        

                                
                                <label class="desc">Street Address: &nbsp;&nbsp;&nbsp;<input class="validate[required] text-input" name="2Address1" id="2Address1" size="17"></label><br>
        
                                <label class="desc">Street Address 2: <input name="2Address2" id="2Address2" size="17"></label><br>
        
                                <label class="desc">City: <input name="2City" id="2City" size="6"></label>
        
                                <label class="desc">State:<select name="2State" id="2State">
                                  <option value="">Select State</option>
                                  <?php
do {  
?>
                                  <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                                </select></label>
                                <br>
                                <label class="desc">Zip: <input name="2Zip" id="2Zip" size="4"></label>
                                <label class="desc">County: <input name="2County" id="2County" size="11"></label><br>
                                
                                <p>
                                <label class="desc">How Long Have You Lived Here?</label><br>
                                </p>
                                
                                <label class="desc"><select name="2LiveYears" id="2LiveYears">
                                  <option value="">Select Years</option>
                                                            <option value="0 Years">0 Years</option>
                                                            <option value="1 Year">1 Year</option>
                                                            <option value="2 Years">2 Years</option>
                                                            <option value="3 Years">3 Years</option>
                                                            <option value="4 Years">4 Years</option>
                                                            <option value="5 Years">5 Years</option>
                                                            <option value="6 Years">6 Years</option>
                                                            <option value="7 Years">7 Years</option>
                                                            <option value="8 Years">8 Years</option>
                                                            <option value="9 Years">9 Years</option>
                                                            <option value="10 Years">10 Years</option>
                                                            <option value="11 Years">11 Years</option>
                                                            <option value="12 Years">12 Years</option>
                                                            <option value="13 Years">13 Years</option>
                                                            <option value="14 Years">14 Years</option>
                                                            <option value="15 Years">15 Years</option>
                                                            <option value="16 Years">16 Years</option>
                                                            <option value="17 Years">17 Years</option>
                                                            <option value="18 Years">18 Years</option>
                                                            <option value="19 Years">19 Years</option>
                                                            <option value="20 Years">20 Years</option>
                                      </select></label>
                                
                                <label class="desc"><select name="2LiveMonths" id="2LiveMonths">
                                  <option value="">Select Months</option>
                                                            <option value="0 Months">0 Months</option>
                                                            <option value="1 Month">1 Month</option>
                                                            <option value="2 Months">2 Months</option>
                                                            <option value="3 Months">3 Months</option>
                                                            <option value="4 Months">4 Months</option>
                                                            <option value="5 Months">5 Months</option>
                                                            <option value="6 Months">6 Months</option>
                                                            <option value="7 Months">7 Months</option>
                                                            <option value="8 Months">8 Months</option>
                                                            <option value="9 Months">9 Months</option>
                                                            <option value="10 Months">10 Months</option>
                                                            <option value="11 Months">11 Months</option>
                                      </select></label>
                                
                                <br>
        
                                
                       <label class="desc">Rent/Own:<select name="2applicant_buy_own_rent_other" id="2applicant_buy_own_rent_other">
                         <option value="">Select Living Type</option>
                    <option value="Owns Home Outright">Owns Home Outright</option>
                    <option value="Buying Home">Buying Home</option>
                    <option value="Renting/Leasing">Renting/Leasing</option>
                    <option value="Living w/ Relatives">Living w/ Relatives</option>
                    <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
                    <option value="Unknown">Unknown</option>
                  </select></label><br>
        
        
                                        <div class="goDesc">
                                            If You Have not Lived At This Address For 5 Years Please Click Add Previous Address Below To Enter More Information.
                                        </div><!--goDesc-->
                                    
                                    </div>
                                
                           	  </div>
                                
                                
                             <div>
                                
                          </div>
							
                      </div>
				
                </div>
        </td>
        <td valign="top">
        			
        			<div class="goOne1">
							<div class="formheader2">
								Work Information:  <a class="smtext" href="#" onclick="jQuery('#FormDealMatrix').validationEngine('hide')">Hide Errors...</a>
							</div><!--formheader2-->
                            
							<div class="goPad">
						<label class="desc">Employer: &nbsp;<input class="validate[required] text-input" type="text" name="EmployerName" id="EmployerName" size="23" placeholder="Employer Name" /></label><br />

                        <label class="desc">Work Phone Number: &nbsp;<input value="" class="validate[custom[phone]] text-input" type="text" name="EmployerPhoneNo" id="telephone" size="12" placeholder="(123) 456 - 7890"  /></label><br />



                        <label class="desc">Employer Address 1: <input type="text" name="EmployerAddr1" id="EmployerAddr1" size="13" placeholder=""  /></label><br />

                        <label class="desc">Employer Address 2: <input type="text" name="EmployerAddr2" id="EmployerAddr2" size="13" placeholder=""  /></label><br />                        


<label class="desc">Zip: <input name="EmployerZip" type="text" id="EmployerZip" size="5"></label>
<label class="desc">City: &nbsp;<input name="EmployerCity" type="text" id="EmployerCity" size="12"></label>
<br />
<label class="desc">State: <select name="EmployerState" id="EmployerState">
                          <option value="">Select One</option>
                                                    
                                                  </select></label>                        
								<div>



<label class="desc">Employment Type:
<select name="EmploymentType">
  <option value="">Select One</option>
            <option value="Auto Worker">Auto Worker</option>
            <option value="Clerical">Clerical</option>
            <option value="Craftsman">Craftsman</option>
            <option value="Executive/Managerial">Executive/Managerial</option>
            <option value="Farmer">Farmer</option>
            <option value="Fisherman">Fisherman</option>
            <option value="Government">Government</option>
            <option value="Homemaker">Homemaker</option>
            <option value="Other">Other</option>
            <option value="Professional">Professional</option>
            <option value="Sales/Advertising">Sales/Advertising</option>
            <option value="Semi-Skilled Labor">Semi-Skilled Labor</option>
            <option value="Skilled Labor">Skilled Labor</option>
</select>
</label>
<br />

<label class="desc">Employment Status:
		<select name="EmploymentStatus" id="EmploymentStatus">
            <option value="">Select One</option>
            <option value="Active Military">Active Military</option>
            <option value="Contract">Contract</option>
            <option value="Full Time"> Full Time</option>
            <option value="Not Applicable">Not Applicable</option>
            <option value="Part Time">Part Time</option>
            <option value="Retired">Retired</option>
            <option value="Seasonal">Seasonal</option>
            <option value="Self Employed">Self Employed</option>
            <option value="Temporary">Temporary</option>
        </select>
</label>
<br />
<p>
<label class="desc">Employment Title:<br />
 <input type="text" name="EmploymentTitle" id="EmploymentTitle" />
 </label>
 </p>
 
 <label class="desc">When Do You Get Paid?<br />
 <select name="paydayFreq" id="paydayFreq" class="validate[required]">
            <option value="">Select One</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Biweekly">Biweekly</option>
                        <option value="Semimonthly">Semimonthly</option>
                        <option value="Monthly" selected="selected">Monthly</option>
                        <option value="Yearly">Yearly</option>
                      </select>
 </label>

 <br />
                                <label class="desc">
                                	How Long Have You Worked Here?<br />
									

<select name="workYears" class="validate[required]" onChange="showWork5Years(this)">
  <option value="">Select Years</option>
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



<select name="workMonths" class="validate[required]">
  <option value="">Select Months</option>
  <?php
do {  
?>
  <option value="<?php echo $row_timeMonths['month_name']?>"><?php echo $row_timeMonths['month_value']?></option>
  <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
</select>

</label>

<p>
<label class="desc">Date Of Hire:<br />
 <input class="validate[required]" type="text" name="DateOfHire" id="DateOfHire" />
 </label>
 </p>

 <br />

								<a href="javascript:hideshow(document.getElementById('PreviousEmployerShow'))">Add Previous Work >></a>
                                
                                </div><!--goDesc-->
                                
                                 <div class="goDesc">
                                	If You Have Not Worked This Job More Than 2 Years Please Click Add Previous Work
                                 	To Enter More Required Information Please.								<a href="javascript:hideshow(document.getElementById('PreviousEmployerShow'))">Cick Here To Add Previous Work Information.</a>

                                 </div><!--goDesc-->
						  </div>

			<div id="PreviousEmployerShow" style="display: none;">
 
<hr />
         
					  <div class="formheader2">
								Previous Employer:
							</div><!--formheader1-->
					
                    
                    <div class="goDesc">
                        <label class="desc">Previous Employer Name: <br />
                        <input class="validate[required] text-input" name="applicant_employer2_name" id="applicant_employer2_name" size="25" /></label>
                        <br /><br />
                        
                        <label class="desc">Previous Employer Phone No.: <br />
						<input value="" class="validate[custom[phone]] text-input" name="applicant_employer2_phone" type="text" id="applicant_employer2_phone" size="15">
                        </label><br />

                        
                       	<label class="desc">Previous Employer Address 1: 
                        <input name="applicant_employer2_addr" id="applicant_employer2_addr" size="15" /></label>
                        <br /><br />

                       	<label class="desc">Previous Employer Address 2: 
                        <input name="applicant_employer2_addr2" id="applicant_employer2_addr2" size="15" /></label>
                        <br /><br />
                        
                        <label class="desc">Zip: <input name="applicant_employer2_zip" type="text" id="applicant_employer2_zip" size="5"></label>
                        <label class="desc">City: <input name="applicant_employer2_city" type="text" id="applicant_employer2_city" size="10"></label><br /><br />

                        
                        <label class="desc">State: <select name="applicant_employer2_state" id="applicant_employer2_state">
                          <option value="">Select One</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                          <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                        </select></label><br />

<p>
<label>Previous Work Years &amp; Months:</label>
</p>

<select name="2workYears">
  <option value="">Select Years</option>
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



<select name="2workMonths">
  <option value="">Select Months</option>
  <?php
do {  
?>
  <option value="<?php echo $row_timeMonths['month_name']?>"><?php echo $row_timeMonths['month_value']?></option>
  <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
</select>

<br />









                    </div>
<hr />
            </div>        
<br />

					  <div class="formheader2">
								Other Income:
							</div><!--formheader1-->

							<div class="goPad">
								<div class="goDesc">
                                                         		<label class="desc">Other Income Source?: <input name="applicant_other_income_source" id="applicant_other_income_source" size="15" /></label><br /><br />

                   		    <label class="desc">Other Income Amount?: <input name="applicant_other_income_amount" id="applicant_other_income_amount" size="15"  /></label><br />
                            <br />

                            
                            <label class="desc">When Do You Get This Other Income? <select name="applicant_other_income_when_rcvd" id="applicant_other_income_when_rcvd">
            <option value="">Select One</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Biweekly">Biweekly</option>
                        <option value="Semimonthly">Semimonthly</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Yearly">Yearly</option>
                      </select></label><br />


									Please Enter All Information Most Accurate As Possible For We Can Approve Your Loan.
							  </div><!--goDesc-->
							</div>


				
                </div>
        </td>
        <td valign="top">
        <div class="goThree3">
							<div class="formheader2">
								Finance Information:  <a class="smtext" href="#" onclick="jQuery('#FormDealMatrix').validationEngine('hide')">Hide Errors</a>
							</div><!--formheader1-->
                            
							<div class="goPad">
                        <input type="hidden" name="applilcant_v_financed_amount" id="applilcant_v_financed_amount" value="<?php echo $sellingPrice; ?>"  />
                        <br />

                        
                          <label class="desc">Term: <input class="validate[required,custom[integer]] text-input" name="applilcant_v_term_months" type="text" id="applilcant_v_term_months" value="<?php echo $row_slctDlr['settingDefaultTerm']; ?>"  size="4"  /></label>
                        
                        <br />

                        
                        <label class="desc">Rate: &nbsp;<input name="applilcant_v_cust_rate" type="text"  id="applilcant_v_cust_rate" value="10.0" size="4" readonly="readonly" />
                        <br />
 
                        
                        <label class="desc">Estimated Monthly Payment:<br />
$<input class="validate[required,custom[number]] text-input" name="applilcant_v_total_monthpmts_est" type="text" id="applilcant_v_total_monthpmts_est"  size="4" readonly="readonly" /></label> Click Show My Payment
                        <br />
                        
                        <input type=button onClick='showpay()'  value='Show My Payment?' /> <br />


                        
                        
                        
                        
                        
                        
                        
                        
                        
						<input  type="hidden" name="Fees" id="Fees" size="15" value="<?php echo $fees; ?>" />
                     <label class="desc">Estimated Out The Door Price:<br />
$<input name="SellingPrice" id="SellingPrice"  value="<?php echo $sellingPrice; ?>" size="4" readonly="readonly" /></label><br />


            
            
                                
                      
                  
              </div>
            
            <div class="goDesc">
									<p>Do You Have A Vehicle You Will Be Trading With This Purchase? If So Please <a href="javascript:hideshow(document.getElementById('TradeInformation'))">Click Here!</a> </p>
                                    
			</div><!--goDesc-->

              <label class="desc">What Is Your Down Payment:<br />
$<input name="DownPayment" id="DownPayment" size="20" placeholder="<?php echo $mindown; ?>"  /></label><br /><br />

         <a href="javascript:hideshow(document.getElementById('TradeInformation'))">Trade Information >>Show/Hide</a>
		
        <br />
        
         <div id="TradeInformation" style="display: none;">
             <label class="desc">Trade Year:<br />

              <select name="applilcant_v_trade_year" id="applilcant_v_trade_year">
            <option value="">Select One</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                      </select>
             </label><br />

			<label class="desc">Trade Make:<br />
<select name="applilcant_v_trade_make" id="applilcant_v_trade_make">
            <option value="">Select One</option>
                        <option value="AMC">AMC</option>
                        <option value="Acura">Acura</option>
                        <option value="Alfa Romeo">Alfa Romeo</option>
                        <option value="Aston Martin">Aston Martin</option>
                        <option value="Audi">Audi</option>
                        <option value="Avanti">Avanti</option>
                        <option value="Bentley">Bentley</option>
                        <option value="BMW">BMW</option>
                        <option value="Buick">Buick</option>
                        <option value="Cadillac">Cadillac</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Chrysler">Chrysler</option>
                        <option value="Daewoo">Daewoo</option>
                        <option value="Daihatsu">Daihatsu</option>
                        <option value="Datsun">Datsun</option>
                        <option value="Delorean">Delorean</option>
                        <option value="Dodge">Dodge</option>
                        <option value="Eagle">Eagle</option>
                        <option value="Ferrari">Ferrari</option>
                        <option value="Fiat">Fiat</option>
                        <option value="Ford">Ford</option>
                        <option value="Geo">Geo</option>
                        <option value="GMC">GMC</option>
                        <option value="Honda">Honda</option>
                        <option value="Hummer">Hummer</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="Infiniti">Infiniti</option>
                        <option value="Isuzu">Isuzu</option>
                        <option value="Jaguar">Jaguar</option>
                        <option value="Jeep">Jeep</option>
                        <option value="Kia">Kia</option>
                        <option value="Lamborghini">Lamborghini</option>
                        <option value="Lancia">Lancia</option>
                        <option value="Land Rover">Land Rover</option>
                        <option value="Lexus">Lexus</option>
                        <option value="Lincoln">Lincoln</option>
                        <option value="Lotus">Lotus</option>
                        <option value="Maserati">Maserati</option>
                        <option value="Maybach">Maybach</option>
                        <option value="Mazda">Mazda</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                        <option value="Mercury">Mercury</option>
                        <option value="Merkur">Merkur</option>
                        <option value="MINI">MINI</option>
                        <option value="Mitsubishi">Mitsubishi</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Oldsmobile">Oldsmobile</option>
                        <option value="Peugeot">Peugeot</option>
                        <option value="Plymouth">Plymouth</option>
                        <option value="Pontiac">Pontiac</option>
                        <option value="Porsche">Porsche</option>
                        <option value="Renault">Renault</option>
                        <option value="Rolls-Royce">Rolls-Royce</option>
                        <option value="Saab">Saab</option>
                        <option value="Saturn">Saturn</option>
                        <option value="Scion">Scion</option>
                        <option value="Smart">Smart</option>
                        <option value="Sterling">Sterling</option>
                        <option value="Subaru">Subaru</option>
                        <option value="Suzuki">Suzuki</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Triumph">Triumph</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Volvo">Volvo</option>
                        <option value="Yugo">Yugo</option>
                        <option value="Trailer">Trailer</option>
                        <option value="Yamaha">Yamaha</option>
                        <option value="Other">Other</option>
                      </select></label><br />

                      
                      <label class="desc">Trade Model:<br />

                      
                      <input type="text" name="applilcant_v_trade_model" id="applilcant_v_trade_model">
                      </label><br />

                      
                      <label class="desc">Trade Vin:<br />
						<input name="applilcant_v_trade_vin" type="text" id="applilcant_v_trade_vin" maxlength="17">
                      </label>
                      
                      </div><!-- Hide Show Trade Information -->


							<br />
                      							<label class="desc">Enter Your Comments Here: <br />
<textarea name="ThisComments" cols="20" rows="3" id="ThisComments"></textarea></label><br />
							<br />

                            <input type="submit" name="Submit" value="" class="gobtn">

          </div>
        
        </td>
   </tr>
</table>

	
                


                
				





</div>




					</form>
                    
				</div><!--proFileCalcBox-->

				<div class="btmcprofile">&nbsp;</div>
                
				<div class="proFileCalcAmount">

					<div class="proFileBtn" title="Robbie Says HI!">
						Powered By Deal Matrix  <br />

                        <form action="#" method="get" name="myDeal" id="myDeal" style="margin:0; padding:0;">
                        
								<input type="submit" name="Submit" value="" class="formbtn" /><!-- Button -->
                            
							<input type="text" name="prequalifyIncome" id="prequalifyIncome" value="" />
							<input type="text" name="prequalifyMortgage" id="prequalifyMortgage" value="" />
							<input type="text" name="prequalifyCreditCards" id="prequalifyCreditCards" value="" />
							<input type="text" name="prequalifyGarnishments" id="prequalifyGarnishments" value="" />
							<input type="text" name="prequalifyOtherLoans" id="prequalifyOtherLoans" value="" />
							<input type="text" name="myCreditScoreAPR" id="myCreditScoreAPR" value="" />
							<input type="text" name="tokenkey" id="tokenkey" value="<?php echo $tkey; ?>" />
							<input type="text" name="prequalifyLoanAmt" id="prequalifyLoanAmt" value="" />
						
                        
                        </form>
                        
                        
                        
				  </div>
				</div><!--proFileCalcAmount-->
		  </div><!--proFileCalc-->
		</div><!--left-->
		<div class="hot5"></div>
		<div class="proFileSmallBlueBar"></div>
		<div class="hot5"></div>
		<div class="threeColArticle">
			<div class="header">
				<h2>Car Financing<br />Basic Requirements</h2>
			</div><!--header-->
			<ul>
				<li>At least $1,500 gross monthly income required
				for credit scores less than 625.</li>
				<li>Financing for new and used automobile loans
				from local auto finance specialists.</li>
				<li>Auto loan approvals are for purchasing a car
				direct from our authorized licensed used car dealer lots.</li>
				<li>Residents of USA and Canada at
				least 18 years of age.</li>
			</ul>
		</div><!--threeColArticle-->
		<div class="threeColArticle">
		  <div class="header">
				<h2>Auto Loan Financing Specialists</h2>
			</div><!--header-->
			All of our auto loan options are used to
			<a href="#">
			buy a car with bad credit</a> from leading auto dealerships across the USA
			and Canada. Online auto loans can usually be obtained the
			same day or within 24 hours.<br /><br />
			Buying a car with low credit is an easy 3 step process:<br /><br />
			<ul>
				<li><a href="#">Apply for financing</a></li>
				<li>Select a new or used vehicle</li>
				<li>Complete the paperwork</li>
			</ul>
		</div><!--threeColArticle-->
		<div class="threeColArticle">
		  <div class="header">
				<h3>Fundingway is here<br />to help you get an<br />auto loan</h3>
			</div><!--header-->
			You don't have to settle for a cheap high mileage used car, truck,
			or suv from a buy here pay here dealership if your credit isn't
			the greatest. We are here to help you get the new or used
			automobile you are looking for. Get a new or
			<a href="#">used car loan</a>
			pre-approved today and let us open the door to your
			financial freedom.
		</div><!--threeColArticle-->
		<div class="hot15"></div>
		<div class="proFileSmallGreenBar"></div>
		<div class="section" style="padding: 20px;">
			<div class="pad">
				<div>
				  <div class="btmArticles">
						<h4>Vehicle Loan Financing Advice</h4>
					</div>
					 
							<a href="#">Bad Credit Auto Refinancing</a>
							<br />
							If you stepped into an auto loan with extremely high monthly payments then you definitely want to look into refinancing, but if you have bad credit there are certain qualifications that need to be met. ...
				  <div class="hot10">&nbsp;</div>
						
							<a href="#">How to Earn Better Credit Scores</a>
							<br />
							Low credit is going to create a lot of problems that are just unnecessary. Of course sometimes falling into damaged credit scores will be simply out of your hands, but it is going to be your responsibility to get yourseproFile out of it. ...
				  <div class="hot10">&nbsp;</div>
						
							<a href="#">What is in a Credit Report?</a>
							<br />
							If you are going to take out a loan then you know that your credit score is going to be pulled at some time, but what does that really mean? ...
							<div class="hot10">&nbsp;</div>
			  </div>
			</div>
			<div style="width:100%; clear:both; height:1px; font-size:1px; background-color:#eee">&nbsp;</div>
			<div class="hot10">&nbsp;</div>
			<div class="pad">
				<div>
				  <div class="btmArticles">
						<h4>Latest Auto News</h4>
					</div>
					 
							April 09, 2013 - <a href="#">Pricing Announcement for the 2014 Acura RDX</a>
							<br />
							There are many fans out there for the Acura RDX or just Acura in general. If you are a fan though of either or just cars in general you will want to keep an eye out for the 2014 Acura RDX. ...
				  <div class="hot10">&nbsp;</div>
						
							April 02, 2013 - <a href="#">Chevy pulls out a New Camaro</a>
							<br />
							Now the New York auto show of 2013 has already come and past now all of the beautiful gems that were unveiled can be discussed and raved about until they will eventually be released to the public. One of the most talked about and exciting ones is the unveiling of the upcoming 2014 Camaro Z28....
				  <div class="hot10">&nbsp;</div>
						
							January 28, 2013 - <a href="#">New car deals reported by TrueCar</a>
							<br />
							Heading into 2013, the automotive market is in great shape, following a full recovery from the downturn that resulted in many automakers being bailed out by the government....
							<div class="hot10">&nbsp;</div>
			  </div>
			</div>
			<div class="pad disclaimer">
				<div class="hot10">&nbsp;</div>
				* The auto financing approval calculator is an estimate, not a guaranteed. You may qualify for slightly more or less. Money down
				may be required but is not necessary for all automobile loans. Approvals are subject to verification of employment and income.
				Auto loan interest rates and repayment terms are based on credit risk, vehicle selection, and equity position of the
				car loan.<br />
				<br />
				FundingWay.com is a service mark of ACE Tech Incorporated. All content
				included on this web site is property of ACE Tech Incorporated and its licensors. No information from this site may be
				used without prior consent from ACE Tech Incorporated and its licensors. This includes text copy, images, graphics, buttons,
				and lender data. All information and content is protected under the intellectual property and copyright laws.
			</div>
		</div>
	</div>
      
      
</div><!--proFile-->

		        <!-- div class="mobilink"><a href="#">View Mobile-Friendly Version</a></div -->
	</div>

	<div class="adjbot"></div>

	
</div>






<!--

<div id="phone-box-info" class="ui-dialog ui-widget ui-widget-content ui-corner-all" style="outline-width: 0px; outline-style: initial; outline-color: initial; height: auto; width: 400px; position: absolute; top: 100px; left:35%; z-index: 1002; border:4px solid #fff !important;">
	<div style="height:auto; border: 1px solid #aaaaaa; background-color:#fff; padding:5px;">
    
		<div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
			<span class="ui-dialog-title" id="ui-dialog-title-dialog-message" style="color:#333;">Need Some Help?</span>
			<div style="float:right; color:#777;">WeFinanceHere.com</div>
		</div>
	
    	<div id="dialog-message" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 66px; height: auto;">
        HI! My Name Is Benjamin Carter! I will Be Your Represenative Here Today!  I see You Like This
		</div>
	
    Disclaimer: We Are Here To Assist You In Obtaining The Financing You Need For This Vehicle.
    	<div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
			<div class="ui-dialog-buttonset">
				<button onClick="document.getElementById('phone-box-info').style.display = 'none';" type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
					<span class="ui-button-text">Ok</span>
				</button>
			</div>
		</div>
	
    </div>
	
    <div style="font-size:1px; height:1px; clear:both; width:100%;">&nbsp;</div>

</div>
	
-->















</body>
</html>
<?php
mysqli_free_result($slctVehicle);

mysqli_free_result($slctDlr);

mysqli_free_result($states);

mysqli_free_result($timeMonths);

mysqli_free_result($timeYears);

mysqli_free_result($autoYears);

mysqli_free_result($slctVphotos);
?>
