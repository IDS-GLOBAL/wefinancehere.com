<?php
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection = mysql_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 

$hostname_tracking = "localhost";
$database_tracking = "idsids_tracking_idsvehicles";
$username_tracking = "idsids_faith";
$password_tracking = "benjamin2831";
$tracking = mysql_connect($hostname_tracking, $username_tracking, $password_tracking) or trigger_error(mysql_error(),E_USER_ERROR); 
$tracking_mysqli = mysqli_connect($hostname_tracking, $username_tracking, $password_tracking) or trigger_error(mysql_error(),E_USER_ERROR); 

$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection = mysql_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 

$post_state = "-1";
if(isset($_GET['state'])){
	
	$post_state = $_GET['state'];
	
	
	
	
	
}
mysql_select_db($database_idsconnection, $idsconnection);
$query_map_systmdlrs = "SELECT id, dealer_pending_id, dudes_id, dudes2_id, company, company_legalname, dealer_type_id, status, website, phone, address, city, `state`, zip, email, verified, token, dlr_ok_googlemp, dlr_geo_latitude, dlr_geo_longitude FROM dealers WHERE `state` = '$post_state' AND dlr_geo_latitude AND dlr_geo_longitude IS NOT NULL ORDER BY dlr_geo_latitude ASC";
$map_systmdlrs = mysql_query($query_map_systmdlrs, $idsconnection) or die(mysql_error());
$row_map_systmdlrs = mysql_fetch_assoc($map_systmdlrs);
$totalRows_map_systmdlrs = mysql_num_rows($map_systmdlrs);


mysql_select_db($database_tracking, $tracking);
$query_map_prspctdlrs = "SELECT id, dlrprospect_locked, dealer_pending_id, dudes_id, dudes2_id, company, company_legalname, dealer_type_id, dealer_type_label, dealer_stillopenclose, website, phone, address, city, `state`, zip, email, verified, token, dlr_ok_googlemp, dlr_geo_latitude, dlr_geo_longitude FROM dealer_prospects WHERE `state` = '$post_state' AND  dlr_ok_googlemp = 'OK' ORDER BY dlr_geo_latitude ASC";
$map_prspctdlrs = mysql_query($query_map_prspctdlrs, $tracking) or die(mysql_error());
$row_map_prspctdlrs = mysql_fetch_assoc($map_prspctdlrs);
$totalRows_map_prspctdlrs = mysql_num_rows($map_prspctdlrs);
?>

locations = [


<?php $counter = 0; ?>
<?php do { ?>



  <?php //echo $row_map_prspctdlrs['dlr_ok_googlemp']; ?>  
  
  
	[
		'<?php echo $row_map_systmdlrs['company']; ?>',
		'<strong><?php echo $row_map_systmdlrs['company']; ?></strong><p><?php echo $row_map_systmdlrs['address']; ?><br> <?php echo $row_map_systmdlrs['city']; ?> <?php echo $row_map_systmdlrs['state']; ?> <?php echo $row_map_systmdlrs['zip']; ?><br><?php if($row_map_systmdlrs['website']){ ?>web site: <a href="http://<?php echo $row_map_systmdlrs['website']; ?>" target="_blank"><?php echo $row_map_systmdlrs['website']; ?></a><?php } ?></p><p><a id="<?php echo $row_map_systmdlrs['id']; ?>" class="dinvtvw map-scroll" rel="dstore_listing_result" href="dstore.php?token=<?php echo $row_map_systmdlrs['token']; ?>&amp;sysdealerid=<?php echo $row_map_systmdlrs['id']; ?>" target="_blank">View Inventory</a>',
		<?php echo $row_map_systmdlrs['dlr_geo_latitude']; ?>,
		<?php echo $row_map_systmdlrs['dlr_geo_longitude']; ?>,
        'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
		<?php echo $counter; ?>
	],

<?php $counter++; ?>

<?php } while ($row_map_systmdlrs = mysql_fetch_assoc($map_systmdlrs)); ?>


<?php $lastcounter = 0; ?>


<?php do { ?>

<?php $lastcounter++; ?>

<?php $counter2 = $counter++; ?>


	[
		'<?php echo $row_map_prspctdlrs['company']; ?>',
		'<strong><?php echo $row_map_prspctdlrs['company']; ?></strong><p><?php echo $row_map_prspctdlrs['address']; ?><br> <?php echo $row_map_prspctdlrs['city']; ?> <?php echo $row_map_prspctdlrs['state']; ?> <?php echo $row_map_prspctdlrs['zip']; ?><br><?php if($row_map_prspctdlrs['website']){ ?>web site: <a href="http://<?php echo $row_map_prspctdlrs['website']; ?>" target="_blank"><?php echo $row_map_prspctdlrs['website']; ?></a><?php } ?></p><p><a id="<?php echo $row_map_prspctdlrs['id']; ?>" class="dpaprvlchk" role="button">Check My Approval</a></p>',
		<?php echo $row_map_prspctdlrs['dlr_geo_latitude']; ?>,
		<?php echo $row_map_prspctdlrs['dlr_geo_longitude']; ?>,
        'img/icons/auto-orange-icon.png',
		<?php echo $counter2; ?>
	]<?php if($totalRows_map_prspctdlrs != $lastcounter){ echo ','; }else{ echo ''; } ?>

<?php $counter2++; ?>

<?php } while ($row_map_prspctdlrs = mysql_fetch_assoc($map_prspctdlrs)); ?>

/*
<?php /*?>	,[
		'Center US',
		'<strong>Center Of USA</strong><p>No Address<br> Static Location<br>',
		37.09024,
		-100.712891,
        'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
		<?php $counter2++; ?>
	],
	[
		'Laurel Ford Lincoln KIA',
		'<strong>Laurel Ford Lincoln KIA</strong><p>2018 Hwy 15 North<br> Laurel, MS 39440<br>',
		31.7143204,
		 -89.1345316,
         'img/icons/auto-blue-market-leader-icon.png',
		<?php $counter2++; ?>
	]
<?php */?>
*/	
];