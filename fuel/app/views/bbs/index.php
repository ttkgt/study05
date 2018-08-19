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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!--fadaout-->
<script type="text/javascript">
$(function(){
	//id="save"の要素を3秒（3000ミリ秒）でゆっくりと非表示にする
	$('#save').fadeOut(3000);
});
</script>

</head>
<body>

<h1 class="text-center">お問い合わせ</h1>
	
<div class="container">

<div class="panel panel-default">
<div class="panel-heading">
<h4>投稿</h4>
</div>
<div class="panel-body">

<!--
ファイルのアップロードがエラー時に、フラッシュセッションのエラーメッセージをコントローラーから受けとる
-->
<?php if(Session::get_flash('uerr')):?>
<p class="alert alert-warning"><?php echo Session::get_flash('uerr');?></p>
<?php endif;?>

<!--
投稿が保存されたときのメッセージを表示
-->
<?php if(@$save):?>
<p class="alert alert-success" id="save"><?php echo $save;?></p>
<?php endif;?>


<!--
ファイルアップロードのため、formタグにenctype="multipart/form-data"を指定します。
出力されるhtml
▼
<form enctype="multipart/form-data" method="post" action="http://example.com/bbs" accept-charset="utf-8">
-->
<?php echo Form::open(array('enctype'=>'multipart/form-data','method'=>'post')); ?>

<div class="form-group">
<label>ユーザ名</label>
<input type="text" class="form-control" name="name">
</div>

<!--
名前が入力されていない場合のエラー表示
-->
<?php if($val->error('name')):?>
<p class="alert alert-warning"><?php echo $val->error('name');?></p>
<?php endif;?>

<div class="form-group">
<label>メッセージ</label>
<textarea class="form-control" rows="3" name="message"></textarea>
</div>

<!--
メッセージが入力されていない場合のエラー表示
-->
<?php if($val->error('message')):?>
<p class="alert alert-warning"><?php echo $val->error('message');?></p>
<?php endif;?>


<div class="form-group">
<label>画像アップロード</label>
<?php echo Form::file('upload',array('class'=>'span4')); ?>

</div>
<input type="submit" name="submit" value="投稿" class="btn btn-default">

<!--
CSRF対策のトークン取得
-->
<?php echo Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token());?>

</form>
</div>
</div>

<hr>

<!--
モデルから取得した保存済みの投稿データをデータある数だけループ表示します。
-->
<?php foreach ($posts as $post): ?>

<div>
	<?php if($post->image):?>
	<img src="/uploads/<?php echo $post->image; ?>" class="img-thumbnail" style="width:300px;">
	<?php endif;?>
	<h4><?php echo $post->name; ?></h4>
	<p><?php echo nl2br($post->message); ?></p>
</div>
<hr>

<?php endforeach; ?>

<!--
Paginationを表示する
-->
<?php echo Pagination::instance('mypagination')->render(); ?>


</div> <!-- /container -->

</body>
</html>