<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ajax</title>
</head>
<body>
<h1>jquery.get()</h1>

<label>ID：<input type="number" name="name" value=""></label>
<input type="button" value="送信">
<p>名前：<span></span></p>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
$(function() {

    $("[type=button]").on("click", function() {

        $.get(".php", {
            id : $("[type=number]").val()
        }, function(data) {
            $("span").text(data);
        });

    });

});
</script>
</body>
</html>