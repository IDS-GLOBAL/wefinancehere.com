<?php require_once("db.php"); ?>
<?php


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_types = "
	SELECT  DISTINCT `dealers`.`dealer_type_id`, `dealer_types`.`dtype_label`, count( * ) AS `dealer_type_count`
			FROM `dealer_types`, `dealers`, `vehicles`
			WHERE `vehicles`.`did` = `dealers`.`id` 
				$cust_home_state_sql
				AND `dealers`.`status` = '1'
				AND `dealers`.`dealer_type_id` =  `dealer_types`.`dtype_id`
				AND `vehicles`.`vlivestatus` = '1'
				$bigSellingPrice_sql
				AND `vehicles`.`vrprice` AND `vehicles`.`vthubmnail_file` IS NOT NULL GROUP BY `dealers`.`dealer_type_id`
";
$dealer_types = mysqli_query($idsconnection_mysqli, $query_dealer_types);
$row_dealer_types = mysqli_fetch_array($dealer_types);
$totalRows_dealer_types = mysqli_num_rows($dealer_types);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_names = "
	SELECT  DISTINCT `dealers`.`company`, `dealers`.`token`
			FROM `idsids_idsdms`.`dealers`, `idsids_idsdms`.`vehicles`
			WHERE `vehicles`.`did` = `dealers`.`id` 
				$cust_home_state_sql
				AND `dealers`.`status` = '1'
				AND `vehicles`.`vlivestatus` = '1'
				$bigSellingPrice_sql
				AND `vehicles`.`vrprice` AND `vehicles`.`vthubmnail_file` IS NOT NULL
";
$dealer_names = mysqli_query($idsconnection_mysqli, $query_dealer_names);
$row_dealer_names = mysqli_fetch_array($dealer_names);
$totalRows_dealer_names = mysqli_num_rows($dealer_names);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_dstinct_vmakes = "SELECT vehicles.vmake, count( * ) AS total_records
							FROM `idsids_idsdms`.`vehicles`, `idsids_idsdms`.`dealers` 
							WHERE `vehicles`.`did` = `dealers`.`id` 
							$cust_home_state_sql
							AND `vehicles`.`vlivestatus` = '1'
							AND `dealers`.`status` = '1'
							$bigSellingPrice_sql
							AND `vehicles`.`vrprice` AND `vehicles`.`vthubmnail_file` IS NOT NULL GROUP BY `vehicles`.`vmake`";
$dstinct_vmakes = mysqli_query($idsconnection_mysqli, $query_dstinct_vmakes);
$row_dstinct_vmakes = mysqli_fetch_array($dstinct_vmakes);
$totalRows_dstinct_vmakes = mysqli_num_rows($dstinct_vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_dstinct_vmodels = "SELECT vehicles.vmodel, count( * ) AS total_records
							FROM vehicles, dealers 
							WHERE vehicles.did = dealers.id 
							$cust_home_state_sql
							AND vehicles.vlivestatus = '1'
							AND dealers.status = '1'
							$bigSellingPrice_sql
							AND `vehicles`.`vrprice` AND `vehicles`.`vthubmnail_file` IS NOT NULL GROUP BY `vehicles`.`vmodel`";
$dstinct_vmodels = mysqli_query($idsconnection_mysqli, $query_dstinct_vmodels);
$row_dstinct_vmodels = mysqli_fetch_array($dstinct_vmodels);
$totalRows_dstinct_vmodels = mysqli_num_rows($dstinct_vmodels);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_dstinct_bstyles = "SELECT vehicles.vbody, count( * ) AS total_records
							FROM vehicles, dealers 
							WHERE vehicles.did = dealers.id 
							$cust_home_state_sql
							AND vehicles.vlivestatus = '1'
							AND dealers.status = '1'
							$bigSellingPrice_sql
							AND `vehicles`.`vrprice` AND `vehicles`.`vthubmnail_file` IS NOT NULL GROUP BY `vehicles`.`vbody`";
$dstinct_bstyles = mysqli_query($idsconnection_mysqli, $query_dstinct_bstyles);
$row_dstinct_bstyles = mysqli_fetch_array($dstinct_bstyles);
$totalRows_dstinct_bstyles = mysqli_num_rows($dstinct_bstyles);


$query_distinct_vehsubmkts = "SELECT * FROM `idsids_wefinancehere`.`markets_dm`, `idsids_wefinancehere`.`markets_sub_dm`, `idsids_wefinancehere`.`states` WHERE `markets_dm`.`market_id` = `markets_sub_dm`.`market_id`  AND `states`.`state_id` = `markets_dm`.`state_id` AND `states`.`state_abrv` = '$cust_home_state'";
$distinct_vehsubmkts = mysqli_query($wfh_connection_mysqli, $query_distinct_vehsubmkts);
$row_distinct_vehsubmkts = mysqli_fetch_array($distinct_vehsubmkts);
$totalRows_distinct_vehsubmkts = mysqli_num_rows($distinct_vehsubmkts);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_dstinct_vcolors = "SELECT `vehicles`.`vecolor_txt`, count( * ) AS total_records
							FROM `vehicles`, `dealers` 
							WHERE `vehicles`.`did` = `dealers`.`id` 
							$cust_home_state_sql
							AND `vehicles`.`vlivestatus` = '1'
							AND `dealers`.`status` = '1'
							$bigSellingPrice_sql
							AND `vehicles`.`vrprice` AND `vehicles`.`vthubmnail_file` IS NOT NULL GROUP BY `vehicles`.`vecolor_txt` ORDER BY `total_records` DESC, `vehicles`.`vecolor_txt` ASC ";
$dstinct_vcolors = mysqli_query($idsconnection_mysqli, $query_dstinct_vcolors);
$row_dstinct_vcolors = mysqli_fetch_array($dstinct_vcolors);
$totalRows_dstinct_vcolors = mysqli_num_rows($dstinct_vcolors);

$colname_find_state_geo = "-1";
if (isset($_GET['state'])) {
  $colname_find_state_geo = $_GET['state'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_state_geo =  "SELECT * FROM `idsids_idsdms`.`states` WHERE states.state_abrv = '$colname_find_state_geo' ORDER BY `state_id` ASC";
$state_geo = mysqli_query($idsconnection_mysqli, $query_state_geo);
$row_state_geo = mysqli_fetch_array($state_geo);
$totalRows_state_geo = mysqli_num_rows($state_geo);
if($cust_home_state_missing == "Y"){ header("Location: states.php"); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({
google_ad_client: "ca-pub-123456789",
enable_page_level_ads: true
});
</script>

	<meta charset="utf-8">
	<title>WeFinanceHere.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Vehicles <?php if(isset($_GET['state'])){ echo 'in the state of '.$_GET['state'];  } ?> on wefinancehere.com">
	<meta name="author" content="webgoonie">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/theme.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/plugin/jasny-bootstrap/css/jasny-bootstrap.css">
    <!-- Sweet Alert -->
    <link href="css/plugin/sweetalert/sweetalert.css" rel="stylesheet">    
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<script src="js/jquery-2.1.1.js"></script>
    <script src="js/custom/vehicles.js"></script>
</head>

<body>
<?php include("analyticstracking.php"); ?>
<!-- Start Modals -->
		<?php include("inc/wfh.modals.php"); ?>
<!-- End Modals -->



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.vehicles.php"); ?>
    <!-- /.navbar -->
    
    
    
	<input id="approval_email" type="hidden" value="">

	


	<section class="wrapper-md">
		<div id="vdlisting_results" class="container">
        
        
        
			<div class="row">
				<!-- Main -->
				<div class="col-sm-12 col-md-9">




<?php if($totalRows_LiveVehicles !== 0):

$vcondition = $row_LiveVehicles['vcondition'];
$vmake = $row_LiveVehicles['vmake'];
$vmodel = $row_LiveVehicles['vmodel'];
$vecolor_txt = $row_LiveVehicles['vecolor_txt'];
$vbody = $row_LiveVehicles['vbody'];

$vlisting_tags = $vcondition.' '.$vmake.' '.$vmodel.' '.$vecolor_txt.' '.$vbody;

endif;

?>














<?php //echo '$totalRows_LiveVehicles: '.$totalRows_LiveVehicles; ?>

<?php if($totalRows_LiveVehicles != 0): ?>


	<h1>Results: <span id="totalRows_LiveVehicles"><?php echo $totalRows_LiveVehicles; ?></span> Vehicles Found</h1>
	<?php $counter_gridrow = 0; ?>
	<?php do { 

	$vrowvid = $row_LiveVehicles['vid'];
	$vcondition = $row_LiveVehicles['vcondition'];
	$vmake = $row_LiveVehicles['vmake'];
	$vmodel = $row_LiveVehicles['vmodel'];
	$vecolor_txt = $row_LiveVehicles['vecolor_txt'];
	$vbody = $row_LiveVehicles['vbody'];
	
	$vlisting_tags = $vrowvid.' '.$vcondition.' '.$vmake.' '.$vmodel.' '.$vecolor_txt.' '.$vbody;
	
	
	
	
	// Set Deal Matrix Settings Off Turn on if term, apr, docfee, and title fee are present.
		$dematrix_settings = 0;
	
	$dealmatrix_settings = 0;
	if(isset($row_LiveVehicles['settingDefaultTerm'], $row_LiveVehicles['settingDefaultAPR'], $row_LiveVehicles['settingDocDlvryFee'], $row_LiveVehicles['settingTitleFee'])){
	
		$dealmatrix_settings = 1;
	
	}

	
   	$settingDefaultTerm = (int)36;
	if(isset($row_LiveVehicles['settingDefaultTerm'])){

			if(isset($row_find_existingsession_approval['wfhuser_approval_monthterm'])){
				if($row_LiveVehicles['settingDefaultTerm'] > $row_find_existingsession_approval['wfhuser_approval_monthterm']){
				$settingDefaultTerm = ((int)$row_LiveVehicles['settingDefaultTerm']);
				}else{
				$settingDefaultTerm = (12 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
				}

			}

		
		
		}elseif(isset($row_find_existingsession_approval['wfhuser_approval_monthterm'])){

		$settingDefaultTerm = (12 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
		
				if($row_LiveVehicles['settingDefaultTerm'] < $row_find_existingsession_approval['wfhuser_approval_monthterm']){
					
				$settingDefaultTerm = (12 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
				}else{
				$settingDefaultTerm = ((int)$row_LiveVehicles['settingDefaultTerm']);
				}

	}





	$settingDefaultAPR = $row_find_existingsession_approval['wfhuser_approval_apr'];
	if(isset($row_LiveVehicles['settingDefaultAPR'])){
		$settingDefaultAPR = $row_LiveVehicles['settingDefaultAPR'];
		
		
		if($row_find_existingsession_approval['wfhuser_approval_apr']){
			
			if($row_find_existingsession_approval['wfhuser_approval_apr'] > $row_LiveVehicles['settingDefaultAPR']){
				$settingDefaultAPR = $row_LiveVehicles['settingDefaultAPR'];
				
			}
			
			
		}else{
			$settingDefaultAPR = 18.0;

		}
		
		
	}else{
		if($row_find_existingsession_approval['wfhuser_approval_apr']){
			$settingDefaultAPR = $row_find_existingsession_approval['wfhuser_approval_apr'];
		}else{
			$settingDefaultAPR = 18.0;

		}
	}


	if(isset($row_LiveVehicles['settingDocDlvryFee'])){
		$settingDocDlvryFee = number_format($row_LiveVehicles['settingDocDlvryFee'], 2);
	}else{	
		$settingDocDlvryFee = 250.00;
	}
	if(isset($row_LiveVehicles['settingTitleFee'])){
		$settingTitleFee = number_format($row_LiveVehicles['settingTitleFee'], 2);
	}else{	
		$settingTitleFee = 55.00;
	}
	if(isset($row_LiveVehicles['settingStateInspectnFee'])){
		$settingStateInspectnFee = number_format($row_LiveVehicles['settingStateInspectnFee'], 2);
	}else{	
		$settingStateInspectnFee = 30.00;
	}	
	
	$cust_wpymt_lowr = 'N';
	$cust_wpymt_higr = 'N';

	$cust_dpymt_lowr = 'N';
	$cust_dpymt_higr = 'N';

	
	
	
	$sysadd_dwnpymt = (float) 200.00;

    $vrprice = (float) $row_LiveVehicles['vrprice'];
	if (is_numeric($vrprice)) {
        //  http://php.net/manual/en/function.is-int.php
	    $VPrice_missing = 0;
	    //$VPrice = intval(preg_replace('/[^0-9]+/', '', $vrprice), 10);
	    $VPrice = (float) $vrprice;
    } else {
	    $VPrice_missing = 1;
	    $VPrice = (float) $row_LiveVehicles['vrprice'];
    }

    $vspecialprice = $row_LiveVehicles['vspecialprice'];
	if(isset($row_LiveVehicles['vspecialprice'])){

		if (is_numeric($vspecialprice)) {
			//echo "'{$element}' is numeric", PHP_EOL;
			$VSPrice = intval(preg_replace('/[^0-9]+/', '', $vspecialprice), 10);
			$VSPrice_missing = 0;
		} else {
			$VSPrice = (float) $row_LiveVehicles['vspecialprice'];
			$VSPrice_missing = 1;
		}
		if($VSPrice_missing != 1){
			if((float)  $VPrice < (float) $VSPrice){
				(float)  $VPrice = (float)  $VSPrice;
			}
		}

	}


	if(isset($row_LiveVehicles['vpurchasecost'])){ 
			$vpurchasecost_aval = 1;
			
			$vpurchasecost = (float) $row_LiveVehicles['vpurchasecost'];
	}else{
			$vpurchasecost_aval = 0;
			$vpurchasecost = (float) $row_LiveVehicles['vpurchasecost'];
	}

		 
	if(isset($row_LiveVehicles['settingSateSlsTax'])){
		$sales_tax = $row_LiveVehicles['settingSateSlsTax'];
	}else{	
		$sales_tax = 6.0;
	}

	
	if($_GET['state'] == 'GA'){
		
		$noTaxes = 'N';
		
		
	}else{
		
		$noTaxes = 'Y';		
	}
	
	
	$taxFormatCombined = $VPrice + $settingDocDlvryFee;
	
	$fullsalesTax = ($taxFormatCombined / 100) * $sales_tax;
	
	$newfullsalesTax = number_format($fullsalesTax, 2);
	
	if($noTaxes = 'Y'){ 
		if(isset($row_LiveVehicles['vadvalorem_tax'])){
			
			$newfullsalesTax = $row_LiveVehicles['vadvalorem_tax'];
		}else{
			
			$newfullsalesTax = 0.00;
		}
	}
	
	$dealer_fees = ($settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
	$dealer_fees = number_format($dealer_fees, 2);
	
	$addedUp = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
	
	//$amountTofinance = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
	$amountTofinance = $addedUp;
	
	$calcPmt = calcPmt($amountTofinance, $settingDefaultAPR, $settingDefaultTerm);
	
	//To Use For display so We Format but not before cal payment.
	$newamountTofinance = number_format($amountTofinance, 2);
	
	$totalPayments = $calcPmt * $settingDefaultTerm;
	//$totalPayments = number_format($totalPayments, 2);

	$financeCharges = ($totalPayments - $amountTofinance);
	
	if($row_LiveVehicles['usedmatrixcredit_fminimumprofit']){
		$minimum_fprofit = number_format($row_LiveVehicles['usedmatrixcredit_fminimumprofit'], 2);
	}else{
		$minimum_fprofit = $row_LiveVehicles['usedmatrixcredit_fminimumprofit'];
	}

	if($row_LiveVehicles['usedmatrixcredit_bminimumprofit']){
		$minimum_bprofit = number_format($row_LiveVehicles['usedmatrixcredit_bminimumprofit'], 2);
	}else{
		$minimum_bprofit = $row_LiveVehicles['usedmatrixcredit_bminimumprofit'];

	}

	$frontend_profit = $VPrice - $vpurchasecost;
	//$frontend_profit = $VSPrice - $vpurchasecost;
	$frontend_profit = number_format($frontend_profit, 2);

	$backend_profit = number_format($financeCharges, 2);


$counter_gridrow++; 
$vdisclaimer = "Payments based on sales price plus tax, tag, title with approved credit at $settingDefaultAPR % APR for $settingDefaultTerm months.  Vehicles subject to prior sale. See dealer for details.";

?>
<div class="row vlisting <?php echo $vlisting_tags; ?>">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-<?php echo $row_LiveVehicles['vid']; ?>1" data-toggle="tab"><i class="fa fa-fw fa-car"></i> Vehicle</a></li>
                    <li><a href="#tab-<?php echo $row_LiveVehicles['vid']; ?>2" data-toggle="tab"><i class="fa fa-fw fa-building"></i> Dealer</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab-<?php echo $row_LiveVehicles['vid']; ?>1">
                            
					<div id="ftrdvlistings" class="row">
						<article class="post">
							<div class="panel panel-secondary">
                            
                            
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-fw fa-car"></i> Featured Vehicle </h3>
								</div>
                            
                            
                                
								<div class="panel-body bg-highlight">
                                 <div class="row" align="center">
                                 	
                                        <h2><a id="vdescript_txt"><?php echo $row_LiveVehicles['vyear']; ?> <?php echo $row_LiveVehicles['vmake']; ?> <?php echo $row_LiveVehicles['vmodel']; ?> <?php echo $row_LiveVehicles['vtrim']; ?></a></h2>
                                    
                                 </div>
                                 <div class="row">
                                 
                                
									<div class="col-sm-12 col-md-5">
<?php if(!$row_LiveVehicles['vthubmnail_file']): ?>									
                                        
                                        <a href="#link"><img class="img-responsive img-thumbnail" src="img/WeFinacehere-Orange-Logo-640x480.png"></a>

<?php else: ?>
<?php
$vthubmnail_file_path = $row_LiveVehicles['vthubmnail_file'];
$vthumdid = $row_LiveVehicles['id'];
$vthumvid = $row_LiveVehicles['vid'];


$open_url = 'https://images.autocitymag.com'."/$vthumdid/$vthumvid/".$vthubmnail_file_path;
?>



        <a href="#link"><img class="img-responsive img-thumbnail" src="<?php echo $open_url; ?>"></a>





<?php endif; ?>

                                        
									</div>
								
                                	<div class="col-sm-12 col-md-7">
										
                                        <div class="row">
        <div class="col-sm-6 pull-left">
            <h6><?php
    
		if($row_LiveVehicles['vdprice']){
		$VDPrice = $row_LiveVehicles['vdprice'];
		}else{
			$VDPrice = ($VPrice * 0.10); 
		}

		if(isset($row_LiveVehicles['vdprice']) && ($row_LiveVehicles['vdprice'] > 0)){
		
			$vdprice = number_format($row_LiveVehicles['vdprice'], 2); 
		
		}else{
			$vdprice = ($VPrice * 0.10); 
		}

		if(isset($row_find_existingsession_approval['wfhuser_approval_dwpymt'])){
			
$wfhuser_approval_dwpymt = number_format($row_find_existingsession_approval['wfhuser_approval_dwpymt'], 2);
		
		}else{
$wfhuser_approval_dwpymt = $row_find_existingsession_approval['wfhuser_approval_dwpymt'];
		
		}
		
		if($wfhuser_approval_dwpymt < $VDPrice){
			
			echo 'With $'.number_format($VDPrice - $wfhuser_approval_dwpymt, 2).' ';
			
			if($wfhuser_approval_dwpymt){ echo ' + $'.$wfhuser_approval_dwpymt; };
			
			$total_downpayment = ($VDPrice - $wfhuser_approval_dwpymt) + $wfhuser_approval_dwpymt;

			}elseif($wfhuser_approval_dwpymt > $VDPrice){
				
			$total_downpayment = $wfhuser_approval_dwpymt;
			
			}else{
				
			//$addmore_down  = $new_dwpymt = ($VPrice * 0.10);
			echo $total_downpayment = number_format($total_downpayment, 2);
		}
			
			///echo $wfhuser_approval_dwpymt;
			?>
            </h6>
            <h6>Total Down: $<?php echo number_format($total_downpayment, 2); ?></h6>
            <h3>Sign And Drive Today!</h3>
            <br />
        </div>

		<?php if($dematrix_settings == 1): ?>
        


        <div class="col-sm-6 pull-right vc">
        	<br />
            <h4>Ownership Avilable Today!</h4> 


        <?php $calcPmt = calcPmt( $VPrice, $creditapr, $settingDefaultTerm); ?> 
        
        	<?php 
			if($row_LiveVehicles['dealer_type_id'] == '2'){ 
			
			$biwklypymt =  number_format(($calcPmt/2), 2);
			
			?>
            <h2>$<?php echo $biwklypymt; ?> <small class="small">Bi-wkly.</small></h2>            
            <?php }else{ ?>
            <h2>$<?php echo number_format($calcPmt, 2); ?> <small class="small">A Month</small></h2>
            <?php } ?>
            
            
            <h6>For <?php echo $settingDefaultTerm; ?> Months</h6>
            
        </div>

        
        <?php else: ?>
        <div class="col-sm-6 pull-right vc">
        	<br />
            <h4>Contract This Vehicle <?php echo $VPrice;?></h4> 
            
            
           	<?php if($VPrice){ ?>  
        	<?php $calcPmt = calcPmt( $VPrice, $settingDefaultAPR, $settingDefaultTerm ); ?> 
        	<?php 
			if($row_LiveVehicles['dealer_type_id'] == '2'){ 
			
			$biwklypymt =  number_format(($calcPmt/2), 2);
			
			?>
            <h2>$<?php echo $biwklypymt; ?> <small class="small">Bi-wkly.</small></h2>            
            <?php }else{ ?>
            <h2>$<?php echo number_format($calcPmt, 2); ?> <small class="small">A Month</small></h2>
            <?php } ?>
            
            
            <h6>For <?php echo $settingDefaultTerm; ?> Months</h6>
            
                     
            <?php } ?>           




        </div>
        
        <?php endif; ?>



    
    </div>
	<div class="row vc">
    	<div class="col-sm-12">
           	<p class="smldsclmr"><?php echo $vdisclaimer; ?>% APR for <?php echo $settingDefaultTerm; ?></p>
        </div>
    </div>                                        
                                       
                                        
                                        <?php if($row_LiveVehicles['vcomments']){ ?>
                                        <div class="row vc">
										<p><span class="label label-primary">Comments:</span> <?php echo $vcomments_short = substr($row_LiveVehicles['vcomments'], -100); ?></p>
                                        </div>
                                        <?php } ?>
                                        
                                        <div class="row vc">
                                            <div class="col-sm-12 pull-left">
                                            <ul class="list-only">
                                                <li><i class="fa fa-fw fa-th"></i> <span class="text-muted"><?php echo $row_LiveVehicles['vcondition']; ?></span></li>
                                                
                                                <?php if($row_LiveVehicles['vphoto_count']){ ?>
                                                <li><i class="fa fa-fw fa-camera"></i> <?php echo $row_LiveVehicles['vphoto_count']; ?> </li>
                                                <?php } ?>
                                                
                                                <li><i class="fa fa-fw fa-map-marker"></i> <?php echo $row_LiveVehicles['city']; ?>, <?php echo $row_LiveVehicles['state']; ?> <?php echo $row_LiveVehicles['zip']; ?></li>
                                                
    
    <?php if(!$row_LiveVehicles['vspecialprice']){ ?>
    
                                              <?php if (is_numeric($VPrice)){ ?>

                                                <li><i class="fa fa-fw fa fa-money"></i> 
                                                    Price: $<?php echo formatMoney($VPrice); ?>
                                                </li>
												<?php } ?>                         

    <?php }else{ ?>
    											
                                                <?php if (is_numeric($VSPrice)){ ?>
                                                
    
                                                <li><i class="fa fa-fw fa fa-money"></i> 
                                                    Special Price: $<?php echo formatMoney($VSPrice); ?>
                                                </li>
												<?php } ?>                         
    <?php } ?>                         
                                                <li><i class="fa fa-fw fa fa-money"></i> Down Payment: $<?php echo formatMoney(number_format($VDPrice, 2)); ?></li>
                                                
                                                
                                                
                                                
                                                
                                            </ul>
                                        	</div>
                                            <div class="col-sm-6 pull-left" style="display:none;">
                                            <ul class="list-unstyled">
                                            	<li><?php echo $row_LiveVehicles['vbody']; ?></li>
                                            	<li><?php echo $row_LiveVehicles['vecolor_txt']; ?></li>
                                            	<li><?php echo $row_LiveVehicles['vicolor_txt']; ?></li>
                                            	<li><?php echo $row_LiveVehicles['vtransm']; ?></li>
                                            </ul>
                                            </div>
                                        </div>
                                        <div class="row">
										
                                        



    <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group"> 
        <a id="<?php echo $row_LiveVehicles['vid']; ?>" rel="<?php echo $wfhuser_approval_id; ?>" title="<?php echo $vdescript_txt; ?>"  class="btn btn-default vsavemyv"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</a> 
        <a id="<?php echo $row_LiveVehicles['vid']; ?>" title="<?php echo $vdescript_txt; ?>" class="btn btn-default" rel="<?php echo $wfhuser_approval_id; ?>" href="vehicle.php?v=<?php echo $row_LiveVehicles['vid']; ?>"><i class="fa fa-car" aria-hidden="true"></i> View Details</a> 
        <a id="<?php echo $row_LiveVehicles['vid']; ?>" title="<?php echo $vdescript_txt; ?> | Own Today" class="btn btn-default" rel="<?php echo $wfhuser_approval_id; ?>" href="vehicle.php?v=<?php echo $row_LiveVehicles['vid']; ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> OwnToday</a> 
    </div>
                                        
                                      </div>
									</div>
								 
                                 </div>
                                 
                                </div><!-- /.panel-body -->
							
                            
                            
                            
                            
                            
                            
                            
                            
                            </div><!-- /.panel -->
						</article><!-- /.post -->
					</div>
                    <!-- /.row -->

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane fade" id="tab-<?php echo $row_LiveVehicles['vid']; ?>2">
                    
                    


                    
            <div class="row">
                <article class="post">
                    <div class="panel panel-secondary">
                    
                    
                        <div class="panel-heading2">
                            <h3 class="panel-title">Featured Dealer </h3>
                        </div>
                    
                    
                        
                        <div class="panel-body bg-highlight">

                            <div class="col-sm-12 col-md-7">
                                <h3><a href="vehicle.php?v=<?php echo $row_LiveVehicles['vid']; ?>" target="_blank"><?php echo $row_LiveVehicles['company']; ?></a></h3>
                             
                            <?php if($row_LiveVehicles['slogan']){ ?>
                            <p><span class="label label-primary">SLOGAN</span> <?php echo $row_LiveVehicles['slogan']; ?></p>
                            <?php } ?>



                                <div class="col-sm-6">
                                
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-fw fa-th"></i> <span class="text-muted"><?php echo $row_LiveVehicles['vdprice']; ?></span></li>
                                        <li><i class="fa fa-fw fa-columns"></i> <?php echo $row_LiveVehicles['address']; ?> </li>
                                        <li><i class="fa fa-fw fa-female"></i> <?php echo $row_LiveVehicles['city']; ?></li>
                                        <li><i class="fa fa-fw fa-truck"></i> <?php echo $row_LiveVehicles['state']; ?></li>
                                        <li><i class="fa fa-fw fa-signal"></i> <?php echo $row_LiveVehicles['zip']; ?></li>
                                    </ul>
                                
                                
                                </div>
                                <div class="col-sm-6">
    
                                
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-fw fa-columns"></i> Term: <?php echo $settingDefaultTerm; ?> </li>
                                        <li><i class="fa fa-fw fa-female"></i> APR: <?php echo $settingDefaultAPR; ?></li>
                                        <li><i class="fa fa-fw fa-truck"></i> Doc: <?php echo $settingDocDlvryFee; ?></li>
                                        <li><i class="fa fa-fw fa-signal"></i> Title: <?php echo $settingTitleFee; ?></li>
                                    </ul>
                                
                                
                                </div>







                                
                                
                                
                                <p><a href="dstore.php?token=<?php echo $row_LiveVehicles['token']; ?>" target="_blank" class="btn btn-primary">View Our Entire Inventory »</a></p>
                            </div><!-- /.col -->


                                <div class="col-sm-12 col-md-5">
                                
                                <?php if($wfh_did_photo_open_url = $row_LiveVehicles['wfh_did_photo_open_url']){ ?>
                                 <a href="#link"><img class="img-responsive img-thumbnail" src="<?php echo $wfh_did_photo_open_url; ?>"></a>
                                 <?php }else{ ?>
                                 <a href="#link"><img class="img-responsive img-thumbnail" src="img/default.png"></a>
                                 <?php } ?>
                                 
                                </div>



                        </div><!-- /.panel-body -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    </div><!-- /.panel -->
                </article><!-- /.post -->
            </div>
            <!-- /.row -->


                    
                    
                    
                    
                    
                    
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            
            
                    
                    
</div>				
<?php } while ($row_LiveVehicles = mysqli_fetch_array($LiveVehicles)); ?>

<?php else: ?>


<div class="row">
    <div class="col-md-12">
        <h2>Waste No More Time Get The Loan You Deserve Today</h2>
        <a class="btn btn-default btn-lg btn-block">Vehicles</a>
    </div>
</div>
<?php endif; ?>   
                    
                    
                    
                    
					<!-- Pagination -->
					<div class="row">
						<div class="col-sm-12">
















                        










						</div><!-- /.col -->
					</div><!-- /.row --> <!-- End of pagination -->
				
                
                
                
                
                
               
                </div>

			
				<!-- Sidebar -->
                <?php include("_inc_tallpublic_tower.php"); ?>
                <!-- End of sidebar -->

            
            
            </div><!-- /.row -->
		
        
        
        </div><!-- /.container -->
	</section>


	<?php include("_footer.php"); ?>
	
	<script src="js/jquery-2.1.1.js"></script>
   	<script src="js/plugin/wow/wow.js" type="text/javascript"></script>     
	<script src="js/custom/api_thebooklogin.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
    <script src="js/custom/approval.widget.js"></script>
    <script src="js/custom/custom.start.js"></script>
	<script src="assets/js/holder.js"></script>
	<script src="js/plugin/jasny-bootstrap/js/jasny-bootstrap.js"></script>
    <!-- Sweet alert -->
    <script src="js/plugin/sweetalert/sweetalert.min.js"></script>
    
    <!--script src="js/custom/vehicles.gmapstate.js"></script-->
</body>
</html>
<?php
mysqli_free_result($LiveVehicles);

mysqli_free_result($find_vehicle);

mysqli_free_result($find_vehicle_photos);

mysqli_free_result($states);

mysqli_free_result($markets);
?>
