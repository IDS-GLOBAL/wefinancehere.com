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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_LiveVehicles = 50;
$pageNum_LiveVehicles = 0;
if (isset($_GET['pageNum_LiveVehicles'])) {
  $pageNum_LiveVehicles = $_GET['pageNum_LiveVehicles'];
}
$startRow_LiveVehicles = $pageNum_LiveVehicles * $maxRows_LiveVehicles;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_LiveVehicles = "SELECT * FROM vehicles, dealers WHERE vehicles.did = dealers.id AND dealers.status AND vehicles.vlivestatus = '1'";
$query_limit_LiveVehicles =  "%s LIMIT %d, %d", $query_LiveVehicles, $startRow_LiveVehicles, $maxRows_LiveVehicles);
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_limit_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);

if (isset($_GET['totalRows_LiveVehicles'])) {
  $totalRows_LiveVehicles = $_GET['totalRows_LiveVehicles'];
} else {
  $all_LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
  $totalRows_LiveVehicles = mysqli_num_rows($all_LiveVehicles);
}
$totalPages_LiveVehicles = ceil($totalRows_LiveVehicles/$maxRows_LiveVehicles)-1;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pub_sold_view = "SELECT * FROM vehicles, dealers WHERE vehicles.did = dealers.id AND vehicles.vlivestatus = '9' AND  vehicles.vthubmnail_file IS NOT NULL ORDER BY RAND()   LIMIT 20 ";
$pub_sold_view = mysqli_query($idsconnection_mysqli, $query_pub_sold_view);
$row_pub_sold_view = mysqli_fetch_assoc($pub_sold_view);
$totalRows_pub_sold_view = mysqli_num_rows($pub_sold_view);

$colname_find_emailapproval = "-1";
if (isset($_GET['wfhuser_approval_email'])) {
  $colname_find_emailapproval = $_GET['wfhuser_approval_email'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_emailapproval =  "SELECT * FROM wfhuser_approvals WHERE wfhuser_approval_email = %s ORDER BY wfhuser_approvals.wfhuser_approval_id DESC", GetSQLValueString($colname_find_emailapproval, "text"));
$find_emailapproval = mysqli_query($idsconnection_mysqli, $query_find_emailapproval);
$row_find_emailapproval = mysqli_fetch_assoc($find_emailapproval);
$totalRows_find_emailapproval = mysqli_num_rows($find_emailapproval);

$queryString_LiveVehicles = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_LiveVehicles") == false && 
        stristr($param, "totalRows_LiveVehicles") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_LiveVehicles = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_LiveVehicles =  "&totalRows_LiveVehicles=%d%s", $totalRows_LiveVehicles, $queryString_LiveVehicles);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<p>Last 20 Sold Vehicles</p>
<p><?php echo $row_find_emailapproval['wfhuser_approval_id']; ?><?php echo $row_find_emailapproval['wfhuser_approval_token']; ?><?php echo $row_find_emailapproval['wfhuser_approval_email']; ?></p>
<p>&nbsp;</p>
<?php do { ?>
  <p>Sold Vehicles:<?php echo $row_pub_sold_view['vid']; ?><?php echo $row_pub_sold_view['did']; ?><?php echo $row_pub_sold_view['vyear']; ?><?php echo $row_pub_sold_view['city']; ?></p>
  <?php } while ($row_pub_sold_view = mysqli_fetch_assoc($pub_sold_view)); ?>
<p>&nbsp;</p>
<?php do { ?>
  <p>Loop Me          <?php echo $row_LiveVehicles['vid']; ?><?php echo $row_LiveVehicles['vtoken']; ?><?php echo $row_LiveVehicles['vlivestatus']; ?><?php echo $row_LiveVehicles['vcondition']; ?><?php echo $row_LiveVehicles['vvin']; ?><?php echo $row_LiveVehicles['vyear']; ?><?php echo $row_LiveVehicles['vmake']; ?> <?php echo $row_LiveVehicles['vmodel']; ?> <?php echo $row_LiveVehicles['vtrim']; ?> </p>
  <?php } while ($row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles)); ?>
<p>&nbsp;
<p>
<table border="0">
  <tr>
    <td><?php if ($pageNum_LiveVehicles > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_LiveVehicles=%d%s", $currentPage, 0, $queryString_LiveVehicles); ?>">First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_LiveVehicles > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_LiveVehicles=%d%s", $currentPage, max(0, $pageNum_LiveVehicles - 1), $queryString_LiveVehicles); ?>">Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_LiveVehicles < $totalPages_LiveVehicles) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_LiveVehicles=%d%s", $currentPage, min($totalPages_LiveVehicles, $pageNum_LiveVehicles + 1), $queryString_LiveVehicles); ?>">Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_LiveVehicles < $totalPages_LiveVehicles) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_LiveVehicles=%d%s", $currentPage, $totalPages_LiveVehicles, $queryString_LiveVehicles); ?>">Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
</body>
</html>
<?php
mysqli_free_result($LiveVehicles);

mysqli_free_result($pub_sold_view);

mysqli_free_result($find_emailapproval);

mysqli_free_result($LiveVehicles);

mysqli_free_result($pub_sold_view);
?>
