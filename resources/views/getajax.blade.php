<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>get Ajax</title>
	<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
</head>
<body>
	<button>get获取响应数据</button>
</body>
<script type="text/javascript">
// alert($);
//获取按钮 绑定单击事件
$("button").click(function(){
	//Ajax请求
	$.get("/doajax",{},function(data){
		alert(data);
	});
});
</script>
</html>