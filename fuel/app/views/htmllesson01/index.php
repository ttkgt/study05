<!DOCTYPE html>
<html>
<head>
<title>z-index</title>
<style type="text/css">
div {
    padding: 10px;
    font-size: 12px;
}
.z-5 {
    position: relative;
    z-index: 5; /* スタック文脈を形成 */
				width: 06px;
				height: 06px;
				background:red;
				padding:4px; /* 内側余白 */
				border:solid 1px #ccc; /* 罫線 */
				border-radius:4px; /* 角丸 */
				line-height: 1px;
				font-size: 5px;
				/* display: none; */
				cursor: default;
				/* position: absolute; */
				overflow: hidden;
				top: 10px;
				left:10px;
}
.z-2 {
    position: absolute;
    z-index: 2; /* スタック文脈を形成 */
				width: 06px;
				height: 06px;
				background:yellow;
				padding:4px; /* 内側余白 */
				border:solid 1px #ccc; /* 罫線 */
				border-radius:4px; /* 角丸 */
				line-height: 1px;
				font-size: 5px;
				/* display: none; */
				cursor: default;
				/* position: absolute; */
				overflow: hidden;
				top: 15px;
				left:15px;
}
.z-3 {
    position: absolute;
    z-index: 3; /* スタック文脈を形成 */
				width: 06px;
				height: 06px;
				background:yellowgreen;
				padding:4px; /* 内側余白 */
				border:solid 1px #ccc; /* 罫線 */
				border-radius:4px; /* 角丸 */
				line-height: 1px;
				font-size: 5px;
				/* display: none; */
				cursor: default;
				/* position: absolute; */
				overflow: hidden;
				top: 25px;
				left:25px;
}
.z-4 {
    position: absolute;
    z-index: 4; /* スタック文脈を形成 */
    top: 50px;
    left: 100px;
    width: 200px;
    height: 240px;
    background-color: rgba(0,150,0,1);
}
.z-4-1 {
    position: absolute;
    z-index: 1; /* スタック文脈を形成 */
    top: 65px;
    left: 10px;
    width: 100px;
    height: 100px;
    background-color: rgba(0,0,255,1);
}
.z-4-6 {
    position: absolute;
    z-index: 6; /* スタック文脈を形成 */
    top: 55px;
    left: 120px;
    width: 150px;
    height: 150px;
    background-color: rgba(255,255,0,1);
</style>
</head>
<body>
<div class="z-5">.z-5(z-index:5)</div>
<div class="z-2">.z-2(z-index:2)</div>
<div class="z-3">.z-3(z-index:3)</div>
<div class="z-4">
  .z-4(z-index:4)
  <div class="z-4-1">.z-4-1(z-index:1)</div>
  <div class="z-4-6">.z-4-6(z-index:6)</div>
</div></div>
</body>
</html>