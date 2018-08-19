<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="cropimgのデモでーす。">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>cropimg - jQueryプラグイン</title>
<link href="http://localhost/study05/assets/css/cropimg.css" rel="stylesheet" type="text/css" />
<script src="http://localhost/study05/assets/js/jquery-3.3.1.min.js"></script>
<script src="http://localhost/study05/assets/js/jquery.mousewheel.js"></script>
<script src="http://localhost/study05/assets/js/zcropimg.jquery.js"></script>
</head>
<body>
<!--<h1>cropimg デモでーす。</h1>-->
<img src="http://localhost/study05/assets/img/koujyou.jpg" alt="crop img" class="cropimg" />

<script>
$(document).ready(function() {
  $('img.cropimg').cropimg({
	//幅と高さは、ウィンドウの内側の最大とする。
    resultWidth  : window.innerWidth,
    resultHeight : window.innerHeight
  });
});
</script>
</body>
</html>
