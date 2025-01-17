// JavaScript Document
$(document).ready(function(){



var map;
var Markers = {};
var infowindow;
var locations = [];



        // Create a <script> tag and set the USGS URL as the source.
        var script = document.createElement('script');

        // This example uses a local copy of the GeoJSON stored at
        // 
        script.src = 'jSon/map_locations.php';
        document.getElementsByTagName('head')[0].appendChild(script);





var chicago = {lat: 41.850, lng: -87.650};

/* 
google.maps.event.addDomListener(outer, 'click', function() {
 map.setCenter(chicago) 
});

   */

var origin = new google.maps.LatLng(37.09024, -100.712891);
//var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);




function initialize() {
  var mapOptions = {
    zoom: 5,
    center: origin,
	gestureHandling: 'cooperative',
	mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.TOP_CENTER
    },
	zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.LEFT_CENTER
          },
          scaleControl: true,
          streetViewControl: true,
          streetViewControlOptions: {
              position: google.maps.ControlPosition.LEFT_TOP
          },
    fullscreenControl: true,
	styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
  };

 	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
//var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
		map.addListener('zoom_changed', function() {
          //infowindow.setContent('Zoom: ' + map.getZoom());
        });
		
	var image = 'img/icons/auto-orange-icon.png';

	var infowindow = new google.maps.InfoWindow();

	// Set the map's style to the initial value of the selector.
	var stateSelector = document.getElementById('dma_state');
	var marketSelector = document.getElementById('dma_market');
	
	//map.setOptions({styles: styles[styleSelector.value]});

	// Apply new JSON when the user selects a different style.
	stateSelector.addEventListener('change', function() {
	  ///map.setOptions({styles: styles[stateSelector.value]});
	  //map.setCenter(chicago)
	  
	  console.log('State changed');
	});
	
	
	marketSelector.addEventListener('change', function() {
	  ///map.setOptions({styles: styles[stateSelector.value]});
	  //map.setCenter(chicago)
	  
	  console.log('Market changed');
	});

  // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infowindow.setPosition(pos);
            infowindow.setContent('Location found.');
			map.setZoom(8);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infowindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infowindow, map.getCenter());
        }

    for(i=0; i<locations.length; i++) {
    	var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
		var marker = new google.maps.Marker({
			position: position,
			map: map,
			icon: image
		});

		marker.addListener('click', function() {
			map.setZoom(14);
			map.setCenter(marker.getPosition());
		  });
  
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(locations[i][1]);
				infowindow.setOptions({maxWidth: 300});
				infowindow.open(map, marker);
			}
			
		}) (marker, i));
		Markers[locations[i][4]] = marker;
	}

	locate(0);

}

function locate(marker_id) {
	var myMarker = Markers[marker_id];
	var markerPosition = myMarker.getPosition();
	map.setCenter(markerPosition);
	google.maps.event.trigger(myMarker, 'click');
}

 function handleLocationError(browserHasGeolocation, infowindow, pos) {
        infowindow.setPosition(pos);
        infowindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
}
	  
google.maps.event.addDomListener(window, 'load', initialize);








});