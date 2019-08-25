@extends('Home.HomePublic.homepublic')
@section('home')
<div class="b20"></div>
<div class="m m1">
<div class="m1l">
<form method="post" action="/applylink" id="dform">
<table cellpadding="16" cellspacing="0" class="tf">
<tr>
<td class="tl"><span class="f_red">*</span> 网站名称</td>
<td><input name="keywords" type="text" id="title" size="40" /> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 网站地址</td>
<td><input name="link" type="text" id="linkurl" size="40" value="http://"/> <span id="dlinkurl" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td><input name="code" id="captcha" type="text" size="6" placeholder="验证码" class="input-captcha"/>&nbsp;<img src="/code" onclick="this.src=this.src+'?a=1'" align="absmiddle" id="captchapng" style="cursor:pointer;"/><span id="ccaptcha"></span>
</script> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td>
{{csrf_field()}}
<input type="submit" value="提交申请" class="btn-green"/>
</td>
</tr>
</table>
</form>
</div>
<div class="m1r side">
<ul>
<li class="side_li" id="type_0"><a href="http://www.php217.com/dt/link/">友情链接</a></li>
<li class="side_li" id="type_reg"><a href="http://www.php217.com/dt/link/index.php?action=reg">申请链接</a></li>
</ul>
</div>
<div class="c_b"></div>
</div>
<script type="text/javascript">$(function(){$('#type_reg').attr('class', 'side_on');});</script>
<script type="text/javascript">
function check() {
var l;
var f;
f = 'typeid';
l = Dd(f).value;
if(l == 0) {
Dmsg('请选择分类', f);
return false;
}
f = 'title';
l = Dd(f).value.length;
if(l < 2) {
Dmsg('请输入网站名称', f);
return false;
}
f = 'linkurl';
l = Dd(f).value.length;
if(l < 12) {
Dmsg('请输入网站地址', f);
return false;
}
f = 'captcha';
if($('#c'+f).html().indexOf('ok.png') == -1) {
Dmsg('请填写验证码', f);
return false;
}
}
</script>	
@endsection 
@section('title','申请友情链接')