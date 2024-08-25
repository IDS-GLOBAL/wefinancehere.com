<!--Start Only Navigation -->
        	<h1><a class="logo" href="http://wefinancehere.com">&nbsp;</a></h1>
            
        	<!-- <h1><a class="logo" href="#">Cars</a><strong>Sell &amp; Buy Portal</strong></h1> -->
                <div class="extra-box">

                    <a class="button-top" href="signin.php">GET APPROVED TODAY!</a>

                            <ul class="sub-menu">
<?php
// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();

?>

	                            <li><a href="home.php?loginfb=true"><strong>My Dashboard</strong> </a></li>
            
                                <!-- li><a href="#">My Favorites </a></li-->
            
                                <li><a href="myacct.php"><strong>My Account</strong> </a></li>
            
                                <li><a href="privacy.php">Help </a></li>


<?php
  //echo "<li><a href='$logoutUrl'>Logout</a></li>";
  echo "<li><a href='logout.php'>Logout</a></li>";  
} else {
	
?>


	                            <li><a href="signin.php"><strong>New User?</strong> </a></li>
            
                                <li><a href="signin.php">Register </a></li>
            
                                <li id="topfbnavigation"><a href="<?php echo $loginUrl; ?>"><img src="images/icons/fbCapture.png" /></a></li>
            
                                <li><a href="privacy.php">Help </a></li>


<?php	
  
  echo "<li><a href='$loginUrl'>Login</li>";
}

// This call will always work since we are fetching public data.
$naitik = $facebook->api('/naitik');

?>
            			                            
                            
							                                
                                
                                
            
                            </ul>
<!--br />Currently Under Development -->
                </div>

    <br />
    







            <div class="extra-box">

            	<ul class="sub-menu">

                	<li><a href="#">Do I Qualify?</a></li>

                    <li><a href="#">Finance Calculator </a></li>

                    <li><a href="#">Car Insurance</a></li>

                    <li><a href="#">News and Reviews </a></li>

                </ul>

            </div>