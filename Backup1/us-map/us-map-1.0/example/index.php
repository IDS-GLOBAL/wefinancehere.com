<!DOCTYPE html>
<html>
<head>
	<title>US Map Demo</title>
	
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
	
	<script src="../lib/raphael.js"></script>
	<!-- <script src="scale.raphael.js"></script> -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>
	<!--script src="jquery/1.6.2/jquery.js"></script -->
	<script src="color.jquery.js"></script>
	<script src="../us-map.js"></script>
	
	<script>
	$(document).ready(function() {
	  $('#map').usmap({
	    'stateSpecificStyles': {
	      'AK' : {fill: '#f00'},
  		  'HI' : {fill: '#f00'},
	      'CA' : {fill: '#f00'},		  
		  'AZ' : {fill: '#f00'},
		  'OR' : {fill: '#f00'},
		  'WA' : {fill: '#f00'},
		  'ID' : {fill: '#f00'},
		  'UT' : {fill: '#f00'},
		  'WY' : {fill: '#f00'},
		  'CO' : {fill: '#f00'},
		  'NM' : {fill: '#f00'},
		  'TX' : {fill: '#f00'},
		  'OK' : {fill: '#f00'},
		  'KS' : {fill: '#f00'},
		  'NE' : {fill: '#f00'},
		  'SD' : {fill: '#f00'},
		  'ND' : {fill: '#f00'},
		  'MT' : {fill: '#f00'},		  
		  'MN' : {fill: '#f00'},
		  'WI' : {fill: '#f00'},
		  'IL' : {fill: '#f00'},
		  'MI' : {fill: '#f00'},
		  'IN' : {fill: '#f00'},
		  'OH' : {fill: '#f00'},
		  'KY' : {fill: '#f00'},
		  'TN' : {fill: '#f00'},
		  'NC' : {fill: '#f00'},
		  'SC' : {fill: '#f00'},
		  'FL' : {fill: '#f00'},
		  'IA' : {fill: '#f00'},
		  'MO' : {fill: '#f00'},
		  'AR' : {fill: '#f00'},
		  'LA' : {fill: '#f00'},
		  'VA' : {fill: '#f00'},
		  'WV' : {fill: '#f00'},
		  'MD' : {fill: '#f00'},
		  'PA' : {fill: '#f00'},
		  'NY' : {fill: '#f00'},
		  'NJ' : {fill: '#f00'},
		  'CT' : {fill: '#f00'},
		  'MA' : {fill: '#f00'},
		  'VT' : {fill: '#f00'},
		  'NH' : {fill: '#f00'},
		  'MA' : {fill: '#f00'},
		  'DE' : {fill: '#f00'},
		  'RI' : {fill: '#f00'},
		  'ME' : {fill: '#f00'},
		  'NV' : {fill: '#f00'}
		  
	    },
	    'stateSpecificHoverStyles': {
	      'AL' : {fill: '#ccc'},
	      'GA' : {fill: '#ccc'},
	      'MS' : {fill: '#ccc'}
	    },
	    
	    'mouseoverState': {
	      'HI' : function(event, data) {
	        //return false;
	      }
	    },
	    
	    
	    'click' : function(event, data) {
	      $('#alert')
	        .text('Click '+data.name+' on map 1')
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
	        .text('Click '+data.name+' on map 2')
	        .stop()
	        .css('backgroundColor', '#af0')
	        .animate({backgroundColor: '#ddd'}, 1000);
	    }
	  });
	  
	  $('#over-md').click(function(event){
	    $('#map').usmap('trigger', 'MD', 'mouseover', event);
	  });
	  
	  $('#out-md').click(function(event){
	    $('#map').usmap('trigger', 'MD', 'mouseout', event);
	  });
	});
	</script>
</head>
<body>

<div id="mapcontain" align="center">

  <div id="alert">Click alerts</div>
  
  <div id="map" style="width: 930px; height: 630px; border: solid 3px red;"></div>
  
  <button id="over-md">mouseover MD</button> <button id="out-md">mouseout MD</button>
  <div id="map2" style="width: 300px; height: 300px;"></div>
</div>
</body>
</html>
