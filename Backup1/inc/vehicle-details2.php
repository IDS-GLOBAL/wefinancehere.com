<?php require_once('../Connections/idsconnection.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "cust_leadForm")) {
  $insertSQL =  "INSERT INTO cust_leads (cust_nickname, cust_fname, cust_lname, cust_email, cust_phonetype, cust_comment, cust_lead_source_id, cust_lead_source, cust_dealer_id, cust_vehicle_id, cust_lead_token, cust_home_address, cust_home_city, cust_home_state, cust_home_zip, cust_home_county, cust_home_live_years, cust_home_live_months, cust_employer_name, cust_employer_city, cust_employer_state, cust_employer_zip, cust_employer_years, cust_employer_months, cust_gross_income, cust_gross_income_frequency, cust_dealtoday, counter_offer, counter_offer2, tradeYes, tradeYear, tradeMake, tradeTrim, tradeMiles) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_nickname'], "text"),
                       GetSQLValueString($_POST['cust_fname'], "text"),
                       GetSQLValueString($_POST['cust_lname'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"),
                       GetSQLValueString($_POST['cust_phonetype'], "text"),
                       GetSQLValueString($_POST['cust_comment'], "text"),
                       GetSQLValueString($_POST['cust_lead_source_id'], "int"),
                       GetSQLValueString($_POST['cust_lead_source'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_vehicle_id'], "int"),
                       GetSQLValueString($_POST['cust_lead_token'], "text"),
                       GetSQLValueString($_POST['cust_home_address'], "text"),
                       GetSQLValueString($_POST['cust_home_city'], "text"),
                       GetSQLValueString($_POST['cust_home_state'], "text"),
                       GetSQLValueString($_POST['cust_home_zip'], "text"),
                       GetSQLValueString($_POST['cust_home_county'], "text"),
                       GetSQLValueString($_POST['cust_home_live_years'], "text"),
                       GetSQLValueString($_POST['cust_home_live_months'], "text"),
                       GetSQLValueString($_POST['cust_employer_name'], "text"),
                       GetSQLValueString($_POST['cust_employer_city'], "text"),
                       GetSQLValueString($_POST['cust_employer_state'], "text"),
                       GetSQLValueString($_POST['cust_employer_zip'], "text"),
                       GetSQLValueString($_POST['cust_employer_years'], "text"),
                       GetSQLValueString($_POST['cust_employer_months'], "text"),
                       GetSQLValueString($_POST['cust_gross_income'], "text"),
                       GetSQLValueString($_POST['cust_gross_income_frequency'], "text"),
                       GetSQLValueString(isset($_POST['cust_dealtoday']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['counter_offer']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['counter_offer2'], "text"),
                       GetSQLValueString(isset($_POST['tradeYes']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['tradeYear'], "int"),
                       GetSQLValueString($_POST['tradeMake'], "text"),
                       GetSQLValueString($_POST['tradeTrim'], "text"),
                       GetSQLValueString($_POST['tradeMiles'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "script-lead.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $insertGoTo));
}
?>
<?php require_once('db_functions.php'); ?>
<?php include('wfhLibrary/trackvehicle.php'); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeFinanceHere.com - Finance Your Next <?php echo $vtitle; ?>!</title>

<meta name="description" content="Finance a <?php echo $vtitle; ?> and get approved in seconds, trade-ins available, rates, payment, easy and fast, and visit to view photos of this <?php echo $vtitle; ?>.">

<meta name="keywords" content="<?php echo $vtitle; ?>">

<?php
		// This is to be edited remove when finished
		//include('inc/meta-property.php'); 
		
		echo trackvehiclewfh($vid, $did);

?>




    <link rel="stylesheet" href="css/wfhreset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhstyle.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhlayout.css" type="text/css" media="screen">

    
    <!--Gallery Style -->
   	<link rel="stylesheet" href="Shine_Gallery/wfhgallerystyles.css" type="text/css"></link>


	<script type='text/javascript' src='js/clearbox.js'></script>

    <!--Gallery Style Javascript -->
    <script type="text/javascript" src="Shine_Gallery/wfh/js/jquery-1.4.2.min.js"></script>
    
    <script type="text/javascript" src="Shine_Gallery/wfh/js/cufon-yui.js"></script>
    <script type="text/javascript" src="Shine_Gallery/wfh/js/js-mygallery.js"></script>
    
    <!-- Scrolling Style -->
    <script type="text/javascript" src="Shine_Gallery/wfh/js/js-scrolling-click.js"></script>


<script type="text/javascript">

var sellingprice = '<?php echo $vrprice; ?>';
var specialprice =	'<?php echo $row_slctVehicle['vspecialprice']; ?>';
var tryprice = sellingprice;
if(!sellingprice){
	var tryprice = specialprice;
}if(!specialprice){
	var tryprice = '47000';
}

</script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
    
    <script type="text/javascript" src="webex/js/jquery.inputfocus-0.9.min.js"></script>
    <script type="text/javascript" src="webex/js/jquery.mainvalidate.js"></script>

    <script type="text/javascript" src="webex/js/matrixcalc2.js"></script>
	
	<script language="JavaScript" src="js/showpay.js"></script>
    


<script type="text/javascript" >



function javascript_abort()
{
   throw new Error('This is not an error. This is just to abort javascript');
}



function DealCheck() {
//var dp = document.write.FormDealMatrix.DownPayment.value;
var dpriceform = document.getElementById('DownPayment').value;
var dpricedb = '<?php echo $DownPayment; ?>';

var purchasepower = document.getElementById('purchasepower').value;

if(!purchasepower){
	alert('You Have No Purchase Power Please Complete Your Deal...');
}
 //document.getElementById('CreditProfileBox').style.display = 'block';
 // FIAmount
    //alert(purchasepower);

	//alert(dpricedb);
	var ydeal = 'Y';
	var ndeal = 'N';

	if(dpriceform > dpricedb){
	
		if(purchasepower > 0){
		alert("YES! CONGRATULATIONS YOU HAVE BEEN PRE-APPROVED FOR THIS CAR");
		document.getElementById("qdeal").innerHTML="<input type='text' id='isdeal' name='isdeal' value='1'>";		
		
		document.getElementById('bxfCalc').style.display = 'block';
		document.getElementById('windowDialog').style.display = 'block';
		}else{
					document.getElementById("qdeal").innerHTML="<input type='text' id='isdeal' name='isdeal' value='0'>";		

			
			}
		

	
	}else
	{
		alert("Sorry I Can't Approve You On This Vehicle At This Time... Please Keep Car Shopping");
		document.getElementById("qdeal").innerHTML="<input type='text' id='isdeal' name='isdeal' value='0'>";		

		//return false;
		//return break;
		
	}


}
</script>
<script type="text/javascript">
function AjaxFunction(trademake)
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {

var myarray=eval(httpxml.responseText);
// Before adding new we must remove previously loaded elements
for(j=document.cust_leadForm.subcat.options.length-1;j>=0;j--)
{
document.cust_leadForm.subcat.remove(j);
}


for (i=0;i<myarray.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray[i];
optn.value = myarray[i];
document.cust_leadForm.subcat.options.add(optn);

} 
      }
    }
	var url="ajaxEnviro/vtradedd.php";
url=url+"?trademake="+trademake;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
httpxml.open("GET",url,true);
httpxml.send(null);
  }
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



<script type="text/javascript" src="js/clear.dmx.js"></script>

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


		<div class="row-22">
        
        		<!--div id="bannerAD" align="center" style="background-color:#999; width:728px; height:90px; margin-left: 150px;">
                
                	This Space For Add Banner
                
                </div -->

        
        </div>

        <div class="row-3">        	
<!--Start Search and Slide -->
                
                <div id="VehicleTitle">

    <div id="vehiclePrice">
            <br />
            
            <?php if($row_slctVehicle['vrprice']): ?>
            
                        <?php if($vprice < $vrprice){ ?>
                          
            				<del id="strike"><strong>Selling Price: $</strong><?php echo $row_slctVehicle['vrprice']; ?></del><br />
                        
                        <?php } else{?>

            
            						<strong>Selling Price: $</strong><?php echo $row_slctVehicle['vrprice']; ?><br />
            
            			<?php } ?>
            
            <?php endif; ?>
            
            <?php if($row_slctVehicle['vspecialprice']): ?>
							

            <strong>Spcial Price:  $</strong><?php echo $row_slctVehicle['vspecialprice']; ?><br />
            
            <?php endif; ?>

            
            <strong>Down Payment Price: $</strong><?php echo $downpaymentPrice; ?><br />	


	</div>


  	<h1 id="vtitle">
		<?php echo $row_slctVehicle['vcondition']; ?>     
		<?php echo $row_slctVehicle['vyear']; ?> 
        <?php echo $row_slctVehicle['vmake']; ?> 
        <?php echo $row_slctVehicle['vmodel']; ?> 
        <?php echo $row_slctVehicle['vtrim']; ?> 
	</h1>
 
   
				<div class="vehicleDescription">
					<div class="vehicleBullets">
              
					 <table width="100%">
                      <tr>
                        <td><ul>
                          <li><strong>Year: </strong> <?php echo $row_slctVehicle['vyear']; ?></li>
                          <li><strong>Make: </strong> <?php echo $row_slctVehicle['vmake']; ?></li>
                          <li><strong>Model: </strong> <?php echo $row_slctVehicle['vmodel']; ?></li>
                          <li><strong>Trim: </strong> <?php echo not($vtrim); ?></li>
                        </ul></td>
                        <td>
						<ul>
							<li><strong>Stock No: </strong> <?php echo not($vstockno); ?></li>
							<li><strong>Transmission: </strong> <?php echo not($vtransm); ?></li>
							<li><strong>Exterior Color: </strong><?php echo not($vecolor_txt); ?></li>
							<li><strong>Interior Color: </strong><?php echo not($vicolor_txt); ?></li>

						</ul>
						</td>
                        <td><ul>
                          <li><strong>VIN: </strong> <?php echo not($vvin); ?></li>
                          <li><strong>Condition: </strong> <?php echo not($vcondition); ?></li>
                          <li><strong>Certified: </strong>
                            <?php $condition = $row_slctVehicle['vcertified']; if($condition == 0){ echo 'No';}elseif($condition == 1){ echo ' Yes';}else{echo ' N/A';}  ?>
                          </li>
                          <li><strong>Photos: </strong> <?php echo not($vphoto_count); ?></li>
                        </ul></td>
                        <td>
						<ul>
							<li><strong>Body: </strong> <?php echo not($vbody); ?></li>
							<li><strong>Mileage: </strong> <?php echo not($vmileage); ?></li>
							<li><strong>Engine: </strong> <?php echo not($vengine); ?></li>
							<li><strong>Doors: </strong> <?php echo not($vdoors); ?></li>

						</ul>
						</td>
                       </tr>
                       
                     </table>
					</div><!--vehicleBullets-->
				</div><!--proFileDesc-->

</div>
                                     

        </div>

  </header>
<!--==============================End Navigation================================-->


<!--==============================OLD header=================================-->
	<!-- <h1>Application Welcome Layout</h1> -->
        
    <br />
   
			


    
    
    
    
    <div class="padding_container">
    
    
    
										<div id="previewWindow" style="float:left;">

                <div class="mainframe">
                                        
                                            <div id="largephoto">
                                                <div id="loader"></div>
                                            
                                            
                                                    <div id="largecaption">
                                                        <div class="captionShine"></div>
                                                        <div class="captionContent"></div>
                                                    </div>
                                            
                                            <div id="largetrans">  
                                            </div>
                                            
                                            </div>
                                        
            </div>
                
        </div>
    
    
    
        
    									<?php include("inc/thumbnailsBox.php"); ?><!--thumbnailsBox-->
        

                
                
                
                
                









        <div id="storeinfo">

                           <h3>I'm Very Interested| I want to Finance Now </h3>

                
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
        <li>Service & Repair Available</li>
    
    </ul>
 </div>
</p>
    
    
    
    </td>
    <td>
    
    
    			<p>
                <ul>
                        <li>Address, Location, Directions Map</li>
                        <li>View Our Inventory</li>
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
                
                
                
                            <?php //include("inc/dealershipInfo.php"); ?>

   		  
                   <?php include('inc/leadform.php'); ?>
        
                
                
                
                <div class="clear"></div>
                
        </div>
                
                

</div>

                <div id="similarvehicles">
                
                	<h1 id="similar">Similar Vehicles </h1>
                    
                    
                        <div id="similarcontainer">
                            <?php  echo showSimilarVehicles($did, $vid); ?>
                        </div>
						
                        <div class="clear"></div>
                </div>



<div id="disclaimer">

	<?php include('inc/disclaimer.php'); ?>

</div>
<!--==============================footer=================================-->

    <?php include('inc/footer.php'); ?>

</div>
    
</body>
</html>