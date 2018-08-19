<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>modal</title>
    <style type="text/css">
        .white-popup {
          position: relative;
          background: #F00;
          padding: 20px;
          width: auto;
          max-width: 500px;
          margin: 20px auto;
        }
    </style>
    <link rel="stylesheet" href="/css/magnific-popup.css"> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
    <script src="/js/jquery.magnific-popup.js"></script>    
</head>
<body>
    <div id="popup" class="white-popup">
        Dynamically created popup
    </div>

    <script type="text/javascript">
    $(window).load(function(){
        $.magnificPopup.open({
            items: {src: '#popup'},
            type: 'inline', 
            modal: true,
        }, 0);
    });
    </script>    
</body>
</html>