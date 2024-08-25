<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"  valign="top">
    
    	  
                  <div class="formm">
					<div id="onecircle" nowrap> Input Your Contact Information</div>

                    <span class="qual" for="fname">What Is Your First Name?
                    <input type="text" name="fname" id="fname" value="<?php echo $fbfname; ?>" /></span>
                    
                    
                    <span class="qual" for="lname">What is Your Last name?
                    <input type="text" name="lname" id="lname" value="<?php echo $fblname; ?>" /></span>



                    <span id='labelincome' class="qual" for="Purchase Power">Monthly Income?
                    <input class="validate[required,custom[integer]] text-input" id="income" name="income" value="Your Income Here" onchange="IncomeChanged(this.form)" style="width:125px;"></span>


                    <span id='labeldwnpymt' class="qual" for="DownPayment" >Down Payment?
                    
                    <input name="DownPayment" id="DownPayment" value="1000" style="width:115px" /></span>




                    
                    <!-- span class="qual" for="DownPayment" style="float:left;" >Your Phone Number?
                    
                    <input name="" id="" value="(404) 565-4371" style="width:115px" /></span>


                    
                    <span class="qual" for="DownPayment" style="float:left;" >Your Phone Number?
                    
                    <input name="" id="" value="(404) 565-4371" style="width:115px" /></span>

                    
                    <span class="qual" for="DownPayment" style="float:right;" >Your Phone Number?
                    
                    <input name="" id="" value="(404) 565-4371" style="width:115px" /></span>


                    
                    <span class="qual" for="DownPayment" style="float:right;" >Your Phone Number?
                    
                    <input name="" id="" value="(404) 565-4371" style="width:115px" /></span -->

<br>

                    <span class="quall">  
                       <div id="chosenloancell" align="center">
		                    <p id="power">Please Enter Your Income For Instant Results!<br><img src="images/loading-gif-animation.gif" width="45" title="Waiting For Your Selection" /></p>
                       </div>
                    </span>
 </div>
 
   
    </td>
    </tr>
  <tr>
    <td  valign="top">
    
    <div id="score_rng">
    
    <table>
    	<tr>
    	  <td colspan="2"><div id="twocircle" nowrap> Select Your Credit Score Range <br />
          <span id="resultsvary">*Results May Vary</span>
          </div></td>
    	  </tr>
    	<tr>
        	<td>Very Good 720 - 850 *</td><td><input class="validate[required] radio" id="Credit" name="Credit" type="radio" onClick="dealMatrixChanged(this.form)" value="<?php echo $vgoodcredit; ?>"   <?php  if (!(strcmp($vgoodcredit,"undefined"))) {echo "checked=\"checked\"";} ?> /></td>
        </tr>
    	<tr>
        	<td>Good 675 - 719 *</td><td><input class="validate[required] radio" id="Credit" name="Credit" type="radio" onClick="dealMatrixChanged(this.form)" value="<?php echo $jgoodcredit; ?>"   <?php  if (!(strcmp($jgoodcredit,"undefined"))) {echo "checked=\"checked\"";} ?> /></td>
        </tr>
    	<tr>
        	<td>Fair (621 - 674) * </td><td><input id="Credit" class="validate[required] radio" <?php if (!(strcmp($faircredit,""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $faircredit; ?>"  onclick="dealMatrixChanged(this.form)"/></td>
        </tr>
    	<tr>
        	<td>Poor (575 - 620) *</td><td><input class="validate[required] radio" id="Credit" name="Credit" type="radio"  onclick="dealMatrixChanged(this.form)" value="<?php echo $poorcredit; ?>" <?php if (!(strcmp($poorcredit,""))) {echo "checked=\"checked\"";} ?>/></td>
        </tr>
    	<tr>
        	<td>Really Bad (Below - 575)*</td><td><input class="validate[required] radio" id="Credit" name="Credit" type="radio"  onclick="dealMatrixChanged(this.form)"  value="<?php echo $subprime; ?>" <?php if (!(strcmp($subprime,""))) {echo "checked=\"checked\"";} ?>/></td>
        </tr>
    	<tr>
        	<td>Not Sure or None (0 - ?) *</td><td><input class="validate[required] radio" id="Credit" name="Credit" type="radio"  onclick="dealMatrixChanged(this.form), popOutThisOffer('af1401','','adj~','homepage','prequalifier-dont_know_score');" value="<?php echo $unknown; ?>" <?php if (!(strcmp($unknown,""))) {echo "checked=\"checked\"";} ?>/></td>
        </tr>
        
    </table>
    
    
    </div>
	
    </td>
<td width="400px" rowspan="2" valign="top">


                <div class="form">
                	<div id="threecircle" nowrap>Enter Your Budget</div>
                    <label for="RentOrMortgage">How Much is Your Rent or Mortgage.</label>

                    <input name="RentOrMortgage" id="RentOrMortgage" onChange="IncomeChanged(this.form)" style="width:115px;" />
                    
                    
                    <label for="CreditCardPayments">How Much is Your Minimum Card Payments.</label>

                    <input name="CreditCardPayments" id="CreditCardPayments" onChange="IncomeChanged(this.form)" style="width:115px;" />
                    
                    
                    <label for="GarnishDeductions">How Much is Your Garnish Deductions.</label>



                    <input name="GarnishDeductions" id="GarnishDeductions" onChange="IncomeChanged(this.form)" style="width:115px;" />
                    
                    <label for="Deductions">Current Car Loan Payment? How Much?</label>
                    <input name="Deductions" id="Deductions" onChange="IncomeChanged(this.form)" style="width:115px;" />
                    
                    <label for="Deductions">Don't include utility bills, or current vehicle payment if trading.</label>

                    <br>

                    <input type="text" name="username" id="username" value="username" />
                    <label for="username">At least 4 characters. Uppercase letters, lowercase letters and numbers only.</label>
                    
                    <input type="password" name="password" id="password" value="password" />
                    <label for="password">At least 4 characters. Use a mix of upper and lowercase for a strong password.</label>
                    
                    <input type="password" name="cpassword" id="cpassword" value="password" />
                    <label for="cpassword">If your passwords aren’t equal, you won’t be able to continue with signup.</label>
                </div>      
    
    </td>
  </tr>
  <tr>
    <td  valign="top">
   
                <div id="vdisplay" align="center">
                    <h4>You Are Qualifying For This: </h4>
                    
                    <br /> 
						
						<?php echo $vtitle; ?> 
                    
                    <img src="<?php echo $truepic; ?>" width="240px">
                    
                    <br />
                    <br />
                    
                    <p id="dealworkurpricing" align="right">
                    
                    <?php if(!$row_slctVehicle['vrprice']){}else{ ?>
            <strong>Selling Price: $</strong><?php echo $row_slctVehicle['vrprice']; ?><br />
					<?php } ?>
                    
                    <?php if(!$row_slctVehicle['vspecialprice']){}else{ ?>
            <strong>Spcial Price: $</strong><?php echo $row_slctVehicle['vspecialprice']; ?><br />
					<?php } ?>
                    
                    <?php if(!$downpaymentPrice){}else{ ?>
            <strong>Down Payment Price: $</strong><?php echo $downpaymentPrice; ?><br />
					<?php } ?>
                    
                    

                    </p>
                    
                </div>

    
    </td>
  </tr>
</table>
