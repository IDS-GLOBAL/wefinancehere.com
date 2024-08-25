<?php require_once('db_functions.php'); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeFinanceHere.com - Finance Your Next Used Car Today!</title>
<link rel="shortcut icon" type="image/ico" href="favicon.ico">



    <link rel="stylesheet" href="css/wfhreset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhstyle.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/wfhlayout.css" type="text/css" media="screen">    
	
	
<style>
	  #alert {
	    font-family: Arial, Helvetica, sans-serif;
	    font-size: 16px;
	    background-color: #ddd;
	    color: #333;
	    padding: 5px;
	    font-weight: bold;
	  }
	</style>
	
	<script src="us-map/us-map-1.0/lib/raphael.js"></script>
	 <script src="scale.raphael.js"></script> <!---->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>
	<script src="jquery/1.6.2/jquery.js"></script>
	<script src="us-map/us-map-1.0/example/color.jquery.js"></script>
	<script src="us-map/us-map-1.0/us-map.js"></script>
    <script src="js/jquery.usmap.js"></script>
	
	<script>
	$(document).ready(function() {
	  $('#map').usmap({
	    'stateSpecificStyles': {
	      'AK' : {fill: '#FF430A'},
  		  'HI' : {fill: '#FF430A'},
	      'CA' : {fill: '#FF430A'},		  
		  'AZ' : {fill: '#FF430A'},
		  'OR' : {fill: '#FF430A'},
		  'WA' : {fill: '#FF430A'},
		  'ID' : {fill: '#FF430A'},
		  'UT' : {fill: '#FF430A'},
		  'WY' : {fill: '#FF430A'},
		  'CO' : {fill: '#FF430A'},
		  'NM' : {fill: '#FF430A'},
		  'TX' : {fill: '#FF430A'},
		  'OK' : {fill: '#FF430A'},
		  'KS' : {fill: '#FF430A'},
		  'NE' : {fill: '#FF430A'},
		  'SD' : {fill: '#FF430A'},
		  'ND' : {fill: '#FF430A'},
		  'MT' : {fill: '#FF430A'},		  
		  'MN' : {fill: '#FF430A'},
		  'WI' : {fill: '#FF430A'},
		  'IL' : {fill: '#FF430A'},
		  'MI' : {fill: '#FF430A'},
		  'IN' : {fill: '#FF430A'},
		  'OH' : {fill: '#FF430A'},
		  'KY' : {fill: '#FF430A'},
		  'TN' : {fill: '#FF430A'},
		  'NC' : {fill: '#FF430A'},
		  'SC' : {fill: '#FF430A'},
		  'FL' : {fill: '#FF430A'},
		  'IA' : {fill: '#FF430A'},
		  'MO' : {fill: '#FF430A'},
		  'AR' : {fill: '#FF430A'},
		  'LA' : {fill: '#FF430A'},
		  'VA' : {fill: '#FF430A'},
		  'WV' : {fill: '#FF430A'},
		  'MD' : {fill: '#FF430A'},
		  'PA' : {fill: '#FF430A'},
		  'NY' : {fill: '#FF430A'},
		  'NJ' : {fill: '#FF430A'},
		  'CT' : {fill: '#FF430A'},
		  'MA' : {fill: '#FF430A'},
		  'VT' : {fill: '#FF430A'},
		  'NH' : {fill: '#FF430A'},
		  'MA' : {fill: '#FF430A'},
		  'DE' : {fill: '#FF430A'},
		  'RI' : {fill: '#FF430A'},
		  'ME' : {fill: '#FF430A'},
		  'NV' : {fill: '#FF430A'},
	      'MS' : {fill: '#D6DF0D'},
	      'GA' : {fill: '#D6DF0D'},  
	      'AL' : {fill: '#D6DF0D'}
		  
	    },
	    'stateSpecificHoverStyles': {

	      'AK' : {fill: '#FF430A'},
  		  'HI' : {fill: '#FF430A'},
	      'CA' : {fill: '#FF430A'},		  
		  'AZ' : {fill: '#FF430A'},
		  'OR' : {fill: '#FF430A'},
		  'WA' : {fill: '#FF430A'},
		  'ID' : {fill: '#FF430A'},
		  'UT' : {fill: '#FF430A'},
		  'WY' : {fill: '#FF430A'},
		  'CO' : {fill: '#FF430A'},
		  'NM' : {fill: '#FF430A'},
		  'TX' : {fill: '#FF430A'},
		  'OK' : {fill: '#FF430A'},
		  'KS' : {fill: '#FF430A'},
		  'NE' : {fill: '#FF430A'},
		  'SD' : {fill: '#FF430A'},
		  'ND' : {fill: '#FF430A'},
		  'MT' : {fill: '#FF430A'},		  
		  'MN' : {fill: '#FF430A'},
		  'WI' : {fill: '#FF430A'},
		  'IL' : {fill: '#FF430A'},
		  'MI' : {fill: '#FF430A'},
		  'IN' : {fill: '#FF430A'},
		  'OH' : {fill: '#FF430A'},
		  'KY' : {fill: '#FF430A'},
		  'TN' : {fill: '#FF430A'},
		  'NC' : {fill: '#FF430A'},
		  'SC' : {fill: '#FF430A'},
		  'FL' : {fill: '#FF430A'},
		  'IA' : {fill: '#FF430A'},
		  'MO' : {fill: '#FF430A'},
		  'AR' : {fill: '#FF430A'},
		  'LA' : {fill: '#FF430A'},
		  'VA' : {fill: '#FF430A'},
		  'WV' : {fill: '#FF430A'},
		  'MD' : {fill: '#FF430A'},
		  'PA' : {fill: '#FF430A'},
		  'NY' : {fill: '#FF430A'},
		  'NJ' : {fill: '#FF430A'},
		  'CT' : {fill: '#FF430A'},
		  'MA' : {fill: '#FF430A'},
		  'VT' : {fill: '#FF430A'},
		  'NH' : {fill: '#FF430A'},
		  'MA' : {fill: '#FF430A'},
		  'DE' : {fill: '#FF430A'},
		  'RI' : {fill: '#FF430A'},
		  'ME' : {fill: '#FF430A'},
		  'NV' : {fill: '#FF430A'},


	      'MS' : {fill: '#19DD31'},
	      'GA' : {fill: '#19DD31'},  
	      'AL' : {fill: '#19DD31'}
	    },
	    
	    'mouseoverState': {
	      'HI' : function(event, data) {
			  return false;
  	      $('#alert')
			.text(window.location = "used-cars.php?markets="+data.name+'');
	        //return false;
	      }
	    },
	    
	    
	    'click' : function(event, data) {
	      $('#alert')
	        .text('No Markets Opened Yet In  '+data.name+' on map 1')
			.text(window.location = "used-cars.php?markets="+data.name+'')
	        .stop()
	        .css('backgroundColor', '#ff0')
	        .animate({backgroundColor: '#ddd'}, 1000);
	    }
	  });




	  $('#map2').usmap({
	    'stateStyles': {
	      fill: '#025', 
	      "stroke-width": 1,
	      'stroke' : '#036'
	    },
	    'stateHoverStyles': {
	      fill: 'teal'
	    },
	    
	    'click' : function(event, data) {
	      $('#alert')
	        .text('No Markets Opened Yet In '+data.name+' on map 2')
			.text(window.location = "used-cars.php?markets="+data.name+'')			
	        .stop()
	        .css('backgroundColor', '#af0')
	        .animate({backgroundColor: '#ddd'}, 1000);
	    }
	  });






	  $('#over-ga').click(function(event){
		$('#map').usmap('trigger', 'GA', 'mouseover', event);
	  });

	  $('#out-ga').click(function(event){
	    $('#map').usmap('trigger', 'GA', 'mouseout', event);
	  });

	  $('#over-md').click(function(event){
	    $('#map').usmap('trigger', 'MD', 'mouseover', event);
		$('#map').usmap('trigger', 'GA', 'mouseover', event);
	  });
	  
	  $('#out-md').click(function(event){
	    $('#map').usmap('trigger', 'MD', 'mouseout', event);
	  });
	});
	</script>
<noscript>
Please Enable Javascript Enabled To Fully View This Site.
</noscript>
<style>
	ul.map li { float: left; margin: 0 50px 0 0px; width: 180px; border: 0px solid; height: 45px; padding-left: 6px; } ul.map { list-style: square url(images/li-arrow.png) !important; } ul.map li a{ margin: 0;padding: 0; text-decoration:underline; font-family:Arial, Helvetica, sans-serif; font-size:20px; font-weight:normal; color:#4591b1; } ul.map li a:hover{ text-decoration:none; color:#214b6e;} .linkBack{ display:block; width:130px; position: relative; bottom: 0px; left: 660px; font-family: Arial,Helvetica,sans-serif; font-size: 10px; font-style:italic; color:#666666;} .linkBack a {color:#666666;}.linkBack a:hover{color:#666666;text-decoration: none;} 
</style>

</head>

<body id="page1">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18549838-1']);
  _gaq.push(['_setDomainName', 'wefinancehere.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><div class="bg"></div>

<div class="main">

<!--==============================Navigation================================-->	

   	
    
<header>

		<div class="row-1">
			<?php include('inc/public-topnavigation.php'); ?>
        </div>
		


        
        <div class="row-2">
<!--Start Sub Navigation -->
		    
			<?php include('inc/public-navigation.php'); ?>
            
            
        </div>




        <div class="row-3">        	
<!--Start Search and Slide -->
                     

        </div>

    </header>
<!--==============================End Navigation================================-->


<!--==============================OLD header=================================-->
	<!-- <h1>Application Welcome Layout</h1> -->
        
        <div id="MarketHeader">Choose A Used Car Market To Shop In <?php echo $row_querymrktStateabrv['state_name']; ?></div>

    <br />
   


    
    
    
    
                <div class="padding_container">

					
								
                                
                                
                                
 <div id="mapcontain">

                        <div id="alert" style="display:none;">Click On The Open Green State Below To Shop Market</div>
                        
                               

<table>
	<tr>
    	<td>
                     
                        <div id="map">
                        
                        
                        
                        
                        
                <ul class="map">
                                <li><a href="used-cars.php?markets=AL" target="_top">Alabama</a></li>
                                <li><a href="used-cars.php?markets=AK" target="_top">Alaska</a></li>
                                <li><a href="used-cars.php?markets=AZ" target="_top">Arizona</a></li>
                                <li><a href="used-cars.php?markets=AR" target="_top">Arkansas</a></li>
                                <li><a href="used-cars.php?markets=CA" target="_top">California</a></li>
                                <li><a href="used-cars.php?markets=CO" target="_top">Colorado</a></li>
                                <li><a href="used-cars.php?markets=CT" target="_top">Connecticut</a></li>
                                <li><a href="used-cars.php?markets=DE" target="_top">Delaware</a></li>
                                <li><a href="used-cars.php?markets=DC" target="_top">District of Columbia</a></li>
                                <li><a href="used-cars.php?markets=FL" target="_top">Florida</a></li>
                                <li><a href="used-cars.php?markets=GA" target="_top">Georgia</a></li>
                                <li><a href="used-cars.php?markets=HI" target="_top">Hawaii</a></li>
                                <li><a href="used-cars.php?markets=IA" target="_top">Idaho</a></li>
                                <li><a href="used-cars.php?markets=IL" target="_top">Illinois</a></li>
                                <li><a href="used-cars.php?markets=IN" target="_top">Indiana</a></li>
                                <li><a href="used-cars.php?markets=IA" target="_top">Iowa</a></li>
                                <li><a href="used-cars.php?markets=KS" target="_top">Kansas</a></li>
                                <li><a href="used-cars.php?markets=KY" target="_top">Kentucky</a></li>
                                <li><a href="used-cars.php?markets=LA" target="_top">Louisiana</a></li>
                                <li><a href="used-cars.php?markets=MN" target="_top">Maine</a></li>
                                <li><a href="used-cars.php?markets=MD" target="_top">Maryland</a></li>
                                <li><a href="used-cars.php?markets=MA" target="_top">Massachusetts</a></li>
                                <li><a href="used-cars.php?markets=MI" target="_top">Michigan</a></li>
                                <li><a href="used-cars.php?markets=MN" target="_top">Minnesota</a></li>
                                <li><a href="used-cars.php?markets=MS" target="_top">Mississippi</a></li>
                                <li><a href="used-cars.php?markets=MO" target="_top">Missouri</a></li>
                                <li><a href="used-cars.php?markets=MT" target="_top">Montana</a></li>
                                <li><a href="used-cars.php?markets=NE" target="_top">Nebraska</a></li>
                                <li><a href="used-cars.php?markets=NV" target="_top">Nevada</a></li>
                                <li><a href="used-cars.php?markets=NH" target="_top">New Hampshire</a></li>
                                <li><a href="used-cars.php?markets=NJ" target="_top">New Jersey</a></li>
                                <li><a href="used-cars.php?markets=NM" target="_top">New Mexico</a></li>
                                <li><a href="used-cars.php?markets=NY" target="_top">New York</a></li>
                                <li><a href="used-cars.php?markets=NC" target="_top">North Carolina</a></li>
                                <li><a href="used-cars.php?markets=ND" target="_top">North Dakota</a></li>
                                <li><a href="used-cars.php?markets=OH" target="_top">Ohio</a></li>
                                <li><a href="used-cars.php?markets=OK" target="_top">Oklahoma</a></li>
                                <li><a href="used-cars.php?markets=OR" target="_top">Oregon</a></li>
                                <li><a href="used-cars.php?markets=PA" target="_top">Pennsylvania</a></li>
                                <li><a href="used-cars.php?markets=RI" target="_top">Rhode Island</a></li>
                                <li><a href="used-cars.php?markets=SC" target="_top">South Carolina</a></li>
                                <li><a href="used-cars.php?markets=SD" target="_top">South Dakota</a></li>
                                <li><a href="used-cars.php?markets=TN" target="_top">Tennessee</a></li>
                                <li><a href="used-cars.php?markets=TX" target="_top">Texas</a></li>
                                <li><a href="used-cars.php?markets=UT" target="_top">Utah</a></li>
                                <li><a href="used-cars.php?markets=VT" target="_top">Vermont</a></li>
                                <li><a href="used-cars.php?markets=VA" target="_top">Virginia</a></li>
                                <li><a href="used-cars.php?markets=WA" target="_top">Washington</a></li>
                                <li><a href="used-cars.php?markets=WV" target="_top">West Virginia</a></li>
                                <li><a href="used-cars.php?markets=WI" target="_top">Wisconsin</a></li>
                                <li><a href="used-cars.php?markets=WY" target="_top">Wyoming</a></li>
                    </ul>

                        
                        
                        </div>
		</td>
        </tr>
</table>
                        
                        

</div>

            
                </div>


<!--==============================footer=================================-->

    <?php include('inc/footer.php'); ?>

</div>

    
</body>
</html>