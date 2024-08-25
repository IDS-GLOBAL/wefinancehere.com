<?php require_once('../../Connections/idsconnection.php'); ?>
<?php require_once('../../Connections/tracking.php'); ?>
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

$principal = round($_GET['principal']);
$principal = mysql_real_escape_string($principal);

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_selectVehicles = 10;
$pageNum_selectVehicles = 0;
if (isset($_GET['pageNum_selectVehicles'])) {
  $pageNum_selectVehicles = $_GET['pageNum_selectVehicles'];
}
$startRow_selectVehicles = $pageNum_selectVehicles * $maxRows_selectVehicles;

//OR vehicles.`vspecialprice` < '$principal'

$stringStatevs = "(SELECT `vid`, `vDateInStock`, `vyear`, `vmake`, `vmodel`, `vtrim`, `vvin`, `vcondition`, `vcertified`, `vstockno`, `vmileage`, `vrprice`, `vdprice`, `vspecialprice`, `vecolor_txt`, `vicolor_txt`, `vbody`, `vtransm`, `vengine`, `vdoors`, vehicles.`created_at`, `vthubmnail_file`, `vphoto_count`, `vlivestatus`, `did`, `vid`, `company`, `city`, `zip`, `phone`, `state`  FROM `vehicles`, `dealers` WHERE vehicles.`did` = dealers.`id` AND vehicles.`vlivestatus` = '1' AND dealers.`status` = '1' $ifstate AND vehicles.`vrprice` BETWEEN '0' AND '$principal' $insertsort)
UNION ALL
(SELECT `vid`, `vDateInStock`, `vyear`, `vmake`, `vmodel`, `vtrim`, `vvin`, `vcondition`, `vcertified`, `vstockno`, `vmileage`, `vrprice`, `vdprice`, `vspecialprice`, `vecolor_txt`, `vicolor_txt`, `vbody`, `vtransm`, `vengine`, `vdoors`, vehicles.`created_at`, `vthubmnail_file`, `vphoto_count`, `vlivestatus`, `did`, `vid`, `company`, `city`, `zip`, `phone`, `state` FROM `vehicles`, `dealers` WHERE vehicles.`did` = dealers.`id` AND vehicles.`vlivestatus` = '1' AND dealers.`status` = '1' $ifstate AND vehicles.`vspecialprice` BETWEEN '0' AND '$principal' $insertsort)";

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectVehicles = "$stringStatevs";
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


?>
<?php


include('../../Libary/token-generator.php');


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




    <!--==============================Start Script================================-->   
<script>
// This the car toggle switch function..

  $(function() {
    $( "#check" ).button();
    $( "#format" ).buttonset();
  });
</script>    

    <!--==============================Start Markets content================================-->

                     
<?php include('links_submarkets.php'); ?>


	<div class="clear"></div>

















<?php 
//print_r($row_selectVehicles); 
if ($totalRows_selectVehicles > 0) { // Show if recordset not empty 
?>

	
    
<div id="sortColumn" style="display:none;">

		<?php //include('../inc/left-tower.php'); ?>
        
</div>




<div id="rightColumn">
				
  <div id="counted"></div>              

                

<?php include('_vbody_selection.php'); //echo $query_selectVehicles; ?>

                
     <div id="name-data">
     
    	<h3>viewing all <?php echo $totalRows_selectVehicles; ?>   Vehicles: </h3>
        
        
        <div id="topvehiclepageNav">
        
        <?php include('vehicle_navigation.php'); ?>

			  <div class="clear"></div>
        </div>
        
 
 <script>
$(function(){

function sortByDPrice(a,b){
    return $(a).find('.productDPriceForSorting').text() > $(b).find('.productDPriceForSorting').text();
}

function sortByDPriceDesc(a,b){
   return $(a).find('.productDPriceForSorting').text() < $(b).find('.productDPriceForSorting').text();
}

function reorderEl(el){
    var container = $('#dproductList');
    container.html('');
    el.each(function(){
        $(this).appendTo(container);
    });
}
$('#listasc').click(function(){
    reorderEl($('.vwrapper').sort(sortByDPrice));
});

$('#listdesc').click(function(){
    reorderEl($('.vwrapper').sort(sortByDPriceDesc));
});

});
</script>
<button id="listasc"> sort by price asd</button><button id="listdesc"> sort by price desc</button>

<div class="clear"></div>

        <ul id="dproductList">        
             <li>
             
				<?php  do { ?>
                
							<?php include('_definitions_forvehicle_loop.php'); ?>

                            <?php include('_vehicle_loop.php'); ?>                              
                


                <?php } while ($row_selectVehicles = mysqli_fetch_assoc($selectVehicles)); ?>
                
            </li>
        </ul>
  
               
                
                <div id="topvehiclepageNav">
                
                <?php include('vehicle_navigation.php'); ?>
        
                
                </div>
	</div>
  
</div>




		<?php } // Show if recordset not empty ?>

        	<div class="clear"></div>  









<?php if ($totalRows_selectVehicles == 0) { // Show if recordset empty ?>
  <?php include('no_state_vehicles_bannerpromote.php'); ?>
  <hr />
<?php } // Show if recordset empty ?>




<!-- #_vehicle. -->




<script>
CB_Init();
</script>