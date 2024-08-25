<?php require_once("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WeFinanceHere.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/theme.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="css/plugin/jasny-bootstrap/css/jasny-bootstrap.css">
    <!-- Sweet Alert -->
    <link href="css/plugin/sweetalert/sweetalert.css" rel="stylesheet">    

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({
google_ad_client: "ca-pub-123456789",
enable_page_level_ads: true
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK_a0-ONX1BHPXNc9LZxyFmYE370ujrRY&language=eng"></script>
</head>

<body>
<?php include("analyticstracking.php"); ?>
<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.vehicles.php"); ?>
    <!-- /.navbar -->

	<section class="wrapper-md" id="vehicle_section">
	<div id="vehicle_controls"></div>

		<div class="container">
		
				<div class="col-sm-12 col-md-9">

<?php if(isset($_SERVER['HTTP_REFERER'])): ?>
            		<!--p><a href="<?php //echo $_SERVER['HTTP_REFERER']; ?>" class=" btn btn-primary btn-lg"> &lt;&lt; Go Back  </a></p -->
<?php endif; ?>           
            </div>
            
        	<div class="row">
				<!-- Main -->
				<div class="col-sm-12 col-md-8">




					<article class="post">
						<h2><i class="fa fa-car"></i> <?php echo $row_find_vehicle ['vcondition']; ?> <?php echo $row_find_vehicle ['vyear']; ?> <?php echo $row_find_vehicle ['vmake']; ?> <?php echo $row_find_vehicle ['vmodel']; ?> <?php echo $row_find_vehicle ['vtrim']; ?> </h2>

						<hr>




<?php if( $totalRows_find_vehicle_photos != 0): ?>


						<!-- Live Photo Carousel -->
						<div id="my-carousel" class="carousel slide">
							<!-- indicators -->
							<ol class="carousel-indicators">
<?php $counter_gridrow = 0; ?>

<?php $counter_gridroww = 0; ?>
                            
							<?php do { ?>
                            <?php $counter_gridrow++; ?>                        

							<?php if($counter_gridrow == 1){ $active = 'active'; }else{ $active = ""; } ?>
								<li data-target="#my-carousel" data-slide-to="<?php echo $counter_gridrow; ?>" class="<?php echo $active; ?>"></li>
							<?php } while ($row_vehicle_photos = mysqli_fetch_array($find_vehicle_photos));
							
		 									  	$rows = mysqli_num_rows($find_vehicle_photos);
												  if($rows > 0) {
													  mysqli_data_seek($find_vehicle_photos, 0);
													  $row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos);
												  }

							?>
  							</ol>
							<!-- carousel -->
							<div class="carousel-inner">
                            <?php do {
								
								$vdid = $row_find_vehicle_photos['dealer_id'];
								$vvid = $row_find_vehicle_photos['vehicle_id'];
								
								$photo_thumb_fpath = $row_find_vehicle_photos['photo_file_name'];
								$vopen_url = 'https://images.autocitymag.com/'."$vdid/"."$vvid/".$photo_thumb_fpath
							?>
                            <?php $counter_gridroww++; ?>                        

							<?php if($counter_gridroww == 1){ $active = 'active'; }else{ $active = ""; } ?>
								<div class="item <?php echo $active; ?>">
									<img class="img-responsive" src="<?php echo $vopen_url; ?>" alt="" >
								</div><!-- /.item -->
							<?php } while ($row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos)); ?>

                                
                                
                                
							</div><!-- /.carousel-inner -->
							<!-- Controls -->
							<a class="left carousel-control" href="#my-carousel" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
							</a>
							<a class="right carousel-control" href="#my-carousel" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
							</a>
						</div>
                        <!-- /.carousel -->


<?php else: ?>


						<!-- Installed Photo Carousel -->
						<div id="my-carousel" class="carousel slide">
							<!-- indicators -->
							<ol class="carousel-indicators">
								<li data-target="#my-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#my-carousel" data-slide-to="1"></li>
							</ol>
							<!-- carousel -->
							<div class="carousel-inner">
								<div class="item active">
									<img class="img-responsive" src="img/WeFinacehere-Orange-Logo-640x480.png" alt="1200x500" >
								</div><!-- /.item -->
								<div class="item">
									<img class="img-responsive" src="img/WeFinacehere-Orange-Logo-640x480.png" alt="1200x500" >
								</div><!-- /.item -->
							</div><!-- /.carousel-inner -->
							<!-- Controls -->
							<a class="left carousel-control" href="#my-carousel" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
							</a>
							<a class="right carousel-control" href="#my-carousel" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
							</a>
						</div>
                        <!-- /.carousel -->



<?php endif; ?>



<div style="display:none;">
	<div class="row">
        <div id="appointment_vbook" class="col-sm-6 btn btn-default btn-block" style="cursor:pointer;" align="center">
            <h2>Send Your Approval Ahead And Sign And Drive!</h2>
        </div>
    </div>
</div>



						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab-v" data-toggle="tab">Vehicle Information</a></li>
							<li><a href="#tab-f" data-toggle="tab">Schedule A Test Drive</a></li>
							<li><a href="#tab-b" data-toggle="tab">Budget For This Vehicle</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tab-v">
                            
							
                            
                            

						<div class="row">
							<div class="col-sm-12 col-md-5">
								<div class="widget padding-md bg-secondary">
									<h3 class="headline">Information:</h3>
									<ul class="list-unstyled">

										<li>
                                        	<i class="fa fa-fw fa-ticket"></i> 
                                            <strong>Stock No: </strong> 
											<?php echo $row_find_vehicle ['vstockno']; ?>
                                        </li>
										
                                        
                                        <li>
                                            <i class="fa fa-fw fa-barcode"></i> 
                                            <strong>VIN: </strong> 
                                            <?php echo $row_find_vehicle ['vvin']; ?>
                                        </li>

<?php if($row_find_vehicle ['vcondition']){ ?>
										<li>
                                            <i class="fa fa-fw fa-th"></i> 
                                            <strong>Condition: </strong> 
                                            <?php echo $row_find_vehicle ['vcondition']; ?>
                                        </li>
<?php } ?>
     
<?php if($row_find_vehicle ['vmileage']){ ?>
										<li>
                                        	<i class="fa fa-fw fa-columns"></i> 
                                            <strong>Mileage: </strong>
											<?php echo formatMoney($row_find_vehicle ['vmileage']); ?>
                                            </li>
<?php } ?>



<?php if($row_find_vehicle ['vtransm']){ ?>

										<li>
                                        <i class="fa fa-fw fa-gears"></i> 
                                        <strong>Transmission: </strong>
										<?php echo $row_find_vehicle ['vtransm']; ?>
                                        </li>
<?php } ?>




<?php if($row_find_vehicle ['vbody']){ ?>
										<li>
                                        	<i class="fa fa-fw fa-dashboard"></i> 
                                            <strong>Body Style: </strong>
											<?php echo $row_find_vehicle ['vbody']; ?>
                                        </li>
<?php } ?>

<?php if($row_find_vehicle ['vdoors']){ ?>
										<li>
                                        	<i class="fa fa-fw fa-bars"></i> 
                                            <strong>Doors: </strong>
											<?php echo $row_find_vehicle ['vdoors']; ?>
                                        </li>
<?php } ?>


<?php if($row_find_vehicle ['vfueltype']){ ?>

										<li>
                                        	<i class="fa fa-fw fa-leaf"></i> 
                                            <strong>Fuel Type: </strong>
											<?php echo $row_find_vehicle ['vfueltype']; ?>
                                        </li>
<?php } ?>


<?php if($row_find_vehicle ['vehicle_mpg_city']){ ?>

										<li>
                                        	<i class="fa fa-fw fa-road"></i> 
                                            <strong>MPG City: </strong>
											<?php echo $row_find_vehicle ['vehicle_mpg_city']; ?>
                                        </li>
<?php } ?>


<?php if($row_find_vehicle ['vehicle_mpg_hwy']){ ?>
                                        <li>
                                        	<i class="fa fa-fw fa-road"></i> 
                                            <strong>MPG Hwy: </strong>
											<?php echo $row_find_vehicle ['vehicle_mpg_hwy']; ?>
                                            </li>
<?php } ?>
<?php if($row_find_vehicle ['vehicle_mpg_combined']){ ?>
										<li>
                                        	<i class="fa fa-fw fa-road"></i> 
                                            <strong>MPG Combined: </strong>
											<?php echo $row_find_vehicle ['vehicle_mpg_combined']; ?>
                                        </li>
<?php } ?>

<?php if($row_find_vehicle ['vengine']){ ?>
										<li>
                                        	<i class="fa fa-fw fa-gear"></i> 
                                            <strong>Engine: </strong>
											<?php echo $row_find_vehicle ['vengine']; ?>
                                        </li>
<?php } ?>

<?php if($row_find_vehicle ['vcylinders']){ ?>
										<li>
                                        	<i class="fa fa-fw fa-plus-circle"></i> 
                                            <strong>Cylinders: </strong>
											<?php echo $row_find_vehicle ['vcylinders']; ?>
                                        </li>
<?php } ?>





                                        
										<li><i class="fa fa-fw fa-money"></i> <strong>Retail Price: </strong> <?php if($row_find_vehicle ['vrprice']){ echo '$ '.formatMoney($row_find_vehicle ['vrprice']); } ?></li>
										
                                        
                                        <li><i class="fa fa-fw fa-money"></i> <strong>Internet Price: </strong> <?php if($row_find_vehicle ['vspecialprice']){ echo '$ '.formatMoney($row_find_vehicle ['vspecialprice']); } ?></li>
										
                                        
                                        <li><i class="fa fa-fw fa-credit-card"></i> <strong>Down Payment: </strong> <?php if($row_find_vehicle ['vdprice']){ echo '$ '.formatMoney($row_find_vehicle ['vdprice']); }else{ echo 'Unlisted';} ?></li>
										
                                        
                                        <li>
                                        	<i class="fa fa-fw fa-fire"></i> 
                                            <strong>Lot Status: </strong> 
											<?php if($row_find_vehicle ['vlivestatus'] == 1){
											echo 'LIVE';
											}elseif($row_find_vehicle ['vlivestatus'] == 0){
												echo 'ON-HOLD';
											}elseif($row_find_vehicle ['vlivestatus'] == 9){
												echo 'SOLD';
											}
											?>
                                        </li>
                                        
										
                                        <li><i class="fa fa-fw fa-calendar"></i> <strong>Last Updated: </strong> <?php echo $row_find_vehicle ['modified_at']; ?></li>
                                        
										
                                        <li><i class="fa fa-fw fa-calendar"></i> <strong>Online Since: </strong> <?php echo $row_find_vehicle ['created_at']; ?></li>
                                        


									</ul>
								</div><!-- /.widget -->
							</div><!-- /.col -->
							<div class="col-sm-12 col-md-7">
								
                                
                                
                                
                                <?php if($row_find_vehicle ['vcomments']){ ?>
                                
                                
                                <div class="panel panel-secondary">
									<div class="panel-heading">
										<h3 class="panel-title">Dealer Comments:</h3>
									</div>
									<div class="panel-body">
										<?php echo $row_find_vehicle ['vcomments']; ?>
									</div><!-- /.panel-body -->
								</div><!-- /.panel -->
                                
                                
                                <?php } ?>
								
                                
                                
                                
                                <div class="panel panel-secondary">
									<div class="panel-heading">
										<h3 class="panel-title">User Tools:</h3>
									</div>
									<div class="panel-body">
                                
								<p>
									<a href="#link" class="btn btn-primary"><i class="fa fa-envelope"></i> Email to a friend</a>
									<a href="#link" class="btn btn-facebook"><i class="fa fa-facebook"></i> Share</a>
									<a href="#link" class="btn btn-twitter"><i class="fa fa-twitter"></i> Share</a>
								</p>
								<p>
									<a href="#link" class="btn btn-default"><i class="fa fa-bookmark"></i> Bookmark</a>
									<a href="#link" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
									<a href="#link" class="btn btn-default"><i class="fa fa-bell"></i> Get notified</a>
								</p>

									</div><!-- /.panel-body -->
								</div><!-- /.panel -->












							</div><!-- /.col -->
						</div><!-- /.row -->
<?php if($row_find_vehicle['dlr_geo_latitude']){ ?>

						<div class="panel panel-secondary">
							<div class="panel-heading">
								<h3 class="panel-title">Map location</h3>
                                <span>Coordinates: <?php echo $dlr_geo_latitude; ?>, <?php echo $dlr_geo_longitude; ?></span>
							</div><!-- /.panel-heading -->
							<div class="panel-body padding-md">
								<div class="embed-wrapper">
									
								<div class="google-map" id="map1"></div>








                                    
								</div>
							</div><!-- /.panel-body -->
						</div><!-- /.panel -->


						<div class="panel panel-secondary">
							<div class="panel-heading">
								<h3 class="panel-title">Satellite View</h3>
							</div><!-- /.panel-heading -->
							<div class="panel-body padding-md">
								<div class="embed-wrapper">
									
								<div class="google-map" id="map3"></div>








                                    
								</div>
							</div><!-- /.panel-body -->
						</div><!-- /.panel -->


<script type="text/javascript" language="javascript" class="init">

        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Options for Google map
            // More info see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions1 = {
                zoom: 11,
                center: new google.maps.LatLng(<?php echo $dlr_geo_latitude; ?>, <?php echo $dlr_geo_longitude; ?>),
                // Style for Google Maps
                styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
            };

            var mapOptions3 = {
                center: new google.maps.LatLng(<?php echo $dlr_geo_latitude; ?>, <?php echo $dlr_geo_longitude; ?>),
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.SATELLITE,
                // Style for Google Maps
                styles: [{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#fffffa"}]},{"featureType":"water","stylers":[{"lightness":50}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"lightness":40}]}]
            };


            // Get all html elements for map
            var mapElement1 = document.getElementById('map1');
            var mapElement3 = document.getElementById('map3');

            // Create the Google Map using elements
            var map1 = new google.maps.Map(mapElement1, mapOptions1);
            var map3 = new google.maps.Map(mapElement3, mapOptions3);
			
			
			var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
			
        var beachMarker = new google.maps.Marker({
          position: {lat: <?php echo $dlr_geo_latitude; ?>, lng: <?php echo $dlr_geo_longitude; ?>},
          map: map1
        });
		
        var beachMarker = new google.maps.Marker({
          position: {lat: <?php echo $dlr_geo_latitude; ?>, lng: <?php echo $dlr_geo_longitude; ?>},
          map: map3
          
        });
		
		
        }


</script>
<?php } ?>                            
                            
                            
                            
                            </div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="tab-f">
							
<?php
// http://www.w3schools.com/php/func_date_date_format.asp

?>
                            
                            <div class="row">
                            
                            	<div class="col-sm-12">
					<p>We have everything set all you have to do is notify this dealer location on the beset time you can have do A Test Drive Appointment Then Sign And Drive Same Day.  Be Sure To Include Best day time number to reach you, and the best time to call.</p>
                    
                                	<div class="form-group col-sm-6">
                                    	<label class="control-label">Which Day Best For You?</label>
                                       <select class="form-control" id="appointment_day">
<?php if(date('D', strtotime($time_now.'+1 day')) != 'Sun'){ ?>                                       
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+1 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+1 day')); ?></option>
<?php } ?>

<?php if(date('D', strtotime($time_now.'+2 day')) != 'Sun'){ ?>                                       
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+2 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+2 day')); ?></option>
<?php } ?>

<?php if(date('D', strtotime($time_now.'+3 day')) != 'Sun'){ ?>                                            
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+3 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+3 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+4 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+4 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+4 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+5 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+5 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+5 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+6 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+6 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+6 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+7 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+7 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+7 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+8 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+8 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+8 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+9 day')) != 'Sun'){ ?>

                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+9 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+9 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+10 day')) != 'Sun'){ ?>                                            
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+10 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+10 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+11 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+11 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+11 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+12 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+12 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+12 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+13 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+13 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+13 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+14 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+14 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+14 day')); ?></option>
<?php } ?>
                                        	<option value="99999">Open Request</option>

                                        </select>

                                    </div>

                                	<div class="form-group col-sm-6">
                                    <label class="control-label">Best Hour Of Arrival?</label>
                                    	<select class="form-control" id="appointment_hours">
                                        	<option value="08:00:00">08:00 am | 8 O'Clock Morning</option>
                                        	<option value="09:00:00">09:00 am | 9 O'Clock Morning</option>
                                        	<option value="10:00:00" selected="selected">10:00 am | 10 O'Clock Morning</option>
                                        	<option value="11:00:00">11:00 am | 11 O'Clock Morning</option>
                                        	<option value="12:00:00">12:00 pm | 12 O'Clock Afternoon</option>
                                        	<option value="13:00:00">01:00 pm | 1 O'Clock Afternoon</option>
                                        	<option value="14:00:00">02:00 pm | 2 O'Clock Afternoon</option>
                                        	<option value="15:00:00">03:00 pm | 3 O'Clock Afternoon</option>
                                        	<option value="16:00:00">04:00 pm | 4 O'Clock Evening</option>
                                        	<option value="17:00:00">05:00 pm | 5 O'Clock Evening</option>
                                        	<option value="18:00:00">06:00 pm | 6 O'Clock Evening</option>
                                        	<option value="00:00:00">After Hours</option>

                                        </select>
                                    </div>

                                	<div class="form-group">
                                    	<input id="unixtime_stapappoint_start" value="<?php echo date('Y-m-d'.' 10:00:00', strtotime($time_now.'+2 day'));  ?>" type="hidden" placeholder="Enter Appoint Start Time">
                                        
                                        <input id="appt_changed_q" type="hidden" value="N">
                                    </div>
                                    
                                    <div class="form-group">
                                    	<button id="book_deal" class="btn btn-primary btn-block" type="button">Book Now</button>
                                    </div> 
                                    <br>
                                    <br>
                                    <br>

                                    <div class="clearfix"></div>
                                </div>
                            
                            </div>
                            
                            
                            
                            
                            
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane fade" id="tab-b">
                            	<?php include("inc/body.budget.form.php"); ?>
                            </div>
						</div><!-- /.tab-content -->









					</article><!-- /.post -->





						<div class="panel panel-secondary">
							<div class="panel-heading">
								<h3 class="panel-title">Contact Dealer</h3>
							</div>
							<div class="panel-body padding-md">
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<h3>Dealer Information</h3>
										<div class="media">

<?php
$vthubmnail_file_path =
$vthubmnail_file_path = $row_find_vehicle['vthubmnail_file'];
$vthumdid = $row_find_vehicle['id'];
$vthumvid = $row_find_vehicle['vid'];


$open_url = 'https://images.autocitymag.com'."/$vthumdid/$vthumvid/".$vthubmnail_file_path;

?>
                                            
                                            <a class="pull-left" href="#"><img class="media-object" src="<?php echo $open_url; ?>" width="64" height="64" alt="64x64"></a>
                                                                                        
                                            
                                            
											<div class="media-body">




<?php if($row_find_vehicle ['craigslist_nickname']) { ?>                                            
			
            <h4 class="media-heading"><?php echo $row_find_vehicle ['craigslist_nickname']; ?></h4>

<?php }else{ ?>

            <h4 class="media-heading"><?php echo $row_find_vehicle ['contact']; ?></h4>



<?php } ?>


												<ul class="list-unstyled">
													<li><i class="fa fa-fw fa-building-o"></i> <?php echo $row_find_vehicle ['company']; ?></li>
													<!--li><i class="fa fa-fw fa-phone"></i> <strong>Phone:</strong> <?php //echo $row_find_vehicle ['phone']; ?></li>
													<li><i class="fa fa-fw fa-fax"></i> <strong>Fax:</strong> <?php //echo $row_find_vehicle ['fax']; ?></li -->
													<li><i class="fa fa-fw fa-map-marker"></i> <strong>Address:</strong> <?php echo $row_find_vehicle ['address']; ?>, <?php echo $row_find_vehicle ['address2']; ?></li>


<?php if ($row_find_vehicle ['website']){ ?>

													<!-- li><i class="fa fa-fw fa-globe"></i> <strong>Website:</strong> <a id="dealer_weblink" href="http://<?php //echo $row_find_vehicle ['website']; ?>" target="_blank"><?php //echo $row_find_vehicle ['website']; ?></a></li -->
<?php } ?>
													<li><i class="fa fa-fw fa-globe"></i> <strong>Our Inventory:</strong> <a id="dealer_storelink" href="dstore.php?token=<?php echo $row_find_vehicle['token']; ?>" target="_blank">Click Here</a></li>



												</ul>
											</div><!-- /.media-body -->
										</div><!-- /.media -->
									</div><!-- /.col -->
									<div class="col-sm-12 col-md-6">
										<h3>Contact Seller</h3>
										<form role="form">
											<div class="form-group">
												<label for="exmaple-contact-email">Email address</label>
												<input type="email" class="form-control" id="exmaple-contact-email" placeholder="Enter email">
											</div>
                                            
                                            
											<div class="form-group">
												<label for="example-contact-name">Name</label>
												<input type="text" class="form-control" id="example-contact-name" placeholder="Your name">
											</div>

                                            
											<div class="form-group">
												<label for="example-contact-name">Mobile Number</label>
												<input type="text" class="form-control" id="example-contact-mobilno" data-mask="(999) 999-9999" placeholder="Mobile Number">
											</div>
											<div class="form-group">
												<label for="example-contact-message">Message</label>
												<textarea id="example-contact-message" class="form-control" rows="5"></textarea>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox"> Send me a copy
												</label>
											</div>
											<button id="contact_seller_btn" type="button" role="button" class="btn btn-primary btn-block">Send Message</button>
										</form>
									</div><!-- /.col -->
								</div><!-- /.row -->
							</div><!-- /.panel-body -->
						</div>
                        <!-- /.panel -->





                </div><!-- /.col -->
				<!-- End of main -->


















				<!-- Sidebar -->
                <?php include("_inc.vehicle.sidebar.php"); ?>
				<!-- End Sidebar -->
            
            </div>
            <!-- /.row -->
		
        
        
        </div><!-- /.container -->
	</section>

	<?php include("_footer.php"); ?>

	<!-- last but not least the javascript -->
	<script src="js/jquery-2.1.1.js"></script>
   	<script src="js/plugin/wow/wow.js" type="text/javascript"></script>     
	<script src="js/custom/api_thebooklogin.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
    <script src="js/custom/approval.widget.js"></script>
    <script src="js/custom/custom.cbudget.js"></script>
	<script src="assets/js/holder.js"></script>
	<script src="js/plugin/jasny-bootstrap/js/jasny-bootstrap.js"></script>
    <!-- Sweet alert -->
    <script src="js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="js/custom/vehicle.js"></script>

<?php if($row_find_vehicle['dlr_geo_latitude']){ ?>
	


<?php } ?>

</body>
</html>
<?php
mysqli_free_result($LiveVehicles);

mysqli_free_result($find_vehicle);

mysqli_free_result($find_vehicle_photos);

mysqli_free_result($states);

mysqli_free_result($markets);
?>