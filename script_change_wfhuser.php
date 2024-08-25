<?php


if(!$_POST) exit;

require_once("db.php");

if(isset($_POST['wfhuser_approval_id'], $_POST['wfhuser_id'], $_POST['email_login'], $_POST['pass_login'], $_POST['confirm_pass_login'])){

$wfhuser_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuser_id']));
$wfhuser_approval_id= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuser_approval_id']));
$wfhuser_approval_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['confirm_pass_login']));


$query_update_wfhuserprofile_sql = "
UPDATE `idsids_wefinancehere`.`wfhuserprofile` SET
	`wfhuser_approval_id` = '$wfhuser_approval_id',
	`wfhuser_password` =  '$wfhuser_approval_password',
	`wfhuser_verified` =  '1',
	`wfhuser_status` =  '1'
	WHERE
		`wfhuser_id` = '$wfhuser_id'

";
	


$run_update_wfhuserprofile = mysqli_query($wfh_connection, $query_update_wfhuserprofile_sql);


	










$query_update_wfh_user_approval_sql = "
UPDATE `idsids_wefinancehere`.`wfhuser_approvals` SET
	`wfhuser_approval_password` =  '$wfhuser_approval_password'
	WHERE
		`wfhuser_approval_id` = '$wfhuser_approval_id'

";


$run_update_wfh_user_approval = mysqli_query($wfh_connection_mysqli, $query_update_wfh_user_approval_sql);



	echo "<script>window.top.location.href='https://wefinancehere.com/account/dashboard.php'</script>";


}




?>