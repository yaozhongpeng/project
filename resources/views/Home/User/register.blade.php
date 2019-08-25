<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>用户注册</title>
</head>
<body>
<form action="" method="post">
	手机号 <input type="text" name="mobile" id="inp" size="30"><span id="spa"></span><br>
	验证码 <input type="" name="verify">&nbsp;<button id="btn">获取验证码</button><br>
	<a href="http://www.php217.com/send">获取</a>
	<input type="submit" value="注册">
</form>
</body>
<script type="text/javascript">
	var inp = document.getElementById('inp');
	var spa = document.getElementById('spa');

	// 获取焦点事件
	inp.onfocus = function(){
		console.log('获取焦点');
		spa.innerHTML = '请输入11位手机号码';
	}

	// 失去焦点
	inp.onblur = function(){
		// 获取 input 中的 value 值
		str = inp.value;
		console.log(str);
 	}

	if (str.match(/^\d{11}$/) == null) {
			// alert('用户名验证失败');
			spa.innerHTML = 'X 手机号非法';
			spa.style.color = 'red';
		}else{
			// alert('用户名验证成功');
			spa.innerHTML = '√ 手机号可用';
			spa.style.color = 'green';
		}	
</script>
</html>