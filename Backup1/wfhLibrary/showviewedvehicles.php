<?php
function showphotoNly ($vphoto){
			//$cvid = $row_customer_leads['customer_vehicles_id'];

			$findexisting = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vid` = '".$vphoto."'";
			$findmyresult = mysqli_query($idsconnection_mysqli, $findexisting);
			$vrow = mysql_fetch_array($findmyresult);

			$vphotovid = $vrow['vid'];
			$vphotodid = $vrow['did'];
			$vphotofile = $vrow['vthubmnail_file'];
			
			$vstatus = $vrow['vlivestatus'];
			
			//echo $vphotovid;
			
			if(!$vphotovid){
				echo 'No Longer Available!';
				
			}else{

						echo $vrow['vyear'].' ';
						echo $vrow['vmake'].' ';
						echo $vrow['vmodel'].' ';
						echo $vrow['vtrim'].'<br>';
						
						if ($vstatus == 0) {
							echo "ON HOLD!".'<br>';
						}
						if ($vstatus == 1) {
							echo "Still Available!".'<br>';
						}
		
						if ($vstatus == 9) {
							echo "SOLD!".'<br>';
						}
		
						else { 
							echo " ";
						}
					
					echo "<div id='comparelabel'><label><input type='checkbox' name='comparevid' id='comparevid' value='$vphotovid'  /> : Select Me! </label></div>";
					
					if(!$vphotofile){
						

					
					echo "<img src='http://wefinancehere.com/images/wfh_coming_soon_tb.png' width='120px' >";
					
					}else{
						
					$img = "http://images.autocitymag.com/$vphotodid/$vphotovid/$vphotofile";
					//$img ='jerk';
					echo '<br>';
					echo "<img class='thumbnail' src='$img' width='120px' >";
					echo '<br>';
					

						echo 'VIN: '.$vrow['vvin'].'<br>';
						echo 'Concition: '.$vrow['vcondition'].'<br>';
						echo 'Certified: '.$vrow['vcertified'].'<br>';
						echo 'Stock No.: '.$vrow['vstockno'].'<br>';
						echo 'Mileage: '.$vrow['vmileage'].'<br>';
						echo 'Color: '.$vrow['vecolor_txt'].'<br>';
						echo 'Trans.: '.$vrow['vtransm'].'<br>';
						echo 'Engine: '.$vrow['vengine'].'<br>';





			}

					
			}
			
			
									

}

?>