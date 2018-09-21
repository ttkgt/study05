<? php session_start(); ?>
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8"> 
<meta name="description" content="cropimgのデモでーす。"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>cropimg - jQueryプラグイン</title> 
<link href="http://localhost/study05/assets/css/cropimg.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.22/themes/base/jquery-ui.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="screen" href="http://localhost/study05/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="http://localhost/study05/assets/css/ax5menu.css" />

<!-- CSS -->
<!-- CSSの設定を内部に持っている-->
<style type="text/css">

    /* @import url("http://black-flag.net/css/reset.css"); */
    body {
	font-size: 100%;
	line-height: 120%;
	font-family: Arial,Helvetica,sans-serif;
	color: #000;
	text-align: center;
	background: #fff;
	/*visibility: hidden;*/
	overflow: hidden;
    }

    a:link { text-decoration:none; color: #000;}
    a:visited { text-decoration:none; color: #000;}
    a:active { text-decoration:none; color: #000;}
    a:hover { text-decoration:none; color: #000;}

    h1 {
        margin-bottom: 20px;
        /* padding: 10px 0; */
        padding: 2px;
        background: #000;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        position: relative;
        z-index: 10;
    }

    h2 {
		padding: 30px 0;
		width: 100%;
		font-size: 12px;
    }

    #container {
		width: 100%;
		/* height: 400px; */
		height: 100%;
    }

    #locatedarea {
		margin: 0 auto;
		width: 400px;
		height: 400px;
		background: #ccc;
		position: relative;
		/*overflow: hidden;*/
    }

    .br::before {
		content: "\A" ;
		white-space: pre ;
    }

    table.scrollTable{
		width:100%;
		height:100%;
		border:1px solid #ddd;
		font-size: 14px; /* データのフォントサイズ */
		position: relative;
        z-index: 10;
    }

    thead{
		background-color: #000;
		color:#fff;
		font-size: 14px; /* 列見出しのフォントサイズ */
    }

    table.scrollTable td{
		text-align:left;
    }

    tr.odd td{
		background-color: #EAEAEA;
    }

    #kakusu1 { 
		/* width: 100%; */
		/* height: 66px; */
		background:#AAAAAA;
		display: none;
		cursor: default;
		position: absolute;
        z-index: 3;
    }
		
    #kakusu2 { 
		/* width: 100%; */ 
		/* height: 366px; */
		background:#AAAAAA;
		display: none;
		cursor: default;
		position: absolute;
        z-index: 3;
    }
		
    #kakusu3 { 
		/* width: 24%; */ 
		/* height: 100%; */ 
		background:#AAAAAA;
		display: none;
		cursor: default;
		position: absolute;
        z-index: 3;
    }
		
    #kakusu4 { 
		/* width: 24%; */
		/* width: 1%; */
		/* height: 100%; */
		background:#AAAAAA;
		display: none;
		cursor: default;
		position: absolute;
        z-index: 3;
    }
		
    #kakusu5 { 
		/* width: 24%; */
		/* width: 1%; */
		/* height: 100%; */
		background:#00FF00;
		display: none;
		cursor: default;
		position: absolute;
        z-index: 3;
    }

    #kakusu6 { 
		/* width: 24%; */
		/* width: 1%; */
		/* height: 100%; */
		background:#00FF00;
		display: none;
		cursor: default;
		position: absolute;
        z-index: 3;
    }

    label {
		position: relative;
        z-index: 11;
    }

    input {
		position: relative;
        z-index: 11;
    }
	
    

</style>

<!-- 初期状態は非表示 -->
<style type="text/css">body { visibility: hidden; }</style>
<noscript>
<!-- スクリプトが無効な場合は以下の指定がカスケードされる -->
<style type="text/css">body { visibility: visible; }</style>
</noscript>

<!--jQueryとプラグイン-->
<!--
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js"></script>
-->
<!--<script src="http://localhost/study05/assets/js/jquery-3.3.1.min.js"></script>-->
<script src="http://localhost/study05/assets/js/jquery-2.1.1.js"></script>
<script src="http://localhost/study05/assets/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="http://localhost/study05/assets/js/jquery.mousewheel.js"></script> 
<script src="http://localhost/study05/assets/js/zcropimg.jquery.js"></script>
<script src="http://localhost/study05/assets/js/jquery.exresize.0.1.0_kagata.js"></script>
<script src="http://localhost/study05/assets/js/jquery.tiny-draggable.js"></script>
<script src="http://localhost/study05/assets/js/jquery.scrolltable.js"></script>
<script src="http://localhost/study05/assets/js/jquery.modern-blink.js"></script>
<script src="http://localhost/study05/assets/js/tr_background_color.js"></script>
<script src="http://localhost/study05/assets/js/jquery.contextmenu.r2.js"></script>
<script src="http://localhost/study05/assets/js/ax5core.min.js"></script>
<script src="http://localhost/study05/assets/js/ax5menu.min.js"></script>
</head> 
<body> 
<!--<h1>cropimg デモでーす。</h1>-->
<?php if($_SESSION['area'] == '第２工場'){?> 
    <?php if($_SESSION['img_top'] == 0){?> 
            <img src="http://localhost/study05/assets/img/koujou1.png" alt="crop img" class="cropimg">
    <?php }else{?> 
            <img src="http://localhost/study05/assets/img/koujou1.png" alt="crop img"  class="cropimg" style="position:relative; top:<?php echo $_SESSION['img_top'];?>px; left:<?php echo $_SESSION['img_left'];?>px" height="<?php echo $_SESSION['img_height'];?>" width="<?php echo $_SESSION['img_width'];?>">
    <?php }?> 
    <?php }else{?> 
    <?php if($_SESSION['img_top'] == 0){?> 
            <img src="http://localhost/study05/assets/img/koujyou.jpg" alt="crop img" class="cropimg">
    <?php }else{?> 
            <img src="http://localhost/study05/assets/img/koujyou.jpg" alt="crop img"  class="cropimg" style="position:relative; top:<?php echo $_SESSION['img_top'];?>px; left:<?php echo $_SESSION['img_left'];?>px" height="<?php echo $_SESSION['img_height'];?>" width="<?php echo $_SESSION['img_width'];?>">
    <?php }?> 
<?php }?> 

<?php echo Form::open('http://localhost/study05/cropimg4/index');?>
<?php echo Form::label('検索文字 ', 'kensakumoji', array('style' => 'font-size: 14px;'), array('style' => 'z-index:11;'));?>
<?php echo Form::input('kensakumoji', '', array('size'=>20), array('style' => 'font-size: 14px;'), array('style' => 'z-index:11;'));?>
<?php echo Form::submit('submit', '検索', array('class' => 'btn btn-success btn-sm'));?>
<?php echo Form::close();?>

<table class="scrollTable" cellpadding="0" cellspacing="0" border="0">
    <thead>
		<tr>
			<th width="2%" align="center">No</th>
			<th width="5%" align="center">資産番号</th>
			<th width="20%" align="center">資産名</th>
			<th width="20%" align="center">型式・メーカー</th>
			<th width="10%" align="center">設置場所</th>
			<th width="43%" align="center">説明</th>
		</tr>
    </thead>
    <tbody>
	<script>var id         = [];</script>
	<script>var itemCd     = [];</script>
	<script>var itemName   = [];</script>
	<script>var maker      = [];</script>
	<script>var area       = [];</script>
	<script>var comment    = [];</script>
	<script>var itemTop    = [];</script>
	<script>var itemLeft   = [];</script>
	<script>var iconSize   = [];</script>
	<script>var iconColor  = [];</script>
	<?php foreach ($items as $item): ?>		
		<tr>
			<td bgcolor="<?php echo $item->icon_color; ?>"><?php echo $item->id; ?></td>
			<td><?php echo $item->item_cd; ?></td>
			<td><?php echo $item->item_name; ?></td>
			<td><?php echo $item->maker; ?></td>
			<td><?php echo $item->area; ?></td>
			<td><?php echo $item->comment; ?></td>
        </tr>

        <script>id.push('<?php echo $item->id; ?>');</script>
        <script>itemCd.push('<?php echo $item->item_cd; ?>');</script>
        <script>itemName.push('<?php echo $item->item_name; ?>');</script>
        <script>maker.push('<?php echo $item->maker; ?>');</script>
        <script>area.push('<?php echo $item->area; ?>');</script>
        <script>comment.push('<?php echo $item->comment; ?>');</script>
        <script>itemTop.push('<?php echo $item->item_top; ?>');</script>
        <script>itemLeft.push('<?php echo $item->item_left; ?>');</script>
        <script>iconSize.push('<?php echo $item->icon_size; ?>');</script>
        <script>iconColor.push('<?php echo $item->icon_color; ?>');</script>
	<?php endforeach; ?>
            
	<script>sessionStorage.setItem('id',      JSON.stringify(id));</script>
	<script>sessionStorage.setItem('itemCd',  JSON.stringify(itemCd));</script>
	<script>sessionStorage.setItem('itemName',JSON.stringify(itemName));</script>
	<script>sessionStorage.setItem('maker',   JSON.stringify(maker));</script>
	<script>sessionStorage.setItem('area',    JSON.stringify(area));</script>
	<script>sessionStorage.setItem('comment', JSON.stringify(comment));</script>
	<script>sessionStorage.setItem('itemTop', JSON.stringify(itemTop));</script>
	<script>sessionStorage.setItem('itemLeft',JSON.stringify(itemLeft));</script>
	<script>sessionStorage.setItem('iconSize',JSON.stringify(iconSize));</script>
	<script>sessionStorage.setItem('iconColor',JSON.stringify(iconColor));</script>
			
    </tbody>
</table>

<script> 

$(document).ready(function() {
    $('img.cropimg').cropimg({ 
//	resultWidth:800, 
//	resultHeight:600 
//	resultWidth:1600, 
//	resultHeight:900 
//	resultWidth:1366, 
//	resultHeight:768 
//	resultWidth:1920, 
//	resultHeight:1080 
//	resultWidth :1000, 
//	resultHeight:558 
//	resultWidth :950, 
//	resultHeight:530
//      resultWidth :930, 
//      resultHeight:523
//      幅と高さは、ウィンドウの内側の最大とする。
      //resultWidth  : window.innerWidth,
      //resultHeight : window.innerHeight

		resultWidth :<?php echo $_SESSION['resultWidth'];?>, 
        resultHeight:<?php echo $_SESSION['resultHeight'];?>
    }); 
    
    //スクリプトから表示状態を指定する
    $("body").css({ visibility: "visible" });

    //DBの値を変数にセット
    //var $id       = JSON.parse(sessionStorage.getItem('id'));
    var $itemCd    = JSON.parse(sessionStorage.getItem('itemCd'));
    var $itemName  = JSON.parse(sessionStorage.getItem('itemName'));
    var $itemTop   = JSON.parse(sessionStorage.getItem('itemTop'));
    var $itemLeft  = JSON.parse(sessionStorage.getItem('itemLeft'));
    var $iconSize  = JSON.parse(sessionStorage.getItem('iconSize'));
    var $iconColor = JSON.parse(sessionStorage.getItem('iconColor'));

    //初期表示時の背景画像の高さと幅をセッション変数に保存
    sessionStorage.setItem('imgHeight',$('img.cropimg').height());
    sessionStorage.setItem('imgWidth' ,$('img.cropimg').width());

    //各要素の背景画像に対して相対的に表示される位置をセッション変数に保存
    for (let i = 0; i < $itemCd.length; i++){
		sessionStorage.setItem($itemCd[i]+'TopFold' ,parseFloat($itemTop[i]));
		sessionStorage.setItem($itemCd[i]+'LeftFold',parseFloat($itemLeft[i]));
    }

    //スタート時のオフセット値をセッション変数に保存
    var txt = sessionStorage.getItem('startOffsetTop');
    if(txt == null){
    	sessionStorage.setItem('startOffsetTop' ,$('img.cropimg').offset().top);
		sessionStorage.setItem('startOffsetLeft',$('img.cropimg').offset().left);
    }

    //標的要素をＤＢの値で表示するか、画面操作後の値で表示するかを判断
    //ON :画面操作後の値で表示
    //OFF:ＤＢの値で表示
    var reDraw = sessionStorage.getItem('reDraw');
    if(reDraw == null){
        reDraw = 'OFF';
    };

    //セッション変数から標的の要素の値を取得
    if (sessionStorage.getItem('newTopFold')!=null){
        var newTop      = $('img.cropimg').height() * parseFloat(sessionStorage.getItem('newTopFold'))  + $('img.cropimg').offset().top;
        var newLeft     = $('img.cropimg').width()  * parseFloat(sessionStorage.getItem('newLeftFold')) + $('img.cropimg').offset().left;
    }else{
        var newTop      = null;
        var newLeft     = null;
    }
    var targetSize  = sessionStorage.getItem('targetSize');
    var targetColor = sessionStorage.getItem('targetColor');
//alert('000');
//alert(newTop+' '+newLeft+' '+targetSize+' '+targetColor);    

    //新しい要素の存在をセッション変数に保存
    sessionStorage.setItem('newOnOff',"off");
    setTimeout(function(){
		//各要素を再描画（1行目から）
		for (let i = 0; i < $itemCd.length; i++){
            var Top  = $('img.cropimg').height() * parseFloat($itemTop[i])  + $('img.cropimg').offset().top;
			var Left = $('img.cropimg').width()  * parseFloat($itemLeft[i]) + $('img.cropimg').offset().left;
			//$('#'+$itemCd[i]).css({top:Top,left:Left,display:'block'}).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);			
            
            if ($itemCd[i] != '<?php  echo $_SESSION['itemCd'];?>'){            
                $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
            }else{
                if (reDraw=='OFF'){
                    $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                    $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
                }else{
                    if (newTop==null){
                        $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                        $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
                    }else{    
                        $('#'+$itemCd[i]).css('top', newTop);					//top:上からの配置位置（距離）を指定する
                        $('#'+$itemCd[i]).css('left', newLeft);				//left:左からの配置位置（距離）を指定する
                    }
                }            
            }
            $('#'+$itemCd[i]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
            //if (<?php echo $_SESSION['background'];?>=='1'){
            if ($itemCd[i] != '<?php  echo $_SESSION['itemCd'];?>'){            
                if ($iconSize[i]=='1'){
                    $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                }else{
                    $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                }
            }else{
                if (reDraw=='OFF'){
                    if ($iconSize[i]=='1'){
                        $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                    }else{
                        $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                    }
                }else{
                    if (targetSize=='1'){
                        $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                    }else{
                        $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                    }
                }
            }    
            $('#'+$itemCd[i]).css('background','transparent');	//background:背景に関する指定をまとめて行う
			$('#'+$itemCd[i]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
			$('#'+$itemCd[i]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
			$('#'+$itemCd[i]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
			$('#'+$itemCd[i]).css('line-height','6px');			//line-height:行の高さを指定する
			$('#'+$itemCd[i]).css('font-size','14px');			//font-size:フォントのサイズを指定する
			$('#'+$itemCd[i]).css('cursor','default');			//cursor:カーソルの形状を指定する
			$('#'+$itemCd[i]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
			$('#'+$itemCd[i]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
			$('#'+$itemCd[i]).css('text-align','left');			//position:ボックス内の文字を左寄せに指定する
			if ($itemCd[i] == '<?php echo $_SESSION['itemCd'];?>'){
				$('#'+$itemCd[i]).css('z-index','2');			//z-index:重なりの順序を指定する
				//if (<?php echo $_SESSION['background'];?>=='1'){
				//if ($iconSize[i]=='1'){
					//$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
					//$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
				//}else{
					//$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
				//}
				//JSONのnullは""にキャストされている
				//if($itemTop[i] != null && $itemLeft[i] != null){
				if($itemTop[i] != "" && $itemLeft[i] != ""){
					sessionStorage.setItem('newOnOff',"on");
				}
				sessionStorage.setItem('targetI',i);
				//sessionStorage.setItem('targetItemCd',$itemCd[i]);
                if (targetSize==null){
                    sessionStorage.setItem('targetSize',$iconSize[i]);
                }
                if (targetColor==null){
                    sessionStorage.setItem('targetColor',$iconColor[i]);
                }
            }else{
				$('#'+$itemCd[i]).css('z-index','1');
				//if (<?php echo $_SESSION['background'];?>=='1'){
				//if ($iconSize[i]=='1'){
					//$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012657.gif")');
					//$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/yellow001.gif")');
				//}else{
					//$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/yellow001.gif")');
				//}
			}	
			$('#'+$itemCd[i]).css('background-size','cover');
            if ($itemCd[i] != '<?php  echo $_SESSION['itemCd'];?>'){            
                $('#'+$itemCd[i]).css('background-color',$iconColor[i]);
            }else{
                if(reDraw=='OFF'){
                    $('#'+$itemCd[i]).css('background-color',$iconColor[i]);
                }else{
                    $('#'+$itemCd[i]).css('background-color',targetColor);
                }
            }
			$('#'+$itemCd[i]).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
			//if($itemCd[i]=="new"){
			//	if($itemTop[i] != null && $itemLeft[i] != null){
			//		sessionStorage.setItem('newOnOff',"on");
			//	}
			//}
		}

		//要素が画像表示領域を超えると下に隠れないので、無理やり白い要素を置き、
		//要素が隠れるようにした。
		//白い要素がブラウザの幅の伸縮に対応するように計算で幅を求めている。
		//「.css()」　は、CSSの値を動的に変更することができることが分かった。
		//「.attr()」 は、要素にマウスが当たったときの吹き出しの内容である。
		//上
		$('#kakusu1').css({top:0,left:0,display:'block',height:parseFloat(sessionStorage.getItem('startOffsetTop')),width:'100%'})
		//下
		if (<?php echo $_SESSION['background'];?>=='1'){
			$('#kakusu2').css({top:<?php echo $_SESSION['resultHeight'];?> -4
				,left:0,display:'block',height:<?php echo $_SESSION['scrollTableHeight'];?>,width:'100%'})
		}else{
			$('#kakusu2').css({top:window.innerHeight-(parseFloat(sessionStorage.getItem('startOffsetTop')) *2 +4)
				,left:0,display:'block',height:parseFloat(sessionStorage.getItem('startOffsetTop')) *2.4,width:'100%'})
		}
		//左
		$('#kakusu3').css({top:0,left:0,display:'block',height:window.innerHeight,width:parseFloat(sessionStorage.getItem('startOffsetLeft'))})
		//右
		$('#kakusu4').css({top:0,left:window.innerWidth-39,display:'block',height:window.innerHeight,width:39})


		$('#kakusu5').css({top:150,left:window.innerWidth-34,display:'block',height:32,width:32})
        $('#kakusu5').css('background','url("http://localhost/study05/assets/img/save_32_31.png")');

		$('#kakusu6').css({top:188,left:window.innerWidth-34,display:'block',height:32,width:32})
        $('#kakusu6').css('background','url("http://localhost/study05/assets/img/remove_32_32.png")');

},10);
}); 

$(function(){
$('#kakusu5').on('click', function(e) {
    setTimeout(function(){
        //新しく配置された要素の背景画像に対して相対的に表示される位置をDBに保存
				$('<form/>', {action: 'http://localhost/study05/cropimg4/edit', method: 'post'})
				.append($('<input/>', {type: 'hidden', name: 'id'         , value: <?php echo $_SESSION['id'];?>}))
				.append($('<input/>', {type: 'hidden', name: 'item_top'   , value: parseFloat(sessionStorage.getItem('newTopFold'))}))
				.append($('<input/>', {type: 'hidden', name: 'item_left'  , value: parseFloat(sessionStorage.getItem('newLeftFold'))}))
                .append($('<input/>', {type: 'hidden', name: 'icon_size'  , value: sessionStorage.getItem('targetSize')}))
                .append($('<input/>', {type: 'hidden', name: 'icon_color' , value: sessionStorage.getItem('targetColor')}))
			
                .append($('<input/>', {type: 'hidden', name: 'img_top'   , value: $('img.cropimg').offset().top  - parseFloat(sessionStorage.getItem('startOffsetTop'))}))
                .append($('<input/>', {type: 'hidden', name: 'img_left'  , value: $('img.cropimg').offset().left - parseFloat(sessionStorage.getItem('startOffsetLeft'))}))
                .append($('<input/>', {type: 'hidden', name: 'img_height', value: $('img.cropimg').height()}))
                .append($('<input/>', {type: 'hidden', name: 'img_width' , value: $('img.cropimg').width()}))

				.appendTo(document.body)
				.submit();
    },10);
});
});

//$(function() {
//  $("#kakusu5").mouseover(function(){
//	  //alert("ON");
//    //$("p").css("background-color","green");
//		$("#kakusu5").css({top:188,left:window.innerWidth-34,display:'block',height:32,width:32})
//        $("#kakusu5").css('background','url("http://localhost/study05/assets/img/remove_32_32.png")');
//  }).mouseout(function(){
//	  //alert("OUT");
//    //$("p").css("background-color","");
//		$("#kakusu5").css({top:188,left:window.innerWidth-34,display:'block',height:32,width:32})
//        $("#kakusu5").css('background','url("http://localhost/study05/assets/img/save_32_31.png")');
//  });
//});



$(function(){
$('#kakusu6').on('click', function(e) {
    setTimeout(function(){
                // 確認ダイアログの表示
                var result = confirm('除外しますか？');
                if(result){
                    $('#<?php echo $_SESSION['itemCd'];?>').hide(1000);
                    //新しい要素の存在をセッション変数に保存
                    sessionStorage.setItem('newOnOff',"off");
                    sessionStorage.setItem('reDraw','OFF');
                    $('<form/>', {action: 'http://localhost/study05/cropimg4/edit', method: 'post'})
                    .append($('<input/>', {type: 'hidden', name: 'id'       , value: <?php echo $_SESSION['id'];?>}))
                    .append($('<input/>', {type: 'hidden', name: 'item_top' , value: 'null'}))
                    .append($('<input/>', {type: 'hidden', name: 'item_left', value: 'null'}))
                    .append($('<input/>', {type: 'hidden', name: 'icon_size'  , value: 'null'}))
                    .append($('<input/>', {type: 'hidden', name: 'icon_color' , value: 'null'}))
			
                    .append($('<input/>', {type: 'hidden', name: 'img_top'   , value: $('img.cropimg').offset().top  - parseFloat(sessionStorage.getItem('startOffsetTop'))}))
                    .append($('<input/>', {type: 'hidden', name: 'img_left'  , value: $('img.cropimg').offset().left - parseFloat(sessionStorage.getItem('startOffsetLeft'))}))
                    .append($('<input/>', {type: 'hidden', name: 'img_height', value: $('img.cropimg').height()}))
                    .append($('<input/>', {type: 'hidden', name: 'img_width' , value: $('img.cropimg').width()}))

                    .appendTo(document.body)
                    .submit();
                }
    },10);
});
});


$(function(){
    $('img.cropimg').on('click', function(e) {
//alert('001');
    //DBの値を変数にセット
    //var $id       = JSON.parse(sessionStorage.getItem('id'));
    var $itemCd   = JSON.parse(sessionStorage.getItem('itemCd'));
    var $itemName = JSON.parse(sessionStorage.getItem('itemName'));
    var $itemTop  = JSON.parse(sessionStorage.getItem('itemTop'));
    var $itemLeft = JSON.parse(sessionStorage.getItem('itemLeft'));
    var $iconSize = JSON.parse(sessionStorage.getItem('iconSize'));
    var $iconColor = JSON.parse(sessionStorage.getItem('iconColor'));

    var that = this;
    setTimeout(function() {
		//alert("シングルクリック時");
		var dblclick = parseInt($(that).data('double'), 10);
		if (dblclick > 0) {
			$(that).data('double', dblclick-1);
		} else {
			//各要素を再描画
			//alert("$('img.cropimg').offset().top:" + $('img.cropimg').offset().top + "  $('img.cropimg').offset().left:" + $('img.cropimg').offset().left);
			for (let i = 0; i < $itemCd.length; i++){
				//JSONのnullは""にキャストされている
				//if (parseFloat($itemTop[i])!=null || parseFloat($itemLeft[i])!=null){
				if ($itemTop[i] != "" || $itemLeft[i] != ""){
					var Top  = $('img.cropimg').height() * parseFloat($itemTop[i])  + $('img.cropimg').offset().top;
					var Left = $('img.cropimg').width()  * parseFloat($itemLeft[i]) + $('img.cropimg').offset().left;
					//$('#'+$itemCd[i]).css({top:Top,left:Left,display:'block'}).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
					$('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
					$('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
					$('#'+$itemCd[i]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
					//if (<?php echo $_SESSION['background'];?>=='1'){
					if ($iconSize[i]=='1'){
						$('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
						$('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
					}else{
						$('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
						$('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
					}
					$('#'+$itemCd[i]).css('background','transparent');	//background:背景に関する指定をまとめて行う
					$('#'+$itemCd[i]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
					$('#'+$itemCd[i]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
					$('#'+$itemCd[i]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
					$('#'+$itemCd[i]).css('line-height','6px');			//line-height:行の高さを指定する
					$('#'+$itemCd[i]).css('font-size','14px');			//font-size:フォントのサイズを指定する
					$('#'+$itemCd[i]).css('cursor','default');			//cursor:カーソルの形状を指定する
					$('#'+$itemCd[i]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
					$('#'+$itemCd[i]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
					$('#'+$itemCd[i]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
					if ($itemCd[i] == '<?php  echo $_SESSION['itemCd'];?>'){
						$('#'+$itemCd[i]).css('z-index','2');
						//if (<?php echo $_SESSION['background'];?>=='1'){
						//if ($iconSize[i]=='1'){
						//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
						//}else{
						//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
						//}
						//JSONのnullは""にキャストされている
						//if($itemTop[i] != null && $itemLeft[i] != null){
						if($itemTop[i] != "" && $itemLeft[i] != ""){
							sessionStorage.setItem('newOnOff',"on");
						}
					}else{
						$('#'+$itemCd[i]).css('z-index','1');
						//if (<?php echo $_SESSION['background'];?>=='1'){
						//if ($iconSize[i]=='1'){
						//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012657.gif")');
						//}else{
						//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/yellow001.gif")');
						//}
					}	
					$('#'+$itemCd[i]).css('background-size','cover');
        			$('#'+$itemCd[i]).css('background-color',$iconColor[i]);
					$('#'+$itemCd[i]).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
					//if($itemCd[i]=="new"){
					//	if($itemTop[i] != null && $itemLeft[i] != null){
					//		sessionStorage.setItem('newOnOff',"on");
					//	}
					//}
				}
			}
		}
    }, 250);
//ダブルクリックされたら新しい要素を発生させる
}).dblclick(function(e) {
//alert('002');
    //alert("ダブルクリック時");
    $(this).data('double', 2);
    //alert('ダブルクリック');
    //新しい要素の存在をセッション変数に保存
    sessionStorage.setItem('newOnOff',"on");
    //マウスの位置
    var y = e.pageY;
    var x = e.pageX;
    //新しく配置された要素の背景画像に対して相対的に表示される位置をセッション変数に保存
    sessionStorage.setItem('newTopFold' ,(y - $('img.cropimg').offset().top)  / $('img.cropimg').height());
    sessionStorage.setItem('newLeftFold',(x - $('img.cropimg').offset().left) / $('img.cropimg').width());
    //新しい要素を描画
    //$('#new').css({top:(y),left:(x),display:'block'}).attr('title','資産番号 : '+$itemCd[0]+' 資産名 : '+$itemName[0]);
    var $targetI = sessionStorage.getItem('targetI');
    //DBの値を変数にセット
    var $itemCd   = JSON.parse(sessionStorage.getItem('itemCd'));
    $('#'+$itemCd[$targetI]).css('top', y);						//top:上からの配置位置（距離）を指定する
    $('#'+$itemCd[$targetI]).css('left', x);					//left:左からの配置位置（距離）を指定する
    $('#'+$itemCd[$targetI]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
    //if (<?php echo $_SESSION['background'];?>=='1'){
    if ($iconSize[i]=='1'){
		$('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
    	$('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
    }else{
		$('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
		$('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
    }
    $('#'+$itemCd[$targetI]).css('background','transparent');	//background:背景に関する指定をまとめて行う
    $('#'+$itemCd[$targetI]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
    $('#'+$itemCd[$targetI]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
    $('#'+$itemCd[$targetI]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
    $('#'+$itemCd[$targetI]).css('line-height','6px');			//line-height:行の高さを指定する
    $('#'+$itemCd[$targetI]).css('font-size','14px');			//font-size:フォントのサイズを指定する
    $('#'+$itemCd[$targetI]).css('cursor','default');			//cursor:カーソルの形状を指定する
    $('#'+$itemCd[$targetI]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
    $('#'+$itemCd[$targetI]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
    $('#'+$itemCd[$targetI]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
    $('#'+$itemCd[$targetI]).css('z-index','2');
    //if (<?php echo $_SESSION['background'];?>=='1'){
    //if ($iconSize[i]=='1'){
	//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
    //}else{
	//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
    //}
    $('#'+$itemCd[$targetI]).css('background-size','cover');
    $('#'+$itemCd[$targetI]).css('background-color',$iconColor[i]);
    $('#'+$itemCd[$targetI]).attr('title','資産番号 : '+$itemCd[$targetI]+' 資産名 : '+$itemName[$targetI]);
});
	
//マウスホイールのイベントを取得	
//	$('img.cropimg').bind('DOMMouseScroll mousewheel', function(e){
//		//各要素の背景画像に対して相対的に表示される位置を計算
//		if(e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
//            //alert("up");
//        }
//        else{
//            //alert("down");
//		}
//	});	


//	$(function(){
//背景画像のサイズが変わったとき
$('img.cropimg').exResize(function(){
//alert('003');
    //DBの値を変数にセット
    //var $id       = JSON.parse(sessionStorage.getItem('id'));
    var $itemCd   = JSON.parse(sessionStorage.getItem('itemCd'));
    var $itemName = JSON.parse(sessionStorage.getItem('itemName'));
    var $itemTop  = JSON.parse(sessionStorage.getItem('itemTop'));
    var $itemLeft = JSON.parse(sessionStorage.getItem('itemLeft'));
    var $iconSize = JSON.parse(sessionStorage.getItem('iconSize'));
    var $iconColor = JSON.parse(sessionStorage.getItem('iconColor'));
		
    //背景移動時の要素のズレ防止のため、0.01秒の遅れを発生させる
    setTimeout(function(){
        //alert("背景画像のサイズが変わった時");
        //各要素を再描画
        for (let i = 0; i < $itemCd.length; i++){
            //JSONのnullは""にキャストされている
        	//if (parseFloat($itemTop[i])!=null || parseFloat($itemLeft[i])!=null){
            if ($itemTop[i] != "" || $itemLeft[i] != ""){
                var Top  = $('img.cropimg').height() * parseFloat($itemTop[i])  + $('img.cropimg').offset().top;
                var Left = $('img.cropimg').width()  * parseFloat($itemLeft[i]) + $('img.cropimg').offset().left;
                //$('#'+$itemCd[i]).css({top:Top,left:Left,display:'block'}).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
                $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
                $('#'+$itemCd[i]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
                //if (<?php echo $_SESSION['background'];?>=='1'){
                if ($iconSize[i]=='1'){
                    $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                }else{
                    $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                }
                $('#'+$itemCd[i]).css('background','transparent');	//background:背景に関する指定をまとめて行う
                $('#'+$itemCd[i]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
                $('#'+$itemCd[i]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
                $('#'+$itemCd[i]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
                $('#'+$itemCd[i]).css('line-height','6px');			//line-height:行の高さを指定する
                $('#'+$itemCd[i]).css('font-size','14px');			//font-size:フォントのサイズを指定する
                $('#'+$itemCd[i]).css('cursor','default');			//cursor:カーソルの形状を指定する
                $('#'+$itemCd[i]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
                $('#'+$itemCd[i]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
                $('#'+$itemCd[i]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
                if ($itemCd[i] == '<?php  echo $_SESSION['itemCd'];?>'){
                    $('#'+$itemCd[i]).css('z-index','2');
                    //if (<?php echo $_SESSION['background'];?>=='1'){
                    //if ($iconSize[i]=='1'){
                    //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
                    //}else{
                    //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
                    //}
                    //JSONのnullは""にキャストされている
                    //if($itemTop[i] != null && $itemLeft[i] != null){
                    if($itemTop[i] != "" && $itemLeft[i] != ""){
                        sessionStorage.setItem('newOnOff',"on");
                    }
                }else{
                    $('#'+$itemCd[i]).css('z-index','1');
                    //if (<?php echo $_SESSION['background'];?>=='1'){
                    //if ($iconSize[i]=='1'){
                    //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012657.gif")');
                    //}else{
                    //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/yellow001.gif")');
                    //}
                }	
                $('#'+$itemCd[i]).css('background-size','cover');
       			$('#'+$itemCd[i]).css('background-color',$iconColor[i]);
                $('#'+$itemCd[i]).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
                //if($itemCd[i]=="new"){
                //	if($itemTop[i] != null && $itemLeft[i] != null){
                //		sessionStorage.setItem('newOnOff',"on");
                //	}
                //}
            }
        }
        //新規追加要素が存在する場合のみ新規追加要素を移動させる
        var newOnOff = sessionStorage.getItem('newOnOff');
        if(newOnOff == "on") {
            var newTop      = $('img.cropimg').height() * parseFloat(sessionStorage.getItem('newTopFold'))  + $('img.cropimg').offset().top;
            var newLeft     = $('img.cropimg').width()  * parseFloat(sessionStorage.getItem('newLeftFold')) + $('img.cropimg').offset().left;
            //$('#new').css({top:newTop,left:newLeft,display:'block'}).attr('title','資産番号 : '+$itemCd[0]+' 資産名 : '+$itemName[0]);
            var $targetI = sessionStorage.getItem('targetI');
            $('#'+$itemCd[$targetI]).css('top', newTop);				//top:上からの配置位置（距離）を指定する
            $('#'+$itemCd[$targetI]).css('left', newLeft);				//left:左からの配置位置（距離）を指定する
            $('#'+$itemCd[$targetI]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
            //if (<?php echo $_SESSION['background'];?>=='1'){
            if ($iconSize[i]=='1'){
                $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
            }else{
                $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
            }
            $('#'+$itemCd[$targetI]).css('background','transparent');	//background:背景に関する指定をまとめて行う
            $('#'+$itemCd[$targetI]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
            $('#'+$itemCd[$targetI]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
            $('#'+$itemCd[$targetI]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
            $('#'+$itemCd[$targetI]).css('line-height','6px');			//line-height:行の高さを指定する
            $('#'+$itemCd[$targetI]).css('font-size','14px');			//font-size:フォントのサイズを指定する
            $('#'+$itemCd[$targetI]).css('cursor','default');			//cursor:カーソルの形状を指定する
            $('#'+$itemCd[$targetI]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
            $('#'+$itemCd[$targetI]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
            $('#'+$itemCd[$targetI]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
            $('#'+$itemCd[$targetI]).css('z-index','2');
            //if (<?php echo $_SESSION['background'];?>=='1'){
            //if ($iconSize[i]=='1'){
            //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
            //}else{
            //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
            //}
            $('#'+$itemCd[$targetI]).css('background-size','cover');
   			$('#'+$itemCd[$targetI]).css('background-color',$iconColor[i]);
            $('#'+$itemCd[$targetI]).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
        }
    },10);
});
//	});

//新規追加要素を移動させるときの再描画を防止する為、新規追加要素画像上でマウスが下げられたことを検知
$('#<?php  echo $_SESSION['itemCd'];?>').mousedown(function(){
//alert('004');
    //背景移動時の要素のズレ防止のため、0.01秒の遅れを発生させる
    setTimeout(function(){
    //alert("新規追加画像の上でマウスが下げられた時");
        sessionStorage.setItem('newUpDown',"down");
    },10);
});

//新規追加要素を移動させるときの再描画を防止する為、新規追加要素画像上でマウスが上げられたことを検知
$('#<?php  echo $_SESSION['itemCd'];?>').mouseup(function(e){
//alert('005');
        //左クリックのときだけ
    if(e.which == 1){ 
	//背景移動時の要素のズレ防止のため、0.01秒の遅れを発生させる
	setTimeout(function(){
        //alert("新規追加要素画像上でマウスを上げた時");
        sessionStorage.setItem('newUpDown',"up");
        //新規追加要素の位置
        var off = $('#<?php  echo $_SESSION['itemCd'];?>').offset();
        var y = off.top;
        var x = off.left;		

        //新しく配置された要素の背景画像に対して相対的に表示される位置をセッション変数に保存
        sessionStorage.setItem('newTopFold' ,(y - $('img.cropimg').offset().top)  / $('img.cropimg').height());
        sessionStorage.setItem('newLeftFold',(x - $('img.cropimg').offset().left) / $('img.cropimg').width());

        //新しく配置された要素の背景画像に対して相対的に表示される位置をDBに保存
        //$('<form/>', {action: 'http://localhost/study05/cropimg4/edit', method: 'post'})
        //.append($('<input/>', {type: 'hidden', name: 'id'        , value: <?php echo $_SESSION['id'];?>}))
        //.append($('<input/>', {type: 'hidden', name: 'item_top'  , value: parseFloat(sessionStorage.getItem('newTopFold'))}))
        //.append($('<input/>', {type: 'hidden', name: 'item_left' , value: parseFloat(sessionStorage.getItem('newLeftFold'))}))

        //.append($('<input/>', {type: 'hidden', name: 'img_top'   , value: $('img.cropimg').offset().top  - parseFloat(sessionStorage.getItem('startOffsetTop'))}))
        //.append($('<input/>', {type: 'hidden', name: 'img_left'  , value: $('img.cropimg').offset().left - parseFloat(sessionStorage.getItem('startOffsetLeft'))}))
        //.append($('<input/>', {type: 'hidden', name: 'img_height', value: $('img.cropimg').height()}))
        //.append($('<input/>', {type: 'hidden', name: 'img_width' , value: $('img.cropimg').width()}))

        //.append($('<input/>', {type: 'hidden', name: 'icon_size'  , value: sessionStorage.getItem('targetSize')}))
        //.append($('<input/>', {type: 'hidden', name: 'icon_color' , value: sessionStorage.getItem('targetColor')}))

        //.appendTo(document.body)
        //.submit();
        },10);
    }
});
		
//背景画像上でマウスが下げられたことを検知
$('img.cropimg').mousedown(function(){
//alert('006');
        //背景移動時の要素のズレ防止のため、0.01秒の遅れを発生させる
    setTimeout(function(){
        //alert("背景画像上でマウスを下げた時");
		sessionStorage.setItem('mouseUpDown',"down");
    },10);
});

//背景画像を移動させたとき、多少のズレが生じるのでマウスを離したときに再表示させる
$('html').mouseup(function(){
//alert('007');
    //DBの値を変数にセット
    //var $id       = JSON.parse(sessionStorage.getItem('id'));
    //var $itemCd    = JSON.parse(sessionStorage.getItem('itemCd'));
    //var $itemName  = JSON.parse(sessionStorage.getItem('itemName'));
    //var $itemTop   = JSON.parse(sessionStorage.getItem('itemTop'));
    //var $itemLeft  = JSON.parse(sessionStorage.getItem('itemLeft'));
    //var $iconSize  = JSON.parse(sessionStorage.getItem('iconSize'));
    //var $iconColor = JSON.parse(sessionStorage.getItem('iconColor'));

//reDraw();





//================================================================================
    //セッション変数から標的の要素の値を取得
    var newTop      = $('img.cropimg').height() * parseFloat(sessionStorage.getItem('newTopFold'))  + $('img.cropimg').offset().top;
    var newLeft     = $('img.cropimg').width()  * parseFloat(sessionStorage.getItem('newLeftFold')) + $('img.cropimg').offset().left;
    var targetSize  = sessionStorage.getItem('targetSize');
    var targetColor = sessionStorage.getItem('targetColor');
    
    //背景移動時の要素のズレ防止のため、0.01秒の遅れを発生させる
    setTimeout(function(){
		//alert("背景画像上でマウスを上げた時");
		sessionStorage.setItem('mouseUpDown',"up");

		//各要素を再描画（1行目から）
		for (let i = 0; i < $itemCd.length; i++){
            var Top  = $('img.cropimg').height() * parseFloat($itemTop[i])  + $('img.cropimg').offset().top;
			var Left = $('img.cropimg').width()  * parseFloat($itemLeft[i]) + $('img.cropimg').offset().left;
            
            if ($itemCd[i] != '<?php  echo $_SESSION['itemCd'];?>'){            
                $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
            }else{
                if (reDraw=='OFF'){
                    $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                    $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
                }else{
                    if (newTop==null){
                        $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                        $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
                    }else{    
                        $('#'+$itemCd[i]).css('top', newTop);					//top:上からの配置位置（距離）を指定する
                        $('#'+$itemCd[i]).css('left', newLeft);				//left:左からの配置位置（距離）を指定する
                    }
                }            
            }
            $('#'+$itemCd[i]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
            if ($itemCd[i] != '<?php  echo $_SESSION['itemCd'];?>'){            
                if ($iconSize[i]=='1'){
                    $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                }else{
                    $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                }
            }else{
                if (reDraw=='OFF'){
                    if ($iconSize[i]=='1'){
                        $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                    }else{
                        $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                    }
                }else{
                    if (targetSize=='1'){
                        $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                    }else{
                        $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                    }
                }
            }    
            $('#'+$itemCd[i]).css('background','transparent');	//background:背景に関する指定をまとめて行う
			$('#'+$itemCd[i]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
			$('#'+$itemCd[i]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
			$('#'+$itemCd[i]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
			$('#'+$itemCd[i]).css('line-height','6px');			//line-height:行の高さを指定する
			$('#'+$itemCd[i]).css('font-size','14px');			//font-size:フォントのサイズを指定する
			$('#'+$itemCd[i]).css('cursor','default');			//cursor:カーソルの形状を指定する
			$('#'+$itemCd[i]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
			$('#'+$itemCd[i]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
			$('#'+$itemCd[i]).css('text-align','left');			//position:ボックス内の文字を左寄せに指定する
			if ($itemCd[i] == '<?php echo $_SESSION['itemCd'];?>'){
				$('#'+$itemCd[i]).css('z-index','2');			//z-index:重なりの順序を指定する
				if($itemTop[i] != "" && $itemLeft[i] != ""){
					sessionStorage.setItem('newOnOff',"on");
				}
				sessionStorage.setItem('targetI',i);
                if (targetSize==null){
                    sessionStorage.setItem('targetSize',$iconSize[i]);
                }
                if (targetColor==null){
                    sessionStorage.setItem('targetColor',$iconColor[i]);
                }
			}else{
				$('#'+$itemCd[i]).css('z-index','1');
			}	
			$('#'+$itemCd[i]).css('background-size','cover');
            if ($itemCd[i] != '<?php  echo $_SESSION['itemCd'];?>'){  
                $('#'+$itemCd[i]).css('background-color',$iconColor[i]);
            }else{
                if(reDraw=='OFF'){
                    $('#'+$itemCd[i]).css('background-color',$iconColor[i]);
                }else{
                    $('#'+$itemCd[i]).css('background-color',targetColor);
                }
            }
			$('#'+$itemCd[i]).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
		}
//================================================================================


		//各要素を再描画
		//for (let i = 0; i < $itemCd.length; i++){
        //    //JSONのnullは""にキャストされている
        //    //if (parseFloat($itemTop[i])!=null || parseFloat($itemLeft[i])!=null){
        //    if ($itemTop[i] != "" || $itemLeft[i] != ""){
		//		var Top  = $('img.cropimg').height() * parseFloat($itemTop[i])  + $('img.cropimg').offset().top;
		//		var Left = $('img.cropimg').width()  * parseFloat($itemLeft[i]) + $('img.cropimg').offset().left;
		//		//$('#'+$itemCd[i]).css({top:Top,left:Left,display:'block'}).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
		//		$('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
		//		$('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
		//		$('#'+$itemCd[i]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
		//		//if (<?php echo $_SESSION['background'];?>=='1'){
		//		if ($iconSize[i]=='1'){
		//			$('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
		//			$('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
		//		}else{
		//			$('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
		//			$('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
		//		}
		//		$('#'+$itemCd[i]).css('background','transparent');	//background:背景に関する指定をまとめて行う
		//		$('#'+$itemCd[i]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
		//		$('#'+$itemCd[i]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
		//		$('#'+$itemCd[i]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
		//		$('#'+$itemCd[i]).css('line-height','6px');			//line-height:行の高さを指定する
		//		$('#'+$itemCd[i]).css('font-size','14px');			//font-size:フォントのサイズを指定する
		//		$('#'+$itemCd[i]).css('cursor','default');			//cursor:カーソルの形状を指定する
		//		$('#'+$itemCd[i]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
		//		$('#'+$itemCd[i]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
		//		$('#'+$itemCd[i]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
		//		if ($itemCd[i] == '<?php  echo $_SESSION['itemCd'];?>'){
        //            $('#'+$itemCd[i]).css('z-index','2');
        //            //if (<?php echo $_SESSION['background'];?>=='1'){
        //            //if ($iconSize[i]=='1'){
		//			//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
        //            //}else{
		//			//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
        //            //}
        //            //JSONのnullは""にキャストされている
        //            //if($itemTop[i] != null && $itemLeft[i] != null){
        //            if($itemTop[i] != "" && $itemLeft[i] != ""){
		//				sessionStorage.setItem('newOnOff',"on");
        //            }
        //        }else{
        //            $('#'+$itemCd[i]).css('z-index','1');
        //            //if (<?php echo $_SESSION['background'];?>=='1'){
        //            //if ($iconSize[i]=='1'){
		//			//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012657.gif")');
        //            //}else{
		//			//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/yellow001.gif")');
        //            //}
		//		}	
		//		$('#'+$itemCd[i]).css('background-size','cover');
       	//		$('#'+$itemCd[i]).css('background-color',$iconColor[i]);
		//		$('#'+$itemCd[i]).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
		//		//if($itemCd[i]=="new"){
		//		//	if($itemTop[i] != null && $itemLeft[i] != null){
		//		//		sessionStorage.setItem('newOnOff',"on");
		//		//	}
		//		//}
        //    }
		//}

		//新規追加要素が存在する場合のみ新規追加要素を移動させる
		//var newOnOff = sessionStorage.getItem('newOnOff');
		//if(newOnOff == "on") {
        //    var newTop      = $('img.cropimg').height() * parseFloat(sessionStorage.getItem('newTopFold'))  + $('img.cropimg').offset().top;
        //    var newLeft     = $('img.cropimg').width()  * parseFloat(sessionStorage.getItem('newLeftFold')) + $('img.cropimg').offset().left;
        //    //$('#new').css({top:newTop,left:newLeft,display:'block'}).attr('title','資産番号 : '+$itemCd[0]+' 資産名 : '+$itemName[0]);
        //    var $targetI = sessionStorage.getItem('targetI');
        //    $('#'+$itemCd[$targetI]).css('top', newTop);				//top:上からの配置位置（距離）を指定する
        //    $('#'+$itemCd[$targetI]).css('left', newLeft);				//left:左からの配置位置（距離）を指定する
        //    $('#'+$itemCd[$targetI]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
        //    //if (<?php echo $_SESSION['background'];?>=='1'){
        //    if ($iconSize[i]=='1'){
        //   	$('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
		//		$('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
        //    }else{
		//		$('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
        //        $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
        //    }
        //    $('#'+$itemCd[$targetI]).css('background','transparent');	//background:背景に関する指定をまとめて行う
        //    $('#'+$itemCd[$targetI]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
        //    $('#'+$itemCd[$targetI]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
        //    $('#'+$itemCd[$targetI]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
        //    $('#'+$itemCd[$targetI]).css('line-height','6px');			//line-height:行の高さを指定する
        //    $('#'+$itemCd[$targetI]).css('font-size','14px');			//font-size:フォントのサイズを指定する
        //    $('#'+$itemCd[$targetI]).css('cursor','default');			//cursor:カーソルの形状を指定する
        //    $('#'+$itemCd[$targetI]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
        //    $('#'+$itemCd[$targetI]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
        //    $('#'+$itemCd[$targetI]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
        //    $('#'+$itemCd[$targetI]).css('z-index','2');
        //    //if (<?php echo $_SESSION['background'];?>=='1'){
        //    //if ($iconSize[i]=='1'){
		//	//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
        //    //}else{
		//	//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
        //    //}
        //    $('#'+$itemCd[$targetI]).css('background-size','cover');
   		//	$('#'+$itemCd[$targetI]).css('background-color',$iconColor[i]);
        //    $('#'+$itemCd[$targetI]).attr('title','資産番号 : '+$itemCd[$targetI]+' 資産名 : '+$itemName[$targetI]);
		//}
    },10);
});

//背景画像を移動させたとき要素がついてくるように表示
$('img.cropimg').mousemove(function(){
//alert('008');
    //DBの値を変数にセット
    //var $id       = JSON.parse(sessionStorage.getItem('id'));
    var $itemCd   = JSON.parse(sessionStorage.getItem('itemCd'));
    var $itemName = JSON.parse(sessionStorage.getItem('itemName'));
    var $itemTop  = JSON.parse(sessionStorage.getItem('itemTop'));
    var $itemLeft = JSON.parse(sessionStorage.getItem('itemLeft'));
    var $iconSize = JSON.parse(sessionStorage.getItem('iconSize'));
    var $iconColor = JSON.parse(sessionStorage.getItem('iconColor'));

    //背景移動時の要素のズレ防止のため、0.01秒の遅れを発生させる
    setTimeout(function(){
        //alert("背景画像を移動させたとき");
        var mouseUpDown = sessionStorage.getItem('mouseUpDown');

		if(mouseUpDown == "down") {
            //各要素を再描画
            for (let i = 0; i < $itemCd.length; i++){
				//JSONのnullは""にキャストされている
				//if (parseFloat($itemTop[i])!=null || parseFloat($itemLeft[i])!=null){
				if ($itemTop[i] != "" || $itemLeft[i] != ""){
                    var Top  = $('img.cropimg').height() * parseFloat($itemTop[i])  + $('img.cropimg').offset().top;
                    var Left = $('img.cropimg').width()  * parseFloat($itemLeft[i]) + $('img.cropimg').offset().left;
                    //$('#'+$itemCd[i]).css({top:Top,left:Left,display:'block'}).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
                    $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                    $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
                    $('#'+$itemCd[i]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
                    //if (<?php echo $_SESSION['background'];?>=='1'){
                    if ($iconSize[i]=='1'){
						$('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
						$('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                    }else{
                        $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
						$('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                    }
                    $('#'+$itemCd[i]).css('background','transparent');	//background:背景に関する指定をまとめて行う
                    $('#'+$itemCd[i]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
                    $('#'+$itemCd[i]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
                    $('#'+$itemCd[i]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
                    $('#'+$itemCd[i]).css('line-height','6px');			//line-height:行の高さを指定する
                    $('#'+$itemCd[i]).css('font-size','14px');			//font-size:フォントのサイズを指定する
                    $('#'+$itemCd[i]).css('cursor','default');			//cursor:カーソルの形状を指定する
                    $('#'+$itemCd[i]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
                    $('#'+$itemCd[i]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
                    $('#'+$itemCd[i]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
                    if ($itemCd[i] == '<?php  echo $_SESSION['itemCd'];?>'){
                    	$('#'+$itemCd[i]).css('z-index','2');
						//if (<?php echo $_SESSION['background'];?>=='1'){
						//if ($iconSize[i]=='1'){
                        //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
						//}else{
                        //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
						//}
						//JSONのnullは""にキャストされている
						//if($itemTop[i] != null && $itemLeft[i] != null){
						if($itemTop[i] != "" && $itemLeft[i] != ""){
                            sessionStorage.setItem('newOnOff',"on");
						}
                    }else{
						$('#'+$itemCd[i]).css('z-index','1');
						//if (<?php echo $_SESSION['background'];?>=='1'){
						//if ($iconSize[i]=='1'){
                        //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012657.gif")');
						//}else{
                        //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/yellow001.gif")');
						//}
                    }	
                    $('#'+$itemCd[i]).css('background-size','cover');
        			$('#'+$itemCd[i]).css('background-color',$iconColor[i]);
                    $('#'+$itemCd[i]).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
                    //if($itemCd[i]=="new"){
                    //	if($itemTop[i] != null && $itemLeft[i] != null){
                    //		sessionStorage.setItem('newOnOff',"on");
                    //	}
                    //}
				}
            }
            //新規追加要素が存在する場合のみ新規追加要素を移動させる
            var newOnOff = sessionStorage.getItem('newOnOff');
            if(newOnOff == "on") {
				var newTop      = $('img.cropimg').height() * parseFloat(sessionStorage.getItem('newTopFold'))  + $('img.cropimg').offset().top;
				var newLeft     = $('img.cropimg').width()  * parseFloat(sessionStorage.getItem('newLeftFold')) + $('img.cropimg').offset().left;
				//$('#new').css({top:newTop,left:newLeft,display:'block'}).attr('title','資産番号 : '+$itemCd[0]+' 資産名 : '+$itemName[0]);
				var $targetI = sessionStorage.getItem('targetI');
				$('#'+$itemCd[$targetI]).css('top', newTop);					//top:上からの配置位置（距離）を指定する
				$('#'+$itemCd[$targetI]).css('left', newLeft);				//left:左からの配置位置（距離）を指定する
				$('#'+$itemCd[$targetI]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
                //if (<?php echo $_SESSION['background'];?>=='1'){
                if ($iconSize[i]=='1'){
                    $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
				}else{
                    $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
				}
				$('#'+$itemCd[$targetI]).css('background','transparent');	//background:背景に関する指定をまとめて行う
				$('#'+$itemCd[$targetI]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
				$('#'+$itemCd[$targetI]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
				$('#'+$itemCd[$targetI]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
				$('#'+$itemCd[$targetI]).css('line-height','6px');			//line-height:行の高さを指定する
				$('#'+$itemCd[$targetI]).css('font-size','14px');			//font-size:フォントのサイズを指定する
				$('#'+$itemCd[$targetI]).css('cursor','default');			//cursor:カーソルの形状を指定する
				$('#'+$itemCd[$targetI]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
				$('#'+$itemCd[$targetI]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
				$('#'+$itemCd[$targetI]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
				$('#'+$itemCd[$targetI]).css('z-index','2');
				//if (<?php echo $_SESSION['background'];?>=='1'){
				//if ($iconSize[i]=='1'){
                //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
				//}else{
                //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
				//}
				$('#'+$itemCd[$targetI]).css('background-size','cover');
       			$('#'+$itemCd[$targetI]).css('background-color',$iconColor[i]);
    			$('#'+$itemCd[$targetI]).attr('title','資産番号 : '+$itemCd[$targetI]+' 資産名 : '+$itemName[$targetI]);
            }
		}
    },10);
});
	
//ブラウザのサイズ変更時に再描画させる。
$(window).resize(function(){
//alert('009');
    //alert("ブラウザのサイズを変更した時");	
    //上
    $('#kakusu1').css({top:0,left:0,display:'block',height:parseFloat(sessionStorage.getItem('startOffsetTop')),width:'100%'})
	//下
	if (<?php echo $_SESSION['background'];?>=='1'){
		$('#kakusu2').css({top:<?php echo $_SESSION['resultHeight'];?> -4
			,left:0,display:'block',height:<?php echo $_SESSION['scrollTableHeight'];?>,width:'100%'})
	}else{
		$('#kakusu2').css({top:window.innerHeight-(parseFloat(sessionStorage.getItem('startOffsetTop')) *2 +4)
			,left:0,display:'block',height:parseFloat(sessionStorage.getItem('startOffsetTop')) *2.4,width:'100%'})
	}
    //左
    $('#kakusu3').css({top:0,left:0,display:'block',height:window.innerHeight,width:parseFloat(sessionStorage.getItem('startOffsetLeft'))})
    //右
    $('#kakusu4').css({top:0,left:window.innerWidth-39,display:'block',height:window.innerHeight,width:39})

    //DBの値を変数にセット
    //var $id       = JSON.parse(sessionStorage.getItem('id'));
    var $itemCd   = JSON.parse(sessionStorage.getItem('itemCd'));
    var $itemName = JSON.parse(sessionStorage.getItem('itemName'));
    var $itemTop  = JSON.parse(sessionStorage.getItem('itemTop'));
    var $itemLeft = JSON.parse(sessionStorage.getItem('itemLeft'));
    var $iconSize = JSON.parse(sessionStorage.getItem('iconSize'));
    var $iconColor = JSON.parse(sessionStorage.getItem('iconColor'));

    //各要素を再描画
    for (let i = 0; i < $itemCd.length; i++){
    	//JSONのnullは""にキャストされている
		//if (parseFloat($itemTop[i])!=null || parseFloat($itemLeft[i])!=null){
		if ($itemTop[i] != "" || $itemLeft[i] != ""){
            var Top  = $('img.cropimg').height() * parseFloat($itemTop[i])  + $('img.cropimg').offset().top;
            var Left = $('img.cropimg').width()  * parseFloat($itemLeft[i]) + $('img.cropimg').offset().left;
            //$('#'+$itemCd[i]).css({top:Top,left:Left,display:'block'}).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
            $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
            $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
            $('#'+$itemCd[i]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
            //if (<?php echo $_SESSION['background'];?>=='1'){
            if ($iconSize[i]=='1'){
				$('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
				$('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
            }else{
				$('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
				$('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
            }
            $('#'+$itemCd[i]).css('background','transparent');	//background:背景に関する指定をまとめて行う
            $('#'+$itemCd[i]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
            $('#'+$itemCd[i]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
            $('#'+$itemCd[i]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
            $('#'+$itemCd[i]).css('line-height','6px');			//line-height:行の高さを指定する
            $('#'+$itemCd[i]).css('font-size','14px');			//font-size:フォントのサイズを指定する
            $('#'+$itemCd[i]).css('cursor','default');			//cursor:カーソルの形状を指定する
            $('#'+$itemCd[i]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
            $('#'+$itemCd[i]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
            $('#'+$itemCd[i]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
            if ($itemCd[i] == '<?php  echo $_SESSION['itemCd'];?>'){
				$('#'+$itemCd[i]).css('z-index','2');
				//if (<?php echo $_SESSION['background'];?>=='1'){
				//if ($iconSize[i]=='1'){
                //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
				//}else{
                //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
				//}
                //JSONのnullは""にキャストされている
				//if($itemTop[i] != null && $itemLeft[i] != null){
				if($itemTop[i] != "" && $itemLeft[i] != ""){
                    sessionStorage.setItem('newOnOff',"on");
				}
            }else{
				$('#'+$itemCd[i]).css('z-index','1');
				//if (<?php echo $_SESSION['background'];?>=='1'){
				//if ($iconSize[i]=='1'){
                //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012657.gif")');
				//}else{
                //    $('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/yellow001.gif")');
				//}
            }	
            $('#'+$itemCd[i]).css('background-size','cover');
   			$('#'+$itemCd[i]).css('background-color',$iconColor[i]);
            $('#'+$itemCd[i]).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
            //if($itemCd[i]=="new"){
            //	if($itemTop[i] != null && $itemLeft[i] != null){
            //		sessionStorage.setItem('newOnOff',"on");
            //	}
            //}
		}
    }
				
    //新規追加要素が存在する場合のみ新規追加要素を移動させる
    var newOnOff = sessionStorage.getItem('newOnOff');
        if(newOnOff == "on") {
            var newTop      = $('img.cropimg').height() * parseFloat(sessionStorage.getItem('newTopFold'))  + $('img.cropimg').offset().top;
            var newLeft     = $('img.cropimg').width()  * parseFloat(sessionStorage.getItem('newLeftFold')) + $('img.cropimg').offset().left;
            //$('#new').css({top:newTop,left:newLeft,display:'block'}).attr('title','資産番号 : '+$itemCd[0]+' 資産名 : '+$itemName[0]);
            var $targetI = sessionStorage.getItem('targetI');
            $('#'+$itemCd[$targetI]).css('top', newTop);				//top:上からの配置位置（距離）を指定する
            $('#'+$itemCd[$targetI]).css('left', newLeft);				//left:左からの配置位置（距離）を指定する
            $('#'+$itemCd[$targetI]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
            //if (<?php echo $_SESSION['background'];?>=='1'){
            if ($iconSize[i]=='1'){
                $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
				$('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
            }else{
				$('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
				$('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
            }
            $('#'+$itemCd[$targetI]).css('background','transparent');	//background:背景に関する指定をまとめて行う
            $('#'+$itemCd[$targetI]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
            $('#'+$itemCd[$targetI]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
            $('#'+$itemCd[$targetI]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
            $('#'+$itemCd[$targetI]).css('line-height','6px');			//line-height:行の高さを指定する
            $('#'+$itemCd[$targetI]).css('font-size','14px');			//font-size:フォントのサイズを指定する
            $('#'+$itemCd[$targetI]).css('cursor','default');			//cursor:カーソルの形状を指定する
            $('#'+$itemCd[$targetI]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
            $('#'+$itemCd[$targetI]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
            $('#'+$itemCd[$targetI]).css('text-align','left');			//position:ボックスの配置方法（基準位置）を指定する
            $('#'+$itemCd[$targetI]).css('z-index','2');
            //if (<?php echo $_SESSION['background'];?>=='1'){
            //if ($iconSize[i]=='1'){
			//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/sozai_cman_jp_20180714012808.gif")');
            //}else{
			//	$('#'+$itemCd[i]).css('background','url("http://localhost/study05/assets/img/red001.gif")');
            //}
            $('#'+$itemCd[$targetI]).css('background-size','cover');
  			$('#'+$itemCd[$targetI]).css('background-color',$iconColor[i]);
            $('#'+$itemCd[$targetI]).attr('title','資産番号 : '+$itemCd[$targetI]+' 資産名 : '+$itemName[$targetI]);
		}
    });
});

$(function(){
  $('.scrollTable').scrolltable({
    //stripe: true,
    stripe: false,
    oddClass: 'odd',
	maxHeight: <?php echo $_SESSION['scrollTableHeight'];?> - 60
   });
});

$('.scrollTable td').on("click",function(){
    //DBの値を変数にセット
    var $itemCd   = JSON.parse(sessionStorage.getItem('itemCd'));

    var td_now = $(this).text();
    //modernBlinkは初回が'stop'であっても点灯をはじめてしまうので、1回だけ点滅開始→点滅終了を行う
    //2行目から
    for (let i = 0; i < $itemCd.length; i++){
    	$('#'+$itemCd[i]).modernBlink('start');
	$('#'+$itemCd[i]).modernBlink('stop');
    }
    //新規追加要素が存在する場合のみ
    //var newOnOff = sessionStorage.getItem('newOnOff');
    //if(newOnOff == "on") {
    //	$('#'+$itemCd[$targetI]).modernBlink('start');
    //	$('#'+$itemCd[$targetI]).modernBlink('stop');
    //}
	
    //1行目から
    for (let i = 0; i < $itemCd.length; i++){
    	if(td_now == $itemCd[i]) {
            $('#'+$itemCd[i]).modernBlink('start');
	}else{	
            $('#'+$itemCd[i]).modernBlink('stop');
	}
    }
});

/*
$(function() {
    $('#<?php echo $_SESSION['itemCd'];?>').contextMenu('myMenu1',
    {

        bindings: {
//			'save': function() {
//				//alert(<?php echo $_SESSION['id'];?>);
//				$('<form/>', {action: 'http://localhost/study05/cropimg4/edit', method: 'post'})
//				.append($('<input/>', {type: 'hidden', name: 'id'       , value: <?php echo $_SESSION['id'];?>}))
//				.append($('<input/>', {type: 'hidden', name: 'item_top' , value: parseFloat(sessionStorage.getItem('newTopFold'))}))
//				.append($('<input/>', {type: 'hidden', name: 'item_left', value: parseFloat(sessionStorage.getItem('newLeftFold'))}))
//				.appendTo(document.body)
//				.submit();
//				alert('保存しました。')
//			},
            'remove': function() {
                // 確認ダイアログの表示
                var result = confirm('除外しますか？');
                if(result){
                    $('#<?php echo $_SESSION['itemCd'];?>').hide(1000);
                    //新しい要素の存在をセッション変数に保存
                    sessionStorage.setItem('newOnOff',"off");
                    $('<form/>', {action: 'http://localhost/study05/cropimg4/edit', method: 'post'})
                    .append($('<input/>', {type: 'hidden', name: 'id'       , value: <?php echo $_SESSION['id'];?>}))
                    .append($('<input/>', {type: 'hidden', name: 'item_top' , value: 'null'}))
                    .append($('<input/>', {type: 'hidden', name: 'item_left', value: 'null'}))
			
                    .append($('<input/>', {type: 'hidden', name: 'img_top'   , value: $('img.cropimg').offset().top  - parseFloat(sessionStorage.getItem('startOffsetTop'))}))
                    .append($('<input/>', {type: 'hidden', name: 'img_left'  , value: $('img.cropimg').offset().left - parseFloat(sessionStorage.getItem('startOffsetLeft'))}))
                    .append($('<input/>', {type: 'hidden', name: 'img_height', value: $('img.cropimg').height()}))
                    .append($('<input/>', {type: 'hidden', name: 'img_width' , value: $('img.cropimg').width()}))

                    .appendTo(document.body)
                    .submit();
                    //					alert('除外しました');
                }
            },
        },
		menuStyle:{
			width:'200px'
		}
    });
});
*/

    var menu;
    $("#<?php echo $_SESSION['itemCd'];?>").ready(function () {
        menu = new ax5.ui.menu({
            position: "absolute", // default position is "fixed"
            icons: {
                'arrow': '▸'
            },
            items: [
                {
                    label: "位置",
                    items: [
                        {label: "保存"},
                        {label: "除外"}
                    ]
                },
                {
                    label: "アイコンサイズ",
                    items: [
                        {label: "大　サイズ"},
                        {label: "小　サイズ"}
                    ]
                },
                {
                    label: "アイコン色",
                    items: [
                        {label: "#98fb98", backgroundColor: "#98fb98"},
                        {label: "#ff8c00", backgroundColor: "#98fb98"},
                        {label: "#ff00ff", backgroundColor: "#98fb98"},
                        {label: "#00ffff", backgroundColor: "#98fb98"},
                        {label: "#fa8072", backgroundColor: "#98fb98"},
                        {label: "#fa8072", backgroundColor: "#98fb98"}
                    ]
                }
            ]
        });
        menu.onClick = function () {
            //console.log(this.label);
            //alert(this.label);
            //if(this.label=="#00FF00"){
            //    alert("#00FF00です")
            //}else{
            //    alert("#00FF00ではありません")
            //}
            if(this.label=="保存"){
				$('<form/>', {action: 'http://localhost/study05/cropimg4/edit', method: 'post'})
				.append($('<input/>', {type: 'hidden', name: 'id'         , value: <?php echo $_SESSION['id'];?>}))
				.append($('<input/>', {type: 'hidden', name: 'item_top'   , value: parseFloat(sessionStorage.getItem('newTopFold'))}))
				.append($('<input/>', {type: 'hidden', name: 'item_left'  , value: parseFloat(sessionStorage.getItem('newLeftFold'))}))
                .append($('<input/>', {type: 'hidden', name: 'icon_size'  , value: sessionStorage.getItem('targetSize')}))
                .append($('<input/>', {type: 'hidden', name: 'icon_color' , value: sessionStorage.getItem('targetColor')}))
			
                .append($('<input/>', {type: 'hidden', name: 'img_top'   , value: $('img.cropimg').offset().top  - parseFloat(sessionStorage.getItem('startOffsetTop'))}))
                .append($('<input/>', {type: 'hidden', name: 'img_left'  , value: $('img.cropimg').offset().left - parseFloat(sessionStorage.getItem('startOffsetLeft'))}))
                .append($('<input/>', {type: 'hidden', name: 'img_height', value: $('img.cropimg').height()}))
                .append($('<input/>', {type: 'hidden', name: 'img_width' , value: $('img.cropimg').width()}))

				.appendTo(document.body)
				.submit();
            }
            else if(this.label=="除外"){
                // 確認ダイアログの表示
                var result = confirm('除外しますか？');
                if(result){
                    $('#<?php echo $_SESSION['itemCd'];?>').hide(1000);
                    //新しい要素の存在をセッション変数に保存
                    sessionStorage.setItem('newOnOff',"off");
                    sessionStorage.setItem('reDraw','OFF');
                    $('<form/>', {action: 'http://localhost/study05/cropimg4/edit', method: 'post'})
                    .append($('<input/>', {type: 'hidden', name: 'id'       , value: <?php echo $_SESSION['id'];?>}))
                    .append($('<input/>', {type: 'hidden', name: 'item_top' , value: 'null'}))
                    .append($('<input/>', {type: 'hidden', name: 'item_left', value: 'null'}))
                    .append($('<input/>', {type: 'hidden', name: 'icon_size'  , value: 'null'}))
                    .append($('<input/>', {type: 'hidden', name: 'icon_color' , value: 'null'}))
			
                    .append($('<input/>', {type: 'hidden', name: 'img_top'   , value: $('img.cropimg').offset().top  - parseFloat(sessionStorage.getItem('startOffsetTop'))}))
                    .append($('<input/>', {type: 'hidden', name: 'img_left'  , value: $('img.cropimg').offset().left - parseFloat(sessionStorage.getItem('startOffsetLeft'))}))
                    .append($('<input/>', {type: 'hidden', name: 'img_height', value: $('img.cropimg').height()}))
                    .append($('<input/>', {type: 'hidden', name: 'img_width' , value: $('img.cropimg').width()}))

                    .appendTo(document.body)
                    .submit();
                }
            }
            else if(this.label=="大　サイズ"){
                sessionStorage.setItem('targetSize',"2");
                sessionStorage.setItem('reDraw','ON');
				$('<form/>', {action: 'http://localhost/study05/cropimg4/index', method: 'post'})
                .appendTo(document.body)
				.submit();
            }
            else if(this.label=="小　サイズ"){
                sessionStorage.setItem('targetSize',"1");
                sessionStorage.setItem('reDraw','ON');
				$('<form/>', {action: 'http://localhost/study05/cropimg4/index', method: 'post'})
                .appendTo(document.body)
				.submit();
            }
            else{
            if (this.label!="位置"&&this.label!="アイコンサイズ"&&this.label!="アイコン色"){
                sessionStorage.setItem('targetColor',this.label);
                sessionStorage.setItem('reDraw','ON');
				$('<form/>', {action: 'http://localhost/study05/cropimg4/index', method: 'post'})
                .appendTo(document.body)
				.submit();
    }
            }
        };
        //$("#container").bind("contextmenu", function (e) {
        $("#<?php echo $_SESSION['itemCd'];?>").bind("contextmenu", function (e) {
            menu.popup(e);
            ax5.util.stopEvent(e);
            // e || {left: 'Number', top: 'Number', direction: '', width: 'Number'}
        });
    });
    
function reDraw(){    
    //セッション変数から標的の要素の値を取得
    var newTop      = $('img.cropimg').height() * parseFloat(sessionStorage.getItem('newTopFold'))  + $('img.cropimg').offset().top;
    var newLeft     = $('img.cropimg').width()  * parseFloat(sessionStorage.getItem('newLeftFold')) + $('img.cropimg').offset().left;
    var targetSize  = sessionStorage.getItem('targetSize');
    var targetColor = sessionStorage.getItem('targetColor');
    
    //背景移動時の要素のズレ防止のため、0.01秒の遅れを発生させる
    setTimeout(function(){
		//alert("背景画像上でマウスを上げた時");
		sessionStorage.setItem('mouseUpDown',"up");

		//各要素を再描画（1行目から）
		for (let i = 0; i < $itemCd.length; i++){
            var Top  = $('img.cropimg').height() * parseFloat($itemTop[i])  + $('img.cropimg').offset().top;
			var Left = $('img.cropimg').width()  * parseFloat($itemLeft[i]) + $('img.cropimg').offset().left;
            
            if ($itemCd[i] != '<?php  echo $_SESSION['itemCd'];?>'){            
                $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
            }else{
                if (reDraw=='OFF'){
                    $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                    $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
                }else{
                    if (newTop==null){
                        $('#'+$itemCd[i]).css('top', Top);					//top:上からの配置位置（距離）を指定する
                        $('#'+$itemCd[i]).css('left', Left);				//left:左からの配置位置（距離）を指定する
                    }else{    
                        $('#'+$itemCd[i]).css('top', newTop);					//top:上からの配置位置（距離）を指定する
                        $('#'+$itemCd[i]).css('left', newLeft);				//left:左からの配置位置（距離）を指定する
                    }
                }            
            }
            $('#'+$itemCd[i]).css('display','block');			//display:要素の表示形式（ブロック・インライン・フレックス等）を指定する
            if ($itemCd[i] != '<?php  echo $_SESSION['itemCd'];?>'){            
                if ($iconSize[i]=='1'){
                    $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                }else{
                    $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                    $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                }
            }else{
                if (reDraw=='OFF'){
                    if ($iconSize[i]=='1'){
                        $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                    }else{
                        $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                    }
                }else{
                    if (targetSize=='1'){
                        $('#'+$itemCd[i]).css('width','16px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','10px');				//height:高さを指定する
                    }else{
                        $('#'+$itemCd[i]).css('width','120px');				//width:幅を指定する
                        $('#'+$itemCd[i]).css('height','40px');				//height:高さを指定する
                    }
                }
            }    
            $('#'+$itemCd[i]).css('background','transparent');	//background:背景に関する指定をまとめて行う
			$('#'+$itemCd[i]).css('padding','8px');				//padding:余白にかんする指定をまとめて行う
			$('#'+$itemCd[i]).css('border','solid 1px #000000');	//border:枠線のスタイル・太さ・色を指定する
			$('#'+$itemCd[i]).css('border-radius','4px');		//border-radius:ボックスの４つのコーナーの角丸をまとめて指定する
			$('#'+$itemCd[i]).css('line-height','6px');			//line-height:行の高さを指定する
			$('#'+$itemCd[i]).css('font-size','14px');			//font-size:フォントのサイズを指定する
			$('#'+$itemCd[i]).css('cursor','default');			//cursor:カーソルの形状を指定する
			$('#'+$itemCd[i]).css('overflow','hidden');			//overflow:はみ出た要素の表示方法を指定する
			$('#'+$itemCd[i]).css('position','absolute');		//position:ボックスの配置方法（基準位置）を指定する
			$('#'+$itemCd[i]).css('text-align','left');			//position:ボックス内の文字を左寄せに指定する
			if ($itemCd[i] == '<?php echo $_SESSION['itemCd'];?>'){
				$('#'+$itemCd[i]).css('z-index','2');			//z-index:重なりの順序を指定する
				if($itemTop[i] != "" && $itemLeft[i] != ""){
					sessionStorage.setItem('newOnOff',"on");
				}
				sessionStorage.setItem('targetI',i);
                if (targetSize==null){
                    sessionStorage.setItem('targetSize',$iconSize[i]);
                }
                if (targetColor==null){
                    sessionStorage.setItem('targetColor',$iconColor[i]);
                }
			}else{
				$('#'+$itemCd[i]).css('z-index','1');
			}	
			$('#'+$itemCd[i]).css('background-size','cover');
            if ($itemCd[i] != '<?php  echo $_SESSION['itemCd'];?>'){  
                $('#'+$itemCd[i]).css('background-color',$iconColor[i]);
            }else{
                if(reDraw=='OFF'){
                    $('#'+$itemCd[i]).css('background-color',$iconColor[i]);
                }else{
                    $('#'+$itemCd[i]).css('background-color',targetColor);
                }
            }
			$('#'+$itemCd[i]).attr('title','資産番号 : '+$itemCd[i]+' 資産名 : '+$itemName[i]);
		}    
    },10);
}

</script> 


<div id="container">
	<!--<span id="new">H1<span class="br">H1</span></span>-->
	<!--<span id="H01"><span class="br">02</span></span>-->
	<!--<span id="H01"><img src="http://localhost/study05/assets/img/sozai_cman_jp_20180713203652.gif" alt="サンプル" width="20" height="20"></span>-->
	<!--<span id="H02"><img src="http://localhost/study05/assets/img/sozai_cman_jp_20180713203652.gif" alt="サンプル" width="20" height="20"></span>-->
	<!--<span id="H03"><img src="http://localhost/study05/assets/img/sozai_cman_jp_20180713203652.gif" alt="サンプル" width="20" height="20"></span>-->
	<!--<span id="new"><img src="http://localhost/study05/assets/img/sozai_cman_jp_20180713203952.gif" alt="サンプル" width="20" height="20"></span>-->
<!--
	<span id="new">0</span>
	<span id="H01">1</span>
	<span id="H02">2</span>
	<span id="H03">3</span>
-->
	<!--文字付で画像を表示-->
	<?php foreach ($items as $item): ?>
            <?php if($_SESSION['background'] == '1'){?> 
                <span id=<?php echo $item->item_cd; ?>><?php echo $item->id; ?></span>
            <?php }else{?> 
                <span id=<?php echo $item->item_cd; ?>><?php echo $item->item_name; ?><span class="br"><span class="br"><?php echo mb_substr($item->item_cd,0,18); ?></span></span></span>
            <?php }?> 
            <!--<span id=<?php echo $item->item_cd; ?>><?php echo $item->item_cd; ?><span class="br"><span class="br"><?php echo mb_substr($item->item_name,0,18); ?></span></span></span>-->
            <!--<span id=<?php echo $item->item_cd; ?>><?php echo $item->item_cd; ?></span>-->
	<?php endforeach; ?>	
                
                

<!--
	<span id="H01">02</span></span>
	<span id="H02">03</span></span>
	<span id="H03">04</span></span>
	<span id="new">00</span></span>
	-->
	
	<span id="kakusu1"></span>
	<span id="kakusu2"></span>
	<span id="kakusu3"></span>
	<span id="kakusu4"></span>
	<span id="kakusu5"></span>
	<span id="kakusu6"></span>
    

<!--
	<div class="contextMenu" id="myMenu1">
		<ul>
			<li id="save"><img src="http://localhost/study05/assets/img/save_20180713055232.gif" /> 保存</li>
			<li id="remove"><img src="http://localhost/study05/assets/img/upload_20180713082822.gif" /> 除外</li>
        </ul>
	</div>
</div><!--/#container-->
-->

<script>
	//新規追加要素の移動を可能とする。
	$('#<?php echo $_SESSION['itemCd'];?>').tinyDraggable();
</script>

</body> 
</html> 
