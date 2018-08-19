<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="ja" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<!-- JS -->
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js"></script>
<script src="http://localhost/study05/assets/js/jquery.mousewheel.js"></script> 
<script src="http://localhost/study05/assets/js/cropimg.jquery.js"></script> 
<script src="http://localhost/study05/assets/js/jquery.exresize.0.1.0_kagata.js"></script>
<script src="http://localhost/study05/assets/js/jquery.tiny-draggable.js"></script>
<script src="http://localhost/study05/assets/js/jquery.scrolltable.js"></script>
<script src="http://localhost/study05/assets/js/jquery.modern-blink.js"></script>
<script src="http://localhost/study05/assets/js/tr_background_color.js"></script>
<script src="http://localhost/study05/assets/js/jquery.contextmenu.r2.js"></script>
		<script type="text/javascript">
			$(function() {
				/* 例1 */
				$('span.demo1').contextMenu('myMenu1',
				{
					bindings: {
						'open': function(t) {
							alert('Trigger was '+t.id+'\nAction was Open');
						},
						'save': function(t) {
							alert('Trigger was '+t.id+'\nAction was Save');
						},
					}
				});
			});
		</script>
		<style type="text/css">
			span.demo1 {
				background-color:yellow;
				margin-right:20px;
				padding:5px;
			}
			
		</style>
	</head>
	<body id='example3' class='example'>
		<p>
			<span class="demo1" id="demo1_yellow"><b>RIGHT CLICK FOR DEMO</b></span>
			<span class="demo1" id="demo1_green" style="background-color:lightgreen"><b>THIS WORKS TOO</b></span>
		</p>
		<div class="contextMenu" id="myMenu1">
			<ul>
				<li id="open"><img src="http://localhost/study05/assets/img/save_20180713055232.gif" /> Open</li>
				<li id="email"><img src="http://localhost/study05/assets/img/save_20180713055232.gif" /> Email</li>
				<li id="save"><img src="http://localhost/study05/assets/img/upload_20180713082822.gif" /> Save</li>
				<li id="close"><img src="http://localhost/study05/assets/img/upload_20180713082822.gif" /> Close</li>
			</ul>
		</div>
		<!-- / CODE -->
	</body>
</html>