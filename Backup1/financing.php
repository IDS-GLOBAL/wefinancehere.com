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
	$vid = $row_slctVehicle['vid'];
	$did = $row_slctVehicle['did'];
	$vdid = $row_slctVehicle['did'];
	$img = $row_slctVphotos['photo_file_name'];

	$thumbs = 'thumbs'; 
	$file = $row_slctVehicle['vthubmnail_file']; 
	$image = "http://idscrm.com/vehicles/photos/$vdid/$vid/$file";
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
	$truepic = "../vehicles/photos/$did/$vid/$img";





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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<title>Deal Matrix</title>
	<meta http-equiv="description" content="WeFinanceHere.com has such a powerful financing system that we make available to finance a vehicle online with instant approvals that are REAL!  RIGHT NOW TODAY!." />
	<meta http-equiv="keywords" content="<?php echo $row_slctDlr['company']; ?>, <?php echo $row_slctDlr['website']; ?> <?php echo $row_slctDlr['address']; ?>, <?php echo $row_slctDlr['city']; ?> <?php echo $row_slctDlr['state']; ?><?php echo $row_slctDlr['zip']; ?>, <?php echo $row_slctDlr['phone']; ?>,
used car, loans, bad credit, online, auto loan, bankruptcy, buy a car, financing" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">

var sellingprice = '<?php echo $vrprice; ?>';
var specialprice =	'<?php echo $row_slctVehicle['vspecialprice']; ?>';


	var tryprice = sellingprice;

if(!sellingprice){

	var tryprice = specialprice;
}
if(!specialprice){

	var tryprice = '47000';
}

//alert(tryprice);
</script>


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
		
		
<?php //include('../Libary/nosubmitonenterkey.php'); ?>	
		
		
		
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
    		  <div class="proFileLogo">
				<a href="">
					<img src="images/wfh_logo.png" width="230px" alt="" />
				</a>
		  </div><!--proFileLogo-->
          
          
<!--         
<div id="previewWindow" style="float:left;">

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
-->    

		<div class="spacer">






            
        
        
        
          
		</div><!--spacer-->
        
        
         


        
	  <div class="dividingSpaceBar">
			Get The Financing You Deserve By Clicking On Get Approved Now!
		</div><!--proFileLargeBlueBar-->
		<div align="left">
			<div id="proFileCalc">

              
              
				<div id="proFileCalcBox">
                
                
	  <form action="scriptDealMatrix.php" name="FormDealMatrix" id="FormDealMatrix" style="margin:0; padding:0;">


            <div id="CreditProfileBox" style="display: block;">
            
                    
                    <?php include("inc/CreditProfileBox.php"); ?>
                    
                    <br />

			</div>

<div id="bxfCalc" align="left" style="display: none;">
<br />























<?php include("inc/CustomerInformation.php"); ?>

	
                


                
				





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
            
            <?php //include("inc/dealershipInfo.php"); ?>



            
			<div style="width:100%; clear:both; height:1px; font-size:1px; background-color:#eee">&nbsp;</div>
			<div class="hot10">&nbsp;</div>

			<div class="pad">
				<?php  //include("inc/threecolumnBlank.php"); ?>
			</div>
            
			
            <div class="pad disclaimer">
            	<?php include("inc/disclaimer.php"); ?>
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
