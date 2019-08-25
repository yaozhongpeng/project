<!doctype html>
<html>
<head>
<meta charset="UTF-8"/>
<title>@yield('title')</title>
<meta name="keywords" content="laravel"/>
<meta name="description" content="laravel"/>
<meta http-equiv="mobile-agent" content="format=html5;url=/static/memberSkin/dt/mobile/">
<link rel="shortcut icon" type="image/x-icon" href="/static/memberSkin/dt/favicon.ico"/>
<link rel="bookmark" type="image/x-icon" href="/static/memberSkin/dt/favicon.ico"/>
<link rel="archives" title="laravel" href="/static/memberSkin/dt/archiver/"/>
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/style.css"/>
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/index.css"/>
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/member.css"/>
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/mall.css"/>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="/static/homeSkin//css/ie6.css"/>
<![endif]-->
<script type="text/javascript">window.onerror=function(){return true;}</script><script type="text/javascript" src="/static/homeSkin//js/lang.js"></script>
<script type="text/javascript" src="/static/homeSkin/js/config.js"></script>
<!--[if lte IE 9]><!-->
<script type="text/javascript" src="/static/homeSkin/js/jquery-1.5.2.min.js"></script>
<!--<![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<script type="text/javascript" src="/static/homeSkin/js/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/static/homeSkin/js/common.js"></script>
<script type="text/javascript" src="/static/homeSkin/js/page.js"></script>
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
GoMobile('/static/memberSkin/dt/mobile/');
var searchid = 5;
</script>
</head>
<body>
<div class="head" id="head">
	<div class="head_m">
		<div class="head_r" id="destoon_member">
			@if(session('email'))
			<span>你好,</span> 
			<a href="/mb">{{session('email')}}</a> &nbsp;|&nbsp;
			<a href="/homelogout">退出</a>
			@else
			<img src="/static/homeSkin/picture/ico-user.png" align="absmiddle"/>
			<a href="/homelogin/create">会员登录</a> &nbsp;|&nbsp; 
			<a href="/homeregister/create">免费注册</a> &nbsp;|&nbsp;
			<a href="/forget">忘记密码</a>
			@endif
		</div>
		<div class="head_l">
			<ul>
				<li class="h_fav"><script type="text/javascript">addFav('收藏本页');</script></li>
				<li class="h_mobile"><a href="javascript:Dmobile();">手机版</a></li><li class="h_qrcode"><a href="javascript:Dqrcode();">二维码</a></li><li class="h_cart"><a href="/cart">购物车</a>(<span class="head_t" id="destoon_cart">0</span>)</li></ul>
		</div>
	</div>
</div>
<div class="m head_s" id="destoon_space"></div>

<div class="m"><div id="search_tips" style="display:none;"></div></div>
	<div id="destoon_qrcode" style="display:none;"></div>

<div class="m">
	<div id="search_module" style="display:none;" onmouseout="Dh('search_module');" onmouseover="Ds('search_module');">
		<ul>
			<li onclick="setModule('16','商城')">商城</li>
			<li onclick="setModule('4','公司')">公司</li>
 			<li onclick="setModule('21','资讯')">资讯</li>
			<li onclick="setModule('9','人才')">人才</li>
			<li onclick="setModule('12','图库')">图库</li>
		</ul>
	</div>
</div>
<div class="m">
	<!-- logo start -->
	<div class="logo f_l">
		<a href="/homeindex"><img src="/static/homeSkin/images/logo.png" alt="laravel"/></a>
	</div>
	<!-- logo end -->
	<!-- search start -->
	<form action="/search" method="get">
		<input type="text" name="kw" placeholder="请输入搜索关键词" required >
		<select>
			<option value="/goods">商品</option>
			<option value="/cates">分类</option>
			<option value="news">资讯</option>
			<option value="/homeuser">会员</option>
			<option value="/article">公告</option>
		</select>
		<input type="submit" value="搜索">
	</form>
	<!-- search end -->
	<!-- keywords start -->
	<div class="head_search_kw f_l">
		<!-- <a href="" onclick="Dsearch_top();return false;"><strong></strong></a> 
		<a href="" onclick="Dsearch_adv();return false;"><strong>热搜:</strong></a>
		<span id="destoon_word"></span> -->
	</div>
	<!-- key words end -->
</div>
<!-- 导航 start -->
<nav class="nav_full">
	<div class="m">
		<div class="menu">
			<ul>
				<li class="menuon"><a href="/homeindex"><span>首页</span></a></li>
				<li><a href="/goods"><span>商城</span></a></li>
			</ul>
		</div>
	</div>
</nav>
<!-- 导航 end -->
<div class="m b20" id="headb"></div>
<!-- header end -->
<!-- 主题内容start -->
     @section('home')
     @show
<!-- 主题内容end -->
<!-- footer start -->
<div class="m b20" id="footb"></div>
<div class="m">
<div class="foot_page">
<a href="/">网站首页</a> &nbsp;|&nbsp; 
<a href="/">关于我们</a> &nbsp;|&nbsp; 
<a href="/">联系方式</a> &nbsp;|&nbsp; 
<a href="/">使用协议</a> &nbsp;|&nbsp; 
<a href="/">版权隐私</a> &nbsp;|&nbsp; 
<a href="/">网站地图</a> &nbsp;|&nbsp; 
<a href="/">排名推广</a> &nbsp;|&nbsp; 
<a href="/">广告服务</a> &nbsp;|&nbsp; 
<a href="">积分换礼</a> &nbsp;|&nbsp; 
<a href="">网站留言</a> &nbsp;|&nbsp; 
<a href="">RSS订阅</a> &nbsp;|&nbsp;  
<a href="javascript:SendReport();">违规举报</a>
</div>
<div style="text-align: center;">
	<p><a href="/adminlogin">登录后台</a></p>
</div>
</div>

<div class="m">
<div class="foot">
<div id="copyright">laravel Rights Reserved</div>
</div>
</div>
<div class="back2top"><a href="javascript:void(0);" title="返回顶部">&nbsp;</a></div>
</body>
</html>