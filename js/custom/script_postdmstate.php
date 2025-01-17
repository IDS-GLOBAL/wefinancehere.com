<?php require_once("db.php"); ?>
<?php



if(isset($_POST['dma_state'])){
	
	$search_state = mysql_real_escape_string(trim($_POST['dma_state']));
	
	
	mysql_select_db($database_idsconnection, $idsconnection);
$query_state_geos = "SELECT * FROM `states` WHERE `state_abrv` = '$search_state' ORDER BY `state_id` ASC";
$state_geos = mysql_query($query_state_geos, $idsconnection) or die(mysql_error());
$row_state_geos = mysql_fetch_assoc($state_geos);
$totalRows_state_geos = mysql_num_rows($state_geos);



}









?>
var atlanta = {lat: <?php echo $row_state_geos['state_latitude']; ?>, lng: <?php echo $row_state_geos['state_longitude']; ?>};
