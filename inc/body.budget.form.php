<div id="budget_action" class="row">



        <div class="row">
            <div class="col-md-12 col-sm-12">
               <div class="form-group pull-right">
                    <button type="button" id="find_mygross_income" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#myBudget">
                               Find Out My Gross Income
                            </button>
               </div>
	        </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">

               
                <div class="form-group">
                    <label>Vehicle Price:</label>
                    
                    <?php if($row_find_vehicle['vspecialprice']){ ?>
                    
                    <input id="budget_vprice" type="text" class="form-control" value="$<?php echo formatMoney($row_LiveVehicles['vspecialprice']); ?>" />
                    
					<?php }elseif($row_find_vehicle['vrprice']){ ?>

                    <input id="budget_vprice" type="text" class="form-control" value="$<?php echo formatMoney($row_LiveVehicles['vrprice']); ?>" />
                    
                    
                    <?php }else{ ?>
                    
                    <input id="budget_vprice" type="text" class="form-control" value="#0" />
                    
                    <?php } ?>
                    
                </div>
               
        
               <div class="form-group">
                <label>Trade-In Value</label>
                	<input id="trade_in_value" class="form-control" type="text" value="$0" />
               </div>
               
               
               
               
               
               
               <div class="form-group">
                    <label>Loan Term (<?php if($row_find_vehicle['settingDefaultTerm']){echo $row_find_vehicle['settingDefaultTerm'].' ';  } ?> Months):</label>
                    <select id="loan_term_months" class="form-control" <?php echo $disable_term; ?>>
                        <optgroup label="The Longest You'll Go?">
                <option value="12" <?php if (!(strcmp(12, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>1 Year (12 Months)</option>
          <option value="24" <?php if (!(strcmp(24, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>2 Years (24 Months)</option>
    <option value="36" <?php if (!(strcmp(36, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>3 Years  (36 Months)</option>
<option value="48" <?php if (!(strcmp(48, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>4 Years  (48 Months)</option>
<option value="60" <?php if (!(strcmp(60, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>5 Years  (60 Months)</option>
<option value="72" <?php if (!(strcmp(72, $row_find_vehicle['settingDefaultTerm']))) {echo "selected=\"selected\"";} ?>>6 Years  (72 Months)</option>
                     </optgroup>
					</select>
                    
                    <input type="hidden" id="true_loanterm_months" value="<?php echo $row_find_vehicle['settingDefaultTerm']; ?>"  />
                    
                    
                </div>
                <div class="form-group">
                    <label>Sales Tax:</label>
                    <input id="budget_salextax" type="text" value="" class="form-control" />
                </div>



                <div id="budget_result" class="form-group has-success">
                	                    
                    <h2 id="budget_monthly_payment">Est. Payment*</h2>                
                </div>



        
            </div>
            <div class="col-md-6 col-sm-6">



<?php if($row_find_vehicle['dealer_type_id'] == 2){ ?>


                <label>Interest Rate:</label>
                <select id="interest_credit_score" class="form-control" style="display:none;">
                        <optgroup label="Good Credit">
                            <option value="3.0">Very Good Credit (720 - 850) | est. 3.0 apr</option>
                            <option value="7.0">Good Credit (675 - 719) |  est. 7.0 apr</option>
                            <option value="12.0">Fair Credit: (621 - 674) | est. 12.0 apr</option>
                        </optgroup>
                        <optgroup label="Bad Credit:">
                            <option value="21.0">Poor Credit: (575 - 620)  | est. 21.0 apr</option>
                            <option value="23.0">Sub Prime: (Below - 575) | est. 23.0 apr</option></option>
                            <option value="29.0">No Credit: (0 - ?) - I am not Sure | est. 29.0 apr</option></option>
                        </optgroup>
                </select>

                <input id="true_interest_credit_score" type="text" value="<?php echo $row_find_vehicle['settingDefaultAPR']; ?>" disabled="disabled" />
   

<?php }elseif(!$row_find_vehicle['usedmatrixcredit_vgoodcredit'] || !$row_find_vehicle['usedmatrixcredit_jgoodcredit'] ||  !$row_find_vehicle['usedmatrixcredit_faircredit'] || !$row_find_vehicle['usedmatrixcredit_poorcredit']  || !$row_find_vehicle['usedmatrixcredit_subprime'] || !$row_find_vehicle['usedmatrixcredit_unknown'] || !$row_find_vehicle['usedmatrixcredit_unknown']){ ?>



                <label>Interest Rate:</label>
                <select id="interest_credit_score" class="form-control">
                        <optgroup label="Good Credit">
                            <option value="3.0">Very Good Credit (720 - 850) | est. 3.0 apr</option>
                            <option value="7.0">Good Credit (675 - 719) |  est. 7.0 apr</option>
                            <option value="12.0">Fair Credit: (621 - 674) | est. 12.0 apr</option>
                        </optgroup>
                        <optgroup label="Bad Credit:">
                            <option value="21.0">Poor Credit: (575 - 620)  | est. 21.0 apr</option>
                            <option value="23.0">Sub Prime: (Below - 575) | est. 23.0 apr</option></option>
                            <option value="29.0">No Credit: (0 - ?) - I am not Sure | est. 29.0 apr</option></option>
                        </optgroup>
                </select>
               
               
                <input id="true_interest_credit_score" type="hidden" value="<?php echo $row_find_vehicle['settingDefaultAPR']; ?>" />


<?php }else{ ?>

                <label>Interest Rate: </label>
                <select id="interest_credit_score" class="form-control">
                        <optgroup label="Good Credit">
                            <option value="<?php echo $row_find_vehicle['usedmatrixcredit_vgoodcredit']; ?>">Very Good Credit (720 - 850) | est. <?php echo $row_find_vehicle['usedmatrixcredit_vgoodcredit']; ?> apr</option>
                            <option value="<?php echo $row_find_vehicle['usedmatrixcredit_jgoodcredit']; ?>">Good Credit (675 - 719) |  est. <?php echo $row_find_vehicle['usedmatrixcredit_jgoodcredit']; ?> apr</option>
                            <option value="<?php echo $row_find_vehicle['usedmatrixcredit_faircredit']; ?>">Fair Credit: (621 - 674) | est. <?php echo $row_find_vehicle['usedmatrixcredit_faircredit']; ?> apr</option>
                        </optgroup>
                        <optgroup label="Bad Credit:">
                            <option value="<?php echo $row_find_vehicle['usedmatrixcredit_poorcredit']; ?>">Poor Credit: (575 - 620)  | est. <?php echo $row_find_vehicle['usedmatrixcredit_poorcredit']; ?> apr</option>
                            <option value="<?php echo $row_find_vehicle['usedmatrixcredit_subprime']; ?>">Sub Prime: (Below - 575) | est. <?php echo $row_find_vehicle['usedmatrixcredit_subprime']; ?> apr</option></option>
                            <option value="<?php echo $row_find_vehicle['usedmatrixcredit_unknown']; ?>">No Credit: (0 - ?) - I am not Sure | est. <?php echo $row_find_vehicle['usedmatrixcredit_unknown']; ?> apr</option></option>
                        </optgroup>
                </select>
                
               <input id="true_interest_credit_score" type="hidden" value="<?php //echo $row_find_vehicle['settingDefaultAPR']; ?>" />

<?php } ?>
                
                <div class="form-group">
                














               
               <input id="true_interest_credit_score" type="hidden" value="<?php echo $row_find_vehicle['settingDefaultAPR']; ?>" />
               
               
               </div>
               
                <div class="form-group">
                    <label>Down Payment:</label>
                    
                    <?php if($row_find_vehicle['vdprice']){ ?>

                    <input id="budget_downpayment" type="text" value="$<?php echo formatMoney($row_find_vehicle['vdprice']); ?>" class="form-control" />
                    
					<?php }elseif($row_find_vehicle['vspecialprice']){ $vsp = $row_find_vehicle['vspecialprice'];  $vsp = (int) $vsp; $vsp = (double) $vsp;  $downpayment = (ceil($vsp * 0.10)); ?>
                    
                    <input id="budget_downpayment" type="text" value="$<?php echo formatMoney($downpayment); ?>" class="form-control" />

					<?php }elseif($row_find_vehicle['vrprice']){ $vsp = $row_find_vehicle['vrprice'];  $vsp = (double)$vsp;  $vsp = (double) $vsp; $downpayment = (ceil($vsp * 0.10)); ?>
                    
                    <input id="budget_downpayment" type="text" value="$<?php echo formatMoney($downpayment); ?>" class="form-control" />
                    
					<?php }else{ ?>
                    
                    <input id="budget_downpayment" type="text" value="" class="form-control" />
                    
                    <?php } ?>
                    
                    
                </div>        
                <div class="form-group">
                    <label>Gross Income: <small>before taxes</small></label>
                    <input id="budget_grossincome" type="text" value="$0.00" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Net Income: <small>after taxes</small></label>
                    <input id="budget_netincome" type="text" value="$0.00" class="form-control" />
                </div>
                <div class="form-group">
                	
                    

                    <h2 id="budget_afford">Budget: Missing</h2>

                </div>
                
                
                
                
                
                
            </div>
        </div>

        
        
        
        
        
        <div class="row">
        	<div class="col-sm-12">
        	<p>*Estimated payments are for informational purposes only and don't account for acquisition fees, destination charges, tax, title, and other fees and incentives or represent a financing offer or guarantee of credit from the seller.</p>
            </div>
        </div>


</div>
