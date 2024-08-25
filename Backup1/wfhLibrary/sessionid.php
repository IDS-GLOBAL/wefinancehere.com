<?php
$a = session_id();

if(empty($a)) session_start();
$sessioncookie = "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];


$PHPSESSID = session_id();


$cookiePHPSESSID = $_COOKIE["PHPSESSID"];

?>