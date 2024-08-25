<?php

require_once("db.php");

require_once("Mail.php");


print_r($_POST);





if(isset($_POST['dcompany_name'], $_POST['dfirst_name'], $_POST['dlast_name'], $_POST['demail'], $_POST['dphoneno'], $_POST['dzip_code'], $_POST['dinventory_size'])){
	
	
$dcompany_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dcompany_name']));
$dfirst_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dfirst_name']));
$dlast_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlast_name']));
$demail = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['demail']));
$dphoneno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dphoneno']));
$dzip_code = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dzip_code']));
$dinventory_size = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dinventory_size']));	
	




			 ini_set ("SMTP", "mail.idscrm.com");
			 
			 
			 //$from = "IDSCRM Team <info@idscrm.com>";
			 $from = $demail;

/*
			if(isset($dudes_email_internal)){
			$additionalbccs = ' '.$dudes_email_internal;
			}else{
			$additionalbccs="";
			}

*/
			 //$to = "Email Recipient <webgoonie@gmail.com>";
			 $To = $senthtml_prospect_email_to;
			 
			 $Replyto = 'support@idscrm.com';

			 // Grouped Together For Receipient BCC Headers
			 // BCC:
			 //$bcc = "idscrm.com@gmail.com".$additionalbccs;
			 $bcc = "idscrm.com@gmail.com";
			 
			 $recipients = $To.",".$bcc;
			
			 //$subject = "You Have A $500 Discount Received";
			 //$subject = "Thank you for contacting Central Auto Sales";
			 $subject = "Dealer Sign UP"; //$senthtml_prospect_email_subject_post;



	$body_html = "
		<ul>
			<li>$dcompany_name</li>
			<li>$dfirst_name</li>
			<li>$dlast_name</li>
			<li>$demail</li>
			<li>$dphoneno</li>
			<li>$dzip_code</li>
			<li>$dinventory_size</li>
		</ul>	
	";




	$host = "mail.idscrm.com";
	$username = "idsrobot@idscrm.com";
	$password = "idscrmsystem99!";
 
	$headers = array ('From' => $from,
	'To' => $To,
//	'Reply-To' => $Replyto,
	'Subject' => $subject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

	$smtp = Mail::factory('smtp',
	   array ('host' => $host,
		 'auth' => true,
		 'username' => $username,
		 'password' => $password));
 
	$mail = $smtp->send($recipients, $headers, $body_html);


	
	
	$insert_newdealer_sql = "
	INSERT INTO `idsids_tracking_idsvehicles`.`dealer_prospects` SET
		`company` = '$dcompany_name',
		`company_legalname` = '$dcompany_name',
		`contact` = '$dfirst_name $dlast_name',
		`email` = '$demail',
		`phone` = '$dphoneno',
		`finance` = '$dinventory_size'
	";
	
  $run_insert_newdealer_sql = mysqli_query($idsconnection_mysqli, $insert_newdealer_sql, $tracking);
  

}


?>