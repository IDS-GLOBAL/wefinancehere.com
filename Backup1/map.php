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

$colname_querymrktStateabrv = "-1";
if (isset($_GET['market'])) {
  $colname_querymrktStateabrv = $_GET['market'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_querymrktStateabrv =  "SELECT markets_sub_dm.market_sub_name FROM markets_dm, markets_sub_dm, states WHERE markets_dm.market_id = markets_sub_dm.market_id AND markets_dm.state_id = states.state_id AND states.state_abrv = %s", GetSQLValueString($colname_querymrktStateabrv, "text"));
$querymrktStateabrv = mysqli_query($idsconnection_mysqli, $query_querymrktStateabrv);
$row_querymrktStateabrv = mysqli_fetch_assoc($querymrktStateabrv);
$totalRows_querymrktStateabrv = mysqli_num_rows($querymrktStateabrv);

?>
<?php

/*

SELECT *
FROM states, dealers
WHERE dealers.`state` =  states.state_abrv AND dealers.status not IN ('0')
ORDER BY state_id ASC

*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>US Map Demo</title>
	
	<style>
	  #alert {
	    font-family: Arial, Helvetica, sans-serif;
	    font-size: 16px;
	    background-color: #ddd;
	    color: #333;
	    padding: 5px;
	    font-weight: bold;
	  }
	</style>
	
	<script src="../test/us-map/us-map-1.0/lib/raphael.js"></script>
	 <script src="scale.raphael.js"></script> <!---->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>
	<script src="jquery/1.6.2/jquery.js"></script>
	<script src="../test/us-map/us-map-1.0/example/color.jquery.js"></script>
	<script src="../test/us-map/us-map-1.0/us-map.js"></script>
	
	<script>
	$(document).ready(function() {
	  $('#map').usmap({
	    'stateSpecificStyles': {
	      'AK' : {fill: '#f00'},
  		  'HI' : {fill: '#f00'},
	      'CA' : {fill: '#f00'},		  
		  'AZ' : {fill: '#f00'},
		  'OR' : {fill: '#f00'},
		  'WA' : {fill: '#f00'},
		  'ID' : {fill: '#f00'},
		  'UT' : {fill: '#f00'},
		  'WY' : {fill: '#f00'},
		  'CO' : {fill: '#f00'},
		  'NM' : {fill: '#f00'},
		  'TX' : {fill: '#f00'},
		  'OK' : {fill: '#f00'},
		  'KS' : {fill: '#f00'},
		  'NE' : {fill: '#f00'},
		  'SD' : {fill: '#f00'},
		  'ND' : {fill: '#f00'},
		  'MT' : {fill: '#f00'},		  
		  'MN' : {fill: '#f00'},
		  'WI' : {fill: '#f00'},
		  'IL' : {fill: '#f00'},
		  'MI' : {fill: '#f00'},
		  'IN' : {fill: '#f00'},
		  'OH' : {fill: '#f00'},
		  'KY' : {fill: '#f00'},
		  'TN' : {fill: '#f00'},
		  'NC' : {fill: '#f00'},
		  'SC' : {fill: '#f00'},
		  'FL' : {fill: '#f00'},
		  'IA' : {fill: '#f00'},
		  'MO' : {fill: '#f00'},
		  'AR' : {fill: '#f00'},
		  'LA' : {fill: '#f00'},
		  'VA' : {fill: '#f00'},
		  'WV' : {fill: '#f00'},
		  'MD' : {fill: '#f00'},
		  'PA' : {fill: '#f00'},
		  'NY' : {fill: '#f00'},
		  'NJ' : {fill: '#f00'},
		  'CT' : {fill: '#f00'},
		  'MA' : {fill: '#f00'},
		  'VT' : {fill: '#f00'},
		  'NH' : {fill: '#f00'},
		  'MA' : {fill: '#f00'},
		  'DE' : {fill: '#f00'},
		  'RI' : {fill: '#f00'},
		  'ME' : {fill: '#f00'},
		  'NV' : {fill: '#f00'}
		  
	    },
	    'stateSpecificHoverStyles': {

<?php do { ?>

<?php
$state = $row_queryDActiveStates['state']; 
 echo "'$state' : {fill: '#ccc'},"; 
?>

  <?php } while ($row_queryDActiveStates = mysqli_fetch_assoc($queryDActiveStates)); ?>
  
	      'MS' : {fill: '#ccc'}
	    },
	    
	    'mouseoverState': {
	      'HI' : function(event, data) {
	        //return false;
	      }
	    },
	    
	    
	    'click' : function(event, data) {
	      $('#alert')
	        .text('Click '+data.name+' on map 1')
	        .stop()
	        .css('backgroundColor', '#ff0')
	        .animate({backgroundColor: '#ddd'}, 1000);
	    }
	  });
	  
	  $('#map2').usmap({
	    'stateStyles': {
	      fill: '#025', 
	      "stroke-width": 1,
	      'stroke' : '#036'
	    },
	    'stateHoverStyles': {
	      fill: 'teal'
	    },
	    
	    'click' : function(event, data) {
	      $('#alert')
	        .text('Click '+data.name+' on map 2')
	        .stop()
	        .css('backgroundColor', '#af0')
	        .animate({backgroundColor: '#ddd'}, 1000);
	    }
	  });
	  
	  $('#over-md').click(function(event){
	    $('#map').usmap('trigger', 'MD', 'mouseover', event);
	  });
	  
	  $('#out-md').click(function(event){
	    $('#map').usmap('trigger', 'MD', 'mouseout', event);
	  });
	});
	</script>
</head>
<body>

<div id="mapcontain" align="center">

  <div id="alert">Click alerts</div>
  
  <div id="map" style="width: 700px; height: 400px; border: solid 3px red;"></div>
  
  <button id="over-md">mouseover MD</button> <button id="out-md">mouseout MD</button>
  <div id="map2" style="width: 300px; height: 300px;"></div>
</div>

</body>
</html>
<?php
mysqli_free_result($queryDActiveStates);

mysqli_free_result($queryNonActiveDealers);

mysqli_free_result($qerynostatematch);
?>
