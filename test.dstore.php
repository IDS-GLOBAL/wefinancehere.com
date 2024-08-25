<?php
function calcPmt($amount_tofinance, $interest_rate, $finance_months) {

	$int = $interest_rate/1200;
	$int1 = 1+$int;
	$r1 = pow($int1, $finance_months);
	
	$pmt = $amount_tofinance*($int*$r1)/($r1-1);

   return $pmt;

return;
}

$VPrice = 22999;
$settingStateInspectnFee = '30';
$settingTitleFee = '18';
$settingDocDlvryFee = '170';
$newfullsalesTax = '140';





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php echo $amountTofinance = ($VPrice + $settingStateInspectnFee + $settingTitleFee + $settingDocDlvryFee + $newfullsalesTax); ?>
<br />

<?php echo calcPmt(22999, 7.0, 48); ?>
</body>
</html>