<!doctype html>
<html>
<head>
<meta charset="UTF-8"/>
<title>商城</title>
<meta name="keywords" content="laravel"/>
<meta name="description" content="laravel"/>
<meta http-equiv="mobile-agent" content="format=html5;url=http://localhost/dt/mobile/">
<link rel="shortcut icon" type="image/x-icon" href="http://localhost/dt/favicon.ico"/>
<link rel="bookmark" type="image/x-icon" href="http://localhost/dt/favicon.ico"/>
<link rel="archives" title="laravel" href="http://localhost/dt/archiver/"/>
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/style.css"/>
<link rel="stylesheet" type="text/css" href="/static/homeSkin/css/index.css"/>
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
<script type="text/javascript">
GoMobile('http://localhost/dt/mobile/');
var searchid = 5;
</script>
</head>
<body>
<div class="head" id="head">
<div class="head_m">
<div class="head_r" id="destoon_member"></div>
<div class="head_l">
<ul>
<li class="h_fav"><script type="text/javascript">addFav('收藏本页');</script></li>
<li class="h_mobile"><a href="javascript:Dmobile();">手机版</a></li><li class="h_qrcode"><a href="javascript:Dqrcode();">二维码</a></li><li class="h_cart"><a href="http://localhost/dt/member/cart.php">购物车</a>(<span class="head_t" id="destoon_cart">0</span>)</li></ul>
</div>
</div>
</div>
<div class="m head_s" id="destoon_space"></div>
<div class="m"><div id="search_tips" style="display:none;"></div></div>
<div id="destoon_qrcode" style="display:none;"></div><div class="m">
<div id="search_module" style="display:none;" onmouseout="Dh('search_module');" onmouseover="Ds('search_module');">
<ul>
<li onclick="setModule('16','商城')">商城</li><li onclick="setModule('5','供应')">供应</li><li onclick="setModule('6','求购')">求购</li><li onclick="setModule('4','公司')">公司</li><li onclick="setModule('17','团购')">团购</li><li onclick="setModule('7','行情')">行情</li><li onclick="setModule('8','展会')">展会</li><li onclick="setModule('21','资讯')">资讯</li><li onclick="setModule('22','招商')">招商</li><li onclick="setModule('13','品牌')">品牌</li><li onclick="setModule('9','人才')">人才</li><li onclick="setModule('10','知道')">知道</li><li onclick="setModule('11','专题')">专题</li><li onclick="setModule('12','图库')">图库</li><li onclick="setModule('14','视频')">视频</li><li onclick="setModule('15','下载')">下载</li><li onclick="setModule('18','商圈')">商圈</li></ul>
</div>
</div>
<div class="m">
<div class="logo f_l"><a href="http://localhost/dt/"><img src="/static/homeSkin/images/logo.png" alt="laravel"/></a></div>
<form id="destoon_search" action="http://localhost/dt/sell/search.php" onsubmit="return Dsearch(1);">
<input type="hidden" name="moduleid" value="5" id="destoon_moduleid"/>
<input type="hidden" name="spread" value="0" id="destoon_spread"/>
<div class="head_search">
<div>
<input name="kw" id="destoon_kw" type="text" class="search_i" value="请输入关键词" onfocus="if(this.value=='请输入关键词') this.value='';" onkeyup="STip(this.value);" autocomplete="off" x-webkit-speech speech/><input type="text" id="destoon_select" class="search_m" value="供应" readonly onfocus="this.blur();" onclick="$('#search_module').fadeIn('fast');"/><input type="submit" value=" " class="search_s"/>
</div>
</div>
</form>
<div class="head_search_kw f_l"><a href="" onclick="Dsearch_top();return false;"><strong>推广</strong></a> 
<a href="" onclick="Dsearch_adv();return false;"><strong>热搜：</strong></a>
<span id="destoon_word"></span></div>
</div>
<div class="m">
<div class="menu">
<ul>
	<li class="menuon"><a href="/homeindex"><span>首页</span></a></li>
	<li><a href="/homeindex/mall"><span>商城</span></a></li>
</ul>
</div>
</div>
<!-- header end -->
<div class="m b20" id="headb"></div><div class="m0">
<div class="m">
<div class="im0">
<div class="im0l">
<ul>
@foreach($cates as $k=>$v)
@if($v->id < 16)
<li class="cate-{{$k}}"><i>&gt;</i>
<a href="http://www.56.com/list" target="_blank"><strong>{{$v->name}}</strong></a> 
<div>
	@foreach($v->suv as $k1=>$v1)
	<dl>
	<dt><a href="http://localhost/dt/mall/list.php?catid=5" target="_blank"><b>{{$v1->name}}</b></a></dt>
		<dd>
			@foreach($v1->suv as $k2=>$v2)
			@if($k2>0)<em>|</em>@endif <a href="">{{$v2->name}}</a>
			@endforeach
		</dd>
	</dl>
	@endforeach
</div>
</li>
@endif
@endforeach
<li class="cate-0" style="background:rgba(255,0,0,0.7);color:#FFF;">查看全部分类&gt;&gt;</li>
</ul>
</div>
<div class="im0m">
<div><script type="text/javascript" src="/static/homeSkin/js/slide.js"></script><div id="slide_a14" class="slide" style="width:660px;height:300px;">
<a href="http://www.destoon.com/" target="_blank"><img src="/static/homeSkin/picture/player_1.jpg" width="660" height="300" alt=""/></a>
<a href="http://www.destoon.com/" target="_blank"><img src="/static/homeSkin/picture/player_2.jpg" width="660" height="300" alt=""/></a>
</div>
<script type="text/javascript">new dslide('slide_a14');</script>
</div>
<div class="im0a">
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a1.jpg" width="116" height="212" alt=""/></a></div>
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a2.jpg" width="116" height="212" alt=""/></a></div>
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a3.jpg" width="116" height="212" alt=""/></a></div>
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a4.jpg" width="116" height="212" alt=""/></a></div>
<div><a href="/" target="_blank"><img src="/static/homeSkin/picture/a5.jpg" width="116" height="212" alt=""/></a></div>
</div>
</div>
<div class="im0r">
<div class="im0u">
<div class="user-info" style="background:#FFFFFF;">
<script type="text/javascript">
var destoon_uname = get_cookie('username');
document.write('<a href="http://localhost/dt/member/avatar.php"><img src="'+DTPath+'api/avatar/show.php?size=large&reload=1564967754&username='+destoon_uname+'"/></a>');
document.write('<ul>');
if(get_cookie('auth')) {
document.write('<li><em><a href="http://localhost/dt/member/logout.php">退出</a></em><a href="http://localhost/dt/member/"><strong>Hi,'+destoon_uname+'</strong></a></li>');
} else {
if(destoon_uname) {
document.write('<li><em><a href="http://www.56.com/login">登录</a></em><a href="http://localhost/dt/member/"><strong>Hi,'+destoon_uname+'</strong></a></li>');
} else {
document.write('<li><em><a href="http://localhost/dt/member/register.php">注册</a></em><a href="http://localhost/dt/member/login.php"><strong>Hi,请登录</strong></a></li>');
}
}
document.write('<li><a href="http://localhost/dt/member/" class="b">会员中心</a><i>|</i><a href="http://localhost/dt/member/my.php" class="b">发布信息</a><i>|</i><a href="http://localhost/dt/member/biz.php" class="b">商户后台</a></li>');
document.write('</ul>');
</script>
</div>
<div id="ian">
<div class="ian-h">
<ul id="ian-h">
<li id="ian-h-1" onmouseover="Tb(this);" class="on"><a href="http://localhost/dt/announce/" target="_blank"><span>网站动态</span></a></li>
<li id="ian-h-2" onmouseover="Tb(this);"><a href="http://localhost/dt/member/" target="_blank"><span>我是买家</span></a></li>
<li id="ian-h-3" onmouseover="Tb(this);"><a href="http://localhost/dt/member/biz.php" target="_blank"><span>我是卖家</span></a></li>
</ul>
</div>
<div id="ian-b-1" class="ian-b" style="display:;">
<ul>
@foreach($article_top as $k=>$v)
<li><span class="f_r">&nbsp;0{{$k}}-0{{$k}}</span><a href="#" target="_blank" title="公告标题">{{$v->title}}</a></li>
@endforeach
</ul>
</div>
<div id="ian-b-2" class="ian-b" style="display:none;">
<a href="http://localhost/dt/sell/"><div>搜索产品</div></a>
<p>&gt;</p>
<a href="http://localhost/dt/member/order.php" target="_blank"><div>我的订单</div></a>
<p>&gt;</p>
<a href="http://localhost/dt/member/my.php?mid=6&action=add" target="_blank"><div>发布求购</div></a>
</div>
<div id="ian-b-3" class="ian-b" style="display:none;">
<a href="http://localhost/dt/member/home.php" target="_blank"><div>完善商铺</div></a>
<p>&gt;</p>
<a href="http://localhost/dt/member/my.php?mid=5&action=add" target="_blank"><div>发布产品</div></a>
<p>&gt;</p>
<a href="http://localhost/dt/member/trade.php" target="_blank"><div>订单管理</div></a>
</div>
</div>
<div class="im0g">
<a href="http://localhost/dt/member/cart.php" target="_blank"><div><em><script type="text/javascript">document.write(get_cart());</script></em><img src="/static/homeSkin//picture/grid-cart.png"/><br/>购物车</div></a><a href="http://localhost/dt/member/grade.php" target="_blank"><div><img src="/static/homeSkin//picture/grid-vip.png"/><br/>付费会员</div></a>
<a href="http://localhost/dt/spread/" target="_blank"><div><img src="/static/homeSkin//picture/grid-spread.png"/><br/>排名推广</div></a>
<a href="http://localhost/dt/ad/" target="_blank"><div><img src="/static/homeSkin//picture/grid-ad.png"/><br/>广告投放</div></a><a href="http://localhost/dt/gift/" target="_blank"><div><img src="/static/homeSkin//picture/grid-gift.png"/><br/>积分换礼</div></a><a href="http://localhost/dt/sitemap/" target="_blank"><div><img src="/static/homeSkin//picture/grid-map.png"/><br/>网站地图</div></a>
<a href="http://localhost/dt/api/mobile.php" target="_blank"><div><img src="/static/homeSkin//picture/grid-mobile.png"/><br/>手机浏览</div></a></div>
</div>
<div class="im0t">
<div id="itrade">
<div class="tab-head">
<ul id="trade-h">
<li id="trade-h-4" onmouseover="Tb(this);" class="on"><a href="http://localhost/dt/company/" target="_blank"><span>企业</span></a></li>
<li id="trade-h-6" onmouseover="Tb(this);"><a href="http://localhost/dt/buy/" target="_blank"><span>求购</span></a></li><li id="trade-h-7" onmouseover="Tb(this);"><a href="http://localhost/dt/quote/" target="_blank"><span>行情</span></a></li><li id="trade-h-21" onmouseover="Tb(this);"><a href="http://localhost/dt/news/" target="_blank"><span>头条</span></a></li><li id="trade-h-18" onmouseover="Tb(this);"><a href="http://localhost/dt/club/" target="_blank"><span>社区</span></a></li></ul>
</div>
<div id="trade-b-4" class="im0t-list" style="display:;">
<ul>
</ul>
</div>
<div id="trade-b-6" class="im0t-list" style="display:none;">
<ul>
</ul>
</div>
<div id="trade-b-7" class="im0t-list" style="display:none;">
<ul>
</ul>
</div>
<div id="trade-b-21" class="im0t-list" style="display:none;">
<ul>
</ul>
</div>
<div id="trade-b-18" class="im0t-list" style="display:none;">
<ul>
</ul>
</div>
</div>
</div>
</div>
<div class="c_b"></div>
</div>
</div>
</div>
<div class="m">
<div class="b10"></div>
<div class="head-txt">
<span>
 <a href="http://localhost/dt/sell/">供应</a> &nbsp;|&nbsp; <a href="http://localhost/dt/buy/">求购</a> &nbsp;|&nbsp; <a href="http://localhost/dt/invest/">招商</a> &nbsp;|&nbsp; <a href="http://localhost/dt/mall/">商城</a> &nbsp;|&nbsp; <a href="http://localhost/dt/group/">团购</a> &nbsp;|&nbsp; <a href="http://localhost/dt/quote/">行情</a> &nbsp;|&nbsp; <a href="http://localhost/dt/company/">公司</a>
</span>
<strong>行业市场</strong>
</div>
<div class="im-b im-b-mall">
<div class="im-l">
<a href="http://localhost/dt/mall/"><p>商城</p></a>
<ul>
<li><a href="http://localhost/dt/mall/list.php?catid=4" target="_blank">家用电器</a></li>
</ul>
</div>
<div class="im-r im-r-mall">
</div>
</div>
<div class="im-b im-b-sell">
<div class="im-l">
<a href="http://localhost/dt/sell/"><p>供应</p></a>
<ul>
<li><a href="http://localhost/dt/sell/list.php?catid=1" target="_blank">供应默认分类</a></li>
</ul>
</div>
<div class="im-r im-r-sell">
</div>
</div>
<div class="im-b im-b-info">
<div class="im-l">
<a href="http://localhost/dt/invest/"><p>招商</p></a>
<ul>
</ul>
</div>
<div class="im-r im-r-info">
</div>
</div>
<div class="im-b im-b-group">
<div class="im-l">
<a href="http://localhost/dt/group/"><p>团购</p></a>
<ul>
</ul>
</div>
<div class="im-r im-r-group">
</div>
</div>
</div>
<div class="m">
<div class="head-txt">
<span>
<a href="http://localhost/dt/news/">更多<i>&gt;</i></a>
</span>
<strong>资讯中心</strong>
</div>
<div class="in-b">
<div class="in-l">

</div>
<div class="in-m">
<div class="list-txt">
<ul>
</ul>
</div>
<div class="b20 bd-t"></div>
<div class="list-txt">
<ul>
</ul>
</div>
</div>
<div class="in-r">
<div class="head-txt">
<span><a href="http://localhost/dt/video/" target="_blank">更多<i>&gt;</i></a></span><strong>视频</strong>
</div>
<div class="in-video">
</div>
<div class="head-txt">
<span><a href="http://localhost/dt/photo/" target="_blank">更多<i>&gt;</i></a></span><strong>图库</strong>
</div>
<div class="in-photo">
</div>
<div class="c_b"></div>
</div>
</div>
<div class="m">
<div class="head-txt">
<span>
 <a href="http://localhost/dt/know/">知道</a> &nbsp;|&nbsp; <a href="http://localhost/dt/exhibit/">展会</a> &nbsp;|&nbsp; <a href="http://localhost/dt/brand/">品牌</a> &nbsp;|&nbsp; <a href="http://localhost/dt/job/">人才</a> &nbsp;|&nbsp; <a href="http://localhost/dt/down/">下载</a> &nbsp;|&nbsp; <a href="http://localhost/dt/club/">商圈</a> &nbsp;|&nbsp; <a href="http://localhost/dt/ad/">广告</a> &nbsp;|&nbsp; <a href="http://localhost/dt/spread/">推广</a>
</span>
<strong>企业服务</strong>
</div>
<div class="ic-b">
<div class="ic-l">
<div class="ic-brand">
<a href="http://localhost/dt/brand/" target="_blank"><i>品牌</i></a>
<div id="brands">
</div>
</div>
</div>
<div class="ic-m">
<div class="head-txt">
<span><a href="http://localhost/dt/exhibit/" target="_blank">更多<i>&gt;</i></a></span><strong>展会</strong>
</div>
<div class="list-txt">
<ul>
</ul>
</div>
<div class="head-txt">
<span><a href="http://localhost/dt/job/" target="_blank">更多<i>&gt;</i></a></span><strong>招聘</strong>
</div>
<div class="list-txt">
<ul>
</ul>
</div>
</div>
<div class="ic-r">
<div class="head-txt">
<span><a href="http://localhost/dt/know/" target="_blank">更多<i>&gt;</i></a></span><strong>知道</strong>
</div>
<div class="list-txt">
<ul>
</ul>
</div>
<div class="head-txt">
<span><a href="http://localhost/dt/down/" target="_blank">更多<i>&gt;</i></a></span><strong>下载</strong>
</div>
<div class="ic-down">
</div>
<div class="c_b"></div>
</div>
</div>
<div class="m">
<div class="ic-club">
<div class="ic-club-h">
<span>
<a href="http://localhost/dt/club/">更多<i>&gt;</i></a>
</span>
<a href="http://localhost/dt/club/" target="_blank"><strong>商圈</strong></a>
</div>
<div class="ic-club-b">
</div>
</div>
</div>
<div class="m">
<div class="head-txt">
<span>
<a href="http://localhost/dt/link/index.php?action=reg">申请链接</a> &nbsp;|&nbsp;
<a href="http://localhost/dt/link/">更多<i>&gt;</i></a>
</span>
<div class="px16">友情链接</div>
</div>
<div class="ilink">
<ul>
@foreach($links as $k=>$v)
<li><a href="/{{$v->link}}">{{$v->keywords}}</a></li>
@endforeach
</ul>
<div class="c_b"></div>
</div>
<div class="ilink">
<ul>
</ul>
<div class="c_b"></div>
</div>
</div>
<script type="text/javascript" src="/static/homeSkin//js/marquee.js"></script>
<script type="text/javascript" src="/static/homeSkin//js/index.js"></script>
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
<div style="text-align: center;">
	<a href="/adminlogin">登录后台</a>
</div>
</div>

<!-- footer start -->
<div class="m">
<div class="foot">
<div id="copyright">laravel Rights Reserved</div>
</div>
</div>
<!-- footer end -->
<div class="back2top"><a href="javascript:void(0);" title="返回顶部">&nbsp;</a></div>
<script type="text/javascript">
var destoon_userid = 0,destoon_username = '',destoon_message = 0,destoon_chat = 0,destoon_cart = get_cart(),destoon_member = destoon_guest = '';
destoon_guest = '<img src="/static/homeSkin/picture/ico-user.png" align="absmiddle"/><a href="/homelogin">会员登录</a> &nbsp;|&nbsp; <a href="/homeregister/create">免费注册</a> &nbsp;|&nbsp; <a href="/homesendpwd">忘记密码</a>';
var oauth_site = '';
var oauth_user = '';
destoon_member += (oauth_user && oauth_site) ? '<img src="/static/homeSkin/picture/b2ce06a16ec948649ceb7d0ec5b5eaf8.gif'+oauth_site+'/ico.png" align="absmiddle"/><strong>'+oauth_user+'</strong> &nbsp;|&nbsp; <a href="http://localhost/dt/api/oauth/'+oauth_site+'/index.php?time=1564967754">绑定帐号</a> &nbsp;|&nbsp; <a href="javascript:" onclick="oauth_logout();">退出登录</a>' : destoon_guest;
$('#destoon_member').html(destoon_member);
$('#destoon_cart').html(destoon_cart > 0 ? '<strong>'+destoon_cart+'</strong>' : 0);
</script>
</body>
</html>