<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
                    
                      <h2>Let Us Help You Now!</h2>
<input name="amtprincipal" id="amtprincipal" type="hidden" value="">

                      <div class="clear"></div>
                      <br />
                     	
<div id="creditScoreRng" title="No Credit Check You Tell Us Your Score!">
<label><strong>1. What Do You Think Or Know To Be Your Credit Score?</strong><br />
						
                        <select name="Credit" id="Credit">
                          <option value="3.0">Very Good (750 - 850)</option>
                          <option value="6.0">Good (675-719)</option>
                          <option value="12.0" selected="selected">Fair (621 - 674)</option>
                          <option value="15.0">Poor (575 - 620)</option>
                          <option value="18.0">Really Bad (Below - 575)</option>
                        </select></label>
</div>
                                              <div class="clear"></div>

                        
<br />

                      
                      <div id="inpDiv" title="Montly Car Payment">
                      
                      <span id="spryCarpayment">
                      <label><strong>2. The Most You Can Pay Towards A Car Payment?</strong><br />
                        <span id="dollarsign">$</span><input name="mostCarpymt" type="text" id="mostCarpymt" onkeypress='validate(event)' onKeyUp="preApprovalAmount(this)" value="" maxlength="4" />
                      </label>
                      <div class="clear"></div>
                      <span class="textfieldRequiredMsg">A value is required.</span>
                      <span class="textfieldInvalidFormatMsg">Invalid format.</span>
                        </span>
                      
                      </div>
                      
                      <div id="inpDiv2" title="How Long Are You Prepared To Make This Payment?">
                      <label><strong>3. For How Long?</strong><br />
                      <select name="loanTerm" id="loanTerm" onChange="preApprovalAmountt()">
						<option value="12">12 Months</option>
                        <option value="24">24 Months</option>
                        <option value="36">36 Months</option>
                        <option value="48">48 Months</option>
                        <option value="60">60 Months</option>
                        <option value="72">72 Months</option>
                      </select></label>
                      </div> 
                       
<div id="inpDiv3" title="Positive Cash Or Equity Investment Value For Your Approval"><strong>4. Cash Down Payment? </strong><br />
  <input name="downpayment" type="text" id="downpayment" onkeypress='validate(event)' onkeyup="countmydownpayment()" size="10" maxlength="5" />
  
  <div class="clear"></div>
  

  </div>
                       
  
  <div class="clear"></div>
                     
<div id="content"></div>
                      
                    <div id="budgetNumbers">
                      <div id="qualifyTitle">You Budget For!</div>
                     
                      <div id="totalPayments"></div>
                      
                      <div id="downpaymentPrice"></div>
                      
                      <div id="totalLine">+<br><hr></div>
                      
                      <div id="totalAmountPrice"></div>

                      <div id="CarPurchasePrice"></div>
                      
                      <div class="clear"></div>
                    </div>
                      <div id="homeblock_subblock">
                   
                      
                  <p>
                            
                
                <div id="inpDiv"><label><strong>5. Do You Currently Have A Car Loan?</strong><br />
                <select name="currentCarLoan" id="currentCarLoan">
<option value="N">No</option>
<option value="Y">Yes</option>                
                </select>
                </label>
                </div>
                            
                <div id="inpDiv"><strong>6. What State Are You In?</strong><br />
                            <label title="Help Us Prepare Your Taxes And Fees + Incenitives"> <select name="homeState" id="homeState">
				  <option value="NULL" <?php if (!(strcmp("NULL", "$fbstatename"))) {echo "selected=\"selected\"";} ?>>Select One</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], ''))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
				  <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
				</select></label>
                </div>
                      <div class="clear"></div>
                </p>
                
                <div id="wfhReocommends">
                We Recommend You Purchase A <span id="vehicleCondition">New Or Used</span> Type Vehicle For <span id="Xamount">X Amount Of Dollars.</span>
                </div>




                
                
                  <div id="cashdownResponse" >Most Financing Requires Some Initial Investment On Your Part.   
                  Do You Have A Trade In Vehicle? 
                  <br /><br />
                  <span style="float:left;">
                  <label>Yes! I Will Trade<input name="tradeYes2" type="radio" id="tradeYes2" style="width:20px" value="Y"></label></span>
                  <span style="float:right;">
                  <label>No! I Will Not Trade<input name="tradeYes2" type="radio" id="tradeYes2" style="width:20px" value="N"></label></span>
                  </div>

                            </p>
                      		<p></p>
                      </div>
                      





<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryCarpayment", "integer", {validateOn:["blur"], hint:"300"});
//-->
</script>
