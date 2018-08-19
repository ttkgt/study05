<?php<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps JavaScript API サンプル</title>
    <script type="text/javascript"
      src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!--<script src="./js/code4_1.js" type="text/javascript"></script>-->
	  <script  type="text/javascript">
var map;
var marker1;
var marker2;

function initialize() {
  var latlng = new google.maps.LatLng(33.961942,130.958662);
  var opts = {
    zoom: 14,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map_canvas"), opts);

  var m_latlng1 = new google.maps.LatLng(33.965074,130.952654);
  marker1 = new google.maps.Marker({
    position: m_latlng1
  });

  var m_latlng2 = new google.maps.LatLng(33.958739,130.964155);
  marker2 = new google.maps.Marker({
    position: m_latlng2
  });
}

function doOpen() {
  marker1.setMap(map);
  marker2.setMap(map);
}

function doClose() {
  marker1.setMap(null);
  marker2.setMap(null);
}		  
</script>		  
		  
		  
		  


  </head>
  <body onload="initialize()">
    <p>Google Maps APIを使ったサンプルです。</p>

    <div id="map_canvas" style="width:500px; height:300px"></div>

    <form>
    <p>
    <input type="button" id="open" value="表示" onclick="doOpen()" />
    <input type="button" id="close" value="削除" onclick="doClose()" />
    </p>
    </form>
  </body>
</html>