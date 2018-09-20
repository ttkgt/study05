<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="cropimgのデモでーす。">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>cropimg - jQueryプラグイン</title>

<link rel="stylesheet" type="text/css" href="http://localhost/study05/assets/css/ax5menu.css" />
<script src="http://localhost/study05/assets/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="http://localhost/study05/assets/js/ax5core.min.js"></script>
<script type="text/javascript" src="http://localhost/study05/assets/js/ax5menu.min.js"></script>


<script type="text/javascript">
    var menu;
    $(document.body).ready(function () {
        menu = new ax5.ui.menu({
            position: "absolute", // default position is "fixed"
            icons: {
                'arrow': '▸'
            },
            items: [
                {
                    label: "Menu A",
                    items: [
                        {label: "Menu A-0"},
                        {label: "Menu A-1"},
                        {label: "Menu A-2"}
                    ]
                },
                {
                    label: "Menu B",
                    items: [
                        {label: "Menu B-0"},
                        {label: "Menu B-1"},
                        {label: "Menu B-2"}
                    ]
                }
            ]
        });
        menu.onClick = function () {
            console.log(this);
        };
        $("#context-menu-target").bind("contextmenu", function (e) {
            menu.popup(e);
            ax5.util.stopEvent(e);
            // e || {left: 'Number', top: 'Number', direction: '', width: 'Number'}
        });
    });
</script>


</head>
<body>

<div style="height:200px;background: #9aa9c7;padding: 10px;" id="context-menu-target">
    Right click on the mouse.
</div>

</body>
</html>
