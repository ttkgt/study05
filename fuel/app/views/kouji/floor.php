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

		<style type="text/css">
<!--
			@import url("http://black-flag.net/css/reset.css");
-->
			body {
				font-size: 100%;
				line-height: 140%;
				font-family: Arial,Helvetica,sans-serif;
				color: #000;
				text-align: center;
				background: #fff;
			}

			a:link { text-decoration:none; color: #000;}
			a:visited { text-decoration:none; color: #000;}
			a:active { text-decoration:none; color: #000;}
			a:hover { text-decoration:none; color: #000;}

			h1 {
				margin-bottom: 20px;
				padding: 10px 0;
				background: #000;
				color: #fff;
				font-size: 12px;
				font-weight: bold;
				text-align: center;
			}
			h2 {
				padding: 30px 0;
				width: 100%;
				font-size: 12px;
			}

			#container {
				width: 100%;
				height: 800px;
				background-image: url(http://localhost/study05/assets/img/fac_lay11.jpg);
				position: absolute;
				top:  0px;
				left: 0px;
			}

			/* #locatedpoint
			--------------------------- */
			#locatedpoint {
				width: 200px;
				height: 44px;
				background:red;
				padding:4px; /* 内側余白 */
				border:solid 1px #ccc; /* 罫線 */
				border-radius:10px; /* 角丸 */
				line-height: 10px;
				font-size: 10px;
				display: none;
				cursor: default;
				position: absolute;
				overflow: hidden;
			}

			/* #locatedarea
			--------------------------- */
			#locatedarea {
				margin: 0 auto;
				width: 100%;
				height: 400px;
				background: #ccc;
				position: relative;
				overflow: hidden;
			}
			.br::before {
				content: "\A" ;
				white-space: pre ;
			}
			
</style>

</head>
<body>
<p><a href="https://webkaru.net/jquery-plugin/jquery-google-map/">「jQueryプラグインまとめ」に戻る</a></p>

<h1>TOKYO 2020</h1>
<div id="container"></div>
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