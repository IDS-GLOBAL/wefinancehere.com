<?php require_once('../Connections/idsconnection.php'); ?>
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

$colname_slctVehicle = "-1";
if (isset($_GET['v'])) {
  $colname_slctVehicle = $_GET['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctVehicle =  "SELECT * FROM vehicles WHERE vid = %s", GetSQLValueString($colname_slctVehicle, "int"));
$slctVehicle = mysqli_query($idsconnection_mysqli, $query_slctVehicle);
$row_slctVehicle = mysqli_fetch_assoc($slctVehicle);
$totalRows_slctVehicle = mysqli_num_rows($slctVehicle);
$vid=$row_slctVehicle['vid'];
$did=$row_slctVehicle['did'];
$vstockno=$row_slctVehicle['vstockno'];
$vcondition=$row_slctVehicle['vcondition'];
$vvin=$row_slctVehicle['vvin'];
$vyear=$row_slctVehicle['vyear'];
$vmake=$row_slctVehicle['vmake'];
$vmodel=$row_slctVehicle['vmodel'];
$vtrim=$row_slctVehicle['vtrim'];
$vmileage=$row_slctVehicle['vmileage'];
$fromsource = 'WeFinanceHere.com';

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctDlr = "SELECT * FROM dealers WHERE id = '$did'";
$slctDlr = mysqli_query($idsconnection_mysqli, $query_slctDlr);
$row_slctDlr = mysqli_fetch_assoc($slctDlr);
$totalRows_slctDlr = mysqli_num_rows($slctDlr);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeMonths = "SELECT * FROM months_options";
$timeMonths = mysqli_query($idsconnection_mysqli, $query_timeMonths);
$row_timeMonths = mysqli_fetch_assoc($timeMonths);
$totalRows_timeMonths = mysqli_num_rows($timeMonths);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeYears = "SELECT * FROM year_options";
$timeYears = mysqli_query($idsconnection_mysqli, $query_timeYears);
$row_timeYears = mysqli_fetch_assoc($timeYears);
$totalRows_timeYears = mysqli_num_rows($timeYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_autoYears = "SELECT * FROM auto_years";
$autoYears = mysqli_query($idsconnection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);





?>
<?php

/*
This iwas a script I'm saving for later coverage it goes under calc.js
<script>
var _tsCheck = _tsCheck || [];
(function () {
	_tsCheck = {
		tries: 0,
		maxtries: 10,
		retryafter: 1000,
		ready: function (f) {
			var seproFile = this;
			if (typeof _ts.track == 'function') {
				return f()
			} else {
				if (this.tries++<=this.maxtries) {
					window.setTimeout(function () { seproFile.ready(f) },this.retryafter)
				} else {
					return false
				}
			}
		},
		elementReady: function (elementid,f) {
			var seproFile = this;
			var element =  document.getElementById(elementid);
			if (typeof(element) != 'undefined' && element != null) {
				return f()
			} else {
				if (this.tries++<=this.maxtries) {
					window.setTimeout(function () { seproFile.elementReady(elementid,f) },this.retryafter)
				} else {
					return false
				}
			}
		}
	}
})();
</script>	

*/


$vrprice = $row_slctVehicle['vrprice'];

$docFee = $row_slctDlr['settingDocDlvryFee'];
$titleFee = $row_slctDlr['settingTitleFee'];
$stateFee = $row_slctDlr['settingStateInspectnFee'];

$fees = ($docFee + $titleFee + $stateFee);
$tax = $row_slctDlr['settingSateSlsTax'];

$total = ($fees * $tax);

$sellingPrice = ($vrprice + $total);


        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Deal Matrix</title>
	<meta http-equiv="description" content="Funding Way car loans are for people seeking bad credit, no credit, bankruptcy loans. Get bad credit used car loans or truck financing online. Finding auto loans online for financing a used car with no credit is not a problem with our many finance options." />
	<meta http-equiv="keywords" content="used car, loans, bad credit, online, auto loan, bankruptcy, buy a car, financing" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	
	<!-- link rel="stylesheet" type="text/css" href="http://www.fundingway.com/images/css/master.css" / -->
   	<link rel="stylesheet" type="text/css" href="css/creditprofile.css" />

<script language="JavaScript" src="js/calc.js"></script>

<script language="JavaScript" src="js/showpay.js"></script>


</head>

<body>

<div class="page home">
	<div class="pgtop">
		<span>Helping People with Bad Credit Get an Auto Loan Online to Buy a Used Car</span>
	</div>
	<div class="pgmid clearfix" >

		<div class="nav clearfix">
		  <a href="#" class="nhome on">Home</a>
		  <a href="#" class="nfaq">FAQ</a>
		  <a href="#" class="ntest">Testimonials</a>
		  <a href="#" class="nres">Resources</a>
		  <a href="#" class="napp">Apply</a>
		  <a href="#" class="nstatus">Loan Status</a>
		  <a href="#" class="nesp" style="float:right;">Espanol</a>
		  <a href="#" class="ncnt" style="float:right;">Contact</a>
		</div><!-- Start Quantcast Tag -->


<!-- End Quantcast tag -->

<div id="proFile">
	<div class="left proFileLeft">
		<div class="vehicleGallery">
        
			<div class="proFileLogo">
				<a href="">
					<img src="images/FWlogoMain.png" alt="" />
				</a>
			</div><!--proFileLogo-->
            
			<div class="proFileIntro">
				<div class="header1">
					<h1>                            
							<?php echo $row_slctVehicle['vyear']; ?> 
                            <?php echo $row_slctVehicle['vmake']; ?> 
                            <?php echo $row_slctVehicle['vmodel']; ?> 
                            <?php echo $row_slctVehicle['vtrim']; ?> 
                            <?php echo '$'.$row_slctVehicle['vrprice']; ?>
							<?php echo $row_slctVehicle['vspecialprice']; ?>
					</h1>
				</div><!--header1-->
                
				<div class="proFileDesc">
					FundingWay.com is the USA's leading online provider of automobile purchase loans for people with poor credit, no credit,
					or bankruptcy. When it comes to purchasing a preowned car or truck with a problem credit history, you simply can't find
					a more convenient website that offers vehicle loans online nationwide at the lowest possible auto loan rates.
				</div><!--proFileDesc-->
				<div class="header2">
					Automotive financing hassle free!
				</div><!--header2-->
                
				<div class="proFileDesc">
					<div class="proFileBullets">
						<ul>
							<li>93% of all Car Loans are Approved</li>
							<li>Fast Email Responses</li>
							<li>Zero Auto Loan Application Fees</li>
						</ul>
					</div><!--proFileBullets-->
				</div><!--proFileDesc-->
				<div class="hot1"></div>
				<div style="display:none;">
				  <img src="#" rel="noindex,nofollow" height="1" width="1" border="0" alt="" />				</div>
				<div class="loanqualifyME">
				  <a href="#"></a>
				</div><!--loanqualifyME-->
		  </div><!--proFileIntro-->
		</div><!--vehicleGallery-->
		<div class="proFileLargeBlueBar">
			Qualify for up to $45,000 in 30 seconds before you apply
		</div><!--proFileLargeBlueBar-->
		<div align="left">
			<div id="proFileCalc">

			  <a name="home_qualify"></a>
				<div class="proFileCalcBox">
                
                
	  <form action="scriptDealMatrix.php" name="FormDealMatrix" style="margin:0; padding:0;">



<table width="100%">
	<tr>
    	<td>

                        <div class="goOne">
							<div class="formheader1">
								Select a Credit Profile
							</div><!--formheader1-->
							<a class="credit1">
								<div class="goodCredit">
									<input name="Credit" type="radio" onclick="dealMatrixChanged(this.form)" value="<?php echo $row_slctDlr['newmatrixcredit_vgoodcredit']; ?>" width="115"  <?php if (!(strcmp($row_slctDlr['newmatrixcredit_vgoodcredit'],"undefined"))) {echo "checked=\"checked\"";} ?> />
					</div>
								<div class="right">
									Very Good <b>(720 - 850)</b>
								</div>
							</a><!--credit1-->
							<a class="credit1">
								<div class="goodCredit">
									<input <?php if (!(strcmp($row_slctDlr['newmatrixcredit_jgoodcredit'],""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $row_slctDlr['newmatrixcredit_jgoodcredit']; ?>"  onclick="dealMatrixChanged(this.form)"/>
						</div>
								<div class="right">
									Good <b>(675 - 719)</b>
								</div>
							</a><!--credit1-->
							<a class="credit1">
								<div class="goodCredit">
									<input <?php if (!(strcmp($row_slctDlr['newmatrixcredit_faircredit'],""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $row_slctDlr['newmatrixcredit_faircredit']; ?>"  onclick="dealMatrixChanged(this.form)"/>
						</div>
								<div class="right">
									Fair <b>(621 - 674)</b>
								</div>
							</a><!--credit1-->
							<a class="credit1">
								<div class="goodCredit">
									<input name="Credit" type="radio"  onclick="dealMatrixChanged(this.form)" value="<?php echo $row_slctDlr['newmatrixcredit_poorcredit']; ?>" <?php if (!(strcmp($row_slctDlr['newmatrixcredit_poorcredit'],""))) {echo "checked=\"checked\"";} ?>/>
					</div>
								<div class="right">
									Poor <b>(575 - 620)</b>
								</div>
							</a>
							<a class="credit1">
								<div class="goodCredit">
									<input <?php if (!(strcmp($row_slctDlr['newmatrixcredit_subprime'],""))) {echo "checked=\"checked\"";} ?> type="radio" name="Credit" value="<?php echo $row_slctDlr['newmatrixcredit_subprime']; ?>"  onclick="dealMatrixChanged(this.form)"/>
						</div>
								<div class="right">
									Really Bad <b>(Below - 575)</b>
								</div>
							</a>
							<a class="credit1">
								<div class="goodCredit">
									<input name="Credit" type="radio"  onclick="popOutThisOffer('af1401','','pg~','homepage','prequalifier-dont_know_score');" value="<?php echo $row_slctDlr['newmatrixcredit_unknown']; ?>" <?php if (!(strcmp($row_slctDlr['newmatrixcredit_unknown'],""))) {echo "checked=\"checked\"";} ?>/>
					</div>
								<div class="right">
									<span>Not Sure or None (0 - ?)</span>
								</div>
							</a>
							<div class="hot10">&nbsp;</div>
							<i>
								<center>
									<a class="onClick" onClick="popOutCreditOffer('affilatelink','','pg~','homepage','prequalifier-dont_know_score');">Log In:</a>
								</center>
							</i>
                            
                            
                            
                            <!--p>
                            <?php echo $row_slctVehicle['vid']; ?> 
<?php echo $row_slctVehicle['vyear']; ?> <?php echo $row_slctVehicle['vmake']; ?> <?php echo $row_slctVehicle['vmodel']; ?> <?php echo $row_slctVehicle['vtrim']; ?> 
                            <?php echo $row_slctVehicle['vrprice']; ?>
							<?php echo $row_slctVehicle['vspecialprice']; ?>
                              <br />
                            </p -->
                        </div><!--goOne-->




                        
						<div class="goTwo">
							<div class="formheader1">
								Enter a Monthly Income
							</div><!--formheader1-->
							<div class="goPad">
								<span class="dollarSign">$</span>&nbsp;
                   <input id="income" name="income" onchange="IncomeChanged(this.form)"  style="width:115px;" /><br />
                   <!--  oninput="IncomeChanged(this.form)" -->
								<div class="goDesc">
									Enter your gross income amount. Gross is before taxes are deducted.
								</div><!--goDesc-->
							</div>
                    
                  <div class="proFileCalcAmount">
                   <h2>Purchase Power </h2>
                   <div id="chosenloancell">
						<img src="images/loading-gif-animation.gif" width="45" />
					</div>
				</div>
                            
						</div><!--goTwo-->




                        
						<div class="goThree">
							<div class="formheader2">
								Enter Monthly<br />Recurring Debts
							</div><!--formheader2-->
							<div class="debt1">
								<span class="label">Your Rent or Mortgage</span><br />
								<span class="dollarSign">$</span>&nbsp;<input name="RentOrMortgage" id="RentOrMortgage" onchange="IncomeChanged(this.form)" style="width:115px;" />
							</div>
							<div class="debt2">
								<span class="label">Minimum Card Payments</span><br />
								<span class="dollarSign">$</span>&nbsp;<input name="CreditCardPayments" id="CreditCardPayments" onchange="IncomeChanged(this.form)" style="width:115px;" />
							</div>
							<div class="debt3">
								<span class="label">Deductions or Garnishments</span><br />
								<span class="dollarSign">$</span>&nbsp;<input name="GarnishDeductions" id="GarnishDeductions" onchange="IncomeChanged(this.form)" style="width:115px;" />
							</div>
							<div class="debt4">
								<span class="label">All Loan Payments</span><br />
								<span class="dollarSign">$</span>&nbsp;<input name="Deductions" id="Deductions" onchange="IncomeChanged(this.form)" style="width:115px;" />
							</div>
							<div class="goDesc2">
								Don't include utility bills, or current vehicle payment if trading.
							</div><!--goDesc-->
						</div><!--goThree-->
       </td>
	</tr>
</table>

<br />


<div id="bxfCalc" align="left">
<br />

<table width="100%" border="1">
	<tr>
    	<td valign="top">
        			<div class="goOne1">
							<div class="formheader1">
								Primary Information: 
						  </div><!--formheader1-->
                            
							<div class="goPad">
                            
                            
                              <table>
                                <tr>
                                  <td>
                                 <label class="smtext">
									Title: <select name="titleName">
                                              <option value="">Select</option>
                                              <option value="Mr.">Mr.</option>
                                              <option value="Mrs.">Mrs.</option>
                                              <option value="Ms.">Ms.</option>
                                              <option value="Miss.">Miss.</option>
                                              <option value="Dr.">Dr.</option>
										    </select>
                                 </label>
                                    
                                 <input name="mytoken" type="hidden" id="mytoken" value="<?php echo $tkey; ?>" />
                                 <input name="fromsource" type="hidden" id="fromsource" value="<?php echo $fromsource; ?>" />
                                 
                                 <input name="vid" type="hidden" id="vid" value="<?php echo $vid; ?>" />
                              <input name="did" type="hidden" id="did" value="<?php echo $did; ?>" />
                              <input name="vvin" type="hidden" id="vvin" value="<?php echo $vvin; ?>" />
                              <input name="vstockno" type="hidden" id="vstockno" value="<?php echo $vstockno; ?>" />
                              <input name="vcondition" type="hidden" id="vcondition" value="<?php echo $vcondition; ?>" />
                              <input name="vyear" type="hidden" id="vyear" value="<?php echo $vyear; ?>" />
<input name="vmake" type="hidden" id="vmake" value="<?php echo $vmake; ?>" />
                              <input name="vmodel" type="hidden" id="vmodel" value="<?php echo $vmodel; ?>" />
                              <input name="vtrim" type="hidden" id="vtrim" value="<?php echo $vtrim; ?>" />
                              <input name="vmileage" type="hidden" id="vmileage" value="<?php echo $vmileage; ?>" />
                                  </td>
                                  <td><label>
                                    <input name="joint_or_invidividual" type="radio" id="joint_or_invidividual_0" value="Individual" checked="checked" />
                                  Individual</label></td>
 
                                  <td><label>
                                    <input type="radio" name="joint_or_invidividual" value="Joint" id="joint_or_invidividual_1" onclick="showjoint()" />
                                    Joint</label></td>
                                </tr>
                              </table>
                            <br />

								<label>First Name:<input name="FirstName" id="FirstName" size="22" /></label><br />

                        <label>Last Name:<input name="LastName" id="LastName" size="22"  /></label><br />
                        
                        
                        <label>Suffix: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="Suffix" class="ui-state-default ui-state-hover" id="Suffix">
								          <option value="" selected="selected">Select</option>
								          <option value="JR">JR</option>
								          <option value="SR">SR</option>
								          <option value="I">I</option>
								          <option value="II">II</option>
								          <option value="III">III</option>
								          <option value="IV">IV</option>
								          <option value="V">V</option>
						              </select></label><br />

                        
                        <label>Email: <input name="Email" id="Email" size="27"  /></label><br />

                        <label>Phone:<input name="Phone" id="Phone" size="12"  /></label> 
                        
                        <label>Zip: <input name="Zip" id="Zip" size="4" /></label><br />
                        
                        <label>Street Address: &nbsp;<input name="Address1" id="Address1" size="18"  /></label><br />

                        <label>Street Address2:<input name="Address2" id="Address2" size="18"  /></label><br />

                        <label>City: <input name="City" id="City" size="6" /></label>

                        <label>State:<select name="State" id="State">
                          <option value="">Select State</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                          <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                        </select></label>
                        <br />
                        

                        <label>County:<input name="County" id="County" size="15"  /></label>

                        <p>
                        <label>Rent/Own:<select name="applicant_buy_own_rent_other">
                 <option value="">Select Living Type</option>
            <option value="Owns Home Outright">Owns Home Outright</option>
            <option value="Buying Home">Buying Home</option>
            <option value="Renting/Leasing">Renting/Leasing</option>
            <option value="Living w/ Relatives">Living w/ Relatives</option>
            <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
            <option value="Unknown">Unknown</option>
          </select></label><br />
						</p>                        
                        
                        <p>
                        <label>How Long Have You Lived Here?</label><br />
                        
                        
						<label><select name="LiveYears" id="LiveYears">
                          <option value="">Select Years</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_timeYears['year_value']?>"><?php echo $row_timeYears['year_name']?></option>
                          <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
                        </select></label>
                        
                        <label><select name="LiveMonths" id="LiveMonths">
                          <option value="">Select Months</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_timeMonths['month_value']?>"><?php echo $row_timeMonths['month_name']?></option>
                          <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
                        </select></label>
                        </p>
                        <br />

                        
               


							  <div class="goDesc">
									If You Have not Lived At This Address For More Than 5 Years Please Click Add Previous Address Below To Enter More Information.  <a href="javascript:hideshow(document.getElementById('PreviousHomeInformation'))">Click Here!</a>
							  </div><!--goDesc-->
                                
                                <div id="PreviousHomeInformation" style="display:none;">
                                
                                	<div class="formheader1">
										Previous Address: 
						  			</div>
                                    
                                    <div class="goPad">
                                    
                                    	
                                    
                                      
                                    <br>
        

                                
                                <label>Street Address:<input name="2Address1" id="2Address1" size="18"></label><br>
        
                                <label>Street Address2:<input name="2Address2" id="2Address2" size="15"></label><br>
        
                                <label>City: <input name="2City" id="2City" size="6"></label>
        
                                <label>State:<select name="2State" id="2State">
                                  <option value="">Select State</option>
                                                            <option value="AL">AL</option>
                                                            <option value="AK">AK</option>
                                                            <option value="AZ">AZ</option>
                                                            <option value="AR">AR</option>
                                                            <option value="CA">CA</option>
                                                            <option value="CO">CO</option>
                                                            <option value="CT">CT</option>
        
                                                            <option value="DE">DE</option>
                                                            <option value="DC">DC</option>
                                                            <option value="FL">FL</option>
                                                            <option value="GA">GA</option>
                                                            <option value="HI">HI</option>
                                                            <option value="ID">ID</option>
                                                            <option value="IL">IL</option>
                                                            <option value="IN">IN</option>
                                                            <option value="IA">IA</option>
                                                            <option value="KS">KS</option>
                                                            <option value="KY">KY</option>
                                                            <option value="LA">LA</option>
                                                            <option value="ME">ME</option>
                                                            <option value="MD">MD</option>
                                                            <option value="MA">MA</option>
                                                            <option value="MI">MI</option>
                                                            <option value="MN">MN</option>
                                                            <option value="MS">MS</option>
                                                            <option value="MO">MO</option>
                                                            <option value="MT">MT</option>
                                                            <option value="NE">NE</option>
                                                            <option value="NV">NV</option>
                                                            <option value="NH">NH</option>
                                                            <option value="NJ">NJ</option>
                                                            <option value="NM">NM</option>
                                                            <option value="NY">NY</option>
                                                            <option value="NC">NC</option>
                                                            <option value="ND">ND</option>
                                                            <option value="OH">OH</option>
                                                            <option value="OK">OK</option>
                                                            <option value="OR">OR</option>
                                                            <option value="PA">PA</option>
                                                            <option value="RI">RI</option>
                                                            <option value="SC">SC</option>
                                                            <option value="SD">SD</option>
                                                            <option value="TN">TN</option>
                                                            <option value="TX">TX</option>
                                                            <option value="UT">UT</option>
                                                            <option value="VT">VT</option>
                                                            <option value="VA">VA</option>
                                                            <option value="WA">WA</option>
                                                            <option value="WV">WV</option>
                                                            <option value="WI">WI</option>
                                                            <option value="WY">WY</option>
                                      </select></label>
                                <br>
        
                                <label>County:<input name="2County" id="2County" size="15"></label><br>
                                
                                <p>
                                <label>How Long Have You Lived Here?</label><br>
                                </p>
                                
                                <label><select name="2LiveYears" id="2LiveYears">
                                  <option value="">Select Years</option>
                                                            <option value="0 Years">0 Years</option>
                                                            <option value="1 Year">1 Year</option>
                                                            <option value="2 Years">2 Years</option>
                                                            <option value="3 Years">3 Years</option>
                                                            <option value="4 Years">4 Years</option>
                                                            <option value="5 Years">5 Years</option>
                                                            <option value="6 Years">6 Years</option>
                                                            <option value="7 Years">7 Years</option>
                                                            <option value="8 Years">8 Years</option>
                                                            <option value="9 Years">9 Years</option>
                                                            <option value="10 Years">10 Years</option>
                                                            <option value="11 Years">11 Years</option>
                                                            <option value="12 Years">12 Years</option>
                                                            <option value="13 Years">13 Years</option>
                                                            <option value="14 Years">14 Years</option>
                                                            <option value="15 Years">15 Years</option>
                                                            <option value="16 Years">16 Years</option>
                                                            <option value="17 Years">17 Years</option>
                                                            <option value="18 Years">18 Years</option>
                                                            <option value="19 Years">19 Years</option>
                                                            <option value="20 Years">20 Years</option>
                                      </select></label>
                                
                                <label><select name="2LiveMonths" id="2LiveMonths">
                                  <option value="">Select Months</option>
                                                            <option value="0 Months">0 Months</option>
                                                            <option value="1 Month">1 Month</option>
                                                            <option value="2 Months">2 Months</option>
                                                            <option value="3 Months">3 Months</option>
                                                            <option value="4 Months">4 Months</option>
                                                            <option value="5 Months">5 Months</option>
                                                            <option value="6 Months">6 Months</option>
                                                            <option value="7 Months">7 Months</option>
                                                            <option value="8 Months">8 Months</option>
                                                            <option value="9 Months">9 Months</option>
                                                            <option value="10 Months">10 Months</option>
                                                            <option value="11 Months">11 Months</option>
                                      </select></label>
                                
                                <br>
        
                                
                       <label>Rent/Own:<select name="2applicant_buy_own_rent_other" id="2applicant_buy_own_rent_other">
                         <option value="">Select Living Type</option>
                    <option value="Owns Home Outright">Owns Home Outright</option>
                    <option value="Buying Home">Buying Home</option>
                    <option value="Renting/Leasing">Renting/Leasing</option>
                    <option value="Living w/ Relatives">Living w/ Relatives</option>
                    <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
                    <option value="Unknown">Unknown</option>
                  </select></label><br>
        
        
                                        <div class="goDesc">
                                            If You Have not Lived At This Address For 5 Years Please Click Add Previous Address Below To Enter More Information.
                                        </div><!--goDesc-->
                                    
                                    </div>
                                
                           	  </div>
                                
                                
                             <div>
                                
                          </div>
							
                      </div>
				
                </div>
        </td>
        <td valign="top">
        			
        			<div class="goOne1">
							<div class="formheader2">
								Work Information:
							</div><!--formheader2-->
                            
							<div class="goPad">
						<label>Employer: <input type="text" name="EmployerName" id="EmployerName" size="20" /></label><br />

                        <label>Work Phone Number: <input type="text" name="EmployerPhoneNo" id="EmployerPhoneNo" size="10"  /></label><br />
                        
								<div>
                                
																		How Long Have You Worked Here?<br />


<select name="workYears">
  <option value="">Select Years</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_timeYears['year_value']?>"><?php echo $row_timeYears['year_name']?></option>
                          <?php
} while ($row_timeYears = mysqli_fetch_assoc($timeYears));
  $rows = mysqli_num_rows($timeYears);
  if($rows > 0) {
      mysqli_data_seek($timeYears, 0);
	  $row_timeYears = mysqli_fetch_assoc($timeYears);
  }
?>
</select>



<select name="workMonths">
  <option value="">Select Months</option>
  <?php
do {  
?>
  <option value="<?php echo $row_timeMonths['month_name']?>"><?php echo $row_timeMonths['month_value']?></option>
  <?php
} while ($row_timeMonths = mysqli_fetch_assoc($timeMonths));
  $rows = mysqli_num_rows($timeMonths);
  if($rows > 0) {
      mysqli_data_seek($timeMonths, 0);
	  $row_timeMonths = mysqli_fetch_assoc($timeMonths);
  }
?>
</select>

<br />

<label>Employment Type:
<select name="EmploymentType">
  <option value="">Select One</option>
            <option value="Auto Worker">Auto Worker</option>
            <option value="Clerical">Clerical</option>
            <option value="Craftsman">Craftsman</option>
            <option value="Executive/Managerial">Executive/Managerial</option>
            <option value="Farmer">Farmer</option>
            <option value="Fisherman">Fisherman</option>
            <option value="Government">Government</option>
            <option value="Homemaker">Homemaker</option>
            <option value="Other">Other</option>
            <option value="Professional">Professional</option>
            <option value="Sales/Advertising">Sales/Advertising</option>
            <option value="Semi-Skilled Labor">Semi-Skilled Labor</option>
            <option value="Skilled Labor">Skilled Labor</option>
</select>
</label>
<br />

<label>Employment Status:
		<select name="EmploymentStatus" id="EmploymentStatus">
            <option value="">Select One</option>
            <option value="Active Military">Active Military</option>
            <option value="Contract">Contract</option>
            <option value="Full Time"> Full Time</option>
            <option value="Not Applicable">Not Applicable</option>
            <option value="Part Time">Part Time</option>
            <option value="Retired">Retired</option>
            <option value="Seasonal">Seasonal</option>
            <option value="Self Employed">Self Employed</option>
            <option value="Temporary">Temporary</option>
        </select>
</label>
<br />
<p>
<label>Employment Title:<br />
 <input type="text" name="EmploymentTitle" id="EmploymentTitle" />
 </label>
 </p>
 
 <label>When Do You Get Paid?<br />
 <select name="paydayFreq" id="paydayFreq">
            <option value="">Select One</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Biweekly">Biweekly</option>
                        <option value="Semimonthly">Semimonthly</option>
                        <option value="Monthly" selected="selected">Monthly</option>
                        <option value="Yearly">Yearly</option>
                      </select>
 </label>
 
								<a href="javascript:hideshow(document.getElementById('PreviousEmployerShow'))">Add Previous >>Show/Hide</a>
                                
                                </div><!--goDesc-->
						  </div>

			<div id="PreviousEmployerShow" style="display: none">
 
<hr />
         
					  <div class="formheader2">
								Previous Employer:
							</div><!--formheader1-->
					
                    
                    <div class="goDesc">
                        <label>Previous Employer Name: <br />
                        <input name="applicant_employer2_name" id="applicant_employer2_name" size="25" /></label>
                        <br /><br />
                        
                        <label>Previous Employer Phone No.: <br />
						<input name="applicant_employer2_phone" type="text" id="applicant_employer2_phone" size="15">
                        </label><br />

                        
                       	<label>Previous Employer Address 1: 
                        <input name="applicant_employer2_addr" id="applicant_employer2_addr" size="15" /></label>
                        <br /><br />

                       	<label>Previous Employer Address 2: 
                        <input name="applicant_employer2_addr2" id="applicant_employer2_addr2" size="15" /></label>
                        <br /><br />
                        
                        <label>Zip: <input name="applicant_employer2_zip" type="text" id="applicant_employer2_zip" size="5"></label>
                        <label>City: <input name="applicant_employer2_city" type="text" id="applicant_employer2_city" size="10"></label><br /><br />

                        
                        <label>State: <select name="applicant_employer2_state" id="applicant_employer2_state">
                          <option value="">Select One</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                          <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                        </select></label>

                    </div>
<hr />
            </div>        
<br />

					  <div class="formheader2">
								Other Income:
							</div><!--formheader1-->

							<div class="goPad">
								<div class="goDesc">
                                                         		<label>Other Income Source?: <input name="applicant_other_income_source" id="applicant_other_income_source" size="15" /></label><br /><br />

                   		    <label>Other Income Amount?: <input name="applicant_other_income_amount" id="applicant_other_income_amount" size="15"  /></label><br />
                            <br />

                            
                            <label>When Do You Get This Other Income? <select name="applicant_other_income_when_rcvd" id="applicant_other_income_when_rcvd">
            <option value="">Select One</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Biweekly">Biweekly</option>
                        <option value="Semimonthly">Semimonthly</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Yearly">Yearly</option>
                      </select></label><br />


									Please Enter All Information Most Accurate As Possible For We Can Approve Your Loan.
							  </div><!--goDesc-->
							</div>


				
                </div>
        </td>
        <td valign="top">
        <div class="goThree3">
							<div class="formheader2">
								Finance Information:
							</div><!--formheader1-->
                            
							<div class="goPad">
                        <input type="hidden" name="applilcant_v_financed_amount" id="applilcant_v_financed_amount" value="<?php echo $sellingPrice; ?>"  />
                        <br />

                        <label>How Many Months?<br />
                          <input name="applilcant_v_term_months" type="text" id="applilcant_v_term_months" value="<?php echo $row_slctDlr['settingDefaultTerm']; ?>"  size="4"  />
                        </label>
                        <br />

                        
                        <input name="applilcant_v_cust_rate" type="text"  id="applilcant_v_cust_rate" value="10.0" size="4" readonly="readonly" />
                        <br />
 
                        
                        <label>Estimated Monthly Payment:<br />
$<input name="applilcant_v_total_monthpmts_est" type="text" id="applilcant_v_total_monthpmts_est"  size="4" readonly="readonly" /></label>
                        <br />
                        
                        <input type=button onClick='showpay()' value='Show My Payment?' /> <br />


                        
                        
                        
                        
                        
                        
                        
                        
                        
						<input  type="hidden" name="Fees" id="Fees" size="15" value="<?php echo $fees; ?>" />
                     <label>Out The Door Price:<br />
$<input name="SellingPrice" id="SellingPrice"  value="<?php echo $sellingPrice; ?>" size="4" readonly="readonly" /></label><br />
								<div class="goDesc">
									<p>Do You Have A Vehicle You Will Be Trading With This Purchase? If So Please <a href="javascript:hideshow(document.getElementById('TradeInformation'))">Click Here!</a> </p>
                              <a href="javascript:hideshow(document.getElementById('TradeInformation'))">Trade Information >>Show/Hide</a>
								</div><!--goDesc-->
                                
                                <div id="TradeInformation" style="display: none;">
             <label>Trade Year:<br />

              <select name="applilcant_v_trade_year" id="applilcant_v_trade_year">
            <option value="">Select One</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                      </select>
             </label><br />

			<label>Trade Make:<br />
<select name="applilcant_v_trade_make" id="applilcant_v_trade_make">
            <option value="">Select One</option>
                        <option value="AMC">AMC</option>
                        <option value="Acura">Acura</option>
                        <option value="Alfa Romeo">Alfa Romeo</option>
                        <option value="Aston Martin">Aston Martin</option>
                        <option value="Audi">Audi</option>
                        <option value="Avanti">Avanti</option>
                        <option value="Bentley">Bentley</option>
                        <option value="BMW">BMW</option>
                        <option value="Buick">Buick</option>
                        <option value="Cadillac">Cadillac</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Chrysler">Chrysler</option>
                        <option value="Daewoo">Daewoo</option>
                        <option value="Daihatsu">Daihatsu</option>
                        <option value="Datsun">Datsun</option>
                        <option value="Delorean">Delorean</option>
                        <option value="Dodge">Dodge</option>
                        <option value="Eagle">Eagle</option>
                        <option value="Ferrari">Ferrari</option>
                        <option value="Fiat">Fiat</option>
                        <option value="Ford">Ford</option>
                        <option value="Geo">Geo</option>
                        <option value="GMC">GMC</option>
                        <option value="Honda">Honda</option>
                        <option value="Hummer">Hummer</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="Infiniti">Infiniti</option>
                        <option value="Isuzu">Isuzu</option>
                        <option value="Jaguar">Jaguar</option>
                        <option value="Jeep">Jeep</option>
                        <option value="Kia">Kia</option>
                        <option value="Lamborghini">Lamborghini</option>
                        <option value="Lancia">Lancia</option>
                        <option value="Land Rover">Land Rover</option>
                        <option value="Lexus">Lexus</option>
                        <option value="Lincoln">Lincoln</option>
                        <option value="Lotus">Lotus</option>
                        <option value="Maserati">Maserati</option>
                        <option value="Maybach">Maybach</option>
                        <option value="Mazda">Mazda</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                        <option value="Mercury">Mercury</option>
                        <option value="Merkur">Merkur</option>
                        <option value="MINI">MINI</option>
                        <option value="Mitsubishi">Mitsubishi</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Oldsmobile">Oldsmobile</option>
                        <option value="Peugeot">Peugeot</option>
                        <option value="Plymouth">Plymouth</option>
                        <option value="Pontiac">Pontiac</option>
                        <option value="Porsche">Porsche</option>
                        <option value="Renault">Renault</option>
                        <option value="Rolls-Royce">Rolls-Royce</option>
                        <option value="Saab">Saab</option>
                        <option value="Saturn">Saturn</option>
                        <option value="Scion">Scion</option>
                        <option value="Smart">Smart</option>
                        <option value="Sterling">Sterling</option>
                        <option value="Subaru">Subaru</option>
                        <option value="Suzuki">Suzuki</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Triumph">Triumph</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Volvo">Volvo</option>
                        <option value="Yugo">Yugo</option>
                        <option value="Trailer">Trailer</option>
                        <option value="Yamaha">Yamaha</option>
                        <option value="Other">Other</option>
                      </select></label><br />

                      
                      <label>Trade Model:<br />

                      
                      <input type="text" name="applilcant_v_trade_model" id="applilcant_v_trade_model">
                      </label><br />

                      
                      <label>Trade Vin:<br />
						<input name="applilcant_v_trade_vin" type="text" id="applilcant_v_trade_vin" maxlength="17">
                      </label>
                      
                      </div><!-- Hide Show Trade Information -->
                      
							<br />
							<br />
                      
                            <input type="submit" name="Submit" value="" class="gobtn">
              </div>
				
          </div>
        
        </td>
   </tr>
</table>

	
                


                
				





</div>




					</form>
                    
				</div><!--proFileCalcBox-->

				<div class="btmcprofile">&nbsp;</div>
                
				<div class="proFileCalcAmount">

					<div class="proFileBtn" title="Robbie Says HI!">
						Powered By Deal Matrix  <br />

                        <form action="#" method="get" name="myDeal" id="myDeal" style="margin:0; padding:0;">
                        
								<input type="submit" name="Submit" value="" class="formbtn" /><!-- Button -->
                            
							<input type="text" name="prequalifyIncome" id="prequalifyIncome" value="" />
							<input type="text" name="prequalifyMortgage" id="prequalifyMortgage" value="" />
							<input type="text" name="prequalifyCreditCards" id="prequalifyCreditCards" value="" />
							<input type="text" name="prequalifyGarnishments" id="prequalifyGarnishments" value="" />
							<input type="text" name="prequalifyOtherLoans" id="prequalifyOtherLoans" value="" />
							<input type="text" name="myCreditScoreAPR" id="myCreditScoreAPR" value="" />
							<input type="text" name="tokenkey" id="tokenkey" value="<?php echo $tkey; ?>" />
							<input type="text" name="prequalifyLoanAmt" id="prequalifyLoanAmt" value="" />
						
                        
                        </form>
                        
                        
                        
				  </div>
				</div><!--proFileCalcAmount-->
		  </div><!--proFileCalc-->
		</div><!--left-->
		<div class="hot5"></div>
		<div class="proFileSmallBlueBar"></div>
		<div class="hot5"></div>
		<div class="threeColArticle">
			<div class="header">
				<h2>Car Financing<br />Basic Requirements</h2>
			</div><!--header-->
			<ul>
				<li>At least $1,500 gross monthly income required
				for credit scores less than 625.</li>
				<li>Financing for new and used automobile loans
				from local auto finance specialists.</li>
				<li>Auto loan approvals are for purchasing a car
				direct from our authorized licensed used car dealer lots.</li>
				<li>Residents of USA and Canada at
				least 18 years of age.</li>
			</ul>
		</div><!--threeColArticle-->
		<div class="threeColArticle">
		  <div class="header">
				<h2>Auto Loan Financing Specialists</h2>
			</div><!--header-->
			All of our auto loan options are used to
			<a href="#">
			buy a car with bad credit</a> from leading auto dealerships across the USA
			and Canada. Online auto loans can usually be obtained the
			same day or within 24 hours.<br /><br />
			Buying a car with low credit is an easy 3 step process:<br /><br />
			<ul>
				<li><a href="#">Apply for financing</a></li>
				<li>Select a new or used vehicle</li>
				<li>Complete the paperwork</li>
			</ul>
		</div><!--threeColArticle-->
		<div class="threeColArticle">
		  <div class="header">
				<h3>Fundingway is here<br />to help you get an<br />auto loan</h3>
			</div><!--header-->
			You don't have to settle for a cheap high mileage used car, truck,
			or suv from a buy here pay here dealership if your credit isn't
			the greatest. We are here to help you get the new or used
			automobile you are looking for. Get a new or
			<a href="#">used car loan</a>
			pre-approved today and let us open the door to your
			financial freedom.
		</div><!--threeColArticle-->
		<div class="hot15"></div>
		<div class="proFileSmallGreenBar"></div>
		<div class="section" style="padding: 20px;">
			<div class="pad">
				<div>
				  <div class="btmArticles">
						<h4>Vehicle Loan Financing Advice</h4>
					</div>
					 
							<a href="#">Bad Credit Auto Refinancing</a>
							<br />
							If you stepped into an auto loan with extremely high monthly payments then you definitely want to look into refinancing, but if you have bad credit there are certain qualifications that need to be met. ...
				  <div class="hot10">&nbsp;</div>
						
							<a href="#">How to Earn Better Credit Scores</a>
							<br />
							Low credit is going to create a lot of problems that are just unnecessary. Of course sometimes falling into damaged credit scores will be simply out of your hands, but it is going to be your responsibility to get yourseproFile out of it. ...
				  <div class="hot10">&nbsp;</div>
						
							<a href="#">What is in a Credit Report?</a>
							<br />
							If you are going to take out a loan then you know that your credit score is going to be pulled at some time, but what does that really mean? ...
							<div class="hot10">&nbsp;</div>
			  </div>
			</div>
			<div style="width:100%; clear:both; height:1px; font-size:1px; background-color:#eee">&nbsp;</div>
			<div class="hot10">&nbsp;</div>
			<div class="pad">
				<div>
				  <div class="btmArticles">
						<h4>Latest Auto News</h4>
					</div>
					 
							April 09, 2013 - <a href="#">Pricing Announcement for the 2014 Acura RDX</a>
							<br />
							There are many fans out there for the Acura RDX or just Acura in general. If you are a fan though of either or just cars in general you will want to keep an eye out for the 2014 Acura RDX. ...
				  <div class="hot10">&nbsp;</div>
						
							April 02, 2013 - <a href="#">Chevy pulls out a New Camaro</a>
							<br />
							Now the New York auto show of 2013 has already come and past now all of the beautiful gems that were unveiled can be discussed and raved about until they will eventually be released to the public. One of the most talked about and exciting ones is the unveiling of the upcoming 2014 Camaro Z28....
				  <div class="hot10">&nbsp;</div>
						
							January 28, 2013 - <a href="#">New car deals reported by TrueCar</a>
							<br />
							Heading into 2013, the automotive market is in great shape, following a full recovery from the downturn that resulted in many automakers being bailed out by the government....
							<div class="hot10">&nbsp;</div>
			  </div>
			</div>
			<div class="pad disclaimer">
				<div class="hot10">&nbsp;</div>
				* The auto financing approval calculator is an estimate, not a guaranteed. You may qualify for slightly more or less. Money down
				may be required but is not necessary for all automobile loans. Approvals are subject to verification of employment and income.
				Auto loan interest rates and repayment terms are based on credit risk, vehicle selection, and equity position of the
				car loan.<br />
				<br />
				FundingWay.com is a service mark of ACE Tech Incorporated. All content
				included on this web site is property of ACE Tech Incorporated and its licensors. No information from this site may be
				used without prior consent from ACE Tech Incorporated and its licensors. This includes text copy, images, graphics, buttons,
				and lender data. All information and content is protected under the intellectual property and copyright laws.
			</div>
		</div>
	</div>
	<div class="right">
				<div class="module1">	
			<p class="cap"></p>
			<p class="mid"><img src="images/global/customerlogin.gif" /></p>
			<p class="mid clearfix">
				<div style="margin: -4px 0 0 20px;">
				<form name="form_login" method="post" action="#">
					<input type="text" name="token" value="<?php echo $tkey; ?>" />
					Log-in ID<br />
					<input name="username" type="text" id="username" class="tbox" size="15" style='font-family: "arial" Courier monospace'/><br />
					Password<br />
					<input name="password" type="password" id="password" class="tbox"  size="15" style='font-family: "arial" Courier monospace'/>
					<input type="submit" name="Submit" value="Log-In" class="btnlogin" style="margin-top:4px;" />
				</form>
				</div>
			</p>
		</div>					
        
        
        
        <div class="module2" id="cc_phone-link">
			<p class="cap"></p>
			<p class="mid"><img src="#" /></p>
			<div align="center" style="font-size:12px; line-height:17px; margin:0 20px 8px 17px; text-align:left;">
				<div style="font-weight:bold;font-size: 12px;color:#6d9d45; margin-bottom: 5px;">Call (877) 896-4217</span></div>
                For all other questions, please call Customer Service.
			</div>
            <div style="width:80%;height:1px;border-top:1px dotted #ccc;padding:5px 0;margin:0 auto;"></div>
            <p class="mid"><img src="#" /></p>
            <div align="center" style="font-size:12px; line-height:17px; margin:0 20px 8px 17px; text-align:left;">
            	<div style="font-weight:bold;font-size: 12px;color:#6d9d45;">(866) 902-4403</span></div>
            </div>
		</div>
	
		<div class="module2">	
			<p class="cap"></p>
			<p class="mid"><img src="#" /></p>
			<div align="center" style="margin:2px 0 12px 0;">
				<!-- START SCANALERT CODE 
				<a target="_blank" href="https://www.mcafeesecure.com/RatingVerify?ref=www.fundingway.com"><img width="94" height="54" border="0" src="//images.scanalert.com/meter/survey/www.fundingway.com/13.gif" alt="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" oncontextmenu="alert('Copying Prohibited by Law - McAfee Secure is a Trademark of McAfee, Inc.'); return false;"></a>
				<!-- END SCANALERT CODE --> 
			</div>
			<div align="center" style="margin:10px 0;"> </div>
			<!--
			<p class="mid">
				<span>
					To Assure your Privacy, all data is sent
					via 128-bit SSL encrypted secure server.<br /><br />
				</span>
			</p>
			-->
		</div>				<div class="module2">	
			<p class="cap"></p>
			<p class="mid"><img src="#" /></p>
			<p class="mid">
				<span>
				<a target="_blank" href="#"><img title="Click to verify BBB accreditation and to see a BBB report." border="0" src="#" alt="Click to verify BBB accreditation and to see a BBB report." oncontextmenu="alert('Use without permission is prohibited. The BBB Accreditation seal is a trademark of the Council of Better Business Bureaus, Inc.'); return false;"  /></a>
					We have met all the Better Business Bureau standards and have participated since 2004.<br />
					<br />
					
					Apply for Financing.<br />
				<a href="#">Auto Loan Application</a>
				</span>
			</p>
		</div>				<div class="module3">
			<a href="#" class="reviews">Click Here to view more consumer testimonials.</a>
		</div>	
	  </div><!--right-->
      
      
</div><!--proFile-->

		        <!-- div class="mobilink"><a href="#">View Mobile-Friendly Version</a></div -->
	</div>

	<div class="pgbot"></div>

	<div class="footer">
		<strong>WeFinance.com</strong>

		<a href="#">Contact</a>
		<a href="#">About</a>
		<a href="#">Privacy</a>
		<a href="#">Website TOU</a>
		<a href="#">Car Loan Financing Tips</a>
		<a href="#">Dealer Services</a>
		<a href="#">Affiliate Program</a>

		<br />
		Copyright &copy; 2003-2013 Auto Credit Express &reg; and its Licensors; all rights reserved.<br />
		Phone: (866) 902-4403 Office Hours: Monday through Friday 9am to 6pm EST<br />
		<br />
		Already applied?  <a style="border: none; padding: 0px; font-weight: normal;" href="#">Click here</a> to check the status of your application.
  </div>
</div>

<style type="text/css">
.ui-dialog { position: absolute; padding: .2em; width: 300px; overflow: hidden; }
.ui-dialog .ui-dialog-titlebar { padding:8px 10px 10px 10px; position: relative;  }
.ui-dialog .ui-dialog-title { float: left; } 
.ui-dialog .ui-dialog-titlebar-close { position: absolute; right: .3em; top: 50%; width: 19px; margin: -10px 0 0 0; padding: 1px; height: 18px; }
.ui-dialog .ui-dialog-titlebar-close span { display: block; margin: 1px; }
.ui-dialog .ui-dialog-titlebar-close:hover, .ui-dialog .ui-dialog-titlebar-close:focus { padding: 0; }
.ui-dialog .ui-dialog-content { position: relative; border: 0; padding: .5em 1em; background: none; overflow: auto; zoom: 1; }
.ui-dialog .ui-dialog-buttonpane { text-align: left; border-width: 1px 0 0 0; background-image: none; margin: .5em 0 0 0;  /* padding: .3em 1em .5em .4em; */ }
.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset { float: right; }
.ui-dialog .ui-dialog-buttonpane button { margin: .5em .4em .5em 0; cursor: pointer; }
.ui-dialog .ui-resizable-se { width: 14px; height: 14px; right: 3px; bottom: 3px; }

.ui-widget { font-family: Verdana,Arial,sans-serif; font-size: 1.1em; }
.ui-widget .ui-widget { font-size: 1em; }
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button { font-family: Verdana,Arial,sans-serif; font-size: 1em; }
.ui-widget-content { border: 1px solid #aaaaaa; background-color:#ffffff; color: #222222; }
.ui-widget-content a { color: #222222; }
.ui-widget-header { border: 1px solid #aaaaaa; background-color:#cccccc; color: #222222; font-weight: bold; }
.ui-widget-header a { color: #222222; }

.ui-widget-content { border: 2px solid #aaaaaa; background-color: #ffffff; color: #222222; }
.ui-widget-content a { color: #222222; }

.ui-widget-content .ui-icon {  }

/* states and images */
.ui-icon { width: 16px; height: 16px; background-image: url(images/ui-icons_222222_256x240.png); }
.ui-widget-content .ui-icon {  }
.ui-widget-header .ui-icon {  }
.ui-state-default .ui-icon {  }
.ui-state-hover .ui-icon, .ui-state-focus .ui-icon {  }
.ui-state-active .ui-icon {  }
.ui-state-highlight .ui-icon {  }
.ui-state-error .ui-icon, .ui-state-error-text .ui-icon {  }
.ui-icon-circle-check { background-position: -208px -192px; }

.ui-helper-clearfix:after { content: "."; display: block; height: 0; clear: both; visibility: hidden; }
.ui-helper-clearfix { display: inline-block; }
/* required comment for clearfix to work in Opera \*/
* html .ui-helper-clearfix { height:1%; }
.ui-helper-clearfix { display:block; }

.ui-button { width:80px; }
</style>

<div id="phone-box-info" class="ui-dialog ui-widget ui-widget-content ui-corner-all" style="display: none; outline-width: 0px; outline-style: initial; outline-color: initial; height: auto; width: 400px; position: absolute; top: 100px; left:35%; z-index: 1002; border:4px solid #fff !important;">
	<div style="height:auto; border: 1px solid #aaaaaa; background-color:#fff; padding:5px;">
		<div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
			<div style="float:right; color:#777;">FundingWay.com</div>
			<span class="ui-dialog-title" id="ui-dialog-title-dialog-message" style="color:#333;">Apply By Phone</span>
		</div>
		<div id="dialog-message" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 66px; height: auto;">
			<iframe frameBorder="0" scrolling="no" style="border:0;width: 100%;height: 220px;" src="http://www.fundingway.com/ace/callCenterPhoneNumber.php?site=www.fundingway.com&affid=af1401&linkid=af1401&subid=pg~&keyid="></iframe>
		</div>
		<div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
			<div class="ui-dialog-buttonset">
				<button onClick="document.getElementById('phone-box-info').style.display = 'none';" type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
					<span class="ui-button-text">Ok</span>
				</button>
			</div>
		</div>
	</div>
	<div style="font-size:1px; height:1px; clear:both; width:100%;">&nbsp;</div>
</div>
	
















</body>
</html>
<?php
mysqli_free_result($slctVehicle);

mysqli_free_result($slctDlr);

mysqli_free_result($states);

mysqli_free_result($timeMonths);

mysqli_free_result($timeYears);

mysqli_free_result($autoYears);
?>
