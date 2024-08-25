<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MarkerClusterer v3 Advanced Example</title>

    <style>
      body {
        margin: 0;
        padding: 10px 20px 20px;
        font-family: Arial;
        font-size: 16px;
      }
      #map-container {
        padding: 6px;
        border-width: 1px;
        border-style: solid;
        border-color: #ccc #ccc #999 #ccc;
        -webkit-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        -moz-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        box-shadow: rgba(64, 64, 64, 0.1) 0 2px 5px;
        width: 100%;
      }
      #map-canvas {
        width: 100%;
        height: 600px;
      }
      #actions {
        list-style: none;
        padding: 0;
      }
      #inline-actions {
        padding-top: 10px;
      }
      .item {
        margin-left: 20px;
      }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYwsd0NKRysnUVB7BOi-4lRd7cq1QwS6Y"></script>
    <!-- script src="jSon/cluster-junk.json"></!-->
    <script src="jSon/map_locations.json.php"></script>
    <script type="text/javascript" src="js/plugin/markercluster/markerclusterer.js"></script>

    <script>
      var styles = [[{
        url: './img/people35.png',
        height: 35,
        width: 35,
        anchor: [16, 0],
        textColor: '#ff00ff',
        textSize: 10
      }, {
        url: './img/people45.png',
        height: 45,
        width: 45,
        anchor: [24, 0],
        textColor: '#ff0000',
        textSize: 11
      }, {
        url: './img/people55.png',
        height: 55,
        width: 55,
        anchor: [32, 0],
        textColor: '#ffffff',
        textSize: 12
      }], [{
        url: './img/conv30.png',
        height: 27,
        width: 30,
        anchor: [3, 0],
        textColor: '#ff00ff',
        textSize: 10
      }, {
        url: './img/conv40.png',
        height: 36,
        width: 40,
        anchor: [6, 0],
        textColor: '#ff0000',
        textSize: 11
      }, {
        url: './img/conv50.png',
        width: 50,
        height: 45,
        anchor: [8, 0],
        textSize: 12
      }], [{
        url: './img/heart30.png',
        height: 26,
        width: 30,
        anchor: [4, 0],
        textColor: '#ff00ff',
        textSize: 10
      }, {
        url: './img/heart40.png',
        height: 35,
        width: 40,
        anchor: [8, 0],
        textColor: '#ff0000',
        textSize: 11
      }, {
        url: './img/heart50.png',
        width: 50,
        height: 44,
        anchor: [12, 0],
        textSize: 12
      }], [{
        url: './img/pin.png',
        height: 48,
        width: 30,
        anchor: [-18, 0],
        textColor: '#ffffff',
        textSize: 10,
        iconAnchor: [15, 48]
      }]];

      var markerClusterer = null;
      var map = null;
      var InfoWindow;
      var imageUrl = 'http://chart.apis.google.com/chart?cht=mm&chs=24x32&' +
          'chco=FFFFFF,008CFF,000000&ext=.png';

      function refreshMap() {
        if (markerClusterer) {
          markerClusterer.clearMarkers();
        }

        var markers = [];

        var markerImage = new google.maps.MarkerImage(imageUrl,
          new google.maps.Size(24, 32));
      
         
          
          
        // loop to get dynamic variables from external map locations
        for (var i = 0; i < 324; ++i) {
          var photo_file_url = locations.photos[i].photo_file_url;
          var dealer_token  = locations.photos[i].owner_url;
          var dealer_id  = locations.photos[i].owner_id;
          //console.log('dealer_token: '+dealer_token);
          var lat = locations.photos[i].latitude;
          var lon = locations.photos[i].longitude;

          //console.log('photo_file_url'+photo_file_url);
          var content = locations.photos[i].photo_title;
        
                              
                              addMarker({coords:{lat:lat,lng:lon}});
        }

                              function addMarker(locations){
                                    var marker = new google.maps.Marker({
                                            //position: latLng,
                                            position: locations.coords,
                                            draggable: false,
                                            map: map,
                                           
                                          });
                                          markers.push(marker);

                                          // Check for customicon
                                          if(photo_file_url){
                                            marker.setIcon(photo_file_url)
                                          }

                                          // Check content
                                          if(content){
                                              var InfoWindow = new google.maps.InfoWindow({
                                                  content: '<h2>'+content+'</h2>'+'<a href="dstore.php?token=' +dealer_token+'&sysdealerid=' +dealer_id+'" target="_blank">View Inventory</a>'
                                              });

                                              marker.addListener('click', function(){
                                                InfoWindow.open(map, marker);
                                              });
                                          }
                              }

        

    
        var zoom = parseInt(document.getElementById('zoom').value, 10);
        var size = parseInt(document.getElementById('size').value, 10);
        var style = parseInt(document.getElementById('style').value, 10);
        zoom = zoom === -1 ? null : zoom;
        size = size === -1 ? null : size;
        style = style === -1 ? null: style;

        markerClusterer = new MarkerClusterer(map, markers, {
          maxZoom: zoom,
          gridSize: size,
          styles: styles[style],
          imagePath: './img/m'
        });

        



      }

      function initialize() {
        var options = {
          zoom: 8,
          center: new google.maps.LatLng(33.753746, -84.386330),
          scrollwheel: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP

        }


        // this selects the map
        var element = document.getElementById('map-canvas')
        
        // this shows the map
        map = new google.maps.Map(element, options);

        var refresh = document.getElementById('refresh');
        google.maps.event.addDomListener(refresh, 'click', refreshMap);

        var clear = document.getElementById('clear');
        google.maps.event.addDomListener(clear, 'click', clearClusters);

        

        google.maps.event.addListener(map, 'click', function(e){
          //alert('Click');
          console.log('Clicked: '+e);
        });


        refreshMap();
      }

      function clearClusters(e) {
        e.preventDefault();
        e.stopPropagation();
        markerClusterer.clearMarkers();
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <h3>An example of MarkerClusterer v3</h3>
    <div id="map-container">
      <div id="map-canvas"></div>
    </div>
    <div id="inline-actions">
      <span>Max zoom level:
        <select id="zoom">
          <option value="-1">Default</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
        </select>

      </span>
      <span class="item">Cluster size:
        <select id="size">
          <option value="-1">Default</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="70">70</option>
          <option value="80">80</option>
        </select>
      </span>
      <span class="item">Cluster style:
        <select id="style">
          <option value="-1">Default</option>
          <option value="0">People</option>
          <option value="1">Conversation</option>
          <option value="2">Heart</option>
          <option value="3">Pin</option>
       </select>
       <input id="refresh" type="button" value="Refresh Map" class="item"/>
       <a href="#" id="clear">Clear</a>
    </div>
  </body>
</html>
