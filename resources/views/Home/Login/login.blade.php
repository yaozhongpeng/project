@extends('Home.HomePublic.homepublic')
@section('home')
<div class="m" style="padding:32px 0;">
@if(session('error'))
    {{session('error')}}
@endif
@if(session('success'))
    {{session('success')}}
@endif
<div class="login-show">&nbsp;</div>
<div class="login-main">
<div id="msgs"></div>
<div class="login-head">
<ul>
<li class="on"><a href="?action=login&forward=http%3A%2F%2Flocalhost%2Fdt%2F">帐号登录</a></li>
</ul>
</div>
<div class="login-body">
<form method="post" action="/homelogin">
<!-- <input type="hidden" name="email" value=""/>
<input type="hidden" name="phone" value=""/>
<input type="hidden" name="name" value=""/> -->
<div><input name="email" type="text" id="email" placeholder="用户名/Email/已认证手机" class="input-user"/></div>
<div><input name="password" type="password" id="password" placeholder="密码"  class="input-pass"/></div>
<div>{{csrf_field()}}<input type="submit" name="submit" value="登 录" class="btn-blue login-btn"/></div>
<div class="t_c f_gray"><a href="/homeregister/create" class="b">会员注册</a> &nbsp;|&nbsp; <a href="/forget" class="b">忘记密码</a></div>
</form>
</div>
</div>
<div class="login-show">&nbsp;</div>
<div class="c_b"></div>
</div>
<script type="text/javascript">
function Dmsgs(msg) {
$('#msgs').html(msg);
$('#msgs').fadeIn(100, function() {
setTimeout(function() {$('#msgs').fadeOut(300);}, 3000);
});
}
function Dcheck() {
if(Dd('username').value.length < 2) {
Dmsgs('请输入登录名称');
Dd('username').focus();
return false;
}
if(Dd('password').value.length < 6) {
Dmsgs('请输入密码');
Dd('password').focus();
return false;
}
return true;
}
function Scheck() {
if(Dd('mobile').value.length < 11) {
Dmsgs('请输入手机号码');
Dd('mobile').focus();
return false;
}
if(Dd('code').value.length < 6) {
Dmsgs('请输入短信验证码');
Dd('code').focus();
return false;
}
return true;
}
function Dstop() {
var i = 180;
var interval=window.setInterval(
function() {
if(i == 0) {
$('#send').html('发送短信');
clearInterval(interval);
} else {
$('#send').html('重新发送('+i+'秒)');
i--;
}
},
1000);
}
function Dsend() {
if($('#send').html().indexOf('秒') != -1) {
Dmsgs('请耐心等待');
return false;
}
if(Dd('mobile').value.length < 11) {
Dmsgs('请输入手机号码');
Dd('mobile').focus();
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsgs('验证码填写错误');
Dd('captcha').focus();
return false;
}
$.post('?', 'action=send&mobile='+Dd('mobile').value+'&captcha='+Dd('captcha').value, function(data) {
if(data == 'ok') {
Dmsgs('短信发送成功');
Dstop();return;
} else if(data == 'format') {
Dmsgs('手机格式错误');
} else if(data == 'captcha') {
Dmsgs('验证码错误');
} else if(data == 'exist') {
Dmsgs('号码不存在或未验证');
} else if(data == 'max') {
Dmsgs('发送次数过多');
} else if(data == 'fast') {
Dmsgs('发送频率过快');
} else {
Dmsgs('发送失败'+data);
}
reloadcaptcha();
});
}
</script>
@endsection 
@section('title','登录')