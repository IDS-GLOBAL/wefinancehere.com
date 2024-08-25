	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<section class="wrapper-xs bg-primary">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-10">
						<i class="fa fa-question-circle"></i> <span class="text-light">Register</span> Or Alredy Have An Account? <i class="fa fa-user"></i> <a id="loginWFHuser"><span class="text-light">Login Here</span></a> <a id="registerWFHuser"></a>
					</div><!-- /.col -->
					<div class="col-sm-12 col-md-2">
						<ul class="list-inline no-margin-bottom">
							<li><a href="#"><i class="text-light fa fa-lg fa-fw fa-twitter"></i></a></li>
							<li><a href="#"><i class="text-light fa fa-lg fa-fw fa-facebook"></i></a></li>
							<li><a href="#"><i class="text-light fa fa-lg fa-fw fa-google-plus"></i></a></li>
							<li><a href="#"><i class="text-light fa fa-lg fa-fw fa-pinterest"></i></a></li>
						</ul>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.wrapper -->
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="start.php">
					<img src="img/wfh_logo.png" alt="Website Logo" height="60px">
				</a>
			</div>
			<!-- Navbar -->
			<div class="collapse navbar-collapse navbar-main-collapse">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="start.php">Home</a>
					</li>
					<li class="dropdown">
						<a href="#link" class="dropdown-toggle" data-toggle="dropdown">Approved Dealers <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="start.php">Search Results</a></li>
							<li><a href="start2.php">Item Page</a></li>
							<li><a href="start3.php">Services</a></li>
							<li><a href="start4.php">Gallery</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#link" class="dropdown-toggle" data-toggle="dropdown">Credit Center <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="register.php">Get Approved</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#link" class="dropdown-toggle" data-toggle="dropdown">Get Notified <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Receive Finance Offers</a></li>
						</ul>
					</li>
				</ul><!-- /.navbar-nav -->
			</div><!-- /.collapse -->
		</div><!-- /.container -->

		<section class="wrapper-xs bg-highlight">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<form action="" class="form-inline">



                        	<div class="row">								
                              <div class="col-md-2">
							  <label for="dma_state">Your State:</label>
									<select id="dma_state" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
									<optgroup label="Results Based On State Availablity">
									  <?php do {  ?>
									  <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_name']?></option>
										<?php } while ($row_states = mysqli_fetch_assoc($states));
												  $rows = mysqli_num_rows($states);
												  if($rows > 0) {
													  mysqli_data_seek($states, 0);
													  $row_states = mysqli_fetch_assoc($states);
												  }
										?>
                                    </optgroup>
                                 </select>

								</div><!-- /.col -->
								
                                <div class="col-md-2">
									<label for="dma_market">Your Market:</label>
									<select id="dma_market" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary" disabled>
										<optgroup label="Results Based On Market Availablity">
											<option value="Atl">Atlanta</option>
											<option value="Mac">Macon</option>
											<option value="Miss">Mississippi</option>
										</optgroup>
									</select>

                                    
								</div><!-- /.col -->
								
                                <div class="col-md-3">
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
								</div><!-- /.col -->
								
                                <div class="col-md-3">
									<label for="open_trade">You Have A Current Car Loan?</label>
									<select id="open_trade" class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
										<optgroup label="Price:">
											<option value="YES">YES</option>
											<option value="NO">NO</option>
										</optgroup>
									</select>
								</div><!-- /.col -->
								
                                <div class="col-md-2">
									<label for="">ACTION</label>
									<button class="btn btn-primary btn-block">Lock Me In!</button>
								</div>
                                
                                
                                
							</div>




						</form>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section>

	</nav>