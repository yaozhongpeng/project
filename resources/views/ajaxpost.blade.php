<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>post Ajax</title>
	<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
</head>
<body>
	<button>post获取响应数据</button>
</body>
<script type="text/javascript">
$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
// alert($);
//获取按钮 绑定单击事件
$("button").click(function(){
	//Ajax 请求 post
	$.post("/dopostajax",{},function(data){
		alert(data);
	});
});
</script>
</html>