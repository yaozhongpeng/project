@extends('Home.HomePublic.homepublic')
@section('home')
<style type="text/css">
    .cur{
      border:1px solid red;
    }
     .curs{
      border:1px solid green;
    }
    #ss{
    	padding: 6px 10px;
    	background: rgba(0,0,255,0.7);
    	color: #fff;
    }
    #ss:hover{
    	background: rgba(0,0,255,0.9);
    	color: yellow;
    }
  </style>
<div class="m">
<div class="reg-main">
<div class="reg-step">
<ul id="ulid">
<li style="width:450px;" class="on"><i>1</i>邮箱注册</li>
<li style="width:450px;"><i>2</i>手机注册</li>
</ul>
</div>
</div>
</div>
<div class="m" id="formid">
	<form action="/homeregister" method="post" style="display:block">
		<table cellspacing="0" class="reg-tb">
			<tr>
				<td class="tl"><span class="f_red">*</span> 电子邮箱</td>
				<td class="tr"><input type="email" name="email" class="input-mail"></td>
			</tr>
			<tr>
				<td class="tl"><span class="f_red">*</span> 密码:</td>
				<td class="tr"><input type="password" name="password" class="input-mail" autocomplete="off"></td>
			</tr>
			<tr>
				<td class="tl"><span class="f_red">*</span> 确认密码:</td>
				<td class="tr"><input type="password" name="repassword" class="input-mail" autocomplete="off"></td>
			</tr>

			<tr>	
				<td class="tl"><span class="f_red">*</span> 验证码</td>
				<td class="tr"><input type="text" name="code" class="input-captcha" id="captcha" size="10" placeholder="验证码"/>&nbsp;<img src="/code" onclick="this.src=this.src+'?a=1'" title="验证码,看不清楚?请点击刷新&#10;字母不区分大小写" alt="" align="absmiddle" id="captchapng" onclick="reloadcaptcha();" style="cursor:pointer;"/><span id="ccaptcha"></span>
			</tr>

			<tr>
				<td class="tl">&nbsp;</td>
				<td class="tr">{{csrf_field()}}<input type="submit" value="注册" class="btn-blue reg-btn"></td>
			</tr>
		</table>	
	</form>
	<!-- phone start -->
	<form action="/registerphone" method="post" style="display:none;">
		<table cellspacing="0" class="reg-tb">
			<tr>
				<td class="tl"><span class="f_red">*</span> 手机号码</td>
				<td class="tr"><input type="text" name="phone" class="input-mail msg" reminder="请输入合法手机号"><span>11位手机号</span></td>
			</tr>
			<tr>	
				<td class="tl"><span class="f_red">*</span> 验证码</td>
				<td class="tr"><input type="text" name="code" id="code" class="input-captcha msg" size="10" placeholder="短信验证码" reminder="请正确输入验证码"/>&nbsp;<span>短信验证码</span>&nbsp;<a href="javascript:void(0)" id="ss">获取</a></td>
			</tr>

			<tr>
				<td class="tl"><span class="f_red">*</span> 密码:</td>
				<td class="tr"><input type="password" name="password" id="password" class="input-mail msg" autocomplete="off" reminder="请正确输入密码"><span>6~18位密码</span></td>
			</tr>
			<tr>
				<td class="tl"><span class="f_red">*</span> 确认密码:</td>
				<td class="tr"><input type="password" name="repassword" id="repassword" class="input-mail msg" autocomplete="off" reminder="请正确输入重复密码"><span>重复密码</span></td>
			</tr>

			<tr>
				<td class="tl">&nbsp;</td>
				<td class="tr">{{csrf_field()}}<input type="submit" value="注册" class="btn-blue reg-btn" id="tijiao"></td>
			</tr>
		</table>	
	</form>
<!-- phone end -->
</div>

<script type="text/javascript">
	// tab 原生js,待完善
	// jquery 写法 tab
	$('#ulid li').click(function(){
		$(this).addClass('on').siblings().removeClass('on');
		$('#formid').children().eq($(this).index()).css('display','block').siblings().css('display','none');
		// console.log($(this).index());
	});
</script>
<script type="text/javascript">
	// alert($);
	Phone = false; // false 阻止表单提交
  	Code = false;
  	Pwd = false;
	// 输入框后的焦点事件
	$('.msg').focus(function(){
		//获取reminder属性值
    	reminder=$(this).attr('reminder');
    	// alert(reminder);
    	// 找到下一个 span 元素 赋值
    	$(this).next('span').css('color','red').html(reminder);
    	$(this).addClass('cur');
	});
	// 手机号输入框失去焦点事件
	$("input[name='phone']").blur(function(){
		o = $(this); // Ajax 中不能解析$(this),赋值给变量
		p = $(this).val(); // 获取输入手机号
		// alert(p);
		if (p.match(/^\d{11}$/) == null) {
			// alert('手机号格式不正确');
			$(this).next('span').css('color','red').html('手机号格式不正确');
			$(this).addClass('cur');
			Phone = false;
		}else{
			// alert('手机号格式正确');
			// 检测手机号是否唯一
			$.get('/checkphone',{phone:p},function(data){
				// alert(data);
				if (data == 1) {
					o.next('span').css('color','red').html('手机号已存在');
					o.addClass('cur');
					Phone = false;
				}else if(data == 0){
					o.next('span').css('color','green').html('手机号可用');
					o.addClass('curs');
					Phone = true;
				}
			});
		}
	});

	// 获取发送短信按钮
    $("#ss").click(function(){
    	oo=$(this);
    	// 获取输入手机号
    	pp = $("input[name='phone']").val();
    	// alert(pp);
    	// Ajax 调用发送短信方法
    	$.get('/registersendphone',{pp:pp},function(data){
      		// alert(data);
      		// alert(data.code);
      		if(data.code == 000000){
        		m = 60;
        		// 按钮的倒计时
        		mytime = setInterval(function(){
	          		m--;
	          		// 赋值给按钮
	          		oo.html(m);
	          		// 禁用按钮
	          		oo.attr("disabled",true);
	          		// 判断
	          		if(m < 1){
		            	// 清除定时器
		            	clearInterval(mytime);
		            	oo.html("发送");
		            	oo.attr("disabled",false);
            		}
        		},1000);
      		}
    	},'json');
    });

    // 检测短信验证码
    $("#code").blur(function(){
    	pp = $(this);
    	// 获取输入的验证码
    	code = $(this).val();
    	// Ajax 比较验证码
    	$.get("/checkcode",{code:code},function(data){
	    	if(data == 1){
	        // 校验码ok
		        pp.next("span").css('color',"green").html("校验码一致");
		        pp.addClass("curs");
		        Code = true;
	      	}else if(data==2){
	        // 校验码有误
		        pp.next("span").css('color',"red").html("校验码有误");
		        pp.addClass("cur");
		        Code = false;
	      	}else if(data == 3){
	        // 校验码为空
		        pp.next("span").css('color',"red").html("校验码为空");
		        pp.addClass("cur");
		        // Code = false;
	      	}else if(data == 4){
	        // 校验码过期
		        pp.next("span").css('color',"red").html("校验码已过期");
		        pp.addClass("cur");
		        Code = false;
	      	}
	    });
    });

    // 密码格式验证
    $(':password').blur(function(){
    	pwd = $(this).val(); // 获取输入密码
    	if (pwd.match(/^\w{6,18}$/) == null) {
    		// alert('密码为6-18位字母数字下划线组成!');
    		$(this).next('span').css('color','red').html('密码为6-18位字母数字下划线组成!');
			$(this).addClass('cur');
			Pwd = false;
    	}else{
    		$(this).next('span').css('color','green').html('密码格式正确');
			$(this).addClass('curs');
			Pwd = true;
    	}
    	
    });

    // 判断两次输入的密码是否一致
    $('#repassword').blur(function(){
    	var pwd1 = $('#password').val();
    	var pwd2 = $('#repassword').val();
    	if (pwd1 == pwd2) {
    		$(this).next('span').css('color','green').html('两次密码一致');
			$(this).addClass('curs');
			Pwd = true;
    	}else{
    		$(this).next('span').css('color','red').html('两次输入的密码不一致!');
			$(this).addClass('cur');
			Pwd = false;
    	}
    });

    // 表单提交
    $("#tijiao").submit(function(){
	    if(Phone && Code && Pwd){
	      	return true; // 提交
	    }else{
	    	return false; // 阻止提交
	    }
    });
</script>	
@endsection 
@section('title','注册')