<?php require_once("db.php"); ?>
<?php

$colname_store_vehicles = "-1";
if (isset($_GET['token'])) {
  $colname_store_vehicles = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['token']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_store_vehicles = "SELECT * 
FROM  
`idsids_idsdms`.`vehicles`
LEFT JOIN 	`idsids_idsdms`.`dealers` ON
 `vehicles`.`did` = `dealers`.`id`
WHERE  
	
		`vehicles`.`vlivestatus` = '1' 
		 AND `vehicles`.`vrprice` IS NOT NULL 
		 AND `vehicles`.`vrprice` > '4990' 
		 AND `dealers`.`token` = '$colname_store_vehicles' 
		 GROUP BY
		 `vehicles`.`vid`
		 ORDER BY `vehicles`.`vyear` DESC, `vehicles`.`vmake` ASC, `vehicles`.`vmodel` ASC, `vehicles`.`vrprice` DESC";
$store_vehicles = mysqli_query($idsconnection_mysqli, $query_store_vehicles);
$row_store_vehicles = mysqli_fetch_array($store_vehicles);
$totalRows_store_vehicles = mysqli_num_rows($store_vehicles);

//if($totalRows_store_vehicles  == 0){ exit(); }

$state = $row_store_vehicles['state'];

if($row_store_vehicles['dealer_type_id'] == 1){
						
						$turn_on_franchise = 'Y';

					$colname_store_vehicles_newv = "-1";
					if (isset($_GET['token'])) {
						$colname_store_vehicles_newv = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['token']));
					}
					mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
					// `vehicles`.`vlivestatus` = '1'  AND `vehicles`.vrprice > '4990' 
					/* 
						AND `vehicles`.`vrprice` > 0
						AND `vehicles`.vcondition = 'New' 
						AND `vehicles`.vrprice > '9990' 
					*/
					$query_store_vehicles_newv = "SELECT * 
					FROM  
					`idsids_idsdms`.`vehicles`
					LEFT JOIN 	`idsids_idsdms`.`dealers` ON
					`vehicles`.`did` = `dealers`.`id`
					WHERE  
						
							`vehicles`.`vlivestatus` = '1' 
						AND `vehicles`.`vrprice` IS NOT NULL 
						AND `vehicles`.`vpurchasecost` > 1
						
						
						AND `vehicles`.vcondition = 'New' 
						
						AND `dealers`.`token` = '$colname_store_vehicles_newv' 
					GROUP BY
						`vehicles`.`vid`

					ORDER BY 
						`vehicles`.`vyear` DESC, `vehicles`.`vmake` ASC, 
						`vehicles`.`vmodel` ASC,
						`vehicles`.`vrprice` DESC
					";
					$store_vehicles_newv = mysqli_query($idsconnection_mysqli, $query_store_vehicles_newv);
					$row_store_vehicles_newv = mysqli_fetch_array($store_vehicles_newv);
					$totalRows_store_vehicles_newv = mysqli_num_rows($store_vehicles_newv);

					$colname_store_vehicles_preownv = "-1";
					if (isset($_GET['token'])) {
						$colname_store_vehicles_preownv = $_GET['token'];
					}
					mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
					$query_store_vehicles_preownv = "SELECT
					* FROM  
					`idsids_idsdms`.`vehicles`
					LEFT JOIN 	`idsids_idsdms`.`dealers` ON
					`vehicles`.`did` = `dealers`.`id`
					WHERE  
						
						`vehicles`.`vlivestatus` = '1' 
						AND `vehicles`.`vrprice` IS NOT NULL 
						AND `vehicles`.vrprice > '4990' 
						
						AND `vehicles`.`vcondition` = 'Used' 
						AND `dealers`.`token` = '$colname_store_vehicles_preownv' 
						GROUP BY
						`vehicles`.`vid`
						ORDER BY `vehicles`.`vyear` DESC, `vehicles`.`vmake` ASC, `vehicles`.`vmodel` ASC, `vehicles`.`vrprice` DESC";
					$store_vehicles_preownv = mysqli_query($idsconnection_mysqli, $query_store_vehicles_preownv);
					$row_store_vehicles_preownv = mysqli_fetch_array($store_vehicles_preownv);
					$totalRows_store_vehicles_preownv = mysqli_num_rows($store_vehicles_preownv);

	
	}else{
		
	$turn_on_franchise = 'N';
	
}



function write_legal_disclaimer($dealer_type_id, $amount_tofinance, $interest_rate, $finance_months){

// start legal disclaimer




	$int = $interest_rate/1200;
	$int1 = 1+$int;
	$r1 = pow($int1, $finance_months);
	
	$pmt = $amount_tofinance*($int*$r1)/($r1-1);
	
	$wpmt = $amount_tofinance*($int*$r1)/($r1-1);

	$pmt = number_format($pmt, 2);


// $calcPmt = 

	if($dealer_type_id == 2){
    	//$pmt = round($pmt/2);
    	$pmt = ($pmt/2);
		$pmt = number_format($pmt, 2);

	 echo "<i class='fa fa-fw fa-dollar'></i> <span class='h3'>$pmt <small>bi-wkly., for $finance_months mo.</small></span>";
								
  }else{
							
	echo "<i class='fa fa-fw fa-dollar'></i> <span class='h3'>$pmt <small>a mo., for $finance_months mo.</small></span>";
	
	//echo $amount_tofinance;
	//echo $r1;
	//echo $wpmt;
	//echo $int1;


 }

   return $dealer_type_id;

   return $finance_months;

   return $pmt;

return;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WeFinanceHere.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/theme.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/animate.css">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <style type="text/css">
		#vdlisting_results{ margin-top:50px;}
	</style>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({
google_ad_client: "ca-pub-123456789",
enable_page_level_ads: true
});
</script>    
</head>

<body>
<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.php"); ?>
    <!-- /.navbar -->



<?php if($turn_on_franchise == 'Y' && $totalRows_store_vehicles_newv != 0){ ?>

	<?php include("_inc.franchise.dstore.php"); ?>

<?php }else{ ?>

	<section class="wrapper-md bg-highlight">
		<div id="vdlisting_results" class="container">
			<div class="row" align="center">


            	<h2><?php echo $row_store_vehicles['company']; ?> </h2>
                
			</div>
       
			<div class="row">


<?php $counter_gridrow=0; ?>
	<?php
	
	
	if($totalRows_store_vehicles != 0):
	
	
	do { 
   
       

	$vrowvid = $row_store_vehicles['vid'];
	$vcondition = $row_store_vehicles['vcondition'];
	$vmake = $row_store_vehicles['vmake'];
	$vmodel = $row_store_vehicles['vmodel'];
	$vecolor_txt = $row_store_vehicles['vecolor_txt'];
	$vbody = $row_store_vehicles['vbody'];
	
	$vlisting_tags = $vrowvid.' '.$vcondition.' '.$vmake.' '.$vmodel.' '.$vecolor_txt.' '.$vbody;

	$dealer_type_id = $row_store_vehicles['dealer_type_id'];

	if($row_store_vehicles['dealer_type_id'] == 2){ $dealer_type = 'bhph';  }else{ $dealer_type = 'franchise'; }


	// Set Deal Matrix Settings Off Turn on if term, apr, docfee, and title fee are present.
	$dematrix_settings = 0;

	$dealmatrix_settings = 0;
	if(isset($row_store_vehicles['settingDefaultTerm'], $row_store_vehicles['settingDefaultAPR'], $row_store_vehicles['settingDocDlvryFee'], $row_store_vehicles['settingTitleFee'])){
	
		$dealmatrix_settings = 1;
	
	}

	
   	$settingDefaultTerm = (int)36;
	if(isset($row_store_vehicles['settingDefaultTerm'])){
			
			$settingDefaultTerm =  (int)$row_store_vehicles['settingDefaultTerm'];

			if(isset($row_find_existingsession_approval['wfhuser_approval_monthterm'])){
				
				
				if($row_store_vehicles['settingDefaultTerm'] < $row_find_existingsession_approval['wfhuser_approval_monthterm']){
					
					
					$settingDefaultTerm = ((int)$row_store_vehicles['settingDefaultTerm']);
				
				}else{
					
					$settingDefaultTerm = (12 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
				}

			}

		
		
		}else if(isset($row_find_existingsession_approval['wfhuser_approval_monthterm'])){
			
		$settingDefaultTerm = (12 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
		
				if($row_store_vehicles['settingDefaultTerm'] < $row_find_existingsession_approval['wfhuser_approval_monthterm']){
					
				$settingDefaultTerm = (12 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
				}else{
				$settingDefaultTerm = ((int)$row_store_vehicles['settingDefaultTerm']);
				}

	}


	$settingDefaultAPR = $row_find_existingsession_approval['wfhuser_approval_apr'];
	
	if(isset($row_store_vehicles['settingDefaultAPR'])){
		
		$settingDefaultAPR = (int)$row_store_vehicles['settingDefaultAPR'];
		
	}else{
		
		if($row_find_existingsession_approval['wfhuser_approval_apr']){
			$settingDefaultAPR = (int)$row_find_existingsession_approval['wfhuser_approval_apr'];
		}else{
			$settingDefaultAPR = (int)18.0;

		}
	}
	
	
	


	if(isset($row_store_vehicles['settingDocDlvryFee'])){
		$settingDocDlvryFee = (int)number_format($row_store_vehicles['settingDocDlvryFee'], 2);
	}else{	
		$settingDocDlvryFee = 250.00;
	}
	if(isset($row_store_vehicles['settingTitleFee'])){
		$settingTitleFee = (int)number_format($row_store_vehicles['settingTitleFee'], 2);
	}else{	
		$settingTitleFee = 55.00;
	}
	if(isset($row_store_vehicles['settingStateInspectnFee'])){
		$settingStateInspectnFee = (int)number_format($row_store_vehicles['settingStateInspectnFee'], 2);
	}else{	
		$settingStateInspectnFee = (int)30.00;
	}	
	
	$cust_wpymt_lowr = 'N';
	$cust_wpymt_higr = 'N';

	$cust_dpymt_lowr = 'N';
	$cust_dpymt_higr = 'N';

	
	
	
	$sysadd_dwnpymt = '200.00';

    //$vrprice = $row_store_vehicles['vrprice'];
	if (is_numeric($vrprice)) {
        //  http://php.net/manual/en/function.is-int.php
	    $VPrice_missing = 0;
	    $VPrice = intval(preg_replace('/[^A-Za-z0-9 ]/', '', $vrprice), 10);
    } else {
	    $VPrice_missing = 1;
	    $VPrice = preg_replace("/[^A-Za-z0-9 ]/", '', $row_store_vehicles['vrprice']);
    }

  $vspecialprice = $row_store_vehicles['vspecialprice'];
	if(isset($row_store_vehicles['vspecialprice'])){

		if (is_numeric($vspecialprice)) {
			//echo "'{$element}' is numeric", PHP_EOL;
			$VSPrice = intval(preg_replace('/[^A-Za-z0-9 ]/', '', $vspecialprice), 10);
			$VSPrice_missing = 0;
		} else {
			$VSPrice = intval(preg_replace("/[^A-Za-z0-9 ]/", '', $vspecialprice), 10);
			$VSPrice_missing = 1;
		}
		if($VSPrice_missing != 1){
			if($VPrice < $VSPrice){
			   $VPrice = $VSPrice;
			}
		}else{
			$VPrice = (int)(5990); 
		}

	}


	if(isset($row_store_vehicles['vpurchasecost'])){ 
			$vpurchasecost_aval = 1;
			$vpurchasecost = intval(preg_replace('/[^A-Za-z0-9 ]/', '', $row_store_vehicles['vpurchasecost']), 10);
	}else{
			$vpurchasecost_aval = 0;
			$vpurchasecost = intval(preg_replace('/[^A-Za-z0-9 ]/', '', $row_store_vehicles['vpurchasecost']), 10);
			
	}

		 
	if(isset($row_store_vehicles['settingSateSlsTax'])){
			$sales_tax = intval(preg_replace("/[^A-Za-z0-9 ]/", '', $row_store_vehicles['settingSateSlsTax']), 10);
	}else{	
			$sales_tax = 6.0;
	}


if(isset($state)){
		
	if($state == 'GA'){
		
		$noTaxes = 'N';
		
		
	}else{
		
		$noTaxes = 'Y';		
	}
}	





	$taxFormatCombined = $VPrice + $settingDocDlvryFee;
	
	$fullsalesTax = round($taxFormatCombined / 100) * $sales_tax;
	
	$newfullsalesTax = $fullsalesTax;
	
	if($noTaxes = 'Y'){

		if(isset($row_store_vehicles['vadvalorem_tax'])){
			$newfullsalesTax = number_format($fullsalesTax, 2);
			$newfullsalesTax = intval(preg_replace("/[^A-Za-z0-9 ]/", '', $row_store_vehicles['vadvalorem_tax']), 10);
		}else{
			
			$newfullsalesTax = preg_replace("/[^A-Za-z0-9 ]/", '', $fullsalesTax);
		}

	}
	

	$dealer_fees = ($settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
	//$dealer_fees = number_format($dealer_fees, 2);
	
	$addedUp = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
	
	$amountTofinance = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
	//$amountTofinance = $addedUp;
	
	$calcPmt = calcPmt($amountTofinance, $settingDefaultAPR, $settingDefaultTerm);
	
	//To Use For display so We Format but not before cal payment.
	$newamountTofinance = number_format($amountTofinance, 2);
	
	$totalPayments = $calcPmt * $settingDefaultTerm;
	//$totalPayments = number_format($totalPayments, 2);

	$financeCharges = ($totalPayments - $amountTofinance);
		
	if($row_store_vehicles['usedmatrixcredit_fminimumprofit']){
		$minimum_fprofit = number_format($row_store_vehicles['usedmatrixcredit_fminimumprofit'], 2);
	}else{
		$minimum_fprofit = $row_store_vehicles['usedmatrixcredit_fminimumprofit'];
	}

	if($row_store_vehicles['usedmatrixcredit_bminimumprofit']){
		$minimum_bprofit = number_format($row_store_vehicles['usedmatrixcredit_bminimumprofit'], 2);
	}else{
		$minimum_bprofit = $row_store_vehicles['usedmatrixcredit_bminimumprofit'];

	}

	$frontend_profit = $VPrice - $vpurchasecost;

	$frontend_profit = number_format($frontend_profit, 2);

	$backend_profit = number_format($financeCharges, 2);


	$counter_gridrow++; 
	$vdisclaimer = "Payments based on sales price plus tax, tag, title with approved credit at $settingDefaultAPR% APR for $settingDefaultTerm months.  Vehicles subject to prior sale. See dealer for details.";




	$vthubmnail_file = $row_store_vehicles['vthubmnail_file'];
	if($vthubmnail_file){
		$open_url = 'https://images.autocitymag.com/'.$row_store_vehicles['did'].'/'.$row_store_vehicles['vid'].'/'.$vthubmnail_file;
	}else{
		$open_url = 'img/WeFinacehere-Orange-Logo-640x480.png';
	}





    
		if(isset($row_store_vehicles['vdprice'])){
			$VDPrice = intval(preg_replace("/[^A-Za-z0-9 ]/", '', $row_store_vehicles['vdprice']), 10);
			
		}else{
			$VDPrice = (int)($VPrice * 0.10); 
		}

		if(isset($row_store_vehicles['vdprice']) && ($row_store_vehicles['vdprice'] > 1)){
		
			$VDPrice = intval(preg_replace("/[^A-Za-z0-9 ]/", '', $row_store_vehicles['vdprice']), 10);
		
		
		}else{
			$VDPrice= ($VPrice * 0.10); 
		}

		if(isset($row_find_existingsession_approval['wfhuser_approval_dwpymt'])){
			
					$wfhuser_approval_dwpymt = number_format($row_find_existingsession_approval['wfhuser_approval_dwpymt'], 2);
		
		}else{
					
					$wfhuser_approval_dwpymt = $row_find_existingsession_approval['wfhuser_approval_dwpymt'];
		
		}
		
		if($wfhuser_approval_dwpymt < $VDPrice){
			
			$with =  'With $'.number_format($VDPrice - $wfhuser_approval_dwpymt, 2).' + $'.$wfhuser_approval_dwpymt;
			
			$total_downpayment = ($VDPrice- $wfhuser_approval_dwpymt) + $wfhuser_approval_dwpymt;

			}elseif($wfhuser_approval_dwpymt > $VDPrice){
				
			$total_downpayment = $wfhuser_approval_dwpymt;
			
			}else{
				
			//$addmore_down  = $new_dwpymt = ($VPrice * 0.10);
			echo $total_downpayment = number_format($total_downpayment, 2);
		}
			
			///echo $wfhuser_approval_dwpymt;
			?>

            
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<div class="overlay-container">
							<img src="<?php echo $open_url; ?>" width="261px" height="195px">
							<div class="overlay-content">
								<h3 class="h4 headline"><?php echo $row_store_vehicles['vcondition']; ?></h3>
								<p><?php if($row_store_vehicles['vdprice']){ echo 'Down Payment $'.$row_store_vehicles['vdprice']; }else{   } ?></p>
							</div><!-- /.overlay-content -->
						</div><!-- /.overlay-container -->
						<div class="thumbnail-meta vehicle_descip_box_layout">
                        
							<p><i class="fa fa-fw fa-car"></i>  | <?php echo $row_store_vehicles['vyear']; ?> <?php echo $row_store_vehicles['vmake']; ?> <?php echo $row_store_vehicles['vmodel']; ?> <?php echo $row_store_vehicles['vtrim']; ?></p>
							<p><i class="fa fa-fw fa-map-marker"></i> <?php echo $row_store_vehicles['city']; ?>, <?php echo $row_store_vehicles['state']; ?> <?php echo $row_store_vehicles['zip']; ?></p>

														<?php if($row_store_vehicles['dealer_type_id'] == 2){ 
														$calcPmt =  ($calcPmt/2);
														?>
                            
                            <p><?php echo '$'.number_format($calcPmt, 2); ?> Bi-weekly For <?php echo $settingDefaultTerm; ?> at <?php echo $settingDefaultAPR; ?>% with <?php echo '$'.formatMoney($total_downpayment); ?> Down, Financing <?php echo '$'.formatMoney(number_format($amountTofinance, 2)); ?>  w.a.c.</p>

														<?php }else{ ?>

                            <p><?php echo '$'.number_format($calcPmt, 2); ?> A Month For <?php echo $settingDefaultTerm; ?> months at <?php echo $settingDefaultAPR; ?>% with <?php echo '$'.formatMoney($total_downpayment); ?> Down, Financing <?php echo '$'.formatMoney($amountTofinance); ?>  w.a.c.</p>

														<?php } ?>
                                                        

                            
						</div>
						<div class="thumbnail-meta">
                        
							<i class="fa fa-fw fa-info-circle"></i> <?php if($row_store_vehicles['vspecialprice'] && $row_store_vehicles['vspecialprice'] > $row_store_vehicles['vrprice']){ echo  '$'.formatMoney($row_store_vehicles['vspecialprice']) .' | '; }else if($VPrice){ echo  '$'.formatMoney($VPrice); }?> Stock #<?php echo $row_store_vehicles['vstockno']; ?> 
                            

						</div>
						<div class="thumbnail-meta">



							<?php 
										//echo '$fullsalesTax: '.$fullsalesTax;
										//echo $noTaxes.'<br />';

											write_legal_disclaimer($dealer_type_id, $amountTofinance, $settingDefaultAPR, $settingDefaultTerm, $settingDefaultTerm); 
							?>

									<a href="vehicle.php?v=<?php echo $row_store_vehicles['vid']; ?>" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
                            
						</div>
					</div><!-- /.thumbnail -->
				</div><!-- /.col -->
<?php } while ($row_store_vehicles = mysqli_fetch_array($store_vehicles)); ?><br>

<?php endif; ?>

		  </div><!-- /.row -->
		</div><!-- /.container -->
	</section>

<?php } ?>













	<section class="wrapper-md">
		<div class="container">
			<h2 class="text-center">Brought To You By WefinanceHere.com Your Automotive Finance Marketplace</h2>
			<p class="text-center lead">Very easy to finance a vehicle today.  You came to the right place.</p>
			<br class="spacer-lg">
			<div class="row">
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-primary">
						<h2><i class="fa fa-list"></i> Listing</h2>
						<p class="lead">We have already sold more than 50,000 Automobiles and we are still going at very good pace. </p>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-info">
						<h2><i class="fa fa-flag"></i> Advertise</h2>
						<p class="lead">We have already sold more than 125,000 Customers and we are still going at very good pace. </p>
					</div>
			  </div><!-- /.col -->
				<div class="col-sm-12 col-md-4 text-center">
					<div class="widget padding-md bg-primary">
						<h2><i class="fa fa-question-circle"></i> Finance</h2>
						<p class="lead">We have more than $<?php echo $total_avilable; ?> to lend and we are still going at very good pace. </p>
					</div>
			  </div><!-- /.col -->
		  </div><!-- /.row -->
		</div><!-- /.container -->
	</section>

	<?php include("_footer.php"); ?>

	<!-- last but not least the javascript -->
	<script src="js/jquery-2.1.1.js"></script>
   	<script src="js/plugin/wow/wow.js" type="text/javascript"></script>     
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
    <script src="js/custom/approval.widget.js"></script>
    <script src="js/custom/dstore.js"></script>
	<script src="assets/js/holder.js"></script>
</body>
</html>
<?php
mysqli_free_result($states);

mysqli_free_result($markets);
?>
