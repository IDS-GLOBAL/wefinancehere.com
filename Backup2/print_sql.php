<?php require_once("db_connect.php"); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
echo $query_slct_state_dealers = "
SELECT `dealers`.`id` AS did, `dealers`.`state`, `dealers`.`company`, `dealers`.`city`, `dealers`.`phone`, `dealers`.`website`, `dealers`.`address`, `dealers`.`zip`, `dealers`.`settingDefaultAPR`, `dealers`.`settingDefaultTerm`, `dealers`.`settingSateSlsTax`, `dealers`.`settingDocDlvryFee`, `dealers`.`settingSateSlsTax`, `dealers`.`settingDocDlvryFee`, `dealers`.`settingTitleFee`, `dealers`.`settingStateInspectnFee`, `dealers`.`status`, `dealers`.`wfh_dealer_status`, `dealers`.`dealer_type_id`, `dealers`.`dealer_chat_display`, (SELECT count(*) FROM vehicles WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vlivestatus` = '1') AS VehiclesTotalCount, (SELECT count(vid) FROM vehicles WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vrprice` < '12576' AND `vehicles`.`vlivestatus` = '1' AND `vehicles`.`vrprice` IS NOT NULL AND `vehicles`.`vrprice` > 1 ) AS VehiclesFoundCount, (SELECT GROUP_CONCAT( `vehicles`.`vid` SEPARATOR '|') FROM vehicles WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vrprice` < '12576' AND `vehicles`.`vlivestatus` = '1' AND `vehicles`.`vrprice` > 1 AND `vehicles`.`vrprice` IS NOT NULL ) AS VehiclesListings, (SELECT GROUP_CONCAT( `vehicles`.`vid` SEPARATOR '|') FROM vehicles WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vlivestatus` = '1' AND `vehicles`.`vrprice` IS NOT NULL AND `vehicles`.`vrprice` > 1 ORDER BY vid ASC) AS VehiclesTesaser FROM dealers WHERE dealers.state = 'MS' AND dealers.status = '1' ORDER BY VehiclesFoundCount DESC, dealers.id DESC
";
//$query_slct_state_dealers = "SELECT * FROM dealers WHERE dealers.`state` = '$see_state'";
$slct_state_dealers = mysqli_query($idsconnection_mysqli, $query_slct_state_dealers);
$row_slct_state_dealers = mysqli_fetch_assoc($slct_state_dealers);
$totalRows_slct_state_dealers = mysqli_num_rows($slct_state_dealers);




echo"<pre>";
print_r($row_slct_state_dealers);
echo "</pre>";


?>