<?php require_once('../../Connections/idsconnection.php'); ?>
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

$comparevids = mysql_real_escape_string($_GET['comparevid']);

if(!$comparevids){return false;}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_compareVehicles = "SELECT vthubmnail_file, did, vid  FROM  `idsids_idsdms`.`vehicles` WHERE vehicles.`vid` IN ($comparevids)";
//echo $query_compareVehicles;
$compareVehicles = mysqli_query($idsconnection_mysqli, $query_compareVehicles);
$row_compareVehicles = mysqli_fetch_assoc($compareVehicles);
$totalRows_compareVehicles = mysqli_num_rows($compareVehicles);
?>
<?php

include('../../Connections/idsconnection.php');


//include('_db_functions.php');


include('../wfhLibrary/functionShowVehiclePhotoOnly.php');



//echo "Hello These Are The Cars I've Shown ".$comparevid;

//echo $query_compareVehicles;
?>
       <div>
                              
<div id="saved-vehicles-wrapper">
  <ul id="vselections"> 
<?php do { ?>
                                       
                        <li> 
										<?php 
										$vphoto = $row_compareVehicles['vid'];
										showphoto ($vphoto); 
										?>

                                        <?php echo $row_rcntlyVwd['created_at']; ?>
						</li>

							  <?php } while ($row_compareVehicles = mysqli_fetch_assoc($compareVehicles)); ?>
</ul>                                       

	</div>

<br>
                 
                              <br />
<?php
mysqli_free_result($compareVehicles);
?>
