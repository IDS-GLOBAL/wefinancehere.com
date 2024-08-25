<?php require_once('db_functions.php'); ?>
<?php include("../Libary/sessioncookies.php"); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeFinanceHere.com - Vehicles!</title>
<link rel="shortcut icon" type="image/ico" href="favicon.ico">



    <link rel="stylesheet" href="css/wfhreset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhstyle.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhlayout.css" type="text/css" media="screen">    
	
    <!--Gallery Style -->
	<link rel="stylesheet" href="http://wefinancehere.com/public/css/gallerystyles.css" type="text/css"></link>

    <script src="http://wefinancehere.com/public/js/jquery-1.4.2.min.js" type="text/javascript"></script>

    <script src="http://wefinancehere.com/public/js/tabs.js" type="text/javascript"></script>

    <script src="http://wefinancehere.com/public/js/jquery.jcarousel.pack.js"  type="text/javascript"></script>

    <script src="http://wefinancehere.com/public/js/loopedslider.js"  type="text/javascript"></script>

    <script type="text/javascript">    

            jQuery(document).ready(function() {			

                jQuery('#third-carousel').jcarousel({

                    vertical: true

                });

            });		

	</script>

    <script type="text/javascript" src="http://wefinancehere.com/public/js/imagepreloader.js"></script>

	<script type="text/javascript">

        preloadImages([

            'http://wefinancehere.com//images/prev-h.gif', 

            'http://wefinancehere.com//images/next-h.gif']);

    </script>    
    <!--[if gte IE 7]>
    

    <link rel="stylesheet" href="http://wefinancehere.com/public/css/ie/ie6.css" type="text/css" media="screen">

    <script type="text/javascript" src="http://wefinancehere.com/public/js/ie_png.js"></script>
	<script defer type="text/javascript" src="js/pngfix.js"></script>

    <script type="text/javascript">

        ie_png.fix('.png');

    </script>

    <![endif]-->

    <!--[if lt IE 9]>

   		<script type="text/javascript" src="http://wefinancehere.com/public/js/html5.js"></script>

	<![endif]-->

</head>

<body id="page1">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18549838-1']);
  _gaq.push(['_setDomainName', 'wefinancehere.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><div class="bg"></div>

<div class="main">

<!--==============================Navigation================================-->	

   	
    
<header>

		<div class="row-1">
			<?php include('inc/public-topnavigation.php'); ?>
        </div>
		


        
        <div class="row-2">
<!--Start Sub Navigation -->
		    
			<?php include('inc/public-navigation.php'); ?>
            
            
        </div>




        <div class="row-3">        	
<!--Start Search and Slide -->
                     

        </div>

    </header>
<!--==============================End Navigation================================-->


<!--==============================OLD header=================================-->
	<!-- <h1>Application Welcome Layout</h1> -->
        
    <br />
   


    
    
    
    
    <!--==============================Start Markets content================================-->

                     



<!--==============================end markets================================-->
<div id="marketvwcontainer">

				<?php do { ?>

                
                    <div id="marketlinks">
                     
                    <a href="used-cars.php?markets=<?php echo $statemrkt; ?>"><?php echo $row_querymrktStateabrv['market']; ?></a>

                
                    </div>
                <?php } while ($row_querymrktStateabrv = mysqli_fetch_assoc($querymrktStateabrv)); ?>

	<div class="clear"></div>

</div>


<br /> <br />




	<!-- #_vehicle. -->







<?php if ($totalRows_selectVehicles > 0) { // Show if recordset not empty ?>

<div class="row-2">

    <h3>viewing all  Vehicles: </h3>

<?php do { 

//money_format('%i', $number) . "\n";


$Vehiclesvid = $row_selectVehicles['vid'];
$Vehiclesdid = $row_selectVehicles['did'];
$Vehiclesvlivestatus = $row_selectVehicles['vlivestatus'];

$VehiclesvDateInStock = $row_selectVehicles['vDateInStock'];
$Vehiclesvphoto_count = $row_selectVehicles['vphoto_count'];
$Vehiclesvsource_idscrm_import_txt = $row_selectVehicles['vsource_idscrm_import_txt'];
$Vehiclesvthubmnail_file = $row_selectVehicles['vthubmnail_file'];

$Vehiclesvyear = $row_selectVehicles['vyear'];
$Vehiclesvmake = $row_selectVehicles['vmake'];
$Vehiclesvmodel = $row_selectVehicles['vmodel'];
$Vehiclesvtrim = $row_selectVehicles['vtrim'];
$Vehicletitle = "$Vehiclesvmake $Vehiclesvmodel $Vehiclesvtrim";

$Vehiclesvvin = $row_selectVehicles['vvin'];
$Vehiclesvbody = $row_selectVehicles['vbody'];
$Vehiclesvcondition = $row_selectVehicles['vcondition'];
$Vehiclesvcertified = $row_selectVehicles['vcertified'];
$Vehiclesvstockno = $row_selectVehicles['vstockno'];
$Vehiclesvmileage = $row_selectVehicles['vmileage'];

$Vehiclesvrprice = $row_selectVehicles['vrprice'];
$Vehiclesvdprice = $row_selectVehicles['vdprice'];
$Vehiclesvspecialprice = $row_selectVehicles['vspecialprice'];


$Vehiclesvrprice = preg_replace("/[^0-9]/","","$Vehiclesvrprice");
$Vehiclesvdprice = preg_replace("/[^0-9]/","","$Vehiclesvdprice");
$Vehiclesvspecialprice = preg_replace("/[^0-9]/","","$Vehiclesvspecialprice");


if(!$Vehiclesvdprice){
							
							if(!$Vehiclesvrprice)
								{
								
								if(!$Vehiclesvspecialprice){$downpaymentPrice = '2000';}else{	
																
										$fifteenpercent = ($Vehiclesvspecialprice * '.15');	
										$downpaymentPrice = "$fifteenpercent";
										$downpaymentPrice = round($downpaymentPrice, -2);

										}

								}else{
										$fifteenpercent = ($Vehiclesvrprice * '.15');	
										$downpaymentPrice = "$fifteenpercent";
										$downpaymentPrice = round($downpaymentPrice, -2);

									  }
	}else{
		
		$downpaymentPrice = $Vehiclesvdprice;
		$downpaymentPrice = round($downpaymentPrice, -2);
}




$Vehiclesvecolor_txt = $row_selectVehicles['vecolor_txt'];
$Vehiclesvicolor_txt = $row_selectVehicles['vicolor_txt'];

$Vehiclesvtransm = $row_selectVehicles['vtransm'];
$Vehiclesvengine = $row_selectVehicles['vengine'];
$Vehiclesvdoors = $row_selectVehicles['vdoors'];



$Vehiclescompany = $row_selectVehicles['company'];
$Vehicleswebsite = $row_selectVehicles['website'];
$Vehiclesphone = $row_selectVehicles['phone'];
$Vehiclesaddress = $row_selectVehicles['address'];

$Vehiclescity = $row_selectVehicles['city'];
$Vehiclesstate = $row_selectVehicles['state'];
$Vehicleszip = $row_selectVehicles['zip'];

$Vehiclesstatus = $row_selectVehicles['status'];

$Vehicleswfh_dealer_type_id = $row_selectVehicles['wfh_dealer_type_id'];

// When Photos Are Not Available
$photocomingsoon = "images/wfh_coming_soon_tb.png";
if(!$Vehiclesvthubmnail_file){
	$vehicleimage = $photocomingsoon;
}else{
	$vehicleimage = "http://images.autocitymag.com/$Vehiclesdid/$Vehiclesvid/$Vehiclesvthubmnail_file";
}



$monthlypayments = '<br>'.'Finance Now! Today!!';
//$monthlypayments = '';

?>










            <div class="wrapper">

            <figure class="img-indent">
                
                <span class="body-text">
                   <b><?php echo $Vehiclesvcondition; ?> Vehicle</b> | Stock#: <?php echo $Vehiclesvstockno; ?><br />                    <a class="button1" href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>" />
                        <img src="<?php echo $vehicleimage; ?>" />                    </a>
                </span>
                
               <br /><br /><br />
                   <p>     
           			<a class="button1" href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                            
                        <span class="body-text">
                            <?php echo $Vehiclesvphoto_count; ?>: Photos<br />                        </span>
                            
                    <strong>More</strong>
        
                   </a>
                   </p>
             </figure>         
         

            <div class="extra-box">
            
				<div class="price">
                
                	<br />

                    <a href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                    
                    <b>Minimum Downpayment:</b>
                    <div id="dprice">$ <?php echo $downpaymentPrice; ?></div>
                    <div id="payments"><?php echo $monthlypayments; ?></div>
				 </a>
                </div>

                <div class="padding-top">

					<h4><span><?php echo $Vehiclesvyear; ?></span> <?php echo $Vehicletitle; ?> </h4>

                    <p>
                    
						
               	  <h2><?php echo $Vehiclescompany; ?></h2>
                        <br />
						<b>Call Us Now: </b><?php echo $Vehiclesphone; ?><br />						
<!--
						<a href="http://" target="_blank">
                        <b></b></a>
-->
						<br />
                        <address>
						<?php echo $Vehiclesaddress; ?><br />
						<?php echo $Vehiclescity; ?>	<?php echo $Vehiclesstate; ?> <?php echo $Vehicleszip; ?><br />
                        </address>
                        </b>
                        

                    </p>

                    <p>

                        <a class="button1" href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                        <strong>View</strong>
                        </a>
                    
                        |
                        <a class="button1" href="vehicle-details.php?v=<?php echo $Vehiclesvid; ?>">
                          <strong>Apply</strong>
                        </a>
                        <br />
                                       

                    </p>

                </div>

              </div>

            </div>

            

<hr />
  


  
  
  <?php } while ($row_selectVehicles = mysqli_fetch_assoc($selectVehicles)); ?>
  

			</div>
  <?php } // Show if recordset not empty ?>






<!-- #_vehicle. -->








<!-- div class="row-2">

    <h3>Featured Vehicle</h3>

            <div class="wrapper">

            <figure class="img-indent">
                
                <span class="body-text">
                   <b>New Vehicle</b> | Stock#: 5769<br />                    <a class="button1" href="http://wefinancehere.com/vehicles/2621" />
                        <img src=http://vimages.wefinancehere.com/85/2621/thumbs/00_5XXGN4A76DG257705.jpg />                    </a>
                </span>
                
               <br /><br /><br />
                   <p>     
           			<a class="button1" href="http://wefinancehere.com/vehicles/2621">
                            
                        <span class="body-text">
                            1: Photos<br />                        </span>
                            
                    <strong>More</strong>
        
                   </a>
                   </p>
             </figure>         
         

            <div class="extra-box">
            
				<div class="price">
                
                	<br />

                    <a href="http://wefinancehere.com/vehicles/2621">
                    
                    <b>Contact Us!!</b>
				 </a>
                </div>

                <div class="padding-top">

					<h4>2013 Kia Optima<span> EX</span> </h4>

                    <p>
                    
						
                    	<h2>Laurel Ford Lincoln KIA</h2>
                        <br />
						<b>Call Us Now: </b>(601) 342-0227<br />						

						<a href="http://" target="_blank">
                        <b></b></a>

						<br />
                        <address>
						2018 Hwy 15 N.<br />
						Laurel	MS 39440<br />
                        </address>
                        </b>
                        

                    </p>

                    <p>

                        <a class="button1" href="http://wefinancehere.com/vehicles/2621">
                        <strong>View</strong>
                        </a>
                    
                        |
                        <a class="button1" href="http://wefinancehere.com/vehicles/2621/apply">
                          <strong>Apply</strong>
                        </a>
                        <br />
                                       

                    </p>

                </div>

                </div>

            </div>

            


</div -->



<?php if ($totalRows_selectVehicles == 0) { // Show if recordset empty ?>

		<?php include('inc/no-vehicle.php'); ?>
<hr />
  <?php } // Show if recordset empty ?>




<!-- #_vehicle. -->
























	<a href="#">NEXT!</a>










<!--==============================footer=================================-->

        <?php include('inc/footer.php'); ?>


</div>

    
</body>
</html>