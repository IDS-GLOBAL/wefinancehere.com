<table id="ApprovalBox" width="100%">
                        <tr>
                            <td valign="top">
                    
                                            <div class="goOne">
                                                <div class="formheader1">
                                                    Your Credit Score?
                                                </div><!--formheader1-->
                                                <br />
                                                <br />
                                                <a class="credit1">
                                                    <div class="goodCredit">
                                                        <input class="validate[required] radio" name="Credit" type="radio" onclick="dealMatrixChanged(this.form)" value="<?php echo $vgoodcredit; ?>" width="115"  <?php if (!(strcmp($vgoodcredit,"undefined"))) {echo "checked=\"checked\"";} ?> />
                                        </div>
                                                    <div class="right">
                                                        Very Good <b>(720 - 850)</b>
                                                    </div>
                                                </a><!--credit1-->
                                                <a class="credit1">
                                                    <div class="goodCredit">
                                                        <input class="validate[required] radio" name="Credit" type="radio" onclick="dealMatrixChanged(this.form)" value="<?php echo $jgoodcredit; ?>" <?php if (!(strcmp($jgoodcredit,"undefined"))) {echo "checked=\"checked\"";} ?>    />
                                            </div>
                                                    <div class="right">
                                                        Good <b>(675 - 719)</b>
                                                    </div>
                                                </a><!--credit1-->
                                                <a class="credit1">
                                                    <div class="goodCredit">
                                                        <input class="validate[required] radio" <?php if (!(strcmp($faircredit,""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $faircredit; ?>"  onclick="dealMatrixChanged(this.form)"/>
                                            </div>
                                                    <div class="right">
                                                        Fair <b>(621 - 674)</b>
                                                    </div>
                                                </a><!--credit1-->
                                                <a class="credit1">
                                                    <div class="goodCredit">
                                                        <input class="validate[required] radio" name="Credit" type="radio"  onclick="dealMatrixChanged(this.form)" value="<?php echo $poorcredit; ?>" <?php if (!(strcmp($poorcredit,""))) {echo "checked=\"checked\"";} ?>/>
                                        </div>
                                                    <div class="right">
                                                        Poor <b>(575 - 620)</b>
                                                    </div>
                                                </a>
                                                <a class="credit1">
                                                    <div class="goodCredit">
                                                        <input class="validate[required] radio" <?php if (!(strcmp($subprime,""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $subprime; ?>"  onclick="dealMatrixChanged(this.form)"/>
                                            </div>
                                                    <div class="right">
                                                        Really Bad <b>(Below - 575)</b>
                                                    </div>
                                                </a>
                                                <a class="credit1">
                                                    <div class="goodCredit">
                                                        <input class="validate[required] radio" name="Credit" type="radio"  onclick="popOutThisOffer('af1401','','adj~','homepage','prequalifier-dont_know_score');" value="<?php echo $unknown; ?>" <?php if (!(strcmp($unknown,""))) {echo "checked=\"checked\"";} ?>/>
                                        </div>
                                                    <div class="right">
                                                        <span>Not Sure or None (0 - ?)</span>
                                                    </div>
                                                </a>
                                                <div class="hot10">&nbsp;</div>
                                                <i>
                                                    <center>
                                                        <a class="onClick" onClick="popOutCreditOffer('affilatelink','','adj~','homepage','prequalifier-dont_know_score');">Log In:</a>
                                                    </center>
                                                </i>
                                                
                                                
                                                
                                                <p>
                                                  <br />
                                                </p>
                                            </div><!--goOne-->
                    
                    
                            </td>
                            <td valign="top">
                    
                                            
                                            <div class="goTwo">
                                            
                    
                                                <div class="formheader1">
                                                    Your Monthly Income?
                                                </div><!--formheader1-->
                                                <div class="goPad" align="center">
                                                    <span class="dollarSign">$</span>&nbsp;
                                       <input class="validate[required,custom[integer]] text-input" id="income" name="income" onchange="IncomeChanged(this.form)"  style="width:125px;" /><br />
                                       <!--  oninput="IncomeChanged(this.form)" -->
                                                    <div class="goDesc">
                                                        Enter your gross income amount. Gross is before taxes are deducted.
                                                    </div><!--goDesc-->
                                                </div>
                                        
                                      <div class="proFileCalcAmount" align="center">
                                       <h2>Purchase Power </h2>
                                       <div id="chosenloancell" align="center">
                                            <img src="images/loading-gif-animation.gif" width="45" />
                                        </div>
                                   
                                             
                                            <br />
                                        
                                        
                                      <div id="YourDownPayment">

                                                <div class="formheader1">
                                                    Your Down Payment?
                                                </div>
                                                <!--formheader1-->

                                       <label class="goPad">
                                       <span class="dollarSign">$</span>
                                       <input name="DownPayment" id="DownPayment" value="" style="width:115px" />
                                       </label>
                                       
                                       </div>


                                    <div class="goDesc2">
                                        <p>A Downpayment Is Your Cash Investment Or Your Value Of The Vehicle Your Trading. </p>
                                    </div><!--goDesc-->
                                             
                                    </div>             
                                            </div><!--goTwo-->
                    
                    
                            </td>
                            <td valign="top">
                    
                                            
                                            <div class="goThree">
                                                <div class="formheader1">
                                                    Enter Monthly<br />
                                                    Recurring Debts?
                                                </div><!--formheader2-->
                                                <div class="debt1">
                                                    <label class="desc">Your Rent or Mortgage</label><br />
                                                    <span class="dollarSign">$</span>&nbsp;<input name="RentOrMortgage" id="RentOrMortgage" onchange="IncomeChanged(this.form)" style="width:115px;" />
                                                </div>
                                                <div class="debt2">
                                                    <label class="desc">Minimum Card Payments</label><br />
                                                    <span class="dollarSign">$</span>&nbsp;<input name="CreditCardPayments" id="CreditCardPayments" onchange="IncomeChanged(this.form)" style="width:115px;" />
                                                </div>
                                                <div class="debt3">
                                                    <label class="desc">Deductions or Garnishments</label><br />
                                                    <span class="dollarSign">$</span>&nbsp;<input name="GarnishDeductions" id="GarnishDeductions" onchange="IncomeChanged(this.form)" style="width:115px;" />
                                                </div>
                                                <div class="debt4">
                                                    <label class="desc">All Loan Payments</label><br />
                                                    <span class="dollarSign">$</span>&nbsp;<input name="Deductions" id="Deductions" onchange="IncomeChanged(this.form)" style="width:115px;" />
                                                </div>
                                                <div class="goDesc2">
                                               
                                                    Don't include utility bills, or current vehicle payment if trading.
                                                </div><!--goDesc-->
                                        <div>
                                        <input id="PreApproveMeButton" type='button' onClick='DownPaymentChngd()'  value='Pre-Approve ME!' />
                                        </div>
                                          </div><!--goThree-->
                           </td>
                            <td valign="top">
                            <!--div class="loanqualifyME">
                                      <a href="javascript:hideshow(document.getElementById('bxfCalc'))">Click Here!</a>
                                    </div -->
                                    
                                    
                            
                            </td>
                        </tr>
                    </table>