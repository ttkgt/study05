<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>exResize :: Demo</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/study05/assets/css/demo_exresize.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost/study05/assets/css/todo.css"/>
		<style>
			h2{
				margin:16px 0 8px 0;
			}
			div.body{
				overflow:hidden;
				zoom:1;
			}
			div.main{
				float:right;
				width:66%;
				overflow:hidden;
			}
			div.sub{
				float:left;
				width:31%;
				overflow:hidden;
				border-right:solid 1px #e0e0e0;
			}
			div.todo-box{
				width:auto;
				display:inline-block;
				/* display:inline; */
				/* zoom:1; */
				border:dotted 2px #557788;
				background:#ffffdd;
			}
			ul.todo{
			}
			ul.log{
				background:#ffffdd;
			}
		</style>
		<script type="text/javascript" src="http://localhost/study05/assets/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="http://localhost/study05/assets/js/jquery.exresize.0.1.0.js"></script>
		<script type="text/javascript" src="http://localhost/study05/assets/js/todo.js"></script>
		<script>
			jQuery(function($){
				$('div.todo-box').exResize(function(){
					alert("exResize");
					//var size = api.getSize();
					//$('ul.log').prepend('<li>height : ' + size.height + '  width : ' + size.width + '</li>')
				})
			});
		</script>
	</head>
	<body>
		<div class="header">
			<h1>exResize :: Demo</h1>
		</div>
		<div class="body">
			<div class="main">
				<h2>resize log</h2>
				<ul class="log"></ul>
			</div>


			<div class="todo sub">
				<h2>TODO</h2>
				<nobr><input class="action" value="JavaScript の勉強"/><button class="add">登録</button></nobr><br/>
				<div class="todo-box">
					LIST
					<ul class="todo">
						<li><a class="del" href="javascript:void(0)">×</a>Java の勉強</li>
						<li><a class="del" href="javascript:void(0)">×</a>Oracle の勉強</li>
						<li><a class="del" href="javascript:void(0)">×</a>jQuery の勉強</li>
					</ul>
				</div>
			</div>



<!--
			<div class="sub">
				<h2>TODO</h2>
				<nobr><input id="action" value="jQuery mobile の勉強"/><button id="add">登録</button></nobr><br/>
				<div class="todo">
					<ul class="todo">
						<li><a class="del" href="javascript:void(0)">×</a>Java の勉強</li>
						<li><a class="del" href="javascript:void(0)">×</a>Oracle の勉強</li>
						<li><a class="del" href="javascript:void(0)">×</a>JavaScript の勉強</li>
					</ul>
				</div>
			</div>
-->
		</div>
		<div class="footer">
			<a class="article" href="http://d.hatena.ne.jp/cyokodog/">Cyokodog::Diary</a>
		</div>
	</body>
</html>
