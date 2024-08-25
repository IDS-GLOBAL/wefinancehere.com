                        <div class="form-step" >
                          <table width="930px" border="0" cellspacing="3" cellpadding="3">
                          	<tr>
                              <th colspan="2"><h4>Qualifying For This <?php echo $vtitle; ?></h4></th>
                            </tr>
                            <tr>
                              <th scope="col">Choose Your Credit Score? *</th>
                              <th scope="col">Income Budget! *</th>
                            </tr>
                            <tr valign="top">
                              <td>
                              
                              <div class="row">
                              <div class="form-left">Very Good <b>(720 - 850)</b> *</div>
                                <div class="form-right"><input class="validate[required] radio" id="Credit" name="Credit" type="radio" onclick="dealMatrixChanged(this.form)" value="<?php echo $vgoodcredit; ?>" width="115"  <?php  if (!(strcmp($vgoodcredit,"undefined"))) {echo "checked=\"checked\"";} ?> /></div>
                                <div class="form-error"></div>
                          </div>
                            <div class="row">
                                <div class="form-left"> Good (675 - 719) *</div>
                                <div class="form-right"><input class="validate[required] radio" id="Credit" name="Credit" type="radio" onclick="dealMatrixChanged(this.form)" value="<?php echo $vgoodcredit; ?>" width="115"  <?php if (!(strcmp($vgoodcredit,"undefined"))) {echo "checked=\"checked\"";} ?> /></div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left"> Very Good <b>(720 - 850)</b></div>
                                <div class="form-right">
<input class="validate[required] radio" id="Credit" name="Credit" type="radio" onclick="dealMatrixChanged(this.form)" value="<?php echo $jgoodcredit; ?>" <?php if (!(strcmp($jgoodcredit,"undefined"))) {echo "checked=\"checked\"";} ?>    />                                
                                </div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left">Good <b>(675 - 719)</b></div>
                                <div class="form-right"><input id="Credit" class="validate[required] radio" <?php if (!(strcmp($faircredit,""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $faircredit; ?>"  onclick="dealMatrixChanged(this.form)"/></div>
                                <div class="form-error"></div>
                            </div>


                            <div class="row">
                                <div class="form-left">Fair <b>(621 - 674)</b></div>
                                <div class="form-right"><input class="validate[required] radio" id="Credit" name="Credit" type="radio"  onclick="dealMatrixChanged(this.form)" value="<?php echo $poorcredit; ?>" <?php if (!(strcmp($poorcredit,""))) {echo "checked=\"checked\"";} ?>/></div>
                                <div class="form-error"></div>
                            </div>



                            <div class="row">
                                <div class="form-left">Poor <b>(575 - 620)</b></div>
                                <div class="form-right"><input class="validate[required] radio" <?php if (!(strcmp($subprime,""))) {echo "checked=\"checked\"";} ?> type="radio" id="Credit" name="Credit" value="<?php echo $subprime; ?>"  onclick="dealMatrixChanged(this.form)"/></div>
                                <div class="form-error"></div>
                            </div>

                            <div class="row">
                                <div class="form-left">Really Bad <b>(Below - 575)</b></div>
                                <div class="form-right"><input class="validate[required] radio" name="Credit" type="radio"  onclick="popOutThisOffer('af1401','','adj~','homepage','prequalifier-dont_know_score');" value="<?php echo $unknown; ?>" <?php if (!(strcmp($unknown,""))) {echo "checked=\"checked\"";} ?>/></div>
                                <div class="form-error"></div>
                            </div>
                            
                            <div class="row">
                                <div class="form-left"><span>Not Sure or None (0 - ?)</span></div>
                                <div class="form-right"><input class="validate[required] radio" name="Credit" type="radio"  onclick="popOutThisOffer('af1401','','adj~','homepage','prequalifier-dont_know_score');" value="<?php echo $unknown; ?>" <?php if (!(strcmp($unknown,""))) {echo "checked=\"checked\"";} ?>/></div>
                                <div class="form-error"></div>
                            </div>
                              
                              
                              </td>
                              <td>
                              
                              <div class="row">
                              <div class="form-left">Your Monthly Income?*</div>
                                <div class="form-right2"><input name="income" class="validate[required,custom[integer]] text-input" id="income"  style="width:125px;" onchange="IncomeChanged(this.form)" value="9000" /></div>
                                <div class="form-error"></div>
                          </div>
                            <div class="row">
                                <div class="form-left"> Your Purchase Power *</div>
                                <div class="form-right">
                                	<div id="chosenloancell" align="center">
                                            <img src="../images/loading-gif-animation.gif" width="45" />
                                        </div>
                                     </div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left"> Your Down Payment?</div>
                                <div class="form-right">
<input name="DownPayment" id="DownPayment" value="400" style="width:115px" onchange="IncomeChanged(this.form)" />                                
                                </div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left">Your Rent Or Mortage<b></b></div>
                                <div class="form-right"><input name="RentOrMortgage" id="RentOrMortgage" style="width:115px;" onchange="IncomeChanged(this.form)" value="600" /></div>
                                <div class="form-error"></div>
                            </div>


                            <div class="row">
                                <div class="form-left">Credit Card Payments *</div>
                                <div class="form-right"><input name="CreditCardPayments" id="CreditCardPayments" onchange="IncomeChanged(this.form)" style="width:115px;" /></div>
                                <div class="form-error"></div>
                            </div>



                            <div class="row">
                                <div class="form-left">Deductions Or Garnishments</div>
                                <div class="form-right"><input name="GarnishDeductions" id="GarnishDeductions" onchange="IncomeChanged(this.form)" style="width:115px;" /></div>
                                <div class="form-error"></div>
                            </div>

                            <div class="row">
                                <div class="form-left">Current Loan Payments</div>
                                <div class="form-right"><input name="Deductions" id="Deductions" onchange="IncomeChanged(this.form)" style="width:115px;" /></div>
                                <div class="form-error"></div>
                            </div>
                            
                            <div class="row">
                                <div class="form-left"><span>Currently Have A Car Loan?</span></div>
                                <div class="form-right">
                                
                                <p>
                                  <label>
                                    <input type="radio" name="currentCarLoan" value="Y" id="currentCarLoan_0" onClick="popOutTradeOffer('affilatelink','','adj~','homepage','prequalifier-dont_know_score');" />
                                    Yes</label>
                                  <label>
                                    <input type="radio" name="currentCarLoan" value="N" id="currentCarLoan_1" />
                                    No</label>
                                  <br />
                                </p>

                                
                                
                                </div>
                                <div class="form-error"></div>
                            </div>
                              
                              
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                          </table>

                            
                            
<div class="clear"></div>
                      </div>
