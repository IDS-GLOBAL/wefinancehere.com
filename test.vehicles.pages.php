<?php require_once("db.php"); ?>
<?php

$startRow_LiveVehicles = 0;
$maxRows_LiveVehicles = 99;
$bigSellingPrice_sql = '';
$cust_home_state_sql = '';


$sql_page = "SELECT COUNT(`vid`) FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vlivestatus` = '1' ";
$sql_page_2 = " SELECT COUNT(`vid`) FROM `idsids_idsdms`.`vehicles`
LEFT JOIN `idsids_idsdms`.`dealers` ON `vehicles`.`did` = `dealers`.`id`
WHERE 
`vehicles`.`vlivestatus` = '1'
AND `dealers`.`status` = '1'
$bigSellingPrice_sql
AND `vehicles`.`vrprice` 
AND `vehicles`.`vthubmnail_file` IS NOT NULL
$cust_home_state_sql
GROUP BY `vehicles`.`vid`
";
//echo $sql_page.'<br />';
$query_pages = mysqli_query($idsconnection_mysqli, $sql_page);
$row_pages = mysqli_fetch_row($query_pages);

// Here we have the total row count
$rows_pages = $row_pages[0];
// This is the number of results we want displayed per page
$page_rows = 10;
// This tells us the page number of our last page  Divides whatever is is page_rows  ceil gives us a whole number without decimals
$last = ceil($rows_pages/$page_rows);

// this makes sure the $las connot be less than 1
if($last < 1){
	$last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if its is present, else it is = 1
if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
// This protect the url from being a 0 or so.
if($pagenum < 1){
	$pagenum = 1;
}else if($pagenum > $last){
	$pagenum = $last;
}
// This sets the rage of rows to query for the chosen $pagenum
$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' .$page_rows;
// This is your query again, it is for grabbing just one pgae worth of rows by
$sql_page = "SELECT * 
FROM `idsids_idsdms`.`vehicles`
LEFT JOIN `idsids_idsdms`.`dealers` ON `vehicles`.`did` = `dealers`.`id`
WHERE 
`vehicles`.`vlivestatus` = '1'
AND `dealers`.`status` = '1'
$bigSellingPrice_sql
AND `vehicles`.`vrprice` 
AND `vehicles`.`vthubmnail_file` IS NOT NULL
$cust_home_state_sql
GROUP BY `vehicles`.`vid`
ORDER BY `vehicles`.`vid` DESC
$limit
";


$query_pages = mysqli_query($idsconnection_mysqli, $sql_page);
// This shows the user what page they are on, and the total number of pages
$textline1 = "Vehicles (<b>$rows_pages</b>)";
$textline2 = "Page (<b>$pagenum</b> of <b>$last</b>)";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
			/* First we check if we are on page one.  If we are then we don't need a link to the previous page or the first page so we do nothing.
			If we aren't then we generate links to the first page, and to the previous page.  */
			if($pagenum > 1){
				$previous = $pagenum - 1;
				$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp';
				// Render clickable number links that should appear on the left of the target page number
				for($i = $pagenum-4; $i < $pagenum; $i++){
					if($i > 0){
						$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp';
					}
				}
			}
			// Render the target page number, bt without it being a link
			$paginationCtrls .= ''.$pagenum.' &nbsp; ';
			// Render clickable number links that should appear on the right of the target page number
			for($i = $pagenum+1; $i <= $last; $i++){
				$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp';
				if($i >= $pagenum+4){
						break;
				}

			}

			// This does the same as above, only checking if we are on the last page, and then generating the "Next"
			if($pagenum != $last){
				$next = $pagenum + 1;
				$paginationCtrls .= ' &nbsp; nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
			}
}

$list = '';
while($row = mysqli_fetch_array($query_pages, MYSQLI_ASSOC)){
	$vid = $row["vid"];
	$vyear = $row['vyear'];
	$vmake = $row["vmake"];
	$vmodel = $row["vmodel"];
	$datemade = $row["created_at"];
	$datemade = strftime("%b %d, %Y", strtotime($datemade));
	$list .= '<p><a href="vehicle.php?v='.$vid.'">'.$vyear.' '.$vmake.' '.$vmodel.'</a> - Click the link to view this vehicle <br> Listed since '.$datemade.'</p>';
}
// Close your database connection
mysqli_close($idsconnection_mysqli);











/* mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_LiveVehicles = "SELECT * 
							FROM `idsids_idsdms`.`vehicles`
							LEFT JOIN `idsids_idsdms`.`dealers` ON `vehicles`.`did` = `dealers`.`id`
							WHERE 
							`vehicles`.`vlivestatus` = '1'
							AND `dealers`.`status` = '1'
							$bigSellingPrice_sql
							AND `vehicles`.`vrprice` 
							AND `vehicles`.`vthubmnail_file` IS NOT NULL
							$cust_home_state_sql
							GROUP BY `vehicles`.`vid`
							";
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);
$totalRows_LiveVehicles = mysqli_num_rows($LiveVehicles); */

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicles In Market</title>
	<style type="text/css">
	body{font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; }
	div#pagination_controls{font-size: 21px;}
	div#pagination_controls > a{ color:#06F; }
	div#pagination_controls > a:visited{ color:#06f; }
	</style>
</head>
<body>
	<div>	

			<h2><?php echo $textline1; ?> Paged</h2>
			<p><?php echo $textline2; ?></p>
			<p><?php echo $list; ?></p>
			<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>

	</div>
  
</body>
</html>
