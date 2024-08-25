<?php require_once('db_functions.php'); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeFinanceHere.com - Finance Your Next Used Car Today!</title>
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
   


    
    
    
    
    <div class="padding_container">
<!-- Facebook Login Creditianls Here -->            
            
            
            
            
    <?php if ($user): ?>


      <a href="<?php  echo 'logout.php';     //echo $logoutUrl;    ?>">Log Out</a>


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
                                
									<?php 
									
									
/*


Array
(
[fb_597949943584638_code] => AQACtjfpczUMAduBpWIOTJJdjZ1_QxxmX-Le3oL6uIGiKIvYJJSH-ib4cN5pLFm022le_4P908KwzVy43GBCWhyEza_cJwa5EEx0nXV-vNunAxvji08shycQ9qt9UsOXGKWbyIyCrnDdctZPLff9nXi4ahRqrjWC2U4O45UCmPPsgoW9hRBJI2GDtYPsuV8V6T5VpJtJ1lfyluCiG0GJ9ojdt2NtS_6I286olkAtoEJ485RaG2Jyq6jnzRuGbl9cZy2UzNRa1nG6y7khr0biU5ZPT6Oo9yUu3l38TMOMSEAJ28ccRYwY_9xMHlk0IiH2AbU


[fb_597949943584638_access_token] => CAAIf1RH7F34BACdRbUwjgZACWC6VWwaz3RI0cl3Se1kZA6f7uGbuunc2DoKrLkMfcboXeq2Bw9OCpncQZBjzKxy3djnZB9Vs6l0Xf4dvBZCZCZBAv8YvSo5unQjhMh6BZBzBTgyCdzi5ViHVMDuZB9ka5kMVXZBZAI8FqZAYIXtE7r7o9MotJWYqoucm

[fb_597949943584638_user_id] => 1492521344
)
									
*/									
									
									//print_r($_SESSION); 
									
									
									
									
									
									?>
                                    
                                    

    <?php if ($user): ?>
 
 
 
       <div>
      
        <h3>Congratulations Your Logged In: </h3>
        
        
        <p>
        	Remember! <i>"There Is One Car For One Customer Pick Yours Today"</i>
        </p>
        
      <a href="<?php  echo 'logout.php';     //echo $logoutUrl;    ?>">Log Out</a>
                                
                                	 
                                
                                </a>
                                
      </div>
   
    
    
                              <h3>Your Profile Picture</h3>
                              <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

                              <br />

                              <br />
                        
                              <h3>Your Last Vehicle Saved!</h3>
                              
                              <br />
                              
                              <pre><?php 
							  



/*


Array
(
    [id] => 1492521344
    [name] => Benjamin Carter
    [first_name] => Benjamin
    [last_name] => Carter
    [link] => https://www.facebook.com/benjaminzzs
    [username] => benjaminzzs
    [work] => Array
        (
            [0] => Array
                (
                    [employer] => Array
                        (
                            [id] => 246989562008196
                            [name] => Web Entrepreneur
                        )

                    [position] => Array
                        (
                            [id] => 140062059360424
                            [name] => Web Programmer
                        )

                    [start_date] => 2011-08-31
                )

        )

    [gender] => male
    [email] => benwellrounded@gmail.com
    [timezone] => -4
    [locale] => en_US
    [verified] => 1
    [updated_time] => 2013-09-22T03:38:02+0000
)

*/
							  
							  
							  
							  //print_r($user_profile); 
							  
							  
							  
							  
							  ?></pre>
 
 
 
 
 
    <?php else: ?>

			 <strong><em>You are not Connected.</em></strong>
             

               <h3>Public profile of WeFinanceHere.com</h3>
                
                <a href="http://facebook.com/wefinancehere" target="_blank">
                	<img src="https://graph.facebook.com/wefinancehere/picture">
    			</a>


    <?php endif ?>

	<?php //echo $naitik['name']; ?>

            
            
            
            
            
<!-- End Facebook Login Creditianls Here -->            
</div>


<!--==============================footer=================================-->

    <?php include('inc/footer.php'); ?>

</div>

    
</body>
</html>