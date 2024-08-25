<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/wfh_connection.php'); ?>
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

$maxRows_sold_vehicleswphotos = 50;
$pageNum_sold_vehicleswphotos = 0;
if (isset($_GET['pageNum_sold_vehicleswphotos'])) {
  $pageNum_sold_vehicleswphotos = $_GET['pageNum_sold_vehicleswphotos'];
}
$startRow_sold_vehicleswphotos = $pageNum_sold_vehicleswphotos * $maxRows_sold_vehicleswphotos;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sold_vehicleswphotos = "SELECT * FROM vehicles, dealers WHERE vehicles.did = dealers.id AND dealers.status AND vehicles.vlivestatus = '1'";
$query_limit_sold_vehicleswphotos =  "'$query_sold_vehicleswphotos' LIMIT '$startRow_sold_vehicleswphotos', '$maxRows_sold_vehicleswphotos'";
$sold_vehicleswphotos = mysqli_query($idsconnection_mysqli, $query_limit_sold_vehicleswphotos);
$row_sold_vehicleswphotos = mysqli_fetch_assoc($sold_vehicleswphotos);

if (isset($_GET['totalRows_sold_vehicleswphotos'])) {
  $totalRows_sold_vehicleswphotos = $_GET['totalRows_sold_vehicleswphotos'];
} else {
  $all_sold_vehicleswphotos = mysqli_query($idsconnection_mysqli, $query_sold_vehicleswphotos);
  $totalRows_sold_vehicleswphotos = mysqli_num_rows($all_sold_vehicleswphotos);
}
$totalPages_sold_vehicleswphotos = ceil($totalRows_sold_vehicleswphotos/$maxRows_sold_vehicleswphotos)-1;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dstinct_bstyles = "SELECT DISTINCT vbody FROM vehicles";
$dstinct_bstyles = mysqli_query($idsconnection_mysqli, $query_dstinct_bstyles);
$row_dstinct_bstyles = mysqli_fetch_assoc($dstinct_bstyles);
$totalRows_dstinct_bstyles = mysqli_num_rows($dstinct_bstyles);

mysqli_select_db($wfh_connection_mysqli, $database_idsconnection);
$query_distinct_vehsubmkts = "SELECT * FROM `markets_dm`, `markets_sub_dm`, `states` WHERE `markets_dm`.`market_id` = `markets_sub_dm`.`market_id`  AND `states`.`state_id` = `markets_dm`.`state_id`";
$distinct_vehsubmkts = mysqli_query($idsconnection_mysqli, $query_distinct_vehsubmkts);
$row_distinct_vehsubmkts = mysqli_fetch_assoc($distinct_vehsubmkts);
$totalRows_distinct_vehsubmkts = mysqli_num_rows($distinct_vehsubmkts);

mysqli_select_db($wfh_connection_mysqli, $database_idsconnection);
$query_open_states = "SELECT * FROM `dealers` WHERE `status` = 1 ORDER BY `dealers`.`state` ASC";
$open_states = mysqli_query($idsconnection_mysqli, $query_open_states);
$row_open_states = mysqli_fetch_assoc($open_states);
$totalRows_open_states = mysqli_num_rows($open_states);

mysqli_select_db($wfh_connection_mysqli, $database_idsconnection);
$query_wfh_latestaprovals = "SELECT * FROM `wfhuser_approvals` ORDER BY `wfhuser_approval_id` DESC LIMIT 10";
$wfh_latestaprovals = mysqli_query($idsconnection_mysqli, $query_wfh_latestaprovals);
$row_wfh_latestaprovals = mysqli_fetch_assoc($wfh_latestaprovals);
$totalRows_wfh_latestaprovals = mysqli_num_rows($wfh_latestaprovals);

$colname_verify_userapproval_email = "-1";
if (isset($_GET['wfhuser_approval_email'])) {
  $colname_verify_userapproval_email = $_GET['wfhuser_approval_email'];
}
mysqli_select_db($wfh_connection_mysqli, $database_idsconnection);
$query_verify_userapproval_email =  "SELECT * FROM `wfhuser_approvals` WHERE `wfhuser_approval_email` = '$colname_verify_userapproval_email'";
$verify_userapproval_email = mysqli_query($wfh_connection_mysqli, $query_verify_userapproval_email);
$row_verify_userapproval_email = mysqli_fetch_assoc($verify_userapproval_email);
$totalRows_verify_userapproval_email = mysqli_num_rows($verify_userapproval_email);

$wishlist_wfhuserid = $row_verify_userapproval_email['wfhuser_id'];

mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_wfhuser_wishlist = "SELECT * FROM `wfhuser_wishlist` WHERE `wishlist_wfhuserid` = '$wishlist_wfhuserid' ORDER BY wishlist_id DESC";
$wfhuser_wishlist = mysqli_query($wfh_connection_mysqli, $query_wfhuser_wishlist);
$row_wfhuser_wishlist = mysqli_fetch_assoc($wfhuser_wishlist);
$totalRows_wfhuser_wishlist = mysqli_num_rows($wfhuser_wishlist);

$queryString_sold_vehicleswphotos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_sold_vehicleswphotos") == false && 
        stristr($param, "totalRows_sold_vehicleswphotos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_sold_vehicleswphotos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_sold_vehicleswphotos =  sprintf("&totalRows_sold_vehicleswphotos=%d%s", $totalRows_sold_vehicleswphotos, $queryString_sold_vehicleswphotos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<p>Loop Wishlist</p>
<?php do { ?>
  <p><?php echo $row_wfhuser_wishlist['wishlist_id']; ?><?php echo $row_wfhuser_wishlist['wishlist_vyear']; ?><?php echo $row_wfhuser_wishlist['wishlist_vmake']; ?><?php echo $row_wfhuser_wishlist['wishlist_vmodel']; ?></p>
  <?php } while ($row_wfhuser_wishlist = mysqli_fetch_assoc($wfhuser_wishlist)); ?>
<p>Loop Distinct Vehicle Bodys</p>
<?php do { ?>
  <p><?php echo $row_dstinct_bstyles['vbody']; ?></p>
  <?php } while ($row_dstinct_bstyles = mysqli_fetch_assoc($dstinct_bstyles)); ?>
<p>&nbsp;</p>
<p>Loop Distinct Vehicles In Sub Markets</p>
<?php do { ?>
  <p><?php echo $row_distinct_vehsubmkts['market_sub_name']; ?></p>
  <?php } while ($row_distinct_vehsubmkts = mysqli_fetch_assoc($distinct_vehsubmkts)); ?>
<p>&nbsp;</p>
<table border="0">
  <tr>
    <td><?php if ($pageNum_sold_vehicleswphotos > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_sold_vehicleswphotos=%d%s", $currentPage, 0, $queryString_sold_vehicleswphotos); ?>">First</a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_sold_vehicleswphotos > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_sold_vehicleswphotos=%d%s", $currentPage, max(0, $pageNum_sold_vehicleswphotos - 1), $queryString_sold_vehicleswphotos); ?>">Previous</a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_sold_vehicleswphotos < $totalPages_sold_vehicleswphotos) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_sold_vehicleswphotos=%d%s", $currentPage, min($totalPages_sold_vehicleswphotos, $pageNum_sold_vehicleswphotos + 1), $queryString_sold_vehicleswphotos); ?>">Next</a>
    <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_sold_vehicleswphotos < $totalPages_sold_vehicleswphotos) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_sold_vehicleswphotos=%d%s", $currentPage, $totalPages_sold_vehicleswphotos, $queryString_sold_vehicleswphotos); ?>">Last</a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php do { ?>
  <p><?php echo $row_sold_vehicleswphotos['vid']; ?> <?php echo $row_sold_vehicleswphotos['vyear']; ?> <?php echo $row_sold_vehicleswphotos['vmake']; ?> <?php echo $row_sold_vehicleswphotos['vmodel']; ?> <?php echo $row_sold_vehicleswphotos['vtrim']; ?></p>
  <?php } while ($row_sold_vehicleswphotos = mysqli_fetch_assoc($sold_vehicleswphotos)); ?>
<p>&nbsp;
  <a href="<?php printf("%s?pageNum_sold_vehicleswphotos=%d%s", $currentPage, 0, $queryString_sold_vehicleswphotos); ?>">First</a>
<table border="0">
  <tr>
    <td><?php if ($pageNum_sold_vehicleswphotos > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_sold_vehicleswphotos=%d%s", $currentPage, 0, $queryString_sold_vehicleswphotos); ?>">First</a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_sold_vehicleswphotos > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_sold_vehicleswphotos=%d%s", $currentPage, max(0, $pageNum_sold_vehicleswphotos - 1), $queryString_sold_vehicleswphotos); ?>">Previous</a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_sold_vehicleswphotos < $totalPages_sold_vehicleswphotos) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_sold_vehicleswphotos=%d%s", $currentPage, min($totalPages_sold_vehicleswphotos, $pageNum_sold_vehicleswphotos + 1), $queryString_sold_vehicleswphotos); ?>">Next</a>
    <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_sold_vehicleswphotos < $totalPages_sold_vehicleswphotos) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_sold_vehicleswphotos=%d%s", $currentPage, $totalPages_sold_vehicleswphotos, $queryString_sold_vehicleswphotos); ?>">Last</a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
<?php do { ?>
  <p>Loop Approvals<?php echo $row_wfh_latestaprovals['wfhuser_approval_totalpayments']; ?></p>
  <?php } while ($row_wfh_latestaprovals = mysqli_fetch_assoc($wfh_latestaprovals)); ?>
</body>
</html>
<?php
mysqli_free_result($sold_vehicleswphotos);

mysqli_free_result($dstinct_bstyles);

mysqli_free_result($distinct_vehsubmkts);

mysqli_free_result($open_states);

mysqli_free_result($wfh_latestaprovals);

mysqli_free_result($verify_userapproval_email);

mysqli_free_result($wfhuser_wishlist);
?>
