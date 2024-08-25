<?php
// res=$strtotime
$strtotime = '';
$today_start = strtotime('today');
$today_end = strtotime('tomorrow');
$today_yesterday = strtotime('yesterday');


$nowtime = date('Y-m-d H:i:s');
$yesterday = date('Y-m-d H:i:s', strtotime("$nowtime-1 days"));
$onehour = date('Y-m-d H:i:s', strtotime("$nowtime+1 hour"));
$twohours = date('Y-m-d H:i:s', strtotime("$nowtime-2 hours"));



if(isset($_GET['res'])){

	$strtotime = $_GET['res'];

	}else{

	$strtotime = $today_start;

}



if(isset($_GET['securitytoken'], $_GET['ses'])){

require_once("Mail.php");

require_once("db.php");
	
$colname_verify_userapproval_email = "-1";
if (isset($_GET['securitytoken'])) {
  $colname_verify_userapproval_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['securitytoken']));
}
mysqli_select_db($idsconnection_mysqli, $database_wfh_connection);
$query_verify_userapproval_email =  "SELECT * FROM `wfhuser_approvals` WHERE `wfhuser_approval_token` = '$colname_verify_userapproval_email'";
$verify_userapproval_email = mysqli_query($idsconnection_mysqli, $query_verify_userapproval_email);
$row_verify_userapproval_email = mysqli_fetch_assoc($verify_userapproval_email);
$totalRows_verify_userapproval_email = mysqli_num_rows($verify_userapproval_email);

$wfhuser_approval_id = $row_verify_userapproval_email['wfhuser_approval_id'];	

$wfhuser_approval_email = $row_verify_userapproval_email['wfhuser_approval_email'];


if($totalRows_verify_userapproval_email == 1){
	
	$verify_email_funds_sql = "
UPDATE `idsids_wefinancehere`.`wfhuser_approvals` SET
`wfhuser_approval_email_verified` = '1'
WHERE
`wfhuser_approval_id` = '$wfhuser_approval_id'
	";
	$run_verify_email_funds_query = mysqli_query($idsconnection_mysqli, $verify_email_funds_sql);



mysqli_select_db($idsconnection_mysqli, $database_wfh_connection);
$query_wfhuserprofile = "SELECT * FROM `wfhuserprofile` WHERE `wfhuser_email_address` = '$wfhuser_approval_email' AND `wfhuser_tokenid` = '$colname_verify_userapproval_email'";
$wfhuserprofile = mysqli_query($idsconnection_mysqli, $query_wfhuserprofile);
$row_wfhuserprofile = mysqli_fetch_assoc($wfhuserprofile);
$totalRows_wfhuserprofile = mysqli_num_rows($wfhuserprofile);

$wfhuser_id = $row_wfhuserprofile['wfhuser_id'];

$wfhuser_tokenid = $row_wfhuserprofile['wfhuser_tokenid'];

$wfhuser_verified= $row_wfhuserprofile['wfhuser_verified'];

$wfhuser_status = $row_wfhuserprofile['wfhuser_status'];

$applicant_present_addr_state = $row_wfhuserprofile['applicant_present_addr_state'];







$wfhuser_id_sql = "
INSERT INTO `idsids_wefinancehere`.`wfhuserprofile` SET
`wfhuser_tokenid` = '$colname_verify_userapproval_email',
`wfhuser_email_address` = '$wfhuser_approval_email',
`wfhuser_username` = '$wfhuser_approval_email',
`wfhuser_verified` = '1'
WHERE
`wfhuser_id` = '$wfhuser_id'
	";
	$run_wfhuser_id_sql = mysqli_query($idsconnection_mysqli, $wfhuser_id_sql, $wfh_connection);





			// Set STMP Mail Server
			ini_set ("SMTP", "mail.wefinancehere.com");


//echo '<br />'."===========================================".'<br />';



			 
			// From:
			$syspublic_public_from = "WeFinanceHere Notification! <notification@wefinancehere.com>";
			 
			// TO:

			//$syspublic_SendToEmail = "webgoonie@gmail.com";
			$syspublic_SendToEmail = $wfhuser_approval_email;

			// BCC:
			$syspublic_bcc = "wefinancehere.com@gmail.com";
			//$syspublic_bcc = "idscrm.com@gmail.com".$accounts_payable_email;


			// Grouped Together For Receipient Headers
			$syspublic_To = $syspublic_SendToEmail;
			$syspublic_recipients = $syspublic_To.",".$syspublic_bcc;
			
			// Subject
			$syspublic_subject = "WeFinanceHere Approval Now Processing...";
			
			// Custom Static Variables Based On Conditions
			$syspublic_thisemail_comments = "Approval Now Processing...";

// HTML Body: (Start With All Content To The Far Right Leave No White Space To Left And Right of Each Line)
$syspublic_emailbody = "
<div>
<p><img src='https://wefinancehere.com/img/wfh_logo.png' /></p>
<p><h2>Hi,<h2></p>
<h1><b>CONGRATULATIONS YOUR EMAIL HAS BEEN VERIFIED!</b></h2>
<hr />
<div id='main_verify_body'>
<br />
<p>Your Link To Login :  <a href='https://wefinancehere.com/account/?securitytoken=$approval_token&ses=$cookie' traget='_blank'>https://wefinancehere.com/account/</a></p>
<p><b>Get Your Loan Paperwork And Instructions In Your Back Office.</b></p>
<hr />
<p>$syspublic_thisemail_comments</p>
</div>
<hr />
<br />
<b>Email Support:</b> <i>support@wefinancehere.com</i><br /></p>
<p>Website: <a href='https://www.wefinancehere.com' target='_blank'>WeFinanceHere.com</a></p>
</div>
";

//echo '<br />'."===========================================".'<br />';


	$syspublic_systemhost = "mail.wefinancehere.com";
	$syspublic_username = "notification@wefinancehere.com";
	$syspublic_password = "wfhidscrmsystem99!";
 
	$syspublic_headers = array ('From' => $syspublic_public_from,
	'To' => $syspublic_To,
	'Subject' => $syspublic_subject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

/* */
	$smtp = Mail::factory('smtp',
	   array ('host' => $syspublic_systemhost,
		 'auth' => true,
		 'username' => $syspublic_username,
		 'password' => $syspublic_password));
	


	// True Action That Sends Email
	//$mail = $smtp->send($syspublic_recipients, $syspublic_headers, $syspublic_emailbody);
	

	//header("Location: https://wefinancehere.com/verified.php?securitytoken=$approval_token&ses=$cookie");
	
	//  https://wefinancehere.com/account/autosignin.php?securitytoken=$approval_token&ses=$cookie

}
	
	
	

}else{

	header('Location: https://wefinancehere.com/');
	exit;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aprroval Processing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/theme.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/animate.css">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<div id="waiting_screen" class="modal" tabindex="-1" role="dialog" aria-hidden="true" align="center">
        <div class="modal-dialog">
            <div id="waiting_content" class="animated bounceInRight">
            </div>
        </div>
</div>

<body>
<?php include_once("analyticstracking.php") ?>



	<!-- Main Navbar -->
		<?php include("inc/wfh.nav_bar.blank.php"); ?>
    <!-- /.navbar -->



        
          
          
          
                                          
                                          
	<section class="wrapper-md">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">




                                                    <div id="login_box" class="row">
        												
                                                        <h2>Set Your Password</h2>
                                                        <input id="wfhuser_approval_id" type="hidden" value="<?php echo $wfhuser_approval_id; ?>">
                                                        <input id="wfhuser_id" type="hidden" value="<?php echo $wfhuser_id; ?>">

                                                        <div class="form-group has-success">
                                                            <label class="control-label">Your Email:</label>
                                                            <input id="email_login" type="email" placeholder="Enter your email" class="form-control" value="<?php echo $wfhuser_approval_email; ?>" disabled="disabled">
                                                        </div>
    
                                                        <div class="form-group">
                                                            <label>Create Your Password:</label>
                                                            <input id="pass_login" type="password" placeholder="Enter your password" class="form-control">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Confirm Your Password:</label>
                                                            <input id="confirm_pass_login" type="password" placeholder="Confirm your password" class="form-control">
                                                            <small id="confirm_pass_text"></small>
                                                        </div>



                                                        <div class="form-group">

<br />
<br />

                                                            <button id="create_pass" type="button" class="btn btn-block btn-facebook btn-lg btn-success">Submit</button>
                                                        </div>


                                                    </div>
                                                    
                                                    <div id="login_results">
                                                    
                                                    
                                                    </div>




				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>






<div class="row" style="display:none;">
    <ul>
        <li><?php echo $today_start; ?></li>
        <li><?php echo $today_end; ?></li>
        <li><?php echo $today_yesterday; ?></li>
        <li><?php echo $nowtime; ?></li>
        <li><?php echo $yesterday; ?></li>
        <li><?php echo $onehour; ?></li>
        <li><?php echo $twohours; ?></li>
        <li><?php echo $strtotime; ?></li>
    </ul>
</div>



	<?php include("_footer.php"); ?>
	<!-- last but not least the javascript -->
	<script src="js/jquery-2.1.1.js"></script>

	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
    <script src="js/custom/confirmsignin.js"></script>
	<script src="assets/js/holder.js"></script>
	<script src="js/plugin/jasny-bootstrap/js/jasny-bootstrap.js"></script>









</body>
</html>
