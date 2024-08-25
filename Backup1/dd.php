<?php require_once('../Connections/idsconnection.php'); ?>
<?php

$did = '85';



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM auto_years ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_assoc($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmodels = "SELECT * FROM car_model";
$vmodels = mysqli_query($idsconnection_mysqli, $query_vmodels);
$row_vmodels = mysqli_fetch_assoc($vmodels);
$totalRows_vmodels = mysqli_num_rows($vmodels);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_colors_hex = "SELECT * FROM colors_hex ORDER BY colors_hex.color_name";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_assoc($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vehicles_bystock = "SELECT * FROM vehicles WHERE did = $did ORDER BY vstockno DESC";
$vehicles_bystock = mysqli_query($idsconnection_mysqli, $query_vehicles_bystock);
$row_vehicles_bystock = mysqli_fetch_assoc($vehicles_bystock);
$totalRows_vehicles_bystock = mysqli_num_rows($vehicles_bystock);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carMakes = "SELECT * FROM car_make";
$carMakes = mysqli_query($idsconnection_mysqli, $query_carMakes);
$row_carMakes = mysqli_fetch_assoc($carMakes);
$totalRows_carMakes = mysqli_num_rows($carMakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM auto_years ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_assoc($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>

<script type="text/javascript">
function AjaxFunction(trademake)
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {

var myarray=eval(httpxml.responseText);
// Before adding new we must remove previously loaded elements
for(j=document.myForm.subcat.options.length-1;j>=0;j--)
{
document.myForm.subcat.remove(j);
}


for (i=0;i<myarray.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray[i];
optn.value = myarray[i];
document.myForm.subcat.options.add(optn);

} 
      }
    }
	var url="ajaxEnviro/vtradedd.php";
url=url+"?trademake="+trademake;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>

</head>

<body>


             	<form action="script-sales-desk-make-deal.php" name="myForm" id="myForm" onsubmit="return validateForm()">
                
                
                
                
                <select name=trademake id="trademake" onchange="AjaxFunction(this.value);">
          <option value='NULL'>Select One</option>
          <?php
do {  
?>
          <option value="<?php echo $row_carMakes['car_make']?>"><?php echo $row_carMakes['car_make']?></option>
          <?php
} while ($row_carMakes = mysqli_fetch_assoc($carMakes));
  $rows = mysqli_num_rows($carMakes);
  if($rows > 0) {
      mysqli_data_seek($carMakes, 0);
	  $row_carMakes = mysqli_fetch_assoc($carMakes);
  }
?>
        </select>










					<select name=subcat>
          </select>



</form>
</body>
</html>