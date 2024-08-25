<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MarkerClusterer v3 Simple Example</title>
    <style >
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
        width: 600px;
      }
      #map {
        width: 600px;
        height: 400px;
      }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYwsd0NKRysnUVB7BOi-4lRd7cq1QwS6Y"></script>
    <!-- script src="jSon/cluster-junk.json"></!-->
    <script src="jSon/map_locations.json.php"></script>
    <script type="text/javascript" src="js/plugin/markercluster/markerclusterer.js"></script>

    <script>
      function initialize() {
        var center = new google.maps.LatLng(33.753746, -84.386330);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var markers = [];
        for (var i = 0; i < 300; i++) {
          var dataPhoto = locations.photos[i];
          var latLng = new google.maps.LatLng(dataPhoto.latitude,
              dataPhoto.longitude);
          var marker = new google.maps.Marker({
            position: latLng
          });
          markers.push(marker);
        }
        var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'img/m'});
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
  </head>
  <body>
    <h3>An example of MarkerClusterer v3</h3>
    <div id="map-container">
      <div id="map"></div>
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
