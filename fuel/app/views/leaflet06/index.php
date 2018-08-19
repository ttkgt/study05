<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://localhost/study05/assets/js/ol.js"></script> <!-- ①openlayerライブラリを指定 -->
<script>
function init_map(){

    // マップのオプション設定
    var options = {
        controls:[
            new ol.Control.Navigation(),
            new ol.Control.ZoomPanel(),
            new ol.Control.Attribution()
        ],
        restrictedExtent:new ol.Bounds(139.7, 35.6, 139.8, 35.8)
                                       .transform(
                                           new ol.Projection("EPSG:4326"),
                                           new ol.Projection("EPSG:900913")
                                       )
    };

    // マップの初期化(オプション付与)
    var map = new ol.Map("canvas", options);
    var mapnik = new ol.Layer.OSM();
    map.addLayer(mapnik);

    var layer_style = ol.Util.extend({}, ol.Feature.Vector.style['default']);

    // 点のプロパティ
    var style_point = {
        strokeColor: "#FF6347",
        fillColor: "#FF6347",
        fillOpacity: 0.2,    // 内側の透明度
        strokeWidth: 4, // 外周の太さ
        pointRadius: 10  // 半径
    };

    var vectorLayer = new ol.Layer.Vector("描画テスト", {style: layer_style});

    // 点の座標を決める
    var point = new ol.Geometry.Point(139.760, 35.680);

    // 座標を変換 ※この処理が新たに必要だった
    point.transform(
        new ol.Projection("EPSG:4326"),
        map.getProjectionObject()
    );
    
    // 点を生成
    var pointFeature = new ol.Feature.Vector(point, null, style_point);

    // レイヤの追加と描画する図の指定
    map.addLayer(vectorLayer);
    vectorLayer.addFeatures([pointFeature]);

    // 地図の中央座標を指定
    var lonLat = new ol.LonLat(139.76, 35.68)
                               .transform(
                                   new ol.Projection("EPSG:4326"),
                                   new ol.Projection("EPSG:900913")
                               );

    // 中央とズーム値を指定
    map.setCenter(lonLat, 15);
}
</script>
</head>
<body onload="init_map()">
<div>サンプル地図コード</div>
<div id="canvas" style="width:320px; height:480px"></div>
</body>
</html>