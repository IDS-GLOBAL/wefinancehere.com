<?php
// *** Logout the current user.
$logoutGoTo = "signin.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['fb_597949943584638_code'] = NULL;
$_SESSION['fb_597949943584638_access_token'] = NULL;
unset($_SESSION['fb_597949943584638_code']);
unset($_SESSION['fb_597949943584638_access_token']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}


header("Location: index.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>