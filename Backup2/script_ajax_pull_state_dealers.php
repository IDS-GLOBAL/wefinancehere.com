<?php include('../Connections/idsconnection.php'); ?>
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

$amtprincipal=NULL;

if(isset($_POST['amtprincipal'])){
	$amtprincipal = $_POST['amtprincipal'];
}else{
	$amtprincipal = '11914.89';
}

$budget = round($amtprincipal);

if(isset($_POST['homeState'])){
	$see_state = mysql_real_escape_string($_POST['homeState']);
}else{ $see_state = 'GA'; }
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_state_dealers = "
SELECT 
`dealers`.`id` AS did, `dealers`.`state`,  `dealers`.`company`, `dealers`.`city`, `dealers`.`phone`, `dealers`.`website`, `dealers`.`address`, `dealers`.`zip`, `dealers`.`settingDefaultAPR`, `dealers`.`settingDefaultTerm`, `dealers`.`settingSateSlsTax`, `dealers`.`settingDocDlvryFee`, `dealers`.`settingSateSlsTax`, `dealers`.`settingDocDlvryFee`, `dealers`.`settingTitleFee`, `dealers`.`settingStateInspectnFee`, `dealers`.`status`, `dealers`.`wfh_dealer_status`, `dealers`.`dealer_type_id`, `dealers`.`dealer_chat_display`,
(SELECT count(*) FROM vehicles WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vlivestatus` = '1') AS VehiclesTotalCount,
(SELECT count(vid) FROM vehicles WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vrprice` < '$budget' AND `vehicles`.`vrprice` > 1 AND `vehicles`.`vlivestatus` = '1' AND `vehicles`.`vrprice` IS NOT NULL) AS VehiclesFoundCount,
(SELECT GROUP_CONCAT( `vehicles`.`vid` SEPARATOR '|')  FROM vehicles WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vrprice` < '$budget' AND `vehicles`.`vrprice` > 1 AND `vehicles`.`vlivestatus` = '1' AND `vehicles`.`vrprice` IS NOT NULL) AS VehiclesListings,
(SELECT GROUP_CONCAT( `vehicles`.`vid` SEPARATOR '|')  FROM vehicles WHERE `vehicles`.`did` = `dealers`.`id` AND `vehicles`.`vlivestatus` = '1' AND `vehicles`.`vrprice` IS NOT NULL AND `vehicles`.`vrprice` > 1  ORDER BY vid ASC) AS VehiclesTesaser
FROM dealers 
WHERE 
dealers.state = '$see_state' 
AND
dealers.status = '1' 
ORDER BY 
VehiclesFoundCount DESC,
dealers.id DESC
";
//$query_slct_state_dealers = "SELECT * FROM dealers WHERE dealers.`state` = '$see_state'";
$slct_state_dealers = mysqli_query($idsconnection_mysqli, $query_slct_state_dealers);
$row_slct_state_dealers = mysqli_fetch_assoc($slct_state_dealers);
$totalRows_slct_state_dealers = mysqli_num_rows($slct_state_dealers);












function showBudgetedCars($Cars){


//if(!$Cars) exit;

global $database_idsconnection;
global $idsconnection;
global $budget;

			$Cars = mysql_real_escape_string(trim($Cars));

			$vArrays = preg_split("/\|/", "$Cars");
			//print_r($vphotoArrays);
			
					$vCount = count($vArrays);
					
					$v1 = $vArrays['0'];
					
					$v=NULL;
					
					if($vCount > 1):
					
						for($i=0;$i<count($vArrays); $i++) 
						{
								// For Loop Begins
								if($i == 0){
								$v .= "'".$vArrays["$i"]."'";
								}else{
								$v .= ",'".$vArrays["$i"]."'";
								}
						}

					else:
												$v .= "'".$vArrays["0"]."'";
												
					endif;
					
					$Cars = $v;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_group_vehicles = "SELECT * FROM vehicles WHERE `vehicles`.`vid` IN ($Cars) LIMIT 6";
$group_vehicles = mysqli_query($idsconnection_mysqli, $query_group_vehicles);
$row_group_vehicles = mysqli_fetch_assoc($group_vehicles);
$totalRows_group_vehicles = mysqli_num_rows($group_vehicles);

echo "<div class='row'>";

do {
	
$vtoken = $row_group_vehicles['vtoken'];
$vyear = $row_group_vehicles['vyear'];
$vmake = $row_group_vehicles['vmake'];
$vmodel = $row_group_vehicles['vmodel'];
$vtrim = $row_group_vehicles['vtrim'];

$vrprice = $row_group_vehicles['vrprice'];
$vspecialprice = $row_group_vehicles['vspecialprice'];

$vdprice = $row_group_vehicles['vdprice'];
if($vdprice < 1 || !$vdprice ){
$vprice = $vrprice * 0.10;
}

$vdprice = '$ '.$vdprice;

$vtext = $vyear.' '.$vmake.' '.$vmodel.' '.$vtrim;

$vdid  = $row_group_vehicles['did'];
$vvid = $row_group_vehicles['vid'];
$vpfile = $row_group_vehicles['vthubmnail_file'];

if(!$vpfile){
$open_url = "img/WeFinacehere-Orange-Logo-640x480.png";
}else{
$open_url = "https://images.autocitymag.com/$vdid/$vvid/$vpfile";
}


echo " 
						
							<div class='col-lg-4 col-md-4 col-sm-4 members-holder'>
						
                               
                                
								<div class='members-detail'>
									<a id='$vvid' class='seevehicle'><img src='$open_url' alt='' class='img-responsive' title='$vtext'></a>
									<h4>$vtext</h4>
									<p class='line'>Retail Price: $vrprice</p>
									<p class='line'>Internet Price: $vspecialprice</p>
									<p class='line'>Down Payment: $vdprice</p>
									<p class='line'>Budget: $budget</p>
									<ul class='members-social'>
										<li><a href='#'><i class='fa fa-envelope fa-fw'></i></a></li>
										<li><a href='#'><i class='fa fa-twitter fa-fw'></i></a></li>
										<li><a href='#'><i class='fa fa-facebook fa-fw'></i></a></li>
										<li><a href='#'><i class='fa fa-linkedin fa-fw'></i></a></li>
									</ul>
								</div>

							</div>

";


} while ($row_group_vehicles = mysqli_fetch_assoc($group_vehicles));
echo '</div>';


mysqli_free_result($group_vehicles);


return $Cars;
return;
}
//End Function For Vehicle Blocks
















?>
<!-- Start Intro -->
<script>
$('a.seevehicle').on('click', function(){
		
		
		//var that = $(this).html();
		//alert(that);
		var v = $(this).attr('id');

		//var v = v;
		console.log('v: '+v);
		
		$.post('script_pull_vehicle.php', {v:v}, function(data){
			
			console.log(data);
			$('section#vehicle_results').html(data);
		});




});
</script>

<?php //echo $totalRows_slct_state_dealers; ?>
					
                  <?php do { ?>
                  <?php
				  


					$company = 	$row_slct_state_dealers['company'];

				  	$dealer_description = $company;
				  
				  ?>




	<section id="snippets" class="section">
		<div class="container">	

		
			<div class="row">
				<div class="col-lg-12">
					<div>
						<h1><?php echo $company; ?> <strong> <a>Url: <?php echo $row_slct_state_dealers['website']; ?></a></strong></h1>
						<p>Location: <?php echo $row_slct_state_dealers['city']; ?>, <?php echo $row_slct_state_dealers['state']; ?> | Phone Number: <?php echo $row_slct_state_dealers['phone']; ?>| Zip Code: <?php echo $row_slct_state_dealers['zip']; ?></p>
					</div>
				</div>
		  	</div>





			<!-- Start Tabs -->
			<div class="row">
            
            
            
				<ul class="nav nav-tabs">
				<li class="active col-lg-3 col-md-3 col-sm-3"><a href="#<?php echo $row_slct_state_dealers['did']; ?>first-tab" data-toggle="tab"><i class="fa fa-building fa-3x"></i>Dealership View</a></li><!--Tab #1 -->
			    <li class="col-lg-3 col-md-3 col-sm-3"><a href="#<?php echo $row_slct_state_dealers['did']; ?>second-tab" data-toggle="tab"><i class="fa fa-car fa-3x"></i>Featured Inventory</a></li><!--Tab #2 -->
				<li class="col-lg-3 col-md-3 col-sm-3"><a href="#<?php echo $row_slct_state_dealers['did']; ?>third-tab" data-toggle="tab"><i class="fa fa-bank fa-3x"></i> Allocate Funds</a></li><!--Tab #3 -->
				</ul>			
				
                
                
                <div class="tab-content">
					<!-- Introductory Video -->
					<div class="tab-pane active" id="<?php echo $row_slct_state_dealers['did']; ?>first-tab">

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<img src="img/WeFinacehere-Orange-Logo-640x480.png" class="img-responsive" alt="" title="" />
							</div>	
							<div class="col-lg-6 col-md-6 col-sm-6">
						    <h2>Vehicles You Can Finance Now</h2>
								<p class="line">Total Count: <?php echo $row_slct_state_dealers['VehiclesTotalCount']; ?></p>
								<p class="line">Vehicles You  Budget For: <?php echo $row_slct_state_dealers['VehiclesFoundCount']; ?></p>
								<p class="line">View Dealer Snap Shot: <a id="" class="" href="#<?php //echo $row_slct_state_dealers['VehiclesTesaser']; ?>" data-target="modal">View</a></p>
								<ul class="normal-list">
									<li>Address: <?php echo $row_slct_state_dealers['address']; ?></li>
									<li>City, State: <?php echo $row_slct_state_dealers['city']; ?> <?php echo $row_slct_state_dealers['state']; ?></li>
									<li>Zip: <?php echo $row_slct_state_dealers['zip']; ?></li>
									<li>Phone: <?php echo $row_slct_state_dealers['phone']; ?></li>
								</ul>
								<p><?php //echo $row_slct_state_dealers['VehiclesTesaser']; ?></p>
							</div>	
						</div>                    

					</div>
					<!-- End Introductory Video -->
					<!-- Random Text -->
					<div class="tab-pane" id="<?php echo $row_slct_state_dealers['did']; ?>second-tab">
						
						<?php  //showBudgetedCars($row_slct_state_dealers['VehiclesTesaser']); ?>
                        <?php  showBudgetedCars($row_slct_state_dealers['VehiclesListings']); ?>
                        
					</div>
					<!-- End Random Text -->
					<!-- Members Listing -->
					<div class='tab-pane' id='<?php echo $row_slct_state_dealers['did']; ?>third-tab'>
                    
						<div class='row'>
							<div class='video-container'>
							
                            	
                                <button type="button" class="btn btn-primary">Send Us Your Approval</button>
							
                            
                            
                            </div>
						</div>                    
					</div>
					<!-- End Members Listing -->
				</div>	
			
            
            
            </div>
			<!-- End Tabs -->










		</div>
	</section>
	<!-- End Snippets -->

                    
					
					
					
					
					<?php } while ($row_slct_state_dealers = mysqli_fetch_assoc($slct_state_dealers)); ?>
<!-- End Intro -->




<?php
mysqli_free_result($slct_state_dealers);
?>
