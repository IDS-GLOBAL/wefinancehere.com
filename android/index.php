<?php
//print_r($_POST);


if(isset($_POST['email']) && $_POST['email'] != ''){
		// get tag
		$tag = $_POST['email'];
		
		// include db handler
		require_once('DB_Functions.php');
		$db = new DB_Functions();
		
		
		// response Array
		$response = array("tag" => $tag, "error" => FALSE);
		
		if(isset($_POST['email'])){
			// Request type is Register new user
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$user = $db->storeUser($name, $email, $password);
				if($user){
					// user stored successfully
					$response["error"] = FALSE;
					$response["uid"] = $user["wfhuser_id"];
					$response["user"]["name"] = $user["applicant_name"];
					$response["user"]["email"] = $user["wfhuser_email_address"];
					$response["user"]["created_at"] = $user["application_created_date"];
					$response["user"]["updated_at"] = $user["credit_app_last_modified"];
					echo json_encode($response);
					
				}
		}
}
?>