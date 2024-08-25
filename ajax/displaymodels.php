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
	//print_r($_POST);
	
	
	if(isset($_POST['themake'])){
		
$themake = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['themake']));



$find_makes_sql = "SELECT * FROM `idsids_idsdms`.`car_model` WHERE `car_model`.`make` = '$themake'";
$query = mysqli_query($idsconnection_mysqli, $find_makes_sql);

echo mysql_error();

$myarray=array();


while($row=mysql_fetch_array($query)){

  echo "<option value='".$row['model']."'>".$row['model']."</option>";
}
 echo '<option value="Other">'.'Other'.'</option>';
	}


?>
