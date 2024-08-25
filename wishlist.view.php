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

mysql_select_db($database_wfh_connection, $wfh_connection);
$query_caryears = "SELECT * FROM auto_years ORDER BY `year` DESC";
$caryears = mysqli_query($idsconnection_mysqli, $query_caryears, $wfh_connection);
$row_caryears = mysqli_fetch_assoc($caryears);
$totalRows_caryears = mysqli_num_rows($caryears);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wish List View</title>
</head>

<body>
<p>View My Wishlist</p>
<p>&nbsp;</p>
<p>I Now Have The Wish List</p>
<p>&nbsp;</p>
<p>
  <select name="wishvehicle_year" id="wishvehicle_year">
    <option value="">Select Year</option>
    <?php
do {  
?>
    <option value="<?php echo $row_caryears['year']?>"><?php echo $row_caryears['year']?></option>
    <?php
} while ($row_caryears = mysqli_fetch_assoc($caryears));
  $rows = mysqli_num_rows($caryears);
  if($rows > 0) {
      mysqli_data_seek($caryears, 0);
	  $row_caryears = mysqli_fetch_assoc($caryears);
  }
?>
  </select>
</p>
</body>
</html>
<?php
mysqli_free_result($caryears);
?>
