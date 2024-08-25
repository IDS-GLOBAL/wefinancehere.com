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

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryDActiveStates = "SELECT distinct state FROM states, dealers WHERE dealers.`state` =  states.state_abrv AND dealers.status = 1 ORDER BY state_id ASC";
$queryDActiveStates = mysqli_query($idsconnection_mysqli, $query_queryDActiveStates);
$row_queryDActiveStates = mysqli_fetch_assoc($queryDActiveStates);
$totalRows_queryDActiveStates = mysqli_num_rows($queryDActiveStates);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryNonActiveDealers = "SELECT * FROM states, dealers WHERE  NOT MATCH (dealers.`state`) AGAINST (+'states.`state_abrv`' IN BOOLEAN MODE)";
$queryNonActiveDealers = mysqli_query($idsconnection_mysqli, $query_queryNonActiveDealers);
$row_queryNonActiveDealers = mysqli_fetch_assoc($queryNonActiveDealers);
$totalRows_queryNonActiveDealers = mysqli_num_rows($queryNonActiveDealers);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qerynostatematch = "SELECT * FROM states, dealers WHERE states.state_abrv = dealers.`state`  IS NULL";
$qerynostatematch = mysqli_query($idsconnection_mysqli, $query_qerynostatematch);
$row_qerynostatematch = mysqli_fetch_assoc($qerynostatematch);
$totalRows_qerynostatematch = mysqli_num_rows($qerynostatematch);
?>
<?php

/*

SELECT *
FROM states, dealers
WHERE dealers.`state` =  states.state_abrv AND dealers.status not IN ('0')
ORDER BY state_id ASC

*/
?>