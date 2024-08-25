<?php include('db_functionsMultistep.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Deal Matrix</title>
        <link type="text/css" rel="stylesheet" href="css/rhinoslider-1.05.css" />
        <link type="text/css" rel="stylesheet" href="css/therhino.css" />        
        
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/rhinoslider-1.05.min.js"></script>
        <script type="text/javascript" src="js/mousewheel.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/rhino.js"></script>
        
        
        <script type="text/javascript" src="js/matrixcalc.js"></script>
        
        










<script type="text/javascript" >

function DownPaymentChngd() {

//var dp = document.write.FormDealMatrix.DownPayment.value;

var dpriceform = document.getElementById('DownPayment').value;

var dpricedb = '<?php echo $DownPayment; ?>';

var purchasepower = document.getElementById('prequalifyLoanAmt').value;
 //document.getElementById('CreditProfileBox').style.display = 'block';
//alert(purchasepower);

	//alert(dpricedb);

	if(dpriceform > dpricedb){
	
		if(purchasepower > 0){
		alert("YES! CONGRATULATIONS YOU HAVE BEEN PRE-APPROVED FOR THIS CAR");
		document.getElementById('bxfCalc').style.display = 'block';
		document.getElementById('windowDialog').style.display = 'block';
		}
		
	
	}else
	{
		alert("Sorry I Can't Approve You On This Vehicle At This Time... Please Keep Car Shopping");
		document.getElementById('bxfCalc').style.display = 'none';	
		
	}


}
</script>




        
    </head>
    <body>
        <div id="page">
            <div id="wrapper">
                <h3>Deal Matrix - Get Pre-Approved, Finance This Vehicle Right Here Right Now!</h3>
	  <form action="scriptDealMatrix.php" name="FormDealMatrix" id="FormDealMatrix" style="margin:0; padding:0;">

                    <div id="slider">
                    
                    
<!-- Pre-Qualify -->     
						<?php include('inc/Pre-Qualify.php'); ?>               




<!-- Personal-Details -->
						<?php include('inc/Personal-Details.php'); ?>



<!-- Delivery-Appt-Time -->
						<?php include('inc/Delivery-Appt-Time.php'); ?>




<!-- Congratulations -->
						<?php include('inc/Congratulations.php'); ?>

</div>
                        
                    
                </form>
                
            </div>
        </div>
    </body>
</html>
