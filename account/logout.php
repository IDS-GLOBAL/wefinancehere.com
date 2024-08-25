<?php
// *** Logout the current user.
$logoutGoTo = "../index.php";
if (!isset($_SESSION)) {
  session_start();
}
//$_SESSION['MM_Username'] = NULL;
//$_SESSION['MM_UserGroup'] = NULL;
//unset($_SESSION['MM_Username']);
//unset($_SESSION['MM_UserGroup']);
if (isset($_SESSION))
{
    unset($_SESSION);
    session_unset();
    session_destroy();
}

if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>