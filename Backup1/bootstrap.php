<?php require_once('db_functions.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

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
    
  </head>
  <body>
  
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
        <h1>Hello, world!</h1>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

<form id="form-2" name="wefinance_login" action="/sessions/create" method="post">

	<fieldset>
    	<div>
    	<legend><b>Please Login</b></legend>
        </div>
        
        <br />
	    
        <div>
          <label class="prev-indent-bot">Your Email: <br />
   			  <input id="inp" name="user[wfhuser_email_address]" size="40" type="text"  />
            </label>
            
		</div>

	    <div>
          <label class="prev-indent-bot">Your Password: <br />
   			  <input name="user[wfhuser_password]" size="40" type="password"  />
            </label>
            
		</div>

        
        


        
       
       <button class="button" value="login" type="submit">Submit</button>

    </fieldset>

</form>
</div>


<!--==============================footer=================================-->

    <?php include('inc/footer.php'); ?>

</div>

  </body>
</html>