<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
<style>
html { width: 100%; height: 100%; }
body { width: 100%; height: 100%; margin: 0; }
#map { width: 100%; height: 100%; }
</style>
</head>
<body>
<div id="map"></div>
<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script>
//即時関数
(function(){
    "use strict";
    //地図の設定
    var map = L.map('map').setView(
        [30.3748331, 130.9574997],
        14
    );
    //地図タイルの設定
    L.tileLayer(
        'http://{s}.tile.osm.org/{z}/{x}/{y}.png', 
        { attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors' }
    ).addTo(map);
    //markerとpopupの設定
    L.marker(
        [30.3748331, 130.9574997], 
        { title: "marker-title" }
    )
  //以下のコメント部分を有効化してurlなどを指定すればマーカーイメージの変更が可能
  //.setIcon(L.icon({
  //    iconUrl: "http://placehold.jp/cc9999/993333/32x32.png", 
  //    iconAnchor: [16, 16], 
  //    popupAnchor: [0,-16]
  //}))
    .addTo(map)
    .bindPopup("<h3>test</h3><p>hogehoge</p>")
    .openPopup();
}());
</script>
</body>
</html>