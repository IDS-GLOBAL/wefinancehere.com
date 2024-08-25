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

$colname_qry_vehicle = "-1";
if (isset($_POST['v'])) {
  $colname_qry_vehicle = $_POST['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qry_vehicle =  "SELECT * FROM vehicles WHERE vid = %s ORDER BY created_at DESC", GetSQLValueString($colname_qry_vehicle, "int"));
$qry_vehicle = mysqli_query($idsconnection_mysqli, $query_qry_vehicle);
$row_qry_vehicle = mysqli_fetch_assoc($qry_vehicle);
$totalRows_qry_vehicle = mysqli_num_rows($qry_vehicle);

$vehicle_id = $row_qry_vehicle['vid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vphotos = "SELECT * FROM vehicle_photos WHERE vehicle_id = '$vehicle_id' ORDER BY photo_file_name ASC";
$vphotos = mysqli_query($idsconnection_mysqli, $query_vphotos);
$row_vphotos = mysqli_fetch_assoc($vphotos);
$totalRows_vphotos = mysqli_num_rows($vphotos);


?>




	<!-- Start Vehicle -->
	
		<div class="container">			
			<div class="row">
				<div class="col-lg-12">
					<div class="headline">
						<h1><?php echo $row_qry_vehicle['vyear']; ?>  <?php echo $row_qry_vehicle['vmake']; ?> <?php echo $row_qry_vehicle['vmodel']; ?> <strong><?php echo $row_qry_vehicle['vtrim']; ?></strong></h1>
						
					</div>
				</div>
		  </div>
			<!-- Start Tabs -->
			<div class="row">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#a<?php echo $row_qry_vehicle['vid']; ?>first-tab" data-toggle="tab"><i class="fa fa-video-camera"></i> Vehicle Info</a></li><!--Tab #1 -->
			    <li><a href="#a<?php echo $row_qry_vehicle['vid']; ?>second-tab" data-toggle="tab"><i class="fa fa-cube"></i> Photos</a></li><!--Tab #2 -->
				  <li><a href="#a<?php echo $row_qry_vehicle['vid']; ?>third-tab" data-toggle="tab"><i class="fa fa-group"></i> Purchase</a></li><!--Tab #3 -->
				</ul>			
				<div class="tab-content">
					<!-- Introductory Video -->
					<div class="tab-pane active" id="a<?php echo $row_qry_vehicle['vid']; ?>first-tab">
					
                    
                    	<div class="row">
							<div class="col-lg-6 col-md-6">
								<img src="img/side-img.png" class="img-responsive" alt="" title="" />
							</div>	
							<div class="col-lg-6 col-md-6">
						    <h2>Introductory Text</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
								<ul class="normal-list">
									<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
									<li>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
									<li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut,</li>
								</ul>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
							</div>	
						</div>                    
					
                    
                    
                    </div>
					<!-- End Introductory Video -->
					<!-- Random Text -->
					<div class="tab-pane" id="a<?php echo $row_qry_vehicle['vid']; ?>second-tab">
						

                        <!-- Portfolio -->
                        <section id="portfolio" class="bg-grey section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="headline">
                                            <h1>Photos</h1>
                                        </div>
                                    </div>
                              </div>
                                <div class="row">

<?php $counter_gridrow=0; ?>
                                
<?php do{ ?>

			<?php
            
            $photo_file_path = $row_vphotos['photo_file_path'];
            
            if(!$photo_file_path){
                $photo_openurl = 'img/thumbs/thumb1.jpg';
            }else{
                $photo_file_path = str_replace('../', '', $photo_file_path);
                $photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
                $photo_openurl = "http://images.autocitymag.com/".$photo_file_path;
            }
            
            
            ?>

<?php $counter_gridrow++; ?>                        

<?php if($counter_gridrow % 4 == 0){ ?>

                                </div>
                                <div class="row">
                
<?php } ?>

                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <!-- Start Portfolio Item -->
                                        <div class="hover-details">
                                            <img class="img-responsive img-thumbnail" src="<?php echo $photo_openurl; ?>" alt="" title="" /><!-- Image Thumbnail  -->
                                            <div class="img-cover">
                                                <a href="<?php echo $photo_openurl; ?>" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
                                                <h3><?php echo $row_vphotos['v_caption']; ?></h3><!-- Image Description  -->
                                            </div>
                                        </div>
                                        <!-- End Portfolio Item  -->
                                    </div>

<?php } while ($row_vphotos = mysqli_fetch_assoc($vphotos)); ?>                   
                                
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <!-- Start Portfolio Item -->
                                      <div class="hover-details">
                                            <img class="img-responsive img-thumbnail" src="img/thumbs/thumb2.jpg" alt="" title="" /><!-- Image Thumbnail  -->
                                            <div class="img-cover">
                                                <a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
                                                <h3>Item Description</h3><!-- Image Description  -->
                                            </div>
                                        </div>
                                        <!-- End Portfolio Item  -->
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <!-- Start Portfolio Item -->
                                      <div class="hover-details">
                                            <img class="img-responsive img-thumbnail" src="img/thumbs/thumb3.jpg" alt="" title="" /><!-- Image Thumbnail  -->
                                            <div class="img-cover">
                                                <a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
                                                <h3>Item Description</h3><!-- Image Description  -->
                                            </div>
                                        </div>
                                        <!-- End Portfolio Item  -->
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <!-- Start Portfolio Item -->
                                      <div class="hover-details">
                                            <img class="img-responsive img-thumbnail" src="img/thumbs/thumb4.jpg" alt="" title="" /><!-- Image Thumbnail  -->
                                            <div class="img-cover">
                                                <a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
                                                <h3>Item Description</h3><!-- Image Description  -->
                                            </div>
                                        </div>
                                        <!-- End Portfolio Item  -->
                                    </div>
                                
                                </div>
                                <div class="row">
                                
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <!-- Start Portfolio Item -->
                                        <div class="hover-details">
                                            <img class="img-responsive img-thumbnail" src="img/thumbs/thumb5.jpg" alt="" title="" /><!-- Image Thumbnail  -->
                                            <div class="img-cover">
                                                <a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
                                                <h3>Item Description</h3><!-- Image Description  -->
                                            </div>
                                        </div>
                                        <!-- End Portfolio Item  -->
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <!-- Start Portfolio Item -->
                                      <div class="hover-details">
                                            <img class="img-responsive img-thumbnail" src="img/thumbs/thumb6.jpg" alt="" title="" /><!-- Image Thumbnail  -->
                                            <div class="img-cover">
                                                <a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
                                                <h3>Item Description</h3><!-- Image Description  -->
                                            </div>
                                        </div>
                                        <!-- End Portfolio Item  -->
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <!-- Start Portfolio Item -->
                                      <div class="hover-details">
                                            <img class="img-responsive img-thumbnail" src="img/thumbs/thumb7.jpg" alt="" title="" /><!-- Image Thumbnail  -->
                                            <div class="img-cover">
                                                <a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
                                                <h3>Item Description</h3><!-- Image Description  -->
                                            </div>
                                        </div>
                                        <!-- End Portfolio Item  -->
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <!-- Start Portfolio Item -->
                                      <div class="hover-details">
                                            <img class="img-responsive img-thumbnail" src="img/thumbs/thumb8.jpg" alt="" title="" /><!-- Image Thumbnail  -->
                                            <div class="img-cover">
                                                <a href="img/thumb.png" class="img-zoom" data-gal="prettyPhoto"><i class="fa fa-search fa-fw"></i></a><!-- Large Image  -->
                                                <h3>Item Description</h3><!-- Image Description  -->
                                            </div>
                                        </div>
                                        <!-- End Portfolio Item  -->
                                    </div>


                                </div>		
                            </div>
                        </section>
                        <!-- End Portfolio -->
                        		



					</div>
					<!-- End Random Text -->
					<!-- Members Listing -->
					<div class="tab-pane" id="a<?php echo $row_qry_vehicle['vid']; ?>third-tab">
						<div class="row">
							<div class="video-container">
								
                                
                                
                                
							</div>
						</div>
					</div>
					<!-- End Members Listing -->
				</div>	
			</div>
			<!-- End Tabs -->
		</div>

	<!-- End Vehicle -->
