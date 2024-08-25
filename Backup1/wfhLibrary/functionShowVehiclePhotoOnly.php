<?php

function showphoto($vphoto){
			//$cvid = $row_customer_leads['customer_vehicles_id'];

			$findexisting = "SELECT vthubmnail_file, did, vid  FROM `idsids_idsdms`.`vehicles`  WHERE `vid` = '".$vphoto."'";
			$findmyresult = mysqli_query($idsconnection_mysqli, $findexisting);
			$vrow = mysql_fetch_array($findmyresult);

			if(!$vrow['vid']){
				
				echo '';
				
			}else{
					$vstatus = $vrow['vlivestatus'];
					$vvid = $vrow['vid'];
					$vdid = $vrow['did'];
					echo '<br>';
					$vphoto=$vrow['vthubmnail_file'];
					if(!$vphoto){
					echo "<img src='http://www.wefinancehere.com/images/wfh_coming_soon_tb.png' width='400px' >";
					}else{
					echo '<br>';
					echo "<img src='http://images.autocitymag.com/$vdid/$vvid/$vphoto' width='120px' >";
					echo '<br>';
				
			}

					
			}
			
			
									

}



?>




