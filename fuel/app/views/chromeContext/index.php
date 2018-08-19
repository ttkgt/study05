<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="chromeContext Menuのデモでーす。">
<title>chromeContext Menu - jQueryプラグイン</title>
<link href="http://localhost/study05/assets/css/chromeContext.css" rel="stylesheet" type="text/css" />
<style>
#demo {
  border: 1px solid blue;
  width: 300px;
  height: 250px;
  float: left;
  margin: 40px;
  padding: 20px;
  font-size: 30px;
}
</style>
</head>
<body>
<h1>chromeContext Menu のデモでーす。</h1>
<div id="demo">右クリックしてみてください。</div>
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script src="http://localhost/study05/assets/js/jquery.chromeContext.js"></script>
<script>
$(function(){
  $('#demo').chromeContext({
    items: [
      { title: 'めにゅー①',
        onclick: function () { console.log('one.'); } },
      { title: 'めにゅー②',
        onclick: function () { console.log('two.'); } },
      { title: 'めにゅー③',
        onclick: function () { console.log('three.'); } },
      { title: 'めにゅー④',
        onclick: function () { console.log('four.'); } }
    ]
  });
});
</script>
</body>
</html>
