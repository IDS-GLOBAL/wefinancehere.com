<?php require_once("db.php"); ?>
<?php



if(isset($_POST['dma_state'])){
	
	$search_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dma_state']));
	
	
	mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_state_geos = "SELECT * FROM `idsids_idsdms`.`states` WHERE `state_abrv` = '$search_state' ORDER BY `state_id` ASC";
$state_geos = mysqli_query($idsconnection_mysqli, $query_state_geos);
$row_state_geos = mysqli_fetch_assoc($state_geos);
$totalRows_state_geos = mysqli_num_rows($state_geos);



}









?>

{lat: <?php echo $row_state_geos['state_latitude']; ?>, lng: <?php echo $row_state_geos['state_longitude']; ?>};
