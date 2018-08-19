<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://localhost/study05/assets/js/ol.js"></script> <!-- ①openlayerライブラリを指定 -->
<script>
var initZoom = 17; // ズームの初期値
var MinZoom = 6;   // ズームの最小値（最も広い範囲）
var MaxZoom = 17;  // ズームの最大値（最も狭い範囲）
function init_map(){

// ②viewを生成する
var view = new ol.View({
projection:"EPSG:3857",
maxZoom: MaxZoom,
minZoom: MinZoom
});

// ③mapを生成する
var map = new ol.Map({
target: document.getElementById('map_canvas'),
layers: [new ol.layer.Tile({source:new ol.source.OSM()})],
view: view,
controls: ol.control.defaults().extend([new ol.control.ScaleLine()])
});

// ④zoom slider の追加
map.addControl(new ol.control.ZoomSlider());

// ⑤地図の中心緯度経度を指定。viewに対して指定する。以下の緯度経度はOIS本社近くを指す。
view.setCenter(ol.proj.transform([139.63333333, 35.456666667], "EPSG:4326", "EPSG:3857"));

// ⑥zoomの指定。viewに対して指定する。
view.setZoom(initZoom);   
}
</script>
</head>
<body onload="init_map()">
<div>サンプル地図コード</div>
<div id="map_canvas" style="width:600px;height:600px">
</body>
</html>