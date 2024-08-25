<?php require_once('db.php'); ?>
<?php



		print_r($_POST);

if(isset($_POST['cust_dealer_id'], $_POST['cust_vehicle_id'], $_POST['cust_lead_source_id'], $_POST['cust_lead_source'], $_POST['cust_lead_token'], $_POST['cust_email'], $_POST['cust_phoneno'], $_POST['cust_phonetype'], $_POST['cust_phonetype_txt'], $_POST['cust_homephone'], $_POST['cust_mobilephone'], $_POST['cust_workphone'], $_POST['cust_fname'], $_POST['cust_lname'], $_POST['cust_employer_name'], $_POST['cust_employer_city'], $_POST['cust_employer_state'], $_POST['cust_employer_state_txt'], $_POST['cust_employer_zip'], $_POST['cust_employer_years'], $_POST['cust_employer_years_txt'], $_POST['cust_employer_months'], $_POST['cust_employer_months_txt'], $_POST['cust_gross_income'], $_POST['cust_gross_income_frequency'], $_POST['cust_gross_income_frequency_txt'], $_POST['cust_home_address'], $_POST['cust_home_city'], $_POST['cust_home_state'], $_POST['cust_home_state_txt'], $_POST['cust_home_zip'], $_POST['cust_home_county'], $_POST['cust_home_live_years'], $_POST['cust_home_live_years_txt'], $_POST['cust_home_live_months'], $_POST['cust_home_live_months_txt'], $_POST['tradeYear'], $_POST['tradeMake'], $_POST['tradeModel'], $_POST['tradeTrim'], $_POST['tradeMiles'], $_POST['counter_offer2'])):



$cust_dealer_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_dealer_id'])); 
$cust_vehicle_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_vehicle_id'])); 
$cust_lead_source_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_source_id'])); 
$cust_lead_source = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_source'])); 
$cust_lead_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lead_token'])); 
$cust_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_email'])); 
$cust_phoneno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_phoneno'])); 
$cust_phonetype = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_phonetype'])); 
$cust_phonetype_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_phonetype_txt'])); 
$cust_homephone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_homephone'])); 
$cust_mobilephone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_mobilephone'])); 
$cust_workphone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_workphone'])); 
$cust_fname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_fname'])); 
$cust_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_lname'])); 
$cust_employer_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_name'])); 
$cust_employer_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_city'])); 
$cust_employer_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_state'])); 
$cust_employer_state_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_state_txt'])); 
$cust_employer_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_zip'])); 
$cust_employer_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_years'])); 
$cust_employer_years_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_years_txt'])); 
$cust_employer_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_months'])); 
$cust_employer_months_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_employer_months_txt'])); 
$cust_gross_income = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_gross_income'])); 
$cust_gross_income_frequency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_gross_income_frequency'])); 
$cust_gross_income_frequency_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_gross_income_frequency_txt'])); 
$cust_home_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_address'])); 
$cust_home_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_city'])); 
$cust_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_state'])); 
$cust_home_state_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_state_txt'])); 
$cust_home_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_zip'])); 
$cust_home_county = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_county'])); 
$cust_home_live_years = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_live_years'])); 
$cust_home_live_months = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_home_live_months'])); 
$tradeYear = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeYear'])); 
$tradeMake = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeMake'])); 
$tradeModel = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeModel'])); 
$tradeTrim =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeTrim'])); 
$tradeMiles =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeMiles'])); 
$counter_offer2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['counter_offer2'])); 



$query_insert_wfh_lead_sql ="
INSERT INTO `idsids_idsdms`.`cust_leads` SET
						`cust_dealer_id` = '$cust_dealer_id',
						`cust_vehicle_id` = '$cust_vehicle_id', 
						`cust_lead_source_id` = '', 
						`cust_lead_source` = 'wefinancehere.com', 
						`cust_lead_token` = '$cust_lead_token',  
						`cust_email` = '$cust_email', 
						`cust_phoneno` = '$cust_phoneno', 
						`cust_phonetype` = '$cust_phonetype',
						`cust_homephone` = '$cust_homephone', 
						`cust_mobilephone` = '$cust_mobilephone',
						`cust_workphone` = '$cust_workphone',
						`cust_fname` = '$cust_fname', 
						`cust_lname` = '$cust_lname', 
						`cust_employer_name` = '$cust_employer_name', 
						`cust_employer_city` = '$cust_employer_city', 
						`cust_employer_state` = '$cust_employer_state',
						`cust_employer_zip` = '$cust_employer_zip', 
						`cust_employer_years` = '$cust_employer_years',
						`cust_employer_months` = '$cust_employer_months',
						`cust_gross_income` = '$cust_gross_income', 
						`cust_gross_income_frequency` = '$cust_gross_income_frequency',
						`cust_home_address` = '$cust_home_address', 
						`cust_home_city` = '$cust_home_city', 
						`cust_home_state` = '$cust_home_state',
						`cust_home_zip` = '$cust_home_zip', 
						`cust_home_county` = '$cust_home_county', 
						`cust_home_live_years` = '$cust_home_live_years',
						`cust_home_live_months` = '$cust_home_live_months',
						`tradeYear` = '$tradeYear',
						`tradeMake` = '$tradeMake',
						`tradeModel` = '$tradeModel',
						`tradeTrim` = '$tradeTrim', 
						`tradeMiles` = '$tradeMiles', 
						`counter_offer2` = '$counter_offer2'
";



echo $query_insert_wfh_lead_sql;

	$query_insert_wfh_lead_sql_saved = mysqli_query($idsconnection_mysqli, $query_insert_wfh_lead_sql);
    $wfh_lead_id = mysqli_insert_id($idsconnection_mysqli);


echo '<br />'.' $wfh_lead_id: '. $wfh_lead_id;


endif;





?>