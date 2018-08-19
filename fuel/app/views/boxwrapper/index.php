<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css">
<!--
*{
  margin: 0;
  padding: 0;
}

html,body{
  height: 100%;
}

.wrapper{
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.box__wrapper{
  width: 400px;
  height: 200px;
  background: #ddd;
  position: relative;
}

.box{
  position: absolute;
  width: 30px;
  height: 30px;
  background: tomato;
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
}
-->
</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(function(){
  $('.box__wrapper').on('click', function(e){
    var box = $('<div class="box"></div>')
    .hide()
    .fadeIn(1000)
    .delay(3000)
    .fadeOut(1000, function() {
      $(this).remove();
    })
    .css({'left': e.clientX,'top': e.clientY});

    $('.wrapper').append(box);
  });
});
</script>
</head>
<body>
  <div class="wrapper">
    <div class="box__wrapper">
    </div>
  </div>
</body>
</html>