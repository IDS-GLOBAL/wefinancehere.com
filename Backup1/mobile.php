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



$mindown = ($sellingPrice * '.15');

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);

$hello = 'Hello World';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Central Auto Mobile View</title>
<link type='text/css' href='jquery.mobile-1.0b1/jquery.mobile-1.0b1.min.css' rel='stylesheet'/>
<link type='text/css' href='../centralauto.com/css/jqm-docs.css' rel='stylesheet'/>
<script type='text/javascript' src='js/jquery-1.6.1.min.js'></script>
<script type='text/javascript' src='jquery.mobile-1.0b1/jquery.mobile-1.0b1.min.js'></script>
<script language="JavaScript" src="js/calc.js"></script>
<script language="JavaScript" src="js/showpay.js"></script>
<script type="text/javascript">
<!--
function MM_setTextOfTextfield(objId,x,newText) { //v9.0
  with (document){ if (getElementById){
    var obj = getElementById(objId);} if (obj) obj.value = newText;
  }
}
//-->
</script>
</head>

<body>
<div data-role="page">

				<div id="jqm-homeheader" class="ui-mobile">
					<h1>Central Auto &quot;Mobile Friendly&quot;</h1>
                    <h1 id="jqm-logo">
                      <img src="../centralauto.com/images/Central-Auto-hand.png" alt="jQuery Mobile Framework" width="100" />
                    </h1>
					<p><strong>Touch Screen-Optimized For Mobile Web, Smartphones, &amp; Tablets</strong></p>
					
                    
                    <div>
                    
                    <p><h2>CentralAuto.com Say's <?php echo $hello; ?></h2></p>
                    </div>

  </div>

				<div data-role="content" data-theme="b">
               	<table width="100%">
                	<tr>
                    	<td> <a href="#">Home</a></td>
                        
                        <td><a href="#">Inventory</a></td>
                        
                        <td><a href="#">Credit App</a></td>
                        
                        <td><a href="#"> About Us</a></td>
                        
                        <td><a href="#">Directions</a></td>
                        
                        <td><a href="#">Testimonials</a></td>
                  </tr>
                 </table>

                </div>


<div data-role="content" data-theme="b">
					


		<form action="scriptDealMatrix.php" id="FormDealMatrix">


			<h2>- Mobile Auto Loan Application -</h2>
<input name="applicant_did" type="hidden" value="<?php echo $did; ?>">
		  <!-- <p>This page contains various progressive-enhancement driven form controls. Native elements are sometimes hidden from view, but their values are maintained so the form can be submitted normally. </p>

			<p>Browsers that don't support the custom controls will still deliver a usable experience, because all are based on native form elements.</p>
			-->
            

<div data-role="fieldcontain">
		<label for="titleName" class="select">Title Name:</label>
<select name="titleName" id="titleName"  data-native-menu="false">
                  <option value="">Select</option>
                  <option value="Mr.">Mr.</option>
                  <option value="Mrs.">Mrs.</option>
                  <option value="Ms.">Ms.</option>
                  <option value="Miss.">Miss.</option>
                  <option value="Dr.">Dr.</option>
                </select>
                
		  </div>            
            
            
            
       		<div data-role="fieldcontain">
	         <label for="FirstName">First Name:</label>
	         <input type="text" name="FirstName" id="FirstName" value=""  />
			</div>


			<div data-role="fieldcontain">
	         <label for="LastName">Last Name:</label>
	         <input type="text" name="LastName" id="LastName" value=""  />
			</div>

			<div data-role="fieldcontain">
	         <label for="MiddleName">Middle Name Or Initial:</label>
	         <input type="text" name="MiddleName" id="MiddleName" value=""  />
			</div>
            



<div data-role="fieldcontain">
		<label for="Suffix" class="select">Suffix:</label>
            <select name="Suffix" id="Suffix" data-native-menu="false">
              <option value="" >Select</option>
              <option value="JR">JR</option>
              <option value="SR">SR</option>
              <option value="I">I</option>
              <option value="II">II</option>
              <option value="III">III</option>
              <option value="IV">IV</option>
              <option value="V">V</option>
          </select>                
</div>            
            


                                      
                                      
       <div data-role="fieldcontain">
	         <label for="Email">Email:</label>
	         <input type="text" name="Email" id="Email" value=""  />
		  </div>
<div data-role="fieldcontain">
	         <label for="Address1">Address 1:</label>
        <textarea name="Address1" cols="40" rows="3" id="Address1"></textarea>
</div>
			<div data-role="fieldcontain">
	         <label for="Address2">Address 2:</label>
	         <input type="text" name="Address2" id="Address2" value=""  />
		  </div>

			<div data-role="fieldcontain">
	         <label for="City">City:</label>
	         <input type="text" name="City" id="City" value=""  />
		  </div>
			<div data-role="fieldcontain">
	         <label for="State">State:</label>
				<select name="State" id="State" data-native-menu="false">
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
                </select>
          </div>
			<div data-role="fieldcontain">
	         <label for="Zip">Zip:</label>
	         <input type="text" name="Zip" id="Zip" value=""  />
		  </div>
			<div data-role="fieldcontain">
	         <label for="chomeaddr">Length of Time At This Address:</label>
		  </div>
          
          
          <p>
                        
                        
			<div data-role="fieldcontain">
                        
						<label for="LiveYears">Live Years: </label>
                        <select name="LiveYears" id="LiveYears" data-native-menu="false">
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
                          </select>
                        
                        <label for="LiveMonths" class="desc">Live Months:</label>
                        
                        <select name="LiveMonths" id="LiveMonths" data-native-menu="false">
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
                          </select>
      
          
			</div>



			<div data-role="fieldcontain">
	         <label for="Phone">Mobile Phone:</label>
	         <input name="Phone" type="text" id="Phone" value=""  />
		  </div>


            
			<div data-role="fieldcontain">
	         <label for="EmployerPhoneNo">Work Number:</label>
	         <input type="text" name="EmployerPhoneNo" id="EmployerPhoneNo" value=""  />
		  </div>



          <div data-role="fieldcontain">
        <label for="cperfered_contact">Perfered Contact Method:</label>
             <select name="cperfered_contact" id="cperfered_contact">
               <option value="by phone">By Mobile Phone</option>
               <option value="by work phone">By Work Phone</option>
               <option value="by email">By Email</option>
             </select>
	      </div>
			<div data-role="fieldcontain">
	         <label for="EmployerName">Employer Name:</label>
	         <input type="text" name="EmployerName" id="EmployerName" value=""  />
		  </div>
			<div data-role="fieldcontain">
	         <label class="desc">How Long With Employer:</label>
		  </div>
          
		  <div data-role="fieldcontain">
                        
						<label for="WorkYears">Work Years: </label>
                        <select name="WorkYears" id="WorkYears" data-native-menu="false">
                            <option value="">Select Work Years</option>
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
                          </select>
                        
                        <label for="WorkMonths" class="desc">Work Months:</label>
                        
                        <select name="WorkMonths" id="WorkMonths" data-native-menu="false">
                          <option value="">Select Work Months</option>
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
                          </select>
      
          
			</div>          
		  
          <div data-role="fieldcontain">
	         <label for="income">What Is Your Income:</label>
	         <input type="text" name="income" id="income" value=""  />
		  </div>
			<div data-role="fieldcontain">
			  <label for="cpay_schedule">How Often Do You Get Paid:</label>
			  <select name="cpay_schedule" id="cpay_schedule" data-role="slider">
			    <option value="bi-weekly">Bi Weekly</option>
			    <option value="monthly">Monthly</option>
              </select>
		  </div>
			<div data-role="fieldcontain">
	         <label for="chomeaddr">Time On Previous Job:</label>
	         <input type="text" name="ctime_onjob" id="ctime_onjob" value=""  />
		  </div>
			<div data-role="fieldcontain">
	         <label for="chomeaddr">Last 4 of SSN#:</label>
            
	         <input type="text" name="csocial_num" id="csocial_num" value=""  />
		  </div>
          
          <div data-role="fieldcontain">
				<label for="cbirthmonth">Birth Month:</label>
                Slide Month

			 	<input type="range" name="cbirthmonth" id="cbirthmonth" value="0" min="1" max="12"  />
		  </div>
          
                    <div data-role="fieldcontain">
				<label for="cbirthmonth">Birth Day:</label>
                Slide Day &nbsp;&nbsp;

			 	<input type="range" name="slider" id="slider" value="0" min="1" max="31"  />
		  </div>

          <div data-role="fieldcontain">
				<label for="cbirthmonth">Birth Year:</label>
                Slide Year &nbsp;

			 	<input type="range" name="cbirth_year" id="cbirth_year" value="0" min="1900" max="2000"  />
		  </div>
          
          <div data-role="fieldcontain">
		<label for="trade_make" class="select">Ideal Year Of Vehicle:</label>
				<select name="trade_year" id="trade_year" data-native-menu="false">
				  <option>Select Year</option>
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
				  <option value="1999">1999</option>
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
                </select>
		  </div>
<div data-role="fieldcontain">
				<label for="trade_make" class="select">Ideal Make Of Vehicle:</label>
				<select name="trade_make" id="trade_make" data-native-menu="false">
				  <option>Select Make</option>
				  <option value="Acura">Acura</option>
				  <option value="Audi">Audi</option>
				  <option value="BMW">BMW</option>
				  <option value="Buick">Buick</option>
				  <option value="Cadillac">Cadillac</option>
				  <option value="Cheverolet">Cheverolet</option>
				  <option value="Chrylser">Chrylser</option>
				  <option value="Daewoo">Daewoo</option>
				  <option value="Dodge">Dodge</option>
				  <option value="Eagle">Eagle</option>
				  <option value="Ford">Ford</option>
				  <option value="Geo">Geo</option>
				  <option value="GMC">GMC</option>
				  <option value="Honda">Honda</option>
				  <option value="Hyundai">Hyundai</option>
				  <option value="Infiniti">Infinity</option>
				  <option value="Isuzu">Isuzu</option>
				  <option value="Jaguar">Jaguar</option>
				  <option value="Kia">Kia</option>
				  <option value="LandRover">Land Rover</option>
				  <option value="Lexus">Lexus</option>
				  <option value="Lincoln">Lincoln</option>
				  <option value="Mazda">Mazada</option>
				  <option value="Mercedez-Benz">Mercedez-Benz</option>
				  <option value="Mercury">Mercury</option>
				  <option value="Mini">Mini</option>
				  <option value="Mitsubishi">Mitsubuishi</option>
				  <option value="Nissan">Nissan</option>
				  <option value="Oldsmobile">Oldsmobile</option>
				  <option value="Plymouth">Plymouth</option>
				  <option value="Porsche">Porsche</option>
				  <option value="Saab">Saab</option>
				  <option value="Scion">Scion</option>
				  <option value="Subaru">Subaru</option>
				  <option value="Suzuki">Suzuki</option>
				  <option value="Toyota">Toyota</option>
				  <option value="Volswagen">Volkswagen</option>
				  <option value="Volvo">Volvo</option>
        </select>
		  </div>


<div data-role="fieldcontain">
	    <label for="trade_make" class="select">Ideal Model Of Vehicle:</label>
          <input type="text" name="trade-model" id="trade-model" value=""  />
</div>
          
          
          <div data-role="fieldcontain">
				<label for="ctrading_in">Are You Trading In A Vehicle:</label>

				<select name="ctrading_in" id="ctrading_in" data-role="slider">
				  <option value="no">NO</option>
					<option value="yes">YES</option>
			</select>
		  </div>



<div data-role="fieldcontain">
		<label for="trade_make" class="select">Trade-In Year:</label>
				<select name="trade_year" id="trade_year" data-native-menu="false">
				  <option>Select Year</option>
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
				  <option value="1999">1999</option>
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
                </select>
		  </div>

<div data-role="fieldcontain">
				<label for="trade_make" class="select">Trade-In Make:</label>
				<select name="trade_make" id="trade_make" data-native-menu="false">
				  <option>Select Make</option>
				  <option value="Acura">Acura</option>
				  <option value="Audi">Audi</option>
				  <option value="BMW">BMW</option>
				  <option value="Buick">Buick</option>
				  <option value="Cadillac">Cadillac</option>
				  <option value="Cheverolet">Cheverolet</option>
				  <option value="Chrylser">Chrylser</option>
				  <option value="Daewoo">Daewoo</option>
				  <option value="Dodge">Dodge</option>
				  <option value="Eagle">Eagle</option>
				  <option value="Ford">Ford</option>
				  <option value="Geo">Geo</option>
				  <option value="GMC">GMC</option>
				  <option value="Honda">Honda</option>
				  <option value="Hyundai">Hyundai</option>
				  <option value="Infiniti">Infinity</option>
				  <option value="Isuzu">Isuzu</option>
				  <option value="Jaguar">Jaguar</option>
				  <option value="Kia">Kia</option>
				  <option value="LandRover">Land Rover</option>
				  <option value="Lexus">Lexus</option>
				  <option value="Lincoln">Lincoln</option>
				  <option value="Mazda">Mazada</option>
				  <option value="Mercedez-Benz">Mercedez-Benz</option>
				  <option value="Mercury">Mercury</option>
				  <option value="Mini">Mini</option>
				  <option value="Mitsubishi">Mitsubuishi</option>
				  <option value="Nissan">Nissan</option>
				  <option value="Oldsmobile">Oldsmobile</option>
				  <option value="Plymouth">Plymouth</option>
				  <option value="Porsche">Porsche</option>
				  <option value="Saab">Saab</option>
				  <option value="Scion">Scion</option>
				  <option value="Subaru">Subaru</option>
				  <option value="Suzuki">Suzuki</option>
				  <option value="Toyota">Toyota</option>
				  <option value="Volswagen">Volkswagen</option>
				  <option value="Volvo">Volvo</option>
                </select>
		  </div>


<div data-role="fieldcontain">
	    <label for="trade_make" class="select">Trade-In Model:</label>
          <input type="text" name="trade-model" id="trade-model" value=""  />
</div>


<div data-role="fieldcontain">
				<label for="cperfered_contact" class="select">Ideal Term:</label>
				<select name="select-choice-1" id="select-choice-1">

				  <option value="3months">3 Months: Same As Cash</option>
					<option value="12">1 Year: 52 Weeks</option>
					<option value="24">2 Years: 2 Years</option>
					<option value="54">Standard: 2 1/2 Years</option>
		</select>
		  </div>
		  
<div data-role="fieldcontain">
	    <label for="trade_make" class="select">Down Payment:</label>
          <input type="text" name="cdwn_pymt" id="cdwn_pymt" value=""  />
</div>

<div data-role="fieldcontain">
	    <label for="trade_make" class="select">Ideal Monthly Payment:</label>
          <input type="text" name="cmonthly_pymt" id="cmonthly_pymt" value=""  />
</div>
<div data-role="fieldcontain">
	         <label for="Comments">Leave Any Comments:</label>
        <textarea name="Comments" cols="40" rows="3" id="Comments"></textarea>
</div>
<div class="ui-body ui-body-b">
		<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="submit" data-theme="d">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" data-theme="a">Submit</button></div>

	    </fieldset>
		</div>
</form>
								
				</div>
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
