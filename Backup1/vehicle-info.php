<?php require_once('db_functions.php'); ?>
<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

include('facebook.php');

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '597949943584638',
  'secret' => 'bea982d39e0983cfa4799a5d0e70e8be',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	
	
	/*
	$facebook->api('/me/feed', '', array(
		// 'message' => 'Hello World!'
	 ));
	*/
	
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}


?>
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
?>




    <link rel="stylesheet" href="css/wfhreset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhstyle.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhlayout.css" type="text/css" media="screen">
	<link rel="stylesheet" href="webex/css/multi-stepstyle.css" type="text/css" media="all" />

    
    <!--Gallery Style -->
   	<link rel="stylesheet" href="Shine_Gallery/wfhgallerystyles.css" type="text/css"></link>


	<script type='text/javascript' src='js/clearbox.js'></script>

    <!--Gallery Style Javascript -->
    <script type="text/javascript" src="Shine_Gallery/wfh/js/jquery-1.4.2.min.js"></script>
    
    <script type="text/javascript" src="Shine_Gallery/wfh/js/cufon-yui.js"></script>
    <script type="text/javascript" src="Shine_Gallery/wfh/js/aura_400.font.js"></script>
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


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
    
    <script type="text/javascript" src="webex/js/jquery.inputfocus-0.9.min.js"></script>
    <script type="text/javascript" src="webex/js/jquery.mainvalidate.js"></script>

    <script type="text/javascript" src="webex/js/matrixcalc.js"></script>
	
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



<script type="text/javascript">
/*
// 	ClearBox Config File (JavaScript)
*/

var

// CB layout:

	CB_MinWidth=800,				// minimum (only at images) or initial width of CB window
	CB_MinHeight=1143,				// initial heigth of CB window
	CB_WinPadd=15,					// padding of the CB window from sides of the browser 
	CB_ImgBorder=3,					// border size around the picture in CB window
	CB_ImgBorderColor='#ffffff',			// border color around the picture in CB window
	CB_Padd=4,					// padding around inside the CB window

	CB_BodyMarginLeft=0,				//
	CB_BodyMarginRight=0,				// if you set margin to <body>,
	CB_BodyMarginTop=0,				// please change these settings!
	CB_BodyMarginBottom=0,				//

	CB_ShowThumbnails='always',			// it tells CB how to show the thumbnails ('auto', 'always' or 'off') thumbnails are only in picture-mode!
	CB_ThumbsBGColor='#000',			// color of the thumbnail layer
	CB_ThumbsBGOpacity=.35,				// opacity of the thumbnail layer
	CB_ActThumbOpacity=.65,				// thumbnail opacity of the current viewed image

	CB_SlideShowBarColor='#fff',			// color of the slideshow bar
	CB_SlideShowBarOpacity=.6,			// opacity of the slideshow bar
	CB_SlideShowBarPadd=17,				// padding of the slideshow bar (left and right)
	CB_SlideShowBarTop=2,				// position of the slideshow bar from the top of the picture

	CB_SimpleDesign='off',				// if it's 'on', CB doesn't show the frame but only the content - really nice ;)

	CB_CloseBtnTop=-10,				// vertical position of the close button in picture mode
	CB_CloseBtnRight=-14,				// horizontal position of the close button in picture mode
	CB_CloseBtn2Top=-20,				// vertical position of the close button in content mode
	CB_CloseBtn2Right=-30,				// horizontal position of the close button in content mode

	CB_OSD='off',					// turns on OSD
	CB_OSDShowReady='off',				// when clearbox is loaded and ready, it shows an OSD message

// CB font, text and navigation (at the bottom of CB window) settings:

	CB_FontT='helvetica, arial, sans-serif',				//
	CB_FontSizeT=13,				// these variables are referring to the title or caption line
	CB_FontColorT='#777',				// 
	CB_FontWeightT='normal',			//

	CB_FontC='helvetica, arial, sans-serif',				//
	CB_FontSizeC=11,				// these variables are referring to
	CB_FontColorC='#999',				// comment lines under the title
	CB_FontWeightC='normal',			//
	CB_TextAlignC='justify',			//
	CB_txtHCMax=120,				// maximum height of the comment box in pixels

	CB_FontG='helvetica, arial, sans-serif',				//
	CB_FontSizeG=11,				// these variables are referring to the gallery name
	CB_FontColorG='#aaa',				//
	CB_FontWeightG='normal',			//

	CB_PadT=10,					// space in pixels between the content and the title or caption line

	CB_OuterNavigation='off',			// turns outer navigation panel on

	CB_ShowURL='off',				// it shows the url of the content if no title or caption is given
	CB_ItemNum='on',				// it shows the ordinal number of the content in galleries
	CB_ItemNumBracket='()',				// whatever you want ;)

	CB_ShowGalName='on',				// it shows gallery name
	CB_TextNav='on',				// it shows previous and next navigation
	CB_NavTextImgPrvNxt='on',			// it shows previous and next buttons instead of text
	CB_ShowDL='on',					// it shows download controls
	CB_NavTextImgDL='on',				// it shows download buttons instead of text

	CB_ImgRotation='on',				// it shows the image rotation controls
	CB_NavTextImgRot='on',				// it shows the image rotation buttons instead of text

// Settings of the document-hiding layer:

	CB_HideColor='#000000',				// color of the layer
	CB_HideOpacity=.8,				// opacity (0 is invisible, 1 is 100% color) of the layer
	CB_HideOpacitySpeed=400,			// speed of fading
	CB_CloseOnH='on',				// CB will close, if you click on background

// CB animation settings:
	CB_Animation='double',				// 'double', 'normal', 'off', 'grow', 'growinout' or 'warp' (high cpu usage)
	CB_ImgOpacitySpeed=300,				// speed of content fading (in ms)
	CB_TextOpacitySpeed=300,			// speed of text fading under the picture (in ms)
	CB_AnimSpeed=300,				// speed of the resizing animation of CB window (in ms)
	CB_ImgTextFade='on',				// turns on or off the fading of content and text
	CB_FlashHide='off',				// it hides flash animations on the page before CB starts
	CB_SelectsHide='on',				// it hides select boxes on the page before CB starts
	CB_SlShowTime=3000,				// default speed of the slideshow (in sec)
	CB_Preload='on',				// preload neighbour pictures in galleries
	CB_ShowLoading='on'				// 



;
</script>

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
        
        		<div id="bannerAD" align="center" style="background-color:#999; width:728px; height:90px; margin-left: 150px;">
                
                	This Space For Add Banner
                
                </div>

        
        </div>

        <div class="row-3">        	
<!--Start Search and Slide -->
                
                <div id="VehicleTitle">

    <div id="vehiclePrice">
            <br />
            <strong>Selling Price: $</strong><?php echo $row_slctVehicle['vrprice']; ?><br />
            <strong>Spcial Price:  $</strong><?php echo $row_slctVehicle['vspecialprice']; ?><br />    
            <strong>Down Payment Price: $</strong><?php echo $row_slctVehicle['vdprice']; ?><br />	
	</div>


  	<h1>
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
                          <li><strong>Trim: </strong> <?php echo $row_slctVehicle['vtrim']; ?></li>
                        </ul></td>
                        <td>
						<ul>
							<li><strong>Stock No: </strong> <?php echo $row_slctVehicle['vstockno']; ?></li>
							<li><strong>Transmission: </strong> <?php echo $row_slctVehicle['vtransm']; ?></li>
							<li><strong>Exterior Color: </strong><?php echo $row_slctVehicle['vecolor_txt']; ?></li>
							<li><strong>Interior Color: </strong><?php echo $row_slctVehicle['vicolor_txt']; ?></li>

						</ul>
						</td>
                        <td><ul>
                          <li><strong>VIN: </strong> <?php echo $row_slctVehicle['vvin']; ?></li>
                          <li><strong>Condition: </strong> <?php echo $row_slctVehicle['vcondition']; ?></li>
                          <li><strong>Certified: </strong>
                            <?php $condition = $row_slctVehicle['vcertified']; if($condition == 0){ echo 'No';}elseif($condition == 1){ echo ' Yes';}else{echo ' N/A';}  ?>
                          </li>
                          <li><strong>Photos: </strong> <?php echo $row_slctVehicle['vphoto_count']; ?></li>
                        </ul></td>
                        <td>
						<ul>
							<li><strong>Body: </strong> <?php echo $row_slctVehicle['vbody']; ?></li>
							<li><strong>Mileage: </strong> <?php echo $row_slctVehicle['vmileage']; ?></li>
							<li><strong>Engine: </strong> <?php echo $row_slctVehicle['vengine']; ?></li>
							<li><strong>Doors: </strong> <?php echo $row_slctVehicle['vdoors']; ?></li>

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
        

	  <div id="ApproveME" class="ApproveME">



					<!-- href="javascript:hideshow(document.getElementById('containerdeal'))"></a -->
				</div><!--loanqualifyME-->
                
		  </div>

<div class="container clearfix">
<a rel="clearbox[gallery=Gallery]" href="dealmatrix.php?v=<?php echo $vid; ?>" title="Ajax"><img src="example/no_iframe.gif" alt="Ajax"></a>
</div>



	</div>

<div id="disclaimer">

	<?php include('inc/disclaimer.php'); ?>

</div>

<form action="#" method="get" name="myDeal" id="myDeal" style="margin:0; padding:0;">
                        
								<!--input type="submit" name="Submit" value="" class="formbtn" />< Button -->
                            
							<input type="hidden" name="prequalifyIncome" id="prequalifyIncome" value="" />
							<input type="hidden" name="prequalifyMortgage" id="prequalifyMortgage" value="" />
							<input type="hidden" name="prequalifyCreditCards" id="prequalifyCreditCards" value="" />
							<input type="hidden" name="prequalifyGarnishments" id="prequalifyGarnishments" value="" />
							<input type="hidden" name="prequalifyOtherLoans" id="prequalifyOtherLoans" value="" />
							<input type="hidden" name="myCreditScoreAPR" id="myCreditScoreAPR" value="" />
						  <input type="hidden" name="tokenkey" id="tokenkey" value="<?php echo $tkey; ?>" />
							<input type="hidden" name="prequalifyLoanAmt" id="prequalifyLoanAmt" value="" />
						
                        
                        </form>
<!--==============================footer=================================-->

    <?php include('inc/footer.php'); ?>

</div>

    
</body>
</html>