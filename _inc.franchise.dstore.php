<?php if(!$wfhuser_approval_id){ ?>
<div class="wrapper-md row">
    <div class="container">
        <div class="col-sm-12" align="center">
            <h4>You Are Shopping This Dealer Without A Pre-Approval.</h4>
            <h6>Please Set One First</h6>
    		<a href="start.php" class="btn btn-default btn-toolbar">Get Pre-Approved</a>
        </div>
    </div>
</div>
<?php } ?>



<div id="vdlisting_results">
    <div class="row">
    
        <div class="container">
        
        
        
    
    
    
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-newvehicles" role="tab" data-toggle="tab"><i class="fa fa-fw fa-car"></i>New Vehicles</a></li>
                        <li><a href="#tab-usedvehicles" role="tab" data-toggle="tab"><i class="fa fa-fw fa-car"></i>Pre-Owned Vehicles</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab-newvehicles">
                                    <section class="wrapper-md bg-highlight">
                                        <div id="franchisenew_results">
                                            <div class="row" align="center">
                                
                                
                                                <h2><?php echo $row_store_vehicles_newv['company']; ?></h2>
                                                
                                            </div>
                                        
                                            <div class="row">
                                
                                
                            <?php $counter_gridrow=0; ?>
                                
                                  <?php do { 
                                   
                                       
                                
                                $vrowvid = $row_store_vehicles_newv['vid'];
                                $vcondition = $row_store_vehicles_newv['vcondition'];
                                $vmake = $row_store_vehicles_newv['vmake'];
                                $vmodel = $row_store_vehicles_newv['vmodel'];
                                $vecolor_txt = $row_store_vehicles_newv['vecolor_txt'];
                                $vbody = $row_store_vehicles_newv['vbody'];
                                
                                $vlisting_tags = $vrowvid.' '.$vcondition.' '.$vmake.' '.$vmodel.' '.$vecolor_txt.' '.$vbody;
                                
                                $dealer_type_id = $row_store_vehicles_newv['dealer_type_id'];

                            	if($row_store_vehicles_newv['dealer_type_id'] == 2){ $dealer_type = 'bhph';  }else{ $dealer_type = 'franchise'; }

                                
                                
                                // Set Deal Matrix Settings Off Turn on if term, apr, docfee, and title fee are present.
                                    $dematrix_settings = 0;
                                
                                $dealmatrix_settings = 0;
                                if(isset($row_store_vehicles_newv['settingDefaultTerm'], $row_store_vehicles_newv['settingDefaultAPR'], $row_store_vehicles_newv['settingDocDlvryFee'], $row_store_vehicles_newv['settingTitleFee'])){
                                
                                    $dealmatrix_settings = 1;
                                
                                }
                                
                                    
                                    $settingDefaultTerm = (int)60;
                                    if(isset($row_store_vehicles_newv['settingDefaultTerm'])){
                                    $settingDefaultTerm =  (int)$row_store_vehicles_newv['settingDefaultTerm'];
                                
                                            if(isset($row_find_existingsession_approval['wfhuser_approval_monthterm'])){
                                                if($row_store_vehicles_newv['settingDefaultTerm'] > $row_find_existingsession_approval['wfhuser_approval_monthterm']){
                                                $settingDefaultTerm = ((int)$row_store_vehicles_newv['settingDefaultTerm']);
                                                }else{
                                                $settingDefaultTerm = (12 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
                                                }
                                
                                            }
                                
                                        
                                        
                                        }elseif(isset($row_find_existingsession_approval['wfhuser_approval_monthterm'])){
                                            
                                        $settingDefaultTerm = (12 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
                                        
                                                if($row_store_vehicles_newv['settingDefaultTerm'] < $row_find_existingsession_approval['wfhuser_approval_monthterm']){
                                                    
                                                $settingDefaultTerm = (12 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
                                                }else{
                                                $settingDefaultTerm = ((int)$row_store_vehicles_newv['settingDefaultTerm']);
                                                }
                                
                                    }
                                
                                    // From bring in setting from if else conditions
                                    $finance_months  = $settingDefaultTerm;
                                
                                    $settingDefaultAPR = $row_find_existingsession_approval['wfhuser_approval_apr'];
                                    if(isset($row_store_vehicles_newv['settingDefaultAPR'])){
                                        $settingDefaultAPR = $row_store_vehicles_newv['settingDefaultAPR'];
                                    }else{
                                        if($row_find_existingsession_approval['wfhuser_approval_apr']){
                                            $settingDefaultAPR = $row_find_existingsession_approval['wfhuser_approval_apr'];
                                        }else{
                                            $settingDefaultAPR = 7.0;
                                
                                        }
                                    }
                                    
                                    $interest_rate =  $settingDefaultAPR;
                                
                                
                                    if(isset($row_store_vehicles_newv['settingDocDlvryFee'])){
                                        $settingDocDlvryFee =  $row_store_vehicles_newv['settingDocDlvryFee'];
                                    }else{	
                                        $settingDocDlvryFee = 250.00;
                                    }
                                    if(isset($row_store_vehicles_newv['settingTitleFee'])){
                                        $settingTitleFee = $row_store_vehicles_newv['settingTitleFee'];
                                    }else{	
                                        $settingTitleFee = 55.00;
                                    }
                                    if(isset($row_store_vehicles_newv['settingStateInspectnFee'])){
                                        $settingStateInspectnFee = $row_store_vehicles_newv['settingStateInspectnFee'];
                                    }else{	
                                        $settingStateInspectnFee = 30.00;
                                    }	
                                    
                                    $cust_wpymt_lowr = 'N';
                                    $cust_wpymt_higr = 'N';
                                
                                    $cust_dpymt_lowr = 'N';
                                    $cust_dpymt_higr = 'N';
                                
                                    
                                    
                                    
                                    $sysadd_dwnpymt = '200.00';
                                
                                    $vrprice = $row_store_vehicles_newv['vrprice'];
									$VPrice_missing = 0;
									
                                    if (is_numeric($vrprice)) {
                                        //  http://php.net/manual/en/function.is-int.php
                                        
                                        $VPrice = intval(preg_replace('/[^0-9]+/', '', $vrprice), 10);
										$VPrice_missing = 1;
                                    } else {
                                        $VPrice_missing = 0;
                                        $VPrice = $row_store_vehicles_newv['vrprice'];
                                    }
									
									

									$vpurchasecost_aval = 0;
                                    if(isset($row_store_vehicles_newv['vpurchasecost'])){ 
                                            $vpurchasecost_aval = 1;
                                            $vpurchasecost = $row_store_vehicles_newv['vpurchasecost'];
                                    }else{
                                            $vpurchasecost_aval = 0;
                                            $vpurchasecost = $row_store_vehicles_newv['vpurchasecost'];
                                    }
                                
									if($VPrice_missing == 1 && $VPrice == 0){
                                            
                                            
											$vpurchasecost = intval(preg_replace('/[^0-9]+/', '', $row_store_vehicles_newv['vpurchasecost']), 10);
											$VPrice = $vpurchasecost + 4000;
											 
                                            
                                     }
									
									
																			
                                
                                    $vspecialprice = $row_store_vehicles_newv['vspecialprice'];
									$VSPrice_missing = 0;
									
                                    if(isset($row_store_vehicles_newv['vspecialprice'])){
                                
                                        if (is_numeric($vspecialprice)) {
                                            //echo "'{$element}' is numeric", PHP_EOL;
                                            $VSPrice = intval(preg_replace('/[^0-9]+/', '', $vspecialprice), 10);
                                            $VSPrice_missing = 1;
                                        } else {
                                            $VSPrice = $row_store_vehicles_newv['vspecialprice'];
                                            $VSPrice_missing = 0;
                                        }
										
                                        if($VSPrice_missing != 1){
                                            if($VPrice < $VSPrice){
                                               $VPrice = $VSPrice;
                                            }
                                        }
                                
                                    }
                                
                                	
                                         
                                    if(isset($row_store_vehicles_newv['settingSateSlsTax'])){
                                        $sales_tax = $row_store_vehicles_newv['settingSateSlsTax'];
                                    }else{	
                                        $sales_tax = 6.0;
                                    }
                                
                                    
                                    if($row_store_vehicles_newv['state'] == 'GA'){
                                        
                                        $noTaxes = 'N';
                                        
                                        
                                    }else{
                                        
                                        $noTaxes = 'Y';		
                                    }
                                    
                                    
                                    $taxFormatCombined = $VPrice + $settingDocDlvryFee;
                                    
                                    $fullsalesTax = round($taxFormatCombined / 100) * $sales_tax;
                                    
                                    $newfullsalesTax = $fullsalesTax;
                                    
                                    if($noTaxes = 'Y'){ 
                                        if(isset($row_store_vehicles_newv['vadvalorem_tax'])){
                                            
                                            $newfullsalesTax = $row_store_vehicles_newv['vadvalorem_tax'];
                                        }else{
                                            
                                            $newfullsalesTax = 0.00;
                                        }
                                    }

									
                                    if($row_store_vehicles_newv['usedmatrixcredit_fminimumprofit']){
                                        $minimum_fprofit = $row_store_vehicles_newv['usedmatrixcredit_fminimumprofit'];
                                    }else{
                                        $minimum_fprofit = $row_store_vehicles_newv['usedmatrixcredit_fminimumprofit'];
                                    }
                                
                                    if($row_store_vehicles_newv['usedmatrixcredit_bminimumprofit']){
                                        $minimum_bprofit = $row_store_vehicles_newv['usedmatrixcredit_bminimumprofit'];
                                    }else{
                                        $minimum_bprofit = $row_store_vehicles_newv['usedmatrixcredit_bminimumprofit'];
                                
                                    }
                                
									
									
									
                                    $frontend_profit = $VPrice - $vpurchasecost;
                                
                                    $frontend_profit = $frontend_profit;
                                
                                    $backend_profit =  $financeCharges;
									
									
																		
                                    
                                    $dealer_fees = ($settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
                                    $dealer_fees = $dealer_fees;
                                    
                                    $addedUp = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
                                    
                                    //$amountTofinance = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
                                    $amountTofinance  = $addedUp;
                                    $amount_tofinance = $addedUp;
                                    
                                    $calcPmt = calcPmt($amountTofinance, $settingDefaultAPR, $settingDefaultTerm);
                                    
                                    //To Use For display so We Format but not before cal payment.
                                    //$newamountTofinance = number_format($amountTofinance, 2);
									$newamountTofinance = $amountTofinance;
									
                                    $amount_tofinance = $newamountTofinance;

                                    
                                    
                                    $totalPayments = $calcPmt * $settingDefaultTerm;
                                    //$totalPayments = number_format($totalPayments, 2);
                                
                                    $financeCharges = ($totalPayments - $amountTofinance);
                                    
								
                                
                                
                                $counter_gridrow++; 
                                $vdisclaimer = "Payments based on sales price plus tax, tag, title with approved credit at $settingDefaultAPR% APR for $settingDefaultTerm months.  Vehicles subject to prior sale. See dealer for details.";
                                
                                
                                
                                
                                $vthubmnail_file = $row_store_vehicles_newv['vthubmnail_file'];
                                if($vthubmnail_file){
                                $open_url = 'https://images.autocitymag.com/'.$row_store_vehicles_newv['did'].'/'.$row_store_vehicles_newv['vid'].'/'.$vthubmnail_file;
                                }else{
                                $open_url = 'img/WeFinacehere-Orange-Logo-640x480.png';
                                }
                                
                                
                                
                                
                               
                                    
                                        if($VDPrice = $row_store_vehicles_newv['vdprice']){
                                        $VDPrice = $row_store_vehicles_newv['vdprice'];
                                        }else{
                                            $VDPrice = ($VPrice * 0.10); 
                                        }
                                
                                        if(isset($row_store_vehicles_newv['vdprice']) && ($row_store_vehicles_newv['vdprice'] > 0)){
                                        
                                            $$VDPrice = $row_store_vehicles_newv['vdprice']; 
                                        
                                        }else{
                                           $VDPrice = round($VPrice * 0.10); 
                                        }
                                
                                        if(isset($row_find_existingsession_approval['wfhuser_approval_dwpymt'])){
                                
                                            $wfhuser_approval_dwpymt = intval(preg_replace('/[^A-Za-z0-9 ]/', '', $row_find_existingsession_approval['wfhuser_approval_dwpymt']), 10);
                                            
                                            if($wfhuser_approval_dwpymt){
                                                $wfhuser_approval_dwpymt = $row_find_existingsession_approval['wfhuser_approval_dwpymt'];
                                            }else{
                                                $wfhuser_approval_dwpymt = round($VPrice * 0.10);
                                            }
                                        
                                        }else{

                                            $wfhuser_approval_dwpymt = $row_find_existingsession_approval['wfhuser_approval_dwpymt'];
                                        
                                        }
                                        
                                        if($wfhuser_approval_dwpymt < $VDPrice){
                                            
                                            $with =  'With $'.$VDPrice .'-'. $wfhuser_approval_dwpymt.' + $'.$wfhuser_approval_dwpymt;
                                            
                                            $total_downpayment = $VDPrice  + $wfhuser_approval_dwpymt;
                                
                                            }elseif($wfhuser_approval_dwpymt > $VDPrice){
                                                
                                            $total_downpayment = round($wfhuser_approval_dwpymt);
                                            
                                            }else{
                                                
                                            $addmore_down  = $new_dwpymt = ($VPrice * 0.10);
                                            $total_downpayment = round($total_downpayment);
                                        }
                                            
                                            ///echo $wfhuser_approval_dwpymt;
                                            ?>
                                
                                            
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="thumbnail">
                                                        <div class="overlay-container">
                                                            <img src="<?php echo $open_url; ?>" width="261px" height="195px">
                                                            <div class="overlay-content">
                                                                <h3 class="h4 headline"><?php echo $row_store_vehicles_newv['vcondition']; ?> - <?php echo $row_store_vehicles_newv['vyear']; ?></h3>
                                                                <p><?php if($VPrice){ echo 'Price $'.formatMoney($VPrice); }else{ echo number_format($VPrice);  } ?></p>
                                                            </div><!-- /.overlay-content -->
                                                        </div><!-- /.overlay-container -->
                                                        <div class="thumbnail-meta vehicle_descip_box_layout">
                                                            <p><i class="fa fa-fw fa-car"></i>  | <?php echo $row_store_vehicles_newv['vyear']; ?> <?php echo $row_store_vehicles_newv['vmake']; ?> <?php echo $row_store_vehicles_newv['vmodel']; ?> <?php echo $row_store_vehicles_newv['vtrim']; ?></p>
                                                            <p><i class="fa fa-fw fa-map-marker"></i> <?php echo $row_store_vehicles_newv['city']; ?>, <?php echo $row_store_vehicles_newv['state']; ?> <?php echo $row_store_vehicles_newv['zip']; ?></p>
                                                            <p><?php echo '$'.number_format($calcPmt, 2); ?> A Month For <?php echo $settingDefaultTerm; ?> months at <?php echo $settingDefaultAPR; ?>% APR with $<?php echo formatMoney($total_downpayment); ?> Down w.a.c Financing: <?php if($VPrice){ echo  '$'.formatMoney($VPrice); }else{ echo '$'.$VPrice; } ?></p>
                                                        
                                                            
															
                                                            <?php
																//$dealer_type_id;
																//echo $dealer_type;
                                                                //echo $amount_tofinance;
																//echo $settingDefaultTerm;
																//echo $finance_months;
																//echo $settingDefaultTerm;
                                                                //echo $VPrice;
                                                                //$row_store_vehicles_newv['vrprice'];
                                                            ?>
                                                        </div>
                                                        <div class="thumbnail-meta">
                                                            <i class="fa fa-fw fa-info-circle"></i>    |  Stock #<?php echo $row_store_vehicles_newv['vstockno']; ?> 
                                                        </div>
                                                        <div class="thumbnail-meta">
                                                            <i class="fa fa-fw fa-dollar"></i>
                                                            <span class="h3"><?php echo number_format($calcPmt, 2); ?> 
                                                            <small>A Month For <?php echo $settingDefaultTerm; ?> months </small>
															<?php if($row_store_vehicles_newv['vrprice']){  formatMoney($row_store_vehicles_newv['vrprice']); } ?></span> 
                                                            <a href="vehicle.php?v=<?php echo $row_store_vehicles_newv['vid']; ?>" class="btn btn-link pull-right">
	                                                            View <i class="fa fa-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div><!-- /.thumbnail -->
                                                </div><!-- /.col -->
                                <?php } while ($row_store_vehicles_newv = mysqli_fetch_array($store_vehicles_newv)); ?><br>
                                
                                
                                          </div><!-- /.row -->
                                        </div><!-- /.container -->
                                    </section>                                
                        </div>    
    
                        <div class="tab-pane fade" id="tab-usedvehicles">
    
                                	<section class="wrapper-md bg-highlight">
                                        <div id="franchisepreownd_results">
                                            <div class="row" align="center">
                                
                                
                                                <h2><?php echo $row_store_vehicles_newv['company']; ?></h2>
                                                
                                            </div>
                                        
                                            <div class="row">
                                
                                
                                
                                  <?php do { 
                                   
                                       
                                
                                $vrowvid = $row_store_vehicles_preownv['vid'];
                                $vcondition = $row_store_vehicles_preownv['vcondition'];
                                $vmake = $row_store_vehicles_preownv['vmake'];
                                $vmodel = $row_store_vehicles_preownv['vmodel'];
                                $vecolor_txt = $row_store_vehicles_preownv['vecolor_txt'];
                                $vbody = $row_store_vehicles_preownv['vbody'];
                                
                                $vlisting_tags = $vrowvid.' '.$vcondition.' '.$vmake.' '.$vmodel.' '.$vecolor_txt.' '.$vbody;
                                
                                
                                
                                
                                // Set Deal Matrix Settings Off Turn on if term, apr, docfee, and title fee are present.
                                    $dematrix_settings = 0;
                                
                                $dealmatrix_settings = 0;
                                if(isset($row_store_vehicles_preownv['settingDefaultTerm'], $row_store_vehicles_preownv['settingDefaultAPR'], $row_store_vehicles_preownv['settingDocDlvryFee'], $row_store_vehicles_preownv['settingTitleFee'])){
                                
                                    $dealmatrix_settings = 1;
                                
                                }
                                
                                    
                                    $settingDefaultTerm = (int)72;
                                    if(isset($row_store_vehicles_preownv['settingDefaultTerm'])){
                                
                                            if(isset($row_find_existingsession_approval['wfhuser_approval_monthterm'])){
                                                if($row_store_vehicles_preownv['settingDefaultTerm'] > $row_find_existingsession_approval['wfhuser_approval_monthterm']){
                                                $settingDefaultTerm = ((int)$row_store_vehicles_preownv['settingDefaultTerm']);
                                                }else{
                                                $settingDefaultTerm = (60 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
                                                }
                                
                                            }
                                
                                        
                                        
                                        }elseif(isset($row_find_existingsession_approval['wfhuser_approval_monthterm'])){
                                            
                                        $settingDefaultTerm = (60 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
                                        
                                                if($row_store_vehicles_preownv['settingDefaultTerm'] < $row_find_existingsession_approval['wfhuser_approval_monthterm']){
                                                    
                                                $settingDefaultTerm = (60 * (int)$row_find_existingsession_approval['wfhuser_approval_monthterm']);
                                                }else{
                                                $settingDefaultTerm = ((int)$row_store_vehicles_preownv['settingDefaultTerm']);
                                                }
                                 				
												$settingDefaultTerm = (int)60;
									
                                    } 
									
									$settingDefaultTerm = (int)60;
	                               
                                
                                    $settingDefaultAPR = $row_find_existingsession_approval['wfhuser_approval_apr'];
                                    if(isset($row_store_vehicles_preownv['settingDefaultAPR'])){
                                        $settingDefaultAPR = $row_store_vehicles_preownv['settingDefaultAPR'];
                                    }else{
                                        if($row_find_existingsession_approval['wfhuser_approval_apr']){
                                            $settingDefaultAPR = $row_find_existingsession_approval['wfhuser_approval_apr'];
                                        }else{
                                            $settingDefaultAPR = 18.0;
                                
                                        }
                                    }
                                    
                                
                                
                                    if(isset($row_store_vehicles_preownv['settingDocDlvryFee'])){
                                        $settingDocDlvryFee = number_format($row_store_vehicles_preownv['settingDocDlvryFee'], 2);
                                    }else{	
                                        $settingDocDlvryFee = 250.00;
                                    }
                                    if(isset($row_store_vehicles_preownv['settingTitleFee'])){
                                        $settingTitleFee = number_format($row_store_vehicles_preownv['settingTitleFee'], 2);
                                    }else{	
                                        $settingTitleFee = 55.00;
                                    }
                                    if(isset($row_store_vehicles_preownv['settingStateInspectnFee'])){
                                        $settingStateInspectnFee = number_format($row_store_vehicles_preownv['settingStateInspectnFee'], 2);
                                    }else{	
                                        $settingStateInspectnFee = 30.00;
                                    }	
                                    
                                    $cust_wpymt_lowr = 'N';
                                    $cust_wpymt_higr = 'N';
                                
                                    $cust_dpymt_lowr = 'N';
                                    $cust_dpymt_higr = 'N';
                                
                                    
                                    
                                    
                                    $sysadd_dwnpymt = '200.00';
                                
                                    $vrprice = $row_store_vehicles_preownv['vrprice'];
                                    if (is_numeric($vrprice)) {
                                        //  http://php.net/manual/en/function.is-int.php
                                        $VPrice_missing = 0;
                                        $VPrice = intval(preg_replace('/[^0-9]+/', '', $vrprice), 10);
                                    } else {
                                        $VPrice_missing = 1;
                                        $VPrice = $row_store_vehicles_preownv['vrprice'];
                                    }
                                
                                    $vspecialprice = $row_store_vehicles_preownv['vspecialprice'];
                                    if(isset($row_store_vehicles_preownv['vspecialprice'])){
                                
                                        if (is_numeric($vspecialprice)) {
                                            //echo "'{$element}' is numeric", PHP_EOL;
                                            $VSPrice = intval(preg_replace('/[^0-9]+/', '', $vspecialprice), 10);
                                            $VSPrice_missing = 0;
                                        } else {
                                            $VSPrice = $row_store_vehicles_preownv['vspecialprice'];
                                            $VSPrice_missing = 1;
                                        }
                                        if($VSPrice_missing != 1){
                                            if($VPrice < $VSPrice){
                                               $VPrice = $VSPrice;
                                            }
                                        }
                                
                                    }
                                
                                
                                    if(isset($row_store_vehicles_preownv['vpurchasecost'])){ 
                                            $vpurchasecost_aval = 1;
                                            $vpurchasecost = $row_store_vehicles_preownv['vpurchasecost'];
                                    }else{
                                            $vpurchasecost_aval = 0;
                                            $vpurchasecost = $row_store_vehicles_preownv['vpurchasecost'];
                                    }
                                
                                         
                                    if(isset($row_store_vehicles_preownv['settingSateSlsTax'])){
                                        $sales_tax = $row_store_vehicles_preownv['settingSateSlsTax'];
                                    }else{	
                                        $sales_tax = 6.0;
                                    }
                                
                                    
                                    if($_GET['state'] == 'GA'){
                                        
                                        $noTaxes = 'N';
                                        
                                        
                                    }else{
                                        
                                        $noTaxes = 'Y';		
                                    }
                                    
                                    
                                    $taxFormatCombined = $VPrice + $settingDocDlvryFee;
                                    
                                    $fullsalesTax = round($taxFormatCombined / 100) * $sales_tax;
                                    
                                    $newfullsalesTax = $fullsalesTax;
                                    
                                    if($noTaxes = 'Y'){ 
                                        if(isset($row_store_vehicles_preownv['vadvalorem_tax'])){
                                            
                                            $newfullsalesTax = $row_store_vehicles_preownv['vadvalorem_tax'];
                                        }
										
                                    }
                                    
                                    $dealer_fees = ($settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
                                    $dealer_fees = number_format($dealer_fees, 2);
                                    
                                    $addedUp = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
                                    
                                    //$amountTofinance = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax);
                                    $amountTofinance = $addedUp;
                                    
                                    $calcPmt = calcPmt($amountTofinance, $settingDefaultAPR, 60);
                                    
                                    //To Use For display so We Format but not before cal payment.
                                    $newamountTofinance = number_format($amountTofinance, 2);
                                    
                                    $totalPayments = $calcPmt * $settingDefaultTerm;
                                    //$totalPayments = number_format($totalPayments, 2);
                                
                                    $financeCharges = ($totalPayments - $amountTofinance);
                                    
                                    if($row_store_vehicles_preownv['usedmatrixcredit_fminimumprofit']){
                                        $minimum_fprofit = number_format($row_store_vehicles_preownv['usedmatrixcredit_fminimumprofit'], 2);
                                    }else{
                                        $minimum_fprofit = $row_store_vehicles_preownv['usedmatrixcredit_fminimumprofit'];
                                    }
                                
                                    if($row_store_vehicles_preownv['usedmatrixcredit_bminimumprofit']){
                                        $minimum_bprofit = number_format($row_store_vehicles_preownv['usedmatrixcredit_bminimumprofit'], 2);
                                    }else{
                                        $minimum_bprofit = $row_store_vehicles_preownv['usedmatrixcredit_bminimumprofit'];
                                
                                    }
                                
                                    $frontend_profit = $VPrice - $vpurchasecost;
                                
                                    $frontend_profit = number_format($frontend_profit, 2);
                                
                                    $backend_profit = number_format($financeCharges, 2);
                                
                                
                                $counter_gridrow++; 
                                $vdisclaimer = "Payments based on sales price plus tax, tag, title with approved credit at $settingDefaultAPR% APR for $settingDefaultTerm months.  Vehicles subject to prior sale. See dealer for details.";
                                
                                
                                
                                
                                $vthubmnail_file = $row_store_vehicles_preownv['vthubmnail_file'];
                                if($vthubmnail_file){
                                $open_url = 'https://images.autocitymag.com/'.$row_store_vehicles_preownv['did'].'/'.$row_store_vehicles_preownv['vid'].'/'.$vthubmnail_file;
                                }else{
                                $open_url = 'img/WeFinacehere-Orange-Logo-640x480.png';
                                }
                                
                                
                                
                                
                                
                                    
                                        if($vdprice = $row_store_vehicles_newv['vdprice']){
                                        $VDPrice = $row_store_vehicles_newv['vdprice'];
                                        }else{
                                            $VDPrice = ($VPrice * 0.10); 
                                        }
                                
                                        if(isset($row_store_vehicles_newv['vdprice']) && ($row_store_vehicles_newv['vdprice'] > 0)){
                                        
                                            $vdprice =  $row_store_vehicles_newv['vdprice']; 
                                        
                                        }else{
                                            $vdprice = ($VPrice * 0.10); 
                                        }
                                
                                        if(isset($row_find_existingsession_approval['wfhuser_approval_dwpymt'])){
                                            
                                $wfhuser_approval_dwpymt =  $row_find_existingsession_approval['wfhuser_approval_dwpymt'];
                                        
                                        }else{
                                $wfhuser_approval_dwpymt = $row_find_existingsession_approval['wfhuser_approval_dwpymt'];
                                        
                                        }
                                        
                                        if($wfhuser_approval_dwpymt < $VDPrice){
                                            
                                            $with =  'With $'. ($VDPrice - $wfhuser_approval_dwpymt).' + $'.$wfhuser_approval_dwpymt;
                                            
                                            $total_downpayment = ($VDPrice - $wfhuser_approval_dwpymt) + $wfhuser_approval_dwpymt;
                                
                                            }elseif($wfhuser_approval_dwpymt > $VDPrice){
                                                
                                            $total_downpayment = $wfhuser_approval_dwpymt;
                                            
                                            }else{
                                                
                                            $addmore_down  = $new_dwpymt = ($VPrice * 0.10);
                                            $total_downpayment = $addmore_down;
                                        }
                                            
                                            ///echo $wfhuser_approval_dwpymt;
                                            ?>
                                
                                            
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="thumbnail">
                                                        <div class="overlay-container">
                                                            <img src="<?php echo $open_url; ?>" width="261px" height="195px">
                                                            <div class="overlay-content">
                                                                <h3 class="h4 headline"><?php echo $row_store_vehicles_preownv['vcondition']; ?></h3>
                                                                <p><?php if($VPrice){ echo 'Price $'.formatMoney($VPrice); }else{ echo number_format($VPrice);  } ?></p>
                                                                
                                                            </div><!-- /.overlay-content -->
                                                        </div><!-- /.overlay-container -->
                                                        <div class="thumbnail-meta vehicle_descip_box_layout">
                                                            <p><i class="fa fa-fw fa-car"></i>  | <?php echo $row_store_vehicles_preownv['vyear']; ?> <?php echo $row_store_vehicles_preownv['vmake']; ?> <?php echo $row_store_vehicles_preownv['vmodel']; ?> <?php echo $row_store_vehicles_preownv['vtrim']; ?></p>
                                                            <p><i class="fa fa-fw fa-map-marker"></i> <?php echo $row_store_vehicles_preownv['city']; ?>, <?php echo $row_store_vehicles_preownv['state']; ?> <?php echo $row_store_vehicles_preownv['zip']; ?></p>
                                                            <p><?php echo '$'.number_format($calcPmt, 2); ?> A Month For <?php echo $settingDefaultTerm; ?> months at <?php echo $settingDefaultAPR; ?>% with <?php echo $VDPrice; ?> w.a.c Finance: <?php if($row_store_vehicles_preownv['vrprice']){ echo  '$'.formatMoney($row_store_vehicles_preownv['vrprice']); }else{ echo '$'.$row_store_vehicles_preownv['vrprice']; } ?></p>
                                                        </div>
                                                        <div class="thumbnail-meta">
                                                            <i class="fa fa-fw fa-info-circle"></i> <?php if($row_store_vehicles_preownv['vspecialprice']){ echo  '$'.formatMoney($row_store_vehicles_preownv['vspecialprice']); } ?>   |  Stock #<?php echo $row_store_vehicles_preownv['vstockno']; ?> 
                                                        </div>
                                                        <div class="thumbnail-meta">
                                                            <i class="fa fa-fw fa-dollar"></i> <span class="h3"><?php echo number_format($calcPmt, 2); ?> <small>A Month For <?php echo $settingDefaultTerm; ?> months </small></span> <a href="vehicle.php?v=<?php echo $row_store_vehicles_preownv['vid']; ?>" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    </div><!-- /.thumbnail -->
                                                </div><!-- /.col -->
                                <?php } while ($row_store_vehicles_preownv = mysqli_fetch_array($store_vehicles_preownv)); ?><br>
                                
                                
                                          </div><!-- /.row -->
                                        </div><!-- /.container -->
                                	</section>
        
                        </div>
                	</div>
                
                
                
        </div>
    
    
    </div>
</div>
