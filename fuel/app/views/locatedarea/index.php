<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>jQuery Located</title>
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-script-type" content="text/javascript" />
<!--左クリックで要素表示で必要-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://localhost/study05/assets/js/jquery.chromeContext.js"></script>
<script type="text/javascript">
$(function(){
	$('html').click(function(e){
		var x = e.pageX;
		var y = e.pageY;
		alert('X = ' + x + 'px, Y = ' + y + 'px');
		if (x <= 1000){
			$('#locatedpoint').css({top:(y),left:(x),display:'block'}).attr('title','TOP : '+(y)+'px | LEFT : '+(x)+'px');
		}else{
			alert('レイアウトから外れています');
		}
	});
	

});
</script>

<!--テーブルの固定見出しと明細の縦スクロール-->
<script>
	$(function(){
		$('.MyTable').scrolltable({
			stripe: true,
			oddClass: 'odd',
			maxHeight: 80
		});
	});
</script>

<!--
<script type="text/javascript">
$(function(){ 
  $('#locatedpoint').chromeContext({ 
    items: [ 
      { title: 'めにゅー①', 
        onclick: function () { console.log('one.'); } }, 
      { title: 'めにゅー②', 
        onclick: function () { console.log('two.'); } }, 
      { title: 'めにゅー③', 
        onclick: function () { console.log('three.'); } }, 
      { title: 'めにゅー④', 
        onclick: function () { console.log('four.'); } } 
    ] 
  }); 
}); 
-->
</script>
		<!-- CSS -->
		<!-- CSSの設定を内部に持っている-->
		<style type="text/css">
/*			@import url("http://black-flag.net/css/reset.css"); */

			body {
				font-size: 100%;
				line-height: 140%;
				font-family: Arial,Helvetica,sans-serif;
				color: #000;
				text-align: center;
				background: #fff;

				background-size:auto;
/*
				background-image: url(http://localhost/study05/assets/img/fac_lay1.jpg);
*/
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
				width: 1000px;
				/* height: 100%; */
			}

			/* #locatedpoint
			--------------------------- */
			#locatedpoint {
				width: 06px;
				height: 06px;
				background:red;
				padding:6px; /* 内側余白 */
				border:solid 1px #ccc; /* 罫線 */
				border-radius:4px; /* 角丸 */
				line-height: 1px;
				font-size: 5px;
				display: none;
				cursor: default;
				position: absolute;
				overflow: hidden;
			}

			/* #locatedarea
			--------------------------- */
			#locatedarea {
				margin: 0 auto;
				width: 1000px;
				height: 500px;
				background: #ccc;
				position: relative;
				overflow: hidden;
			}
			.br::before {
				content: "\A" ;
				white-space: pre ;
			}
			
			p.sample img {
				width: 1000px;  /* 横幅を1000pxに */
				height: 560px;
			}

			table.MyTable{
				width:1000px;
				border:1px solid #ddd;
				font-size: 16px;
			}
			thead{
				background-color: #000;
				color:#fff;
			}
			table.MyTable td{
				text-align:left;
			}
			tr.odd td{
				background-color: #EAEAEA;
			}

			
</style>
</head>

<body> 
<!--
	<h1>jQuery Located</h1>
-->
<!--
<img src="http://localhost/study05/assets/img/fac_lay1.jpg" alt="工場レイアウト" title="工場のレイアウト">
-->


<div id="container">
<p class="sample">
	<img src="http://localhost/study05/assets/img/koujyou.jpg" alt="工場レイアウト" title="工場のレイアウト">
	<span id="locatedpoint">01<span class="br"></span></span>
</p>
	
<!--
<script>
	var target;
	target = document.getElementById('z-2');
	target.style.left = 10px;
	target.style.top  = 10px;
</script>
-->

<div id="z-2" 
	style="	
    position: absolute;
    z-index: 2;
	width: 10px;
	height: 10px;
	background:yellow;
	padding:10px; 
	border:solid 1px #ccc; /* 罫線 */
	border-radius:4px; /* 角丸 */
	line-height: 1px;
	font-size: 5px;
	/* display: none; */
	cursor: default;
	/* position: absolute; */
	overflow: hidden;
	top: 130px;
	left:130px;
	">PC</div>
<div id="z-3" 
	style="	
    position: absolute;
    z-index: 2;
	width: 06px;
	height: 06px;
	background:yellow;
	padding:6px;
	border:solid 1px #ccc; /* 罫線 */
	border-radius:4px; /* 角丸 */
	line-height: 1px;
	font-size: 5px;
	/* display: none; */
	cursor: default;
	/* position: absolute; */
	overflow: hidden;
	top: 220px;
	left:220px;
	">03</div>
<div id="z-4" 
	style="	
    position: absolute;
    z-index: 2;
	width: 06px;
	height: 06px;
	background:yellow;
	padding:6px;
	border:solid 1px #ccc; /* 罫線 */
	border-radius:4px; /* 角丸 */
	line-height: 1px;
	font-size: 5px;
	/* display: none; */
	cursor: default;
	/* position: absolute; */
	overflow: hidden;
	top: 330px;
	left:330px;
	">04</div>
	
	
		<style>
			table.MyTable{
				width:1000px;
				height:50px;
				border:1px solid #ddd;
			}
			thead{
				background-color: #000;
				color:#fff;
			}
			table.MyTable td{
				text-align:left;
			}
			tr.odd td{
				background-color: #EAEAEA;
			}
		</style>
		
	
	
	
<!--	
<div class="z-2">PR</div>
-->

</div><!--/#container-->



<!--
<h2>COPYRIGHT &copy; <a href="http://black-flag.net/">BLACKFLAG.NET</a> ALL RIGHTS RESERVED.</h2>
-->

		<table class="MyTable" cellpadding="0" cellspacing="0" border="0" height="100px">

			<thead>
				<tr>
					<th>ID</th>
					<th>工事番号</th>
					<th>工事名称</th>
					<th>工事種類</th>
					<th>工事状態</th>
					<th>IPアドレス</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td height="16px">aaa</td>
					<td height="16px">bbb</td>
					<td height="16px">ccc</td>
					<td height="16px">ddd</td>
					<td height="16px">eee</td>
					<td height="16px">fff</td>
				</tr>
				<tr>
					<td>aaa</td>
					<td>bbb</td>
					<td>ccc</td>
					<td>ddd</td>
					<td>eee</td>
					<td>fff</td>
				</tr>
				<tr>
					<td>aaa</td>
					<td>bbb</td>
					<td>ccc</td>
					<td>ddd</td>
					<td>eee</td>
					<td>fff</td>
				</tr>
				<tr>
					<td>aaa</td>
					<td>bbb</td>
					<td>ccc</td>
					<td>ddd</td>
					<td>eee</td>
					<td>fff</td>
				</tr>
				<tr>
					<td>aaa</td>
					<td>bbb</td>
					<td>ccc</td>
					<td>ddd</td>
					<td>eee</td>
					<td>fff</td>
				</tr>
				<tr>
					<td>aaa</td>
					<td>bbb</td>
					<td>ccc</td>
					<td>ddd</td>
					<td>eee</td>
					<td>fff</td>
				</tr>
			</tbody>
		</table>
</body>
</html>
