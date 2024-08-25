<?php require_once("db_connect.php"); ?>
<?php
if(isset($_POST['see_state'])){
	$see_state = mysql_real_escape_string($_POST['homeState']);
}else{ $see_state = 'GA'; }
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_state_vehicles = "SELECT * FROM vehicles, dealers WHERE vehicles.did AND dealers.id AND dealers.`state` = '$see_state'";
$slct_state_vehicles = mysqli_query($idsconnection_mysqli, $query_slct_state_vehicles);
$row_slct_state_vehicles = mysqli_fetch_assoc($slct_state_vehicles);
$totalRows_slct_state_vehicles = mysqli_num_rows($slct_state_vehicles);



?>
<!-- Start Intro -->
<section id="intro" class="section">
		<div class="container">
			<div id="state_inventory" class="row">
				<!-- Main Points -->
				<div class="col-lg-6 col-md-6 col-sm-6">
					
                  <?php do { ?>
                  <?php
				  
				  $vyear = $row_slct_state_vehicles['vyear'];
				  $vmake = $row_slct_state_vehicles['vmake'];
				  $vmodel = $row_slct_state_vehicles['vmodel'];
				  $vtrim = $row_slct_state_vehicles['vtrim'];
				  
				  $vehicle_description = $vyear.' '.$vmake.' '.$vmodel.' '.$vtrim;
				  
				  
				  ?>
                  <div class="main-point">
                      <i class="fa fa-cubes"></i>
                      <h4><?php echo $vehicle_description; ?></h4>
                      <address>
                      	<span></span><br />
                      	<span></span><br />
                      	<span></span><br />
                      </address>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                    <?php } while ($row_slct_state_vehicles = mysqli_fetch_assoc($slct_state_vehicles)); ?>
<div class="main-point">
						<i class="fa fa-male"></i>
		  <h4>Easy way to capture lead email</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				  </div>
                  
					<div class="main-point main-point-last">
						<i class="fa fa-codepen"></i>
						<h4>Easy Adaptable</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					</div>
			  </div>
				<!-- End Main Points -->
				<!-- Side Image -->
				<div class="col-lg-6 col-md-6 col-sm-6">
					<img src="img/devices.jpg" class="img-responsive" alt="" title="" />
				</div>
				<!-- End Side Image -->
			</div>
			
			<hr/>
		</div>
</section>
<!-- End Intro -->




<?php
mysqli_free_result($slct_state_vehicles);
?>
