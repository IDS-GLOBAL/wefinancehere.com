              <div id="vehicles_towerbar" class="col-sm-12 col-md-3">




					<div class="panel panel-secondary" style="display:none;">
						<div class="panel-heading">
							<h3 class="panel-title">Budget Box</h3>
						</div>
						<div class="panel-body">



                        
        <ul class="list-unstyled pull-left">
            <li>
                <i class="fa fa-fw fa-money"></i>
                 <span class="text-muted"><strong>Downpayment:</strong> $<?php echo number_format( $row_find_existingsession_approval['wfhuser_approval_dwpymt'], 2); ?></span>
            </li>
            <li>
                <i class="fa fa-fw fa-money"></i>
                 <span class="text-muted"><strong>Payment:</strong> $<?php  echo number_format($row_find_existingsession_approval['wfhuser_approval_mxpymt'], 2); //echo formatMoney(); ?></span>
            </li>
            <li>
                <i class="fa fa-fw fa-money"></i>
                 <span class="text-muted"><strong>Rate:</strong> <?php echo $row_find_existingsession_approval['wfhuser_approval_apr']; ?> %</span>
            </li>
            <li>
                <i class="fa fa-fw fa-money"></i>
                 <span class="text-muted"><strong>Months:</strong> <?php echo (12 * $row_find_existingsession_approval['wfhuser_approval_monthterm']) . ' months'; ?></span>
            </li>
            <li>
                <i class="fa fa-fw fa-money"></i>
                 <span class="text-muted"><strong>Current Car Loan:</strong> <?php echo $row_find_existingsession_approval['wfhuser_approval_openloan']; ?></span>
            </li>
            <li>
                <i class="fa fa-fw fa-money"></i>
                 <span class="text-muted"><strong>Max Retail:</strong> $<?php echo number_format( $row_find_existingsession_approval['wfhuser_approval_bigSellingPrice'], 2); ?></span>
            </li>
            <li style="display:none;">
                <i class="fa fa-fw fa-money"></i>
                 <span class="text-muted">Before Fee: $<?php echo number_format( $row_find_existingsession_approval['wfhuser_approval_bigPrincipal'], 2); ?></span>
            </li>
            <li>
                <i class="fa fa-fw fa-money"></i>
                 <span class="text-muted"><strong>Monthly Income:</strong> $<?php echo number_format( $row_find_existingsession_approval['wfhuser_approval_month_income'], 2); ?></span>
            </li>
            <li>
                <i class="fa fa-fw fa-money"></i>
                 <span class="text-muted"><strong>State:</strong> <?php echo $row_find_existingsession_approval['wfhuser_approval_state']; ?> Up to: $<?php echo number_format($row_find_existingsession_approval['wfhuser_approval_totalpayments'], 2); ?></span>
            </li>
		</ul>
                        
                        
                        
                        
<script type="text/javascript">

	$('button#show_budget_only').on('click', function(){

						$('div#gather_budget').toggle();

							$('div#register_myapproval_box').show();
							$('button#shop_only').show();

						
						var approval_email = $('input#approval_email').val();



						if (validateEmail(approval_email)) {
							console.log(approval_email + " is valid :)");
								
						  } else {
							console.log(approval_email + " is not valid :(");
/*							$('div#gather_budget').hide();
							$('div#register_myapproval_box').show();
							$('button#shop_only').show();
							alert('Sorry Please Enter An Valid Email');
*/							return false;
						  }


						
						
						
			
			

	
	});

var ajax_new_wfhuser_approval_id = '<?php echo $wfhuser_approval_id; ?>';
$('input#wfhuser_approval_id').val(ajax_new_wfhuser_approval_id);
</script>



<div class="row" align="center">                        
         <button id="show_budget_only" type="button" class="btn btn-primary">Reset Budget</button>
</div>





						</div>
					</div><!-- /.panel -->






					<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Dealer Types</h3>
						</div>
						<div class="panel-body">
                        
                        
                        <div id="dealer_type_box">
                        
                        <ul class="list-unstyled">

  <?php
$dealer_type_counter=0;
do { 

$dealer_type_counter = $dealer_type_counter++;
?>
<li>  <label>
<input name="<?php echo $row_dealer_types['dtype_label']; ?>" type="checkbox" id="dealer_bsntypes_<?php echo $dealer_type_counter; ?>" value="<?php echo $row_dealer_types['dtype_label']; ?>" checked="checked" />
  "<?php echo $row_dealer_types['dtype_label']; //Franchise ?> (<?php echo  $row_dealer_types['dealer_type_count']; ?>)"</label> </li>
  
  
  
  <?php } while ($row_dealer_types = mysqli_fetch_array($dealer_types)); ?>

                        </ul>
                        
                        
                        </div>




                        
						</div>
					</div><!-- /Dealer Types -->
              
              
              
              
                                        
					<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Sub Markets</h3>
						</div>
						<div class="panel-body">

<ul class="list-unstyled">
<?php 
  $dealer_mrkt_counter=0;
do { 
$dealer_mrkt_counter++;

?>
  <li><label>
<input name="<?php echo $row_distinct_vehsubmkts['market_sub_name']; ?>" type="checkbox" id="dealer_submarket_<?php echo $dealer_mrkt_counter; ?>" value="<?php echo $row_distinct_vehsubmkts['market_sub_name']; ?>" checked="checked" />
  "<?php echo $row_distinct_vehsubmkts['market_sub_name']; ?> (<?php echo  '1'; //$row_dealer_types['dealer_type_count']; ?>)"</label></li>
<?php } while ($row_distinct_vehsubmkts = mysqli_fetch_array($distinct_vehsubmkts)); ?>
</ul>

						</div>
					</div><!-- /.Sub Markets -->
                    



					<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Makes</h3>
						</div>
						<div class="panel-body">

<ul class="list-unstyled">
<?php 
  $dealer_make_counter=0;
do { 
$dealer_make_counter++;

?>
  <li><label>
<input name="<?php echo $row_dstinct_vmakes['vmake']; ?>" type="checkbox" id="dealer_vmake_<?php echo $dealer_make_counter; ?>" value="<?php echo $row_dstinct_vmakes['vmake']; ?>" checked="checked" />
  "<?php echo $row_dstinct_vmakes['vmake']; ?> (<?php echo $row_dstinct_vmakes['total_records']; ?>)"</label></li>
<?php } while ($row_dstinct_vmakes = mysqli_fetch_array($dstinct_vmakes)); ?>
</ul>

						</div>
					</div><!-- /.Sub Markets -->




					<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Models</h3>
						</div>
						<div class="panel-body">

						<ul class="list-unstyled">

  <?php 
  $dealer_model_counter=0; 
  do { 

	$dealer_model_counter++;
	?>
<li>  <label>
<input name="<?php echo $row_dstinct_vmodels['vmodel']; ?>" type="checkbox" id="dealer_vmodels_<?php echo $dealer_model_counter; ?>" value="<?php echo $row_dstinct_vmodels['vmodel']; ?>" checked="checked" />
  "<?php echo $row_dstinct_vmodels['vmodel']; ?> (<?php echo $row_dstinct_vmodels['total_records']; ?>)"</label> </li>


<?php } while ($row_dstinct_vmodels = mysqli_fetch_array($dstinct_vmodels)); ?>
</ul>

						</div>
					</div><!-- /.Sub Models -->

              
              

                                        
					<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Body Styles</h3>
						</div>
						<div class="panel-body">

						<ul class="list-unstyled">

  <?php 
  $dealer_body_counter=0; 
  do { 

	$dealer_body_counter++;
	?>
<li>  <label>
<input name="<?php echo $row_dstinct_bstyles['vbody']; ?>" type="checkbox" id="dealer_bstyles_<?php echo $dealer_body_counter; ?>" value="<?php echo $row_dstinct_bstyles['vbody']; ?>" checked="checked" />
  "<?php echo $row_dstinct_bstyles['vbody']; ?> (<?php echo $row_dstinct_bstyles['total_records']; ?>)"</label> </li>
  
  
  
<?php } while ($row_dstinct_bstyles = mysqli_fetch_array($dstinct_bstyles)); ?>

                        </ul>
                        

  <p></p>
                        
                        
						</div>
					</div><!-- /.Body Styles -->



                    
					<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Colors</h3>
						</div>
						<div class="panel-body">



						<ul class="list-unstyled">

  <?php $dealer_color_counter=0; do { 

	$vecolor_txt = $row_dstinct_vcolors['vecolor_txt'];
	
	if(!$vecolor_txt){ $vecolor_txt = 'Unlisted'; }
	
	$dealer_color_counter++;
	?>
<li>  <label>
<input name="<?php echo $row_dstinct_vcolors['vecolor_txt']; ?>" type="checkbox" id="dealer_vecolors_<?php echo $dealer_color_counter; ?>" value="<?php echo !$vecolor_txt; ?>" checked="checked" />
"<?php echo $vecolor_txt; ?> (<?php echo $row_dstinct_vcolors['total_records']; ?>)"</label> </li>
  
  
  
<?php } while ($row_dstinct_vcolors = mysqli_fetch_array($dstinct_vcolors)); ?>

                        </ul>




						</div>
					</div><!-- /Colors -->
                    
                    
              
                	<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Not Ready Today</h3>
						</div>
						<div class="panel-body">
                        <div class="row">
                        	<div class="col-sm-12">
								<h4>It's Okay Tell Us When?</h4>
	                        </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12">

									<label for="deal_dayswhen">When Will You Be Ready:</label>
									<select id="deal_dayswhen" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="This Is When You Want To Be Driving">
                                            <option value="2">Now/Today</option>
                                            <option value="48">Tomorrow</option>
                                            <option value="72">3 Days</option>
                                            <option value="96">4 Days</option>
                                            <option value="120">5 Days</option>
                                            <option value="144">6 Days</option>
                                            <option value="168">7 Days</option>
                                            <option value="192">8 Days</option>
                                            <option value="216">9 Days</option>
                                            <option value="240">10 Days</option>
                                            <option value="264">11 Days</option>
                                            <option value="288">12 Days</option>
                                            <option value="312">13 Days</option>
                                            <option value="336">14 Days</option>
                                            <option value="360">15 Days</option>
                                            <option value="384">16 Days</option>
                                            <option value="408">17 Days</option>
                                            <option value="432">18 Days</option>
                                            <option value="456">19 Days</option>
                                            <option value="480">20 Days</option>
                                            <option value="504">21 Days</option>
                                            <option value="528">22 Days</option>
                                            <option value="552">23 Days</option>
                                            <option value="576">24 Days</option>
                                            <option value="600">25 Days</option>
                                            <option value="624">26 Days</option>
                                            <option value="648">27 Days</option>
                                            <option value="672">28 Days</option>
                                            <option value="696">29 Days</option>
                                            <option value="720">30 Days</option>
										</optgroup>
									</select>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12">
                                <label>Save:</label>
                                <button type="button" class="btn btn-block">Save My Time Frame</button>
                                </div>
                            </div>



                                
						</div>
					</div><!-- /.panel -->
				
                
                	<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">What Kind Vehicle You Own</h3>
						</div>
						<div class="panel-body">

                        <div class="row">
                        	<div class="col-sm-12">
                            <label for="current_ownyear">Year?</label>
                            <select name="current_ownyear" id="current_ownyear" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
                                <optgroup label="Year of your current vehicle?">
      <option value="">Select Year</option>
      <?php
do {  
?>
      <option value="<?php echo $row_autoYears['year']?>"><?php echo $row_autoYears['year']?></option>
      <?php
} while ($row_autoYears = mysqli_fetch_array($autoYears));
  $rows = mysqli_num_rows($autoYears);
  if($rows > 0) {
      mysqli_data_seek($autoYears, 0);
	  $row_autoYears = mysqli_fetch_array($autoYears);
  }
?>
                                </optgroup>
                            </select>
                        	</div>
                        </div>





                        <div class="row">
                        	<div class="col-sm-12">

									<label for="current_ownmake">Make:</label>
									<select name='current_ownmake' id="current_ownmake" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										
          <option value="">Select One</option>
          <?php do {  ?>
          <option value="<?php echo $row_carMakes['car_make']?>"><?php echo $row_carMakes['car_make']?></option>
          <?php
			} while ($row_carMakes = mysqli_fetch_array($carMakes));
			  $rows = mysqli_num_rows($carMakes);
			  if($rows > 0) {
				  mysqli_data_seek($carMakes, 0);
				  $row_carMakes = mysqli_fetch_array($carMakes);
			  }
			?>
        </select>
										</optgroup>
									</select>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12">
                                <label for="current_ownmodel">Model:</label>
                                <select id="current_ownmodel" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary" disabled>
        <option value="">Models Appear...</option>
          </select>
                                </div>
                            </div>



                                
						</div>
					</div><!-- /.panel -->
				
                
                	<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Not Sure Of How You Make?</h3>
						</div>
						<div class="panel-body">
							<button id="check_my_budget" class="btn btn-primary btn-block" type="button">Check My Budget</button>
						</div>
					</div><!-- /.panel -->
				
<?php if($totalRows_dealer_names != 0){ ?>                
                	<div class="panel panel-secondary">
						<div class="panel-heading">
							<h3 class="panel-title">Sponsored Dealers</h3>
						</div>
						<div class="panel-body">
							<ul class="tags">
<?php do{ ?>
								<li><a href="dstore.php?token=<?php echo $row_dealer_names['token']; ?>" target="_blank"><?php echo $row_dealer_names['company']; ?></a></li>
                                
<?php } while ($row_dealer_names = mysqli_fetch_array($dealer_names)); ?>

							</ul>
						</div>
					</div><!-- /.panel -->
<?php } ?>
				
                
				
                
                	<div class="widget">
						<h3 class="h5">Advertisement</h3>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- vehicles right tower -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-4997617966323914"
     data-ad-slot="1190927522"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

					</div><!-- /.widget -->
				
                
                </div>
