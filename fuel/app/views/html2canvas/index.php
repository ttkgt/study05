<!DOCTYPE html>
<html lang="ja">
<head>
<title>html2canvasテスト</title>
<!--http://hinanaoblog.xyz/?p=434-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<script src="html2canvas.min.js"></script>
<script type="text/javascript">
	function getDisplayImage(){
		//html2canvas実行
		html2canvas(document.getElementById("target")).then(function(canvas) {
			downloadImage(canvas.toDataURL());
		});
	}

	function downloadImage (data) {
		var fname ="testimage.png";
		var encdata= atob(data.replace(/^.*,/, ''));
		var outdata = new Uint8Array(encdata.length);
		for (var i = 0; i < encdata.length; i++) {
			outdata[i] = encdata.charCodeAt(i);
		}
		var blob = new Blob([outdata], ["image/png"]);
		
		if (window.navigator.msSaveBlob) {
			//IE用
			window.navigator.msSaveOrOpenBlob(blob, fname);
		} else {
			//それ以外？
			document.getElementById("getImage").href=data;			//base64そのまま設定
			document.getElementById("getImage").download=fname;		//ダウンロードファイル名設定
			document.getElementById("getImage").click(); 			//自動クリック
		}
	}

	</script>
</head>
	<body>
		<div>
			<input id="downloadImageButton" style="width:120px;" type="button" value="画像保存" onclick="getDisplayImage();" >
			<a id="getImage" href=""  style="display:none;"  download="image.png">画像保存</a>
		</div>
		<hr>

		 <div id="target" style="width:500px;height:500px">
				<img id="work" src="computer_crt_monitor_desktop.png"/>
			</div>
			<div style="position:absolute;z-index:10;font-size:28px;top:150px;left:250px;background-color:#FFFFFF;">仕事中</div>
		</div>
	</body>
</html>