<?php require_once('db_functions.php'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
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

if(!sellingprice || tryprice == 0)
{
	
	if(!specialprice)
	{
		var tryprice = '47000';
		
	}else{
	
		var tryprice = specialprice;
	}
		
}

//alert(tryprice);

var trypricetwo = tryprice  - (tryprice * 0.072);


var trypricethree  = trypricetwo  - (trypricetwo * 0.072);

var trypricefour  = trypricethree  - (trypricethree * 0.072);

var trypricefive  = trypricefour  - (trypricefour * 0.072);


</script>


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

</script>


<div class="container clearfix" id="containerdeal" style="display: block;">

	  <form action="scriptDealMatrix.php" name="FormDealMatrix" id="FormDealMatrix" style="margin:0; padding:0;">
<!-- #first_step -->

          <div id="first_step">
                <h1>Finance This Vehicle <span>Right Here Right Now!</span> !</h1>
  

					<?php include('inc/qualifierInfo.php'); ?>
				    <?php //include("inc/CustomerInformation.php"); ?>

                
<!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit" type="submit" name="submit_first" id="submit_first" value="" />
            </div>      

<!-- End First Step -->         
          <!-- clearfix --><div class="clear"></div><!-- /clearfix -->


            <!-- #second_step -->
            <div id="second_step">
                <h1>Finance This Vehicle <span>Right Here Right Now!</span> !</h1>


						


                <div class="formm">
					
					<?php include("inc/CustomerInformation.php"); ?>
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit" type="submit" name="submit_second" id="submit_second" value="" />
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->


            <!-- #third_step -->
            <div id="third_step">
                <h1>Finance This Vehicle <span>Right Here Right Now!</span> !</h1>

                <div class="form">
                    <select id="age" name="age">
                        <option> 0 - 17</option>
                        <option>18 - 25</option>
                        <option>26 - 40</option>
                        <option>40+</option>
                    </select>
                    <label for="age">Your age range. </label> <!-- clearfix --><div class="clear"></div><!-- /clearfix -->

                    <select id="gender" name="gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <label for="gender">Your Gender. </label> <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                    
                    <select id="country" name="country">
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>Canada</option>
                        <option>Serbia</option>
                        <option>Italy</option>
                    </select>
                    <label for="country">Your country. </label> <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit" type="submit" name="submit_third" id="submit_third" value="" />
                
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
            
            
            <!-- #fourth_step -->
            <div id="fourth_step">
                <h1>Finance This Vehicle <span>Right Here Right Now!</span> !</h1>

                <div class="form">
                    <h2>Summary</h2>
                    
                    <table>
                        <tr><td>Username</td><td></td></tr>
                        <tr><td>Password</td><td></td></tr>
                        <tr><td>Email</td><td></td></tr>
                        <tr><td>Name</td><td></td></tr>
                        <tr><td>Age</td><td></td></tr>
                        <tr><td>Gender</td><td></td></tr>
                        <tr><td>Country</td><td></td></tr>
                    </table>
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="send submit" type="submit" name="submit_fourth" id="submit_fourth" value="" />            
            </div>
            
        </form>

                        <div id="progress_bar">
                            <div id="progress"></div>
                            <div id="progress_text">0% Complete</div>
                        </div>
       
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

</body>
</html>