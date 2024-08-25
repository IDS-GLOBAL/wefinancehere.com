<?php require_once("db.php"); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

  $MM_fldUserAuthorization = "status";
  $MM_fldUserAuthorizationn = "acct_status";
  
  $MM_redirectwfhuserApprovalSuccess = "account/user.approval.php";

  $MM_redirectwfhuserLoginSuccess = "account/dashboard.php";



  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;


if (isset($_POST['email_login'], $_POST['pass_login'])) {

	$loginUsername=mysqli_real_escape_string($wfh_connection_mysqli, trim($_POST['email_login']));
	$password=mysqli_real_escape_string($wfh_connection_mysqli, trim($_POST['pass_login']));
	
  mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
  $LoginRSS__query= "SELECT `wfhuserprofile`.`wfhuser_email_address`, `wfhuserprofile`.`wfhuser_password`, `wfhuserprofile`.`wfhuser_status` FROM `wfhuserprofile` WHERE `wfhuserprofile`.`wfhuser_email_address`='$loginUsername' AND `wfhuserprofile`.`wfhuser_password`='$password'";
  
   
  $LoginRSS = mysqli_query($idsconnection_mysqli, $LoginRSS__query);
  $loginFoundFullUser = mysqli_num_rows($LoginRSS);
  
  if ($loginFoundFullUser) {
	$loginStrGroup  = mysql_result($LoginRSS,0,'wfhuser_status');

    //declare two session variables and assign them
    $_SESSION['MM_wfhuserUsername'] = $loginUsername;
    $_SESSION['MM_wfhuserUserGroup'] = $loginStrGroup;	      
	
		if (isset($_SESSION['PrevUrl']) && false) {
		  $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
		}
		//header("Location: " . $MM_redirectwfhuserLoginSuccess );
		echo "
		<script>
			window.location.href = '$MM_redirectwfhuserLoginSuccess';
		</script>
		
		";
		
	}

  
  
  }elseif(!$loginFoundUser) {
	// Now We Stry Sales person Credientials


 





  mysql_select_db($wfh_connection_mysqli, $database_wfh_connection);
  $LoginRS__query= "SELECT `wfhuser_approvals`.`wfhuser_approval_email`, `wfhuser_approvals`.`wfhuser_approval_password`, `wfhuser_approvals`.`wfhuser_approval_email_verified`  FROM `wfhuser_approvals` WHERE `wfhuser_approval_email`= '$loginUsername' AND `wfhuser_approvals`.`wfhuser_approval_password`='$password'";
   
  $LoginRS = mysqli_query($wfh_connection_mysqli, $LoginRS__query);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  
  if ($loginFoundUser) {
  // Now We Try Dealer Credentials which takes persidence Admin account actually
	$loginStrGroup  = mysql_result($LoginRS,0,'wfhuser_approval_email_verified');
    
    //declare two session variables and assign them
    //$_SESSION['MM_Dealer'] = $loginUsername;
    //$_SESSION['MM_DealerAccess'] = $loginStrGroup;	      
    $_SESSION['MM_wfhuserUsername'] = $loginUsername;
    $_SESSION['MM_wfhuserUserGroup'] = $loginStrGroup;	      



    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
	
   // header("Location: " . $MM_redirectDealerLoginSuccess );
	echo"
	<script>
		window.location.href = '$MM_redirectwfhuserApprovalSuccess';
	</script>
	
	";
  
  








	if(isset($_GET['attempt'])){
	
	$a = $_GET['attempt'];
	$a++;
	}else{
	$a = '1';
  	}
		echo"
		<script>
			window.location.href = 'index.php?attempt?=$a';
		</script>
		
		";



  }else {
	  
    //header("Location: ". $MM_redirectLoginFailed );

	
  }
  
  
}
?>