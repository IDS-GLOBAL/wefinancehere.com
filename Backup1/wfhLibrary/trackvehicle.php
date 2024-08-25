<?php



function trackvehiclewfh ($vid){
	
	global $did;
	global $fbuserid;
	
	global $cookiePHPSESSID;
	
	include('sessionid.php');


	include('trackconfig.php');
	
	
	if($cookiePHPSESSID){
	
	$source = 'WeFinanceHere.com';
	
	
	if($fbuserid)
	{
			$findexistring = "SELECT *  FROM `idsids_tracking_idsvehicles`.`vehiclestracking` WHERE fbid = '$fbuserid'  ORDER BY created_at DESC LIMIT 1";
			$findmyexistresult = mysqli_query($idsconnection_mysqli, $findexistring);
			$existrow = mysql_fetch_array($findmyexistresult);
			
			$existvid = $existrow['vid'];
    
	
			if($vid == $existvid){}else{
					$insertrackingSQL = "INSERT INTO  `idsids_tracking_idsvehicles`.`vehiclestracking` 
											(`vid`, `did`, `sessionid`,`fbid`,`source_id`, `source`) 
											VALUES 
											('$vid','$did','$cookiePHPSESSID','$fbuserid','4','$source')
										";
					
					$insertinto = mysqli_query($idsconnection_mysqli, $insertrackingSQL);
				}
		
	}
	else
	{
			$findexistring = "SELECT *  FROM vehiclestracking WHERE sessionid = '$cookiePHPSESSID'  ORDER BY created_at DESC LIMIT 1";
			$findmyexistresult = mysqli_query($idsconnection_mysqli, $findexistring);
			$existrow = mysql_fetch_array($findmyexistresult);
			
			$existvid = $existrow['vid'];
    
	
			if($vid == $existvid){}else
			{
					$insertrackingSQL = "INSERT INTO  `idsids_tracking_idsvehicles`.`vehiclestracking` 
											(`vid`, `did`, `sessionid`, `source_id`, `source`) 
											VALUES 
											('$vid','$did','$cookiePHPSESSID','4','$source')
										";
		
			$insertinto = mysqli_query($idsconnection_mysqli, $insertrackingSQL);
			}
	
	  }
    }
	//echo $cookiePHPSESSID;
	//echo $findexistring;
}





?>