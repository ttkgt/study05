<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="ja" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="imagetoolbar" content="no" />
		<title>ｆｕｅｌＰＨＰの勉強</title>
		<!-- JS -->
		<!-- jqueryの設定--> 
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="/content/lib/jquery/animatetoselector.jquery.js"></script> 
		<script type="text/javascript">
			$(function(){
				// ▼マウスが載ったらサブメニューを表示
				$("ul.ddmenu li").mouseenter(function(){
					$(this).siblings().find("ul").hide();  // 兄弟要素に含まれるサブメニューを全部消す。
					$(this).children().slideDown(150);     // 自分のサブメニューを表示する。
				});
				// ▼どこかがクリックされたらサブメニューを消す
				$('html').click(function() {
					$('ul.ddmenu ul').slideUp(150);
				});
			});
		</script>  

		<!-- CSS -->
		<!-- CSSの設定を内部に持っている-->
		<style type="text/css">
			ul.ddmenu {
				margin: 0px;               /* メニューバー外側の余白(ゼロ) */
				padding: 0px 0px 0px 15px; /* メニューバー内側の余白(左に15px) */
				background-color: #cc0000; /* バーの背景色(濃い赤色) */
			}
			ul.ddmenu li {
				width: 125px;          /* メニュー項目の横幅(125px) */
				display: inline-block; /* ★横並びに配置する */
				list-style-type: none; /* ★リストの先頭記号を消す */
				position: relative;    /* ★サブメニュー表示の基準位置にする */
			}
			ul.ddmenu a {
				background-color: #cc0000; /* メニュー項目の背景色(濃い赤色) */
				color: white;              /* メニュー項目の文字色(白色) */
				line-height: 40px;         /* メニュー項目のリンクの高さ(40px) */
				text-align: center;        /* メインメニューの文字列の配置(中央寄せ) */
				text-decoration: none;     /* メニュー項目の装飾(下線を消す) */
				font-weight: bold;         /* 太字にする */
				display: block;            /* ★項目内全域をリンク可能にする */
			}
			ul.ddmenu a:hover {
				background-color: #ffdddd; /* メニュー項目にマウスが載ったときの背景色(淡いピンク) */
				color: #dd0000;            /* メニュー項目にマウスが載ったときの文字色(濃い赤色) */
			}
			ul.ddmenu ul {
				margin: 0px;        /* ★サブメニュー外側の余白(ゼロ) */
				padding: 0px;       /* ★サブメニュー内側の余白(ゼロ) */
				display: none;      /* ★標準では非表示にする */
				position: absolute; /* ★絶対配置にする */
			}
			ul.ddmenu ul li {
				width: 135px;               /* サブメニュー1項目の横幅(135px) */
				border-top: 1px solid pink; /* 項目上側の枠線(ピンク色で1pxの実線) */
			}
			ul.ddmenu ul li a {
				line-height: 35px;   /* サブメニュー1項目の高さ(35px) */
				text-align: left;    /* 文字列の配置(左寄せ) */
				padding-left: 5px;   /* 文字列前方の余白(5px) */
				font-weight: normal; /* 太字にはしない */
			}
			ul.ddmenu ul li a:hover {
				background-color: #ffff80; /* サブメニュー項目にマウスが載ったときの背景色(淡い黄色) */
				color: #005500;            /* サブメニュー項目にマウスが載ったときの文字色(濃い緑色) */
			}
			ul.ddmenu ul ul {
				margin: 0px;        /* ★サブメニュー外側の余白(ゼロ) */
				padding: 0px;       /* ★サブメニュー内側の余白(ゼロ) */
				display: none;      /* ★標準では非表示にする */
				position: absolute; /* ★絶対配置にする */
				top: -1px;          /* 1pxだけ上方向にずらす(※上に1pxの枠線を引いている場合) */
				left: 100%;         /* ★基準位置からの距離を親ボックスの幅100％にする */
				border-left: 1px solid pink; /* 左側に引く枠線(ピンク色で1pxの実線) */
			}
		</style>
	</head>
	<body background="http://localhost/study05/assets/img/7074736.jpg">
<!--
		<div id="loading">
	<img src="http://localhost/study05/assets/img/loading.jpg">
</div>
-->
<!-- CODE -->

<ul class="ddmenu">
			<li><a href="#">メニュー01</a></li>
			<!--ニュース-->
			<li><a href="#">メニュー02</a>
				<ul>
					<li><a href="#">メニュー02-01 &raquo;</a>
						<ul>
							<li><a href="#">ハードウェア</a></li>
							<li><a href="#">ソフトウェア</a></li>
						</ul>
					</li>
					<li><a href="#">メニュー02-02</a></li>
					<li><a href="#">メニュー02-03</a></li>
					<li><a href="#">fuelPHP勉強 &raquo;</a>
						<ul>
							<li><a href="#"><?php echo Html::anchor('kouji/index','study05'); ?></a></li>
						</ul>
					</li>
					<li><a href="#">ステップアップ &raquo;</a>
						<ul>
							<li><a href="#"><?php echo Html::anchor('tinyDraggable/index','tinyDraggable'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('boxwrapper/index','boxwrapper'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('locatedarea/index','locatedarea'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('leaflet03/index','OpenLayers'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('exresize/index','exResize'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('cropimg/index','cropimg'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('cropimg2/index','cropimg2'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('cropimg3/index','cropimg3'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('cropimg4/index','cropimg4'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('cropimg4backup/index','cropimg4backup'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('chromeContext/index','chromeContext'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('contextmenu/index','contextmenu'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('test20180831/index','test20180831'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('ax5uimenu/index','ax5uimenu'); ?></a></li>
							<li><a href="#"><?php echo Html::anchor('colorselector/index','colorselector'); ?></a></li>
						</ul>
					</li>
				</ul>
			</li>
			<!--新製品・技術-->
			<li><a href="#">メニュー03</a>
				<ul>
					<li><a href="#">ハードウェア &raquo;</a>
						<ul>
							<li><a href="#">法人向け</a></li>
							<li><a href="#">個人向け</a></li>
						</ul>
					</li>
					<li><a href="#">ソフトウェア &raquo;</a>
						<ul>
							<li><a href="#">for Windows</a></li>
							<li><a href="#">for Mac</a></li>
							<li><a href="#">for Android</a></li>
							<li><a href="#">for iOS</a></li>
							<li><a href="#">その他</a></li>
						</ul>
					</li>
					<li><a href="#">ウェブサービス</a></li>
				</ul>
			</li>
			<!--会社情報-->
			<li><a href="#">メニュー04</a>
				<ul>
					<li><a href="#">会社概要 &raquo;</a>
						<ul>
							<li><a href="#">グループ概要</a></li>
							<li><a href="#">本社概要</a></li>
						</ul>
					</li>
					<li><a href="#">社長挨拶</a></li>
					<li><a href="#">沿革</a></li>
					<li><a href="#">所在地 &raquo;</a>
						<ul>
							<li><a href="#">本社</a></li>
							<li><a href="#">支社</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<!--お問い合わせ-->
			<li><a href="#">メニュー05</a>
				<ul class="sub">
					<li><a href="#">よくあるご質問 &raquo;</a>
						<ul>
							<li><a href="#">サービスに関して</a></li>
							<li><a href="#">弊社に関して</a></li>
							<li><a href="#">その他</a></li>
						</ul>
					</li>
					<li>
						<a href="#">お問い合わせ先 &raquo;</a>
						<ul>
							<li><a href="#">大阪本社</a></li>
							<li><a href="#">支社 &raquo;</a>
								<ul>
									<li><a href="#">神戸支社</a></li>
									<li><a href="#">京都営業所</a></li>
									<li><a href="#">奈良営業所</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
		<!-- / CODE -->
	</body>
</html>
