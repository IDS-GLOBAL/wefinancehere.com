<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<p>
    <?php
	
	//echo $colname_appendSort;
	//echo '<br>';
	
	?>
    
    
        
  <h2>Narrow Down Your Results</h2>
        
        
    </p>
<form action="compare.php" method="post" name="user_form" id="user_form">

    <ul>
      <li>Use This Module To Sort Vehicle View</li>
      <li>To Compare Vehicles</li>
    </ul> 

<br />
<br />


  <p>
    <input name="sessionid" type="hidden" id="sessionid" value="<?php echo $cookiePHPSESSID; ?>" />
    <select name="sortvehicles" id="sortvehicles" onchange="MM_jumpMenu('parent',this,1)">
      <option value="">Select Order</option> 
      <option <?php if($colname_appendSort == 1){echo "selected";} ?> value="?markets=<?php echo $statemrkt; ?>&sort=1">Sort: Year Range High-Low</option>      
      <option <?php if($colname_appendSort == 2){echo "selected";} ?> value="?markets=<?php echo $statemrkt; ?>&sort=2">Sort: Year Range Low-High</option>
      <option <?php if($colname_appendSort == 3){echo "selected";} ?> value="?markets=<?php echo $statemrkt; ?>&sort=3">Sort: Price Low-High</option>
      <option <?php if($colname_appendSort == 4){echo "selected";} ?> value="?markets=<?php echo $statemrkt; ?>&sort=4">Sort: Price High-Low</option>
      <option <?php if($colname_appendSort == 5){echo "selected";} ?> value="?markets=<?php echo $statemrkt; ?>&sort=5">Sort: Make Model A-Z</option>
      <option <?php if($colname_appendSort == 6){echo "selected";} ?> value="?markets=<?php echo $statemrkt; ?>&sort=6">Sort: Make Model Z-A</option>    
    </select>
    <br>
    
  </p>
  
  <p>
  		<table border="0" cellpadding="5px" cellspacing="5px">
  <tr>
    <td><?php if ($pageNum_selectVehicles > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, 0, $queryString_selectVehicles); ?>"><img src="images/First.gif"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_selectVehicles > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, max(0, $pageNum_selectVehicles - 1), $queryString_selectVehicles); ?>"><img src="images/Previous.gif"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_selectVehicles < $totalPages_selectVehicles) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, min($totalPages_selectVehicles, $pageNum_selectVehicles + 1), $queryString_selectVehicles); ?>"><img src="images/Next.gif"></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_selectVehicles < $totalPages_selectVehicles) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, $totalPages_selectVehicles, $queryString_selectVehicles); ?>"><img src="images/Last.gif"></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
  </p>
  
  <h2>Downpayment Price Ranges</h2>
  
  <ul>
    <li><a href="#">$100 - $500</a></li>
        <li><a href="#">$500 - $1000</a></li>
        <li><a href="#">$1000 - $1500</a></li>
        <li><a href="#">$1500 - $2000</a></li>
        <li><a href="#">$2000 - $2500</a></li>
        <li><a href="#">$2500 - $3000</a></li>
        <li><a href="#">$3000 and Up</a></li>                                        
  </ul>
  </p>
  
  
  
    <p>
  	<h2>Available Status</h2>
  	<ul>
    	<li><a href="#">Coming Soon</a></li>
        <li><a href="#">New Arrivals</a></li>
    </ul>
  </p>



</form>
<p>&nbsp;</p>

