<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>会员注册_laravel</title>
<meta http-equiv="mobile-agent" content="format=html5;url=http://localhost/dt/mobile/member/register.php?action=mail&amp;sid=9eaf3f2fa2511289771ad5dab04fcabc">
<link rel="shortcut icon" type="image/x-icon" href="http://localhost/dt/favicon.ico">
<link rel="bookmark" type="image/x-icon" href="http://localhost/dt/favicon.ico">
<link rel="archives" title="laravel" href="http://localhost/dt/archiver/">
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/style.css">
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/member.css">
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="http://localhost/dt/skin/default/ie6.css"/>
<![endif]-->
<script type="text/javascript">window.onerror=function(){return true;}</script><script type="text/javascript" src="./会员注册_laravel_files/lang.js.下载"></script>
<script type="text/javascript" src="/static/homeSkin/js/config.js"></script>
<!--[if lte IE 9]><!-->
<script type="text/javascript" src="/static/homeSkin/js/jquery-1.5.2.min.js"></script>
<!--<![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<script type="text/javascript" src="/static/homeSkin/js/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/static/homeSkin/js/common.js"></script>
<script type="text/javascript" src="/static/homeSkin/js/page.js"></script>
<script type="text/javascript">
GoMobile('http://localhost/dt/mobile/member/register.php?action=mail&sid=9eaf3f2fa2511289771ad5dab04fcabc');
var searchid = 5;
</script>
</head>
<body>
<div class="head" id="head">
<div class="head_m">
<div class="head_r" id="destoon_member"><img src="/static/homeSkin/images/ico-user.png" align="absmiddle"><a href="http://localhost/dt/member/login.php">会员登录</a> &nbsp;|&nbsp; <a href="http://localhost/dt/member/register.php">免费注册</a> &nbsp;|&nbsp; <a href="http://localhost/dt/member/send.php">忘记密码</a></div>
<div class="head_l">
<ul>
<li class="h_fav"><script type="text/javascript">addFav('收藏本页');</script><a href="http://localhost/dt/member/register.php?action=mail&amp;sid=9eaf3f2fa2511289771ad5dab04fcabc" title="会员注册_laravel" rel="sidebar" onclick="if(UA.indexOf(&#39;chrome&#39;) != -1){alert(&#39;请按快捷键Ctrl+D收藏本页，谢谢&#39;);return false;}window.external.addFavorite(this.href, this.title);return false;">收藏本页</a></li>
<li class="h_mobile"><a href="javascript:Dmobile();">手机版</a></li><li class="h_qrcode"><a href="javascript:Dqrcode();">二维码</a></li><li class="h_cart"><a href="http://localhost/dt/member/cart.php">购物车</a>(<span class="head_t" id="destoon_cart">0</span>)</li></ul>
</div>
</div>
</div>
<div class="m head_s" id="destoon_space"></div>
<div class="m"><div id="search_tips" style="display:none;"></div></div>
<div id="destoon_qrcode" style="display:none;"></div><div class="m">
<div id="search_module" style="display:none;" onmouseout="Dh(&#39;search_module&#39;);" onmouseover="Ds(&#39;search_module&#39;);">
<ul>
<li onclick="setModule(&#39;16&#39;,&#39;商城&#39;)">商城</li><li onclick="setModule(&#39;5&#39;,&#39;供应&#39;)">供应</li><li onclick="setModule(&#39;6&#39;,&#39;求购&#39;)">求购</li><li onclick="setModule(&#39;4&#39;,&#39;公司&#39;)">公司</li><li onclick="setModule(&#39;17&#39;,&#39;团购&#39;)">团购</li><li onclick="setModule(&#39;7&#39;,&#39;行情&#39;)">行情</li><li onclick="setModule(&#39;8&#39;,&#39;展会&#39;)">展会</li><li onclick="setModule(&#39;21&#39;,&#39;资讯&#39;)">资讯</li><li onclick="setModule(&#39;22&#39;,&#39;招商&#39;)">招商</li><li onclick="setModule(&#39;13&#39;,&#39;品牌&#39;)">品牌</li><li onclick="setModule(&#39;9&#39;,&#39;人才&#39;)">人才</li><li onclick="setModule(&#39;10&#39;,&#39;知道&#39;)">知道</li><li onclick="setModule(&#39;11&#39;,&#39;专题&#39;)">专题</li><li onclick="setModule(&#39;12&#39;,&#39;图库&#39;)">图库</li><li onclick="setModule(&#39;14&#39;,&#39;视频&#39;)">视频</li><li onclick="setModule(&#39;15&#39;,&#39;下载&#39;)">下载</li><li onclick="setModule(&#39;18&#39;,&#39;商圈&#39;)">商圈</li></ul>
</div>
</div>
<div class="m">
<div class="logo f_l"><a href="http://localhost/dt/"><img src="/static/homeSkin/images/logo.png" alt="laravel"></a></div>
<form id="destoon_search" action="http://localhost/dt/sell/search.php" onsubmit="return Dsearch(1);">
<input type="hidden" name="moduleid" value="5" id="destoon_moduleid">
<input type="hidden" name="spread" value="0" id="destoon_spread">
<div class="head_search">
<div>
<input name="kw" id="destoon_kw" type="text" class="search_i" value="请输入关键词" onfocus="if(this.value==&#39;请输入关键词&#39;) this.value=&#39;&#39;;" onkeyup="STip(this.value);" autocomplete="off" x-webkit-speech="" speech=""><input type="text" id="destoon_select" class="search_m" value="供应" readonly="" onfocus="this.blur();" onclick="$(&#39;#search_module&#39;).fadeIn(&#39;fast&#39;);"><input type="submit" value=" " class="search_s">
</div>
</div>
</form>
<div class="head_search_kw f_l"><a href="http://localhost/dt/member/register.php?action=mail&amp;sid=9eaf3f2fa2511289771ad5dab04fcabc" onclick="Dsearch_top();return false;"><strong>推广</strong></a> 
<a href="http://localhost/dt/member/register.php?action=mail&amp;sid=9eaf3f2fa2511289771ad5dab04fcabc" onclick="Dsearch_adv();return false;"><strong>热搜：</strong></a>
<span id="destoon_word"></span></div>
</div>
<div class="m">
<div class="menu">
<ul><li class="menuon"><a href="http://localhost/dt/"><span>首页</span></a></li><li><a href="http://localhost/dt/mall/"><span>商城</span></a></li><li><a href="http://localhost/dt/sell/"><span>供应</span></a></li><li><a href="http://localhost/dt/buy/"><span>求购</span></a></li><li><a href="http://localhost/dt/company/"><span>公司</span></a></li><li><a href="http://localhost/dt/group/"><span>团购</span></a></li><li><a href="http://localhost/dt/quote/"><span>行情</span></a></li><li><a href="http://localhost/dt/exhibit/"><span>展会</span></a></li><li><a href="http://localhost/dt/news/"><span>资讯</span></a></li><li><a href="http://localhost/dt/invest/"><span>招商</span></a></li><li><a href="http://localhost/dt/brand/"><span>品牌</span></a></li><li><a href="http://localhost/dt/job/"><span>人才</span></a></li><li><a href="http://localhost/dt/know/"><span>知道</span></a></li><li><a href="http://localhost/dt/special/"><span>专题</span></a></li><li><a href="http://localhost/dt/photo/"><span>图库</span></a></li><li><a href="http://localhost/dt/video/"><span>视频</span></a></li><li><a href="http://localhost/dt/down/"><span>下载</span></a></li><li><a href="http://localhost/dt/club/"><span>商圈</span></a></li></ul>
</div>
</div>
<div class="m b20" id="headb"></div><div class="m">
<br>
<div class="reg-main">
<div class="reg-step">
<ul>
<li style="width:90px;">&nbsp;</li>
<li class="on"><i>1</i>注册验证</li>
<li><i>2</i>填写资料</li>
<li><b>&nbsp;</b>注册成功</li>
<li style="width:90px;">&nbsp;</li>
</ul>
</div>
</div>
<br>
</div>
<div class="m">
<form method="post" action="http://localhost/dt/member/register.php?" onsubmit="return Mcheck();">
<input type="hidden" name="action" value="mail">
<input type="hidden" name="sid" value="9eaf3f2fa2511289771ad5dab04fcabc">
<table cellspacing="0" class="reg-tb">
<tbody><tr>
<td class="tl"><span class="f_red">*</span> 电子邮箱</td>
<td class="tr"><input name="email" type="text" id="email" placeholder="电子邮箱" class="input-mail" autocomplete="off"></td>
<td class="tt"><span id="demail" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><input name="captcha" id="captcha" type="text" size="6" placeholder="验证码" class="input-captcha">&nbsp;<img src="./会员注册_laravel_files/captcha.png.php" title="验证码,看不清楚?请点击刷新
字母不区分大小写" alt="" align="absmiddle" id="captchapng" onclick="reloadcaptcha();" style="cursor:pointer;"><span id="ccaptcha"></span>
<script type="text/javascript">
function reloadcaptcha() {
Dd('captchapng').src = 'http://localhost/dt/api/captcha.png.php?action=image&refresh='+Math.random();
Dd('ccaptcha').innerHTML = '';
Dd('captcha').value = '';
}
function checkcaptcha(s) {
s = $.trim(s);
var t = encodeURIComponent(s);
if(t.indexOf('%E2%80%86') != -1) s = decodeURIComponent(t.replace(/%E2%80%86/g, ''));
if(!is_captcha(s)) return;
$.post(AJPath, 'action=captcha&captcha='+s,
function(data) {
if(data == '0') {
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="http://localhost/dt/file/image/check-ok.png" align="absmiddle"/>';
} else {
Dd('captcha').focus;
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="http://localhost/dt/file/image/check-ko.png" align="absmiddle"/>';
}
}
);
}
function is_captcha(v) {
if(v.match(/^[a-z0-9A-Z]{1,}$/)) {
return v.match(/^[a-z0-9A-Z]{4,}$/);
} else {
return v.length > 1;
}
}
$(function() {
$('#captcha').bind('keyup blur', function() {
checkcaptcha($('#captcha').val());
});
});
</script></td>
<td class="tt"><span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">&nbsp;&nbsp;<a href="javascript:;" class="b" onclick="Msend();" id="send">发送邮件</a><span id="sendok" class="f_r f_green"></span></td>
<td class="tt"><span id="dsend" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 邮件验证码</td>
<td class="tr"><input name="code" type="text" id="code" placeholder="邮件验证码" class="input-code"></td>
<td class="tt"><span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr"><input type="checkbox" checked="checked" name="read" id="read" value="1" onclick="if(this.checked){Ds(&#39;sbm&#39;);}else{Dh(&#39;sbm&#39;);}"> <a href="http://localhost/dt/member/register.php?action=read" target="_blank">我已阅读并同意服务条款</a></td>
<td class="tt"><span id="dread" class="f_red"></span></td>
</tr>
<tr id="sbm">
<td class="tl"></td>
<td class="tr"><input type="submit" name="submit" value="下一步" class="btn-blue reg-btn"></td>
<td class="tt"></td>
</tr>
</tbody></table>
</form>
<script type="text/javascript">
function Mcheck() {
if(Dd('email').value.length < 6) {
Dmsg('请输入电子邮箱', 'email');
return false;
}
if(Dd('code').value.length < 6) {
Dmsg('请输入邮件验证码', 'code');
return false;
}
if(!Dd('read').checked) {
Dmsg('请阅读并同意服务条款', 'read');
return false;
}
return true;
}
function Mstop() {
var i = 180;
var interval=window.setInterval(
function() {
if(i == 0) {
$('#send').html('发送邮件');
$('#sendok').html('');
clearInterval(interval);
} else {
$('#send').html('重新发送('+i+'秒)');
i--;
}
},
1000);
}
function Msend() {
if($('#send').html().indexOf('秒') != -1) {
Dmsg('请耐心等待', 'send');
return false;
}
if(Dd('email').value.length < 6) {
Dmsg('请输入电子邮箱', 'email');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写验证码', 'captcha');
return false;
}
$.post('?', 'action=sendmail&sid=9eaf3f2fa2511289771ad5dab04fcabc&email='+Dd('email').value+'&captcha='+Dd('captcha').value, function(data) {
if(data == 'ok') {
$('#sendok').html('邮箱发送成功');
Mstop();return;
} else if(data == 'format') {
Dmsg('邮箱格式错误', 'email');
} else if(data == 'captcha') {
Dmsg('验证码错误', 'captcha');
} else if(data == 'exist') {
Dmsg('电子邮箱已经被注册', 'email');
} else if(data == 'max') {
Dmsg('发送次数过多', 'send');
} else if(data == 'fast') {
Dmsg('发送频率过快', 'send');
} else {
Dmsg('发送失败'+data, 'send');
}
reloadcaptcha();
});
}
</script>
<br><br>
</div>
<div class="m b20" id="footb"></div>
<div class="m">
<div class="foot_page">
<a href="http://localhost/dt/">网站首页</a> &nbsp;|&nbsp; 
<a href="http://localhost/dt/about/index.html">关于我们</a> &nbsp;|&nbsp; 
<a href="http://localhost/dt/about/contact.html">联系方式</a> &nbsp;|&nbsp; 
<a href="http://localhost/dt/about/agreement.html">使用协议</a> &nbsp;|&nbsp; 
<a href="http://localhost/dt/about/copyright.html">版权隐私</a> &nbsp;|&nbsp; 
<a href="http://localhost/dt/sitemap/">网站地图</a> &nbsp;|&nbsp; 
<a href="http://localhost/dt/spread/">排名推广</a> &nbsp;|&nbsp; 
<a href="http://localhost/dt/ad/">广告服务</a> &nbsp;|&nbsp; <a href="http://localhost/dt/gift/">积分换礼</a> &nbsp;|&nbsp; <a href="http://localhost/dt/guestbook/">网站留言</a> &nbsp;|&nbsp; <a href="http://localhost/dt/feed/">RSS订阅</a> &nbsp;|&nbsp;  <a href="javascript:SendReport();">违规举报</a>
</div>
</div>
<div class="m">
<div class="foot">
<div id="copyright">laravelSYSTEM All Rights Reserved</div>
</div>
</div>
<div class="back2top"><a href="javascript:void(0);" title="返回顶部">&nbsp;</a></div>
<script type="text/javascript">
var destoon_userid = 0,destoon_username = '',destoon_message = 0,destoon_chat = 0,destoon_cart = get_cart(),destoon_member = destoon_guest = '';
destoon_guest = '<img src="http://localhost/dt/skin/default/image/ico-user.png" align="absmiddle"/><a href="/static/homeSkin/images/login.php">会员登录</a> &nbsp;|&nbsp; <a href="http://localhost/dt/member/register.php">免费注册</a> &nbsp;|&nbsp; <a href="http://localhost/dt/member/send.php">忘记密码</a>';
destoon_member += destoon_guest;
$('#destoon_member').html(destoon_member);
$('#destoon_cart').html(destoon_cart > 0 ? '<strong>'+destoon_cart+'</strong>' : 0);
</script>

</body></html>