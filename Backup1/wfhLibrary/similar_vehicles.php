<?php

function showSimilarVehicles($did, $vid){
include('../Connections/idsconnection.php');
			global $did;
			
			global $vid;
			
			$findmyexisting = "SELECT *  FROM `idsids_idsdms`.`vehicles` WHERE vid = '$vid' LIMIT 1";
			$ffindmyresult = mysqli_query($idsconnection_mysqli, $findmyexisting);
			$vvresultrow = mysql_fetch_array($ffindmyresult);
			
			$myvyear = $vvresultrow['vyear'];
			$myvcondition = $vvresultrow['vcondition'];
			$myvmake = $vvresultrow['vmake'];
			$myvbody = $vvresultrow['vbody'];			

$findsimilar = "
SELECT *  FROM `idsids_idsdms`.`vehicles` WHERE `vlivestatus` = 1 
AND `vcondition` = '$myvcondition'
AND `vyear` <=  '$myvyear'
AND `did` = '$did'
AND  `vthubmnail_file` IS NOT NULL
AND `vmake` = '$myvmake' 
OR `vbody` = '$myvbody'
AND `vcondition` = '$myvcondition'
AND `did` = '$did'
ORDER BY RAND() LIMIT 6
";
	
			$mysimilarresult = mysqli_query($idsconnection_mysqli, $findsimilar);
			$vsimilarrow = mysql_fetch_array($mysimilarresult);

			if(!$vsimilarrow['vid']){
				
				echo 'No Vehicle';
				
			}else{
					while($vrow = mysql_fetch_array($mysimilarresult))
					  {
  						echo "<div id='similarv'>";

						  $vvid = $vrow['vid'];
						echo "<a href='?v=$vvid' class='similarlink' />";  
						
						$vstatus = $vrow['vlivestatus'];
						echo "<div id='similartitle'>";
						echo $vrow['vyear'].' ';																								
						echo $vrow['vmake'].' ';												
						echo $vrow['vmodel'].' ';
						echo $vrow['vtrim'].' ';
						echo '</div>';

						$vphoto=$vrow['vthubmnail_file'];
						$vpicture = "http://images.autocitymag.com/$did/$vvid/$vphoto";
						
						if(!$vphoto){
										echo '<br>';
										echo "<img id='similarimg' src='http://www.wefinancehere.com/images/wfh_coming_soon_tb.png' width='120px' >";
										echo '<br>';
									
									}else{
										
											echo '';
											echo '<br>';
											echo "<img id='similarimg' src='$vpicture' width='120px' >";
											echo '<br>';
											
										}
						echo "</a>";
						echo "</div>";

						}
			
			
									


	
	
}
}
?>