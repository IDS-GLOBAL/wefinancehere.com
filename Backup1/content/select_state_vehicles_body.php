<?php include('../../Connections/idsconnection.php'); ?>
<?php

if (isset($_POST['bodys']) === true && empty($_POST['bodys']) === false){


	//require '../ajax/config.php';


//print_r($_POST);
/*

$coupe = $_POST['allVals'][0];
$sedan = $_POST['allVals'][1];
$suv = $_POST['allVals'][2];
$pickup = $_POST['allVals'][3];
$convertible = $_POST['allVals'][4];
$hatchback = $_POST['allVals'][5];
$truck = $_POST['allVals'][6];
$minivan = $_POST['allVals'][7];
$wagon = $_POST['allVals'][8];
$motorbike = $_POST['allVals'][9];

if($coupe){ $zero = " $zero";} else{$zero = '';}

if($sedan){ $one = " $one";} else{$one = '';}

if($suv){ $two = " $two";} else{$two = '';}

if($pickup){ $three = " $three";} else{$three = '';}

if($convertible){ $four = " $four";} else{$four = '';}

if($hatchback){ $five = " $five";} else{$five = '';}

if($truck){ $six = " $six";} else{$six = '';}

if($minivan){ $seven = " $seven";} else{$seven = '';}

if($wagon){ $eight = " $eight";} else{$eight = '';}

if($motorbike){ $nine = " OR vehicles.`vbody` = '$motorbike'";} else{$nine = '';}
*/

//$bodyo = "$zero $one $two $three $four $five $six $seven $eight $nine";
$bodyo = $_POST['bodys'];

$bodysearchSQL = "SELECT DISTINCT `vbody`  FROM `vehicles` WHERE match(vbody) against ('$bodyo')";


$colname_querymrktStateabrv = $_GET['markets'];
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_querymrktStateabrv = "SELECT * FROM markets_dm, states WHERE states.state_id = markets_dm.state_id AND states.state_abrv = '$colname_querymrktStateabrv'";
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

$maxRows_selectVehicles = 100;
$pageNum_selectVehicles = 0;
if (isset($_GET['pageNum_selectVehicles'])) {
  $pageNum_selectVehicles = $_GET['pageNum_selectVehicles'];
}
$startRow_selectVehicles = $pageNum_selectVehicles * $maxRows_selectVehicles;


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectVehicles = "SELECT * FROM vehicles, dealers WHERE match( vehicles.`vbody`) against ('$bodyo') AND vehicles.`did` =  dealers.`id` AND vehicles.`vlivestatus` = 1 AND dealers.`status` = 1  $ifstate $insertsort";
$query_limit_selectVehicles =  "%s LIMIT %d, %d", $query_selectVehicles, $startRow_selectVehicles, $maxRows_selectVehicles);
$selectVehicles = mysqli_query($idsconnection_mysqli, $query_limit_selectVehicles);
$row_selectVehicles = mysqli_fetch_assoc($selectVehicles);
//echo $query_selectVehicles;
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
						
//echo (mysqli_num_rows($query_selectVehicles) !== 0) ?  mysql_result($query_selectVehicles, 0, 'vbody') : 'Body Not Found';						
	
}


?>


    <!--==============================Start Script================================-->   

<?php 
//print_r($row_selectVehicles); 
if ($totalRows_selectVehicles > 0) { // Show if recordset not empty 
?>

	
    






<?php //include('_vbody_selection.php'); ?>
<script language="javascript" type="text/javascript" src="js/powerAjax2.js"></script>    
                
     
    	<h3>viewing all <?php echo $totalRows_selectVehicles; ?> Body  Vehicles: </h3>
        
        
        <div id="topvehiclepageNavv">
        
        <?php //include('vehicle_navigation.php'); ?>

        
        </div>
        
        
        
				<?php  do { ?>
                
							<?php include('_definitions_forvehicle_loop.php'); ?>

                            <?php include('_vehicle_loop.php'); ?>                              
                


                <?php } while ($row_selectVehicles = mysqli_fetch_assoc($selectVehicles)); ?>
  





		<?php } // Show if recordset not empty ?>

        	<div class="clear"></div>  









<?php if ($totalRows_selectVehicles == 0) { // Show if recordset empty ?>
  <?php //echo $query_selectVehicles;
 include('../inc/no-vehicle.php'); 
 ?>
  <hr />
<?php } // Show if recordset empty ?>




<!-- #_vehicle. -->
