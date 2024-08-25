<?php

	$docFee = $row_dealer_url['settingDocDlvryFee'];
	$titleFee = $row_dealer_url['settingTitleFee'];
	$stateFee = $row_dealer_url['settingStateInspectnFee'];
	
	$fees = ($docFee + $titleFee + $stateFee);
	$tax = $row_dealer_url['settingSateSlsTax'];
	
	$total = ($fees * $tax);
	
	//$sellingPrice = ($vrprice + $total);

	//$mindown = ($sellingPrice * '.15');


        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);

$vcondition="";

if($vcondition=='New'){

$vgoodcredit = $row_dealer_url['newmatrixcredit_vgoodcredit'];
		if(!$vgoodcredit){
			$vgoodcredit = '3.0';
		}
		
		$jgoodcredit = $row_dealer_url['newmatrixcredit_jgoodcredit'];
		if(!$jgoodcredit){
			$jgoodcredit = '';
		}
		
		$faircredit = $row_dealer_url['newmatrixcredit_faircredit'];
		if(!$faircredit){
			$faircredit = '';
		}
		
		$poorcredit = $row_dealer_url['newmatrixcredit_poorcredit'];
		if(!$poorcredit){
			$poorcredit = '';
		}
		
		$subprime = $row_dealer_url['newmatrixcredit_subprime'];
		if(!$subprime){
			$subprime = '';
		}
		
		$unknown = $row_dealer_url['newmatrixcredit_unknown'];
		if(!$unknown){
			$unknown = '';
		}

}

if($vcondition=='Used'){

	if(!$row_dealer_url['usedmatrixcredit_vgoodcredit']){
		$vgoodcredit = '3.0';
	}else{
	
		$vgoodcredit = $row_dealer_url['usedmatrixcredit_vgoodcredit'];
	}
	
	if(!$row_dealer_url['usedmatrixcredit_jgoodcredit']){
	$jgoodcredit = '6.0';
	}else{
	
		$jgoodcredit = $row_dealer_url['usedmatrixcredit_jgoodcredit'];

	}
	
	if(!$row_dealer_url['usedmatrixcredit_faircredit']){
		$faircredit = '12.0';
	}else{
	
		$faircredit = $row_dealer_url['usedmatrixcredit_faircredit'];

	}
	
	if(!$row_dealer_url['usedmatrixcredit_poorcredit']){
	$poorcredit = '15.0';
	}else{
	
			$poorcredit = $row_dealer_url['usedmatrixcredit_poorcredit'];

	}
	
	
	if(!$row_dealer_url['usedmatrixcredit_subprime']){
	$subprime = '26.0';
	}else{
		
		$subprime = $row_dealer_url['usedmatrixcredit_subprime'];
	}
	
	if(!$row_dealer_url['usedmatrixcredit_unknown']){
	$unknown = '29.9';
	}else{
		$unknown = $row_dealer_url['usedmatrixcredit_unknown'];
	
	}
}

?>