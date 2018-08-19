<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お問い合わせ</title>
<!--ここをコメントアウトすると殺風景になる-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/flatly/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css" media="screen">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!--
ここはドキュメントの説明である。
name="keyword"    :ドキュメントの概要
name="description":ドキュメントに関するキーワード
-->
<meta name="keywords" content="FuelPHP入門,PHP,Git,プログラミング,webエンジニア" />
<meta name="description" content="FuelPHPで作られたお問い合わせフォームです" />

<!--
ここはサイトへのトラッキングコードの記述である
トラッキングコードとはタグ、計測タグ、ビーコンと呼ばれるものと同じで
ホームページに設置する(埋め込む)計測用のコードです。トラッキングとは
英語で追跡、追尾、跡をたどる、などを意味していますので、
ホームページに訪問した人の跡たどるために使うコードのことですね。
このコードが読み込まれることによって数字が集計されていきます。
そのためトラッキングコードが設置されていないページはカウントされません。
-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-8507913-23', 'fuweb.info');
  ga('send', 'pageview');

</script>

<!--jQueryを読み込み-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!--画像切り替えで必要-->
<script src="http://localhost/study05/assets/js/jquery.bgswitcher.js"></script>
<script>
jQuery(function($) {
    $('.bg-slider').bgSwitcher({
        images: ['http://localhost/study05/assets/img/bigsize-image01.jpg'
			,'http://localhost/study05/assets/img/bigsize-image02.jpg'], // 切り替える背景画像を指定
    });
});
</script>


	<?php echo Asset::css('login.css');?>

</head>
<body>
<div class="bg-slider">

<div class="container">
<div class="row">

	<h3>ログイン画面サンプル</h3>

<?php echo Form::open(array('class' => 'form-horizontal'));?>

<?php if (isset($error)): ?>
<p class="alert alert-warning"><?php echo $error ?></p>
<?php endif ?>


<div class="form-group">
<label for="form_name" class="col-sm-4 control-label">ユーザ名</label>
<div class="col-sm-8">
<?php echo Form::input('username');?>
</div>
</div>

<div class="form-group">
<label for="form_name" class="col-sm-4 control-label">パスワード</label>
<div class="col-sm-8">
<?php echo Form::password('password');?>
</div>
</div>

 <div class="form-group">
<div class="col-sm-offset-4 col-sm-8">
<?php echo Form::submit('submit', 'ログイン', array('class' => 'btn btn-success'));?>

</div>
</div>
<?php echo Form::close();?>

-
</div>
</div>


</div>


</body>
</html>