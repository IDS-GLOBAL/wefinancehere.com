<?php


$strtotime = strtotime('today');

			// Set STMP Mail Server
			ini_set ("SMTP", "mail.wefinancehere.com");


echo '<br />'."===============Inviting User============================".'<br />';



			 
			// From:
			$syspublic_public_from = "WeFinanceHere Request! <request@wefinancehere.com>";
			 
			// TO:

			//$syspublic_SendToEmail = "webgoonie@gmail.com";
			$syspublic_SendToEmail = $approval_email_raw;

			// BCC:
			$syspublic_bcc = "wefinancehere.com@gmail.com";
			//$syspublic_bcc = "idscrm.com@gmail.com".$accounts_payable_email;


			// Grouped Together For Receipient Headers
			$syspublic_To = $syspublic_SendToEmail;
			$syspublic_recipients = $approval_email_raw.",".$syspublic_bcc;
			
			// Subject
			$syspublic_subject = "WefinanceHere Request Verification Approval...";
			
			// Custom Static Variables Based On Conditions
			$syspublic_thisemail_comments = "Please verify your email address...";

// HTML Body: (Start With All Content To The Far Right Leave No White Space To Left And Right of Each Line)
$syspublic_emailbody = "
<div>
<p><img src='https://wefinancehere.com/img/wfh_logo.png' /></p>
<p><h1>$approval_fname $approval_lname,<h2></p>
<h2><b>YOUR ALMOST THERE!</b></h2>
<p><b>Please verify your email address by clicking on the link below..</b></p>
<hr />
<div id='main_verify_body'>
<br />
<p>Your Link To Verify Your Email Adress:  <a href='https://wefinancehere.com/verify_emfunds.php?securitytoken=$approval_token&ses=$cookie&res' traget='_blank' title='Approve Your Funds!'>https://wefinancehere.com/verify_emfunds.php?securitytoken</a></p>
<hr />
<p></p>
<p><b>If you have any questions please don't hesitate to email us.</b></p>
</div>
<hr />
<br />
<b>Email Support:</b> <i>support@wefinancehere.com</i><br /></p>
<p>Website: <a href='https://www.wefinancehere.com' target='_blank'>www.wefinancehere.com</a></p>
</div>
";

//echo '<br />'."===========================================".'<br />';


	$syspublic_systemhost = "mail.wefinancehere.com";
	$syspublic_username = "request@wefinancehere.com";
	$syspublic_password = "wfhidscrmsystem99!";
 
	$syspublic_headers = array ('From' => $syspublic_public_from,
	'To' => $approval_email_raw,
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
	//$mail = $smtp_do->send($sysrecipients, $sysheaders, $syspublic_emailbody);

echo '<br />'."===============Invited User The End============================".'<br />';
	
?>