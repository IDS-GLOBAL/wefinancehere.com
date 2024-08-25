<?php
if (!isset($_SESSION)) {
  session_start();
}

include("../src/Facebook/autoload.php");

$fb = new Facebook\Facebook([
  'app_id' => '597949943584638',
  'app_secret' => 'bea982d39e0983cfa4799a5d0e70e8be',
  'default_graph_version' => 'v2.5'
  ]);

$helper = $fb->getCanvasHelper();



$fb_appurl = 'https://apps.facebook.com/597949943584638/';

try {
	if (isset($_SESSION['facebook_access_token'])) {
	$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();
  	//exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	//exit;
 }

if (isset($accessToken)) {

	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// validating the access token
	try {
		$request = $fb->get('/me');
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		if ($e->getCode() == 190) {
			unset($_SESSION['facebook_access_token']);
			$helper = $fb->getRedirectLoginHelper();
			$permissions = ['email']; // optionnal
			$loginUrl = $helper->getLoginUrl('https://apps.facebook.com/wefinancehere/', $permissions);
			/*echo "<script>window.top.location.href='".$loginUrl."'</script>";*/
			//exit;
		}
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		//exit;
	}

	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$profile = $profile_request->getGraphNode()->asArray();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		unset($_SESSION['facebook_access_token']);
		/*echo "<script>window.top.location.href='".$fb_appurl."'</script>";*/

		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		//exit;
	}

	// priting basic info about user on the screen
	//print_r($profile);
	// Array ( [name] => Benjamin Carter [first_name] => Benjamin [last_name] => Carter [email] => benwellrounded@gmail.com [id] => 1492521344 )
	
    //declare two session variables and assign them
    $_SESSION['MM_wfhuserUsername'] = $profile['email'];
    $_SESSION['MM_wfhuserUserGroup'] = '1';	      



  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email']; // optionnal
	$loginUrl = $helper->getLoginUrl('https://apps.facebook.com/wefinancehere/', $permissions);
	/*echo "<script>window.top.location.href='".$loginUrl."'</script>";*/
}


$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";
//print_r($_SESSION);
// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../signin.php";
if (!((isset($_SESSION['MM_wfhuserUsername'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_wfhuserUsername'], $_SESSION['MM_wfhuserUserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit();
}
?>