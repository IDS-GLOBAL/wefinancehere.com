<?php require_once("db.php"); ?>
<?php
$colname_store_vehicles = "-1";
if (isset($_GET['token'])) {
  $colname_store_vehicles = $_GET['token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_store_vehicles = "SELECT * FROM idsids_idsdms.dealers, idsids_idsdms.vehicles WHERE  dealers.id = vehicles.did AND vehicles.vlivestatus = '1' AND dealers.token = '$colname_store_vehicles' ORDER BY vehicles.vyear DESC, vehicles.vmake ASC, vehicles.vmodel ASC, vehicles.vrprice DESC";
$store_vehicles = mysqli_query($idsconnection_mysqli, $query_store_vehicles);
$row_store_vehicles = mysqli_fetch_array($store_vehicles);
$totalRows_store_vehicles = mysqli_num_rows($store_vehicles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_open_states = "SELECT  DISTINCT
 `dealers`.`state`,
 `states`.`state_abrv`, 
 `states`.`state_name`
 FROM 
 `idsids_idsdms`.`dealers`
	LEFT JOIN `idsids_idsdms`.`vehicles`
		ON `dealers`.`id` = `vehicles`.`did`
	LEFT JOIN `idsids_idsdms`.`states`
	ON `dealers`.`state` = `states`.`state_abrv`
	 
 WHERE 
 `vehicles`.`vlivestatus` = '1' 
 	AND `dealers`.`status` = '1' 
	AND `dealers`.`status` = '1' 
	AND `vehicles`.`vrprice` IS NOT NULL
	ORDER BY `states`.`state_abrv` ASC ";
$open_states = mysqli_query($idsconnection_mysqli, $query_open_states);
$row_open_states = mysqli_fetch_array($open_states);
$totalRows_open_states = mysqli_num_rows($open_states);


$query_open_states = "SELECT  DISTINCT

 `states`.`state_abrv`, 
 `states`.`state_name`
 FROM 
 `idsids_idsdms`.`dealers`
	LEFT JOIN `idsids_idsdms`.`vehicles`
		ON `dealers`.`id` = `vehicles`.`did`
	LEFT JOIN `idsids_idsdms`.`states`
	ON `dealers`.`state` = `states`.`state_abrv`
	 
 WHERE 
 `vehicles`.`vlivestatus` = '1' 
 	AND `dealers`.`status` = '1' 
	AND `dealers`.`status` = '1' 
	AND `vehicles`.`vrprice` IS NOT NULL
	GROUP BY 
		`state_abrv`
	ORDER BY `states`.`state_abrv` ASC ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WeFinanceHere.com | States</title>
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
    <link rel="stylesheet" href="css/animate.css">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK_a0-ONX1BHPXNc9LZxyFmYE370ujrRY&language=eng"></script>

</head>

<body>
<?php include_once("analyticstracking.php") ?>

<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.php"); ?>
		<?php //include("inc/wfh.nav_bar.vehicles.php"); ?>        
    <!-- /.navbar -->


<?php if(!$wfhuser_approval_id){ ?>
<div class="wrapper-md row">
    <div class="container">
        <div class="col-sm-12" align="center">
            <h4>You Are Shopping For Vehicles Without A Pre-Approval.</h4>
            <h6>Please Set One First</h6>
    		<a href="start.php" class="btn btn-default btn-toolbar">Get Pre-Approved</a>
        </div>
    </div>
</div>
<?php } ?>



	<section class="wrapper-md bg-highlight">
		<div id="vdlisting_results" class="container" style="padding:10em 0; display:none;">
		</div><!-- /.container -->
	</section>


	<section class="wrapper-md bg-highlight">
		<div class="container" style="padding:10em 0;">
			<div class="row">


  <?php do { ?>
   
       


<?php

$open_url = 'img/WeFinacehere-Orange-Logo-640x480.png';


?>
            
				<div class="col-sm-6 col-md-3">

					<div class="thumbnail">
    <a href="vehicles.php?state=<?php echo $row_open_states['state']; ?>">                
						<div class="overlay-container">
<img src="<?php echo $open_url; ?>" width="261px" height="195px">
							<div class="overlay-content">
								<h3 class="h4 headline"><?php //echo $row_open_states['total_records'].' in '; ?><?php echo $row_open_states['state']; ?></h3>
								<p></p>
							</div>
						</div></a>
						<div class="thumbnail-meta vehicle_descip_box_layout">
							<p><i class="fa fa-fw fa fa-flag"></i> <?php echo $row_open_states['state_abrv']; ?> | <?php echo $row_open_states['state_name']; ?></p>
						</div>
						<div class="thumbnail-meta">
							<i class="fa fa-fw fa-car"></i> <?php //echo $row_open_states['total_records']; ?> Vehicles <a href="vehicles.php?state=<?php echo $row_open_states['state']; ?>" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i>
                            </a>
						</div>
					</div><!-- /.thumbnail -->
				</div><!-- /.col -->
<?php } while ($row_open_states = mysqli_fetch_assoc($open_states)); ?><br>


		  </div><!-- /.row -->
          <div class="row">
          	<div id="advertisement_display">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Select States Mobile -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4997617966323914"
     data-ad-slot="1293502329"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


            </div>
          </div>
        </div>
    </section>


	<section class="wrapper-md">
		<div class="container">

<div class="row scrollimation fade-up d1 in">

            
            
                        <div id="map-canvas"></div>
    



            

  

<script type="text/javascript">

var map;
var Markers = {};
var infowindow;
var locations = [];



        // Create a <script> tag and set the USGS URL as the source.
        var script = document.createElement('script');

        // This example uses a local copy of the GeoJSON stored at
        // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
        script.src = 'jSon/map_locations.php';
        document.getElementsByTagName('head')[0].appendChild(script);






/*
google.maps.event.addDomListener(outer, 'click', function() {
  map.setCenter(chicago)
});

*/

var origin = new google.maps.LatLng(37.09024, -100.712891);
//var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);




function initialize() {
  var mapOptions = {
    zoom: 5,
    center: origin,
	gestureHandling: 'cooperative',
	mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.TOP_CENTER
    },
	zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.LEFT_CENTER
          },
          scaleControl: true,
          streetViewControl: true,
          streetViewControlOptions: {
              position: google.maps.ControlPosition.LEFT_TOP
          },
    fullscreenControl: true,
	styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
  };

  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


	// Set the map's style to the initial value of the selector.
	
	


	var image = 'img/icons/auto-orange-icon.png';

	infowindow = new google.maps.InfoWindow();

    for(i=0; i<locations.length; i++) {
    	var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
		var marker = new google.maps.Marker({
			position: position,
			map: map,
			icon: locations[i][4],
		});


		marker.addListener('click', function() {
			map.setZoom(14);
			map.setCenter(marker.getPosition());
		  });


		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(locations[i][1]);
				infowindow.setOptions({maxWidth: 300});
				infowindow.open(map, marker);
			}
		}) (marker, i));
		Markers[locations[i][4]] = marker;
	}

	locate(0);

}

function locate(marker_id) {
	var myMarker = Markers[marker_id];
	var markerPosition = myMarker.getPosition();
	map.setCenter(markerPosition);
	google.maps.event.trigger(myMarker, 'click');
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
            
            
            
            
            </div>


		</div>
	</section>






	<section class="wrapper-md">
		<div class="container">
			<h2 class="text-center">Brought To You By WefinanceHere.com Your Automotive Finance Marketplace</h2>
			<p class="text-center lead">Very easy to finance a vehicle today.  You came to the right place.</p>
			<br class="spacer-lg">
			<div class="row">
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-primary">
						<h2><i class="fa fa-car"></i> Vehicles</h2>
						<p class="lead">We have already help market and sell more than 150,000 vehicles and we are still going at very good pace. </p>
					</div>
                    <div class="col-sm-12">
                    	<a class="btn btn-default btn-lg btn-block">Vehicles</a>
                    </div>
				</div><!-- /.col -->
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-info">
						<h2><i class="fa fa-share-alt"></i> Advertise</h2>
						<p class="lead">Interested in advertising with wefinancehere.com please feel free to go to our contact us page and contact us from here.</p>
					</div>
                    <div class="col-sm-12">
                    	<a class="btn btn-default btn-lg btn-block">Advertise</a>
                    </div>
			  </div><!-- /.col -->
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-primary">
						<h2><i class="fa fa-users"></i> Advisors</h2>
						<p class="lead">We have qualified consultants here on staff that can help you spend your approval funds in your local area.</p>
					</div>
                    <div class="col-sm-12">
                    	<a class="btn btn-default btn-lg btn-block">Seek An Advisor</a>
                    </div>
			  </div><!-- /.col -->
		  </div><!-- /.row -->
		</div><!-- /.container -->
	</section>

	<?php include("_footer.php"); ?>

	<!-- last but not least the javascript -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/custom/api_thebooklogin.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
    <script src="js/custom/approval.widget.js"></script>
    <script src="js/custom/custom.start.js"></script>
    <script src="js/custom/custom.api.js"></script>
	<script src="js/plugin/jasny-bootstrap/js/jasny-bootstrap.js"></script>
    <!-- Sweet alert -->
    <script src="js/plugin/sweetalert/sweetalert.min.js"></script>	<script src="assets/js/holder.js"></script>
</body>
</html>
<?php
mysqli_free_result($states);

mysqli_free_result($markets);
?>
