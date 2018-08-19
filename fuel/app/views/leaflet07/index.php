<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Leaflet Zoomify Demo</title>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.ie.css" />
    <![endif]-->
    <style type="text/css">
        html, body, #photo {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <div id="photo"></div>
    <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
    <script type="text/javascript" src="http://localhost/study05/assets/js/L.TileLayer.Zoomify.js"></script>  
    <script type="text/javascript">

        var map = L.map('photo').setView(new L.LatLng(0,0), 0);

        L.tileLayer.zoomify('http://thematicmapping.org/playground/zoomify/books/', { 
            width: 5472, 
            height: 3648,
            tolerance: 0.8,
            attribution: 'Photo: Bjørn Sandvik'
        }).addTo(map);

    </script>
</body>
</html>
