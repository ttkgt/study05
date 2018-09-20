<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8"> 
<meta name="description" content="Colorselector のデモでーす。"> 
<title>Colorselector - jQuery Plugin Demo</title> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="http://localhost/study05/assets/js/jquery.colorbox.min.js"></script>
<script> 
jQuery(document).ready(function($){ 
  $("#small-selector").colorbox({ 
    labels: [ '赤', '橙', '黄', '緑', '青', '藍', '紫' ], 
    colors: [ 'E60012', 'F39800', 'FFF100', '009944', '0068B7', '1D2088', '920783'], 
    width: 50, 
    height: 50, 
    top: 0, 
    left: 0, 
    perLine: 4 
  }); 
  $("#small-selector").colorbox('setColorIndex', 1); 
}); 
</script> 
</head> 
<body> 
<h1>Colorselector のデモ。</h1> 
<div style="position: relative;"> 
  <div id="small-selector" style="width: 200px;height: 200px;cursor: pointer;"></div> 
</div> 
<footer style="margin-top:20px"> 
<a href="https://webkaru.net/jquery-plugin/colorselector/">「jQueryプラグインまとめ」に戻る</a> 
</footer> 
</body> 
</html> 
