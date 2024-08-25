		<!-- Your logo goes here -->
		<div class="logo-brand header sidebar rows">
			<div class="logo">
				<h1><a href="#fakelink"><img src="assets/img/logo.png" alt="Logo"> WeFinanceHere.com</a></h1>
			</div>
		</div><!-- End div .header .sidebar .rows -->
	
		<!-- BEGIN SIDEBAR -->
		<div class="left side-menu">
			
			
            <div class="body rows scroll-y">
				
				<!-- Scrolling sidebar -->
                <div class="sidebar-inner slimscroller">
				
					<!-- User Session -->
					<div class="media">
						<a class="pull-left" href="#fakelink">

<?php if($wfhuser_fbpicture){ ?>
<img src="<?php echo $wfhuser_fbpicture; ?>" class="media-object img-circle" alt="User avatar" title="No Facebook Connect">
<?php }else{ ?>
<img src="assets/img/avatar/avatar-profile.png" class="media-object img-circle" alt="User avatar" title="facebook picture">
<?php } ?>

						</a>
						<div class="media-body">
							Welcome back,
							<h4 class="media-heading"><strong><?php echo $wfhuser_approval_fullname_txt; ?></strong></h4>
							<a href="interview.php">Edit</a>
							<a class="md-trigger" data-modal="logout-modal-alt">Logout</a>
                            <!-- or logout-modal -->
						</div><!-- End div .media-body -->
					</div><!-- End div .media -->
					
					
					
				
					<!-- Sidebar menu -->				
					<div id="sidebar-menu">
						<ul>
							<li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
                            
							<li><a href="application.php"><i class="fa fa-leaf"></i> Applications <span class="label label-danger new-circle">Incomplete</span></a></li>

							<li><a href="application.php"><i class="fa fa-leaf"></i> Appointments <span class="label label-warning new-circle">Pending</span></a></li>
                            
							<li><a href="approval.php"><i class="fa fa-leaf"></i> Approval <span class="label label-danger new-circle">My Approval</span></a></li>


							<li><a href="approval.php"><i class="fa fa-leaf"></i> Credit Insight </a></li>


							<li><a href="#watchlist"><i class="fa fa-leaf"></i> Watch List <span class="label label-danger new-circle">Empty</span></a></li>

							<li><a href="wishlist.php"><i class="fa fa-leaf"></i> Wish List <span class="label label-danger new-circle">Empty</span></a></li>

							<li><a href="refinance.php"><i class="fa fa-leaf"></i> Refinance Options <span class="label label-success new-circle">Open</span></a></li>


							<li><a href="#watchlist"><i class="fa fa-leaf"></i> Make A Payment <span class="label label-success new-circle">Open</span></a></li>
                            
							<li><a href="#watchlist"><i class="fa fa-leaf"></i> Trade My Car <span class="label label-success new-circle">Open</span></a></li>

							<li><a href="#watchlist"><i class="fa fa-leaf"></i> FAQ <span class="label label-success new-circle">Open</span></a></li>

							<li><a href="https://wefinancehere.com/vehicles.php"><i class="fa fa-leaf"></i> Car Shop</a></li>





						</ul>
						<div class="clear"></div>
					</div><!-- End div #sidebar-menu -->
				</div><!-- End div .sidebar-inner .slimscroller -->
            </div><!-- End div .body .rows .scroll-y -->
			
			<!-- Sidebar footer -->
            <div class="footer rows animated fadeInUpBig">
				<div class="progress progress-xs progress-striped active">
				  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
					<span class="progress-precentage">80&#37;</span>
				  </div><!-- End div .pogress-bar -->
				  <a data-toggle="tooltip" title="See task progress" class="btn btn-default md-trigger" data-modal="task-progress"><i class="fa fa-inbox"></i></a>
				</div><!-- End div .progress .progress-xs -->
            </div><!-- End div .footer .rows -->
        </div>
		<!-- END SIDEBAR -->
