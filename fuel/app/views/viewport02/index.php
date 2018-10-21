<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>「viewport」</title>
<link rel="stylesheet" type="text/css" href="http://localhost/study05/assets/css/viewport.css" />
</head>
<body>
<span id="view_clock"></span>
<script type="text/javascript">
timerID = setInterval('clock()',500); //0.5秒毎にclock()を実行

function clock() {
	document.getElementById("view_clock").innerHTML = getNow();
}

function getNow() {
	var now = new Date();
	var year = now.getFullYear();
	var mon = now.getMonth()+1; //１を足すこと
	var day = now.getDate();
	var hour = now.getHours();
	var min = now.getMinutes();
	var sec = now.getSeconds();

	//出力用
	var s = "現在時刻：" + year + "年" + mon + "月" + day + "日" + hour + "時" + min + "分" + sec + "秒"; 
	return s;
}
</script>	
<br>
	<span class="textVw3">10月22日（月）本日の出荷準備状況<font color="blue">（全体）</font></span>
<br>
<span class="textVw3"  style="border-bottom: solid 1px black;"> 10:05:10時点 </span>
<br><br>
<div class="wrap">
  <table>
  <tr>
    <td class="textVw3" align="center">全出荷件数</td>
    <td class="textVw5" align="right">1,000</td>
    <td class="textVw3" align="center">件</td>
  </tr>
  <tr>
    <td class="textVw3" align="center">実績件数</td>
    <td class="textVw5" align="right">270</td>
    <td class="textVw3" align="center">件</td>
  </tr>
  <tr>
    <td class="textVw3" align="center">達成度</td>
    <td class="textVw5" align="right">27</td>
    <td class="textVw3" align="center">％</td>
  </tr>
</table>
  <table>
  <tr>
    <td class="textVw2" align="center">10時</td>
    <td class="textVw2" align="center">12時</td>
    <td class="textVw2" align="center">15時</td>
    <td class="textVw2" align="center">16時</td>
  </tr>
  <tr>
    <td class="textVw2" align="right">25%</td>
    <td class="textVw2" align="right">50%</td>
    <td class="textVw2" align="right">75%</td>
    <td class="textVw2" align="right">100%</td>
  </tr>
  <tr>
    <td class="textVw2" align="right">20%</td>
    <td class="textVw2" align="right">50%</td>
    <td class="textVw2" align="right">100%</td>
    <td class="textVw2" align="right">100%</td>
  </tr>
</table>

</div></body>
</html>