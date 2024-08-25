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

$colname_dealers_state = "-1";
if (isset($_GET['markets'])) {
  $colname_dealers_state = $_GET['markets'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_state =  "SELECT id, company, city, `state`, `status` FROM dealers WHERE `status` = '1' AND `id` not IN('1','2') AND `state` = %s ORDER BY company ASC", GetSQLValueString($colname_dealers_state, "text"));
$dealers_state = mysqli_query($idsconnection_mysqli, $query_dealers_state);
$row_dealers_state = mysqli_fetch_assoc($dealers_state);
$totalRows_dealers_state = mysqli_num_rows($dealers_state);

$colname_dealers_prospect = "-1";
if (isset($_GET['markets'])) {
  $colname_dealers_prospect = $_GET['markets'];
}
mysql_select_db($database_tracking, $tracking);
$query_dealers_prospect =  "SELECT * FROM (SELECT id, company, city, `state` FROM dealer_prospects WHERE `state` = %s ORDER BY RAND() LIMIT 50) AS `temp` ORDER BY `company` ASC ", GetSQLValueString($colname_dealers_prospect, "text"));
$dealers_prospect = mysqli_query($idsconnection_mysqli, $query_dealers_prospect, $tracking);
$row_dealers_prospect = mysqli_fetch_assoc($dealers_prospect);
$totalRows_dealers_prospect = mysqli_num_rows($dealers_prospect);
?>



<ul id="miniView">
<?php do { ?>
  <li><a href="<?php echo $row_dealers_state['id']; ?>"><?php echo $row_dealers_state['company']; ?> <br /> <?php echo $row_dealers_state['city']; ?>, <?php echo $row_dealers_state['state']; ?></a></li>
<?php } while ($row_dealers_state = mysqli_fetch_assoc($dealers_state)); ?>
</ul>
<br />

<hr />


<!-- #_vehicle. -->
<ul>
<?php do { ?>
  <li><a href="#<?php //echo $row_dealers_prospect['id']; ?>"><?php echo $row_dealers_prospect['company']; ?> <?php echo $row_dealers_prospect['city']; ?> <?php echo $row_dealers_prospect['state']; ?></a></li>
  <?php } while ($row_dealers_prospect = mysqli_fetch_assoc($dealers_prospect)); ?>
</ul>


<?php
mysqli_free_result($dealers_state);
?>
