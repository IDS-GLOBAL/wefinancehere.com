
<form action="ajax/leadcapture.php" method="post" name="cust_leadForm" id="cust_leadForm" class="ajax">
                            <legend class="appAboutYou"><span id="lockinimg">&nbsp;</span>Lock-In Your PreApproval And Use It Now!</legend>
                            
                            <div id="preApprovedform">
                            <fieldset>
                              <table width="100%" border="0" cellspacing="3" cellpadding="3" summary="Get Pre-Approved Now Using WeFinanceHere.com Deal Matrix">
                                <caption>
                                  Get Pre-Approved Now
                                </caption>
                                <tr>
                                  <td>
                                <input type="hidden" name="cust_creditaprtxt" id="cust_creditaprtxt">                                 
                                <input type="hidden" name="cust_creditapr" id="cust_creditapr">                                 
                                <input type="hidden" name="bigPrincipal" id="bigPrincipal">
                                <input type="hidden" name="cust_totalpayments" id="cust_totalpayments">
                                <input type="hidden" name="cust_desiredpymt" id="cust_desiredpymt">
                                <input type="hidden" name="cust_downpayment" id="cust_downpayment">
                                <input type="hidden" name="cust_desiredtermos" id="cust_desiredtermos">
                                <input type="hidden" name="cust_desiredtermrange" id="cust_desiredtermrange">
                                </td>
                                  <td><input type="hidden" name="cust_home_state" id="cust_home_state">
                                  <input type="hidden" name="cust_car_loan" id="cust_car_loan"></td>
                                  <td>
                                	<input type="hidden" name="wfhcookiesesid" id="wfhcookiesesid" value="<?php echo $cookiePHPSESSID; ?>">
                                	<input type="hidden" name="fbid" id="fbid" value="<?php echo $fbuserid; ?>">
                                  	<input name="cust_lead_source_id" type="hidden" id="cust_lead_source_id" value="4" >            
									<input name="cust_lead_source" type="hidden" id="cust_lead_source" value="WeFinanceHere.com" >
									<input name="cust_lead_token" type="hidden" id="cust_lead_token" value="<?php echo $tkey; ?>" >
								</td>
                                </tr>
                                <tr>
                                  <td><label>Title:
                                    <select name="cust_titlename" id="cust_titlename" tabindex="1">
								          <option value="" selected="selected">Select One</option>
								          <option value="Mr.">Mr.</option>
								          <option value="Mrs.">Mrs.</option>
								          <option value="Ms.">Ms.</option>
								          <option value="Miss.">Miss.</option>
								          <option value="Dr.">Dr.</option>
                                    
                                    </select>
                                  </label></td>
                                  <td><label>
                                    <input type="text" name="cust_socialsn" id="cust_socialsn">
                                  </label></td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td><label>First Name:
                                    <input type="text" name="cust_fname" id="cust_fname" class="valid">
                                  </label></td>
                                  <td><label>
                                    <input type="text" name="cust_myEmail" id="cust_myEmail">
                                  </label></td>
                                  <td><label>Last Name:
                                    <input type="text" name="cust_lname" id="cust_lname" class="valid">
                                  </label></td>
                                </tr>
                                <tr>
                                  <td><label>Mobile Number:
                                    <input type="text" name="cust_phoneno" id="cust_phoneno" class="valid">
                                  </label></td>
                                  <td>&nbsp;</td>
                                  <td><label>Zip Code:
                                    <input type="text" name="cust_home_zip" id="cust_home_zip" class="valid">
                                  </label></td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                  <label>Your Email:<br />
                                  <input type="text" name="cust_email" id="cust_email" class="valid"></label>
                                  </td>
                                  <td>
                                  <div id="monthlyIncome">
                                  <label>Monthly Income: <br />
                                  <input name="cust_gross_income" type="text" class="valid" id="cust_gross_income" size="10" placeholder="Gross Income"></label></div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                  <label>Work Years?<br >
                                  <select name="cust_employer_years">
             <option value="NULL">Years</option>
             <?php
do {  
?>
             <option value="<?php echo $row_timeYears['year_value']?>"><?php echo $row_timeYears['year_name']?></option>
             <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
           </select>
                                  </label>
                                  </td>
                                  <td>&nbsp;</td>
                                  <td><label>Work Months?<br>
                                  <select name="cust_employer_months">
				  <option value="">Months</option>
				  <?php
do {  
?>
				  <option value="<?php echo $row_timeMonths['month_value']?>"><?php echo $row_timeMonths['month_name']?></option>
				  <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
				</select>
                                  </label></td>
                                </tr>
                                <tr>
                                	<td colspan="3"><label>I have been at my current address for?</label></td>
                                </tr>
                                <tr>
                                  <td><label>Years At Home?</label>
                                  <select name="cust_home_live_years" id="cust_home_live_years">
                             <option value="NULL">Select Years</option>
             <?php
do {  
?>
             <option value="<?php echo $row_timeYears['year_value']?>"><?php echo $row_timeYears['year_name']?></option>
             <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
           </select>
                                  </td>
                                  <td>&nbsp;</td>
                                  <td><label>Months At Home?</label>
                                             <select name="cust_home_live_months" id="cust_home_live_months">
                                                    <option value="">Select Months</option>
                                                <?php
                                                do {  
                                                ?>
                                                   <option value="<?php echo $row_timeMonths['month_value']?>">
												   			<?php echo $row_timeMonths['month_name']?>
                                                   </option>
                                                <?php
                                                } while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
                                                  $rows = mysqli_num_rows($timeMonths);
                                                  if($rows > 0) {
                                                      mysqli_data_seek($timeMonths, 0);
                                                      $row_timeMonths = mysqli_fetch_assoc($timeMonths);
                                                  }
                                                ?>
                                             </select>  

                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="3">
                                  
                                  <div id="PreApprovalAmount">Pre Approval Amount</div>
                                  
                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                
                                <tr>
                                  <td colspan="3" align="center"></td>
                                </tr>
                                <tr>
                                  <td align="left">
                                  </td>
                                  <td>&nbsp;</td>
                                  <td>
                                  
                                  </td>
                                  
                                </tr>

                                
                              </table>
                              </fieldset>
                            </div>
                              <div id="TradeInformation" style="display:none;" >
                               <h2>Please Input Your Trade Information?</h2>
                              <fieldset>
                              <table>
                              <tr>
                                <td><label>Car Payment Now?<br />
                                      <input type="text" name="currentCarpymt" id="currentCarpymt" style=" width: 100px;"></label></td>
                                <td>&nbsp;</td>
                                <td> 
                                    <label>Trade-In Pay Off?<br>
                                    	<input type="text" name="tradePayoff" id="tradePayoff" value="" style=" width: 90px;" />
                                    </label>
</td>
                              </tr>

                                <tr>
                                  <td colspan="3" align="center"><h2>What Is Your Current Vehicle?</h2></td>
                                </tr>
                              
                              <tr>
                                  <td><label for="tradeYear">Year:</label>
                                    <select name="tradeYear" id="tradeYear">
      <option value="">Select Year</option>
      <?php
do {  
?>
      <option value="<?php echo $row_autoYears['year']?>"><?php echo $row_autoYears['year']?></option>
      <?php
} while ($row_autoYears = mysqli_fetch_assoc($autoYears));
  $rows = mysqli_num_rows($autoYears);
  if($rows > 0) {
      mysqli_data_seek($autoYears, 0);
	  $row_autoYears = mysqli_fetch_assoc($autoYears);
  }
?>
    </select>
    </td>
                                  <td><label for="tradeMake">Make</label>
                                    
                                    <select name=tradeMake id="tradeMake" onChange="AjaxFunction(this.value);">
          <option value=''>Select One</option>
          <?php
do {  
?>
          <option value="<?php echo $row_carMakes['car_make']?>"><?php echo $row_carMakes['car_make']?></option>
          <?php
} while ($row_carMakes = mysqli_fetch_assoc($carMakes));
  $rows = mysqli_num_rows($carMakes);
  if($rows > 0) {
      mysqli_data_seek($carMakes, 0);
	  $row_carMakes = mysqli_fetch_assoc($carMakes);
  }
?>
        </select>

                                    
                                </td>
                                  <td><label for="tradeModel">Model</label>
                                            <select id="tradeMake" name="subcat">
        <option value="">Models Appear...</option>
          </select>
</td>
                                </tr>
                                <tr>
                                  <td colspan="3" align="left"><label>Would You Be Willing to Trade If Necessary?
                                      <input name="tradeYes" type="checkbox" id="tradeYes" style="width:20px" value="Y"></label></td>
                                  
                                </tr>
                                
                              </table>
                              </fieldset>
                      </div>
                              <div id="lockInPre-Approval">Lock In Your Pre-Approval Now </div>
                              <!--p><input name="Compute" type="button" id="Compute" onClick="doPrincipal(this.form)" value="Compute" /></p -->
                              <p><input name="submit" type="submit" value="submit"></p>
                              </form>