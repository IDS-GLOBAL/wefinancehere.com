<?php
$trademake=$_GET['trademake'];

require "config.php";

$q=mysqli_query($idsconnection_mysqli, "select * from `car_model` where car_model.make='$trademake'");

echo mysql_error();

$myarray=array();

$str="";

while($nt=mysql_fetch_array($q)){

$str=$str . "\"$nt[model] \"".",";
}

$str=substr($str,0,(strLen($str)-1)); // Removing the last char , from the string
echo "new Array($str)";

?>