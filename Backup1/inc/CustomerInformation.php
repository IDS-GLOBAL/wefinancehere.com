<div class="formm">


        <table width="100%" >
            <tr>
                <td valign="top">
                
                
                
                            <div class="desc">
                                    <div class="formheader1">
                                        Primary Information:  <a class="smtext" href="#" onclick="jQuery('#FormDealMatrix').validationEngine('hide')">Hide Errors</a>
                                  </div><!--formheader1-->
                                    
                                    <div class="desc">
                                    
                                    
                                      <table>
                                        <tr>
                                          <td>
                                         <label class="desc">
                                            Title: <select name="titleName">
                                                      <option value="">Select</option>
                                                      <option value="Mr.">Mr.</option>
                                                      <option value="Mrs.">Mrs.</option>
                                                      <option value="Ms.">Ms.</option>
                                                      <option value="Miss.">Miss.</option>
                                                      <option value="Dr.">Dr.</option>
                                                    </select>
                                         </label>
                                            
                                         <input name="mytoken" type="hidden" id="mytoken" value="<?php echo $tkey; ?>" />
                                         <input name="fromsource" type="hidden" id="fromsource" value="<?php echo $fromsource; ?>" />
                                         
                                         <input name="vid" type="hidden" id="vid" value="<?php echo $vid; ?>" />
                                      <input name="did" type="hidden" id="did" value="<?php echo $did; ?>" />
                                      <input name="vvin" type="hidden" id="vvin" value="<?php echo $vvin; ?>" />
                                      <input name="vstockno" type="hidden" id="vstockno" value="<?php echo $vstockno; ?>" />
                                      <input name="vcondition" type="hidden" id="vcondition" value="<?php echo $vcondition; ?>" />
                                      <input name="vyear" type="hidden" id="vyear" value="<?php echo $vyear; ?>" />
        <input name="vmake" type="hidden" id="vmake" value="<?php echo $vmake; ?>" />
                                      <input name="vmodel" type="hidden" id="vmodel" value="<?php echo $vmodel; ?>" />
                                      <input name="vtrim" type="hidden" id="vtrim" value="<?php echo $vtrim; ?>" />
                                      <input name="vmileage" type="hidden" id="vmileage" value="<?php echo $vmileage; ?>" />
                                          </td>
                                          <td><label class="desc">
                                            <input name="joint_or_invidividual" type="radio" id="joint_or_invidividual_0" value="Individual" checked="checked" />
                                          Individual</label></td>
         
                                          <td><label class="desc">
                                            <input type="radio" name="joint_or_invidividual" value="Joint" id="joint_or_invidividual_1" onclick="showjoint()" />
                                            Joint</label></td>
                                        </tr>
                                      </table>
                                    <br />
        
                        <div class="desc">
                                        <label class="desc">First Name:<br />
                                          <input name="FirstName" class="validate[required,custom[onlyLetterSp]] text-input" id="FirstName" value="<?php echo $fbname; ?>" size="22" placeholder="First Name" />
                                        </label>
        
                    <label class="desc">Last Name:<br /><input name="LastName" class="validate[required,custom[onlyLetterSp]] text-input" id="LastName" value="<?php echo $fblname; ?>" size="22" placeholder="Last Name" /></label>
        
                                <label class="desc">Middle Name:<br /><input class="validate[required,custom[onlyLetterSp]] text-input" name="MiddleName" id="MiddleName" size="20" placeholder="Middle Name Or Intial"  /></label>
                                
                                <label class="desc">Suffix: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <select name="Suffix" class="ui-state-default ui-state-hover" id="Suffix">
                                                  <option value="" selected="selected">Select</option>
                                                  <option value="JR">JR</option>
                                                  <option value="SR">SR</option>
                                                  <option value="I">I</option>
                                                  <option value="II">II</option>
                                                  <option value="III">III</option>
                                                  <option value="IV">IV</option>
                                                  <option value="V">V</option>
                                  </select></label>
                                              
                        </div>
        <br />
        
        
              <div class="desc">                  
                                <label class="desc">Email: <br /><input name="Email" class="validate[required,custom[email]] text-input" id="Email" value="<?php echo $fbemail; ?>" size="26" placeholder="Email Address"  /></label>
        
                                <label class="desc">Mobile: <br />
                                  <input value="" class="validate[custom[phone]] text-input" name="Phone" id="Phone" size="12" placeholder="(Code) 123-4567"  /></label> 
                                
                                <label class="desc">Zip: <br /><input class="validate[required,custom[integer]] text-input" type="text" name="Zip" id="Zip" size="3" placeholder="Zip" /></label>
                                
                                <label class="desc">Street Addr.: <br /><input name="Address1" id="Address1" size="18" placeholder="1234 Park Avenue"  /></label>
        
                                <label class="desc">Street Addr.2: <br /><input name="Address2" id="Address2" size="18" placeholder="Apt. B5"  /></label>
        
        </div>
        
        <div class="desc">
                                <label class="desc">City: <input name="City" id="City" size="6" placeholder="City" class="validate[required,custom[onlyLetterSp]] text-input" /></label>
        
                                <label class="desc">State:
                                <select name="State" id="State">
                                  <option value="">Select State</option>
                                  <?php
        do {  
        ?>
                                  <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                  <?php
        } while ($row_states = mysqli_fetch_assoc($states));
          $rows = mysqli_num_rows($states);
          if($rows > 0) {
              mysqli_data_seek($states, 0);
              $row_states = mysqli_fetch_assoc($states);
          }
        ?>
                                </select></label>
                                
                                
        
                                <label class="desc">County: <br /><input class="validate[required,custom[onlyLetterSp]] text-input" name="County" id="County" size="15"  /></label>
        
                                
                                <label class="desc">Rent/Own: <br />
                                <select name="applicant_buy_own_rent_other">
                                    <option value="">Select Living Type</option>
                                    <option value="Owns Home Outright">Owns Home Outright</option>
                                    <option value="Buying Home">Buying Home</option>
                                    <option value="Renting/Leasing">Renting/Leasing</option>
                                    <option value="Living w/ Relatives">Living w/ Relatives</option>
                                    <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
                                    <option value="Unknown">Unknown</option>
                                </select>
                                </label>
        
        </div>
        <br />
        <div class="desc">
        How Long Have You Lived Here?<br />
                                <label class="desc">
                                <select name="LiveYears" id="LiveYears" onChange="showLive5Years(this)">
                                  <option value="">Select Years</option>
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
                                
                                <label class="desc">
                                <select name="LiveMonths" id="LiveMonths">
                                  <option value="">Select Months</option>
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
                                </select></label>
                               
        
        </div>
                                
                       
        
        <br />
                                      <div class="desc">
                                            If You Have not Lived At This Address For More Than 5 Years Please Click Add Previous Address Below To Enter More Information.  <a href="javascript:hideshow(document.getElementById('PreviousHomeInformation'))">Click Here!</a>
                                      </div><!--goDesc-->
                                        
                                        <div id="PreviousHomeInformation" style="display: block;">
                                        
                                            
                                                               <h1>Prev. Addr.: </h1>
                             
                                                
                                            <div class="desc">
                                            
                                            
                                        <label class="desc">Street Addr.: <br><input class="validate[required] text-input" name="2Address1" id="2Address1" size="17"></label>
                
                                        <label class="desc">Street Addr. 2: <br><input name="2Address2" id="2Address2" size="17"></label>
                
                                        <label class="desc">City: <br><input name="2City" id="2City" size="6"></label>
                
                                        <label class="desc">State: <br><select name="2State" id="2State">
                                          <option value="">Select State</option>
                                          <?php
        do {  
        ?>
                                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                          <?php
        } while ($row_states = mysqli_fetch_assoc($states));
          $rows = mysqli_num_rows($states);
          if($rows > 0) {
              mysqli_data_seek($states, 0);
              $row_states = mysqli_fetch_assoc($states);
          }
        ?>
                                        </select></label>
        
                                        <label class="desc">Zip: <input name="2Zip" id="2Zip" size="4"></label>
                                        <label class="desc">County: <input name="2County" id="2County" size="11"></label><br>
                                        
        </div>
        
        <div class="desc">
            <table>
                <tr>
                    <td colspan="2">
                    How Long Have You Lived Here?
                    </td>
                    <td>
                    Do You Rent or Own?
                    </td>
                </tr>
                    <tr>
                        <td>
                                        <label class="desc">
                                            <select name="2LiveYears" id="2LiveYears">
                                              <option value="">Select Years</option>
                                                        <option value="0 Years">0 Years</option>
                                                        <option value="1 Year">1 Year</option>
                                                        <option value="2 Years">2 Years</option>
                                                        <option value="3 Years">3 Years</option>
                                                        <option value="4 Years">4 Years</option>
                                                        <option value="5 Years">5 Years</option>
                                                        <option value="6 Years">6 Years</option>
                                                        <option value="7 Years">7 Years</option>
                                                        <option value="8 Years">8 Years</option>
                                                        <option value="9 Years">9 Years</option>
                                                        <option value="10 Years">10 Years</option>
                                                        <option value="11 Years">11 Years</option>
                                                        <option value="12 Years">12 Years</option>
                                                        <option value="13 Years">13 Years</option>
                                                        <option value="14 Years">14 Years</option>
                                                        <option value="15 Years">15 Years</option>
                                                        <option value="16 Years">16 Years</option>
                                                        <option value="17 Years">17 Years</option>
                                                        <option value="18 Years">18 Years</option>
                                                        <option value="19 Years">19 Years</option>
                                                        <option value="20 Years">20 Years</option>
                                          </select>
                          </label>
                      </td>
                            <td>            
                                        <label class="desc"><select name="2LiveMonths" id="2LiveMonths">
                                          <option value="">Select Months</option>
                                                                    <option value="0 Months">0 Months</option>
                                                                    <option value="1 Month">1 Month</option>
                                                                    <option value="2 Months">2 Months</option>
                                                                    <option value="3 Months">3 Months</option>
                                                                    <option value="4 Months">4 Months</option>
                                                                    <option value="5 Months">5 Months</option>
                                                                    <option value="6 Months">6 Months</option>
                                                                    <option value="7 Months">7 Months</option>
                                                                    <option value="8 Months">8 Months</option>
                                                                    <option value="9 Months">9 Months</option>
                                                                    <option value="10 Months">10 Months</option>
                                                                    <option value="11 Months">11 Months</option>
                                              </select></label>
                      </td>
                             <td>           
                                 
                
                                        
                               <label class="desc">
                                 <select name="2applicant_buy_own_rent_other" id="2applicant_buy_own_rent_other">
                                 <option value="">Select Living Type</option>
                                <option value="Owns Home Outright">Owns Home Outright</option>
                                <option value="Buying Home">Buying Home</option>
                                <option value="Renting/Leasing">Renting/Leasing</option>
                                <option value="Living w/ Relatives">Living w/ Relatives</option>
                                <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
                                <option value="Unknown">Unknown</option>
                              </select>
                              </label>
                </td>
                </tr>
              </table>
                </div>
                                                <div class="desc">
                                                    If You Have not Lived At This Address For 5 Years Please Click Add Previous Address Below To Enter More Information.
                                                </div><!--goDesc-->
                                            
                                      </div>
                                        
                              </div>
                                        
                                        
                                    
                              </div>
                        
                      
                
                
                </td>
                </tr>
                <tr>
                <td valign="top">
                
                            
                            <div class="desc">
                                    <div class="formheader2">
                                        <h1>Work Information:</h1> 
                                        
                                        <a class="smtext" href="#" onclick="jQuery('#FormDealMatrix').validationEngine('hide')">Hide Errors...</a>
                                    </div><!--formheader2-->
        
        
        
        
                                    
                                    <div class="desc">
                                <label class="desc">Employer Name: <br /> <input class="validate[required] text-input" type="text" name="EmployerName" id="EmployerName" size="23" placeholder="Employer Name" /></label>
        
                                <label class="desc">Phone No: <br />
                                  <input value="" class="validate[custom[phone]] text-input" type="text" name="EmployerPhoneNo" id="telephone" size="12" placeholder="(123) 456 - 7890"  /></label>
        
        
        <label class="desc">Employment Type: <br />
        <select name="EmploymentType">
          <option value="">Select One</option>
                    <option value="Auto Worker">Auto Worker</option>
                    <option value="Clerical">Clerical</option>
                    <option value="Craftsman">Craftsman</option>
                    <option value="Executive/Managerial">Executive/Managerial</option>
                    <option value="Farmer">Farmer</option>
                    <option value="Fisherman">Fisherman</option>
                    <option value="Government">Government</option>
                    <option value="Homemaker">Homemaker</option>
                    <option value="Other">Other</option>
                    <option value="Professional">Professional</option>
                    <option value="Sales/Advertising">Sales/Advertising</option>
                    <option value="Semi-Skilled Labor">Semi-Skilled Labor</option>
                    <option value="Skilled Labor">Skilled Labor</option>
        </select>
        </label>
        
        
        
                                <label class="desc">Employer Addr. 1: <br /><input type="text" name="EmployerAddr1" id="EmployerAddr1" size="13" placeholder=""  /></label>
<br />
        
                                <label class="desc">Employer Addr. 2: <br /><input type="text" name="EmployerAddr2" id="EmployerAddr2" size="13" placeholder=""  /></label>                       
        
        
        
        
        <label class="desc">City: <input name="EmployerCity" type="text" id="EmployerCity" size="12"></label>
        
        <label class="desc">State: <select name="EmployerState" id="EmployerState">
          <option value="">Select One</option>
          <?php
        do {  
        ?>
          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
          <?php
        } while ($row_states = mysqli_fetch_assoc($states));
          $rows = mysqli_num_rows($states);
          if($rows > 0) {
              mysqli_data_seek($states, 0);
              $row_states = mysqli_fetch_assoc($states);
          }
        ?>
        </select></label>                        


        <label class="desc">Zip: <input name="EmployerZip" type="text" id="EmployerZip" size="5"></label>


        

</div>


									
                                    
                                    
                                    <div class="desc">
        
        <label class="desc">Employment Status: <br />
                <select name="EmploymentStatus" id="EmploymentStatus">
                    <option value="">Select One</option>
                    <option value="Active Military">Active Military</option>
                    <option value="Contract">Contract</option>
                    <option value="Full Time"> Full Time</option>
                    <option value="Not Applicable">Not Applicable</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Retired">Retired</option>
                    <option value="Seasonal">Seasonal</option>
                    <option value="Self Employed">Self Employed</option>
                    <option value="Temporary">Temporary</option>
                </select>
        </label>
        
        <label class="desc">Employment Title: <br />
         <input type="text" name="EmploymentTitle" id="EmploymentTitle" />
         </label>
         
         <label class="desc">When Do You Get Paid? <br />
                <select name="paydayFreq" id="paydayFreq" class="validate[required]">
                    <option value="">Select One</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Biweekly">Biweekly</option>
                    <option value="Semimonthly">Semimonthly</option>
                    <option value="Monthly" selected="selected">Monthly</option>
                    <option value="Yearly">Yearly</option>
            </select>
         </label>
 </div>
 
 
 
<div class="desc">        
        
                 <table class="mytables">
                 <tr>
                 <td colspan="3">
                 How Long Have You Worked Here?
                 </td>
                 </tr>
                 	<tr>
                    	<td>
         <label class="desc">Work Years? <br />
                <select name="workYears" class="validate[required]" onChange="showWork5Years(this)">
                    <option value="">Select Years</option>
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
        <td>
        <label class="desc"> Work Months <br />
        <select name="workMonths" class="validate[required]">
          <option value="">Select Months</option>
          <?php
        do {  
        ?>
          <option value="<?php echo $row_timeMonths['month_name']?>"><?php echo $row_timeMonths['month_value']?></option>
          <?php
        } while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
          $rows = mysqli_num_rows($timeMonths);
          if($rows > 0) {
              mysqli_data_seek($timeMonths, 0);
              $row_timeMonths = mysqli_fetch_assoc($timeMonths);
          }
        ?>
        </select>
        
        </label>
        </td>
        <td>
        
        	  <div class="desc">      
              
              <a href="javascript:hideshow(document.getElementById('PreviousEmployerShow'))">Add Previous Work >></a>

         </div>

        
        </td>
        </tr>
        </table>
        
        
  	</div>

  
  
        
        
                                        
                                        <!--goDesc-->
                                        
         <div class="desc">               
         
         <span id="txtleft">If You Have Not Worked This Job More Than 2 Years Please Click Add Previous Work
                                           To Enter More Required Information Please.	</span>

         <a href="javascript:hideshow(document.getElementById('PreviousEmployerShow'))">Cick Here To Add Previous Work Information.</a>
        
                              </div><!--goDesc-->
                                 
        
                    <div class="desc" id="PreviousEmployerShow" style="display: block;">
         
        <hr />
                 
                              <div class="desc">
                                        <h1>Previous Employer: </h1>
                                    </div><!--formheader1-->
                            
                            
                            <div class="desc">
                                <label class="desc">Prev. Employer Name: <br />
                                  <input class="validate[required] text-input" name="applicant_employer2_name" id="applicant_employer2_name" size="25" />
                                </label>
                               
                                
                                <label class="desc">Prev. Employer Phone: <br />
                                <input value="" class="validate[custom[phone]] text-input" name="applicant_employer2_phone" type="text" id="applicant_employer2_phone" size="15">
                                </label>
        

                                <label class="desc">Prev. Employer Addr. 1:  <br />
                              <input name="applicant_employer2_addr" id="applicant_employer2_addr" size="15" /></label>
                                
        </div>
        <div class="desc">
                                <label class="desc">Prev. Employer Addr. 2: <br />
<input name="applicant_employer2_addr2" id="applicant_employer2_addr2" size="15" /></label>
                                
                                
                                <label class="desc">Zip: <br /><input name="applicant_employer2_zip" type="text" id="applicant_employer2_zip" size="5"></label>
                                <label class="desc">City: <br /><input name="applicant_employer2_city" type="text" id="applicant_employer2_city" size="10"></label>
        
                                
                                <label class="desc">State: <br /><select name="applicant_employer2_state" id="applicant_employer2_state">
                                  <option value="">Select One</option>
                                  <?php
        do {  
        ?>
                                  <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                  <?php
        } while ($row_states = mysqli_fetch_assoc($states));
          $rows = mysqli_num_rows($states);
          if($rows > 0) {
              mysqli_data_seek($states, 0);
              $row_states = mysqli_fetch_assoc($states);
          }
        ?>
                                </select></label>
        
        <br />
        
        <div class="desc">
        
        <table>
            <tr>
                <td colspan="2">
        Prev. Work Years &amp; Months:
                </td>
                <tr>
                    <td>
        
        <select name="2workYears">
          <option value="">Select Years</option>
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
        <td>
        
        
        <select name="2workMonths">
          <option value="">Select Months</option>
          <?php
        do {  
        ?>
          <option value="<?php echo $row_timeMonths['month_name']?>"><?php echo $row_timeMonths['month_value']?></option>
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
        </table>
        
        </div>
   
   
   </div>
        
        
        
        
        
        
        
        
        
                            </div>
       
                    </div>        
        		</td>
                <tr>
                <td>
                              <div class="desc">
                                        <h1>Other Income:</h1>
                                    </div><!--formheader1-->
        
                                        <div class="desc">
                                                                        <label class="desc">Other Income Source?:<br /> <input name="applicant_other_income_source" id="applicant_other_income_source" size="15" /></label>
        
                                    <label class="desc">Other Income Amount?:<br /> <input name="applicant_other_income_amount" id="applicant_other_income_amount" size="15"  /></label>
        
                                    
                                    <label class="desc">When Do You Get This Other Income?<br /> <select name="applicant_other_income_when_rcvd" id="applicant_other_income_when_rcvd">
                    <option value="">Select One</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Biweekly">Biweekly</option>
                                <option value="Semimonthly">Semimonthly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Yearly">Yearly</option>
                              </select></label><br />
        
        
                                            <div class="desc">Please Enter All Information Most Accurate As Possible For We Can Approve Your Loan.</div>
                                      </div><!--goDesc-->

        
        
                        
                        
                
                </td>
                </tr>
                <tr>
                <td valign="top">
                
                
<div class="desc">
                                    <div class="formheader2">
                                        <h1>Finance Information:</h1>  <a class="smtext" href="#" onclick="jQuery('#FormDealMatrix').validationEngine('hide')">Hide Errors</a>
                                    </div><!--formheader1-->
                                    


	<div class="desc">
                                    
    	<table>
        	<tr>
            	<td>
                	                                  <label class="desc">Term: <br /><input class="validate[required,custom[integer]] text-input" name="applilcant_v_term_months" type="text" id="applilcant_v_term_months" value="<?php echo $row_slctDlr['settingDefaultTerm']; ?>"  size="4"  /></label>

                </td>
                <td>
                		                                <label class="desc">Rate:<br /><input name="applilcant_v_cust_rate" type="text"  id="applilcant_v_cust_rate" value="10.0" size="4" readonly="readonly" /></label>

                </td>
                <td align="center">
                			                    <label class="desc">Estimated Monthly Payment:<br />
        				<input class="validate[required,custom[number]] text-input" name="applilcant_v_total_monthpmts_est" type="text" id="applilcant_v_total_monthpmts_est"  size="4" readonly="readonly" style="width: 130px;" />
                    </label> 

                </td>
                <td>
                
                	                                <label class="desc">Click Show My Payment <br />
                                <input type='button' onClick='showpay()'  value='Show My Payment!' style="width: 130px;" />
                                </label> 

                
                </td>
                </tr>
        </table>                                
                                    
                                    
                                    
                                    
                                <input type="hidden" name="applilcant_v_financed_amount" id="applilcant_v_financed_amount" value="<?php echo $sellingPrice; ?>"  />
                                
        
                                
                                
                               
        
                                
                               
         
                                
                                
                                
        
        
                                
                                
                                
                                
                                
                                
                                
                                
                                
<input  type="hidden" name="Fees" id="Fees" size="15" value="<?php echo $fees; ?>" />

                             <label class="desc">Estimated Out The Door Price:<br />
        <input name="SellingPrice" id="SellingPrice"  value="<?php echo $sellingPrice; ?>" size="4" readonly="readonly" /></label><br />
        
        
                    
                    
                                        
                              
                          
                      </div>
                    
                    <div class="desc">
                    <br />
                                            <p>Do You Have A Vehicle You Will Be Trading With This Purchase? If So Please <a href="javascript:hideshow(document.getElementById('TradeInformation'))">Click Here!</a> </p>
                                            
        
                      <label class="desc">What Is Your Down Payment:<br />
        <input name="DownPayment2" id="DownPayment2" size="20" placeholder="<?php echo $mindown; ?>"  /></label>
        
                 <!-- a href="javascript:hideshow(document.getElementById('TradeInformation'))">Trade Information >>Show/Hide</a -->
                    </div><!--goDesc-->
                
              
                
<div id="TradeInformation" style="display: block;">


		<table>
        	<tr>
            	<td>
                     <label class="desc">Trade Year:<br />
        
                      <select name="applilcant_v_trade_year" id="applilcant_v_trade_year">
                    <option value="">Select One</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                              </select>
                     </label>
        		</td>
                
               <td>
            <label class="desc">Trade Make:<br />
        <select name="applilcant_v_trade_make" id="applilcant_v_trade_make">
                    <option value="">Select One</option>
                                <option value="AMC">AMC</option>
                                <option value="Acura">Acura</option>
                                <option value="Alfa Romeo">Alfa Romeo</option>
                                <option value="Aston Martin">Aston Martin</option>
                                <option value="Audi">Audi</option>
                                <option value="Avanti">Avanti</option>
                                <option value="Bentley">Bentley</option>
                                <option value="BMW">BMW</option>
                                <option value="Buick">Buick</option>
                                <option value="Cadillac">Cadillac</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Chrysler">Chrysler</option>
                                <option value="Daewoo">Daewoo</option>
                                <option value="Daihatsu">Daihatsu</option>
                                <option value="Datsun">Datsun</option>
                                <option value="Delorean">Delorean</option>
                                <option value="Dodge">Dodge</option>
                                <option value="Eagle">Eagle</option>
                                <option value="Ferrari">Ferrari</option>
                                <option value="Fiat">Fiat</option>
                                <option value="Ford">Ford</option>
                                <option value="Geo">Geo</option>
                                <option value="GMC">GMC</option>
                                <option value="Honda">Honda</option>
                                <option value="Hummer">Hummer</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Infiniti">Infiniti</option>
                                <option value="Isuzu">Isuzu</option>
                                <option value="Jaguar">Jaguar</option>
                                <option value="Jeep">Jeep</option>
                                <option value="Kia">Kia</option>
                                <option value="Lamborghini">Lamborghini</option>
                                <option value="Lancia">Lancia</option>
                                <option value="Land Rover">Land Rover</option>
                                <option value="Lexus">Lexus</option>
                                <option value="Lincoln">Lincoln</option>
                                <option value="Lotus">Lotus</option>
                                <option value="Maserati">Maserati</option>
                                <option value="Maybach">Maybach</option>
                                <option value="Mazda">Mazda</option>
                                <option value="Mercedes-Benz">Mercedes-Benz</option>
                                <option value="Mercury">Mercury</option>
                                <option value="Merkur">Merkur</option>
                                <option value="MINI">MINI</option>
                                <option value="Mitsubishi">Mitsubishi</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Oldsmobile">Oldsmobile</option>
                                <option value="Peugeot">Peugeot</option>
                                <option value="Plymouth">Plymouth</option>
                                <option value="Pontiac">Pontiac</option>
                                <option value="Porsche">Porsche</option>
                                <option value="Renault">Renault</option>
                                <option value="Rolls-Royce">Rolls-Royce</option>
                                <option value="Saab">Saab</option>
                                <option value="Saturn">Saturn</option>
                                <option value="Scion">Scion</option>
                                <option value="Smart">Smart</option>
                                <option value="Sterling">Sterling</option>
                                <option value="Subaru">Subaru</option>
                                <option value="Suzuki">Suzuki</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Triumph">Triumph</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Volvo">Volvo</option>
                                <option value="Yugo">Yugo</option>
                                <option value="Trailer">Trailer</option>
                                <option value="Yamaha">Yamaha</option>
                                <option value="Other">Other</option>
                              </select></label>
        </td>
        <td>
                              
                              <label class="desc">Trade Model:<br />
        
                              
                              <input type="text" name="applilcant_v_trade_model" id="applilcant_v_trade_model">
                              </label>
        </td>                      
       </tr>
       <tr>
       	<td colspan="2">
        <p>
                              
                              <label class="desc">Trade Vin:
                                <input name="applilcant_v_trade_vin" type="text" id="applilcant_v_trade_vin" maxlength="17">
                              </label>
          </p> 
          </td>
          <td>
          	        <p>
                              
                              <label class="desc">Trade Value/Pay Off:
                                <input name="applilcant_v_trade_payoffvalue" type="text" id="applilcant_v_trade_payoffvalue" maxlength="17">
                              </label>
          </p> 

          </td>
          </tr>
          
          </table>                   
                              </div><!-- Hide Show Trade Information -->
        
        
                                    <br />
                                                        <label class="desc">Enter Any Of Your Comments Here: <br />
        <textarea name="ThisComments" cols="70" rows="7" id="ThisComments"></textarea></label>
        
        						<br />
                                    <br />
        
                                    <input onclick="submitform()" name="Submit" value="Process ME" id="processmeButton" style="width: 300px">
        
                  </div>
                
                
                
                </td>
           </tr>
        </table>


</div>