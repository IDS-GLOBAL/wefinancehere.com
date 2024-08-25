<?php
																	
												//money_format('%i', $number) . "\n";
												
												
												$Vehiclesvid = $row_selectVehicles['vid'];
												$Vehiclesdid = $row_selectVehicles['did'];
												$Vehiclesvlivestatus = $row_selectVehicles['vlivestatus'];
												
												$VehiclesvDateInStock = $row_selectVehicles['vDateInStock'];
												$Vehiclesvphoto_count = $row_selectVehicles['vphoto_count'];
												$Vehiclesvsource_idscrm_import_txt = $row_selectVehicles['vsource_idscrm_import_txt'];
												$Vehiclesvthubmnail_file = $row_selectVehicles['vthubmnail_file'];
												
												$Vehiclesvyear = $row_selectVehicles['vyear'];
												$Vehiclesvmake = $row_selectVehicles['vmake'];
												$Vehiclesvmodel = $row_selectVehicles['vmodel'];
												$Vehiclesvtrim = $row_selectVehicles['vtrim'];
												$Vehicletitle = "$Vehiclesvmake $Vehiclesvmodel $Vehiclesvtrim";
												
												$Vehiclesvvin = $row_selectVehicles['vvin'];
												$Vehiclesvbody = $row_selectVehicles['vbody'];
												$Vehiclesvcondition = $row_selectVehicles['vcondition'];
												$Vehiclesvcertified = $row_selectVehicles['vcertified'];
												$Vehiclesvstockno = $row_selectVehicles['vstockno'];
												$Vehiclesvmileage = $row_selectVehicles['vmileage'];
												
												$Vehiclesvrprice = $row_selectVehicles['vrprice'];
												$Vehiclesvdprice = $row_selectVehicles['vdprice'];
												$Vehiclesvspecialprice = $row_selectVehicles['vspecialprice'];
												
												
												$Vehiclesvrprice = preg_replace("/[^0-9]/","","$Vehiclesvrprice");
												$Vehiclesvdprice = preg_replace("/[^0-9]/","","$Vehiclesvdprice");
												$Vehiclesvspecialprice = preg_replace("/[^0-9]/","","$Vehiclesvspecialprice");
												
												
												if(!$Vehiclesvdprice){
																			
																			if(!$Vehiclesvrprice)
																				{
																				
																				if(!$Vehiclesvspecialprice){$downpaymentPrice = '2000';}else{	
																												
																						$fifteenpercent = ($Vehiclesvspecialprice * '.15');	
																						$downpaymentPrice = "$fifteenpercent";
																						$downpaymentPrice = round($downpaymentPrice, -2);
												
																						}
												
																				}else{
																						$fifteenpercent = ($Vehiclesvrprice * '.15');	
																						$downpaymentPrice = "$fifteenpercent";
																						$downpaymentPrice = round($downpaymentPrice, -2);
												
																					  }
													}else{
														
														$downpaymentPrice = $Vehiclesvdprice;
														$downpaymentPrice = round($downpaymentPrice, -2);
												}
												
												
												
												
												$Vehiclesvecolor_txt = $row_selectVehicles['vecolor_txt'];
												$Vehiclesvicolor_txt = $row_selectVehicles['vicolor_txt'];
												
												$Vehiclesvtransm = $row_selectVehicles['vtransm'];
												$Vehiclesvengine = $row_selectVehicles['vengine'];
												$Vehiclesvdoors = $row_selectVehicles['vdoors'];
												
												
												
												$Vehiclescompany = $row_selectVehicles['company'];
												$Vehicleswebsite = $row_selectVehicles['website'];
												$Vehiclesphone = $row_selectVehicles['phone'];
												$Vehiclesaddress = $row_selectVehicles['address'];
												
												$Vehiclescity = $row_selectVehicles['city'];
												$Vehiclesstate = $row_selectVehicles['state'];
												$Vehicleszip = $row_selectVehicles['zip'];
												
												$Vehiclesstatus = $row_selectVehicles['status'];
												
												$Vehicleswfh_dealer_type_id = $row_selectVehicles['wfh_dealer_type_id'];
												
												
												$createdAt = $row_selectVehicles['created_at'];
										
										/*
										$format = 'm-d-Y';
										$date = date_create_from_format($format, $createdAt);
										echo date_format($date, 'Y-m-d') . "\n";
										/*/
										
										
												$dateinStock = '';
												
												// When Photos Are Not Available
												$photocomingsoon = "images/wfh_coming_soon_tb.png";
												if(!$Vehiclesvthubmnail_file){
													$vehicleimage = $photocomingsoon;
												}else{
													$vehicleimage = "http://images.autocitymag.com/$Vehiclesdid/$Vehiclesvid/$Vehiclesvthubmnail_file";
												}
												
												
												
												$monthlypayments = '<br>'.'Finance Now! Today!!';
												//$monthlypayments = '';
												
?>