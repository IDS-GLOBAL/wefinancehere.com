<?php require_once('db_functions.php'); ?>
<?php //require_once('db_functions_nocurl.php'); ?>
<?php //include('inc/_fbinc.php'); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userWfh = "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = '$fbemail'";
$userWfh = mysqli_query($idsconnection_mysqli, $query_userWfh);
$row_userWfh = mysqli_fetch_assoc($userWfh);
$totalRows_userWfh = mysqli_num_rows($userWfh);
$wfhuserid=$row_userWfh['wfhuser_id'];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeFinanceHere.com - Finance Your Next Used Car Today!</title>


    <link rel="stylesheet" href="css/wfhreset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhstyle.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhlayout.css" type="text/css" media="screen">    
    <link rel="stylesheet" href="css/home.css" type="text/css" media="screen">   
    
    <link rel="stylesheet" href="css/sortcolumn.css" type="text/css" media="screen">

<style>
	  #alert {
	    font-family: Arial, Helvetica, sans-serif;
	    font-size: 16px;
	    background-color: #ddd;
	    color: #333;
	    padding: 5px;
	    font-weight: bold;
	  }
	</style>
	<link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
	
	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

   	<script language="javascript" type="text/javascript" src="js/hideshow.js"></script>
    
   	<script language="javascript" type="text/javascript" src="js/preapproveme.js"></script>
	
	<script language="javascript" type="text/javascript" src="js/powerAjax.js"></script>    
    
   	<script language="javascript" type="text/javascript" src="js/prince.js"></script>
   	<script language="javascript" type="text/javascript" src="js/master.js"></script>
    <script language="javascript" type="text/javascript" src="js/vehiclepaging.js"></script>
    



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

<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<noscript>
Please Enable Javascript Enabled To Fully View This Site.
</noscript>
<style>
	ul.map li { float: left; margin: 0 25px 0 0px; width: 120px; border: 0px solid; height: 45px; padding-left: 6px; } ul.map { list-style: square url(images/li-arrow.png) !important; } ul.map li a{ margin: 0;padding: 0; text-decoration:underline; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:normal; color:#4591b1; } ul.map li a:hover{ text-decoration:none; color:#214b6e;} .linkBack{ display:block; width:130px; position: relative; bottom: 0px; left: 660px; font-family: Arial,Helvetica,sans-serif; font-size: 10px; font-style:italic; color:#666666;} .linkBack a {color:#666666;}.linkBack a:hover{color:#666666;text-decoration: none;} 
</style>

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

<div id="fb-root"></div>
<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '597949943584638', // App ID
      channelUrl : '//WWW.WEFINANCEHERE.COM/home.php', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional init code here


	  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });




  };

  // Load the SDK asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
  
    // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=597949943584638";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
        
        <div id="MarketHeader">
          <h2>Total Available! $<?php echo $total_avilable; ?>
          
<?php echo $row_querymrktStateabrv['state_name']; ?></h2>
      </div>

    <br />
   


    

    
    
                <div class="padding_container">


                
                <div id="home_block" style="width: 1000px">
                
                
            <div id="left-container">
                
                	
                    
                    <div id="home_leftblock">
                      <?php include('inc/homeblock_one.php'); ?>
                    </div>

  					<div class="clear"></div>

                    <div id="powerContainer"></div>
                    
  					<div class="clear"></div>

                    <div id="vehicleContainer"></div>
                    
  					<div class="clear"></div>
                        
                    <div id="home_smallblock">
<a href="images/stock/wfh-leftBlock.png" title="Clearbox Info" rel="clearbox[height=400,,width=400]">
<img src="images/stock/wfh-leftBlock.png" />
</a>
                        
                        <div id="smallblock_txt">
                        	<h2 class="smallblock_1st">Finance Your Next Car Online With WeFinanceHere.com!</h2>
                        </div>
                    </div>
                    
                    <div id="home_smallblock">
                    	
                     
                        
                        <div id="smallblock_txt">

                        	<h2 class="smallblock_2nd">
                            Get Pre-Approved<br />
                            Find A Car<br />
                            Contract The Car<br />
                            Sign And Drive Today!<br />
                            
                            </h2>
                        </div>
                     
                     
              </div>
                    
                    <div id="home_smallblock">
                    
                       	<h2 class="smallblock_2nd">
                            Get Pre-Approved<br />
                            Find A Car<br />
                            Contract The Car<br />
                            Sign And Drive Today!<br />
                            
                            </h2>

                    
                    </div>
                                      	<div class="clear"></div>
            </div>


			<div id="right-container">
                  	<div id="home_rightblock">
                    		
                            
                            <div id="rightWidget">
                            
                            <?php include('content/_form_leadcapture.php'); ?>
                            </div>
                            
                            
                            <div class="clear"></div>
                    </div>
                
                 <div id="home_rightblocktwo">
                 
                   <div id="rightWidgetsub">
                           <h3>Register Or Sign In With Your Facebook Account</h3>
                           
                           <p>
                           Finance Your Next Car Online With WeFinanceHere.com
                           </p>
                           
                           <p>
                           
                           <div class="fb-like" data-href="https://www.facebook.com/wefinancehere" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="box_count" data-action="like" data-show-faces="true" data-send="false"></div>
                           
                           
                           </p>
                           
                           <p>
                           
                           
                          
                           
                           </p>
                  </div> 

                            <div class="clear"></div>
                </div>

                 <div class="clear"></div>
                 
                 <div id="home_rightblockthree">
                 

                   <div id="rightWidgetsubthree"></div> 

                      
                      
                      <div class="clear"></div>
                </div>
                 
                 

                 
                 
            </div>
                 
                 
                 
                 	<div class="clear"></div>
                    
                </div>
                
                	
								
                                
                                
                                
                                

            <div class="clear"></div>
                </div>


<!--==============================footer=================================-->

    <?php include('inc/footer.php'); ?>
            <div class="clear"></div>
</div>

            
            
    			<div id="bottom-dashboard">
                
                	<?php include('inc/bottom_dashboard.php'); ?>
						
                        <div class="clear"></div>
                </div>

<script type='text/javascript' src='js/clearbox.js'></script>
<script type="text/javascript" src="js/config_clearbox.js"></script>
</body>
</html>
<?php
mysqli_free_result($slctVehicle);

mysqli_free_result($slctDlr);

mysqli_free_result($fundsAvailable);

mysqli_free_result($states);

mysqli_free_result($timeMonths);

mysqli_free_result($timeYears);

mysqli_free_result($autoYears);

mysqli_free_result($slctVphotos);

mysqli_free_result($querymrktStateabrv);

mysqli_free_result($selectVehicles);

mysqli_free_result($carMakes);

mysqli_free_result($paydayType);
?>