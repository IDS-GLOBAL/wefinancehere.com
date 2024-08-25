<?php include('../Connections/idsconnection.php'); ?>
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
?>

					<?php do{ ?>






					<?php } while ($row_slct_state_dealers = mysqli_fetch_assoc($slct_state_dealers)); ?>
<!-- End Intro -->




<?php
mysqli_free_result($querymrktStateabrv);

mysqli_free_result($selectVehicles);
?>
