<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta name="description" content="jQuery Google Mapのデモでーす。">
<meta name="robots" content="noindex, nofollow">
<title>jQuery Google Map - jQuery Plugin Demo</title>
<script src="//code.jquery.com/jquery-2.0.0.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("maps", "3.4", {
    	other_params: "sensor=false&language=jp"
    });
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClRstxW1WvkxrwyCkU9RI2XX9O10ZsWms"></script>
<script src="http://localhost/study05/assets/js/jquery.googlemap.js"></script>
</head>
<body>
<p><a href="https://webkaru.net/jquery-plugin/jquery-google-map/">「jQueryプラグインまとめ」に戻る</a></p>

<h1>TOKYO 2020</h1>
<div id="map" style="width: 800px; height: 600px;"></div>
<script type="text/javascript">
  $(function() {
    $("#map").googleMap({
      zoom: 15, // Initial zoom level (optional)
      coords: [35.681382, 139.766084], // Map center (optional)
      type: "ROADMAP" // Map type (optional)
    });
  })
</script>
</body>
</html>