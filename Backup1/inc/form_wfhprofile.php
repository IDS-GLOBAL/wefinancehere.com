<?php //require_once('../../Connections/idsconnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


//$fbemail = 'benwellrounded@gmail.com';

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userWfh =  "SELECT * FROM wfhuserprofile WHERE wfhuser_email_address = '$fbemail'");
$userWfh = mysqli_query($idsconnection_mysqli, $query_userWfh);
$row_userWfh = mysqli_fetch_assoc($userWfh);
$totalRows_userWfh = mysqli_num_rows($userWfh);
$wfidd = $row_userWfh['wfhuser_id']; //Hackishere


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
                    
<div id="tabs">

              <ul>
                <li><a href="#tabs-1">My Approval</a></li>
                <li><a href="#tabs-2">Primary</a></li>
                <li><a href="#tabs-3">Previous Address</a></li>
                <li><a href="#tabs-4">Work History</a></li>
                <li><a href="#tabs-5">Co-Buyer</a></li>
                <li><a href="#tabs-6">Authorization</a></li>
                <li><a href="#tabs-7">References</a></li>
                <li><a href="#tabs-8">Finalize</a></li>
                
              </ul>
<form action="<?php echo $editFormAction; ?>" method="POST" name="usrProf_form" id="usrProf_form">               
            

<div id="tabs-1">

		<span id="mybudgetTotalpayments"></span><br />
        <span id="mytotalAnnualIncome"></span>

</div>
           
<div id="tabs-2">
<table><tr>
  <td>		
         <table align="center">
           <tr valign="baseline">
             <td nowrap align="left">Wfhuser email address:</td>
             <td><input type="text" name="wfhuser_email_address" value="<?php echo htmlentities($row_userWfh['wfhuser_email_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Wfhuser username:</td>
             <td><input type="text" name="wfhuser_username" value="<?php echo htmlentities($row_userWfh['wfhuser_username'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Wfhuser password:</td>
             <td><input name="wfhuser_password" type="password" value="<?php echo $row_userWfh['wfhuser_password']; ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Joint or invidividual:</td>
             <td><p>
               <label>
                 <input <?php if (!(strcmp($row_userWfh['joint_or_invidividual'],"Individual"))) {echo "checked=\"checked\"";} ?> type="radio" name="joint_or_invidividual" value="0" id="joint_or_invidividual_0" />
                 Individual</label>
               <br />
               <label>
                 <input <?php if (!(strcmp($row_userWfh['joint_or_invidividual'],"Joint"))) {echo "checked=\"checked\"";} ?> type="radio" name="joint_or_invidividual" value="1" id="joint_or_invidividual_1" />
                 Joint</label>
               <br />
             </p></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant driver licenses number:</td>
             <td><input type="text" name="applicant_driver_licenses_number" value="<?php echo htmlentities($row_userWfh['applicant_driver_licenses_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant driver licenses status:</td>
             <td><input type="text" name="applicant_driver_licenses_status" value="<?php echo htmlentities($row_userWfh['applicant_driver_licenses_status'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant driver state issued:</td>
             <td><select name="applicant_driver_state_issued">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_driver_state_issued'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_driver_state_issued'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant ssn:</td>
             <td><input type="password" name="applicant_ssn" value="<?php echo $row_userWfh['applicant_ssn']; ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant ssn4:</td>
             <td><input type="text" name="applicant_ssn4" id="applicant_ssn4" value="<?php echo htmlentities($row_userWfh['applicant_ssn4'], ENT_COMPAT, ''); ?>"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant dob:</td>
             <td><input type="text" name="applicant_dob" value="<?php echo htmlentities($row_userWfh['applicant_dob'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant age:</td>
             <td><input type="text" name="applicant_age" value="<?php echo htmlentities($row_userWfh['applicant_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant name:</td>
             <td><input type="text" name="applicant_name" value="<?php echo htmlentities($row_userWfh['applicant_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant fname:</td>
             <td><input type="text" name="applicant_fname" value="<?php echo htmlentities($row_userWfh['applicant_fname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant mname:</td>
             <td><input type="text" name="applicant_mname" value="<?php echo htmlentities($row_userWfh['applicant_mname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant lname:</td>
             <td><input type="text" name="applicant_lname" value="<?php echo htmlentities($row_userWfh['applicant_lname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant other name:</td>
             <td><input type="text" name="applicant_other_name" value="<?php echo htmlentities($row_userWfh['applicant_other_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant maiden name:</td>
             <td><input type="text" name="applicant_maiden_name" value="<?php echo htmlentities($row_userWfh['applicant_maiden_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant main phone:</td>
             <td><input type="text" name="applicant_main_phone" value="<?php echo htmlentities($row_userWfh['applicant_main_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant cell phone:</td>
             <td><input type="text" name="applicant_cell_phone" value="<?php echo htmlentities($row_userWfh['applicant_cell_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
         </table>
</td><td>         
         <table>
           <tr valign="baseline">
             <td nowrap align="left">Applicant present address1:</td>
             <td><input type="text" name="applicant_present_address1" value="<?php echo htmlentities($row_userWfh['applicant_present_address1'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant present address2:</td>
             <td><input type="text" name="applicant_present_address2" value="<?php echo htmlentities($row_userWfh['applicant_present_address2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant present addr city:</td>
             <td><input type="text" name="applicant_present_addr_city" value="<?php echo htmlentities($row_userWfh['applicant_present_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant present addr state:</td>
             <td><select name="applicant_present_addr_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_present_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_present_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant present addr zip:</td>
             <td><input type="text" name="applicant_present_addr_zip" value="<?php echo htmlentities($row_userWfh['applicant_present_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant present addr county:</td>
             <td><input type="text" name="applicant_present_addr_county" value="<?php echo htmlentities($row_userWfh['applicant_present_addr_county'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant addr years:</td>
             <td><select name="applicant_addr_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_addr_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_addr_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant addr months:</td>
             <td><select name="applicant_addr_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_addr_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_addr_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant addr landlord mortg:</td>
             <td><input type="text" name="applicant_addr_landlord_mortg" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_mortg'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant addr landlord address:</td>
             <td><input type="text" name="applicant_addr_landlord_address" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant addr landlord city:</td>
             <td><input type="text" name="applicant_addr_landlord_city" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant addr landlord state:</td>
             <td><select name="applicant_addr_landlord_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_addr_landlord_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_addr_landlord_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant addr landlord zip:</td>
             <td><input type="text" name="applicant_addr_landlord_zip" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant addr landlord phone:</td>
             <td><input type="text" name="applicant_addr_landlord_phone" value="<?php echo htmlentities($row_userWfh['applicant_addr_landlord_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant name oncurrent lease:</td>
             <td><input type="text" name="applicant_name_oncurrent_lease" value="<?php echo htmlentities($row_userWfh['applicant_name_oncurrent_lease'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant apart or house:</td>
             <td valign="baseline"><table>
               <tr>
                 <td><input type="radio" name="applicant_apart_or_house" value="House" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_apart_or_house'], ENT_COMPAT, ''),"House"))) {echo "checked=\"checked\"";} ?>>
                   House</td>
               </tr>
               <tr>
                 <td><input type="radio" name="applicant_apart_or_house" value="Apartment" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_apart_or_house'], ENT_COMPAT, ''),"Apartment"))) {echo "checked=\"checked\"";} ?>>
                   Apartment</td>
               </tr>
             </table></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant buy own rent other:</td>
             <td><select name="applicant_buy_own_rent_other">
               <option value="Own" <?php if (!(strcmp("Own", htmlentities($row_userWfh['applicant_buy_own_rent_other'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Own</option>
               <option value="Rent" <?php if (!(strcmp("Rent", htmlentities($row_userWfh['applicant_buy_own_rent_other'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Rent</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant house payment:</td>
             <td><input type="text" name="applicant_house_payment" value="<?php echo htmlentities($row_userWfh['applicant_house_payment'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left" valign="top">User comments app notes:</td>
             <td><textarea name="user_comments_app_notes" cols="50" rows="5"><?php echo htmlentities($row_userWfh['user_comments_app_notes'], ENT_COMPAT, ''); ?></textarea></td>
           </tr>
           </table>
</td></tr></table>

</div>


		   <div id="tabs-3">
                    <table>
                        <tr>
                            <td>
                            <table>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous1 addr1:</td>
                                 <td><input type="text" name="applicant_previous1_addr1" value="<?php echo htmlentities($row_userWfh['applicant_previous1_addr1'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous1 addr2:</td>
                                 <td><input type="text" name="applicant_previous1_addr2" value="<?php echo htmlentities($row_userWfh['applicant_previous1_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous1 addr city:</td>
                                 <td><input type="text" name="applicant_previous1_addr_city" value="<?php echo htmlentities($row_userWfh['applicant_previous1_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous1 addr state:</td>
                                 <td><select name="applicant_previous1_addr_state">
                                   <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous1_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
                                   <?php
                    do {  
                    ?>
                                   <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_previous1_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                                   <?php
                    } while ($row_states = mysqli_fetch_assoc($states));
                      $rows = mysqli_num_rows($states);
                      if($rows > 0) {
                          mysqli_data_seek($states, 0);
                          $row_states = mysqli_fetch_assoc($states);
                      }
                    ?>
                                 </select></td>
                              <tr>
                              <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous1 addr zip:</td>
                                <td><input type="text" name="applicant_previous1_addr_zip" value="<?php echo htmlentities($row_userWfh['applicant_previous1_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous1 live years:</td>
                                 <td><select name="applicant_previous1_live_years">
                                   <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous1_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
                                   <?php
                    do {  
                    ?>
                                   <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_previous1_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
                                   <?php
                    } while ($row_timeYears = mysqli_fetch_assoc($timeYears));
                      $rows = mysqli_num_rows($timeYears);
                      if($rows > 0) {
                          mysqli_data_seek($timeYears, 0);
                          $row_timeYears = mysqli_fetch_assoc($timeYears);
                      }
                    ?>
                                 </select></td>
                              <tr>
                              <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous1 live months:</td>
                                 <td><select name="applicant_previous1_live_months">
                                   <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous1_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
                                   <?php
                    do {  
                    ?>
                                   <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_previous1_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
                                   <?php
                    } while ($row_timeYears = mysqli_fetch_assoc($timeYears));
                      $rows = mysqli_num_rows($timeYears);
                      if($rows > 0) {
                          mysqli_data_seek($timeYears, 0);
                          $row_timeYears = mysqli_fetch_assoc($timeYears);
                      }
                    ?>
                                </select></td>
                              <tr>
                              <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous1 landlord name:</td>
                                <td><input type="text" name="applicant_previous1_landlord_name" value="<?php echo htmlentities($row_userWfh['applicant_previous1_landlord_name'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous1 landlord phone:</td>
                                 <td><input type="text" name="applicant_previous1_landlord_phone" value="<?php echo htmlentities($row_userWfh['applicant_previous1_landlord_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous2 addr1:</td>
                                 <td><input type="text" name="applicant_previous2_addr1" value="<?php echo htmlentities($row_userWfh['applicant_previous2_addr1'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous2 addr2:</td>
                                 <td><input type="text" name="applicant_previous2_addr2" value="<?php echo htmlentities($row_userWfh['applicant_previous2_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous2 addr city:</td>
                                 <td><input type="text" name="applicant_previous2_addr_city" value="<?php echo htmlentities($row_userWfh['applicant_previous2_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous2 addr state:</td>
                                 <td><select name="applicant_previous2_addr_state">
                                   <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous2_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
                                   <?php
                    do {  
                    ?>
                                   <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_previous2_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                                   <?php
                    } while ($row_states = mysqli_fetch_assoc($states));
                      $rows = mysqli_num_rows($states);
                      if($rows > 0) {
                          mysqli_data_seek($states, 0);
                          $row_states = mysqli_fetch_assoc($states);
                      }
                    ?>
                                 </select></td>
                              <tr>
                              <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous2 addr zip:</td>
                                <td><input type="text" name="applicant_previous2_addr_zip" value="<?php echo htmlentities($row_userWfh['applicant_previous2_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous2 live years:</td>
                                 <td><select name="applicant_previous2_live_years">
                                   <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous2_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
                                   <?php
                    do {  
                    ?>
                                   <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_previous2_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
                                   <?php
                    } while ($row_timeYears = mysqli_fetch_assoc($timeYears));
                      $rows = mysqli_num_rows($timeYears);
                      if($rows > 0) {
                          mysqli_data_seek($timeYears, 0);
                          $row_timeYears = mysqli_fetch_assoc($timeYears);
                      }
                    ?>
                                 </select></td>
                              <tr>
                              <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous2 live months:</td>
                                 <td><select name="applicant_previous2_live_months">
                                   <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous2_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
                                   <?php
                    do {  
                    ?>
                                   <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_previous2_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
                                   <?php
                    } while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
                      $rows = mysqli_num_rows($timeMonths);
                      if($rows > 0) {
                          mysqli_data_seek($timeMonths, 0);
                          $row_timeMonths = mysqli_fetch_assoc($timeMonths);
                      }
                    ?>
                                </select></td>
                              <tr>
                              <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous2 landlord name:</td>
                                <td><input type="text" name="applicant_previous2_landlord_name" value="<?php echo htmlentities($row_userWfh['applicant_previous2_landlord_name'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous2 landlord phone:</td>
                                 <td><input type="text" name="applicant_previous2_landlord_phone" value="<?php echo htmlentities($row_userWfh['applicant_previous2_landlord_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                            </table>
                            
                          </td>
                            <td>
                            <table>
                                <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous3 addr1:</td>
                                 <td><input type="text" name="applicant_previous3_addr1" value="<?php echo htmlentities($row_userWfh['applicant_previous3_addr1'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous3 addr2:</td>
                                 <td><input type="text" name="applicant_previous3_addr2" value="<?php echo htmlentities($row_userWfh['applicant_previous3_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous3 addr city:</td>
                                 <td><input type="text" name="applicant_previous3_addr_city" value="<?php echo htmlentities($row_userWfh['applicant_previous3_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous3 addr state:</td>
                                 <td><select name="applicant_previous3_addr_state">
                                   <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous3_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
                                   <?php
                    do {  
                    ?>
                                   <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_previous3_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                                   <?php
                    } while ($row_states = mysqli_fetch_assoc($states));
                      $rows = mysqli_num_rows($states);
                      if($rows > 0) {
                          mysqli_data_seek($states, 0);
                          $row_states = mysqli_fetch_assoc($states);
                      }
                    ?>
                                 </select></td>
                              <tr>
                              <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous3 addr zip:</td>
                                <td><input type="text" name="applicant_previous3_addr_zip" value="<?php echo htmlentities($row_userWfh['applicant_previous3_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous3 live years:</td>
                                 <td><select name="applicant_previous3_live_years">
                                   <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous3_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
                                   <?php
                    do {  
                    ?>
                                   <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_previous3_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
                                   <?php
                    } while ($row_timeYears = mysqli_fetch_assoc($timeYears));
                      $rows = mysqli_num_rows($timeYears);
                      if($rows > 0) {
                          mysqli_data_seek($timeYears, 0);
                          $row_timeYears = mysqli_fetch_assoc($timeYears);
                      }
                    ?>
                                 </select></td>
                              <tr>
                              <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous3 live months:</td>
                                 <td><select name="applicant_previous3_live_months">
                                   <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_previous3_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
                                   <?php
                    do {  
                    ?>
                                   <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_previous3_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
                                   <?php
                    } while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
                      $rows = mysqli_num_rows($timeMonths);
                      if($rows > 0) {
                          mysqli_data_seek($timeMonths, 0);
                          $row_timeMonths = mysqli_fetch_assoc($timeMonths);
                      }
                    ?>
                                </select></td>
                              <tr>
                              <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous3 landlord name:</td>
                                <td><input type="text" name="applicant_previous3_landlord_name" value="<?php echo htmlentities($row_userWfh['applicant_previous3_landlord_name'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">Applicant previous3 landlord phone:</td>
                                 <td><input type="text" name="applicant_previous3_landlord_phone" value="<?php echo htmlentities($row_userWfh['applicant_previous3_landlord_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                               <tr valign="baseline">
                                 <td nowrap align="left">User comments previousaddr notes:</td>
                                 <td><input type="text" name="user_comments_previousaddr_notes" value="<?php echo htmlentities($row_userWfh['user_comments_previousaddr_notes'], ENT_COMPAT, ''); ?>" size="32"></td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                    </table>
           </div>
           
           <div id="tabs-4">
           
<table><tr>
  <td>		
	
    <table>           
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 name:</td>
             <td><input type="text" name="applicant_employer1_name" value="<?php echo htmlentities($row_userWfh['applicant_employer1_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 addr:</td>
             <td><input type="text" name="applicant_employer1_addr" value="<?php echo htmlentities($row_userWfh['applicant_employer1_addr'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 city:</td>
             <td><input type="text" name="applicant_employer1_city" value="<?php echo htmlentities($row_userWfh['applicant_employer1_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 state:</td>
             <td><select name="applicant_employer1_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer1_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_employer1_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 zip:</td>
             <td><input type="text" name="applicant_employer1_zip" value="<?php echo htmlentities($row_userWfh['applicant_employer1_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 phone:</td>
             <td><input type="text" name="applicant_employer1_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer1_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 phone ext:</td>
             <td><input type="text" name="applicant_employer1_phone_ext" value="<?php echo htmlentities($row_userWfh['applicant_employer1_phone_ext'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 work years:</td>
             <td><select name="applicant_employer1_work_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer1_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_employer1_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 work months:</td>
             <td><select name="applicant_employer1_work_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer1_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_employer1_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 position:</td>
             <td><input type="text" name="applicant_employer1_position" value="<?php echo htmlentities($row_userWfh['applicant_employer1_position'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 department:</td>
             <td><input type="text" name="applicant_employer1_department" value="<?php echo htmlentities($row_userWfh['applicant_employer1_department'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 supervisors name:</td>
             <td><input type="text" name="applicant_employer1_supervisors_name" value="<?php echo htmlentities($row_userWfh['applicant_employer1_supervisors_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 supervisors phone:</td>
             <td><input type="text" name="applicant_employer1_supervisors_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer1_supervisors_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 hours shift:</td>
             <td><input type="text" name="applicant_employer1_hours_shift" value="<?php echo htmlentities($row_userWfh['applicant_employer1_hours_shift'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 salary bringhome:</td>
             <td><input type="text" name="applicant_employer1_salary_bringhome" value="<?php echo htmlentities($row_userWfh['applicant_employer1_salary_bringhome'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer1 payday freq:</td>
             <td><select name="applicant_employer1_payday_freq">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer1_payday_freq'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select When?</option>
               <?php
do {  
?>
               <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], htmlentities($row_userWfh['applicant_employer1_payday_freq'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
               <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer form of pymt:</td>
             <td><input type="text" name="applicant_employer_form_of_pymt" value="<?php echo htmlentities($row_userWfh['applicant_employer_form_of_pymt'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant other income amount:</td>
             <td><input type="text" name="applicant_other_income_amount" value="<?php echo htmlentities($row_userWfh['applicant_other_income_amount'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant other income source:</td>
             <td><input type="text" name="applicant_other_income_source" value="<?php echo htmlentities($row_userWfh['applicant_other_income_source'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant other income when rcvd:</td>
             <td><select name="applicant_other_income_when_rcvd">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_other_income_when_rcvd'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select When?</option>
               <?php
do {  
?>
               <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], htmlentities($row_userWfh['applicant_other_income_when_rcvd'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
               <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant if education school sys:</td>
             <td><input type="text" name="applicant_if_education_school_sys" value="<?php echo htmlentities($row_userWfh['applicant_if_education_school_sys'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left" valign="top">User applicant employer notes:</td>
             <td><textarea name="user_applicant_employer_notes" cols="50" rows="5"><?php echo htmlentities($row_userWfh['user_applicant_employer_notes'], ENT_COMPAT, ''); ?></textarea></td>
           </tr>
           </table>
           
          </td><td>
           
           
          <table>
           <tr valign="baseline">

             <td nowrap align="left">Applicant employer2 name:</td>
             <td><input type="text" name="applicant_employer2_name" value="<?php echo htmlentities($row_userWfh['applicant_employer2_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 addr:</td>
             <td><input type="text" name="applicant_employer2_addr" value="<?php echo htmlentities($row_userWfh['applicant_employer2_addr'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 city:</td>
             <td><input type="text" name="applicant_employer2_city" value="<?php echo htmlentities($row_userWfh['applicant_employer2_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 state:</td>
             <td><select name="applicant_employer2_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer2_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_employer2_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 zip:</td>
             <td><input type="text" name="applicant_employer2_zip" value="<?php echo htmlentities($row_userWfh['applicant_employer2_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 phone:</td>
             <td><input type="text" name="applicant_employer2_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer2_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 phone ext:</td>
             <td><input type="text" name="applicant_employer2_phone_ext" value="<?php echo htmlentities($row_userWfh['applicant_employer2_phone_ext'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 work years:</td>
             <td><select name="applicant_employer2_work_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer2_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_employer2_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 work months:</td>
             <td><select name="applicant_employer2_work_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer2_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_employer2_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 position:</td>
             <td><input type="text" name="applicant_employer2_position" value="<?php echo htmlentities($row_userWfh['applicant_employer2_position'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 department:</td>
             <td><input type="text" name="applicant_employer2_department" value="<?php echo htmlentities($row_userWfh['applicant_employer2_department'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 supervisors name:</td>
             <td><input type="text" name="applicant_employer2_supervisors_name" value="<?php echo htmlentities($row_userWfh['applicant_employer2_supervisors_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 supervisors phone:</td>
             <td><input type="text" name="applicant_employer2_supervisors_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer2_supervisors_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 hours shift:</td>
             <td><input type="text" name="applicant_employer2_hours_shift" value="<?php echo htmlentities($row_userWfh['applicant_employer2_hours_shift'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 salary bringhome:</td>
             <td><input type="text" name="applicant_employer2_salary_bringhome" value="<?php echo htmlentities($row_userWfh['applicant_employer2_salary_bringhome'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 payday freq:</td>
             <td><select name="applicant_employer2_payday_freq">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer2_payday_freq'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select When?</option>
               <?php
do {  
?>
               <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], htmlentities($row_userWfh['applicant_employer2_payday_freq'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
               <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer2 form of pymt:</td>
             <td valign="baseline"><table>
               <tr>
                 <td><input type="radio" name="applicant_employer2_form_of_pymt" value="DirectDeposit" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_employer2_form_of_pymt'], ENT_COMPAT, ''),"DirectDeposit"))) {echo "checked=\"checked\"";} ?>>
                   Direct Depost</td>
               </tr>
             </table></td>
           </tr>

           <tr valign="baseline">
             <td nowrap align="left">Applicant employer3 name:</td>
             <td><input type="text" name="applicant_employer3_name" value="<?php echo htmlentities($row_userWfh['applicant_employer3_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer3 addr:</td>
             <td><input type="text" name="applicant_employer3_addr" value="<?php echo htmlentities($row_userWfh['applicant_employer3_addr'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer3 city:</td>
             <td><input type="text" name="applicant_employer3_city" value="<?php echo htmlentities($row_userWfh['applicant_employer3_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer3 state:</td>
             <td><select name="applicant_employer3_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer3_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicant_employer3_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer3 zip:</td>
             <td><input type="text" name="applicant_employer3_zip" value="<?php echo htmlentities($row_userWfh['applicant_employer3_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer3 phone:</td>
             <td><input type="text" name="applicant_employer3_phone" value="<?php echo htmlentities($row_userWfh['applicant_employer3_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer3 years:</td>
             <td><select name="applicant_employer3_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer3_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['applicant_employer3_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant employer3 months:</td>
             <td><select name="applicant_employer3_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicant_employer3_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['applicant_employer3_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php

} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">User comments employer notes:</td>
             <td><input type="text" name="user_comments_employer_notes" value="<?php echo htmlentities($row_userWfh['user_comments_employer_notes'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>

</table>

</td><tr></table>
           
</div>
           
           <div id="tabs-5">
<table><tr>
<td>		
           
           <table>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant name:</td>
             <td><input type="text" name="co_applicant_name" value="<?php echo htmlentities($row_userWfh['co_applicant_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant fname:</td>
             <td><input type="text" name="co_applicant_fname" value="<?php echo htmlentities($row_userWfh['co_applicant_fname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant mname:</td>
             <td><input type="text" name="co_applicant_mname" value="<?php echo htmlentities($row_userWfh['co_applicant_mname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant lname:</td>
             <td><input type="text" name="co_applicant_lname" value="<?php echo htmlentities($row_userWfh['co_applicant_lname'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant name relationship:</td>
             <td><select name="co_applicant_name_relationship">
               <option value="Mother" <?php if (!(strcmp("Mother", htmlentities($row_userWfh['co_applicant_name_relationship'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Mother</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant dob:</td>
             <td><input type="text" name="co_applicant_dob" value="<?php echo htmlentities($row_userWfh['co_applicant_dob'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant age:</td>
             <td><input type="text" name="co_applicant_age" value="<?php echo htmlentities($row_userWfh['co_applicant_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant ssn:</td>
             <td><input type="text" name="co_applicant_ssn" value="<?php echo htmlentities($row_userWfh['co_applicant_ssn'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant ssn4:</td>
             <td><input type="text" name="co_applicant_ssn4" value="<?php echo htmlentities($row_userWfh['co_applicant_ssn4'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant driver licenses no:</td>
             <td><input type="text" name="co_applicant_driver_licenses_no" value="<?php echo htmlentities($row_userWfh['co_applicant_driver_licenses_no'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant driver licenses state:</td>
             <td><select name="co_applicant_driver_licenses_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_driver_licenses_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['co_applicant_driver_licenses_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant driver licenses status:</td>
             <td><input type="text" name="co_applicant_driver_licenses_status" value="<?php echo htmlentities($row_userWfh['co_applicant_driver_licenses_status'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant home phone:</td>
             <td><input type="text" name="co_applicant_home_phone" value="<?php echo htmlentities($row_userWfh['co_applicant_home_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant home cell:</td>
             <td><input type="text" name="co_applicant_home_cell" value="<?php echo htmlentities($row_userWfh['co_applicant_home_cell'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant email:</td>
             <td><input type="text" name="co_applicant_email" value="<?php echo htmlentities($row_userWfh['co_applicant_email'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant present addr1:</td>
             <td><input type="text" name="co_applicant_present_addr1" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr1'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant present addr2:</td>
             <td><input type="text" name="co_applicant_present_addr2" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant present addr city:</td>
             <td><input type="text" name="co_applicant_present_addr_city" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant present addr state:</td>
             <td><select name="co_applicant_present_addr_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_present_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['co_applicant_present_addr_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant present addr zip:</td>
             <td><input type="text" name="co_applicant_present_addr_zip" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant home pymt:</td>
             <td><input type="text" name="co_applicant_home_pymt" value="<?php echo htmlentities($row_userWfh['co_applicant_home_pymt'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant present addr county:</td>
             <td><input type="text" name="co_applicant_present_addr_county" value="<?php echo htmlentities($row_userWfh['co_applicant_present_addr_county'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant present addr live years:</td>
             <td><select name="co_applicant_present_addr_live_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_present_addr_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeYears['year_value']?>"<?php if (!(strcmp($row_timeYears['year_value'], htmlentities($row_userWfh['co_applicant_present_addr_live_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeYears['year_name']?></option>
               <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant present addr live months:</td>
             <td><select name="co_applicant_present_addr_live_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_present_addr_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['co_applicant_present_addr_live_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           <tr>
           </table>
</td><td>
		<table>           
           
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer name:</td>
             <td><input type="text" name="co_applicant_employer_name" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer phone:</td>
             <td><input type="text" name="co_applicant_employer_phone" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer phone ext:</td>
             <td><input type="text" name="co_applicant_employer_phone_ext" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_phone_ext'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer addr:</td>
             <td><input type="text" name="co_applicant_employer_addr" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_addr'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer addr2:</td>
             <td><input type="text" name="co_applicant_employer_addr2" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_addr2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer city:</td>
             <td><input type="text" name="co_applicant_employer_city" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer state:</td>
             <td><select name="co_applicant_employer_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_employer_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['co_applicant_employer_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer zip:</td>
             <td><input type="text" name="co_applicant_employer_zip" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer department:</td>
             <td><input type="text" name="co_applicant_employer_department" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_department'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer postion:</td>
             <td><input type="text" name="co_applicant_employer_postion" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_postion'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer supervisor name:</td>
             <td><input type="text" name="co_applicant_employer_supervisor_name" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_supervisor_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer supervisor phone:</td>
             <td><input type="text" name="co_applicant_employer_supervisor_phone" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_supervisor_phone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer work years:</td>
             <td><select name="co_applicant_employer_work_years">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_employer_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Years</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['co_applicant_employer_work_years'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer work months:</td>
             <td><select name="co_applicant_employer_work_months">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_employer_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select Months</option>
               <?php
do {  
?>
               <option value="<?php echo $row_timeMonths['month_value']?>"<?php if (!(strcmp($row_timeMonths['month_value'], htmlentities($row_userWfh['co_applicant_employer_work_months'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_timeMonths['month_name']?></option>
               <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
             </select></td>
          </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer hours:</td>
             <td><input type="text" name="co_applicant_employer_hours" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_hours'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant employer shift:</td>
             <td><input type="text" name="co_applicant_employer_shift" value="<?php echo htmlentities($row_userWfh['co_applicant_employer_shift'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant income source:</td>
             <td><input type="text" name="co_applicant_income_source" value="<?php echo htmlentities($row_userWfh['co_applicant_income_source'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant other income:</td>
             <td><input type="text" name="co_applicant_other_income" value="<?php echo htmlentities($row_userWfh['co_applicant_other_income'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant income bringhome:</td>
             <td><input type="text" name="co_applicant_income_bringhome" value="<?php echo htmlentities($row_userWfh['co_applicant_income_bringhome'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant payday frequency:</td>
             <td><select name="co_applicant_payday_frequency">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['co_applicant_payday_frequency'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select When?</option>
               <?php
do {  
?>
               <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], htmlentities($row_userWfh['co_applicant_payday_frequency'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
               <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
             </select></td>
           <tr>
           </table>
</td><tr></table>           
           </div>
           
           <div id="tabs-6">
           <table>
           <tr valign="baseline">
             <td nowrap align="left">Applicant last vehicle purchased:</td>
             <td><input type="text" name="applicant_last_vehicle_purchased" value="<?php echo htmlentities($row_userWfh['applicant_last_vehicle_purchased'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants bank name:</td>
             <td><input type="text" name="applicants_bank_name" value="<?php echo htmlentities($row_userWfh['applicants_bank_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants checking savings acct#:</td>
             <td><input type="text" name="applicants_checking_savings_acct" value="<?php echo htmlentities($row_userWfh['applicants_checking_savings_acct#'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant initials disclosure1:</td>
             <td><input type="text" name="applicant_initials_disclosure1" value="<?php echo htmlentities($row_userWfh['applicant_initials_disclosure1'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Undersigned authorization:</td>
             <td><input type="text" name="undersigned_authorization" value="<?php echo htmlentities($row_userWfh['undersigned_authorization'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Federal equal act:</td>
             <td><input type="text" name="federal_equal_act" value="<?php echo htmlentities($row_userWfh['federal_equal_act'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant initials disclosure2:</td>
             <td><input type="text" name="applicant_initials_disclosure2" value="<?php echo htmlentities($row_userWfh['applicant_initials_disclosure2'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Information true statement:</td>
             <td><input type="text" name="information_true_statement" value="<?php echo htmlentities($row_userWfh['information_true_statement'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant signature:</td>
             <td><input type="text" name="applicant_signature" value="<?php echo htmlentities($row_userWfh['applicant_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Co applicant signature:</td>
             <td><input type="text" name="co_applicant_signature" value="<?php echo htmlentities($row_userWfh['co_applicant_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Salesperson witness signature:</td>
             <td><input type="text" name="salesperson_witness_signature" value="<?php echo htmlentities($row_userWfh['salesperson_witness_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant signed input date:</td>
             <td><input type="text" name="applicant_signed_input_date" value="<?php echo htmlentities($row_userWfh['applicant_signed_input_date'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Loan guarantor signature:</td>
             <td><input type="text" name="loan_guarantor_signature" value="<?php echo htmlentities($row_userWfh['loan_guarantor_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Credit app last modified:</td>
             <td><input type="text" name="credit_app_last_modified" value="<?php echo htmlentities($row_userWfh['credit_app_last_modified'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Application created date:</td>
             <td><input type="text" name="application_created_date" value="<?php echo htmlentities($row_userWfh['application_created_date'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           </table>
    </div>
           
           <div id="tabs-7">

           
<table><tr>
<td>		
         <table align="center">
           <tr valign="baseline">
             <td nowrap align="left">Applicants father name:</td>
             <td><input type="text" name="applicants_father_name" value="<?php echo htmlentities($row_userWfh['applicants_father_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants father deceased:</td>
             <td><input type="checkbox" name="applicants_father_deceased" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicants_father_deceased'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants father mainphone number:</td>
             <td><input type="text" name="applicants_father_mainphone_number" value="<?php echo htmlentities($row_userWfh['applicants_father_mainphone_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants father address:</td>
             <td><input type="text" name="applicants_father_address" value="<?php echo htmlentities($row_userWfh['applicants_father_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants mother name:</td>
             <td><input type="text" name="applicants_mother_name" value="<?php echo htmlentities($row_userWfh['applicants_mother_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants mother deceased:</td>
             <td><input type="checkbox" name="applicants_mother_deceased" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicants_mother_deceased'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants mother mainphone number:</td>
             <td><input type="text" name="applicants_mother_mainphone_number" value="<?php echo htmlentities($row_userWfh['applicants_mother_mainphone_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants mother address:</td>
             <td><input type="text" name="applicants_mother_address" value="<?php echo htmlentities($row_userWfh['applicants_mother_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative1 name:</td>
             <td><input type="text" name="applicants_realative1_name" value="<?php echo htmlentities($row_userWfh['applicants_realative1_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative1 relationship:</td>
             <td><input type="text" name="applicants_realative1_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative1_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative1 mainphone:</td>
             <td><input type="text" name="applicants_realative1_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative1_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative1 address:</td>
             <td><input type="text" name="applicants_realative1_address" value="<?php echo htmlentities($row_userWfh['applicants_realative1_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative1 address city:</td>
             <td><input type="text" name="applicants_realative1_address_city" value="<?php echo htmlentities($row_userWfh['applicants_realative1_address_city'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative1 address state:</td>
             <td><select name="applicants_realative1_address_state">
               <option value="" <?php if (!(strcmp("", htmlentities($row_userWfh['applicants_realative1_address_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Select State</option>
               <?php
do {  
?>
               <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], htmlentities($row_userWfh['applicants_realative1_address_state'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
               <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
             </select></td>
           <tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative1 address zip:</td>
             <td><input type="text" name="applicants_realative1_address_zip" value="<?php echo htmlentities($row_userWfh['applicants_realative1_address_zip'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative2 name:</td>
             <td><input type="text" name="applicants_realative2_name" value="<?php echo htmlentities($row_userWfh['applicants_realative2_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative2 relationship:</td>
             <td><input type="text" name="applicants_realative2_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative2_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative2 mainphone:</td>
             <td><input type="text" name="applicants_realative2_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative2_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative2 address:</td>
             <td><input type="text" name="applicants_realative2_address" value="<?php echo htmlentities($row_userWfh['applicants_realative2_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative3 name:</td>
             <td><input type="text" name="applicants_realative3_name" value="<?php echo htmlentities($row_userWfh['applicants_realative3_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative3 relationship:</td>
             <td><input type="text" name="applicants_realative3_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative3_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative3 mainphone:</td>
             <td><input type="text" name="applicants_realative3_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative3_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative3 address:</td>
             <td><input type="text" name="applicants_realative3_address" value="<?php echo htmlentities($row_userWfh['applicants_realative3_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative4 name:</td>
             <td><input type="text" name="applicants_realative4_name" value="<?php echo htmlentities($row_userWfh['applicants_realative4_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative4 relationship:</td>
             <td><input type="text" name="applicants_realative4_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative4_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative4 mainphone number:</td>
             <td><input type="text" name="applicants_realative4_mainphone_number" value="<?php echo htmlentities($row_userWfh['applicants_realative4_mainphone_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative4 address:</td>
             <td><input type="text" name="applicants_realative4_address" value="<?php echo htmlentities($row_userWfh['applicants_realative4_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           </table>

</td><td>
           
      <table>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative5 name:</td>
             <td><input type="text" name="applicants_realative5_name" value="<?php echo htmlentities($row_userWfh['applicants_realative5_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative5 relationship:</td>
             <td><input type="text" name="applicants_realative5_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative5_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative5 mainphone number:</td>
             <td><input type="text" name="applicants_realative5_mainphone_number" value="<?php echo htmlentities($row_userWfh['applicants_realative5_mainphone_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative5 address:</td>
             <td><input type="text" name="applicants_realative5_address" value="<?php echo htmlentities($row_userWfh['applicants_realative5_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative6 name:</td>
             <td><input type="text" name="applicants_realative6_name" value="<?php echo htmlentities($row_userWfh['applicants_realative6_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative6 mainphone:</td>
             <td><input type="text" name="applicants_realative6_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative6_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative6 address:</td>
             <td><input type="text" name="applicants_realative6_address" value="<?php echo htmlentities($row_userWfh['applicants_realative6_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>           
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative7 name:</td>
             <td><input type="text" name="applicants_realative7_name" value="<?php echo htmlentities($row_userWfh['applicants_realative7_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative7 relationship:</td>
             <td><input type="text" name="applicants_realative7_relationship" value="<?php echo htmlentities($row_userWfh['applicants_realative7_relationship'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative7 mainphone:</td>
             <td><input type="text" name="applicants_realative7_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative7_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative7 address:</td>
             <td><input type="text" name="applicants_realative7_address" value="<?php echo htmlentities($row_userWfh['applicants_realative7_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative8 name:</td>
             <td><input type="text" name="applicants_realative8_name" value="<?php echo htmlentities($row_userWfh['applicants_realative8_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative8 mainphone:</td>
             <td><input type="text" name="applicants_realative8_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative8_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative8 address:</td>
             <td><input type="text" name="applicants_realative8_address" value="<?php echo htmlentities($row_userWfh['applicants_realative8_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative9 name:</td>
             <td><input type="text" name="applicants_realative9_name" value="<?php echo htmlentities($row_userWfh['applicants_realative9_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative9 mainphone:</td>
             <td><input type="text" name="applicants_realative9_mainphone" value="<?php echo htmlentities($row_userWfh['applicants_realative9_mainphone'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative9 address:</td>
             <td><input type="text" name="applicants_realative9_address" value="<?php echo htmlentities($row_userWfh['applicants_realative9_address'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants realative comments:</td>
             <td><input type="text" name="applicants_realative_comments" value="<?php echo htmlentities($row_userWfh['applicants_realative_comments'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           </table>
           </td>
         </tr>
      </table>
</div>
           
           <div id="tabs-8">
           <table>
           <tr valign="baseline">
             <td nowrap align="left">Applicants reposession:</td>
             <td><input type="checkbox" name="applicants_reposession" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicants_reposession'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants reposession when:</td>
             <td><input type="text" name="applicants_reposession_when" value="<?php echo htmlentities($row_userWfh['applicants_reposession_when'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants reposession where:</td>
             <td><input type="text" name="applicants_reposession_where" value="<?php echo htmlentities($row_userWfh['applicants_reposession_where'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants dependents many:</td>
             <td><select name="applicants_dependents_many">
               <option value="1" <?php if (!(strcmp(1, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>One</option>
               <option value="2" <?php if (!(strcmp(2, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Two</option>
               <option value="3" <?php if (!(strcmp(3, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Three</option>
               <option value="4" <?php if (!(strcmp(4, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Four</option>
               <option value="5" <?php if (!(strcmp(5, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Five</option>
               <option value="6" <?php if (!(strcmp(6, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Six</option>
               <option value="7" <?php if (!(strcmp(7, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Seven</option>
               <option value="8" <?php if (!(strcmp(8, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Eight</option>
               <option value="9" <?php if (!(strcmp(9, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Nine</option>
               <option value="10" <?php if (!(strcmp(10, htmlentities($row_userWfh['applicants_dependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Ten</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants dependents1 name:</td>
             <td><input type="text" name="applicants_dependents1_name" value="<?php echo htmlentities($row_userWfh['applicants_dependents1_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants dependents1 age:</td>
             <td><input type="text" name="applicants_dependents1_age" value="<?php echo htmlentities($row_userWfh['applicants_dependents1_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants dependents1 grade:</td>
             <td><input type="text" name="applicants_dependents1_grade" value="<?php echo htmlentities($row_userWfh['applicants_dependents1_grade'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants dependents1 school name location:</td>
             <td><input type="text" name="applicants_dependents1_school_name_location" value="<?php echo htmlentities($row_userWfh['applicants_dependents1_school_name_location'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants dependents2 name:</td>
             <td><input type="text" name="applicants_dependents2_name" value="<?php echo htmlentities($row_userWfh['applicants_dependents2_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants dependents2 age:</td>
             <td><input type="text" name="applicants_dependents2_age" value="<?php echo htmlentities($row_userWfh['applicants_dependents2_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants dependents2 grade:</td>
             <td><input type="text" name="applicants_dependents2_grade" value="<?php echo htmlentities($row_userWfh['applicants_dependents2_grade'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants dependents2 school name location:</td>
             <td><input type="text" name="applicants_dependents2_school_name_location" value="<?php echo htmlentities($row_userWfh['applicants_dependents2_school_name_location'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants nondependents many:</td>
             <td><select name="applicants_nondependents_many">
               <option value="1" <?php if (!(strcmp(1, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>One</option>
               <option value="2" <?php if (!(strcmp(2, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Two</option>
               <option value="3" <?php if (!(strcmp(3, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Three</option>
               <option value="4" <?php if (!(strcmp(4, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Four</option>
               <option value="5" <?php if (!(strcmp(5, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Five</option>
               <option value="6" <?php if (!(strcmp(6, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Six</option>
               <option value="7" <?php if (!(strcmp(7, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Seven</option>
               <option value="8" <?php if (!(strcmp(8, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Eight</option>
               <option value="9" <?php if (!(strcmp(9, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Nine</option>
               <option value="10" <?php if (!(strcmp(10, htmlentities($row_userWfh['applicants_nondependents_many'], ENT_COMPAT, '')))) {echo "selected=\"selected\"";} ?>>Ten</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants nondependents1 name:</td>
             <td><input type="text" name="applicants_nondependents1_name" value="<?php echo htmlentities($row_userWfh['applicants_nondependents1_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants nondependents1 age:</td>
             <td><input type="text" name="applicants_nondependents1_age" value="<?php echo htmlentities($row_userWfh['applicants_nondependents1_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants nondependents1 cell number:</td>
             <td><input type="text" name="applicants_nondependents1_cell_number" value="<?php echo htmlentities($row_userWfh['applicants_nondependents1_cell_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants nondependents2 name:</td>
             <td><input type="text" name="applicants_nondependents2_name" value="<?php echo htmlentities($row_userWfh['applicants_nondependents2_name'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants nondependents2 age:</td>
             <td><input type="text" name="applicants_nondependents2_age" value="<?php echo htmlentities($row_userWfh['applicants_nondependents2_age'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicants nondependents2 cell number:</td>
             <td><input type="text" name="applicants_nondependents2_cell_number" value="<?php echo htmlentities($row_userWfh['applicants_nondependents2_cell_number'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant have a computer:</td>
             <td valign="baseline"><table>
               <tr>
                 <td><input type="radio" name="applicant_have_a_computer" value="Y" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_have_a_computer'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>>
                   Yes</td>
               </tr>
               <tr>
                 <td><input type="radio" name="applicant_have_a_computer" value="N" <?php if (!(strcmp(htmlentities($row_userWfh['applicant_have_a_computer'], ENT_COMPAT, ''),"N"))) {echo "checked=\"checked\"";} ?>>
                   No</td>
               </tr>
             </table></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant level of cpu experience:</td>
             <td><select name="applicant_level_of_cpu_experience">
               <option value="1" <?php if (!(strcmp(1, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>1</option>
               <option value="2" <?php if (!(strcmp(2, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>2</option>
               <option value="2" <?php if (!(strcmp(2, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>3</option>
               <option value="4" <?php if (!(strcmp(4, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>4</option>
               <option value="5" <?php if (!(strcmp(5, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>5</option>
               <option value="6" <?php if (!(strcmp(6, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>6</option>
               <option value="7" <?php if (!(strcmp(7, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>7</option>
               <option value="8" <?php if (!(strcmp(8, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>8</option>
               <option value="9" <?php if (!(strcmp(9, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>9</option>
               <option value="10" <?php if (!(strcmp(10, htmlentities($row_userWfh['applicant_level_of_cpu_experience'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>10</option>
             </select></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant acknowledge equal opportunity:</td>
             <td><input type="text" name="applicant_acknowledge_equal_opportunity" value="<?php echo htmlentities($row_userWfh['applicant_acknowledge_equal_opportunity'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant hereby authorize:</td>
             <td><input type="checkbox" name="applicant_hereby_authorize" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicant_hereby_authorize'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Equal credit opportunity act:</td>
             <td><input type="checkbox" name="equal_credit_opportunity_act" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['equal_credit_opportunity_act'], ENT_COMPAT, ''),""))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant authorization:</td>
             <td><input type="checkbox" name="applicant_authorization" value=""  <?php if (!(strcmp(htmlentities($row_userWfh['applicant_authorization'], ENT_COMPAT, ''),"Y"))) {echo "checked=\"checked\"";} ?>></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant authorization text:</td>
             <td><input type="text" name="applicant_authorization_text" value="<?php echo htmlentities($row_userWfh['applicant_authorization_text'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant digital signature:</td>
             <td><input type="text" name="applicant_digital_signature" value="<?php echo htmlentities($row_userWfh['applicant_digital_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Applicant digital signature date:</td>
             <td><input type="text" name="applicant_digital_signature_date" value="<?php echo htmlentities($row_userWfh['applicant_digital_signature_date'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Coapplicant digital signature:</td>
             <td><input type="text" name="coapplicant_digital_signature" value="<?php echo htmlentities($row_userWfh['coapplicant_digital_signature'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">Coapplicant digital signature date:</td>
             <td><input type="text" name="coapplicant_digital_signature_date" value="<?php echo htmlentities($row_userWfh['coapplicant_digital_signature_date'], ENT_COMPAT, ''); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="left">&nbsp;</td>
             <td><input type="submit" value="Update record"></td>
           </tr>
         </table>
    </div>
         
         
         
         
         
         
         <input type="hidden" name="wfhuser_primary_did" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_did'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_primary_sid" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_sid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_primary_vid" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_vid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_primary_cid" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_cid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_primary_clid" value="<?php echo htmlentities($row_userWfh['wfhuser_primary_clid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_tokenid" value="<?php echo htmlentities($row_userWfh['wfhuser_tokenid'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="credit_app_type" value="<?php echo htmlentities($row_userWfh['credit_app_type'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="credit_app_source" value="<?php echo htmlentities($row_userWfh['credit_app_source'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="applicant_sales_souce_lot" value="<?php echo htmlentities($row_userWfh['applicant_sales_souce_lot'], ENT_COMPAT, ''); ?>">
         <input type="hidden" name="wfhuser_id" value="<?php echo $row_userWfh['wfhuser_id']; ?>">
         <input type="hidden" name="MM_update" value="usrProf_form">




</form>

</div>





				
            
            
            


</body>
</html>