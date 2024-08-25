<?php

if(!$_POST) exit;


if(isset($_POST['recover_password_email'])){

require_once("db.php");


$recover_password_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['recover_password_email']));


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_passwordbyemail = "SELECT * FROM `wfhuser_approvals` WHERE `wfhuser_approval_email` = '$recover_password_email'";
$passwordbyemail = mysqli_query($idsconnection_mysqli, $query_passwordbyemail);
$row_passwordbyemail = mysqli_fetch_assoc($passwordbyemail);
$totalRows_passwordbyemail = mysqli_num_rows($passwordbyemail);

$wfhuser_approval_password = $row_passwordbyemail['wfhuser_approval_password'];

$nowtime = date('Y-m-d H:i:s');
$strtime = strtotime("$nowtime");

//require_once('Mail.php');

			// Set STMP Mail Server
			ini_set ("SMTP", "mail.idscrm.com");


//echo '<br />'."===========================================".'<br />';



			 
			// From:
			$syspublic_public_from = "WeFinanceHere.com Notification! <notification@wefinancehere.com>";
			 
			// TO:

			//$syspublic_SendToEmail = "webgoonie@gmail.com";
			$syspublic_SendToEmail = $approval_email_raw;

			// BCC:
			$syspublic_bcc = "wefinancehere.com@gmail.com";
			//$syspublic_bcc = "idscrm.com@gmail.com".$accounts_payable_email;


			// Grouped Together For Receipient Headers
			$syspublic_To = $syspublic_SendToEmail;
			$syspublic_recipients = $syspublic_To.",".$syspublic_bcc;
			
			// Subject
			$syspublic_subject = "WefinanceHere.com Password Request";
			
			// Custom Static Variables Based On Conditions
			$syspublic_thisemail_comments = "if you have nothing email address...";

// HTML Body: (Start With All Content To The Far Right Leave No White Space To Left And Right of Each Line)
$syspublic_emailbody = "
<div>
<p><img src='https://wefinancehere.com/img/wfh_logo.png' /></p>
<p><h2>Hi,<h2></p>
<h1><b>Someone Just Request Your Login Instructions For WeFinanceHere.com!</b></h2>
<p><b>Please click the link below to reset your password or just ignore this email if you haven't requested such.</b></p>
<hr />
<div id='main_verify_body'>
<p>Your Password: $wfhuser_approval_password</p>
<br />
<p>Your Link To Change Your Email Password:  <a href='https://wefinancehere.com/changepass.php?securitytoken=$approval_token&ses=$cookie&when=$strtime' traget='_blank'>https://wefinancehere.com/changepass.php?securitytoken=$approval_token</a></p>
<p><b>If you have any questions please don't hesitate to email us.</b></p>
</div>
<hr />
<br />
<b>Email Support:</b> <i>support@wefinancehere.com</i><br /></p>
<p>Website: <a href='https://www.wefinancehere.com' target='_blank'>www.wefinancehere.com</a></p>
</div>
";

//echo '<br />'."===========================================".'<br />';


	$syspublic_systemhost = "mail.idscrm.com";
	$syspublic_username = "notification@wefinancehere.com";
	$syspublic_password = "wfhidscrmsystem99!";
 
	$syspublic_headers = array ('From' => $syspublic_from,
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
	$mail = $smtp->send($syspublic_recipients, $syspublic_headers, $syspublic_emailbody);
	







};


?>
<h2>Your Password Has Been Sent!</h2>