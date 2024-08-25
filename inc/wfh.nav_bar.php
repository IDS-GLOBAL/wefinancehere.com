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
							<li><a href="vehicles.php">Search Results</a></li>
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
        <input type="hidden" id="pubservtoken" value="<?php echo $tkey; ?>" />
	</nav>