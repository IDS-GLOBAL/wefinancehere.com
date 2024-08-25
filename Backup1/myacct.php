<?php require_once('db_functions.php'); ?>
<?php

include('db_loggedinFunctions.php');


restrict($fbemail);

//print_r($location);

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeFinanceHere.com - Finance Your Next Used Car Today!</title>



    <link rel="stylesheet" href="css/wfhreset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhstyle.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhlayout.css" type="text/css" media="screen">    
	
    <link rel="stylesheet" href="css/access.css" type="text/css" media="screen">

    <link rel="stylesheet" href="css/accessmylinks.css" type="text/css" media="screen">        

	
    <!--Gallery Style -->
	<link rel="stylesheet" href="http://wefinancehere.com/public/css/gallerystyles.css" type="text/css"></link>


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
   


    
    
    
    
<div class="padding_container">
	<div id="contentaccs">
	
    
    
									
                                    
                                    <!-- Facebook Login Creditianls Here -->            
            
            
            
            
    <?php if ($user): ?>

            <div id="leftnav">
            
    
                                <h3>Your Profile Picture</h3>
                                <img id="proimg" src="https://graph.facebook.com/<?php echo $user; ?>/picture">
                                
    <ul id="profileLinks">
    <li>First Name: <span class='linktxt'><?php echo $user_profile['first_name']; ?>  <?php echo $user_profile['last_name']; ?></span></li>
    <li>City, State: <span class='linktxt'><?php echo $location; ?></span></li>
    <?php if($fbemployername): ?>
    <li>Employer: <span class='linktxt'><?php echo $fbemployername; ?></span></li>
    <?php endif; ?>
    <?php if($fbemployerposition): ?>    
    <li>Position: <span class='linktxt'><?php echo $fbemployerposition; ?></span></li>
    <?php endif; ?>
    <?php if($fbemployerhiredate): ?>    
    <li>Work Since: <span class='linktxt'><?php echo $fbemployerhiredate; ?></span></li>
    <?php endif; ?>
    </ul>
                                
                                <br>
                                
                                <br>
								
                                <br>
								

                                <br>
								
                                
                                <hr>

                                <ul id="mylinks">
                                	<li><a href="myacct">My Account</a></li>
                                	<li><a href="myinfo">My Info</a></li>
                                	<li><a href="activity">Recent Activity</a></li>
                                	<li><a href="mytrade">Your Trade Offer</a></li>
                                    
                                </ul>
                                
                                <br />
                                
                                <?php //echo 'Picture: '.$fbpicture; ?><br />
                                
                                
                                <a href="<?php  echo 'logout.php';     //echo $logoutUrl;    ?>">Log Out</a>
            
            
            	<div class="clear"></div>
            </div>      
      


    <?php else: ?>
      <div>
      
        <h3>Login Using Your Facebook Account: </h3>
        
        
        <p>
        	<i>"There Is One Car For One Customer Pick Yours Today"</i>
        </p>
        
        						<a class="fb_connect" href="<?php echo $loginUrl; ?>">
                                
                                	<img src="images/icons/fbCapture.png" />
                                
                                </a>
                                
                                
    </div>
    <?php endif ?>


                                <!-- h3>PHP Session</h3 -->

       <div id="bodyaccs">


									<h1>Loading Please Wait... <img src="content/images/loading-gif-animation.gif" alt="loading" width="200" height="188" border="0">
    
    	                            </h1>
		 <div class="clear"></div>
	</div><!--End Body Access -->
    
    
    
    </div><!-- End Content Access -->
        <div class="clear"></div>
</div>

    <div class="clear"></div>

<!--==============================footer=================================-->
    <?php include('inc/footer.php'); ?>
</div>
    <script src="js/jquery-1.9.1.js"></script>

    <script src="js/ajaxmyaccount.js"></script>    
    
</body>
</html>