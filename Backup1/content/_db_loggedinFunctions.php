<?php



function restrict($fbemail){
	
include('../../Connections/idsconnection.php');

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userWfh =  "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = '$fbemail'");
$userWfh = mysqli_query($idsconnection_mysqli, $query_userWfh);
$row_userWfh = mysqli_fetch_assoc($userWfh);
$totalRows_userWfh = mysqli_num_rows($userWfh);
$wfhid = $row_userWfh['wfhuser_id']; //Hackishere

		if (!$wfhid){
			header("Location: signin.php");
		}else{
		
			 //echo 'ID: '.$wfid;
		}

mysqli_free_result($userWfh);

}





function fbprofileinfo($user_profile){
	
$email = $user_profile['email'];

$fbuserid = $user_profile['id'];
$fbemail = $user_profile['email'];
$fbfname = $user_profile['first_name'];
$fblname = $user_profile['last_name'];
$fbfullname = $user_profile['name'];
$fbusername = $user_profile['username'];
$fbdob = $user_profile['birthday'];
$fbsex = $user_profile['gender'];
$fblink = $user_profile['link'];

$location = $user_profile['location']['name'];
$fbemployername = $user_profile['work']['0']['employer']['name'];
$fbemployerposition = $user_profile['work']['0']['position']['name'];
$fbemployerhiredate = $user_profile['work']['0']['start_date'];

$fbtimezone = $user_profile['timezone'];
$fblocale = $user_profile['locale'];
$fbverified = $user_profile['verified'];



$fblasteupdatedtime = $user_profile['work']['0']['updated_time'];

	
	
	
}








?>