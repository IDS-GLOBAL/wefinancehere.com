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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_selectVehicles = 50;
$pageNum_selectVehicles = 0;
if (isset($_GET['pageNum_selectVehicles'])) {
  $pageNum_selectVehicles = $_GET['pageNum_selectVehicles'];
}
$startRow_selectVehicles = $pageNum_selectVehicles * $maxRows_selectVehicles;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectVehicles = "SELECT * FROM vehicles WHERE vlivestatus = 1";
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>HI</title>
</head>

<body>
<table border="0">
    <tr>
      <td><?php if ($pageNum_selectVehicles > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, 0, $queryString_selectVehicles); ?>">First</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_selectVehicles > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, max(0, $pageNum_selectVehicles - 1), $queryString_selectVehicles); ?>">Previous</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_selectVehicles < $totalPages_selectVehicles) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, min($totalPages_selectVehicles, $pageNum_selectVehicles + 1), $queryString_selectVehicles); ?>">Next</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_selectVehicles < $totalPages_selectVehicles) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, $totalPages_selectVehicles, $queryString_selectVehicles); ?>">Last</a>
          <?php } // Show if not last page ?></td>
    </tr>
</table>
<?php do { ?>
  <?php echo $row_selectVehicles['vid']; ?>
  <br />
  
<?php } while ($row_selectVehicles = mysqli_fetch_assoc($selectVehicles)); ?>
<table border="0">
  <tr>
    <td><?php if ($pageNum_selectVehicles > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, 0, $queryString_selectVehicles); ?>"><img src="../../images/First.gif"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_selectVehicles > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, max(0, $pageNum_selectVehicles - 1), $queryString_selectVehicles); ?>"><img src="../../images/Previous.gif"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_selectVehicles < $totalPages_selectVehicles) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, min($totalPages_selectVehicles, $pageNum_selectVehicles + 1), $queryString_selectVehicles); ?>"><img src="../../images/Next.gif"></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_selectVehicles < $totalPages_selectVehicles) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, $totalPages_selectVehicles, $queryString_selectVehicles); ?>"><img src="../../images/Last.gif"></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($selectVehicles);
?>
