<?php

$vid = $_GET['v'];


include('_db_functions.php');

$vphoto = $vid;

trackvehiclewfh($vid);

//$vphoto = $row_rcntlyVwd['vid']; 

//showphoto ($vphoto); 



?>

   	<!--link rel="stylesheet" href="../css/wfhstyle.css" type="text/css"></link -->

    <!--Gallery Style -->
   	<link rel="stylesheet" href="css/wfhgallerystyles.css" type="text/css"></link>

    <script type="text/javascript" src="../Shine_Gallery/wfh/js/jquery-1.4.2.min.js"></script>
   <script type="text/javascript" src="../Shine_Gallery/wfh/js/cufon-yui.js"></script>
    <script type="text/javascript" src="../Shine_Gallery/wfh/js/js-mygallery.js"></script>
    
    <!-- Scrolling Style -->
    <script type="text/javascript" src="../Shine_Gallery/wfh/js/js-scrolling-click.js"></script>

<script type="text/javascript">
function AjaxFunction(trademake)
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {

var myarray=eval(httpxml.responseText);
// Before adding new we must remove previously loaded elements
for(j=document.cust_leadForm.subcat.options.length-1;j>=0;j--)
{
document.cust_leadForm.subcat.remove(j);
}


for (i=0;i<myarray.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray[i];
optn.value = myarray[i];
document.cust_leadForm.subcat.options.add(optn);

} 
      }
    }
	var url="../ajaxEnviro/vtradedd.php";
url=url+"?trademake="+trademake;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script> 
    <div class="padding_container">
    
    <h1><?php echo $row_slctDlr['company']; ?></h1>
    
		
        <div id="previewWindow" style="float:left;">

                <div class="mainframe">
                                        
                                            <div id="largephoto">
                                                <div id="loader"></div>
                                            
                                            
                                                    <div id="largecaption">
                                                        <div class="captionShine"></div>
                                                        <div class="captionContent"></div>
                                                    </div>
                                            
                                            <div id="largetrans">  
                                            </div>
                                            
                                            </div>
                                        
            </div>
                
        </div>
        
                    

							<div class="thumbox">
                                <?php include("preview-thumbnailsBox.php"); ?><!--thumbnailsBox-->
                            </div>    
	</div>
    
    
    
    
    <div id="communicateBox">
                            <div class="clear"></div>
    
    	<?php include('../inc/leadform.php'); ?>
    
    
    
    </div>