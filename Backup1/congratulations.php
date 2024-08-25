<?php require_once('db_functions.php'); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_select = "SELECT * FROM manager_person WHERE manager_title = 'Sales Manager' OR manager_title = 'Finance Manager'  AND manager_person.dealer_id = '$did'";
$select = mysqli_query($idsconnection_mysqli, $query_select);
$row_select = mysqli_fetch_assoc($select);
$totalRows_select = mysqli_num_rows($select);
$mid = $row_select['manager_id'];
$mfname = $row_select['manager_firstname'];
$mlname = $row_select['manager_lastname'];
$managerName = "$mfname $mlname";

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctDlrContacts = "SELECT id, contact, dmcontact2 FROM dealers WHERE id = '$did'";
$slctDlrContacts = mysqli_query($idsconnection_mysqli, $query_slctDlrContacts);
$row_slctDlrContacts = mysqli_fetch_assoc($slctDlrContacts);
$totalRows_slctDlrContacts = mysqli_num_rows($slctDlrContacts);
$contact = $row_slctDlrContacts['contact'];
$contact2 = $row_slctDlrContacts['dmcontact2']

?>
<?php
		$nextWeek = time() + (14 * 24 * 60 * 60);
		$tomorrowDate = time() + (1 * 24 * 60 * 60);

        $tomorrowDate = date('m/d/Y', $tomorrowDate) ."\n";

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeFinanceHere.com - Finance Your Next Used Car Today!</title>



    <link rel="stylesheet" href="css/wfhreset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhstyle.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhlayout.css" type="text/css" media="screen">    
	
	
    <!--Gallery Style -->
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
   


      	<h1 id="vtitle">
		<?php echo $row_slctVehicle['vcondition']; ?>     
		<?php echo $row_slctVehicle['vyear']; ?> 
        <?php echo $row_slctVehicle['vmake']; ?> 
        <?php echo $row_slctVehicle['vmodel']; ?> 
        <?php echo $row_slctVehicle['vtrim']; ?> 
	    </h1>
        <br>

        <br>

        <br>


        <br>


        <div class="clear"></div>

    
    
    
    <div class="padding_container">
    
    
    
    
    
    
    
    
    
    
    
    
    <div id="bodyContent" style="float:left;">
  <div id="Content">

			  <h3>Congratulations! Your Submission Has Been Processed &amp; Accepted.			  </h3>


			  <p><strong>Your Confirmation Number:</strong>  <?php echo $tkey; ?></p>
			  <p><strong>Your Appointment Date &amp; Time Is:</strong> <?php echo $tomorrowDate; ?> 9:00 a.m Call Us If This Needs To Change <?php echo $row_slctDlr['phone']; ?>.</p>
			  
              <p><!-- a href="#">-Print This Page -</a --></p>
              
			  <p>The Dealership Has Been Notified And All The Necessary Paperwork Has Already Been Prepared.</p>
			  <p>The Dealership Where This Vehicle Is Located Has Been Notified On Your Pre-Appproval.</p>
			  <p>Only Thing Next! Is Your Interview Process If Your Using Your Pre-Approval For Financing.</p>
	      <p>There's a little bit more information we are going to need from you in order to prepare your car in the {next few hours, tomorrow at 9 a.m.} if you have a co-signor please have them come or bring their information as well please.</p>
			  <p>Your appointment is set and paperwork will be prepared at:  <strong><strong><?php echo $row_slctDlr['address']; ?>
              <?php echo $row_slctDlr['city']; ?>, <?php echo $row_slctDlr['state']; ?> &nbsp;&nbsp;&nbsp;<?php echo $row_slctDlr['zip']; ?>
        </strong>.</strong> Your Point Of Contact Will Be <strong>
        <em> <?php
					if($mid){
							if(!$contact2){ echo $contact;}else{echo $contact2;}
					}else{
					echo $managerName;	
					}
		?>
</em></strong>.</p>
              
        <div class="padd">
				<div>
				  <div class="btmArticles">
						<h2 id="companytitle"><?php echo $row_slctDlr['company']; ?></h2>
                        <!-- LOGO -->
                        <h4 id="callus">Call Us Today: <?php echo $row_slctDlr['phone']; ?></h4>
				  </div>
					 
							<strong>Our Website: </strong><a href="http://www.<?php echo $row_slctDlr['website']; ?>" target="_blank">
							www.<?php echo $row_slctDlr['website']; ?>
                            </a>
					<p>
							            
		          <strong><?php echo $row_slctDlr['address']; ?><br />
            <?php echo $row_slctDlr['city']; ?>, <?php echo $row_slctDlr['state']; ?> &nbsp;&nbsp;&nbsp;<?php echo $row_slctDlr['zip']; ?>
                  </strong>
                  </p>
                  <br />
                  
                              <!--div id="storePic">
							<img src="images/WeFinacehere-Orange-Logo-500x375.png" width="300px" >
                            </div -->

<p id="DealerPitch">
There's No Place Like <?php echo $row_slctDlr['company']; ?> Where We Are Eager To Help. Can't Wait To Hear From You.
</p>

<p>
    <ul>
    	<li><a href="#ApproveME">Finance This <strong><?php echo $row_slctVehicle['vyear']; ?> <?php echo $row_slctVehicle['vmake']; ?> <?php echo $row_slctVehicle['vmodel']; ?> <?php echo $row_slctVehicle['vtrim']; ?></strong> With Us Now</a></li>
        <li><a href="#">Address, Location, Directions Map</a></li>
        <li><a href="#">View Our Inventory</a></li>
        
    
    </ul>
</p>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><strong>Our Highlights</strong></td>
    <td><strong>Our Recognition</strong></td>
  </tr>
  <tr>
    <td>
    
    
    			<p>
  <div>
    <ul>
        <li><strong><?php echo $row_slctDlr['company']; ?></strong></li>
        <li><strong>Warranty Available</strong></li>
        <li></li>
    
    </ul>
 </div>
</p>
    
    
    
    </td>
    <td>
    
    
    			<p>
                <ul>
                        <li></li>
                        <li><a href="http://www.<?php echo $row_slctDlr['website']; ?>">View Our Website</a></li>
                        <li><a  href="#">Finance This <strong><?php echo $row_slctVehicle['vyear']; ?> <?php echo $row_slctVehicle['vmake']; ?> <?php echo $row_slctVehicle['vmodel']; ?> <?php echo $row_slctVehicle['vtrim']; ?></strong> With Us</a></li>
                    
                </ul>
                </p>

    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<h4>&nbsp;</h4>

							<div class="hot10">&nbsp;</div>
			  </div>
			</div>
			  
<h3>*For Easy Financing Please Read Message Below.</h3>

	<p>Please  Review and Prepare As Necessary</p>

	    <p>-- Last But Not Least--</p>
        
        <p>
	    	Do You Currently Have Full Coverage Insurance?			
        </p>
        
        <p>
        	(You Will Need To Provide insurance Before Leaving The lot In Your Vechicle.)  Prepare for at least a $500 Deductible on Collission And Comprehensive.
        </p>
</div>


</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
<form id="form-2" name="wefinance_login" action="" method="post">

	<fieldset>
    	<div>
    	<legend><b>Please Login</b></legend>
        </div>
        
        <br />
	    
        <div>
          <a class="fb_connect" href="<?php echo $loginUrl; ?>">
                                
                                	<img src="images/icons/fbCapture.png" />
                                
          </a>
            
		</div>

        
        


        
       

    </fieldset>

</form>
</div>

<div id="disclaimer">

	<?php include('inc/disclaimer.php'); ?>

</div>
<!--==============================footer=================================-->

    <?php include('inc/footer.php'); ?>

</div>

    
</body>
</html>