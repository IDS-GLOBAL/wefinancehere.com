// JavaScript Document


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
			.text(window.location = "?markets="+data.name+'');
	        //return false;
	      }
	    },
	    
	    
	    'click' : function(event, data) {
	      $('#alert')
	        .text('No Markets Opened Yet In  '+data.name+' on map 1')
			.text(window.location = "?markets="+data.name+'')
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

	    
	    'click' : function(event, data) {
	      $('#alert')
	        .text('No Markets Opened Yet In '+data.name+' on map 2')
			.text(window.location = "?markets="+data.name+'')			
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