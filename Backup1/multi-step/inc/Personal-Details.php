                        <div class="form-step" >

  <label>
    <input type="radio" name="joint_or_invidividual" value="1" id="joint_or_invidividual_0" />
    Individual</label>

  <label>
    <input type="radio" name="joint_or_invidividual" value="2" id="joint_or_invidividual_1" />
    Joint</label>
  <br />

<div class="row">
<div class="form-left">Title</div>
                                <div class="form-right">
									<select name="titleName">
                                              <option value="">Select</option>
                                              <option value="Mr.">Mr.</option>
                                              <option value="Mrs.">Mrs.</option>
                                              <option value="Ms.">Ms.</option>
                                              <option value="Miss.">Miss.</option>
                                              <option value="Dr.">Dr.</option>
							      </select>
</div>
                                <div class="form-error"></div>
                          </div>

<p>
                                    
                                 <input name="mytoken" type="hidden" id="mytoken" value="e45ec4e09b8258ce3306">
                                 <input name="fromsource" type="hidden" id="fromsource" value="WeFinanceHere.com">
                                 
                                 <input name="vid" type="hidden" id="vid" value="">
                              <input name="did" type="hidden" id="did" value="">
                              <input name="vvin" type="hidden" id="vvin" value="">
                              <input name="vstockno" type="hidden" id="vstockno" value="">
                              <input name="vcondition" type="hidden" id="vcondition" value="">
                              <input name="vyear" type="hidden" id="vyear" value="">
<input name="vmake" type="hidden" id="vmake" value="">
                              <input name="vmodel" type="hidden" id="vmodel" value="">
                              <input name="vtrim" type="hidden" id="vtrim" value="">
                              <input name="vmileage" type="hidden" id="vmileage" value="">



</p>
                            <div class="row">
                            <div class="form-left">First Name *</div>
                                                            <div class="form-right"><input type="text" id="FirstName" name="FirstName" class="form-input" /></div>
                                                            <div class="form-error"></div>
                                                      </div>

                            <div class="row">
                                <div class="form-left">Last Name *</div>
                                <div class="form-right"><input type="text" id="LastName" name="LastName" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>

                            <div class="row">
                                <div class="form-left">Middle Name *</div>
                                <div class="form-right"><input type="text" id="MiddleName" name="MiddleName" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>

                            
                            
                            <div class="row">
                                <div class="form-left">Suffix *</div>
                                <table>
                                	<tr>
                                    	<td valign="top">
                                <div class="form-right2">
                                <label class="desc">Suffix:
                                      <select name="Suffix" class="ui-state-default ui-state-hover" id="Suffix">
								          <option value="" selected="selected">Select</option>
								          <option value="JR">JR</option>
								          <option value="SR">SR</option>
								          <option value="I">I</option>
								          <option value="II">II</option>
								          <option value="III">III</option>
								          <option value="IV">IV</option>
								          <option value="V">V</option>
						              </select>
                                  </label>
                                      </div>
                                     </td>
                                     <td valign="top">
                                     <div class="form-right2">
                                     <label> Sex:
                                    <select id="gender" name="gender">
                                        <option value="0">Select</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                    </label>
                                </div>
                                <div class="form-error"></div>
                                </td>
                                </tr>
                                </table>
                            </div>
                            
                            

							<div class="row">
                                <div class="form-left">Email *</div>
                                <div class="form-right"><input type="text" id="Email" name="Email" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>

							<div class="row">
                                <div class="form-left">Phone / Zip *</div>
                                <table>
                                	<tr>
                                    	<td valign="top">
                                <div class="form-right2">
                            <div class="row">
                                <div class="form-leftt">Phone:</div>
                                <div id="form-right2"><input type="text" name="Phone" id="form-input2"  /></div>
                                <div class="form-error"></div>
                            </div>
                                      </div>
                                     </td>
                                     <td valign="top">
                            <div class="row">
                                <div class="form-leftt">Zip:</div>
                                <div id="form-right2"><input type="text" name="Zip" id="form-input2"  /></div>
                                <div class="form-error"></div>
                            </div>
                                <div class="form-error"></div>
                                </td>
                                </tr>
                                </table>
                            </div>
                                                        
                            <div class="row">
                                <div class="form-left">Address 1:</div>
                                <div class="form-right"><input type="text" id="Address" name="Address" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>

                            <div class="row">
                                <div class="form-left">Address 2:</div>
                                <div class="form-right"><input type="text" id="Address2" name="Address2" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>


							<div class="row">
                                <div class="form-left">City / State *</div>
                                <table>
                                	<tr>
                                    	<td valign="top">
                                <div class="form-right2">
                            <div class="row">
                                <div class="form-leftt">City:</div>
                                <div id="form-right2"><input type="text" name="City" id="form-input2"  /></div>
                                <div class="form-error"></div>
                            </div>
                                      </div>
                                     </td>
                                     <td valign="top">
                            <div class="row">
                                <div class="form-leftt">State:</div>
                                <div id="form-right2">                        <select name="State" id="State">
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
</div>
                                <div class="form-error"></div>
                            </div>
                                <div class="form-error"></div>
                                </td>
                                </tr>
                                </table>
                            </div>
                            
                                                    
                            <div class="row">
                                <div class="form-left">County *</div>
                                <div class="form-right"><input type="text" id="County" name="County" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="form-left">Rent/Own: *</div>
                                <div class="form-right">
                        <label class="desc">Rent/Own:<select name="applicant_buy_own_rent_other">
                 <option value="">Select Living Type</option>
            <option value="Owns Home Outright">Owns Home Outright</option>
            <option value="Buying Home">Buying Home</option>
            <option value="Renting/Leasing">Renting/Leasing</option>
            <option value="Living w/ Relatives">Living w/ Relatives</option>
            <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
            <option value="Unknown">Unknown</option>
          </select></label><br />
</div>
                                <div class="form-error"></div>
                            </div>
                            
                            <div class="row">
                                <div class="form-left">How Long Have You Lived Here?</div>
                                <div class="form-right2"> 
                                
                                <table>
                                <tr><td colspan="2">                       
                                <label class="desc">How Long Have You Lived Here?</label><br /></td></tr>
                                <tr><td>
                                
                        
                        
						<label class="desc"><select name="LiveYears" id="LiveYears" onChange="showLive5Years(this)">
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
                        </select></label>
                        </td>
                        <td>
                        <label class="desc"><select name="LiveMonths" id="LiveMonths">
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
                        </td>
                        </tr></table>

</div>
                                <div class="form-error"></div>
                            </div>

                            <div class="row">
                                <div class="form-left"></div>
                                <div class="form-right">
                                  <h2>Previous Address</h2>
                                </div>
                                <div class="form-error"></div>
                      </div>
                        
                        
                            <div class="row">
                                <div class="form-left">Address 1</div>
                                <div class="form-right"><input type="text" id="2Address1" name="2Address1" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>


                            <div class="row">
                                <div class="form-left">Address 2</div>
                                <div class="form-right"><input type="text" id="2Address2" name="2Address2" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>

							<div class="row">
                                <div class="form-left">City / State *</div>
                                <table>
                                	<tr>
                                    	<td valign="top">
                                <div class="form-right2">
                            <div class="row">
                                <div class="form-leftt">City:</div>
                                <div id="form-right2"><input type="text" name="2City" id="2City"  /></div>
                                <div class="form-error"></div>
                            </div>
                                      </div>
                                     </td>
                                     <td valign="top">
                            <div class="row">
                                <div class="form-leftt">State:</div>
                                <div id="form-right2">                        
                                <label><select name="2State" id="2State">
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
</div>
                                <div class="form-error"></div>
                            </div>
                                <div class="form-error"></div>
                                </td>
                                </tr>
                                </table>
                            </div>
                            
                            
                            <div class="row">
                                <div class="form-left">Zip / County</div>
                                <table>
                                	<tr>
                                    	<td valign="top">
                                <div class="form-right2">
                            <div class="row">
                                <div class="form-leftt">Zip:</div>
                                <div id="form-right2"><input type="text" name="2Zip" id="2Zip"  /></div>
                                <div class="form-error"></div>
                            </div>
                                      </div>
                                     </td>
                                     <td valign="top">
                            <div class="row">
                                <div class="form-leftt">County:</div>
                                <div id="form-right2">                        
                                <label>
                                <input type="text" name="2County" id="2County"  />
                                </label>
</div>
                                <div class="form-error"></div>
                            </div>
                                <div class="form-error"></div>
                                </td>
                                </tr>
                                </table>
                            </div>

							<div class="row">
                                <div class="form-left">How Long Have You Lived Here?</div>
                                <div class="form-right2"> 
                                
                                <table>
                                <tr><td colspan="2">                       
                                <label class="desc">How Long Have You Lived Here?</label><br /></td></tr>
                                <tr><td>
                                
                        
                        
						<label class="desc"><select name="2LiveYears" id="2LiveYears" onChange="showLive5Years(this)">
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
                        </select></label>
                        </td>
                        <td>
                        <label class="desc"><select name="2LiveMonths" id="2LiveMonths">
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
                        </td>
                        </tr></table>

</div>
                                <div class="form-error"></div>
                            </div>
                            
                                                                                                
                            <div class="row">
                                <div class="form-left">Rent/Own: *</div>
                                <div class="form-right">
                            <label class="desc">Rent/Own:<select name="2applicant_buy_own_rent_other">
                                             <option value="">Select Living Type</option>
                                        <option value="Owns Home Outright">Owns Home Outright</option>
                                        <option value="Buying Home">Buying Home</option>
                                        <option value="Renting/Leasing">Renting/Leasing</option>
                                        <option value="Living w/ Relatives">Living w/ Relatives</option>
                                        <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
                                        <option value="Unknown">Unknown</option>
                                      </select></label><br />
                            </div>
                                <div class="form-error"></div>
                            </div>

                        
                        
                        </div>
