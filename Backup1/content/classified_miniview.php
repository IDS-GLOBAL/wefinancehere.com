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

$colname_slctDlr = "-1";
if (isset($_GET['did'])) {
  $colname_slctDlr = $_GET['did'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctDlr =  "SELECT * FROM dealers WHERE id = %s", GetSQLValueString($colname_slctDlr, "int"));
$slctDlr = mysqli_query($idsconnection_mysqli, $query_slctDlr);
$row_slctDlr = mysqli_fetch_assoc($slctDlr);
$totalRows_slctDlr = mysqli_num_rows($slctDlr);
$did = $row_slctDlr['id'];



$principal = round($_GET['principal']);
$principal = mysql_real_escape_string($principal);

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_selectVehicles = 50;
$pageNum_selectVehicles = 0;
if (isset($_GET['pageNum_selectVehicles'])) {
  $pageNum_selectVehicles = $_GET['pageNum_selectVehicles'];
}
$startRow_selectVehicles = $pageNum_selectVehicles * $maxRows_selectVehicles;

//OR vehicles.`vspecialprice` < '$principal'



$miniviewSQL = "SELECT `vid`, `vDateInStock`, `vyear`, `vmake`, `vmodel`, `vtrim`, `vvin`, `vcondition`, `vcertified`, `vstockno`, `vmileage`, `vrprice`, `vdprice`, `vspecialprice`, `vecolor_txt`, `vicolor_txt`, `vbody`, `vtransm`, `vengine`, `vdoors`, vehicles.`created_at`, `vthubmnail_file`, `vphoto_count`, `vlivestatus`, `did`, `vid`  FROM `vehicles` WHERE vehicles.`did` = '$did' AND vehicles.`vlivestatus` = '1' ORDER BY vehicles.`vstockno` DESC";
//echo $miniviewSQL;
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectVehicles = "$miniviewSQL";// "$stringStatevs";
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
?>
<?php




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
	
	
	




?>




    <!--==============================Start Markets content================================-->

	<div class="clear"></div>






<?php 
//print_r($row_selectVehicles); 
if ($totalRows_selectVehicles > 0) { // Show if recordset not empty 
?>

	




<div id="miniwrapper">
	
    <h1><?php echo $row_slctDlr['company']; ?></h1>

    <div class="clear"></div>


<script>
$(function(){

function sortByPrice(a,b){
    return $(a).find('.productPriceForSorting').text() > $(b).find('.productPriceForSorting').text();
}

function sortByPriceDesc(a,b){
   return $(a).find('.productPriceForSorting').text() < $(b).find('.productPriceForSorting').text();
}

function reorderEl(el){
    var container = $('#miniproductList');
    container.html('');
    el.each(function(){
        $(this).appendTo(container);
    });
}
$('#asc').click(function(){
    reorderEl($('.imgloadingMiniview').sort(sortByPrice));
});

$('#desc').click(function(){
    reorderEl($('.imgloadingMiniview').sort(sortByPriceDesc));
});

});
</script>
<button id="asc"> sort by price asd</button><button id="desc"> sort by price desc</button>
<div class="clear"></div>            
        <ul id="miniproductList">        
             <li>       
                            <?php  do { ?>
            
                   
               <div class="imgloadingMiniview">


                                        <?php include('_definitions_forvehicle_loop.php'); ?>




                            <div>
                               <span class="miniviewVehicletitle">
                               		<span class="highlighter"><?php echo $Vehiclesvyear; ?></span>  
										<?php echo $Vehicletitle; ?>
                               </span>
<div class="clear"></div>
                                <br />       
                                <span class="body-text">
                                <span class="vstockinfo-text">
                                <b><?php echo $Vehiclesvcondition; ?> Vehicle</b> 
                                	| <span class="highlighter">Stock#:</span> <?php echo $Vehiclesvstockno; ?></span>
                                <br />
                                <div class="item">                
                                <a rel="clearbox[gallery=Gallery,,width=980,,height=1400]" id="button1" href="content/vehicle_preview.php?v=<?php echo $Vehiclesvid; ?>" alt="Ajax">
                                
                                <img id="thumbnailloading" class="thumbnailmini" src="<?php echo $vehicleimage; ?>" />                    
                                
                                <span></span>
                                </a>
                                </div>
                                </span>                                
                
                                        
                                                
            <div class="clear"></div>
                                     <div id="comparelabelmini">
                      <label><input type="checkbox" name="comparevid" id="comparevid" value="<?php echo $Vehiclesvid; ?>"  /> : Pick ME! <strong>$<span class="productPriceForSorting"><?php echo $downpaymentPrice; ?></span> Down!</strong></label></div>
            
            <div class="clear"></div>
            
            
            
            
                                </div>
                            
                     </div>                
                
            
                     
                            <?php } while ($row_selectVehicles = mysqli_fetch_assoc($selectVehicles)); ?>
             </li>
        </ul>
  
</div>

<script>
CB_Init();
</script> 

		<?php } // Show if recordset not empty ?>

        	<div class="clear"></div>  

               








<?php if ($totalRows_selectVehicles == 0) { // Show if recordset empty ?>
  <?php include('no_state_vehicles_bannerpromote.php'); ?>
  <hr />
<?php } // Show if recordset empty ?>




<!-- #_vehicle. -->




<?php
mysqli_free_result($slctDlr);

mysqli_free_result($selectVehicles);
?>
