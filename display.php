<!DOCTYPE html>
<html>
<head>
<script src="/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide").click(function(){
  $("#p1").hide();
  });
  $("#show").click(function(){
  $("#p1").show();
  });
});
</script>
</head>
<body>
<p id="p1">如果点击“隐藏”按钮，我就会消失。</p>
<button id="hide" type="button">隐藏</button>
<button id="show" type="button">显示</button>
</body>
</html>

