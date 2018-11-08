<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>JSで撮るスクリーンショット</title>
</head>
<body>
  <h1>JSで撮るスクリーンショット</h1>
  <h2>導入方法</h2>
  <ol>
    <li>html2canvas.jsを読込む</li>
    <li>html2canvas関数を呼ぶ</li>
    <li>onrenderedでSSが書き込まれたcanvasを好きなように使う</li>
  </ol>
  <h2>注意</h2>
  <ul>
    <li>Webサーバーに配置しないとエラーになるかも（firefox30.0でローカルで動作確認）</li>
    <li>このサンプルではブラウザによっては、ダウンロードできないかも</li>
    <li>flashやapplet,iframeはうまくキャプチャできない</li>
  </ul>
  <a href="" id="ss" download="ss.png">スクリーンショット</a>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <script>
    window.onload = function(){
      html2canvas(document.body,{
        onrendered: function(canvas){
          //aタグのhrefにキャプチャ画像のURLを設定
          document.getElementById("ss").href = canvas.toDataURL("image/png");
        }
      });
    }
  </script>
</body>
</html>