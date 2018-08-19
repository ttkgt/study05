<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> leaflet tile sample</title>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
</head>
<style>
html, body {
    width: 100%;
    height: 100%;
    margin:0 ;
}
#map {
    width: 100%;
    height: 100%;
}
</style>
<script>
onload = function() { 
    var map = L.map('map',{
        center:[0,0],
        zoom:1,
        crs:L.CRS.Simple,
    });

    var canvasTiles = L.tileLayer.canvas({async:false,continuousWorld:true});
    canvasTiles.drawTile = function(canvas, tilePoint, zoom) {
        var w = Math.pow(2,zoom) ;
        if(tilePoint.x<0 || tilePoint.y<0 || tilePoint.x>=w || tilePoint.y>=w) return ;
        var ctx = canvas.getContext('2d');
        ctx.font = "bold 20px 'Arial'";
        ctx.fillRect(0,0,255,255) ;
        ctx.fillStyle = '#fff';
        ctx.fillText(zoom+"/"+tilePoint.x/w+","+tilePoint.y/w,10,20) ;
        ctx.fillText(zoom+"-"+tilePoint.x+"-"+tilePoint.y,10,50) ;  
    }
    canvasTiles.addTo(map);
    map.on('click', function(e) {
        var c = e.latlng;
        console.log(c.lng/256+"/"+(-c.lat)/256);
    });
}
</script>
<body>
<div id="map"></div>
</body>
</html>