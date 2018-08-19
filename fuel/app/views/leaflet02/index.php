<html>
<head>
<title>Leaflet</title>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<style type="text/css">
    #map { height: 500px; with: 500px}
</style>
</head>

<body>
<div id="map" style="width: 600px; height: 400px"></div>
<script>
	 	// We’ll add a tile layer to add to our map, in this case it’s a OSM tile layer.
	 	// Creating a tile layer usually involves setting the URL template for the tile images
	 	var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
	 	    osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	 	    osm = L.tileLayer(osmUrl, {
	 	        maxZoom: 18,
	 	        attribution: osmAttrib
	 	    });

	 	// initialize the map on the "map" div with a given center and zoom
	 	var map = L.map('map').setView([19.04469, 72.9258], 12).addLayer(osm);

	 	// Script for adding marker on map click
	 	function onMapClick(e) {

	 	    var marker = L.marker(e.latlng, {
	 	        draggable: true,
	 	        title: "Resource location",
	 	        alt: "Resource Location",
	 	        riseOnHover: true
	 	    }).addTo(map)
	 	        .bindPopup(e.latlng.toString()).openPopup();

	 	    // Update marker on changing it's position
	 	    marker.on("dragend", function (ev) {

	 	        var chagedPos = ev.target.getLatLng();
	 	        this.bindPopup(chagedPos.toString()).openPopup();

	 	    });
		}

	 	map.on('click', onMapClick);

		function rmMarker() {
			map.removeOverlay(marker);
		}
	</script>

<input type="button" value="マーカー削除" onClick="rmMarker()" />

</body>
</html>