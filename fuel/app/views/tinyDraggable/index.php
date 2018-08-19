<!DOCTYPE html> 
<html> 
<head> 
<meta charset='utf-8'> 
<meta name="description" content="tinyDraggable のデモでーす。"> 
<title>tinyDraggable - jQueryプラグイン</title> 
<style> 
#demo1 { 
	width: 200px;
	height: 44px;
	background:red;
	padding:4px; /* 内側余白 */
	border:solid 1px #ccc; /* 罫線 */
	border-radius:10px; /* 角丸 */
}
.br::before {
	content: "\A" ;
	white-space: pre ;
}
</style> 
</head> 
<body background="http://localhost/study05/assets/img/fac_lay11.jpg"> 
<h1>tinyDraggable のデモでーす。</h1> 
<p> 
<div id="demo1">H-001<span class="br">実績収集ＰＣ</span></div> 
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://localhost/study05/assets/js/jquery.tiny-draggable.js"></script>
<!--
<script src="jquery.tiny-draggable.js"></script> 
-->
<script> 
  $('#demo1').tinyDraggable(); 
</script> 
</body> 
</html> 
