<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="duration"></div>
    <div id="jarak"></div>
    

        <?php
        $latlon = "-6.216586,106.777567";
        ?>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: -2.600029, lng: 118.015776}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setOptions({
		polylineOptions: {
            strokeWeight: 4,
            strokeOpacity: 1,
            strokeColor:  'blue'
        	}
		});
		directionsDisplay.setOptions( { suppressMarkers: true } );

		var lat;
		var lon;
	    if (navigator.geolocation) {
	       navigator.geolocation.getCurrentPosition(function (pos) {
	        lat = pos.coords.latitude;
	        lon = pos.coords.longitude;

	        directionsService.route({
			   origin: lat+","+lon,
			   destination: "<?php echo $latlon; ?>",
			   travelMode: 'DRIVING',
			}, function(response, status) {
			   if (status === 'OK') {
			        directionsDisplay.setDirections(response);
			        var route = response.routes[0];
					console.log(response.routes[0].legs[0]);
                	duration = response.routes[0].legs[0].duration.text;
                	jarak = response.routes[0].legs[0].distance.text;
            		document.getElementById("duration").innerHTML = duration;
            		document.getElementById("jarak").innerHTML = jarak;
            		createMarker(response.routes[0].legs[0].end_location);
					createMarkerStart(response.routes[0].legs[0].start_location);
			   } else {
			       window.alert('Directions request failed due to ' + status);
			   }
			});
	       });
	   }
	  
	  	function createMarker(position) {
    	var marker = new google.maps.Marker({
		        position: position,
		        map: map,
		        icon: 'img/mark.png'
    		});
		}
		function createMarkerStart(position) {
    	var marker = new google.maps.Marker({
		        position: position,
		        map: map,
		        icon: 'https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png'
    		});
		}
	   
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCu4pNEiS1Y4te3hh-6AN7Lg4JHKhGNEDs&callback=initMap">
    </script>
  </body>
</html>