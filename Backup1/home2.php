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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<title>Master Template</title>
	<meta http-equiv="description" content="Funding Way car loans are for people seeking bad credit, no credit, bankruptcy loans. Get bad credit used car loans or truck financing online. Finding auto loans online for financing a used car with no credit is not a problem with our many finance options." />
	<meta http-equiv="keywords" content="used car, loans, bad credit, online, auto loan, bankruptcy, buy a car, financing" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	
	<!-- link rel="stylesheet" type="text/css" href="http://www.fundingway.com/images/css/master.css" / -->
   	<link rel="stylesheet" type="text/css" href="css/creditprofile.css" />

	<script language="JavaScript" src="js/calc.js"></script>
    
    <script language="JavaScript" src="js/showpay.js"></script>




	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="css/template.css" type="text/css"/>

	<script src="js/jquery-1.6.1.min.js" type="text/javascript"></script>
	<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#FormDealMatrix").validationEngine();
		});
	</script>
    









<!--Gallery Style CSS -->
	<link rel="stylesheet" href="Shine_Gallery/mygallerystyles.css" type="text/css"></link>

<!--Gallery Style Javascript -->
<script type="text/javascript" src="Shine_Gallery/wfh/js/jquery-1.4.2.min.js"></script>

<script type="text/javascript" src="Shine_Gallery/wfh/js/cufon-yui.js"></script>
<script type="text/javascript" src="Shine_Gallery/wfh/js/aura_400.font.js"></script>
<script type="text/javascript" src="Shine_Gallery/wfh/js/js-mygallery.js"></script>

<!-- Scrolling Style -->
<script type="text/javascript" src="Shine_Gallery/wfh/js/js-scrolling-click.js"></script>


<script type="text/javascript" >

function DownPaymentChngd() {

//var dp = document.write.FormDealMatrix.DownPayment.value;

var dpriceform = document.getElementById('DownPayment').value;

var dpricedb = '<?php echo $DownPayment; ?>';

var purchasepower = document.getElementById('prequalifyLoanAmt').value;
 //document.getElementById('CreditProfileBox').style.display = 'block';
//alert(purchasepower);

	//alert(dpricedb);

	if(dpriceform > dpricedb){
	
		if(purchasepower > 0){
		alert("YES! CONGRATULATIONS YOU HAVE BEEN PRE-APPROVED FOR THIS CAR");
		document.getElementById('bxfCalc').style.display = 'block';
		document.getElementById('windowDialog').style.display = 'block';
		}
		
	
	}else
	{
		alert("Sorry I Can't Approve You On This Vehicle At This Time... Please Keep Car Shopping");
		document.getElementById('bxfCalc').style.display = 'none';	
		
	}


}
</script>

</head>

<body>

<div class="layout home">
	
	<div class="adjmid clearfix" >
    
	<!-- Start Navigation -->
		<div class="nav clearfix">
        <?php include("inc/navigation.php"); ?>
		</div>
	<!-- End Navigation -->

<div id="proFile">

	<div class="left proFileLeft">
    
		<div class="vehicleGallery">







			<div class="logoImage">
				<a href="">
					<img src="images/wfh_logo.png" width="230px" alt="" />
				</a>
			</div><!--congratsImag-->

<br />

         
<div id="bodyContent" style="float:left;">

                Preview Window Floats Left
                
                
                <div id="Content">

					<iframe src="http://createaclickablemap.com/map.php?&id=11719&online=true" width="900" height="525" style="border: none;"></iframe>
<!--iframe src="http://localhost/idscrm/test/USMAP-Clickable/map.php" width="900" height="525" style="border: none;"></iframe -->

<script>
	if (window.addEventListener){ window.addEventListener("message", function(event) 
	{ 
	 if(event.data.length >= 22) { 
		
		if( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); 
	}}, false);
	
	} else if (window.attachEvent){ window.attachEvent("message", function(event) 
   { 
	if( event.data.length >= 22) { 
	if ( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); 
	} 
</script>

<style>
	ul.map li { float: left; margin: 0 25px 0 0px; width: 120px; border: 0px solid; height: 45px; padding-left: 6px; } ul.map { list-style: square url(http://createaclickablemap.com/li-arrow.png) !important; } ul.map li a{ margin: 0;padding: 0; text-decoration:underline; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:normal; color:#4591b1; } ul.map li a:hover{ text-decoration:none; color:#214b6e;} .linkBack{ display:block; width:130px; position: relative; bottom: 0px; left: 660px; font-family: Arial,Helvetica,sans-serif; font-size: 10px; font-style:italic; color:#666666;} .linkBack a {color:#666666;}.linkBack a:hover{color:#666666;text-decoration: none;} </style>
<ul class="map">
                <li><a href="" target="_top">Alabama</a></li>
                <li><a href="" target="_top">Alaska</a></li>
                <li><a href="" target="_top">Arizona</a></li>
                <li><a href="" target="_top">Arkansas</a></li>
                <li><a href="" target="_top">California</a></li>
                <li><a href="" target="_top">Colorado</a></li>
                <li><a href="" target="_top">Connecticut</a></li>
                <li><a href="" target="_top">Delaware</a></li>
                <li><a href="#" target="_top">District of Columbia</a></li>
                <li><a href="" target="_top">Florida</a></li>
                <li><a href="" target="_top">Georgia</a></li>
                <li><a href="#" target="_top">Hawaii</a></li>
                <li><a href="" target="_top">Idaho</a></li>
                <li><a href="" target="_top">Illinois</a></li>
                <li><a href="" target="_top">Indiana</a></li>
                <li><a href="" target="_top">Iowa</a></li>
                <li><a href="" target="_top">Kansas</a></li>
                <li><a href="" target="_top">Kentucky</a></li>
                <li><a href="" target="_top">Louisiana</a></li>
                <li><a href="#" target="_top">Maine</a></li>
                <li><a href="" target="_top">Maryland</a></li>
                <li><a href="" target="_top">Massachusetts</a></li>
                <li><a href="" target="_top">Michigan</a></li>
                <li><a href="" target="_top">Minnesota</a></li>
                <li><a href="" target="_top">Mississippi</a></li>
                <li><a href="" target="_top">Missouri</a></li>
                <li><a href="" target="_top">Montana</a></li>
                <li><a href="" target="_top">Nebraska</a></li>
                <li><a href="" target="_top">Nevada</a></li>
                <li><a href="" target="_top">New Hampshire</a></li>
                <li><a href="" target="_top">New Jersey</a></li>
                <li><a href="" target="_top">New Mexico</a></li>
                <li><a href="" target="_top">New York</a></li>
                <li><a href="" target="_top">North Carolina</a></li>
                <li><a href="" target="_top">North Dakota</a></li>
                <li><a href="" target="_top">Ohio</a></li>
                <li><a href="" target="_top">Oklahoma</a></li>
                <li><a href="" target="_top">Oregon</a></li>
                <li><a href="" target="_top">Pennsylvania</a></li>
                <li><a href="" target="_top">Rhode Island</a></li>
                <li><a href="" target="_top">South Carolina</a></li>
                <li><a href="" target="_top">South Dakota</a></li>
                <li><a href="" target="_top">Tennessee</a></li>
                <li><a href="" target="_top">Texas</a></li>
                <li><a href="" target="_top">Utah</a></li>
                <li><a href="" target="_top">Vermont</a></li>
                <li><a href="" target="_top">Virginia</a></li>
                <li><a href="" target="_top">Washington</a></li>
                <li><a href="" target="_top">West Virginia</a></li>
                <li><a href="" target="_top">Wisconsin</a></li>
                <li><a href="" target="_top">Wyoming</a></li>
    </ul>
                </div>

</div>
        

          
		</div><!--vehicleGallery-->
        
        
         


        
	  <div class="dividingSpaceBar">
			Get The Financing You Deserve By Getting Approved Now!
		</div><!--proFileLargeBlueBar-->
		<div align="left">
			<div id="proFileCalc">

			  <a name="home_qualify"></a>
              
              
				<div id="proFileCalcBox">
                
                
	  <form action="scriptDealMatrix.php" name="congratsDeal" id="congratsDeal" style="margin:0; padding:0;">


            <div id="CreditProfileBox" style="display: block;">
            
                    
      Zone 2              
                    <br />

			</div>

<div id="bxfCalc" align="left" style="display: block;">
<br />



















Zone 3




	
                


                
				





</div>




				  </form>
                    
				</div><!--proFileCalcBox-->

				<div class="btmcprofile">&nbsp;</div>
                
				<div class="proFileCalcAmount">

					<div class="proFileBtn" title="Robbie Says HI!">
						Powered By Deal Matrix  <br />

                        <form action="#" method="get" name="myDeal" id="myDeal" style="margin:0; padding:0;">
                        
								<!--input type="submit" name="Submit" value="" class="formbtn" />< Button -->
                            
							<input type="hidden" name="prequalifyIncome" id="prequalifyIncome" value="" />
							<input type="hidden" name="prequalifyMortgage" id="prequalifyMortgage" value="" />
							<input type="hidden" name="prequalifyCreditCards" id="prequalifyCreditCards" value="" />
							<input type="hidden" name="prequalifyGarnishments" id="prequalifyGarnishments" value="" />
							<input type="hidden" name="prequalifyOtherLoans" id="prequalifyOtherLoans" value="" />
							<input type="hidden" name="myCreditScoreAPR" id="myCreditScoreAPR" value="" />
						  <input type="hidden" name="tokenkey" id="tokenkey" value="<?php echo $tkey; ?>" />
							<input type="hidden" name="prequalifyLoanAmt" id="prequalifyLoanAmt" value="" />
						
                        
                        </form>
                        
                        
                        
				  </div>
				</div><!--proFileCalcAmount-->
		  </div><!--proFileCalculator-->
		</div><!--The Left-->
        
        
		<div class="hot5"></div>
		<div class="dividingSmallSpaceBar"></div>
		<div class="hot5"></div>
			
            <?php //include("inc/articlelayout.php"); ?>
            
		<div class="hot15"></div><!-- Spacer Below Three Coumns Active -->
		<div class="dividingSmallThinBar"></div>
		<div class="section" style="padding: 20px;">
			
            <?php //include("inc/loopingText.php"); ?>
            
			<div style="width:100%; clear:both; height:1px; font-size:1px; background-color:#eee">&nbsp;</div>
			<div class="hot10">&nbsp;</div>

			<div class="pad">
				<?php  //include("inc/threecolumnBlank.php"); ?>
			</div>
            
			
            <div class="pad disclaimer">
            	<?php //include("inc/disclaimer.php"); ?>
            </div>
            
		</div> <!-- Left Column Indented -->
	</div>
      
      
</div><!--proFile-->

		        <!-- div class="mobilink"><a href="#">View Mobile-Friendly Version</a></div -->
	</div>

	<div class="adjbot"></div>

	
</div>







<div id="windowDialog" style="display:none;">


<div id="phone-box-info" class="ui-dialog ui-widget ui-widget-content ui-corner-all"  style="outline-width: 0px; outline-style: initial; outline-color: initial; height: auto; width: 400px; position: absolute; top: 100px; left:35%; z-index: 1002; border:4px solid #fff";>
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
	
</div>















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
