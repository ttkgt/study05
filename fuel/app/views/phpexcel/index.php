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
	</head>
	<body>

		<div class="container">
			<div class="row">

				<h3>エクセルファイルを作成しました。</h3>


				<?php echo Form::open(array('class' => 'form-horizontal'));?>

				<?php if (isset($error)): ?>
				<p class="alert alert-warning"><?php echo $error ?></p>
				<?php endif ?>

				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<?php echo Form::submit('submit', '戻る', array('class' => 'btn btn-success'));?>
					</div>
				</div>
				<?php echo Form::close();?>

			</div>
		</div>
	
	</body>
</html>