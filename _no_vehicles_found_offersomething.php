<script src="js/custom/_no_vehicles_found_offersomething.js"></script>


<?php if($_GET['budget_afford'] == 'N'){ ?>

<div class="row">
  <h2>Sorry! <small>Your Income doesn't support the amount of money you requested for your Instant Pre-approval today.</small></h2>
  	<p>You can try again but click the button below to try an approval again with a monthly income that will support your monthly payment.</p>
  
  	<a href="index.php" class="btn btn-primary btn-lg btn-block">Okay Let Me Try Again!</a>
</div>
<?php }else{ ?>


<div class="row">
  <h2>Congratulations! <small>How Would You Like To Use Your Pre-Approval Today</small></h2>
</div>

<section>
    <div id="deliver_checkbox" class="row">
    	<div class="container">
        <div class="row">
        
        
        	<ul class="list-unstyled">
        		<li>Save My Approval And Shop For A Car Later.</li>
                
                <li>Alert Me When Cars Come In My Area</li>
                
                <li>Have Perferred Dealers Contact Me On My Approval.</li>
        	</ul>
        
        
        </div>
		</div>
    </div>
</section>

<section>
    <div id="deliver_checkbox" class="row">
    	<div class="container">
        
    	  <div id="check_bg">
          
    	  <div class="row">
           <div class="form-group col-md-12">
           <img src="img/wfh_logo.png" width="240px"  />
           <!--h2><i>WeFinanceHere.com</i></h2 -->
           <h6><i>Atlanta, GA 30342</i></h6>
            	<span class="control-label col-sm-3 pull-right"><strong>Date: </strong><u>&nbsp;&nbsp;<?php echo  date("F"); ?> <?php echo  date("d"); ?>, <?php echo  date("Y"); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span><br />
                 <span class="col-md-3 pull-right" style="border:1px solid #000; border-radius: 2px; height:35px; font-size:24px; font-weight:bold;">
            	$<?php echo formatMoney($cust_totalpayments); ?>
            </span>
            </div>
          
            <div class="form-group col-md-12" style="">
            	<label class="control-label">Pay To The Order Of:</label><br />
                <select id="paytotheorderof_titlename" class="col-md-4 col-sm-4 pull-left" style=" width:30%; height:28px;">
                    <option value="" selected>Title Name</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss.">Miss.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Dr.">Dr.</option>
                </select>
                
                <input id="paytotheorderof_fname" class="col-md-3 col-sm-3 pull-left" type="text" placeholder="Enter First Name" value="" style=" width:30%;" />
                <input id="paytotheorderof_lastname" class="col-md-3 col-sm-3 pull-left" type="text" placeholder="Enter Last Name" value="" style=" width:30%;" />
            </div>
            
          </div>
          <div class="row"><div class="col-md-12 col-sm-12"><hr /></div></div>
    

    	  <div class="row">
          
            <div class="col-md-6">
            	<h6>AutoBank of <?php echo $_GET['state']; ?></h6>
            </div>
            <div class="col-md-6">
                <h3><small style="font-size:16px;">Signature: </small>WEFINANCEHERE.COM</h3>
                <hr />
            </div>
            
          </div>
    
    	  </div>
    
    



		</div>
    </div>
    
    
    
    
    
    
</section>




<section>
    <div class="row">

		  <div class="container">

				<div class="row">
                	<div class="col-md-7" align="center">
	                    <!-- h3>Rates as low as <?php //echo $_GET['cust_creditapr']; ?>% APR</h3 -->
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                        <label class="control-label">Enter Email Confirmation:</label>
                        	<input id="paytotheorderof_email" class="form-control" type="text" value="<?php $_GET['approval_email']; ?>" placeholder="Enter Your Email" />
                        </div>
                    </div>
                </div>
                
				<div class="row" align="center">
                   <div class="col-md-12">
                        <button id="endorse_check" type="button" class="btn btn-block btn-lg btn-warning">Endorse Check</button>
                   </div>
                   
                   <div class="col-md-12">
                   
                   <p></p>
                   
                   </div>
                   
                   
                   
				</div>

                <div class="row">
                	<div class="col-sm-12">
                    	<p>Advertised Terms And Information</p>
                        <ul id="advtrmsinfo_txt" class="list-unstyled">
    <li>The information and disclosures above relate to advertised terms made by or through WeFinanceHere.com.</li>
    <li>Interest rates and terms are from a lender or lenders with whom WeFinanceHere.com may match you and that offer the particular product. The disclosures are current as of the date indicated.</li>
    <li>WeFinanceHere.com is not a lender in any transaction and does not make loans, loan commitments or lock-rates. All credit decisions, including loan approval and the conditional rates and terms you are offered, are the responsibility of the participating lenders and will vary based upon your loan request, your particular financial situation, and criteria determined by the lenders to whom you are matched. Not all consumers will qualify for the advertised rates and terms.</li>
    <li>You may not be matched with the lender making a particular conditional loan offer, and WeFinanceHere.com does not guarantee that any lender will make you a conditional loan offer. WeFinanceHere.com arranges for multiple conditional loan offers through its network of nonaffiliated lenders. See the <a id="termsofuseLink" href="termsofuse.php">Terms of Use Agreement</a> for more details. The Terms of Use Agreement governs these advertised Terms and Information.</li>
    <li>FICO score means the FICO credit score report that a lender receives from a consumer reporting agency.</li>
  </ul>
                    </div>
                </div>



          </div>

    </div>
</section>
<?php } ?>