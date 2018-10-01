<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>お問い合わせ</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/flatly/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/style.css" media="screen">

  
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<meta name="keywords" content="FuelPHP入門,PHP,Git,プログラミング,webエンジニア" />
		<meta name="description" content="FuelPHPで作られたお問い合わせフォームです" />


		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  
		  ga('create', 'UA-8507913-23', 'fuweb.info');
		  ga('send', 'pageview');

		</script>

		<!--jQueryを読み込み-->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.8.22/themes/base/jquery-ui.css" type="text/css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js"></script>
		<!--テーブルのスクロールで必要-->
		<script src="http://localhost/study05/assets/js/jquery.scrolltable.js"></script>
  
		<!--fadaout-->
		<script type="text/javascript">
			$(function(){
				//id="save"の要素を3秒（3000ミリ秒）でゆっくりと非表示にする
				$('#save').fadeOut(3000);
			});
		</script>

		<!--選択チェックボックスの全選択／全解除-->
		<script type="text/javascript">
			$(function() {
				// 「全てにチェック」のチェックボックスをチェックしたら発動
				$('#all').change(function() {
					// もし「全てにチェック」のチェックが入ったら
					if ($(this).prop('checked')) {
						// チェックを付ける
						$('input[name="check[]"]').prop('checked', true);
					// もしチェックが外れたら
					} else {
						// チェックを外す
						$('input[name="check[]"]').prop('checked', false);
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
					maxHeight: 600
				});
			});
		</script>
		
<!--お試し-->		
<!--
<script>
$(window).load(function(){
$('.loading').fadeOut();	
});
</script>
-->
<!--お試し-->		
		
		
	</head>
	<body>

		<!--お試し-->		
		<!--
		<div class="loading">
			<img src="http://localhost/study05/assets/img/loading.gif" />
		</div>		
		-->
		<!--お試し-->		
		<?php echo Form::open(array('class' => 'form-horizontal'));?>
		<div class="form-group">
			<label for="form_name" class="col-sm-3 control-label">工事名称</label>
			<div class="col-sm-3">
				<?php echo Form::input('kouji_name');?>
			</div>
			<div class="col-sm-3">
				<?php echo Form::submit('submit', '検索', array('class' => 'btn btn-success btn-sm'));?>
				<?php echo Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token());?>
			</div>
		</div>	
		
		<br>
		<p>
			<?php echo Html::anchor('kouji/create'  , '追加'       , array('class' => 'btn btn-success btn-sm')); ?>

			<?php echo Form::submit('submit', 'エクセル出力', array('class' => 'btn btn-success btn-sm'));?>
			<?php echo Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token());?>
			
			<?php echo Form::submit('submit', 'ＱＲ生成', array('class' => 'btn btn-success btn-sm'));?>
			<?php echo Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token());?>

			<?php echo Form::submit('submit', 'ＰＤＦ生成', array('class' => 'btn btn-success btn-sm'));?>
			<?php echo Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token());?>

			<?php echo Form::submit('submit', 'バーコード生成', array('class' => 'btn btn-success btn-sm'));?>
			<?php echo Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token());?>

			<?php echo Form::submit('submit', 'バーコードＰＤＦ', array('class' => 'btn btn-success btn-sm'));?>
			<?php echo Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token());?>
            
            <img src="http://localhost/study05/assets/img/koujyou.jpg" width="100" height="100"/>

		</p>
		<?php echo Pagination::instance('mypagination')->render(); ?>
		
		<?php if ($koujis): ?>

		<style>
			table.MyTable{
				width:100%;
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
		
		<!--お試し-->		
<!--
		<style>
			.loading {
				width: 100%;
height: 100%;
background: rgba(255,255,255,1.0);
position: fixed;
top: 0;
left: 0;
z-index: 20000;
}
.loading img {
width: 40px;
height: 40px;
position: absolute;
top: 50%;
left: 50%;
margin-top: -20px;
margin-left: -20px;
}
</style>
-->
<!--お試し-->		

		
		<table class="MyTable" cellpadding="0" cellspacing="0" border="0" height="600px">

			<thead>
				<tr>
					<p><input type="checkbox" name="all" value="all" id="all">：全てにチェック</p>
					<th>選択</th>
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
				<?php foreach ($koujis as $item): ?>		
				<tr>
					<td>
						<?php echo	Form::checkbox('check[]', $item->id, false, array('id' => 'checkbox_id', 'class' => 'checkbox_class', 'style' => 'border: 1px;')); ?>
					</td>
					<td><?php echo $item->id; ?></td>
					<td><?php echo $item->kouji_cd; ?></td>
					<td><?php echo $item->kouji_name; ?></td>
					<td><?php echo $item->kouji_type; ?></td>
					<td><?php echo $item->kouji_state; ?></td>
					<td><?php echo $item->ip; ?></td>
					<td>
						<div class="btn-toolbar">
							<div class="btn-group">
								<?php echo Html::anchor('kouji/floor/'.$item->id
									, '<i class="icon-eye-open"></i> Floor'
									, array('class' => 'btn btn-info btn-sm')); ?>						
								<?php echo Html::anchor('kouji/view/'.$item->id
									, '<i class="icon-eye-open"></i> View'
									, array('class' => 'btn btn-info btn-sm')); ?>						
								<?php echo Html::anchor('kouji/edit/'.$item->id
									, '<i class="icon-wrench"></i> Edit'
									, array('class' => 'btn btn-warning btn-sm')); ?>						
								<?php echo Html::anchor('kouji/delete/'.$item->id
									, '<i class="icon-trash icon-white"></i> Delete'
									, array('class' => 'btn btn-sm btn-danger'
									, 'onclick' => "return confirm('Are you sure?')")); ?>					
							</div>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>	
			</tbody>
		</table>

		<?php else: ?>
		<p>No Koujis.</p>

		<?php endif; ?>
		
	</body>
</html>



