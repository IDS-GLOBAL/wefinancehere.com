<?php

require('test/libs/facebook.php');


$facebook = new Facebook(array(
  'appId'  => '597949943584638',
  'secret' => 'bea982d39e0983cfa4799a5d0e70e8be',
  'coookie' => true,
));

// Get User ID
$user = $facebook->getUser();

if (!empty($user))
{
	try {
			$uid = $facebook->getUser();
			$userr = $facebook->api('/me');
	} catch (Exception $e) {}
	
	if(!empty($userr))
	{
		echo 'Hello User';
	}
	else
	
		die("An error occured.");
		
		
		
}
else
{


	  $loginUrl = $facebook->getLoginUrl(array(
	  'scope' => 'publish_stream,create_event,email'									   
  ));
  echo "<a href='$loginUrl'>Login</a>";


}
//$session = $facebook->getSession();



?>