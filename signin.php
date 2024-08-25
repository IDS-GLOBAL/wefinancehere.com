<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection = mysql_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 

$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection = mysql_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 




if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		$tkey = mysql_real_escape_string(trim($tkey));

@$rsession = session_id();

if(empty($rsession)) session_start();

@$sessioncookie = "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];


@$PHPSESSID = session_id();


@$cookie = $_COOKIE["PHPSESSID"];

//Visitor Credentials Save With Visitor Information

@$ip = $_SERVER['REMOTE_ADDR'];

@$query_string = $_SERVER['QUERY_STRING'];

@$http_referer = $_SERVER['HTTP_REFERER'];

@$http_user_agent = $_SERVER['HTTP_USER_AGENT'];

$mobileuserjs = "var ismobile=navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i)";

$mobiledevice = "None";
$browser = 'Unknown';

//http://www.htmlgoodies.com/beyond/webmaster/toolbox/article.php/3888106/How-Can-I-Detect-the-iPhone--iPads-User-Agent.htm
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
 {
  //header('Location: http://yoursite.com/iphone');
  //exit();
  $mobiledevice = "iPhone/Ipod";
}

if(strstr($_SERVER['HTTP_USER_AGENT'],'Android') || strstr($_SERVER['HTTP_USER_AGENT'],'android'))
 {
  //header('Location: http://yoursite.com/iphone');
  //exit();
  $mobiledevice = "Android";
}

//http://echopx.com/notes/browser-detection-ie-firefox-safari-chrome
if(strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$browser = "Internet Explorer";
 }

if(strstr($_SERVER["HTTP_USER_AGENT"], 'Firefox'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$browser = "Firefox";
 }


if(strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') || strstr($_SERVER['HTTP_USER_AGENT'],'Safari'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$browser = "Safari/Chrome";
 }




$currentPage = $_SERVER["PHP_SELF"];
//// End My Custom Set up











?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!--Start Meta Tags -->
    <meta name="keywords" content="wefinancehere,wefinance,auto,dealer,dealers,dealership,buy here pay here,buy here,bhph,live,livechat,live chat,cars,trucks,suvs,hybrids,franchise,website development,custom website,hosting,dealer email,leads,business,dealer licenses,frazer">
	<meta name="author" content="WebGoonie">
    <!--End Meta Tags -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="https://wefinancehere.com/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://wefinancehere.com/assets/css/theme.css">
   	<link rel="stylesheet" href="https://wefinancehere.com/css/animate.css">
	<link rel="stylesheet" href="https://wefinancehere.com/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://wefinancehere.com/assets/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://wefinancehere.com/css/plugin/jasny-bootstrap/css/jasny-bootstrap.css">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="https://wefinancehere.com/assets/js/respond.min.js"></script>
	<![endif]-->    
    <title>WeFinanceHere.com - Signin</title>

<script src="https://use.fontawesome.com/94d5a20675.js"></script>
<style type="text/css">

 
import url('https://wefinancehere.com/assets/css/font-awesome.min.css');
@font-face {
  font-family: 'ModernPictogramsNormal';
  src: url("https://wefinancehere.com/css/plugin/codepen/fonts/modernpics-webfont.eot");
  src: url("https://wefinancehere.com/css/plugin/codepen/fonts/modernpics-webfont.eot?#iefix") format("embedded-opentype"), url("https://wefinancehere.com/css/plugin/codepen/fonts/modernpics-webfont.woff") format("woff"), url("https://wefinancehere.com/css/plugin/codepen/fonts/modernpics-webfont.ttf") format("truetype"), url("https://wefinancehere.com/css/plugin/codepen/fonts/modernpics-webfont.svg#ModernPictogramsNormal") format("svg");
  font-weight: normal;
  font-style: normal;
}
/*  line 13, ../sass/screen.scss */

/* line 17, ../sass/screen.scss */
#wrapper {
  width: 900px;
  margin: 10px auto 0 auto;
}

/* line 22, ../sass/screen.scss */
.cool_btn1 {
  width: 190px;
  height: 190px;
  margin: 15px 15px 15px 15px;
  position: relative;
  -webkit-border-radius: 200px;
  -moz-border-radius: 200px;
  -ms-border-radius: 200px;
  -o-border-radius: 200px;
  border-radius: 200px;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #fafafa), color-stop(50%, #e3e3e3), color-stop(50%, #888888), color-stop(100%, #666666));
  background-image: -webkit-linear-gradient(#fafafa, #e3e3e3 50%, #888888 50%, #666666);
  background-image: -moz-linear-gradient(#fafafa, #e3e3e3 50%, #888888 50%, #666666);
  background-image: -o-linear-gradient(#fafafa, #e3e3e3 50%, #888888 50%, #666666);
  background-image: linear-gradient(#fafafa, #e3e3e3 50%, #888888 50%, #666666);
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3);
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3);
  display: inline-block;
}
/* line 31, ../sass/screen.scss */
.cool_btn1 h1 {
  text-align: center;
  font-size: 20px;
  margin: 67px 0 0 0;
  color: #333;
  text-shadow: 0 1px 0 white, 0 -1px 0 rgba(0, 0, 0, 0.5);
  font-family: 'Lobster', cursive;
  font-weight: normal;
  line-height: 1;
}
/* line 40, ../sass/screen.scss */
.cool_btn1 h1 i {
  display: block;
  font-style: normal;
  font-size: 14px;
  font-weight: bold;
  font-family: helvetica, arial, sans-serif;
  text-shadow: none;
}
/* line 49, ../sass/screen.scss */
.cool_btn1 h2 {
  font-family: 'ModernPictogramsNormal', Arial, sans-serif;
  font-weight: normal;
  text-align: center;
  font-size: 60px;
  line-height: 1;
  margin: 15px 0 0 0;
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.4), 0 -1px 0px rgba(0, 0, 0, 0.8);
  color: #fafafa;
}

/* line 60, ../sass/screen.scss */
.cool_btn1:after {
  content: "";
  width: 200px;
  height: 200px;
  display: block;
  position: absolute;
  left: -5px;
  top: -5px;
  z-index: -1;
  -webkit-border-radius: 200px;
  -moz-border-radius: 200px;
  -ms-border-radius: 200px;
  -o-border-radius: 200px;
  border-radius: 200px;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #cecece), color-stop(100%, #e7e7e7));
  background-image: -webkit-linear-gradient(#cecece, #e7e7e7);
  background-image: -moz-linear-gradient(#cecece, #e7e7e7);
  background-image: -o-linear-gradient(#cecece, #e7e7e7);
  background-image: linear-gradient(#cecece, #e7e7e7);
   -webkit-box-shadow: 0 1px 0px rgba(255, 255, 255, 0.9);
  -moz-box-shadow: 0 1px 0px rgba(255, 255, 255, 0.9);
  box-shadow: 0 1px 0px rgba(255, 255, 255, 0.9);
}

/* -------------------
Transitions
-------------------- */
/* line 76, ../sass/screen.scss */
.cool_btn1.blue, .cool_btn1.teal, .cool_btn1.orange, .cool_btn1.green {
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.4s;

  -moz-transition-duration: 0.4s;
  -o-transition-duration: 0.4s;
  transition-duration: 0.4s;
  cursor: pointer;
}

/* -------------------
Colors
-------------------- */
/* line 84, ../sass/screen.scss */
.cool_btn1.blue {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #d5d5d5), color-stop(50%, #ffffff), color-stop(50%, #577fbd), color-stop(100%, #274281));
  background-image: -webkit-linear-gradient(#d5d5d5, #ffffff 50%, #577fbd 50%, #274281);
  background-image: -moz-linear-gradient(#d5d5d5, #ffffff 50%, #577fbd 50%, #274281);
  background-image: -o-linear-gradient(#d5d5d5, #ffffff 50%, #577fbd 50%, #274281);
  background-image: linear-gradient(#d5d5d5, #ffffff 50%, #577fbd 50%, #274281);
}
/* line 86, ../sass/screen.scss */
.cool_btn1.blue h1 {
  color: #4265A3;
}
/* line 89, ../sass/screen.scss */
.cool_btn1.blue h2 {
  color: #1E3261;
}

/* line 93, ../sass/screen.scss */
.cool_btn1.teal {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #d5d5d5), color-stop(50%, #ffffff), color-stop(50%, #11b8fe), color-stop(100%, #0187b8));
  background-image: -webkit-linear-gradient(#d5d5d5, #ffffff 50%, #11b8fe 50%, #0187b8);
  background-image: -moz-linear-gradient(#d5d5d5, #ffffff 50%, #11b8fe 50%, #0187b8);
  background-image: -o-linear-gradient(#d5d5d5, #ffffff 50%, #11b8fe 50%, #0187b8);
  background-image: linear-gradient(#d5d5d5, #ffffff 50%, #11b8fe 50%, #0187b8);
}
/* line 95, ../sass/screen.scss */
.cool_btn1.teal h1 {
  color: #149EDB;
}
/* line 98, ../sass/screen.scss */
.cool_btn1.teal h2 {
  color: #0C6186;
}

/* line 102, ../sass/screen.scss */
.cool_btn1.orange {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #d5d5d5), color-stop(50%, #ffffff), color-stop(50%, #f49e23), color-stop(100%, #e27619));
  background-image: -webkit-linear-gradient(#d5d5d5, #ffffff 50%, #f49e23 50%, #e27619);
  background-image: -moz-linear-gradient(#d5d5d5, #ffffff 50%, #f49e23 50%, #e27619);
  background-image: -o-linear-gradient(#d5d5d5, #ffffff 50%, #f49e23 50%, #e27619);
  background-image: linear-gradient(#d5d5d5, #ffffff 50%, #f49e23 50%, #e27619);
}
/* line 104, ../sass/screen.scss */
.cool_btn1.orange h1 {
  color: #e27619;
}
/* line 107, ../sass/screen.scss */
.cool_btn1.orange h2 {
  color: #AC5509;
}

/* line 111, ../sass/screen.scss */
.cool_btn1.green {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #d5d5d5), color-stop(50%, #ffffff), color-stop(50%, #2fd51d), color-stop(100%, #00a01e));
  background-image: -webkit-linear-gradient(#d5d5d5, #ffffff 50%, #2fd51d 50%, #00a01e);
  background-image: -moz-linear-gradient(#d5d5d5, #ffffff 50%, #2fd51d 50%, #00a01e);
  background-image: -o-linear-gradient(#d5d5d5, #ffffff 50%, #2fd51d 50%, #00a01e);
  background-image: linear-gradient(#d5d5d5, #ffffff 50%, #2fd51d 50%, #00a01e);
}
/* line 113, ../sass/screen.scss */
.cool_btn1.green h1 {
  color: #00a01e;
}
/* line 116, ../sass/screen.scss */
.cool_btn1.green h2 {
  color: #006312;
}

/* -------------------
Hover States
-------------------- */
/* line 123, ../sass/screen.scss */
.cool_btn1.orange:hover {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(255, 174, 0, 0.8);
  -moz-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(255, 174, 0, 0.8);
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(255, 174, 0, 0.8);
}

/* line 128, ../sass/screen.scss */
.cool_btn1.teal:hover {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(16, 216, 252, 0.8);
  -moz-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(16, 216, 252, 0.8);
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(16, 216, 252, 0.8);
}

/* line 133, ../sass/screen.scss */
.cool_btn1.blue:hover {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(43, 95, 187, 0.8);
  -moz-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(43, 95, 187, 0.8);
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(43, 95, 187, 0.8);
}

/* line 138, ../sass/screen.scss */
.cool_btn1.green:hover {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(47, 217, 29, 0.8);
  -moz-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(47, 217, 29, 0.8);
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3), inset 0px 2px 5px rgba(0, 0, 0, 0.3), 0 0 28px 6px rgba(47, 217, 29, 0.8);
}

/* -------------------
Media Queries
-------------------- */
@media screen and (max-width: 860px) {
  /* line 147, ../sass/screen.scss */
  #wrapper {
    width: 700px;
  }
}
@media screen and (max-width: 740px) {
  /* line 152, ../sass/screen.scss */
  #wrapper {
    width: 480px;
  }
}
@media screen and (max-width: 440px) {
  /* line 157, ../sass/screen.scss */
  #wrapper {
    width: 370px;
    text-align: center;
  }
}

/* -- This is the start of new css section */

body {
    text-align: center;
}

.buttton {
    display: inline-block;
    margin: 10px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    -webkit-box-shadow:    0 8px 0 #373bc5, 0 15px 20px rgba(0, 0, 0, .35);
    -moz-box-shadow:0 8px 0 #373bc5, 0 15px 20px rgba(0, 0, 0, .35);
    box-shadow: 0 8px 0 #3937c5, 0 15px 20px rgba(0, 0, 0, .35);
    -webkit-transition: -webkit-box-shadow .1s ease-in-out;
    -moz-transition: -moz-box-shadow .1s ease-in-out;
    -o-transition: -o-box-shadow .1s ease-in-out;
    transition: box-shadow .1s ease-in-out;
    font-size: 50px;
    color: #fff;
}

.buttton span {
    display: inline-block;
    padding: 20px 30px;
    background-color: #2196F3;
    background-image: --webkit-gradient(linear, 0% 0%, 0% 100%, from(hsla(238, 90%, 80%, 0.8)), to(hsla(241, 90%, 70%, 0.2)));
    background-image: -webkit-linear-gradient(hsla(238, 90%, 80%, 0.8), hsla(238, 90%, 70%, 0.2));
    background-image: -moz-linear-gradient(hsla(238, 90%, 80%, 0.8), hsla(238, 90%, 70%, 0.2));
    background-image: -o-linear-gradient(hsla(238, 90%, 80%, 0.8), hsla(238, 90%, 70%, 0.2));
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    -webkit-box-shadow: inset 0 -1px 1px rgba(255, 255, 255, .15);
    -moz-box-shadow: inset 0 -1px 1px rgba(255, 255, 255, .15);
    box-shadow: inset 0 -1px 1px rgba(255, 255, 255, .15);
    font-family: 'Pacifico', Arial, sans-serif;
    line-height: 1;
    text-shadow: 0 -1px 1px rgba(49, 53, 175, 0.7);
    -webkit-transition: background-color .2s ease-in-out, -webkit-transform .1s ease-in-out;
    -moz-transition: background-color .2s ease-in-out, -moz-transform .1s ease-in-out;
    -o-transition: background-color .2s ease-in-out, -o-transform .1s ease-in-out;
    transition: background-color .2s ease-in-out, transform .1s ease-in-out;
}

.buttton:hover span {
    background-color: #1016f1;
	color:#FFF !important;
    text-shadow: 0 -1px 1px rgba(49, 53, 175, 0.9), 0 0 5px rgba(255, 255, 255, .8);
}

.buttton:active, .buttton:focus {
    -webkit-box-shadow:    0 8px 0 #3937c5, 0 12px 10px rgba(0, 0, 0, .3);
    -moz-box-shadow: 0 8px 0 #3937c5, 0 12px 10px rgba(0, 0, 0, .3);
    box-shadow:    0 8px 0 #3937c5, 0 12px 10px rgba(0, 0, 0, .3);
}

.buttton:active span {
    -webkit-transform: translate(0, 4px);
    -moz-transform: translate(0, 4px);
    -o-transform: translate(0, 4px);
    transform: translate(0, 4px);
}

</style>
<script>
	// intialize and setup facebook js sdk
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '597949943584638',
      xfbml      : true,
      version    : 'v2.8'
    });

    // ADD ADDITIONAL FACEBOOK CODE HERE
	function onLogin(response) {
	  if (response.status == 'connected') {
		FB.api('/me?fields=first_name', function(data) {
		  var welcomeBlock = document.getElementById('fb-welcome');
		  welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
		});
	  }
	}
	
	FB.getLoginStatus(function(response) {
	  // Check login status on load, and if the user is
	  // already logged in, go directly to the welcome message.
	  if (response.status === 'connected') {
		onLogin(response);
		document.getElementById('status').innerHTML = 'Personalized Experience';
		document.getElementById('login').style.visibility = 'hidden';
		document.getElementById('api_approvalapprvl').href = 'account/dashboard.php';
		document.getElementById('api_approvalmyappt').href = 'account/dashboard.php';
		document.getElementById('api_approvalmyvehs').href = 'account/dashboard.php';
		document.getElementById('api_approvalmyverify').href = 'account/dashboard.php';
		 getsingleInfo();
	  } else if (response.status === 'not_authorized'){
		document.getElementById('status').innerHTML = 'We are not logged in.';
	  } else {
		// Otherwise, show Login dialog first.
		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		
		FB.login(function(response) {
		  onLogin(response);
		}, {scope: 'user_friends, email'});
	  }
	});	
	
	
	
	
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  
  
  	function login(){
		FB.login(function(response){
			  if (response.status == 'connected') {
				document.getElementById('status').innerHTML = 'We are connected.';
			  } else if (response.status === 'not_authorized'){
				document.getElementById('status').innerHTML = 'We are not logged in.';
			  } else {
				document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
			  }
		}, {scope: 'user_friends, email'});    //A {scope: 'publish_actions'});
	}
	
	function getnewInfo(){
		FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email'}, function(response){
			document.getElementByID('status').innerHTML = response.id;
		});
	}
	
	
	// A Needs Approved Actions To be Submitted
	// Posting on user timeline
	function post(){
		FB.api('/me/feed', 'post', {message: 'my first status...'}, function(response){
			document.getElementByID('posted').innerHTML = response.id;
		});
	}

	// sharing link on user timeline
	function shareLink() {
		FB.api('/me/feed', 'post', {link: 'http://wefinancehere.com/vehicles.php'}, function(response){
			document.getElementByID('status').innerHTML = response.id;
		});
	}


	// sharing link on user timeline
	function uploadPhoto() {
		FB.api('/me/photos', 'post', {url: 'https://scontent-atl3-1.xx.fbcdn.net/v/t1.0-9/540337_593541274020866_1584702165_n.png?oh=84ab2654638138b717dcbddfb3ac66a2&oe=58A2D7C5'}, function(response){
			if(!response || response.error){
				document.getElementByID('status').innerHTML = "Error";		
			}else{
				document.getElementByID('status').innerHTML = response.id;
			}
		});
	}
</script>


</head>
<body>





	<section>

<div style="display:none;">
<input id="budget_afford" type="hidden" value="<?php echo $wfhuser_approval_budget_affordable; ?>">
<input id="cust_creditapr" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_apr']; ?>">
<input id="cust_creditapr_txt" type="hidden" value="<?php echo $row_find_existingsession_approval['cust_creditapr_txt']; ?>">
<input id="gross_monthlyincome" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_month_income']; ?>">
<input id="cust_downpayment" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_dwpymt']; ?>">
<input id="cust_totalapproval" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_totalpayments']; ?>">
<input id="cust_desiredpymt" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_mxpymt']; ?>">
<input id="cust_desiredtermos" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_monthterm']; ?>">
<input id="cust_car_loan" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_openloan']; ?>">
<input id="bigPrincipal"  type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_bigPrincipal']; ?>">
<input id="bigSellingPrice" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_bigSellingPrice']; ?>">
<input id="cust_totalpayments" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_id']; ?>">
<input id="cust_dealtoday" type="hidden" value="">
<input id="cust_schedule_td" type="hidden" value="">
<input id="cust_lead_source" type="hidden" value="">
<input id="cust_lead_temperature" type="hidden" value="">
<input id="wfhcookiesesid"  type="hidden" value="<?php //echo $cookie; ?>">
<input id="wfhuser_id" type="hidden" value="<?php echo $wfhuser_id; ?>">
<input id="wfhuser_approval_id" type="hidden" value="<?php echo $wfhuser_approval_id; ?>">
<input id="cust_home_state" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_state']; ?>">
<input id="cust_home_market" type="hidden" value="<?php echo $row_find_existingsession_approval['wfhuser_approval_market']; ?>">
<input id="access_id" type="hidden" value="">
<input id="wfhuserperm_timezone" type="hidden" value="">
	<div id="connected_results">

    </div>

</div>
    </section>
                	
                    
                    
    <section id="start_box" class="wrapper-lg bg-custom-home">
    
    
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
                	<a href="https://wefinancehere.com" target="_blank"><img src="https://wefinancehere.com/img/wfh_logo.png"></a>
				</div>
            </div>
       </div>
    
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                
	                <h2>Your Finance Automotive Market Place</h2>
<div id='wrapper'>
  			
            <div class='cool_btn1 green'>
				<h1 class='top'><a id="api_approvalapprvl" href="#">Approval</a></h1>
				<h2><i class="fa fa-certificate fa-42" aria-hidden="true"></i></h2>
			</div>
			<div class='cool_btn1 teal'>
				<h1 class='top'><a id="api_approvalmyappt" href="#">Appointments</a></h1>
				<h2><i class="fa fa fa-calendar"></i></h2>
			</div>
			<div class='cool_btn1 blue'>
				<h1 class='top'><a id="api_approvalmyvehs" href="#">Saved Vehicles</a></h1>
				<h2><i class="fa fa-automobile"></i></h2>
			</div>
			<div class='cool_btn1 orange'>
				<h1 class='top'><a id="api_approvalmyverify" href="#">Verification</a></h1>
				<h2><i class="fa fa-file"></i></h2>
			</div>
            
		</div>	                



                </div>
            </div>
        </div>
    
    
        <div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">

					<div style="height:600px; color:#FF5722;">
        
            			<h1 id="fb-welcome"class="heading-lg text-center"></h1>
                        <div align="center"><a id="api_fbpic" href="#" role="button"><img id="ftr_pic" src="img/avatar/avatar-profile.png" class="media-object img-circle" alt="User avatar" title="Facebook Connect" width="110px" /></a></div>
						<div id="status"></div>
                        <div id="posted"></div>
                        <!-- button onClick="uploadPhoto()">Post</button -->
                        <!-- button onClick="post()">Post</button -->
                        <!-- button onClick="shareLink()" id="login">Share Link</button -->
                        
                        <!--button onClick="getInfo()">Get Info</button -->

            <a href="#" onClick="login()" id="login" class="buttton">
                <span><i class="fa fa-facebook"></i> Connect With Facebook</span>
            </a>

            
            		</div>

				</div>
            </div>
        </div>
    
    
    
        <div class="row">
            <div class="container">
                <div class="col-sm-12">
                
                
                
                
                </div>
            </div>
        </div>
    
    </section>
                    
                    




	<script src="https://wefinancehere.com/js/jquery-2.1.1.js"></script>

	<script src="https://wefinancehere.com/assets/js/bootstrap.min.js"></script>
	<script src="https://wefinancehere.com/assets/js/bootstrap-select.min.js"></script>
    <script src="https://wefinancehere.com/js/custom/approval.widget.js"></script>
    <script src="https://wefinancehere.com/js/custom/custom.start.js"></script>
    <script src="https://wefinancehere.com/js/custom/custom.api.js"></script>
	<script src="https://wefinancehere.com/assets/js/holder.js"></script>
	<script src="https://wefinancehere.com/js/plugin/jasny-bootstrap/js/jasny-bootstrap.js"></script>
</body>
</html>