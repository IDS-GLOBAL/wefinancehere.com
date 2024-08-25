<?php

/////////////////////  _signin_fbmysql_saveupdate.php   /////////////////////////////////////////

	// priting basic info about user on the screen
	//print_r($profile);
	// Array ( [name] => Benjamin Carter [first_name] => Benjamin [last_name] => Carter [email] => benwellrounded@gmail.com [id] => 1492521344 )

$fbprofileid = $profile['id'];
$fbprofilename = $profile['name'];
$fbprofilefirst_name = $profile['first_name'];
$fbprofilelast_name = $profile['last_name'];
$fbprofileemail = $profile['email'];

$wfhuser_picture  = "https://graph.facebook.com/$fbprofileid/picture";


        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		$tkey=mysql_real_escape_string(trim($tkey));


mysqli_select_db($wfh_connection_mysqli, $database_idsconnection);
$query_find_existingfbwfhuserprofile_email ="SELECT * FROM `idsids_wefinancehere`.`wfhuserprofile` WHERE `wfhuser_email_address` = '$fbprofileemail'";
$find_existingfbwfhuserprofile_email = mysqli_query($wfh_connection_mysqli, $query_find_existingfbwfhuserprofile_email);
$row_find_existingfbwfhuserprofile_email = mysqli_fetch_assoc($find_existingfbwfhuserprofile_email);
$totalRows_find_existingfbwfhuserprofile_email = mysqli_num_rows($find_existingfbwfhuserprofile_email);

$wfhuser_id = $row_find_existingfbwfhuserprofile_email['wfhuser_id'];
$wfhuser_tokenid = $row_find_existingfbwfhuserprofile_email['wfhuser_tokenid'];


	$query_results_saved_sql = "
	INSERT INTO `idsids_wefinancehere`.`wfhuserprofile` SET
		`wfhuser_email_address` = '$fbprofileemail',
		`wfhuser_fbemail` = '$fbprofileemail',
		`cust_lead_ip` = '$ip',
		`wfhuser_fbsessionid` = '$cookie',
		`wfhuser_picture` = '$wfhuser_picture',
		`wfhuser_tokenid` = '$tkey',
		`cust_lead_broswer` = '$browser',
		`wfhuser_fbid` = '$fbprofileid',
		`applicant_name` = '$fbprofilename',
		`applicant_fname` = '$fbprofilefirst_name',
		`applicant_lname` = '$fbprofilelast_name',
		`wfhuser_verified` = '1',
		`wfhuser_status` = '1'
	";


	if(!$wfhuser_id){

	$query_results_saved = mysqli_query($wfh_connection_mysqli, $query_results_saved_sql);
    $wfhuser_id = mysqli_insert_id($wfh_connection_mysqli);

	}else{

	if(!$wfhuser_tokenid){
		$insert_update_sql	= "`wfhuser_tokenid` = '$tkey',";
	}else{
		$insert_update_sql	= "";
	}

	$query_results_updated_sql = "
	UPDATE `idsids_wefinancehere`.`wfhuserprofile` SET
		`wfhuser_email_address` = '$fbprofileemail',
		`wfhuser_fbemail` = '$fbprofileemail',
		`cust_lead_ip` = '$ip',
		`wfhuser_fbsessionid` = '$cookie',
		$insert_update_sql
		`cust_lead_broswer` = '$browser',
		`wfhuser_fbid` = '$fbprofileid',
		`applicant_name` = '$fbprofilename',
		`applicant_fname` = '$fbprofilefirst_name',
		`applicant_lname` = '$fbprofilelast_name',
		`wfhuser_verified` = '1',
		`wfhuser_status` = '1'
	WHERE
		`wfhuser_id` = '$wfhuser_id'
	";

	$query_results_saved = mysqli_query($wfh_connection_mysqli, $query_results_updated_sql);

}




?>