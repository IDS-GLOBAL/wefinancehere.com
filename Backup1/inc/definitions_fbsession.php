<?php

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

$expression = $location;

//Rip Location City From State and comma,
$locationn = preg_split("/[\s,]+/", $expression);
$fbcityn = $locationn[0];
$fbstatename = $locationn[1];

//echo 'Hi '.$fbstatename;
//echo '<br>';
//echo 'City'.$fbcityn;





$fbemployername = $user_profile['work']['0']['employer']['name'];
$fbemployerposition = $user_profile['work']['0']['position']['name'];
$fbemployerhiredate = $user_profile['work']['0']['start_date'];

$fbtimezone = $user_profile['timezone'];
$fblocale = $user_profile['locale'];
$fbverified = $user_profile['verified'];

$fblasteupdatedtime = $user_profile['work']['0']['updated_time'];

$fbpiclink = "https://graph.facebook.com/".$fbuserid."/picture";

$fbpicture = "<img id='proimg' src='$fbpiclink'>";

?>