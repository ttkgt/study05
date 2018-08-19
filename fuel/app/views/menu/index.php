 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="Content-Language" content="ja" />
      <meta http-equiv="Content-Script-Type" content="text/javascript" />
      <meta http-equiv="Content-Style-Type" content="text/css" />
      <meta http-equiv="imagetoolbar" content="no" />
      <title>工事管理</title>
	<!--特に変化なし
      <link rel="stylesheet" type="text/css" href="/content/lib/global.css" />
	-->
<!-- JS -->
<!-- jqueryの設定--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
      <script type="text/javascript" src="/content/lib/jquery/animatetoselector.jquery.js"></script> 
      <script type="text/javascript">
         $(function(){
            $('#navigation a').animateToSelector({
                selectors: ['#navigation a:hover'],
                properties: [
                    'background-color',
                    'padding-left',
                    'color'
                ],
                duration:600,
                events: ['mouseover', 'mouseout']
            });
         });
      </script>
      <!-- CSS -->
	  <!-- CSSの設定を内部に持っている-->
      <style type="text/css">
         #navigation {
             margin:0;  padding:0;
             list-style:none;
             font-size:1.4em;
             width:250px;
         }
         #navigation li {
             margin:0;
             width:100%;
         }
         #navigation a {
            display:block;
            color:#fff;
            text-decoration:none;
            background:#0d9cd7 url(/content/img/gradient.png);
            padding:5px 10px;
            border-top:4px solid white;
            cursor:pointer;
         }
         #navigation a:hover {
            padding-left:30px;
            background-color:#bdd70d;
            color:#222;
         }
         #navigation a span {
            display:block;
            padding-left:25px;
            background:url("/content/img/icon/color/star.gif") no-repeat center left;
         }
      </style>

	  
	  <link rel="stylesheet" type="text/css" href="/common/css/example.css">
	</head>
	
	<body id='example3' class='example'>
		<div class="ads" style="margin:32px auto;text-align:center;">
		</div><h1 class='h'>
		<a href='/'>PHP &amp; JavaScript Room</a> :: 設置サンプル</h1>
	
		<h3 class='h'>実行結果</h3>
		<div id="wrap">
			<!--
			<h1><a href='http://james.padolsey.com/demos/animateToSelector/'>'animateToSelector' jQuery plugin</a> | 設置サンプル</h1
			-->
   <p>▼メニューにマウスオーバーするとアニメーションします。</p>
			<!-- CODE -->
            <ul id="navigation">
                <li id="nav-cal"><a href="#"><span>Calendar</span></a></li>
                <li id="nav-video"><a href="#"><span>Upload Video</span></a></li>
                <li id="nav-post"><?php echo Html::anchor('kouji/index','工事へ'); ?></a></li>
                <li id="nav-note"><?php echo Html::anchor('post/index','ポストへ'); ?></li>
                <li id="nav-mobile"><?php echo Html::anchor('logout/index','ログアウト'); ?></li>
            </ul>
			<!-- / CODE -->
		</div>
	</body>
</html>
